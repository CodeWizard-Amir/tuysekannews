@extends('layout.mainlayout')
@section('title', "تویسرکان | $work?->name ")

@section('body')
@include('components.mobile-menu')

    @include('layout.header')
    @include('components.website-path', [
        'breadcrumbs_name' => 'work',
        'heading_content' => $work->name,
        'extra_routeData' => $work,
    ])
    <section class=" w-full 3xl:w-3/4 flex flex-col xl:flex-row justify-between  my-5 mx-auto lg:px-10 px-3">
        <div class=" w-full xl:w-[70%] shadow-sm border border-gray-100 p-5">
            <img class="w-full h-[300px] xl:h-[500px] rounded-md" src="{{ url('/') }}/{{ $work->picture }}"
                alt="">
            <h2 class="text-xl m-4">{{ $work->name }}</h2>
            <p class="m-4">{{ $work->job }}</p>
            <div class="[&_>p]:leading-8 [&_p]:break-words [&_>p]:text-justify">
                {!! $work->description !!}
            </div>
        </div>
        <div
            class="w-full xl:w-[28%] mt-5 xl:mt-0 xl:justify-start justify-between flex flex-col md:flex-row xl:flex-col h-fit !sticky !top-2 !right-0">
            <div class="w-full md:w-[48%] xl:w-full  mb-5 !h-fit shadow-sm border border-gray-100">
                <h2 class="p-5 bg-gray-50 border-b-2 border-gray-100">برخی اخبار</h2>
                <ul class="p-5">
                    @foreach ($news as $item)
                        <li class="my-2 flex justify-between items-center py-3">
                            <a class="text-sm hover:text-orange-800 flex justify-center items-center" href="#">
                                <i class="mx-2 text-xs text-orange-800	fas fa-caret-left"></i>
                                {{ mb_substr($item->title, 0, 35) }}
                            </a>
                            <div class="flex justify-between text-[8px] items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                    class="size-5">
                                    <path
                                        d="M10 9.25a.75.75 0 0 0-.75.75v.01c0 .414.336.75.75.75h.01a.75.75 0 0 0 .75-.75V10a.75.75 0 0 0-.75-.75H10ZM6 13.25a.75.75 0 0 0-.75.75v.01c0 .414.336.75.75.75h.01a.75.75 0 0 0 .75-.75V14a.75.75 0 0 0-.75-.75H6ZM8 13.25a.75.75 0 0 0-.75.75v.01c0 .414.336.75.75.75h.01a.75.75 0 0 0 .75-.75V14a.75.75 0 0 0-.75-.75H8ZM9.25 14a.75.75 0 0 1 .75-.75h.01a.75.75 0 0 1 .75.75v.01a.75.75 0 0 1-.75.75H10a.75.75 0 0 1-.75-.75V14ZM12 11.25a.75.75 0 0 0-.75.75v.01c0 .414.336.75.75.75h.01a.75.75 0 0 0 .75-.75V12a.75.75 0 0 0-.75-.75H12ZM12 13.25a.75.75 0 0 0-.75.75v.01c0 .414.336.75.75.75h.01a.75.75 0 0 0 .75-.75V14a.75.75 0 0 0-.75-.75H12ZM13.25 12a.75.75 0 0 1 .75-.75h.01a.75.75 0 0 1 .75.75v.01a.75.75 0 0 1-.75.75H14a.75.75 0 0 1-.75-.75V12ZM11.25 10.005c0-.417.338-.755.755-.755h2a.755.755 0 1 1 0 1.51h-2a.755.755 0 0 1-.755-.755ZM6.005 11.25a.755.755 0 1 0 0 1.51h4a.755.755 0 1 0 0-1.51h-4Z" />
                                    <path fill-rule="evenodd"
                                        d="M5.75 2a.75.75 0 0 1 .75.75V4h7V2.75a.75.75 0 0 1 1.5 0V4h.25A2.75 2.75 0 0 1 18 6.75v8.5A2.75 2.75 0 0 1 15.25 18H4.75A2.75 2.75 0 0 1 2 15.25v-8.5A2.75 2.75 0 0 1 4.75 4H5V2.75A.75.75 0 0 1 5.75 2Zm-1 5.5c-.69 0-1.25.56-1.25 1.25v6.5c0 .69.56 1.25 1.25 1.25h10.5c.69 0 1.25-.56 1.25-1.25v-6.5c0-.69-.56-1.25-1.25-1.25H4.75Z"
                                        clip-rule="evenodd" />
                                </svg>

                                <span class="mx-1"> {{ $item->created_at }} </span>
                            </div>
                        </li>
                    @endforeach

                </ul>
            </div>
            <div class="w-full md:w-[48%] xl:w-full mb-5 !h-fit shadow-sm border border-gray-100">
                <h2 class="p-5 bg-gray-50 border-b-2 border-gray-100">برخی از مشاهیر</h2>
                <ul class="p-5">
                    @foreach ($celebritise as $item)
                        <li class="my-2 flex justify-between items-center py-3">
                            <a class="text-sm hover:text-orange-800 flex justify-center items-center"
                                href="/Celebrity/{{ $item->celebrityID }}/{{ str_replace(' ', '-', $item->name) }}">
                                <i class="mx-2 text-xs text-orange-800	fas fa-user-tie	"></i>
                                {{ $item->name }}
                            </a>
                            <p class="text-gray-800 text-[10px]">{{ $item->job }}</p>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </section>
    <section class="w-3/4 mx-auto my-10">
        <h2 class="my-3 text-xl">
            آثار دیگر
        </h2>
        <div class="swiper mySwiper">
            <div class="swiper-wrapper ">
                @foreach ($otherWorks as $item)
                    <div class="swiper-slide border border-gray-200 shadow-md !h-[300px] rounded-md">
                        <img class="w-full rounded-t-md h-[70%]" src="{{ url('/') }}/{{ $item->picture }}"
                            alt="">
                        <div class="flex justify-between py-3 px-3 !text-sm">
                            <h2>{{ $item->name }}</h2>
                            <p>{{ $item->W_category()->first()->name }}</p>
                        </div>
                    </div>
                @endforeach

            </div>
            <div class="swiper-pagination"></div>
        </div>
    </section>
    @include('layout.footer')
@endsection
@section('scripts')
    <script>
        var swiper = new Swiper(".mySwiper", {
            breakpoints: {
                // وقتی عرض صفحه نمایش بزرگتر یا مساوی 640 پیکسل باشد
                580: {
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
            spaceBetween: 5,
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
        });
    </script>
@endsection
