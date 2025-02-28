@extends('layout.mainlayout')
@section('body')
    @include('components.mobile-menu')
@section('styles')
    {!! SEO::generate() !!}
@endsection
@include('layout.header')
{{-- @include('components.website-path',["breadcrumbs_name"=> "galary","heading_content"=>"گالری تصاویر"]) --}}

<section class="p-5 my-10 flex justify-between items-center mx-auto w-full xl:w-3/4">
    <div class="">
        <h1 class="text-xl font-bold">استاد محمود صلواتی </h1>
        <div class="[&_p]:text-lg my-5 [&_p]:leading-9 p-4 xl:p-10 [&_p]:text-justify">
            <p>با سلام و عرض ادب
                بنده، محمود صلواتی، متولد ١٣٣٧ خورشیدی، متولد و ساکن تویسرکان هستم.
                در سال ١٣٧٢ کارشناسی ارشد در رشته زبان و ادبیات فارسی را تمام کردم و پایان نامه ام با عنوان «غم غربت در
                شعر دوره ی صفویه» چاپ شده است.
                زمینه های پژوهشی اینجانب ادبیات فارسی، فرهنگ عامه تویسرکان و قرآن پژوهی است.
                تمام مقاطع تحصیلی را از ابتدایی تا دانشگاه معلمی کرده ام.
                تا کنون دو کتاب، پانزده طرح پژوهشی دانشگاهی و چهل مقاله ی عمومی، علمی_ پژوهشی نوشته ام که بسیاری از آن
                ها در پایگاه های علمی پژوهشی موجود است.
                عاشق کهن شهر تویسرکان و جاذبه های فرهنگی، تاریخی و طبیعی آن هستم.
                خوشا تویسرکان و فصل بهار
                که شوید ز آیینه ی دل غبار...
                شادکام باشید</p>
        </div>
    </div>
</section>
@include('layout.footer')
@endsection
