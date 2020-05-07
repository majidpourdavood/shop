@section('title' , ' | مکان ها ')
@section('description' , '')
@extends('site.layout.panel')

@section('content')
    <div class="container">
        <div class="row col-12 parent_breadcrumb_panel_top">
            <ul class="list-inline row col-12">
                <li class="list-inline-item col">
                    <nav class="breadcrumb_panel_top" aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            {{--<li class="breadcrumb-item"><a href="#">دسته ها</a></li>--}}
                            <li class="breadcrumb-item">
                                <a href="{{ route('location.create') }}" class="btn btn_create" title="اضافه کردن مکان">
                                    <i class="fas fa-plus"></i> مکان</a>
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
                    <?php $i = ($locations->perPage() * ($locations->currentPage() - 1)) + 1;  ?>
                    <th width="5%">ردیف</th>
                    <th width="15%">عنوان</th>
                    <th width="10%">وضعیت</th>
                    <th width="25%">تنظیمات</th>
                </tr>
                </thead>
                <tbody>
                @foreach($locations as $location)
                    <tr>
                        <td>   {{$i++}}</td>

                        <td>{{ $location->name }}</td>


                        <td>
                            @if ($location->active == 0)
                                غیر فعال
                            @elseif ($location->active == 1)
                                فعال
                            @endif
                        </td>

                        <td>


                            <ul class="list-inline">
                                <li class="list-inline-item">
                                    <form action="{{ route('location.active'  , ['id' => $location->id]) }}"
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
                                    <form action="{{ route('location.destroy'  , ['id' => $location->id]) }}"
                                          method="post">
                                        {{ method_field('delete') }}
                                        {{ csrf_field() }}
                                        <div class="btn_group ">
                                            <a href="{{ route('location.edit' , ['id' => $location->id]) }}"
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
        <div style="text-align: center">
            {!! $locations->render() !!}
        </div>
            </div>
        </div>
    </div>
@endsection
