@extends('layout.mainlayout')
@section('title', 'تویسرکان | آخرین اخبار ')

@section('body')
    @include('components.mobile-menu')

    @include('layout.header')
    @include('components.website-path', ['breadcrumbs_name' => 'news', 'heading_content' => 'اخبار'])
    <section class="w-full xl:w-3/4 mx-auto p-5">
        <div class="flex flex-col xl:flex-row justify-between w-full p-5">
            <div class="w-full xl:w-[66%] h-[500px]">
                <div class="swiper w-full h-full mySwiper">
                    <div class="swiper-wrapper w-full h-full">
                        @foreach ($sliderNewses as $sliderNews)
                            <a href="{{ route('websitepages.EachNews', ['newsID' => $sliderNews?->newsID, 'title' => str_replace(' ', '-', $sliderNews->title)]) }}"
                                class="swiper-slide bg-black w-full h-full relative">
                                <strong class="absolute top-0 py-3 px-5 rounded-bl-full bg-red-500 text-white z-10">اخبار داغ
                                </strong>
                                <strong
                                    class="absolute bottom-0 rounded-tr-full left-0 !w-[12%] py-3 px-8 bg-amber-700 text-white z-10">
                                    {{ $sliderNews->N_category()->first()->name }} </strong>
                                <div
                                    class="absolute hover:bg-opacity-50 w-full flex justify-center items-center h-full bg-black bg-opacity-70">
                                    <h2 class="text-white px-4 py-3 border-r-2 border-red-500">{{ $sliderNews->title }}</h2>
                                </div>
                                <img class="w-full h-full" src="{{ url('/') }}/{{ $sliderNews->picture }}"
                                    alt="{{ $sliderNews->title }}" />
                            </a>
                        @endforeach 

                    </div>
                </div>
            </div>
            <div class="w-full my-5 xl:my-0 xl:w-[33%] flex flex-row xl:flex-col justify-between h-[500px]">
                <div class="w-[49%] xl:w-full h-[330px] xl:h-[49%]">
                    <a href="{{ $sliderNewsesTop && route('websitepages.EachNews', ['newsID' => $sliderNewsesTop?->newsID, 'title' => $sliderNewsesTop?->title]) }}"
                        class="swiper-slide bg-black w-full h-full relative">
                        <strong class="absolute top-0 py-3 px-5 rounded-bl-full bg-red-500 text-white z-10">اخبار داغ
                        </strong>
                        <strong class="absolute bottom-0 rounded-tr-full left-0 py-3 px-8 bg-amber-700 text-white z-10">
                            {{ $sliderNewsesTop?->N_category()->first()->name }} </strong>
                        <div
                            class="absolute hover:bg-opacity-50 w-full flex justify-center items-center h-full bg-black bg-opacity-70">
                            <h2 class="text-white px-4 py-3 border-r-2 border-red-500">{{ $sliderNewsesTop?->title }}</h2>
                        </div>
                        <img class="w-full h-full" src="{{ url('/') }}/{{ $sliderNewsesTop?->picture }}"
                            alt="{{ $sliderNewsesTop?->title }}" />
                    </a>
                </div>
                <div class="w-[49%] xl:w-full h-[330px] xl:h-[49%]">
                    <a href="{{$sliderNewsesDwon && route('websitepages.EachNews', ['newsID' => $sliderNewsesDwon?->newsID, 'title' => str_replace(' ', '-', $sliderNewsesDwon?->title)]) }}"
                        class="swiper-slide bg-black w-full h-full relative">
                        <strong class="absolute top-0 py-3 px-5 rounded-bl-full bg-red-500 text-white z-10">اخبار داغ
                        </strong>
                        <strong class="absolute bottom-0 rounded-tr-full left-0 py-3 px-8 bg-amber-700 text-white z-10">
                            {{ $sliderNewsesDwon?->N_category()->first()->name }} </strong>
                        <div
                            class="absolute hover:bg-opacity-50 w-full flex justify-center items-center h-full bg-black bg-opacity-70">
                            <h2 class="text-white px-4 py-3 border-r-2 border-red-500">{{ $sliderNewsesDwon?->title }}</h2>
                        </div>
                        <img class="w-full h-full" src="{{ url('/') }}/{{ $sliderNewsesDwon?->picture }}"
                            alt="{{ $sliderNewsesDwon?->title }}" />
                    </a>
                </div>
            </div>
        </div>
        {{-- ------------------------- --}}
        <h2 class="m-5">جدیدترین اخبار</h2>
        <div class="w-full  flex flex-col lg:flex-row  justify-between">
            <div class="lg:w-[45%] w-full p-5 flex flex-wrap justify-between ">
                @foreach ($evenIdNews as $evN)
                    <a href="{{ route('websitepages.EachNews', ['newsID' => $evN?->newsID, 'title' => str_replace(' ', '-', $evN->title)]) }}"
                        class="w-full my-2 md:my-0 md:w-[48%] h-[334px] border flex flex-col justify-between   border-b-2 border-gray-300 rounded-md shadow-sm">
                        <div class="h-[83%]">
                            <div class="w-full h-[60%] relative">
                                <span
                                    class="absolute px-2 py-1 text-xs top-[5%] right-[80%] rounded-sm bg-lime-900 text-white">{{ $evN->N_Category()->first()->name }}</span>
                                <img class=" w-full border-b rounded-t-md h-full "
                                    src="{{ url('/') }}/{{ $evN->picture }}" alt="{{ $evN->title }}">
                            </div>
                            <h2 class="text-sm m-3"> {{ $evN->title }} </h2>
                        </div>
                        <div class="w-full flex justify-between py-4 items-center text-xs border-gray-100 border-t-2 px-3">
                            <div class="flex justify-between items-center w-fit">
                                <p class="flex mx-2 justify-between items-center">
                                    <span class="fa fa-eye text-sky-500"></span>
                                    <span class="mx-1 text-gray-900">{{ $evN->seen }}</span>
                                </p>
                                <p class="flex mx-2 justify-between items-center">
                                    <span class="fa fa-heart text-red-500"></span>
                                    <span class="mx-1 text-gray-900">{{ $evN->like }}</span>
                                </p>
                            </div>
                            <div class="">
                                <p>{{ verta($evN->created_at)->format('d') }} {{ verta($evN->created_at)->format('%B') }}
                                    , {{ verta($evN->created_at)->format('Y') }}</p>
                            </div>
                        </div>
                    </a>
                @endforeach


            </div>
            <div class="w-full my-4 lh:my-0 lg:w-[54%] p-5 flex flex-wrap justify-between">
                @foreach ($oddIdNews as $OddN)
                    <a href="{{ route('websitepages.EachNews', ['newsID' => $OddN?->newsID, 'title' => str_replace(' ', '-', $OddN->title)]) }}"
                        class="w-full my-3 md:my-0 md:w-[49.3%] flex  mb-2 h-[164px] shadow-md border border-gray-100">
                        <div class="w-2/5 h-full relative">
                            <span
                                class="absolute px-2 py-1 text-xs top-[0%] right-[0%] rounded-sm bg-lime-900 text-white">{{ $OddN->N_Category()->first()->name }}</span>
                            <img class="border-l  h-full " src="{{ url('/') }}/{{ $OddN->picture }}"
                                alt="{{ $OddN->title }}">
                        </div>
                        <div class="flex justify-between w-3/5 flex-col">
                            <h2 class="text-sm m-2">
                                {{ $OddN->title }}
                            </h2>
                            <div class="w-full p-3 flex justify-between items-center  border-gray-100 border-t-2 px-2">
                                <div class="flex justify-between items-center w-fit">
                                    <p class="flex justify-between items-center">
                                        <span class="fa fa-eye !text-[10px] text-sky-500"></span>
                                        <span class="mx-1 !text-[10px] text-gray-900">{{ $OddN->seen }}</span>
                                    </p>
                                    <p class="flex justify-between items-center">
                                        <span class="fa !text-[10px] fa-heart text-red-500"></span>
                                        <span class="mx-1 !text-[10px] text-gray-900">{{ $OddN->like }}</span>
                                    </p>
                                </div>
                                <div class="text-[10px]">
                                    <p>{{ verta($OddN->created_at)->format('d') }}
                                        {{ verta($OddN->created_at)->format('%B') }}
                                        , {{ verta($OddN->created_at)->format('Y') }}</p>
                                </div>
                            </div>
                        </div>
                    </a>
                @endforeach

            </div>
        </div>
        <h2 class="m-5">اخبار تویسرکان</h2>
        <div class="w-full flex flex-wrap justify-between items-center p-5">
            @foreach ($newses as $news)
                <a href="{{ route('websitepages.EachNews', ['newsID' => $news?->newsID, 'title' => str_replace(' ', '-', $news->title)]) }}"
                    class="w-full md:w-[49%] lg:w-[33%] my-2 h-[450px] border-b-2 border border-gray-300 rounded-md shadow-sm">
                    <div class="w-ful h-[85%] !overflow-hidden">
                        <div class="w-full h-[65%] relative">
                            <span class="absolute px-2 py-1 text-xs top-[5%] right-[85%] rounded-sm bg-lime-900 text-white">
                                {{ $news->N_Category()->first()->name }}
                            </span>
                            <img class="rounded-t-md w-full h-full border-b "
                                src="{{ url('/') }}/{{ $news->picture }}" alt="{{ $news->title }}">
                        </div>
                        <h2 class="text-sm m-3">{{ $news->title }}</h2>
                    </div>
                    <div class="w-full flex justify-between h-[15%] items-center text-xs border-gray-100 border-t-2 px-2">
                        <div class="flex justify-between items-center w-fit">
                            <p class="flex justify-between items-center">
                                <span class="fa fa-eye text-sky-500"></span>
                                <span class="mx-1 text-gray-900">{{ $news->seen }}</span>
                            </p>
                            <p class="flex justify-between items-center">
                                <span class="fa fa-heart text-red-500"></span>
                                <span class="mx-1 text-gray-900">{{ $news->like }}</span>
                            </p>
                        </div>
                        <p>
                            {{ verta($news->created_at)->format('d') }}
                            {{ verta($news->created_at)->format('%B') }}
                            , {{ verta($news->created_at)->format('Y') }}
                        </p>
                    </div>
                </a>
            @endforeach
        </div>
        <div class="w-fit mx-auto [&_p]:hidden my-10 flex justify-between items-center">
            <div class="flex items-center justify-center flex-col">
                <div>
                    {{ $newses->links() }}
                </div>
                <div class=" my-2 text-gray-600 text-xs">
                    نمایش {{ $newses->firstItem() }} تا {{ $newses->lastItem() }}
                </div>
            </div>
        </div>
        </div>
    </section>
    @include('layout.footer')
@endsection
@section('scripts')
    <script>
        var swiper = new Swiper(".mySwiper", {
            spaceBetween: 30,
            effect: "fade",
            speed: 1300,
            autoplay: {
                delay: 3000,
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
@endsection
