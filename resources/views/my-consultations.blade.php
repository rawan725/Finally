@extends('layouts.app')

@section('content')

<section class="min-h-screen bg-emerald-50/40 py-10 px-4">

    <div class="max-w-7xl mx-auto">

        <!-- Header -->
        <div class="bg-white rounded-[2rem] p-8 shadow-sm border border-emerald-100 mb-8">

            <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-6">

                <div class="text-right">
                    <span class="inline-flex px-4 py-2 rounded-full bg-emerald-100 text-emerald-800 text-sm font-bold mb-4">
                        Pet Owner Portal
                    </span>

                    <h1 class="text-3xl md:text-4xl font-black text-emerald-900 mb-3">
                        استشاراتي وحجوزاتي الطبية
                    </h1>

                    <p class="text-emerald-900/60 leading-relaxed max-w-2xl">
                        يمكنك من هنا متابعة طلبات الاستشارة الطبية وحجوزات الأطباء، ومعرفة حالة كل طلب.
                    </p>
                </div>

                <div class="w-24 h-24 rounded-3xl bg-emerald-900 text-white flex items-center justify-center shadow-lg shadow-emerald-900/20">
                    <span class="material-symbols-outlined text-[52px]">
                        medical_services
                    </span>
                </div>

            </div>

        </div>

        @if($bookings->count() > 0)

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">

                @foreach($bookings as $booking)

                    <div class="bg-white rounded-[2rem] p-6 border border-emerald-100 shadow-sm">

                        <div class="flex items-start justify-between gap-4 mb-6">

                            <div class="text-right">
                                <h2 class="text-2xl font-black text-emerald-900 mb-2">
                                    {{ $booking->problem_title }}
                                </h2>

                                <p class="text-emerald-900/60 text-sm">
                                    الطبيب:
                                    <span class="font-bold text-emerald-800">
                                        {{ $booking->doctor->name ?? 'غير محدد' }}
                                    </span>
                                </p>
                            </div>

                            @if($booking->status == 'pending')
                                <span class="px-4 py-2 rounded-full bg-yellow-100 text-yellow-700 text-xs font-bold">
                                    قيد المراجعة
                                </span>
                            @elseif($booking->status == 'accepted')
                                <span class="px-4 py-2 rounded-full bg-green-100 text-green-700 text-xs font-bold">
                                    مقبول
                                </span>
                            @elseif($booking->status == 'completed')
                                <span class="px-4 py-2 rounded-full bg-blue-100 text-blue-700 text-xs font-bold">
                                    مكتمل
                                </span>
                            @elseif($booking->status == 'cancelled')
                                <span class="px-4 py-2 rounded-full bg-red-100 text-red-700 text-xs font-bold">
                                    ملغى
                                </span>
                            @else
                                <span class="px-4 py-2 rounded-full bg-gray-100 text-gray-700 text-xs font-bold">
                                    {{ $booking->status }}
                                </span>
                            @endif

                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-5">

                            <div class="bg-emerald-50 rounded-2xl p-4">
                                <p class="text-xs text-emerald-900/60 mb-1">
                                    اسم الحيوان
                                </p>

                                <p class="font-bold text-emerald-900">
                                    {{ $booking->pet_name }}
                                </p>
                            </div>

                            <div class="bg-emerald-50 rounded-2xl p-4">
                                <p class="text-xs text-emerald-900/60 mb-1">
                                    نوع الحيوان
                                </p>

                                <p class="font-bold text-emerald-900">
                                    {{ $booking->pet_type }}
                                </p>
                            </div>

                            <div class="bg-emerald-50 rounded-2xl p-4">
                                <p class="text-xs text-emerald-900/60 mb-1">
                                    نوع الخدمة
                                </p>

                                <p class="font-bold text-emerald-900">
                                    {{ $booking->consultation_type == 'online' ? 'استشارة أونلاين' : 'حجز موعد بالعيادة' }}
                                </p>
                            </div>

                            <div class="bg-emerald-50 rounded-2xl p-4">
                                <p class="text-xs text-emerald-900/60 mb-1">
                                    التاريخ والوقت
                                </p>

                                <p class="font-bold text-emerald-900">
                                    {{ $booking->booking_date ?? 'غير محدد' }}
                                    -
                                    {{ $booking->booking_time ?? 'غير محدد' }}
                                </p>
                            </div>

                        </div>

                        <div class="bg-slate-50 rounded-2xl p-4 mb-5">

                            <p class="text-xs text-slate-500 mb-2">
                                تفاصيل الحالة
                            </p>

                            <p class="text-slate-700 leading-relaxed text-sm">
                                {{ $booking->problem_description }}
                            </p>

                        </div>

                        <div class="flex flex-col sm:flex-row gap-3">

                            <a href="{{ route('doctor') }}"
                               class="flex-1 text-center py-3 px-5 rounded-2xl bg-emerald-900 text-white font-bold hover:bg-emerald-800 transition-all">
                                حجز استشارة جديدة
                            </a>

                            <a href="{{ route('dashboard') }}"
                               class="flex-1 text-center py-3 px-5 rounded-2xl bg-emerald-50 text-emerald-900 font-bold border border-emerald-100 hover:bg-emerald-100 transition-all">
                                رجوع للوحة المستخدم
                            </a>

                        </div>

                    </div>

                @endforeach

            </div>

        @else

            <div class="bg-white rounded-[2rem] p-12 text-center border border-emerald-100 shadow-sm">

                <div class="w-24 h-24 mx-auto rounded-full bg-emerald-50 text-emerald-800 flex items-center justify-center mb-6">
                    <span class="material-symbols-outlined text-[52px]">
                        event_busy
                    </span>
                </div>

                <h2 class="text-2xl font-black text-emerald-900 mb-3">
                    لا توجد استشارات بعد
                </h2>

                <p class="text-emerald-900/60 mb-8">
                    يمكنك اختيار طبيب والبدء بحجز موعد أو استشارة أونلاين.
                </p>

                <a href="{{ route('doctor') }}"
                   class="inline-flex items-center gap-2 px-8 py-4 rounded-full bg-emerald-900 text-white font-bold hover:bg-emerald-800 transition-all">

                    <span class="material-symbols-outlined">
                        medical_services
                    </span>

                    <span>
                        اختيار طبيب
                    </span>

                </a>

            </div>

        @endif

    </div>

</section>

@endsection