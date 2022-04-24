@extends('layouts.front.app')

@section('title', 'Homepage')

@section('content')
<main class="site-content">
    @if($sliders->isNotEmpty())
    <section class="banner-section">
        <div class="slider">
            @foreach ($sliders as $slider)
            <div class="slider-item" style="background-image: url({{asset($slider->image_path)}})">

                <div class="slider-content">
                    <div class="container">
                        <h1>{{$slider->title}} </h1>
                        {!! $slider->description !!}
                        @if($slider->button_text)
                        <a href="{{$slider->button_link}}" class="button button--white">{{$slider->button_text}}</a>
                        @endif
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </section>
    @endif
    @if($highlights->isNotEmpty())
    @foreach ($highlights as $highlight)
    <div class="moving-text">
        <div class="container">
            <marquee>{{$highlight->title}}</marquee>
        </div>
    </div>
    @endforeach
    @endif
    @if($courses)
    <section class="featured-program">
        <div class="container">
            <h2>Featured Courses</h2>
            <div class="featured-program__sliderholder">
                @foreach ($courses as $course)
                <div class="featured-program__item">
                    <div class="featured-program__item-inner" style="background-image:url({{asset($course->image_path)}});">
                        <div class="featured-program__item-content">
                            <h4>{{$course->title}}</h4>
                            <p>{{$course->caption}}</p>
                            <a href="{{route('course.detail',$course->slug)}}" class="button button--white">Learn More</a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    @endif
    <section class="book-appointment">
        <div class="book-appointment__left">
            <div class="book-appointment__left-holder">
                @if(!empty(config('settings.site_book_appointment_image_1')))
                <div class="book-appointment__bkimage" style="background-image: url({{asset(config('settings.site_book_appointment_image_1_image_path'))}});">
                </div>
                @endif
                <div class="book-appointment__left-inner">
                    <span class="top-border"></span>
                    <span class="bottom-border"></span>
                    @if(!empty(config('settings.site_book_appointment_image_2')))
                    <img class="book-app__icon" src="{{asset(config('settings.site_book_appointment_image_2_image_path'))}}" alt="">
                    @endif
                    <h2>"Try our robot to help in selecting best career for you" or "Find your dream career"</h2>
                    <p> Join us now to start admission process</p>
                    <a href="" class="button button--white">Get Started</a>
                </div>
            </div>
        </div>
        <div class="book-appointment__right">
            <div class="book-appointment__right-holder">
                <div class="book-appointment__right-inner">
                    <h2>Ready To Book An Appointment</h2>
                    <form id="contact" name="contact" method="mail.php">
                        <div class="form-item">
                            <!-- <label for="name">Name</label>-->
                            <input type="text" id="name" name="Name" placeholder="Your Name..">
                        </div>
                        <div class="form-item">
                            <!--<label for="email">Email</label>-->
                            <input type="email" id="email" name="Email" placeholder="Email">
                        </div>
                        <div class="form-item">
                            <!-- <label for="phone">Phone</label>-->
                            <input type="text" id="phone" name="Phone" placeholder="Phone">
                        </div>
                        <div class="form-item">
                            <!--  <label for="address">Address</label>-->
                            <input type="text" id="address" name="address" placeholder="Address">
                        </div>
                        <div class="form-item">
                            <!-- <label for="date">Date</label>-->
                            <input type="date" id="date" name="date" placeholder="Date">
                        </div>

                        <div class="form-button">
                            <input class="button" type="submit" value="Submit Now">
                        </div>
                    </form>

                </div>
            </div>
        </div>

    </section>
    @if($clients->isNotEmpty())
    <section class="logo-carousel" style="background-image: url({{asset('assets/front/images/networking3.jpg')}})">
        <div class="container">
            <h2 class="section-class"> Our Associates & Partner</h2>
            <ul class="partners-carousel partners-carousel__primary">
                @foreach ($clients as $client)
                <li>
                    <a href="{{$client->caption}}" class="partner-carousel__thumbnail" target="_blank"> <img src="{{asset($client->image_path)}}" alt="{{$client->title}}"></a>
                    <!-- <a href="" class="hvr-underline-from-left" target="_blank">Read More</a> -->
                </li>
                @endforeach
            </ul>
        </div>
    </section>
    @endif
    <section class="featured-block flex-container">

        <div class="featured-block__col1">
            <div class="featured-block__col1-content">
                <h2>{{config('settings.site_feature_block_title')}}</h2>
                <p>{!! config('settings.site_feature_block_description') !!}</p>
                <a href="{{config('settings.site_feature_button_link')}}" class="button">{{config('settings.site_feature_button_text')}}</a>
            </div>
            <!--featured-block__col1-content-->
        </div>
        @if(!empty(config('settings.site_feature_block_image')))
        <div class="featured-block__col2" style="background-image: url({{asset(config('settings.site_feature_block_image_image_path'))}})">
            <div class="featured-block__col2-content">
                <h2>{{config('settings.site_feature_block_title_2')}}</h2>
                <div class="featured-block__holder">
                    <div class="featured-block__item">
                        <div class="featured-block__item-inner">
                            <h3>{{config('settings.site_feature_item_1')}}</h3>

                        </div>
                    </div>

                    <div class="featured-block__item">
                        <div class="featured-block__item-inner">
                            <h3>{{config('settings.site_feature_item_2')}}</h3>

                        </div>
                    </div>

                    <div class="featured-block__item">
                        <div class="featured-block__item-inner">
                            <h3>{{config('settings.site_feature_item_3')}}</h3>

                        </div>
                    </div>

                    <div class="featured-block__item">
                        <div class="featured-block__item-inner">
                            <h3>{{config('settings.site_feature_item_4')}}</h3>

                        </div>
                    </div>

                    <div class="featured-block__item">
                        <div class="featured-block__item-inner">
                            <h3>{{config('settings.site_feature_item_5')}}</h3>

                        </div>
                    </div>



                </div>
            </div>
            <!--featured-block__col2-content-->
        </div>
        @endif
    </section>
    @if($featuredEvents->isNotEmpty())
    <section class="upcoming-events">
        <div class="container">
            <div class="upcoming-events-header flex-container">
                <h2>Upcoming Events</h2>
                <!-- <a href="" class="button">All Events</a> -->
            </div>
            <!--upcoming-events-header-->
            <div class="upcoming-events__lists flex-container">
                @foreach ($featuredEvents as $event)
                <div class="upcoming-events__item">
                    <div class="upcoming-events__item-inner">
                        <div class="upcoming-events-image" style="background-image: url({{asset($event->image_path)}})">
                        </div>
                        <div class="upcoming-events__itemcontent">
                            <h3>{{$event->title}}</h3>
                            <div class="upcoming-events__calender flex-container">
                                <i class="fa-solid fa-calendar"></i>
                                <time>{{ date('d M, Y', strtotime($event->event_date)) }}</time>
                            </div>
                            <a href="{{route('news.detail',$event->slug)}}" class="button">Details</a>

                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    @endif
    @if($featuredNews->isNotEmpty() || $mostFeaturedNews)
    <section class="news-event">
        <div class="news-event__col1">
            <div class="news-event__col1-inner">
                <div class="news-event-holder">
                    <h2>Our News </h2>
                    <div class="news-event__col1-holder">
                        <div class="news-event__featured flex-container">
                            <div class="news-event__featured-image">
                                <img src="{{asset($mostFeaturedNews->image_path)}}">
                            </div>
                            <div class="news-event__featured-content">
                                <span class="news-event__featured-tag">FEATURED</span>
                                <h3><a href="">{{$mostFeaturedNews->title}}</a> </h3>
                                <p> {{$mostFeaturedNews->caption}}</p>
                                <a href="" class="button button--tertiary">Read More</a>
                            </div>
                        </div>

                        <div class="news-event__item-holder flex-container">
                            @foreach ($featuredNews as $news)
                            <div class="news-event__item">
                                <div class="news-event__item-inner">

                                    <div class="news-event__item-description">
                                        <h3> <a href="{{route('news.detail',$news->slug)}}">{{$news->title}}</a> </h3>
                                        <!-- <ul class="news-event__item-category">
                                            <li>  </li>
                                        </ul> -->
                                        <p>{{$news->caption}}</p>
                                        <a class="more-link" href="{{route('news.detail',$news->slug)}}">Read More <i class="fa-solid fa-arrow-right-long"></i></a>
                                    </div>
                                </div>
                            </div>
                            @endforeach

                        </div>

                    </div>
                </div>
            </div>


        </div>
        <div class="news-event__adv">
            <a href="#" style="background-image: url({{asset('assets/front/images/news-adv.jpg')}});"></a>
        </div>
    </section>
    @endif

</main>
@endsection