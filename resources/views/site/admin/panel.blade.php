<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    {{--<link rel="shortcut icon" type="image/x-icon" href="{{URL::asset('/images/d12.png')}}">--}}

    <title> پنل کاربری @yield('title')</title>
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
    <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet"/>


    @yield('css')
    {{--@include('site.layout.scriptGoogleAnalitices')--}}
    <script src=" {{ asset('js/sweetalert.min.js') }}"></script>

</head>
<body>


<div id='app'>
    @include('site.admin.sidebar')
    @include('sweet::alert')

</div>
{{--<script src="{{ asset('js/app.js') }}"></script>--}}
<script src="{{ asset('js/jquery-3.2.1.min.js') }}"></script>
<script src="{{ asset('js/popper.min.js') }}"></script>
<script src="{{ asset('js/bootstrap.min.js') }}"></script>

<script src="{{asset('ckeditor/ckeditor.js')}}"></script>
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>


<script>

    var english = {
        "sProcessing": "در حال پردازش...",
        "sEmptyTable": "داده ای برای نمایش وجود ندارد",
        "sInfo": "نمایش _START_ تا _END_ از _TOTAL_ مورد",
        "sInfoEmpty": "نمایش 0 تا 0 از 0 مورد",
        "sInfoFiltered": "(filtreret ud af _MAX_ rækker ialt)",
        "sInfoPostFix": "",
        "sInfoThousands": ",",
        "sLengthMenu": "نمایش _MENU_ مورد",
        "sLoadingRecords": "در حال لود ...",
        "sSearch": "جستجو : ",
        "sZeroRecords": "Ingen rækker matchede filter",
        "oPaginate": {
            "sFirst": "Første",
            "sLast": "Sidste",
            "sNext": "بعدی",
            "sPrevious": "قبلی"
        },
        "oAria": {
            "sSortAscending": ": activate to sort column ascending",
            "sSortDescending": ": activate to sort column descending"
        }
    };

    $('table').DataTable(
        {"oLanguage": english});


    CKEDITOR.replace('bodyAdmin', {
        autoParagraph: false,
        filebrowserUploadUrl: '/admin/upload-image',
        filebrowserImageUploadUrl: '/admin/upload-image',
        enterMode: CKEDITOR.ENTER_DIV,
        contentsLangDirection: "rtl",
        language: 'fa',
        extraPlugins: 'html5video',
        // shiftEnterMode: CKEDITOR.ENTER_P
    });

    // CKEDITOR.config.extraPlugins = 'html5video';
    // CKEDITOR.config.extraPlugins = 'video';
    // CKEDITOR.config.keystrokes.push(
    //     [ CKEDITOR.CTRL + 86, 'pastetext' ]
    // );
    // CKEDITOR.editorConfig = function( config )
    // {
    //     config.language = 'fa';
    //
    // };
</script>
<script>
    $(function () {
        $('[data-toggle="tooltip"]').tooltip()
    });
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
    $(".link_dropdown_panel ").click(function (e) {
        if ($('.sidenav').hasClass('active')) {
            $('[data-toggle=collapse]').prop('disabled', false);

            console.log("enabled");
        } else if (!$('.sidenav').hasClass('active')) {
            $('[data-toggle=collapse]').prop('disabled', true);
            console.log("disabled");
        }
        e.preventDefault();

    });

    (function ($) {

        $('#accordion >li').hover(function () {
            if (!$('.sidenav').hasClass('active')) {

                $(this).find('ul').addClass('hover_icon');
            }
        }, function () {
            if (!$('.sidenav').hasClass('active')) {
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

<div class="modal fade bd-example-modal-lg modal_tanin" id="showModalSubmitNotify"
     role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">
                    عنوان خود را تایپ کنید سپس بر روی ارسال کلیک کنید
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form class="headPropertyUpdate" id="headPropertyUpdate" method="post"
                      action="{{route('headPropertyUpdate')}}">
                    {{ csrf_field() }}
                    {{ method_field('PATCH') }}

                    <input id="id" type="hidden" name="id" value="">
                    <div class="col-sm-12">
                        <label for="name" class="control-label">عنوان </label>
                        <input type="text" class="form-control" name="name" id="name" value="">
                    </div>

                    <div class="col-12 justify-content-end row">
                        <button type="button" class="btn btn-success m-2 btnHeadPropertyUpdate">ارسال</button>
                    </div>

                </form>


            </div>
        </div>
    </div>
</div>
<div class="modal fade bd-example-modal-lg modal_tanin" id="showModalSubmitOption"
     role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">
                    عنوان خود را تایپ کنید سپس بر روی ارسال کلیک کنید
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form class="optionPropertyUpdate" id="optionPropertyUpdate" method="post"
                      action="{{route('optionPropertyUpdate')}}">
                    {{ csrf_field() }}
                    {{ method_field('PATCH') }}

                    <input id="id" type="hidden" name="id" value="">
                    <div class="col-sm-12">
                        <label for="value" class="control-label">عنوان </label>
                        <input type="text" class="form-control" name="value" id="value" value="">
                    </div>

                    <div class="col-12 justify-content-end row">
                        <button type="button" class="btn btn-success m-2 btnOptionPropertyUpdate">ارسال</button>
                    </div>

                </form>


            </div>
        </div>
    </div>
</div>
</html>
