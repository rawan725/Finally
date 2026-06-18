@extends('layouts.app')

@section('content')

<section class="min-h-screen bg-[#f4fbf7] py-10 px-4 relative overflow-hidden">

    <!-- Background Decorations -->
    <div class="absolute top-0 right-0 w-[420px] h-[420px] bg-emerald-200/40 rounded-full blur-3xl -translate-y-1/2 translate-x-1/3"></div>
    <div class="absolute bottom-0 left-0 w-[360px] h-[360px] bg-teal-200/40 rounded-full blur-3xl translate-y-1/3 -translate-x-1/3"></div>

    <div class="max-w-7xl mx-auto relative z-10">

        <!-- Premium Header -->
        <div class="relative overflow-hidden rounded-[2.5rem] p-8 md:p-10 mb-8 shadow-xl"
             style="background: linear-gradient(135deg, #064e3b 0%, #047857 55%, #10b981 100%);">

            <div class="absolute inset-0 opacity-10">
                <span class="material-symbols-outlined absolute left-10 bottom-6 text-[180px] text-white">
                    business_center
                </span>
                <span class="material-symbols-outlined absolute right-10 top-6 text-[120px] text-white">
                    monitoring
                </span>
            </div>

            <div class="relative z-10 flex flex-col lg:flex-row lg:items-center lg:justify-between gap-8">

                <div class="text-right max-w-3xl">

                    <span class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-white/15 text-emerald-50 text-sm font-bold border border-white/20 mb-5">
                        <span class="material-symbols-outlined text-[18px]">verified</span>
                        B2B Service Provider Portal
                    </span>

                    <h1 class="text-3xl md:text-5xl font-black text-white mb-4 leading-tight">
                        لوحة مزود الخدمة
                    </h1>

                    <p class="text-emerald-50/90 text-lg leading-relaxed">
                        مساحة مخصصة للعيادات، الأطباء، المتاجر ومراكز العناية لإدارة الخدمات، متابعة الحجوزات، مراقبة الأرباح، والتواصل مع أصحاب الحيوانات الأليفة.
                    </p>

                </div>

                <div class="bg-white/15 border border-white/20 backdrop-blur rounded-[2rem] p-6 min-w-[230px]">

                    <div class="flex items-center gap-4 mb-4">
                        <div class="w-14 h-14 rounded-2xl bg-white text-emerald-800 flex items-center justify-center">
                            <span class="material-symbols-outlined text-[34px]">
                                storefront
                            </span>
                        </div>

                        <div>
                            <p class="text-emerald-50/70 text-sm">
                                حالة البوابة
                            </p>
                            <p class="text-white font-black">
                                نشطة
                            </p>
                        </div>
                    </div>

                    <p class="text-emerald-50/80 text-sm leading-relaxed">
                        Designed for multi-service smart pet platform.
                    </p>

                </div>

            </div>

        </div>

        @if(session('success'))
            <div class="mb-8 p-4 rounded-2xl bg-green-100 text-green-700 font-bold text-right border border-green-200">
                {{ session('success') }}
            </div>
        @endif

        @if($errors->any())
            <div class="mb-8 p-4 rounded-2xl bg-red-50 text-red-600 text-right border border-red-100">
                <ul class="list-disc pr-5">
                    @foreach($errors->all() as $error)
                        <li class="mb-1">{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if(!$provider)

            <!-- Application Layout -->
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

                <!-- Form Card -->
                <div class="lg:col-span-2 bg-white/90 backdrop-blur rounded-[2.5rem] p-8 md:p-10 border border-emerald-100 shadow-xl shadow-emerald-900/5">

                    <div class="mb-8">

                        <span class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-emerald-50 text-emerald-800 text-sm font-bold mb-4">
                            <span class="material-symbols-outlined text-[18px]">edit_document</span>
                            طلب انضمام جديد
                        </span>

                        <h2 class="text-3xl font-black text-emerald-900 mb-3">
                            انضم إلى شبكة مزودي الخدمة
                        </h2>

                        <p class="text-emerald-900/60 leading-relaxed">
                            املئي بيانات النشاط ليتمكن الأدمن من مراجعة الطلب. بعد الموافقة، يمكن لمزود الخدمة إدارة خدماته وحجوزاته ضمن المنصة.
                        </p>

                    </div>

                    <form action="{{ route('provider.apply') }}" method="POST" class="space-y-6">

                        @csrf

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                            <div>
                                <label class="block text-sm font-bold text-emerald-900 mb-2">
                                    اسم الجهة أو النشاط
                                </label>

                                <div class="relative">
                                    <span class="material-symbols-outlined absolute right-4 top-1/2 -translate-y-1/2 text-emerald-700">
                                        badge
                                    </span>

                                    <input
                                        type="text"
                                        name="business_name"
                                        value="{{ old('business_name') }}"
                                        required
                                        placeholder="مثال: عيادة الأليف البيطرية"
                                        class="w-full h-14 pr-12 pl-4 rounded-2xl border border-emerald-100 bg-emerald-50/40 focus:ring-2 focus:ring-emerald-700 focus:border-emerald-700 outline-none"
                                    >
                                </div>
                            </div>

                            <div>
                                <label class="block text-sm font-bold text-emerald-900 mb-2">
                                    نوع مزود الخدمة
                                </label>

                                <div class="relative">
                                    <span class="material-symbols-outlined absolute right-4 top-1/2 -translate-y-1/2 text-emerald-700">
                                        category
                                    </span>

                                    <select
                                        name="type"
                                        required
                                        class="w-full h-14 pr-12 pl-4 rounded-2xl border border-emerald-100 bg-emerald-50/40 focus:ring-2 focus:ring-emerald-700 focus:border-emerald-700 outline-none">

                                        <option value="">اختاري النوع</option>

                                        <option value="clinic" {{ old('type') == 'clinic' ? 'selected' : '' }}>
                                            عيادة بيطرية
                                        </option>

                                        <option value="doctor" {{ old('type') == 'doctor' ? 'selected' : '' }}>
                                            طبيب بيطري
                                        </option>

                                        <option value="store" {{ old('type') == 'store' ? 'selected' : '' }}>
                                            متجر مستلزمات
                                        </option>

                                        <option value="grooming_center" {{ old('type') == 'grooming_center' ? 'selected' : '' }}>
                                            مركز عناية
                                        </option>

                                    </select>
                                </div>
                            </div>

                            <div>
                                <label class="block text-sm font-bold text-emerald-900 mb-2">
                                    رقم الهاتف
                                </label>

                                <div class="relative">
                                    <span class="material-symbols-outlined absolute right-4 top-1/2 -translate-y-1/2 text-emerald-700">
                                        call
                                    </span>

                                    <input
                                        type="text"
                                        name="phone"
                                        value="{{ old('phone') }}"
                                        placeholder="09xxxxxxxx"
                                        class="w-full h-14 pr-12 pl-4 rounded-2xl border border-emerald-100 bg-emerald-50/40 focus:ring-2 focus:ring-emerald-700 focus:border-emerald-700 outline-none"
                                    >
                                </div>
                            </div>

                            <div>
                                <label class="block text-sm font-bold text-emerald-900 mb-2">
                                    رقم واتساب
                                </label>

                                <div class="relative">
                                    <span class="material-symbols-outlined absolute right-4 top-1/2 -translate-y-1/2 text-emerald-700">
                                        chat
                                    </span>

                                    <input
                                        type="text"
                                        name="whatsapp_number"
                                        value="{{ old('whatsapp_number') }}"
                                        placeholder="9639xxxxxxxx"
                                        class="w-full h-14 pr-12 pl-4 rounded-2xl border border-emerald-100 bg-emerald-50/40 focus:ring-2 focus:ring-emerald-700 focus:border-emerald-700 outline-none"
                                    >
                                </div>
                            </div>

                            <div>
                                <label class="block text-sm font-bold text-emerald-900 mb-2">
                                    البريد الإلكتروني
                                </label>

                                <div class="relative">
                                    <span class="material-symbols-outlined absolute right-4 top-1/2 -translate-y-1/2 text-emerald-700">
                                        mail
                                    </span>

                                    <input
                                        type="email"
                                        name="email"
                                        value="{{ old('email') }}"
                                        placeholder="provider@example.com"
                                        class="w-full h-14 pr-12 pl-4 rounded-2xl border border-emerald-100 bg-emerald-50/40 focus:ring-2 focus:ring-emerald-700 focus:border-emerald-700 outline-none"
                                    >
                                </div>
                            </div>

                            <div>
                                <label class="block text-sm font-bold text-emerald-900 mb-2">
                                    العنوان
                                </label>

                                <div class="relative">
                                    <span class="material-symbols-outlined absolute right-4 top-1/2 -translate-y-1/2 text-emerald-700">
                                        location_on
                                    </span>

                                    <input
                                        type="text"
                                        name="address"
                                        value="{{ old('address') }}"
                                        placeholder="المدينة - المنطقة - العنوان"
                                        class="w-full h-14 pr-12 pl-4 rounded-2xl border border-emerald-100 bg-emerald-50/40 focus:ring-2 focus:ring-emerald-700 focus:border-emerald-700 outline-none"
                                    >
                                </div>
                            </div>

                        </div>

                        <div>
                            <label class="block text-sm font-bold text-emerald-900 mb-2">
                                وصف الخدمة
                            </label>

                            <textarea
                                name="description"
                                rows="5"
                                placeholder="اكتبي وصفًا مختصرًا عن الخدمات التي يقدمها مزود الخدمة..."
                                class="w-full px-4 py-4 rounded-2xl border border-emerald-100 bg-emerald-50/40 focus:ring-2 focus:ring-emerald-700 focus:border-emerald-700 outline-none resize-none">{{ old('description') }}</textarea>
                        </div>

                        <button
                            type="submit"
                            style="background: linear-gradient(135deg, #065f46, #059669);"
                            class="w-full md:w-auto px-10 py-4 rounded-2xl text-white font-black shadow-lg shadow-emerald-900/20 hover:scale-[1.01] transition-all inline-flex items-center justify-center gap-2">

                            <span class="material-symbols-outlined">
                                send
                            </span>

                            إرسال طلب الانضمام
                        </button>

                    </form>

                </div>

                <!-- Side Info -->
                <div class="space-y-6">

                    <div class="bg-white rounded-[2.5rem] p-7 border border-emerald-100 shadow-xl shadow-emerald-900/5">

                        <h3 class="text-2xl font-black text-emerald-900 mb-6">
                            مراحل الانضمام
                        </h3>

                        <div class="space-y-5">

                            <div class="flex gap-4">
                                <div class="w-10 h-10 rounded-2xl bg-emerald-900 text-white flex items-center justify-center font-black shrink-0">
                                    1
                                </div>
                                <div>
                                    <h4 class="font-black text-emerald-900">
                                        إرسال الطلب
                                    </h4>
                                    <p class="text-sm text-emerald-900/60">
                                        إدخال بيانات الجهة ونوع الخدمة.
                                    </p>
                                </div>
                            </div>

                            <div class="flex gap-4">
                                <div class="w-10 h-10 rounded-2xl bg-emerald-900 text-white flex items-center justify-center font-black shrink-0">
                                    2
                                </div>
                                <div>
                                    <h4 class="font-black text-emerald-900">
                                        مراجعة الأدمن
                                    </h4>
                                    <p class="text-sm text-emerald-900/60">
                                        يتم قبول أو رفض مزود الخدمة.
                                    </p>
                                </div>
                            </div>

                            <div class="flex gap-4">
                                <div class="w-10 h-10 rounded-2xl bg-emerald-900 text-white flex items-center justify-center font-black shrink-0">
                                    3
                                </div>
                                <div>
                                    <h4 class="font-black text-emerald-900">
                                        تفعيل اللوحة
                                    </h4>
                                    <p class="text-sm text-emerald-900/60">
                                        متابعة الحجوزات والخدمات والإحصائيات.
                                    </p>
                                </div>
                            </div>

                        </div>

                    </div>

                    <div class="rounded-[2.5rem] p-7 text-white shadow-xl relative overflow-hidden"
                         style="background: linear-gradient(135deg, #064e3b, #047857);">

                        <span class="material-symbols-outlined absolute -bottom-8 -left-6 text-[150px] opacity-10">
                            analytics
                        </span>

                        <div class="relative z-10">
                            <h3 class="text-2xl font-black mb-4">
                                قيمة هذه اللوحة
                            </h3>

                            <p class="text-emerald-50/90 leading-relaxed mb-5">
                                وجود B2B Portal يوضح أن المنصة لا تخدم المستخدم فقط، بل تربط بين أصحاب الحيوانات ومزودي الخدمات ضمن بنية منظمة.
                            </p>

                            <div class="space-y-3 text-sm">
                                <div class="flex items-center gap-2">
                                    <span class="material-symbols-outlined text-emerald-300">check_circle</span>
                                    <span>إدارة الحجوزات</span>
                                </div>

                                <div class="flex items-center gap-2">
                                    <span class="material-symbols-outlined text-emerald-300">check_circle</span>
                                    <span>متابعة المنتجات والخدمات</span>
                                </div>

                                <div class="flex items-center gap-2">
                                    <span class="material-symbols-outlined text-emerald-300">check_circle</span>
                                    <span>إحصائيات وأرباح</span>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>

            </div>

        @else

            <!-- Provider Dashboard After Applying -->
            <div class="grid grid-cols-1 lg:grid-cols-4 gap-6 mb-8">

                <div class="bg-white rounded-[2rem] p-6 border border-emerald-100 shadow-sm">
                    <div class="w-12 h-12 rounded-2xl bg-emerald-100 text-emerald-800 flex items-center justify-center mb-4">
                        <span class="material-symbols-outlined">storefront</span>
                    </div>
                    <p class="text-sm text-emerald-900/60 mb-1">اسم النشاط</p>
                    <h3 class="text-xl font-black text-emerald-900">{{ $provider->business_name }}</h3>
                </div>

                <div class="bg-white rounded-[2rem] p-6 border border-emerald-100 shadow-sm">
                    <div class="w-12 h-12 rounded-2xl bg-emerald-100 text-emerald-800 flex items-center justify-center mb-4">
                        <span class="material-symbols-outlined">category</span>
                    </div>
                    <p class="text-sm text-emerald-900/60 mb-1">نوع الخدمة</p>
                    <h3 class="text-xl font-black text-emerald-900">
                        @if($provider->type == 'clinic')
                            عيادة بيطرية
                        @elseif($provider->type == 'doctor')
                            طبيب بيطري
                        @elseif($provider->type == 'store')
                            متجر مستلزمات
                        @else
                            مركز عناية
                        @endif
                    </h3>
                </div>

                <div class="bg-white rounded-[2rem] p-6 border border-emerald-100 shadow-sm">
                    <div class="w-12 h-12 rounded-2xl bg-emerald-100 text-emerald-800 flex items-center justify-center mb-4">
                        <span class="material-symbols-outlined">verified</span>
                    </div>
                    <p class="text-sm text-emerald-900/60 mb-2">حالة الحساب</p>

                    @if($provider->status == 'pending')
                        <span class="inline-flex px-4 py-2 rounded-full bg-yellow-100 text-yellow-700 text-sm font-bold">
                            قيد المراجعة
                        </span>
                    @elseif($provider->status == 'approved')
                        <span class="inline-flex px-4 py-2 rounded-full bg-green-100 text-green-700 text-sm font-bold">
                            مقبول
                        </span>
                    @else
                        <span class="inline-flex px-4 py-2 rounded-full bg-red-100 text-red-700 text-sm font-bold">
                            مرفوض
                        </span>
                    @endif
                </div>

                <div class="bg-white rounded-[2rem] p-6 border border-emerald-100 shadow-sm">
                    <div class="w-12 h-12 rounded-2xl bg-emerald-100 text-emerald-800 flex items-center justify-center mb-4">
                        <span class="material-symbols-outlined">payments</span>
                    </div>
                    <p class="text-sm text-emerald-900/60 mb-1">إجمالي الأرباح</p>
                    <h3 class="text-xl font-black text-emerald-900">
                        {{ number_format($provider->total_earnings) }} ل.س
                    </h3>
                </div>

            </div>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

                <div class="lg:col-span-2 bg-white rounded-[2.5rem] p-8 border border-emerald-100 shadow-xl shadow-emerald-900/5">

                    <div class="flex items-center justify-between gap-4 mb-8">
                        <div>
                            <h2 class="text-2xl font-black text-emerald-900 mb-2">
                                مركز إدارة مزود الخدمة
                            </h2>
                            <p class="text-emerald-900/60">
                                أدوات تشغيلية لمتابعة الحجوزات، المنتجات، الأداء، والأرباح.
                            </p>
                        </div>

                        <div class="w-14 h-14 rounded-2xl bg-emerald-900 text-white flex items-center justify-center">
                            <span class="material-symbols-outlined text-[34px]">dashboard</span>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

                        <div class="p-6 rounded-[1.5rem] bg-emerald-50 border border-emerald-100 hover:bg-emerald-100 transition-all">
                            <span class="material-symbols-outlined text-emerald-800 text-[36px] mb-3">event_note</span>
                            <h4 class="font-black text-emerald-900 mb-2">إدارة الحجوزات</h4>
                            <p class="text-sm text-emerald-900/60">متابعة حجوزات العملاء والاستشارات الواردة.</p>
                        </div>

                        <div class="p-6 rounded-[1.5rem] bg-emerald-50 border border-emerald-100 hover:bg-emerald-100 transition-all">
                            <span class="material-symbols-outlined text-emerald-800 text-[36px] mb-3">inventory_2</span>
                            <h4 class="font-black text-emerald-900 mb-2">إدارة المنتجات</h4>
                            <p class="text-sm text-emerald-900/60">إضافة وتحديث المنتجات والخدمات.</p>
                        </div>

                        <div class="p-6 rounded-[1.5rem] bg-emerald-50 border border-emerald-100 hover:bg-emerald-100 transition-all">
                            <span class="material-symbols-outlined text-emerald-800 text-[36px] mb-3">monitoring</span>
                            <h4 class="font-black text-emerald-900 mb-2">التحليلات</h4>
                            <p class="text-sm text-emerald-900/60">عرض مؤشرات الأداء والحجوزات والأرباح.</p>
                        </div>

                        <div class="p-6 rounded-[1.5rem] bg-emerald-50 border border-emerald-100 hover:bg-emerald-100 transition-all">
                            <span class="material-symbols-outlined text-emerald-800 text-[36px] mb-3">settings</span>
                            <h4 class="font-black text-emerald-900 mb-2">إعدادات الحساب</h4>
                            <p class="text-sm text-emerald-900/60">تعديل معلومات التواصل والعنوان والوصف.</p>
                        </div>

                    </div>

                </div>

                <div class="bg-white rounded-[2.5rem] p-8 border border-emerald-100 shadow-xl shadow-emerald-900/5">

                    <h2 class="text-2xl font-black text-emerald-900 mb-6">
                        معلومات التواصل
                    </h2>

                    <div class="space-y-5 text-sm">

                        <div class="p-4 rounded-2xl bg-emerald-50">
                            <p class="text-emerald-900/50 mb-1">الهاتف</p>
                            <p class="font-bold text-emerald-900">{{ $provider->phone ?? 'غير محدد' }}</p>
                        </div>

                        <div class="p-4 rounded-2xl bg-emerald-50">
                            <p class="text-emerald-900/50 mb-1">واتساب</p>
                            <p class="font-bold text-emerald-900">{{ $provider->whatsapp_number ?? 'غير محدد' }}</p>
                        </div>

                        <div class="p-4 rounded-2xl bg-emerald-50">
                            <p class="text-emerald-900/50 mb-1">البريد الإلكتروني</p>
                            <p class="font-bold text-emerald-900">{{ $provider->email ?? 'غير محدد' }}</p>
                        </div>

                        <div class="p-4 rounded-2xl bg-emerald-50">
                            <p class="text-emerald-900/50 mb-1">العنوان</p>
                            <p class="font-bold text-emerald-900">{{ $provider->address ?? 'غير محدد' }}</p>
                        </div>

                    </div>

                </div>

            </div>

        @endif

    </div>

</section>

@endsection