<header>
    <div class="header background_clothing">
        <div class="container">
            <div class="row">

                {{--<div class="color_brand_left">--}}
                {{--<div class="tringle1"></div>--}}
                {{--<div class="tringle2"></div>--}}
                {{--<div class="tringle3"></div>--}}
                {{--</div>--}}
                {{--<div class="color_brand_right">--}}
                {{--<div class="tringle1"></div>--}}
                {{--<div class="tringle2"></div>--}}
                {{--<div class="tringle3"></div>--}}
                {{--</div>--}}
                {{----}}

                <div class="col-xs-6 col-sm-6 col-md-6 col-lg-2 col">
                    {{--<a href="#" title="سبد خرید">--}}
                    {{--<button type="button" class="btn pull-right btn-lg shop_card">--}}
                    {{--<i class="fa fa-shopping-cart" aria-hidden="true">--}}
                    {{--<span class="bag_buy background_clothing">9</span>--}}
                    {{--</i>--}}
                    {{--سبد خرید--}}
                    {{--</button>--}}
                    {{--</a>--}}

                    <a href="{{route('cart')}}" title="سبد خرید" class="">

                        <button type="button" class="btn pull-right btn-lg shop_card">
                            <i class="fa fa-shopping-cart" aria-hidden="true">
                                        <span class="bag_buy">{{
                                     convert(Session::has('cart') ? Session::get('cart')->totalQty : '0')
                                        }}</span>
                            </i>
                            سبد خرید
                        </button>
                    </a>

                </div>
                <div class="col-xs-6 col-sm-6 col-md-6 col-lg-4 col">
                    <form action="/search" method="get">
                        <div class="input-group style_search_coli">
                            <input type="text" class="form-control form_search"
                                   name="title" placeholder=" محصول مورد نظرتان را جستجو کنید ..."
                                   aria-describedby="basic-addon2"
                                   value="{{request('title')}}"
                                   autocomplete="on"  >
                            <button class="btn btn-outline-secondary search_submit" type="submit">
                                <i class="fa fa-search"></i>
                            </button>
                        </div>
                    </form>
                </div>

                <div class="col-xs-6 col-sm-6 col-md-6 col-lg-3 col">
                    <ul class="list-inline sosial_top">
                        <li class="list-inline-item">
                            <a href="#" title="تلگرام">
                                <i class="fab fa-telegram-plane"></i>
                            </a>
                        </li>
                        <li class="list-inline-item">
                            <a href="#" title="توییتر">
                                <i class="fab fa-twitter"></i>
                            </a>
                        </li>
                        <li class="list-inline-item">
                            <a href="#" title="فیسبوک">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                        </li>
                        <li class="list-inline-item">
                            <a href="#" title="اینستاگرام">
                                <i class="fab fa-instagram"></i>
                            </a>
                        </li>

                    </ul>
                </div>


                <div class="col-xs-6 col-sm-6 col-md-6 col-lg-3 col">

                    @if (Route::has('login'))
                        <ul class="list-inline style_login_register">
                            @auth
                                <li class="nav-item dropdown login_style dropdown-auth">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                       data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        <i class="fa fa-user"></i>
                                        {{ Auth::user()->name }} {{ Auth::user()->lastName }}

                                        <span class="caret"></span>
                                    </a>

                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            {{ __('خروج') }}
                                        </a>

                                        @if(auth()->user()->hasRole('admin'))
                                            <a class="dropdown-item" href="{{ route('admin.dashboard') }}">
                                                {{ __('پنل کاربری') }}
                                            </a>
                                        @else

                                            <a class="dropdown-item" href="{{ route('panelUser') }}">
                                                {{ __('پنل کاربری') }}
                                            </a>
                                        @endif


                                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                              style="display: none;">
                                            @csrf
                                        </form>
                                    </div>
                                </li>
                            @else
                                <li class="list-inline-item">
                                    <i class="fas fa-user"></i>
                                </li>
                                <li class="list-inline-item login_style">
                                    <a class="login_style" href="{{route('login')}}" title="ورود">ورود</a>
                                </li>
                                <li class="list-inline-item">
                                    <i class="fas fa-user-plus"></i>

                                </li>
                                <li class="list-inline-item login_style">
                                    <a class="login_style" href="{{route('register')}}" title="ثبت نام">ثبت نام</a>
                                </li>



                            @endauth
                        </ul>
                    @endif


                </div>

            </div>
        </div>
    </div>


    <div class=" navbar navbar-light bg-light navbar-static-top navbar-expand-lg  navbar-expand-xl">
        <div class=" container">

            <button type="button" class="navbar-toggler navbar_toggler_clothing" data-toggle="collapse"
                    data-target=".navbar-collapse">
                <i class="fa fa-bars fa_bars" aria-hidden="true"></i>
            </button>
            <a class="navbar-brand" href="/" title="Yarsoo">
                <!-- <img src="http://p14.lublin.eu/wp-content/themes/niebieski1/images/object755493490.png" height="28" alt="Przedszkole nr 14 w Lublinie"> -->
                <span class="color_clothing">Yarsoo</span></a>
            <div class="navbar-collapse collapse navbar_clothing">
                <ul class="nav navbar-nav">

                    @foreach($menus as $menu)
                        <li class="dropdown menu-large nav-item">
                            <a href="{{route('category',  $menu->title)}}" class="dropdown-toggle nav-link"

                               title="{{$menu->title}}">
                            {{$menu->title}}
                            <!-- <i class="fa fa-angle-down" aria-hidden="true"></i> -->
                            </a>
                            <ul class="dropdown-menu megamenu container_dropdown ">
                                <div class="container">
                                    <div class="row">
                                        @if(count($menu->children) > 0)
                                            @foreach($menu->children as $children)
                                                <li class="col-md-3 col-xs-12 dropdown-item">
                                                    <ul>

                                                        <li class="dropdown-header">
                                                            <a href="{{route('category',  $children->title)}}"
                                                               class="dropdown-header" title="{{$children->title}}">
                                                                {{$children->title}}
                                                            </a>
                                                        </li>
                                                        @foreach($children->children as $child)

                                                            <li>
                                                                <a href="{{route('category',  $child->title)}}"
                                                                   title="{{$child->title}}">
                                                                    {{$child->title}}
                                                                </a>
                                                            </li>

                                                            <li class="divider"></li>
                                                        @endforeach
                                                    </ul>
                                                </li>
                                            @endforeach
                                        @endif
                                    </div>
                                </div>
                            </ul>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</header>
