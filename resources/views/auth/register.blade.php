@extends('layouts.app')

@section('content')

<main class="flex-grow flex flex-col md:flex-row-reverse">
<!-- Visual Section (Bento Style/Glassmorphism) -->
<section class="hidden md:flex md:w-1/2 lg:w-3/5 bg-primary-container relative overflow-hidden items-center justify-center p-xl">
<!-- Decorative Elements -->
<div class="absolute top-0 right-0 w-96 h-96 bg-secondary-container/20 rounded-full blur-3xl -mr-48 -mt-48"></div>
<div class="absolute bottom-0 left-0 w-80 h-80 bg-surface-tint/30 rounded-full blur-3xl -ml-40 -mb-40"></div>
<div class="relative z-10 w-full max-w-2xl">
<div class="grid grid-cols-2 gap-md p-md bg-white/5 backdrop-blur-xl rounded-[32px] border border-white/10 shadow-2xl">
<div class="col-span-2 relative h-64 rounded-2xl overflow-hidden group">
<img alt="Pet store hero" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110" data-alt="A happy golden retriever smiling in a sunny outdoor park setting with soft green grass and morning golden light" src="https://lh3.googleusercontent.com/aida-public/AB6AXuAHkurFSeOKK5VBCD5I5VezYZ3YZg1yJ5qCkvd3BNtp7ptM0to96csnIIWhT6G-xem6pXMKHXm7meqgX0S_cRFfV4yRnaWNOmp-Houe_Bz2E6ccd26yMFKg1nWdKk5xw1rLPkLBfJX7DGgBcQCvaQ2qeCgeQZAFdDLywdRbHRX2dXfUh9C5wIj5ua-xPg0OtN7EDkoR73BN7oe_aek0CQjHG-hSxTDTWhLsDTjzU90--FaYd8rrHiJPxmX2n_1tI3hrb_kQQj15MA"/>
<div class="absolute inset-0 bg-gradient-to-t from-primary-container/80 to-transparent flex items-end p-md">
<p class="text-on-primary font-headline-lg">انضم إلى مجتمع محبي الأليفة</p>
</div>
</div>
<div class="bg-white/10 p-md rounded-2xl border border-white/10">
<span class="material-symbols-outlined text-secondary-fixed text-4xl mb-sm" data-icon="pets">pets</span>
<h3 class="text-on-primary font-headline-md mb-xs">رعاية فائقة</h3>
<p class="text-on-primary-container font-body-md">نقدم أفضل المنتجات المختارة بعناية لأليفك.</p>
</div>
<div class="bg-white/10 p-md rounded-2xl border border-white/10">
<span class="material-symbols-outlined text-secondary-fixed text-4xl mb-sm" data-icon="volunteer_activism">volunteer_activism</span>
<h3 class="text-on-primary font-headline-md mb-xs">مجتمع حيوي</h3>
<p class="text-on-primary-container font-body-md">تواصل مع أطباء وخبراء في تربية الحيوانات.</p>
</div>
</div>
</div>
</section>
<!-- Form Section -->
<section class="w-full md:w-1/2 lg:w-2/5 flex items-center justify-center p-6 sm:p-12 bg-surface">
<div class="w-full max-w-md">
<div class="mb-lg text-center md:text-right">
<h2 class="text-on-surface font-headline-lg mb-xs">إنشاء حساب جديد</h2>
<p class="text-on-surface-variant font-body-md">ابدأ رحلتك معنا اليوم ووفر لأليفك الأفضل.</p>
</div>
<form method="POST" action="{{ route('register') }}" class="space-y-md">
    @csrf
<!-- Name Input -->
<div class="space-y-xs">
<label class="block text-on-surface font-label-lg mr-base" for="name">الاسم الكامل</label>
<div class="relative">
<span class="absolute right-4 top-1/2 -translate-y-1/2 material-symbols-outlined text-outline" data-icon="person">person</span>
<input class="w-full pr-12 pl-4 py-3.5 bg-white border border-outline-variant rounded-[16px] text-on-surface font-body-md focus:ring-2 focus:ring-secondary-container focus:border-secondary outline-none transition-all placeholder:text-outline-variant shadow-[0px_4px_20px_rgba(27,67,50,0.04)]" id="name" name="name" placeholder="أدخل اسمك الثلاثي"   name="name" />
</div>
</div>
<!-- Email Input -->
<div class="space-y-xs">
<label class="block text-on-surface font-label-lg mr-base" for="email">البريد الإلكتروني</label>
<div class="relative">
<span class="absolute right-4 top-1/2 -translate-y-1/2 material-symbols-outlined text-outline" data-icon="mail">mail</span>
<input class="w-full pr-12 pl-4 py-3.5 bg-white border border-outline-variant rounded-[16px] text-on-surface font-body-md focus:ring-2 focus:ring-secondary-container focus:border-secondary outline-none transition-all placeholder:text-outline-variant shadow-[0px_4px_20px_rgba(27,67,50,0.04)] text-right" dir="ltr" id="email" name="email" placeholder="example@domain.com" type="email" required/>
@error('email')
<p class="text-red-500 text-sm mt-1">{{ $message }}</p>
@enderror
</div>
</div>
<!-- Password Input -->
<div class="space-y-2">

    <label class="block text-on-surface font-semibold mr-1" for="password">
        كلمة المرور
    </label>

    <div class="relative">

        <span class="absolute right-4 top-1/2 -translate-y-1/2 material-symbols-outlined text-outline">
            lock
        </span>

        <input
            class="w-full pr-12 pl-12 py-4 bg-white border border-outline-variant rounded-2xl text-on-surface outline-none focus:ring-2 focus:ring-secondary-container"
            id="password"
            name="password"
            placeholder="••••••••"
            type="password"
            required
        >

        <button class="absolute left-4 top-1/2 -translate-y-1/2 text-outline" type="button">
            <span class="material-symbols-outlined">visibility</span>
        </button>

    </div>

    <p class="text-sm text-on-surface-variant">
        يجب أن تحتوي على 8 أحرف على الأقل.
    </p>

</div>

<!-- Confirm Password -->
<div class="space-y-2">

    <label class="block text-on-surface font-semibold mr-1" for="password_confirmation">
        تأكيد كلمة المرور
    </label>

    <div class="relative">

        <span class="absolute right-4 top-1/2 -translate-y-1/2 material-symbols-outlined text-outline">
            lock
        </span>

        <input
            class="w-full pr-12 pl-12 py-4 bg-white border border-outline-variant rounded-2xl text-on-surface outline-none focus:ring-2 focus:ring-secondary-container"
            id="password_confirmation"
            name="password_confirmation"
            placeholder="••••••••"
            type="password"
            required
        >

    </div>

</div>
<!-- Terms Checkbox -->
<div class="flex items-start gap-3 py-xs">
<div class="flex items-center h-5">
<input class="w-5 h-5 text-secondary border-outline-variant rounded focus:ring-secondary-container" id="terms" name="terms" type="checkbox"/>
</div>
<label class="text-on-surface-variant font-label-lg" for="terms">
                            أوافق على <a class="text-secondary font-bold hover:underline" href="#">شروط الاستخدام</a> و <a class="text-secondary font-bold hover:underline" href="#">سياسة الخصوصية</a>.
                        </label>
</div>
<!-- Submit Button -->
<button class="w-full bg-primary text-on-primary py-4 rounded-2xl font-headline-md shadow-lg hover:shadow-xl hover:bg-primary/90 transition-all active:scale-[0.98] duration-150" type="submit">
                        إنشاء حساب
                    </button>
<!-- Social Login -->
<div class="relative my-lg">
<div class="absolute inset-0 flex items-center">
<span class="w-full border-t border-outline-variant"></span>
</div>
<div class="relative flex justify-center text-sm">
<span class="px-4 bg-surface text-outline font-label-md">أو التسجيل عبر</span>
</div>
</div>
<div class="grid grid-cols-1 sm:grid-cols-2 gap-sm">
<button class="flex items-center justify-center gap-3 py-3 px-4 bg-white border border-outline-variant rounded-[16px] hover:bg-surface-container-low hover:border-outline transition-all font-label-lg text-on-surface shadow-sm" type="button">
<svg height="20" viewbox="0 0 24 24" width="20" xmlns="http://www.w3.org/2000/svg">
<path d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z" fill="#4285F4"></path>
<path d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z" fill="#34A853"></path>
<path d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l3.66-2.84z" fill="#FBBC05"></path>
<path d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z" fill="#EA4335"></path>
</svg>
<span>جوجل</span>
</button>
<button class="flex items-center justify-center gap-3 py-3 px-4 bg-white border border-outline-variant rounded-[16px] hover:bg-surface-container-low hover:border-outline transition-all font-label-lg text-on-surface shadow-sm" type="button">
<svg fill="#1877F2" height="20" viewbox="0 0 24 24" width="20" xmlns="http://www.w3.org/2000/svg">
<path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.469h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"></path>
</svg>
<span>فيسبوك</span>
</button>
</div>
<!-- Footer Link -->
<p class="text-center text-on-surface-variant font-body-md mt-lg">
                        لديك حساب بالفعل؟
                        <a class="text-secondary font-bold hover:underline mr-xs" href="{{ route('login') }}">تسجيل الدخول</a>
</p>
</form>
</div>
</section>
</main>
<!-- Footer Segment (Minimal) -->
<footer class="bg-white/40 border-t border-white/60">
<div class="flex flex-col md:flex-row-reverse justify-between items-center w-full px-8 py-12 max-w-7xl mx-auto gap-8">
<div class="text-xl font-bold text-primary">متجر الأليف</div>
<div class="flex flex-wrap justify-center gap-8">
<a class="text-primary/60 hover:text-primary font-medium text-sm transition-colors" href="#">من نحن</a>
<a class="text-primary/60 hover:text-primary font-medium text-sm transition-colors" href="#">سياسة الخصوصية</a>
<a class="text-primary/60 hover:text-primary font-medium text-sm transition-colors" href="#">اتصل بنا</a>
<a class="text-primary/60 hover:text-primary font-medium text-sm transition-colors" href="#">الشحن والتوصيل</a>
</div>
<div class="text-primary/40 text-sm leading-relaxed">
                © ٢٠٢٤ متجر الأليف. جميع الحقوق محفوظة.
            </div>
</div>
</footer>
@endsection

