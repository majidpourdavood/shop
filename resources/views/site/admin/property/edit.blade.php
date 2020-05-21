@section('title' , ' | ویژگی ها ')
@section('description' , '')
@extends('site.admin.panel')
@section('content')

    <div class="container">
        <div class="row col-12 parent_breadcrumb_panel_top">
            <ul class="list-inline row col-12">
                <li class="list-inline-item col">
                    <nav class="breadcrumb_panel_top" aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{ route('addProperty', $property->category->id) }}"
                                   title="همه ویژگی ها" class="btn btn-info"><i class="fas fa-list"></i>همه ویژگی ها</a>

                            </li>
                        </ol>
                    </nav>
                </li>

                @include('site.layout.clock-time')


            </ul>
        </div>


        <form class="form-horizontal" action="{{ route('updateProperty' , $property->id ) }}"
              method="post" enctype="multipart/form-data" id="propertyUpdate">
            {{ csrf_field() }}
            {{ method_field('PATCH') }}


            <input type="hidden" name="cate_id" value="{{$category->id}}">

            <div class="form-group row">
                <label for="type" class="col-12 control-label text-right">نوع صفت</label>
                <div class="col-12">
                    <select name="type" class="form-control" value="{{ old('type') }}" id="type">
                        <option value="0" {{ $property->type == 0 ? 'selected' : '' }}> صفت مشخصات محصول</option>
                        <option value="1" {{ $property->type == 1 ? 'selected' : '' }}> صفت تاثیرگزار در قیمت</option>
                        <option value="2" {{ $property->type == 2 ? 'selected' : '' }}> صفت مشخصات محصول بدون تاثیر بر
                            جستجو
                        </option>
                    </select>
                </div>
            </div>




            <div class="content_attribute">

                <div class="row col-12 parent-input-panel">

                    <div class="col-12 col-sm-6 col-md-6 col-lg-3 item-parent-input">
                        <div class="form-group row">
                            <label for="name" class="col-12 control-label text-right">عنوان صفت</label>
                            <div class="col-12 ">
                                <input type="text" name="name" class="form-control" id="name"
                                       value="{{ $property->name  }}" placeholder="">
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-md-6 col-lg-3 item-parent-input">
                        <div class="form-group row">
                            <label for="key" class="col-12 control-label text-right">نام صفت (به انگلیسی)</label>
                            <div class="col-12 ">
                                <input type="text" name="key" class="form-control" id="key"
                                       value="{{ $property->key  }}" placeholder="">
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-sm-6 col-md-6 col-lg-3 item-parent-input">
                        <div class="form-group row">
                            <label for="head_property_id" class="col-12 control-label text-right">هدر </label>
                            <div class="col-12">
                                <select name="head_property_id" class="form-control"
                                        value="{{ old('head_property_id') }}" id="head_property_id">
                                    <option value="0"> نیازی نیست</option>
                                @foreach($category->headProperties as $pro)

                                        <option value="{{$pro->id}}"
                                                {{ $category->head_property_id == $pro->id ? 'selected' : '' }}
                                        > {{$pro->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                    </div>

                    <div class="col-12 col-sm-6 col-md-6 col-lg-3 item-parent-input">
                        <div class="form-group row">
                            <label for="show_place" class="col-12 control-label text-right">نمایش </label>
                            <div class="col-12">
                                <select name="show_place" class="form-control"
                                        value="{{ old('show_place') }}" id="show_place">
                                    <option value="0" {{ $property->show_place == 0 ? 'selected' : '' }}>
                                        نمایش در تب مشخصات فنی
                                    </option>
                                    <option value="1" {{ $property->show_place == 1 ? 'selected' : '' }}>
                                        نمایش در کنار تصاویر در بالای صفحه
                                    </option>
                                </select>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="property-product">
                    <div class="form-row row col-12 mb-2">
                        <label class="col-12 text-right" for="optionPropertyItem">
                            جواب ها (جواب های خود را تایپ سپس بر روی enter کلیک کنید)
                        </label>
                        <div class="col-12">
                            <input class="form-control" type="text" id="optionPropertyItem">
                        </div>
                    </div>

                    <ul class="list-group all-option-item list-group-add">
                        @foreach($property->optionProperty as $option)
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <p class="value-item-{{$option->id}}"> {{$option->value}} </p>
                                <input type="hidden" class="value-item-input-{{$option->id}}"
                                       value="{{$option->value}}">
                                <div class="btn-group">
                                    <button id="option-delete-{{$option->id}}"
                                            href="{{ action('Admin\PropertyController@optionPropertyDelete', ['id'=>$option->id]) }}"
                                            data-token="{{ csrf_token() }}"
                                            data-id="{{ $option->id }}"
                                            type="button" class="btn btn-danger delete-radio">
                                        <i class="fas fa-trash"></i></button>

                                    <a href="#" class="btn btn-warning optionProperty-{{$option->id}}"
                                       data-code="{{$option->id}}"
                                       data-value="{{$option->value}}"
                                       data-toggle="modal"
                                       id="btn-modal-edit" data-target="#showModalSubmitOption" title="ویرایش"><i
                                                class="fa fa-edit"></i>
                                    </a>

                                </div>
                            </li>

                        @endforeach

                    </ul>

                </div>
            </div>


            <div class="form-group row">
                <label class="col-md-2 col-xs-12 control-label text-right"></label>
                <div class="col-md-10 col-xs-12">

                    <button type="button" id="editProperty" class="btn btn-primary">
                        ذخیره
                    </button>
                </div>
            </div>
        </form>

    </div>

@endsection

@section('script')
    <script src="{{asset('js/select2.min.js')}}"></script>


    <script>


        $(document).on('click', '#btn-modal-edit', function () {
            var code = $(this).attr('data-code');
            var title = $(this).attr('data-value');
            var oModalEdit = $('#showModalSubmitOption');

            oModalEdit.find('#id').val(code);
            oModalEdit.find('#value').val(title);
            oModalEdit.modal();
        });

        $(document).on('click', '.btnOptionPropertyUpdate', function (e) {
            console.log(e);
            e.preventDefault();
            $('.optionPropertyUpdate').submit();
        });

        $(document).on('click', '#editProperty', function (e) {
            console.log(e);
            e.preventDefault();
            $('#propertyUpdate').submit();
        });


        // $('.questionOptionUpdate').on('submit', function (e) {
        $(document).on('submit', '.optionPropertyUpdate', function (e) {
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
                    var oModalEdit = $('#showModalSubmitOption');
                    oModalEdit.modal('hide');
                    // $('#option-' + data.optionProperty.id).val(data.optionProperty.id);
                    $('.value-item-' + data.optionProperty.id).text(data.optionProperty.value);
                    $('.value-item-input-' + data.optionProperty.id).val(data.optionProperty.value);
                    $('.optionProperty-' + data.optionProperty.id).attr('data-value', data.optionProperty.value);
                })
                .fail(function (data) {

                    console.log(data);

                });
        });


        // $(document).on('click', '#submit-form', function (e) {
        //     e.preventDefault();
        //
        //     $('#categoryUpdate').submit();
        // });

        $("#optionPropertyItem").on('keyup', function (e) {
            if (this.value == '' || this.value == ' ' || this.value == null) {
                alert('عنوان را وارد کنید !!!');
            } else {
                if (e.keyCode === 13) {
                    var dInput = this.value;
                    console.log(dInput);
                    var formdata = new FormData();
                    formdata.append('_token', "{{csrf_token()}}");
                    formdata.append('value', dInput);
                    formdata.append('property_id', "{{$property->id}}");
                    $.ajax({
                        method: 'post',
                        url: '/admin/option-property-post',
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
                                    ' <p class="value-item-' + data.optionProperty.id + '"> ' + data.optionProperty.value + ' </p>'
                                    + '<input type="hidden" class="value-item-input-' + data.optionProperty.id + '" value="' + data.optionProperty.value + '">'
                                    + '<div class="btn-group"><button type="button" id="option-delete-' + data.optionProperty.id + '"' +
                                    ' href="/admin/option-property-delete/' + data.optionProperty.id + '"' +
                                    ' data-token="' + token + '"' + ' data-id="' + data.optionProperty.id + '"' + ' class="btn btn-danger delete-radio" >' +
                                    '<i class="fas fa-trash"></i></button>'
                                    +
                                    '<a href="#" class="btn btn-warning optionProperty-' + data.optionProperty.id + '" data-code="' + data.optionProperty.id + '"  data-value="' + data.optionProperty.value + '" data-toggle="modal"' +
                                    ' id="btn-modal-edit" data-target="#showModalSubmitOption" > <i class="fa fa-edit" ></i></a></div>' +
                                    '</li>'
                                );

                                table += '';
                                $(".all-option-item").prepend(table);
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

        $(function () {
            var type = $('#type').find('option:selected').val();
            console.log(type);
            if (type == 0) {
                $('.content_attribute').show();
                $('.property-product').show();

            } else if (type == 1) {
                $('.content_attribute').show();
                $('.property-product').show();
            } else if (type == 2) {
                $('.property-product').hide();
                $('.content_attribute').show();
            }
        });

        $('#type').change(function (e) {
            console.log($(this).find('option:selected').val());
            var type2 = $(this).find('option:selected').val();
            if (type2 == 0) {
                $('.content_attribute').show();
                $('.property-product').show();

            } else if (type2 == 1) {
                $('.content_attribute').show();
                $('.property-product').show();
            } else if (type2 == 2) {
                $('.property-product').hide();
                $('.content_attribute').show();
            }


        });

        $('#value').select2({
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
