@extends('layouts.app')

@section('content')

<main class="max-w-7xl mx-auto px-6 py-12">

    <div class="mb-8 text-right">

        <h1 class="text-3xl font-bold text-emerald-900 mb-2">
            إدارة الحيوانات
        </h1>

        <p class="text-emerald-900/60 mb-5">
            عرض وإضافة وتعديل الحيوانات الموجودة في المتجر.
        </p>

        <a href="{{ route('admin.animals.create') }}"
           style="background-color:#065f46; color:white; padding:12px 24px; border-radius:9999px; display:inline-flex; align-items:center; gap:8px; font-weight:700; text-decoration:none; box-shadow:0 6px 16px rgba(6,95,70,0.25);">

            <span class="material-symbols-outlined">
                add
            </span>

            <span>إضافة حيوان</span>
        </a>

    </div>

    @if(session('success'))
        <div class="mb-6 p-4 rounded-2xl bg-green-100 text-green-700 font-bold">
            {{ session('success') }}
        </div>
    @endif

    <section class="bg-white rounded-3xl border border-emerald-100 shadow-[0_8px_30px_rgba(27,67,50,0.06)] overflow-hidden">

        <div class="overflow-x-auto">

            <table class="w-full text-right">

                <thead>
                    <tr class="bg-emerald-50 text-emerald-900 text-sm">
                        <th class="px-6 py-4">الصورة</th>
                        <th class="px-6 py-4">اسم الحيوان</th>
                        <th class="px-6 py-4">النوع</th>
                        <th class="px-6 py-4">السعر</th>
                        <th class="px-6 py-4">الوصف</th>
                        <th class="px-6 py-4">الإجراءات</th>
                    </tr>
                </thead>

                <tbody>

                    @forelse($animals as $animal)

                        <tr class="border-t border-emerald-100 hover:bg-emerald-50/40 transition-all">

                            <td class="px-6 py-4">

                                @if($animal->image)
                                    <img
                                        src="{{ asset('images/animals/' . $animal->image) }}"
                                        alt="{{ $animal->name }}"
                                        style="width:70px; height:70px; object-fit:cover;"
                                        class="rounded-2xl border border-emerald-100 shadow-sm"
                                    >
                                @else
                                    <div
                                        style="width:70px; height:70px;"
                                        class="rounded-2xl bg-emerald-50 border border-emerald-100 flex items-center justify-center text-emerald-800">

                                        <span class="material-symbols-outlined text-[30px]">
                                            pets
                                        </span>

                                    </div>
                                @endif

                            </td>

                            <td class="px-6 py-4">
                                <div class="font-bold text-emerald-900">
                                    {{ $animal->name }}
                                </div>
                            </td>

                            <td class="px-6 py-4">
                                <span class="inline-flex px-3 py-1 rounded-full bg-emerald-100 text-emerald-800 text-sm font-bold">
                                    {{ $animal->type }}
                                </span>
                            </td>

                            <td class="px-6 py-4">
                                <span class="font-bold text-emerald-900">
                                    {{ number_format($animal->price) }} ل.س
                                </span>
                            </td>

                            <td class="px-6 py-4 text-emerald-900/60 max-w-xs">
                                {{ $animal->description ? mb_strimwidth($animal->description, 0, 80, '...') : 'لا يوجد وصف' }}
                            </td>

                            <td class="px-6 py-4">

                                <div class="flex items-center gap-2">

                                    <a href="{{ route('admin.animals.edit', $animal->id) }}"
                                       style="background-color:#0f766e; color:white; padding:8px 16px; border-radius:9999px; font-weight:700; text-decoration:none;">
                                        تعديل
                                    </a>

                                    <form action="{{ route('admin.animals.destroy', $animal->id) }}"
                                          method="POST"
                                          onsubmit="return confirm('هل أنتِ متأكدة من حذف هذا الحيوان؟')">

                                        @csrf
                                        @method('DELETE')

                                        <button type="submit"
                                                style="background-color:#dc2626; color:white; padding:8px 16px; border-radius:9999px; font-weight:700;">
                                            حذف
                                        </button>

                                    </form>

                                </div>

                            </td>

                        </tr>

                    @empty

                        <tr>
                            <td colspan="6" class="px-6 py-12 text-center">

                                <div class="w-20 h-20 mx-auto rounded-full bg-emerald-50 flex items-center justify-center text-emerald-800 mb-4">
                                    <span class="material-symbols-outlined text-[42px]">
                                        pets
                                    </span>
                                </div>

                                <h2 class="text-xl font-bold text-emerald-900 mb-2">
                                    لا توجد حيوانات بعد
                                </h2>

                                <p class="text-emerald-900/60 mb-5">
                                    ابدئي بإضافة أول حيوان للمتجر.
                                </p>

                                <a href="{{ route('admin.animals.create') }}"
                                   style="background-color:#065f46; color:white; padding:12px 24px; border-radius:9999px; display:inline-flex; align-items:center; gap:8px; font-weight:700; text-decoration:none;">
                                    <span class="material-symbols-outlined">add</span>
                                    <span>إضافة حيوان</span>
                                </a>

                            </td>
                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </section>

</main>

@endsection