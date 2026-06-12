@extends('layouts.app')

@section('content')

<main class="max-w-4xl mx-auto px-6 py-12">

    <div class="mb-8">
        <h1 class="text-3xl font-bold text-primary mb-2">
            إضافة مستلزم جديد
        </h1>

        <p class="text-on-surface-variant">
            أدخلي معلومات المستلزم ليظهر ضمن صفحة المستلزمات.
        </p>
    </div>

    <section class="glass-card rounded-3xl p-8 shadow-[0px_4px_20px_rgba(27,67,50,0.06)]">

        <form action="{{ route('admin.supplies.store') }}"
              method="POST"
              enctype="multipart/form-data"
              class="space-y-6">

            @csrf

            <div>
                <label class="block mb-2 font-bold text-primary">
                    اسم المستلزم
                </label>

                <input type="text"
                       name="name"
                       value="{{ old('name') }}"
                       required
                       class="w-full rounded-xl border border-emerald-100 px-4 py-3 focus:outline-none focus:border-primary"
                       placeholder="مثال: طعام قطط">
            </div>

            <div>
                <label class="block mb-2 font-bold text-primary">
                    التصنيف
                </label>

                <select name="category"
                        required
                        class="w-full rounded-xl border border-emerald-100 px-4 py-3 focus:outline-none focus:border-primary">

                    <option value="">اختاري التصنيف</option>
                    <option value="food">طعام</option>
                    <option value="toys">ألعاب</option>
                    <option value="homes">مساكن</option>
                    <option value="medicine">أدوية</option>
                    <option value="accessories">اكسسوارات</option>

                </select>
            </div>

            <div>
                <label class="block mb-2 font-bold text-primary">
                    السعر
                </label>

                <input type="number"
                       name="price"
                       value="{{ old('price') }}"
                       required
                       class="w-full rounded-xl border border-emerald-100 px-4 py-3 focus:outline-none focus:border-primary"
                       placeholder="مثال: 25000">
            </div>

            <div>
                <label class="block mb-2 font-bold text-primary">
                    الوصف
                </label>

                <textarea name="description"
                          rows="4"
                          class="w-full rounded-xl border border-emerald-100 px-4 py-3 focus:outline-none focus:border-primary"
                          placeholder="اكتبي وصفًا مختصرًا للمستلزم">{{ old('description') }}</textarea>
            </div>

            <div>
                <label class="block mb-2 font-bold text-primary">
                    صورة المستلزم
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

            <div class="flex items-center gap-4">

                <button type="submit"
                        class="px-8 py-3 rounded-full bg-primary text-white font-bold hover:bg-primary/90 transition-all">
                    حفظ المستلزم
                </button>

                <a href="{{ route('admin.supplies') }}"
                   class="px-8 py-3 rounded-full border border-emerald-200 text-emerald-800 hover:bg-emerald-50 transition-all font-bold">
                    رجوع
                </a>

            </div>

        </form>

    </section>

</main>

@endsection