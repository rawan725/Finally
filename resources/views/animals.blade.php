@extends('layouts.app')

@section('content')
<main>
<!-- Hero Section -->
<section class="relative h-[600px] overflow-hidden group">

    <div class="absolute inset-0 z-0">

        <img
            alt="Golden Retriever and Kitten"
            class="w-full h-full object-cover scale-100 group-hover:scale-110 transition-transform duration-700 ease-out"
            src="{{ asset('images/animals/animals-hero.jpg') }}"
        />

        <div class="absolute inset-0 bg-gradient-to-l from-primary/60 to-transparent"></div>
        <div class="absolute inset-0 hero-gradient"></div>

    </div>

    <div class="relative z-10 h-full max-w-container-max mx-auto px-lg flex flex-col justify-center items-start text-right">

        <span class="bg-secondary-container text-on-secondary-container px-sm py-xs rounded-full font-label-lg text-label-lg mb-sm">
            نحن نهتم بأليفك
        </span>

        <h1 class="font-display-lg text-display-lg text-primary mb-md max-w-2xl leading-tight">
            اكتشف رفيقك المثالي
        </h1>

        <p class="font-body-lg text-body-lg text-on-surface-variant mb-lg max-w-xl">
            نوفر لك أفضل السلالات بصحة ممتازة ورعاية فائقة من متخصصين معتمدين لضمان سعادة أليفك الجديد.
        </p>

        <div class="flex gap-md">

            <button class="bg-primary text-on-primary px-lg py-md rounded-full font-label-lg text-label-lg shadow-lg hover:shadow-xl transition-all hover:-translate-y-1 active:scale-95">
                تصفح الحيوانات
            </button>

            <button class="border-2 border-primary text-primary px-lg py-md rounded-full font-label-lg text-label-lg hover:bg-primary/5 transition-all active:scale-95">
                اعرف المزيد
            </button>

        </div>

    </div>

</section>
<!-- Search & Filter Section -->
<section id="animal-filters" class="max-w-5xl mx-auto px-6 py-10">

    <div class="glass-card rounded-[32px] p-6 shadow-lg">

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">

            <div>
                <label class="block mb-2 text-primary font-bold">البحث السريع</label>
                <div class="relative">
                    <span class="material-symbols-outlined absolute right-4 top-1/2 -translate-y-1/2 text-outline">
                        search
                    </span>
                    <input
                        type="text"
                        placeholder="ما الذي تبحث عنه اليوم؟"
                        class="w-full pr-12 py-4 rounded-2xl border border-outline-variant bg-white focus:ring-2 focus:ring-secondary-container"
                    >
                </div>
            </div>

            <div>
                <label class="block mb-2 text-primary font-bold">الفصيلة</label>
                <select class="w-full py-4 px-5 rounded-2xl border border-outline-variant bg-white focus:ring-2 focus:ring-secondary-container">
                    <option>جميع الفصائل</option>
                    <option>قطط</option>
                    <option>كلاب</option>
                    <option>طيور</option>
                    <option>أسماك</option>
                    <option>أرانب</option>
                </select>
            </div>

        </div>

        <div class="flex flex-wrap justify-center gap-3 pt-4 border-t border-outline-variant/40">

            <a href="{{ route('animals') }}#animal-filters"
               class="px-6 py-3 rounded-full font-bold transition-all {{ $type == 'all' ? 'bg-primary text-white' : 'bg-secondary-container text-primary hover:bg-primary hover:text-white' }}">
                الكل
            </a>

            <a href="{{ route('animals.category', ['type' => 'cats']) }}#animal-filters"
               class="px-6 py-3 rounded-full font-bold transition-all {{ $type == 'cats' ? 'bg-primary text-white' : 'bg-secondary-container text-primary hover:bg-primary hover:text-white' }}">
                قطط
            </a>

            <a href="{{ route('animals.category', ['type' => 'dogs']) }}#animal-filters"
               class="px-6 py-3 rounded-full font-bold transition-all {{ $type == 'dogs' ? 'bg-primary text-white' : 'bg-secondary-container text-primary hover:bg-primary hover:text-white' }}">
                كلاب
            </a>

            <a href="{{ route('animals.category', ['type' => 'birds']) }}#animal-filters"
               class="px-6 py-3 rounded-full font-bold transition-all {{ $type == 'birds' ? 'bg-primary text-white' : 'bg-secondary-container text-primary hover:bg-primary hover:text-white' }}">
                طيور
            </a>

            <a href="{{ route('animals.category', ['type' => 'fish']) }}#animal-filters"
               class="px-6 py-3 rounded-full font-bold transition-all {{ $type == 'fish' ? 'bg-primary text-white' : 'bg-secondary-container text-primary hover:bg-primary hover:text-white' }}">
                أسماك
            </a>

            <a href="{{ route('animals.category', ['type' => 'rabbits']) }}#animal-filters"
               class="px-6 py-3 rounded-full font-bold transition-all {{ $type == 'rabbits' ? 'bg-primary text-white' : 'bg-secondary-container text-primary hover:bg-primary hover:text-white' }}">
                أرانب
            </a>

        </div>

    </div>

</section>
<!-- Animal Grid -->
<section class="max-w-container-max mx-auto px-lg py-xl">

    <div class="flex justify-between items-end mb-xl">
        <div>
            <h2 class="font-headline-lg text-headline-lg text-primary mb-xs">
                أحدث الإضافات
            </h2>
            <p class="font-body-md text-body-md text-on-surface-variant">
                اختر صديقك الجديد من مجموعة مختارة بعناية
            </p>
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-lg">

        @forelse($animals as $animal)

            <div class="group bg-white rounded-[24px] overflow-hidden shadow-[0px_4px_20px_rgba(27,67,50,0.04)] border border-outline-variant/30 hover:shadow-[0px_10px_30px_rgba(27,67,50,0.08)] transition-all duration-500 hover:-translate-y-2">

                <div class="relative h-64 overflow-hidden">

                    @if($animal->image)
                        <img
                            class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110"
                            src="{{ asset('images/animals/' . $animal->image) }}"
                            alt="{{ $animal->name }}"
                        >
                    @else
                        <div class="w-full h-full bg-secondary-container/40 flex items-center justify-center text-primary font-bold">
                            لا توجد صورة
                        </div>
                    @endif

                    <div class="absolute top-md right-md bg-white/90 backdrop-blur-md px-sm py-xs rounded-full shadow-sm">
                        <span class="status-badge font-label-md text-label-md text-secondary">
                            {{ $animal->available ? 'متوفر' : 'غير متوفر' }}
                        </span>
                    </div>

                </div>

                <div class="p-md">

                    <div class="flex justify-between items-start mb-sm">
                        <div>
                            <h3 class="font-headline-md text-headline-md text-primary">
                                {{ $animal->name }}
                            </h3>

                            <p class="font-label-md text-label-md text-outline">
                                {{ $animal->breed ?? $animal->type }} •
                                {{ $animal->age ?? 'غير محدد' }}
                            </p>
                        </div>

                        <p class="font-headline-md text-headline-md text-secondary">
                            {{ number_format($animal->price) }}
                            <span class="text-label-md">ل.س</span>
                        </p>
                    </div>

                    <div class="flex gap-md mb-md border-t border-outline-variant/20 pt-sm">
                        <div class="flex items-center gap-xs text-on-surface-variant">
                            <span class="material-symbols-outlined text-[18px]">vaccines</span>
                            <span class="text-label-md">مطعم</span>
                        </div>

                        <div class="flex items-center gap-xs text-on-surface-variant">
                            <span class="material-symbols-outlined text-[18px]">verified</span>
                            <span class="text-label-md">موثق</span>
                        </div>
                    </div>

                    <a href="{{ route('animals.show', $animal->id) }}"
   class="block text-center w-full py-sm rounded-full border-2 border-primary text-primary font-label-lg text-label-lg hover:bg-primary hover:text-on-primary transition-all active:scale-95">
    عرض التفاصيل
</a>
                </div>

            </div>

        @empty

            <div class="col-span-full text-center py-20">
                <p class="text-on-surface-variant text-lg">
                    لا توجد حيوانات حالياً.
                </p>
            </div>

        @endforelse

    </div>

    <div class="mt-xl text-center">
        <button class="px-xl py-md rounded-full bg-surface-container text-primary font-label-lg text-label-lg hover:bg-primary-container/10 transition-all">
            تحميل المزيد من النتائج
        </button>
    </div>

</section>
<!-- Bento Grid Feature Section -->
<section class="max-w-container-max mx-auto px-lg py-xl">
<div class="grid grid-cols-1 md:grid-cols-12 gap-md h-auto md:h-[600px]">
<div class="md:col-span-8 glass-card rounded-[32px] p-xl flex flex-col justify-end relative overflow-hidden group">
<img class="absolute inset-0 w-full h-full object-cover z-0 group-hover:scale-105 transition-transform duration-1000" data-alt="A young family with children interacting joyfully with a new golden retriever puppy in a bright, modern, plant-filled living room. The style is warm and welcoming, with large windows letting in soft daylight. The environment feels like a premium lifestyle home where pets are valued family members, following a modern minimalist aesthetic." src="https://lh3.googleusercontent.com/aida-public/AB6AXuAaWBpktgXHV0PofI-Dg64GA-cgPJSvS4TY3Ek3Qy0TMBIkuN5l-PKcltiUaUaEVMIxDKdFpsnKC01xupF13V60tZXZxz16Q0idYCnvtLxKR7kfgH2IbX7qK67BMaNEzfFKeyUoZS9s_KUmhiO__IO5nHjfmfcFVRNQdfj85hok1uW0vezSXV771PkaRfGfENFwt3c1F-20Vgoh40zdTy4tqKc8UL8ckT76ODYYeKCqW2bFl0T8g9uSY2hEx9AJNgKp_fAfwhfUdA"/>
<div class="absolute inset-0 bg-gradient-to-t from-primary/80 to-transparent z-10"></div>
<div class="relative z-20">
<h3 class="font-display-md text-display-md text-white mb-sm">دليل العناية الشامل</h3>
<p class="font-body-lg text-body-lg text-white/80 max-w-md mb-lg">نحن لا نبيع فقط الحيوانات، بل نوفر لك كل ما تحتاجه لتبدأ رحلتك الجديدة مع رفيقك بأفضل طريقة ممكنة.</p>
<button class="bg-white text-primary px-lg py-sm rounded-full font-label-md text-label-md hover:bg-secondary-container transition-all">اقرأ الدليل</button>
</div>
</div>
<div class="md:col-span-4 flex flex-col gap-md">
<div class="flex-1 glass-card rounded-[32px] p-lg bg-primary-container text-on-primary-container flex flex-col justify-center text-center items-center">
<span class="material-symbols-outlined text-[48px] mb-sm">medical_services</span>
<h4 class="font-headline-md text-headline-md mb-xs">فحص طبي شامل</h4>
<p class="font-body-md text-body-md opacity-80">جميع الحيوانات تخضع لفحص دوري</p>
</div>
<div class="flex-1 glass-card rounded-[32px] p-lg border-2 border-secondary/20 flex flex-col justify-center text-center items-center">
<span class="material-symbols-outlined text-[48px] mb-sm text-secondary">workspace_premium</span>
<h4 class="font-headline-md text-headline-md text-primary mb-xs">شهادة توثيق</h4>
<p class="font-body-md text-body-md text-on-surface-variant">سلالات نقية وموثقة عالمياً</p>
</div>
</div>
</div>
</section>
</main>
<!-- Footer -->
<footer class="bg-surface-container-low dark:bg-surface-container-lowest w-full rounded-t-xl border-t border-outline-variant">
<div class="grid grid-cols-1 md:grid-cols-4 gap-lg px-lg py-xl max-w-container-max mx-auto">
<div class="flex flex-col gap-md">
<a class="font-headline-md text-headline-md font-bold text-primary" href="#">Smart Pet</a>
<p class="font-body-md text-body-md text-on-surface-variant">© 2024 Smart Pet. Nurturing your pets with expert care.</p>
<div class="flex gap-sm">
<button class="w-10 h-10 rounded-full bg-white flex items-center justify-center hover:bg-primary-container/10 transition-all"><span class="material-symbols-outlined">public</span></button>
<button class="w-10 h-10 rounded-full bg-white flex items-center justify-center hover:bg-primary-container/10 transition-all"><span class="material-symbols-outlined">alternate_email</span></button>
<button class="w-10 h-10 rounded-full bg-white flex items-center justify-center hover:bg-primary-container/10 transition-all"><span class="material-symbols-outlined">share</span></button>
</div>
</div>
<div>
<h4 class="font-label-lg text-label-lg text-primary font-semibold mb-md">روابط سريعة</h4>
<ul class="flex flex-col gap-sm">
<li><a class="font-body-md text-body-md text-on-surface-variant hover:text-secondary transition-colors" href="#">Privacy Policy</a></li>
<li><a class="font-body-md text-body-md text-on-surface-variant hover:text-secondary transition-colors" href="#">Terms of Service</a></li>
<li><a class="font-body-md text-body-md text-on-surface-variant hover:text-secondary transition-colors" href="#">Shipping Info</a></li>
</ul>
</div>
<div>
<h4 class="font-label-lg text-label-lg text-primary font-semibold mb-md">الدعم</h4>
<ul class="flex flex-col gap-sm">
<li><a class="font-body-md text-body-md text-on-surface-variant hover:text-secondary transition-colors" href="#">Contact Us</a></li>
<li><a class="font-body-md text-body-md text-on-surface-variant hover:text-secondary transition-colors" href="#">Store Locator</a></li>
<li><a class="font-body-md text-body-md text-on-surface-variant hover:text-secondary transition-colors" href="#">FAQ</a></li>
</ul>
</div>
<div>
<h4 class="font-label-lg text-label-lg text-primary font-semibold mb-md">النشرة البريدية</h4>
<p class="font-body-md text-body-md text-on-surface-variant mb-md">اشترك لتصلك أحدث العروض والحيوانات الجديدة.</p>
<div class="flex gap-xs">
<input class="flex-1 bg-white border border-outline-variant rounded-xl px-md py-xs text-body-md outline-none focus:ring-1 focus:ring-primary" placeholder="بريدك الإلكتروني" type="email"/>
<button class="bg-primary text-on-primary p-xs rounded-xl hover:opacity-90 transition-all">
<span class="material-symbols-outlined">send</span>
</button>
</div>
</div>
</div>
</footer>
<script>
        // Simple Interaction logic
        document.querySelectorAll('.filter-btn').forEach(btn => {
            btn.addEventListener('click', () => {
                document.querySelectorAll('.filter-btn').forEach(b => b.classList.remove('bg-primary', 'text-on-primary'));
                btn.classList.add('bg-primary', 'text-on-primary');
            });
        });

        // Hover animation logic is handled by Tailwind classes (group-hover, transition, etc.)
    </script>

@endsection