@extends('layout.mainlayout')
@section('body')
    @include('components.mobile-menu')

    @include('layout.header')
    {{-- @include('components.website-path',["breadcrumbs_name"=> "galary","heading_content"=>"گالری تصاویر"]) --}}

    <section class="p-5 my-10 flex justify-between items-center mx-auto w-3/4">
        <div class="">
            <h1 class="text-xl font-bold">استاد مهدی کریمی</h1>
            <div class="[&_p]:text-lg my-5 [&_p]:leading-9 p-10 [&_p]:text-justify">
                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Amet, blanditiis laudantium velit magni
                    eligendi eveniet incidunt earum ea maxime consequatur doloremque a quam rerum suscipit dolorum, totam
                    eligendi eveniet incidunt earum ea maxime consequatur doloremque a quam rerum suscipit dolorum, totam
                    porro non odit!</p>
                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Amet, blanditiis laudantium velit magni
                    eligendi eveniet incidunt earum ea maxime consequatur doloremque a quam rerum suscipit dolorum, totam
                    eligendi eveniet incidunt earum ea maxime consequatur doloremque a quam rerum suscipit dolorum, totam
                    eligendi eveniet incidunt earum ea maxime consequatur doloremque a quam rerum suscipit dolorum, totam
                    porro non odit!</p>
            </div>
        </div>
        <div class="flex justify-center items-center flex-col">
            <img class="w-[350px] h-[350px] rounded-full bg-pink-800" src="" alt="">
            <div class="my-5 flex justify-center items-center">
                <div class="w-10 mx-2 h-10 rounded-full bg-yellow-300"></div>
                <div class="w-10 mx-2 h-10 rounded-full bg-yellow-300"></div>
            </div>
        </div>
    </section>
    @include('layout.footer')
@endsection
