@extends('layouts.app')

@section('content')

<style>
    .bookings-wrapper {
        direction: rtl;
    }

    .stats-grid {
        display: grid;
        grid-template-columns: repeat(4, minmax(180px, 1fr));
        gap: 18px;
    }

    .booking-info-grid {
        display: grid;
        grid-template-columns: repeat(4, minmax(180px, 1fr));
        gap: 16px;
    }

    .info-box {
        background: #f8fffb;
        border: 1px solid #d1fae5;
        border-radius: 24px;
        padding: 20px;
        min-height: 135px;
    }

    .info-icon {
        width: 44px;
        height: 44px;
        border-radius: 16px;
        background: white;
        border: 1px solid #d1fae5;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #065f46;
        margin-bottom: 14px;
    }

    @media (max-width: 1100px) {
        .stats-grid {
            grid-template-columns: repeat(2, 1fr);
        }

        .booking-info-grid {
            grid-template-columns: repeat(2, 1fr);
        }
    }

    @media (max-width: 700px) {
        .stats-grid,
        .booking-info-grid {
            grid-template-columns: 1fr;
        }
    }
</style>

<main class="bookings-wrapper max-w-7xl mx-auto px-6 py-12">

    <!-- Header -->
    <div class="mb-10 text-right">

        <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-emerald-50 text-emerald-800 font-bold text-sm mb-4">
            <span class="material-symbols-outlined text-[20px]">
                assignment
            </span>

            <span>
                لوحة متابعة الاستشارات
            </span>
        </div>

        <h1 class="text-4xl font-black text-emerald-900 mb-3">
            إدارة استشارات الأطباء
        </h1>

        <p class="text-emerald-900/60 max-w-2xl leading-relaxed">
            متابعة طلبات حجز المواعيد الطبية، معرفة الطبيب المختار، تفاصيل حالة الحيوان، وتعديل حالة كل طلب بسهولة.
        </p>

    </div>

    @if(session('success'))
        <div class="mb-8 p-5 rounded-3xl bg-green-100 text-green-800 font-bold text-right border border-green-200 flex items-center gap-3">
            <span class="material-symbols-outlined">
                check_circle
            </span>

            <span>
                {{ session('success') }}
            </span>
        </div>
    @endif

    <!-- Stats -->
    <div class="stats-grid mb-10">

        <div class="bg-white rounded-3xl p-6 border border-emerald-100 shadow-[0_8px_30px_rgba(27,67,50,0.05)] text-right">
            <p class="text-sm text-emerald-900/50 mb-2">كل الطلبات</p>

            <h2 class="text-3xl font-black text-emerald-900">
                {{ $bookings->count() }}
            </h2>
        </div>

        <div class="bg-white rounded-3xl p-6 border border-yellow-100 shadow-[0_8px_30px_rgba(27,67,50,0.05)] text-right">
            <p class="text-sm text-yellow-700/70 mb-2">قيد الانتظار</p>

            <h2 class="text-3xl font-black text-yellow-700">
                {{ $bookings->where('status', 'pending')->count() }}
            </h2>
        </div>

        <div class="bg-white rounded-3xl p-6 border border-green-100 shadow-[0_8px_30px_rgba(27,67,50,0.05)] text-right">
            <p class="text-sm text-green-700/70 mb-2">مقبولة</p>

            <h2 class="text-3xl font-black text-green-700">
                {{ $bookings->where('status', 'accepted')->count() }}
            </h2>
        </div>

        <div class="bg-white rounded-3xl p-6 border border-blue-100 shadow-[0_8px_30px_rgba(27,67,50,0.05)] text-right">
            <p class="text-sm text-blue-700/70 mb-2">مكتملة</p>

            <h2 class="text-3xl font-black text-blue-700">
                {{ $bookings->where('status', 'completed')->count() }}
            </h2>
        </div>

    </div>

    <!-- Bookings -->
    <section class="space-y-7">

        @forelse($bookings as $booking)

            @php
                $statusLabels = [
                    'pending' => 'قيد الانتظار',
                    'accepted' => 'مقبول',
                    'completed' => 'مكتمل',
                    'cancelled' => 'ملغي',
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
            @endphp

            <article class="bg-white rounded-[32px] border border-emerald-100 shadow-[0_10px_35px_rgba(27,67,50,0.06)] overflow-hidden">

                <!-- Card Header -->
                <div class="bg-gradient-to-l from-emerald-50 to-white px-6 py-5 border-b border-emerald-100">

                    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">

                        <div class="text-right">

                            <div class="flex items-center gap-2 mb-1">
                                <span class="text-sm text-emerald-900/50">
                                    رقم الطلب
                                </span>

                                <span class="text-xl font-black text-emerald-900">
                                    #{{ $booking->id }}
                                </span>
                            </div>

                            <p class="text-sm text-emerald-900/60">
                                تم إنشاء الطلب بتاريخ
                                {{ $booking->created_at ? $booking->created_at->format('Y-m-d') : 'غير محدد' }}
                            </p>

                        </div>

                        <div class="flex flex-wrap items-center gap-3">

                            <span style="{{ $typeStyle }} padding:9px 16px; border-radius:9999px; font-weight:900; font-size:14px;">
                                {{ $typeLabel }}
                            </span>

                            <span style="{{ $statusStyles[$booking->status] ?? $statusStyles['pending'] }} padding:9px 16px; border-radius:9999px; font-weight:900; font-size:14px;">
                                {{ $statusLabels[$booking->status] ?? 'قيد الانتظار' }}
                            </span>

                        </div>

                    </div>

                </div>

                <!-- Card Body -->
                <div class="p-6">

                    <div class="booking-info-grid">

                        <!-- User -->
                        <div class="info-box">

                            <div class="info-icon">
                                <span class="material-symbols-outlined">
                                    person
                                </span>
                            </div>

                            <p class="text-xs text-emerald-900/50 mb-1">
                                المستخدم
                            </p>

                            <h3 class="text-lg font-black text-emerald-900 mb-1">
                                {{ $booking->user->name ?? 'مستخدم غير معروف' }}
                            </h3>

                            <p class="text-sm text-emerald-900/60 break-all">
                                {{ $booking->user->email ?? '' }}
                            </p>

                        </div>

                        <!-- Doctor -->
                        <div class="info-box">

                            <div class="info-icon">
                                <span class="material-symbols-outlined">
                                    medical_services
                                </span>
                            </div>

                            <p class="text-xs text-emerald-900/50 mb-1">
                                الطبيب المختار
                            </p>

                            <h3 class="text-lg font-black text-emerald-900 mb-1">
                                {{ $booking->doctor->name ?? 'طبيب غير محدد' }}
                            </h3>

                            <p class="text-sm text-emerald-700 leading-relaxed">
                                {{ $booking->doctor->specialty ?? '' }}
                            </p>

                        </div>

                        <!-- Pet -->
                        <div class="info-box">

                            <div class="info-icon">
                                <span class="material-symbols-outlined">
                                    pets
                                </span>
                            </div>

                            <p class="text-xs text-emerald-900/50 mb-1">
                                الحيوان الأليف
                            </p>

                            <h3 class="text-lg font-black text-emerald-900 mb-1">
                                {{ $booking->pet_name }}
                            </h3>

                            <p class="text-sm text-emerald-700">
                                النوع: {{ $booking->pet_type }}
                            </p>

                        </div>

                        <!-- Date -->
                        <div class="info-box">

                            <div class="info-icon">
                                <span class="material-symbols-outlined">
                                    calendar_month
                                </span>
                            </div>

                            <p class="text-xs text-emerald-900/50 mb-1">
                                الموعد المطلوب
                            </p>

                            <h3 class="text-lg font-black text-emerald-900 mb-1">
                                {{ $booking->booking_date ?? 'غير محدد' }}
                            </h3>

                            <p class="text-sm text-emerald-700">
                                {{ $booking->booking_time ?? 'غير محدد' }}
                            </p>

                        </div>

                    </div>

                    <!-- Problem + Severity + Image -->
<div class="mt-6 rounded-3xl border border-emerald-100 bg-white p-6 text-right">

    @php
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

    <div class="flex flex-col md:flex-row md:items-start md:justify-between gap-5 mb-5">

        <div class="flex items-start gap-3">

            <div class="w-11 h-11 rounded-2xl bg-emerald-50 flex items-center justify-center text-emerald-800 shrink-0">
                <span class="material-symbols-outlined">
                    description
                </span>
            </div>

            <div>
                <p class="text-xs text-emerald-900/50 mb-1">
                    تفاصيل المشكلة
                </p>

                <h3 class="text-xl font-black text-emerald-900">
                    {{ $booking->problem_title }}
                </h3>
            </div>

        </div>

        <span style="{{ $severityStyles[$booking->severity_level] ?? $severityStyles['simple'] }} padding:9px 16px; border-radius:9999px; font-weight:900; font-size:14px; display:inline-flex; align-items:center; gap:6px; width:max-content;">
            <span class="material-symbols-outlined text-[18px]">
                priority_high
            </span>

            درجة الحالة: {{ $severityLabels[$booking->severity_level] ?? 'بسيطة' }}
        </span>

    </div>

    <p class="text-emerald-900/60 leading-relaxed mb-5">
        {{ $booking->problem_description }}
    </p>

    @if($booking->case_image)
        <div class="mt-5">

            <p class="text-sm font-bold text-emerald-900 mb-3">
                صورة الحالة المرفقة:
            </p>

            <a href="{{ asset('images/doctor-bookings/' . $booking->case_image) }}"
               target="_blank"
               class="inline-block">

                <img src="{{ asset('images/doctor-bookings/' . $booking->case_image) }}"
                     alt="صورة الحالة"
                     style="width:180px; height:130px; object-fit:cover;"
                     class="rounded-2xl border border-emerald-100 shadow-sm hover:scale-105 transition-all">

            </a>

        </div>
    @else
        <div class="mt-5 rounded-2xl bg-emerald-50 border border-emerald-100 p-4 text-sm text-emerald-900/60">
            لا توجد صورة مرفقة للحالة.
        </div>
    @endif

</div>
                                <p class="text-xs text-emerald-900/50 mb-1">
                                    تفاصيل المشكلة
                                </p>

                                <h3 class="text-xl font-black text-emerald-900">
                                    {{ $booking->problem_title }}
                                </h3>
                            </div>

                        </div>

                        <p class="text-emerald-900/60 leading-relaxed">
                            {{ $booking->problem_description }}
                        </p>

                    </div>
<!-- معلومات الاستشارة والمشكلة والصورة فوق -->

<!-- SMS Simulation -->
<div class="mt-6 rounded-3xl bg-slate-50 border border-slate-100 p-5 text-right">

    <div class="flex items-start gap-3 mb-4 flex-row-reverse">

        <div class="w-11 h-11 rounded-2xl bg-white flex items-center justify-center text-emerald-800 border border-emerald-100">
            <span class="material-symbols-outlined">
                sms
            </span>
        </div>

        <div>
            <p class="text-xs text-emerald-900/50 mb-1">
                محاكاة SMS للطبيب
            </p>

            <h3 class="text-lg font-black text-emerald-900">
                إشعار الطبيب بالطلب
            </h3>
        </div>

    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">

        <div class="rounded-2xl bg-white border border-slate-100 p-4">
            <p class="text-xs text-slate-500 mb-1">
                رقم الطبيب
            </p>

            <p class="font-bold text-emerald-900" dir="ltr">
                {{ $booking->doctor->phone ?? $booking->doctor->whatsapp_number ?? 'لا يوجد رقم' }}
            </p>
        </div>

        <div class="rounded-2xl bg-white border border-slate-100 p-4">
            <p class="text-xs text-slate-500 mb-1">
                حالة الإرسال التجريبي
            </p>

            @if($booking->sms_sent)
                <span class="inline-flex px-3 py-1 rounded-full bg-green-100 text-green-700 text-sm font-bold">
                    تم إنشاء الإشعار
                </span>
            @else
                <span class="inline-flex px-3 py-1 rounded-full bg-red-100 text-red-700 text-sm font-bold">
                    لم يتم الإنشاء بسبب عدم وجود رقم
                </span>
            @endif
        </div>

    </div>

    <div class="rounded-2xl bg-white border border-slate-100 p-4">

        <p class="text-xs text-slate-500 mb-2">
            نص رسالة SMS التجريبية
        </p>

        <pre style="white-space:pre-wrap; direction:rtl; text-align:right; font-family:inherit;"
             class="text-sm text-emerald-900 leading-relaxed">{{ $booking->sms_message ?? 'لا توجد رسالة محفوظة لهذا الطلب' }}</pre>

        @if($booking->sms_sent_at)
            <p class="text-xs text-slate-400 mt-3">
                وقت الإرسال التجريبي: {{ $booking->sms_sent_at }}
            </p>
        @endif

    </div>

</div>

<!-- هون يجي فورم تعديل الحالة -->
<form action="{{ route('admin.doctor.bookings.status', $booking->id) }}"
      method="POST">
                    <!-- Status Form -->
                    <div class="mt-6 rounded-3xl bg-emerald-50 border border-emerald-100 p-5">

                        <form action="{{ route('admin.doctor.bookings.status', $booking->id) }}"
                              method="POST"
                              class="flex flex-col md:flex-row md:items-end gap-4">

                            @csrf
                            @method('PATCH')

                            <div class="flex-1 text-right">

                                <label class="block text-sm font-bold text-emerald-900 mb-2">
                                    تعديل حالة الطلب
                                </label>

                                <select name="status"
                                        class="w-full rounded-2xl border border-emerald-100 px-4 py-3 bg-white text-emerald-900 focus:outline-none focus:border-emerald-800">

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

                            </div>

                            <button type="submit"
                                    style="background-color:#065f46; color:white; padding:13px 28px; border-radius:9999px; font-weight:900; border:none; cursor:pointer; min-width:150px;">
                                حفظ الحالة
                            </button>

                        </form>

                        <form action="{{ route('admin.doctor.bookings.destroy', $booking->id) }}"
      method="POST"
      onsubmit="return confirm('هل أنتِ متأكدة من حذف هذه الاستشارة؟ سيتم حذفها نهائيًا.');"
      class="mt-4">

    @csrf
    @method('DELETE')

    <button type="submit"
            style="width:100%; background-color:#dc2626; color:white; padding:12px 16px; border-radius:9999px; font-weight:900; border:none; cursor:pointer; display:flex; align-items:center; justify-content:center; gap:8px;">

        <span class="material-symbols-outlined">
            delete
        </span>

        حذف الاستشارة
    </button>

</form>

                    </div>

                </div>

            </article>

        @empty

            <div class="bg-white rounded-[32px] border border-emerald-100 shadow-[0_10px_35px_rgba(27,67,50,0.06)] p-14 text-center">

                <div class="w-24 h-24 mx-auto rounded-full bg-emerald-50 flex items-center justify-center text-emerald-800 mb-5">
                    <span class="material-symbols-outlined text-[52px]">
                        assignment
                    </span>
                </div>

                <h2 class="text-2xl font-black text-emerald-900 mb-2">
                    لا توجد استشارات بعد
                </h2>

                <p class="text-emerald-900/60">
                    عندما يقوم المستخدم بحجز موعد عند طبيب، سيظهر الطلب هنا.
                </p>

            </div>

        @endforelse

    </section>

</main>

@endsection