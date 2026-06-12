@extends('layouts.app')

@section('content')

<main class="min-h-screen bg-background px-6 py-16">

    <section class="max-w-7xl mx-auto">

        <div class="mb-10">
            <h1 class="text-4xl font-bold text-primary mb-3">
                مرحباً بك في Smart Pet 🐾
            </h1>
            <p class="text-on-surface-variant">
                من هنا يمكنك الوصول بسرعة إلى أقسام المتجر وخدمات الأطباء.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-10">

            <div class="glass-card rounded-[28px] p-6">
                <span class="material-symbols-outlined text-secondary text-4xl">pets</span>
                <h3 class="text-2xl font-bold text-primary mt-4">الحيوانات</h3>
                <p class="text-on-surface-variant mt-2">تصفح الحيوانات المتاحة.</p>
            </div>

            <div class="glass-card rounded-[28px] p-6">
                <span class="material-symbols-outlined text-secondary text-4xl">shopping_bag</span>
                <h3 class="text-2xl font-bold text-primary mt-4">المستلزمات</h3>
                <p class="text-on-surface-variant mt-2">منتجات العناية والتغذية.</p>
            </div>

            <div class="glass-card rounded-[28px] p-6">
                <span class="material-symbols-outlined text-secondary text-4xl">shopping_cart</span>
                <h3 class="text-2xl font-bold text-primary mt-4">السلة</h3>
                <p class="text-on-surface-variant mt-2">راجع مشترياتك قبل الطلب.</p>
            </div>

            <div class="glass-card rounded-[28px] p-6">
                <span class="material-symbols-outlined text-secondary text-4xl">medical_services</span>
                <h3 class="text-2xl font-bold text-primary mt-4">الأطباء</h3>
                <p class="text-on-surface-variant mt-2">احجز أو اطلب استشارة.</p>
            </div>

        </div>

        <div class="glass-card rounded-[32px] p-8">
            <h2 class="text-2xl font-bold text-primary mb-6">
                روابط سريعة
            </h2>

            <div class="grid grid-cols-1 md:grid-cols-4 gap-4">

                <a href="{{ route('animals') }}" class="py-4 rounded-2xl bg-primary text-white text-center font-bold">
                    عرض الحيوانات
                </a>

                <a href="{{ route('supplies') }}" class="py-4 rounded-2xl bg-secondary-container text-primary text-center font-bold">
                    عرض المستلزمات
                </a>

                <a href="{{ route('cart') }}" class="py-4 rounded-2xl bg-secondary-container text-primary text-center font-bold">
                    السلة
                </a>

                <a href="{{ route('doctor') }}" class="py-4 rounded-2xl bg-secondary-container text-primary text-center font-bold">
                    الأطباء
                </a>

            </div>
        </div>

    </section>

</main>

@endsection
