@extends('layouts.app')

@section('content')

@php
    $usersCount = $usersCount ?? 0;

    $ordersCount = $ordersCount ?? 0;
    $pendingOrdersCount = $pendingOrdersCount ?? 0;
    $acceptedOrdersCount = $acceptedOrdersCount ?? 0;
    $deliveredOrdersCount = $deliveredOrdersCount ?? 0;
    $cancelledOrdersCount = $cancelledOrdersCount ?? 0;

    $animalsCount = $animalsCount ?? 0;
    $suppliesCount = $suppliesCount ?? 0;

    $doctorsCount = $doctorsCount ?? 0;
    $doctorBookingsCount = $doctorBookingsCount ?? 0;
    $pendingDoctorBookingsCount = $pendingDoctorBookingsCount ?? 0;

    $providersCount = $providersCount ?? 0;
    $pendingProvidersCount = $pendingProvidersCount ?? 0;
    $approvedProvidersCount = $approvedProvidersCount ?? 0;

    $totalSales = $totalSales ?? 0;

    $recentOrders = $recentOrders ?? collect();
    $recentBookings = $recentBookings ?? collect();
    $latestProviders = $latestProviders ?? collect();

    $maxAnalyticsValue = max([
        $ordersCount,
        $doctorBookingsCount,
        $providersCount,
        $suppliesCount,
        $animalsCount,
        $usersCount,
        1
    ]);

    $ordersPercent = ($ordersCount / $maxAnalyticsValue) * 100;
    $bookingsPercent = ($doctorBookingsCount / $maxAnalyticsValue) * 100;
    $providersPercent = ($providersCount / $maxAnalyticsValue) * 100;
    $suppliesPercent = ($suppliesCount / $maxAnalyticsValue) * 100;
    $animalsPercent = ($animalsCount / $maxAnalyticsValue) * 100;
@endphp
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
                    admin_panel_settings
                </span>

                <span class="material-symbols-outlined absolute right-10 top-6 text-[120px] text-white">
                    monitoring
                </span>
            </div>

            <div class="relative z-10 flex flex-col lg:flex-row lg:items-center lg:justify-between gap-8">

                <div class="text-right max-w-3xl">

                    <span class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-white/15 text-emerald-50 text-sm font-bold border border-white/20 mb-5">
                        <span class="material-symbols-outlined text-[18px]">analytics</span>
                        Admin Analytics Dashboard
                    </span>

                    <h1 class="text-3xl md:text-5xl font-black text-white mb-4 leading-tight">
                        لوحة التحكم الرئيسية
                    </h1>

                    <p class="text-emerald-50/90 text-lg leading-relaxed">
                        مراقبة عمليات منصة Smart Pet، إدارة الطلبات، الاستشارات، مزودي الخدمة، المنتجات، وتحليل مؤشرات الأداء الأساسية.
                    </p>

                </div>

                <div class="bg-white/15 border border-white/20 backdrop-blur rounded-[2rem] p-6 min-w-[250px]">

                    <div class="flex items-center gap-4 mb-4">
                        <div class="w-14 h-14 rounded-2xl bg-white text-emerald-800 flex items-center justify-center">
                            <span class="material-symbols-outlined text-[34px]">
                                payments
                            </span>
                        </div>

                        <div>
                            <p class="text-emerald-50/70 text-sm">
                                إجمالي المبيعات
                            </p>

                            <p class="text-white font-black text-xl">
                                {{ number_format($totalSales) }} ل.س
                            </p>
                        </div>
                    </div>

                    <p class="text-emerald-50/80 text-sm leading-relaxed">
                        مؤشر عام لإيرادات الطلبات المسجلة ضمن المنصة.
                    </p>

                </div>

            </div>

        </div>

        <!-- Main Stats -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">

            <div class="bg-white rounded-[2rem] p-6 border border-emerald-100 shadow-sm hover:shadow-xl transition-all">
                <div class="w-12 h-12 rounded-2xl bg-emerald-100 text-emerald-800 flex items-center justify-center mb-4">
                    <span class="material-symbols-outlined">group</span>
                </div>

                <p class="text-sm text-emerald-900/60 mb-1">
                    عدد المستخدمين
                </p>

                <h3 class="text-3xl font-black text-emerald-900">
                    {{ $usersCount }}
                </h3>
            </div>

            <div class="bg-white rounded-[2rem] p-6 border border-emerald-100 shadow-sm hover:shadow-xl transition-all">
                <div class="w-12 h-12 rounded-2xl bg-blue-100 text-blue-700 flex items-center justify-center mb-4">
                    <span class="material-symbols-outlined">receipt_long</span>
                </div>

                <p class="text-sm text-emerald-900/60 mb-1">
                    الطلبات
                </p>

                <h3 class="text-3xl font-black text-emerald-900">
                    {{ $ordersCount }}
                </h3>

                <p class="text-xs text-yellow-700 mt-2">
                    قيد المراجعة: {{ $pendingOrdersCount }}
                </p>
            </div>

            <div class="bg-white rounded-[2rem] p-6 border border-emerald-100 shadow-sm hover:shadow-xl transition-all">
                <div class="w-12 h-12 rounded-2xl bg-purple-100 text-purple-700 flex items-center justify-center mb-4">
                    <span class="material-symbols-outlined">medical_services</span>
                </div>

                <p class="text-sm text-emerald-900/60 mb-1">
                    الاستشارات والحجوزات
                </p>

                <h3 class="text-3xl font-black text-emerald-900">
                    {{ $doctorBookingsCount }}
                </h3>

                <p class="text-xs text-yellow-700 mt-2">
                    بانتظار الرد: {{ $pendingDoctorBookingsCount }}
                </p>
            </div>

            <div class="bg-white rounded-[2rem] p-6 border border-emerald-100 shadow-sm hover:shadow-xl transition-all">
                <div class="w-12 h-12 rounded-2xl bg-pink-100 text-pink-700 flex items-center justify-center mb-4">
                    <span class="material-symbols-outlined">business_center</span>
                </div>

                <p class="text-sm text-emerald-900/60 mb-1">
                    مزودو الخدمة
                </p>

                <h3 class="text-3xl font-black text-emerald-900">
                    {{ $providersCount }}
                </h3>

                <p class="text-xs text-yellow-700 mt-2">
                    بانتظار الموافقة: {{ $pendingProvidersCount }}
                </p>
            </div>

        </div>

        <!-- Secondary Stats -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">

            <div class="bg-white rounded-[2rem] p-6 border border-emerald-100 shadow-sm">
                <div class="flex items-center justify-between gap-4">
                    <div>
                        <p class="text-sm text-emerald-900/60 mb-1">الحيوانات</p>
                        <h3 class="text-3xl font-black text-emerald-900">{{ $animalsCount }}</h3>
                    </div>

                    <div class="w-12 h-12 rounded-2xl bg-emerald-100 text-emerald-800 flex items-center justify-center">
                        <span class="material-symbols-outlined">pets</span>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-[2rem] p-6 border border-emerald-100 shadow-sm">
                <div class="flex items-center justify-between gap-4">
                    <div>
                        <p class="text-sm text-emerald-900/60 mb-1">المستلزمات</p>
                        <h3 class="text-3xl font-black text-emerald-900">{{ $suppliesCount }}</h3>
                    </div>

                    <div class="w-12 h-12 rounded-2xl bg-orange-100 text-orange-700 flex items-center justify-center">
                        <span class="material-symbols-outlined">inventory_2</span>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-[2rem] p-6 border border-emerald-100 shadow-sm">
                <div class="flex items-center justify-between gap-4">
                    <div>
                        <p class="text-sm text-emerald-900/60 mb-1">الأطباء</p>
                        <h3 class="text-3xl font-black text-emerald-900">{{ $doctorsCount }}</h3>
                    </div>

                    <div class="w-12 h-12 rounded-2xl bg-cyan-100 text-cyan-700 flex items-center justify-center">
                        <span class="material-symbols-outlined">stethoscope</span>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-[2rem] p-6 border border-emerald-100 shadow-sm">
                <div class="flex items-center justify-between gap-4">
                    <div>
                        <p class="text-sm text-emerald-900/60 mb-1">مزودون مقبولون</p>
                        <h3 class="text-3xl font-black text-emerald-900">{{ $approvedProvidersCount }}</h3>
                    </div>

                    <div class="w-12 h-12 rounded-2xl bg-green-100 text-green-700 flex items-center justify-center">
                        <span class="material-symbols-outlined">verified</span>
                    </div>
                </div>
            </div>

        </div>

        <!-- Analytics + Quick Actions -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 mb-8">

            <!-- Analytics Bars -->
            <div class="lg:col-span-2 bg-white rounded-[2.5rem] p-8 border border-emerald-100 shadow-xl shadow-emerald-900/5">

                <div class="flex items-center justify-between gap-4 mb-8">

                    <div class="text-right">
                        <h2 class="text-2xl font-black text-emerald-900 mb-2">
                            تحليلات المنصة
                        </h2>

                        <p class="text-emerald-900/60">
                            عرض مرئي لمؤشرات الأداء الأساسية داخل المنصة.
                        </p>
                    </div>

                    <div class="w-14 h-14 rounded-2xl bg-emerald-900 text-white flex items-center justify-center">
                        <span class="material-symbols-outlined text-[34px]">monitoring</span>
                    </div>

                </div>

                <div class="space-y-6">

                    <div>
                        <div class="flex justify-between items-center mb-2">
                            <span class="text-sm font-bold text-emerald-900">الطلبات</span>
                            <span class="text-sm font-black text-emerald-900">{{ $ordersCount }}</span>
                        </div>

                        <div class="h-4 rounded-full bg-emerald-50 overflow-hidden">
                            <div class="h-full rounded-full"
                                 style="width: {{ $ordersPercent }}%; background: linear-gradient(90deg, #064e3b, #10b981);"></div>
                        </div>
                    </div>

                    <div>
                        <div class="flex justify-between items-center mb-2">
                            <span class="text-sm font-bold text-emerald-900">الاستشارات والحجوزات</span>
                            <span class="text-sm font-black text-emerald-900">{{ $doctorBookingsCount }}</span>
                        </div>

                        <div class="h-4 rounded-full bg-purple-50 overflow-hidden">
                            <div class="h-full rounded-full"
                                 style="width: {{ $bookingsPercent }}%; background: linear-gradient(90deg, #6d28d9, #a78bfa);"></div>
                        </div>
                    </div>

                    <div>
                        <div class="flex justify-between items-center mb-2">
                            <span class="text-sm font-bold text-emerald-900">مزودو الخدمة</span>
                            <span class="text-sm font-black text-emerald-900">{{ $providersCount }}</span>
                        </div>

                        <div class="h-4 rounded-full bg-pink-50 overflow-hidden">
                            <div class="h-full rounded-full"
                                 style="width: {{ $providersPercent }}%; background: linear-gradient(90deg, #be185d, #f9a8d4);"></div>
                        </div>
                    </div>

                    <div>
                        <div class="flex justify-between items-center mb-2">
                            <span class="text-sm font-bold text-emerald-900">المستلزمات</span>
                            <span class="text-sm font-black text-emerald-900">{{ $suppliesCount }}</span>
                        </div>

                        <div class="h-4 rounded-full bg-orange-50 overflow-hidden">
                            <div class="h-full rounded-full"
                                 style="width: {{ $suppliesPercent }}%; background: linear-gradient(90deg, #c2410c, #fdba74);"></div>
                        </div>
                    </div>

                    <div>
                        <div class="flex justify-between items-center mb-2">
                            <span class="text-sm font-bold text-emerald-900">الحيوانات</span>
                            <span class="text-sm font-black text-emerald-900">{{ $animalsCount }}</span>
                        </div>

                        <div class="h-4 rounded-full bg-emerald-50 overflow-hidden">
                            <div class="h-full rounded-full"
                                 style="width: {{ $animalsPercent }}%; background: linear-gradient(90deg, #047857, #6ee7b7);"></div>
                        </div>
                    </div>

                </div>

            </div>

            <!-- Quick Actions -->
            <div class="bg-white rounded-[2.5rem] p-8 border border-emerald-100 shadow-xl shadow-emerald-900/5">

                <h2 class="text-2xl font-black text-emerald-900 mb-6">
                    اختصارات الإدارة
                </h2>

                <div class="space-y-3">

                    <a href="{{ route('admin.orders') }}"
                       class="flex items-center justify-between gap-3 p-4 rounded-2xl bg-emerald-50 hover:bg-emerald-100 transition-all">

                        <span class="font-bold text-emerald-900">إدارة الطلبات</span>
                        <span class="material-symbols-outlined text-emerald-800">receipt_long</span>
                    </a>

                    <a href="{{ route('admin.providers') }}"
                       class="flex items-center justify-between gap-3 p-4 rounded-2xl bg-emerald-50 hover:bg-emerald-100 transition-all">

                        <span class="font-bold text-emerald-900">مزودو الخدمة</span>
                        <span class="material-symbols-outlined text-emerald-800">business_center</span>
                    </a>

                    <a href="{{ route('admin.doctor.bookings') }}"
                       class="flex items-center justify-between gap-3 p-4 rounded-2xl bg-emerald-50 hover:bg-emerald-100 transition-all">

                        <span class="font-bold text-emerald-900">الاستشارات</span>
                        <span class="material-symbols-outlined text-emerald-800">assignment</span>
                    </a>

                    <a href="{{ route('admin.supplies') }}"
                       class="flex items-center justify-between gap-3 p-4 rounded-2xl bg-emerald-50 hover:bg-emerald-100 transition-all">

                        <span class="font-bold text-emerald-900">المستلزمات</span>
                        <span class="material-symbols-outlined text-emerald-800">inventory_2</span>
                    </a>

                    <a href="{{ route('admin.animals') }}"
                       class="flex items-center justify-between gap-3 p-4 rounded-2xl bg-emerald-50 hover:bg-emerald-100 transition-all">

                        <span class="font-bold text-emerald-900">الحيوانات</span>
                        <span class="material-symbols-outlined text-emerald-800">pets</span>
                    </a>

                </div>

            </div>

        </div>

        <!-- Recent Activity -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

            <!-- Recent Orders -->
            <div class="bg-white rounded-[2.5rem] p-8 border border-emerald-100 shadow-xl shadow-emerald-900/5">

                <h2 class="text-2xl font-black text-emerald-900 mb-6">
                    آخر الطلبات
                </h2>

                <div class="space-y-4">

                    @forelse($recentOrders as $order)

                        <div class="p-4 rounded-2xl bg-emerald-50 border border-emerald-100">

                            <div class="flex justify-between gap-3 mb-2">
                                <span class="font-black text-emerald-900">
                                    طلب #{{ $order->id }}
                                </span>

                                <span class="text-sm font-bold text-emerald-700">
                                    {{ number_format($order->total_price) }} ل.س
                                </span>
                            </div>

                            <p class="text-sm text-emerald-900/60">
                                المستخدم:
                                {{ $order->user->name ?? 'غير معروف' }}
                            </p>

                            <p class="text-xs text-emerald-900/50 mt-1">
                                الحالة: {{ $order->status }}
                            </p>

                        </div>

                    @empty

                        <p class="text-emerald-900/60">
                            لا توجد طلبات حديثة.
                        </p>

                    @endforelse

                </div>

            </div>

            <!-- Recent Bookings -->
            <div class="bg-white rounded-[2.5rem] p-8 border border-emerald-100 shadow-xl shadow-emerald-900/5">

                <h2 class="text-2xl font-black text-emerald-900 mb-6">
                    آخر الاستشارات
                </h2>

                <div class="space-y-4">

                    @forelse($recentBookings as $booking)

                        <div class="p-4 rounded-2xl bg-purple-50 border border-purple-100">

                            <div class="flex justify-between gap-3 mb-2">
                                <span class="font-black text-emerald-900">
                                    {{ $booking->pet_name }}
                                </span>

                                <span class="text-xs font-bold text-purple-700">
                                    {{ $booking->consultation_type == 'online' ? 'أونلاين' : 'موعد عيادة' }}
                                </span>
                            </div>

                            <p class="text-sm text-emerald-900/60">
                                الطبيب:
                                {{ $booking->doctor->name ?? 'غير محدد' }}
                            </p>

                            <p class="text-xs text-emerald-900/50 mt-1">
                                الحالة: {{ $booking->status }}
                            </p>

                        </div>

                    @empty

                        <p class="text-emerald-900/60">
                            لا توجد استشارات حديثة.
                        </p>

                    @endforelse

                </div>

            </div>

            <!-- Latest Providers -->
            <div class="bg-white rounded-[2.5rem] p-8 border border-emerald-100 shadow-xl shadow-emerald-900/5">

                <h2 class="text-2xl font-black text-emerald-900 mb-6">
                    آخر مزودي الخدمة
                </h2>

                <div class="space-y-4">

                    @forelse($latestProviders as $provider)

                        <div class="p-4 rounded-2xl bg-pink-50 border border-pink-100">

                            <div class="flex justify-between gap-3 mb-2">
                                <span class="font-black text-emerald-900">
                                    {{ $provider->business_name }}
                                </span>

                                @if($provider->status == 'pending')
                                    <span class="text-xs font-bold text-yellow-700">
                                        قيد المراجعة
                                    </span>
                                @elseif($provider->status == 'approved')
                                    <span class="text-xs font-bold text-green-700">
                                        مقبول
                                    </span>
                                @else
                                    <span class="text-xs font-bold text-red-700">
                                        مرفوض
                                    </span>
                                @endif
                            </div>

                            <p class="text-sm text-emerald-900/60">
                                صاحب الحساب:
                                {{ $provider->user->name ?? 'غير معروف' }}
                            </p>

                            <p class="text-xs text-emerald-900/50 mt-1">
                                النوع:
                                @if($provider->type == 'clinic')
                                    عيادة بيطرية
                                @elseif($provider->type == 'doctor')
                                    طبيب بيطري
                                @elseif($provider->type == 'store')
                                    متجر مستلزمات
                                @else
                                    مركز عناية
                                @endif
                            </p>

                        </div>

                    @empty

                        <p class="text-emerald-900/60">
                            لا يوجد مزودو خدمة بعد.
                        </p>

                    @endforelse

                </div>

            </div>

        </div>

    </div>

</section>

@endsection