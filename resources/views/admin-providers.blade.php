@extends('layouts.app')

@section('content')

<section class="min-h-screen bg-emerald-50/40 py-10 px-4">

    <div class="max-w-7xl mx-auto">

        <!-- Header -->
        <div class="bg-white rounded-[2rem] p-8 shadow-sm border border-emerald-100 mb-8">

            <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-6">

                <div class="text-right">
                    <span class="inline-flex px-4 py-2 rounded-full bg-emerald-100 text-emerald-800 text-sm font-bold mb-4">
                        Admin Dashboard
                    </span>

                    <h1 class="text-3xl md:text-4xl font-black text-emerald-900 mb-3">
                        إدارة مزودي الخدمة
                    </h1>

                    <p class="text-emerald-900/60 leading-relaxed">
                        من هنا يمكن للأدمن مراجعة طلبات العيادات، الأطباء، المتاجر، ومراكز العناية، ثم قبولها أو رفضها.
                    </p>
                </div>

                <a href="{{ route('admin.dashboard') }}"
                   class="px-6 py-3 rounded-full bg-emerald-900 text-white font-bold hover:bg-emerald-800 transition-all">
                    رجوع للوحة الأدمن
                </a>

            </div>

        </div>

        @if(session('success'))
            <div class="mb-6 p-4 rounded-2xl bg-green-100 text-green-700 font-bold text-right border border-green-200">
                {{ session('success') }}
            </div>
        @endif

        <div class="bg-white rounded-[2rem] border border-emerald-100 shadow-sm overflow-hidden">

            <div class="overflow-x-auto">

                <table class="w-full text-right">

                    <thead class="bg-emerald-900 text-white">
                        <tr>
                            <th class="p-4">#</th>
                            <th class="p-4">مزود الخدمة</th>
                            <th class="p-4">صاحب الحساب</th>
                            <th class="p-4">النوع</th>
                            <th class="p-4">التواصل</th>
                            <th class="p-4">الحالة</th>
                            <th class="p-4">تحديث الحالة</th>
                        </tr>
                    </thead>

                    <tbody>

                        @forelse($providers as $provider)

                            <tr class="border-b border-emerald-50 hover:bg-emerald-50/60 transition-all">

                                <td class="p-4 font-bold text-emerald-900">
                                    {{ $provider->id }}
                                </td>

                                <td class="p-4">
                                    <div class="font-black text-emerald-900">
                                        {{ $provider->business_name }}
                                    </div>

                                    <div class="text-xs text-emerald-900/50 max-w-[260px] line-clamp-2">
                                        {{ $provider->description ?? 'لا يوجد وصف' }}
                                    </div>
                                </td>

                                <td class="p-4">
                                    <div class="font-bold text-emerald-900">
                                        {{ $provider->user->name ?? 'غير معروف' }}
                                    </div>

                                    <div class="text-xs text-emerald-900/50">
                                        {{ $provider->user->email ?? '' }}
                                    </div>
                                </td>

                                <td class="p-4">
                                    @if($provider->type == 'clinic')
                                        <span class="px-3 py-1 rounded-full bg-blue-100 text-blue-700 text-xs font-bold">
                                            عيادة بيطرية
                                        </span>
                                    @elseif($provider->type == 'doctor')
                                        <span class="px-3 py-1 rounded-full bg-purple-100 text-purple-700 text-xs font-bold">
                                            طبيب بيطري
                                        </span>
                                    @elseif($provider->type == 'store')
                                        <span class="px-3 py-1 rounded-full bg-emerald-100 text-emerald-700 text-xs font-bold">
                                            متجر مستلزمات
                                        </span>
                                    @else
                                        <span class="px-3 py-1 rounded-full bg-pink-100 text-pink-700 text-xs font-bold">
                                            مركز عناية
                                        </span>
                                    @endif
                                </td>

                                <td class="p-4 text-sm text-emerald-900">
                                    <div>
                                        {{ $provider->phone ?? 'لا يوجد هاتف' }}
                                    </div>

                                    <div class="text-xs text-emerald-900/50">
                                        واتساب: {{ $provider->whatsapp_number ?? 'غير محدد' }}
                                    </div>
                                </td>

                                <td class="p-4">
                                    @if($provider->status == 'pending')
                                        <span class="px-3 py-1 rounded-full bg-yellow-100 text-yellow-700 text-xs font-bold">
                                            قيد المراجعة
                                        </span>
                                    @elseif($provider->status == 'approved')
                                        <span class="px-3 py-1 rounded-full bg-green-100 text-green-700 text-xs font-bold">
                                            مقبول
                                        </span>
                                    @else
                                        <span class="px-3 py-1 rounded-full bg-red-100 text-red-700 text-xs font-bold">
                                            مرفوض
                                        </span>
                                    @endif
                                </td>

                                <td class="p-4">

                                    <form action="{{ route('admin.providers.status', $provider->id) }}"
                                          method="POST"
                                          class="flex items-center gap-2">

                                        @csrf
                                        @method('PATCH')

                                        <select name="status"
                                                class="rounded-xl border border-emerald-100 text-sm focus:ring-emerald-700 focus:border-emerald-700">

                                            <option value="pending" {{ $provider->status == 'pending' ? 'selected' : '' }}>
                                                قيد المراجعة
                                            </option>

                                            <option value="approved" {{ $provider->status == 'approved' ? 'selected' : '' }}>
                                                قبول
                                            </option>

                                            <option value="rejected" {{ $provider->status == 'rejected' ? 'selected' : '' }}>
                                                رفض
                                            </option>

                                        </select>

                                        <button type="submit"
                                                class="px-4 py-2 rounded-xl bg-emerald-900 text-white text-sm font-bold hover:bg-emerald-800 transition-all">
                                            حفظ
                                        </button>

                                    </form>

                                </td>

                            </tr>

                        @empty

                            <tr>
                                <td colspan="7" class="p-12 text-center">

                                    <div class="w-24 h-24 mx-auto rounded-full bg-emerald-50 text-emerald-800 flex items-center justify-center mb-5">
                                        <span class="material-symbols-outlined text-[52px]">
                                            business_center
                                        </span>
                                    </div>

                                    <h2 class="text-2xl font-black text-emerald-900 mb-2">
                                        لا توجد طلبات مزودي خدمة حالياً
                                    </h2>

                                    <p class="text-emerald-900/60">
                                        ستظهر هنا طلبات الانضمام من العيادات والمتاجر ومراكز العناية.
                                    </p>

                                </td>
                            </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

        </div>

    </div>

</section>

@endsection