<!DOCTYPE html>
<html lang="fa-Ir" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <link rel="stylesheet" href="{{ url('/') }}/assets/css/globalStyles.css">
    @yield('styles')
    <style>
        .breadcrumb {
            display: flex !important;
        }

        .breadcrumb>li {
            position: relative !important;
            margin: 0 8px;
            color: rgb(39, 39, 39)
        }

        .breadcrumb>li:before {
            position: absolute !important;
            content: '/';
            color: rgb(182, 182, 182);
            font-size: 10px;
            /* تقسیم‌کننده */
            right: 110%;
            top: 10%;
        }

        .breadcrumb>li:last-child:before {
            content: '' !important;

        }

        .breadcrumb>li>a:hover {
            color: rgb(145, 70, 0)
        }
    </style>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>@yield('title')</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
</head>

<body class="overflow-hidden">
    @yield('body')

    {{-- @include('components.Loading') --}}
    <script src="{{ url('/') }}/assets/js/jQuery.js"></script>
    <script src="{{ url('/') }}/assets/js/sweetalert.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    @yield('scripts')
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            $("body").removeClass("overflow-hidden")
            $("#loading").addClass("hidden")
            console.log("first")
        });
    </script>
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

            timeElement.textContent =
                `${hours.toString().padStart(2, "0")}:${minutes.toString().padStart(2, "0")}:${seconds.toString().padStart(2, "0")}`;

            setTimeout(showCurrentTime, 1000);
        }
        showCurrentTime();
    </script>

    <script>
        $(document).ready(function() {
            $("#suportingForm").submit(function(event) {
                event.preventDefault();
                alert("loplop")
                var formData = $("#suportingForm").serializeArray(); // استفاده از serializeArray()


            });
        });
    </script>

    <script>
        $("#Support").click(function() {
            Swal.fire({
                title: "پشتیبانی",
                icon: "info",
                html: `
           <form id="SupportAjaxForm" class="flex flex-col w-full p-5" action="/saveSupport" method="POST">
        @csrf
        <input class="border-2 border-gray-100 rounded-sm focus:!border-r-green-500 outline-none py-3 px-5 my-2" type="text" name="name" placeholder="نام و نام خانوادگی">
        <input class="border-2 border-gray-100 rounded-sm focus:!border-r-green-500 outline-none py-3 px-5 my-2" type="text" name="phone" placeholder="شماره تماس">
        <input class="border-2 border-gray-100 rounded-sm focus:!border-r-green-500 outline-none py-3 px-5 my-2" type="text" name="email" placeholder="ایمیل">
        <textarea class="border-2 h-52 border-gray-100 rounded-sm focus:!border-r-green-500 outline-none py-3 px-5 my-2" name="description" id="" placeholder="متن"></textarea>
        <button class="w-full p-4 text-white bg-orange-700 hover:bg-orange-800 duration-500">فرستادن</button>
    </form>
                `,
                showCloseButton: true,
                showCancelButton: false,
                showConfirmButton: false,
            });

            $("#SupportAjaxForm").submit(function(event) {
                event.preventDefault()
                var formData = $("#SupportAjaxForm").serializeArray();

                $.ajax({
                    url: $(this).attr('action'),
                    type: "POST",
                    data: formData,
                    success: function(response) {
                        $("#SupportAjaxForm")[0].reset();
                        Swal.fire({
                            title: "ادمین",
                            text: "پیام شما با موفقیت ارسال شد",
                            icon: "success"
                        });
                    },
                    error: function(xhr, status, error) {
                        Swal.fire({
                            title: "ادمین",
                            text: "مشکلی پیش آمده ، لطفا تمامی فیلد های ضروری را پر کنید و دوباره امتحان کنید",
                            icon: "error"
                        });
                    }
                });
            })
        })
    </script>
    <script>
        $("#NewsLetterAjaxForm").submit(function(event) {
            event.preventDefault()
            var formData = $(this).serializeArray();

            $.ajax({
                url: $(this).attr('action'),
                type: "POST",
                data: formData,
                success: function(response) {
                    $("#NewsLetterAjaxForm")[0].reset();
                    Swal.fire({
                        title: "ادمین",
                        text: "پیام شما با موفقیت ارسال شد",
                        icon: "success"
                    });
                },
                error: function(xhr, status, error) {
                    Swal.fire({
                        title: "ادمین",
                        text: "مشکلی پیش آمده ، لطفا تمامی فیلد های ضروری را پر کنید و دوباره امتحان کنید",
                        icon: "error"
                    });
                }
            });

        })
    </script>
    <script>
        $("#show-mobile-menu").click(() => {
            if ($("#mobile-menu").hasClass("-right-[10000px]")) {
                $("#mobile-menu").removeClass("-right-[10000px]")
                $("body").addClass("!overflow-hidden")
            }
        })
        $("#hide-mobile-menu").click(() => {
            if (!$("#mobile-menu").hasClass("-right-[10000px]")) {
                $("#mobile-menu").addClass("-right-[10000px]")
                $("body").removeClass("!overflow-hidden")

            }
        })
    </script>
</body>

</html>
