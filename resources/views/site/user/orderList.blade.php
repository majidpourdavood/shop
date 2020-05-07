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
                    <div class="content_view_profile clothing">
                        <div class="row no-gutters">
                            <table class="table table-responsive-lg table_page_profile">
                                <thead class="thead-light">
                                <tr>
                                    <th scope="col">شناسه</th>
                                    <th scope="col">تاریخ سفارش</th>
                                    <th scope="col">قیمت</th>
                                    <th scope="col">وضعیت</th>
                                    <th scope="col">مشاهده</th>
                                    <th scope="col">سفارش مجدد</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td> <h6>25451</h6> </td>
                                    <td>1396/12/24 11:49</td>
                                    <td> 39,000  تومان </td>
                                    <td>در دست بررسی</td>
                                    <td><a href="#" class=" btn_delete_basket">مشاهده</a></td>
                                    <td><a href="#" class=" btn_sefaresh_mojadad">سفارش مجدد</a></td>
                                </tr>
                                <tr>
                                    <td> <h6>25451</h6> </td>
                                    <td>1396/12/24 11:49</td>
                                    <td> 39,000  تومان </td>
                                    <td>در دست بررسی</td>
                                    <td><a href="#" class=" btn_delete_basket">مشاهده</a></td>
                                    <td><a href="#" class=" btn_sefaresh_mojadad">سفارش مجدد</a></td>
                                </tr>
                                <tr>
                                    <td> <h6>25451</h6> </td>
                                    <td>1396/12/24 11:49</td>
                                    <td> 39,000  تومان </td>
                                    <td>در دست بررسی</td>
                                    <td><a href="#" class=" btn_delete_basket">مشاهده</a></td>
                                    <td><a href="#" class=" btn_sefaresh_mojadad">سفارش مجدد</a></td>
                                </tr>
                                </tbody>
                            </table>
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
