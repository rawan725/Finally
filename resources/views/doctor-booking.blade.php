@extends('layouts.app')

@section('content')

@php
    $typeLabel = $type === 'online' ? 'استشارة أونلاين' : 'حجز موعد بالعيادة';
@endphp

<!-- Hero Section -->
<section class="relative bg-emerald-900 py-16 overflow-hidden">

    <div class="absolute inset-0 opacity-10">
        <svg class="absolute right-0 top-0 translate-x-1/4 -translate-y-1/4" height="400" viewBox="0 0 100 100" width="400">
            <circle cx="50" cy="50" fill="white" r="50"></circle>
        </svg>

        <svg class="absolute left-0 bottom-0 -translate-x-1/4 translate-y-1/4" height="300" viewBox="0 0 100 100" width="300">
            <rect fill="white" height="100" rx="20" width="100"></rect>
        </svg>
    </div>

    <div class="max-w-7xl mx-auto px-4 relative z-10 text-center">

        <span class="inline-block py-1 px-4 rounded-full bg-emerald-400/20 text-emerald-100 text-sm font-medium mb-4 border border-emerald-400/30">
            رعاية بيطرية متكاملة
        </span>

        <h1 class="text-4xl md:text-5xl font-bold text-white mb-6">
            {{ $typeLabel }}
        </h1>

        <p class="text-emerald-50 text-lg max-w-2xl mx-auto leading-relaxed">
            نحن نهتم بصحة أصدقائك الصغار. املئي البيانات التالية وسيتواصل معك الطبيب لمراجعة الحالة.
        </p>

    </div>
</section>

<!-- Main Content -->
<main class="max-w-7xl mx-auto px-4 py-12">

    @if(session('success'))
        <div class="mb-8 p-4 rounded-2xl bg-green-100 text-green-700 font-bold text-right">
            {{ session('success') }}
        </div>
    @endif

    @if($errors->any())
        <div class="mb-8 p-4 rounded-2xl bg-red-50 text-red-600 text-right">
            <ul class="list-disc pr-5">
                @foreach($errors->all() as $error)
                    <li class="mb-1">{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

        <!-- Booking Form -->
        <div class="lg:col-span-2">

            <div class="bg-white/90 rounded-[2.5rem] p-8 md:p-10 shadow-xl shadow-emerald-900/5 border border-emerald-50 relative overflow-hidden">

                <div class="absolute top-0 left-0 w-full h-2 bg-gradient-to-l from-emerald-400 to-emerald-900 rounded-t-[2.5rem]"></div>

                <!-- Selected Doctor Card -->
                <div class="mb-8 bg-emerald-50 border border-emerald-100 rounded-3xl p-6 flex flex-col md:flex-row md:items-center md:justify-between gap-4">

                    <div class="text-right">
                        <p class="text-sm text-emerald-900/60 mb-1">
                            الطبيب المختار
                        </p>

                        <h2 class="text-2xl font-bold text-emerald-900">
                            {{ $doctor->name }}
                        </h2>

                        <p class="text-emerald-700 font-bold">
                            {{ $doctor->specialty }}
                        </p>
                    </div>

                    <div class="text-right md:text-left">
                        <span class="inline-flex px-4 py-2 rounded-full bg-white text-emerald-800 font-bold border border-emerald-100">
                            {{ $typeLabel }}
                        </span>

                        <p class="mt-2 text-emerald-900 font-bold">
                            {{ number_format($doctor->consultation_price) }} ل.س
                        </p>
                    </div>

                </div>

                <form action="{{ route('doctor.book.store', ['doctor' => $doctor->id, 'type' => $type]) }}"
      method="POST"
      enctype="multipart/form-data"
      class="space-y-6">
                    @csrf

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                        <div class="space-y-2">
                            <label class="text-sm font-semibold text-slate-700 block mr-1">
                                اسم الحيوان الأليف
                            </label>

                            <input
                                class="w-full px-4 py-3 rounded-2xl border border-emerald-100 bg-white/70 focus:outline-none focus:ring-2 focus:ring-emerald-700 focus:border-emerald-700 transition-all"
                                name="pet_name"
                                value="{{ old('pet_name') }}"
                                placeholder="مثال: لولو"
                                type="text"
                                required
                            />
                        </div>

                        <div class="space-y-2">
                            <label class="text-sm font-semibold text-slate-700 block mr-1">
                                نوع الحيوان
                            </label>

                            <select
                                class="w-full px-4 py-3 rounded-2xl border border-emerald-100 bg-white/70 focus:outline-none focus:ring-2 focus:ring-emerald-700 focus:border-emerald-700 transition-all"
                                name="pet_type"
                                required>

                                <option value="">اختاري النوع</option>

                                <option value="cat" {{ old('pet_type') == 'cat' ? 'selected' : '' }}>
                                    قط
                                </option>

                                <option value="dog" {{ old('pet_type') == 'dog' ? 'selected' : '' }}>
                                    كلب
                                </option>

                                <option value="bird" {{ old('pet_type') == 'bird' ? 'selected' : '' }}>
                                    طير
                                </option>

                                <option value="fish" {{ old('pet_type') == 'fish' ? 'selected' : '' }}>
                                    سمك
                                </option>

                                <option value="rabbit" {{ old('pet_type') == 'rabbit' ? 'selected' : '' }}>
                                    أرنب
                                </option>

                                <option value="other" {{ old('pet_type') == 'other' ? 'selected' : '' }}>
                                    أخرى
                                </option>

                            </select>
                        </div>

                    </div>

                    <div class="space-y-2">
                        <label class="text-sm font-semibold text-slate-700 block mr-1">
                            عنوان المشكلة الصحية
                        </label>

                        <input
                            class="w-full px-4 py-3 rounded-2xl border border-emerald-100 bg-white/70 focus:outline-none focus:ring-2 focus:ring-emerald-700 focus:border-emerald-700 transition-all"
                            name="problem_title"
                            value="{{ old('problem_title') }}"
                            placeholder="مثال: خمول مفاجئ أو فقدان شهية"
                            type="text"
                            required
                        />
                    </div>

                    <div class="space-y-2">
                        <label class="text-sm font-semibold text-slate-700 block mr-1">
                            تفاصيل الحالة
                        </label>

                        <textarea
                            class="w-full px-4 py-3 rounded-2xl border border-emerald-100 bg-white/70 focus:outline-none focus:ring-2 focus:ring-emerald-700 focus:border-emerald-700 transition-all resize-none"
                            name="problem_description"
                            placeholder="يرجى كتابة الأعراض ومتى بدأت، وهل تم استخدام علاج سابق..."
                            rows="5"
                            required>{{ old('problem_description') }}</textarea>
                    </div>

                    <!-- Extra Medical Details -->
<div class="rounded-[2rem] bg-emerald-50/60 border border-emerald-100 p-6 space-y-6">

    <div class="flex items-center gap-3 text-right">
        <div class="w-11 h-11 rounded-2xl bg-white flex items-center justify-center text-emerald-800 shadow-sm">
            <span class="material-symbols-outlined">
                health_and_safety
            </span>
        </div>

        <div>
            <h3 class="text-xl font-black text-emerald-900">
                تفاصيل إضافية للحالة
            </h3>

            <p class="text-sm text-emerald-900/50">
                تساعد هذه المعلومات الطبيب على تقييم الحالة بشكل أسرع.
            </p>
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-5">

        <!-- Severity Level -->
        <div class="bg-white rounded-3xl border border-emerald-100 p-5 shadow-sm">

            <label class="flex items-center gap-2 text-sm font-black text-emerald-900 mb-3">
                <span class="material-symbols-outlined text-[22px] text-emerald-700">
                    priority_high
                </span>

                درجة الحالة
            </label>

            <select
                name="severity_level"
                required
                class="w-full h-14 rounded-2xl border border-emerald-100 bg-emerald-50/60 px-4 text-emerald-900 font-bold focus:outline-none focus:ring-2 focus:ring-emerald-700 focus:border-emerald-700">

                <option value="simple" {{ old('severity_level') == 'simple' ? 'selected' : '' }}>
                    بسيطة
                </option>

                <option value="moderate" {{ old('severity_level') == 'moderate' ? 'selected' : '' }}>
                    متوسطة
                </option>

                <option value="emergency" {{ old('severity_level') == 'emergency' ? 'selected' : '' }}>
                    طارئة
                </option>

            </select>

            <p class="mt-3 text-xs text-emerald-900/50 leading-relaxed">
                إذا كانت الحالة طارئة، يفضّل مراجعة أقرب عيادة فورًا.
            </p>

        </div>

        <!-- Case Image -->
        <div class="bg-white rounded-3xl border border-emerald-100 p-5 shadow-sm">

            <label class="flex items-center gap-2 text-sm font-black text-emerald-900 mb-3">
                <span class="material-symbols-outlined text-[22px] text-emerald-700">
                    image
                </span>

                صورة الحالة - اختياري
            </label>

            <label for="case_image"
                   class="h-14 rounded-2xl border border-dashed border-emerald-300 bg-emerald-50/60 flex items-center justify-center gap-3 cursor-pointer hover:bg-emerald-100 transition-all text-emerald-800 font-bold">

                <span class="material-symbols-outlined">
                    upload_file
                </span>

                <span id="case-image-name">
                    اختاري صورة
                </span>

            </label>

            <input
                id="case_image"
                type="file"
                name="case_image"
                accept="image/*"
                class="hidden"
                onchange="document.getElementById('case-image-name').innerText = this.files[0] ? this.files[0].name : 'اختاري صورة';"
            />

            <p class="mt-3 text-xs text-emerald-900/50 leading-relaxed">
                يمكنك رفع صورة للجرح أو العرض الظاهر لمساعدة الطبيب.
            </p>

        </div>

    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-5">

        <!-- Date -->
        <div class="bg-white rounded-3xl border border-emerald-100 p-5 shadow-sm">

            <label class="flex items-center gap-2 text-sm font-black text-emerald-900 mb-3">
                <span class="material-symbols-outlined text-[22px] text-emerald-700">
                    calendar_month
                </span>

                تاريخ الموعد المفضل
            </label>

            <input
                name="booking_date"
                value="{{ old('booking_date') }}"
                type="date"
                dir="ltr"
                class="w-full h-14 rounded-2xl border border-emerald-100 bg-emerald-50/60 px-4 text-emerald-900 font-bold focus:outline-none focus:ring-2 focus:ring-emerald-700 focus:border-emerald-700 text-left"
            />

        </div>

        <!-- Time -->
        <div class="bg-white rounded-3xl border border-emerald-100 p-5 shadow-sm">

            <label class="flex items-center gap-2 text-sm font-black text-emerald-900 mb-3">
                <span class="material-symbols-outlined text-[22px] text-emerald-700">
                    schedule
                </span>

                الوقت المفضل
            </label>

            <input
                name="booking_time"
                value="{{ old('booking_time') }}"
                type="time"
                dir="ltr"
                class="w-full h-14 rounded-2xl border border-emerald-100 bg-emerald-50/60 px-4 text-emerald-900 font-bold focus:outline-none focus:ring-2 focus:ring-emerald-700 focus:border-emerald-700 text-left"
            />

        </div>

    </div>

</div>

                    <div class="pt-4 flex flex-col sm:flex-row gap-4">

                        <button
                            class="flex-1 text-white font-bold py-4 px-8 rounded-2xl transition-all shadow-lg shadow-emerald-900/10 flex items-center justify-center gap-2"
                            style="background-color:#065f46;"
                            type="submit">

                            <span class="material-symbols-outlined">
                                send
                            </span>

                            إرسال الطلب
                        </button>

                        <a href="{{ route('doctor') }}"
                           class="px-8 py-4 bg-emerald-50 text-emerald-900 font-bold rounded-2xl hover:bg-emerald-100 transition-all border border-emerald-100 text-center">

                            رجوع
                        </a>

                    </div>

                </form>

            </div>

        </div>

        <!-- Sidebar -->
        <div class="space-y-6">

            <!-- How it works -->
            <div class="bg-white rounded-3xl p-6 shadow-sm border border-emerald-50">

                <div class="flex items-center gap-3 mb-6">

                    <div class="w-10 h-10 rounded-xl bg-emerald-50 flex items-center justify-center text-emerald-900">
                        <span class="material-symbols-outlined">
                            quiz
                        </span>
                    </div>

                    <h3 class="font-bold text-lg text-slate-800">
                        كيف تتم الاستشارة؟
                    </h3>

                </div>

                <ul class="space-y-6 relative">

                    <div class="absolute right-4 top-4 bottom-4 w-[2px] bg-emerald-50"></div>

                    <li class="relative flex gap-4 pr-1">
                        <div class="w-8 h-8 rounded-full bg-emerald-900 text-white flex items-center justify-center text-sm font-bold shrink-0 z-10">
                            1
                        </div>

                        <div>
                            <h4 class="font-bold text-slate-700 text-sm mb-1">
                                تقديم الطلب
                            </h4>

                            <p class="text-slate-500 text-xs leading-relaxed">
                                تعبئة البيانات المطلوبة حول الحيوان الأليف والمشكلة التي يعاني منها.
                            </p>
                        </div>
                    </li>

                    <li class="relative flex gap-4 pr-1">
                        <div class="w-8 h-8 rounded-full bg-emerald-900 text-white flex items-center justify-center text-sm font-bold shrink-0 z-10">
                            2
                        </div>

                        <div>
                            <h4 class="font-bold text-slate-700 text-sm mb-1">
                                المراجعة الطبية
                            </h4>

                            <p class="text-slate-500 text-xs leading-relaxed">
                                يقوم الطبيب بدراسة الحالة ومراجعة وصف الأعراض.
                            </p>
                        </div>
                    </li>

                    <li class="relative flex gap-4 pr-1">
                        <div class="w-8 h-8 rounded-full bg-emerald-900 text-white flex items-center justify-center text-sm font-bold shrink-0 z-10">
                            3
                        </div>

                        <div>
                            <h4 class="font-bold text-slate-700 text-sm mb-1">
                                التواصل المباشر
                            </h4>

                            <p class="text-slate-500 text-xs leading-relaxed">
                                يتم التواصل معك لتقديم النصيحة المناسبة أو تحديد موعد زيارة.
                            </p>
                        </div>
                    </li>

                </ul>

            </div>

            <!-- Important Notes -->
            <div class="bg-emerald-900 text-white rounded-3xl p-6 shadow-xl relative overflow-hidden">

                <div class="absolute -right-4 -bottom-4 opacity-10">
                    <span class="material-symbols-outlined text-9xl">
                        info
                    </span>
                </div>

                <h3 class="font-bold text-lg mb-4 flex items-center gap-2">
                    <span class="material-symbols-outlined text-emerald-400">
                        warning
                    </span>

                    ملاحظات مهمة
                </h3>

                <ul class="space-y-4 text-sm text-emerald-100">

                    <li class="flex gap-2">
                        <span class="text-emerald-400">•</span>
                        <span>الاستجابة للاستشارات تتم خلال 24 ساعة كحد أقصى.</span>
                    </li>

                    <li class="flex gap-2">
                        <span class="text-emerald-400">•</span>
                        <span class="font-medium text-white">
                            في الحالات الطارئة، يفضل التوجه فورًا لأقرب عيادة بيطرية.
                        </span>
                    </li>

                    <li class="flex gap-2">
                        <span class="text-emerald-400">•</span>
                        <span>اذكري الأعراض بوضوح وبدقة قدر الإمكان.</span>
                    </li>

                </ul>

            </div>

            <!-- Illustration Card -->
            <div class="bg-emerald-50 rounded-3xl p-8 flex flex-col items-center text-center">

                <svg class="w-40 h-40 mb-4" viewBox="0 0 200 200" xmlns="http://www.w3.org/2000/svg">
                    <circle cx="100" cy="100" fill="#d1fae5" r="80"></circle>
                    <path d="M70 140 Q100 120 130 140" fill="none" stroke="#065f46" stroke-linecap="round" stroke-width="4"></path>
                    <circle cx="75" cy="80" fill="#065f46" r="10"></circle>
                    <circle cx="125" cy="80" fill="#065f46" r="10"></circle>
                    <rect fill="#065f46" height="20" rx="4" width="20" x="90" y="100"></rect>
                    <path d="M140 60 Q160 40 180 60" fill="none" stroke="#065f46" stroke-linecap="round" stroke-width="6"></path>
                    <path d="M20 60 Q40 40 60 60" fill="none" stroke="#065f46" stroke-linecap="round" stroke-width="6"></path>
                </svg>

                <p class="text-emerald-900 font-bold text-sm">
                    نحن هنا من أجلهم
                </p>

            </div>

        </div>

    </div>

</main>

@endsection