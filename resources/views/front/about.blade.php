@extends('layouts.front.app')

@section('title', 'About Us')

@section('content')
<main class="site-content">
     @if(!empty(config('settings.site_about_image')))
    <section class="inner-banner" style="background-image: url({{asset(config('settings.site_about_image_image_path'))}})">
        <div class="inner-banner__content">
            <div class="container">
                <h1>{{config('settings.site_about_title')}}</h1>
                <p>{{config('settings.site_about_description')}}</p>


            </div>
        </div>

    </section>
    @endif
    <div class="tab-holder">
        <section class="course-nav">
            <div class="container">
                <ul class="hor_1 resp-tabs-list course-nav__navigation">
                    <li>Our Campus </li>
                    <li>Why Bay River College</li>
                    <li>Present Message </li>
                    <li>FAQs </li>
                    <li>Careers </li>

                </ul>
            </div>
        </section>
        <div class="hor_1 resp-tabs-container">
            <div class="course-nav__detail-item overview-section">
                <div class="media-content">
                    @if(!empty(config('settings.site_about_our_camps_image')))
                    <div class="media-content__thumbnail" style="background-image: url({{asset(config('settings.site_about_our_camps_image_image_path'))}});">
                    </div>
                    @endif
                    <div class="media-content__content">
                        <div class="media-content__content-inner">
                            <h2>{{config('settings.site_about_our_camps_title')}}</h2>
                            {!! config('settings.site_about_our_camps_description') !!}

                        </div>
                    </div>

                </div><!--media-content-->

                <div class="media-content reverse">
                    @if(!empty(config('settings.site_about_our_camps_image_2')))
                    <div class="media-content__thumbnail" style="background-image: url({{asset(config('settings.site_about_our_camps_image_2_image_path'))}});">

                    </div>
                    @endif
                    <div class="media-content__content">
                        <div class="media-content__content-inner">
                            <h2>{{config('settings.site_about_our_camps_title_2')}}</h2>
                        <p>{!! config('settings.site_about_our_camps_description_2')  !!}</p>
                        </div>
                    </div>

                </div><!--media-content-->

                <div class="media-content media-content--content-only">

                    <div class="media-content__content">
                        <div class="media-content__content-inner">
                            <h2>{{config('settings.site_about_our_camps_title_3')}}</h2>
                            <p>{!! config('settings.site_about_our_camps_description_3')  !!}</p>
                        </div>
                    </div>

                </div><!--media-content-->

            </div><!--overview course-nav__detail-item-->
            <div class="course-nav__detail-item">
                @if(!empty(config('settings.site_about_bay_image')))
                <div class="media-content">
                    <div class="media-content__thumbnail" style="background-image: url({{asset(config('settings.site_about_bay_image_image_path'))}});">
                    </div>
                    @endif
                    <div class="media-content__content">
                        <div class="media-content__content-inner">
                            <h2>{{config('settings.site_about_bay_title')}}</h2>
                        <p>{!! config('settings.site_about_bay_description') !!}</p>
                        </div>
                    </div>

                </div>
                   <!--media-content-->


                <div class="media-content reverse">
                    @if(!empty(config('settings.site_about_bay_image_2')))
                    <div class="media-content__thumbnail" style="background-image: url({{asset(config('settings.site_about_bay_image_2_image_path'))}});">

                    </div>
                    @endif
                    <div class="media-content__content">
                        <div class="media-content__content-inner">
                            <h2>{{config('settings.site_about_bay_title_2')}}</h2>
                           <p>{!! config('settings.site_about_bay_description') !!}</p>

                        </div>
                    </div>

                </div>
                        <!--media-content-->

                <div class="media-content">
                    @if(!empty(config('settings.site_about_bay_image_3')))
                    <div class="media-content__thumbnail" style="background-image: url({{asset(config('settings.site_about_bay_image_3_image_path'))}});">
                    </div>
                    @endif
                    <div class="media-content__content">
                        <div class="media-content__content-inner">
                            <h3>{{config('settings.site_about_bay_title_3')}}</h3>
                            <p>{!! config('settings.site_about_bay_description_3') !!}</p>

                        </div>
                    </div>

                </div>

                <div class="media-content reverse">
                    @if(!empty(config('settings.site_about_bay_image_4')))
                    <div class="media-content__thumbnail" style="background-image: url({{asset(config('settings.site_about_bay_image_4_image_path'))}});">
                    </div>
                    @endif
                    <div class="media-content__content">
                        <div class="media-content__content-inner">

                            <h3> {{config('settings.site_about_bay_title_4')}}</h3>

                            <p>{!! config('settings.site_about_bay_description_4') !!}</p>

                        </div>
                    </div>

                </div><!--media-content-->

                <div class="media-content bg-light media-content--content-only">
                    <div class="media-content__content">
                        <div class="media-content__content-inner">
                            <h3>{{config('settings.site_about_bay_title_5')}}</h3>
                            <p>{!! config('settings.site_about_bay_description_5') !!}</p>
                            <h3>{{config('settings.site_about_bay_title_6')}}</h3>
                            <p>
                                {!! config('settings.site_about_bay_description_6') !!}
                            </p>
                            <h3>
                                {{config('settings.site_about_bay_title_7')}}</h3>
                           <p>{!! config('settings.site_about_bay_description_7') !!}</p>

                        </div>
                    </div>

                </div><!--media-content-->

            </div><!--prerequesite course-nav__detail-item-->
            <div class="course-nav__detail-item">
                <div class="two-columns">
                    <div class="container clearfix">
                        @if(!empty(config('settings.site_about_present_image')))
                        <div class="two-columns__thumbnail">
                            <img src="{{asset(config('settings.site_about_present_image_image_path'))}}" alt="President Message">
                        </div>
                        @endif
                        <div class="two-columns__content">
                            <h2>{{config('settings.site_about_present_title')}}</h2>
                            <h5>Mr. Arshad Mahmood</h5>
                            <p>
                                {!! config('settings.site_about_present_description') !!}
                            </p>


                        </div>
                    </div>
                </div>
            </div><!--financial course-nav__detail-item-->

            <div class="course-nav__detail-item">
                <div class="faqs-section">

                    <div class="container">
                        <h2>Frequently Asked Questions</h2>

                        <div class="queanswer">

                            <div class="faqs-item">

                                <h3>What programs are available in Bay River College <i class="fas fa-caret-right"></i></h3>


                                <div class="answer">
                                    <p>We offer a wide variety of programs at Bay River College, designed to fill needed skilled positions within today’s job market.

                                        We offer the following diploma programs:
                                    </p>
                                    <ul>
                                        <li> Applied Environment Technology</li>
                                        <li>   Community Support Worker</li>
                                        <li>     Cyber Security and Cloud Computing</li>
                                        <li>        Education Assistant</li>
                                        <li>      Hospitality Business  Management</li>
                                        <li>     Information Technology and Network Administrator</li>
                                    </ul>


                                </div><!--answer-->
                            </div>

                            <div class="faqs-item">

                                <h3>Where is the campus located? <i class="fas fa-caret-right"></i></h3>


                                <div class="answer">
                                    <p>
                                        Bay River College is located at 3516, 26 Street NE. Calgary Alberta, in the Horizon Business Park.
                                        We are found just north of the Sheraton Cavalier Calgary Hotel, and near Sunridge Mall and the Peter Lougheed hospital. </p>
                                </div><!--answer-->
                            </div>

                            <div class="faqs-item">

                                <h3>Is parking available for students  <i class="fas fa-caret-right"></i></h3>


                                <div class="answer">
                                    <p>
                                        There are a limited number of parking stalls available for students on the campus grounds. Parking is given free on a first-come-first-served basis. There are also street level parking spaces and overflow parking available at the Sheraton Cavalier Calgary Hotel and the Ramada Plaza and Conference Centre, located across the street from our campus.</p>
                                </div><!--answer-->
                            </div><!--faqs-item-->

                            <div class="faqs-item">

                                <h3>Is the public transportation available near or at the campus?   <i class="fas fa-caret-right"></i></h3>


                                <div class="answer">
                                    <p>
                                        Calgary Transit is accessible from within a two block walking distance. Check out www.calgarytransit.com to plan your trip to and from the campus!</p>
                                </div><!--answer-->
                            </div><!--faqs-item-->

                            <div class="faqs-item">

                                <h3>Is there access for the physical disabled?   <i class="fas fa-caret-right"></i></h3>


                                <div class="answer">
                                    <p>
                                        Due to the structure of our Calgary campus, access for those with mobility impairments may find it difficult to navigate around our our facilities, especially the upper levels. Please speak to one of our Admission Counselors to find out more and to discuss any accommodations we may be able to make.</p>
                                </div><!--answer-->
                            </div><!--faqs-item-->
                            <div class="faqs-item">

                                <h3>What class time are available?   <i class="fas fa-caret-right"></i></h3>


                                <div class="answer">
                                    <p>   Bay River College offers a variety of class times structured to suit almost any busy schedule. The following are typical class times that may be available for your chosen program.

                                    </p>
                                    <ul>
                                        <li>Morning Classes: (Monday to Friday 9:00 AM to 1:00 PM) </li>
                                        <li>  Afternoon Classes: (Monday to Friday 1:00 PM to 5:00 PM) </li>
                                        <li>   Evening Classes: (Monday to Friday 5:00 PM to 9:00 PM) </li>
                                        <li>     Weekend Classes (limited courses only) </li>
                                        <li>     Saturday and Sunday from 10:00 AM to 4:00 PM </li>
                                    </ul>
                                </div><!--answer-->
                            </div><!--faqs-item-->
                        </div><!--queans-->

                    </div><!--container-->

                </div><!--faqs-section-->
            </div><!--industrial-acceptance course-nav__detail-item-->


            <div class="course-nav__detail-item bg-light">

                <div class="career-section">
                    <div class="container">
                        <h2>{{config('settings.site_about_career_title')}}</h2>
                        <p>{!! config('settings.site_about_career_description') !!}</p>
                        <div class="career-items">
                            <div class="career-item">
                                <h3>{{config('settings.site_about_career_title_1')}}</h3>
                                <p>{!! config('settings.site_about_career_description_1') !!}</p>
                            </div>

                            <div class="career-item">
                                <h3>{{config('settings.site_about_career_title_2')}}</h3>
                                <p>{!! config('settings.site_about_career_description_2') !!}</p>
                            </div>

                            <div class="career-item">
                                <h3>{{config('settings.site_about_career_title_3')}}</h3>
                                <p>{!! config('settings.site_about_career_description_4') !!}</p>
                            </div>

                            <div class="career-item">
                                <h3>{{config('settings.site_about_career_title_4')}}</h3>
                                <p>{!! config('settings.site_about_career_description_4') !!}</p>
                            </div>

                        </div>
                    </div>

                </div>

            </div><!--industrial-acceptance course-nav__detail-item-->


            <div class="course-nav__detail-item">
                <div class="container flex-container">
                    <div class="left-col">
                        <div class="pre-news__holder">
                            <h2> News & Events</h2>
                        </div>
                        <div class="prenews flex-container">

                            <div class="prenews-item">
                                <div class="prenews-item__inner">
                                    <a href="#" class="prenews-item__image" style="background-image: url('images/intl3.jpg');">
                                    </a>
                                    <div class="prenews-item__content">
                                        <h3><a href="#">News 1 dsajkdsajkfdj asdkj</a> </h3>
                                        <p> ajksj adjkajkadhk adjk adjhsdajkasd adsjkdajkad adskjadsjkdajkasdkjasdjksdajk </p>
                                    </div><!--prenews-item__content-->
                                </div>
                            </div><!--prenews-item__inner-->
                            <div class="prenews-item">
                                <div class="prenews-item__inner">
                                    <a href="#" class="prenews-item__image" style="background-image: url('images/slider5.jpg');">
                                    </a>
                                    <div class="prenews-item__content">
                                        <h3><a href="#">News 2 dsajkdsajkfdj asdkj</a> </h3>
                                        <p> ajksj adjkajkadhk adjk adjhsdajkasd adsjkdajkad adskjadsjkdajkasdkjasdjksdajk </p>
                                    </div><!--prenews-item__content-->
                                </div>
                            </div><!--prenews-item__inner-->
                            <div class="prenews-item">
                                <div class="prenews-item__inner">
                                    <a href="#" class="prenews-item__image" style="background-image: url('images/slider5.jpg');">
                                    </a>
                                    <div class="prenews-item__content">
                                        <h3><a href="#">News 3 dsajkdsajkfdj asdkj</a> </h3>
                                        <p> ajksj adjkajkadhk adjk adjhsdajkasd adsjkdajkad adskjadsjkdajkasdkjasdjksdajk </p>
                                    </div><!--prenews-item__content-->
                                </div>
                            </div><!--prenews-item__inner-->
                            <div class="prenews-item">
                                <div class="prenews-item__inner">
                                    <a href="#" class="prenews-item__image" style="background-image: url('images/slider5.jpg');">
                                    </a>
                                    <div class="prenews-item__content">
                                        <h3><a href="#">News 4 dsajkdsajkfdj asdkj</a> </h3>
                                        <p> ajksj adjkajkadhk adjk adjhsdajkasd adsjkdajkad adskjadsjkdajkasdkjasdjksdajk </p>
                                    </div><!--prenews-item__content-->
                                </div>
                            </div><!--prenews-item__inner-->

                        </div><!--prenews-->



                    </div>

                    <div class="right-col">
                        <div class="table-of-contents">
                            <h2>Quick Links</h2>
                            <ul>
                                <li> <a href="#">Terms & Conditions</a> </li>
                                <li><a href="#">Desclimair</a> </li>
                                <li><a href="#">Privacy Statement</a> </li>
                                <li><a href="#">Trademarks</a> </li>
                                <li><a href="#">Cookies</a> </li>
                            </ul>
                        </div><!--table-of-contents-->

                        <div class="right-col__testimonial">
                            <h2> What Are Students Say?</h2>
                            <div class="student-review">
                                <div class="student-review__item">
                                    <p> Best College! professional instructors. Practicum included. I got the job. Iam happy</p>
                                    <h4 class="student-review__std"> Benjamin  Johnson, </h4>
                                </div><!--student-review__item-->

                                <div class="student-review__item">
                                    <p> Best College! professional instructors. Practicum included. I got the job. Iam happy</p>
                                    <h4 class="student-review__std"> Benjamin  Johnson, </h4>
                                </div><!--student-review__item-->

                                <div class="student-review__item">
                                    <p> Best College! professional instructors. Practicum included. I got the job. Iam happy</p>
                                    <h4 class="student-review__std"> Benjamin  Johnson, </h4>
                                </div><!--student-review__item-->

                            </div>


                        </div><!--right-col__testimonial-->
                        <div class="right-col__testimonial-video">
                            <iframe width="560" height="315" src="https://www.youtube.com/embed/4NvmzjCb9fA" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                        </div>



                    </div>
                </div>

            </div><!--industrial-acceptance course-nav__detail-item-->
        </div><!--resp-tab-container-->

    </div><!--tab-holder-->

</main>
@endsection
