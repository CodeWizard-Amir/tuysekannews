@extends('layout.Mainlayout')
@section('body')
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
                        <strong class="text-xs text-600">{{ $work->categoryID }}</strong>
                    </div>
                    <div class="p-2 text-sm leading-7 text-gray-700">
                        {!! $work->description !!}
                    </div>
                    <a class="text-sky-800 absolute top-[90%] right-[85%] hover:text-sky-500 mx-3" href="#">بیشتر</a>
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
            @foreach ($celebritise as $item)
                <div class="2xl:w-[23%] xl:w-[30%] md:w-[45%] lg:w-[40%] w-full p-2 rounded-md m-3 h-96 shadow-md border">
                    <img class="w-full rounded-md h-2/3" src="{{ $item->picture }}" alt="">
                    <div class="flex justify-between items-center p-2 px-4">
                        <h2>{{ $item->name }}</h2>
                        <strong class="text-xs text-600">{{ $item->job }}</strong>
                    </div>
                    <div class="![&_>p]:text-justify [&_>p]:text-xs [&_>p]:leading-7 [&_>p]:text-gray-700">
                        {!! mb_substr($item->description, 0, 130) !!}...
                        <a class="text-sky-800 hover:text-sky-500 mx-3"
                            href="celebritise/{{ $item->celebrityID }}">بیشتر</a>
                    </div>
                </div>
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
                                <div class="swiper-slide w-full bg-green-500 h-full flex justify-center items-center">
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
                    <div class="w-[48%] bg-red-500 my-5 h-[150px] xl:h-[250px] rounded-md">
                        <img class="w-full h-full rounded-md" src="{{ url('/') }}/{{ $firstpicure?->picture }}"
                            alt="{{ $firstpicure?->name }}">
                    </div>
                    <div class="w-[48%] my-5 h-[150px] xl:h-[250px] rounded-md">
                        <img class="w-full h-full rounded-md" src="{{ url('/') }}/{{ $secondpicture?->picture }}"
                            alt="{{ $secondpicture?->name }}">
                    </div>
                </div>
            </div>
            <div class="w-full my-5 xl:my-0 2xl:w-[30%] xl:w-[40%] shadow-sm rounded-md border border-gray-100">
                <h2 class="w-full bg-gray-50 px-5 py-4 rounded-t-md border-b-2 border-gray-200 ">اخرین اخبار</h2>
                <ul class="p-5">
                    @foreach ($news as $item)
                        <li class="my-5 flex justify-between items-center bg-gray-50 px-4 border-r-2 border-gray-200 py-5">
                            <a class="text-sm hover:text-purple-900" href="#">
                                {{ mb_substr($item->title,0,length: 40) }}
                                @if (strlen($item->title) > 41)
                                    {{ "..." }}
                                @endif
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

                                <span class="mx-1">{{ $item->created_at }}</span>
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
        function showCurrentTime() {
            const currentTime = new Date();
            const hours = currentTime.getHours();
            const minutes = currentTime.getMinutes();
            const seconds = currentTime.getSeconds();
            const day = currentTime.getDate();
            const month = currentTime.getMonth() + 1;
            const year = currentTime.getFullYear();

            const dateElement = document.getElementById("date");
            const timeElement = document.getElementById("time");

            dateElement.textContent = `${day}/${month}/${year}`;
            timeElement.textContent =
                `${hours.toString().padStart(2, "0")}:${minutes.toString().padStart(2, "0")}:${seconds.toString().padStart(2, "0")}`;

            setTimeout(showCurrentTime, 1000);
        }
        showCurrentTime();
    </script>
    <script>
        var swiper = new Swiper(".celebritise_slider", {
            slidesPerView: 4,
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
