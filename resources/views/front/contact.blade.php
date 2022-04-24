@extends('layouts.front.app')

@section('title', 'Alumni')

@section('content')
<main class="site-content">
    <section class="inner-banner" style="background-image: url('images/slider4.jpg');">
        <div class="inner-banner__content">
            <div class="container">
                <h1>Contact Us</h1>
                <p>DJSJDAFSG DSAFGJGJ ADFSJHASDJGASD ADSJH JADSHASDJHS JSADJHDSAHJASDGJ AJDSJHJH</p>


            </div>
        </div>

    </section>

    <section class="contact-us" style="background-image: url('images/map-bg.png');">
        <div class="container">
            <div class="contact-us__holder">
                <div class="contact-us_info">
                    <h3>Find Us</h3>
                    <ul>
                        <li> <i class="fa fa-map-marker"></i>
                            <address class="contact-us__info-detail">3516 26 St NE<br />
                                Calgary, AB T1Y 4T7</address>
                        </li>

                        <li><i class="fa fa-envelope"></i> <a href="mailto:" class="contact-us__info-detail"> admissions@bayrivercollege.ca</a></li>
                        <li><i class="fa fa-phone"></i> <a href="tel:" class="contact-us__info-detail"> (403) 457-6400</a> </li>
                    </ul>

                    <ul class="social-media social-media__secondary">
                        <li><a href="https://facebook.com" target="_blank"> <i class="fab fa-twitter"></i></a></li>
                        <li><a href="" target="_blank"> <i class="fab fa-facebook-f"></i></a> </li>
                        <li><a href="" target="_blank"> <i class="fab fa-instagram"></i></a> </li>

                    </ul>
                </div>
                <div class="contact-us_form">
                    <h3>Contact Us</h3>

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
                            <textarea rows="5" cols="45" placeholder="Your Message"></textarea>
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
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2506.299425635496!2d-113.99929634825928!3d51.08448137946761!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x537164e895a6bdef%3A0x18f3f47a55a21696!2sBay%20River%20College!5e0!3m2!1sen!2sca!4v1648477628304!5m2!1sen!2sca" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </section>
</main>
@endsection