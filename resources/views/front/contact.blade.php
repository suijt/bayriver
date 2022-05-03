@extends('layouts.front.app')

@section('title', 'Contact Us')

@section('content')
<main class="site-content">
    @if(!empty(config('settings.site_contact_image')))
    <section class="inner-banner" style="background-image: url({{asset(config('settings.site_contact_image_image_path'))}})">
        <div class="inner-banner__content">
            <div class="container">
                <h1>{{config('settings.site_contact_title')}}</h1>
                <p>{{config('settings.site_contact_caption')}}</p>
            </div>
        </div>
    </section>
    @endif

    <section class="contact-us" style="background-image: url('images/map-bg.png');">
        <div class="container">
            <div class="contact-us__holder">
                <div class="contact-us_info">
                    <h3>Find Us</h3>
                    <ul>
                        <li> <i class="fa fa-map-marker"></i>
                            <address class="contact-us__info-detail">{{config('settings.site_footer_state_number')}}</br>{{config('settings.site_footer_state')}}</address>
                        </li>

                        <li><i class="fa fa-envelope"></i> <a href="mailto:{{config('settings.site_footer_email')}}" class="contact-us__info-detail"> {{config('settings.site_footer_email')}}</a></li>
                        <li><i class="fa fa-phone"></i> <a href="tel:{{config('settings.site_footer_number')}}" class="contact-us__info-detail"> {{config('settings.site_footer_number')}}</a> </li>
                    </ul>

                    <ul class="social-media social-media__secondary">
                        <li><a href="{{config('settings.site_footer_icon_1_link')}}" target="_blank"> <i class="fab fa-twitter"></i></a></li>
                        <li><a href="{{config('settings.site_footer_icon_2_link')}}" target="_blank"> <i class="fab fa-facebook-f"></i></a> </li>
                        <li><a href="{{config('settings.site_footer_icon_3_link')}}" target="_blank"> <i class="fab fa-instagram"></i></a> </li>

                    </ul>
                </div>
                <div class="contact-us_form">
                    <h3>Contact Us</h3>
                    <div id="form-messages"></div>
                    <form id="contact" name="contact" method="post" action="{{route('contact.submit')}}" data-parsley-validate="">
                        @csrf
                        <div class=" form-item">
                            <!--  <label for="name">Name</label>-->
                            <input type="text" id="name" name="name" placeholder="Your name.." required data-parsley-required-message="your name is required">
                        </div>
                        <div class="form-item">
                            <!-- <label for="email">Email</label>-->
                            <input type="email" id="email" name="email" placeholder="Email" required data-parsley-required-message="your email is requried">
                        </div>
                        <div class="form-item">
                            <!-- <label for="phone">Phone</label>-->
                            <input type="text" id="phone" name="phone_number" placeholder="Phone">
                        </div>
                        <div class="form-item">
                            <!-- <label for="phone">Phone</label>-->
                            <input type="text" id="subject" name="subject" placeholder="Subject" >
                        </div>
                        <div class="form-item">
                            <!--  <label for="address">Address</label>-->
                            <textarea rows="5" cols="45" name="message" placeholder="Your Message" ></textarea>
                        </div>


                        <div class="form-button">
                            <input class="button  button--tertiary" type="submit" value="Submit Now">
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </section>
    <section class="google-map">
        <iframe src="{{config('settings.site_contact_location_map')}}" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </section>
</main>
@endsection
@section('scripts')
    <script src="https://parsleyjs.org/dist/parsley.min.js"></script>

    <script type="text/javascript">
        $('#contact').parsley();
    </script>

@endsection
