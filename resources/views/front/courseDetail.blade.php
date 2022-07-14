@extends('layouts.front.app')
@section('title', $course->title)
@section('content')
<main class="site-content">
    <section class="inner-banner" style="background-image: url({{asset($course->banner_image_path)}})">
        <div class="inner-banner__content">
            <div class="container">
                <h1>{{$course->title}}</h1>
                <p>{{$course->caption}}</p>

                <div class="inner-banner__button-holder">
                    <a href="{{route('apply')}}" class="button button--white">Register Now</a>
                    <!-- <a href="#" class="button button--white">Book An Appointment</a> -->
                </div>

            </div>
        </div>

    </section>
    <div class="tab-holder">
        <section class="course-nav">
            <div class="container">
                <ul class="hor_1 resp-tabs-list course-nav__navigation">
                    <li>Overview </li>
                    <li>Admission </li>
                    <li>Financial </li>
                    <li>Industrial Acceptance </li>
                </ul>
            </div>
        </section>
        <div class="hor_1 resp-tabs-container">
            <div class="course-nav__detail-item overview-section">
                <div class="container flex-container">
                    <div class="left-col">
                        <div class="left-col__intro">
                            <h2 class="intro-courseintro">Overview </h2>
                            {!! $course->description !!}
                        </div>
                        <!--left-col__intro-->
                        <div class="left-col__program-info">
                            <ul class="program-info-list">
                                <li><strong>Course Duration</strong><span>{{$course->duration ?? 'N/A'}}</span> </li>
                                <li><strong>Practicum Duration</strong><span>{{$course->practicum_duration ?? 'N/A'}}</span> </li>
                                <li><strong>Study Options</strong><span>{{$course->study_option ?? 'N/A'}}</span> </li>
                                <li><strong>Workplacement </strong><span>{{$course->work_placement ?? 'N/A'}}</span> </li>
                                <li><strong>Credential </strong><span>{{$course->credential ?? 'N/A'}}</span> </li>
                                <li><strong>Industry Demand </strong><span>{{$course->industrial_demand ?? 'N/A'}}</span></li>
                                <li><strong>Expected Salary </strong><span>{{$course->expected_salary ?? 'N/A'}}</span> </li>
                                <li><strong>Professional Level </strong><span>{{$course->professional_level ?? 'N/A'}}</span> </li>
                                <li><strong>Program Type </strong><span>{{$course->program_type ?? 'N/A'}}</span> </li>
                            </ul>
                        </div>
                        <!--left-col__programinfo-->
                        <div class="left-col__learningoutcome" style="background-image: url({{asset('assets/front/images/slider5.jpg')}}">
                            {!! $course->learning_outcome !!}
                        </div>
                        <!--left-col__programinfo-->
                        <div class="left-col__others">
                            {!! $course->learning_features !!}
                        </div>
                        <!--left-col__programinfo-->
                    </div>

                    <div class="right-col">

                        <figure>
                            <img src="{{asset($course->secondary_image_path)}}" alt="">
                        </figure>
                        @if($clients->isNotEmpty())
                        <section class="logo-carousel">

                            <h2 class="section-class"> Our Associates & Partner</h2>
                            <ul class="partners-carousel partners-carousel__secondary">
                                @foreach ($clients as $client)

                                <li>
                                    <a href="{{$client->caption}}" class="partner-carousel__thumbnail" target="_blank"> <img src="{{asset($client->image_path)}}" alt="{{$client->title}}"></a>

                                </li>
                                @endforeach

                            </ul>

                        </section>
                        @endif
                        <!--logo-carousel-->
                        {{--<div class="book-appointment__right">
                            <div class="book-appointment__right-holder">
                                <div class="book-appointment__right-inner">
                                    <h2>Ready To Book An Appointment</h2>
                                    <form id="contact" name="contact" method="post" action="{{route('booking.submit')}}" data-parsley-validate="">
                        @csrf
                        @include('front.includes.booking',['type'=>'detail'])
                        </form>

                    </div>
                </div>
            </div>--}}
            <!--STD book-appointment__right-->

            <div class="book-appointment__right advisorform">
                <div class="book-appointment__right-holder">
                    <div class="book-appointment__right-inner">
                        <h2>{{config('settings.site_appointment_title')}}</h2>
                        <form id="contact" name="contact" method="post" action="{{route('contact.advisor')}}" data-parsley-validate="">
                            @csrf
                            @include('front.includes.advisor')
                        </form>
                    </div>
                </div>
            </div>
            <!--ADVISOR book-appointment__right-->
        </div>
    </div>
    @if($relatedCourses->isNotEmpty())
    <section class="related-course">
        <div class="container">
            <h2>Related Courses </h2>
            <div class="related-course__holder flex-container">
                @foreach ($relatedCourses as $relCourse)
                <div class="related-course__item">
                    <div class="related-course__item-inner">
                        <figure class="related-course__item-image" style="background-image: url({{asset($relCourse->image_path)}})">
                            <img src="{{asset($relCourse->image_path)}}" alt="{{$relCourse->title}}"> <!-- seo purpose only -->
                        </figure>
                        <div class="related-course__item-content">
                            <h3>{{$relCourse->title}}</h3>

                            <p> {{$relCourse->caption}} </p>
                            <a class="button button--white" href="{{route('course.detail',$relCourse->slug)}}">Read More</a>
                        </div>
                    </div>
                    <!--related-course__item-inner-->
                </div>

                @endforeach

            </div>
            <!--related-course__holder-->
        </div>

    </section>
    @endif
    </div>
    <!--overview course-nav__detail-item-->
    <div class="course-nav__detail-item">
        <div class="container flex-container">
            <div class="left-col">
                <div class="left-col__intro">
                    <h2 class="intro-courseintro">Prerequesite </h2>

                    {!! $course->prerequisite_desc !!}

                </div>
                <!--left-col__intro-->

                <div class="prereq-heading">
                    {!! $course->prerequisite_subdesc !!}

                </div>
                @if($featuredNews->isNotEmpty())
                <!--left-col__programinfo-->
                <div class="pre-news__holder">
                    <h2> News & Events</h2>
                </div>
                <div class="prenews flex-container">
                    @foreach ($featuredNews as $news)
                    <div class="prenews-item">
                        <div class="prenews-item__inner">
                            <a href="{{route('news.detail',$news->slug)}}" class="prenews-item__image" style="background-image: url({{asset($news->image_path)}});">
                            </a>
                            <div class="prenews-item__content">
                                <h3><a href="{{route('news.detail',$news->slug)}}">{{$news->title}}</a> </h3>
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


                <figure>
                    <img src="{{asset($course->icon_image_path)}}" alt="">
                </figure>
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
                <div class="right-col__testimonial-video">
                    <iframe width="560" height="315" src="https://www.youtube.com/embed/{{$course->video_link}}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>

                @if($clients->isNotEmpty())
                <section class="logo-carousel">

                    <h2 class="section-class"> Our Associates & Partner</h2>
                    <ul class="partners-carousel partners-carousel__secondary">
                        @foreach ($clients as $client)

                        <li>
                            <a href="{{$client->caption}}" class="partner-carousel__thumbnail" target="_blank"> <img src="{{asset($client->image_path)}}" alt="{{$client->title}}"></a>

                        </li>
                        @endforeach

                    </ul>

                </section>
                @endif
                <!--logo-carousel-->

            </div>
        </div>

        @if($relatedCourses->isNotEmpty())
        <section class="related-course">
            <div class="container">
                <h2>Related Courses </h2>
                <div class="related-course__holder flex-container">
                    @foreach ($relatedCourses as $relCourse)
                    <div class="related-course__item">
                        <div class="related-course__item-inner">
                            <figure class="related-course__item-image" style="background-image: url({{asset($relCourse->image_path)}})">
                                <img src="{{asset($relCourse->image_path)}}" alt="{{$relCourse->title}}"> <!-- seo purpose only -->
                            </figure>
                            <div class="related-course__item-content">
                                <h3>{{$relCourse->title}}</h3>

                                <p> {{$relCourse->caption}} </p>
                                <a class="button button--white" href="{{route('course.detail',$relCourse->slug)}}">Read More</a>
                            </div>
                        </div>
                        <!--related-course__item-inner-->
                    </div>

                    @endforeach

                </div>
                <!--related-course__holder-->
            </div>

        </section>
        @endif
    </div>
    <!--prerequesite course-nav__detail-item-->
    <div class="course-nav__detail-item">
        <div class="container flex-container">
            <div class="left-col">
                <div class="left-col__intro">
                    <h2 class="intro-courseintro">Financial </h2>

                    {!! $course->financial_desc !!}

                </div>
                <!--left-col__intro-->



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
                <div class="right-col__testimonial-video">
                    <iframe width="560" height="315" src="https://www.youtube.com/embed/{{$course->video_link}}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>

                @if($clients->isNotEmpty())
                <section class="logo-carousel">

                    <h2 class="section-class"> Our Associates & Partner</h2>
                    <ul class="partners-carousel partners-carousel__secondary">
                        @foreach ($clients as $client)

                        <li>
                            <a href="{{$client->caption}}" class="partner-carousel__thumbnail" target="_blank"> <img src="{{asset($client->image_path)}}" alt="{{$client->title}}"></a>

                        </li>
                        @endforeach

                    </ul>

                </section>
                @endif
                <!--logo-carousel-->

            </div>
        </div>
        @if($relatedCourses->isNotEmpty())
        <section class="related-course">
            <div class="container">
                <h2>Related Courses </h2>
                <div class="related-course__holder flex-container">
                    @foreach ($relatedCourses as $relCourse)
                    <div class="related-course__item">
                        <div class="related-course__item-inner">
                            <figure class="related-course__item-image" style="background-image: url({{asset($relCourse->image_path)}})">
                                <img src="{{asset($relCourse->image_path)}}" alt="{{$relCourse->title}}"> <!-- seo purpose only -->
                            </figure>
                            <div class="related-course__item-content">
                                <h3>{{$relCourse->title}}</h3>

                                <p> {{$relCourse->caption}} </p>
                                <a class="button button--white" href="{{route('course.detail',$relCourse->slug)}}">Read More</a>
                            </div>
                        </div>
                        <!--related-course__item-inner-->
                    </div>

                    @endforeach

                </div>
                <!--related-course__holder-->
            </div>

        </section>
        @endif
    </div>
    <!--financial course-nav__detail-item-->

    <div class="course-nav__detail-item">
        <div class="container flex-container">
            <div class="left-col">
                <div class="left-col__intro">
                    <h2 class="intro-courseintro">Industrial Acceptance </h2>

                    {!! $course->industrial_desc !!}

                </div>
                <!--left-col__intro-->



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
                <div class="right-col__testimonial-video">
                    <iframe width="560" height="315" src="https://www.youtube.com/embed/{{$course->video_link}}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>

                @if($clients->isNotEmpty())
                <section class="logo-carousel">

                    <h2 class="section-class"> Our Associates & Partner</h2>
                    <ul class="partners-carousel partners-carousel__secondary">
                        @foreach ($clients as $client)

                        <li>
                            <a href="{{$client->caption}}" class="partner-carousel__thumbnail" target="_blank"> <img src="{{asset($client->image_path)}}" alt="{{$client->title}}"></a>

                        </li>
                        @endforeach

                    </ul>

                </section>
                @endif
                <!--logo-carousel-->

            </div>
        </div>
        @if($relatedCourses->isNotEmpty())
        <section class="related-course">
            <div class="container">
                <h2>Related Courses </h2>
                <div class="related-course__holder flex-container">
                    @foreach ($relatedCourses as $relCourse)
                    <div class="related-course__item">
                        <div class="related-course__item-inner">
                            <figure class="related-course__item-image" style="background-image: url({{asset($relCourse->image_path)}})">
                                <img src="{{asset($relCourse->image_path)}}" alt="{{$relCourse->title}}"> <!-- seo purpose only -->
                            </figure>
                            <div class="related-course__item-content">
                                <h3>{{$relCourse->title}}</h3>

                                <p> {{$relCourse->caption}} </p>
                                <a class="button button--white" href="{{route('course.detail',$relCourse->slug)}}">Read More</a>
                            </div>
                        </div>
                        <!--related-course__item-inner-->
                    </div>

                    @endforeach

                </div>
                <!--related-course__holder-->
            </div>

        </section>
        @endif
    </div>
    <!--industrial-acceptance course-nav__detail-item-->
    </div>
    <!--resp-tabs-container-->
    </div>
    <!--tab-holder-->
</main>
@endsection
@section('scripts')
<script src="https://parsleyjs.org/dist/parsley.min.js"></script>

<script type="text/javascript">
    $('#contact').parsley();
</script>
@endsection