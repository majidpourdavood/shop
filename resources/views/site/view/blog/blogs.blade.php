@section('title' , ' | بلاگ ')
@section('description' , 'یارپی با ایجاد یک بستر یکپارچه در تلاش است محیطی تحلیلی و کاربردی را برای طیف گسترده ای از کاربران دنیای دیجیتال که به دنبال روشی برای مدیریت مالی هستند فراهم آورد.')
@extends('site.master')

@section('content')
    {{--<div class="row justify-content-center align-items-center">--}}
    {{--<h1 class="h1-layout">--}}
    {{--جدیدترین نوشته های بلاگ--}}
    {{--</h1>--}}
    {{--</div>--}}

    <div class="bg-yellow">

        <div class="container">
            <div class="row justify-content-center align-items-center">
                <div class="col-12 col-sm-12 col-md-12 col-lg-9 right">
                    <h1 class="h1-layout">
                        جدیدترین نوشته های بلاگ
                    </h1>
                </div>
                <div class="col-12 col-sm-12 col-md-12 col-lg-3 left">

                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row  content_layout">
            <div class="row  parent-blog">

                <div class="col-12 col-sm-12 col-md-12 col-lg-9 right">
                    @foreach($blogs as $blog)
                        <div class="card">
                            <div class="row no-gutters ">
                                <div class="col-md-4 parent-image-blog">
                                    <a href="{{route('blog', ['slug' => $blog->slug])}}"
                                       title="{{$blog->title}}">
                                        <img
                                                src="{{isset($blog->image) ? $blog->image :  '/images/map_blog.png'}}"
                                                class="card-img" alt="{{$blog->title}}">
                                    </a>
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <h5 class="card-title">
                                            <a href="{{route('blog', ['slug' => $blog->slug])}}"
                                               title="{{$blog->title}}">
                                                {{$blog->title}}
                                            </a>
                                        </h5>
                                        <div class="card-text">
                                            {{--{!! words($blog->body, 40, '...') !!}--}}
                                            <?php echo strip_tags(words($blog->body, 40, '...'));?>
                                        </div>
                                        <a href="{{route('blog', ['slug' => $blog->slug])}}"
                                           class="btn btn-info">بیشتر</a>
                                    </div>

                                </div>
                            </div>

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
                        </div>
                    @endforeach

                    <div class="row col-12 justify-content-center">
                        {!! $blogs->render() !!}

                    </div>
                </div>
                <div class="col-12 col-sm-12 col-md-12 col-lg-3 left">

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
    </div>

@endsection
