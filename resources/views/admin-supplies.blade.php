@extends('layouts.app')

@section('content')

<main class="max-w-7xl mx-auto px-6 py-12">

    <!-- Header -->
    <div class="mb-8 text-right">

        <h1 class="text-3xl font-bold text-emerald-900 mb-2">
            إدارة المستلزمات
        </h1>

        <p class="text-emerald-900/60 mb-5">
            عرض وإضافة مستلزمات الحيوانات الأليفة داخل المتجر.
        </p>

        <a href="{{ route('admin.supplies.create') }}"
           style="background-color:#065f46; color:white; padding:12px 24px; border-radius:9999px; display:inline-flex; align-items:center; gap:8px; font-weight:700; text-decoration:none; box-shadow:0 6px 16px rgba(6,95,70,0.25);">

            <span class="material-symbols-outlined">
                add
            </span>

            <span>
                إضافة مستلزم
            </span>

        </a>

    </div>

    @if(session('success'))
        <div class="mb-6 p-4 rounded-2xl bg-green-100 text-green-700 font-bold">
            {{ session('success') }}
        </div>
    @endif

    <!-- Supplies Table -->
    <section class="bg-white rounded-3xl border border-emerald-100 shadow-[0_8px_30px_rgba(27,67,50,0.06)] overflow-hidden">

        <div class="overflow-x-auto">

            <table class="w-full text-right">

                <thead>
                    <tr class="bg-emerald-50 text-emerald-900 text-sm">
                        <th class="px-6 py-4">الصورة</th>
                        <th class="px-6 py-4">اسم المستلزم</th>
                        <th class="px-6 py-4">التصنيف</th>
                        <th class="px-6 py-4">السعر</th>
                        <th class="px-6 py-4">الوصف</th>
                        <th class="px-6 py-4">الإجراءات</th>
                    </tr>
                </thead>

                <tbody>

                    @forelse($supplies as $supply)

                        <tr class="border-t border-emerald-100 hover:bg-emerald-50/40 transition-all">

                            <!-- Image -->
                            <td class="px-6 py-4">

                                @if($supply->image)
                                    <img
                                        src="{{ asset('images/supplies/' . $supply->image) }}"
                                        alt="{{ $supply->name }}"
                                        style="width:70px; height:70px; object-fit:cover;"
                                        class="rounded-2xl border border-emerald-100 shadow-sm"
                                    >
                                @else
                                    <div
                                        style="width:70px; height:70px;"
                                        class="rounded-2xl bg-emerald-50 border border-emerald-100 flex items-center justify-center text-emerald-800">

                                        <span class="material-symbols-outlined text-[30px]">
                                            shopping_bag
                                        </span>

                                    </div>
                                @endif

                            </td>

                            <!-- Name -->
                            <td class="px-6 py-4">
                                <div class="font-bold text-emerald-900">
                                    {{ $supply->name }}
                                </div>
                            </td>

                            <!-- Category -->
                            <td class="px-6 py-4">
                                <span class="inline-flex px-3 py-1 rounded-full bg-emerald-100 text-emerald-800 text-sm font-bold">
                                    {{ $supply->category }}
                                </span>
                            </td>

                            <!-- Price -->
                            <td class="px-6 py-4">
                                <span class="font-bold text-emerald-900">
                                    {{ number_format($supply->price) }} ل.س
                                </span>
                            </td>

                            <!-- Description -->
                            <td class="px-6 py-4">

    <form action="{{ route('admin.supplies.destroy', $supply->id) }}"
          method="POST"
          onsubmit="return confirm('هل أنتِ متأكدة من حذف هذا المستلزم؟')">


        <td class="px-6 py-4">

    <div class="flex items-center gap-2">

        <a href="{{ route('admin.supplies.edit', $supply->id) }}"
           style="background-color:#0f766e; color:white; padding:8px 16px; border-radius:9999px; font-weight:700; text-decoration:none;">
            تعديل
        </a>

        <form action="{{ route('admin.supplies.destroy', $supply->id) }}"
              method="POST"
              onsubmit="return confirm('هل أنتِ متأكدة من حذف هذا المستلزم؟')">

            @csrf
            @method('DELETE')

            <button type="submit"
                    style="background-color:#dc2626; color:white; padding:8px 16px; border-radius:9999px; font-weight:700;">
                حذف
            </button>

        </form>

    </div>

</td>

    </form>

</td>
                        </tr>

                    @empty

                        <tr>
                            <td colspan="6" class="px-6 py-12 text-center">

                                <div class="w-20 h-20 mx-auto rounded-full bg-emerald-50 flex items-center justify-center text-emerald-800 mb-4">
                                    <span class="material-symbols-outlined text-[42px]">
                                        inventory_2
                                    </span>
                                </div>

                                <h2 class="text-xl font-bold text-emerald-900 mb-2">
                                    لا توجد مستلزمات بعد
                                </h2>

                                <p class="text-emerald-900/60 mb-5">
                                    ابدئي بإضافة أول مستلزم للمتجر.
                                </p>

                                <a href="{{ route('admin.supplies.create') }}"
                                   style="background-color:#065f46; color:white; padding:12px 24px; border-radius:9999px; display:inline-flex; align-items:center; gap:8px; font-weight:700; text-decoration:none; box-shadow:0 6px 16px rgba(6,95,70,0.25);">

                                    <span class="material-symbols-outlined">
                                        add
                                    </span>

                                    <span>
                                        إضافة مستلزم
                                    </span>

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