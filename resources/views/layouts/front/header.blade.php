<header class="site-header">
    <div class="top-header">
        <div class="container flex-container">
            @if(!empty(config('settings.site_header_image')))
            <div class="site-header__logo">
                <a href="{{config('settings.site_header_logo_link')}}"><img src="{{asset(config('settings.site_header_image_image_path'))}}" alt="logo"></a>
            </div>
            @endif
            <!--logo-->

            <div class="top-header__rightcol">
                <div class="top-header__rightcol-primary">
                    <ul class="top-menu">
                        <li><a href="{{config('settings.site_header_title_1_link')}}">{{config('settings.site_header_title_1')}}</a> </li>
                        <li><a href="{{config('settings.site_header_title_2_link')}}">{{config('settings.site_header_title_2')}}</a> </li>
                        <li class="top-menu__button"><a href="{{config('settings.site_header_title_3_link')}}">{{config('settings.site_header_title_3')}}</a> </li>
                        <li><a href="{{config('settings.site_header_title_4_link')}}">{{config('settings.site_header_title_4')}}</a> </li>
                        <li><a href="{{config('settings.site_header_title_5_link')}}">{{config('settings.site_header_title_5')}}</a> </li>
                    </ul>
                    <form action="mail.php" method="get" class="searchbar top-header__search">
                        <input type="search" placeholder="Search here" name="search" class="searchbar-input" onkeyup="buttonUp();" required>
                        <input type="submit" class="searchbar-submit" value="GO"> <span class="searchbar-icon"><i class="fa fa-search" aria-hidden="true"></i></span>
                    </form>
                </div>
                <!--top-header__rightcol-primary-->
                <div class="navigation-section">
                    <section class="wrapper">
{{--                        @if(!empty(config('settings.site_header_image')))--}}
{{--                            <div class="site-header__logo">--}}
{{--                                <a href="{{config('settings.site_header_logo_link')}}"><img src="{{asset(config('settings.site_header_image_image_path'))}}" alt="logo"></a>--}}
{{--                            </div>--}}
{{--                             @endif--}}
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
                                    <li class="menu-item"><a href="index.html">Home</a></li>

                                    <li class="menu-item-has-children">
                                        <a href="#">Program <i class="ion ion-ios-arrow-down"></i></a>
                                        <div class="menu-subs menu-mega menu-column-4">
                                            <div class="list-item">
                                                <h4 class="title">Business</h4>
                                                <ul>
                                                    <li><a href="courses-detail.html">International Business Management Diploma</a></li>
                                                    <li><a href="courses-detail.html">Hospitality Business Management Diploma</a></li>
                                                    <li><a href="courses-detail.html">Other Courses on Business Diploma</a></li>

                                                </ul>
                                                <h4 class="title">Technology</h4>
                                                <ul>
                                                    <li><a href="#">Information Technology & Network Administrator Diploma</a></li>
                                                    <li><a href="#">Cyber Security & Cloud Computing Diploma</a></li>
                                                    <li><a href="#">Process Piping Drafting Diploma</a></li>

                                                </ul>
                                            </div>
                                            <div class="list-item">
                                                <h4 class="title">Health Care</h4>
                                                <ul>
                                                    <li><a href="#">Health Care Aide Diploma</a></li>
                                                    <li><a href="#">Pharmacy Assistant Diploma</a></li>
                                                    <li><a href="#"> Unit Clerk and Medical Office Administration Diploma</a></li>

                                                </ul>
                                                <h4 class="title">Social Work</h4>
                                                <ul>
                                                    <li><a href="#">Community Support Worker Diploma</a></li>
                                                    <li><a href="#">Education Assistant Diploma</a></li>

                                                </ul>
                                                <h4 class="title">English Language Course</h4>
                                                <ul>
                                                    <li><a href="#">Smart English (ESL)</a></li>
                                                    <li><a href="#">Professional Business English Writing</a></li>

                                                </ul>

                                            </div>
                                            <div class="list-item">
                                                <h4 class="title">DRPF Diploma Courses</h4>
                                                <ul>
                                                    <li><a href="#">Mental Health Care Nursing Practitioner</a></li>
                                                    <li><a href="#">Adult Geneotology care Nurse Practitoner</a></li>
                                                    <li><a href="#">Advance Clinical Management & Leadership</a></li>
                                                    <li><a href="#">Pedatric Nursing Care Practitioner</a></li>
                                                    <li><a href="#">Global Health Diplomacy</a></li>
                                                    <li><a href="#">health Policy in a Globaizing World</a></li>

                                                </ul>
                                            </div>
                                            <div class="list-item">
                                                <h4 class="title">Others</h4>
                                                <ul>
                                                    <li><a href="#">Infection Prevention & Control</a></li>
                                                    <li><a href="#">Continuing Education</a></li>
                                                    <li><a href="#">Comptia Official Courses</a></li>

                                                </ul>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="menu-item-has-children">
                                        <a href="#">Affiliated Programs <i class="ion ion-ios-arrow-down"></i></a>
                                        <div class="menu-subs menu-mega menu-column-4">
                                            <div class="list-item">
                                                <h4 class="title">Business</h4>
                                                <ul>
                                                    <li><a href="courses-detail.html">International Business Management Diploma</a></li>
                                                    <li><a href="courses-detail.html">Hospitality Business Management Diploma</a></li>
                                                    <li><a href="courses-detail.html">Other Courses on Business Diploma</a></li>

                                                </ul>
                                                <h4 class="title">Technology</h4>
                                                <ul>
                                                    <li><a href="courses-detail.html">Information Technology & Network Administrator Diploma</a></li>
                                                    <li><a href="#">Cyber Security & Cloud Computing Diploma</a></li>
                                                    <li><a href="#">Process Piping Drafting Diploma</a></li>

                                                </ul>
                                            </div>
                                            <div class="list-item">
                                                <h4 class="title">Health Care</h4>
                                                <ul>
                                                    <li><a href="courses-detail.html">Health Care Aide Diploma</a></li>
                                                    <li><a href="#">Pharmacy Assistant Diploma</a></li>
                                                    <li><a href="#"> Unit Clerk and Medical Office Administration Diploma</a></li>

                                                </ul>
                                                <h4 class="title">Social Work</h4>
                                                <ul>
                                                    <li><a href="courses-detail.html">Community Support Worker Diploma</a></li>
                                                    <li><a href="#">Education Assistant Diploma</a></li>

                                                </ul>
                                                <h4 class="title">English Language Course</h4>
                                                <ul>
                                                    <li><a href="#">Smart English (ESL)</a></li>
                                                    <li><a href="#">Professional Business English Writing</a></li>

                                                </ul>

                                            </div>
                                            <div class="list-item">
                                                <h4 class="title">DRPF Diploma Courses</h4>
                                                <ul>
                                                    <li><a href="courses-detail.html">Mental Health Care Nursing Practitioner</a></li>
                                                    <li><a href="#">Adult Geneotology care Nurse Practitoner</a></li>
                                                    <li><a href="#">Advance Clinical Management & Leadership</a></li>
                                                    <li><a href="#">Pedatric Nursing Care Practitioner</a></li>
                                                    <li><a href="#">Global Health Diplomacy</a></li>
                                                    <li><a href="#">health Policy in a Globaizing World</a></li>

                                                </ul>
                                            </div>
                                            <div class="list-item">
                                                <h4 class="title">Others</h4>
                                                <ul>
                                                    <li><a href="courses-detail.html">Infection Prevention & Control</a></li>
                                                    <li><a href="#">Continuing Education</a></li>
                                                    <li><a href="#">Comptia Official Courses</a></li>

                                                </ul>
                                            </div>
                                        </div>
                                    </li>
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
                                    <li class="menu-item-has-children">
                                        <a href="#">Continuous Studies <i class="ion ion-ios-arrow-down"></i></a>
                                        <div class="menu-subs menu-mega menu-column-4">
                                            <div class="list-item">
                                                <h4 class="title">Business</h4>
                                                <ul>
                                                    <li><a href="courses-detail.html">International Business Management Diploma</a></li>
                                                    <li><a href="#">Hospitality Business Management Diploma</a></li>
                                                    <li><a href="#">Other Courses on Business Diploma</a></li>

                                                </ul>
                                                <h4 class="title">Technology</h4>
                                                <ul>
                                                    <li><a href="#">Information Technology & Network Administrator Diploma</a></li>
                                                    <li><a href="#">Cyber Security & Cloud Computing Diploma</a></li>
                                                    <li><a href="#">Process Piping Drafting Diploma</a></li>

                                                </ul>
                                            </div>
                                            <div class="list-item">
                                                <h4 class="title">Health Care</h4>
                                                <ul>
                                                    <li><a href="#">Health Care Aide Diploma</a></li>
                                                    <li><a href="#">Pharmacy Assistant Diploma</a></li>
                                                    <li><a href="#"> Unit Clerk and Medical Office Administration Diploma</a></li>

                                                </ul>
                                                <h4 class="title">Social Work</h4>
                                                <ul>
                                                    <li><a href="#">Community Support Worker Diploma</a></li>
                                                    <li><a href="#">Education Assistant Diploma</a></li>

                                                </ul>
                                                <h4 class="title">English Language Course</h4>
                                                <ul>
                                                    <li><a href="#">Smart English (ESL)</a></li>
                                                    <li><a href="#">Professional Business English Writing</a></li>

                                                </ul>

                                            </div>
                                            <div class="list-item">
                                                <h4 class="title">DRPF Diploma Courses</h4>
                                                <ul>
                                                    <li><a href="#">Mental Health Care Nursing Practitioner</a></li>
                                                    <li><a href="#">Adult Geneotology care Nurse Practitoner</a></li>
                                                    <li><a href="#">Advance Clinical Management & Leadership</a></li>
                                                    <li><a href="#">Pedatric Nursing Care Practitioner</a></li>
                                                    <li><a href="#">Global Health Diplomacy</a></li>
                                                    <li><a href="#">health Policy in a Globaizing World</a></li>

                                                </ul>
                                            </div>
                                            <div class="list-item">
                                                <h4 class="title">Others</h4>
                                                <ul>
                                                    <li><a href="#">Infection Prevention & Control</a></li>
                                                    <li><a href="#">Continuing Education</a></li>
                                                    <li><a href="#">Comptia Official Courses</a></li>

                                                </ul>
                                            </div>
                                        </div>
                                    </li>
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
                                    <li class="menu-item"><a href="research.html">Research</a></li>
                                    <li class="menu-item"><a href="almuni.html">Alumni</a></li>
                                    <li class="menu-item"><a href="international-students.html">International Students</a></li>

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
                                    <li class="apply-now"><a href="apply-now.html">Apply Now</a></li>
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
