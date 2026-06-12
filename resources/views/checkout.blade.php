@extends('layouts.app')

@section('content')

@php
    $subtotal = $items->sum(fn($item) => $item->price * $item->quantity);
    $shipping = 0;
    $tax = $subtotal * 0.15;
    $total = $subtotal + $shipping + $tax;
@endphp

<main class="max-w-container-max mx-auto px-lg py-xl">

    <!-- Steps -->
    <div class="flex items-center justify-center gap-4 mb-8 text-sm">
        <div class="flex items-center gap-2 text-secondary font-bold">
            <span class="material-symbols-outlined">shopping_cart</span>
            السلة
        </div>

        <span class="text-on-surface-variant">←</span>

        <div class="flex items-center gap-2 text-primary font-bold">
            <span class="material-symbols-outlined">local_shipping</span>
            إتمام الشراء
        </div>

        <span class="text-on-surface-variant">←</span>

        <div class="flex items-center gap-2 text-on-surface-variant">
            <span class="material-symbols-outlined">task_alt</span>
            تأكيد الطلب
        </div>
    </div>

    <div class="mb-lg">
        <h1 class="font-display-md text-display-md text-primary mb-sm">
            إتمام الشراء
        </h1>

        <a href="{{ route('cart') }}"
           class="inline-flex items-center gap-2 px-5 py-3 rounded-full border border-outline-variant hover:bg-surface-container transition-all">
            <span class="material-symbols-outlined">arrow_back</span>
            العودة للسلة
        </a>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-12 gap-lg items-start">

        <!-- Main Content: Shipping & Payment -->
        <form id="checkout-form"
              action="{{ route('checkout.confirm') }}"
              method="POST"
              class="lg:col-span-8 space-y-lg">

            @csrf

            <!-- Recipient Information -->
            <section class="glass-card rounded-xl p-lg shadow-[0px_4px_20px_rgba(27,67,50,0.04)]">

                <div class="flex items-center gap-sm mb-lg">
                    <div class="w-10 h-10 rounded-full bg-secondary-container flex items-center justify-center text-on-secondary-container">
                        <span class="material-symbols-outlined">local_shipping</span>
                    </div>

                    <h2 class="font-headline-lg text-headline-lg text-primary">
                        معلومات المستلم
                    </h2>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-md">

                    <div class="space-y-xs">
                        <label class="font-label-lg text-label-lg text-on-surface-variant">
                            الاسم الكامل
                        </label>

                        <input
                            name="full_name"
                            required
                            class="w-full bg-surface-container-lowest border border-outline-variant rounded-xl px-md py-sm font-body-md text-body-md input-transition"
                            placeholder="مثال: روان حسام"
                            type="text"
                        />
                    </div>

                    <div class="space-y-xs">
                        <label class="font-label-lg text-label-lg text-on-surface-variant">
                            رقم الهاتف
                        </label>

                        <input
                            name="phone"
                            required
                            class="w-full bg-surface-container-lowest border border-outline-variant rounded-xl px-md py-sm font-body-md text-body-md input-transition text-right"
                            dir="ltr"
                            placeholder="+963 9XX XXX XXX"
                            type="tel"
                        />
                    </div>

                    <div class="space-y-xs">
                        <label class="font-label-lg text-label-lg text-on-surface-variant">
                            المحافظة / المدينة
                        </label>

                        <select
                            name="city"
                            required
                            class="w-full bg-surface-container-lowest border border-outline-variant rounded-xl px-md py-sm font-body-md text-body-md input-transition appearance-none">

                            <option value="">اختاري المدينة</option>
                            <option value="homs">حمص</option>
                            <option value="damascus">دمشق</option>
                            <option value="aleppo">حلب</option>
                            <option value="latakia">اللاذقية</option>
                            <option value="hama">حماة</option>
                        </select>
                    </div>

                    <div class="space-y-xs">
                        <label class="font-label-lg text-label-lg text-on-surface-variant">
                            الرمز البريدي / ملاحظة إضافية
                        </label>

                        <input
                            name="postal_code"
                            class="w-full bg-surface-container-lowest border border-outline-variant rounded-xl px-md py-sm font-body-md text-body-md input-transition"
                            placeholder="اختياري"
                            type="text"
                        />
                    </div>

                    <div class="md:col-span-2 space-y-xs">
                        <label class="font-label-lg text-label-lg text-on-surface-variant">
                            العنوان بالتفصيل
                        </label>

                        <textarea
                            name="address"
                            required
                            class="w-full bg-surface-container-lowest border border-outline-variant rounded-xl px-md py-sm font-body-md text-body-md input-transition"
                            placeholder="الحي، الشارع، رقم البناء، أقرب نقطة دالة..."
                            rows="3"
                        ></textarea>
                    </div>

                </div>

            </section>

            <!-- Payment Method -->
            <section class="glass-card rounded-xl p-lg shadow-[0px_4px_20px_rgba(27,67,50,0.04)]">

                <div class="flex items-center gap-sm mb-lg">
                    <div class="w-10 h-10 rounded-full bg-secondary-container flex items-center justify-center text-on-secondary-container">
                        <span class="material-symbols-outlined">payments</span>
                    </div>

                    <h2 class="font-headline-lg text-headline-lg text-primary">
                        طريقة الدفع
                    </h2>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-md">

                    <label class="relative flex flex-col items-center justify-center p-md border-2 border-outline-variant rounded-xl cursor-pointer hover:bg-secondary-container/10 transition-all has-[:checked]:border-secondary has-[:checked]:bg-secondary-container/20">
                        <input checked class="hidden" name="payment_method" value="cash" type="radio"/>

                        <span class="material-symbols-outlined text-primary mb-xs">
                            delivery_dining
                        </span>

                        <span class="font-label-md text-label-md text-on-surface-variant">
                            الدفع عند الاستلام
                        </span>
                    </label>

                    <label class="relative flex flex-col items-center justify-center p-md border-2 border-outline-variant rounded-xl cursor-pointer hover:bg-secondary-container/10 transition-all has-[:checked]:border-secondary has-[:checked]:bg-secondary-container/20">
                        <input class="hidden" name="payment_method" value="bank" type="radio"/>

                        <span class="material-symbols-outlined text-primary mb-xs">
                            account_balance
                        </span>

                        <span class="font-label-md text-label-md text-on-surface-variant">
                            تحويل بنكي
                        </span>
                    </label>

                    <label class="relative flex flex-col items-center justify-center p-md border-2 border-outline-variant rounded-xl cursor-pointer hover:bg-secondary-container/10 transition-all has-[:checked]:border-secondary has-[:checked]:bg-secondary-container/20">
                        <input class="hidden" name="payment_method" value="sham_cash" type="radio"/>

                        <span class="material-symbols-outlined text-primary mb-xs">
                            account_balance_wallet
                        </span>

                        <span class="font-label-md text-label-md text-on-surface-variant">
                            شام كاش
                        </span>
                    </label>

                </div>

                <!-- Sham Cash Details -->
                <div id="sham-cash-box"
                     class="hidden mt-lg p-md rounded-xl bg-secondary-container/20 border border-secondary-container">

                    <label class="font-label-lg text-label-lg text-primary mb-xs block">
                        رقم عملية شام كاش / رمز الإرسال
                    </label>

                    <input
                        name="payment_reference"
                        class="w-full bg-surface-container-lowest border border-outline-variant rounded-xl px-md py-sm font-body-md text-body-md input-transition"
                        placeholder="مثال: SC-123456 أو رقم العملية"
                        type="text"
                    />

                    <p class="text-sm text-on-surface-variant mt-xs">
                        أدخلي رقم العملية بعد التحويل عبر شام كاش.
                    </p>
                </div>

            </section>

        </form>

        <!-- Side Column: Order Summary -->
        <div class="lg:col-span-4 space-y-md sticky top-[100px]">

            <section class="glass-card rounded-xl p-lg shadow-[0px_4px_20px_rgba(27,67,50,0.04)]">

                <div class="flex items-center gap-sm mb-lg">
                    <div class="w-10 h-10 rounded-full bg-secondary-container flex items-center justify-center text-on-secondary-container">
                        <span class="material-symbols-outlined">receipt_long</span>
                    </div>

                    <h2 class="font-headline-md text-headline-md text-primary">
                        ملخص الطلب
                    </h2>
                </div>

                <!-- Item List -->
                <div class="space-y-sm mb-lg">

                    @foreach($items as $item)

                        <div class="flex items-center justify-between py-sm border-b border-outline-variant">

                            <div class="flex items-center gap-sm">

                                <div class="w-10 h-10 rounded-full bg-secondary-container/40 flex items-center justify-center text-primary">
                                    <span class="material-symbols-outlined text-[22px]">
                                        {{ $item->cartable_type === \App\Models\Animal::class ? 'pets' : 'shopping_bag' }}
                                    </span>
                                </div>

                                <div>
                                    <h4 class="font-label-lg text-primary">
                                        {{ $item->cartable->name ?? 'منتج' }}
                                    </h4>

                                    <p class="font-label-md text-on-surface-variant">
                                        الكمية: {{ $item->quantity }}
                                    </p>
                                </div>

                            </div>

                            <div class="flex items-center gap-3">

                                <span class="font-label-lg text-primary">
                                    {{ number_format($item->price * $item->quantity) }} ل.س
                                </span>

                                <form action="{{ route('cart.destroy', $item->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')

                                    <button
                                        type="submit"
                                        class="w-8 h-8 rounded-full flex items-center justify-center text-red-500 hover:bg-red-50 transition-all"
                                        title="حذف من السلة">
                                        <span class="material-symbols-outlined text-[20px]">
                                            delete
                                        </span>
                                    </button>
                                </form>

                            </div>

                        </div>

                    @endforeach

                </div>

                <!-- Pricing Breakdown -->
                <div class="space-y-sm mb-lg">

                    <div class="flex justify-between font-body-md text-on-surface-variant">
                        <span>المجموع الفرعي</span>
                        <span>{{ number_format($subtotal) }} ل.س</span>
                    </div>

                    <div class="flex justify-between font-body-md text-on-surface-variant">
                        <span>الشحن</span>
                        <span class="text-secondary font-bold">
                            {{ $shipping == 0 ? 'مجاني' : number_format($shipping) . ' ل.س' }}
                        </span>
                    </div>

                    <div class="flex justify-between font-body-md text-on-surface-variant">
                        <span>الضريبة (15%)</span>
                        <span>{{ number_format($tax) }} ل.س</span>
                    </div>

                    <div class="pt-sm border-t border-outline flex justify-between items-center">
                        <span class="font-headline-md text-primary">الإجمالي</span>
                        <span class="font-headline-md text-primary">
                            {{ number_format($total) }} ل.س
                        </span>
                    </div>

                </div>

                <!-- Promo Code -->
                <div class="flex gap-xs mb-lg">
                    <input
                        class="flex-grow bg-surface-container border border-outline-variant rounded-xl px-sm py-xs font-label-md input-transition"
                        placeholder="كود الخصم"
                        type="text"
                    />

                    <button
                        type="button"
                        class="bg-secondary-container text-on-secondary-container px-md py-xs rounded-xl font-label-md hover:bg-secondary-container/80 transition-all">
                        تطبيق
                    </button>
                </div>

                <!-- CTA Button -->
                <button
                    type="submit"
                    form="checkout-form"
                    class="w-full bg-primary text-white py-md rounded-full font-headline-md flex items-center justify-center gap-sm shadow-lg hover:bg-primary/90 active:scale-95 transition-all">

                    <span>تأكيد الطلب</span>
                    <span class="material-symbols-outlined">lock</span>
                </button>

                <p class="text-center font-label-md text-on-surface-variant mt-md flex items-center justify-center gap-xs">
                    <span class="material-symbols-outlined text-[16px]">verified_user</span>
                    تسوق آمن ومشفر 100%
                </p>

            </section>

        </div>

    </div>

</main>

<script>
    const paymentOptions = document.querySelectorAll('input[name="payment_method"]');
    const shamCashBox = document.getElementById('sham-cash-box');

    paymentOptions.forEach(option => {
        option.addEventListener('change', () => {
            if (option.value === 'sham_cash' && option.checked) {
                shamCashBox.classList.remove('hidden');
            } else if (option.checked) {
                shamCashBox.classList.add('hidden');
            }
        });
    });
</script>

@endsection