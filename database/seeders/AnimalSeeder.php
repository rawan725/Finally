<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Animal;

class AnimalSeeder extends Seeder
{
    public function run(): void
    {
        Animal::create([
            'name' => 'لونا',
            'type' => 'cats',
            'breed' => 'Persian',
            'age' => 1,
            'price' => 150,
            'description' => 'قطة شيرازية هادئة ومناسبة للعائلات.',
            'image' => 'cat1.jpg',
            'available' => 1,
        ]);

        Animal::create([
            'name' => 'لوسي',
            'type' => 'cats',
            'breed' => 'Scottish Fold',
            'age' => 1,
            'price' => 250,
            'description' => 'قطة لطيفة ومرحة.',
            'image' => 'cat2.jpg',
            'available' => 1,
        ]);

        Animal::create([
            'name' => 'ميشو',
            'type' => 'cats',
            'breed' => 'Siamese',
            'age' => 2,
            'price' => 300,
            'description' => 'قطة سيامية ذكية وتحب اللعب.',
            'image' => 'cat3.jpg',
            'available' => 1,
        ]);

        Animal::create([
            'name' => 'سيمبا',
            'type' => 'dogs',
            'breed' => 'Golden Retriever',
            'age' => 2,
            'price' => 350,
            'description' => 'كلب اجتماعي وودود.',
            'image' => 'dog1.jpg',
            'available' => 1,
        ]);

        Animal::create([
            'name' => 'روكي',
            'type' => 'dogs',
            'breed' => 'Husky',
            'age' => 1,
            'price' => 600,
            'description' => 'هاسكي نشيط ويحب الحركة.',
            'image' => 'husky.jpg',
            'available' => 1,
        ]);

        Animal::create([
            'name' => 'ماكس',
            'type' => 'dogs',
            'breed' => 'German Shepherd',
            'age' => 2,
            'price' => 700,
            'description' => 'كلب ذكي ومدرب.',
            'image' => 'german.jpg',
            'available' => 1,
        ]);

        Animal::create([
            'name' => 'رينبو',
            'type' => 'birds',
            'breed' => 'Macaw',
            'age' => 1,
            'price' => 800,
            'description' => 'ببغاء ملون قادر على تعلم الكلمات.',
            'image' => 'macaw.jpg',
            'available' => 1,
        ]);

        Animal::create([
            'name' => 'تويتي',
            'type' => 'birds',
            'breed' => 'Canary',
            'age' => 1,
            'price' => 120,
            'description' => 'طائر كناري بصوت جميل.',
            'image' => 'canary.jpg',
            'available' => 1,
        ]);

        Animal::create([
            'name' => 'جولدي',
            'type' => 'fish',
            'breed' => 'Gold Fish',
            'age' => 1,
            'price' => 30,
            'description' => 'سمكة زينة هادئة.',
            'image' => 'goldfish.jpg',
            'available' => 1,
        ]);

        Animal::create([
            'name' => 'بلو',
            'type' => 'fish',
            'breed' => 'Betta',
            'age' => 1,
            'price' => 40,
            'description' => 'سمكة بيتا بألوان جذابة.',
            'image' => 'betta.jpg',
            'available' => 1,
        ]);

        Animal::create([
            'name' => 'سنو',
            'type' => 'rabbits',
            'breed' => 'Angora',
            'age' => 1,
            'price' => 180,
            'description' => 'أرنب أبيض كثيف الفراء.',
            'image' => 'rabbit1.jpg',
            'available' => 1,
        ]);

        Animal::create([
            'name' => 'فلافي',
            'type' => 'rabbits',
            'breed' => 'Dutch Rabbit',
            'age' => 1,
            'price' => 150,
            'description' => 'أرنب لطيف ونشيط.',
            'image' => 'rabbit2.jpg',
            'available' => 1,
        ]);
    }
}
