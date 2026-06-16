@extends('layouts.app')

@section('content')

<main class="max-w-7xl mx-auto">
<!-- Hero Section -->
<section class="relative px-6 py-16 md:py-24 overflow-hidden">
<div class="grid md:grid-cols-2 gap-12 items-center">
<div class="order-2 md:order-1 text-right space-y-6">
<span class="inline-block px-4 py-1.5 rounded-full bg-secondary-container/30 text-secondary font-label-lg text-sm border border-secondary-container">رعاية فائقة لحيوانك</span>
<h1 class="text-display-lg font-display-lg text-primary leading-tight">
                        وجهتك الأولى لرعاية <br/>
<span class="text-secondary">وتدليل حيوانك الأليف</span>
</h1>
<p class="text-body-lg text-on-surface-variant max-w-lg leading-relaxed">
                        نقدم لك مجموعة مختارة من أفضل المنتجات والخدمات الطبية لضمان سعادة وصحة رفيقك الوفي. من الألعاب الفاخرة إلى الرعاية الصحية المتقدمة.
                    </p>
<div class="flex flex-row-reverse gap-4 pt-4">
<button class="px-8 py-4 rounded-full bg-primary text-white font-headline-md flex items-center gap-2 shadow-lg hover:shadow-primary-container/20 transition-all">
<span>تسوق الآن</span>
<span class="material-symbols-outlined" data-icon="arrow_back">arrow_back</span>
</button>
<button class="px-8 py-4 rounded-full border-2 border-primary text-primary font-headline-md hover:bg-emerald-50 transition-all">
                            خدماتنا
                        </button>
</div>
</div>
<div class="order-1 md:order-2 relative">

    <div class="absolute -top-12 -left-12 w-64 h-64 bg-secondary-container/20 rounded-full blur-3xl"></div>

    <div class="relative z-10 rounded-[48px] overflow-hidden shadow-2xl rotate-2 group">

        <img
            alt="Pet Care"
            class="w-full h-[500px] object-cover scale-100 group-hover:scale-110 transition-transform duration-700 ease-out"
            src="{{ asset('images/home/hero-pet.jpg') }}"
        />

    </div>

    <div class="absolute -bottom-6 -right-6 bg-white p-4 rounded-3xl shadow-xl z-20 flex items-center gap-3 border border-emerald-50">

        <div class="bg-emerald-100 p-2 rounded-full">
            <span class="material-symbols-outlined text-secondary" data-icon="verified">
                verified
            </span>
        </div>

        <div>
<p class="text-sm font-bold text-primary">أطباء معتمدون</p>
<p class="text-xs text-on-surface-variant">رعاية طبية على مدار الساعة</p>
</div>
</div>
</div>
</div>
</section>
<!-- Categories Bento Grid -->
<section class="px-6 py-12">
<div class="grid grid-cols-1 md:grid-cols-3 gap-6">
<!-- Large Card -->
<div class="md:col-span-2 bg-emerald-900 rounded-[32px] p-8 text-white relative overflow-hidden group min-h-[280px]">

    <div class="relative z-10 max-w-xs text-right">
        <h3 class="text-headline-lg mb-4">
            قسم الكلاب المدللة
        </h3>

        <p class="text-emerald-100/80 mb-6">
            اكتشف أحدث تشكيلة من الملابس والإكسسوارات الفاخرة للكلاب.
        </p>

        <button class="px-6 py-2 rounded-full bg-white text-emerald-900 font-label-lg transition-transform group-hover:scale-105">
            استعرض المزيد
        </button>
    </div>

    <img
        alt="Dog Fashion"
        class="absolute top-0 left-0 w-1/2 h-full object-cover opacity-80 scale-100 group-hover:scale-110 transition-transform duration-700 ease-out"
        src="{{ asset('images/home/dog-fashion.jpg') }}"
    />

    <div class="absolute inset-0 bg-gradient-to-l from-emerald-900 via-emerald-900/80 to-transparent pointer-events-none"></div>

</div>

<!-- Small Card 1 -->
<div class="bg-secondary-container rounded-[32px] p-8 text-on-secondary-container relative overflow-hidden flex flex-col justify-between items-end group min-h-[220px]">

    <img
        alt="Pharmacy"
        class="absolute inset-0 w-full h-full object-cover opacity-20 scale-100 group-hover:scale-110 transition-transform duration-700 ease-out"
        src="{{ asset('images/home/pharmacy-card.jpg') }}"
    />

    <div class="relative z-10 flex flex-col items-end justify-between h-full">

        <span class="material-symbols-outlined text-4xl" data-icon="medication">
            medication
        </span>

        <div class="text-right">
            <h3 class="text-headline-md mt-4">
                الصيدلية
            </h3>

            <p class="text-sm opacity-80">
                جميع الأدوية والمكملات الغذائية متوفرة
            </p>
        </div>

    </div>

</div>
<!-- Small Card 2 -->
<div class="bg-white rounded-[32px] p-8 border border-emerald-100 shadow-sm relative overflow-hidden flex flex-col justify-between items-end group hover:border-secondary transition-all min-h-[220px]">

    <img
        alt="Healthy Pet Food"
        class="absolute inset-0 w-full h-full object-cover opacity-200 scale-100 group-hover:scale-110 transition-transform duration-700 ease-out"
        src="{{ asset('images/home/healthy-food.jpg') }}"
    />

    <div class="absolute inset-0 bg-white/65 pointer-events-none"></div>

    <div class="relative z-10 flex flex-col items-end justify-between h-full">

        <span class="material-symbols-outlined text-4xl text-secondary" data-icon="restaurant">
            restaurant
        </span>

        <div class="text-right">
            <h3 class="text-headline-md mt-4">
                تغذية صحية
            </h3>

            <p class="text-sm text-on-surface-variant">
                طعام عضوي وطبيعي 100%
            </p>
        </div>

    </div>

</div>
<!-- Contact Us Card -->
<div class="md:col-span-2 bg-gradient-to-br from-emerald-50 to-white rounded-[32px] p-10 border border-emerald-100 flex flex-col md:flex-row-reverse justify-between items-center gap-8 group">
<div class="text-right space-y-4 flex-1">
<h2 class="text-headline-lg text-primary">تواصل معنا</h2>
<p class="text-body-md text-on-surface-variant">هل لديك استفسار حول حالة أليفك أو تريد حجز موعد؟ فريق الخبراء لدينا جاهز للرد عليك في أي وقت.</p>
<div class="flex flex-row-reverse gap-4 pt-2">
<div class="flex items-center gap-2 text-primary font-label-lg">
<span class="material-symbols-outlined text-secondary" data-icon="call">call</span>
<span>800-ALALEF</span>
</div>
<div class="flex items-center gap-2 text-primary font-label-lg">
<span class="material-symbols-outlined text-secondary" data-icon="mail">mail</span>
<span>alalirawan750@gmail.com</span>
</div>
</div>
</div>
<div class="relative w-full md:w-64 bg-white rounded-2xl shadow-inner border border-emerald-50 p-4 flex flex-col gap-4 md:w-80">
    @if(session('contact_success'))
    <div class="mb-4 rounded-2xl bg-emerald-100 border border-emerald-200 text-emerald-900 px-4 py-3 text-sm font-bold text-right">
        {{ session('contact_success') }}
    </div>
@endif
<form class="flex flex-col gap-4 w-full" method="POST" action="{{ route('contact.store') }}">
    @csrf
<div class="space-y-1">
    <label class="block text-xs font-bold text-primary text-right">
        الاسم الكامل
    </label>

    <input
        name="full_name"
        class="w-full px-3 py-2 rounded-xl border border-emerald-100 focus:border-secondary focus:ring-1 focus:ring-secondary outline-none transition-all text-sm bg-white/50 text-right"
        placeholder="أدخل اسمك هنا"
        type="text"
        required
    />
</div>

<div class="space-y-1">
    <label class="block text-xs font-bold text-primary text-right">
        البريد الإلكتروني
    </label>

    <input
        name="email"
        class="w-full px-3 py-2 rounded-xl border border-emerald-100 focus:border-secondary focus:ring-1 focus:ring-secondary outline-none transition-all text-sm bg-white/50 text-left"
        placeholder="name@example.com"
        type="email"
        dir="ltr"
        required
    />
</div>

<div class="space-y-1">
    <label class="block text-xs font-bold text-primary text-right">
        رسالتك
    </label>

    <textarea
        name="message"
        class="w-full px-3 py-2 rounded-xl border border-emerald-100 focus:border-secondary focus:ring-1 focus:ring-secondary outline-none transition-all text-sm bg-white/50 text-right resize-none"
        placeholder="كيف يمكننا مساعدتك؟"
        rows="3"
        required
    ></textarea>
</div>

<button class="w-full bg-primary text-white py-3 rounded-xl font-label-lg hover:bg-primary/90 hover:shadow-lg transition-all active:scale-95 flex items-center justify-center gap-2 mt-2" type="submit">
    <span>إرسال</span>
    <span class="material-symbols-outlined text-sm" data-icon="send">send</span>
</button>
</form>
</div>
</div>
</div>
</section>
</main>
<!-- Footer Section -->
<footer class="bg-emerald-50 dark:bg-emerald-950 border-t border-emerald-200 dark:border-emerald-800 w-full mt-auto">
<div class="flex flex-col md:flex-row-reverse justify-between items-center w-full px-8 py-12 max-w-7xl mx-auto gap-6">
<div class="text-xl font-bold text-emerald-900 dark:text-emerald-50 font-display-md flex items-center gap-2">
<span class="material-symbols-outlined" data-icon="pets">pets</span>
<span>متجر الأليف</span>
</div>
<nav class="flex flex-row-reverse flex-wrap justify-center gap-8">
<a class="text-emerald-700/80 dark:text-emerald-300/80 hover:underline font-label-lg" href="#">من نحن</a>
<a class="text-emerald-700/80 dark:text-emerald-300/80 hover:underline font-label-lg" href="#">سياسة الخصوصية</a>
<a class="text-emerald-700/80 dark:text-emerald-300/80 hover:underline font-label-lg" href="#">اتصل بنا</a>
<a class="text-emerald-700/80 dark:text-emerald-300/80 hover:underline font-label-lg" href="#">الشحن</a>
</nav>
<div class="text-emerald-900 dark:text-emerald-400 font-body-md text-sm">
                © 2026 متجر الأليف. جميع الحقوق محفوظة.
            </div>
</div>
</footer>
@endsection