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
                                <a href=""
                                   title="همه ویژگی ها" class="btn btn-info">
                                    <i class="fas fa-list"></i>
                                    همه ویژگی ها
                                </a>

                            </li>
                        </ol>
                    </nav>
                </li>

                @include('site.layout.clock-time')


            </ul>
        </div>

        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th> ردیف</th>
                    <th> عنوان</th>
                    <th>کلید</th>
                    <th>وضعیت</th>
                    <th width="23%">تنظیمات</th>
                </tr>
                </thead>
                <tbody>
                <?php $i = 1; ?>

                @foreach($category->properties as $property)
                    <tr>
                        <td> {{$i}}</td>
                        <td> {{$property->name}} </td>

                        <td> {{$property->key}} </td>


                        <td>
                            @if($property->status == 0)
                                غیرفعال
                            @elseif($property->status == 1)
                                فعال

                            @endif
                        </td>

                        <td>
                            <div class="btn-group btn-group-xs">
                                <ul class="list-inline">

                                    <li class="list-inline-item">
                                        <form action="{{ route('deleteProperty'  , $property->id) }}"
                                              method="post">
                                            {{ method_field('delete') }}
                                            {{ csrf_field() }}
                                            <div class="btn_group ">
                                                <button type="submit" class="btn  btn-outline-danger">
                                                    <i class="fas fa-trash-alt"></i>
                                                </button>
                                            </div>
                                        </form>
                                    </li>
                                    <li class="list-inline-item">
                                        <a href="{{ route('editProperty' , $property->id) }}"
                                           class="btn btn-primary" data-toggle="tooltip" data-placement="top"
                                           title="ویرایش">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </td>
                    </tr>
                    <?php $i++;?>
                @endforeach
                </tbody>
            </table>
        </div>


        <form class="form-horizontal"
              action="{{ route('storeProperty', $category->id) }}" id="storeProperty" method="post">
            {{ csrf_field() }}
            <input type="hidden" name="cate_id" value="{{$category->id}}">

            <div class="form-group row">
                <label for="type" class="col-12 control-label text-right">نوع صفت</label>
                <div class="col-12">
                    <select name="type" class="form-control" value="{{ old('type') }}" id="type">
                        <option value="0"> صفت مشخصات محصول</option>
                        <option value="1"> صفت تاثیرگزار در قیمت</option>
                        <option value="2"> صفت مشخصات محصول بدون تاثیر بر جستجو</option>
                    </select>
                </div>
            </div>


            <div class="content_price">
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" name="name_price[]"
                           {{$category->properties()->where('key','color')->first() ? 'checked' : ''}}
                           value="color" id="color">
                    <label class="custom-control-label" for="color">color</label>
                </div>
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" name="name_price[]"
                           {{$category->properties()->where('key','size')->first() ? 'checked' : ''}}
                           value="size" id="size">
                    <label class="custom-control-label" for="size">size</label>
                </div>
            </div>

            <div class="content_attribute">

                <div class="row col-12 parent-input-panel">

                    <div class="col-12 col-sm-6 col-md-6 col-lg-3 item-parent-input">
                        <div class="form-group row">
                            <label for="name" class="col-12 control-label text-right">عنوان صفت</label>
                            <div class="col-12 ">
                                <input type="text" name="name" class="form-control" id="name"
                                       value="{{ old('name') }}" placeholder="">
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-md-6 col-lg-3 item-parent-input">
                        <div class="form-group row">
                            <label for="key" class="col-12 control-label text-right">نام صفت (به انگلیسی)</label>
                            <div class="col-12 ">
                                <input type="text" name="key" class="form-control" id="key"
                                       value="{{ old('key') }}" placeholder="">
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-sm-6 col-md-6 col-lg-3 item-parent-input">
                        <div class="form-group row">
                            <label for="head_property_id" class="col-12 control-label text-right">هدر </label>
                            <div class="col-12">
                                <select name="head_property_id" class="form-control"
                                        value="{{ old('head_property_id') }}" id="head_property_id">
                                    @foreach($category->headProperties as $property)

                                        <option value="{{$property->id}}"> {{$property->name}}</option>
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
                                        <option value="0"> نمایش در تب مشخصات فنی</option>
                                        <option value="1"> نمایش در کنار تصاویر در بالای صفحه</option>
                                </select>
                            </div>
                        </div>

                    </div>

                </div>

                <div class="property-product">
                    <div class="form-row row col-12 mb-2 ">
                        <label class="col-12 text-right" for="optionPropertyItem">
                            جواب ها (جواب های خود را تایپ سپس بر روی enter کلیک کنید)
                        </label>
                        <div class="col-12">
                            <input class="form-control" type="text" id="optionPropertyItem">
                        </div>
                    </div>

                    <ul class="list-group all-option-item list-group-add">


                    </ul>
                </div>

            </div>

            <div class="form-group row">
                <label class="col-md-2 col-xs-12 control-label text-right"></label>
                <div class="col-md-10 col-xs-12">

                    <button type="button" id="submit-form" class="btn btn-primary">
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


        var allOptionProperty = new Array();

        $(document).on('click', '#submit-form', function (e) {
            e.preventDefault();
            $('#storeProperty').append('<input type="text" name="optionProperty" value="' + allOptionProperty + '" /> ');
            console.log(allOptionProperty);

            $('#storeProperty').submit();
        });

        $("#optionPropertyItem").on('keyup', function (e) {
            if (e.keyCode === 13) {
                var dInput = this.value;
                var table = '';
                allOptionProperty.push(dInput);
                console.log(allOptionProperty);

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
                $(".all-option-item").prepend(table);
                console.log(dInput);
            }
        });

        $(document).on('click', '.delete-radio', function (e) {
            e.preventDefault();
            allOptionProperty.pop($(this).parent().find('.value-item-input').val());

            console.log(allOptionProperty);
            $(this).parent().remove();
        });

        $(function () {
            var type = $('#type').find('option:selected').val();
            console.log(type);
            if (type == 0) {
                $('.content_price').hide();
                $('.content_attribute').show();
                $('.property-product').show();

            } else if (type == 1) {
                $('.content_price').show();
                $('.content_attribute').hide();
                $('.property-product').hide();

            } else if (type == 2) {
                $('.content_price').hide();
                $('.property-product').hide();
                $('.content_attribute').show();
            }
        });

        $('#type').change(function (e) {
            console.log($(this).find('option:selected').val());
            var type2 = $(this).find('option:selected').val();
            if (type2 == 0) {
                $('.content_price').hide();
                $('.content_attribute').show();
                $('.property-product').show();

            } else if (type2 == 1) {
                $('.content_price').show();
                $('.content_attribute').hide();
                $('.property-product').hide();
            } else if (type2 == 2) {
                $('.content_price').hide();
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