<!DOCTYPE html>
<html lang="fa-Ir" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
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
    <script src="{{url("/")}}/assets/js/jQuery.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    @yield('scripts')
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            $("body").removeClass("overflow-hidden")
            $("#loading").addClass("hidden")
            console.log("first")
        });
    </script>
</body>

</html>
