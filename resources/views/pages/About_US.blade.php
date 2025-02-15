@extends('layout.mainlayout')
@section('title', 'تویسرکان | درباره تویسرکان')
@section('body')
@include('components.mobile-menu')

    @include('layout.header')
    @include('components.website-path', [
        'breadcrumbs_name' => 'about',
        'heading_content' => 'درباره تویسرکان',
    ])

    <section class="[&_img]:w-full xl:[&_img]:h-[400px] [&_img]:my-5 [&_img]:h-[200px]  my-5 p-5 w-11/12 xl:w-3/5 mx-auto border [&_p]:text-justify [&_p]:leading-9 [&_p]:my-5 break-words [&_p]:text-md xl:[&_p]:text-lg border-gray-100 shadow-sm">
        <p>
            <img src="{{url('/')}}/assets/img/1.jpeg" alt="">
            تویسرکان یا توی‌سرکان چهارمین شهر بزرگ استان همدان در ایران و مرکز شهرستان تویسرکان است و بر اساس سرشماری عمومی
            نفوس و مسکن، جمعیت آن ۵۵٬۷۰۸ نفر است؛ در منابع کهن همچون معجم‌البلدان یاقوت حموی و نزهةالقلوب، نام تویسرکان به
            صورت «رودلاور» یا رودآور نوشته شده است. تویسرکان در جنوب کوه الوند و شهر همدان واقع شده است.
        </p>
        <img src="{{url('/')}}/assets/img/1.jpeg" alt="">
        <p>
            تویسرکان یا توی‌سرکان چهارمین شهر بزرگ استان همدان در ایران و مرکز شهرستان تویسرکان است و بر اساس سرشماری عمومی
            نفوس و مسکن، جمعیت آن ۵۵٬۷۰۸ نفر است؛ در منابع کهن همچون معجم‌البلدان یاقوت حموی و نزهةالقلوب، نام تویسرکان به
            صورت «رودلاور» یا رودآور نوشته شده است. تویسرکان در جنوب کوه الوند و شهر همدان واقع شده است.
        </p>
        <p>
            تویسرکان یا توی‌سرکان چهارمین شهر بزرگ استان همدان در ایران و مرکز شهرستان تویسرکان است و بر اساس سرشماری عمومی
            نفوس و مسکن، جمعیت آن ۵۵٬۷۰۸ نفر است؛ در منابع کهن همچون معجم‌البلدان یاقوت حموی و نزهةالقلوب، نام تویسرکان به
            صورت «رودلاور» یا رودآور نوشته شده است. تویسرکان در جنوب کوه الوند و شهر همدان واقع شده است.
        </p>
        <p>
            تویسرکان یا توی‌سرکان چهارمین شهر بزرگ استان همدان در ایران و مرکز شهرستان تویسرکان است و بر اساس سرشماری عمومی
            نفوس و مسکن، جمعیت آن ۵۵٬۷۰۸ نفر است؛ در منابع کهن همچون معجم‌البلدان یاقوت حموی و نزهةالقلوب، نام تویسرکان به
            صورت «رودلاور» یا رودآور نوشته شده است. تویسرکان در جنوب کوه الوند و شهر همدان واقع شده است.
        </p>
        <p>
            تویسرکان یا توی‌سرکان چهارمین شهر بزرگ استان همدان در ایران و مرکز شهرستان تویسرکان است و بر اساس سرشماری عمومی
            نفوس و مسکن، جمعیت آن ۵۵٬۷۰۸ نفر است؛ در منابع کهن همچون معجم‌البلدان یاقوت حموی و نزهةالقلوب، نام تویسرکان به
            صورت «رودلاور» یا رودآور نوشته شده است. تویسرکان در جنوب کوه الوند و شهر همدان واقع شده است.
        </p>
    </section>
    @include('layout.footer')
@endsection
