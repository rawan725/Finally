@extends('layouts.app')

@section('content')

<style>
    @media print {
        header,
        .no-print {
            display: none !important;
        }

        body {
            background: #ffffff !important;
        }

        .print-wrapper {
            padding: 0 !important;
            background: #ffffff !important;
        }

        .print-sheet {
            box-shadow: none !important;
            border: none !important;
            border-radius: 0 !important;
            width: 100% !important;
            max-width: 100% !important;
            padding: 20px !important;
        }

        .print-card {
            break-inside: avoid;
        }
    }
</style>

<section class="print-wrapper min-h-screen bg-[#f3fbf7] py-10 px-4 relative overflow-hidden">

    <!-- Soft Background -->
    <div class="no-print absolute top-0 right-0 w-[420px] h-[420px] bg-emerald-200/40 rounded-full blur-3xl -translate-y-1/2 translate-x-1/3"></div>
    <div class="no-print absolute bottom-0 left-0 w-[380px] h-[380px] bg-teal-200/40 rounded-full blur-3xl translate-y-1/3 -translate-x-1/3"></div>

    <div class="max-w-7xl mx-auto relative z-10">

        <!-- Hero -->
        <div class="no-print relative overflow-hidden rounded-[2.8rem] p-8 md:p-10 mb-8 shadow-xl"
             style="background: linear-gradient(135deg, #052e2b 0%, #065f46 50%, #10b981 100%);">

            <div class="absolute inset-0 opacity-10">
                <span class="material-symbols-outlined absolute left-10 bottom-3 text-[180px] text-white">
                    clinical_notes
                </span>

                <span class="material-symbols-outlined absolute right-10 top-8 text-[120px] text-white">
                    pets
                </span>
            </div>

            <div class="relative z-10 flex flex-col lg:flex-row lg:items-center lg:justify-between gap-8">

                <div class="text-right max-w-3xl">

                    <span class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-white/15 text-emerald-50 text-sm font-bold border border-white/20 mb-5">
                        <span class="material-symbols-outlined text-[18px]">verified</span>
                        Pet Medical Passport
                    </span>

                    <h1 class="text-3xl md:text-5xl font-black text-white mb-4 leading-tight">
                        الملف الطبي الذكي للحيوان الأليف
                    </h1>

                    <p class="text-emerald-50/90 text-lg leading-relaxed">
                        واجهة مخصصة لحفظ بيانات الحيوان الطبية، عرضها بشكل منظم، وطباعتها عند الحاجة لاستخدامها في العيادات أو الحالات الطارئة.
                    </p>

                </div>

                <div class="flex flex-col sm:flex-row gap-3">

                    <button onclick="window.print()"
                            class="px-7 py-4 rounded-2xl bg-white text-emerald-900 font-black hover:bg-emerald-50 transition-all inline-flex items-center justify-center gap-2 shadow-lg">

                        <span class="material-symbols-outlined">
                            print
                        </span>

                        طباعة الملف
                    </button>

                    <a href="{{ route('dashboard') }}"
                       class="px-7 py-4 rounded-2xl bg-white/10 text-white font-black border border-white/20 hover:bg-white/15 transition-all inline-flex items-center justify-center gap-2">

                        <span class="material-symbols-outlined">
                            dashboard
                        </span>

                        لوحة المستخدم
                    </a>

                </div>

            </div>

        </div>

        @if(session('success'))
            <div class="no-print mb-8 p-4 rounded-2xl bg-green-100 text-green-700 font-bold text-right border border-green-200">
                {{ session('success') }}
            </div>
        @endif

        @if($errors->any())
            <div class="no-print mb-8 p-4 rounded-2xl bg-red-50 text-red-600 text-right border border-red-100">
                <ul class="list-disc pr-5">
                    @foreach($errors->all() as $error)
                        <li class="mb-1">{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8">

            <!-- Form -->
            <div class="no-print lg:col-span-5">

                <div class="bg-white/95 backdrop-blur rounded-[2.8rem] p-7 md:p-8 border border-emerald-100 shadow-xl shadow-emerald-900/5 sticky top-28">

                    <div class="flex items-center gap-4 mb-7">

                        <div class="w-14 h-14 rounded-2xl bg-emerald-900 text-white flex items-center justify-center shadow-lg shadow-emerald-900/20">
                            <span class="material-symbols-outlined text-[34px]">
                                edit_document
                            </span>
                        </div>

                        <div>
                            <h2 class="text-2xl font-black text-emerald-900">
                                بيانات الملف الطبي
                            </h2>

                            <p class="text-sm text-emerald-900/50 mt-1">
                                أدخلي البيانات ثم احفظي الملف.
                            </p>
                        </div>

                    </div>

                    <form action="{{ route('pet.medical.profile.store') }}" method="POST" class="space-y-5">

                        @csrf

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

                            <div>
                                <label class="block text-sm font-bold text-emerald-900 mb-2">
                                    اسم الحيوان
                                </label>

                                <div class="relative">
                                    <span class="material-symbols-outlined absolute right-4 top-1/2 -translate-y-1/2 text-emerald-700">
                                        pets
                                    </span>

                                    <input type="text"
                                           name="pet_name"
                                           value="{{ old('pet_name', $profile->pet_name ?? '') }}"
                                           required
                                           placeholder="مثال: لولو"
                                           class="w-full h-14 pr-12 pl-4 rounded-2xl border border-emerald-100 bg-emerald-50/50 focus:ring-2 focus:ring-emerald-700 focus:border-emerald-700 outline-none">
                                </div>
                            </div>

                            <div>
                                <label class="block text-sm font-bold text-emerald-900 mb-2">
                                    نوع الحيوان
                                </label>

                                <div class="relative">
                                    <span class="material-symbols-outlined absolute right-4 top-1/2 -translate-y-1/2 text-emerald-700">
                                        category
                                    </span>

                                    <select name="pet_type"
                                            required
                                            class="w-full h-14 pr-12 pl-4 rounded-2xl border border-emerald-100 bg-emerald-50/50 focus:ring-2 focus:ring-emerald-700 focus:border-emerald-700 outline-none">

                                        <option value="">اختاري النوع</option>
                                        <option value="قط" {{ old('pet_type', $profile->pet_type ?? '') == 'قط' ? 'selected' : '' }}>قط</option>
                                        <option value="كلب" {{ old('pet_type', $profile->pet_type ?? '') == 'كلب' ? 'selected' : '' }}>كلب</option>
                                        <option value="طير" {{ old('pet_type', $profile->pet_type ?? '') == 'طير' ? 'selected' : '' }}>طير</option>
                                        <option value="سمك" {{ old('pet_type', $profile->pet_type ?? '') == 'سمك' ? 'selected' : '' }}>سمك</option>
                                        <option value="أرنب" {{ old('pet_type', $profile->pet_type ?? '') == 'أرنب' ? 'selected' : '' }}>أرنب</option>
                                        <option value="أخرى" {{ old('pet_type', $profile->pet_type ?? '') == 'أخرى' ? 'selected' : '' }}>أخرى</option>

                                    </select>
                                </div>
                            </div>

                            <div>
                                <label class="block text-sm font-bold text-emerald-900 mb-2">
                                    العمر
                                </label>

                                <input type="text"
                                       name="age"
                                       value="{{ old('age', $profile->age ?? '') }}"
                                       placeholder="مثال: سنتين"
                                       class="w-full h-14 px-4 rounded-2xl border border-emerald-100 bg-emerald-50/50 focus:ring-2 focus:ring-emerald-700 focus:border-emerald-700 outline-none">
                            </div>

                            <div>
                                <label class="block text-sm font-bold text-emerald-900 mb-2">
                                    الجنس
                                </label>

                                <select name="gender"
                                        class="w-full h-14 px-4 rounded-2xl border border-emerald-100 bg-emerald-50/50 focus:ring-2 focus:ring-emerald-700 focus:border-emerald-700 outline-none">

                                    <option value="">غير محدد</option>
                                    <option value="ذكر" {{ old('gender', $profile->gender ?? '') == 'ذكر' ? 'selected' : '' }}>ذكر</option>
                                    <option value="أنثى" {{ old('gender', $profile->gender ?? '') == 'أنثى' ? 'selected' : '' }}>أنثى</option>

                                </select>
                            </div>

                        </div>

                        <div>
                            <label class="block text-sm font-bold text-emerald-900 mb-2">
                                الحالة الصحية
                            </label>

                            <textarea name="health_status"
                                      rows="3"
                                      placeholder="مثال: حالة مستقرة، يعاني من حساسية موسمية..."
                                      class="w-full px-4 py-4 rounded-2xl border border-emerald-100 bg-emerald-50/50 focus:ring-2 focus:ring-emerald-700 focus:border-emerald-700 outline-none resize-none">{{ old('health_status', $profile->health_status ?? '') }}</textarea>
                        </div>

                        <div>
                            <label class="block text-sm font-bold text-emerald-900 mb-2">
                                اللقاحات
                            </label>

                            <textarea name="vaccinations"
                                      rows="3"
                                      placeholder="مثال: لقاح السعار، لقاح الديدان..."
                                      class="w-full px-4 py-4 rounded-2xl border border-emerald-100 bg-emerald-50/50 focus:ring-2 focus:ring-emerald-700 focus:border-emerald-700 outline-none resize-none">{{ old('vaccinations', $profile->vaccinations ?? '') }}</textarea>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

                            <div>
                                <label class="block text-sm font-bold text-emerald-900 mb-2">
                                    الحساسية
                                </label>

                                <textarea name="allergies"
                                          rows="3"
                                          placeholder="مثال: حساسية من نوع طعام معين..."
                                          class="w-full px-4 py-4 rounded-2xl border border-emerald-100 bg-emerald-50/50 focus:ring-2 focus:ring-emerald-700 focus:border-emerald-700 outline-none resize-none">{{ old('allergies', $profile->allergies ?? '') }}</textarea>
                            </div>

                            <div>
                                <label class="block text-sm font-bold text-emerald-900 mb-2">
                                    الأدوية الحالية
                                </label>

                                <textarea name="medications"
                                          rows="3"
                                          placeholder="مثال: فيتامينات، علاج جلدي..."
                                          class="w-full px-4 py-4 rounded-2xl border border-emerald-100 bg-emerald-50/50 focus:ring-2 focus:ring-emerald-700 focus:border-emerald-700 outline-none resize-none">{{ old('medications', $profile->medications ?? '') }}</textarea>
                            </div>

                        </div>

                        <div>
                            <label class="block text-sm font-bold text-emerald-900 mb-2">
                                ملاحظات طبية إضافية
                            </label>

                            <textarea name="medical_notes"
                                      rows="3"
                                      placeholder="أي ملاحظات مهمة للطبيب..."
                                      class="w-full px-4 py-4 rounded-2xl border border-emerald-100 bg-emerald-50/50 focus:ring-2 focus:ring-emerald-700 focus:border-emerald-700 outline-none resize-none">{{ old('medical_notes', $profile->medical_notes ?? '') }}</textarea>
                        </div>

                        <div class="flex flex-col sm:flex-row gap-3 pt-2">

                            <button type="submit"
                                    class="flex-1 px-8 py-4 rounded-2xl text-white font-black shadow-lg shadow-emerald-900/20 inline-flex items-center justify-center gap-2"
                                    style="background: linear-gradient(135deg, #065f46, #059669);">

                                <span class="material-symbols-outlined">
                                    save
                                </span>

                                حفظ الملف
                            </button>

                            <button type="button"
                                    onclick="window.print()"
                                    class="flex-1 px-8 py-4 rounded-2xl bg-emerald-50 text-emerald-900 font-black border border-emerald-100 hover:bg-emerald-100 transition-all inline-flex items-center justify-center gap-2">

                                <span class="material-symbols-outlined">
                                    print
                                </span>

                                طباعة
                            </button>

                        </div>

                    </form>

                </div>

            </div>

            <!-- Printable Medical Passport -->
            <div class="lg:col-span-7">

                <div class="print-sheet bg-white rounded-[2.8rem] border border-emerald-100 shadow-2xl shadow-emerald-900/5 overflow-hidden">

                    <!-- Printable Header -->
                    <div class="relative p-8 md:p-10 text-white"
                         style="background: linear-gradient(135deg, #052e2b 0%, #065f46 70%, #0f766e 100%);">

                        <div class="absolute inset-0 opacity-10">
                            <span class="material-symbols-outlined absolute left-8 bottom-2 text-[150px]">
                                medical_services
                            </span>
                        </div>

                        <div class="relative z-10 flex flex-col md:flex-row md:items-center md:justify-between gap-6">

                            <div class="text-right">

                                <p class="text-emerald-200 font-bold mb-2">
                                    Smart Pet Platform
                                </p>

                                <h2 class="text-3xl md:text-4xl font-black mb-3">
                                    بطاقة الملف الطبي
                                </h2>

                                <p class="text-emerald-50/80">
                                    وثيقة معلومات طبية قابلة للطباعة لاستخدامها عند زيارة الطبيب البيطري.
                                </p>

                            </div>

                            <div class="w-24 h-24 rounded-[2rem] bg-white/15 border border-white/20 flex items-center justify-center">
                                <span class="material-symbols-outlined text-[56px]">
                                    clinical_notes
                                </span>
                            </div>

                        </div>

                    </div>

                    @if($profile)

                        <!-- Main Pet Info -->
                        <div class="p-8 md:p-10">

                            <div class="grid grid-cols-1 md:grid-cols-3 gap-5 mb-8">

                                <div class="md:col-span-2 rounded-[2rem] p-6 bg-emerald-50 border border-emerald-100 print-card">

                                    <p class="text-sm text-emerald-700 font-bold mb-2">
                                        اسم الحيوان
                                    </p>

                                    <h3 class="text-4xl font-black text-emerald-900 mb-4">
                                        {{ $profile->pet_name }}
                                    </h3>

                                    <div class="flex flex-wrap gap-3">

                                        <span class="px-4 py-2 rounded-full bg-white text-emerald-800 font-bold border border-emerald-100">
                                            {{ $profile->pet_type }}
                                        </span>

                                        <span class="px-4 py-2 rounded-full bg-white text-emerald-800 font-bold border border-emerald-100">
                                            العمر: {{ $profile->age ?? 'غير محدد' }}
                                        </span>

                                        <span class="px-4 py-2 rounded-full bg-white text-emerald-800 font-bold border border-emerald-100">
                                            الجنس: {{ $profile->gender ?? 'غير محدد' }}
                                        </span>

                                    </div>

                                </div>

                                <div class="rounded-[2rem] p-6 bg-red-50 border border-red-100 print-card">

                                    <div class="w-12 h-12 rounded-2xl bg-red-100 text-red-700 flex items-center justify-center mb-4">
                                        <span class="material-symbols-outlined">
                                            emergency
                                        </span>
                                    </div>

                                    <h4 class="text-lg font-black text-red-800 mb-2">
                                        ملاحظة طارئة
                                    </h4>

                                    <p class="text-sm text-red-700 leading-relaxed">
                                        في الحالات الحرجة، يجب زيارة أقرب عيادة بيطرية فورًا وعدم الاعتماد على الملف كبديل للتشخيص.
                                    </p>

                                </div>

                            </div>

                            <!-- Medical Sections -->
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-5">

                                <div class="print-card rounded-[2rem] border border-emerald-100 p-6 bg-white">
                                    <div class="flex items-center gap-3 mb-4">
                                        <div class="w-11 h-11 rounded-2xl bg-emerald-100 text-emerald-800 flex items-center justify-center">
                                            <span class="material-symbols-outlined">health_and_safety</span>
                                        </div>
                                        <h4 class="font-black text-emerald-900">الحالة الصحية</h4>
                                    </div>
                                    <p class="text-emerald-900/70 leading-relaxed">
                                        {{ $profile->health_status ?? 'لا توجد معلومات مسجلة' }}
                                    </p>
                                </div>

                                <div class="print-card rounded-[2rem] border border-emerald-100 p-6 bg-white">
                                    <div class="flex items-center gap-3 mb-4">
                                        <div class="w-11 h-11 rounded-2xl bg-blue-100 text-blue-700 flex items-center justify-center">
                                            <span class="material-symbols-outlined">vaccines</span>
                                        </div>
                                        <h4 class="font-black text-emerald-900">اللقاحات</h4>
                                    </div>
                                    <p class="text-emerald-900/70 leading-relaxed">
                                        {{ $profile->vaccinations ?? 'لا توجد معلومات مسجلة' }}
                                    </p>
                                </div>

                                <div class="print-card rounded-[2rem] border border-emerald-100 p-6 bg-white">
                                    <div class="flex items-center gap-3 mb-4">
                                        <div class="w-11 h-11 rounded-2xl bg-yellow-100 text-yellow-700 flex items-center justify-center">
                                            <span class="material-symbols-outlined">warning</span>
                                        </div>
                                        <h4 class="font-black text-emerald-900">الحساسية</h4>
                                    </div>
                                    <p class="text-emerald-900/70 leading-relaxed">
                                        {{ $profile->allergies ?? 'لا توجد معلومات مسجلة' }}
                                    </p>
                                </div>

                                <div class="print-card rounded-[2rem] border border-emerald-100 p-6 bg-white">
                                    <div class="flex items-center gap-3 mb-4">
                                        <div class="w-11 h-11 rounded-2xl bg-purple-100 text-purple-700 flex items-center justify-center">
                                            <span class="material-symbols-outlined">medication</span>
                                        </div>
                                        <h4 class="font-black text-emerald-900">الأدوية الحالية</h4>
                                    </div>
                                    <p class="text-emerald-900/70 leading-relaxed">
                                        {{ $profile->medications ?? 'لا توجد معلومات مسجلة' }}
                                    </p>
                                </div>

                            </div>

                            <div class="print-card mt-5 rounded-[2rem] border border-emerald-100 p-6 bg-emerald-50/60">

                                <div class="flex items-center gap-3 mb-4">
                                    <div class="w-11 h-11 rounded-2xl bg-white text-emerald-800 flex items-center justify-center border border-emerald-100">
                                        <span class="material-symbols-outlined">notes</span>
                                    </div>

                                    <h4 class="font-black text-emerald-900">
                                        ملاحظات طبية إضافية
                                    </h4>
                                </div>

                                <p class="text-emerald-900/70 leading-relaxed">
                                    {{ $profile->medical_notes ?? 'لا توجد معلومات مسجلة' }}
                                </p>

                            </div>

                            <!-- Footer -->
                            <div class="mt-8 pt-6 border-t border-emerald-100 grid grid-cols-1 md:grid-cols-3 gap-5 text-sm">

                                <div class="rounded-2xl bg-slate-50 p-4">
                                    <p class="text-slate-500 mb-1">صاحب الحساب</p>
                                    <p class="font-black text-slate-800">{{ auth()->user()->name }}</p>
                                </div>

                                <div class="rounded-2xl bg-slate-50 p-4">
                                    <p class="text-slate-500 mb-1">آخر تحديث</p>
                                    <p class="font-black text-slate-800">{{ $profile->updated_at->format('Y-m-d') }}</p>
                                </div>

                                <div class="rounded-2xl bg-slate-50 p-4">
                                    <p class="text-slate-500 mb-1">رقم الملف</p>
                                    <p class="font-black text-slate-800">SP-MED-{{ str_pad($profile->id, 4, '0', STR_PAD_LEFT) }}</p>
                                </div>

                            </div>

                        </div>

                    @else

                        <div class="p-10 text-center">

                            <div class="w-28 h-28 mx-auto rounded-[2rem] bg-emerald-50 text-emerald-800 flex items-center justify-center mb-6">
                                <span class="material-symbols-outlined text-[64px]">
                                    clinical_notes
                                </span>
                            </div>

                            <h3 class="text-3xl font-black text-emerald-900 mb-3">
                                لا يوجد ملف طبي بعد
                            </h3>

                            <p class="text-emerald-900/60 max-w-xl mx-auto leading-relaxed">
                                املئي النموذج الموجود في الجهة اليمنى لإنشاء ملف طبي منظم وقابل للطباعة للحيوان الأليف.
                            </p>

                        </div>

                    @endif

                </div>

            </div>

        </div>

    </div>

</section>

@endsection