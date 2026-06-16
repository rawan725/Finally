@extends('layouts.app')

@section('content')

<style>
    .doctors-grid {
        display: grid;
        grid-template-columns: repeat(3, 320px);
        gap: 28px;
        justify-content: center;
        align-items: start;
    }

    .doctor-card {
        width: 320px;
        max-width: 100%;
    }

    .doctor-image-box {
        height: 230px;
    }

    @media (max-width: 1100px) {
        .doctors-grid {
            grid-template-columns: repeat(2, 320px);
        }
    }

    @media (max-width: 700px) {
        .doctors-grid {
            grid-template-columns: 1fr;
        }

        .doctor-card {
            width: 100%;
        }
    }
</style>

<!-- Hero Section -->
<section class="relative py-20 px-6 overflow-hidden">

    <div class="absolute inset-0 bg-gradient-to-br from-emerald-50 via-white to-emerald-50 -z-10"></div>

    <div class="max-w-4xl mx-auto text-center space-y-6">

        <h1 class="text-4xl md:text-5xl font-black text-emerald-900 leading-tight">
            نخبة من أفضل الأطباء البيطريين لتقديم الرعاية الصحية اللازمة لحيوانك الأليف
        </h1>

        <p class="text-lg text-emerald-900/60 max-w-2xl mx-auto leading-relaxed">
            نحن نهتم بصحة حيوانك الأليف كما نهتم بك. اختاري الطبيب المناسب واحجزي موعدًا أو استشارة واتساب بسهولة.
        </p>

        <div class="pt-4">
            <a href="#doctors"
               style="background-color:#065f46; color:white; padding:14px 32px; border-radius:9999px; display:inline-flex; align-items:center; gap:10px; font-weight:700; text-decoration:none; box-shadow:0 10px 25px rgba(6,95,70,0.25);">

                <span>احجزي موعد الآن</span>

                <span class="material-symbols-outlined">
                    calendar_month
                </span>

            </a>
        </div>

    </div>

</section>

<!-- Doctors Grid Section -->
<section id="doctors" class="max-w-7xl mx-auto px-6 py-16">

    @if(session('success'))
        <div class="mb-8 p-4 rounded-2xl bg-green-100 text-green-700 font-bold text-right">
            {{ session('success') }}
        </div>
    @endif

    <div class="doctors-grid">

        @forelse($doctors as $doctor)

            @php
                $cleanWhatsapp = preg_replace('/\D+/', '', $doctor->whatsapp_number ?? '');

                $whatsappText = "مرحبا دكتور " . $doctor->name . "، أنا من منصة Smart Pet.\n"
                    . "أريد استشارة أونلاين لحيواني الأليف.\n\n"
                    . "اسم الحيوان:\n"
                    . "نوع الحيوان:\n"
                    . "المشكلة:\n";

                $whatsappUrl = $cleanWhatsapp
                    ? 'https://wa.me/' . $cleanWhatsapp . '?text=' . rawurlencode($whatsappText)
                    : null;
            @endphp

            <div class="doctor-card group bg-white rounded-[24px] overflow-hidden shadow-[0px_4px_20px_rgba(27,67,50,0.04)] border border-emerald-100 hover:shadow-[0px_10px_30px_rgba(27,67,50,0.10)] transition-all duration-300">

                <div class="doctor-image-box overflow-hidden relative bg-emerald-50 flex items-center justify-center">

                    @if($doctor->image)
                        <img
                            src="{{ asset('images/doctors/' . $doctor->image) }}"
                            alt="{{ $doctor->name }}"
                            class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"
                        >
                    @else
                        <div class="w-full h-full flex flex-col items-center justify-center bg-gradient-to-br from-emerald-50 to-emerald-100">

                            <div class="w-32 h-32 rounded-full bg-white border border-emerald-100 flex items-center justify-center text-emerald-800 shadow-md">
                                <span class="material-symbols-outlined text-[72px]">
                                    medical_services
                                </span>
                            </div>

                            <p class="mt-4 text-emerald-900 font-bold">
                                طبيب بيطري
                            </p>

                        </div>
                    @endif

                    <div class="absolute top-4 right-4 bg-white/90 backdrop-blur px-3 py-1 rounded-full flex items-center gap-1 shadow-sm">

                        <span class="material-symbols-outlined text-yellow-500 text-sm" style="font-variation-settings: 'FILL' 1;">
                            star
                        </span>

                        <span class="text-sm font-bold text-emerald-900">
                            4.9
                        </span>

                    </div>

                    <div class="absolute top-4 left-4">
                        @if($doctor->is_available)
                            <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-xs font-bold">
                                متاح
                            </span>
                        @else
                            <span class="bg-red-100 text-red-700 px-3 py-1 rounded-full text-xs font-bold">
                                غير متاح
                            </span>
                        @endif
                    </div>

                </div>

                <div class="p-6 text-right">

                    <h3 class="text-2xl font-bold text-emerald-900 mb-1">
                        {{ $doctor->name }}
                    </h3>

                    <p class="text-emerald-700 font-bold mb-4">
                        {{ $doctor->specialty }}
                    </p>

                    <p class="text-emerald-900/60 text-sm leading-relaxed mb-5 min-h-[60px]">
                        {{ $doctor->bio }}
                    </p>

                    <div class="grid grid-cols-2 gap-3 mb-5">

                        <div class="rounded-2xl bg-emerald-50 p-4">
                            <span class="text-xs text-emerald-900/60 block mb-1">
                                الخبرة
                            </span>

                            <span class="font-bold text-emerald-900">
                                +{{ $doctor->experience_years }} سنوات
                            </span>
                        </div>

                        <div class="rounded-2xl bg-emerald-50 p-4">
                            <span class="text-xs text-emerald-900/60 block mb-1">
                                سعر الاستشارة
                            </span>

                            <span class="font-bold text-emerald-900">
                                {{ number_format($doctor->consultation_price) }} ل.س
                            </span>
                        </div>

                    </div>

                    @if($doctor->response_time)
                        <div class="mb-5 rounded-2xl bg-emerald-50 px-4 py-3 text-emerald-900 text-sm font-bold flex items-center justify-center gap-2">
                            <span class="material-symbols-outlined text-[20px]">
                                schedule
                            </span>

                            <span>
                                وقت الاستجابة: {{ $doctor->response_time }}
                            </span>
                        </div>
                    @endif

                    <div class="flex flex-col gap-3 border-t border-emerald-50 pt-5">

                        <a href="{{ route('doctor.book', ['doctor' => $doctor->id, 'type' => 'appointment']) }}"
                           style="background-color:#065f46; color:white; padding:12px 18px; border-radius:9999px; text-align:center; font-weight:700; text-decoration:none; display:flex; align-items:center; justify-content:center; gap:8px;">

                            <span class="material-symbols-outlined">
                                calendar_month
                            </span>

                            <span>
                                حجز موعد عند الطبيب
                            </span>
                        </a>

                        @if($whatsappUrl)

                            <a href="{{ $whatsappUrl }}"
                               target="_blank"
                               style="border:1px solid #a7f3d0; color:#065f46; padding:12px 18px; border-radius:9999px; text-align:center; font-weight:700; text-decoration:none; display:flex; align-items:center; justify-content:center; gap:8px;">

                                <span class="material-symbols-outlined">
                                    chat
                                </span>

                                <span>
                                    استشارة واتساب فورية
                                </span>
                            </a>

                        @else

                            <button type="button"
                                    disabled
                                    style="border:1px solid #e5e7eb; color:#9ca3af; padding:12px 18px; border-radius:9999px; text-align:center; font-weight:700; background:#f9fafb; display:flex; align-items:center; justify-content:center; gap:8px; cursor:not-allowed;">

                                <span class="material-symbols-outlined">
                                    chat
                                </span>

                                <span>
                                    واتساب غير متاح
                                </span>
                            </button>

                        @endif

                    </div>

                </div>

            </div>

        @empty

            <div style="grid-column: 1 / -1;" class="bg-white rounded-[24px] p-12 text-center border border-emerald-100 shadow-[0px_4px_20px_rgba(27,67,50,0.04)]">

                <div class="w-24 h-24 mx-auto rounded-full bg-emerald-50 flex items-center justify-center text-emerald-800 mb-5">
                    <span class="material-symbols-outlined text-[52px]">
                        medical_services
                    </span>
                </div>

                <h2 class="text-2xl font-bold text-emerald-900 mb-2">
                    لا يوجد أطباء حالياً
                </h2>

                <p class="text-emerald-900/60">
                    سيتم عرض الأطباء هنا عند إضافتهم من لوحة الإدارة.
                </p>

            </div>

        @endforelse

    </div>

</section>

<!-- CTA Section -->
<section class="max-w-7xl mx-auto px-6 mb-20">

    <div class="bg-emerald-900 rounded-[32px] p-12 text-center text-white relative overflow-hidden">

        <h2 class="text-3xl font-bold mb-4 relative z-10">
            هل تحتاجين لمساعدة فورية؟
        </h2>

        <p class="text-base mb-8 opacity-80 max-w-xl mx-auto relative z-10">
            أطباؤنا متواجدون للرد على الاستفسارات العاجلة عبر الاستشارة الفورية.
        </p>

        <a href="#doctors"
           style="background-color:#d1fae5; color:#065f46; padding:14px 36px; border-radius:9999px; font-weight:800; text-decoration:none; display:inline-flex; align-items:center; gap:8px; position:relative; z-index:10;">

            <span class="material-symbols-outlined">
                support_agent
            </span>

            <span>
                تواصلي مع طبيب الآن
            </span>

        </a>

    </div>

</section>

@endsection