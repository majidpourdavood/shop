@section('title' , ' | ثبت نام ')
@section('description' , '')
@extends('site.master')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/login.css?v=0.4') }}">
@endsection
@section('content')    <div class="container">
    <div class="row justify-content-center login_register_page register">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">{{ __('ثبت نام') }}</div>

                <div class="card-body">

                    @include('site.layout.message')


                    <form method="POST" id="form_get_mobile" class="form_login_register"
                          action="{{ route('getMobile') }}">
                                 <span class="text_error">
                           <strong id="message-error"></strong>
                       </span>
                        @csrf
                        <div class="form-group row">
                            <div class="col-12">
                                <input type="text" class="form-control " name="mobile" value="{{ old('mobile') }}"
                                       placeholder="شماره موبایل">
                                <i class="fas fa-mobile-alt"></i>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-12">
                                <input type="email" class="form-control " name="email" value="{{ old('email') }}"
                                       placeholder="ایمیل">
                                <i class="fas fa-envelope"></i>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-12">
                                <input type="password" class="form-control" name="password"
                                       id="password" placeholder="رمز عبور" value=""
                                       aria-autocomplete="list">
                                <i class="fas fa-key"></i>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-12">
                                <input type="password" class="form-control" name="password_confirmation"
                                       id="password-confirm" placeholder="تکرار رمز عبور" value="">
                                <i class="fas fa-key"></i>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class=" col-12">
                                <button type="submit" class="btn btn_login_register">
                                    {{ __('ثبت نام') }}
                                </button>

                            </div>
                        </div>


                            <div class=" row col-12">

                                <div class="row col-12 col-md-6 justify-content-start align-items-center">
                                    <a class="btn register_link_page_login" href="{{route('login')}}">
                                        قبلا ثبت نام کردی کلیک کن !
                                    </a>
                                </div>

                                {{--<div class="row col-12 col-md-6  justify-content-end align-items-center">--}}
                                    {{--<a class=" btn btn-info" href="{{route('showResetForm')}}">--}}
                                        {{--بازیابی رمز عبور--}}
                                    {{--</a>--}}
                                {{--</div>--}}
                            </div>

                    </form>
                    <div id="verify_form">
                                 <span class="text_error">
                           <strong id="message-error-code"></strong>
                       </span>
                        <form class="form-horizontal form_login_register verify" method="POST"
                              action="{{route('postVerify')}}" id="verify_form_code" aria-label="verify">

                            @csrf
                            {{--<p class="p_verify_page">کد تایید ارسال شده به شماره موبایل خود را وارد کنید .</p>--}}

                            <div class="form-row row justify-content-center align-items-center">
                                <div class="col-4 offset-4">
                                    <input id="code" type="text" class="form-control" name="code" value="">
                                </div>

                                <input id="mobile_verify" type="hidden" name="mobile" class="form-control" value="">

                            </div>
                            <div class="timer_send_code row justify-content-center align-items-center">
                                زمان ارسال کد &nbsp;<span id="time">03:00</span>
                            </div>


                            <div class="row justify-content-center align-items-center">
                                <button class="btn btn_send_code" type="submit">
                                    ارسال
                                </button>
                            </div>
                        </form>

                        <div class="text-right request_taeed">
                            <p class="p_no_receive_code"><i class="fas fa-circle"></i><span> در صورت عدم دریافت کد فعالسازی</span>
                                <span class="link_send_code_again"></span></p>
                            <form method="POST" action="{{route('repeatVerify')}}" id="repeat_verify">
                                @csrf
                                <input id="mobile_repeat_verify" type="hidden" name="mobile" class="form-control"
                                       value="">

                                <button type="submit" class="btn btn_request_taeed" data-toggle="tooltip"
                                        data-placement="top" title="کد دوباره ارسال شود">
                                    دوباره ارسال شود
                                </button>
                            </form>
                            <p></p>
                        </div>
                        <i class="fas fa-reply " id="show_get_mobile_hide_verify" data-toggle="tooltip"
                           data-placement="top" title="بازگشت"></i>
                    </div>


                </div>
            </div>
        </div>
    </div>
</div>

@endsection
@section('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <script>


        jQuery.validator.addMethod("phonenu", function (value, element) {
            if (/(09)[0-9]{9}/.test(value)) {
                return true;
            } else {
                return false;
            }

        }, "فیلد موبایل نامعتبر است");


        $("#form_get_mobile").validate({
            ignore: [], //Fixes your name issue
            rules: {
                mobile: {
                    required: true,
                    digits: 11,
                    phonenu: true,
                    number: true
                }, password: {
                    required: true,
                    minlength: 6,
                    number: true
                }, password_confirmation: {
                    required: true,
                    minlength: 6,
                    number: true
                },

            },
            messages: {
                mobile: {
                    required: "فیلد موبایل الزامی است",
                    number: "فیلد موبایل نامعتبر است",
                    minlength: "فیلد موبایل نباید کمتر از 11 کاراکتر باشد",
                    maxlength: "فیلد موبایل نباید بیشتر از 11 کاراکتر باشد",
                }
                , password: {
                    required: "فیلد پسورد الزامی است",
                    number: "فیلد پسورد نامعتبر است",
                    minlength: "فیلد پسورد نباید کمتر از 6 کاراکتر باشد",
                },
                password_confirmation: {
                    required: "فیلد تاییدیه ی رمز عبور الزامی است",
                    number: "فیلد تاییدیه ی رمز عبور نامعتبر است",
                    minlength: "فیلد تاییدیه ی رمز عبور نباید کمتر از 6 کاراکتر باشد",
                },
            },
            errorClass: "my-error-class",
            validClass: "my-valid-class",

            submitHandler: function (form) {
                $.ajax({
                    url: form.action,
                    method: form.method,
                    data: $(form).serialize(),
                    success: function (response) {
                        // $('#time').persianNum();

                        if (response.status == 'success') {
                            $("#verify_form").show();
                            $('#form_get_mobile').hide();

                            $('#message-error-code').html(response.message);
                            $('.timer_send_code').html(' زمان ارسال کد &nbsp;' + '<span id="time">۰۳:۰۰</span>');

                            var time = 60 * 3,
                                display = document.querySelector('#time');
                            startTimer(time, display, function () {
                                $('.timer_send_code').text(' ');
                                $('#message-error-code').html('زمان تایید کد به پایان رسید بر روی دوباره ارسال کلیک کنید');
                            });

                            $('#mobile_verify').val(response.mobile);
                            $('#mobile_repeat_verify').val(response.mobile);

                        } else if (response.status == 'sendCode') {

                            console.log(response);
                            $("#verify_form").show();
                            $('#form_get_mobile').hide();
                            $('#message-error-code').html(response.message);

                            $('#mobile_verify').val(response.mobile);
                            $('#mobile_repeat_verify').val(response.mobile);

                            var time = response.time,
                                display = document.querySelector('#time');
                            startTimer(time, display, function () {
                                $('.timer_send_code').text(' ');
                                $('#message-error-code').html('زمان تایید کد به پایان رسید بر روی دوباره ارسال کلیک کنید');

                            });

                        } else {
                            $('#message-error').html(response.message);
                        }


                        console.log(response);

                    }
                    ,
                    error: function (error) {

                        var errors = error.responseJSON.errors;
                        console.log(errors);

                        if (errors) {

                            if (errors.mobile) {
                                $('#message-error').html(errors.mobile[0]);
                            }    if (errors.email) {
                                $('#message-error').html(errors.email[0]);
                            }
                            if (errors.password) {
                                $('#message-error').html(errors.password[0]);
                            }
                            if (errors.password_confirmation) {
                                $('#message-error').html(errors.password_confirmation[0]);
                            }

                        }

                    }

                });


            }
        });


        $('#show_get_mobile_hide_verify').click(function (e) {
            e.preventDefault();
            $('#form_get_mobile').show();
            $('#verify_form').hide();
            $('#message-error').html(' ');
        });

        $("#verify_form_code").validate({
            ignore: [], //Fixes your name issue
            rules: {
                code: {
                    required: true,
                    minlength: 4,
                    digits: true
                }

            },
            messages: {
                code: {
                    required: "فیلد کد الزامی است",
                    minlength: "فیلد کد باید 4 عدد باشد",
                    digits: "فیلد کد نامعتبر است",
                }
            },
            errorClass: "my-error-class",
            validClass: "my-valid-class",

            submitHandler: function (form) {
                $.ajax({
                    url: form.action,
                    method: form.method,
                    data: $(form).serialize(),
                    success: function (data) {
                        // $('#time').persianNum();

                        console.log(data);

                        if (data.status == 'activeAccount') {
                            swal({
                                title: "فعال شدن اکانت",
                                text: data.message,
                                icon: "success",
                                button: "بسیار خب",
                            });
                            window.location.replace(data.redirect);

                        } else if (data.status == 'notUser') {
                            $('#message-error-code').html(data.message);
                        }
                        if (data.status == 'errorCode') {
                            $('#message-error-code').html(data.message);
                        }

                    }
                    ,
                    error: function (error) {

                        var errors = error.responseJSON.errors;
                        console.log(errors);

                        if (errors) {
                            if (errors.code) {
                                $('#message-error-code').html(errors.code[0]);
                            }
                        }

                    }
                });


            }
        });

        $(function () {
            // $('#verifyform').submit();
            $('#code').keyup(function () {
                var value_code = $(this).val();
                if (value_code.length == 4) {
                    $('#verify_form_code').submit();
                }
            });
            $('#code').blur(function () {
                var value_code = $(this).val();
                if (value_code.length == 4) {
                    $('#verify_form_code').submit();
                }
            });

        });

        // $('#verify_form_code').on('submit', function (e) {
        //     e.preventDefault();
        //     $.ajax({
        //         method: $(this).attr('method'),
        //         url: $(this).attr('action'),
        //         data: $(this).serialize(),
        //         async: true,
        //         dataType: 'json',
        //     })
        //         .done(function (data) {
        //
        //             console.log(data);
        //
        //             if (data.status == 'activeAccount') {
        //                 $('#form_get_mobile').hide();
        //                 $('#verify_form').hide();
        //                 $("#register_form_full").show();
        //                 $('#message-error-code').html(' ');
        //
        //                 $('#mobile_registerFull').val(data.mobile);
        //
        //             } else if (data.status == 'notUser') {
        //                 $('#message-error-code').html(data.message);
        //             }
        //             if (data.status == 'errorCode') {
        //                 $('#message-error-code').html(data.message);
        //             }
        //         })
        //         .fail(function (data) {
        //
        //             var errors = data.responseJSON.errors;
        //             console.log(errors);
        //
        //             if (errors) {
        //                 if (errors.code) {
        //                     $('#message-error-code').html(errors.code[0]);
        //                 }
        //             }
        //
        //         });
        // });

        $('#repeat_verify').on('submit', function (e) {
            e.preventDefault();
            $.ajax({
                method: $(this).attr('method'),
                url: $(this).attr('action'),
                data: $(this).serialize(),
                async: true,
                dataType: 'json',
            })
                .done(function (data) {

                    console.log(data);
                    // console.log(data.status);
                    // console.log(data.message);
                    if (data.status == 'notUser') {

                        $('#message-error-code').html(data.message);

                    } else if (data.status == 'sendCode') {

                        $('#message-error-code').html(data.message);

                    } else if (data.status == 'expireCode') {

                        $('#message-error-code').html(data.message);
                        $('.timer_send_code').html(' زمان ارسال کد &nbsp;' + '<span id="time">۰۳:۰۰</span>');

                        var time = 60 * 3,
                            display = document.querySelector('#time');
                        startTimer(time, display, function () {
                            $('.timer_send_code').text(' ');
                            // $('#message-error').html(data.message);
                            $('#message-error-code').html('زمان تایید کد به پایان رسید بر روی دوباره ارسال کلیک کنید');

                        });
                    }
                })
                .fail(function (data) {
                    console.log(data);
                    // console.log(data.status);
                    // console.log(data.message);
                });
        });

        function toEnNumber(inputNumber2) {
            if (inputNumber2 == undefined) return '';
            var str = $.trim(inputNumber2.toString());
            if (str == "") return "";
            str = str.replace(/0/g, '۰');
            str = str.replace(/1/g, '۱');
            str = str.replace(/2/g, '۲');
            str = str.replace(/3/g, '۳');
            str = str.replace(/4/g, '۴');
            str = str.replace(/5/g, '۵');
            str = str.replace(/6/g, '۶');
            str = str.replace(/7/g, '۷');
            str = str.replace(/8/g, '۸');
            str = str.replace(/9/g, '۹');
            return str;
        }

        function startTimer(duration, display, callback) {
            var timer = duration,
                minutes, seconds;

            var myInterval = setInterval(function () {
                minutes = parseInt(timer / 60, 10)
                seconds = parseInt(timer % 60, 10);

                minutes = minutes < 10 ? "0" + minutes : minutes;
                seconds = seconds < 10 ? "0" + seconds : seconds;

                minutes = toEnNumber(minutes);
                seconds = toEnNumber(seconds);

                display.textContent = minutes + ":" + seconds;
                if (--timer < 0) {
                    timer = duration;

                    // clear the interal
                    clearInterval(myInterval);

                    // use the callback
                    if (callback) {
                        callback();
                    }
                }
            }, 1000);
        }

        // $('#registerFull').on('submit', function (e) {
        //     e.preventDefault();
        //
        //     $.ajax({
        //         method: $(this).attr('method'),
        //         url: $(this).attr('action'),
        //         data: $(this).serialize(),
        //         async: true,
        //         dataType: 'json',
        //     })
        //         .done(function (data) {
        //             console.log(data);
        //             if (data.status == 'success') {
        //                 $('#message-error-register').html(data.message);
        //                 window.location.replace(data.redirect);
        //             } else if (data.status == 'notVerify') {
        //                 $('#message-error-register').html(data.message);
        //                 // window.location.replace(data.redirect);
        //             } else if (data.status == 'notUser') {
        //                 $('#message-error-register').html(data.message);
        //                 // window.location.replace(data.redirect);
        //             }
        //
        //
        //         })
        //         .fail(function (data) {
        //             console.log(data);
        //             var errors = data.responseJSON.errors;
        //             console.log(errors);
        //
        //             if (errors) {
        //                 if (errors.lastName) {
        //                     $('#message-error-register').html(errors.lastName[0]);
        //                 }
        //                 if (errors.name) {
        //                     $('#message-error-register').html(errors.name[0]);
        //                 }
        //                 if (errors.password) {
        //                     $('#message-error-register').html(errors.password[0]);
        //                 }
        //                 if (errors.password_confirmation) {
        //                     $('#message-error-register').html(errors.password_confirmation[0]);
        //                 }
        //
        //             }
        //         });
        // });

        // $('#form_get_mobile').on('submit', function (e) {
        //     e.preventDefault();
        //
        //     $.ajax({
        //         method: $(this).attr('method'),
        //         url: $(this).attr('action'),
        //         data: $(this).serialize(),
        //         async: true,
        //         dataType: 'json',
        //     })
        //         .done(function (data) {
        //
        //             // $('#time').persianNum();
        //
        //             if (data.status == 'success') {
        //                 $("#verify_form").show();
        //                 $('#form_get_mobile').hide();
        //
        //                 $('#message-error-code').html(data.message);
        //                 $('.timer_send_code').html(' زمان ارسال کد &nbsp;' + '<span id="time">۰۳:۰۰</span>');
        //
        //                 var time = 60 * 3,
        //                     display = document.querySelector('#time');
        //                 startTimer(time, display, function () {
        //                     $('.timer_send_code').text(' ');
        //                     $('#message-error-code').html('زمان تایید کد به پایان رسید بر روی دوباره ارسال کلیک کنید');
        //                 });
        //
        //                 $('#mobile_verify').val(data.mobile);
        //                 $('#mobile_repeat_verify').val(data.mobile);
        //
        //             } else if (data.status == 'sendCode') {
        //
        //                 console.log(data);
        //                 $("#verify_form").show();
        //                 $('#form_get_mobile').hide();
        //                 $('#message-error-code').html(data.message);
        //
        //                 $('#mobile_verify').val(data.mobile);
        //                 $('#mobile_repeat_verify').val(data.mobile);
        //
        //                 var time = data.time,
        //                     display = document.querySelector('#time');
        //                 startTimer(time, display, function () {
        //                     $('.timer_send_code').text(' ');
        //                     $('#message-error-code').html('زمان تایید کد به پایان رسید بر روی دوباره ارسال کلیک کنید');
        //
        //                 });
        //
        //             } else {
        //                 $('#message-error').html(data.message);
        //             }
        //
        //
        //             console.log(data);
        //
        //
        //         })
        //         .fail(function (data) {
        //             console.log(data);
        //             var errors = data.responseJSON.errors;
        //             console.log(errors);
        //
        //             if (errors) {
        //                 if (errors.mobile) {
        //                     $('#message-error').html(errors.mobile[0]);
        //                 }
        //             }
        //         });
        // });
    </script>

@endsection