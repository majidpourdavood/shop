@section('title' , ' | محصول ')
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
                                <a href="{{ route('product.index') }}"
                                   title="همه محصولات" class="btn btn-info"><i class="fas fa-list"></i>همه محصولات</a>

                            </li>
                        </ol>
                    </nav>
                </li>

                @include('site.layout.clock-time')


            </ul>
        </div>


        <form class="form-horizontal"
              action="{{ route('product.store') }}" method="post"
              enctype="multipart/form-data">
            {{ csrf_field() }}


            <div class="form-group row">
                <label for="title" class=" control-label text-right">عنوان محصول</label>
                <div class="col-12">
                    <input type="text" name="title" class="form-control" id="title"
                           value="{{ old('title') }}" placeholder="">
                </div>
            </div>

            <div class="row col-12 parent-input-panel">

                {{--<div class="col-12 col-sm-6 col-md-6 col-lg-4 item-parent-input">--}}
                    {{--<div class="form-group row">--}}
                        {{--<label for="price" class=" control-label text-right">قیمت (تومان)</label>--}}
                        {{--<div class="col-12">--}}
                            {{--<input type="text" name="price" class="form-control"--}}
                                   {{--value="{{ old('price') }}" placeholder="">--}}
                        {{--</div>--}}
                    {{--</div>--}}

                {{--</div>--}}
                {{--<div class="col-12 col-sm-6 col-md-6 col-lg-4 item-parent-input">--}}

                    {{--<div class="form-group row">--}}
                        {{--<label for="stock" class="control-label text-right">موجودی انبار</label>--}}
                        {{--<div class="col-12">--}}
                            {{--<input type="text" name="stock" class="form-control"--}}
                                   {{--value="{{ old('stock') }}" placeholder="">--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}


                {{--<div class="col-12 col-sm-6 col-md-6 col-lg-4 item-parent-input">--}}
                    {{--<div class="form-group row">--}}
                        {{--<label for="post_work_day" class=" col-form-label text-md-right">ارسال روز کاری</label>--}}
                        {{--<div class="col-12">--}}
                            {{--<select name="post_work_day" class="form-control" value="{{ old('post_work_day') }}" id="post_work_day">--}}
                                {{--<option value="0">آماده ارسال</option>--}}
                                {{--<option value="1"> از یک روز کاری</option>--}}
                                {{--<option value="2"> از دو روز کاری</option>--}}
                                {{--<option value="3"> از سه روز کاری</option>--}}
                                {{--<option value="4"> از چهار روز کاری</option>--}}
                                {{--<option value="5"> از پنج روز کاری</option>--}}
                                {{--<option value="6"> از شش روز کاری</option>--}}
                                {{--<option value="7"> از هفت روز کاری</option>--}}
                                {{--<option value="8"> از هشت روز کاری</option>--}}
                                {{--<option value="9"> از نه روز کاری</option>--}}
                            {{--</select>--}}
                        {{--</div>--}}
                    {{--</div>--}}

                {{--</div>--}}

                {{--<div class="col-12 col-sm-6 col-md-6 col-lg-4 item-parent-input">--}}
                    {{--<div class="form-group row">--}}
                        {{--<label for="discount" class="control-label text-right">درصد تخفیف خورده</label>--}}
                        {{--<div class="col-12">--}}
                            {{--<input type="text" name="discount" class="form-control"--}}
                                   {{--value="{{ old('discount') }}" placeholder="">--}}
                        {{--</div>--}}
                    {{--</div>--}}

                {{--</div>--}}
                <div class="col-12 col-sm-6 col-md-6 col-lg-4 item-parent-input">
                    <div class="form-group row">
                        <label for="type" class=" col-form-label text-md-right">وضعیت فروش</label>
                        <div class="col-12">
                            <select name="type" class="form-control" value="{{ old('type') }}" id="type">
                                <option value="0">عادی</option>
                                <option value="1"> ویژه</option>
                            </select>
                        </div>
                    </div>

                </div>
                <div class="col-12 col-sm-6 col-md-6 col-lg-4 item-parent-input">

                    <div class="form-group row">
                        <label for="active" class="col-form-label text-md-right">وضعیت</label>
                        <div class="col-12">
                            <select name="active" class="form-control" value="{{ old('active') }}" id="active">
                                <option value="0">غیر فعال</option>
                                <option value="1"> فعال</option>
                            </select>
                        </div>
                    </div>
                </div>



                <div class="col-12 col-sm-6 col-md-6 col-lg-4 item-parent-input">
                    <div class="form-group row">
                        <label for="cate_id" class=" col-form-label text-right">دسته</label>
                        <div class="col-12">
                            <select name="cate_id" class="form-control" value="{{ old('cate_id') }}" id="cate_id">
                                @foreach(App\Model\Category::all() as $category)
                                    <option value="{{$category->id}}"> {{$category->title}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                </div>
                <div class="col-12 col-sm-6 col-md-6 col-lg-4 item-parent-input">

                    <div class="form-group row">
                        <label for="brand_id" class="col-form-label text-right">برند</label>
                        <div class="col-12">
                            <select name="brand_id" class="form-control" value="{{ old('brand_id') }}" id="brand_id">
                                @foreach(App\Model\Brand::all() as $brand)
                                    <option value="{{$brand->id}}"> {{$brand->title}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
            </div>

            <div class="form-group row">
                <label for="body" class=" control-label text-right">متن محصول</label>
                <div class="col-12">
                    <textarea type="text" name="body" class="form-control" id="bodyAdmin" rows="5"
                              placeholder="متن محصول">{{ old('body') }}</textarea>
                </div>
            </div>
            <div class="form-group row">
                <label for="meta_description" class=" control-label text-right">توضیحات متاتگ</label>
                <div class="col-12">
                         <textarea type="text" name="meta_description" class="form-control" id="meta_description"
                                   placeholder="" rows="5">{{ old('meta_description') }}</textarea>
                </div>
            </div>



            <div class="form-group parent_input_file">
                <div class="upload-btn-wrapper">
                    <button class="btn" type="button"
                            onclick="document.getElementById('upload-file-1').click()">
                        <i class="fas fa-plus"></i>
                        <span class="span_btn_upload"> افزودن عکس</span>

                    </button>
                    <input class="input_file" type="file" id="upload-file-1" name="file[]"/>
                </div>

            </div>
            <input type="hidden" id="images" name="images" value="">

            <div class="form-group row">
                <label class="col-md-2 col-xs-12 control-label text-right"></label>
                <div class="col-md-10 col-xs-12">

                    <button type="submit" class="btn btn-primary">
                        ذخیره
                    </button>
                </div>
            </div>
        </form>

    </div>

@endsection


@section('script')

    <script>
                {{--let imageContainer = "{{ isset($post->images) ? implode(', ', $post->images) : ''}}";--}}
                {{--if(imageContainer != ''){--}}
                {{--imageContainer = imageContainer.split(', ');--}}
                {{--}else {--}}
        let imageContainer = [];
        var length = 0;
        var x = 2;

        length = $('.parent_input_file').find('.upload-btn-wrapper').length;

        $(document).on('click', '.icon_trash_image', function (e) {
            var str1 = $('#images').val();
            var str2 = $(this).parent().find('img').attr('src');
            if (str1.indexOf(str2) != -1) {
                str1 = str1.replace(str2, '');
                // console.log(str2 + " found");
            }
            var str1 = $('#images').val(str1);
            $(this).parent().remove();
            imageContainer.pop(str1);

            // console.log(length);
            length = length - 1;
            // var myEle = document.getElementById("inputFileAdd");
            if (length < 4 && imageContainer.length < 4 && $("[id^='upload-file']").length === 0) {
                let id = "'upload-file-" + x + "'";
                $('.parent_input_file').append('<div class="upload-btn-wrapper" id="inputFileAdd">' +
                    '<button class="btn" type="button"' +
                    'onclick="document.getElementById(' + id + ').click()">' +
                    '<i class="fas fa-plus"></i>' +
                    '<span class="span_btn_upload"> افزودن عکس</span>' +
                    '</button>' +
                    '<input class="input_file" type="file" id="upload-file-' + x + '" name="file[]"/>' +
                    '</div>');
                x++;
                length--;
            }
            length = Math.abs(length);
            console.log(document.getElementById("inputFileAdd"));
            console.log(imageContainer.length);
            console.log(length);
        });
        $(document).on('change', '.parent_input_file .input_file', function (e) {

            console.log($(this)[0].files[0]);
            let wrapper = $(this);
            let _token = document.head.querySelector('meta[name="csrf-token"]').content;
            let file = $(this)[0].files[0];
            let formdata = new FormData();
            formdata.append('file', file);
            formdata.append('_token', _token);
            $.ajax({
                method: 'post',
                url: "{{route('uploadFile')}}",
                data: formdata,
                dataType: 'JSON',
                contentType: false,
                cache: false,
                processData: false,
            })
                .done(function (data) {
                    console.log(data);
                    wrapper.parent().html('<img class="img-fluid" src="' + data.filename + '"/> <i class="fa fa-trash icon_trash_image"></i>');
                    imageContainer.push(data.filename);
                    console.log(imageContainer);
                    $('#images').val(imageContainer);
                    // console.log($('.parent_input_file').find('.upload-btn-wrapper').length);
                    // console.log(length);
                    if (length < 4 && imageContainer.length < 4 && $("[id^='upload-file']").length === 0) {
                        let id = "'upload-file-" + x + "'";
                        $('.parent_input_file').append('<div class="upload-btn-wrapper" id="inputFileAdd"> ' +
                            '<button class="btn" type="button"' +
                            'onclick="document.getElementById(' + id + ').click()">' +
                            '<i class="fas fa-plus"></i>' +
                            '<span class="span_btn_upload"> افزودن عکس</span>' +
                            '</button>' +
                            '<input class="input_file" type="file" id="upload-file-' + x + '" name="file[]"/>' +
                            '</div>');
                        x++;
                        length++;
                    }

                    // console.log(imageContainer);

                }).fail(function (data) {
                console.log(data);

            });
        })

    </script>
@endsection
