@section('title' , ' | ویرایش بنر ')
@section('description' , '')
@extends('site.admin.panel')
@section('css')
    <link href="{{asset('css/select2.min.css')}}" rel="stylesheet" type="text/css"/>

@endsection
@section('content')
    <div class="container">
        <div class="row col-12 parent_breadcrumb_panel_top">
            <ul class="list-inline row col-12">
                <li class="list-inline-item col">
                    <nav class="breadcrumb_panel_top" aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a class="btn " href="#">ویرایش بنر</a></li>
                        </ol>
                    </nav>
                </li>

                @include('site.layout.clock-time')


            </ul>
        </div>

        <div class="row col-12 content_panel_layout">
            <li class=" col-12">
                <h1>ویرایش بنر</h1>
                @include('site.layout.flash-message')
                <form class="form-horizontal form_panel" action="{{ route('banner.update' ,  $banner->id ) }}"
                      method="post" id="bannerUpdate" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    {{ method_field('PATCH') }}

                    <div class="row col-12 parent-input-panel">

                        <div class="col-12 col-sm-12 col-md-6 col-lg-6 item-parent-input">
                            <div class="row one">
                                <label for="title" class="col-12 col-form-label text-right">عنوان
                                    بنر</label>
                                <div class="col-12">
                                    <input type="text" name="title" class="form-control" id="title"
                                           value="{{ $banner->title  }}" placeholder="عنوان بنر">
                                </div>
                            </div>
                        </div>

                        <div class="col-12 col-sm-12 col-md-6 col-lg-6 item-parent-input">
                            <div class="row one">
                                <label for="link" class="col-12 col-form-label text-right">لینک بنر</label>
                                <div class="col-12">
                                    <input type="text" name="link" class="form-control" id="link"
                                           value="{{ $banner->link }}" placeholder="لینک بنر">
                                </div>
                            </div>

                        </div>


                        <div class="col-12 col-sm-12 col-md-6 col-lg-6 item-parent-input">
                            <div class="row one">
                                <label for="discount" class="col-12 col-form-label text-right">تخفیف </label>
                                <div class="col-12">
                                    <input type="text" name="discount" class="form-control" id="discount"
                                           value="{{ $banner->discount }}" placeholder="در صورت داشتن تخفیف پر شود ">
                                </div>
                            </div>

                        </div>

                        <div class="col-12 col-sm-12 col-md-6 col-lg-6 item-parent-input">
                            <div class="row one">
                                <label for="position" class="col-12 col-form-label text-right">محل قرار گرفتن </label>
                                <div class="col-12">
                                    <select name="position" class="form-control" value="{{ old('position') }}" id="position">
                                        <option value="0" {{ $banner->position == 0 ? 'selected' : '' }}>اسلایدر صفحه اصلی</option>
                                        <option value="1" {{ $banner->position == 1 ? 'selected' : '' }}> بنر های پایین اسلایدر صفحه اصلی</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 col-sm-12 col-md-6 col-lg-6 item-parent-input">

                            <div class="row one">
                                <label for="active" class="col-12 col-form-label text-right">وضعیت</label>
                                <div class="col-12">
                                    <select name="active" class="form-control" id="active">
                                        <option value="0" {{ $banner->active == 0 ? 'selected' : '' }}>غیر فعال
                                        </option>
                                        <option value="1" {{  $banner->active == 1 ? 'selected' : '' }}> فعال</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-12 col-md-6 col-lg-6 item-parent-input">


                            <div class="row one">
                                <label for="image" class="col-12 col-form-label text-right"> تصویر اصلی
                                    بنر</label>
                                <div class="col-12">
                                    <input type="file" name="image" class="form-control" id="image"
                                           value="{{ $banner->image  }}" placeholder="تصویر اصلی بنر">
                                </div>
                                <div class="col-md-3 col-xs-12">
                                    <img src="{{$banner->image}}" class="img-fluid img-rounded"
                                         width="150" alt="{{$banner->name}}">
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="form-group row">
                        <div class="col-12 row justify-content-end">

                            <button type="submit" id="editbanner" class="btn btn-primary">
                                ارسال

                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
@endsection
@section('script')
    <script type="text/javascript" src="{{asset('js/select2.min.js')}}"></script>


@endsection
