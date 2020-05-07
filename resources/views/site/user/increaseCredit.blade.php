@section('title' , ' | محصول ')
@section('description' , '')
@extends('site.master')
@section('css')

@endsection

@section('content')
    <div class="content">
        <div class="container">
            <div class="row mt-2">
                <div class=" col-sm-12 col-md-4 col-lg-3">
                    <div class="box_top_saidbar_profile row clothing">
                        <h6>به صفحه پروفایل کاربری خوش آمدید</h6>
                    </div>

                    <div class="saidbar_profile clothing">
                        <ul class="list-group list-group-flush nav flex-column">
                            <li class="nav-item ">
                                <a class="nav-link list-group-item" href="#">ویرایش پروفایل</a>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link list-group-item" href="#">لیست سفارشات</a>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link list-group-item active" href="#">افزایش اعتبار</a>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link list-group-item" href="#">گزارش مالی</a>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link list-group-item" href="#">کالاهای مورد علاقه</a>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link list-group-item" href="#">کدهای تخفیف</a>
                            </li>
                        </ul>



                    </div>
                </div>
                <div class="col-sm-12 col-md-8 col-lg-9">

                    <!-- begin breadcrumb -->
                    <nav class="breadcrumb_profile clothing" aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="#" title="">فروشگاه اینترنتی کرکره مارکت</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">پروفایل کاربری </li>
                        </ol>
                    </nav>
                    <!-- end breadcrumb -->


                    <div class="content_view_profile">
                        <div class="row no-gutters">
                            <h6 class="h6_afzaesh_etebar clothing">افزایش اعتبار</h6>
                            <div class="content_afzaesh_etebar">
                                <div class="form-inline">
                                    <div class="form-group">
                                        <label for="afzaeshetebar">مبلغ : </label>
                                        <input type="text" id="afzaeshetebar" class="form-control mx-sm-3" aria-describedby="afzaeshetebar">
                                        <span id="afzaeshetebar">
											ریال </span>
                                    </div>
                                </div>
                            </div>

                            <h5 class="h5_afzaesh_etebar_bank clothing">
                                شما می­توانید با در اختیار داشتن درگاه­های پرداخت زیر نسبت به واریز وجه اقدام نمایید</h5>


                            <div class="row box_bank_page_afzaesh">
                                <a href="#">
                                    <div class="box_bank_page_payment">
                                        <img src="../images/bank-pasargak.png" class="img_100" alt="">
                                    </div>
                                </a>
                                <a href="#">
                                    <div class="box_bank_page_payment">
                                        <img src="../images/bank-mellat.gif" class="img_100" alt="">
                                    </div>

                                </a>
                            </div>
                            <div class="btn_pardakht_afzaesh_etebar clothing" >
                                <a href="#" class="btn">پرداخت</a>
                            </div>


                        </div>

                    </div>
                </div>
            </div>
        </div>
        <!-- end container -->
    </div>
    <!-- end content -->

@endsection

@section('script')


    @endsection
