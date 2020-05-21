@section('title' , ' | محصول ')
@section('description' , '')
@extends('site.master')
@section('css')
    <link rel="stylesheet" href="{{ asset('css/xzoom.css') }}">

@endsection

@section('content')
    <div class="content">
        <div class="container">


            <div class="page_bazbini_sefaresh clothing">

                <div class="card">
                    <h5 class="card-header">انتخاب آدرس</h5>
                    <div class="card-body">
                        <form action="{{route('addAddressToCart')}}" method="get">


                            <div class="row col-12">

                                <div class="row col-12 col-sm-12 col-md-12 col-lg-12 radio_botton_address clothing">
                                    @foreach($userAuth->addresses as $address)
                                        <div class="custom-control custom-radio custom-control-inline col-12">
                                            <input type="radio" id="{{$address->code}}" name="address_id"
                                                   class="custom-control-input" value="{{$address->id}}"
                                                    {{$cart->address_id == $address->id ? 'checked' : ($userAuth->addresses[0]->id == $address->id ? 'checked' : '') }}
                                            >
                                            <label class="custom-control-label label_radio_bottom"
                                                   for="{{$address->code}}">
                                                آدرس : {{$address->body}} -

                                                 گیرنده :
                                                {{$address->name}} {{$address->lastName}}
                                            </label>
                                        </div>

                                    @endforeach

                                </div>


                                <div class="col-xs-12 col-sm-12 col-md-4 col-lg-6">
                                    {{--<a class="card-title btn btn_address_new clothing">افزودن آدرس جدید</a>--}}
                                </div>
                            </div>

                            <div class="row no-gutters">

                                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                                    <a href="{{route('cart')}}" class="btn btn_back_buy clothing">بازگشت به صفحه
                                        خرید</a>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                                    <button type="submit" class="btn btn_send_ask clothing">ثبت سفارش</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>


            </div>
            <div class="page_address_send clothing_address">
                <div class="row no-gutters ">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
                        <h3>آدرس خود را وارد کنید</h3>
                        @include('site.layout.flash-message')

                        <form class="form-horizontal form_panel"
                              action="{{ route('storeAddress') }}" method="post">
                            {{ csrf_field() }}
                            <div class="form-group row no-gutters">
                                <label for="name" class="col-sm-3 col-lg-4 col-form-label">نام گیرنده </label>
                                <div class="col-sm-9 col-lg-8">
                                    <input type="text" name="name"
                                           value="{{old('name', $userAuth->name)}}"
                                           class="form-control" id="name" placeholder="">
                                </div>
                            </div>
                            <div class="form-group row no-gutters">
                                <label for="lastName" class="col-sm-3 col-lg-4 col-form-label">نام خانوادگی
                                    گیرنده </label>
                                <div class="col-sm-9 col-lg-8">
                                    <input type="text" name="lastName" class="form-control" id="lastName"
                                           value="{{old('lastName', $userAuth->lastName)}}" placeholder="">
                                </div>
                            </div>


                            <div class="form-group row no-gutters">
                                <label for="mobile" class="col-sm-3 col-lg-4 col-form-label"> شماره تلفن همراه
                                    *</label>
                                <div class="col-sm-9 col-lg-8">
                                    <input type="text" value="{{old('mobile', $userAuth->mobile)}}" name="mobile"
                                           class="form-control" id="mobile" placeholder="">
                                </div>
                            </div>
                            <div class="form-group row no-gutters">
                                <label for="phone" class="col-sm-3 col-lg-4 col-form-label"> شماره تلفن
                                    ثابت</label>
                                <div class="col-sm-9 col-lg-8">
                                    <input type="text" value="{{old('phone', $userAuth->phoneHome)}}" name="phone"
                                           class="form-control" id="phone" placeholder="">
                                </div>


                            </div>
                            <div class="form-group row no-gutters">
                                <label for="postalCode" class="col-sm-3 col-lg-4 col-form-label"> کدپستی</label>
                                <div class="col-sm-9 col-lg-8">
                                    <input type="text" name="postalCode" class="form-control" id="postalCode"
                                           value="{{old('postalCode', $userAuth->postalCode)}}" placeholder="">
                                </div>
                            </div>

                            <div class="form-group row no-gutters">
                                <label for="select1" class="col-12 col-lg-4 col-form-label">
                                    استان/شهر
                                    *</label>
                                <div class="row col-sm-9 col-lg-8 select_style_address">
                                    <div class="col-12 col-sm-6 select_address">
                                        <select name="location_id" id="select1" class="form-control ">
                                            @foreach($locations as $location)
                                                <option value="{{ $location->id }}">{{ $location->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-12 col-sm-6 select_address">
                                        <select name="location_id" id="select2" class="form-control">

                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row no-gutters">
                                <label for="body" class="col-sm-3 col-lg-4 col-form-label"> آدرس
                                    *</label>
                                <div class="col-sm-9 col-lg-8">
                                    <textarea class="form-control" name="body" id="body"
                                              rows="3">{{old('body' , $userAuth->address)}}</textarea>
                                </div>
                            </div>

                            <div class="row col-12 justify-content-end">
                                <button type="submit" class="btn btn-info">ذخیره</button>
                            </div>
                        </form>

                    </div>

                    {{--<div class="col-xs-12 col-sm-12 col-md-12 col-lg-6 ">--}}
                    {{--<div class="page_address_left">--}}
                    {{--<h3>آدرس تحویل سفارش روی نقشه</h3>--}}
                    {{--<div class="with_100_map">--}}
                    {{--<div id="AddressgoogleMap"></div>--}}

                    {{--</div>--}}
                    {{--</div>--}}

                    {{--</div>--}}

                </div>


            </div>


        </div>
        <!-- end container -->
    </div>
    <!-- end content -->
@endsection

@section('script')
    <script>


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

    </script>


@endsection
