<section id="mobile-menu" class="absolute flex flex-col xl:hidden !duration-500 bg-slate-950 -right-[10000px] !z-50 w-[100vw] h-[100vh]">
    <div class="flex justify-end p-6">
        <button id="hide-mobile-menu"><i class="fa fa-close text-red-500 text-xl"></i></button>
    </div>
    <div class="w-full p-5 my-2">
        <form class="bg-white w-full flex justify-between items-center rounded-full" action="">
            <input class="rounded-full w-[88%] bg-transparent outline-none py-4 px-5 text-sm" type="text" placeholder="چیزی تایپ کنید ...">
            <button class="border-none w-[10%] ml-2 bg-transparent text-lg flex justify-center items-start"><i class="fa mt-1 fa-search"></i></button>
        </form>
    </div>
    <ul class="text-white !text-md space-y-8 p-5">
        <li><a class="flex items-center" href="{{route('websitepages.home')}}">
            <span class="mx-2 text-xs text-sky-500 mt-[2px] fas fa-caret-left"></span>
            صفحه اصلی
        </a></li>

        <li><a class="flex items-center" href="{{route('websitepages.News')}}">
            <span class="mx-2 text-xs text-sky-500 mt-[2px] fas fa-caret-left"></span>
            اخرین اخبار
        </a></li>

        <li><a class="flex items-center" href="{{route('websitepages.Celebritise')}}">
            <span class="mx-2 text-xs text-sky-500 mt-[2px] fas fa-caret-left"></span>
            مشاهیر 
        </a></li>

        <li><a class="flex items-center" href="{{route('websitepages.Antiquities')}}">
            <span class="mx-2 text-xs text-sky-500 mt-[2px] fas fa-caret-left"></span>
            آثار تویسرکانی ها 
        </a></li>

        <li><a class="flex items-center" href="{{route('websitepages.Galary')}}">
            <span class="mx-2 text-xs text-sky-500 mt-[2px] fas fa-caret-left"></span>
            گالری تصاویر 
        </a></li>

        <li><a class="flex items-center" href="{{route('websitepages.About')}}">
            <span class="mx-2 text-xs text-sky-500 mt-[2px] fas fa-caret-left"></span>
            درباره تویسرکان 
        </a></li>

    </ul>
    <div class="flex absolute h-[10%]  top-[90%] justify-center items-center w-full space-x-1 space-x-reverse">
        <a href="#" class="w-12 h-12 rounded-full flex justify-center items-center">
            <i class="fab fa-instagram text-3xl hover:text-orange-400 text-orange-500"></i>
        </a>
        <a href="#" class="w-12 h-12 rounded-full flex justify-center items-center">
            <i class="fab fa-telegram text-3xl hover:text-sky-300 text-sky-500"></i>
        </a>
    </div>
</section>