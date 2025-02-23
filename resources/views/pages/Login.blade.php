<!DOCTYPE html>
<html lang="fa-Ir" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">

    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">

    <title>ورود ادمین</title>
</head>

<body>
    <div
        class="bg-purple-900 absolute top-0 left-0 bg-gradient-to-b from-gray-900 via-gray-900 to-purple-800 bottom-0 leading-5 h-full w-full overflow-hidden">

    </div>
    <div class="relative   min-h-screen  sm:flex sm:flex-row  justify-center bg-transparent rounded-3xl shadow-xl">
        <div class="flex-col flex  self-center lg:px-14 sm:max-w-4xl xl:max-w-md  z-10">
            <div class="self-start hidden lg:flex flex-col  text-gray-300">

                <h1 class="my-3 font-semibold text-4xl">خوش آمدید</h1>
                <p class="pr-3 my-4 text-sm opacity-75">از پسسورد و ایمیل خود مراقبت کنید</p>
                <p class="pr-3 my-4 text-sm opacity-75">چنانچه پسسورد رو فراموش کردید با ادمین اصلی تماس حاصل کنید تا
                    حساب شما رو ریست کند</p>
            </div>
        </div>
        <div class="flex justify-center self-center  z-10">
            <form action="{{ route('login.user') }}" method="POST" enctype="multipart/form-data">
				@csrf

                <div class="p-12 bg-white mx-auto rounded-3xl w-96 ">
                    <div class="mb-7">
                        <h3 class="font-semibold my-5 text-2xl text-gray-800">ورود </h3>
                        <div class="space-y-6">
                            <div class="">
                                <input
                                    class=" w-full text-sm  px-4 py-3 bg-gray-200 focus:bg-gray-100 border  border-gray-200 rounded-lg focus:outline-none focus:border-purple-400"
                                    type="email" placeholder="ایمیل" name="username">
                            </div>


                            <div class="relative" x-data="{ show: true }">
                                <input placeholder="کلمه عبور" type="password" name="password"
                                    class="text-sm text-gray-800 px-4 py-3 rounded-lg w-full bg-gray-200 focus:bg-gray-100 border border-gray-200 focus:outline-none focus:border-purple-400">
                            </div>
                            <div>
                                <button type="submit"
                                    class="w-full flex justify-center bg-purple-800  hover:bg-purple-500 text-gray-100 p-3  rounded-lg tracking-wide font-semibold  cursor-pointer transition ease-in duration-200">
                                    ورود
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <svg class="absolute bottom-0 left-0 " xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
        <path fill="#fff" fill-opacity="1"
            d="M0,0L40,42.7C80,85,160,171,240,197.3C320,224,400,192,480,154.7C560,117,640,75,720,74.7C800,75,880,117,960,154.7C1040,192,1120,224,1200,213.3C1280,203,1360,149,1400,122.7L1440,96L1440,320L1400,320C1360,320,1280,320,1200,320C1120,320,1040,320,960,320C880,320,800,320,720,320C640,320,560,320,480,320C400,320,320,320,240,320C160,320,80,320,40,320L0,320Z">
        </path>
    </svg>
	<script src="{{ url('/') }}/assets/js/jQuery.js"></script>
    <script src="{{ url('/') }}/assets/js/sweetalert.js"></script>
<script>
	            @if(session('error_login'))
                Swal.fire({
                    icon: 'error',
                    title: 'ادمین',
                    text: '{{ session('error_login') }}',
                });
            @endif
</script>
</body>

</html>
