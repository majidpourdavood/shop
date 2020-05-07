@section('title' , ' | ساخت مکان ')
@section('description' , '')
@extends('site.layout.panel')
@section('css')

@endsection
@section('content')
    <div class="container">
        <div class="row col-12 parent_breadcrumb_panel_top">
            <ul class="list-inline row col-12">
                <li class="list-inline-item col">
                    <nav class="breadcrumb_panel_top" aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">ساخت مکان</a></li>
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
                      action="{{ route('location.store') }}" method="post"
                      enctype="multipart/form-data">
                    {{ csrf_field() }}

                    <div class="row one">
                        <label for="name" class="col-md-2 col-xs-12 control-label text-right">عنوان مکان</label>
                        <div class="col-md-10 col-xs-12">
                            <input type="text" name="name" class="form-control" id="name"
                                   value="{{ old('name') }}" placeholder="عنوان مکان">
                        </div>
                    </div>


                    <div class="row one">
                        <label for="parent_id" class="col-md-2 col-form-label text-md-right">زیر دسته</label>
                        <div class="col-md-10">
                            <select name="parent_id" class="form-control" value="{{ old('parent_id') }}" id="">
                                <option value="0">مکان اصلی</option>
                                @foreach(\App\Location::where('parent_id', '=', 0)->get() as $location)
                                    <option value="{{$location->id}}">{{$location->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row one">
                        <label for="active" class="col-md-2 col-form-label text-md-right">وضعیت</label>
                        <div class="col-md-10">
                            <select name="active" class="form-control" value="{{ old('active') }}" id="">
                                <option value="0">غیر فعال</option>
                                <option value="1"> فعال</option>
                            </select>
                        </div>
                    </div>


                    <div class="row one">
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

@endsection
