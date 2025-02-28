@extends('layout.mainlayout')
@section('styles')
    {!! SEO::generate() !!}
@endsection

@section('body')
@include('components.mobile-menu')

    @include('layout.header')
    @include('components.website-path', [
        'breadcrumbs_name' => 'about',
        'heading_content' => 'درباره تویسرکان',
    ])

    <section class="[&_img]:w-full xl:[&_img]:h-[400px] [&_img]:my-5 [&_img]:h-[200px]  my-5 p-5 w-11/12 xl:w-3/5 mx-auto border [&_p]:text-justify [&_p]:leading-9 [&_p]:my-5 break-words [&_p]:text-md xl:[&_p]:text-lg border-gray-100 shadow-sm">
    @if ($about)
    {!! $about->about !!}
        @else
        <p class="my-5 bg-yellow-50 border-r-2 border-yellow-500 text-yellow-600">
            هنوز متنی توسط ادمین ایجاد نشده !
        </p>
    @endif
    </section>
    @include('layout.footer')
@endsection
