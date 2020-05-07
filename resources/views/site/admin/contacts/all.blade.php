@section('title' , ' | همه نظرات ')
@section('description' , '')
@extends('site.admin.panel')

@section('content')
    <div class="container">
        <div class="row col-12 parent_breadcrumb_panel_top">
            <ul class="list-inline row col-12">
                <li class="list-inline-item col">
                    <nav class="breadcrumb_panel_top" aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a class="btn " href="#"> همه نظرات</a></li>

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
                    <?php $i = ($contacts->perPage() * ($contacts->currentPage() - 1)) + 1;  ?>
                    <th width="5%">ردیف</th>
                    <th>نام کاربر</th>
                    <th>وب سایت</th>
                    <th>موبایل</th>
                    <th>پیام</th>
                    <th>تنظیمات</th>
                </tr>
                </thead>
                <tbody>
                @foreach($contacts as $contact)
                    <tr>
                        <td>   {{$i++}}</td>

                        <td>{{ $contact->name }} </td>
                        <td>{{ $contact->email }}</td>
                        <td>{{ $contact->subject }}</td>
                        <td>{{  $contact->body}}</td>
                        <td>
                            <form action="{{ route('admin.destroyContact'  , ['id' => $contact->id]) }}" method="post">
                                {{ method_field('delete') }}
                                {{ csrf_field() }}
                                <div class="btn-group btn-group-xs">
                                    <button type="submit" class="btn  btn-outline-danger">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>                                 </div>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <div style="text-align: center">
            {!! $contacts->render() !!}
        </div>
            </div>
        </div>
    </div>
@endsection
