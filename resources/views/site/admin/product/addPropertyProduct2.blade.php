@section('title' , ' | محصول ')
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
                            <li class="breadcrumb-item">
                                <a href="{{ route('product.index') }}"
                                   title="همه محصولات" class="btn btn-info"><i class="fas fa-list"></i>همه محصولات</a>

                            </li>
                        </ol>
                    </nav>
                </li>

                @include('site.layout.clock-time')


            </ul>
        </div>


        <form class="form-horizontal form_panel" action="{{ route('storePropertyProduct' , $product->id ) }}"
              method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            {{ method_field('PATCH') }}


            <nav>
                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                    <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab"
                       aria-controls="nav-home" aria-selected="true">مشخصات فنی</a>
                    <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab"
                       aria-controls="nav-profile" aria-selected="false">مشخصات تاثیرگذار بر قیمت</a>

                </div>
            </nav>

            <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                    <div class="row col-12 parent-input-panel">
                        @foreach($product->category->headProperties as $headProperty)
                            <h3 class="row col-12 w-100 title-panel-product">
                                <i class="fas fa-caret-left"></i>
                                {{$headProperty->name}}
                            </h3>
                            @foreach($headProperty->properties as $property)
                                @if($property->type == 0)
                                    <div class="col-12 col-sm-6 col-md-6 col-lg-3 item-parent-input">
                                        <div class="form-group">
                                            <label for="{{$property->key}}">{{$property->name}}</label>
                                            <select class="form-control" name="{{$headProperty->id}}-{{$property->id}}"
                                                    id="{{$property->key}}">
                                                @foreach($property->optionProperty as $option)
                                                    <option value="{{$option->id}}">{{$option->value}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                @elseif($property->type == 2)
                                    <div class="col-12  item-parent-input">
                                        <div class="form-group">
                                            <label class="col-12 text-right" for="{{$property->key}}">
                                                {{$property->name}} ({{$property->name}} را تایپ سپس بر روی enter کلیک
                                                کنید)
                                            </label>
                                            <div class="col-12">
                                                <select name="{{$headProperty->id}}-{{$property->id}}[]" value=""
                                                        id="{{$property->key}}"
                                                        class="select2 input_array form-control"
                                                        multiple="multiple">

                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        @endforeach
                    </div>


                </div>
                <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                    @foreach($product->category->properties()->where('type', 1)->get() as $property)
                        @if($property->key == 'color')
                            <div class="row parent-input-panel input-color">

                                <div class="col-12 col-sm-6 col-md-6 col-lg-4 item-parent-input">
                                    <div class="form-group">
                                        <label for="color">رنگ</label>
                                        <select class="form-control" name="color" id="color">
                                            @foreach(\App\Model\KeyValue::where('type',0)->get() as $color)
                                                <option data-value="{{$color->name}}"
                                                        value="{{$color->id}}">{{$color->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-12 col-sm-6 col-md-6 col-lg-4 item-parent-input">
                                    <div class="form-group">
                                        <label for="priceColor">قیمت</label>
                                        <input type="text" class="form-control" id="priceColor"
                                               value="">
                                    </div>
                                </div>

                                <div class="col-12 col-sm-6 col-md-6 col-lg-4 item-parent-input">

                                    <div class="form-group">
                                        <label for=""></label>
                                        <button type="button" class="btn btn-info " id="submit-color">
                                            <i class="fa fa-plus"></i>
                                            اضافه
                                        </button>
                                    </div>
                                </div>

                            </div>
                            <ul class="list-group-item all-item-color list-group-add">

                                @foreach($colors as $key  => $value)
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        <p class="value-item-{{$value['ColorID']}}"> رنگ
                                            : {{\App\Model\KeyValue::find($value['ColorID'])->name}}-- قیمت
                                            : {{$value['PriceColor']}}تومان </p>
                                        <input type="hidden" class="value-item-input-color-{{$value['ColorID']}}"
                                               value="{{$value['ColorID']}}">

                                        <div class="btn-group">
                                            <button id="option-delete-{{$value['ColorID']}}"
                                                    href="{{ action('Admin\ProductController@updateDetailColor', ['id'=> $value['ColorID']]) }}"
                                                    data-token="{{ csrf_token() }}"
                                                    data-id="{{ $value['ColorID'] }}"
                                                    type="button" class="btn btn-danger delete-radio-color">
                                                <i class="fas fa-trash"></i></button>

                                        </div>

                                    </li>


                                @endforeach
                            </ul>
                            <hr>
                        @elseif($property->key == 'size')
                            <div class="row parent-input-panel input-size">

                                <div class="col-12 col-sm-6 col-md-6 col-lg-4 item-parent-input">
                                    <div class="form-group">
                                        <label for="size">اندازه</label>
                                        <select class="form-control" name="size" id="size">
                                            @foreach(\App\Model\KeyValue::where('type',1)->get() as $color)
                                                <option data-value="{{$color->name}}"
                                                        value="{{$color->id}}">{{$color->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-12 col-sm-6 col-md-6 col-lg-4 item-parent-input">
                                    <div class="form-group">
                                        <label for="priceSize">قیمت</label>
                                        <input type="text" class="form-control" id="priceSize"
                                               value="">
                                    </div>
                                </div>

                                <div class="col-12 col-sm-6 col-md-6 col-lg-4 item-parent-input">

                                    <div class="form-group">
                                        <label for=""></label>
                                        <button type="button" class="btn btn-info " id="submit-size">
                                            <i class="fa fa-plus"></i>
                                            اضافه
                                        </button>
                                    </div>
                                </div>

                            </div>
                            <ul class="list-group-item all-item-size list-group-add">

                            </ul>
                            <hr>
                        @endif
                    @endforeach
                </div>
            </div>
            <div class="form-group row">
                <label class="col-md-2 col-xs-12 control-label"></label>
                <div class="col-md-10 col-xs-12">

                    <button type="button" class="btn btn-primary " id="submit-form">
                        ارسال

                    </button>
                </div>
            </div>
        </form>


    </div>

@endsection


@section('script')

    <script type="text/javascript" src="{{asset('js/select2.min.js')}}"></script>

    <script>
        var colors = [];
        $(document).on('click', '#submit-color', function (e) {
            e.preventDefault();
            var inputColorID = $(this).parent().parent().parent().find('select').val();
            var inputPriceColor = $(this).parent().parent().parent().find('input').val();
            var inputPriceValue = $(this).parent().parent().parent().find('select option:selected').data('value');

            var nnnn = {ColorID: inputColorID, PriceColor: inputPriceColor};
            colors.push(nnnn);
            console.log(colors);
            console.log(colors.length);
            console.log(colors.indexOf(nnnn));

            var table = '';

            table += (
                '<li class="list-group-item d-flex justify-content-between align-items-center">' +
                '<p class="value-item">' + inputPriceValue + ' -- قیمت : ' + inputPriceColor + 'تومان' + '</p>'
                + '<input type="hidden" class="value-item-input-color" value="' + colors.indexOf(nnnn) + '">'

                + '<button type="button" class="btn btn-danger delete-radio-color" >' +
                '<i class="fas fa-trash"></i></button>'
                +
                '</li>'

            );

            table += '';
            $(".all-item-color").prepend(table);
        });


        $(document).on('click', '.delete-radio-color', function (e) {
            e.preventDefault();
            colors.splice($(this).parent().find('.value-item-input-color').val(), 1);
            // colors.pop();
            console.log(colors);
            $(this).parent().remove();
        });


        var sizes = [];
        $(document).on('click', '#submit-size', function (e) {
            e.preventDefault();
            var inputSizeID = $(this).parent().parent().parent().find('select').val();
            var inputPriceSize = $(this).parent().parent().parent().find('input').val();
            var inputSizeValue = $(this).parent().parent().parent().find('select option:selected').data('value');

            var ssss = {SizeID: inputSizeID, PriceSize: inputPriceSize};
            sizes.push(ssss);
            console.log(sizes);
            console.log(sizes.length);
            console.log(sizes.indexOf(ssss));

            var tablesize = '';

            tablesize += (
                '<li class="list-group-item d-flex justify-content-between align-items-center">' +
                '<p class="value-item">' + inputSizeValue + ' -- قیمت : ' + inputPriceSize + 'تومان' + '</p>'
                + '<input type="hidden" class="value-item-input-size" value="' + sizes.indexOf(ssss) + '">'

                + '<button type="button" class="btn btn-danger delete-radio-size" >' +
                '<i class="fas fa-trash"></i></button>'
                +
                '</li>'

            );

            tablesize += '';
            $(".all-item-size").prepend(tablesize);
        });


        $(document).on('click', '.delete-radio-size', function (e) {
            e.preventDefault();
            sizes.splice($(this).parent().find('.value-item-input-size').val(), 1);
            // colors.pop();
            console.log(sizes);
            $(this).parent().remove();
        });

        $(document).on('click', '#submit-form', function (e) {


            var bbb = JSON.stringify(colors);
            var inputSizes = JSON.stringify(sizes);

            e.preventDefault();
            var input = $("<input>")
                .attr("type", "hidden")
                .attr("name", "color").val(bbb);
            var input2 = $("<input>")
                .attr("type", "hidden")
                .attr("name", "size").val(inputSizes);

            $('.form_panel').append(input);
            $('.form_panel').append(input2);

            $('.form_panel').submit();
        });


        $('.input_array').select2({
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