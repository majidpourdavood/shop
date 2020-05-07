@section('title' , ' | محصول ')
@section('description' , '')
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
                        <a href="#" title="">فروشگاه اینترنتی کرکره مارکت</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="#" title=""> آرايشي و بهداشتي</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="#" title=""> بهداشت و زيبايي ناخن</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="#" title=""> مانيکور، پديکور</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="#" title=""> مانيکور ناخن</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">پاناسونيک </li>
                </ol>
            </nav>
            <div class="row view_product">

                <div class="col-sm-12 col-md-12 col-lg-5 zoom_style">
                    <div class="image_zoome">
                        <img id="zoom_05" src="../images/1-clothing.jpg" alt="" class=""
                             data-zoom-image="../images/1-clothing.jpg"
                        />
                    </div>
                    <div class="image_zoome_thumbnail row no-gutters" id="gallery_01">
                        <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 col">
                            <a href="#" data-image="../images/1-clothing.jpg" title=""
                               data-zoom-image="../images/1-clothing.jpg">
                                <div class="item_zoom">
                                    <img id="zoom_05" src="../images/1-clothing.jpg" alt="" class="img-fluid" />
                                </div>
                            </a>
                        </div>

                        <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 col">
                            <a href="#" data-image="../images/4-clothing.jpg" title=""
                               data-zoom-image="../images/4-clothing.jpg">
                                <div class="item_zoom">
                                    <img id="zoom_05" src="../images/4-clothing.jpg" alt="" class="img-fluid" />
                                </div>
                            </a>
                        </div>
                        <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 col">
                            <a href="#" data-image="../images/3-clothing.jpg" title=""
                               data-zoom-image="../images/3-clothing.jpg">
                                <div class="item_zoom">
                                    <img id="zoom_05" src="../images/3-clothing.jpg" alt="" class="img-fluid" />
                                </div>
                            </a>
                        </div>
                        <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 col">
                            <a href="#" data-image="../images/23.jpg" title=""
                               data-zoom-image="../images/23.jpg">
                                <div class="item_zoom">
                                    <img id="zoom_05" src="../images/23.jpg" alt="" class="img-fluid" />
                                </div>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col-sm-12 col-md-12 col-lg-7">
                    <div class="row no-gutters">
                        <div class="col-sm-12 col-md-8 col-lg-8">
                            <div class="content_view_product_clothing card">
                                <h3>{{$product->title}} </h3>
                                <p>تولیدکننده :
                                    <a href="#" title="" class="change_color_clothing">برجیس </a> دسته بندی:
                                    <a href="#" title="" class="change_color_clothing">چاشنی</a>
                                </p>
                                <div class="row no-gutters">
                                    <button class="btn btn_Price_view_product_clothing translate" role="button"> قیمت 198,000 تومان </button>
                                    <span class="star_view_product_clothing">
										<i class="far fa-star"></i>
										<i class="far fa-star"></i>
										<i class="fas fa-star"></i>
										<i class="fas fa-star"></i>
										<i class="fas fa-star"></i>
									</span>
                                </div>
                                <ul class="list-group list-group-flush ul_property_view_product_clothing">
                                    <li class="list-group-item active">ویژگی های کلیدی</li>
                                    <li class="list-group-item">رنگ بندی :
                                        <span class="color_product_clothing"></span>
                                        <span class="color_product_clothing active"></span>
                                        <span class="color_product_clothing"></span>
                                        <span class="color_product_clothing"></span>
                                        <span class="color_product_clothing"></span>
                                        <span class="color_product_clothing"></span>
                                        <span class="color_product_clothing"></span>
                                    </li>
                                    <li class="list-group-item">سایز بندی :
                                        <span class="size_product">md</span>
                                        <span class="size_product active">lg</span>
                                        <span class="size_product">xl</span>
                                        <span class="size_product">xxl</span>
                                    </li>
                                </ul>

                                <div class=" bottom_product_clothing">

                                    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                        <a class="btn btn_detail_view_product_clothing" title="" href="#viewdetail"> مشاهده جزئیات </a>

                                    </div>

                                    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">

                                        <button type="button" class="btn btn-lg shop_card_veiw_product_clothing">
                                            <i class="fa fa-shopping-cart" aria-hidden="true">
                                                <!-- <span class="bag_buy">9</span> -->
                                            </i> افزودن به سبد خرید
                                        </button>
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
                    <h3 class="title_slider_product"> پرفروش‌ ترین لباس‌های مردانه -
                        <a class="link_title_product_clothing" href="#">نمایش همه</a>
                    </h3>
                </div>
                <section class="slider_clothing_product owl-carousel owl-theme">

                    <div class="col item">
                        <a href="#" title="">
                            <div class="card product_slider_clothing">
                                <div class="img_slider_clothing">
                                    <img class="lazy card-img-top" data-src="../images/2-food.jpg"
                                         src1="../images/poster.jpg" src2="../images/2-food.jpg"/>
                                </div>

                                <div class="card-body">
                                    <h5>
                                        مانيکور ناخن پاناسونيک WC30 مانيکور ناخن پاناسونيک WC30 مانيکور ناخن پاناسونيک WC30

                                    </h5>

                                </div>
                                <div class="card-footer">

                                    <button type="button" class="btn btn_price_clothing">280,000 تومان</button>
                                    <button type="button" class="btn btn_buy_clothing">خرید</button>

                                </div>
                            </div>
                        </a>
                    </div>

                    <div class="col item">
                        <a href="#" title="">
                            <div class="card product_slider_clothing">
                                <div class="img_slider_clothing">
                                    <img class="lazy card-img-top" data-src="../images/1-food.jpg"
                                         src1="../images/poster.jpg" src2="../images/7.jpg" alt="Card image cap">
                                </div>
                                <div class="card-body">
                                    <h5>مانيکور ناخن پاناسونيک WC30 مانيکور ناخن پاناسونيک WC30 مانيکور ناخن پاناسونيک
                                        WC30</h5>

                                </div>
                                <div class="card-footer">

                                    <button type="button" class="btn btn_price_clothing">280,000 تومان</button>
                                    <button type="button" class="btn btn_buy_clothing">خرید</button>

                                </div>
                            </div>
                        </a>
                    </div>

                    <div class="col item">
                        <a href="#" title="">
                            <div class="card product_slider_clothing">
                                <div class="img_slider_clothing">
                                    <img class="lazy card-img-top" data-src="../images/6.jpg"
                                         src1="../images/poster.jpg" src2="../images/7.jpg" alt="Card image cap">
                                </div>
                                <div class="card-body">
                                    <h5>مانيکور ناخن پاناسونيک WC30</h5>

                                </div>
                                <div class="card-footer">

                                    <button type="button" class="btn btn_price_clothing">280,000 تومان</button>
                                    <button type="button" class="btn btn_buy_clothing">خرید</button>

                                </div>
                            </div>
                        </a>
                    </div>

                    <div class="col item">
                        <a href="#" title="">
                            <div class="card product_slider_clothing">
                                <div class="img_slider_clothing">
                                    <img class="lazy card-img-top" data-src="../images/1-clothing.jpg"
                                         src1="../images/poster.jpg" src2="../images/5.jpg" alt="Card image cap">
                                </div>
                                <div class="card-body">
                                    <h5>مانيکور ناخن پاناسونيک WC30</h5>

                                </div>
                                <div class="card-footer">

                                    <button type="button" class="btn btn_price_clothing">280,000 تومان</button>
                                    <button type="button" class="btn btn_buy_clothing">خرید</button>

                                </div>
                            </div>
                        </a>
                    </div>

                    <div class="col item">
                        <a href="#" title="">
                            <div class="card product_slider_clothing">
                                <div class="img_slider_clothing">
                                    <img class="lazy card-img-top" data-src="../images/s1.jpg"
                                         src1="../images/poster.jpg" src2="../images/s1.jpg" alt="Card image cap">
                                </div>
                                <div class="card-body">
                                    <h5>مانيکور ناخن پاناسونيک WC30</h5>

                                </div>
                                <div class="card-footer">

                                    <button type="button" class="btn btn_price_clothing">280,000 تومان</button>
                                    <button type="button" class="btn btn_buy_clothing">خرید</button>

                                </div>
                            </div>
                        </a>
                    </div>

                    <div class="col item">
                        <a href="#" title="">
                            <div class="card product_slider_clothing">
                                <div class="img_slider_clothing">
                                    <img class="lazy card-img-top" data-src="../images/3.jpg"
                                         src1="../images/poster.jpg" src2="../images/3.jpg" alt="Card image cap">
                                </div>
                                <div class="card-body">
                                    <h5>مانيکور ناخن پاناسونيک WC30</h5>

                                </div>
                                <div class="card-footer">

                                    <button type="button" class="btn btn_price_clothing">280,000 تومان</button>
                                    <button type="button" class="btn btn_buy_clothing">خرید</button>

                                </div>
                            </div>
                        </a>
                    </div>

                    <div class="col item">
                        <a href="#" title="">
                            <div class="card product_slider_clothing">
                                <div class="img_slider_clothing">
                                    <img class="lazy card-img-top" data-src="../images/4.jpg"
                                         src1="../images/poster.jpg" src2="../images/4.jpg" alt="Card image cap">
                                </div>
                                <div class="card-body">
                                    <h5>مانيکور ناخن پاناسونيک WC30</h5>

                                </div>
                                <div class="card-footer">

                                    <button type="button" class="btn btn_price_clothing">280,000 تومان</button>
                                    <button type="button" class="btn btn_buy_clothing">خرید</button>

                                </div>
                            </div>
                        </a>
                    </div>

                </section>

            </section>

            <div class="row nav_tabs_view_product clothing" id="viewdetail">

                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" title="" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">درباره محصول</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" title="" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">مشخصات فنی </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" title="" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">نظرات کاربران</a>
                    </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                        <h3>مانيکور ناخن پاناسونيک WC30</h3>
                        <p> اگر زيبايي دستانان همانند زيبايي صورتتان برايتان اهميت دارد بهتر است از دستگاهي استفاده کنيد که نيازتان را رفع کرده؛
                            دستگاه مانيکور ناخن پاناسونيک با مدل WC30 اين امکان را به شما خواهد داد که دستاني با ناخن‌هاي زيبا داشته باشيد. اين
                            دستگاه داراي 3 سري مختلف جهت حالت دهي به قسمت‌هاي مختلف ناخن است که حکم سوهان و پوليش ناخن را برايتان فراهم مي‌کند.
                            شرکت پاناسونيک «Panasonic» برندي شناخته شده در زمينه‌توليد دستگاه‌هاي بهداشتي بوده و تا کنون توانسته مسير پر ترقي
                            را طي کند. بهداشت دستان يکي از عواملي است که از اهميت ويژه‌اي برخوردار است و در اعتماد به‌نفس نقش بسزايي دارد؛ مانيکور
                            ناخن هميشه جهت زيبايي و بهداشت ناخن‌هاي دست کاربرد دارد. هميشه براي سوهان کشيدن ناخن سعي کنيد از سوهان نرم استفاده
                            کنيد و هيچگاه ناخن را از دو طرف سوهان نکشيد؛ اين مانيکور با داشتن سوهان نرم از هر جهتي مناسب است. اين محصول با فضاي
                            کمي که اشغال مي‌کند در کيف دستي‌تان جاي داده شده و قادر به حمل آن در هر مکاني خواهيد بود. WC30 به صورت برقي کار مي‌کند
                            و باتري آن غير قابل شارژ بوده و با باتري AAA کار مي‌کند و به هيچ عنوان قابل شستشو نيست. پاناسونيک مدل WC30 را با 3
                            سري مختلف با توجه به نياز عوام و همگام با سليقه‌ي آنان به بازار معرفي کرده و با توجه به قيمت و کارايي محصول خريد معقولانه‌اي
                            خواهد بود.
                        </p>
                    </div>
                    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">


                        <h3>مشخصات فنی مانيکور ناخن پاناسونيک </h3>
                        <div class="row group_btn_tab_pane">
                            <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                                <button type="button" class="btn btn-block btn_tab_Pane_view_Product">نوع محصول</button>
                            </div>
                            <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9">
                                <button type="button" class="btn btn-block btn_tab_Pane_view_Product_Explanation">ست مانيکور</button>
                            </div>
                        </div>
                        <div class="row group_btn_tab_pane">
                            <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                                <button type="button" class="btn btn-block btn_tab_Pane_view_Product">نوع عملکرد</button>
                            </div>
                            <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9">
                                <button type="button" class="btn btn-block btn_tab_Pane_view_Product_Explanation">برقي</button>
                            </div>
                        </div>
                        <div class="row group_btn_tab_pane">
                            <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                                <button type="button" class="btn btn-block btn_tab_Pane_view_Product">مناسب براي</button>
                            </div>
                            <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9">
                                <button type="button" class="btn btn-block btn_tab_Pane_view_Product_Explanation">ناخن هاي دست</button>
                            </div>
                        </div>

                        <div class="row group_btn_tab_pane">
                            <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                                <button type="button" class="btn btn-block btn_tab_Pane_view_Product">ساير مشخصات</button>
                            </div>
                            <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9">
                                <button type="button" class="btn btn-block btn_tab_Pane_view_Product_Explanation">- مناسب برای حمل و نقل </button>
                                <button type="button" class="btn btn-block btn_tab_Pane_view_Product_Explanation">- غیر قابل شستشو </button>
                                <button type="button" class="btn btn-block btn_tab_Pane_view_Product_Explanation">- وزن دستگاه: 49 گرم </button>
                                <button type="button" class="btn btn-block btn_tab_Pane_view_Product_Explanation">- ابعاد: طول 16 سانتی متر</button>
                            </div>
                        </div>


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
                                شما هم می توانید در مورد این کالا نظر بدهید. برای ثبت نظرات، نقد و بررسی شما لازم است ابتدا وارد حساب کاربری خود شوید..
                            </p>
                            <div class="center_box_login_register">
                                <a href="javascript:void(0)" title="ورود" class="btn btn_login_tabpanel" data-toggle="modal" data-target="#LoginModal">ورود </a>
                                <a href="javascript:void(0)" title="ثبت نام" class="btn btn_register_tabpanel" data-toggle="modal" data-target="#registerModal">
                                    ثبت نام</a>
                            </div>


                        </div>


                        <div class="col-xs-8 col-sm-12 col-md-12 col-lg-8">
                            <div class="card comment_kerkerh clothing">
                                <div class="card-header header_comment">کامنت خود را وارد کنید</div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <!-- <label for="exampleFormControlTextarea1">Example textarea</label> -->
                                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
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
                                    واقعا راضیم ازش..بافت نرم و سبکی داره روی پوست صورت و پوشش دهی خوبی داره...من که خیلی دوسش دارم

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
                                            واقعا راضیم ازش..بافت نرم و سبکی داره روی پوست صورت و پوشش دهی خوبی داره...من که خیلی دوسش دارم


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
                    <h3 class="title_slider_product"> پرفروش‌ ترین لباس‌های مردانه -
                        <a class="link_title_product_clothing" href="#">نمایش همه</a>
                    </h3>
                </div>
                <section class="slider_clothing_product owl-carousel owl-theme">

                    <div class="col item">
                        <a href="#" title="">
                            <div class="card product_slider_clothing">
                                <div class="img_slider_clothing">
                                    <img class="lazy card-img-top" data-src="../images/2-food.jpg"
                                         src1="../images/poster.jpg" src2="../images/2-food.jpg"/>
                                </div>

                                <div class="card-body">
                                    <h5>
                                        مانيکور ناخن پاناسونيک WC30 مانيکور ناخن پاناسونيک WC30 مانيکور ناخن پاناسونيک WC30

                                    </h5>

                                </div>
                                <div class="card-footer">

                                    <button type="button" class="btn btn_price_clothing">280,000 تومان</button>
                                    <button type="button" class="btn btn_buy_clothing">خرید</button>

                                </div>
                            </div>
                        </a>
                    </div>

                    <div class="col item">
                        <a href="#" title="">
                            <div class="card product_slider_clothing">
                                <div class="img_slider_clothing">
                                    <img class="lazy card-img-top" data-src="../images/1-food.jpg"
                                         src1="../images/poster.jpg" src2="../images/7.jpg" alt="Card image cap">
                                </div>
                                <div class="card-body">
                                    <h5>مانيکور ناخن پاناسونيک WC30 مانيکور ناخن پاناسونيک WC30 مانيکور ناخن پاناسونيک
                                        WC30</h5>

                                </div>
                                <div class="card-footer">

                                    <button type="button" class="btn btn_price_clothing">280,000 تومان</button>
                                    <button type="button" class="btn btn_buy_clothing">خرید</button>

                                </div>
                            </div>
                        </a>
                    </div>

                    <div class="col item">
                        <a href="#" title="">
                            <div class="card product_slider_clothing">
                                <div class="img_slider_clothing">
                                    <img class="lazy card-img-top" data-src="../images/6.jpg"
                                         src1="../images/poster.jpg" src2="../images/7.jpg" alt="Card image cap">
                                </div>
                                <div class="card-body">
                                    <h5>مانيکور ناخن پاناسونيک WC30</h5>

                                </div>
                                <div class="card-footer">

                                    <button type="button" class="btn btn_price_clothing">280,000 تومان</button>
                                    <button type="button" class="btn btn_buy_clothing">خرید</button>

                                </div>
                            </div>
                        </a>
                    </div>

                    <div class="col item">
                        <a href="#" title="">
                            <div class="card product_slider_clothing">
                                <div class="img_slider_clothing">
                                    <img class="lazy card-img-top" data-src="../images/1-clothing.jpg"
                                         src1="../images/poster.jpg" src2="../images/5.jpg" alt="Card image cap">
                                </div>
                                <div class="card-body">
                                    <h5>مانيکور ناخن پاناسونيک WC30</h5>

                                </div>
                                <div class="card-footer">

                                    <button type="button" class="btn btn_price_clothing">280,000 تومان</button>
                                    <button type="button" class="btn btn_buy_clothing">خرید</button>

                                </div>
                            </div>
                        </a>
                    </div>

                    <div class="col item">
                        <a href="#" title="">
                            <div class="card product_slider_clothing">
                                <div class="img_slider_clothing">
                                    <img class="lazy card-img-top" data-src="../images/s1.jpg"
                                         src1="../images/poster.jpg" src2="../images/s1.jpg" alt="Card image cap">
                                </div>
                                <div class="card-body">
                                    <h5>مانيکور ناخن پاناسونيک WC30</h5>

                                </div>
                                <div class="card-footer">

                                    <button type="button" class="btn btn_price_clothing">280,000 تومان</button>
                                    <button type="button" class="btn btn_buy_clothing">خرید</button>

                                </div>
                            </div>
                        </a>
                    </div>

                    <div class="col item">
                        <a href="#" title="">
                            <div class="card product_slider_clothing">
                                <div class="img_slider_clothing">
                                    <img class="lazy card-img-top" data-src="../images/3.jpg"
                                         src1="../images/poster.jpg" src2="../images/3.jpg" alt="Card image cap">
                                </div>
                                <div class="card-body">
                                    <h5>مانيکور ناخن پاناسونيک WC30</h5>

                                </div>
                                <div class="card-footer">

                                    <button type="button" class="btn btn_price_clothing">280,000 تومان</button>
                                    <button type="button" class="btn btn_buy_clothing">خرید</button>

                                </div>
                            </div>
                        </a>
                    </div>

                    <div class="col item">
                        <a href="#" title="">
                            <div class="card product_slider_clothing">
                                <div class="img_slider_clothing">
                                    <img class="lazy card-img-top" data-src="../images/4.jpg"
                                         src1="../images/poster.jpg" src2="../images/4.jpg" alt="Card image cap">
                                </div>
                                <div class="card-body">
                                    <h5>مانيکور ناخن پاناسونيک WC30</h5>

                                </div>
                                <div class="card-footer">

                                    <button type="button" class="btn btn_price_clothing">280,000 تومان</button>
                                    <button type="button" class="btn btn_buy_clothing">خرید</button>

                                </div>
                            </div>
                        </a>
                    </div>

                </section>

            </section>

            <!-- end slider mardane -->

            <!-- begin slider mardane -->

            <section class="section_parent_clothing_slider">
                <div class="row">
                    <h3 class="title_slider_product"> پرفروش‌ ترین لباس‌های مردانه -
                        <a class="link_title_product_clothing" href="#">نمایش همه</a>
                    </h3>
                </div>
                <section class="slider_clothing_product owl-carousel owl-theme">

                    <div class="col item">
                        <a href="#" title="">
                            <div class="card product_slider_clothing">
                                <div class="img_slider_clothing">
                                    <img class="lazy card-img-top" data-src="/images/2-food.jpg"
                                         src1="/images/poster.jpg" src2="/images/2-food.jpg"/>
                                </div>

                                <div class="card-body">
                                    <h5>
                                        مانيکور ناخن پاناسونيک WC30 مانيکور ناخن پاناسونيک WC30 مانيکور ناخن پاناسونيک WC30

                                    </h5>

                                </div>
                                <div class="card-footer">

                                    <button type="button" class="btn btn_price_clothing">280,000 تومان</button>
                                    <button type="button" class="btn btn_buy_clothing">خرید</button>

                                </div>
                            </div>
                        </a>
                    </div>

                    <div class="col item">
                        <a href="#" title="">
                            <div class="card product_slider_clothing">
                                <div class="img_slider_clothing">
                                    <img class="lazy card-img-top" data-src="/images/1-food.jpg"
                                         src1="/images/poster.jpg" src2="/images/7.jpg" alt="Card image cap">
                                </div>
                                <div class="card-body">
                                    <h5>مانيکور ناخن پاناسونيک WC30 مانيکور ناخن پاناسونيک WC30 مانيکور ناخن پاناسونيک
                                        WC30</h5>

                                </div>
                                <div class="card-footer">

                                    <button type="button" class="btn btn_price_clothing">280,000 تومان</button>
                                    <button type="button" class="btn btn_buy_clothing">خرید</button>

                                </div>
                            </div>
                        </a>
                    </div>

                    <div class="col item">
                        <a href="#" title="">
                            <div class="card product_slider_clothing">
                                <div class="img_slider_clothing">
                                    <img class="lazy card-img-top" data-src="/images/6.jpg"
                                         src1="/images/poster.jpg" src2="/images/7.jpg" alt="Card image cap">
                                </div>
                                <div class="card-body">
                                    <h5>مانيکور ناخن پاناسونيک WC30</h5>

                                </div>
                                <div class="card-footer">

                                    <button type="button" class="btn btn_price_clothing">280,000 تومان</button>
                                    <button type="button" class="btn btn_buy_clothing">خرید</button>

                                </div>
                            </div>
                        </a>
                    </div>

                    <div class="col item">
                        <a href="#" title="">
                            <div class="card product_slider_clothing">
                                <div class="img_slider_clothing">
                                    <img class="lazy card-img-top" data-src="/images/1-clothing.jpg"
                                         src1="/images/poster.jpg" src2="/images/5.jpg" alt="Card image cap">
                                </div>
                                <div class="card-body">
                                    <h5>مانيکور ناخن پاناسونيک WC30</h5>

                                </div>
                                <div class="card-footer">

                                    <button type="button" class="btn btn_price_clothing">280,000 تومان</button>
                                    <button type="button" class="btn btn_buy_clothing">خرید</button>

                                </div>
                            </div>
                        </a>
                    </div>

                    <div class="col item">
                        <a href="#" title="">
                            <div class="card product_slider_clothing">
                                <div class="img_slider_clothing">
                                    <img class="lazy card-img-top" data-src="/images/s1.jpg"
                                         src1="/images/poster.jpg" src2="/images/s1.jpg" alt="Card image cap">
                                </div>
                                <div class="card-body">
                                    <h5>مانيکور ناخن پاناسونيک WC30</h5>

                                </div>
                                <div class="card-footer">

                                    <button type="button" class="btn btn_price_clothing">280,000 تومان</button>
                                    <button type="button" class="btn btn_buy_clothing">خرید</button>

                                </div>
                            </div>
                        </a>
                    </div>

                    <div class="col item">
                        <a href="#" title="">
                            <div class="card product_slider_clothing">
                                <div class="img_slider_clothing">
                                    <img class="lazy card-img-top" data-src="/images/3.jpg"
                                         src1="/images/poster.jpg" src2="/images/3.jpg" alt="Card image cap">
                                </div>
                                <div class="card-body">
                                    <h5>مانيکور ناخن پاناسونيک WC30</h5>

                                </div>
                                <div class="card-footer">

                                    <button type="button" class="btn btn_price_clothing">280,000 تومان</button>
                                    <button type="button" class="btn btn_buy_clothing">خرید</button>

                                </div>
                            </div>
                        </a>
                    </div>

                    <div class="col item">
                        <a href="#" title="">
                            <div class="card product_slider_clothing">
                                <div class="img_slider_clothing">
                                    <img class="lazy card-img-top" data-src="/images/4.jpg"
                                         src1="/images/poster.jpg" src2="/images/4.jpg" alt="Card image cap">
                                </div>
                                <div class="card-body">
                                    <h5>مانيکور ناخن پاناسونيک WC30</h5>

                                </div>
                                <div class="card-footer">

                                    <button type="button" class="btn btn_price_clothing">280,000 تومان</button>
                                    <button type="button" class="btn btn_buy_clothing">خرید</button>

                                </div>
                            </div>
                        </a>
                    </div>

                </section>

            </section>


        </div>
        <!-- end container -->
    </div>
    <!-- end content -->
@endsection

@section('script')

    <script src="{{asset('js/jquery.elevatezoom.js')}}"></script>

    <script>

        $(function() {
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
        $('.color_product_clothing').click( function(){
            $(this).toggleClass('active');
        });
        $('.size_product').click( function(){
            $(this).toggleClass('active');
        });


        var scroll_to = $('#viewdetail').offset().top;
        $("a[href='#viewdetail']").click(function () {
            $("html, body").animate({ scrollTop: scroll_to }, "slow");
            return false;
        });
        $('.qtyplus').click(function(e){
            e.preventDefault();
            fieldName = $(this).attr('field');
            var currentVal = parseInt($('input[name='+fieldName+']').val());
            if (!isNaN(currentVal)) {
                $('input[name='+fieldName+']').val(currentVal + 1);
            } else {
                $('input[name='+fieldName+']').val(0);
            }
        });
        $(".qtyminus").click(function(e) {
            e.preventDefault();
            fieldName = $(this).attr('field');
            var currentVal = parseInt($('input[name='+fieldName+']').val());
            if (!isNaN(currentVal) && currentVal > 0) {
                $('input[name='+fieldName+']').val(currentVal - 1);
            } else {
                $('input[name='+fieldName+']').val(0);
            }
        });
        $('.tooltip_color').tooltip();
        $('.product_slider_clothing').each(function(index){
            var data_src = $(this).find('img').attr('src1');
            var data_src_hover =  $(this).find('img').attr('src2');
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
