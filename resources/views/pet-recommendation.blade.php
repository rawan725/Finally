@extends('layouts.app')

@section('content')

<section class="min-h-screen bg-[#f3fbf7] py-10 px-4 relative overflow-hidden">

    <div class="absolute top-0 right-0 w-[420px] h-[420px] bg-emerald-200/40 rounded-full blur-3xl -translate-y-1/2 translate-x-1/3"></div>
    <div class="absolute bottom-0 left-0 w-[380px] h-[380px] bg-teal-200/40 rounded-full blur-3xl translate-y-1/3 -translate-x-1/3"></div>

    <div class="max-w-7xl mx-auto relative z-10">

        <!-- Hero -->
        <div class="relative overflow-hidden rounded-[2.8rem] p-8 md:p-10 mb-8 shadow-xl"
             style="background: linear-gradient(135deg, #052e2b 0%, #065f46 55%, #10b981 100%);">

            <div class="absolute inset-0 opacity-10">
                <span class="material-symbols-outlined absolute left-8 bottom-0 text-[190px] text-white">
                    psychology
                </span>

                <span class="material-symbols-outlined absolute right-10 top-8 text-[120px] text-white">
                    pets
                </span>
            </div>

            <div class="relative z-10 flex flex-col lg:flex-row lg:items-center lg:justify-between gap-8">

                <div class="text-right max-w-3xl">

                    <span class="inline-flex items-center gap-2 px-5 py-2 rounded-full bg-white/15 text-emerald-50 text-sm font-black border border-white/20 mb-5">
                        <span class="material-symbols-outlined text-[18px]">
                            auto_awesome
                        </span>
                        مستشار ذكي لاختيار الحيوان المناسب
                    </span>

                    <h1 class="text-3xl md:text-5xl font-black text-white mb-4 leading-tight">
                        نظام التوصية الذكي لاختيار الحيوان الأليف
                    </h1>

                    <p class="text-emerald-50/90 text-lg leading-relaxed">
                        أجيبي على أسئلة بسيطة حول نمط حياتك وشخصيتك، وسيقوم النظام بتحليل الإجابات واقتراح الحيوان الأليف الأكثر توافقًا معك بطريقة سهلة وواضحة.
                    </p>

                </div>

                <div class="bg-white/15 border border-white/20 rounded-[2rem] p-6 text-white min-w-[250px] backdrop-blur">

                    <div class="flex items-center gap-3 mb-4">
                        <div class="w-12 h-12 rounded-2xl bg-white/20 flex items-center justify-center">
                            <span class="material-symbols-outlined text-[30px]">
                                pets
                            </span>
                        </div>

                        <div>
                            <p class="font-black">
                                كيف يعمل؟
                            </p>

                            <p class="text-sm text-emerald-50/80">
                                تحليل نمط الحياة
                            </p>
                        </div>
                    </div>

                    <div class="space-y-3 text-sm text-emerald-50/90">

                        <div class="flex items-center gap-2">
                            <span class="material-symbols-outlined text-emerald-200 text-[20px]">
                                check_circle
                            </span>
                            <span>فهم ظروف المستخدم</span>
                        </div>

                        <div class="flex items-center gap-2">
                            <span class="material-symbols-outlined text-emerald-200 text-[20px]">
                                check_circle
                            </span>
                            <span>اقتراح الحيوان الأنسب</span>
                        </div>

                        <div class="flex items-center gap-2">
                            <span class="material-symbols-outlined text-emerald-200 text-[20px]">
                                check_circle
                            </span>
                            <span>عرض خيارات مناسبة من المتجر</span>
                        </div>

                    </div>

                </div>

            </div>

        </div>

        @if(session('success'))
            <div class="mb-8 p-4 rounded-2xl bg-green-100 text-green-700 font-bold text-right border border-green-200">
                {{ session('success') }}
            </div>
        @endif

        @if($errors->any())
            <div class="mb-8 p-4 rounded-2xl bg-red-50 text-red-600 text-right border border-red-100">
                يرجى الإجابة على جميع الأسئلة قبل طلب التوصية.
            </div>
        @endif

        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8">

            <!-- Questions -->
            <div class="lg:col-span-7">

                <div class="bg-white/95 backdrop-blur rounded-[2.8rem] p-7 md:p-8 border border-emerald-100 shadow-xl shadow-emerald-900/5">

                    <div class="flex items-center gap-4 mb-8">

                        <div class="w-14 h-14 rounded-2xl bg-emerald-900 text-white flex items-center justify-center shadow-lg shadow-emerald-900/20">
                            <span class="material-symbols-outlined text-[34px]">
                                quiz
                            </span>
                        </div>

                        <div>
                            <h2 class="text-2xl font-black text-emerald-900">
                                استبيان تحليل شخصية المستخدم
                            </h2>

                            <p class="text-sm text-emerald-900/50 mt-1">
                                اختاري الإجابة الأقرب لك حتى يعطي النظام توصية أدق.
                            </p>
                        </div>

                    </div>

                    <form action="{{ route('pet.recommendation.recommend') }}" method="POST" class="space-y-5">

                        @csrf

                        <div class="rounded-[2rem] bg-emerald-50/70 border border-emerald-100 p-5">
                            <label class="flex items-center gap-3 text-emerald-900 font-black mb-3">
                                <span class="w-9 h-9 rounded-xl bg-white text-emerald-800 flex items-center justify-center border border-emerald-100">
                                    1
                                </span>
                                ما مساحة المنزل؟
                            </label>

                            <select name="home_space" required
                                    class="w-full rounded-2xl border border-emerald-100 bg-white p-4 text-emerald-900 font-bold outline-none focus:ring-2 focus:ring-emerald-700">
                                <option value="">اختاري الإجابة</option>
                                <option value="small" {{ old('home_space') == 'small' ? 'selected' : '' }}>صغيرة</option>
                                <option value="medium" {{ old('home_space') == 'medium' ? 'selected' : '' }}>متوسطة</option>
                                <option value="large" {{ old('home_space') == 'large' ? 'selected' : '' }}>كبيرة</option>
                            </select>
                        </div>

                        <div class="rounded-[2rem] bg-emerald-50/70 border border-emerald-100 p-5">
                            <label class="flex items-center gap-3 text-emerald-900 font-black mb-3">
                                <span class="w-9 h-9 rounded-xl bg-white text-emerald-800 flex items-center justify-center border border-emerald-100">
                                    2
                                </span>
                                كم لديك وقت يوميًا للعناية بالحيوان؟
                            </label>

                            <select name="daily_time" required
                                    class="w-full rounded-2xl border border-emerald-100 bg-white p-4 text-emerald-900 font-bold outline-none focus:ring-2 focus:ring-emerald-700">
                                <option value="">اختاري الإجابة</option>
                                <option value="low" {{ old('daily_time') == 'low' ? 'selected' : '' }}>وقت قليل</option>
                                <option value="medium" {{ old('daily_time') == 'medium' ? 'selected' : '' }}>وقت متوسط</option>
                                <option value="high" {{ old('daily_time') == 'high' ? 'selected' : '' }}>وقت كبير</option>
                            </select>
                        </div>

                        <div class="rounded-[2rem] bg-emerald-50/70 border border-emerald-100 p-5">
                            <label class="flex items-center gap-3 text-emerald-900 font-black mb-3">
                                <span class="w-9 h-9 rounded-xl bg-white text-emerald-800 flex items-center justify-center border border-emerald-100">
                                    3
                                </span>
                                كيف تصفين شخصيتك غالبًا؟
                            </label>

                            <select name="personality" required
                                    class="w-full rounded-2xl border border-emerald-100 bg-white p-4 text-emerald-900 font-bold outline-none focus:ring-2 focus:ring-emerald-700">
                                <option value="">اختاري الإجابة</option>
                                <option value="calm" {{ old('personality') == 'calm' ? 'selected' : '' }}>هادئة</option>
                                <option value="balanced" {{ old('personality') == 'balanced' ? 'selected' : '' }}>متوازنة</option>
                                <option value="active" {{ old('personality') == 'active' ? 'selected' : '' }}>نشيطة</option>
                            </select>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-5">

                            <div class="rounded-[2rem] bg-emerald-50/70 border border-emerald-100 p-5">
                                <label class="flex items-center gap-3 text-emerald-900 font-black mb-3">
                                    <span class="w-9 h-9 rounded-xl bg-white text-emerald-800 flex items-center justify-center border border-emerald-100">
                                        4
                                    </span>
                                    هل يوجد أطفال في المنزل؟
                                </label>

                                <select name="has_children" required
                                        class="w-full rounded-2xl border border-emerald-100 bg-white p-4 text-emerald-900 font-bold outline-none focus:ring-2 focus:ring-emerald-700">
                                    <option value="">اختاري</option>
                                    <option value="yes" {{ old('has_children') == 'yes' ? 'selected' : '' }}>نعم</option>
                                    <option value="no" {{ old('has_children') == 'no' ? 'selected' : '' }}>لا</option>
                                </select>
                            </div>

                            <div class="rounded-[2rem] bg-emerald-50/70 border border-emerald-100 p-5">
                                <label class="flex items-center gap-3 text-emerald-900 font-black mb-3">
                                    <span class="w-9 h-9 rounded-xl bg-white text-emerald-800 flex items-center justify-center border border-emerald-100">
                                        5
                                    </span>
                                    هل لديك حساسية من الفرو؟
                                </label>

                                <select name="has_allergy" required
                                        class="w-full rounded-2xl border border-emerald-100 bg-white p-4 text-emerald-900 font-bold outline-none focus:ring-2 focus:ring-emerald-700">
                                    <option value="">اختاري</option>
                                    <option value="yes" {{ old('has_allergy') == 'yes' ? 'selected' : '' }}>نعم</option>
                                    <option value="no" {{ old('has_allergy') == 'no' ? 'selected' : '' }}>لا</option>
                                </select>
                            </div>

                        </div>

                        <div class="rounded-[2rem] bg-emerald-50/70 border border-emerald-100 p-5">
                            <label class="flex items-center gap-3 text-emerald-900 font-black mb-3">
                                <span class="w-9 h-9 rounded-xl bg-white text-emerald-800 flex items-center justify-center border border-emerald-100">
                                    6
                                </span>
                                ما مستوى خبرتك بتربية الحيوانات؟
                            </label>

                            <select name="experience_level" required
                                    class="w-full rounded-2xl border border-emerald-100 bg-white p-4 text-emerald-900 font-bold outline-none focus:ring-2 focus:ring-emerald-700">
                                <option value="">اختاري الإجابة</option>
                                <option value="beginner" {{ old('experience_level') == 'beginner' ? 'selected' : '' }}>مبتدئة</option>
                                <option value="intermediate" {{ old('experience_level') == 'intermediate' ? 'selected' : '' }}>متوسطة</option>
                                <option value="advanced" {{ old('experience_level') == 'advanced' ? 'selected' : '' }}>خبيرة</option>
                            </select>
                        </div>

                        <div class="rounded-[2rem] bg-emerald-50/70 border border-emerald-100 p-5">
                            <label class="flex items-center gap-3 text-emerald-900 font-black mb-3">
                                <span class="w-9 h-9 rounded-xl bg-white text-emerald-800 flex items-center justify-center border border-emerald-100">
                                    7
                                </span>
                                ما الميزانية المناسبة للعناية بالحيوان؟
                            </label>

                            <select name="budget_level" required
                                    class="w-full rounded-2xl border border-emerald-100 bg-white p-4 text-emerald-900 font-bold outline-none focus:ring-2 focus:ring-emerald-700">
                                <option value="">اختاري الإجابة</option>
                                <option value="low" {{ old('budget_level') == 'low' ? 'selected' : '' }}>منخفضة</option>
                                <option value="medium" {{ old('budget_level') == 'medium' ? 'selected' : '' }}>متوسطة</option>
                                <option value="high" {{ old('budget_level') == 'high' ? 'selected' : '' }}>عالية</option>
                            </select>
                        </div>

                        <div class="rounded-[2rem] bg-emerald-50/70 border border-emerald-100 p-5">
                            <label class="flex items-center gap-3 text-emerald-900 font-black mb-3">
                                <span class="w-9 h-9 rounded-xl bg-white text-emerald-800 flex items-center justify-center border border-emerald-100">
                                    8
                                </span>
                                أي نوع تفاعل تفضلين؟
                            </label>

                            <select name="preferred_activity" required
                                    class="w-full rounded-2xl border border-emerald-100 bg-white p-4 text-emerald-900 font-bold outline-none focus:ring-2 focus:ring-emerald-700">
                                <option value="">اختاري الإجابة</option>
                                <option value="watching" {{ old('preferred_activity') == 'watching' ? 'selected' : '' }}>مراقبة وهدوء</option>
                                <option value="quiet_companion" {{ old('preferred_activity') == 'quiet_companion' ? 'selected' : '' }}>رفقة هادئة</option>
                                <option value="playing" {{ old('preferred_activity') == 'playing' ? 'selected' : '' }}>لعب ونشاط</option>
                            </select>
                        </div>

                        <button type="submit"
                                class="w-full px-8 py-5 rounded-2xl text-white font-black shadow-lg shadow-emerald-900/20 hover:scale-[1.01] transition-all flex items-center justify-center gap-3"
                                style="background: linear-gradient(135deg, #065f46, #059669);">

                            <span class="material-symbols-outlined">
                                auto_awesome
                            </span>

                            تحليل الشخصية واقتراح الحيوان المناسب
                        </button>

                    </form>

                </div>

            </div>

            <!-- Result -->
            <div class="lg:col-span-5">

                <div class="bg-white/95 backdrop-blur rounded-[2.8rem] p-7 md:p-8 border border-emerald-100 shadow-xl shadow-emerald-900/5 sticky top-28">

                    <div class="flex items-center gap-4 mb-7">

                        <div class="w-14 h-14 rounded-2xl bg-emerald-100 text-emerald-800 flex items-center justify-center">
                            <span class="material-symbols-outlined text-[34px]">
                                emoji_objects
                            </span>
                        </div>

                        <div>
                            <h2 class="text-2xl font-black text-emerald-900">
                                نتيجة التحليل
                            </h2>

                            <p class="text-sm text-emerald-900/50 mt-1">
                                آخر توصية ذكية محفوظة لحسابك.
                            </p>
                        </div>

                    </div>

                    @if($latestRecommendation)

                        <div class="relative overflow-hidden rounded-[2rem] p-7 text-white text-center mb-6"
                             style="background: linear-gradient(135deg, #052e2b, #047857);">

                            <div class="absolute inset-0 opacity-10">
                                <span class="material-symbols-outlined absolute left-4 bottom-0 text-[130px]">
                                    pets
                                </span>
                            </div>

                            <div class="relative z-10">

                                <p class="text-emerald-100 font-bold mb-3">
                                    الحيوان الأنسب لشخصيتك هو
                                </p>

                                <h3 class="text-5xl font-black mb-4">
                                    {{ $latestRecommendation->recommended_pet }}
                                </h3>

                            </div>

                        </div>

                        <div class="rounded-2xl bg-emerald-50 p-5 border border-emerald-100 mb-5">
                            <h4 class="font-black text-emerald-900 mb-3 flex items-center gap-2">
                                <span class="material-symbols-outlined text-[22px]">
                                    psychology_alt
                                </span>
                                سبب التوصية
                            </h4>

                            <p class="text-sm text-emerald-900/70 leading-relaxed">
                                {{ $latestRecommendation->recommendation_reason }}
                            </p>
                        </div>

                        @if($availableAnimals->count())

                            <div>
                                <h4 class="font-black text-emerald-900 mb-4">
                                    حيوانات متوفرة من نفس النوع
                                </h4>

                                <div class="space-y-3">
                                    @foreach($availableAnimals as $animal)
                                        <a href="{{ url('/animals/details/' . $animal->id) }}"
                                           class="block rounded-2xl border border-emerald-100 p-4 hover:bg-emerald-50 transition-all">

                                            <div class="flex items-center gap-3">

                                                @if($animal->image)
                                                    <img src="{{ asset('images/animals/' . $animal->image) }}"
                                                         alt="{{ $animal->name }}"
                                                         class="w-14 h-14 rounded-xl object-cover">
                                                @else
                                                    <div class="w-14 h-14 rounded-xl bg-emerald-100 text-emerald-800 flex items-center justify-center">
                                                        <span class="material-symbols-outlined">
                                                            pets
                                                        </span>
                                                    </div>
                                                @endif

                                                <div>
                                                    <p class="font-black text-emerald-900">
                                                        {{ $animal->name }}
                                                    </p>

                                                    <p class="text-sm text-emerald-900/60">
                                                        {{ number_format($animal->price) }} ل.س
                                                    </p>
                                                </div>

                                            </div>

                                        </a>
                                    @endforeach
                                </div>
                            </div>

                        @else

                            <div class="rounded-2xl bg-yellow-50 text-yellow-700 p-5 border border-yellow-100 text-sm leading-relaxed">
                                لا توجد نتائج مطابقة تمامًا داخل المتجر حاليًا، يمكنك تصفح قسم الحيوانات لرؤية خيارات أخرى مناسبة.
                            </div>

                        @endif

                    @else

                        <div class="rounded-[2rem] bg-emerald-50 p-8 text-center border border-emerald-100">

                            <div class="w-24 h-24 mx-auto rounded-[2rem] bg-white text-emerald-800 flex items-center justify-center mb-5 shadow-sm">
                                <span class="material-symbols-outlined text-[56px]">
                                    psychology
                                </span>
                            </div>

                            <h3 class="text-2xl font-black text-emerald-900 mb-3">
                                لا توجد توصية بعد
                            </h3>

                            <p class="text-emerald-900/60 leading-relaxed">
                                بعد الإجابة على الاستبيان، سيظهر هنا الحيوان الأنسب مع سبب الاختيار.
                            </p>

                        </div>

                    @endif

                </div>

            </div>

        </div>

    </div>

</section>

@endsection