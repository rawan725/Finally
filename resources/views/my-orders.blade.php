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

    $statusClasses = [
        'pending' => 'bg-amber-100 text-amber-700',
        'accepted' => 'bg-blue-100 text-blue-700',
        'preparing' => 'bg-purple-100 text-purple-700',
        'delivered' => 'bg-green-100 text-green-700',
        'cancelled' => 'bg-red-100 text-red-700',
    ];

    $paymentLabels = [
        'cash' => 'الدفع عند الاستلام',
        'bank' => 'تحويل بنكي',
        'sham_cash' => 'شام كاش',
        'wallet' => 'محفظة إلكترونية',
    ];
@endphp

<main class="max-w-6xl mx-auto px-6 py-14">

    <div class="mb-10">
        <h1 class="text-3xl font-bold text-primary mb-2">
            طلباتي
        </h1>

        <p class="text-on-surface-variant">
            هنا يمكنك متابعة جميع طلباتك السابقة وحالتها الحالية.
        </p>
    </div>

    @if($orders->isEmpty())

        <section class="glass-card rounded-3xl p-10 text-center shadow-[0px_4px_20px_rgba(27,67,50,0.06)]">

            <div class="w-24 h-24 mx-auto rounded-full bg-secondary-container/40 flex items-center justify-center text-primary mb-6">
                <span class="material-symbols-outlined text-[54px]">
                    receipt_long
                </span>
            </div>

            <h2 class="text-2xl font-bold text-primary mb-3">
                لا يوجد لديك طلبات بعد
            </h2>

            <p class="text-on-surface-variant mb-6">
                ابدأي التسوق الآن وأضيفي منتجاتك المفضلة إلى السلة.
            </p>

            <a href="{{ url('/animals') }}"
               class="inline-flex items-center justify-center gap-2 px-8 py-3 rounded-full bg-primary text-white font-bold hover:bg-primary/90 transition-all">

                <span class="material-symbols-outlined">
                    pets
                </span>

                تصفح الحيوانات
            </a>

        </section>

    @else

        <div class="space-y-5">

            @foreach($orders as $order)

                <section class="glass-card rounded-2xl p-6 shadow-[0px_4px_20px_rgba(27,67,50,0.05)] border border-outline-variant/40">

                    <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-5">

                        <div class="flex items-start gap-4">

                            <div class="w-14 h-14 rounded-full bg-secondary-container flex items-center justify-center text-primary shrink-0">
                                <span class="material-symbols-outlined text-[30px]">
                                    receipt_long
                                </span>
                            </div>

                            <div>
                                <div class="flex items-center gap-3 flex-wrap mb-2">

                                    <h2 class="text-xl font-bold text-primary">
                                        طلب رقم #{{ $order->id }}
                                    </h2>

                                    <span class="px-3 py-1 rounded-full text-sm font-bold {{ $statusClasses[$order->status] ?? 'bg-gray-100 text-gray-700' }}">
                                        {{ $statusLabels[$order->status] ?? $order->status }}
                                    </span>

                                </div>

                                <div class="grid grid-cols-1 md:grid-cols-2 gap-x-8 gap-y-2 text-sm text-on-surface-variant">

                                    <p>
                                        <span class="font-bold text-primary">تاريخ الطلب:</span>
                                        {{ $order->created_at->format('Y-m-d') }}
                                    </p>

                                    <p>
                                        <span class="font-bold text-primary">عدد العناصر:</span>
                                        {{ $order->items_count }}
                                    </p>

                                    <p>
                                        <span class="font-bold text-primary">طريقة الدفع:</span>
                                        {{ $paymentLabels[$order->payment_method] ?? $order->payment_method }}
                                    </p>

                                    <p>
                                        <span class="font-bold text-primary">الإجمالي:</span>
                                        {{ number_format($order->total_price) }} ل.س
                                    </p>

                                </div>
                            </div>

                        </div>

                        <div class="flex flex-col sm:flex-row gap-3 lg:items-center">

                            <a href="{{ route('order.success', $order->id) }}"
                               class="inline-flex items-center justify-center gap-2 px-6 py-3 rounded-full border border-outline-variant text-primary font-bold hover:bg-surface-container transition-all">

                                <span class="material-symbols-outlined">
                                    visibility
                                </span>

                                عرض التفاصيل
                            </a>

                        </div>

                    </div>

                </section>

            @endforeach

        </div>

    @endif

</main>

@endsection