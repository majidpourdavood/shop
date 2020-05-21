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
            <input type="hidden" id="product_id" name="product_id" value="{{$product->id}}">


            <nav>
                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                    <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab"
                       aria-controls="nav-home" aria-selected="true">مشخصات فنی</a>

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
                                            <select class="form-control" name="{{$property->id}}"
                                                    id="{{$property->key}}">
                                                @foreach($property->optionProperty as $option)
                                                    <option value="{{$option->id}}"
                                                            {{ isset($property->propertyProduct) ? ($property->propertyProduct->option_property_id == $option->id ? 'selected' : '') : ''}}
                                                    >{{$option->value}}</option>
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
                                                <select name="{{$property->id}}[]" value=""
                                                        id="{{$property->key}}"
                                                        class="select2 input_array form-control"
                                                        multiple="multiple">

                                                    @if(isset($property->propertyProduct->value))
                                                        @foreach($property->propertyProduct->value as $valueP)
                                                            <option value="{{$valueP}}" selected>{{$valueP}}</option>
                                                        @endforeach
                                                    @endif
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
                    {{--<div class="row parent-input-panel input-filter">--}}



                        {{--<div class="col-12 col-sm-6 col-md-6 col-lg-4 item-parent-input">--}}
                            {{--<div class="form-group">--}}
                                {{--<label for="property_id">ویژگی</label>--}}
                                {{--<select class="form-control" name="property_id" id="property_id">--}}
                                    {{--@foreach($product->category->properties()->where('type', 1)->get() as $property)--}}
                                        {{--<option value="{{$property->id}}">{{$property->name}}</option>--}}
                                    {{--@endforeach--}}
                                {{--</select>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                        {{--<div class="col-12 col-sm-6 col-md-6 col-lg-4 item-parent-input">--}}
                            {{--<div class="form-group">--}}
                                {{--<label for="key_value_id">فیلتر</label>--}}
                                {{--<select class="form-control" name="key_value_id" id="key_value_id">--}}
                                    {{--@foreach(\App\Model\KeyValue::where('type', 'color')->orWhere('type', 'size')->get() as $filter)--}}
                                        {{--<option value="{{$filter->id}}">{{$filter->name}}</option>--}}
                                    {{--@endforeach--}}
                                {{--</select>--}}
                            {{--</div>--}}
                        {{--</div>--}}

                        {{--<div class="col-12 col-sm-6 col-md-6 col-lg-4 item-parent-input">--}}
                            {{--<div class="form-group">--}}
                                {{--<label for="price">قیمت</label>--}}
                                {{--<input type="text" class="form-control" id="price" value="" required="required">--}}
                            {{--</div>--}}
                        {{--</div>--}}

                        {{--<div class="col-12 col-sm-6 col-md-6 col-lg-4 item-parent-input">--}}

                            {{--<div class="form-group">--}}
                                {{--<label for=""></label>--}}
                                {{--<button type="button" class="btn btn-info " id="submit-filter">--}}
                                    {{--<i class="fa fa-plus"></i>--}}
                                    {{--اضافه--}}
                                {{--</button>--}}
                            {{--</div>--}}
                        {{--</div>--}}

                    {{--</div>--}}

                    {{--<ul class="list-group-item all-item-property-product list-group-add">--}}
                        {{--@foreach($product->propertyProducts()->where('type', 1)->get() as $propertyProduct)--}}
                            {{--<li class="list-group-item d-flex justify-content-between align-items-center">--}}
                                {{--<p class="value-item-{{$propertyProduct->id}}">--}}

                                    {{--{{$propertyProduct->property->name}} : {{$propertyProduct->keyValue->name}} ----}}

                                   {{--قیمت :  {{$propertyProduct->price}} </p>--}}
                                {{--<input type="hidden" class="value-item-input-{{$propertyProduct->id}}"--}}
                                       {{--value="{{$propertyProduct->price}}">--}}
                                {{--<div class="btn-group">--}}
                                    {{--<button id="option-delete-{{$propertyProduct->id}}"--}}
                                            {{--href="{{ action('Admin\ProductController@propertyProductDelete', ['id' => $propertyProduct->id]) }}"--}}
                                            {{--data-token="{{ csrf_token() }}"--}}
                                            {{--data-id="{{ $propertyProduct->id }}"--}}
                                            {{--type="button" class="btn btn-danger delete-radio">--}}
                                        {{--<i class="fas fa-trash"></i></button>--}}
                                {{--</div>--}}
                            {{--</li>--}}

                        {{--@endforeach--}}

                    {{--</ul>--}}
                    {{--<hr>--}}

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
        {{--var filter = [];--}}
        {{--$(document).on('click', '#submit-filter', function (e) {--}}

            {{--e.preventDefault();--}}
            {{--var inputFilter = $('.input-filter');--}}
            {{--var property_id = inputFilter.find('#property_id').val();--}}
            {{--var product_id = inputFilter.find('#product_id').val();--}}
            {{--var price = inputFilter.find('#price').val();--}}
            {{--var key_value_id = inputFilter.find('#key_value_id').val();--}}

            {{--if(price == '' || price == null || price == ' ' || price == " " || price == ""){--}}
                {{--return alert('قیمت را وارد کنید !')--}}
            {{--}--}}
            {{--var formdata = new FormData();--}}
            {{--formdata.append('_token', "{{csrf_token()}}");--}}
            {{--formdata.append('price', price);--}}
            {{--formdata.append('product_id', product_id);--}}
            {{--formdata.append('property_id', property_id);--}}
            {{--formdata.append('key_value_id', key_value_id);--}}
            {{--$.ajax({--}}
                {{--method: 'post',--}}
                {{--url: '/admin/property-product-post',--}}
                {{--data: formdata,--}}
                {{--dataType: 'JSON',--}}
                {{--contentType: false,--}}
                {{--cache: false,--}}
                {{--processData: false,--}}
            {{--})--}}
                {{--.done(function (data) {--}}
                    {{--console.log(data);--}}
                    {{--var token = $('meta[name="csrf-token"]').attr('content');--}}

                    {{--if (data.status == 'success') {--}}
                        {{--var table = '';--}}
                        {{--table += (--}}
                            {{--'<li class="list-group-item d-flex justify-content-between align-items-center">' +--}}
                            {{--' <p class="value-item-' + data.propertyProduct.id + '"> ' +--}}
                            {{--data.property.name +' : '+ data.keyValue.name + ' -- قیمت : '+--}}
                            {{--data.propertyProduct.price--}}

                            {{--+ ' </p>'--}}
                            {{--+ '<input type="hidden" class="value-item-input-' + data.propertyProduct.id + '" value="' + data.propertyProduct.price + '">'--}}
                            {{--+ '<div class="btn-group"><button type="button" id="option-delete-' + data.propertyProduct.id + '"' +--}}
                            {{--' href="/admin/property-product-delete/' + data.propertyProduct.id + '"' +--}}
                            {{--' data-token="' + token + '"' + ' data-id="' + data.propertyProduct.id + '"' + ' class="btn btn-danger delete-radio" >' +--}}
                            {{--'<i class="fas fa-trash"></i></button>'--}}
                            {{--+--}}
                            {{--'</div>' +--}}
                            {{--'</li>'--}}
                        {{--);--}}

                        {{--table += '';--}}
                        {{--$(".all-item-property-product").prepend(table);--}}
                    {{--}--}}


                {{--}).fail(function (data) {--}}
                {{--console.log(data);--}}

            {{--});--}}


        {{--});--}}


        {{--$(document).on('click', '.delete-radio', function (e) {--}}
            {{--e.preventDefault();--}}
            {{--var id = $(this).data('id');--}}
            {{--$.ajax({--}}
                {{--method: 'delete',--}}
                {{--url: $(this).attr('href'),--}}
                {{--data: {--}}
                    {{--_token: $(this).data('token')--}}
                {{--},--}}
                {{--success: function (data) {--}}
                    {{--console.log(data);--}}
                    {{--if (data.status == 'success') {--}}

                        {{--$('#option-delete-' + id).parent().parent().remove();--}}
                    {{--}--}}

                {{--},--}}
                {{--error: function (error) {--}}
                    {{--console.log(error);--}}
                {{--}--}}
            {{--})--}}
        {{--});--}}


        $(document).on('click', '#submit-form', function (e) {

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