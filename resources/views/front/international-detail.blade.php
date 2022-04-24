@extends('layouts.front.app')

@section('title', 'Homepage')

@section('content')
<main class="site-content">
    <section class="inner-banner" style="background-image: url({{asset($country->banner_image_path)}});">
        <div class="inner-banner__content">
            <div class="container">
                <h1>{{$country->title}}</h1>
                <h3>{{$country->dli_no}}</h3>
                <p>{{$country->caption}}</p>

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
                    <li>Overview</li>
                    <li>Courses </li>
                    <li>Fees & Schedule </li>
                    <li>Student Handbook</li>
                    <li>Download </li>
                    <li>News & Events </li>
                </ul>
            </div>
        </section>
        <div class="hor_1 resp-tabs-container">
            <div class="course-nav__detail-item overview-section">
                <div class="container flex-container">
                    <div class="left-col">
                        <div class="left-col__intro">
                            <h2 class="intro-courseintro">Overview </h2>
                            {!! $country->description!!}
                        </div>
                        <!--left-col__intro-->

                        <div class="left-col__learningoutcome" style="background-image: url('images/slider5.jpg');">
                            {!! $country->learning_outcome !!}
                        </div>
                        <!--left-col__programinfo-->
                        <div class="left-col__others">
                            {!! $country->learning_features !!}
                        </div>
                        <!--left-col__programinfo-->
                    </div>

                    <div class="right-col">
                        <h3 class="right-col__dli">{{$country->dli_no}}</h3>
                        @include('layouts.front.quicklinks')

                        <!--table-of-contents-->

                        <figure>
                            <img src="{{asset($country->secondary_image_path)}}" alt="">
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
                        <div class="book-appointment__right advisorform">
                            <div class="book-appointment__right-holder">
                                <div class="book-appointment__right-inner">
                                    <h2>To Know More <br>Contact To Advisor</h2>
                                    <form id="contact2" name="contact" method="#">
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
                        <!-- <div class="right-col__testimonial-video mt-20">
                            <iframe width="560" height="315" src="https://www.youtube.com/embed/4NvmzjCb9fA" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                        </div> -->
                    </div>
                </div>


            </div>
            <!--overview course-nav__detail-item-->
            <div class="course-nav__detail-item">
                <div class="container flex-container">
                    <div class="left-col">
                        <div class="left-col__intro">
                            <h2 class="intro-courseintro">COURSES </h2>

                            {!! $country->course_desc !!}

                            @if($internationalCourseCat->isNotEmpty())
                            <div class="course-detail__menu flex-container">
                                @foreach ($internationalCourseCat as $cat)

                                <div class="list-item">
                                    <h4 class="title">{{$cat->name}}</h4>
                                    <ul>
                                        @foreach ($cat->courses as $course)
                                        <li><a href="{{route('course.detail',$course->slug)}}">{{$course->title}}</a></li>
                                        @endforeach

                                    </ul>

                                </div>
                                @endforeach

                            </div>
                            @endif
                        </div>
                        <!--left-col__intro-->



                    </div>

                    <div class="right-col">
                        <h3 class="right-col__dli">{{$country->dli_no}}</h3>

                        @include('layouts.front.quicklinks')

                        <!--table-of-contents-->
                        <!-- <figure>
                            <img src="images/intl1.jpg.jpg" alt="">
                        </figure> -->

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
                            <iframe width="560" height="315" src="https://www.youtube.com/embed/{{$country->video_link}}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
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
                                    <form id="contact4" name="contact" method="mail.php">
                                        <div class="form-item">
                                            <!--  <label for="name">Name</label>-->
                                            <input type="text" id="name4" name="Name" placeholder="Your name..">
                                        </div>
                                        <div class="form_two-col">
                                            <div class="form-item">
                                                <!-- <label for="email">Email</label>-->
                                                <input type="email" id="email4" name="Email" placeholder="Email">
                                            </div>
                                            <div class="form-item">
                                                <!-- <label for="phone">Phone</label>-->
                                                <input type="text" id="phone4" name="Phone" placeholder="Phone">
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

            </div>
            <!--prerequesite course-nav__detail-item-->
            <div class="course-nav__detail-item">
                <div class="container flex-container">
                    <div class="left-col">
                        <div class="left-col__intro">
                            <h2 class="intro-courseintro">FEES & SCHEDULE </h2>

                            {!! $country->financial_desc !!}
                        </div>
                        <!--left-col__intro-->



                    </div>

                    <div class="right-col">
                        <h3 class="right-col__dli">Designated Learning Institute (DLI) #O121321694207</h3>
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
            <!--financial course-nav__detail-item-->
            <div class="course-nav__detail-item">
                <div class="container flex-container">
                    <div class="left-col">
                        <div class="left-col__intro">
                            <h2 class="intro-courseintro">Student Handbook </h2>
                            <iframe src="{{asset('assets/front/images/Bay-River-College-Prospectus-1-Handbook-2-1.pdf')}}" width="100%" height="500px"></iframe>


                            {!! $country->handbook_desc !!}

                            <a class="button" href="{{asset('assets/front/images/Bay-River-College-Prospectus-1-Handbook-2-1.pdf')}}" download>Download Student Handbook</a>

                        </div>
                        <!--left-col__intro-->
                    </div>

                    <div class="right-col">
                        <h3 class="right-col__dli">Designated Learning Institute (DLI) #O121321694207</h3>
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
                        <section class="logo-carousel">

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

                        </section>
                        <!--logo-carousel-->
                        <div class="book-appointment__right">
                            <div class="book-appointment__right-holder">
                                <div class="book-appointment__right-inner">
                                    <h2>Ready To Book An Appointment</h2>
                                    <form id="contact5" name="contact" method="mail.php">
                                        <div class="form-item">
                                            <!--  <label for="name">Name</label>-->
                                            <input type="text" id="name5" name="Name" placeholder="Your name..">
                                        </div>
                                        <div class="form-item">
                                            <!-- <label for="email">Email</label>-->
                                            <input type="email" id="email5" name="Email" placeholder="Email">
                                        </div>
                                        <div class="form-item">
                                            <!-- <label for="phone">Phone</label>-->
                                            <input type="text" id="phone5" name="Phone" placeholder="Phone">
                                        </div>
                                        <div class="form-item">
                                            <!--  <label for="address">Address</label>-->
                                            <input type="text" id="address5" name="address" placeholder="Address">
                                        </div>
                                        <div class="form-item">
                                            <!-- <label for="date">Date</label>-->
                                            <input type="date" id="date5" name="date" placeholder="Date">
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
                                    <form id="contact6" name="contact" method="mail.php">
                                        <div class="form-item">
                                            <!--  <label for="name">Name</label>-->
                                            <input type="text" id="name6" name="Name" placeholder="Your name..">
                                        </div>
                                        <div class="form_two-col">
                                            <div class="form-item">
                                                <!-- <label for="email">Email</label>-->
                                                <input type="email" id="email6" name="Email" placeholder="Email">
                                            </div>
                                            <div class="form-item">
                                                <!-- <label for="phone">Phone</label>-->
                                                <input type="text" id="phone6" name="Phone" placeholder="Phone">
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

            </div>
            <!--industrial-acceptance course-nav__detail-item-->
            <div class="course-nav__detail-item">
                <div class="container flex-container">
                    <div class="left-col">
                        <div class="left-col__intro">
                            <h2 class="intro-courseintro">DOWNLOADS </h2>

                            <p>
                                Bay River College Offers various courses for international students. Download as per your requirements </p>

                            <div class="apply-now__admission-form">
                                <div class="container">
                                    <h2>Fill online form</h2>
                                    <form class="admission-form" method="post" action="mail.php">


                                        <div class="international-students__fields international-students__fields--secondary">
                                            <h3>Personal Information</h3>
                                            <div class="form-item__two-col">
                                                <div class="form-item">
                                                    <label class="form-item__label" for="fname">First Name</label>
                                                    <input type="text" id="fname" name="fname" placeholder="First Name">
                                                </div>
                                                <div class="form-item">
                                                    <label class="form-item__label" for="lname">Last Name</label>
                                                    <input type="text" id="lname" name="lname" placeholder="Last Name">
                                                </div>
                                            </div>
                                            <!--form-item__two-col-->
                                            <div class="form-item__two-col">
                                                <div class="form-item">
                                                    <label class="form-item__label" for="email-intl">Email Address</label>
                                                    <input type="text" id="email-intl" name="email-intl" placeholder="Email Address">
                                                </div>
                                                <div class="form-item">
                                                    <label class="form-item__label" for="nationality">Nationality</label>
                                                    <input type="text" id="nationality" name="nationality" placeholder="Nationality">
                                                </div>
                                            </div>
                                            <!--form-item__two-col-->
                                            <div class="form-item__two-col">
                                                <div class="form-item">
                                                    <label class="form-item__label" for="passport">Passport Number</label>
                                                    <input type="text" id="passport" name="passport" placeholder="Passport">
                                                </div>

                                                <div class="form-item">
                                                    <label class="form-item__label" for="passport">Date of Birth</label>
                                                    <input type="date" id="date" name="date" placeholder="Date of Birth">
                                                </div>
                                            </div>
                                            <!--form-item__two-col-->
                                            <div class="form-item__two-col">

                                                <div class="form-item__col2 form-item">
                                                    <p>Gender</p>
                                                    <div class="radio-holder">
                                                        <div class="radio-item">
                                                            <input type="radio" id="male" name="select-gender" value="Male" checked>
                                                            <label for="canadian-resident">Male</label>
                                                        </div>

                                                        <div class="radio-item">
                                                            <input type="radio" id="female" name="select-gender" value="Female">
                                                            <label for="female">Female</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--form-item__two-col-->

                                            </div>
                                            <!--form-item__col2-->

                                            <h3>Contact Information</h3>
                                            <div class="form-item">
                                                <textarea id="textarea-intl" name="textarea-intl" rows="4" cols="50" placeholder="Enter You Address"></textarea>
                                            </div>
                                            <div class="form-item">
                                                <label class="form-item__label" for="province">Province/State</label>
                                                <input type="text" id="province" name="province" placeholder="Province / State">
                                            </div>
                                            <div class="form-item">
                                                <label class="form-item__label" for="country">Country</label>
                                                <input type="text" id="country" name="country" placeholder="Enter Your Country Name">
                                            </div>
                                            <div class="form-item">
                                                <input type="text" id="zipcode-intl" name="zipcode-intl" placeholder="Zip Code">
                                            </div>

                                            <h3>Emergency Contact Information</h3>
                                            <div class="form-item">
                                                <input type="text" id="fullname" name="fullname" placeholder="Full Name">
                                            </div>

                                            <div class="form-item">
                                                <textarea id="textarea-emergency" name="textarea-emergency" rows="4" cols="50" placeholder="Enter You Address"></textarea>
                                            </div>
                                            <div class="form-item__two-col">
                                                <div class="form-item">
                                                    <label class="form-item__label" for="province">Province/State</label>
                                                    <input type="text" id="province-emergency" name="province-emergency" placeholder="Province / State">
                                                </div>
                                                <div class="form-item">
                                                    <label class="form-item__label" for="country">Country</label>
                                                    <input type="text" id="country-emergency" name="country-emergency" placeholder="Enter Your Country Name">
                                                </div>
                                            </div>

                                            <div class="form-item__two-col">
                                                <div class="form-item">
                                                    <input type="text" id="email-emergency" name="email-emergency" placeholder="Email Address">
                                                </div>
                                                <div class="form-item">
                                                    <input type="text" id="phone-emergency" name="phone-emergency" placeholder="Phone Number">
                                                </div>
                                            </div>


                                            <h3>Program</h3>
                                            <div class="form-item">

                                                <select name="courses" id="courses2">
                                                    <option value="international-business-management-diploma">International Business Management Diploma</option>
                                                    <option value="hospitality-business-banagement-biploma">Hospitality Business Management Diploma</option>
                                                    <option value="Information-Technolog-Network-Administrator-Diploma">Information Technology & Network Administrator Diploma</option>
                                                    <option value="Cyber-security-Cloud-Computing-Diploma">Cyber Security & Cloud Computing Diploma</option>
                                                    <option value="security">Health Care Aide Diploma</option>
                                                    <option value="cyber-security">Pharmacy Assistant Diploma</option>
                                                </select>
                                            </div>

                                            <h3>Other Information</h3>
                                            <div class="form-item">
                                                <p>How Did you hear us</p>
                                                <div class="checkbox-holder">
                                                    <div class="checkbox-item">
                                                        <input type="checkbox" id="agent" name="agent" value="Agent">
                                                        <label for="agent"> Agent</label>
                                                    </div>
                                                    <!--checkbox-item-->
                                                    <div class="checkbox-item">
                                                        <input type="checkbox" id="internet" name="Internet" value="Internet">
                                                        <label for="internet"> Internet</label>
                                                    </div>
                                                    <!--checkbox-item-->
                                                    <div class="checkbox-item">
                                                        <input type="checkbox" id="search-engine" name="search-engine" value="Search Engine">
                                                        <label for="search-engine"> Search Engine</label>
                                                    </div>
                                                    <!--checkbox-item-->
                                                    <div class="checkbox-item">
                                                        <input type="checkbox" id="socialmedia2" name="socialmedia2" value="Social Media">
                                                        <label for="socialmedia2"> Social Media</label>
                                                    </div>
                                                    <!--checkbox-item-->
                                                    <div class="checkbox-item">
                                                        <input type="checkbox" id="relatives2" name="relatives2" value="Relatives">
                                                        <label for="relatives2"> Relatives or Friends</label>
                                                    </div>
                                                    <!--checkbox-item-->
                                                    <div class="checkbox-item">
                                                        <input type="checkbox" id="our-website" name="our-website" value="our-website">
                                                        <label for="our-website"> Our Website</label>
                                                    </div>
                                                    <!--checkbox-item-->

                                                    <div class="checkbox-item">
                                                        <input type="checkbox" id="others2" name="others2" value="Others">
                                                        <label for="others2"> Others</label>
                                                    </div>
                                                    <!--checkbox-item-->
                                                    <div class="form-item">
                                                        <input type="text" id="if-agent" name="if-agent" placeholder="if agent, mention name here...">
                                                    </div>
                                                </div>
                                                <!--checkbox-holder-->

                                            </div>

                                            <div class="form-item">
                                                <p>Application Check List*</p>
                                                <div class="checkbox-holder">
                                                    <div class="checkbox-item">
                                                        <input type="checkbox" id="fees" name="fees" value="Fees">
                                                        <label for="agent"> $500 CND Fee. Non refunable & transferable for processing & documentation</label>
                                                    </div>
                                                    <!--checkbox-item-->
                                                    <div class="checkbox-item">
                                                        <input type="checkbox" id="translate" name="translate" value="Translate">
                                                        <label for="internet"> Translated & Natorized Trascript from Highest level of Education</label>
                                                    </div>
                                                    <!--checkbox-item-->
                                                    <div class="checkbox-item">
                                                        <input type="checkbox" id="proof-of-english" name="proof-of-english" value="Proof of English">
                                                        <label for="search-engine"> Proof of Engine Proficiency</label>
                                                    </div>
                                                    <!--checkbox-item-->

                                                </div>
                                                <!--checkbox-holder-->
                                            </div>

                                            <h2>Payment</h2>
                                            <div class="form-item">
                                                <p>Do you want to submit Online Payment. To secure your seat please do an online payment</p>
                                                <div class="checkbox-holder">
                                                    <div class="checkbox-item">
                                                        <input type="checkbox" id="yes" name="select-one" value="Yes">
                                                        <label for="yes"> Yes</label>
                                                    </div>
                                                    <!--checkbox-item-->
                                                    <div class="checkbox-item">
                                                        <input type="checkbox" id="no" name="select-one" value="No">
                                                        <label for="college"> College</label>
                                                    </div>
                                                    <!--checkbox-item-->

                                                </div>
                                                <!--checkbox-holder-->
                                            </div>
                                            <div class="form-item">

                                                <div class="checkbox-holder">
                                                    <div class="checkbox-item">
                                                        <input type="checkbox" id="i-agree2" name="i-agree2" value="I Agree">
                                                        <label for="i-agree2"> By accepting this document, I hereby confirm the <a href="privacy.html">terms and agreement</a> .</label>
                                                    </div>
                                                    <!--checkbox-item-->
                                                </div>
                                                <!--checkbox-holder-->
                                            </div>

                                        </div>
                                        <!--international-students__fields-->
                                        <div class="form-item__button">
                                            <button class="button button--tertiary" type="submit">Apply Now</button>

                                        </div>
                                    </form>
                                </div>
                            </div>

                            <ul>
                                <li> <a href="images/INTERNATIONAL-STUDENT-APPLICATION-FORM-002.pdf" download>International Student Application Form</a></li>
                                <li> <a href="images/Bay-River_International_TuitionFees-2022-2023-revised.pdf" download>International Student Fees</a></li>
                                <li> <a href="images/Bay-River-College-Prospectus-1-Handbook-2-1.pdf" download>International Student Handbook </a></li>
                                <li> <a href="https://englishtest.duolingo.com/applicants" download>Duolingo English Test</a></li>

                            </ul>

                        </div>
                        <!--left-col__intro-->



                    </div>

                    <div class="right-col">
                        <h3 class="right-col__dli">{{$country->dli_no}}</h3>
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
                        <div class="book-appointment__right">
                            <div class="book-appointment__right-holder">
                                <div class="book-appointment__right-inner">
                                    <h2>Ready To Book An Appointment</h2>
                                    <form id="contact7" name="contact" method="mail.php">
                                        <div class="form-item">
                                            <!--  <label for="name">Name</label>-->
                                            <input type="text" id="name7" name="Name" placeholder="Your name..">
                                        </div>
                                        <div class="form-item">
                                            <!-- <label for="email">Email</label>-->
                                            <input type="email" id="email7" name="Email" placeholder="Email">
                                        </div>
                                        <div class="form-item">
                                            <!-- <label for="phone">Phone</label>-->
                                            <input type="text" id="phone7" name="Phone" placeholder="Phone">
                                        </div>
                                        <div class="form-item">
                                            <!--  <label for="address">Address</label>-->
                                            <input type="text" id="address7" name="address" placeholder="Address">
                                        </div>
                                        <div class="form-item">
                                            <!-- <label for="date">Date</label>-->
                                            <input type="date" id="date7" name="date" placeholder="Date">
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
                                    <form id="contact6" name="contact" method="mail.php">
                                        <div class="form-item">
                                            <!--  <label for="name">Name</label>-->
                                            <input type="text" id="name6" name="Name" placeholder="Your name..">
                                        </div>
                                        <div class="form_two-col">
                                            <div class="form-item">
                                                <!-- <label for="email">Email</label>-->
                                                <input type="email" id="email6" name="Email" placeholder="Email">
                                            </div>
                                            <div class="form-item">
                                                <!-- <label for="phone">Phone</label>-->
                                                <input type="text" id="phone6" name="Phone" placeholder="Phone">
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

            </div>
            @if($featuredNews->isNotEmpty())

            <!--industrial-acceptance course-nav__detail-item-->
            <div class="course-nav__detail-item">
                <div class="container flex-container">
                    <div class="left-col">
                        <div class="pre-news__holder">
                            <h2> News & Events</h2>
                        </div>
                        <div class="prenews flex-container">
                            @foreach ($featuredNews as $news)
                            <div class="prenews-item">
                                <div class="prenews-item__inner">
                                    <a href="#" class="prenews-item__image" style="background-image: url({{asset($news->image_path)}});">
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
                    </div>

                    <div class="right-col">
                        <h3 class="right-col__dli">{{$country->dli_no}}</h3>
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
                            <iframe width="560" height="315" src="https://www.youtube.com/embed/{{$country->video_link}}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                        </div>



                    </div>
                </div>

            </div>
            @endif
            <!--industrial-acceptance course-nav__detail-item-->
        </div>
        <!--resp-tabs-container-->
    </div>
    <!--tab-holder-->
    @if($featuredCourses->isNotEmpty())
    <section class="featured-program">
        <div class="container">
            <h2>Featured International Courses</h2>
            <div class="featured-program__sliderholder">
                @foreach ($featuredCourses as $course)
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



</main>

@endsection