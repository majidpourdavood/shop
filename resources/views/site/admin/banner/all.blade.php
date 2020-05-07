@section('title' , ' | بنر ها ')
@section('description' , '')
@extends('site.admin.panel')

@section('content')
    <div class="container">
        <div class="row col-12 parent_breadcrumb_panel_top">
            <ul class="list-inline row col-12">
                <li class="list-inline-item col">
                    <nav class="breadcrumb_panel_top" aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            {{--<li class="breadcrumb-item"><a href="#">بنر ها</a></li>--}}
                            <li class="breadcrumb-item">
                                <a href="{{ route('banner.create') }}" class="btn btn_create" title="اضافه کردن بنر">
                                    <i class="fas fa-plus"></i> بنر</a>
                            </li>
                        </ol>
                    </nav>
                </li>

                @include('site.layout.clock-time')


            </ul>
        </div>


        <div class="row">
            <div class="col-12 ">

                <div class="table-responsive">
                    <table class="table table-striped table-hover auto-index" id="myTable">
                        <thead class="thead-light">
                        <tr>
                            <?php $i = ($banners->perPage() * ($banners->currentPage() - 1)) + 1;  ?>
                            <th width="5%">ردیف</th>
                            <th width="15%">عنوان</th>
                            <th width="10%">تصویر</th>
                                <th width="10%">وضعیت</th>

                                <th width="25%">تنظیمات</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($banners as $banner)
                            <tr>
                                <td>   {{$i++}}</td>

                                <td>{{ $banner->title }}</td>


                                <td>
                                    @if(isset($banner->image))
                                        <a target="_blank" href="{{ $banner->image }}">
                                            <img width="90" height="90" src="{{ $banner->image }}"
                                                 alt="{{ $banner->image }}">
                                        </a>
                                    @else
                                        آپلود نشده
                                    @endif
                                </td>
                                <td>
                                    @if ($banner->active == '0')
                                        غیر فعال
                                    @elseif ($banner->active == '1')
                                        فعال
                                    @endif
                                </td>

                                <td>


                                    <ul class="list-inline">
                                        <li class="list-inline-item">
                                            <form action="{{ route('banner.active'  ,  $banner->id) }}"
                                                  method="post">
                                                {{ method_field('PATCH') }}
                                                {{ csrf_field() }}
                                                <div class="btn-group btn-group-xs">
                                                    <button type="submit" class="btn btn-outline-success">
                                                        <i class="fas fa-sync-alt"></i></button>

                                                </div>
                                            </form>
                                        </li>
                                        <li class="list-inline-item">
                                            <form action="{{ route('banner.destroy'  ,  $banner->id) }}"
                                                  method="post">
                                                {{ method_field('delete') }}
                                                {{ csrf_field() }}
                                                <div class="btn_group ">
                                                    <a href="{{ route('banner.edit' , $banner->id) }}"
                                                       class="btn btn-outline-warning" title="ویرایش">
                                                        <i class="fas fa-edit"></i></a>
                                                    <button type="submit" class="btn  btn-outline-danger">
                                                        <i class="fas fa-trash-alt"></i>
                                                    </button>
                                                </div>
                                            </form>
                                        </li>


                                    </ul>
                                </td>

                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="row justify-content-center ">
                    {!! $banners->render() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
