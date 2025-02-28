@extends('layout.Mainlayout')
@section('styles')
{!! SEO::generate() !!}
@endsection
@section('body')
    @include('components.mobile-menu')

    @include('components.mobile-menu')
    @include('layout.Header')
    @include('components.baner')
    {{-- آثار section --}}
    <section class="2xl:w-[75%] lg:w-[90%] w-full mx-auto mt-[200px] flex flex-col justify-center items-center">
        <h2 class="text-xl my-5 font-bold">آثار تویسرکانی ها</h2>
        <div class="flex flex-wrap justify-between w-full items-center">
            @foreach ($works as $work)
                <div
                    class="2xl:w-[30%] relative overflow-hidden md:w-[45%] lg:w-[40%] w-full p-2 rounded-md m-5 h-96 shadow-md border">
                    <img class="w-full rounded-md h-2/3" src="{{ url('/') }}/{{ $work->picture }}" />
                    <div class="flex justify-between items-center p-4">
                        <h2>{{ $work->name }}</h2>
                        <strong class="text-xs text-600">{{ $work->W_category()->first()->name }}</strong>
                    </div>
                    <div class="p-2 text-sm leading-7 text-gray-700">
                        {!! mb_substr($work->description, 0, 30) !!}
                        ...
                    </div>
                    <a class="text-sky-800 absolute top-[90%] right-[85%] hover:text-sky-500 mx-3"
                        href="{{ route('websitepages.Antiquitiy', ['id' => $work->id, 'name' => $work->name]) }}">بیشتر</a>
                </div>
            @endforeach

        </div>
    </section>
    {{-- ------------------------------------- --}}
    {{-- شاهیر section --}}
    <section
        class="3xl:w-[75%] 2xl:w-[100%] xl:w-[95%] lg:w-[90%] w-full mx-auto mt-[60px] flex flex-col justify-center items-center">
        <h2 class="text-xl my-5 font-bold">برخی از مشاهیر</h2>
        <div class="flex flex-wrap justify-between w-full items-center">
            @foreach ($celebritise as $cb)
                <a href="{{route('websitepages.celebrity',['celebrityID' =>$cb->celebrityID,'name' => str_replace(' ', '-', $cb->name) ])}}" class="2xl:w-[23%] xl:w-[30%] md:w-[45%] lg:w-[40%] w-full p-2 rounded-md m-3 h-72 shadow-md border">
                    <img class="w-full rounded-md h-[75%]" src="{{ $cb->picture }}" alt="{{ $cb->name }}">
                    <div class="flex my-5 justify-between items-center p-2 px-4">
                        <h2>{{ $cb->name }}</h2>
                        <strong class="text-xs text-600">{{ $cb->job }}</strong>
                    </div>
                </a>
            @endforeach


        </div>
    </section>
    {{-- ------------------------------------- --}}
    {{-- news Section --}}
    <section class=" w-full lg:w-3/4 mx-auto mt-[60px] flex flex-col justify-center items-center">
        <div class="flex flex-col p-5 xl:p-0 xl:flex-row justify-between w-full my-5">
            <div class=" w-full xl:w-[59%] 2xl:w-[68%] flex flex-col h-full">
                <div class="w-full h-[350px] my-5 xl:my-0 xl:h-[480px] rounded-md">
                    <div class="swiper w-full h-full Galary">
                        <div class="swiper-wrapper w-full h-full">
                            @foreach ($galary as $item)
                                <div class="swiper-slide w-full h-full flex justify-center items-center">
                                    <img class="w-full h-full rounded-md" src="{{ url('/') }}/{{ $item->picture }}"
                                        alt="">
                                </div>
                            @endforeach
                        </div>
                        <div class="swiper-button-next"></div>
                        <div class="swiper-button-prev"></div>
                        <div class="swiper-pagination"></div>
                    </div>
                </div>
                <div class="flex justify-between items-center">
                    <div class="w-[48%]  my-5 h-[150px] xl:h-[250px] rounded-md">
                        <img class="w-full h-full rounded-md" src="{{ url('/') }}/{{ $firstpicure?->picture }}"
                            alt="{{ $firstpicure?->name }}">
                    </div>
                    <div class="w-[48%] my-5 h-[150px] xl:h-[250px] rounded-md">
                        <img class="w-full h-full rounded-md" src="{{ url('/') }}/{{ $secondpicture?->picture }}"
                            alt="{{ $secondpicture?->name }}">
                    </div>
                </div>
                <a class="mx-auto hover:text-orange-800 [&_>i]:hover:pr-1 my-3 flex items-center"
                    href="{{ route('websitepages.Galary') }}">
                    گالری تصاویر
                    <i class="fas !duration-500 fa-long-arrow-alt-left mx-2 mt-1"></i>
                </a>

            </div>
            <div class="w-full my-5 xl:my-0 2xl:w-[30%] xl:w-[40%] shadow-sm rounded-md border border-gray-100">
                <h2 class="w-full bg-gray-50 px-5 py-4 rounded-t-md border-b-2 border-gray-200 ">اخرین اخبار</h2>
                <ul class="p-5">
                    @foreach ($news as $nw)
                        <li class="my-5 flex justify-between items-center bg-gray-50 px-4 border-r-2 border-gray-200 py-5">
                            <a class="text-sm hover:text-purple-900"
                                href="{{ route('websitepages.EachNews', ['newsID' => $nw->newsID, 'title' => str_replace(' ', '-', $nw->title)]) }}">
                                {{ mb_substr($nw->title, 0, length: 40) }}
                            </a>
                            <div class="flex justify-between text-[10px] items-center">
                                <div class="pt-1">
                                    <p>{{ verta($nw->created_at)->format('d') }}
                                        {{ verta($nw->created_at)->format('%B') }}
                                        , {{ verta($nw->created_at)->format('Y') }}</p>
                                </div>
                            </div>
                        </li>
                    @endforeach

                </ul>
            </div>
        </div>
    </section>
    {{-- ------------------------------------------- --}}
    @include('layout.Footer')
@endsection
@section('scripts')
    <script>
        var swiper = new Swiper(".celebritise_slider", {
            breakpoints: {
                // وقتی عرض صفحه نمایش بزرگتر یا مساوی 640 پیکسل باشد
                400: {
                    slidesPerView: 1,
                    spaceBetween: 20,
                },
                // وقتی عرض صفحه نمایش بزرگتر یا مساوی 768 پیکسل باشد
                620: {
                    slidesPerView: 2,
                    spaceBetween: 30,
                },
                // وقتی عرض صفحه نمایش بزرگتر یا مساوی 1024 پیکسل باشد
                1100: {
                    slidesPerView: 3,
                    spaceBetween: 40,
                },
                1650: {
                    slidesPerView: 4,
                    spaceBetween: 40,
                },
            },
            spaceBetween: 30,
            loop: true,
            speed: 3000,
            autoplay: {
                delay: 4000
            },
        });
    </script>
    <script>
        var swiper = new Swiper(".baner", {
            spaceBetween: 30,
            effect: "fade",
            speed: 2000,
            autoplay: {
                delay: 5000
            },
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
        });
    </script>
    <script>
        var swiper = new Swiper(".Galary", {
            slidesPerView: 1,
            spaceBetween: 30,
            loop: true,
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
        });
    </script>
@endsection
