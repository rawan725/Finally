@extends('layouts.app')

@section('content')

<main class="max-w-6xl mx-auto px-6 py-16">

    <h1 class="text-4xl font-bold text-primary mb-10">
        طلباتي
    </h1>

    @forelse($orders as $order)

        <div class="bg-white rounded-[28px] p-6 shadow-sm border border-emerald-50 mb-5">

            <div class="flex flex-col md:flex-row md:items-center justify-between gap-5">

                <div>
                    <h3 class="text-2xl font-bold text-primary mb-2">
                        طلب رقم #{{ $order->id }}
                    </h3>

                    <p class="text-on-surface-variant">
                        تاريخ الطلب: {{ $order->created_at->format('Y-m-d') }}
                    </p>

                    <p class="text-on-surface-variant mt-1">
                        عدد العناصر: {{ $order->items->sum('quantity') }}
                    </p>

                    <div class="mt-3">
                        <span class="px-4 py-2 rounded-full bg-secondary-container text-primary text-sm font-bold">
                            قيد المعالجة
                        </span>
                    </div>
                </div>

                <div class="text-right">
                    <p class="text-2xl font-bold text-secondary mb-4">
                        {{ number_format($order->total_price) }} ل.س
                    </p>

                    <a href="{{ route('orders.show', $order->id) }}"
                       class="inline-block px-6 py-3 rounded-full bg-primary text-white font-bold">
                        عرض التفاصيل
                    </a>
                </div>

            </div>

        </div>

    @empty

        <div class="bg-white rounded-[28px] p-10 text-center border border-emerald-50">
            <p class="text-on-surface-variant">
                لا توجد طلبات حالياً.
            </p>
        </div>

    @endforelse

</main>

@endsection