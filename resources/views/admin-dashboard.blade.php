@extends('layouts.app')

@section('content')

<main class="max-w-7xl mx-auto px-6 py-12">

    <div class="mb-10 text-right">
        <h1 class="text-3xl font-bold text-emerald-900 mb-2">
            لوحة تحكم الأدمن
        </h1>

        <p class="text-emerald-900/60">
            ملخص سريع لإدارة متجر Smart Pet.
        </p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-5 mb-10">

        <div class="bg-white rounded-3xl border border-emerald-100 p-6 shadow-[0_8px_30px_rgba(27,67,50,0.06)]">
            <span class="material-symbols-outlined text-emerald-800 text-[36px] mb-3">
                receipt_long
            </span>

            <p class="text-emerald-900/60 text-sm mb-1">عدد الطلبات</p>

            <h2 class="text-3xl font-bold text-emerald-900">
                {{ $ordersCount }}
            </h2>
        </div>

        <div class="bg-white rounded-3xl border border-amber-100 p-6 shadow-[0_8px_30px_rgba(27,67,50,0.06)]">
            <span class="material-symbols-outlined text-amber-600 text-[36px] mb-3">
                pending_actions
            </span>

            <p class="text-emerald-900/60 text-sm mb-1">طلبات قيد المراجعة</p>

            <h2 class="text-3xl font-bold text-amber-600">
                {{ $pendingOrdersCount }}
            </h2>
        </div>

        <div class="bg-white rounded-3xl border border-emerald-100 p-6 shadow-[0_8px_30px_rgba(27,67,50,0.06)]">
            <span class="material-symbols-outlined text-emerald-800 text-[36px] mb-3">
                pets
            </span>

            <p class="text-emerald-900/60 text-sm mb-1">عدد الحيوانات</p>

            <h2 class="text-3xl font-bold text-emerald-900">
                {{ $animalsCount }}
            </h2>
        </div>

        <div class="bg-white rounded-3xl border border-emerald-100 p-6 shadow-[0_8px_30px_rgba(27,67,50,0.06)]">
            <span class="material-symbols-outlined text-emerald-800 text-[36px] mb-3">
                inventory_2
            </span>

            <p class="text-emerald-900/60 text-sm mb-1">عدد المستلزمات</p>

            <h2 class="text-3xl font-bold text-emerald-900">
                {{ $suppliesCount }}
            </h2>
        </div>

        <div class="bg-white rounded-3xl border border-emerald-100 p-6 shadow-[0_8px_30px_rgba(27,67,50,0.06)]">
            <span class="material-symbols-outlined text-emerald-800 text-[36px] mb-3">
                payments
            </span>

            <p class="text-emerald-900/60 text-sm mb-1">إجمالي المبيعات</p>

            <h2 class="text-xl font-bold text-emerald-900">
                {{ number_format($totalSales) }} ل.س
            </h2>
        </div>

    </div>

    <section class="bg-white rounded-3xl border border-emerald-100 p-8 shadow-[0_8px_30px_rgba(27,67,50,0.06)]">

        <h2 class="text-2xl font-bold text-emerald-900 mb-6">
            إجراءات سريعة
        </h2>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">

            <a href="{{ route('admin.orders') }}"
               style="background-color:#065f46; color:white; padding:16px 24px; border-radius:18px; font-weight:700; text-decoration:none; display:flex; align-items:center; justify-content:center; gap:10px;">
                <span class="material-symbols-outlined">receipt_long</span>
                إدارة الطلبات
            </a>

            <a href="{{ route('admin.animals') }}"
               style="background-color:#0f766e; color:white; padding:16px 24px; border-radius:18px; font-weight:700; text-decoration:none; display:flex; align-items:center; justify-content:center; gap:10px;">
                <span class="material-symbols-outlined">pets</span>
                إدارة الحيوانات
            </a>

            <a href="{{ route('admin.supplies') }}"
               style="background-color:#047857; color:white; padding:16px 24px; border-radius:18px; font-weight:700; text-decoration:none; display:flex; align-items:center; justify-content:center; gap:10px;">
                <span class="material-symbols-outlined">inventory_2</span>
                إدارة المستلزمات
            </a>

        </div>

    </section>

</main>

@endsection