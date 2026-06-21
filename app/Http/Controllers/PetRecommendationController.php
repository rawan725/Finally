<?php

namespace App\Http\Controllers;

use App\Models\Animal;
use App\Models\PetRecommendation;
use Illuminate\Http\Request;
use Phpml\Classification\KNearestNeighbors;

class PetRecommendationController extends Controller
{
    public function index()
    {
        $latestRecommendation = PetRecommendation::where('user_id', auth()->id())
            ->latest()
            ->first();

        $availableAnimals = collect();

        if ($latestRecommendation) {
            $keywords = $this->petTypeKeywords($latestRecommendation->recommended_pet);

            $availableAnimals = Animal::where(function ($query) use ($keywords) {
                    foreach ($keywords as $keyword) {
                        $query->orWhere('type', 'like', '%' . $keyword . '%')
                              ->orWhere('name', 'like', '%' . $keyword . '%');
                    }
                })
                ->latest()
                ->take(3)
                ->get();
        }

        return view('pet-recommendation', compact('latestRecommendation', 'availableAnimals'));
    }

    public function recommend(Request $request)
    {
        $request->validate([
            'home_space' => ['required'],
            'daily_time' => ['required'],
            'personality' => ['required'],
            'has_children' => ['required'],
            'has_allergy' => ['required'],
            'experience_level' => ['required'],
            'budget_level' => ['required'],
            'preferred_activity' => ['required'],
        ]);

        $userVector = $this->convertAnswersToVector($request);

        [$samples, $labels] = $this->trainingData();

        $classifier = new KNearestNeighbors(3);
        $classifier->train($samples, $labels);

        $recommendedPet = $classifier->predict($userVector);

        $reason = $this->generateReason($recommendedPet);

        PetRecommendation::create([
            'user_id' => auth()->id(),
            'home_space' => $request->home_space,
            'daily_time' => $request->daily_time,
            'personality' => $request->personality,
            'has_children' => $request->has_children,
            'has_allergy' => $request->has_allergy,
            'experience_level' => $request->experience_level,
            'budget_level' => $request->budget_level,
            'preferred_activity' => $request->preferred_activity,
            'recommended_pet' => $recommendedPet,
            'recommendation_reason' => $reason,
            'answers_vector' => $userVector,
        ]);

        return redirect()
            ->route('pet.recommendation')
            ->with('success', 'تم تحليل إجاباتك بنجاح، وهذه هي التوصية الأنسب لك.');
    }

    private function convertAnswersToVector(Request $request): array
    {
        return [
            $this->mapValue($request->home_space, [
                'small' => 1,
                'medium' => 2,
                'large' => 3,
            ]),

            $this->mapValue($request->daily_time, [
                'low' => 1,
                'medium' => 2,
                'high' => 3,
            ]),

            $this->mapValue($request->personality, [
                'calm' => 1,
                'balanced' => 2,
                'active' => 3,
            ]),

            $this->mapValue($request->has_children, [
                'no' => 0,
                'yes' => 1,
            ]),

            $this->mapValue($request->has_allergy, [
                'no' => 0,
                'yes' => 1,
            ]),

            $this->mapValue($request->experience_level, [
                'beginner' => 1,
                'intermediate' => 2,
                'advanced' => 3,
            ]),

            $this->mapValue($request->budget_level, [
                'low' => 1,
                'medium' => 2,
                'high' => 3,
            ]),

            $this->mapValue($request->preferred_activity, [
                'watching' => 1,
                'quiet_companion' => 2,
                'playing' => 3,
            ]),
        ];
    }

    private function mapValue(string $value, array $map): int
    {
        return $map[$value] ?? 0;
    }

    private function trainingData(): array
    {
        $samples = [
            // سمك
            [1, 1, 1, 0, 1, 1, 1, 1],
            [1, 1, 1, 0, 1, 1, 2, 1],
            [2, 1, 1, 0, 1, 1, 1, 1],
            [1, 2, 1, 0, 1, 1, 1, 1],

            // قط
            [1, 2, 1, 0, 0, 1, 2, 2],
            [2, 2, 2, 0, 0, 2, 2, 2],
            [2, 1, 1, 0, 0, 1, 2, 2],
            [1, 2, 2, 1, 0, 2, 2, 2],

            // كلب
            [3, 3, 3, 1, 0, 2, 3, 3],
            [3, 3, 3, 0, 0, 3, 3, 3],
            [2, 3, 3, 1, 0, 2, 3, 3],
            [3, 2, 3, 1, 0, 2, 3, 3],

            // طير
            [1, 2, 2, 0, 0, 1, 1, 1],
            [2, 2, 2, 0, 0, 2, 1, 1],
            [1, 1, 2, 0, 0, 1, 1, 1],

            // أرنب
            [2, 2, 1, 1, 0, 1, 2, 2],
            [2, 2, 1, 0, 0, 1, 2, 2],
            [3, 2, 1, 1, 0, 2, 2, 2],
        ];

        $labels = [
            'سمك', 'سمك', 'سمك', 'سمك',
            'قط', 'قط', 'قط', 'قط',
            'كلب', 'كلب', 'كلب', 'كلب',
            'طير', 'طير', 'طير',
            'أرنب', 'أرنب', 'أرنب',
        ];

        return [$samples, $labels];
    }

    private function generateReason(string $pet): string
    {
        return match ($pet) {
            'سمك' => 'تم اقتراح السمك لأنه مناسب للأشخاص الذين يفضلون الهدوء، أو يملكون وقتًا محدودًا للعناية اليومية، كما أنه خيار مناسب للمساحات الصغيرة ولمن لديهم حساسية من الحيوانات ذات الفرو.',

            'قط' => 'تم اقتراح القط لأنه مناسب للحياة داخل المنزل، ويحتاج إلى رعاية متوسطة، كما يناسب الشخصيات الهادئة أو المتوازنة التي تفضل حيوانًا أليفًا مستقلًا نسبيًا.',

            'كلب' => 'تم اقتراح الكلب لأنه مناسب للأشخاص الذين يملكون وقتًا جيدًا للعناية والتفاعل، ويفضلون حيوانًا اجتماعيًا ونشيطًا يشاركهم اللعب والحركة.',

            'طير' => 'تم اقتراح الطير لأنه مناسب للمساحات الصغيرة أو المتوسطة، ويناسب الأشخاص الذين يفضلون التفاعل الخفيف أو مراقبة الحيوان دون الحاجة إلى مساحة واسعة.',

            'أرنب' => 'تم اقتراح الأرنب لأنه مناسب لمن يريد حيوانًا لطيفًا وهادئًا، ويملك وقتًا متوسطًا للعناية، كما أنه مناسب للعائلات بشرط توفير بيئة آمنة ومناسبة.',

            default => 'تم اقتراح هذا الحيوان بناءً على تحليل إجاباتك ومقارنتها مع بيانات التدريب داخل نظام التوصية الذكي.',
        };
    }

    private function petTypeKeywords(string $pet): array
    {
        return match ($pet) {
            'قط' => ['قط', 'قطة', 'قطط', 'cat', 'cats'],
            'كلب' => ['كلب', 'كلاب', 'dog', 'dogs'],
            'طير' => ['طير', 'طيور', 'bird', 'birds'],
            'سمك' => ['سمك', 'أسماك', 'fish'],
            'أرنب' => ['أرنب', 'أرانب', 'rabbit', 'rabbits'],
            default => [$pet],
        };
    }
}