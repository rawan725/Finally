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

<main class="max-w-7xl mx-auto px-6 py-12">

    <div class="mb-8">
        <h1 class="text-3xl font-bold text-primary mb-2">
            إدارة الطلبات
        </h1>

        <p class="text-on-surface-variant">
            من هنا يمكنك متابعة طلبات الزبائن وتحديث حالة كل طلب.
        </p>
    </div>

    @if(session('success'))
        <div class="mb-6 p-4 rounded-xl bg-green-100 text-green-700 font-bold">
            {{ session('success') }}
        </div>
    @endif

    @if($orders->isEmpty())

        <section class="glass-card rounded-3xl p-10 text-center">
            <span class="material-symbols-outlined text-[56px] text-primary mb-4">
                receipt_long
            </span>

            <h2 class="text-2xl font-bold text-primary">
                لا توجد طلبات حالياً
            </h2>
        </section>

    @else

        <div class="overflow-x-auto glass-card rounded-2xl shadow-[0px_4px_20px_rgba(27,67,50,0.05)]">

            <table class="w-full text-right border-collapse">

                <thead>
                    <tr class="bg-secondary-container/40 text-primary">
    <th class="p-4">رقم الطلب</th>
    <th class="p-4">التفاصيل</th>
    <th class="p-4">الزبون</th>
    <th class="p-4">الهاتف</th>
    <th class="p-4">طريقة الدفع</th>
    <th class="p-4">الإجمالي</th>
    <th class="p-4">الحالة</th>
    <th class="p-4">تحديث الحالة</th>
    <th class="p-4">التاريخ</th>
</tr>
                </thead>

                <tbody>

                    @foreach($orders as $order)

                        <tr class="border-b border-outline-variant hover:bg-surface-container/40 transition-all">

                            <td class="p-4 font-bold text-primary">
                                #{{ $order->id }}
                            </td>
                            <td class="p-4">
    <a href="{{ route('admin.orders.details', $order->id) }}"
       class="inline-flex items-center gap-2 px-4 py-2 rounded-xl border border-emerald-200 text-emerald-800 hover:bg-emerald-50 transition-all text-sm font-bold">

        <span class="material-symbols-outlined text-[18px]">
            visibility
        </span>

        عرض
    </a>
</td>

                            <td class="p-4">
                                <div class="font-bold text-primary">
                                    {{ $order->full_name }}
                                </div>

                                <div class="text-sm text-on-surface-variant">
                                    {{ $order->user->email ?? 'غير معروف' }}
                                </div>
                            </td>

                            <td class="p-4" dir="ltr">
                                {{ $order->phone }}
                            </td>

                            <td class="p-4">
                                {{ $paymentLabels[$order->payment_method] ?? $order->payment_method }}

                                @if($order->payment_method === 'sham_cash' && $order->payment_reference)
                                    <div class="text-sm text-on-surface-variant mt-1">
                                        رقم العملية: {{ $order->payment_reference }}
                                    </div>
                                @endif
                            </td>

                            <td class="p-4 font-bold text-primary">
                                {{ number_format($order->total_price) }} ل.س
                            </td>

                            <td class="p-4">
                                <span class="px-3 py-1 rounded-full bg-amber-100 text-amber-700 text-sm font-bold">
                                    {{ $statusLabels[$order->status] ?? $order->status }}
                                </span>
                            </td>

                            <td class="p-4">
                                <form action="{{ route('admin.orders.status', $order->id) }}" method="POST" class="flex items-center gap-2">
                                    @csrf
                                    @method('PATCH')

                                    <select
                                        name="status"
                                        class="border border-outline-variant rounded-xl px-3 py-2 bg-white text-sm">

                                        <option value="pending" {{ $order->status === 'pending' ? 'selected' : '' }}>
                                            قيد المراجعة
                                        </option>

                                        <option value="accepted" {{ $order->status === 'accepted' ? 'selected' : '' }}>
                                            تم القبول
                                        </option>

                                        <option value="preparing" {{ $order->status === 'preparing' ? 'selected' : '' }}>
                                            قيد التجهيز
                                        </option>

                                        <option value="delivered" {{ $order->status === 'delivered' ? 'selected' : '' }}>
                                            تم التسليم
                                        </option>

                                        <option value="cancelled" {{ $order->status === 'cancelled' ? 'selected' : '' }}>
                                            ملغي
                                        </option>

                                    </select>

                                    <button
                                        type="submit"
                                        class="px-4 py-2 rounded-xl bg-primary text-white text-sm font-bold hover:bg-primary/90 transition-all">
                                        حفظ
                                    </button>
                                </form>
                            </td>

                            <td class="p-4 text-sm text-on-surface-variant">
                                {{ $order->created_at->format('Y-m-d') }}
                            </td>

                        </tr>

                    @endforeach

                </tbody>

            </table>

        </div>

    @endif

</main>

@endsection