@extends('layouts.app')

@section('content')
<main class="max-w-container-max mx-auto px-md py-xl space-y-xl">
<!-- Main Section: Gallery & Info -->
<section class="grid grid-cols-1 lg:grid-cols-2 gap-xl items-start">
<!-- Left: Gallery -->
<div class="space-y-sm">
<div class="hero-zoom overflow-hidden rounded-[32px] bg-surface-container-low aspect-square relative group">
<img
    alt="{{ $animal->name }}"
    class="w-full h-full object-cover transition-transform duration-700 ease-in-out"
    src="{{ asset('images/animals/' . $animal->image) }}" />

<div class="absolute top-sm right-sm flex flex-col gap-xs">
<span class="bg-secondary text-on-secondary px-sm py-1 rounded-full text-label-md font-label-md">موصى به</span>
<span class="bg-primary text-on-primary px-sm py-1 rounded-full text-label-md font-label-md">متوفر</span>
</div>
</div>
<div class="flex gap-sm overflow-x-auto pb-2 custom-scrollbar">
<div class="w-24 h-24 flex-shrink-0 rounded-xl overflow-hidden border-2 border-primary cursor-pointer">
<img class="w-full h-full object-cover" data-alt="Close up of a Golden Retriever puppy's face looking into the camera with soft soulful eyes, warm morning light." src="https://lh3.googleusercontent.com/aida-public/AB6AXuBcSp1tkBJzQIQnEpwj6mQxDRICWf_bCH0BjRXRvqQ_cIV1SPfSeZvqKmdE0tvlRL3lDEnXvXY0nuhArUvPam6hcb-y6GgQpqgCkaagOrvYsjxPqzaIrRuJ_jgKPqLimNQBu2CBRUVKo2TgQWagcTHaWY9P2TwrLFhO4uhPoDH_cHPIUiVGkjOkQaTnzSuWcRRgIcddqIgfOlomY8X0R8lrtS4-DcCJoM8RNKoTQ4yHjFXMbBnR3BSGADsag4BUK_RdjbEZ4TQzug"/>
</div>
<div class="w-24 h-24 flex-shrink-0 rounded-xl overflow-hidden border-2 border-transparent hover:border-on-primary-container cursor-pointer transition-all">
<img class="w-full h-full object-cover" data-alt="A playful puppy running on a manicured lawn, captured in motion with a shallow depth of field." src="https://lh3.googleusercontent.com/aida-public/AB6AXuAGc7QVJWjz3SqKNE-QuBWiPC2IdwHrKMo0zFBefa_a48Fyg4dD4C56DQo9AfZ8cwEWQy1ieMwhS6CrC2-r6jHPTgRpbbt6AdhvgZs7PCjE2nyu3tnwG8DMcFvLGP7PW_sP8lkG427_iU2fTDBqczX5wq2O5crqagJVrw_YpWiHn1KMbxEZsk4UXhqaZfRT6m5SALaxYW9f5KDSb74cDWXp6yZXU3mCQ3j6HVVhBgWcW2YuYA9_Tnah6Lxs4xT9lFyPyO7d9jGUAA"/>
</div>
<div class="w-24 h-24 flex-shrink-0 rounded-xl overflow-hidden border-2 border-transparent hover:border-on-primary-container cursor-pointer transition-all">
<img class="w-full h-full object-cover" data-alt="A cute puppy wearing a small green necktie, sitting on a soft white carpet in a modern living room." src="https://lh3.googleusercontent.com/aida-public/AB6AXuDfRZGOw3H53EgIhihAhPt7RBVUq6mGuwkBF3S-WpgfBODlHorr_tTV21SxfF1GUHWmFiiuJt2BtkbKkJxQPlyT1iqQypfOWDVmAbR327R2vJxgDEUN1zhDi68F-YDj4W2UoZOHbb7hG5jg8ynLhPuoxGUCb8xzMLb2vrIGk4AIs9kpIokNkddum0QhB3icJJZKAhLHtwwP-Xx_mqyNBbok_x2uUGjK_eIJHnSkxTLqd7WOt02qwnq0GbGOCjXyonh8Y6xWiIyqAw"/>
</div>
</div>
</div>
<!-- Right: Info -->
<div class="glass-card p-lg rounded-[32px] space-y-lg">
<div class="space-y-xs">
<h1 class="font-display-md text-display-md text-primary"> {{ $animal->name }}</h1>
<p class="font-headline-md text-headline-md text-secondary">
    {{ $animal->breed }}
</p>
</div>
<div class="grid grid-cols-2 md:grid-cols-3 gap-md border-y border-outline-variant py-md">
<div class="space-y-base">
<p class="text-label-md text-outline">العمر</p>
<p class="font-body-lg text-body-lg text-on-surface">
    {{ $animal->age }} سنة
</p>
</div>
<div class="space-y-base">
<p class="text-label-md text-outline">الجنس</p>
<p class="font-body-lg text-body-lg text-on-surface">ذكر</p>
</div>
<div class="space-y-base">
<p class="text-label-md text-outline">الحالة الصحية</p>
<p class="font-body-lg text-body-lg text-on-surface text-secondary font-bold">ممتازة</p>
</div>
</div>
<div class="flex items-center gap-sm">
<span class="bg-secondary-container text-on-secondary-container px-md py-1 rounded-full text-label-lg flex items-center gap-1">
<span class="material-symbols-outlined text-[18px]">verified</span>
                        مُلقح بالكامل
                    </span>
<span class="bg-surface-container-highest text-on-surface-variant px-md py-1 rounded-full text-label-lg">أليف عائلي</span>
</div>
<div class="space-y-xs">
<p class="text-label-md text-outline">السعر</p>
<p class="font-display-md text-display-md text-primary">
    {{ number_format($animal->price) }} ل.س
</p>
</div>
<div class="flex flex-col sm:flex-row gap-md pt-md">
<div class="flex items-center bg-surface-container-low rounded-full px-4 py-2 border border-outline-variant">
<button class="w-10 h-10 flex items-center justify-center text-primary hover:bg-surface-container transition-colors rounded-full" onclick="changeQty(-1)">-</button>
<input class="w-12 text-center bg-transparent border-none focus:ring-0 font-bold" id="qty" readonly="" type="number" value="1"/>
<button class="w-10 h-10 flex items-center justify-center text-primary hover:bg-surface-container transition-colors rounded-full" onclick="changeQty(1)">+</button>
</div>
<button class="flex-1 bg-primary text-on-primary rounded-full px-lg py-md font-label-lg hover:shadow-xl transition-all duration-300 active:scale-95 flex items-center justify-center gap-2">
<span class="material-symbols-outlined">shopping_basket</span>
                        إضافة إلى السلة
                    </button>
</div>
<button class="w-full border-[1.5px] border-primary text-primary rounded-full px-lg py-md font-label-lg hover:bg-primary-fixed-dim transition-colors flex items-center justify-center gap-2">
<span class="material-symbols-outlined">medical_services</span>
                    استشارة طبيب
                </button>
</div>
</section>
<!-- Description Section -->
<section class="grid grid-cols-1 md:grid-cols-3 gap-xl">
<div class="md:col-span-2 space-y-md">
<h2 class="font-headline-lg text-headline-lg text-primary border-r-4 border-secondary pr-4">الشخصية والاحتياجات</h2>
<div class="font-body-lg text-body-lg text-on-surface-variant leading-relaxed space-y-sm">
<p>{{ $animal->description }}</p>
</div>
<div class="grid grid-cols-1 sm:grid-cols-2 gap-md pt-sm">
<div class="flex items-start gap-sm p-md bg-surface-container-low rounded-2xl">
<span class="material-symbols-outlined text-secondary">sentiment_very_satisfied</span>
<div>
<h4 class="font-label-lg text-on-surface">سهل التدريب</h4>
<p class="text-label-md text-outline">يستجيب بسرعة للأوامر الجديدة</p>
</div>
</div>
<div class="flex items-start gap-sm p-md bg-surface-container-low rounded-2xl">
<span class="material-symbols-outlined text-secondary">child_care</span>
<div>
<h4 class="font-label-lg text-on-surface">صديق للأطفال</h4>
<p class="text-label-md text-outline">هادئ ولطيف في التعامل</p>
</div>
</div>
</div>
</div>
<div class="space-y-md">
<div class="glass-card p-md rounded-3xl border-secondary/20">
<h3 class="font-headline-md text-headline-md text-primary mb-md">ضمان سمارت بيت</h3>
<ul class="space-y-sm">
<li class="flex items-center gap-sm text-body-md">
<span class="material-symbols-outlined text-secondary" style="font-variation-settings: 'FILL' 1;">check_circle</span>
                            شهادة صحية موثقة
                        </li>
<li class="flex items-center gap-sm text-body-md">
<span class="material-symbols-outlined text-secondary" style="font-variation-settings: 'FILL' 1;">check_circle</span>
                            تأمين لمدة 30 يوم
                        </li>
<li class="flex items-center gap-sm text-body-md">
<span class="material-symbols-outlined text-secondary" style="font-variation-settings: 'FILL' 1;">check_circle</span>
                            حقيبة ترحيبية مجانية
                        </li>
</ul>
</div>
</div>
</section>

<!-- Related Animals -->
<section class="space-y-lg">
<div class="flex justify-between items-center">
<h2 class="font-headline-lg text-headline-lg text-primary">أليفات أخرى قد تعجبك</h2>
<a class="text-secondary font-label-lg hover:underline flex items-center gap-1" href="#">
                    عرض الكل
                    <span class="material-symbols-outlined text-[18px]">arrow_back</span>
</a>
</div>
<div class="grid grid-cols-2 md:grid-cols-4 gap-md">
<!-- Card 1 -->
<div class="group cursor-pointer">
<div class="rounded-3xl overflow-hidden aspect-[4/5] relative mb-sm">
<img class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500" data-alt="A beautiful gray Persian cat with emerald green eyes sitting on a velvet cushion in a bright, modern interior setting." src="https://lh3.googleusercontent.com/aida-public/AB6AXuCnaPE9zI14mLExMQ5CQXd2yVrWWaoAqROPBGU53hqvpBo3boVnhO5cfy-TFBnDlG4fLSKQuiD9X8Jf796rdDjcLR6YUCH2yY41eXlFey1RlEk918ljaSEU_iS9fvfwYxkfmORMR7B8V95GhjAUSGoIi2Bik7TtEkobz_gkptm71DbBgV8_ID3y5F3DrYh5fLboHfeeTF7eSvykK3Ypg5Jo154kteT5Voj8pw90N1O6ajl7-SuM9x_uxtrHQ0A2FIWsCUrr2GBMDQ"/>
<button class="absolute bottom-4 left-4 w-10 h-10 rounded-full bg-white/90 text-primary flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity">
<span class="material-symbols-outlined">favorite</span>
</button>
</div>
<h4 class="font-label-lg text-on-surface">لولو</h4>
<p class="text-label-md text-outline">قط شيرازي</p>
<p class="font-label-lg text-secondary">1,200 ل.س</p>
</div>
<!-- Card 2 -->
<div class="group cursor-pointer">
<div class="rounded-3xl overflow-hidden aspect-[4/5] relative mb-sm">
<img class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500" data-alt="A small, happy Beagle puppy running through a field of wildflowers under a clear blue sky, vibrant colors." src="https://lh3.googleusercontent.com/aida-public/AB6AXuAQ4JO9m6Hew28XJrgTsg5plJBBeKuXMmrIPTUCazhIvUuJs5Hq0NA21rXzHjzrW94Z0ZTiWDg8q8Nl_9phu3vsVUYDp14k8998pLhpFzZ4a1yp9SWwie5hCm-H4TeZ1a_eDhFakMDkrdOhgxl7nm0xFy4A43HRlA2O6AwvKxZIevCdzCDt_SgslavCofXwHKbZEi5nLOt2qUcY4evRSeRlBjdjYf3eZfOh7MkVpmupOX1OPxoZyRcLEPpT5m5fJxsfBNOiqCqYxg"/>
<button class="absolute bottom-4 left-4 w-10 h-10 rounded-full bg-white/90 text-primary flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity">
<span class="material-symbols-outlined">favorite</span>
</button>
</div>
<h4 class="font-label-lg text-on-surface">بندق</h4>
<p class="text-label-md text-outline">بيغل (Beagle)</p>
<p class="font-label-lg text-secondary">1,800 ل.س</p>
</div>
<!-- Card 3 -->
<div class="group cursor-pointer">
<div class="rounded-3xl overflow-hidden aspect-[4/5] relative mb-sm">
<img class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500" data-alt="A portrait of a French Bulldog with a funny expression, wearing a stylish harness, sitting in a clean minimalist room." src="https://lh3.googleusercontent.com/aida-public/AB6AXuCQ6Ww0F6KV30DWClL02QXpzErpVHOWcGYa01U85k8ajEvPkVNmaomu9ZRiHp31Xvqh3j2Vs4463j2whVi1umW6uwz8gyaghCkSjXS6--CQJKnGhAeECAIP7cm0Cot5ktNJoeUDsDduKU3doJqWzZRgZhrw-SnT5DRSwPTwGgyWvljNd7A-JpI-Cj65Mo9AlXj2-7zO0-bBmLrXMPGDRj43hDygbL08HIlCmjiFOLOdQGCZ5iTa9RhY9uyTUKziwzIzOQcBQqqvzg"/>
<button class="absolute bottom-4 left-4 w-10 h-10 rounded-full bg-white/90 text-primary flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity">
<span class="material-symbols-outlined">favorite</span>
</button>
</div>
<h4 class="font-label-lg text-on-surface">تشارلي</h4>
<p class="text-label-md text-outline">بولدوج فرنسي</p>
<p class="font-label-lg text-secondary">3,200 ل.س</p>
</div>
<!-- Card 4 -->
<div class="group cursor-pointer">
<div class="rounded-3xl overflow-hidden aspect-[4/5] relative mb-sm">
<img class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500" data-alt="A group of fluffy Samoyed puppies playing together in the snow, soft white lighting, pristine look." src="https://lh3.googleusercontent.com/aida-public/AB6AXuDuHl_0bawLJdODosqoYn8GnxwPH5FAcWbq9BQREtLkatmCNOwdKI3kZ1i665RXN2PGfaB0Elr8Oxt5ZzLr40BNQdoiP-KWw6T7xt-BRaOpAaJvP88Doo5aRUgPnh0eUT5kM7hO7a3d7Gpom-3FCpcsb74hZ9N533m9o5zI2S81to2AYAD2UG1q8jgUQszmK4lbZVybXk_v3lKikTEm01VjBExZUOI3SdfR4SXJNrzyesKffNbjVGUFQ19VlfqgLe5a5GPATUvJGQ"/>
<button class="absolute bottom-4 left-4 w-10 h-10 rounded-full bg-white/90 text-primary flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity">
<span class="material-symbols-outlined">favorite</span>
</button>
</div>
<h4 class="font-label-lg text-on-surface">ثلج</h4>
<p class="text-label-md text-outline">سامويد (Samoyed)</p>
<p class="font-label-lg text-secondary">4,500 ل.س</p>
</div>
</div>
</section>
</main>
<!-- Footer -->
<footer class="bg-tertiary dark:bg-tertiary-container w-full mt-xl">
<div class="flex flex-col md:flex-row justify-between items-center px-md py-xl max-w-container-max mx-auto text-on-tertiary">
<div class="mb-lg md:mb-0 text-center md:text-right">
<span class="font-headline-lg text-headline-lg font-bold text-on-tertiary block mb-2">Smart Pet</span>
<p class="opacity-80 font-body-md text-body-md">© 2024 Smart Pet. نرعى كل مخلب بعناية فائقة.</p>
</div>
<div class="flex flex-wrap justify-center gap-lg">
<a class="font-body-md text-body-md text-tertiary-fixed-dim opacity-80 hover:opacity-100 hover:text-white transition-opacity" href="#">سياسة الخصوصية</a>
<a class="font-body-md text-body-md text-tertiary-fixed-dim opacity-80 hover:opacity-100 hover:text-white transition-opacity" href="#">شروط الخدمة</a>
<a class="font-body-md text-body-md text-tertiary-fixed-dim opacity-80 hover:opacity-100 hover:text-white transition-opacity" href="#">اتصل بنا</a>
<a class="font-body-md text-body-md text-tertiary-fixed-dim opacity-80 hover:opacity-100 hover:text-white transition-opacity" href="#">معلومات الشحن</a>
</div>
</div>
</footer>
<script>
        function changeQty(delta) {
            const input = document.getElementById('qty');
            let val = parseInt(input.value) + delta;
            if (val < 1) val = 1;
            input.value = val;
        }

        // Simple thumbnail click handler
        document.querySelectorAll('.custom-scrollbar div').forEach(thumb => {
            thumb.addEventListener('click', function() {
                const mainImg = document.querySelector('.hero-zoom img');
                const thumbImg = this.querySelector('img');
                const tempSrc = mainImg.src;
                const tempAlt = mainImg.dataset.alt;
                
                mainImg.src = thumbImg.src;
                mainImg.dataset.alt = thumbImg.dataset.alt;
                
                // Swap borders
                document.querySelectorAll('.custom-scrollbar div').forEach(t => t.classList.remove('border-primary'));
                this.classList.add('border-primary');
            });
        });
    </script>
@endsection
