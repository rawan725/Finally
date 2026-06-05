<header class="sticky top-0 z-50 bg-white/80 backdrop-blur-md border-b border-emerald-100">
    <div class="flex flex-row-reverse justify-between items-center w-full px-6 py-4 max-w-7xl mx-auto">

        <!-- Logo -->
        <a href="{{ route('home') }}" class="flex items-center gap-2 text-2xl font-black text-emerald-900">
            <span class="material-symbols-outlined text-secondary">pets</span>
            <span>متجر الأليف</span>
        </a>

        <!-- Navigation -->
        <nav class="hidden md:flex flex-row-reverse gap-8 font-medium text-sm">
            <a href="{{ route('home') }}"
               class="text-emerald-900/60 hover:text-emerald-900 transition-colors">
                الرئيسية
            </a>

            <a href="{{ route('animals') }}"
               class="text-emerald-900/60 hover:text-emerald-900 transition-colors">
                الحيوانات
            </a>

            <a href="{{ route('supplies') }}"
               class="text-emerald-900/60 hover:text-emerald-900 transition-colors">
                المستلزمات
            </a>

            <a href="{{ route('doctor') }}"
               class="text-emerald-900/60 hover:text-emerald-900 transition-colors">
                الأطباء
            </a>
        </nav>

        <!-- Right Side -->
        <div class="flex items-center gap-3">

            <!-- Cart -->
            <a href="{{ route('cart') }}"
               class="text-secondary hover:text-primary transition-colors">
                <span class="material-symbols-outlined text-[28px]">
                    shopping_cart
                </span>
            </a>

            @guest

                <a href="{{ route('register') }}"
                   class="px-5 py-2 rounded-full bg-primary text-white font-semibold text-sm hover:bg-primary/90 transition-all">
                    تسجيل
                </a>

                <a href="{{ route('login') }}"
                   class="px-5 py-2 rounded-full border border-secondary/30 text-secondary font-semibold text-sm hover:bg-secondary hover:text-white transition-all">
                    تسجيل دخول
                </a>

            @endguest

            @auth

                <!-- Profile -->
                <a href="{{ route('profile.edit') }}"
                   class="text-secondary hover:text-primary transition-colors">
                    <span class="material-symbols-outlined text-[28px]">
                        person
                    </span>
                </a>

                <!-- Logout -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <button type="submit"
                        class="px-5 py-2 rounded-full border border-red-200 text-red-600 font-semibold text-sm hover:bg-red-50 transition-all">
                        خروج
                    </button>
                </form>

            @endauth

        </div>

    </div>
</header>