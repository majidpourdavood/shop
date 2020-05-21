@section('title' , ' | ساخت دسته ')
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
                            <li class="breadcrumb-item"><a class="btn " href="#">ساخت دسته</a></li>
                        </ol>
                    </nav>
                </li>

                @include('site.layout.clock-time')


            </ul>
        </div>

        <div class="row col-12 content_panel_layout">
            <div class=" col-12">
                <h1>ساخت دسته</h1>
                @include('site.layout.flash-message')

                <form class="form-horizontal form_panel"
                      action="{{ route('category.store') }}" id="storeCategory" method="post"
                      enctype="multipart/form-data">
                    {{ csrf_field() }}

                    <div class="row col-12 parent-input-panel">

                        <div class="col-12 col-sm-12 col-md-6 col-lg-6 item-parent-input">
                            <div class="row one">
                                <label for="title" class="col-12 col-form-label text-right">عنوان دسته</label>
                                <div class="col-12">
                                    <input type="text" name="title" class="form-control" id="title"
                                           value="{{ old('title') }}" placeholder="عنوان دسته">
                                </div>
                            </div>

                        </div>
                        <div class="col-12 col-sm-12 col-md-6 col-lg-6 item-parent-input">
                            <div class="row one">
                                <label for="parent_id" class="col-12 col-form-label text-right">زیر دسته</label>
                                <div class="col-12">
                                    <select name="parent_id" class="form-control" value="{{ old('parent_id') }}"
                                            id="parent_id">
                                        <option value="0">دسته اصلی</option>
                                        @foreach($categories as $category)
                                            <option value="{{$category->id}}">{{$category->title}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                        </div>
                    </div>


                    <div class="row col-12 parent-input-panel">

                        <div class="col-12 col-sm-12 col-md-6 col-lg-6 item-parent-input">
                            <div class="row one">
                                <label for="active" class="col-12 col-form-label text-right">وضعیت</label>
                                <div class="col-12">
                                    <select name="active" class="form-control" value="{{ old('active') }}" id="active">
                                        <option value="0">غیر فعال</option>
                                        <option value="1"> فعال</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-12 col-md-6 col-lg-6 item-parent-input">
                            <div class="row one">
                                <label for="type_weight" class="col-12 col-form-label text-right">تعیین  وزن</label>
                                <div class="col-12">
                                    <select name="type_weight" class="form-control" value="{{ old('type_weight') }}" id="type_weight">
                                        <option value="0">محصول عادی</option>
                                        <option value="1"> محصول سنگین</option>
                                        <option value="2"> محصول فوق سنگین</option>
                                    </select>
                                </div>
                            </div>
                        </div>


                        <div class="col-12 col-sm-12 col-md-6 col-lg-6 item-parent-input">
                            <div class="row one">
                                <label for="image" class="col-12 col-form-label text-right"> تصویر اصلی
                                    دسته</label>
                                <div class="col-12">
                                    <input type="file" name="image" class="form-control" id="image"
                                           value="{{ old('image') }}" placeholder="تصویر اصلی دسته">
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="form-row row col-12 mb-2">
                        <label class="col-12 text-right" for="headPropertyItem">
                            سرتیتر های ویژگی های هر دسته (سرتیتر خود را تایپ سپس بر روی enter کلیک کنید)
                        </label>
                        <div class="col-12">
                            <input class="form-control" type="text" id="headPropertyItem">
                        </div>
                    </div>

                    <ul class="list-group all-head-item list-group-add">

                    </ul>


                    <div class="row one">
                        <div class="col-12 justify-content-end row">
                            <button type="button" id="submit-form" class="btn btn-primary">
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
    <script type="text/javascript" src="{{asset('js/select2.min.js')}}"></script>

    <script>
        var headProperties = new Array();

        $(document).on('click', '#submit-form', function (e) {
            e.preventDefault();
            $('#storeCategory').append('<input type="text" name="headProperties" value="' + headProperties + '" /> ');
            console.log(headProperties);

            $('#storeCategory').submit();
        });

        $("#headPropertyItem").on('keyup', function (e) {
            if (e.keyCode === 13) {
                var dInput = this.value;
                var table = '';
                headProperties.push(dInput);
                console.log(headProperties);


                table += (
                    '<li class="list-group-item d-flex justify-content-between align-items-center">' +
                    '<p class="value-item">' + dInput + '</p>'
                    + '<input type="hidden" class="value-item-input" value="' + dInput + '">'

                    + '<button type="button" class="btn btn-danger delete-radio" >' +
                    '<i class="fas fa-trash"></i></button>'
                    +
                    '</li>'

                );

                table += '';
                $(".all-head-item").prepend(table);
                console.log(dInput);
            }
        });

        $(document).on('click', '.delete-radio', function (e) {
            e.preventDefault();
            headProperties.pop($(this).parent().find('.value-item-input').val());

            console.log(headProperties);
            $(this).parent().remove();
        });


    </script>
@endsection
