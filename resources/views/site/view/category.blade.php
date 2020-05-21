@section('title' , ' | تماس با ما ')
@section('description' , '')
@extends('site.master')


@section('css')
    <link rel="stylesheet" href="{{asset('css/jquery-ui.css')}}">
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
                            {{$category->title}}
                        </a>
                    </li>

                </ol>
            </nav>

            <div class="row">
                <div class="col-sm-12 col-md-3 col-lg-3">
                    <div class="saidbar clothing">

                        <div class="category_saidbar ">
                            <h6>براساس دسته بندی</h6>
                            <div class="custom-control custom-checkbox custom_control">
                                <input type="checkbox" class="custom-control-input" id="category1">
                                <label class="custom-control-label custom_control_label" for="category1">آرایش
                                    چشم</label>
                            </div>
                            <div class="custom-control custom-checkbox custom_control">
                                <input type="checkbox" class="custom-control-input" id="category2">
                                <label class="custom-control-label custom_control_label" for="category2">آرایش
                                    صورت</label>
                            </div>
                            <div class="custom-control custom-checkbox custom_control">
                                <input type="checkbox" class="custom-control-input" id="category3">
                                <label class="custom-control-label custom_control_label" for="category3">آرایش
                                    لب</label>
                            </div>
                            <div class="custom-control custom-checkbox custom_control">
                                <input type="checkbox" class="custom-control-input" id="category4">
                                <label class="custom-control-label custom_control_label" for="category4">محصولات جانبی
                                    آرایشی </label>
                            </div>
                            <div class="custom-control custom-checkbox custom_control">
                                <input type="checkbox" class="custom-control-input" id="category5">
                                <label class="custom-control-label custom_control_label" for="category5">آرایش
                                    ناخن</label>
                            </div>
                        </div>

                        <div class="price_custom clothing">
                            <h6> براساس قیمت (تومان)</h6>
                            <p>
                                <input type="text" id="amount" readonly class="input_price">
                            </p>
                            <div id="slider-range"></div>
                        </div>

                        <div class="gender_saidbar">
                            <h6>براساس جنسیت </h6>
                            <div class="custom-control custom-checkbox custom_control">
                                <input type="checkbox" class="custom-control-input" id="gender1">
                                <label class="custom-control-label custom_control_label" for="gender1"> زن</label>
                            </div>
                            <div class="custom-control custom-checkbox custom_control">
                                <input type="checkbox" class="custom-control-input" id="gender2">
                                <label class="custom-control-label custom_control_label" for="gender2"> مرد</label>
                            </div>
                        </div>
                    </div>
                </div>


                <div class=" col-sm-12 col-md-9 col-lg-9">
                    <div class="content_view_category">
                        <div class="row no-gutters">
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-8">
								<span class="span_ordered_search clothing"> مرتب سازی براساس :
									<div class="custom-control custom-radio custom-control-inline">
										<input type="radio" id="ordering1" name="ordering"
                                               class="custom-control-input">
										<label class="custom-control-label label_radio_bottom"
                                               for="ordering1">قیمت</label>
									</div>
									<div class="custom-control custom-radio custom-control-inline">
										<input type="radio" id="ordering2" name="ordering"
                                               class="custom-control-input">
										<label class="custom-control-label label_radio_bottom" for="ordering2">پربازدیدترین</label>
									</div>
									<div class="custom-control custom-radio custom-control-inline">
										<input type="radio" id="ordering3" name="ordering"
                                               class="custom-control-input">
										<label class="custom-control-label label_radio_bottom"
                                               for="ordering3">جدیدترین</label>
									</div>
									<div class="custom-control custom-radio custom-control-inline">
										<input type="radio" id="ordering4" name="ordering"
                                               class="custom-control-input">
										<label class="custom-control-label label_radio_bottom" for="ordering4">پرفروش ترین</label>
									</div>
									<div class="custom-control custom-control-inline margin_right_0">

										<select id="inputState" class="form-control select_ordered">
											<option selected>نزولی</option>
											<option>صعودی</option>
										</select>
									</div>

								</span>

                            </div>

                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-10 col-xl-4">
                                <div class="input-group style_search_product">
                                    <input type="text" class="form-control form_search form_search_product"
                                           placeholder="  محصول مورد نظرتان را جستجو کنید ..."
                                           aria-label="Recipient's username" aria-describedby="basic-addon2">
                                    <button class="btn btn-outline-secondary search_submit" type="button">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </div>
                            </div>
                        </div>

                        <div class="row product_category">

                            @foreach($products as $product)
                                <div class="col-xs-4 col-sm-6 col-md-6 col-lg-4 col-xl-4 w_50_576_t_480">
                                    <div class="card product_slider_clothing">
                                        <div class="img_slider_clothing">
                                            <a href="{{route('product' , $product->slug)}}" title="{{$product->title}}">
                                                <img class="lazy card-img-top" src="{{$product->images[0]}}" alt=""/>
                                            </a>
                                        </div>

                                        <div class="card-body">
                                            <a href="{{route('product' , $product->slug)}}" title="{{$product->title}}">
                                                <h5> {{$product->title}}</h5>
                                            </a>
                                        </div>
                                        <div class="card-footer">

                                            <button type="button" class="btn btn_price_clothing"> {{kamaNumber($product->price)}}
                                                تومان

                                            </button>
                                            <a href="{{route('addCart' , $product->slug)}}" title="{{$product->title}}">

                                                <button type="button" class="btn btn_buy_clothing">
                                                    <i class="fa fa-plus" aria-hidden="true"></i>

                                                    سبد خرید
                                                </button>
                                            </a>
                                        </div>
                                    </div>

                                </div>

                            @endforeach

                        </div>

                        <!-- begin pagination -->
{!! $products->render() !!}
                        {{--<nav aria-label="Page navigation example" class="navigation_category_page clothing">--}}
                            {{--<ul class="pagination justify-content-center">--}}
                                {{--<li class="page-item disabled">--}}
                                    {{--<a class="page-link" href="#" title="" tabindex="-1">--}}
                                        {{--<i class="fas fa-chevron-right"></i>--}}
                                    {{--</a>--}}
                                {{--</li>--}}
                                {{--<li class="page-item">--}}
                                    {{--<a class="page-link" title="" href="#">3</a>--}}
                                {{--</li>--}}
                                {{--<li class="page-item">--}}
                                    {{--<a class="page-link active" title="" href="#">2</a>--}}
                                {{--</li>--}}
                                {{--<li class="page-item disabled">--}}
                                    {{--<a class="page-link" title="" href="#">...</a>--}}
                                {{--</li>--}}
                                {{--<li class="page-item">--}}
                                    {{--<a class="page-link" title="" href="#">1</a>--}}
                                {{--</li>--}}
                                {{--<li class="page-item">--}}
                                    {{--<a class="page-link" href="#" title="">--}}
                                        {{--<i class="fas fa-chevron-left"></i>--}}
                                    {{--</a>--}}
                                {{--</li>--}}
                            {{--</ul>--}}
                        {{--</nav>--}}

                        <!-- end pagination -->


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
        $('.tooltip_color').tooltip();
    </script>
    <script src="{{asset('js/jquery-ui.js')}}"></script>

    <script>
        $(document).ready(function () {
            $('.product_category_clothing').each(function (index) {
                var data_src = $(this).find('img').attr('src1');
                var data_src_hover = $(this).find('img').attr('src2');
                $(this).hover(function () {
                    $(this).find('img').attr('src', data_src);
                }, function () {
                    $(this).find('img').attr('src', data_src_hover);
                });
            });

            $(function () {
                $("#slider-range").slider({
                    range: true,
                    min: 0,
                    max: 700000,
                    values: [100000, 600000],
                    slide: function (event, ui) {
                        $("#amount").val("  از  " + ui.values[0] + "  " + " تا  " + ui.values[1] + "  ");
                    }
                });
                $("#amount").val("  از " + $("#slider-range").slider("values", 0) +
                    "  تا " + $("#slider-range").slider("values", 1) + "  ");
            });

        });
    </script>
@endsection
