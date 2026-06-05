<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Supply;

class SupplySeeder extends Seeder
{
    public function run(): void
    {
        Supply::truncate();

        $supplies = [

            // ===== القطط =====
            [
                'name' => 'Royal Canin للقطط',
                'category' => 'food',
                'brand' => 'Royal Canin',
                'price' => 120,
                'quantity' => 20,
                'description' => 'طعام متكامل للقطط البالغة.',
                'image' => 'cat_food1.jpg',
                'available' => 1,
            ],
            [
                'name' => 'لعبة ريش للقطط',
                'category' => 'toys',
                'brand' => 'Cat Fun',
                'price' => 15,
                'quantity' => 30,
                'description' => 'لعبة تفاعلية للقطط.',
                'image' => 'cat_toy1.jpg',
                'available' => 1,
            ],
            [
                'name' => 'بيت قطط خشبي',
                'category' => 'homes',
                'brand' => 'Pet Home',
                'price' => 250,
                'quantity' => 5,
                'description' => 'بيت مريح للقطط.',
                'image' => 'cat_home1.jpg',
                'available' => 1,
            ],
            [
                'name' => 'شامبو قطط',
                'category' => 'medicine',
                'brand' => 'VetCare',
                'price' => 40,
                'quantity' => 15,
                'description' => 'شامبو مخصص للعناية بالقطط.',
                'image' => 'cat_med1.jpg',
                'available' => 1,
            ],
            [
                'name' => 'طوق قطط فاخر',
                'category' => 'accessories',
                'brand' => 'Pet Style',
                'price' => 35,
                'quantity' => 25,
                'description' => 'طوق أنيق للقطط.',
                'image' => 'cat_acc1.jpg',
                'available' => 1,
            ],

            // ===== الكلاب =====
            [
                'name' => 'Pro Plan للكلاب',
                'category' => 'food',
                'brand' => 'Pro Plan',
                'price' => 150,
                'quantity' => 20,
                'description' => 'غذاء متوازن للكلاب.',
                'image' => 'dog_food1.jpg',
                'available' => 1,
            ],
            [
                'name' => 'كرة مطاطية',
                'category' => 'toys',
                'brand' => 'Dog Toys',
                'price' => 20,
                'quantity' => 30,
                'description' => 'لعبة ممتعة للكلاب.',
                'image' => 'dog_toy1.jpg',
                'available' => 1,
            ],
            [
                'name' => 'بيت كلاب خارجي',
                'category' => 'homes',
                'brand' => 'Dog House',
                'price' => 350,
                'quantity' => 8,
                'description' => 'منزل مريح للكلاب.',
                'image' => 'dog_home1.jpg',
                'available' => 1,
            ],
            [
                'name' => 'فيتامين للكلاب',
                'category' => 'medicine',
                'brand' => 'VetCare',
                'price' => 55,
                'quantity' => 20,
                'description' => 'مكمل غذائي للكلاب.',
                'image' => 'dog_med1.jpg',
                'available' => 1,
            ],
            [
                'name' => 'حزام مشي',
                'category' => 'accessories',
                'brand' => 'Pet Style',
                'price' => 45,
                'quantity' => 20,
                'description' => 'حزام آمن للكلاب.',
                'image' => 'dog_acc1.jpg',
                'available' => 1,
            ],

            // ===== الطيور =====
            [
                'name' => 'غذاء الببغاء',
                'category' => 'food',
                'brand' => 'Bird Food',
                'price' => 30,
                'quantity' => 20,
                'description' => 'غذاء متكامل للطيور.',
                'image' => 'bird_food1.jpg',
                'available' => 1,
            ],
            [
                'name' => 'أرجوحة طيور',
                'category' => 'toys',
                'brand' => 'Bird Fun',
                'price' => 15,
                'quantity' => 20,
                'description' => 'لعبة للطيور.',
                'image' => 'bird_toy1.jpg',
                'available' => 1,
            ],
            [
                'name' => 'قفص طيور فاخر',
                'category' => 'homes',
                'brand' => 'Bird House',
                'price' => 180,
                'quantity' => 10,
                'description' => 'قفص مريح للطيور.',
                'image' => 'bird_home1.jpg',
                'available' => 1,
            ],
            [
                'name' => 'فيتامين طيور',
                'category' => 'medicine',
                'brand' => 'Bird Care',
                'price' => 25,
                'quantity' => 15,
                'description' => 'فيتامين للطيور.',
                'image' => 'bird_med1.jpg',
                'available' => 1,
            ],
            [
                'name' => 'معلف طيور',
                'category' => 'accessories',
                'brand' => 'Bird Style',
                'price' => 12,
                'quantity' => 20,
                'description' => 'معلف أنيق للطيور.',
                'image' => 'bird_acc1.jpg',
                'available' => 1,
            ],

            // ===== الأسماك =====
            [
                'name' => 'غذاء جولد فيش',
                'category' => 'food',
                'brand' => 'Fish Food',
                'price' => 18,
                'quantity' => 30,
                'description' => 'طعام للأسماك.',
                'image' => 'fish_food1.jpg',
                'available' => 1,
            ],
            [
                'name' => 'زينة حوض',
                'category' => 'toys',
                'brand' => 'Fish Decor',
                'price' => 25,
                'quantity' => 20,
                'description' => 'ديكور للحوض.',
                'image' => 'fish_toy1.jpg',
                'available' => 1,
            ],
            [
                'name' => 'حوض LED',
                'category' => 'homes',
                'brand' => 'Aquarium',
                'price' => 450,
                'quantity' => 5,
                'description' => 'حوض أسماك بإضاءة LED.',
                'image' => 'fish_home1.jpg',
                'available' => 1,
            ],
            [
                'name' => 'معالج مياه',
                'category' => 'medicine',
                'brand' => 'Fish Care',
                'price' => 30,
                'quantity' => 20,
                'description' => 'منقي ومعالج للمياه.',
                'image' => 'fish_med1.jpg',
                'available' => 1,
            ],
            [
                'name' => 'فلتر ماء',
                'category' => 'accessories',
                'brand' => 'Aqua Tech',
                'price' => 80,
                'quantity' => 10,
                'description' => 'فلتر للحوض.',
                'image' => 'fish_acc1.jpg',
                'available' => 1,
            ],

            // ===== الأرانب =====
            [
                'name' => 'علف أرانب',
                'category' => 'food',
                'brand' => 'Rabbit Food',
                'price' => 35,
                'quantity' => 20,
                'description' => 'غذاء صحي للأرانب.',
                'image' => 'rabbit_food1.jpg',
                'available' => 1,
            ],
            [
                'name' => 'كرة قش',
                'category' => 'toys',
                'brand' => 'Rabbit Fun',
                'price' => 12,
                'quantity' => 20,
                'description' => 'لعبة طبيعية للأرانب.',
                'image' => 'rabbit_toy1.jpg',
                'available' => 1,
            ],
            [
                'name' => 'قفص أرانب كبير',
                'category' => 'homes',
                'brand' => 'Rabbit House',
                'price' => 220,
                'quantity' => 10,
                'description' => 'مسكن واسع للأرانب.',
                'image' => 'rabbit_home1.jpg',
                'available' => 1,
            ],
            [
                'name' => 'فيتامين أرانب',
                'category' => 'medicine',
                'brand' => 'Rabbit Care',
                'price' => 22,
                'quantity' => 15,
                'description' => 'مكمل غذائي للأرانب.',
                'image' => 'rabbit_med1.jpg',
                'available' => 1,
            ],
            [
                'name' => 'مشربية أرانب',
                'category' => 'accessories',
                'brand' => 'Rabbit Style',
                'price' => 18,
                'quantity' => 15,
                'description' => 'مشربية عملية للأرانب.',
                'image' => 'rabbit_acc1.jpg',
                'available' => 1,
            ],
        ];

        foreach ($supplies as $supply) {
            Supply::create($supply);
        }
    }
}
