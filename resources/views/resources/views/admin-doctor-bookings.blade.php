@extends('layouts.app')

@section('content')

<main class="max-w-7xl mx-auto px-6 py-12">

    <div class="mb-8 text-right">
        <h1 class="text-3xl font-bold text-emerald-900 mb-2">
            إدارة استشارات الأطباء
        </h1>

        <p class="text-emerald-900/60">
            من هنا يمكنك متابعة طلبات حجز المواعيد الطبية وتغيير حالتها.
        </p>
    </div>

    @if(session('success'))
        <div class="mb-6 p-4 rounded-2xl bg-green-100 text-green-700 font-bold text-right">
            {{ session('success') }}
        </div>
    @endif

    <section class="bg-white rounded-3xl border border-emerald-100 shadow-[0_8px_30px_rgba(27,67,50,0.06)] overflow-hidden">

        <div class="overflow-x-auto">

            <table class="w-full text-right">

                <thead>
                    <tr class="bg-emerald-50 text-emerald-900 text-sm">
                        <th class="px-6 py-4">المستخدم</th>
                        <th class="px-6 py-4">الطبيب</th>
                        <th class="px-6 py-4">نوع الطلب</th>
                        <th class="px-6 py-4">الحيوان</th>
                        <th class="px-6 py-4">المشكلة</th>
                        <th class="px-6 py-4">الموعد</th>
                        <th class="px-6 py-4">الحالة</th>
                        <th class="px-6 py-4">تعديل الحالة</th>
                    </tr>
                </thead>

                <tbody>

                    @forelse($bookings as $booking)

                        <tr class="border-t border-emerald-100 hover:bg-emerald-50/40 transition-all align-top">

                            <td class="px-6 py-4">
                                <div class="font-bold text-emerald-900">
                                    {{ $booking->user->name ?? 'مستخدم غير معروف' }}
                                </div>

                                <div class="text-sm text-emerald-900/60">
                                    {{ $booking->user->email ?? '' }}
                                </div>
                            </td>

                            <td class="px-6 py-4">
                                <div class="font-bold text-emerald-900">
                                    {{ $booking->doctor->name ?? 'طبيب غير محدد' }}
                                </div>

                                <div class="text-sm text-emerald-900/60">
                                    {{ $booking->doctor->specialty ?? '' }}
                                </div>
                            </td>

                            <td class="px-6 py-4">
                                @if($booking->consultation_type === 'online')
                                    <span class="px-3 py-1 rounded-full bg-blue-100 text-blue-700 text-sm font-bold">
                                        استشارة أونلاين
                                    </span>
                                @else
                                    <span class="px-3 py-1 rounded-full bg-emerald-100 text-emerald-700 text-sm font-bold">
                                        حجز موعد
                                    </span>
                                @endif
                            </td>

                            <td class="px-6 py-4">
                                <div class="font-bold text-emerald-900">
                                    {{ $booking->pet_name }}
                                </div>

                                <div class="text-sm text-emerald-900/60">
                                    {{ $booking->pet_type }}
                                </div>
                            </td>

                            <td class="px-6 py-4" style="min-width:260px;">
                                <div class="font-bold text-emerald-900 mb-1">
                                    {{ $booking->problem_title }}
                                </div>

                                <p class="text-sm text-emerald-900/60 leading-relaxed">
                                    {{ \Illuminate\Support\Str::limit($booking->problem_description, 90) }}
                                </p>
                            </td>

                            <td class="px-6 py-4">
                                <div class="font-bold text-emerald-900">
                                    {{ $booking->booking_date ?? 'غير محدد' }}
                                </div>

                                <div class="text-sm text-emerald-900/60">
                                    {{ $booking->booking_time ?? 'غير محدد' }}
                                </div>
                            </td>

                            <td class="px-6 py-4">
                                @if($booking->status === 'pending')
                                    <span class="px-3 py-1 rounded-full bg-yellow-100 text-yellow-700 text-sm font-bold">
                                        قيد الانتظار
                                    </span>
                                @elseif($booking->status === 'accepted')
                                    <span class="px-3 py-1 rounded-full bg-green-100 text-green-700 text-sm font-bold">
                                        مقبول
                                    </span>
                                @elseif($booking->status === 'completed')
                                    <span class="px-3 py-1 rounded-full bg-blue-100 text-blue-700 text-sm font-bold">
                                        مكتمل
                                    </span>
                                @else
                                    <span class="px-3 py-1 rounded-full bg-red-100 text-red-700 text-sm font-bold">
                                        ملغي
                                    </span>
                                @endif
                            </td>

                            <td class="px-6 py-4">

                                <form action="{{ route('admin.doctor.bookings.status', $booking->id) }}"
                                      method="POST"
                                      class="flex items-center gap-2">

                                    @csrf
                                    @method('PATCH')

                                    <select name="status"
                                            class="rounded-xl border border-emerald-100 px-3 py-2 text-sm focus:outline-none focus:border-emerald-800">

                                        <option value="pending" {{ $booking->status === 'pending' ? 'selected' : '' }}>
                                            قيد الانتظار
                                        </option>

                                        <option value="accepted" {{ $booking->status === 'accepted' ? 'selected' : '' }}>
                                            مقبول
                                        </option>

                                        <option value="completed" {{ $booking->status === 'completed' ? 'selected' : '' }}>
                                            مكتمل
                                        </option>

                                        <option value="cancelled" {{ $booking->status === 'cancelled' ? 'selected' : '' }}>
                                            ملغي
                                        </option>

                                    </select>

                                    <button type="submit"
                                            style="background-color:#065f46; color:white; padding:8px 14px; border-radius:9999px; font-weight:700; border:none; cursor:pointer;">
                                        حفظ
                                    </button>

                                </form>

                            </td>

                        </tr>

                    @empty

                        <tr>
                            <td colspan="8" class="px-6 py-12 text-center">

                                <div class="w-20 h-20 mx-auto rounded-full bg-emerald-50 flex items-center justify-center text-emerald-800 mb-4">
                                    <span class="material-symbols-outlined text-[42px]">
                                        assignment
                                    </span>
                                </div>

                                <h2 class="text-xl font-bold text-emerald-900 mb-2">
                                    لا توجد استشارات بعد
                                </h2>

                                <p class="text-emerald-900/60">
                                    عندما يقوم المستخدم بحجز موعد عند طبيب، سيظهر الطلب هنا.
                                </p>

                            </td>
                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </section>

</main>

@endsection