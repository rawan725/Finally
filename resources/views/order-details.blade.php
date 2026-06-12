@extends('layouts.app')

@section('content')

<main class="max-w-6xl mx-auto px-6 py-16">

    <div class="mb-10">

        <h1 class="text-4xl font-bold text-primary mb-3">
            تفاصيل الطلب #{{ $order->id }}
        </h1>

        <div class="flex gap-3 items-center">

            <span class="px-4 py-2 rounded-full bg-secondary-container text-primary text-sm font-bold">
                قيد المعالجة
            </span>

            <span class="text-on-surface-variant">
                {{ $order->created_at->format('Y-m-d H:i') }}
            </span>

        </div>

    </div>

    <div class="bg-white rounded-[28px] p-8 shadow-sm border border-emerald-50">

        <h2 class="text-2xl font-bold text-primary mb-8">
            المنتجات المطلوبة
        </h2>

        @foreach($order->items as $item)

            <div class="flex items-center justify-between border-b border-emerald-100 py-5">

                <div>
                    <h3 class="font-bold text-primary text-lg">

                        @if($item->orderable)

                            {{ $item->orderable->name }}

                        @else

                            منتج محذوف

                        @endif

                    </h3>

                    <p class="text-on-surface-variant">
                        الكمية: {{ $item->quantity }}
                    </p>

                </div>

                <div class="font-bold text-secondary">
                    {{ number_format($item->price * $item->quantity) }} ل.س
                </div>

            </div>

        @endforeach

        <div class="mt-8 flex justify-between items-center">

            <span class="text-xl font-bold text-primary">
                الإجمالي
            </span>

            <span class="text-2xl font-bold text-secondary">
                {{ number_format($order->total_price) }} ل.س
            </span>

        </div>

    </div>

</main>

@endsection