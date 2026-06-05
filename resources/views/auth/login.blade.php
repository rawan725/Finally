@extends('layouts.app')

@section('content')

<main class="flex-grow flex items-center justify-center p-6 bg-[radial-gradient(circle_at_top_right,_#e0eee0_0%,_#f0f4f2_100%)]">
<div class="max-w-6xl w-full grid grid-cols-1 lg:grid-cols-12 glass-effect rounded-[40px] overflow-hidden shadow-[0px_32px_64px_-16px_rgba(27,67,50,0.1)]">
<!-- Content Section -->
<div class="lg:col-span-7 p-8 md:p-14 lg:p-20 flex flex-col justify-center">
<div class="mb-12 text-right">
<h2 class="font-display-md text-primary mb-3">أهلاً بك مرة أخرى</h2>
<p class="font-body-md text-on-surface-variant/80">أدخل بياناتك لتتمكن من الوصول لخدماتنا المميزة</p>
</div>
<form method="POST" action="{{ route('login') }}" class="space-y-6">
    @csrf

    <!-- Email -->
    <div class="space-y-2.5 text-right">

        <label class="block font-label-lg text-primary/80 mr-2">
            البريد الإلكتروني
        </label>

        <div class="relative group">

            <span class="material-symbols-outlined absolute left-5 top-1/2 -translate-y-1/2 text-outline group-focus-within:text-secondary transition-colors">
                mail
            </span>

            <input
                class="w-full px-6 py-4 rounded-2xl border-none bg-white/50 focus:bg-white focus:ring-2 focus:ring-secondary/20 shadow-sm outline-none transition-all text-left placeholder:text-outline-variant"
                placeholder="example@domain.com"
                type="email"
                name="email"
                value="{{ old('email') }}"
                required
                autofocus
            />

        </div>

        @error('email')
            <p class="text-red-600 text-sm">
                {{ $message }}
            </p>
        @enderror

    </div>

    <!-- Password -->
    <div class="space-y-2.5 text-right">

        <div class="flex justify-between items-center px-2">

            @if (Route::has('password.request'))
                <a
                    class="text-secondary font-label-md hover:text-primary transition-colors"
                    href="{{ route('password.request') }}"
                >
                    نسيت كلمة المرور؟
                </a>
            @endif

            <label class="font-label-lg text-primary/80">
                كلمة المرور
            </label>

        </div>

        <div class="relative group">

            <span class="material-symbols-outlined absolute left-5 top-1/2 -translate-y-1/2 text-outline cursor-pointer hover:text-secondary group-focus-within:text-secondary transition-colors">
                visibility
            </span>

            <input
                class="w-full px-6 py-4 rounded-2xl border-none bg-white/50 focus:bg-white focus:ring-2 focus:ring-secondary/20 shadow-sm outline-none transition-all text-left placeholder:text-outline-variant"
                placeholder="••••••••"
                type="password"
                name="password"
                required
            />

        </div>

        @error('password')
            <p class="text-red-600 text-sm">
                {{ $message }}
            </p>
        @enderror

    </div>

    <!-- Remember -->
    <div class="flex items-center justify-end gap-3 px-2">

        <span class="font-body-md text-on-surface-variant">
            تذكرني على هذا الجهاز
        </span>

        <input
            class="w-5 h-5 rounded-lg border-emerald-200 text-secondary focus:ring-secondary/20 transition-all"
            type="checkbox"
            name="remember"
        />

    </div>

    <!-- Submit -->
    <button
        class="w-full py-5 bg-primary text-white rounded-2xl font-headline-md shadow-xl shadow-primary/20 hover:shadow-primary/30 hover:-translate-y-0.5 active:scale-95 transition-all flex items-center justify-center gap-3 group"
        type="submit"
    >

        <span>
            تسجيل الدخول
        </span>

        <span class="material-symbols-outlined group-hover:translate-x-1 transition-transform">
            login
        </span>

    </button>

</form>

<div class="mt-12 relative">
<div class="absolute inset-0 flex items-center">
<div class="w-full border-t border-emerald-900/10"></div>
</div>
<div class="relative flex justify-center text-sm">
<span class="px-4 bg-transparent text-outline font-label-md">أو واصل عبر</span>
</div>
</div>
<div class="mt-10 grid grid-cols-1 sm:grid-cols-2 gap-4">
<button class="flex items-center justify-center gap-3 py-4 bg-white hover:bg-emerald-50 rounded-2xl border border-emerald-900/5 transition-all duration-300 font-label-lg text-primary shadow-sm group">
<svg class="w-5 h-5" viewbox="0 0 24 24"><path d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z" fill="#4285F4"></path><path d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z" fill="#34A853"></path><path d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l3.66-2.84z" fill="#FBBC05"></path><path d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z" fill="#EA4335"></path></svg>
<span>Google</span>
</button>
<button class="flex items-center justify-center gap-3 py-4 bg-white hover:bg-emerald-50 rounded-2xl border border-emerald-900/5 transition-all duration-300 font-label-lg text-primary shadow-sm group">
<svg class="w-5 h-5" fill="currentColor" viewbox="0 0 24 24"><path d="M17.05 20.28c-.98.95-2.05 1.78-3.2 1.78-1.15 0-1.55-.73-2.85-.73-1.3 0-1.75.71-2.85.73-1.13.02-2.35-.95-3.32-1.85C2.85 18.28 1 15.14 1 12.18c0-3.12 2.03-4.77 4-4.77 1.07 0 1.93.44 2.73.44.75 0 1.57-.44 2.77-.44 1.1 0 2.1.37 2.88 1.1-.38.4-.73.88-1.05 1.4-.7.42-1.37.93-1.98 1.54-1.33 1.34-2.12 3.12-2.12 5.03 0 1.91.79 3.69 2.12 5.03.6.6 1.27 1.11 1.97 1.53.32.53.67 1.02 1.05 1.45.1.1.2.2.3.29zM12 6.5c0-1.93 1.57-3.5 3.5-3.5.08 0 .15 0 .23.01C15.54 1.3 14.07 0 12.3 0 10.3 0 8.65 1.65 8.65 3.65c0 .15.01.3.03.44-.02 0-.03 0-.05 0-1.93 0-3.5 1.57-3.5 3.5 0 .08 0 .15.01.23C5.33 7.6 6.8 8.9 8.6 8.9c2 0 3.65-1.65 3.65-3.65 0-.15-.01-.3-.03-.44.11-.08.22-.18.33-.28.17.15.34.3.52.43z"></path></svg>
<span>Apple</span>
</button>
</div>
<p class="mt-12 text-center font-body-md text-on-surface-variant">
            ليس لديك حساب؟ 
            <a class="text-secondary font-bold hover:text-primary transition-colors border-b-2 border-secondary/20 hover:border-secondary pb-0.5" href="#">انضم إلينا الآن</a>
</p>
</div>
<!-- Image Section -->
<div class="lg:col-span-5 relative hidden lg:block overflow-hidden">
<div class="absolute inset-0 bg-gradient-to-t from-primary/80 via-primary/20 to-transparent z-10"></div>
<img alt="Happy pets" class="absolute inset-0 w-full h-full object-cover scale-105 hover:scale-100 transition-transform duration-1000" src="https://lh3.googleusercontent.com/aida-public/AB6AXuD-7hSMUFNzsBqnf4oDVnUH6mbZvbVjtMkANUwI9CA3rRR1VELQYBBguotRLh7llymViEc7X3zGWzEV-4-Su1tnRbx3vyOnCdNv9vrI7ulLeKNFOpfzhFqXrstUP2-tDp7vKuHZC2VSfbSTR3PxPg1bt9aVFZV8VQPsm2cf7sGW5Q_rln3yMa4Q1Ga6xRMDU4ZoPOT8q-chioBrjASWm3u3ydyldCRd09OXSa1eKef9xKyROConV09G4FPYISedAzkyzTGM-6G7Jg"/>
<div class="absolute inset-0 z-20 flex flex-col justify-end p-12 text-white">
<h1 class="font-display-lg text-display-md mb-4 leading-tight">مرحباً بك في عالم الأليفين</h1>
<p class="font-body-lg text-emerald-50/80 leading-relaxed">سجل دخولك لتتمكن من الوصول لآخر العروض وخدمات الرعاية المخصصة لحيوانك المفضل.</p>
</div>
</div>
</div>
</main>
<footer class="bg-white/40 border-t border-white/60">
<div class="flex flex-col md:flex-row-reverse justify-between items-center w-full px-8 py-12 max-w-7xl mx-auto gap-8">
<div class="text-xl font-bold text-emerald-900">متجر الأليف</div>
<div class="flex flex-wrap justify-center gap-8">
<a class="text-emerald-900/60 hover:text-emerald-900 font-medium text-sm transition-colors" href="#">من نحن</a>
<a class="text-emerald-900/60 hover:text-emerald-900 font-medium text-sm transition-colors" href="#">سياسة الخصوصية</a>
<a class="text-emerald-900/60 hover:text-emerald-900 font-medium text-sm transition-colors" href="#">اتصل بنا</a>
<a class="text-emerald-900/60 hover:text-emerald-900 font-medium text-sm transition-colors" href="#">الشحن والتوصيل</a>
</div>
<div class="text-emerald-900/40 text-sm leading-relaxed">
                © ٢٠٢٤ متجر الأليف. جميع الحقوق محفوظة.
            </div>
</div>
</footer>
@endsection
