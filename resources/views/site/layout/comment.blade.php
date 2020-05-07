<div class="row col-12 list_comment">
    <h3 class="count_comment_all">{{count($subject->comments()->where('approved', '=', 1)->get())}} کامنت </h3>
    @include('site.layout.flash-message')

    <div class="comment-insert row col-12">

        <form class=" row col-12 form_register_comment" action="/comments" method="post">
            <div class="row col-12 form-row">
            <div class="form-group col-md-6">
            {{--<label for="name">نام</label>--}}
            <input type="text" class="form-control" id="name" name="name" placeholder="نام">
            </div>
            <div class="form-group col-md-6">
            {{--<label for="email">تلفن تماس یا ایمیل</label>--}}
            <input type="text" class="form-control" id="email" name="email" placeholder="تلفن تماس یا ایمیل">
            </div>
            </div>
            <input type="hidden" name="_token" value="{{csrf_token()}}">
            <input type="hidden" name="parent_id" value="0">
            <input type="hidden" name="commentable_id" value="{{ $subject->id }}">
            <input type="hidden" name="commentable_type" value="{{ get_class($subject) }}">
            <div class="form-group  col-12">
                  <textarea class=" form-control" placeholder="نظر خود را اینجا بنویسید ..."
                            name="comment" rows="7">{{old('comment')}}</textarea>
            </div>

            <div class="row col-12 justify-content-end  ">
                <button class="btn btn-info" type="submit">ثبت نظر</button>
            </div>
        </form>


    </div>


    @foreach($comments as $comment)
        <ul class="row col-12 list-inline parent_comment_body_user">
            <li class="col-12 list-inline-item">
                <ul class="row col-12 list-inline parent_comment_user_date">
                    <li class="list-inline-item col"><span class="user_comment_all">
                        <img src="/images/default_avatar.png" class="img-fluid" alt="{{isset($comment->name) ? $comment->name : 'ناشناس'}}">
                                </span></li>


                    <li class="list-inline-item col">
                        <ul class=" list-group ">
                            <li class="list-group-item">
                                <ul class="list-inline-item">
                                    <li class="list-inline-item">
                                        <span class="name">{{isset($comment->name) ? $comment->name : 'ناشناس'}} </span>

                                    </li>
                                    <li class="list-inline-item">
 <span class="date_comment_all">
               {{ jdate($comment->created_at)->ago()}}
                        </span></li>
                                </ul>
                            </li>
                            <li class="list-group-item">
                                <p class="list-inline-item col body_comment_all text-left">

                                    {!! $comment->comment !!} </p>
                            </li>
                        </ul>
                    </li>
                </ul>


                <ul class="row col-12 list-inline parent_comment_reply">
                    {{--<li class="list-inline-item">--}}
                    {{--۱۲۴ <i class="fas fa-thumbs-up"></i>--}}
                    {{--</li>--}}

                    {{--<li class="list-inline-item ">--}}
                    {{--۲۳ <i class="fas fa-thumbs-down"></i>--}}
                    {{--</li>--}}


                    <li class="list-inline-item">
                        <a class="btn reply_comment_all_btn " data-parent="{{$comment->id}}" href="#">
                            <i class="fas fa-reply"></i>
                            پاسخ</a>
                    </li>
                </ul>


                <div class="comment_post_repl_input comment-insert" id="replay_comment{{$comment->id}}">

                    <form class=" row col-12 form_register_comment" action="/comments" method="post">
                        <div class="row col-12 form-row">
                        <div class="form-group col-md-6">
                        {{--<label for="name">نام</label>--}}
                        <input type="text" class="form-control" id="name" name="name" placeholder="نام">
                        </div>
                        <div class="form-group col-md-6">
                        {{--<label for="email">تلفن تماس یا ایمیل</label>--}}
                        <input type="text" class="form-control" id="email" name="email" placeholder="تلفن تماس یا ایمیل">
                        </div>
                        </div>
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                        <input type="hidden" name="parent_id" value="0">
                        <input type="hidden" name="commentable_id" value="{{ $subject->id }}">
                        <input type="hidden" name="commentable_type" value="{{ get_class($subject) }}">
                        <div class="form-group  col-12">
                  <textarea class=" form-control" placeholder="نظر خود را اینجا بنویسید ..."
                            name="comment" rows="7">{{old('comment')}}</textarea>
                        </div>

                        <div class="row col-12 justify-content-end  ">
                            <button class="btn btn-info" type="submit">ثبت نظر</button>
                        </div>
                    </form>

                </div>

            </li>

            @if(count($comment->comments))
                @foreach($comment->comments as $childComment)
                    <li class=" list-inline-item comment_reply ">
                        <ul class="row col-12 list-inline parent_comment_user_date">
                            <li class="list-inline-item col"><span class="user_comment_all">
                        <img src="/images/default_avatar.png" class="img-fluid" alt="{{isset($childComment->name) ? $childComment->name : 'ناشناس'}}">
                                </span></li>

                            <li class="list-inline-item col">
                                <ul class=" list-group ">
                                    <li class="list-group-item">
                                        <ul class="list-inline-item">
                                            <li class="list-inline-item">
                                                <span class="name">{{isset($childComment->name) ? $childComment->name : 'ناشناس'}}</span>

                                            </li>
                                            <li class="list-inline-item">
 <span class="date_comment_all">
                           {{ jdate($childComment->created_at)->ago()}}
                        </span></li>
                                        </ul>
                                    </li>
                                    <li class="list-group-item">
                                        <p class="list-inline-item col body_comment_all text-left">
                                            {!! $childComment->comment !!}
                                        </p>
                                    </li>
                                </ul>
                            </li>
                        </ul>


                        <ul class="row col-12 list-inline parent_comment_reply">
                            {{--<li class="list-inline-item">--}}
                            {{--۱۲۴ <i class="fas fa-thumbs-up"></i>--}}
                            {{--</li>--}}

                            {{--<li class="list-inline-item ">--}}
                            {{--۲۳ <i class="fas fa-thumbs-down"></i>--}}
                            {{--</li>--}}


                            {{--<li class="list-inline-item">--}}
                                {{--<a class="reply_comment_all_btn" data-parent="{{$childComment->id}}" href="#">--}}
                                    {{--<i class="fas fa-reply"></i>--}}
                                    {{--پاسخ</a>--}}
                            {{--</li>--}}
                        </ul>





                    </li>


                @endforeach
            @endif
        </ul>
    @endforeach
</div>


