@extends('layouts.app')

@section('content')

@php
    $statusLabels = [
        'pending' => 'قيد المراجعة',
        'accepted' => 'تم القبول',
        'preparing' => 'قيد التجهيز',
        'delivered' => 'تم التسليم',
        'cancelled' => 'ملغي',
    ];

    $paymentLabels = [
        'cash' => 'الدفع عند الاستلام',
        'bank' => 'تحويل بنكي',
        'sham_cash' => 'شام كاش',
        'wallet' => 'محفظة إلكترونية',
    ];
@endphp

<main class="max-w-6xl mx-auto px-6 py-12">

    <div class="mb-8 flex flex-col md:flex-row md:items-center md:justify-between gap-4">

        <div>
            <h1 class="text-3xl font-bold text-primary mb-2">
                تفاصيل الطلب #{{ $order->id }}
            </h1>

            <p class="text-on-surface-variant">
                عرض معلومات الزبون، الدفع، العنوان، وعناصر الطلب.
            </p>
        </div>

        <a href="{{ route('admin.orders') }}"
           class="inline-flex items-center justify-center px-6 py-3 rounded-full border border-emerald-200 text-emerald-800 hover:bg-emerald-50 transition-all font-bold">
            العودة لإدارة الطلبات
        </a>

    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

        <section class="lg:col-span-2 glass-card rounded-3xl p-6 shadow-[0px_4px_20px_rgba(27,67,50,0.05)]">

            <h2 class="text-2xl font-bold text-primary mb-6">
                معلومات الزبون
            </h2>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

                <div class="p-4 rounded-2xl bg-emerald-50/60">
                    <p class="text-sm text-on-surface-variant mb-1">اسم المستلم</p>
                    <p class="font-bold text-primary">{{ $order->full_name }}</p>
                </div>

                <div class="p-4 rounded-2xl bg-emerald-50/60">
                    <p class="text-sm text-on-surface-variant mb-1">البريد الإلكتروني</p>
                    <p class="font-bold text-primary">{{ $order->user->email ?? 'غير معروف' }}</p>
                </div>

                <div class="p-4 rounded-2xl bg-emerald-50/60">
                    <p class="text-sm text-on-surface-variant mb-1">رقم الهاتف</p>
                    <p class="font-bold text-primary" dir="ltr">{{ $order->phone }}</p>
                </div>

                <div class="p-4 rounded-2xl bg-emerald-50/60">
                    <p class="text-sm text-on-surface-variant mb-1">المدينة</p>
                    <p class="font-bold text-primary">{{ $order->city }}</p>
                </div>

                <div class="md:col-span-2 p-4 rounded-2xl bg-emerald-50/60">
                    <p class="text-sm text-on-surface-variant mb-1">العنوان التفصيلي</p>
                    <p class="font-bold text-primary">{{ $order->address }}</p>
                </div>

            </div>

        </section>

        <section class="glass-card rounded-3xl p-6 shadow-[0px_4px_20px_rgba(27,67,50,0.05)]">

            <h2 class="text-2xl font-bold text-primary mb-6">
                ملخص الطلب
            </h2>

            <div class="space-y-4">

                <div class="flex justify-between border-b border-emerald-100 pb-3">
                    <span class="text-on-surface-variant">الحالة</span>
                    <span class="font-bold text-amber-600">
                        {{ $statusLabels[$order->status] ?? $order->status }}
                    </span>
                </div>

                <div class="flex justify-between border-b border-emerald-100 pb-3">
                    <span class="text-on-surface-variant">طريقة الدفع</span>
                    <span class="font-bold text-primary">
                        {{ $paymentLabels[$order->payment_method] ?? $order->payment_method }}
                    </span>
                </div>

                @if($order->payment_method === 'sham_cash' && $order->payment_reference)
                    <div class="border-b border-emerald-100 pb-3">
                        <span class="text-on-surface-variant block mb-1">رقم عملية شام كاش</span>
                        <span class="font-bold text-primary">
                            {{ $order->payment_reference }}
                        </span>
                    </div>
                @endif

                <div class="flex justify-between border-b border-emerald-100 pb-3">
                    <span class="text-on-surface-variant">تاريخ الطلب</span>
                    <span class="font-bold text-primary">
                        {{ $order->created_at->format('Y-m-d') }}
                    </span>
                </div>

                <div class="flex justify-between text-lg pt-2">
                    <span class="font-bold text-primary">الإجمالي</span>
                    <span class="font-bold text-primary">
                        {{ number_format($order->total_price) }} ل.س
                    </span>
                </div>

            </div>

        </section>

    </div>

    <section class="glass-card rounded-3xl p-6 mt-6 shadow-[0px_4px_20px_rgba(27,67,50,0.05)]">

        <h2 class="text-2xl font-bold text-primary mb-6">
            عناصر الطلب
        </h2>

        <div class="space-y-4">

            @foreach($order->items as $item)

                <div class="flex items-center justify-between gap-4 p-4 rounded-2xl border border-emerald-100 hover:bg-emerald-50/40 transition-all">

                    <div class="flex items-center gap-4">

                        <div class="w-12 h-12 rounded-full bg-secondary-container/40 flex items-center justify-center text-primary">
                            <span class="material-symbols-outlined">
                                {{ $item->orderable_type === \App\Models\Animal::class ? 'pets' : 'shopping_bag' }}
                            </span>
                        </div>

                        <div>
                            <h3 class="font-bold text-primary">
                                {{ $item->orderable->name ?? 'منتج غير متوفر' }}
                            </h3>

                            <p class="text-sm text-on-surface-variant">
                                الكمية: {{ $item->quantity }}
                            </p>
                        </div>

                    </div>

                    <div class="text-left">
                        <p class="font-bold text-primary">
                            {{ number_format($item->price * $item->quantity) }} ل.س
                        </p>

                        <p class="text-sm text-on-surface-variant">
                            سعر القطعة: {{ number_format($item->price) }} ل.س
                        </p>
                    </div>

                </div>

            @endforeach

        </div>

    </section>

</main>

@endsection