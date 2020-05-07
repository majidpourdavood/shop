@section('title' , ' | تماس با ما ')
@section('description' , '')
@extends('site.master')

@section('content')
    <div class="content">
        <div class="row no-gutters">
            <div class="map_kerkerehmarket">
                <div id="ContactgoogleMap">

                </div>

            </div>
            <div class="container">
                <div class="row style_contact">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6 col-xl-5">
                        <div class="contact_right clothing">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">اطلاعات تماس</li>
                                <li class="list-group-item ">
									<span class="span_icon">
										<i class="fas fa-phone"></i>
									</span>
                                    <span class="text_contact_phone">تلفن : 88253663 - 88253663 </span>
                                </li>

                                <li class="list-group-item">
									<span class="span_icon">
										<i class="fas fa-map-marker-alt"></i>
									</span>
                                    <span class="text_contact_phone"> آدرس دفتر اصلی : تهران ، میدان هفت حوض خیابان جانبازان شرقی </span>

                                </li>
                                <li class="list-group-item">
									<span class="span_icon">
										<i class="fas fa-envelope"></i>
									</span>
                                    <span class="text_contact_phone"> ارتباط با ایمیل : info@kerkerehmarket.ir </span>
                                </li>
                                <li class="list-group-item">
                                    <a href="#" class=" btn span_icon_email">با ایمیل با ما در تماس باشید</a>
                                </li>
                            </ul>


                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6 col-xl-7">
                        <div class="form_contact clothing">
                            <h6>با پر کردن فرم زیر با ما در تماس باشید</h6>
                            <form>
                                <div class="form-row">
                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-6">
                                        <input type="text" class="form-control" placeholder="نام">
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-6">
                                        <input type="text" class="form-control" placeholder="نام خانوادگی">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-6">
                                        <input type="text" class="form-control" placeholder="نام شرکت">
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-6">
                                        <input type="text" class="form-control" placeholder="وب سایت">
                                    </div>
                                </div>
                                <div class="form-row ">
                                    <div class="col">
                                        <textarea class="form-control" aria-label="With textarea"></textarea>
                                    </div>
                                </div>
                                <button  class=" btn button_submit_form_contact">ارسال پیام

                                </button>
                            </form>


                        </div>
                    </div>



                </div>






            </div>
            <!-- end container -->
        </div>
    </div>
    <!-- end content -->
@endsection


@section('script')
    <script>

        function myMap() {
            var myCenter = new google.maps.LatLng(51.508742, -0.120850);
            var mapCanvas = document.getElementById("ContactgoogleMap");
            var mapOptions = {
                center: myCenter, zoom: 5
                ,
                mapTypeControl: true,
                mapTypeControlOptions: {
                    //   style: google.maps.MapTypeControlStyle.DROPDOWN_MENU,
                    position: google.maps.ControlPosition.TOP_LEFT
                }
            };
            var map = new google.maps.Map(mapCanvas, mapOptions);
            var marker = new google.maps.Marker({ position: myCenter });
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
