@section('title' , ' | ویرایش اطلاعات کاربر ')
@section('description' , '')
@extends('site.layout.panel')
@section('css')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/css/select2.min.css" rel="stylesheet"/>
    {{--<link href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/16.0.4/css/intlTelInput.css" rel="stylesheet"/>--}}
    {{--<link href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/16.0.4/img/flags.png" rel="stylesheet"/>--}}
    <link rel="stylesheet" href="{{ asset('css/last.css') }}">

@endsection
@section('content')
    <div class="container">
        <div class="row col-12 parent_breadcrumb_panel_top">
            <ul class="list-inline row col-12">
                <li class="list-inline-item col">
                    <nav class="breadcrumb_panel_top" aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">ویرایش اطلاعات کاربر</a></li>
                        </ol>
                    </nav>
                </li>

                @include('site.layout.clock-time')


            </ul>
        </div>

        <div class="row col-12 content_panel_layout">
            <div class=" col-12">
                <h1>ویرایش اطلاعات کاربر</h1>
                @include('site.layout.flash-message')
                <form class="form-horizontal form_panel" action="{{ route('user.update' ,  $user->id ) }}"
                      method="post"
                      enctype="multipart/form-data">
                    {{ csrf_field() }}
                    {{ method_field('PATCH') }}



                    <div class="form-row">
                        <div class="col-12 parent_btn_submit_form_panel">
                            <button type="submit" class="btn btn_submit_form_panel">ارسال</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/js/select2.min.js"></script>
    {{--<script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/16.0.4/js/intlTelInput-jquery.min.js"></script>--}}
    {{--<script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/16.0.4/js/intlTelInput.min.js"></script>--}}
    {{----}}
    <script>
        // $(".mobile").intlTelInput({
        //     utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/8.4.6/js/utils.js"
        // });
        // $(document).ready(function() {
        //     $('.select2').select2();
        // });
        var code = $('#select1 option:selected').val();

        // alert(code);
        if (code) {
            $.ajax({
                url: '/ajax/' + code,
                type: "GET",
                dataType: "json",
                success: function (data) {
                    $("#select2").empty();
                    // $("#select2").append('<option> انتخاب کنید</option>');

                    $.each(data, function (key, value) {
                        $('#select2').append('<option value="' + key + '">' + value + '</option>')
                    });
                }
            })
        } else {
            $("#select2").empty();
        }

        $('#select1').on('change', function () {
            var code = $('#select1 option:selected').val();

            // alert(code);
            if (code) {
                $.ajax({
                    url: '/ajax/' + code,
                    type: "GET",
                    dataType: "json",
                    success: function (data) {
                        $("#select2").empty();
                        // $("#select2").append('<option> انتخاب کنید</option>');

                        $.each(data, function (key, value) {
                            $('#select2').append('<option value="' + key + '">' + value + '</option>')
                        });
                    }
                })
            } else {
                $("#select2").empty();
            }

        });


        $('#fileUpload').change(function (e) {
            $('.btn_fileUpload').html('<p>' + $(this).val() + '</p>');
            $('.btn_fileUpload').css({
                "overflow": "hidden"
            });
            $('.btn_fileUpload>span').hide();

        });
        $('#tags').select2({
            tags: true,
            tokenSeparators: [",", " "],
            createSearchChoice: function (term, data) {
                if ($(data).filter(function () {
                    return this.text.localeCompare(term) === 0;
                }).length === 0) {
                    return {
                        id: term,
                        text: term
                    };
                }
            },
            multiple: true,
            language: "fa",
            dir: "rtl",
        });
        $('#industries').select2({
            tags: true,
            tokenSeparators: [",", " "],
            createSearchChoice: function (term, data) {
                if ($(data).filter(function () {
                    return this.text.localeCompare(term) === 0;
                }).length === 0) {
                    return {
                        id: term,
                        text: term
                    };
                }
            },
            multiple: true,
            language: "fa",
            dir: "rtl",
        });
        $('#steps').select2({
            tags: true,
            tokenSeparators: [",", " "],
            createSearchChoice: function (term, data) {
                if ($(data).filter(function () {
                    return this.text.localeCompare(term) === 0;
                }).length === 0) {
                    return {
                        id: term,
                        text: term
                    };
                }
            },
            multiple: true,
            language: "fa",
            dir: "rtl",
        });


        $(function () {
            var role = $('#role_id').find('option:selected').data('role');
            console.log(role);
            if (role === 'investor') {
                $('.show_role_investor').show();
            } else {
                $('.show_role_investor').hide();
            }

            if (role === 'mentor') {
                $('.show_role_mentor').show();
            } else {
                $('.show_role_mentor').hide();
            }
        });

        $('#role_id').change(function (e) {
            // alert(e.target.value);
            // console.log(e);
            // var role =  $(this).find('option:selected').data('role');
            // console.log(role);
            if ($(this).find('option:selected').data('role') === 'investor') {
                $('.show_role_investor').show();
            } else {
                $('.show_role_investor').hide();
            }

            if ($(this).find('option:selected').data('role') === 'mentor') {
                $('.show_role_mentor').show();
            } else {
                $('.show_role_mentor').hide();
            }
        });

        $('#select2').select2({
            language: "fa",
            dir: "rtl",
            dropdownAutoWidth: true,
        });
        $('#select1').select2({
            language: "fa",
            dir: "rtl",
            dropdownAutoWidth: true,
        });
        $('#role_id').select2({
            language: "fa",
            dir: "rtl",
            dropdownAutoWidth: true,
        });

        $('#cate_id').select2({
            language: "fa",
            dir: "rtl",
            dropdownAutoWidth: true,
        });


    </script>
@endsection
