@extends('layouts.app')

@section('content')

<main class="max-w-4xl mx-auto px-6 py-12">

    <div class="mb-8 text-right">
        <h1 class="text-3xl font-bold text-emerald-900 mb-2">
            تعديل المستلزم
        </h1>

        <p class="text-emerald-900/60">
            عدّلي بيانات المستلزم ثم اضغطي حفظ التعديلات.
        </p>
    </div>

    <section class="bg-white rounded-3xl border border-emerald-100 shadow-[0_8px_30px_rgba(27,67,50,0.06)] p-8">

        <form action="{{ route('admin.supplies.update', $supply->id) }}"
              method="POST"
              enctype="multipart/form-data"
              class="space-y-6">

            @csrf
            @method('PUT')

            <div>
                <label class="block mb-2 font-bold text-emerald-900">
                    اسم المستلزم
                </label>

                <input type="text"
                       name="name"
                       value="{{ old('name', $supply->name) }}"
                       required
                       class="w-full rounded-xl border border-emerald-100 px-4 py-3 focus:outline-none focus:border-emerald-800"
                       placeholder="مثال: طعام قطط">
            </div>

            <div>
                <label class="block mb-2 font-bold text-emerald-900">
                    التصنيف
                </label>

                <select name="category"
                        required
                        class="w-full rounded-xl border border-emerald-100 px-4 py-3 focus:outline-none focus:border-emerald-800">

                    <option value="">اختاري التصنيف</option>

                    <option value="food" {{ old('category', $supply->category) == 'food' ? 'selected' : '' }}>
                        طعام
                    </option>

                    <option value="toys" {{ old('category', $supply->category) == 'toys' ? 'selected' : '' }}>
                        ألعاب
                    </option>

                    <option value="homes" {{ old('category', $supply->category) == 'homes' ? 'selected' : '' }}>
                        مساكن
                    </option>

                    <option value="medicine" {{ old('category', $supply->category) == 'medicine' ? 'selected' : '' }}>
                        أدوية
                    </option>

                    <option value="accessories" {{ old('category', $supply->category) == 'accessories' ? 'selected' : '' }}>
                        اكسسوارات
                    </option>

                </select>
            </div>

            <div>
                <label class="block mb-2 font-bold text-emerald-900">
                    السعر
                </label>

                <input type="number"
                       name="price"
                       value="{{ old('price', $supply->price) }}"
                       required
                       class="w-full rounded-xl border border-emerald-100 px-4 py-3 focus:outline-none focus:border-emerald-800"
                       placeholder="مثال: 25000">
            </div>

            <div>
                <label class="block mb-2 font-bold text-emerald-900">
                    الوصف
                </label>

                <textarea name="description"
                          rows="4"
                          class="w-full rounded-xl border border-emerald-100 px-4 py-3 focus:outline-none focus:border-emerald-800"
                          placeholder="اكتبي وصفًا مختصرًا للمستلزم">{{ old('description', $supply->description) }}</textarea>
            </div>

            <div>
                <label class="block mb-2 font-bold text-emerald-900">
                    الصورة الحالية
                </label>

                @if($supply->image)
                    <img src="{{ asset('images/supplies/' . $supply->image) }}"
                         alt="{{ $supply->name }}"
                         style="width:90px; height:90px; object-fit:cover;"
                         class="rounded-2xl border border-emerald-100 shadow-sm mb-4">
                @else
                    <p class="text-emerald-900/60 mb-4">
                        لا توجد صورة حالية.
                    </p>
                @endif

                <label class="block mb-2 font-bold text-emerald-900">
                    تغيير الصورة
                </label>

                <input type="file"
                       name="image"
                       accept="image/*"
                       class="w-full rounded-xl border border-emerald-100 px-4 py-3 bg-white">
            </div>

            @if($errors->any())
                <div class="p-4 rounded-xl bg-red-50 text-red-600">
                    <ul class="list-disc pr-5">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="flex items-center gap-4 pt-4">

                <button type="submit"
                        style="background-color:#065f46; color:white; padding:12px 28px; border-radius:9999px; font-weight:700;">
                    حفظ التعديلات
                </button>

                <a href="{{ route('admin.supplies') }}"
                   style="border:1px solid #a7f3d0; color:#065f46; padding:12px 28px; border-radius:9999px; font-weight:700; text-decoration:none;">
                    رجوع
                </a>

            </div>

        </form>

    </section>

</main>

@endsection