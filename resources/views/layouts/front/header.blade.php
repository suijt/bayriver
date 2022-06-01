<header class="site-header">
    <div class="top-header">
        <div class="container flex-container">
            @if(!empty(config('settings.site_header_image')))
            <div class="site-header__logo">
                <a href="{{route('home')}}"><img src="{{asset(config('settings.site_header_image_image_path'))}}" alt="logo"></a>
            </div>
            @endif
            <!--logo-->

            <div class="top-header__rightcol">
                <div class="top-header__rightcol-primary">
                    <ul class="top-menu">
                        <li><a href="{{route('about')}}">About Us</a> </li>
                        <li><a href="{{route('contact')}}">Contact Us</a> </li>
                        <li><a href="{{route('news.list')}}">News & Events</a> </li>
                        <li class="top-menu__button"><a href="{{config('settings.site_header_title_1_link')}}">{{config('settings.site_header_title_1')}}</a> </li>
                        <li><a href="{{config('settings.site_header_title_2_link')}}">{{config('settings.site_header_title_2')}}</a> </li>
                    </ul>
                    <!-- <form action="#" method="get" class="searchbar top-header__search">
                        <input type="search" placeholder="Search here" name="search" class="searchbar-input" onkeyup="buttonUp();" required>
                        <input type="submit" class="searchbar-submit" value="GO"> <span class="searchbar-icon"><i class="fa fa-search" aria-hidden="true"></i></span>
                    </form> -->
                </div>
                <!--top-header__rightcol-primary-->
                <div class="navigation-section">
                    <section class="wrapper">
                        {{-- @if(!empty(config('settings.site_header_image')))--}}
                        {{-- <div class="site-header__logo">--}}
                        {{-- <a href="{{config('settings.site_header_logo_link')}}"><img src="{{asset(config('settings.site_header_image_image_path'))}}" alt="logo"></a>--}}
                        {{-- </div>--}}
                        {{-- @endif--}}
                        <!-- Navbar Section -->
                        <div class="header-item-center">
                            <div class="overlay"></div>
                            <nav class="menu" id="menu">
                                <div class="menu-mobile-header">
                                    <button type="button" class="menu-mobile-arrow"><i class="ion ion-ios-arrow-back"></i></button>
                                    <div class="menu-mobile-title"></div>
                                    <button type="button" class="menu-mobile-close"><i class="ion ion-ios-close"></i></button>
                                </div>
                                <ul class="menu-section">
                                    <li class="menu-item"><a href="{{route('home')}}">Home</a></li>
                                    @php
                                    $program = 0;
                                    @endphp
                                    @foreach ($programMenus as $category)
                                    @php
                                    $program += $category->courses->count();
                                    @endphp
                                    @endforeach
                                    @if($program > 0)
                                    <li class="menu-item-has-children">
                                        <a href="#">Program <i class="ion ion-ios-arrow-down"></i></a>
                                        <div class="menu-subs menu-mega menu-column-4">
                                            @foreach ($programMenus as $category)
                                            @if($category->courses->count())
                                            <div class="list-item">
                                                <h4 class="title">{{$category->name}}</h4>
                                                <ul>
                                                    @foreach ($category->courses as $course)
                                                    <li><a href="{{route('course.detail',$course->slug)}}">{{$course->title}}</a></li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                            @endif
                                            @endforeach
                                        </div>
                                    </li>
                                    @endif
                                    @php
                                    $affiliated = 0;
                                    @endphp
                                    @foreach ($affiliatedMenus as $category)
                                    @php
                                    $affiliated += $category->courses->count();
                                    @endphp
                                    @endforeach
                                    @if($affiliated > 0)
                                    <li class="menu-item-has-children">
                                        <a href="#">Affiliated Programs <i class="ion ion-ios-arrow-down"></i></a>
                                        <div class="menu-subs menu-mega menu-column-4">
                                            @foreach ($affiliatedMenus as $category)
                                            @if($category->courses->count())
                                            <div class="list-item">
                                                <h4 class="title">{{$category->name}}</h4>
                                                <ul>
                                                    @foreach ($category->courses as $course)
                                                    <li><a href="{{route('course.detail',$course->slug)}}">{{$course->title}}</a></li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                            @endif
                                            @endforeach
                                        </div>
                                    </li>
                                    @endif
                                    <!--<li class="menu-item-has-children">
                                    <a href="#">Affiliated Programs <i class="ion ion-ios-arrow-down"></i></a>
                                    <div class="menu-subs menu-column-1">
                                        <ul>
                                            <li><a href="#">Register</a></li>
                                            <li><a href="#">Questions</a></li>
                                            <li><a href="#">Privacy Policy</a></li>
                                            <li><a href="#">Term of Cookies</a></li>
                                        </ul>
                                    </div>
                                </li>-->
                                    @php
                                    $continious = 0;
                                    @endphp
                                    @foreach ($continiousMenus as $category)
                                    @php
                                    $continious += $category->courses->count();
                                    @endphp
                                    @endforeach
                                    @if($continious > 0)
                                    <li class="menu-item-has-children">
                                        <a href="#">Continuous Studies <i class="ion ion-ios-arrow-down"></i></a>
                                        <div class="menu-subs menu-mega menu-column-4">
                                            @foreach ($continiousMenus as $category)
                                            @if($category->courses->count())
                                            <div class="list-item">
                                                <h4 class="title">{{$category->name}}</h4>
                                                <ul>
                                                    @foreach ($category->courses as $course)
                                                    <li><a href="{{route('course.detail',$course->slug)}}">{{$course->title}}</a></li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                            @endif
                                            @endforeach
                                        </div>
                                    </li>
                                    @endif
                                    <!-- <li class="menu-item-has-children">
                                     <a href="#">Continuing Studies <i class="ion ion-ios-arrow-down"></i></a>
                                     <div class="menu-subs menu-column-1">
                                         <ul>
                                             <li><a href="#">Register</a></li>
                                             <li><a href="#">Questions</a></li>
                                             <li><a href="#">Privacy Policy</a></li>
                                             <li><a href="#">Term of Cookies</a></li>
                                         </ul>
                                     </div>
                                 </li>-->
                                    <li class="menu-item"><a href="{{route('research')}}">Research</a></li>
                                    <li class="menu-item"><a href="{{route('alumni')}}">Alumni</a></li>
                                    <li class="menu-item"><a href="{{route('international.list')}}">International Students</a></li>

                                    <!--<li class="menu-item-has-children">
                                    <a href="international-students.html">International Students <i class="ion ion-ios-arrow-down"></i></a>
                                    <div class="menu-subs menu-column-1">
                                        <ul>
                                            <li><a href="international-students.html">International Students</a></li>
                                            <li><a href="international-detail-country-page.html">Philippines</a></li>
                                            <li><a href="international-detail-country-page.html">Pakisthan</a></li>
                                            <li><a href="international-detail-country-page.html">India</a></li>
                                            <li><a href="international-detail-country-page.html">Bangaladesh</a></li>
                                            <li><a href="international-detail-country-page.html">Bhutan</a></li>
                                        </ul>
                                    </div>
                                </li>-->
                                    <!-- <li class="apply-now"><a href="{{route('apply')}}">Apply Now</a></li> -->
                                    <li class="apply-now"><a href="{{route('apply')}}">Apply Now</a></li>
                                </ul>
                            </nav>
                        </div>

                        <div class="header-item-right">
                            <button type="button" class="menu-mobile-toggle">
                                <span></span>
                                <span></span>
                                <span></span>
                                <span></span>
                            </button>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>
    <!--top-header-->




</header>
<!--site-header-->