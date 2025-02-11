<!DOCTYPE html>
<html lang="fa-Ir" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{url('/')}}/assets/css/globalStyles.css">
    @yield('styles')
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>@yield('title')</title>
    <link
    rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"
  />
</head>

<body>
  {{ Breadcrumbs::render() }}
    @yield('body')
  <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    @yield('scripts')
</body>

</html>
