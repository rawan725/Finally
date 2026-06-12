@extends('layouts.app')

@section('content')

@php
    $paymentLabels = [
        'cash' => 'الدفع عند الاستلام',
        'bank' => 'تحويل بنكي',
        'sham_cash' => 'شام كاش',
        'wallet' => 'محفظة إلكترونية',
    ];
@endphp

<main class="max-w-4xl mx-auto px-6 py-16">

    <section class="glass-card rounded-3xl p-8 text-center shadow-[0px_4px_20px_rgba(27,67,50,0.08)]">

        <div class="w-24 h-24 mx-auto rounded-full bg-green-100 flex items-center justify-center text-green-700 mb-6">
            <span class="material-symbols-outlined text-[56px]">
                task_alt
            </span>
        </div>

        <h1 class="text-3xl font-bold text-primary mb-3">
            تم إرسال طلبك بنجاح
        </h1>

        <p class="text-on-surface-variant mb-8">
            شكرًا لتسوقك من Smart Pet، تم استلام طلبك وهو الآن قيد المراجعة.
        </p>

        <div class="bg-surface-container-low rounded-2xl p-6 text-right space-y-4 mb-8">

            <div class="flex justify-between border-b border-outline-variant pb-3">
                <span class="text-on-surface-variant">رقم الطلب</span>
                <span class="font-bold text-primary">
                    #{{ $order->id }}
                </span>
            </div>

            <div class="flex justify-between border-b border-outline-variant pb-3">
                <span class="text-on-surface-variant">اسم المستلم</span>
                <span class="font-bold text-primary">
                    {{ $order->full_name }}
                </span>
            </div>

            <div class="flex justify-between border-b border-outline-variant pb-3">
                <span class="text-on-surface-variant">رقم الهاتف</span>
                <span class="font-bold text-primary" dir="ltr">
                    {{ $order->phone }}
                </span>
            </div>

            <div class="flex justify-between border-b border-outline-variant pb-3">
                <span class="text-on-surface-variant">طريقة الدفع</span>
                <span class="font-bold text-primary">
                    {{ $paymentLabels[$order->payment_method] ?? $order->payment_method }}
                </span>
            </div>

            @if($order->payment_method === 'sham_cash' && $order->payment_reference)
                <div class="flex justify-between border-b border-outline-variant pb-3">
                    <span class="text-on-surface-variant">رقم عملية شام كاش</span>
                    <span class="font-bold text-primary">
                        {{ $order->payment_reference }}
                    </span>
                </div>
            @endif

            <div class="flex justify-between border-b border-outline-variant pb-3">
                <span class="text-on-surface-variant">حالة الطلب</span>
                <span class="font-bold text-amber-600">
                    قيد المراجعة
                </span>
            </div>

            <div class="flex justify-between pt-2 text-lg">
                <span class="text-primary font-bold">الإجمالي</span>
                <span class="text-primary font-bold">
                    {{ number_format($order->total_price) }} ل.س
                </span>
            </div>

        </div>

        <div class="text-right mb-8">
            <h2 class="text-xl font-bold text-primary mb-4">
                عناصر الطلب
            </h2>

            <div class="space-y-3">
                @foreach($order->items as $item)
                    <div class="flex items-center justify-between bg-white/70 rounded-xl p-4 border border-outline-variant">

                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 rounded-full bg-secondary-container/40 flex items-center justify-center text-primary">
                                <span class="material-symbols-outlined">
                                    shopping_bag
                                </span>
                            </div>

                            <div>
                                <h3 class="font-bold text-primary">
                                    {{ $item->orderable->name ?? 'منتج' }}
                                </h3>

                                <p class="text-sm text-on-surface-variant">
                                    الكمية: {{ $item->quantity }}
                                </p>
                            </div>
                        </div>

                        <span class="font-bold text-primary">
                            {{ number_format($item->price * $item->quantity) }} ل.س
                        </span>

                    </div>
                @endforeach
            </div>
        </div>

        <div class="flex flex-col sm:flex-row gap-4 justify-center">

            <a href="{{ route('home') }}"
               class="px-8 py-3 rounded-full bg-primary text-white font-bold hover:bg-primary/90 transition-all">
                العودة للرئيسية
            </a>

            <a href="{{ route('animals') }}"
               class="px-8 py-3 rounded-full border border-outline-variant text-primary font-bold hover:bg-surface-container transition-all">
                متابعة التسوق
            </a>

        </div>

    </section>

</main>

@endsection