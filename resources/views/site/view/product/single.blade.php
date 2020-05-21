@section('title') | {{$product->title}} @stop
@section('description')  {{$product->meta_description}}@stop

@extends('site.master')
@section('css')
    <link rel="stylesheet" href="{{ asset('css/xzoom.css') }}">

@endsection

@section('content')
    <div class="content">
        <div class="container">
            <nav class="breadcrumb_product_style clothing " aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="#" title="">فروشگاه اینترنتی {{config('app.name')}}</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="#" title="">
                            {{$product->category->title}}
                        </a>
                    </li>

                    <li class="breadcrumb-item active" aria-current="page">{{$product->title}} </li>
                </ol>
            </nav>
            <div class="row view_product">

                <div class="col-sm-12 col-md-12 col-lg-5 zoom_style">
                    <div class="image_zoome">
                        <img id="zoom_05" src="{{$product->images[0]}}" alt="" class=""
                             data-zoom-image="{{$product->images[0]}}"
                        />
                    </div>
                    <div class="image_zoome_thumbnail row no-gutters" id="gallery_01">
                        @foreach($product->images as $image)
                            <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 col">
                                <a href="#" data-image="{{$image}}" title=""
                                   data-zoom-image="{{$image}}">
                                    <div class="item_zoom">
                                        <img id="zoom_05" src="{{$image}}" alt="" class="img-fluid"/>
                                    </div>
                                </a>
                            </div>
                        @endforeach

                    </div>
                </div>

                <div class="col-sm-12 col-md-12 col-lg-7">
                    <div class="row no-gutters">
                        <div class="col-sm-12 col-md-8 col-lg-8">
                            <div class="content_view_product_clothing card">
                                <h3>{{$product->title}} </h3>
                                <p>تولیدکننده :
                                    <a href="#" title="" class="change_color_clothing">
                                        {{$product->user->name}} {{$product->user->lastName}}
                                    </a>
                                    دسته بندی:
                                    <a href="#" title="" class="change_color_clothing">
                                        {{$product->category->title}}
                                    </a>
                                </p>
                                <div class="row no-gutters">
                                    <button class="btn btn_Price_view_product_clothing translate" role="button"> قیمت
                                        {{kamaNumber($product->price)}} تومان
                                    </button>
                                    {{--<span class="star_view_product_clothing">--}}
                                    {{--<i class="far fa-star"></i>--}}
                                    {{--<i class="far fa-star"></i>--}}
                                    {{--<i class="fas fa-star"></i>--}}
                                    {{--<i class="fas fa-star"></i>--}}
                                    {{--<i class="fas fa-star"></i>--}}
                                    {{--</span>--}}
                                </div>
                                <ul class="list-group list-group-flush ul_property_view_product_clothing">
                                    <li class="list-group-item active">ویژگی های کلیدی</li>

                                    @if(count($product->propertyProducts()->where('type', 1)->get()) > 0)
                                        @if(count($propertyProductsColor) > 0)
                                            <li class="list-group-item">


                                                <label for="color"> رنگ بندی : </label>
                                                <select name="color" id="color" class="form-control d-inline"
                                                        style="width: 8rem;">

                                                    @foreach($product->propertyProducts()->where('property_id', 6)->get() as $color)
                                                        <option value="{{$color->id}}">
                                                            {{$color->keyValue->name}}
                                                        </option>
                                                    @endforeach
                                                </select>

                                            </li>
                                        @endif
                                        @if(count($propertyProductsSize) > 0)

                                            <li class="list-group-item">

                                                <label for="size"> سایز بندی : </label>
                                                <select name="size" id="size" class="form-control d-inline"
                                                        style="width: 8rem;">

                                                    @foreach($product->propertyProducts()->where('property_id', 18)->get() as $size)
                                                        <option value="{{$size->id}}">
                                                            {{$size->keyValue->name}}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </li>
                                        @endif
                                    @else
                                        @if(count($propertyTop) > 0)
                                            <li class="list-group-item">
                                                @foreach($propertyTop as $top)

                                                    @if($top->type == 0)
                                                        {{$top->property->name   }}
                                                        :
                                                        {{$top->optionProperty->value   }}
                                                    @endif

                                                @endforeach
                                            </li>
                                            <li class="list-group-item">
                                                @foreach($propertyTop as $top)

                                                    @if($top->type == 2)
                                                        {{$top->property->name   }}
                                                        :
                                                        @foreach($top->value as $topValue)
                                                            {{$topValue   }} -
                                                        @endforeach
                                                    @endif
                                                @endforeach
                                            </li>
                                        @else
                                            ویژگی برای این محصول ثبت نشده است.
                                        @endif
                                    @endif
                                </ul>

                                <div class=" bottom_product_clothing">

                                    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                        <a class="btn btn_detail_view_product_clothing" title="" href="#viewdetail">
                                            مشاهده جزئیات </a>

                                    </div>

                                    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">

                                        <a href="{{route('addCartSinglePage' , $product->slug)}}"
                                           class="btn btn-lg shop_card_veiw_product_clothing"
                                           title="{{$product->title}}">
                                            <i class="fa fa-shopping-cart" aria-hidden="true">
                                                <!-- <span class="bag_buy">9</span> -->
                                            </i> افزودن به سبد خرید
                                        </a>
                                    </div>

                                </div>

                            </div>
                        </div>

                        <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 brand_page_view_product_clothing">

                        </div>
                    </div>

                </div>
            </div>


            <!-- slider page mahsol -->

            <section class="section_parent_clothing_slider">
                <div class="row">
                    <h3 class="title_slider_product">  محصولات مرتبط -
                        <a class="link_title_product_clothing" href="{{route('search',['type'=>'new'])}}">نمایش همه</a>
                    </h3>
                </div>
                <section class="slider_clothing_product owl-carousel owl-theme">
                    @foreach($productNews as $productNew)
                        <div class="col item">
                            <div class="card product_slider_clothing">
                                <div class="img_slider_clothing">
                                    <a href="{{route('product' , $productNew->slug)}}" title="{{$productNew->title}}">
                                        <img class="lazy card-img-top" src="{{$productNew->images[0]}}" alt=""/>
                                    </a>
                                </div>

                                <div class="card-body">
                                    <a href="{{route('product' , $productNew->slug)}}" title="{{$productNew->title}}">
                                        <h5> {{$productNew->title}}</h5>
                                    </a>
                                </div>
                                <div class="card-footer">

                                    <button type="button"
                                            class="btn btn_price_clothing"> {{kamaNumber($productNew->price)}}
                                        تومان

                                    </button>
                                    <a href="{{route('addCart' , $productNew->slug)}}" title="{{$productNew->title}}">

                                        <button type="button" class="btn btn_buy_clothing">
                                            <i class="fa fa-plus" aria-hidden="true"></i>

                                            سبد خرید
                                        </button>
                                    </a>
                                </div>
                            </div>

                        </div>

                    @endforeach
                </section>

            </section>

            <div class="row nav_tabs_view_product clothing" id="viewdetail">

                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" title="" id="home-tab" data-toggle="tab" href="#home" role="tab"
                           aria-controls="home" aria-selected="true">درباره محصول</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" title="" id="profile-tab" data-toggle="tab" href="#profile" role="tab"
                           aria-controls="profile" aria-selected="false">مشخصات فنی </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" title="" id="contact-tab" data-toggle="tab" href="#contact" role="tab"
                           aria-controls="contact" aria-selected="false">نظرات کاربران</a>
                    </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                        <h3>{{$product->title}}</h3>
                        <p>
                            {{$product->body}}
                        </p>
                    </div>
                    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">


                        <h3>مشخصات فنی {{$product->title}}  </h3>

                        @foreach($product->propertyProducts as $propertyProduct)
                           @if($propertyProduct->type != 1)
                            <div class="row group_btn_tab_pane">
                                <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                                    <button type="button" class="btn btn-block btn_tab_Pane_view_Product">
                                      {{$propertyProduct->property->name}}
                                    </button>
                                </div>
                                <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9">

                                    @if($propertyProduct->type == 2)

                                        @foreach($propertyProduct->value as $topValue)

                                            <button type="button" class="btn btn-block btn_tab_Pane_view_Product_Explanation">
                                                {{$topValue   }}
                                            </button>
                                        @endforeach
                                    @endif

                                        @if($propertyProduct->type == 0)


                                            <button type="button" class="btn btn-block btn_tab_Pane_view_Product_Explanation">
                                                {{$propertyProduct->optionProperty->value   }}
                                            </button>
                                        @endif
                                </div>
                            </div>
                            @endif

                        @endforeach


                    </div>
                    <div class="tab-pane  fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">

                        <div class="col-xs-12 col-sm-12 col-md-9 col-lg-6">

                            <ul class="list-group star_panel_rating_product">
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <div class="col-xs-10 col-sm-10 col-md-9 col-lg-9">
                                        <span class="span_tilte_rating_tap_panel"> کیفیت ساخت</span>
                                    </div>
                                    <div class="col-xs-2 col-sm-2 col-md-3 col-lg-3">
										<span class="star_rating_product">
											<i class="far fa-star"></i>
											<i class="far fa-star"></i>
											<i class="fas fa-star"></i>
											<i class="fas fa-star"></i>
											<i class="fas fa-star"></i>
										</span>
                                    </div>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <div class="col-xs-10 col-sm-10 col-md-9 col-lg-9">
                                        <span class="span_tilte_rating_tap_panel"> کیفیت ساخت</span>
                                    </div>
                                    <div class="col-xs-2 col-sm-2 col-md-3 col-lg-3">
										<span class="star_rating_product">
											<i class="far fa-star"></i>
											<i class="far fa-star"></i>
											<i class="fas fa-star"></i>
											<i class="fas fa-star"></i>
											<i class="fas fa-star"></i>
										</span>
                                    </div>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <div class="col-xs-10 col-sm-10 col-md-9 col-lg-9">
                                        <span class="span_tilte_rating_tap_panel"> کیفیت ساخت</span>
                                    </div>
                                    <div class="col-xs-2 col-sm-2 col-md-3 col-lg-3">
										<span class="star_rating_product">
											<i class="far fa-star"></i>
											<i class="far fa-star"></i>
											<i class="fas fa-star"></i>
											<i class="fas fa-star"></i>
											<i class="fas fa-star"></i>
										</span>
                                    </div>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <div class="col-xs-10 col-sm-10 col-md-9 col-lg-9">
                                        <span class="span_tilte_rating_tap_panel"> کیفیت ساخت</span>
                                    </div>
                                    <div class="col-xs-2 col-sm-2 col-md-3 col-lg-3">
										<span class="star_rating_product">
											<i class="far fa-star"></i>
											<i class="far fa-star"></i>
											<i class="fas fa-star"></i>
											<i class="fas fa-star"></i>
											<i class="fas fa-star"></i>
										</span>
                                    </div>
                                </li>

                            </ul>


                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-9 col-lg-6 position-relative">
                            <p>
                                شما هم می توانید در مورد این کالا نظر بدهید. برای ثبت نظرات، نقد و بررسی شما لازم است
                                ابتدا وارد حساب کاربری خود شوید..
                            </p>
                            <div class="center_box_login_register">
                                <a href="javascript:void(0)" title="ورود" class="btn btn_login_tabpanel"
                                   data-toggle="modal" data-target="#LoginModal">ورود </a>
                                <a href="javascript:void(0)" title="ثبت نام" class="btn btn_register_tabpanel"
                                   data-toggle="modal" data-target="#registerModal">
                                    ثبت نام</a>
                            </div>


                        </div>


                        <div class="col-xs-8 col-sm-12 col-md-12 col-lg-8">
                            <div class="card comment_kerkerh clothing">
                                <div class="card-header header_comment">کامنت خود را وارد کنید</div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <!-- <label for="exampleFormControlTextarea1">Example textarea</label> -->
                                        <textarea class="form-control" id="exampleFormControlTextarea1"
                                                  rows="3"></textarea>
                                    </div>
                                    <button type="button" class="btn btn_send_cooment">ارسال</button>

                                </div>
                            </div>
                        </div>


                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

                            <div class="media media_comment_view_parent">
                                <a href="#" title="">
                                    <div class="user_profile">
                                        <!-- <img src="../images/2.jpg" class="user_profile" alt="Generic placeholder image"> -->
                                    </div>
                                </a>
                                <div class="media-body">

                                    <div class="row">
                                        <a href="#" title="">
                                            <h5 class="mr-2 title_comment">مجید پورداود</h5>
                                        </a>
                                        <span class="date_time_comment">(یکشنبه 13 اسفند - 01:40)</span>
                                    </div>
                                    واقعا راضیم ازش..بافت نرم و سبکی داره روی پوست صورت و پوشش دهی خوبی داره...من که
                                    خیلی دوسش دارم

                                    <div class="media mt-3 media_comment_view">
                                        <a href="#" title="">
                                            <div class="user_profile">
                                                <!-- <img src="../images/2.jpg" class="user_profile" alt="Generic placeholder image"> -->
                                            </div>
                                        </a>
                                        <div class="media-body">

                                            <div class="row">
                                                <a href="#" title="">
                                                    <h5 class="mr-2 title_comment">مجید پورداود</h5>
                                                </a>
                                                <span class="date_time_comment">(یکشنبه 13 اسفند - 01:40)</span>
                                            </div>
                                            واقعا راضیم ازش..بافت نرم و سبکی داره روی پوست صورت و پوشش دهی خوبی
                                            داره...من که خیلی دوسش دارم


                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>


                </div>
            </div>

            <!-- kalahaee ke dideade -->


            <section class="section_parent_clothing_slider">
                <div class="row">
                    <h3 class="title_slider_product"> محصولات پربازدید -
                        <a class="link_title_product_clothing" href="{{route('search',['type'=>'visit'])}}">نمایش
                            همه</a>
                    </h3>
                </div>
                <section class="slider_clothing_product owl-carousel owl-theme">
                    @foreach($productViewCounts as $productViewCount)
                        <div class="col item">
                            <div class="card product_slider_clothing">
                                <div class="img_slider_clothing">
                                    <a href="{{route('product' , $productViewCount->slug)}}"
                                       title="{{$productViewCount->title}}">
                                        <img class="lazy card-img-top" src="{{$productViewCount->images[0]}}" alt=""/>
                                    </a>
                                </div>

                                <div class="card-body">
                                    <a href="{{route('product' , $productViewCount->slug)}}"
                                       title="{{$productViewCount->title}}">
                                        <h5> {{$productViewCount->title}}</h5>
                                    </a>
                                </div>
                                <div class="card-footer">

                                    <button type="button"
                                            class="btn btn_price_clothing"> {{kamaNumber($productViewCount->price)}}
                                        تومان

                                    </button>
                                    <a href="{{route('addCart' , $productViewCount->slug)}}"
                                       title="{{$productViewCount->title}}">

                                        <button type="button" class="btn btn_buy_clothing">
                                            <i class="fa fa-plus" aria-hidden="true"></i>

                                            سبد خرید
                                        </button>
                                    </a>
                                </div>
                            </div>

                        </div>

                    @endforeach
                </section>

            </section>

            <!-- end slider mardane -->

            <!-- begin slider mardane -->


        </div>
        <!-- end container -->
    </div>
    <!-- end content -->
@endsection

@section('script')

    <script src="{{asset('js/jquery.elevatezoom.js')}}"></script>

    <script>

        $(function () {
            $('img.lazy').loadScroll(50000000);
        });

        $("#zoom_05").elevateZoom({
            zoomType: "inner",
            zoomWindowHeight: 400,
            zoomWindowWidth: 400,
            responsive: true,
            cursor: "crosshair",
            constrainType: "height",
            constrainSize: 274,
            gallery: 'gallery_01',
            galleryActiveClass: "active"
        });
        $("#zoom_05").bind("click", function (e) {
            var ez = $('#zoom_05').data('elevateZoom');
            return false;
        });
        $('.color_product_clothing').click(function () {
            $(this).toggleClass('active');
        });
        $('.size_product').click(function () {
            $(this).toggleClass('active');
        });


        var scroll_to = $('#viewdetail').offset().top;
        $("a[href='#viewdetail']").click(function () {
            $("html, body").animate({scrollTop: scroll_to}, "slow");
            return false;
        });
        $('.qtyplus').click(function (e) {
            e.preventDefault();
            fieldName = $(this).attr('field');
            var currentVal = parseInt($('input[name=' + fieldName + ']').val());
            if (!isNaN(currentVal)) {
                $('input[name=' + fieldName + ']').val(currentVal + 1);
            } else {
                $('input[name=' + fieldName + ']').val(0);
            }
        });
        $(".qtyminus").click(function (e) {
            e.preventDefault();
            fieldName = $(this).attr('field');
            var currentVal = parseInt($('input[name=' + fieldName + ']').val());
            if (!isNaN(currentVal) && currentVal > 0) {
                $('input[name=' + fieldName + ']').val(currentVal - 1);
            } else {
                $('input[name=' + fieldName + ']').val(0);
            }
        });
        $('.tooltip_color').tooltip();
        $('.product_slider_clothing').each(function (index) {
            var data_src = $(this).find('img').attr('src1');
            var data_src_hover = $(this).find('img').attr('src2');
            $(this).hover(function () {
                $(this).find('img').attr('src', data_src);
            }, function () {
                $(this).find('img').attr('src', data_src_hover);
            });

        });

        $(function () {
            $('img.lazy').loadScroll(500);
        });

        var slider_clothing_product = $('.slider_clothing_product.owl-carousel');
        slider_clothing_product.owlCarousel({
            loop: true,
            // center: true,
            rtl: true,
            margin: 10,
            nav: true,
            dots: true,
            responsiveClass: true,
            autoplay: true,
            autoplayHoverPause: true,
            autoplayTimeout: 2500,
            navText: ["<i class='fas fa-chevron-left'></i>", "<i class='fas fa-chevron-right'></i>"],
            responsive: {
                0: {
                    items: 1,
                    nav: true,
                    loop: true,
                    margin: 20,

                },
                505: {
                    items: 2,
                    nav: true,
                    margin: 20,

                },
                600: {
                    items: 2,
                    nav: true,
                    margin: 20,

                },
                767: {
                    items: 3,
                    loop: true,
                    margin: 20,
                },
                992: {
                    items: 3,
                    loop: true,
                    margin: 30,
                    dots: true,

                },
                1200: {
                    items: 4,
                    loop: true,
                    margin: 30,
                    dots: true,

                }
            }
        });


        var slider_brand = $('.slider-brand.owl-carousel');
        slider_brand.owlCarousel({
            loop: true,
            // center: true,
            rtl: true,
            margin: 10,
            nav: true,
            dots: true,
            responsiveClass: true,
            autoplay: true,
            autoplayHoverPause: true,
            autoplayTimeout: 2500,
            navText: ["<i class='fas fa-chevron-left'></i>", "<i class='fas fa-chevron-right'></i>"],
            responsive: {
                0: {
                    items: 1,
                    nav: true,
                    loop: true,
                    margin: 20,

                },
                505: {
                    items: 3,
                    nav: true,
                    margin: 20,

                },
                600: {
                    items: 3,
                    nav: true,
                    margin: 20,

                },
                767: {
                    items: 4,
                    loop: true,
                    margin: 20,
                },
                992: {
                    items: 5,
                    loop: true,
                    margin: 30,
                    dots: true,

                },
                1200: {
                    items: 7,
                    loop: true,
                    margin: 30,
                    dots: true,

                }
            }
        });


    </script>
@endsection
