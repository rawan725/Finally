@extends('layouts.app')

@section('content')

<main class="max-w-7xl mx-auto px-6 py-12" dir="rtl">

    <div class="mb-10 text-right">

        <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-emerald-50 text-emerald-800 font-bold text-sm mb-4">
            <span class="material-symbols-outlined text-[20px]">
                medical_services
            </span>

            استشاراتي الطبية
        </div>

        <h1 class="text-4xl font-black text-emerald-900 mb-3">
            استشاراتي وحجوزاتي
        </h1>

        <p class="text-emerald-900/60">
            يمكنك هنا متابعة طلبات الحجز والاستشارات الطبية الخاصة بحيوانك الأليف.
        </p>

    </div>

    <section class="space-y-6">

        @forelse($bookings as $booking)

            @php
                $statusLabels = [
                    'pending' => 'قيد الانتظار',
                    'accepted' => 'تم القبول',
                    'completed' => 'مكتملة',
                    'cancelled' => 'ملغية',
                ];

                $statusStyles = [
                    'pending' => 'background:#fef3c7; color:#92400e;',
                    'accepted' => 'background:#dcfce7; color:#166534;',
                    'completed' => 'background:#dbeafe; color:#1d4ed8;',
                    'cancelled' => 'background:#fee2e2; color:#991b1b;',
                ];

                $typeLabel = $booking->consultation_type === 'online'
                    ? 'استشارة أونلاين'
                    : 'حجز موعد عيادة';

                $typeStyle = $booking->consultation_type === 'online'
                    ? 'background:#dbeafe; color:#1d4ed8;'
                    : 'background:#d1fae5; color:#065f46;';

                $severityLabels = [
                    'simple' => 'بسيطة',
                    'moderate' => 'متوسطة',
                    'emergency' => 'طارئة',
                ];

                $severityStyles = [
                    'simple' => 'background:#dcfce7; color:#166534;',
                    'moderate' => 'background:#fef3c7; color:#92400e;',
                    'emergency' => 'background:#fee2e2; color:#991b1b;',
                ];
            @endphp

            <article class="bg-white rounded-[30px] border border-emerald-100 shadow-[0_10px_35px_rgba(27,67,50,0.06)] overflow-hidden">

                <div class="bg-gradient-to-l from-emerald-50 to-white px-6 py-5 border-b border-emerald-100">

                    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">

                        <div class="text-right">
                            <h2 class="text-xl font-black text-emerald-900">
                                طلب رقم #{{ $booking->id }}
                            </h2>

                            <p class="text-sm text-emerald-900/60">
                                تاريخ الطلب:
                                {{ $booking->created_at ? $booking->created_at->format('Y-m-d') : 'غير محدد' }}
                            </p>
                        </div>

                        <div class="flex flex-wrap gap-3">

                            <span style="{{ $typeStyle }} padding:8px 14px; border-radius:9999px; font-weight:800; font-size:14px;">
                                {{ $typeLabel }}
                            </span>

                            <span style="{{ $statusStyles[$booking->status] ?? $statusStyles['pending'] }} padding:8px 14px; border-radius:9999px; font-weight:800; font-size:14px;">
                                {{ $statusLabels[$booking->status] ?? 'قيد الانتظار' }}
                            </span>

                        </div>

                    </div>

                </div>

                <div class="p-6 grid grid-cols-1 md:grid-cols-3 gap-5">

                    <div class="rounded-3xl bg-emerald-50 p-5 border border-emerald-100">

                        <div class="w-11 h-11 rounded-2xl bg-white flex items-center justify-center text-emerald-800 mb-4">
                            <span class="material-symbols-outlined">
                                medical_services
                            </span>
                        </div>

                        <p class="text-xs text-emerald-900/50 mb-1">
                            الطبيب
                        </p>

                        <h3 class="font-black text-emerald-900 text-lg">
                            {{ $booking->doctor->name ?? 'طبيب غير محدد' }}
                        </h3>

                        <p class="text-sm text-emerald-700">
                            {{ $booking->doctor->specialty ?? '' }}
                        </p>

                    </div>

                    <div class="rounded-3xl bg-white p-5 border border-emerald-100">

                        <div class="w-11 h-11 rounded-2xl bg-emerald-50 flex items-center justify-center text-emerald-800 mb-4">
                            <span class="material-symbols-outlined">
                                pets
                            </span>
                        </div>

                        <p class="text-xs text-emerald-900/50 mb-1">
                            الحيوان
                        </p>

                        <h3 class="font-black text-emerald-900 text-lg">
                            {{ $booking->pet_name }}
                        </h3>

                        <p class="text-sm text-emerald-700">
                            النوع: {{ $booking->pet_type }}
                        </p>

                    </div>

                    <div class="rounded-3xl bg-white p-5 border border-emerald-100">

                        <div class="w-11 h-11 rounded-2xl bg-emerald-50 flex items-center justify-center text-emerald-800 mb-4">
                            <span class="material-symbols-outlined">
                                calendar_month
                            </span>
                        </div>

                        <p class="text-xs text-emerald-900/50 mb-1">
                            الموعد
                        </p>

                        <h3 class="font-black text-emerald-900 text-lg">
                            {{ $booking->booking_date ?? 'غير محدد' }}
                        </h3>

                        <p class="text-sm text-emerald-700">
                            {{ $booking->booking_time ?? 'غير محدد' }}
                        </p>

                    </div>

                </div>

                <div class="px-6 pb-6">

                    <div class="rounded-3xl border border-emerald-100 p-5 bg-white text-right">

                        <div class="flex flex-col md:flex-row md:items-start md:justify-between gap-4 mb-4">

                            <div class="flex items-center gap-3">

                                <div class="w-10 h-10 rounded-2xl bg-emerald-50 flex items-center justify-center text-emerald-800">
                                    <span class="material-symbols-outlined">
                                        description
                                    </span>
                                </div>

                                <div>
                                    <p class="text-xs text-emerald-900/50">
                                        المشكلة
                                    </p>

                                    <h3 class="font-black text-emerald-900">
                                        {{ $booking->problem_title }}
                                    </h3>
                                </div>

                            </div>

                            <span style="{{ $severityStyles[$booking->severity_level] ?? $severityStyles['simple'] }} padding:8px 14px; border-radius:9999px; font-weight:800; font-size:14px; width:max-content;">
                                درجة الحالة: {{ $severityLabels[$booking->severity_level] ?? 'بسيطة' }}
                            </span>

                        </div>

                        <p class="text-emerald-900/60 leading-relaxed mb-5">
                            {{ $booking->problem_description }}
                        </p>

                        @if($booking->case_image)
                            <div class="mt-4">

                                <p class="text-sm font-bold text-emerald-900 mb-3">
                                    الصورة المرفقة:
                                </p>

                                <a href="{{ asset('images/doctor-bookings/' . $booking->case_image) }}"
                                   target="_blank">

                                    <img src="{{ asset('images/doctor-bookings/' . $booking->case_image) }}"
                                         alt="صورة الحالة"
                                         style="width:170px; height:120px; object-fit:cover;"
                                         class="rounded-2xl border border-emerald-100 shadow-sm">

                                </a>

                            </div>
                        @endif

                    </div>

                </div>

            </article>

        @empty

            <div class="bg-white rounded-[30px] border border-emerald-100 shadow-[0_10px_35px_rgba(27,67,50,0.06)] p-14 text-center">

                <div class="w-24 h-24 mx-auto rounded-full bg-emerald-50 flex items-center justify-center text-emerald-800 mb-5">
                    <span class="material-symbols-outlined text-[52px]">
                        assignment
                    </span>
                </div>

                <h2 class="text-2xl font-black text-emerald-900 mb-2">
                    لا توجد استشارات بعد
                </h2>

                <p class="text-emerald-900/60 mb-6">
                    عندما تحجزين موعدًا عند طبيب، سيظهر الطلب هنا.
                </p>

                <a href="{{ route('doctor') }}"
                   style="background-color:#065f46; color:white; padding:12px 28px; border-radius:9999px; font-weight:800; text-decoration:none; display:inline-flex;">
                    احجزي استشارة الآن
                </a>

            </div>

        @endforelse

    </section>

</main>

@endsection