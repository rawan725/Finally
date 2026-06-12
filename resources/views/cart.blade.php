@extends('layouts.app')
@section('content')

@php
    $subtotal = $items->sum(fn($item) => $item->price * $item->quantity);
    $shipping = $subtotal > 0 ? 25000 : 0;
    $tax = $subtotal * 0.15;
    $total = $subtotal + $shipping + $tax;
@endphp

<main class="max-w-7xl mx-auto px-6 py-12">

    <div class="flex flex-col gap-2 mb-8">
        <h1 class="font-display-md text-display-md text-primary">
            سلة التسوق
        </h1>

        <p class="text-on-surface-variant font-body-md">
            لديك {{ $items->count() }} منتج في سلتك
        </p>
    </div>

    @if($items->count() > 0)

        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-start">

            <div class="lg:col-span-8 space-y-4">

                @foreach($items as $item)

                    <div class="bg-surface-container-lowest p-6 rounded-[24px] shadow-[0px_4px_20px_rgba(27,67,50,0.04)] border border-emerald-100/30 flex flex-col sm:flex-row items-center gap-6">

                        <div class="w-24 h-24 rounded-[16px] overflow-hidden bg-emerald-50 shrink-0">
                            @if($item->cartable && $item->cartable->image)
                                <img
                                    alt="{{ $item->cartable->name }}"
                                    class="w-full h-full object-cover"
                                    src="{{ $item->cartable_type === \App\Models\Animal::class
        ? asset('images/animals/' . $item->cartable->image)
        : asset('images/supplies/' . $item->cartable->image) }}"
                        
                                >
                            @else
                                <div class="w-full h-full flex items-center justify-center text-primary">
                                    <span class="material-symbols-outlined">image</span>
                                </div>
                            @endif
                        </div>

                        <div class="flex-grow text-center sm:text-right">
                            <h3 class="font-headline-md text-headline-md text-primary">
                                {{ $item->cartable->name ?? 'منتج غير موجود' }}
                            </h3>

                            <p class="text-label-md text-on-surface-variant">
                                {{ $item->cartable->brand ?? '' }}
                            </p>

                            <div class="mt-4 flex items-center justify-center sm:justify-start gap-6">

                                <div class="flex items-center bg-surface-container rounded-full border border-outline-variant p-1">

                                    <div class="flex items-center bg-surface-container rounded-full border border-outline-variant p-1">

    <form action="{{ route('cart.increase', $item->id) }}" method="POST">
        @csrf
        <button
            type="submit"
            class="w-8 h-8 flex items-center justify-center text-primary hover:bg-white rounded-full transition-all">
            <span class="material-symbols-outlined text-sm">add</span>
        </button>
    </form>

    <span class="px-4 font-label-lg text-primary">
        {{ $item->quantity }}
    </span>

    <form action="{{ route('cart.decrease', $item->id) }}" method="POST">
        @csrf
        <button
            type="submit"
            class="w-8 h-8 flex items-center justify-center text-primary hover:bg-white rounded-full transition-all">
            <span class="material-symbols-outlined text-sm">remove</span>
        </button>
    </form>

</div>
                                </div>

                                <span class="font-headline-md text-primary">
                                   {{ number_format($item->price * $item->quantity) }} ل.س
                                </span>

                            </div>
                        </div>

                        <form action="{{ route('cart.destroy', $item->id) }}" method="POST">
                            @csrf
                            @method('DELETE')

                            <button type="submit"
                                    class="p-3 text-error hover:bg-error-container/20 rounded-full transition-all">
                                <span class="material-symbols-outlined">delete</span>
                            </button>
                        </form>

                    </div>

                @endforeach

                <div class="bg-emerald-50 rounded-[24px] p-8 text-center border border-emerald-100 mt-12">
                    <span class="material-symbols-outlined text-primary-container text-4xl mb-4">
                        loyalty
                    </span>

                    <h4 class="font-headline-md text-primary mb-2">
                        شحن مجاني للطلبات فوق 500,000 ل.س
                    </h4>

                    <p class="text-on-surface-variant font-body-md mb-6">
                        أضف المزيد من المنتجات لتحصل على عرض الشحن المجاني.
                    </p>

                    <a href="{{ route('supplies') }}"
                       class="text-secondary font-label-lg hover:underline transition-all">
                        تصفح المزيد من المنتجات
                    </a>
                </div>

            </div>

            <div class="lg:col-span-4 sticky top-24">

                <div class="bg-surface-container-low p-8 rounded-[24px] shadow-[0px_4px_20px_rgba(27,67,50,0.04)] border border-emerald-100/50">

                    <h2 class="font-headline-lg text-headline-lg text-primary mb-6">
                        ملخص الطلب
                    </h2>

                    <div class="space-y-4 mb-8">

                        <div class="flex justify-between items-center text-on-surface-variant font-body-md">
                            <span>المجموع الفرعي</span>
                            <span>{{ number_format($subtotal) }} ل.س</span>
                        </div>

                        <div class="flex justify-between items-center text-on-surface-variant font-body-md">
                            <span>الشحن التقديري</span>
                            <span>{{ number_format($shipping) }} ل.س</span>
                        </div>

                        <div class="flex justify-between items-center text-on-surface-variant font-body-md">
                            <span>الضريبة (15%)</span>
                            <span>{{ number_format($tax) }} ل.س</span>
                        </div>

                        <div class="pt-4 border-t border-emerald-200 flex justify-between items-center">
                            <span class="font-headline-md text-primary">الإجمالي</span>
                            <span class="font-display-md text-display-md text-primary">
                                {{ number_format($total) }} ل.س
                            </span>
                        </div>

                    </div>

                    <form action="{{ route('checkout') }}"
      method="POST">

    @csrf

    <a href="{{ route('checkout') }}"
   class="w-full py-5 bg-primary-container text-white rounded-full font-headline-md shadow-lg hover:scale-[0.98] transition-transform flex items-center justify-center gap-3">
    <span class="material-symbols-outlined">lock</span>
    متابعة الدفع
</a>

</form>

                </div>

                <div class="mt-6 p-6 flex items-start gap-4 bg-white/50 rounded-[24px]">
                    <span class="material-symbols-outlined text-primary">verified_user</span>
                    <div>
                        <p class="font-label-lg text-primary">تسوق آمن 100%</p>
                        <p class="text-label-md text-on-surface-variant">
                            بياناتك الشخصية والمالية محمية ضمن بيئة آمنة.
                        </p>
                    </div>
                </div>

            </div>

        </div>

    @else

        <div class="bg-white rounded-[28px] p-10 shadow-sm border border-emerald-50 text-center">
            <span class="material-symbols-outlined text-primary text-6xl mb-4">
                shopping_cart
            </span>

            <p class="text-on-surface-variant text-lg">
                السلة فارغة حالياً.
            </p>

            <a href="{{ route('supplies') }}"
               class="inline-block mt-6 px-8 py-3 rounded-full bg-primary text-white font-bold">
                تصفح المستلزمات
            </a>
        </div>

    @endif

</main>
@endsection