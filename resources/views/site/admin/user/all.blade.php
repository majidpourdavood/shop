@section('title' , ' | کاربران ')
@section('description' , '')
@extends('site.admin.panel')

@section('content')
    <div class="container">
        <div class="row col-12 parent_breadcrumb_panel_top">
            <ul class="list-inline row col-12">
                <li class="list-inline-item col">
                    <nav class="breadcrumb_panel_top" aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a class="btn" href="#">کاربران</a></li>
                        </ol>
                    </nav>
                </li>

                @include('site.layout.clock-time')


            </ul>
        </div>


        <div class="row">
            <div class="col-12 ">

                <div class="table-responsive">
                    <table class="table table-striped table-hover" id="myTable">
                        <thead class="thead-light">
                        <tr>
                            <?php $i = ($users->perPage() * ($users->currentPage() - 1)) + 1;  ?>
                            <th width="5%">ردیف</th>
                            <th>نام کاربر</th>
                            <th>موبایل</th>
                            <th>تصویر</th>
                            {{--<th>مقام</th>--}}
                            <th>تاریخ عضویت</th>
                            <th>وضعیت</th>
                            <th width="27%">تنظیمات</th>

                        </tr>
                        </thead>
                        <tbody>
                        @foreach($users as $user)
                            <tr>
                                <td>   {{$i++}}</td>

                                <td>
                                    @if(isset($user->name))
                                        {{ $user->name }} {{ $user->lastName }}
                                    @else
                                        وارد نشده
                                    @endif
                                </td>
                                <td>
                                    @if(isset($user->mobile))
                                        {{ $user->mobile }}
                                    @else
                                        وارد نشده
                                    @endif
                                    </td>
                                <td style="width: 6rem;
    height: 6rem;
    border-radius: 50%;
    overflow: hidden;
    border: 0;
    padding: 0;
    margin: .25rem;
    display: block;    background-color: #006791;">
                                    <img src="<?php
                                    if (isset($user->image)) {
                                        echo $user->image;
                                    } else {
                                        echo '/images/user.png';
                                    }
                                    ?>" class="img-fluid  "   alt="{{$user->name}} {{$user->lastName}}">


                                </td>
                                {{--<td>  @if(count($user->roles) > 0)--}}
                                   {{--{{$user->roles[0]->name}}--}}
                                    {{--@else--}}
                                    {{--مقام ندارد--}}
                                {{--@endif--}}
                                {{--</td>--}}
                                <td>{{ jdate($user->created_at)->format('%B %d، %Y') }}</td>
                                {{--<td>{{ $user->created_at }}</td>--}}
                                <td>
                                    @if ($user->active == 0)
                                        غیر فعال
                                    @elseif ($user->active == 1)
                                        فعال
                                    @endif
                                </td>
                                <td>
                                    <ul class="list-inline ">
                                        <li class="list-inline-item">
                                            <form action="{{ action('Admin\UserController@destroy', $user->id) }}"
                                                  method="post">
                                                {{ method_field('delete') }}
                                                {{ csrf_field() }}
                                                <button type="submit" title="حذف" class="btn  btn-outline-danger">
                                                    <i class="fas fa-trash-alt"></i>
                                                </button>
                                            </form>
                                        </li>
                                        {{--<li class="list-inline-item">--}}
                                        {{--<a href="{{ route('users.edit' , ['id' => $user->id]) }}"--}}
                                        {{--title="ویرایش" class="btn btn-outline-warning">--}}
                                        {{--<i class="fas fa-edit"></i>--}}
                                        {{--</a></li>--}}
                                        <li class="list-inline-item">
                                            <a class="btn btn-outline-info"
                                               title="تغییر پسورد"
                                               href="{{route('users.resetPassword' ,  $user->id)}}">
                                                <i class="fas fa-key"></i>
                                            </a>
                                        </li>
                                        <li class="list-inline-item">
                                            <form action="{{ route('activeUser'  , $user->id) }}"
                                                  method="post">
                                                {{ method_field('PATCH') }}
                                                {{ csrf_field() }}
                                                <div class="btn-group btn-group-xs">
                                                    <button title="فعال یا غیرفعال" type="submit"
                                                            class="btn btn-outline-success">
                                                        <i class="fas fa-sync-alt"></i></button>

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
                    {!! $users->render() !!}

                </div>

            </div>
        </div>
    </div>
@endsection
