@section('title' , ' |  پاسخ  کامنت ')
@section('description' , '')
@extends('site.admin.panel')

@section('content')
    <div class="container">
        <div class="row col-12 parent_breadcrumb_panel_top">
            <ul class="list-inline row col-12">
                <li class="list-inline-item col">
                    <nav class="breadcrumb_panel_top" aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a class="btn " href="#"> پاسخ کامنت</a></li>

                        </ol>
                    </nav>
                </li>
                @include('site.layout.clock-time')

            </ul>
        </div>

        <div class="row">
            <div class=" col-12 content_panel_layout">
                <h1>پاسخ کامنت</h1>
                @include('site.layout.flash-message')
                <form class="col-12 form_register_comment mt-4"
                      action="{{route('postReplyCommentAdmin', ['id'=> $comment->id ])}}" method="post">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <input type="hidden" name="parent_id" value="{{$comment->id}}">
                    <input type="hidden" name="commentable_id" value="{{ $comment->commentable_id }}">
                    <input type="hidden" name="commentable_type" value="{{ $comment->commentable_type}}">
                    {{--<div class="row col-12 form-row">--}}
                        {{--<div class="form-group col-md-6">--}}
                            {{--<input type="text" class="form-control" id="name" value="{{ old('name')}}" name="name"--}}
                                   {{--placeholder="نام">--}}
                        {{--</div>--}}
                        {{--<div class="form-group col-md-6">--}}
                            {{--<input type="text" class="form-control" id="email" value="{{ old('email')}}" name="email"--}}
                                   {{--placeholder="تلفن تماس یا ایمیل">--}}
                        {{--</div>--}}
                    {{--</div>--}}
                    <div class="form-group">
                  <textarea class="form-control" placeholder="نظر خود را اینجا بنویسید ..."
                            id="body_comment" name="comment" rows="7">{{ old('comment')}}</textarea>
                    </div>

                    <div class="row justify-content-end register_score_order ">
                        <button class="btn btn-success" type="submit">ثبت نظر</button>
                    </div>
                </form>

            </div>

        </div>
    </div>
@endsection


@section('script')

    <script>

    </script>
@endsection