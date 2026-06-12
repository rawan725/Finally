@extends('layouts.app')

@section('content')

<main class="max-w-4xl mx-auto px-6 py-12">

    <div class="mb-8 text-right">
        <h1 class="text-3xl font-bold text-emerald-900 mb-2">
            تعديل الحيوان
        </h1>

        <p class="text-emerald-900/60">
            عدّلي بيانات الحيوان ثم اضغطي حفظ التعديلات.
        </p>
    </div>

    <section class="bg-white rounded-3xl border border-emerald-100 shadow-[0_8px_30px_rgba(27,67,50,0.06)] p-8">

        <form action="{{ route('admin.animals.update', $animal->id) }}"
              method="POST"
              enctype="multipart/form-data"
              class="space-y-6">

            @csrf
            @method('PUT')

            <div>
                <label class="block mb-2 font-bold text-emerald-900">
                    اسم الحيوان
                </label>

                <input type="text"
                       name="name"
                       value="{{ old('name', $animal->name) }}"
                       required
                       class="w-full rounded-xl border border-emerald-100 px-4 py-3 focus:outline-none focus:border-emerald-800"
                       placeholder="مثال: قط شيرازي">
            </div>

            <div>
                <label class="block mb-2 font-bold text-emerald-900">
                    نوع الحيوان
                </label>

                <select name="type"
                        required
                        class="w-full rounded-xl border border-emerald-100 px-4 py-3 focus:outline-none focus:border-emerald-800">

                    <option value="">اختاري النوع</option>

                    <option value="cats" {{ old('type', $animal->type) == 'cats' ? 'selected' : '' }}>
                        قطط
                    </option>

                    <option value="dogs" {{ old('type', $animal->type) == 'dogs' ? 'selected' : '' }}>
                        كلاب
                    </option>

                    <option value="birds" {{ old('type', $animal->type) == 'birds' ? 'selected' : '' }}>
                        طيور
                    </option>

                    <option value="fish" {{ old('type', $animal->type) == 'fish' ? 'selected' : '' }}>
                        أسماك
                    </option>

                    <option value="rabbits" {{ old('type', $animal->type) == 'rabbits' ? 'selected' : '' }}>
                        أرانب
                    </option>

                </select>
            </div>

            <div>
                <label class="block mb-2 font-bold text-emerald-900">
                    السعر
                </label>

                <input type="number"
                       name="price"
                       value="{{ old('price', $animal->price) }}"
                       required
                       class="w-full rounded-xl border border-emerald-100 px-4 py-3 focus:outline-none focus:border-emerald-800"
                       placeholder="مثال: 150000">
            </div>

            <div>
                <label class="block mb-2 font-bold text-emerald-900">
                    الوصف
                </label>

                <textarea name="description"
                          rows="4"
                          class="w-full rounded-xl border border-emerald-100 px-4 py-3 focus:outline-none focus:border-emerald-800"
                          placeholder="اكتبي وصفًا مختصرًا عن الحيوان">{{ old('description', $animal->description) }}</textarea>
            </div>

            <div>
                <label class="block mb-2 font-bold text-emerald-900">
                    الصورة الحالية
                </label>

                @if($animal->image)
                    <img src="{{ asset('images/animals/' . $animal->image) }}"
                         alt="{{ $animal->name }}"
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

                <a href="{{ route('admin.animals') }}"
                   style="border:1px solid #a7f3d0; color:#065f46; padding:12px 28px; border-radius:9999px; font-weight:700; text-decoration:none;">
                    رجوع
                </a>

            </div>

        </form>

    </section>

</main>

@endsection