@extends('layouts.app')

@section('content')
<!-- Hero Section -->
<section class="relative h-[400px] flex items-center overflow-hidden">
<div class="absolute inset-0 z-0">
<img alt="Pet Supplies Hero" class="w-full h-full object-cover" data-alt="Modern pet boutique interior with clean wooden shelves, aesthetic toys, and natural lighting, vibrant green plants in background" src="https://lh3.googleusercontent.com/aida-public/AB6AXuB1pf64gvk85MHqQ__EpEP_SkxyRICWetxCaREJW__lCKl3_uzf1HLM-aA8622HvZUerQyT1bLRaNXi7xmF9T4lW3bOiyBYjZoFXw74tynXVmGGvPPCHmVSgjZ9hSj02ze4miAkt3ItZcBOJHpsKM3C27eE4B9g3bL30v3x9WKvh1MILqGONrYgKQZDeV3BEtXlrbP9GJqRmYlXRYC3H-s4gixwHC3-epCVdiQ0YHZatCgv5mIIXIQnLFgJic9eZ-SIqiqcE1WJAw"/>
<div class="absolute inset-0 bg-gradient-to-l from-primary/80 to-transparent"></div>
</div>
<div class="container mx-auto px-6 relative z-10 text-right">
<h1 class="font-display-lg text-display-lg text-white mb-4">عالم متكامل لرفاهية أليفك</h1>
<p class="font-body-lg text-body-lg text-white/90 max-w-xl ml-auto">نختار بعناية أفضل المنتجات العالمية لضمان صحة وسعادة حيوانك الأليف، من أجود أنواع الطعام إلى أرقى الإكسسوارات.</p>
</div>
</section>
<!-- Category Navigation -->
<section id="supply-filters" class="py-10 bg-surface">
    <div class="container mx-auto px-6">

        <div class="flex flex-wrap justify-center items-center gap-4">

            <a href="{{ route('supplies') }}#supply-filters"
               class="w-32 h-32 group bg-white p-5 rounded-[24px] shadow-sm hover:shadow-lg transition-all text-center flex flex-col items-center justify-center gap-3 border border-emerald-50">
                <div class="w-14 h-14 rounded-full bg-secondary-container/30 flex items-center justify-center text-primary">
                    <span class="material-symbols-outlined text-3xl">apps</span>
                </div>
                <span class="font-headline-md text-primary">الكل</span>
            </a>

            <a href="{{ route('supplies.category', ['category' => 'homes']) }}#supply-filters"
               class="w-32 h-32 group bg-white p-5 rounded-[24px] shadow-sm hover:shadow-lg transition-all text-center flex flex-col items-center justify-center gap-3 border border-emerald-50">
                <div class="w-14 h-14 rounded-full bg-secondary-container/30 flex items-center justify-center text-primary">
                    <span class="material-symbols-outlined text-3xl">home</span>
                </div>
                <span class="font-headline-md text-primary">مساكن</span>
            </a>

            <a href="{{ route('supplies.category', ['category' => 'toys']) }}#supply-filters"
               class="w-32 h-32 group bg-white p-5 rounded-[24px] shadow-sm hover:shadow-lg transition-all text-center flex flex-col items-center justify-center gap-3 border border-emerald-50">
                <div class="w-14 h-14 rounded-full bg-secondary-container/30 flex items-center justify-center text-primary">
                    <span class="material-symbols-outlined text-3xl">toys</span>
                </div>
                <span class="font-headline-md text-primary">ألعاب</span>
            </a>

            <a href="{{ route('supplies.category', ['category' => 'medicine']) }}#supply-filters"
               class="w-32 h-32 group bg-white p-5 rounded-[24px] shadow-sm hover:shadow-lg transition-all text-center flex flex-col items-center justify-center gap-3 border border-emerald-50">
                <div class="w-14 h-14 rounded-full bg-secondary-container/30 flex items-center justify-center text-primary">
                    <span class="material-symbols-outlined text-3xl">medical_services</span>
                </div>
                <span class="font-headline-md text-primary">دواء</span>
            </a>

            <a href="{{ route('supplies.category', ['category' => 'food']) }}#supply-filters"
               class="w-32 h-32 group bg-white p-5 rounded-[24px] shadow-sm hover:shadow-lg transition-all text-center flex flex-col items-center justify-center gap-3 border border-emerald-50">
                <div class="w-14 h-14 rounded-full bg-secondary-container/30 flex items-center justify-center text-primary">
                    <span class="material-symbols-outlined text-3xl">restaurant</span>
                </div>
                <span class="font-headline-md text-primary">طعام</span>
            </a>

            <a href="{{ route('supplies.category', ['category' => 'accessories']) }}#supply-filters"
               class="w-32 h-32 group bg-white p-5 rounded-[24px] shadow-sm hover:shadow-lg transition-all text-center flex flex-col items-center justify-center gap-3 border border-emerald-50">
                <div class="w-14 h-14 rounded-full bg-secondary-container/30 flex items-center justify-center text-primary">
                    <span class="material-symbols-outlined text-3xl">dresser</span>
                </div>
                <span class="font-headline-md text-primary">اكسسوارات</span>
            </a>

        </div>

    </div>
</section>
<!-- Main Content: Product Grid -->
<section class="py-16 container mx-auto px-6">

    <div class="flex justify-between items-end mb-10">
        <div>
            <h2 class="font-headline-lg text-display-md text-primary">وصل حديثاً</h2>
            <p class="font-body-md text-on-surface-variant">
                اكتشف أحدث المنتجات لتدليل حيوانك الأليف
            </p>
        </div>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">

        @forelse($supplies as $supply)

            <div class="group bg-white rounded-[24px] p-4 shadow-[0px_4px_20px_rgba(27,67,50,0.04)] border border-emerald-50/50 hover:shadow-[0px_10px_30px_rgba(27,67,50,0.08)] transition-all">

                <div class="relative rounded-[20px] overflow-hidden aspect-square mb-4 bg-emerald-50">
                    @if($supply->image)
                        <img
                            alt="{{ $supply->name }}"
                            class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"
                            src="{{ asset('images/supplies/' . $supply->image) }}"
                        >
                    @else
                        <div class="w-full h-full flex items-center justify-center text-primary font-bold">
                            لا توجد صورة
                        </div>
                    @endif

                    <span class="absolute top-3 right-3 bg-secondary-container text-on-secondary-container px-3 py-1 rounded-full font-label-md">
                        {{ $supply->category }}
                    </span>
                </div>

                <h3 class="font-headline-md text-primary mb-2">
                    {{ $supply->name }}
                </h3>

                <p class="text-on-surface-variant mb-4">
                    {{ $supply->brand }}
                </p>

                <div class="pt-4 border-t border-emerald-50">

                    <div class="flex justify-between items-center mb-4">
                        <span class="font-headline-lg text-primary">
                            {{ number_format($supply->price) }} ل.س
                        </span>

                        <span class="text-sm text-on-surface-variant">
                            الكمية: {{ $supply->quantity }}
                        </span>
                    </div>

                    <div class="grid grid-cols-2 gap-3">

                        <button
                            type="button"
                            class="py-3 rounded-xl bg-primary text-white font-semibold hover:bg-secondary transition-all active:scale-95 flex items-center justify-center gap-1">
                            <span class="material-symbols-outlined text-[20px]">
                                add_shopping_cart
                            </span>
                            السلة
                        </button>

                        <a href="{{ route('supplies.show', $supply->id) }}"
                           class="py-3 rounded-xl border border-primary text-primary font-semibold text-center hover:bg-primary hover:text-white transition-all active:scale-95 flex items-center justify-center gap-1">
                            <span class="material-symbols-outlined text-[20px]">
                                visibility
                            </span>
                            التفاصيل
                        </a>

                    </div>

                </div>

            </div>

        @empty

            <div class="col-span-full text-center py-20 text-on-surface-variant">
                لا توجد مستلزمات حالياً.
            </div>

        @endforelse

    </div>

</section>
<!-- View More Button -->
<div class="flex justify-center mt-12">
<button class="px-12 py-4 border-2 border-primary text-primary rounded-full font-headline-md hover:bg-primary hover:text-white transition-all shadow-md active:scale-95">عرض المزيد من المنتجات</button>
</div>
</section>
<!-- Newsletter / Promo Section -->
<section class="container mx-auto px-6 py-16">
<div class="bg-primary-container rounded-[40px] p-12 relative overflow-hidden flex flex-col md:flex-row items-center justify-between gap-8">
<div class="relative z-10 max-w-lg text-white">
<h2 class="font-display-md text-display-md mb-4 text-on-primary-container">كن أول من يعرف!</h2>
<p class="font-body-lg text-on-primary-container mb-8">اشترك في نشرتنا الإخبارية للحصول على أحدث العروض الحصرية ونصائح الخبراء لتربية أليفك.</p>
<div class="flex flex-col sm:flex-row gap-4">
<input class="bg-white/10 border-white/20 text-white placeholder:text-white/60 rounded-full px-6 py-4 flex-grow outline-none focus:ring-2 ring-secondary-container transition-all" placeholder="بريدك الإلكتروني" type="email"/>
<button class="bg-secondary-container text-on-secondary-container px-8 py-4 rounded-full font-headline-md whitespace-nowrap hover:bg-white transition-all">اشترك الآن</button>
</div>
</div>
<div class="relative z-10 w-full md:w-1/3">
<div class="w-64 h-64 mx-auto bg-secondary-container/20 rounded-full flex items-center justify-center relative">
<span class="material-symbols-outlined text-[120px] text-secondary-container" style="font-variation-settings: 'FILL' 1;">mail</span>
</div>
</div>
<!-- Abstract decorations -->
<div class="absolute -bottom-20 -left-20 w-64 h-64 bg-secondary-container/10 rounded-full blur-3xl"></div>
<div class="absolute -top-20 -right-20 w-64 h-64 bg-secondary-container/10 rounded-full blur-3xl"></div>
</div>
</section>
</main>
<!-- Footer -->
<footer class="bg-emerald-50 dark:bg-emerald-950 border-t border-emerald-200 dark:border-emerald-800 w-full mt-auto">
<div class="flex flex-col md:flex-row-reverse justify-between items-center w-full px-8 py-12 max-w-7xl mx-auto gap-6">
<div class="text-xl font-bold text-emerald-900 dark:text-emerald-50 flex items-center gap-2">
<span class="material-symbols-outlined text-secondary" style="font-variation-settings: 'FILL' 1;">pets</span>
                متجر الأليف
            </div>
<div class="flex flex-row-reverse gap-8 font-['Plus_Jakarta_Sans'] text-sm leading-relaxed">
<a class="text-emerald-700/80 dark:text-emerald-300/80 hover:underline" href="#">من نحن</a>
<a class="text-emerald-700/80 dark:text-emerald-300/80 hover:underline" href="#">سياسة الخصوصية</a>
<a class="text-emerald-700/80 dark:text-emerald-300/80 hover:underline" href="#">اتصل بنا</a>
<a class="text-emerald-700/80 dark:text-emerald-300/80 hover:underline" href="#">الشحن</a>
</div>
<div class="text-emerald-900 dark:text-emerald-400 font-['Plus_Jakarta_Sans'] text-sm leading-relaxed">
                © ٢٠٢٤ متجر الأليف. جميع الحقوق محفوظة.
            </div>
</div>
</footer>
<!-- FAB -->
<button class="fixed bottom-8 left-8 w-14 h-14 bg-primary text-white rounded-full shadow-2xl flex items-center justify-center hover:scale-110 active:scale-95 transition-all z-40 group">
<span class="material-symbols-outlined text-2xl">support_agent</span>
<span class="absolute right-full mr-4 px-4 py-2 bg-white text-primary rounded-lg shadow-lg opacity-0 group-hover:opacity-100 transition-opacity whitespace-nowrap font-label-lg">تحدث معنا</span>
</button>
@endsection