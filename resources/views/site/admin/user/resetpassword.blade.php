@section('title' , ' | تغییر پسورد ')
@section('description' , '')
@extends('site.admin.panel')
@section('css')

@endsection
@section('content')
    <div class="container">
        <div class="row col-12 parent_breadcrumb_panel_top">
            <ul class="list-inline row col-12">
                <li class="list-inline-item col">
                    <nav class="breadcrumb_panel_top" aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a class="btn" href="#">تغییر پسورد </a></li>
                        </ol>
                    </nav>
                </li>

                @include('site.layout.clock-time')


            </ul>
        </div>

        <div class="row col-12 content_panel_layout">
            <div class=" col-12">
                <h1>تغییر پسورد </h1>

                <form class="form_panel" method="POST" action="{{ route('users.updatePassword', $user->id) }}"
                      aria-label="{{ __('Reset Password') }}">
                    {{ csrf_field() }}
                    {{ method_field('PATCH') }}

                    <div class="form-group row">
                        <label for="password" class="col-md-2 col-form-label text-md-right">{{ __('پسورد') }}</label>

                        <div class="col-md-6">
                            <input id="password" type="password"
                                   class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                                   name="password">

                            @if ($errors->has('password'))
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>


                    <div class="form-group row">
                        <label for="password-confirm"
                               class="col-md-2 col-form-label text-md-right">{{ __('تکرار پسورد') }}</label>

                        <div class="col-md-6">
                            <input id="password-confirm" type="password" class="form-control"
                                   name="password_confirmation">
                        </div>
                    </div>

                    <div class="form-group row mb-0">
                        <div class="col-md-8 row justify-content-end">
                            <button type="submit" class="btn btn-info">
                                {{ __('ارسال') }}
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('script')

@endsection
