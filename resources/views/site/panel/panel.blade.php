<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    {{--<link rel="shortcut icon" type="image/x-icon" href="{{URL::asset('/images/d12.png')}}">--}}

    <title> پنل کاربری  @yield('title')</title>
    <meta name="description" content="@yield('description')">
    <meta name="geo.region" content="IR-07"/>
    <meta name="geo.placename" content="tehran"/>
    <meta name="geo.position" content="35.7192481,51.4226295"/>
    <meta name="ICBM" content="35.7192481,51.4226295"/>
    <link rel="stylesheet" href="{{ asset('css/app.css?v=0.5') }}">
    <link rel="stylesheet" href="{{ asset('css/fontawesome/css/all.css?v=0.5') }}">
    <link rel="stylesheet" href="{{ asset('css/panel.css?v=0.5') }}">
    <link rel="stylesheet" href="{{ asset('css/style_panel.css?v=0.5') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    @yield('css')
    {{--@include('site.layout.scriptGoogleAnalitices')--}}
    <script src=" {{ asset('js/sweetalert.min.js') }}"></script>

</head>
<body>


<div id='app'>
    @include('site.panel.sidebar')
    @include('sweet::alert')

</div>
    {{--<script src="{{ asset('js/app.js') }}"></script>--}}
<script src="{{ asset('js/jquery-3.2.1.min.js') }}"></script>
<script src="{{ asset('js/popper.min.js') }}"></script>
<script src="{{ asset('js/bootstrap.min.js') }}"></script>

<script>

    persian = {
        0: '۰',
        1: '۱',
        2: '۲',
        3: '۳',
        4: '۴',
        5: '۵',
        6: '۶',
        7: '۷',
        8: '۸',
        9: '۹'
    };

    function traverse(el) {
        if (el.nodeType == 3) {
            var list = el.data.match(/[0-9]/g);
            if (list != null && list.length != 0) {
                for (var i = 0; i < list.length; i++)
                    el.data = el.data.replace(list[i], persian[list[i]]);
            }
        }
        for (var i = 0; i < el.childNodes.length; i++) {
            traverse(el.childNodes[i]);
        }
    }

    traverse(document.body);



    $(".menu_panel_icon").click(function (e) {
        $(".sidenav").toggleClass("active");
        $(".main_content_panel").toggleClass("active");
        // $(".parent_logo_panel").toggleClass("active");
        $(".parent_menu_panel_icon").toggleClass("active");
        $(".parent_toggle_navbar").toggleClass("active");
        $("#accordion > li").toggleClass("active");
        $(".parent_profile_panel").toggleClass("display_none");
        $(this).toggleClass("active");
        e.preventDefault();

        if ($('.link_dropdown_panel').parent().find('ul').hasClass('show')) {
            $('.collapse').collapse('hide');
        }
    });
    $(".link_dropdown_panel ").click(function(e) {
        if ( $('.sidenav').hasClass('active')) {
            $('[data-toggle=collapse]').prop('disabled', false);

            console.log("enabled");
        } else if ( ! $('.sidenav').hasClass('active')) {
            $('[data-toggle=collapse]').prop('disabled', true);
            console.log("disabled");
        }
        e.preventDefault();

    });

    (function ($) {

        $('#accordion >li').hover(function () {
            if (! $('.sidenav').hasClass('active')) {

                $(this).find('ul').addClass('hover_icon');
            }
        }, function () {
            if (! $('.sidenav').hasClass('active')) {
                $(this).find('ul').removeClass('hover_icon');
            }
        });

    })(jQuery);



    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

</script>
@yield('script')

</body>

</html>
