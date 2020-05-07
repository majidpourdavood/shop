@section('title' , ' | ورود به پنل کاربری ')
@section('description' , '')
@extends('site.master')
@section('css')
    <link rel="stylesheet" href="{{ asset('css/login.css?v=0.4') }}">
@endsection
@section('content')
    <div class="container">
        <div class="row justify-content-center login_register_page">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">{{ __('ورود به حساب کاربری') }}</div>

                    <div class="card-body">


                        @include('site.layout.message')
                        <form method="POST" action="{{ route('login') }}" class="form_login_register">
                            @csrf
                            <div class="form-group row">
                                <div class="col-12">
                                    <input type="text" class="form-control " name="identity"
                                           value="{{ old('identity') }}"
                                           required autocomplete="identity"
                                           placeholder="شماره موبایل یا ایمیل یا نام کاربری" autofocus>
                                    <i class="fas fa-user"></i>
                                </div>
                            </div>

                            <div class=" row">

                                <div class=" col-12">
                                    <input type="password" class="form-control " name="password"
                                           required autocomplete="current-password" placeholder="پسورد">
                                    <i class="fas fa-key"></i>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class=" col-12">
                                    <div class="custom-control custom-checkbox">
                                        <input
                                                type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}
                                        class="custom-control-input" id="customCheck1">
                                        <label class="custom-control-label"
                                               for="customCheck1">  {{ __(' یادآوری کلمه عبور') }}</label>

                                    </div>
                                </div>
                            </div>
                            <div class="form-group row mb-0">
                                <div class=" col-12">
                                    <button type="submit" class="btn btn_login_register">
                                        {{ __('وارد شو') }}
                                    </button>

                                </div>
                            </div>



                            <div class=" row col-12">

                                <div class="row col-12 col-md-6 justify-content-start align-items-center">

                                    <a class="btn register_link_page_login" href="{{route('register')}}">
                                        اکانت نداری کلیک کن !
                                    </a>
                                </div>

                                {{--<div class="row col-12 col-md-6  justify-content-end align-items-center">--}}
                                    {{--<a class=" btn btn-info" href="{{route('showResetForm')}}">--}}
                                        {{--بازیابی رمز عبور--}}
                                    {{--</a>--}}
                                {{--</div>--}}
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
