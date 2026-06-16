@extends('layouts.app')

@section('content')

<main class="max-w-5xl mx-auto px-6 py-12">

    <div class="mb-8 text-right">

        <h1 class="text-3xl font-bold text-emerald-900 mb-2">
            تعديل بيانات الطبيب
        </h1>

        <p class="text-emerald-900/60">
            عدّلي معلومات الطبيب ثم اضغطي حفظ التعديلات.
        </p>

    </div>

    @if($errors->any())
        <div class="mb-6 p-4 rounded-2xl bg-red-50 text-red-600 text-right">
            <ul class="list-disc pr-5">
                @foreach($errors->all() as $error)
                    <li class="mb-1">{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <section class="bg-white rounded-3xl border border-emerald-100 shadow-[0_8px_30px_rgba(27,67,50,0.06)] overflow-hidden">

        <div class="grid grid-cols-1 lg:grid-cols-3">

            <!-- Image Preview -->
            <div class="bg-emerald-50 p-8 flex flex-col items-center justify-center text-center border-l border-emerald-100">

                @if($doctor->image)
                    <img src="{{ asset('images/doctors/' . $doctor->image) }}"
                         alt="{{ $doctor->name }}"
                         style="width:180px; height:180px; object-fit:cover;"
                         class="rounded-3xl border border-emerald-100 shadow-md mb-5">
                @else
                    <div style="width:180px; height:180px;"
                         class="rounded-3xl bg-white border border-emerald-100 shadow-md mb-5 flex items-center justify-center text-emerald-800">

                        <span class="material-symbols-outlined text-[80px]">
                            medical_services
                        </span>

                    </div>
                @endif

                <h2 class="text-2xl font-bold text-emerald-900 mb-1">
                    {{ $doctor->name }}
                </h2>

                <p class="text-emerald-700 font-bold">
                    {{ $doctor->specialty }}
                </p>

                <div class="mt-5">
                    @if($doctor->is_available)
                        <span class="px-4 py-2 rounded-full bg-green-100 text-green-700 text-sm font-bold">
                            متاح حاليًا
                        </span>
                    @else
                        <span class="px-4 py-2 rounded-full bg-red-100 text-red-700 text-sm font-bold">
                            غير متاح
                        </span>
                    @endif
                </div>

            </div>

            <!-- Form -->
            <div class="lg:col-span-2 p-8">

                <form action="{{ route('admin.doctors.update', $doctor->id) }}"
                      method="POST"
                      enctype="multipart/form-data"
                      class="space-y-6">

                    @csrf
                    @method('PUT')

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-5">

                        <div>
                            <label class="block mb-2 font-bold text-emerald-900">
                                اسم الطبيب
                            </label>

                            <input type="text"
                                   name="name"
                                   value="{{ old('name', $doctor->name) }}"
                                   required
                                   class="w-full rounded-xl border border-emerald-100 px-4 py-3 focus:outline-none focus:border-emerald-800">
                        </div>

                        <div>
                            <label class="block mb-2 font-bold text-emerald-900">
                                الاختصاص
                            </label>

                            <input type="text"
                                   name="specialty"
                                   value="{{ old('specialty', $doctor->specialty) }}"
                                   required
                                   class="w-full rounded-xl border border-emerald-100 px-4 py-3 focus:outline-none focus:border-emerald-800">
                        </div>

                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-5">

                        <div>
                            <label class="block mb-2 font-bold text-emerald-900">
                                سنوات الخبرة
                            </label>

                            <input type="number"
                                   name="experience_years"
                                   value="{{ old('experience_years', $doctor->experience_years) }}"
                                   required
                                   min="0"
                                   class="w-full rounded-xl border border-emerald-100 px-4 py-3 focus:outline-none focus:border-emerald-800">
                        </div>

                        <div>
                            <label class="block mb-2 font-bold text-emerald-900">
                                سعر الاستشارة
                            </label>

                            <input type="number"
                                   name="consultation_price"
                                   value="{{ old('consultation_price', $doctor->consultation_price) }}"
                                   required
                                   min="0"
                                   class="w-full rounded-xl border border-emerald-100 px-4 py-3 focus:outline-none focus:border-emerald-800">
                        </div>

                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-5">

                        <div>
                            <label class="block mb-2 font-bold text-emerald-900">
                                رقم الهاتف
                            </label>

                            <input type="text"
                                   name="phone"
                                   value="{{ old('phone', $doctor->phone) }}"
                                   class="w-full rounded-xl border border-emerald-100 px-4 py-3 focus:outline-none focus:border-emerald-800"
                                   placeholder="مثال: 0999999999">
                        </div>

                        <div>
                            <label class="block mb-2 font-bold text-emerald-900">
                                رقم واتساب
                            </label>

                            <input type="text"
                                   name="whatsapp_number"
                                   value="{{ old('whatsapp_number', $doctor->whatsapp_number) }}"
                                   class="w-full rounded-xl border border-emerald-100 px-4 py-3 focus:outline-none focus:border-emerald-800"
                                   placeholder="مثال: 963999999999">
                        </div>

                    </div>

                    <div>
                        <label class="block mb-2 font-bold text-emerald-900">
                            وقت الاستجابة المتوقع
                        </label>

                        <input type="text"
                               name="response_time"
                               value="{{ old('response_time', $doctor->response_time) }}"
                               class="w-full rounded-xl border border-emerald-100 px-4 py-3 focus:outline-none focus:border-emerald-800"
                               placeholder="مثال: خلال 15 دقيقة">
                    </div>

                    <div>
                        <label class="block mb-2 font-bold text-emerald-900">
                            نبذة عن الطبيب
                        </label>

                        <textarea name="bio"
                                  rows="5"
                                  class="w-full rounded-xl border border-emerald-100 px-4 py-3 focus:outline-none focus:border-emerald-800 resize-none"
                                  placeholder="اكتبي نبذة قصيرة عن الطبيب">{{ old('bio', $doctor->bio) }}</textarea>
                    </div>

                    <div>
                        <label class="block mb-2 font-bold text-emerald-900">
                            تغيير صورة الطبيب
                        </label>

                        <input type="file"
                               name="image"
                               accept="image/*"
                               class="w-full rounded-xl border border-emerald-100 px-4 py-3 bg-white">

                        <p class="text-sm text-emerald-900/50 mt-2">
                            اتركي الحقل فارغًا إذا لا تريدين تغيير الصورة.
                        </p>
                    </div>

                    <div class="rounded-2xl bg-emerald-50 p-4 border border-emerald-100">

                        <label class="flex items-center gap-3 cursor-pointer">

                            <input type="checkbox"
                                   name="is_available"
                                   value="1"
                                   {{ old('is_available', $doctor->is_available) ? 'checked' : '' }}
                                   class="rounded border-emerald-300">

                            <span class="font-bold text-emerald-900">
                                الطبيب متاح حاليًا للاستشارات والحجوزات
                            </span>

                        </label>

                    </div>

                    <div class="flex flex-col sm:flex-row items-center gap-4 pt-4">

                        <button type="submit"
                                style="background-color:#065f46; color:white; padding:12px 28px; border-radius:9999px; font-weight:700; min-width:160px;">
                            حفظ التعديلات
                        </button>

                        <a href="{{ route('admin.doctors') }}"
                           style="border:1px solid #a7f3d0; color:#065f46; padding:12px 28px; border-radius:9999px; font-weight:700; text-decoration:none; min-width:160px; text-align:center;">
                            رجوع
                        </a>

                    </div>

                </form>

            </div>

        </div>

    </section>

</main>

@endsection