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
                        <div class="row no-gutters">

                            <div class="col-xs-12 col-sm-12 col-md-8 col-lg-6 radio_botton_address clothing">
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="ordering1" name="ordering1" class="custom-control-input">
                                    <label class="custom-control-label label_radio_bottom" for="ordering1">
                                        آدرس : تهران ، میدان هفت حوض ، خیابان جانبازان شرقی
                                    </label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="ordering2" name="ordering2" class="custom-control-input">
                                    <label class="custom-control-label label_radio_bottom" for="ordering2">
                                        آدرس : تهران ، میدان هفت حوض ، خیابان جانبازان شرقی
                                    </label>
                                </div>
                            </div>


                            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-6">
                                <a class="card-title btn btn_address_new clothing">افزودن آدرس جدید</a>
                            </div>
                        </div>

                        <!-- <p class="card-text">With supporting text below as a natural lead-in to additional content.</p> -->
                        <div class="row no-gutters">

                            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                                <a href="#" class="btn btn_back_buy clothing">بازگشت به صفحه خرید</a>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                                <a href="#" class="btn btn_send_ask clothing">ثبت سفارش</a>
                            </div>
                        </div>
                    </div>
                </div>








            </div>
            <div class="page_address_send clothing_address">
                <div class="row no-gutters ">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
                        <h3>آدرس خود را وارد کنید</h3>
                        <form>
                            <div class="form-group row no-gutters">
                                <label for="inputName3" class="col-sm-3 col-lg-4 col-form-label">نام گیرنده </label>
                                <div class="col-sm-9 col-lg-8">
                                    <input type="text" class="form-control" id="inputName3" placeholder="">
                                </div>
                            </div>
                            <div class="form-group row no-gutters">
                                <label for="inputPhone3" class="col-sm-3 col-lg-4 col-form-label"> شماره تلفن همراه
                                    *</label>
                                <div class="col-sm-9 col-lg-8">
                                    <input type="text" class="form-control" id="inputPhone3" placeholder="">
                                </div>
                            </div>
                            <div class="form-group row no-gutters">
                                <label for="inputPhone75" class="col-sm-3 col-lg-4 col-form-label"> شماره تلفن
                                    ثابت</label>
                                <div class="col-sm-9 col-lg-8">
                                    <div class="col-xs-9 col-sm-9 col-lg-8 w_70_576">
                                        <input type="text" class="form-control" id="inputPhone75" placeholder="">
                                    </div>
                                    <div class="col-xs-3 col-sm-3 col-lg-4 order-12 phone_sabet w_30_576">
                                        <input type="text" class="form-control" id="inputPhone75" placeholder="021">
                                    </div>
                                </div>


                            </div>
                            <div class="form-group row no-gutters">
                                <label for="inputAddress3" class="col-sm-3 col-lg-4 col-form-label"> کدپستی</label>
                                <div class="col-sm-9 col-lg-8">
                                    <input type="text" class="form-control" id="inputAddress3" placeholder="">
                                </div>
                            </div>

                            <div class="form-group row no-gutters">
                                <label for="inputState" class="col-sm-3 col-lg-4 col-form-label"> استان/شهر/محله
                                    *</label>
                                <div class="col-sm-9 col-lg-8 select_style_address">
                                    <div class="col-xs-12 col-sm-4 select_address">
                                        <select id="inputState" class="form-control ">
                                            <option selected>استان</option>
                                            <option>...</option>
                                        </select>
                                    </div>
                                    <div class="col-xs-12 col-sm-4 select_address">
                                        <select id="inputState" class="form-control">
                                            <option selected>شهر</option>
                                            <option>...</option>
                                        </select>
                                    </div>

                                    <div class="col-xs-12 col-sm-4 select_address">
                                        <select id="inputState" class="form-control">
                                            <option selected>محله</option>
                                            <option>...</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row no-gutters">
                                <label for="exampleFormControlTextarea1" class="col-sm-3 col-lg-4 col-form-label"> آدرس
                                    *</label>
                                <div class="col-sm-9 col-lg-8">
                                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                                </div>
                            </div>
                        </form>

                    </div>

                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6 ">
                        <div class="page_address_left">
                            <h3>آدرس تحویل سفارش روی نقشه</h3>
                            <div class="with_100_map">
                                <div id="AddressgoogleMap"></div>

                            </div>
                        </div>

                    </div>

                </div>

                <div class="row no-gutters">
                    <div class="parent_address_save">
                        <button class="btn address_save">ذخیره</button>
                    </div>
                </div>
            </div>


        </div>
        <!-- end container -->
    </div>
    <!-- end content -->
@endsection

@section('script')
    <script>
        function myMap() {
            var myCenter = new google.maps.LatLng(51.508742, -0.120850);
            var mapCanvas = document.getElementById("AddressgoogleMap");
            var mapOptions = {
                center: myCenter, zoom: 5
                ,
                mapTypeControl: true,
                mapTypeControlOptions: {
                    position: google.maps.ControlPosition.TOP_LEFT
                }
            };
            var map = new google.maps.Map(mapCanvas, mapOptions);
            var marker = new google.maps.Marker({position: myCenter});
            marker.setMap(map);
            var contentString =
                '<div id="content" class="show_title_map" style=" color:#000;  font-weight: bold; font-size: 1rem;">' +
                'تهران ،ستارخان ، خیابان نیایش ، -امام منتظر ،کوچه ششم' +
                '</div>';
            google.maps.event.addListener(marker, 'click', function () {
                var infowindow = new google.maps.InfoWindow({
                    content: contentString,
                    maxWidth: 400
                });
                infowindow.open(map, marker);
            });
        }
    </script>

    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC1bX_HXR8hxo17NjJ3SwYmhJiauPNUdDo&callback=myMap"></script>

@endsection
