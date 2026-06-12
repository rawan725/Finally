<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Doctor;

class DoctorSeeder extends Seeder
{
    public function run(): void
    {
        $doctors = [
            [
                'name' => 'د. أحمد اليوسف',
                'specialty' => 'أمراض القطط والكلاب',
                'experience_years' => 8,
                'consultation_price' => 25000,
                'bio' => 'طبيب بيطري مختص بعلاج الحيوانات المنزلية ومتابعة الحالات المرضية الشائعة.',
                'image' => null,
                'is_available' => true,
            ],
            [
                'name' => 'د. لمى الخطيب',
                'specialty' => 'رعاية الطيور والحيوانات الصغيرة',
                'experience_years' => 6,
                'consultation_price' => 20000,
                'bio' => 'مختصة بمتابعة الطيور والأرانب والحالات الغذائية والسلوكية للحيوانات الصغيرة.',
                'image' => null,
                'is_available' => true,
            ],
            [
                'name' => 'د. سامر الحسن',
                'specialty' => 'الجراحة البيطرية والطوارئ',
                'experience_years' => 10,
                'consultation_price' => 35000,
                'bio' => 'خبرة في الحالات الطارئة والجراحة البسيطة وتقديم الإرشادات الأولية.',
                'image' => null,
                'is_available' => true,
            ],
        ];

        foreach ($doctors as $doctor) {
            Doctor::updateOrCreate(
                ['name' => $doctor['name']],
                $doctor
            );
        }
    }
}
