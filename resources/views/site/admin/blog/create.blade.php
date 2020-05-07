@section('title' , ' | ساخت خبر یا بلاگ ')
@section('description' , '')
@extends('site.admin.panel')
@section('css')
    <link rel="stylesheet" href="{{ asset('css/select2.min.css') }}">

@endsection
@section('content')

    <style>
        .error{
            color:red;
        }
    </style>
    <div class="container">
        <div class="row col-12 parent_breadcrumb_panel_top">
            <ul class="list-inline row col-12">
                <li class="list-inline-item col">
                    <nav class="breadcrumb_panel_top" aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a class="btn " href="#">ساخت خبر یا بلاگ</a></li>
                        </ol>
                    </nav>
                </li>
                @include('site.layout.clock-time')
            </ul>
        </div>

        <div class="row col-12 content_panel_layout">
            <div class=" col-12">
                <h1>ساخت خبر یا بلاگ</h1>
                @include('site.layout.flash-message')

                <form class="form-horizontal form_panel"
                      action="{{ route('blog.store') }}" method="post"
                      enctype="multipart/form-data" id="myform">
                    {{ csrf_field() }}


                    <div class=" row one">
                        <label for="type" class="col-md-2 col-form-label text-md-right">نوع</label>
                        <div class="col-md-10">
                            <select name="type" class="form-control" value="{{ old('type') }}" id="type">
                                <option value="blog">بلاگ</option>
                                <option value="event"> رویداد</option>
                            </select>
                        </div>
                    </div>

                    <div class=" row one">
                        <label for="title" class="col-md-2 col-xs-12 control-label text-right">عنوان </label>
                        <div class="col-md-10 col-xs-12">
                            <input type="text" name="title" class="form-control" id="title"
                                   value="{{ old('title') }}" placeholder="عنوان ">
                        </div>
                    </div>
                    <div class=" row one">
                        <label for="description" class="col-md-2 col-xs-12 control-label text-right">
                            توضیحات کوتاه</label>
                        <div class="col-md-10 col-xs-12">
                    <textarea type="text" name="description" class="form-control" id="description" rows="7"
                              placeholder="توضیحات کوتاه">{{ old('description') }}</textarea>
                        </div>
                    </div>
                    <div class=" row one">
                        <label for="body" class="col-md-2 col-xs-12 control-label text-right">متن </label>
                        <div class="col-md-10 col-xs-12">
                    <textarea type="text" name="body" class="form-control" id="bodyAdmin" rows="5"
                              placeholder="متن ">{{ old('body') }}</textarea>
                        </div>
                    </div>
                    {{--<div class=" row one">--}}
                        {{--<label for="time_read" class="col-md-2 col-xs-12 control-label text-right">زمان خواندن به--}}
                            {{--دقیقه</label>--}}
                        {{--<div class="col-md-10 col-xs-12">--}}
                            {{--<input type="text" name="time_read" class="form-control" id="time_read"--}}
                                   {{--value="{{ old('time_read') }}" placeholder="">--}}
                        {{--</div>--}}
                    {{--</div>--}}

                    <div class=" row one">
                        <label class="col-md-2 col-form-label text-md-right" for="tags">کلمات کلیدی  (کلمه کلیدی خود
                            را تایپ سپس بر روی enter کلیک کنید)</label>
                        <div class="col-md-10"><select name="tags[]" value="{{old('tags')}}" id="tags"
                                                       class="select2 form-control" multiple="multiple">
                                <option>کلمات کلیدی </option>

                            </select>
                        </div>
                    </div>


                    <div class=" row one">
                        <label for="cate_id" class="col-md-2 col-form-label text-right">دسته</label>
                        <div class="col-md-10">
                            <select name="cate_id" class="form-control" value="{{ old('cate_id') }}" id="">
                                @foreach(App\Category::get() as $category)
                                    <option value="{{$category->id}}"> {{$category->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class=" row one">
                        <label for="active" class="col-md-2 col-form-label text-md-right">وضعیت</label>
                        <div class="col-md-10">
                            <select name="active" class="form-control" value="{{ old('active') }}" id="">
                                <option value="0">غیر فعال</option>
                                <option value="1"> فعال</option>
                            </select>
                        </div>
                    </div>


                    <div class=" row one">
                        <label for="image" class="col-md-2 col-xs-12 control-label text-right"> تصویر اصلی </label>
                        <div class="col-md-10 col-xs-12">
                            <input type="file" name="image" class="form-control" id="image"
                                   value="{{ old('image') }}" placeholder="تصویر اصلی ">
                        </div>
                    </div>
                    <div class=" row one">
                        <label class="col-md-2 col-xs-12 control-label text-right"></label>
                        <div class="col-md-10 col-xs-12">

                            <button type="submit" class="btn btn-primary">
                                ذخیره
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script src=" {{ asset('js/select2.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>

    <script>


        $("#myform").validate({
            ignore: [], //Fixes your name issue
            rules: {
                title: {
                    required: true,
                    minlength: 4,
                    maxlength: 165,
                },
                description: {
                    required: true,
                    minlength: 100,
                    maxlength: 165,
                }


            },
            messages: {
                title: {
                    required: "فیلد متن الزامی است",
                    minlength: "فیلد متن نباید کمتر از 4 کاراکتر باشد",
                    maxlength: "فیلد متن نباید بیشتر از 165 کاراکتر باشد",
                },
                description: {
                    required: "فیلد توضیحات کوتاه الزامی است",
                    minlength: "فیلد توضیحات کوتاه  نباید کمتر از 100 کاراکتر باشد",
                    maxlength: "فیلد توضیحات کوتاه نباید بیشتر از 165 کاراکتر باشد",
                }

            }
            // errorClass: "my-error-class",
            // validClass: "my-valid-class",


        });


        // $(".mobile").intlTelInput({
        //     utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/8.4.6/js/utils.js"
        // });
        // $(document).ready(function() {
        //     $('.select2').select2();
        // });

        $('#tags').select2({
            tags: true,
            // tokenSeparators: [",", " "],
            createSearchChoice: function (term, data) {
                if ($(data).filter(function () {
                    return this.text.localeCompare(term) === 0;
                }).length === 0) {
                    return {
                        id: term,
                        text: term
                    };
                }
            },
            multiple: true,
            language: "fa",
            dir: "rtl",
        });

    </script>
@endsection
