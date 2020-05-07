<nav class="navbar fixed-top navbar_panel">


    <ul class="nav justify-content-start parent_toggle_navbar  active">
        <li class="nav-item parent_logo_panel active">
            <a class="text_logo_panel" href="/">
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
            <a href="{{route('admin.notifications')}}" title="اعلان ها">
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
                            <img src="/images/default_avatar.png" class="img-fluid" alt="">
                        </div>
                    </li>
                    <li class="list-inline-item">
                        <h3>{{auth()->user()->mobile}} </h3>
                        <h6>ادمین سایت </h6>
                    </li>
                </ul>

                <ul class="list-group list_top_panel">


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

            <ul class="row col-12 list-inline parent_profile_panel">
                <li class="list-inline-item">
                    <div class="parent_profile_panel_image">
                        <img src="/images/default_avatar.png" class="img-fluid" alt="">
                    </div>
                </li>
                <li class="list-inline-item">
                    <h3>{{auth()->user()->mobile}} </h3>
                    <h6>ادمین سایت </h6>
                </li>

            </ul>
            <li id="heading44">
                <a href="{{route('admin.dashboard')}}"
                   class="{{request()->route()->getName() === 'admin.dashboard' ? 'active' : '' }}">
                    <b></b>
                    <i class=" fa fa-tachometer-alt i_icon_panel"></i>
                    <span class="">داشبورد</span>
                </a>
            </li>

            <li id="heading0">
                <a href="{{route('users.index')}}"
                   class="{{request()->route()->getName() === 'users.index' ? 'active' : '' }}">
                    <b></b>
                    <i class=" fas fa-users i_icon_panel"></i>
                    <span class="">کاربران</span>
                </a>
            </li>

            <li id="heading0">
                <a href="{{route('product.index')}}"
                   class="{{request()->route()->getName() === 'product.index' ? 'active' : '' }}">
                    <b></b>
                    <i class=" fab fa-product-hunt i_icon_panel"></i>
                    <span class="">محصولات</span>
                </a>
            </li>
            <li id="heading1">
                <a href="{{route('admin.notifications')}}"
                   class="{{request()->route()->getName() === 'admin.notifications' ? 'active' : '' }}">
                    <i class="fas fa-bell i_icon_panel"></i>
                    <span class="">اعلان  ها</span>
                </a>
            </li>
            <li id="heading1">
                <a href="{{route('category.index')}}"
                   class="{{request()->route()->getName() === 'category.index' ? 'active' : '' }}">
                    <i class="fas fa-list i_icon_panel"></i>
                    <span class="">دسته  ها</span>
                </a>
            </li>
            <li id="heading1">
                <a href="{{route('banner.index')}}"
                   class="{{request()->route()->getName() === 'banner.index' ? 'active' : '' }}">
                    <i class="fas fa-list i_icon_panel"></i>
                    <span class="">بنر  ها</span>
                </a>
            </li>


        </ul>


    </div>
    <div class="col main_content_panel active">
        @yield('content')
    </div>

</div>


