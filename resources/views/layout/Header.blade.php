<header>
    <section class="flex border-b-2 border-gray-100 justify-between px-2 lg:px-20  items-center">
        <div
            class="flex justify-between lg:space-y-0 space-y-2 flex-col md:flex-row xl:text-[15px]  text-[12px] items-center px-3 py-1">
            <div class="" id="date">{{Verta::now()->format('%A')}} ، {{Verta::now()->format('d')}} {{Verta::now()->format('%B')}}</span></div>
            <div class=" mx-2 lg:mx-5" id="time"></div>
        </div>

        <div id="logo" class="lg:w-32 w-24 flex justify-center items-center mr-44  lg:h-24 h-20">
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
    <nav class=" flex space-x-10 p-6 shadow-sm justify-start font-bold lg:justify-center itec">
        <ul class="hidden hover:[&_>li>a]:text-amber-700 space-x-10 space-x-reverse lg:flex">
            <li><a href="{{route('websitepages.home')}}">صفحه اصلی</a></li>
            <li><a href="{{route('websitepages.News')}}">اخرین اخبار</a></li>
            <li><a href="{{route('websitepages.Celebritise')}}">مشاهیر</a></li>
            <li><a href="{{route('websitepages.Antiquities')}}">آثار تویسرکانی ها</a></li>
            <li><a href="{{route('websitepages.Galary')}}">گالری تصاویر</a></li>
            <li><a href="{{route('websitepages.About')}}">درباره تویسرکان</a></li>
        </ul>
        <button id="show-mobile-menu" class="flex lg:hidden"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                stroke-width="1.5" stroke="currentColor" class="size-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5M12 17.25h8.25" />
            </svg>

        </button>
    </nav>

</header>
