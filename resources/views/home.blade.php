@extends('layouts.app')

@section('content')

<main class="max-w-7xl mx-auto">
<!-- Hero Section -->
<section class="relative px-6 py-16 md:py-24 overflow-hidden">
<div class="grid md:grid-cols-2 gap-12 items-center">
<div class="order-2 md:order-1 text-right space-y-6">
<span class="inline-block px-4 py-1.5 rounded-full bg-secondary-container/30 text-secondary font-label-lg text-sm border border-secondary-container">رعاية فائقة لحيوانك</span>
<h1 class="text-display-lg font-display-lg text-primary leading-tight">
                        وجهتك الأولى لرعاية <br/>
<span class="text-secondary">وتدليل حيوانك الأليف</span>
</h1>
<p class="text-body-lg text-on-surface-variant max-w-lg leading-relaxed">
                        نقدم لك مجموعة مختارة من أفضل المنتجات والخدمات الطبية لضمان سعادة وصحة رفيقك الوفي. من الألعاب الفاخرة إلى الرعاية الصحية المتقدمة.
                    </p>
<div class="flex flex-row-reverse gap-4 pt-4">
<button class="px-8 py-4 rounded-full bg-primary text-white font-headline-md flex items-center gap-2 shadow-lg hover:shadow-primary-container/20 transition-all">
<span>تسوق الآن</span>
<span class="material-symbols-outlined" data-icon="arrow_back">arrow_back</span>
</button>
<button class="px-8 py-4 rounded-full border-2 border-primary text-primary font-headline-md hover:bg-emerald-50 transition-all">
                            خدماتنا
                        </button>
</div>
</div>
<div class="order-1 md:order-2 relative">
<div class="absolute -top-12 -left-12 w-64 h-64 bg-secondary-container/20 rounded-full blur-3xl"></div>
<div class="relative z-10 rounded-[48px] overflow-hidden shadow-2xl rotate-2">
<img alt="Pet Care" class="w-full h-[500px] object-cover" data-alt="A happy golden retriever sitting next to a smiling veterinarian in a modern, sunlit clinic with soft green plants in the background" src="https://lh3.googleusercontent.com/aida-public/AB6AXuCMzuwPi1wtxW7HvtMWn7n661q2iqzmcBXavsqW0cWmaNGCILy7hzXZTr3j97R19sBYJD91_D_OM3jeNfVdSPrONMOryAjhzC7lgYxzFvPE0vJ_P7G4k23WmWDcyHhOZnyRXT5FQVBz6PR3ICu2FqTqpa_L8Hiol5I9leHK3G_cNM6v-HA5J-kgusTmMKA84riCikWuzLarr2xogJNW6MbJI5pw7ermApLqG20YvkfM7a6AodxzINEc4wcec9XgLmMHvuZ331whVA"/>
</div>
<div class="absolute -bottom-6 -right-6 bg-white p-4 rounded-3xl shadow-xl z-20 flex items-center gap-3 border border-emerald-50">
<div class="bg-emerald-100 p-2 rounded-full">
<span class="material-symbols-outlined text-secondary" data-icon="verified">verified</span>
</div>
<div>
<p class="text-sm font-bold text-primary">أطباء معتمدون</p>
<p class="text-xs text-on-surface-variant">رعاية طبية على مدار الساعة</p>
</div>
</div>
</div>
</div>
</section>
<!-- Categories Bento Grid -->
<section class="px-6 py-12">
<div class="grid grid-cols-1 md:grid-cols-3 gap-6">
<!-- Large Card -->
<div class="md:col-span-2 bg-emerald-900 rounded-[32px] p-8 text-white relative overflow-hidden group">
<div class="relative z-10 max-w-xs text-right">
<h3 class="text-headline-lg mb-4">قسم الكلاب المدللة</h3>
<p class="text-emerald-100/80 mb-6">اكتشف أحدث تشكيلة من الملابس والإكسسوارات الفاخرة للكلاب.</p>
<button class="px-6 py-2 rounded-full bg-white text-emerald-900 font-label-lg transition-transform group-hover:scale-105">استعرض المزيد</button>
</div>
<img alt="Dog Fashion" class="absolute top-0 left-0 w-1/2 h-full object-cover opacity-80 group-hover:scale-110 transition-transform duration-700" data-alt="A stylish pug wearing a small green sweater and bowtie looking towards the camera against a soft background" src="https://lh3.googleusercontent.com/aida-public/AB6AXuCL7aExsKS6mhoE5G8AQa9ZGgQkS_XyF5TPlplNvTdgH0rdYG8WDM05aoAlhthT7OybQ767ILeFriJjrWyyTj86aKiCxnXHcezkuRdcjRP5AwAA6eUkzbxa0ReCwH3BU0Nco01wgj-OI_GMB8-0rp8TBwC92rN15Y44sUfbs5li8wVV-4bG1EW9CqT416ERpZllErBHTtNeCDAI6aBjT9QsvzFhdvVrSJBHg9XgwKeSKo6uN9-V_Ul7JoCrKnEu5Sryz8nEmukjBg"/>
</div>
<!-- Small Card 1 -->
<div class="bg-secondary-container rounded-[32px] p-8 text-on-secondary-container flex flex-col justify-between items-end group">
<span class="material-symbols-outlined text-4xl" data-icon="medication">medication</span>
<div class="text-right">
<h3 class="text-headline-md mt-4">الصيدلية</h3>
<p class="text-sm opacity-80">جميع الأدوية والمكملات الغذائية متوفرة</p>
</div>
</div>
<!-- Small Card 2 -->
<div class="bg-white rounded-[32px] p-8 border border-emerald-100 shadow-sm flex flex-col justify-between items-end group hover:border-secondary transition-all">
<span class="material-symbols-outlined text-4xl text-secondary" data-icon="restaurant">restaurant</span>
<div class="text-right">
<h3 class="text-headline-md mt-4">تغذية صحية</h3>
<p class="text-sm text-on-surface-variant">طعام عضوي وطبيعي 100%</p>
</div>
</div>
<!-- Contact Us Card -->
<div class="md:col-span-2 bg-gradient-to-br from-emerald-50 to-white rounded-[32px] p-10 border border-emerald-100 flex flex-col md:flex-row-reverse justify-between items-center gap-8 group">
<div class="text-right space-y-4 flex-1">
<h2 class="text-headline-lg text-primary">تواصل معنا</h2>
<p class="text-body-md text-on-surface-variant">هل لديك استفسار حول حالة أليفك أو تريد حجز موعد؟ فريق الخبراء لدينا جاهز للرد عليك في أي وقت.</p>
<div class="flex flex-row-reverse gap-4 pt-2">
<div class="flex items-center gap-2 text-primary font-label-lg">
<span class="material-symbols-outlined text-secondary" data-icon="call">call</span>
<span>800-ALALEF</span>
</div>
<div class="flex items-center gap-2 text-primary font-label-lg">
<span class="material-symbols-outlined text-secondary" data-icon="mail">mail</span>
<span>alalirawan750@gmail.com</span>
</div>
</div>
</div>
<div class="relative w-full md:w-64 bg-white rounded-2xl shadow-inner border border-emerald-50 p-4 flex flex-col gap-4 md:w-80">
<form class="flex flex-col gap-4 w-full" onsubmit="return false;">
<div class="space-y-1">
<label class="block text-xs font-bold text-primary text-right">الاسم الكامل</label>
<input class="w-full px-3 py-2 rounded-xl border border-emerald-100 focus:border-secondary focus:ring-1 focus:ring-secondary outline-none transition-all text-sm bg-white/50 text-right" placeholder="أدخل اسمك هنا" type="text"/>
</div>
<div class="space-y-1">
<label class="block text-xs font-bold text-primary text-right">البريد الإلكتروني</label>
<input class="w-full px-3 py-2 rounded-xl border border-emerald-100 focus:border-secondary focus:ring-1 focus:ring-secondary outline-none transition-all text-sm bg-white/50 text-right" placeholder="name@example.com" type="email"/>
</div>
<div class="space-y-1">
<label class="block text-xs font-bold text-primary text-right">رسالتك</label>
<textarea class="w-full px-3 py-2 rounded-xl border border-emerald-100 focus:border-secondary focus:ring-1 focus:ring-secondary outline-none transition-all text-sm bg-white/50 text-right resize-none" placeholder="كيف يمكننا مساعدتك؟" rows="3"></textarea>
</div>
<button class="w-full bg-primary text-white py-3 rounded-xl font-label-lg hover:bg-primary/90 hover:shadow-lg transition-all active:scale-95 flex items-center justify-center gap-2 mt-2" type="submit">
<span>إرسال</span>
<span class="material-symbols-outlined text-sm" data-icon="send">send</span>
</button>
</form>
</div>
</div>
</div>
</section>
</main>
<!-- Footer Section -->
<footer class="bg-emerald-50 dark:bg-emerald-950 border-t border-emerald-200 dark:border-emerald-800 w-full mt-auto">
<div class="flex flex-col md:flex-row-reverse justify-between items-center w-full px-8 py-12 max-w-7xl mx-auto gap-6">
<div class="text-xl font-bold text-emerald-900 dark:text-emerald-50 font-display-md flex items-center gap-2">
<span class="material-symbols-outlined" data-icon="pets">pets</span>
<span>متجر الأليف</span>
</div>
<nav class="flex flex-row-reverse flex-wrap justify-center gap-8">
<a class="text-emerald-700/80 dark:text-emerald-300/80 hover:underline font-label-lg" href="#">من نحن</a>
<a class="text-emerald-700/80 dark:text-emerald-300/80 hover:underline font-label-lg" href="#">سياسة الخصوصية</a>
<a class="text-emerald-700/80 dark:text-emerald-300/80 hover:underline font-label-lg" href="#">اتصل بنا</a>
<a class="text-emerald-700/80 dark:text-emerald-300/80 hover:underline font-label-lg" href="#">الشحن</a>
</nav>
<div class="text-emerald-900 dark:text-emerald-400 font-body-md text-sm">
                © 2026 متجر الأليف. جميع الحقوق محفوظة.
            </div>
</div>
</footer>
@endsection