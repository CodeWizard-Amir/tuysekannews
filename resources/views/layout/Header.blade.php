<header>
    <section class="flex border-b-2 border-gray-100 justify-between px-2 lg:px-20  items-center">
        <div
            class="flex justify-between lg:space-y-0 space-y-2 flex-col md:flex-row xl:text-[15px]  text-[12px] items-center px-3 py-1">
            <div class="" id="date">دوشنبه - 23 آبان</span></div>
            <div class=" mx-2 lg:mx-5" id="time"></div>
        </div>

        <div class="lg:w-32 w-24 flex justify-center items-center mr-44  lg:h-24 h-20">
            <img class="w-full h-full" src="{{ url('/') }}/assets/img/1.png" alt="">
        </div>

        <div class="w-[450px] hidden lg:flex justify-between items-center rounded-full border border-gray-200">
            <input class="w-[85%] outline-none rounded-full px-5 py-4" type="text" placeholder="چیزی تایپ کنید ...">
            <button class="w-[9%] mx-2"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                    stroke-width="1.5" stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
                </svg>
            </button>
        </div>
        {{-- ----------------------------------- --}}
    </section>
    <nav class=" flex space-x-10 p-6 justify-start font-bold lg:justify-center itec">
        <ul class="hidden hover:[&_>li>a]:text-amber-700 space-x-10 space-x-reverse lg:flex">
            <li><a href="#">صفحه اصلی</a></li>
            <li><a href="#">اخرین اخبار</a></li>
            <li><a href="#">مشاهیر</a></li>
            <li><a href="#">آثار تویسرکانی ها</a></li>
            <li><a href="#">گالری تصاویر</a></li>
            <li><a href="#">درباره تویسرکان</a></li>
        </ul>
        <button class="flex lg:hidden"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                stroke-width="1.5" stroke="currentColor" class="size-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5M12 17.25h8.25" />
            </svg>

        </button>
    </nav>
    <section class="w-full relative h-[250px] lg:h-[500px] bg-sky-950">
        {{-- -------------------------- --}}
        <div class="swiper baner w-full h-full">
            <div class="swiper-wrapper w-full h-full">
                @foreach ($baners as $baner)
                @if ($baner->link != "nothing")
                <a href="{{$baner->link}}" class="swiper-slide w-full h-full">
                    <img alt="{{$baner->name}}" class="w-full h-full" src="{{$baner->picture}}" />
                </a>
                @else
                <div class="swiper-slide w-full h-full">
                    <img alt="{{$baner->name}}" class="w-full h-full" src="{{$baner->picture}}" />
                </div>
                @endif

                @endforeach

            </div>

        </div>
        {{-- ----------------------- --}}
        <div
            class="flex flex-wrap absolute !top-[75%]  lg:top-[85%] p-5 w-full lg:w-3/4 right-0 lg:right-[12.5%] h-fit justify-between items-center lg:px-20">

            <div class="swiper celebritise_slider !py-10 w-full">
                <div class="swiper-wrapper">
                    @foreach ($celebritise as $item)
                        <a href="#"
                            class=" swiper-slide !flex !justify-between  p-2 h-36 bg-white shadow-xl hover:shadow-none duration-500 border rounded-xl">
                            <div class="flex flex-col  space-y-2 p-2">
                                <h3>{{ $item->name }}</h3>
                                <p class="text-xs">{{ $item->job }}</p>
                                <div class="!text-xs ![&_>p]:text-justify !mt-5">
                                    {!! mb_substr($item->description, 0, 80) !!}...
                                </div>
                            </div>
                            <img class="rounded-l-xl w-1/2 !h-36" src="{{ $item->picture }}" alt="">

                        </a>
                    @endforeach
                </div>
            </div>

        </div>
    </section>
</header>
