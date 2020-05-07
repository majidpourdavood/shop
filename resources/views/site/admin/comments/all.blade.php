@section('title' , ' | کامنت ها ')
@section('description' , '')
@extends('site.admin.panel')

@section('content')
    <div class="container">
        <div class="row col-12 parent_breadcrumb_panel_top">
            <ul class="list-inline row col-12">
                <li class="list-inline-item col">
                    <nav class="breadcrumb_panel_top" aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a class="btn " href="#">کامنت ها</a></li>
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
                    <?php $i = ($comments->perPage() * ($comments->currentPage() - 1)) + 1;  ?>
                    <th width="5%">ردیف</th>
                    <th>نام کاربر</th>
                    <th>متن کامنت</th>
                    <th>وضعیت</th>
                    <th>پست مربوطه</th>
                    <th>تنظیمات</th>
                </tr>
                </thead>
                <tbody>
                @foreach($comments as $comment)
                    <tr>
                        <td>   {{$i++}}</td>

                        <td>{{$comment->name}} </td>

                        <td>{{ $comment->comment }}</td>

                        <td>
                            @if($comment->approved == 0)
                                تایید نشده
                                @else
                                تایید شده
                                @endif

                        </td>

                        <td>
                            @if($comment->commentable)
                                {{  $comment->commentable->title }}
                            @endif

                        </td>
                        <td>
                            <ul class="list-inline">
                                <li class="list-inline-item">
                                    <form action="{{ route('comment.destroy'  , ['id' => $comment->id]) }}"
                                          method="post">
                                        {{ method_field('delete') }}
                                        {{ csrf_field() }}
                                        <div class="btn-group btn-group-xs">
                                            <button type="submit" class="btn  btn-outline-danger">
                                                <i class="fas fa-trash-alt"></i>
                                            </button>
                                        </div>
                                    </form>
                                </li>
                                @if($comment->approved == 0)
                                    <li class="list-inline-item">
                                        <form style="margin-right: 5px"
                                              action="{{ route('approve.comment'  , ['id' => $comment->id]) }}"
                                              method="post">
                                            {{ method_field('patch') }}
                                            {{ csrf_field() }}
                                            <button type="submit" class="btn btn-outline-success">
                                                <i class="fas fa-check"></i></button>
                                        </form>
                                    </li>
                                @else
                                @endif


                                @if($comment->parent_id == 0)
                                <li class="list-inline-item">
                                    <a href="{{route('getReplyCommentAdmin', ['id'=> $comment->id])}}"
                                       class="btn btn-outline-info" title="پاسخ">
                                        پاسخ
                                    </a>
                                </li>
                                    @endif
                            </ul>


                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <div style="text-align: center">
            {!! $comments->render() !!}
        </div>
            </div>
        </div>
    </div>
@endsection
