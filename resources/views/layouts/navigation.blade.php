<header class="sticky top-0 z-50 bg-white/80 backdrop-blur-md border-b border-emerald-100">
    <div class="flex flex-row-reverse justify-between items-center w-full px-6 py-4 max-w-7xl mx-auto">

        <!-- Logo -->
        <a href="{{ route('home') }}" class="flex items-center gap-2 text-2xl font-black text-emerald-900">
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
        <div class="flex items-center gap-4">

            <!-- Cart -->
            <a href="{{ route('cart') }}"
               class="text-emerald-900/60 hover:text-emerald-900 transition-colors">
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

                <!-- Profile Dropdown -->
                <div class="relative group">

                    <button
                        type="button"
                        class="flex items-center gap-2 text-emerald-900/60 hover:text-emerald-900 transition-colors">

                        <span class="material-symbols-outlined text-[30px]">
                            account_circle
                        </span>

                        <span class="hidden lg:inline text-sm font-semibold">
                            {{ auth()->user()->name }}
                        </span>

                        <span class="material-symbols-outlined text-[18px]">
                            expand_more
                        </span>

                    </button>

                    <!-- Dropdown Menu -->
                    <div
    class="absolute right-0 mt-3 w-56 bg-white rounded-2xl shadow-xl border border-emerald-100 py-3 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all z-50 text-right">
                        <a href="{{ route('dashboard') }}"
                           class="flex items-center gap-3 px-4 py-3 text-sm text-gray-700 hover:bg-emerald-50 hover:text-emerald-900 transition-all">

                            <span class="material-symbols-outlined text-[20px]">
                                dashboard
                            </span>

                            لوحة الحساب
                        </a>

                        <a href="{{ route('my.orders') }}"
                           class="flex items-center gap-3 px-4 py-3 text-sm text-gray-700 hover:bg-emerald-50 hover:text-emerald-900 transition-all">

                            <span class="material-symbols-outlined text-[20px]">
                                receipt_long
                            </span>

                            طلباتي
                        </a>

                        <a href="{{ route('my.consultations') }}"
   class="flex items-center gap-3 px-4 py-3 text-sm text-gray-700 hover:bg-emerald-50 hover:text-emerald-900 transition-all">

    <span class="material-symbols-outlined text-[20px]">
        medical_services
    </span>

    استشاراتي
</a>

                        @if(auth()->user()->is_admin)
                            <a href="{{ route('admin.orders') }}"
                               class="flex items-center gap-3 px-4 py-3 text-sm text-gray-700 hover:bg-emerald-50 hover:text-emerald-900 transition-all">

                                <span class="material-symbols-outlined text-[20px]">
                                    admin_panel_settings
                                </span>

                                إدارة الطلبات
                            </a>

                            @if(auth()->user()->is_admin)
    <a href="{{ route('admin.dashboard') }}"
       class="flex items-center gap-3 px-4 py-3 text-sm text-gray-700 hover:bg-emerald-50 hover:text-emerald-900 transition-all">

        <span class="material-symbols-outlined text-[20px]">
            dashboard
        </span>

        لوحة الأدمن
    </a>
@endif
                        @endif

                        <div class="border-t border-emerald-100 my-2"></div>

                        <form method="POST" action="{{ route('logout') }}">
                        
                            @csrf

                            @if(auth()->user()->is_admin)
    <a href="{{ route('admin.supplies') }}"
       class="flex items-center gap-3 px-4 py-3 text-sm text-gray-700 hover:bg-emerald-50 hover:text-emerald-900 transition-all">

        <span class="material-symbols-outlined text-[20px]">
            inventory_2
        </span>

        إدارة المستلزمات
    </a>
@endif

@if(auth()->user()->is_admin)
    <a href="{{ route('admin.animals') }}"
       class="flex items-center gap-3 px-4 py-3 text-sm text-gray-700 hover:bg-emerald-50 hover:text-emerald-900 transition-all">

        <span class="material-symbols-outlined text-[20px]">
            pets
        </span>

        إدارة الحيوانات
    </a>
@endif

@if(auth()->user()->is_admin)
    <a href="{{ route('admin.doctors') }}"
       class="flex items-center gap-3 px-4 py-3 text-sm text-gray-700 hover:bg-emerald-50 hover:text-emerald-900 transition-all">

        <span class="material-symbols-outlined text-[20px]">
            medical_services
        </span>

        إدارة الأطباء
    </a>
@endif

@if(auth()->user()->is_admin)
    <a href="{{ route('admin.doctor.bookings') }}"
       class="flex items-center gap-3 px-4 py-3 text-sm text-gray-700 hover:bg-emerald-50 hover:text-emerald-900 transition-all">

        <span class="material-symbols-outlined text-[20px]">
            assignment
        </span>

        إدارة الاستشارات
    </a>
@endif

@if(auth()->user()->is_admin)
    <a href="{{ route('admin.contact.messages') }}"
       class="flex items-center gap-3 px-4 py-3 text-sm text-gray-700 hover:bg-emerald-50 hover:text-emerald-900 transition-all">
        <span class="material-symbols-outlined text-[20px]">mail</span>
        رسائل التواصل
    </a>
@endif

                            <button
                                type="submit"
                                class="w-full flex items-center gap-3 px-4 py-3 text-sm text-red-600 hover:bg-red-50 transition-all">

                                <span class="material-symbols-outlined text-[20px]">
                                    logout
                                </span>

                                تسجيل الخروج
                            </button>
                        </form>

                    </div>

                </div>

            @endauth

        </div>

    </div>
</header>