@extends('layouts.app')

@section('content')

<section class="min-h-screen bg-emerald-50/40 py-10 px-4">

    <div class="max-w-7xl mx-auto">

        <!-- Header -->
        <div class="bg-white rounded-[2rem] p-8 shadow-sm border border-emerald-100 mb-8">

            <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-6">

                <div class="text-right">
                    <span class="inline-flex px-4 py-2 rounded-full bg-emerald-100 text-emerald-800 text-sm font-bold mb-4">
                        Pet Owner Portal
                    </span>

                    <h1 class="text-3xl md:text-4xl font-black text-emerald-900 mb-3">
                        أهلاً {{ auth()->user()->name }}
                    </h1>

                    <p class="text-emerald-900/60 leading-relaxed max-w-2xl">
                        من هنا يمكنك إدارة طلباتك، متابعة استشاراتك، الوصول إلى السلة، عرض الملف الطبي، واستخدام خدمات منصة Smart Pet بسهولة من اللابتوب أو الموبايل.
                    </p>
                </div>

                <div class="w-24 h-24 rounded-3xl bg-emerald-900 text-white flex items-center justify-center shadow-lg shadow-emerald-900/20">
                    <span class="material-symbols-outlined text-[52px]">
                        pets
                    </span>
                </div>

            </div>

        </div>

        <!-- Main Portal Cards -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-8">

            <!-- My Orders -->
            <a href="{{ route('my.orders') }}"
               class="bg-white rounded-[2rem] p-6 border border-emerald-100 shadow-sm hover:shadow-xl hover:-translate-y-1 transition-all group">

                <div class="w-14 h-14 rounded-2xl bg-emerald-100 text-emerald-800 flex items-center justify-center mb-5 group-hover:bg-emerald-900 group-hover:text-white transition-all">
                    <span class="material-symbols-outlined text-[32px]">
                        receipt_long
                    </span>
                </div>

                <h3 class="text-xl font-black text-emerald-900 mb-2">
                    طلباتي
                </h3>

                <p class="text-sm text-emerald-900/60 leading-relaxed">
                    متابعة الطلبات، حالة الشحن، وتفاصيل المشتريات السابقة.
                </p>

            </a>

            <!-- Consultations -->
            <a href="{{ route('my.consultations') }}"
               class="bg-white rounded-[2rem] p-6 border border-emerald-100 shadow-sm hover:shadow-xl hover:-translate-y-1 transition-all group">

                <div class="w-14 h-14 rounded-2xl bg-emerald-100 text-emerald-800 flex items-center justify-center mb-5 group-hover:bg-emerald-900 group-hover:text-white transition-all">
                    <span class="material-symbols-outlined text-[32px]">
                        event_note
                    </span>
                </div>

                <h3 class="text-xl font-black text-emerald-900 mb-2">
                    استشاراتي
                </h3>

                <p class="text-sm text-emerald-900/60 leading-relaxed">
                    متابعة حجوزات الأطباء والاستشارات الطبية الخاصة بحيوانك الأليف.
                </p>

            </a>

            <!-- Cart -->
            <a href="{{ route('cart') }}"
               class="bg-white rounded-[2rem] p-6 border border-emerald-100 shadow-sm hover:shadow-xl hover:-translate-y-1 transition-all group">

                <div class="w-14 h-14 rounded-2xl bg-emerald-100 text-emerald-800 flex items-center justify-center mb-5 group-hover:bg-emerald-900 group-hover:text-white transition-all">
                    <span class="material-symbols-outlined text-[32px]">
                        shopping_cart
                    </span>
                </div>

                <h3 class="text-xl font-black text-emerald-900 mb-2">
                    السلة
                </h3>

                <p class="text-sm text-emerald-900/60 leading-relaxed">
                    مراجعة المنتجات والحيوانات المضافة إلى السلة وإتمام عملية الشراء.
                </p>

            </a>

            <!-- Doctors -->
            <a href="{{ route('doctor') }}"
               class="bg-white rounded-[2rem] p-6 border border-emerald-100 shadow-sm hover:shadow-xl hover:-translate-y-1 transition-all group">

                <div class="w-14 h-14 rounded-2xl bg-emerald-100 text-emerald-800 flex items-center justify-center mb-5 group-hover:bg-emerald-900 group-hover:text-white transition-all">
                    <span class="material-symbols-outlined text-[32px]">
                        medical_services
                    </span>
                </div>

                <h3 class="text-xl font-black text-emerald-900 mb-2">
                    الأطباء والاستشارات
                </h3>

                <p class="text-sm text-emerald-900/60 leading-relaxed">
                    اختيار طبيب بيطري، حجز موعد، أو بدء استشارة أونلاين.
                </p>

            </a>

            <!-- Pet Medical Profile -->
            <a href="{{ route('pet.medical.profile') }}"
               class="bg-white rounded-[2rem] p-6 border border-emerald-100 shadow-sm hover:shadow-xl hover:-translate-y-1 transition-all group">

                <div class="w-14 h-14 rounded-2xl bg-emerald-100 text-emerald-800 flex items-center justify-center mb-5 group-hover:bg-emerald-900 group-hover:text-white transition-all">
                    <span class="material-symbols-outlined text-[32px]">
                        clinical_notes
                    </span>
                </div>

                <h3 class="text-xl font-black text-emerald-900 mb-2">
                    الملف الطبي
                </h3>

                <p class="text-sm text-emerald-900/60 leading-relaxed">
                    إدارة الملف الطبي للحيوان وعرضه وطباعته عند زيارة العيادة أو في الحالات الطارئة.
                </p>

            </a>

            <!-- Provider Dashboard -->
            <a href="{{ route('provider.dashboard') }}"
               class="bg-white rounded-[2rem] p-6 border border-emerald-100 shadow-sm hover:shadow-xl hover:-translate-y-1 transition-all group">

                <div class="w-14 h-14 rounded-2xl bg-emerald-100 text-emerald-800 flex items-center justify-center mb-5 group-hover:bg-emerald-900 group-hover:text-white transition-all">
                    <span class="material-symbols-outlined text-[32px]">
                        business_center
                    </span>
                </div>

                <h3 class="text-xl font-black text-emerald-900 mb-2">
                    لوحة مزود الخدمة
                </h3>

                <p class="text-sm text-emerald-900/60 leading-relaxed">
                    تقديم طلب الانضمام كمزود خدمة وإدارة الخدمات والحجوزات.
                </p>

            </a>

            @if(auth()->user()->is_admin)
                <!-- Admin Dashboard -->
                <a href="{{ route('admin.dashboard') }}"
                   class="bg-emerald-900 rounded-[2rem] p-6 border border-emerald-900 shadow-sm hover:shadow-xl hover:-translate-y-1 transition-all group">

                    <div class="w-14 h-14 rounded-2xl bg-white/15 text-white flex items-center justify-center mb-5 group-hover:bg-white group-hover:text-emerald-900 transition-all">
                        <span class="material-symbols-outlined text-[32px]">
                            admin_panel_settings
                        </span>
                    </div>

                    <h3 class="text-xl font-black text-white mb-2">
                        لوحة الأدمن
                    </h3>

                    <p class="text-sm text-emerald-50/80 leading-relaxed">
                        مراقبة العمليات، إدارة الطلبات، مزودي الخدمة، الإحصائيات، والمحتوى.
                    </p>

                </a>
            @endif

        </div>

        <!-- Platform Services -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

            <!-- Quick Actions -->
            <div class="lg:col-span-2 bg-white rounded-[2rem] p-8 border border-emerald-100 shadow-sm">

                <div class="flex items-center justify-between gap-4 mb-8">

                    <div>
                        <h2 class="text-2xl font-black text-emerald-900 mb-2">
                            خدمات المنصة
                        </h2>

                        <p class="text-emerald-900/60">
                            وصول سريع لأهم خدمات Smart Pet.
                        </p>
                    </div>

                    <div class="w-12 h-12 rounded-2xl bg-emerald-900 text-white flex items-center justify-center">
                        <span class="material-symbols-outlined">
                            dashboard
                        </span>
                    </div>

                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

                    <a href="{{ route('animals') }}"
                       class="flex items-center gap-4 p-5 rounded-2xl bg-emerald-50 hover:bg-emerald-100 transition-all">

                        <div class="w-12 h-12 rounded-xl bg-white text-emerald-800 flex items-center justify-center">
                            <span class="material-symbols-outlined">
                                pets
                            </span>
                        </div>

                        <div>
                            <h4 class="font-black text-emerald-900">
                                تصفح الحيوانات
                            </h4>

                            <p class="text-sm text-emerald-900/60">
                                عرض الحيوانات المتاحة وتفاصيلها.
                            </p>
                        </div>

                    </a>

                    <a href="{{ route('supplies') }}"
                       class="flex items-center gap-4 p-5 rounded-2xl bg-emerald-50 hover:bg-emerald-100 transition-all">

                        <div class="w-12 h-12 rounded-xl bg-white text-emerald-800 flex items-center justify-center">
                            <span class="material-symbols-outlined">
                                inventory_2
                            </span>
                        </div>

                        <div>
                            <h4 class="font-black text-emerald-900">
                                المستلزمات والمنتجات
                            </h4>

                            <p class="text-sm text-emerald-900/60">
                                منتجات غذائية وطبية ومستلزمات للحيوانات.
                            </p>
                        </div>

                    </a>

                    <a href="{{ route('doctor') }}"
                       class="flex items-center gap-4 p-5 rounded-2xl bg-emerald-50 hover:bg-emerald-100 transition-all">

                        <div class="w-12 h-12 rounded-xl bg-white text-emerald-800 flex items-center justify-center">
                            <span class="material-symbols-outlined">
                                support_agent
                            </span>
                        </div>

                        <div>
                            <h4 class="font-black text-emerald-900">
                                استشارة بيطرية
                            </h4>

                            <p class="text-sm text-emerald-900/60">
                                تواصل مع طبيب أو احجز موعدًا.
                            </p>
                        </div>

                    </a>

                    <a href="{{ route('my.orders') }}"
                       class="flex items-center gap-4 p-5 rounded-2xl bg-emerald-50 hover:bg-emerald-100 transition-all">

                        <div class="w-12 h-12 rounded-xl bg-white text-emerald-800 flex items-center justify-center">
                            <span class="material-symbols-outlined">
                                local_shipping
                            </span>
                        </div>

                        <div>
                            <h4 class="font-black text-emerald-900">
                                متابعة الطلبات
                            </h4>

                            <p class="text-sm text-emerald-900/60">
                                معرفة حالة طلباتك السابقة والحالية.
                            </p>
                        </div>

                    </a>

                </div>

            </div>

            <!-- Responsive Note -->
            <div class="bg-emerald-900 rounded-[2rem] p-8 text-white shadow-xl relative overflow-hidden">

                <div class="absolute -bottom-8 -left-8 opacity-10">
                    <span class="material-symbols-outlined text-[140px]">
                        devices
                    </span>
                </div>

                <div class="relative z-10">

                    <div class="w-14 h-14 rounded-2xl bg-white/10 flex items-center justify-center mb-6">
                        <span class="material-symbols-outlined text-[32px]">
                            smartphone
                        </span>
                    </div>

                    <h2 class="text-2xl font-black mb-4">
                        منصة متجاوبة بالكامل
                    </h2>

                    <p class="text-emerald-100 leading-relaxed mb-6">
                        تم تصميم المنصة لتعمل بشكل مناسب على شاشة اللابتوب والموبايل، مما يسمح للمستخدم بتصفح المنتجات أو عرض بياناته أثناء وجوده في العيادة.
                    </p>

                    <div class="space-y-3 text-sm">

                        <div class="flex items-center gap-2">
                            <span class="material-symbols-outlined text-emerald-300">
                                check_circle
                            </span>
                            <span>متوافقة مع شاشات الهاتف</span>
                        </div>

                        <div class="flex items-center gap-2">
                            <span class="material-symbols-outlined text-emerald-300">
                                check_circle
                            </span>
                            <span>متوافقة مع شاشة اللابتوب</span>
                        </div>

                        <div class="flex items-center gap-2">
                            <span class="material-symbols-outlined text-emerald-300">
                                check_circle
                            </span>
                            <span>تجربة استخدام مرنة عبر المتصفح</span>
                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>

@endsection