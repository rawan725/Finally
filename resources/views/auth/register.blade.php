@extends('layouts.app')

@section('content')

<style>
    .register-page {
        background:
            radial-gradient(circle at top right, rgba(209, 250, 229, 0.85) 0%, transparent 34%),
            radial-gradient(circle at bottom left, rgba(167, 243, 208, 0.35) 0%, transparent 30%),
            #f3f7f4;
    }

    .register-shell {
        background: rgba(255, 255, 255, 0.74);
        backdrop-filter: blur(24px);
        -webkit-backdrop-filter: blur(24px);
        border: 1px solid rgba(255, 255, 255, 0.78);
        border-radius: 40px;
        overflow: hidden;
        box-shadow: 0 32px 70px -20px rgba(27, 67, 50, 0.18);
    }

    .register-visual {
        overflow: hidden;
    }

    .visual-glass {
        background: rgba(255, 255, 255, 0.08);
        backdrop-filter: blur(18px);
        -webkit-backdrop-filter: blur(18px);
        border: 1px solid rgba(255, 255, 255, 0.16);
        border-radius: 34px;
    }

    .register-input {
        height: 56px;
        background: #ffffff;
        border: 1px solid rgba(6, 95, 70, 0.14);
        border-radius: 18px;
        color: #064e3b;
        box-shadow: 0 6px 22px rgba(27, 67, 50, 0.045);
    }

    .register-input:focus {
        border-color: rgba(6, 95, 70, 0.55);
        box-shadow: 0 0 0 4px rgba(16, 185, 129, 0.13);
        outline: none;
    }

    input:-webkit-autofill,
    input:-webkit-autofill:hover,
    input:-webkit-autofill:focus {
        -webkit-box-shadow: 0 0 0 1000px #ffffff inset !important;
        -webkit-text-fill-color: #064e3b !important;
        caret-color: #064e3b !important;
        transition: background-color 9999s ease-in-out 0s;
    }

    .register-small-card {
        min-height: 155px;
        border-radius: 26px;
        background: rgba(255, 255, 255, 0.12);
        border: 1px solid rgba(255, 255, 255, 0.16);
        transition: transform 0.3s ease, background 0.3s ease;
    }

    .register-small-card:hover {
        transform: translateY(-4px);
        background: rgba(255, 255, 255, 0.17);
    }

    @media (max-width: 768px) {
        .register-shell {
            border-radius: 30px;
        }
    }
</style>

<main class="register-page flex-grow flex items-center justify-center p-6">

    <div class="max-w-6xl w-full register-shell grid grid-cols-1 md:grid-cols-2 lg:grid-cols-12" dir="rtl">

        <!-- Form Section - Right Side -->
        <section class="w-full md:col-span-1 lg:col-span-5 flex items-center justify-center p-6 sm:p-10 lg:p-12 bg-surface">

            <div class="w-full max-w-md">

                <div class="mb-8 text-center md:text-right">

                    <h2 class="text-on-surface font-headline-lg mb-2">
                        إنشاء حساب جديد
                    </h2>

                    <p class="text-on-surface-variant font-body-md">
                        ابدأ رحلتك معنا اليوم ووفر لأليفك الأفضل.
                    </p>

                </div>

                <form method="POST" action="{{ route('register') }}" class="space-y-5">
                    @csrf

                    <!-- Name -->
                    <div class="space-y-2">

                        <label class="block text-on-surface font-label-lg mr-1" for="name">
                            الاسم الكامل
                        </label>

                        <div class="relative">

                            <span class="absolute right-4 top-1/2 -translate-y-1/2 material-symbols-outlined text-outline pointer-events-none">
                                person
                            </span>

                            <input
                                class="register-input w-full pr-12 pl-4 py-3.5 text-on-surface font-body-md transition-all placeholder:text-outline-variant"
                                id="name"
                                name="name"
                                placeholder="أدخل اسمك الثلاثي"
                                type="text"
                                value="{{ old('name') }}"
                                required
                                autocomplete="name"
                            >

                        </div>

                        @error('name')
                            <p class="text-red-500 text-sm mt-1">
                                {{ $message }}
                            </p>
                        @enderror

                    </div>

                    <!-- Email -->
                    <div class="space-y-2">

                        <label class="block text-on-surface font-label-lg mr-1" for="email">
                            البريد الإلكتروني
                        </label>

                        <div class="relative">

                            <span class="absolute left-4 top-1/2 -translate-y-1/2 material-symbols-outlined text-outline pointer-events-none">
                                mail
                            </span>

                            <input
                                class="register-input w-full pr-4 pl-12 py-3.5 text-left text-on-surface font-body-md transition-all placeholder:text-outline-variant"
                                dir="ltr"
                                id="email"
                                name="email"
                                placeholder="example@domain.com"
                                type="email"
                                value="{{ old('email') }}"
                                required
                                autocomplete="username"
                            >

                        </div>

                        @error('email')
                            <p class="text-red-500 text-sm mt-1">
                                {{ $message }}
                            </p>
                        @enderror

                    </div>

                    <!-- Password -->
                    <div class="space-y-2">

                        <label class="block text-on-surface font-label-lg mr-1" for="password">
                            كلمة المرور
                        </label>

                        <div class="relative">

                            <span class="absolute right-4 top-1/2 -translate-y-1/2 material-symbols-outlined text-outline pointer-events-none">
                                lock
                            </span>

                            <input
                                class="register-input w-full pr-12 pl-12 py-3.5 text-left text-on-surface font-body-md transition-all placeholder:text-outline-variant"
                                id="password"
                                name="password"
                                placeholder="••••••••"
                                type="password"
                                required
                                autocomplete="new-password"
                                dir="ltr"
                            >

                            <button
                                type="button"
                                class="absolute left-4 top-1/2 -translate-y-1/2 text-outline hover:text-secondary transition-colors"
                                onclick="togglePassword('password', this)"
                            >
                                <span class="material-symbols-outlined">
                                    visibility
                                </span>
                            </button>

                        </div>

                        <p class="text-sm text-on-surface-variant">
                            يجب أن تحتوي على 8 أحرف على الأقل.
                        </p>

                        @error('password')
                            <p class="text-red-500 text-sm mt-1">
                                {{ $message }}
                            </p>
                        @enderror

                    </div>

                    <!-- Confirm Password -->
                    <div class="space-y-2">

                        <label class="block text-on-surface font-label-lg mr-1" for="password_confirmation">
                            تأكيد كلمة المرور
                        </label>

                        <div class="relative">

                            <span class="absolute right-4 top-1/2 -translate-y-1/2 material-symbols-outlined text-outline pointer-events-none">
                                lock
                            </span>

                            <input
                                class="register-input w-full pr-12 pl-12 py-3.5 text-left text-on-surface font-body-md transition-all placeholder:text-outline-variant"
                                id="password_confirmation"
                                name="password_confirmation"
                                placeholder="••••••••"
                                type="password"
                                required
                                autocomplete="new-password"
                                dir="ltr"
                            >

                            <button
                                type="button"
                                class="absolute left-4 top-1/2 -translate-y-1/2 text-outline hover:text-secondary transition-colors"
                                onclick="togglePassword('password_confirmation', this)"
                            >
                                <span class="material-symbols-outlined">
                                    visibility
                                </span>
                            </button>

                        </div>

                        @error('password_confirmation')
                            <p class="text-red-500 text-sm mt-1">
                                {{ $message }}
                            </p>
                        @enderror

                    </div>

                    <!-- Terms -->
                    <div class="flex items-start gap-3 pt-1">

                        <div class="flex items-center h-6">
                            <input
                                class="w-5 h-5 text-secondary border-outline-variant rounded focus:ring-secondary-container"
                                id="terms"
                                name="terms"
                                type="checkbox"
                            >
                        </div>

                        <label class="text-on-surface-variant font-label-lg leading-relaxed" for="terms">
                            أوافق على
                            <a class="text-secondary font-bold hover:underline" href="#">
                                شروط الاستخدام
                            </a>
                            و
                            <a class="text-secondary font-bold hover:underline" href="#">
                                سياسة الخصوصية
                            </a>.
                        </label>

                    </div>

                    <!-- Submit -->
                    <button
                        class="w-full bg-primary text-on-primary py-4 rounded-2xl font-headline-md shadow-lg hover:shadow-xl hover:bg-primary/90 hover:-translate-y-0.5 transition-all active:scale-[0.98] duration-150"
                        type="submit"
                    >
                        إنشاء حساب
                    </button>

                    <!-- Social Login -->
                    <div class="relative my-8">

                        <div class="absolute inset-0 flex items-center">
                            <span class="w-full border-t border-outline-variant"></span>
                        </div>

                        <div class="relative flex justify-center text-sm">
                            <span class="px-4 bg-surface text-outline font-label-md">
                                أو التسجيل عبر
                            </span>
                        </div>

                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">

                        <button class="flex items-center justify-center gap-3 py-3.5 px-4 bg-white border border-outline-variant rounded-2xl hover:bg-surface-container-low hover:border-outline transition-all font-label-lg text-on-surface shadow-sm" type="button">
                            <svg height="20" viewBox="0 0 24 24" width="20" xmlns="http://www.w3.org/2000/svg">
                                <path d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z" fill="#4285F4"></path>
                                <path d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z" fill="#34A853"></path>
                                <path d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l3.66-2.84z" fill="#FBBC05"></path>
                                <path d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z" fill="#EA4335"></path>
                            </svg>

                            <span>
                                جوجل
                            </span>
                        </button>

                        <button class="flex items-center justify-center gap-3 py-3.5 px-4 bg-white border border-outline-variant rounded-2xl hover:bg-surface-container-low hover:border-outline transition-all font-label-lg text-on-surface shadow-sm" type="button">
                            <svg fill="#1877F2" height="20" viewBox="0 0 24 24" width="20" xmlns="http://www.w3.org/2000/svg">
                                <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.469h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"></path>
                            </svg>

                            <span>
                                فيسبوك
                            </span>
                        </button>

                    </div>

                    <!-- Footer Link -->
                    <p class="text-center text-on-surface-variant font-body-md pt-4">
                        لديك حساب بالفعل؟

                        <a class="text-secondary font-bold hover:underline mr-1" href="{{ route('login') }}">
                            تسجيل الدخول
                        </a>
                    </p>

                </form>

            </div>

        </section>

        <!-- Visual Section - Left Side -->
        <section class="hidden md:flex md:col-span-1 lg:col-span-7 bg-primary-container relative overflow-hidden items-center justify-center p-8 lg:p-12 register-visual">

            <div class="absolute top-0 right-0 w-96 h-96 bg-secondary-container/25 rounded-full blur-3xl -mr-48 -mt-48"></div>
            <div class="absolute bottom-0 left-0 w-80 h-80 bg-surface-tint/30 rounded-full blur-3xl -ml-40 -mb-40"></div>

            <div class="relative z-10 w-full max-w-2xl">

                <div class="grid grid-cols-2 gap-5 p-5 visual-glass shadow-2xl">

                    <div class="col-span-2 relative h-72 rounded-[28px] overflow-hidden group">

                        <img
                            alt="Pet store hero"
                            class="w-full h-full object-cover scale-100 group-hover:scale-110 transition-transform duration-700 ease-out"
                            src="{{ asset('images/auth/register-pets.jpg') }}"
                        >

                        <div class="absolute inset-0 bg-gradient-to-t from-primary-container/85 via-primary-container/20 to-transparent flex items-end p-6">

                            <p class="text-on-primary font-headline-lg leading-relaxed">
                                انضم إلى مجتمع محبي الأليفة
                            </p>

                        </div>

                    </div>

                    <div class="register-small-card p-6 text-right">
                        <span class="material-symbols-outlined text-secondary-fixed text-4xl mb-3">
                            pets
                        </span>

                        <h3 class="text-on-primary font-headline-md mb-2">
                            رعاية فائقة
                        </h3>

                        <p class="text-on-primary-container font-body-md leading-relaxed">
                            نقدم أفضل المنتجات المختارة بعناية لأليفك.
                        </p>
                    </div>

                    <div class="register-small-card p-6 text-right">
                        <span class="material-symbols-outlined text-secondary-fixed text-4xl mb-3">
                            volunteer_activism
                        </span>

                        <h3 class="text-on-primary font-headline-md mb-2">
                            مجتمع حيوي
                        </h3>

                        <p class="text-on-primary-container font-body-md leading-relaxed">
                            تواصل مع أطباء وخبراء في تربية الحيوانات.
                        </p>
                    </div>

                </div>

            </div>

        </section>

    </div>

</main>

<footer class="bg-white/40 border-t border-white/60">

    <div class="flex flex-col md:flex-row-reverse justify-between items-center w-full px-8 py-12 max-w-7xl mx-auto gap-8">

        <div class="text-xl font-bold text-primary">
            متجر الأليف
        </div>

        <div class="flex flex-wrap justify-center gap-8">
            <a class="text-primary/60 hover:text-primary font-medium text-sm transition-colors" href="#">من نحن</a>
            <a class="text-primary/60 hover:text-primary font-medium text-sm transition-colors" href="#">سياسة الخصوصية</a>
            <a class="text-primary/60 hover:text-primary font-medium text-sm transition-colors" href="#">اتصل بنا</a>
            <a class="text-primary/60 hover:text-primary font-medium text-sm transition-colors" href="#">الشحن والتوصيل</a>
        </div>

        <div class="text-primary/40 text-sm leading-relaxed">
            © 2026 متجر الأليف. جميع الحقوق محفوظة.
        </div>

    </div>

</footer>

<script>
    function togglePassword(inputId, button) {
        const input = document.getElementById(inputId);
        const icon = button.querySelector('.material-symbols-outlined');

        if (input.type === 'password') {
            input.type = 'text';
            icon.textContent = 'visibility_off';
        } else {
            input.type = 'password';
            icon.textContent = 'visibility';
        }
    }
</script>

@endsection