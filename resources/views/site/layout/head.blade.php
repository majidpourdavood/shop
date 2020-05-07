
<head>
    <meta charset="utf-8"/>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta content="width=device-width, initial-scale=1" name="viewport"/>
    {{--<link rel="shortcut icon" type="image/x-icon" href="{{ asset('images/logoyarpay.jpg') }}">--}}
    <title> کرکره مارکت   @yield('title')</title>
    <meta name="description" content="@yield('description')">
    <meta name="keywords"  content="">

    <meta NAME="ROBOTS" CONTENT="INDEX, FOLLOW">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
    <meta name="handheldfriendly" content="true"/>
    <meta http-equiv="x-ua-compatible" content="ie=edge, chrome=1"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/app.css?v=0.6') }}">
    <link rel="stylesheet" href="{{ asset('css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/css-font/fontawesome-all.css') }}">
    @yield('css')
    <meta name="csrf-token" content="{{ csrf_token() }}">

</head>
