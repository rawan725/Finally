@extends('layouts.app')

@section('content')

<main class="max-w-6xl mx-auto px-6 py-16">

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-10 items-start">

        <div class="bg-emerald-50 rounded-[32px] overflow-hidden">
            @if($supply->image)
                <img
                    src="{{ asset('images/supplies/' . $supply->image) }}"
                    alt="{{ $supply->name }}"
                    class="w-full h-[500px] object-cover"
                >
            @else
                <div class="w-full h-[500px] flex items-center justify-center text-primary font-bold">
                    لا توجد صورة
                </div>
            @endif
        </div>

        <div class="glass-card rounded-[32px] p-8 space-y-6">

            <span class="inline-block bg-secondary-container text-primary px-4 py-2 rounded-full font-bold">
                {{ $supply->category }}
            </span>

            <h1 class="text-4xl font-bold text-primary">
                {{ $supply->name }}
            </h1>

            <p class="text-on-surface-variant">
                {{ $supply->brand }}
            </p>

            <p class="text-lg leading-8">
                {{ $supply->description }}
            </p>

            <div class="grid grid-cols-2 gap-4">
                <div class="bg-white rounded-2xl p-5 border">
                    <p class="text-outline text-sm">السعر</p>
                    <h3 class="text-primary font-bold">
                        {{ number_format($supply->price) }} ل.س
                    </h3>
                </div>

                <div class="bg-white rounded-2xl p-5 border">
                    <p class="text-outline text-sm">الكمية</p>
                    <h3 class="text-primary font-bold">
                        {{ $supply->quantity }}
                    </h3>
                </div>
            </div>

            <button class="w-full py-4 rounded-2xl bg-primary text-white font-bold hover:bg-secondary transition-all">
                إضافة إلى السلة
            </button>

        </div>

    </div>

</main>

@endsection