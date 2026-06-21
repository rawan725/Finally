<header class="sticky top-0 z-50 bg-white/85 backdrop-blur-md border-b border-emerald-100">
    <div class="flex flex-row-reverse justify-between items-center w-full px-6 py-4 max-w-7xl mx-auto">

        <!-- Logo -->
        <a href="{{ route('home') }}" class="flex items-center gap-2 text-2xl font-black text-emerald-900">
            <span>متجر الأليف</span>
        </a>

        <!-- Main Navigation -->
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
            <a href="{{ route('pet.recommendation') }}"
   class="text-emerald-900/60 hover:text-emerald-900 transition-colors">
    التوصية الذكية
</a>

        </nav>
        

        <!-- Right Side -->
        <div class="flex items-center gap-4">

            <!-- Cart -->
            <a href="{{ route('cart') }}"
               class="relative text-emerald-900/60 hover:text-emerald-900 transition-colors">

                <span class="material-symbols-outlined text-[28px]">
                    shopping_cart
                </span>

            </a>

            @guest

                <a href="{{ route('register') }}"
                   class="px-5 py-2 rounded-full bg-emerald-900 text-white font-semibold text-sm hover:bg-emerald-800 transition-all">
                    تسجيل
                </a>

                <a href="{{ route('login') }}"
                   class="px-5 py-2 rounded-full border border-emerald-200 text-emerald-900 font-semibold text-sm hover:bg-emerald-900 hover:text-white transition-all">
                    تسجيل دخول
                </a>

            @endguest

            @auth

                <!-- Profile Dropdown -->
                <div class="relative group">

                    <!-- User Button -->
                    <button type="button"
                            class="flex items-center gap-2 text-emerald-900/70 hover:text-emerald-900 transition-colors">

                        <span class="material-symbols-outlined text-[30px]">
                            account_circle
                        </span>

                        <span class="hidden lg:inline text-sm font-bold">
                            {{ auth()->user()->name }}
                        </span>

                        <span class="material-symbols-outlined text-[18px]">
                            expand_more
                        </span>

                    </button>

                    <!-- Dropdown Menu -->
                    <div class="absolute right-0 top-full mt-3 w-80 max-h-[75vh] overflow-y-auto rounded-3xl bg-white shadow-2xl border border-emerald-100 py-3 opacity-0 invisible group-hover:opacity-100 group-hover:visible group-focus-within:opacity-100 group-focus-within:visible transition-all z-[9999] text-right">

                        <!-- Account Section -->
                        <div class="px-3 pb-3">

                            <p class="px-3 py-2 text-xs font-black text-emerald-700">
                                حسابي
                            </p>

                            <a href="{{ route('dashboard') }}"
                               class="flex items-center justify-between gap-3 px-4 py-3 text-sm font-medium text-gray-700 hover:bg-emerald-50 hover:text-emerald-900 rounded-2xl transition-all">

                                <span>لوحة الحساب</span>

                                <span class="material-symbols-outlined text-[21px] text-gray-500">
                                    dashboard
                                </span>

                            </a>

                            <a href="{{ route('my.orders') }}"
                               class="flex items-center justify-between gap-3 px-4 py-3 text-sm font-medium text-gray-700 hover:bg-emerald-50 hover:text-emerald-900 rounded-2xl transition-all">

                                <span>طلباتي</span>

                                <span class="material-symbols-outlined text-[21px] text-gray-500">
                                    receipt_long
                                </span>

                            </a>

                            <a href="{{ route('my.consultations') }}"
                               class="flex items-center justify-between gap-3 px-4 py-3 text-sm font-medium text-gray-700 hover:bg-emerald-50 hover:text-emerald-900 rounded-2xl transition-all">

                                <span>استشاراتي</span>

                                <span class="material-symbols-outlined text-[21px] text-gray-500">
                                    medical_services
                                </span>

                            </a>

                            <a href="{{ route('provider.dashboard') }}"
                               class="flex items-center justify-between gap-3 px-4 py-3 text-sm font-medium text-gray-700 hover:bg-emerald-50 hover:text-emerald-900 rounded-2xl transition-all">

                                <span>لوحة مزود الخدمة</span>

                                <span class="material-symbols-outlined text-[21px] text-gray-500">
                                    business_center
                                </span>

                            </a>

                        </div>

                        @if(auth()->user()->is_admin)

                            <!-- Admin Section -->
                            <div class="border-t border-emerald-50 px-3 py-3">

                                <p class="px-3 py-2 text-xs font-black text-emerald-700">
                                    الإدارة
                                </p>

                                <a href="{{ route('admin.dashboard') }}"
                                   class="flex items-center justify-between gap-3 px-4 py-3 text-sm font-medium text-gray-700 hover:bg-emerald-50 hover:text-emerald-900 rounded-2xl transition-all">

                                    <span>لوحة الأدمن</span>

                                    <span class="material-symbols-outlined text-[21px] text-gray-500">
                                        admin_panel_settings
                                    </span>

                                </a>

                                <a href="{{ route('admin.orders') }}"
                                   class="flex items-center justify-between gap-3 px-4 py-3 text-sm font-medium text-gray-700 hover:bg-emerald-50 hover:text-emerald-900 rounded-2xl transition-all">

                                    <span>إدارة الطلبات</span>

                                    <span class="material-symbols-outlined text-[21px] text-gray-500">
                                        receipt_long
                                    </span>

                                </a>

                                <a href="{{ route('admin.providers') }}"
                                   class="flex items-center justify-between gap-3 px-4 py-3 text-sm font-medium text-gray-700 hover:bg-emerald-50 hover:text-emerald-900 rounded-2xl transition-all">

                                    <span>إدارة مزودي الخدمة</span>

                                    <span class="material-symbols-outlined text-[21px] text-gray-500">
                                        business_center
                                    </span>

                                </a>

                                <a href="{{ route('admin.supplies') }}"
                                   class="flex items-center justify-between gap-3 px-4 py-3 text-sm font-medium text-gray-700 hover:bg-emerald-50 hover:text-emerald-900 rounded-2xl transition-all">

                                    <span>إدارة المستلزمات</span>

                                    <span class="material-symbols-outlined text-[21px] text-gray-500">
                                        inventory_2
                                    </span>

                                </a>

                                <a href="{{ route('admin.animals') }}"
                                   class="flex items-center justify-between gap-3 px-4 py-3 text-sm font-medium text-gray-700 hover:bg-emerald-50 hover:text-emerald-900 rounded-2xl transition-all">

                                    <span>إدارة الحيوانات</span>

                                    <span class="material-symbols-outlined text-[21px] text-gray-500">
                                        pets
                                    </span>

                                </a>

                                <a href="{{ route('admin.doctors') }}"
                                   class="flex items-center justify-between gap-3 px-4 py-3 text-sm font-medium text-gray-700 hover:bg-emerald-50 hover:text-emerald-900 rounded-2xl transition-all">

                                    <span>إدارة الأطباء</span>

                                    <span class="material-symbols-outlined text-[21px] text-gray-500">
                                        medical_services
                                    </span>

                                </a>

                                <a href="{{ route('admin.doctor.bookings') }}"
                                   class="flex items-center justify-between gap-3 px-4 py-3 text-sm font-medium text-gray-700 hover:bg-emerald-50 hover:text-emerald-900 rounded-2xl transition-all">

                                    <span>إدارة الاستشارات</span>

                                    <span class="material-symbols-outlined text-[21px] text-gray-500">
                                        assignment
                                    </span>

                                </a>

                                <a href="{{ route('admin.contact.messages') }}"
                                   class="flex items-center justify-between gap-3 px-4 py-3 text-sm font-medium text-gray-700 hover:bg-emerald-50 hover:text-emerald-900 rounded-2xl transition-all">

                                    <span>رسائل التواصل</span>

                                    <span class="material-symbols-outlined text-[21px] text-gray-500">
                                        mail
                                    </span>

                                </a>

                            </div>

                        @endif

                        <!-- Logout Section -->
                        <div class="border-t border-emerald-50 px-3 pt-3">

                            <form method="POST" action="{{ route('logout') }}">
                                @csrf

                                <button type="submit"
                                        class="w-full flex items-center justify-between gap-3 px-4 py-3 text-sm font-bold text-red-600 hover:bg-red-50 rounded-2xl transition-all">

                                    <span>تسجيل الخروج</span>

                                    <span class="material-symbols-outlined text-[21px]">
                                        logout
                                    </span>

                                </button>
                            </form>

                        </div>

                    </div>

                </div>

            @endauth

        </div>

    </div>
</header>