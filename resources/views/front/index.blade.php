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
    <div class="moving-text">
        <div class="container">
            <marquee>Important Message Ticker here......This text will scroll from right to left</marquee>
        </div>

    </div>
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
                <div class="book-appointment__bkimage" style="background-image: url({{asset('assets/front/images/getstarted.jpg')}});">

                </div>
                <div class="book-appointment__left-inner">
                    <span class="top-border"></span>
                    <span class="bottom-border"></span>
                    <img class="book-app__icon" src="{{asset('assets/front/images/getstarted4.jpg')}}" alt="">

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
                <h2>Why Study at Bay River College</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Assumenda atque blanditiis delectus iste
                    laudantium nisi, optio quam quo sit soluta! Cum est, incidunt nam natus officia officiis quod recusandae repellat?</p>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Assumenda atque blanditiis delectus iste
                    laudantium nisi, optio quam quo sit soluta! Cum est, incidunt nam natus officia officiis quod recusandae repellat?</p>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Assumenda atque blanditiis delectus iste
                    laudantium nisi, optio quam quo sit soluta! Cum est, incidunt nam natus officia officiis quod recusandae repellat?</p>
                <a href="#" class="button">Explore More</a>
            </div>
            <!--featured-block__col1-content-->
        </div>
        <div class="featured-block__col2" style="background-image: url({{asset('assets/front/images/why-bay river3.png')}});">
            <div class="featured-block__col2-content">
                <h2>Our Features</h2>
                <div class="featured-block__holder">
                    <div class="featured-block__item">
                        <div class="featured-block__item-inner">
                            <h3>Practicum Placement</h3>

                        </div>
                    </div>

                    <div class="featured-block__item">
                        <div class="featured-block__item-inner">
                            <h3>Professional Instrctors</h3>

                        </div>
                    </div>

                    <div class="featured-block__item">
                        <div class="featured-block__item-inner">
                            <h3>Career Counselling</h3>

                        </div>
                    </div>

                    <div class="featured-block__item">
                        <div class="featured-block__item-inner">
                            <h3>Academic Excellence</h3>

                        </div>
                    </div>

                    <div class="featured-block__item">
                        <div class="featured-block__item-inner">
                            <h3>Industry Based Course</h3>

                        </div>
                    </div>



                </div>
            </div>
            <!--featured-block__col2-content-->
        </div>

    </section>

    <section class="upcoming-events">
        <div class="container">
            <div class="upcoming-events-header flex-container">
                <h2>Upcoming Events</h2>
                <a href="" class="button">All Events</a>
            </div>
            <!--upcoming-events-header-->
            <div class="upcoming-events__lists flex-container">
                <div class="upcoming-events__item">
                    <div class="upcoming-events__item-inner">
                        <div class="upcoming-events-image" style="background-image: url({{asset('assets/front/images/slider5.jpg')}});">
                        </div>
                        <div class="upcoming-events__itemcontent">
                            <h3>New Training on Cisco Webnair</h3>
                            <div class="upcoming-events__calender flex-container">
                                <i class="fa-solid fa-calendar"></i>
                                <time>2022-03-12 3.30pm</time>
                            </div>
                            <a href="" class="button">Register</a>

                        </div>
                        <a href="" class="overlay-link">Register</a>
                    </div>
                </div>
                <div class="upcoming-events__item">
                    <div class="upcoming-events__item-inner">
                        <div class="upcoming-events-image" style="background-image: url({{asset('assets/front/images/slider5.jpg')}});">
                        </div>
                        <div class="upcoming-events__itemcontent">
                            <h3>New Training on Cisco Webnair</h3>
                            <div class="upcoming-events__calender flex-container">
                                <i class="fa-solid fa-calendar"></i>
                                <time>2022-03-12 3.30pm</time>
                            </div>
                            <a href="" class="button">Register</a>

                        </div>
                        <a href="" class="overlay-link">Register</a>
                    </div>
                </div>
                <div class="upcoming-events__item">
                    <div class="upcoming-events__item-inner">
                        <div class="upcoming-events-image" style="background-image: url({{asset('assets/front/images/slider5.jpg')}});">
                        </div>
                        <div class="upcoming-events__itemcontent">
                            <h3>New Training on Cisco Webnair</h3>
                            <div class="upcoming-events__calender flex-container">
                                <i class="fa-solid fa-calendar"></i>
                                <time>2022-03-12 3.30pm</time>
                            </div>
                            <a href="" class="button">Register</a>

                        </div>
                        <a href="" class="overlay-link">Register</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="news-event">
        <div class="news-event__col1">
            <div class="news-event__col1-inner">
                <div class="news-event-holder">
                    <h2>Our News </h2>
                    <div class="news-event__col1-holder">
                        <div class="news-event__featured flex-container">
                            <div class="news-event__featured-image">
                                <img src="{{asset('assets/front/images/slider6.jpg')}}">
                            </div>
                            <div class="news-event__featured-content">
                                <span class="news-event__featured-tag">FEATURED</span>
                                <h3><a href="">New Comptia Webnai starting on May 6th 2023</a> </h3>
                                <p> Lorem ipsum dolor sit amet, consectetur adipisicing elit. A eos in obcaecati. Amet doloremque eius esse exercitationem,
                                    illum ipsam iure labore, molestiae nam odit officia qui quo repudiandae sed vel.</p>
                                <a href="" class="button button--tertiary">Read More</a>
                            </div>
                        </div>

                        <div class="news-event__item-holder flex-container">
                            <div class="news-event__item">
                                <div class="news-event__item-inner">

                                    <div class="news-event__item-description">
                                        <h3> <a href="">News Title Goes Here....</a> </h3>
                                        <ul class="news-event__item-category">
                                            <li><a href=""> News category Goes here </a> </li>
                                        </ul>

                                        <a class="more-link" href="">Read More <i class="fa-solid fa-arrow-right-long"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="news-event__item">
                                <div class="news-event__item-inner">
                                    <div class="news-event__item-description">
                                        <h3> <a href="">News Title Goes Here....</a> </h3>
                                        <ul class="news-event__item-category">
                                            <li><a href=""> Health Care </a> </li>
                                        </ul>

                                        <a class="more-link" href="">Read More <i class="fa-solid fa-arrow-right-long"></i></a>
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>
                </div>
            </div>


        </div>
        <div class="news-event__adv">
            <a href="#" style="background-image: url({{asset('assets/front/images/news-adv.jpg')}});"></a>
        </div>




    </section>


</main>
@endsection