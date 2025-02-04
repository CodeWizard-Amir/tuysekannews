<!DOCTYPE html>
<html lang="fa-Ir" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">  

    <link rel="stylesheet" href="{{ url('/') }}/assets/css/globalStyles.css">
    @yield('head')
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>@yield('title')</title>
</head>

<body>
    <main class="flex justify-between w-[100vw] h-[100vh] overflow-hidden">
        <div class="w-[17%] h-full bg-gray-900">
            <div class="relative pt-2 pb-12 bg-indigo-800">
                <div class="px-5 py-3 flex items-center">
                    <img class="w-12 h-12 rounded-full bg-pink-500" src="https://codewizard-amir.github.io/mr-nouri/assets/me1-C_WRM3ij.jpg" alt="">
                    <h2 class="text-white mx-3">امیرسجاد نوری</h2>
                </div>
                {{-- ------------------------ --}}
                <svg class="absolute top-16" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
                    <path fill="#111827 " fill-opacity="1"
                        d="M0,128L26.7,128C53.3,128,107,128,160,144C213.3,160,267,192,320,176C373.3,160,427,96,480,85.3C533.3,75,587,117,640,165.3C693.3,213,747,267,800,245.3C853.3,224,907,128,960,90.7C1013.3,53,1067,75,1120,122.7C1173.3,171,1227,245,1280,245.3C1333.3,245,1387,171,1413,133.3L1440,96L1440,320L1413.3,320C1386.7,320,1333,320,1280,320C1226.7,320,1173,320,1120,320C1066.7,320,1013,320,960,320C906.7,320,853,320,800,320C746.7,320,693,320,640,320C586.7,320,533,320,480,320C426.7,320,373,320,320,320C266.7,320,213,320,160,320C106.7,320,53,320,27,320L0,320Z">
                    </path>
                </svg>
            </div>
            {{-- -------------List--------------- --}}p-3 px-5
            <ul class="my-8 p-5 space-y-5">
                <li class="bg-gray-800  border-r-2 border-green-400 text-white"><a class="block p-3 px-5"
                        href="{{route("show.users")}}">اضافه کردن ادمین</a></li>
                <li class="bg-gray-800  border-r-2 border-green-400 text-white"><a class="block p-3 px-5"
                        href="">کاربران</a></li>
                <li class="bg-gray-800  border-r-2 border-green-400 text-white"><a class="block p-3 px-5"
                        href="{{route('show.baner')}}">اضافه کردن بنر سایت</a></li>
                <li class="bg-gray-800  border-r-2 border-green-400 text-white"><a class="block p-3 px-5"
                        href="{{route("show.celebritise")}}">اضافه کردن مشاهیر</a></li>
                <li class="bg-gray-800  border-r-2 border-green-400 text-white"><a class="block p-3 px-5"
                        href="{{route('show.works')}}">اضافه کردن آثار</a></li>
                <li class="bg-gray-800  border-r-2 border-green-400 text-white"><a class="block p-3 px-5"
                        href="">اضافه کردن خبر</a></li>
                <li class="bg-gray-800  border-r-2 border-green-400 text-white"><a class="block p-3 px-5"
                        href="{{route('show.galary')}}">اضافه کردن تصاویر</a></li>
                <li class="bg-gray-800  border-r-2 border-green-400 text-white"><a class="block p-3 px-5"
                        href="">صفحه درباره ما</a></li>
                <li class="bg-gray-800  border-r-2 border-green-400 text-white"><a class="block p-3 px-5"
                        href="">پشتیبانی</a></li>
            </ul>
        </div>
        <div class="w-[83%] h-full overflow-scroll bg-gray-100">
            @yield('body')
        </div>
    </main>
    <script src="{{url("/")}}/assets/js/jQuery.js"></script>
    <script src="{{url('/')}}/assets/js/sweetalert.js"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>  
    @yield('scripts')
</body>

</html>
