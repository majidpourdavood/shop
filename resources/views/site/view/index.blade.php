<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8"/>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta content="width=device-width, initial-scale=1" name="viewport"/>
    {{--    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('images/') }}">--}}
    <title>{{config('app.name')}}  | بزرگترین فروشگاه اینترنتی </title>
    <meta name="description" content="{{config('app.name')}} | بزرگترین فروشگاه اینترنتی">
    <meta name="keywords" content="">
    <meta NAME="ROBOTS" CONTENT="INDEX, FOLLOW">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
    <meta name="handheldfriendly" content="true"/>
    <meta http-equiv="x-ua-compatible" content="ie=edge, chrome=1"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/app.css?v=0.6') }}">
    <link rel="stylesheet" href="{{ asset('css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/css-font/fontawesome-all.css') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">

</head>
<body>
{{--{{dd(bcrypt('123456'))}}--}}
@include('site.layout.header')
<div class="content">
    <div class="container">
        <div class="row">
            <div id="myCarousel" class="carousel slide carousel_clothing" data-ride="carousel">
                <!-- Wrapper for slides -->

                <ol class="carousel-indicators">
                    @foreach($sliders as $key => $slider)

                        <li data-target="#myCarousel" data-slide-to="{{$key}}" class="active"></li>
                    @endforeach

                </ol>

                <div class="carousel-inner">
                    @foreach($sliders as $key => $slider)
                        <div class="carousel-item {{$key == 0 ? 'active' : '' }}">
                            <a href="{{$slider->link}}" title="{{$slider->title}}">
                                <img src="{{$slider->image}}" class="img-fluid" alt="{{$slider->title}}">
                            </a>
                        </div>
                    @endforeach
                    <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
                        <i class="fas fa-chevron-left"></i>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
                        <i class="fas fa-chevron-right"></i>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
                <!-- End Carousel Inner -->
            </div>
            <!-- End Carousel -->
        </div>
        <div class="row bottom_slider_product_clothing">
            @foreach($productDiscounts as $productDiscount)
                <div class="col-xs-4 col-sm-12 col-md-4 col-lg-4 item">
                    <a href="{{$productDiscount->link}}" title="{{$productDiscount->title}}">
                        <img src="{{$productDiscount->image}}" class="img-fluid" alt="{{$productDiscount->title}}">
                    </a>
                    <h3>{{$productDiscount->discount}} %</h3>
                </div>
            @endforeach
        </div>

        <!-- begin brand -->
        <div class="row brand_clothing">

        </div>
        <!-- end brand -->

        <!-- begin slider mardane -->

        <section class="section_parent_clothing_slider">
            <div class="row">
                <h3 class="title_slider_product"> جدیدترین محصولات -
                    <a class="link_title_product_clothing" href="{{route('search',['type_page'=>'new'])}}">نمایش همه</a>
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

                                <button type="button" class="btn btn_price_clothing"> {{kamaNumber($productNew->price)}}
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

        <!-- end slider mardane -->

        <!-- begin slider mardane -->

        <section class="section_parent_clothing_slider">
            <div class="row">
                <h3 class="title_slider_product"> محصولات پربازدید -
                    <a class="link_title_product_clothing" href="{{route('search',['type_page'=>'visit'])}}">نمایش همه</a>
                </h3>
            </div>
            <section class="slider_clothing_product owl-carousel owl-theme">
                @foreach($productViewCounts as $productViewCount)
                    <div class="col item">
                        <div class="card product_slider_clothing">
                            <div class="img_slider_clothing">
                                <a href="{{route('product' , $productViewCount->slug)}}" title="{{$productViewCount->title}}">
                                    <img class="lazy card-img-top" src="{{$productViewCount->images[0]}}" alt=""/>
                                </a>
                            </div>

                            <div class="card-body">
                                <a href="{{route('product' , $productViewCount->slug)}}" title="{{$productViewCount->title}}">
                                    <h5> {{$productViewCount->title}}</h5>
                                </a>
                            </div>
                            <div class="card-footer">

                                <button type="button" class="btn btn_price_clothing"> {{kamaNumber($productViewCount->price)}}
                                    تومان

                                </button>
                                <a href="{{route('addCart' , $productViewCount->slug)}}" title="{{$productViewCount->title}}">

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
        <!-- begin brand -->
        <div class="row brand_clothing">

        </div>
        <!-- end brand -->

        <section class="section_parent_brand_slider_clothing">
            <div class="row style-top-brand">
                <h3 class="title_slider_product">برند های برتر</h3>
                <hr class="hr_title_brand">
            </div>

            <section class="slider-brand owl-carousel owl-theme">

                @foreach($brands as $brand)
                    <div class="col item">
                        <a href="{{$brand->link}}" title="{{$brand->title}}">
                            <div class="style_item_brand_slider">
                                <img src="{{$brand->image}}" class="img_resposive_brand" alt="{{$brand->title}}">
                            </div>
                        </a>
                    </div>
                @endforeach

            </section>

        </section>


    </div>
    <!-- end container -->

</div>
<!-- end content -->



@include('site.layout.footer')

<script src="{{asset('js/app.js')}}"></script>
<script src="{{asset('js/owl.carousel.min.js')}}"></script>
<script src="{{asset('js/owl.autoplay.js')}}"></script>

<script src="{{asset('js/jQuery.loadScroll.js')}}"></script>


<script>
    // $('.product_slider_clothing').each(function(index){
    //     var data_src = $(this).find('img').attr('src1');
    //     var data_src_hover =  $(this).find('img').attr('src2');
    //     $(this).hover(function () {
    //         $(this).find('img').attr('src', data_src);
    //     }, function () {
    //         $(this).find('img').attr('src', data_src_hover);
    //     });
    //
    // });
    $('#myCarousel').carousel({
        interval: 4000
    });
    $(function () {
        // Custom fadeIn Duration
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


</script>

</body>
</html>
