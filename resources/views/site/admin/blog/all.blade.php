@section('title' , ' | بلاگ و رویداد ')
@section('description' , '')
@extends('site.admin.panel')

@section('content')
    <div class="container">
        <div class="row col-12 parent_breadcrumb_panel_top">
            <ul class="list-inline row col-12">
                <li class="list-inline-item col">
                    <nav class="breadcrumb_panel_top" aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            {{--<li class="breadcrumb-item"><a href="#">دسته ها</a></li>--}}
                            <li class="breadcrumb-item">
                                <a href="{{ route('blog.create') }}" class="btn "
                                   title="اضافه کردن بلاگ و رویداد">
                                    <i class="fas fa-plus"></i> بلاگ و رویداد</a>
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
                            <?php $i = ($blogs->perPage() * ($blogs->currentPage() - 1)) + 1;  ?>
                            <th width="5%">ردیف</th>
                            <th width="15%">عنوان</th>
                            <th width="15%">نوع</th>
                            <th width="10%">تصویر</th>
                            <th width="10%">وضعیت</th>
                            <th>تاریخ</th>
                            <th width="35%">تنظیمات</th>
                        </tr>
                        </thead>
                        <tbody class="row_position">
                        @foreach($blogs as $blog)
                            <tr id="<?php echo $blog->id ?>">
                                <td>   {{$i++}}</td>

                                <td>{{ $blog->title }}</td>
                                <td>
                                    @if($blog->type == 'blog')
                                        بلاگ
                                    @elseif($blog->type == 'event')
                                        رویداد
                                    @endif
                                </td>

                                <td><a target="_blank" href="{{ $blog->image }}">
                                        <img width="90" height="90" src="{{ $blog->image }}" alt="{{$blog->title}}"></a>
                                </td>

                                <td>
                                    @if ($blog->active == 0)
                                        غیر فعال
                                    @elseif ($blog->active == 1)
                                        فعال
                                    @endif
                                </td>
                                <td>{{ $blog->created_at }}</td>
                                <td>


                                    <ul class="list-inline">
                                        <li class="list-inline-item">
                                            <form action="{{ route('blog.active'  , ['id' => $blog->id]) }}"
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
                                            <form action="{{ route('blog.destroy'  , ['id' => $blog->id]) }}"
                                                  method="post">
                                                {{ method_field('delete') }}
                                                {{ csrf_field() }}
                                                <div class="btn_group ">
                                                    <a href="{{ route('blog.edit' , ['id' => $blog->id]) }}"
                                                       title="ویرایش" class="btn btn-outline-warning">
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
                <div class="row col-12 justify-content-center">
                    {!! $blogs->render() !!}

                </div>
            </div>
        </div>
    </div>
@endsection
