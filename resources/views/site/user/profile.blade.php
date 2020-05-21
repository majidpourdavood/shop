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
                    @include('site.layout.saidbarUser')

                </div>
                <div class="col-sm-12 col-md-8 col-lg-9">

                    <!-- begin breadcrumb -->
                    <nav class="breadcrumb_profile clothing" aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="#" title="">فروشگاه اینترنتی کرکره مارکت</a>
                            </li>

                            <li class="breadcrumb-item active" aria-current="page">پروفایل کاربری</li>
                        </ol>
                    </nav>
                    <!-- end breadcrumb -->


                    <div class="content_view_profile ">
                        <div class="row no-gutters">
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-8 content_view_Editprofile">
                                <form>
                                    <div class="form-group row no-gutters">
                                        <label for="inputName3" class="col-sm-3 col-lg-4 col-form-label">نام </label>
                                        <div class="col-sm-9 col-lg-8">
                                            <input type="text" class="form-control" id="inputName3" placeholder="">
                                        </div>
                                    </div>
                                    <div class="form-group row no-gutters">
                                        <label for="inputPhone3" class="col-sm-3 col-lg-4 col-form-label"> نام
                                            خانوادگی</label>
                                        <div class="col-sm-9 col-lg-8">
                                            <input type="text" class="form-control" id="inputPhone3" placeholder="">
                                        </div>
                                    </div>
                                    <div class="form-group row no-gutters">
                                        <label for="inputPhone4" class="col-sm-3 col-lg-4 col-form-label"> شماره تلفن
                                            همراه</label>
                                        <div class="col-sm-9 col-lg-8">
                                            <input type="text" class="form-control" id="inputPhone4" placeholder="">
                                        </div>
                                    </div>
                                    <div class="form-group row no-gutters">
                                        <label for="inputPhone75" class="col-sm-3 col-lg-4 col-form-label"> شماره تلفن
                                            ثابت</label>
                                        <div class="col-sm-9 col-lg-8">
                                            <div class="col-xs-9 col-sm-9 col-lg-8 w_70_576">
                                                <input type="text" class="form-control" id="inputPhone75"
                                                       placeholder="">
                                            </div>
                                            <div class="col-xs-3 col-sm-3 col-lg-4 order-12 phone_sabet w_30_576">
                                                <input type="text" class="form-control" id="inputPhone75"
                                                       placeholder="021">
                                            </div>
                                        </div>


                                    </div>
                                    <div class="form-group row no-gutters align-items-center">
                                        <!-- <label for="inputPhone4" class="col-sm-3 col-lg-4 col-form-label"> جنسیت</label> -->
                                        <legend class="col-sm-3 col-lg-4 col-form-label">جنسیت</legend>

                                        <div class="col-sm-9 col-lg-8">
                                            <div class="custom-control custom-radio custom-control-inline clothing">
                                                <input type="radio" id="customRadioInline1" name="customRadioInline1"
                                                       class="custom-control-input" checked>
                                                <label class="custom-control-label" for="customRadioInline1">
                                                    مرد</label>
                                            </div>
                                            <div class="custom-control custom-radio custom-control-inline clothing">
                                                <input type="radio" id="customRadioInline2" name="customRadioInline1"
                                                       class="custom-control-input">
                                                <label class="custom-control-label" for="customRadioInline2">
                                                    زن</label>
                                            </div>

                                        </div>
                                    </div>


                                    <div class="form-group row no-gutters">
                                        <label for="inputAddress3" class="col-sm-3 col-lg-4 col-form-label">
                                            کدپستی</label>
                                        <div class="col-sm-9 col-lg-8">
                                            <input type="text" class="form-control" id="inputAddress3" placeholder="">
                                        </div>
                                    </div>

                                    <div class="form-group row no-gutters">
                                        <label for="inputState" class="col-sm-3 col-lg-4 col-form-label">
                                            استان/شهر/محله </label>
                                        <div class="col-sm-9 col-lg-8 select_style_Editprofile">
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
                                        <label for="exampleFormControlTextarea1"
                                               class="col-sm-3 col-lg-4 col-form-label"> آدرس</label>
                                        <div class="col-sm-9 col-lg-8">
                                            <textarea class="form-control" id="exampleFormControlTextarea1"
                                                      rows="3"></textarea>
                                        </div>
                                    </div>
                                </form>
                                <button type="button" class="btn btn_save_edit_profile clothing">ذخیره</button>

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
