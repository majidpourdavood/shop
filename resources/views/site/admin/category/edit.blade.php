@section('title' , ' | ویرایش دسته ')
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
                            <li class="breadcrumb-item"><a class="btn " href="#">ویرایش دسته</a></li>
                        </ol>
                    </nav>
                </li>

                @include('site.layout.clock-time')


            </ul>
        </div>

        <div class="row col-12 content_panel_layout">
            <li class=" col-12">
                <h1>ویرایش دسته</h1>
                @include('site.layout.flash-message')
                <form class="form-horizontal form_panel" action="{{ route('category.update' ,  $category->id ) }}"
                      method="post" id="categoryUpdate" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    {{ method_field('PATCH') }}

                    <div class="row col-12 parent-input-panel">

                        <div class="col-12 col-sm-12 col-md-6 col-lg-6 item-parent-input">
                            <div class="row one">
                                <label for="title" class="col-12 col-form-label text-right">عنوان
                                    دسته</label>
                                <div class="col-12">
                                    <input type="text" name="title" class="form-control" id="title"
                                           value="{{ $category->title  }}" placeholder="عنوان دسته">
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
                                        @foreach($categories as $cate)
                                            <option value="{{$cate->id}}"
                                                    {{ $category->parent_id == $cate->id ? 'selected' : '' }} >{{$cate->title}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-12 col-md-6 col-lg-6 item-parent-input">

                            <div class="row one">
                                <label for="active" class="col-12 col-form-label text-right">وضعیت</label>
                                <div class="col-12">
                                    <select name="active" class="form-control" id="active">
                                        <option value="0" {{ $category->active == 0 ? 'selected' : '' }}>غیر فعال
                                        </option>
                                        <option value="1" {{  $category->active == 1 ? 'selected' : '' }}> فعال</option>
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
                                           value="{{ $category->image  }}" placeholder="تصویر اصلی دسته">
                                </div>
                                <div class="col-md-3 col-xs-12">
                                    <img src="{{$category->image}}" class="img-fluid img-rounded"
                                         width="150" alt="{{$category->name}}">
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
                        @foreach($category->headProperties as $property)
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <p class="value-item-{{$property->id}}"> {{$property->name}} </p>
                                <input type="hidden" class="value-item-input-{{$property->id}}" value="{{$property->name}}">
                                <div class="btn-group">
                                    <button id="option-delete-{{$property->id}}"
                                            href="{{ action('Admin\CategoryController@headPropertyDelete', ['id'=>$property->id]) }}"
                                            data-token="{{ csrf_token() }}"
                                            data-id="{{ $property->id }}"
                                            type="button" class="btn btn-danger delete-radio">
                                        <i class="fas fa-trash"></i></button>

                                    <a href="#" class="btn btn-warning headProperty-{{$property->id}}" data-code="{{$property->id}}"
                                       data-name="{{$property->name}}"
                                       data-toggle="modal"
                                       id="btn-modal-edit" data-target="#showModalSubmitNotify" title="ویرایش">
                                        <i class="fa fa-edit" ></i>
                                    </a>


                                </div>

                            </li>
                        @endforeach

                    </ul>


                    <div class="form-group row">
                        <div class="col-12 row justify-content-end">

                            <button type="button" id="editCategory" class="btn btn-primary">
                                ارسال

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

        $(document).on('click', '#btn-modal-edit', function () {
            var code = $(this).attr('data-code');
            var title = $(this).attr('data-name');
            var oModalEdit = $('#showModalSubmitNotify');

            oModalEdit.find('#id').val(code);
            oModalEdit.find('#name').val(title);
            oModalEdit.modal();
        });

        $(document).on('click', '.btnHeadPropertyUpdate', function (e) {
            console.log(e);
            e.preventDefault();
            $('.headPropertyUpdate').submit();
        });

        $(document).on('click', '#editCategory', function (e) {
            console.log(e);
            e.preventDefault();
            $('#categoryUpdate').submit();
        });


        $(document).on('submit', '.headPropertyUpdate', function (e) {
            e.preventDefault();

            $.ajax({
                method: $(this).attr('method'),
                url: $(this).attr('action'),
                data: $(this).serialize(),
                async: true,
                dataType: 'json',
            })
                .done(function (data) {

                    console.log(data);
                    var oModalEdit = $('#showModalSubmitNotify');
                    oModalEdit.modal('hide');
                    // $('#property-' + data.headProperty.id).val(data.headProperty.id);
                    $('.value-item-' + data.headProperty.id).text(data.headProperty.name);
                    $('.value-item-input-' + data.headProperty.id).val(data.headProperty.name);
                    $('.headProperty-' + data.headProperty.id).attr('data-name', data.headProperty.name);
                })
                .fail(function (data) {

                    console.log(data);

                });
        });


        $(document).on('click', '#submit-form', function (e) {
            e.preventDefault();

            $('#categoryUpdate').submit();
        });

        $("#headPropertyItem").on('keyup', function (e) {
            if (this.value == '' || this.value == ' ' || this.value == null) {
                alert('عنوان را وارد کنید !!!');
            } else {
                if (e.keyCode === 13) {
                    var dInput = this.value;
                    console.log(dInput);
                    var formdata = new FormData();
                    formdata.append('_token', "{{csrf_token()}}");
                    formdata.append('name', dInput);
                    formdata.append('cate_id', "{{$category->id}}");
                    $.ajax({
                        method: 'post',
                        url: '/admin/head-property-post',
                        data: formdata,
                        dataType: 'JSON',
                        contentType: false,
                        cache: false,
                        processData: false,
                    })
                        .done(function (data) {
                            console.log(data);
                            var token = $('meta[name="csrf-token"]').attr('content');

                            if (data.status == 'success') {
                                var table = '';
                                table += (
                                    '<li class="list-group-item d-flex justify-content-between align-items-center">' +
                                    ' <p class="value-item-' + data.headProperty.id + '"> ' + data.headProperty.name + ' </p>'
                                    + '<input type="hidden" class="value-item-input-' + data.headProperty.id + '" value="' + data.headProperty.name + '">'
                                    + '<div class="btn-group"><button type="button" id="option-delete-' + data.headProperty.id + '"' +
                                    ' href="/admin/head-property-delete/' + data.headProperty.id + '"' +
                                    ' data-token="' + token + '"' + ' data-id="' + data.headProperty.id + '"' + ' class="btn btn-danger delete-radio" >' +
                                    '<i class="fas fa-trash"></i></button>'
                                    +
                                    '<a href="#" class="btn btn-warning headProperty-' + data.headProperty.id + '" data-code="' + data.headProperty.id + '"  data-name="' + data.headProperty.name + '" data-toggle="modal"' +
                                    ' id="btn-modal-edit" data-target="#showModalSubmitNotify" title="ویرایش"  ><i class="fa fa-edit" ></i></a></div>' +
                                    '</li>'
                                );

                                table += '';
                                $(".all-head-item").prepend(table);
                            }


                        }).fail(function (data) {
                        console.log(data);

                    });


                }
            }


        });

        $(document).on('click', '.delete-radio', function (e) {
            e.preventDefault();
            var id = $(this).data('id');
            $.ajax({
                method: 'delete',
                url: $(this).attr('href'),
                data: {
                    _token: $(this).data('token')
                },
                success: function (data) {
                    console.log(data);
                    if (data.status == 'success') {

                        $('#option-delete-' + id).parent().parent().remove();
                    }

                },
                error: function (error) {
                    console.log(error);
                }
            })
        });

    </script>
@endsection
