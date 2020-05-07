@section('title') | {{$blog->title}} @stop
@section('description')  {{$blog->description}}@stop

@extends('site.master')

@section('content')
    <div class="bg-yellow">

        <div class="container">
            <div class="row justify-content-center align-items-center">
                <div class="col-12 col-sm-12 col-md-12 col-lg-9 right">
                    <h1 class="h1-layout">
                        {{$blog->title}}
                    </h1>
                </div>
                <div class="col-12 col-sm-12 col-md-12 col-lg-3 left">

                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row  content_layout">
            <div class="row  parent-blog-single">

                <div class="col-12 col-sm-12 col-md-12 col-lg-9 right">

                    <div class="col-md-4 parent-image-blog-single">
                        <a href="{{route('blog', ['slug' => $blog->slug])}}" title="{{$blog->title}}">
                            <img src="{{isset($blog->image) ? $blog->image :  '/images/1.jpg'}}"
                                 class="img-fluid img_blog_event" alt="{{$blog->title}}">
                        </a>
                    </div>
                    <h5 class="card-title">
                        {{$blog->title}}
                    </h5>

                    <div class="card-text">
                        {!! $blog->body !!}
                    </div>
                    @if(isset($blog->tags))
                        <div class="post_blog_tags">
                            <ul>
                                @foreach($blog->tags as $tag)
                                    <li><a href="#" title="{{$tag}}">{{$tag}}</a></li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="row no-gutters">
                        <div class="card-footer col-12 row">
                            <div class="col-md-4 item">
                                <ul class="list-inline">
                                    <li class="list-inline-item">
                                        <i class="fas fa-eye"></i>
                                        <span>{{$blog->viewCount}}</span>
                                    </li>
                                    <li class="list-inline-item"><i class="fas fa-comment"></i>
                                        <span>{{count($blog->comments()->where('approved', '=', 1)->get())}}</span>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-md-8 item">
                                <ul class="list-inline">
                                    <li class="list-inline-item">
                                        {{--<i class="fas fa-star"></i>--}}
                                        {{--<i class="fas fa-star"></i>--}}
                                        {{--<i class="fas fa-star"></i>--}}
                                        {{--<i class="fas fa-star"></i>--}}
                                        {{--<i class="fas fa-star"></i>--}}

                                    </li>
                                    <li class="list-inline-item">
                                        <i class="fas fa-clock"></i>
                                        <span>{{ jdate($blog->created_at)->format('date')}} - {{ jdate($blog->created_at)->format('H:i')}}	</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    @include('site.layout.comment' , ['comments' => $comments , 'subject' => $blog])


                </div>
                <div class="col-12 col-sm-12 col-md-12 col-lg-3 ">
                    <div class="card blog-related">
                        <div class="card-header">
                            دیگر مطالب بلاگ
                        </div>
                        <div class="card-body">

                            <ul class="list-group list-group-flush">
                                @foreach($blogRelateds as $blogRelated)
                                    <li class="list-group-item">

                                        <a href="{{route('blog', ['slug' => $blogRelated->slug])}}"
                                           title="{{$blogRelated->title}}">
                                            {{$blogRelated->title}}
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>


                    <ul class="list-inline row col-12 list-sosial-blog">


                        <li class="list-inline-item col-6">
                            <a href="#"
                               title="فیسبوک" class="facebook"> <i class="fab fa-facebook"></i>
                                <span>فیسبوک</span>
                            </a></li>
                        <li class="list-inline-item col-6">
                            <a href="#"
                               title="تلگرام" class="telegram"> <i class="fab fa-telegram"></i> <span>تلگرام</span></a>
                        </li>
                        <li class="list-inline-item col-6">
                            <a href="#"
                               title="گوگل پلاس" class="gplus"> <i class="fab fa-google-plus"></i>
                                <span>گوگل پلاس</span></a></li>
                        <li class="list-inline-item col-6">
                            <a href="#"
                               title="توییتر" class="twitter"> <i class="fab fa-twitter"></i> <span>توییتر</span></a>
                        </li>
                        <li class="list-inline-item col-6">
                            <a href="#"
                               title="واتساپ" data-action="share/whatsapp/share" class="whatsapp"> <i
                                        class="fab fa-whatsapp"></i>
                                <span>واتساپ</span></a></li>
                        <li class="list-inline-item col-6">
                            <a href="#"
                               title="لینکدین" class="linkedin"> <i class="fab fa-linkedin"></i>
                                <span>لینکدین</span></a></li>

                    </ul>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('script')

    <script>

        $(document).ready(function () {
            $(function () {
                $('[data-toggle="tooltip"]').tooltip()
            });

            $('.reply_comment_all_btn').click(function (event) {
                event.preventDefault();
                var parent_id = $(this).data('parent');
                // alert( parent_id);
                var currentContent = $(this).parent().parent().parent().find('.comment_post_repl_input');
                $('.comment_post_repl_input').not(currentContent).slideUp();
                $('#replay_comment' + parent_id).slideToggle('slow');
                $('#replay_comment' + parent_id).find("[name='parent_id']").val(parent_id);
            });
        });
    </script>
@endsection
