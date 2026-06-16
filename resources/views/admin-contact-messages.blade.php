@extends('layouts.app')

@section('content')

<main class="min-h-screen bg-emerald-50/50 px-6 py-10" dir="rtl">

    <section class="max-w-6xl mx-auto">

        <div class="mb-8 text-right">
            <h1 class="text-3xl font-black text-emerald-900">
                رسائل التواصل
            </h1>

            <p class="text-emerald-900/60 mt-2">
                الرسائل والاستفسارات المرسلة من الصفحة الرئيسية.
            </p>
        </div>

        @if(session('success'))
            <div class="mb-6 rounded-2xl bg-emerald-100 border border-emerald-200 text-emerald-900 px-5 py-4 font-bold">
                {{ session('success') }}
            </div>
        @endif

        <div class="grid grid-cols-1 gap-5">

            @forelse($messages as $message)

                <div class="bg-white rounded-3xl border border-emerald-100 shadow-sm p-6">

                    <div class="flex flex-col md:flex-row md:items-start md:justify-between gap-4">

                        <div class="text-right space-y-2">

                            <div class="flex items-center gap-3 justify-start flex-row-reverse">
                                <span class="w-11 h-11 rounded-2xl bg-emerald-100 text-emerald-800 flex items-center justify-center">
                                    <span class="material-symbols-outlined">
                                        mail
                                    </span>
                                </span>

                                <div>
                                    <h2 class="font-black text-emerald-900">
                                        {{ $message->full_name }}
                                    </h2>

                                    <p class="text-sm text-emerald-900/60" dir="ltr">
                                        {{ $message->email }}
                                    </p>
                                </div>
                            </div>

                            <p class="text-sm text-emerald-900/50">
                                تاريخ الإرسال: {{ $message->created_at->format('Y-m-d H:i') }}
                            </p>

                        </div>

                        <form action="{{ route('admin.contact.messages.destroy', $message->id) }}"
                              method="POST"
                              onsubmit="return confirm('هل أنتِ متأكدة من حذف هذه الرسالة؟');">

                            @csrf
                            @method('DELETE')

                            <button type="submit"
                                    class="px-5 py-2 rounded-full bg-red-600 text-white font-bold hover:bg-red-700 transition-all">
                                حذف
                            </button>

                        </form>

                    </div>

                    <div class="mt-5 rounded-2xl bg-emerald-50 border border-emerald-100 p-5 text-right">

                        <p class="text-sm text-emerald-900/50 mb-2">
                            نص الرسالة:
                        </p>

                        <p class="text-emerald-900 leading-relaxed">
                            {{ $message->message }}
                        </p>

                    </div>

                </div>

            @empty

                <div class="bg-white rounded-3xl border border-emerald-100 p-10 text-center">
                    <p class="text-emerald-900/60 font-bold">
                        لا توجد رسائل حاليًا.
                    </p>
                </div>

            @endforelse

        </div>

    </section>

</main>

@endsection