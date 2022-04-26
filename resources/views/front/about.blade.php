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
                    <li>President Message </li>
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

                </div>
                <!--media-content-->

                <div class="media-content reverse">
                    @if(!empty(config('settings.site_about_our_camps_image_2')))
                    <div class="media-content__thumbnail" style="background-image: url({{asset(config('settings.site_about_our_camps_image_2_image_path'))}});">

                    </div>
                    @endif
                    <div class="media-content__content">
                        <div class="media-content__content-inner">
                            <h2>{{config('settings.site_about_our_camps_title_2')}}</h2>
                            <p>{!! config('settings.site_about_our_camps_description_2') !!}</p>
                        </div>
                    </div>

                </div>
                <!--media-content-->

                <div class="media-content media-content--content-only">

                    <div class="media-content__content">
                        <div class="media-content__content-inner">
                            <h2>{{config('settings.site_about_our_camps_title_3')}}</h2>
                            <p>{!! config('settings.site_about_our_camps_description_3') !!}</p>
                        </div>
                    </div>

                </div>
                <!--media-content-->

            </div>
            <!--overview course-nav__detail-item-->
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

                </div>
                <!--media-content-->

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
                                {{config('settings.site_about_bay_title_7')}}
                            </h3>
                            <p>{!! config('settings.site_about_bay_description_7') !!}</p>

                        </div>
                    </div>

                </div>
                <!--media-content-->

            </div>
            <!--prerequesite course-nav__detail-item-->
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
            </div>
            <!--financial course-nav__detail-item-->

            <div class="course-nav__detail-item">
                <div class="faqs-section">

                    <div class="container">
                        <h2>Frequently Asked Questions</h2>

                        <div class="queanswer">
                            @foreach($faqs as $faq)
                            <div class="faqs-item">

                                <h3>{{$faq->question}} <i class="fas fa-caret-right"></i></h3>


                                <div class="answer">
                                    <p>
                                        {!! $faq->answer !!}
                                    </p>



                                </div>
                                <!--answer-->
                            </div>
                            @endforeach
                            <!--faqs-item-->
                        </div>
                        <!--queans-->

                    </div>
                    <!--container-->

                </div>
                <!--faqs-section-->
            </div>
            <!--industrial-acceptance course-nav__detail-item-->


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

            </div>
            <!--industrial-acceptance course-nav__detail-item-->


            <div class="course-nav__detail-item">
                <div class="container flex-container">
                    <div class="left-col">
                        @if($featuredNews->isNotEmpty())
                        <!--left-col__programinfo-->
                        <div class="pre-news__holder">
                            <h2> News & Events</h2>
                        </div>
                        <div class="prenews flex-container">
                            @foreach ($featuredNews as $news)

                            <div class="prenews-item">
                                <div class="prenews-item__inner">
                                    <a href="#" class="prenews-item__image" style="background-image: url({asset($news->image_path)}});">
                                    </a>
                                    <div class="prenews-item__content">
                                        <h3><a href="#">{{$news->title}}</a> </h3>
                                        <p> {{$news->caption}} </p>
                                    </div>
                                    <!--prenews-item__content-->
                                </div>
                            </div>
                            @endforeach

                        </div>
                        <!--prenews-->
                        @endif



                    </div>

                    <div class="right-col">
                        @include('layouts.front.quicklinks')
                        <!--table-of-contents-->

                        @if($testimonials->isNotEmpty())
                        <div class="right-col__testimonial">
                            <h2> What Our Students Say?</h2>
                            <div class="student-review">
                                @foreach ($testimonials as $testimonial)
                                <div class="student-review__item">
                                    {!! $testimonial->description !!}
                                    <h4 class="student-review__std"> {{$testimonial->title}} </h4>
                                </div>
                                @endforeach
                            </div>
                        </div>
                        @endif
                        <!--right-col__testimonial-->

                    </div>
                </div>

            </div>
            <!--industrial-acceptance course-nav__detail-item-->
        </div>
        <!--resp-tab-container-->

    </div>
    <!--tab-holder-->

</main>
@endsection