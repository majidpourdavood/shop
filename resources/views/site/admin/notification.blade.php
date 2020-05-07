@extends('site.admin.panel')

@section('content')

    <div class="container">
        <div class="row col-12 parent_breadcrumb_panel_top">
            <ul class="list-inline row col-12">
                <li class="list-inline-item col">
                    <nav class="breadcrumb_panel_top" aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a class="btn " href="#">اعلان ها</a></li>
                        </ol>
                    </nav>
                </li>
                @include('site.layout.clock-time')
            </ul>
        </div>

        <div class="row col-12 content_panel_layout">
            <div class=" col-12">
                <h1> اعلان ها</h1>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-12">


                                    @if(count($notifications)> 0)
                                        <div class="row col-12">
                                            <ul class="list-group col-12 list_message">
                                                @foreach($notifications as $notification)
                                                    <li class="list-group-item item {{ $notification->read_at == null ? 'new' : 'uuu'}}">
                                                        <ul class="list-inline center_vertical">
                                                            <li class="list-inline-item">
                                                                <ul class="list-group">
                                                                    <li class="list-group-item"><i
                                                                                class="fas fa-circle"></i> تاریخ :
                                                                        <span>  {{jdate($notification->created_at)->format('date')}}</span>
                                                                    </li>
                                                                    <li class="list-group-item"><i
                                                                                class="fas fa-circle"></i> زمان :
                                                                        <span> {{jdate($notification->created_at)->format('time')}}</span>
                                                                    </li>
                                                                    {{--<li class="list-group-item"><i class="fas fa-circle"></i> ارسال کننده : <span> {{$notification->data['userSender']['name']}} {{$notification->data['userSender']['lastName']}}</span>--}}
                                                                    {{--</li>--}}

                                                                </ul>
                                                            </li>
                                                            <li class="list-inline-item col">
                                                                <ul class="list-inline row content_notification">
                                                                    {{--<li class="list-inline-item col-3 col">--}}
                                                                    {{--@if($notification->data['icon'] )--}}
                                                                    {{--@if( $notification->data['icon'] =='warning')--}}
                                                                    {{--<span class="icon_warning"> </span>--}}
                                                                    {{--@elseif( $notification->data['icon']  =='confirmation')--}}
                                                                    {{--<span class="icon_confirmation"> </span>--}}
                                                                    {{--@else--}}
                                                                    {{--<span class="icon_error_circle"> </span>--}}
                                                                    {{--@endif--}}
                                                                    {{--@endif--}}
                                                                    {{--</li>--}}
                                                                    <li class="list-inline-item item col">
                                                                        <ul class="list-group">
                                                                            <li class="list-group-item text_message">
                                                                                پیام :
                                                                            </li>
                                                                            <li class="list-group-item text_message">
                                                                                {{$notification->data['data']}}
                                                                                {{--{{dd($notification->data['user'])}}--}}
                                                                            </li>
                                                                        </ul>
                                                                    </li>
                                                                    @if($notification->data['link'] == null )

                                                                    @else
                                                                        <li class="list-inline-item item col-3"><a
                                                                                    class="btn {{$notification->data['class'] != null ? $notification->data['class'] : 'btn_notify_red'}}"
                                                                                    href="{{$notification->data['link']}}"
                                                                                    title="{{$notification->data['linkText']}}">{{$notification->data['linkText']}}</a>
                                                                        </li>
                                                                    @endif

                                                                </ul>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                @endforeach

                                            </ul>
                                            {!! $notifications->render() !!}

                                        </div>
                                    @else
                                        <div class="row col-12 justify-content-center align-items-center">
                                            <div class="parent-not-notify ">
                                                <h3 class="parent-not-notify-h3">شما اعلانی دریافت نکرده اید ! </h3>
                                            </div>
                                        </div>
                                    @endif

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
