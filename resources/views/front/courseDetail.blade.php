@extends('layouts.front.app')

@section('title', 'Homepage')

@section('content')
<main class="site-content">
    <section class="inner-banner" style="background-image: url({{asset($course->banner_image_path)}});">
        <div class="inner-banner__content">
            <div class="container">
                <h1>{{$course->title}}</h1>
                <p>{{$course->caption}}</p>

                <div class="inner-banner__button-holder">
                    <a href="#" class="button button--white">Register Now</a>
                    <a href="#" class="button button--white">Book An Appointment</a>
                </div>

            </div>
        </div>

    </section>
    <div class="tab-holder">
        <section class="course-nav">
            <div class="container">
                <ul class="hor_1 resp-tabs-list course-nav__navigation">
                    <li>Overview </li>
                    <li>Prerequesite </li>
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
                        <div class="left-col__learningoutcome" style="background-image: url({{asset('assets/front/images/slider5.jpg')}};">
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
                        <section class="logo-carousel">

                            <h2 class="section-class"> Our Associates & Partner</h2>
                            <ul class="partners-carousel partners-carousel__secondary">
                                <li>
                                    <a href="#" class="partner-carousel__thumbnail" target="_blank"> <img src="{{asset('assets/front/images/comptia.png')}}" alt="Campsite Calgary"></a>

                                </li>

                                <li>
                                    <a href="#" class="partner-carousel__thumbnail" target="_blank"> <img src="{{asset('assets/front/images/ipa-canada.jpg')}}" alt="Campsite Calgary"></a>

                                </li>
                                <li>
                                    <a href="#" class="partner-carousel__thumbnail" target="_blank"> <img src="{{asset('assets/front/images/comptia.png')}}" alt="Campsite Calgary"></a>

                                </li>
                                <li>
                                    <a href="#" class="partner-carousel__thumbnail" target="_blank"> <img src="{{asset('assets/front/images/ipa-canada.jpg')}}" alt="Campsite Calgary"></a>

                                </li>
                                <li>
                                    <a href="#" class="partner-carousel__thumbnail" target="_blank"> <img src="{{asset('assets/front/images/comptia.png')}}" alt="Campsite Calgary"></a>

                                </li>
                                <li>
                                    <a href="#" class="partner-carousel__thumbnail" target="_blank"> <img src="{{asset('assets/front/images/ipa-canada.jpg')}}" alt="Campsite Calgary"></a>

                                </li>


                            </ul>

                        </section>
                        <!--logo-carousel-->
                        <div class="book-appointment__right">
                            <div class="book-appointment__right-holder">
                                <div class="book-appointment__right-inner">
                                    <h2>Ready To Book An Appointment</h2>
                                    <form id="contact" name="contact" method="mail.php">
                                        <div class="form-item">
                                            <!--  <label for="name">Name</label>-->
                                            <input type="text" id="name" name="Name" placeholder="Your name..">
                                        </div>
                                        <div class="form-item">
                                            <!-- <label for="email">Email</label>-->
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
                                            <input class="button button--white" type="submit" value="Submit Now">
                                        </div>
                                    </form>

                                </div>
                            </div>
                        </div>
                        <!--STD book-appointment__right-->

                        <div class="book-appointment__right advisorform">
                            <div class="book-appointment__right-holder">
                                <div class="book-appointment__right-inner">
                                    <h2>To Know More <br>Contact To Advisor</h2>
                                    <form id="contact2" name="contact" method="mail.php">
                                        <div class="form-item">
                                            <!--  <label for="name">Name</label>-->
                                            <input type="text" id="name2" name="Name" placeholder="Your name..">
                                        </div>
                                        <div class="form_two-col">
                                            <div class="form-item">
                                                <!-- <label for="email">Email</label>-->
                                                <input type="email" id="email2" name="Email" placeholder="Email">
                                            </div>
                                            <div class="form-item">
                                                <!-- <label for="phone">Phone</label>-->
                                                <input type="text" id="phone2" name="Phone" placeholder="Phone">
                                            </div>
                                        </div>
                                        <!--form_two-col-->
                                        <div class="form_two-col">
                                            <div class="form-item">
                                                <!-- <label for="phone">Phone</label>-->
                                                <select>
                                                    <option value="Program Name">Program Name </option>
                                                    <option value="Course 2">Couser 2 </option>
                                                    <option value="Course 3">Couser 3 </option>
                                                    <option value="Course 4">Couser 4 </option>
                                                </select>
                                            </div>

                                            <div class="form-item">
                                                <!-- <label for="phone">Phone</label>-->
                                                <select>
                                                    <option value="Program Name">Interested In </option>
                                                    <option value="Course 2">Class Room Leaning </option>
                                                    <option value="Course 3">Online Learning </option>

                                                </select>

                                            </div>
                                        </div>
                                        <div class="form-item">
                                            <!-- <label for="phone">Phone</label>-->
                                            <textarea placeholder="Describe yourself here..."></textarea>


                                        </div>
                                        <div class="form-button">
                                            <input class="button button--white" type="submit" value="Submit Now">
                                        </div>
                                    </form>

                                </div>
                            </div>
                        </div>
                        <!--ADVISOR book-appointment__right-->
                    </div>
                </div>

                <section class="related-course">
                    <div class="container">
                        <h2>Related Courses </h2>
                        <div class="related-course__holder flex-container">
                            <div class="related-course__item">
                                <div class="related-course__item-inner">
                                    <figure class="related-course__item-image" style="background-image: url({{asset('asset/front/images/slider4.jpg')}});">
                                        <img src="{{asset('asset/front/images/slider4.jpg')}}" alt="Images"> <!-- seo purpose only -->
                                    </figure>
                                    <div class="related-course__item-content">
                                        <h3>Course Title Goes here</h3>

                                        <p> hasdjkasd asdjkasdjk jkasdjkasdhj asdjkjkasd asdjkasdh asdasdjkasdjk asdjkasdjk </p>
                                        <a class="button button--white" href="#">Read More</a>
                                    </div>
                                </div>
                                <!--related-course__item-inner-->
                            </div>
                            <!--related-course__item-->
                            <div class="related-course__item">
                                <div class="related-course__item-inner">
                                    <figure class="related-course__item-image" style="background-image: url({{asset('asset/front/images/slider6.jpg')}});">
                                        <img src="{{asset('asset/front/images/slider6.jpg')}}" alt="Images"> <!-- seo purpose only -->
                                    </figure>
                                    <div class="related-course__item-content">
                                        <h3>Course Title Goes here</h3>

                                        <p> hasdjkasd asdjkasdjk jkasdjkasdhj asdjkjkasd asdjkasdh asdasdjkasdjk asdjkasdjk </p>
                                        <a class="button button--white" href="#">Read More</a>
                                    </div>
                                </div>
                                <!--related-course__item-inner-->
                            </div>
                            <!--related-course__item-->
                            <div class="related-course__item">
                                <div class="related-course__item-inner">
                                    <figure class="related-course__item-image" style="background-image: url({{asset('asset/front/images/slider5.jpg')}});">
                                        <img src="{{asset('asset/front/images/slider5.jpg')}}" alt="Images"> <!-- seo purpose only -->
                                    </figure>
                                    <div class="related-course__item-content">
                                        <h3>Course Title Goes here</h3>

                                        <p> hasdjkasd asdjkasdjk jkasdjkasdhj asdjkjkasd asdjkasdh asdasdjkasdjk asdjkasdjk </p>
                                        <a class="button button--white" href="#">Read More</a>
                                    </div>
                                </div>
                                <!--related-course__item-inner-->
                            </div>
                            <!--related-course__item-->


                        </div>
                        <!--related-course__holder-->
                    </div>

                </section>

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
                        <!--left-col__programinfo-->
                        <div class="pre-news__holder">
                            <h2> News & Events</h2>
                        </div>
                        <div class="prenews flex-container">

                            <div class="prenews-item">
                                <div class="prenews-item__inner">
                                    <a href="#" class="prenews-item__image" style="background-image: url({asset('assests/front/images/slider5.jpg')}});">
                                    </a>
                                    <div class="prenews-item__content">
                                        <h3><a href="#">News 1 dsajkdsajkfdj asdkj</a> </h3>
                                        <p> ajksj adjkajkadhk adjk adjhsdajkasd adsjkdajkad adskjadsjkdajkasdkjasdjksdajk </p>
                                    </div>
                                    <!--prenews-item__content-->
                                </div>
                            </div>
                            <!--prenews-item__inner-->
                            <div class="prenews-item">
                                <div class="prenews-item__inner">
                                    <a href="#" class="prenews-item__image" style="background-image: url({{asset('assests/front/images/slider5.jpg')}});">
                                    </a>
                                    <div class="prenews-item__content">
                                        <h3><a href="#">News 2 dsajkdsajkfdj asdkj</a> </h3>
                                        <p> ajksj adjkajkadhk adjk adjhsdajkasd adsjkdajkad adskjadsjkdajkasdkjasdjksdajk </p>
                                    </div>
                                    <!--prenews-item__content-->
                                </div>
                            </div>
                            <!--prenews-item__inner-->
                            <div class="prenews-item">
                                <div class="prenews-item__inner">
                                    <a href="#" class="prenews-item__image" style="background-image: url({{asset('assests/front/images/slider5.jpg')}});">
                                    </a>
                                    <div class="prenews-item__content">
                                        <h3><a href="#">News 3 dsajkdsajkfdj asdkj</a> </h3>
                                        <p> ajksj adjkajkadhk adjk adjhsdajkasd adsjkdajkad adskjadsjkdajkasdkjasdjksdajk </p>
                                    </div>
                                    <!--prenews-item__content-->
                                </div>
                            </div>
                            <!--prenews-item__inner-->
                            <div class="prenews-item">
                                <div class="prenews-item__inner">
                                    <a href="#" class="prenews-item__image" style="background-image: url({{asset('assests/front/images/slider5.jpg')}});">
                                    </a>
                                    <div class="prenews-item__content">
                                        <h3><a href="#">News 4 dsajkdsajkfdj asdkj</a> </h3>
                                        <p> ajksj adjkajkadhk adjk adjhsdajkasd adsjkdajkad adskjadsjkdajkasdkjasdjksdajk </p>
                                    </div>
                                    <!--prenews-item__content-->
                                </div>
                            </div>
                            <!--prenews-item__inner-->

                        </div>
                        <!--prenews-->
                    </div>

                    <div class="right-col">


                        <figure>
                            <img src="{{asset($course->icon_image_path)}}" alt="">
                        </figure>

                        <div class="right-col__testimonial">
                            <h2> What Are Students Say?</h2>
                            <div class="student-review">
                                <div class="student-review__item">
                                    <p> Best College! professional instructors. Practicum included. I got the job. Iam happy</p>
                                    <h4 class="student-review__std"> Benjamin Johnson, </h4>
                                </div>
                                <!--student-review__item-->

                                <div class="student-review__item">
                                    <p> Best College! professional instructors. Practicum included. I got the job. Iam happy</p>
                                    <h4 class="student-review__std"> Benjamin Johnson, </h4>
                                </div>
                                <!--student-review__item-->

                                <div class="student-review__item">
                                    <p> Best College! professional instructors. Practicum included. I got the job. Iam happy</p>
                                    <h4 class="student-review__std"> Benjamin Johnson, </h4>
                                </div>
                                <!--student-review__item-->

                            </div>


                        </div>
                        <!--right-col__testimonial-->
                        <div class="right-col__testimonial-video">
                            <iframe width="560" height="315" src="https://www.youtube.com/embed/{{$course->video_link}}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                        </div>

                        <section class="logo-carousel">

                            <h2 class="section-class"> Our Associates & Partner</h2>
                            <ul class="partners-carousel partners-carousel__secondary">
                                <li>
                                    <a href="#" class="partner-carousel__thumbnail" target="_blank"> <img src="{{asset('assets/front/images/comptia.png')}}" alt="Campsite Calgary"></a>

                                </li>

                                <li>
                                    <a href="#" class="partner-carousel__thumbnail" target="_blank"> <img src="{{asset('assets/front/images/ipa-canada.jpg')}}" alt="Campsite Calgary"></a>

                                </li>
                                <li>
                                    <a href="#" class="partner-carousel__thumbnail" target="_blank"> <img src="{{asset('assets/front/images/comptia.png')}}" alt="Campsite Calgary"></a>

                                </li>
                                <li>
                                    <a href="#" class="partner-carousel__thumbnail" target="_blank"> <img src="{{asset('assets/front/images/ipa-canada.jpg')}}" alt="Campsite Calgary"></a>

                                </li>
                                <li>
                                    <a href="#" class="partner-carousel__thumbnail" target="_blank"> <img src="{{asset('assets/front/images/comptia.png')}}" alt="Campsite Calgary"></a>

                                </li>
                                <li>
                                    <a href="#" class="partner-carousel__thumbnail" target="_blank"> <img src="{{asset('assets/front/images/ipa-canada.jpg')}}" alt="Campsite Calgary"></a>

                                </li>


                            </ul>

                        </section>
                        <!--logo-carousel-->

                    </div>
                </div>

                <section class="related-course">
                    <div class="container">
                        <h2>Related Courses </h2>
                        <div class="related-course__holder flex-container">
                            <div class="related-course__item">
                                <div class="related-course__item-inner">
                                    <figure class="related-course__item-image" style="background-image: url(asset('asset/front/images/slider4.jpg')}});">
                                        <img src="{{asset('assets/front/images/slider4.jpg')}}" alt="Images"> <!-- seo purpose only -->
                                    </figure>
                                    <div class="related-course__item-content">
                                        <h3>Course Title Goes here</h3>

                                        <p> hasdjkasd asdjkasdjk jkasdjkasdhj asdjkjkasd asdjkasdh asdasdjkasdjk asdjkasdjk </p>
                                        <a class="button button--white" href="#">Read More</a>
                                    </div>
                                </div>
                                <!--related-course__item-inner-->
                            </div>
                            <!--related-course__item-->
                            <div class="related-course__item">
                                <div class="related-course__item-inner">
                                    <figure class="related-course__item-image" style="background-image: url(asset('asset/front/images/slider6.jpg')}});">
                                        <img src="{{asset('assets/front/images/slider6.jpg')}}" alt="Images"> <!-- seo purpose only -->
                                    </figure>
                                    <div class="related-course__item-content">
                                        <h3>Course Title Goes here</h3>

                                        <p> hasdjkasd asdjkasdjk jkasdjkasdhj asdjkjkasd asdjkasdh asdasdjkasdjk asdjkasdjk </p>
                                        <a class="button button--white" href="#">Read More</a>
                                    </div>
                                </div>
                                <!--related-course__item-inner-->
                            </div>
                            <!--related-course__item-->
                            <div class="related-course__item">
                                <div class="related-course__item-inner">
                                    <figure class="related-course__item-image" style="background-image: url(asset('asset/front/images/slider5.jpg')}});">
                                        <img src="{{asset('assets/front/images/slider5.jpg')}}" alt="Images"> <!-- seo purpose only -->
                                    </figure>
                                    <div class="related-course__item-content">
                                        <h3>Course Title Goes here</h3>

                                        <p> hasdjkasd asdjkasdjk jkasdjkasdhj asdjkjkasd asdjkasdh asdasdjkasdjk asdjkasdjk </p>
                                        <a class="button button--white" href="#">Read More</a>
                                    </div>
                                </div>
                                <!--related-course__item-inner-->
                            </div>
                            <!--related-course__item-->


                        </div>
                        <!--related-course__holder-->
                    </div>

                </section>
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

                        <div class="table-of-contents">
                            <h2>Quick Links</h2>
                            <ul>

                                <li> <a href="#">Terms & Conditions</a> </li>
                                <li><a href="#">Desclimair</a> </li>
                                <li><a href="#">Privacy Statement</a> </li>
                                <li><a href="#">Trademarks</a> </li>
                                <li><a href="#">Cookies</a> </li>

                            </ul>
                        </div>
                        <!--table-of-contents-->


                        <div class="right-col__testimonial">
                            <h2> What Are Students Say?</h2>
                            <div class="student-review">
                                <div class="student-review__item">
                                    <p> Best College! professional instructors. Practicum included. I got the job. Iam happy</p>
                                    <h4 class="student-review__std"> Benjamin Johnson, </h4>
                                </div>
                                <!--student-review__item-->

                                <div class="student-review__item">
                                    <p> Best College! professional instructors. Practicum included. I got the job. Iam happy</p>
                                    <h4 class="student-review__std"> Benjamin Johnson, </h4>
                                </div>
                                <!--student-review__item-->

                                <div class="student-review__item">
                                    <p> Best College! professional instructors. Practicum included. I got the job. Iam happy</p>
                                    <h4 class="student-review__std"> Benjamin Johnson, </h4>
                                </div>
                                <!--student-review__item-->

                            </div>


                        </div>
                        <!--right-col__testimonial-->
                        <div class="right-col__testimonial-video">
                            <iframe width="560" height="315" src="https://www.youtube.com/embed/{{$course->video_link}}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                        </div>

                        <section class="logo-carousel">

                            <h2 class="section-class"> Our Associates & Partner</h2>
                            <ul class="partners-carousel partners-carousel__secondary">
                                <li>
                                    <a href="#" class="partner-carousel__thumbnail" target="_blank"> <img src="{{asset('assets/front/images/comptia.png')}}" alt="Campsite Calgary"></a>

                                </li>

                                <li>
                                    <a href="#" class="partner-carousel__thumbnail" target="_blank"> <img src="{{asset('assets/front/images/ipa-canada.jpg')}}" alt="Campsite Calgary"></a>

                                </li>
                                <li>
                                    <a href="#" class="partner-carousel__thumbnail" target="_blank"> <img src="{{asset('assets/front/images/comptia.png')}}" alt="Campsite Calgary"></a>

                                </li>
                                <li>
                                    <a href="#" class="partner-carousel__thumbnail" target="_blank"> <img src="{{asset('assets/front/images/ipa-canada.jpg')}}" alt="Campsite Calgary"></a>

                                </li>
                                <li>
                                    <a href="#" class="partner-carousel__thumbnail" target="_blank"> <img src="{{asset('assets/front/images/comptia.png')}}" alt="Campsite Calgary"></a>

                                </li>
                                <li>
                                    <a href="#" class="partner-carousel__thumbnail" target="_blank"> <img src="{{asset('assets/front/images/ipa-canada.jpg')}}" alt="Campsite Calgary"></a>

                                </li>


                            </ul>

                        </section>
                        <!--logo-carousel-->

                    </div>
                </div>
                <section class="related-course">
                    <div class="container">
                        <h2>Related Courses </h2>
                        <div class="related-course__holder flex-container">
                            <div class="related-course__item">
                                <div class="related-course__item-inner">
                                    <figure class="related-course__item-image" style="background-image: url(asset('asset/front/images/slider4.jpg')}});">
                                        <img src="{{asset('assets/front/images/slider4.jpg')}}" alt="Images"> <!-- seo purpose only -->
                                    </figure>
                                    <div class="related-course__item-content">
                                        <h3>Course Title Goes here</h3>

                                        <p> hasdjkasd asdjkasdjk jkasdjkasdhj asdjkjkasd asdjkasdh asdasdjkasdjk asdjkasdjk </p>
                                        <a class="button button--white" href="#">Read More</a>
                                    </div>
                                </div>
                                <!--related-course__item-inner-->
                            </div>
                            <!--related-course__item-->
                            <div class="related-course__item">
                                <div class="related-course__item-inner">
                                    <figure class="related-course__item-image" style="background-image: url(asset('asset/front/images/slider6.jpg')}});">
                                        <img src="{{asset('assets/front/images/slider6.jpg')}}" alt="Images"> <!-- seo purpose only -->
                                    </figure>
                                    <div class="related-course__item-content">
                                        <h3>Course Title Goes here</h3>

                                        <p> hasdjkasd asdjkasdjk jkasdjkasdhj asdjkjkasd asdjkasdh asdasdjkasdjk asdjkasdjk </p>
                                        <a class="button button--white" href="#">Read More</a>
                                    </div>
                                </div>
                                <!--related-course__item-inner-->
                            </div>
                            <!--related-course__item-->
                            <div class="related-course__item">
                                <div class="related-course__item-inner">
                                    <figure class="related-course__item-image" style="background-image: url(asset('asset/front/images/slider5.jpg')}});">
                                        <img src="{{asset('assets/front/images/slider5.jpg')}}" alt="Images"> <!-- seo purpose only -->
                                    </figure>
                                    <div class="related-course__item-content">
                                        <h3>Course Title Goes here</h3>

                                        <p> hasdjkasd asdjkasdjk jkasdjkasdhj asdjkjkasd asdjkasdh asdasdjkasdjk asdjkasdjk </p>
                                        <a class="button button--white" href="#">Read More</a>
                                    </div>
                                </div>
                                <!--related-course__item-inner-->
                            </div>
                            <!--related-course__item-->


                        </div>
                        <!--related-course__holder-->
                    </div>

                </section>
            </div>
            <!--financial course-nav__detail-item-->

            <div class="course-nav__detail-item">
                <div class="container flex-container">
                    <div class="left-col">
                        <div class="left-col__intro">
                            <h2 class="intro-courseintro">Industrail Acceptance </h2>

                            {!! $course->industrial_desc !!}

                        </div>
                        <!--left-col__intro-->



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
                        </div>
                        <!--table-of-contents-->

                        <div class="right-col__testimonial">
                            <h2> What Are Students Say?</h2>
                            <div class="student-review">
                                <div class="student-review__item">
                                    <p> Best College! professional instructors. Practicum included. I got the job. Iam happy</p>
                                    <h4 class="student-review__std"> Benjamin Johnson, </h4>
                                </div>
                                <!--student-review__item-->

                                <div class="student-review__item">
                                    <p> Best College! professional instructors. Practicum included. I got the job. Iam happy</p>
                                    <h4 class="student-review__std"> Benjamin Johnson, </h4>
                                </div>
                                <!--student-review__item-->

                                <div class="student-review__item">
                                    <p> Best College! professional instructors. Practicum included. I got the job. Iam happy</p>
                                    <h4 class="student-review__std"> Benjamin Johnson, </h4>
                                </div>
                                <!--student-review__item-->

                            </div>


                        </div>
                        <!--right-col__testimonial-->
                        <div class="right-col__testimonial-video">
                            <iframe width="560" height="315" src="https://www.youtube.com/embed/{{$course->video_link}}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                        </div>

                        <section class="logo-carousel">

                            <h2 class="section-class"> Our Associates & Partner</h2>
                            <ul class="partners-carousel partners-carousel__secondary">
                                <li>
                                    <a href="#" class="partner-carousel__thumbnail" target="_blank"> <img src="{{asset('assets/front/images/comptia.png')}}" alt="Campsite Calgary"></a>

                                </li>

                                <li>
                                    <a href="#" class="partner-carousel__thumbnail" target="_blank"> <img src="{{asset('assets/front/images/ipa-canada.jpg')}}" alt="Campsite Calgary"></a>

                                </li>
                                <li>
                                    <a href="#" class="partner-carousel__thumbnail" target="_blank"> <img src="{{asset('assets/front/images/comptia.png')}}" alt="Campsite Calgary"></a>

                                </li>
                                <li>
                                    <a href="#" class="partner-carousel__thumbnail" target="_blank"> <img src="{{asset('assets/front/images/ipa-canada.jpg')}}" alt="Campsite Calgary"></a>

                                </li>
                                <li>
                                    <a href="#" class="partner-carousel__thumbnail" target="_blank"> <img src="{{asset('assets/front/images/comptia.png')}}" alt="Campsite Calgary"></a>

                                </li>
                                <li>
                                    <a href="#" class="partner-carousel__thumbnail" target="_blank"> <img src="{{asset('assets/front/images/ipa-canada.jpg')}}" alt="Campsite Calgary"></a>

                                </li>


                            </ul>

                        </section>
                        <!--logo-carousel-->

                    </div>
                </div>
                <section class="related-course">
                    <div class="container">
                        <h2>Related Courses </h2>
                        <div class="related-course__holder flex-container">
                            <div class="related-course__item">
                                <div class="related-course__item-inner">
                                    <figure class="related-course__item-image" style="background-image: url(asset('asset/front/images/slider4.jpg')}});">
                                        <img src="{{asset('assets/front/images/slider4.jpg')}}" alt="Images"> <!-- seo purpose only -->
                                    </figure>
                                    <div class="related-course__item-content">
                                        <h3>Course Title Goes here</h3>

                                        <p> hasdjkasd asdjkasdjk jkasdjkasdhj asdjkjkasd asdjkasdh asdasdjkasdjk asdjkasdjk </p>
                                        <a class="button button--white" href="#">Read More</a>
                                    </div>
                                </div>
                                <!--related-course__item-inner-->
                            </div>
                            <!--related-course__item-->
                            <div class="related-course__item">
                                <div class="related-course__item-inner">
                                    <figure class="related-course__item-image" style="background-image: url(asset('asset/front/images/slider6.jpg')}});">
                                        <img src="{{asset('assets/front/images/slider6.jpg')}}" alt="Images"> <!-- seo purpose only -->
                                    </figure>
                                    <div class="related-course__item-content">
                                        <h3>Course Title Goes here</h3>

                                        <p> hasdjkasd asdjkasdjk jkasdjkasdhj asdjkjkasd asdjkasdh asdasdjkasdjk asdjkasdjk </p>
                                        <a class="button button--white" href="#">Read More</a>
                                    </div>
                                </div>
                                <!--related-course__item-inner-->
                            </div>
                            <!--related-course__item-->
                            <div class="related-course__item">
                                <div class="related-course__item-inner">
                                    <figure class="related-course__item-image" style="background-image: url(asset('asset/front/images/slider5.jpg')}});">
                                        <img src="{{asset('assets/front/images/slider5.jpg')}}" alt="Images"> <!-- seo purpose only -->
                                    </figure>
                                    <div class="related-course__item-content">
                                        <h3>Course Title Goes here</h3>

                                        <p> hasdjkasd asdjkasdjk jkasdjkasdhj asdjkjkasd asdjkasdh asdasdjkasdjk asdjkasdjk </p>
                                        <a class="button button--white" href="#">Read More</a>
                                    </div>
                                </div>
                                <!--related-course__item-inner-->
                            </div>
                            <!--related-course__item-->


                        </div>
                        <!--related-course__holder-->
                    </div>

                </section>
            </div>
            <!--industrial-acceptance course-nav__detail-item-->
        </div>
        <!--resp-tabs-container-->
    </div>
    <!--tab-holder-->
</main>
@endsection