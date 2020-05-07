@section('title' , ' | ویرایش خبر یا بلاگ ')
@section('description' , '')
@extends('site.admin.panel')
@section('css')
    <link rel="stylesheet" href="{{ asset('css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/last.css') }}">

@endsection
@section('content')
    <div class="container">
        <div class="row col-12 parent_breadcrumb_panel_top">
            <ul class="list-inline row col-12">
                <li class="list-inline-item col">
                    <nav class="breadcrumb_panel_top" aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a class="btn " href="#">ویرایش خبر یا بلاگ</a></li>
                        </ol>
                    </nav>
                </li>

                @include('site.layout.clock-time')


            </ul>
        </div>

        <div class="row col-12 content_panel_layout">
            <div class=" col-12">
                <h1>ویرایش خبر یا بلاگ</h1>
                @include('site.layout.flash-message')
                <form class="form-horizontal form_panel" action="{{ route('blog.update' , ['id' => $blog->id ]) }}"
                      method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    {{ method_field('PATCH') }}

                    <div class=" row one">
                        <label for="type" class="col-md-2 col-form-label text-md-right">نوع</label>
                        <div class="col-md-10">
                            <select name="type" class="form-control" value="{{ old('type') }}" id="type">
                                <option value="blog" {{ $blog->type == 'blog' ? 'selected' : '' }}>بلاگ</option>
                                <option value="event" {{ $blog->type == 'event' ? 'selected' : '' }}> رویداد</option>
                            </select>
                        </div>
                    </div>

                    <div class="row one">
                        <label for="title" class="col-md-2 col-xs-12 control-label text-right">عنوان خبر یا بلاگ</label>
                        <div class="col-md-10 col-xs-12">
                            <input type="text" name="title" class="form-control" id="title"
                                   value="{{ $blog->title  }}" placeholder="عنوان خبر">
                        </div>
                    </div>
                    <div class="row one">
                        <label for="description" class="col-md-2 col-xs-12 control-label text-right">خلاصه خبر یا بلاگ</label>
                        <div class="col-md-10 col-xs-12">
                    <textarea type="text" name="description" class="form-control" id="description" rows="7"
                              placeholder="خلاصه خبر">{{ $blog->description }}</textarea>
                        </div>
                    </div>
                    <div class="row one">
                        <label for="body" class="col-md-2 col-xs-12 control-label text-right">متن خبر یا بلاگ</label>
                        <div class="col-md-10 col-xs-12">
                    <textarea type="text" name="body" class="form-control" id="bodyAdmin" rows="5"
                              placeholder="متن خبر">{{ $blog->body  }}</textarea>
                        </div>
                    </div>

                    {{--<div class=" row one">--}}
                        {{--<label for="time_read" class="col-md-2 col-xs-12 control-label text-right">زمان خواندن به دقیقه</label>--}}
                        {{--<div class="col-md-10 col-xs-12">--}}
                            {{--<input type="text" name="time_read" class="form-control" id="time_read"--}}
                                   {{--value="{{ $blog->time_read  }}" placeholder="">--}}
                        {{--</div>--}}
                    {{--</div>--}}
                    <div class=" row one">
                        <label class="col-md-2 col-form-label text-md-right" for="tags">کلمات کلیدی طرح (کلمه کلیدی خود
                            را تایپ سپس بر روی enter کلیک کنید)</label>
                        <div class="col-md-10"><select name="tags[]" value="{{old('tags')}}" id="tags"
                                                       class="select2 form-control" multiple="multiple">
                                @if(isset($blog->tags))  @foreach($blog->tags as $detailType)
                                    <option value="{{$detailType}}" selected>{{$detailType}}</option>
                                @endforeach
                                    @endif
                            </select>
                        </div>
                    </div>

                    <div class="row one">
                        <label for="cate_id" class="col-md-2 col-form-label text-right">دسته</label>
                        <div class="col-md-10">
                            <select name="cate_id" class="form-control" value="{{ old('cate_id') }}" id="cate_id">
                                @foreach(App\Category::get() as $category)
                                    <option value="{{$category->id}}"
                                            {{ $blog->cate_id == $category->id ? 'selected' : '' }}> {{$category->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row one">
                        <label for="active" class="col-md-2 col-form-label text-right">وضعیت</label>
                        <div class="col-md-10">
                            <select name="active" class="form-control" id="">
                                <option value="0" {{ $blog->active == 0 ? 'selected' : '' }}>غیر فعال</option>
                                <option value="1" {{  $blog->active == 1 ? 'selected' : '' }}> فعال</option>
                            </select>
                        </div>
                    </div>


                    <div class="row one">
                        <label for="image" class="col-md-2 col-xs-12 control-label text-right"> تصویر اصلی محصول</label>
                        <div class="col-md-7 col-xs-12">
                            <input type="file" name="image" class="form-control" id="image"
                                   value="{{ $blog->image }}" placeholder="تصویر اصلی محصول">
                        </div>
                        <div class="col-md-3 col-xs-12">
                            <img src="{{$blog->image}}" class="img-fluid img-rounded" width="150" alt="">
                        </div>
                    </div>
                    <div class="row one">
                        <label class="col-md-2 col-xs-12 control-label"></label>
                        <div class="col-md-10 col-xs-12">

                            <button type="submit" class="btn btn-primary">
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
    <script src=" {{ asset('js/select2.min.js') }}"></script>

    <script>
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
