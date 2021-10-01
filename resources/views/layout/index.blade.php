<!DOCTYPE html>
<html>

<head>
    <base href="{{asset('')}}">
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>@yield('title')</title>
    <link rel="icon" href="img/logo/title.png" />
    <meta name="title" content="" />
    <meta name="description" content="" />
    <meta property="og:locale" content="vi" />
    <meta property="og:type" content="article" />
    <meta property="og:title" content="Trang chủ" />
    <meta property="og:description" content="" />
    <meta property="og:url" content="" />
    <meta property="og:site_name" content="" />
    <meta property="og:image" content="" />
    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link href="https://fonts.googleapis.com/css2?family=PT+Sans:ital,wght@0,400;0,700;1,400;1,700&display=swap"
        rel="stylesheet" />
    <link rel="stylesheet" href="dest/style.min.css" />
    <link rel="stylesheet" href="dest/fonts.css" />
    <link rel="stylesheet" href="dest/stylelibs.min.css" />
    <link rel="stylesheet" href="fonts/fontawesome-pro/css/all.min.css" />
</head>

<body>
    <!-- header  -->
    @include('layout.header')
    @yield('content')
    @include('layout.footer')
    <script type="text/javascript" src="dest/jsmain.min.js"></script>
    <script type="text/javascript" src="js/main.js"></script>
    <script type="text/javascript" src="js/calendar.js"></script>
    @yield('script')
</body>

</html>