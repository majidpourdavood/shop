@section('title' , ' | ریست پسورد ')
@section('description' , '')
@extends('site.master')
@section('css')
    <link rel="stylesheet" href="{{ asset('css/login.css?v=0.4') }}">
@endsection
@section('content')
    <div class="container">
        <div class="row justify-content-center login_register_page register">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        بازیابی رمز عبور
                    </div>

                    <div class="card-body pr-4 pl-4 pb-4">

                        <div class=" row justify-content-center align-items-center">
                        <span class="text_error">
                           <strong id="message-error-code"></strong>
                       </span>
                        </div>


                        <form method="POST" action="{{ route('resetPasswordUser') }}"
                              class="form-horizontal " id="resetPasswordUser">
                            @csrf

                            <div class="form-row row justify-content-center align-items-center parent_input_form_forget_password">

                                <div class="col-md-12 col-xs-12 col-sm-12 margin_bottom_768_7rem">
                                    <div class="form-group row">

                                            <input type="text" class="form-control has-feedback" name="email_mobile"
                                                   placeholder="تلفن همراه یا ایمیل خود را وارد کنید"
                                                   value="{{ old('email_mobile') }}">

                                    </div>

                                </div>

                            </div>


                            <div class="row justify-content-center align-items-center parent_btn_forget_password">
                                <button class="btn btn-info" title="ارسال رمز عبور جدید" type="submit">ارسال رمز عبور
                                    جدید
                                </button>
                            </div>


                            <div class=" row col-12 mt-4">

                                <div class="row col-12 col-md-7 justify-content-start align-items-center">
                                    <a class="btn register_link_page_login" href="{{route('login')}}">
                                        رفتن به صفحه ثبت نام !
                                    </a>

                                </div>

                                <div class="row col-12 col-md-5  justify-content-end align-items-center">
                                    <a class="btn register_link_page_login" href="{{route('register')}}">
                                        رفتن به صفحه ورود !
                                    </a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


@section('script')
    <script>

        $('#resetPasswordUser').on('submit', function (e) {
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
                    if (data.status == 'success') {

                        $('.text_error').html(data.data);
                        $('.text_error').css({
                            "color" : "#00CC00",
                            "margin" : ".9rem",
                            "font-size" : "1.1rem"

                        });

                    }
                    $('.text_error').html(data.data);
                    $('.text_error').css({
                        "margin" : ".9rem",
                        "font-size" : "1.1rem"

                    });
                })
                .fail(function (data) {
                    $('.text_error').html(data.data);
                    $('.text_error').css({
                        "margin" : ".9rem",
                        "font-size" : "1.1rem"

                    });
                    console.log(data);

                });
        });
    </script>
@endsection
