@extends('layouts.app')

@section('content')

<main class="max-w-7xl mx-auto px-6 py-12">

    <div class="mb-8 text-right">

        <h1 class="text-3xl font-bold text-emerald-900 mb-2">
            إدارة الأطباء
        </h1>

        <p class="text-emerald-900/60 mb-5">
            من هنا يمكنك إضافة وتعديل وحذف الأطباء البيطريين.
        </p>

        <a href="{{ route('admin.doctors.create') }}"
           style="background-color:#065f46; color:white; padding:12px 24px; border-radius:9999px; display:inline-flex; align-items:center; gap:8px; font-weight:700; text-decoration:none;">

            <span class="material-symbols-outlined">
                add
            </span>

            <span>
                إضافة طبيب
            </span>
        </a>

    </div>

    @if(session('success'))
        <div class="mb-6 p-4 rounded-2xl bg-green-100 text-green-700 font-bold text-right">
            {{ session('success') }}
        </div>
    @endif

    <section class="bg-white rounded-3xl border border-emerald-100 shadow-[0_8px_30px_rgba(27,67,50,0.06)] overflow-hidden">

        <div class="overflow-x-auto">

            <table class="w-full text-right">

                <thead>
                    <tr class="bg-emerald-50 text-emerald-900 text-sm">
                        <th class="px-6 py-4">الصورة</th>
                        <th class="px-6 py-4">الطبيب</th>
                        <th class="px-6 py-4">الاختصاص</th>
                        <th class="px-6 py-4">الخبرة</th>
                        <th class="px-6 py-4">السعر</th>
                        <th class="px-6 py-4">واتساب</th>
                        <th class="px-6 py-4">الحالة</th>
                        <th class="px-6 py-4">الإجراءات</th>
                    </tr>
                </thead>

                <tbody>

                    @forelse($doctors as $doctor)

                        <tr class="border-t border-emerald-100 hover:bg-emerald-50/40 transition-all">

                            <td class="px-6 py-4">

                                @if($doctor->image)
                                    <img src="{{ asset('images/doctors/' . $doctor->image) }}"
                                         alt="{{ $doctor->name }}"
                                         style="width:70px; height:70px; object-fit:cover;"
                                         class="rounded-2xl border border-emerald-100 shadow-sm">
                                @else
                                    <div style="width:70px; height:70px;"
                                         class="rounded-2xl bg-emerald-50 border border-emerald-100 flex items-center justify-center text-emerald-800">

                                        <span class="material-symbols-outlined text-[32px]">
                                            medical_services
                                        </span>

                                    </div>
                                @endif

                            </td>

                            <td class="px-6 py-4">

                                <div class="font-bold text-emerald-900">
                                    {{ $doctor->name }}
                                </div>

                                <div class="text-sm text-emerald-900/60">
                                    {{ $doctor->phone ?? 'لا يوجد رقم هاتف' }}
                                </div>

                            </td>

                            <td class="px-6 py-4 text-emerald-900">
                                {{ $doctor->specialty }}
                            </td>

                            <td class="px-6 py-4">
                                <span class="font-bold text-emerald-900">
                                    {{ $doctor->experience_years }} سنوات
                                </span>
                            </td>

                            <td class="px-6 py-4">
                                <span class="font-bold text-emerald-900">
                                    {{ number_format($doctor->consultation_price) }} ل.س
                                </span>
                            </td>

                            <td class="px-6 py-4 text-emerald-900">
                                {{ $doctor->whatsapp_number ?? 'غير مضاف' }}
                            </td>

                            <td class="px-6 py-4">

                                @if($doctor->is_available)
                                    <span class="px-3 py-1 rounded-full bg-green-100 text-green-700 text-sm font-bold">
                                        متاح
                                    </span>
                                @else
                                    <span class="px-3 py-1 rounded-full bg-red-100 text-red-700 text-sm font-bold">
                                        غير متاح
                                    </span>
                                @endif

                            </td>

                            <td class="px-6 py-4">

                                <div class="flex items-center gap-2">

                                    <a href="{{ route('admin.doctors.edit', $doctor->id) }}"
                                       style="background-color:#0f766e; color:white; padding:8px 16px; border-radius:9999px; font-weight:700; text-decoration:none; display:inline-block;">
                                        تعديل
                                    </a>

                                    <form action="{{ route('admin.doctors.destroy', $doctor->id) }}"
                                          method="POST"
                                          onsubmit="return confirm('هل أنتِ متأكدة من حذف هذا الطبيب؟')">

                                        @csrf
                                        @method('DELETE')

                                        <button type="submit"
                                                style="background-color:#dc2626; color:white; padding:8px 16px; border-radius:9999px; font-weight:700; border:none; cursor:pointer;">
                                            حذف
                                        </button>

                                    </form>

                                </div>

                            </td>

                        </tr>

                    @empty

                        <tr>
                            <td colspan="8" class="px-6 py-12 text-center">

                                <div class="w-20 h-20 mx-auto rounded-full bg-emerald-50 flex items-center justify-center text-emerald-800 mb-4">
                                    <span class="material-symbols-outlined text-[42px]">
                                        medical_services
                                    </span>
                                </div>

                                <h2 class="text-xl font-bold text-emerald-900 mb-2">
                                    لا يوجد أطباء بعد
                                </h2>

                                <p class="text-emerald-900/60 mb-5">
                                    اضغطي على زر إضافة طبيب لإدخال أول طبيب.
                                </p>

                            </td>
                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </section>

</main>

@endsection