@section('title' , ' | محصول ')
@section('description' , '')
@extends('site.master')
@section('css')

@endsection

@section('content')

    <div class="content">
        <div class="container">

            <div class="parent_table_buy clothing">

                <h1 class="h1_page_show_buy"><i class="fas fa-caret-left"></i> سبد خرید شما در کرکره مارکت </h1>
                @if($products)
                    <table class="table table-responsive-md table_page_buy">
                        <thead class="thead-light">
                        <tr>
                            <th scope="col">عکس</th>
                            <th scope="col">نام محصول</th>
                            <th scope="col">قیمت</th>
                            <th scope="col">تعداد</th>
                            <th scope="col">قیمت کل</th>
                            <th scope="col">حذف</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($products as $product)
                            <tr>
                                <!-- <th scope="row">1</th> -->
                                <td>
                                    <div class="style_img_buy">
                                        <img src="{{$product['item']['images'][0]}}" class="img-fluid"
                                             alt="{{$product['item']['title']}}">
                                    </div>
                                </td>
                                <td>{{$product['item']['title']}}</td>
                                <td> {{$product['item']['price']}} تومان</td>
                                <td><input type="number" class=" input_count_buy" name="" id="" min="1"
                                           value="{{$product['qty']}}"></td>
                                <td> {{$product['item']['price'] * $product['qty']}} تومان</td>
                                <td>
                                    <button class=" btn_delete_basket" type="button">

                                        <a class="child_item center_horizontal_vertical delete_cart"
                                           title="حذف از سبد خرید"
                                           onclick="return confirm('آیا میخواهید این محصول رو از سبد خرید خود حذف کنید ؟')"
                                           href="{{route('deleteItemCart', ['id' => $product['item']['id']])}}">
                                            <i class="fas fa-times"></i>

                                        </a>
                                    </button>
                                </td>

                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <div class="row no-gutters">

                        <div class="col-xs-4 col-sm-6 col-md-5 col-lg-4 ">
                            {{--<div class="input-group style_input_text">--}}
                                {{--<input type="text" class="form-control" placeholder="کد تخفیف خود را اینجا وارد نمایید"--}}
                                       {{--aria-label="Recipient's username" aria-describedby="basic-addon2">--}}
                                {{--<div class="input-group-append">--}}
                                    {{--<button class="btn input-group-text" type="button" id="basic-addon2">ثبت</button>--}}
                                {{--</div>--}}
                            {{--</div>--}}

                            <form class="form-horizontal discount" id="form_discount" action="{{route('discount')}}"
                                  method="post">
                                {{ csrf_field() }}
                                <div class="form-row">
                                    <div class="col-12 col-sm-9 col-md-7 col-lg-5 col-xl-4">
                                        <input type="text" class="form-control" placeholder="کد تخفیف خود را اینجا وارد نمایید"
                                          name="code"     aria-label="Recipient's username" aria-describedby="basic-addon2">
                                    </div>
                                    <div class="col">
                                        <div class="input-group-append">
                                            <button class="btn input-group-text" type="button" id="basic-addon2">ثبت</button>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <span class="message_discount"></span>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="col-xs-8 col-sm-6 col-md-7 col-lg-8 text_center_576">
                            <p class="price_col_page_kharid">مبلغ کل:
                                {{kamaNumber($totalPrice)}}
                                ریال </p>
                        </div>

                    </div>
                    <div class="row bottom_box_buy align-items-center">

                        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 ">
                            {{--<p class="p_text_buy">مبلغ کل: 68,500,000ریال </p>--}}
                        </div>
                        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                            {{--<p class="p_text_buy_center"> مجموع تخفیف‌های شما: 2,000,000ریال </p>--}}
                        </div>
                        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 text_center_576">
                            <!-- <p class="p_text_buy_left">مبلغ کل: 68,500,000ریال  </p> -->
                            <a class="btn bottom_buy_left" href="#">ثبت سفارش</a>
                        </div>


                    </div>
                    <div class="row time_send_page_payment clothing">

                        <h3>تاریخ ارسال کالای خود را مشخص کنید</h3>

                    </div>
                    <div class="row no-gutters clothing">

                        <div class="box_time_page_payment active">
                            <div class="text_time_page_payment">
                                <p>شنبه</p>
                                <p> 1397/01/18</p>
                            </div>
                            <div class="box_bottom_time_page_payment">
                                <i class="fas fa-check"></i>
                            </div>
                        </div>
                        <div class="box_time_page_payment">
                            <div class="text_time_page_payment">
                                <p>یکشنبه</p>
                                <p> 1397/01/19</p>
                            </div>
                            <div class="box_bottom_time_page_payment">
                                <i class="fas fa-check"></i>
                            </div>
                        </div>
                        <div class="box_time_page_payment">
                            <div class="text_time_page_payment">
                                <p>دوشنبه</p>
                                <p> 1397/01/20</p>
                            </div>
                            <div class="box_bottom_time_page_payment">
                                <i class="fas fa-check"></i>
                            </div>
                        </div>
                        <div class="box_time_page_payment">
                            <div class="text_time_page_payment">
                                <p>سه شنبه</p>
                                <p> 1397/01/21</p>
                            </div>
                            <div class="box_bottom_time_page_payment">
                                <i class="fas fa-check"></i>
                            </div>
                        </div>
                        <div class="box_time_page_payment">
                            <div class="text_time_page_payment">
                                <p>چهار شنبه</p>
                                <p> 1397/01/22</p>
                            </div>
                            <div class="box_bottom_time_page_payment">
                                <i class="fas fa-check"></i>
                            </div>
                        </div>
                        <div class="box_time_page_payment">
                            <div class="text_time_page_payment">
                                <p>پنج شنبه</p>
                                <p> 1397/01/23</p>
                            </div>
                            <div class="box_bottom_time_page_payment">
                                <i class="fas fa-check"></i>
                            </div>
                        </div>
                        <div class="box_time_page_payment">
                            <div class="text_time_page_payment">
                                <p>جمعه</p>
                                <p> 1397/01/24</p>
                            </div>
                            <div class="box_bottom_time_page_payment">
                                <i class="fas fa-check"></i>
                            </div>
                        </div>

                    </div>
                @else

                    <h3>سبد خرید شما خالی است !!</h3>
                @endif
            </div>
        </div>
        <!-- end container -->
    </div>
    <!-- end content -->



@endsection

@section('script')

@endsection
