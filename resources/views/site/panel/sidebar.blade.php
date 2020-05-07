<nav class="navbar fixed-top navbar_panel">


    <ul class="nav justify-content-start parent_toggle_navbar  active">
        <li class="nav-item parent_logo_panel active">
            <a class="text_logo_panel" target="_blank" href="/">
                {{--<img src="/images/logo_panel.png" class="img-fluid" alt="">--}}
                فروشگاه
            </a>
        </li>

        <li class="nav-item parent_menu_panel_icon active">
            <a class="btn menu_panel_icon" href="javascript:void(0)">
                <span></span>
            </a>

        </li>
    </ul>


    <ul class="nav justify-content-end parent_dropdown_panel">

        <li class="list-inline-item parent_bell">
            <a href="{{route('panel.notifications')}}" title="اعلان ها">
                <i class="fas fa-bell"></i>
                <span class="badge badge-secondary">
                            {{count(auth()->user()->unreadNotifications)}}
                            </span>
            </a>
        </li>

        <li class="nav-item dropdown_panel">
            <a class="nav-link dropdown_toggle_panel" href="#" role="button">
                <img src="{{URL::asset('/images/default_avatar.png')}}" class="img-fluid" alt="">
            </a>

            <div class="dropdown_menu_panel ">
                <ul class="row col-12 list-inline parent_profile_panel_header">
                    <li class="list-inline-item">
                        <div class="">
                            <img src="<?php
                            if (isset(auth()->user()->image) || auth()->user()->image != null) {
                                echo auth()->user()->image;
                            } else {
                                echo '/images/default_avatar.png';
                            }
                            ?>" class="img-fluid" alt="">
                        </div>
                    </li>
                    <li class="list-inline-item">
                        <h3>{{auth()->user()->mobile}} </h3>


                    </li>
                </ul>

                <ul class="list-group list_top_panel">
                    {{--<li class="list-group-item">--}}
                    {{--<a href="{{route('panel.profile')}}">--}}
                    {{--<i class="fa fa-user"></i>--}}
                    {{--پروفایل--}}
                    {{--</a>--}}
                    {{--</li>--}}

                    <li class="list-group-item">
                        <a class="btn btn_logout_panel" href="{{ route('logout') }}"
                           onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                            <i class="fas fa-power-off"></i>
                            {{ __('خروج') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </li>

                </ul>
            </div>
        </li>
    </ul>


</nav>
<div class="row col-12 content_panel">
    <div id="mySidenav" class="sidenav col m-aside-menu active">
        <ul class="sidebar-nav m-menu__nav " id="accordion">

            {{--<a class="a_profile_seaidbar" href="{{route('panel.profile')}}">--}}

            <ul class="row col-12 list-inline parent_profile_panel">
                <li class="list-inline-item">
                    <div class="parent_profile_panel_image">
                        <img src="<?php
                        if (isset(auth()->user()->image) || auth()->user()->image != null) {
                            echo auth()->user()->image;
                        } else {
                            echo '/images/default_avatar.png';
                        }
                        ?>" class="img-fluid" alt="">
                    </div>
                </li>
                <li class="list-inline-item">
                    <h3>{{auth()->user()->mobile}} </h3>
                    <h3>{{auth()->user()->name}} {{auth()->user()->lastName}} </h3>


                </li>

            </ul>
            {{--</a>--}}


            <li id="heading0">
                <a href="{{route('panel.dashboard')}}"
                   class="{{request()->route()->getName() === 'panel.dashboard' ? 'active' : '' }}">
                    <b></b>
                    <i class=" fa fa-tachometer-alt i_icon_panel"></i>
                    <span class="">داشبورد</span>
                </a>
            </li>


            <li id="heading1">
                <a href="{{route('panel.notifications')}}" class="{{request()->route()->getName() === 'panel.notifications' ? 'active' : '' }}" c>
                    <i class="fas fa-bell i_icon_panel"></i>
                    <span class="">پیام ها</span>
                </a>
            </li>


        </ul>


    </div>
    <div class="col main_content_panel active">
        @yield('content')
    </div>

</div>


