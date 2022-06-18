@extends('layouts.front.app')

@section('title', 'Apply Now')

@section('content')

<main class="site-content">
    <section class="inner-banner" style="background-image: url({{asset(config('settings.site_apply_image_image_path'))}})">
        <div class="inner-banner__content">
            <div class="container">
                <h1>{{config('settings.site_apply_title')}}</h1>
                <p>{{config('settings.site_apply_caption')}}</p>
            </div>
        </div>
    </section>
    <div class="apply-now__admission-form" style="background-image: url({{asset(config('settings.site_apply_map_image_path'))}})">
        <div class="container">
            <h2>Enrollment</h2>
            <div class="form-item form-item__radio-student">
                <p>Which best describes you? Please select an option</p>
                <div class="form-item__col2 radio-holder">
                    <div class="radio-item">
                        <input type="radio" id="canadian-resident" name="option" value="Canadian" checked>
                        <label for="canadian-resident">Canadian Resident</label>
                        @error('option')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="radio-item">
                        <input type="radio" id="international-student" name="option" value="international-student">
                        <label for="international-student">International Student</label>
                        @error('option')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <!--form-item__col2-->

            </div>
            <!--form-item-->
            <div class="canadian-resident__fields">
                <form id="apply" name="apply" method="post" action="{{route('apply.submit')}}" data-parsley-validate="">
                    <input type="hidden" id="canadian-resident" name="option" value="resident">
                    @csrf
                    <div class="form-item__two-col">
                        <div class="form-item">
                            <input type="text" id="firstname" name="first_name" placeholder="First Name" required="" data-parsley-required-message="Your First Name is required">
                            @error('first_name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-item">
                            <input type="text" id="lastname" name="last_name" placeholder="Last Name" required="" data-parsley-required-message="Your Last Name is required">
                            @error('last_name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <!--form-item__two-col-->

                    <div class="form-item__two-col">
                        <div class="form-item">
                            <input type="text" id="email" name="email" placeholder="Email Address" required="" data-parsley-required-message="Your Email is required">
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-item">
                            <input type="number" id="phone" name="phone_number" placeholder="Phone Number">
                            @error('phone_number')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <!--form-item__two-col-->

                    <div class="form-item">
                        <textarea id="textarea" name="address" rows="4" cols="50" placeholder="Enter You Address"></textarea>
                        @error('address')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="form-item">
                        <p>What is your preferred study time?*</p>
                        <div class="checkbox-holder" name="study">
                            <div class="checkbox-item">
                                <input type="checkbox" id="morning" name="study[]" value="Morning">
                                <label for="morning"> Morning</label>
                            </div>
                            <!--checkbox-item-->
                            <div class="checkbox-item">
                                <input type="checkbox" id="afternoon" name="study[]" value="Afternoon">
                                <label for="afternoon"> Afternoon</label>
                            </div>
                            <!--checkbox-item-->
                            <div class="checkbox-item">
                                <input type="checkbox" id="evening" name="study[]" value="Evening">
                                <label for="evening"> Evening</label>
                            </div>
                            <!--checkbox-item-->
                        </div>
                        <!--checkbox-holder-->
                        @error('study')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="form-item">
                        <p> What program are you interested in?* </p>
                        <select name="interest" id="courses">
                            <option vlaue="">Select Program</option>
                            @foreach ($coursesResidental as $course)
                            <option value="{{$course->title}}">{{$course->title}}</option>
                            @endforeach
                        </select>
                        @error('interest')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-item">
                        <p>What is your level of study?*</p>
                        <div class="checkbox-holder">
                            <div class="checkbox-item">
                                <input type="checkbox" id="highschool" name="time[]" value="High School">
                                <label for="highschool"> High School</label>
                            </div>
                            <!--checkbox-item-->
                            <div class="checkbox-item">
                                <input type="checkbox" id="college" name="time[]" value="College">
                                <label for="college"> College</label>
                            </div>
                            <!--checkbox-item-->
                            <div class="checkbox-item">
                                <input type="checkbox" id="university" name="time[]" value="University">
                                <label for="university"> University</label>
                            </div>
                            <!--checkbox-item-->
                            <div class="checkbox-item">
                                <input type="checkbox" id="others" name="time[]" value="Others">
                                <label for="others"> Others</label>
                            </div>
                            <!--checkbox-item-->
                        </div>
                        <!--checkbox-holder-->
                        @error('time')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="form-item">
                        <p>How Did you hear us</p>
                        <div class="checkbox-holder">
                            <div class="checkbox-item">
                                <input type="checkbox" id="website" name="hear[]" value="Website">
                                <label for="website"> Website</label>
                            </div>
                            <!--checkbox-item-->
                            <div class="checkbox-item">
                                <input type="checkbox" id="socialmedia" name="hear[]" value="Social Media">
                                <label for="socialmedia"> Social Media</label>
                            </div>
                            <!--checkbox-item-->
                            <div class="checkbox-item">
                                <input type="checkbox" id="relatives" name="hear[]" value="Relatives">
                                <label for="relatives"> Relatives or Friends</label>
                            </div>
                            <!--checkbox-item-->

                            <!-- <div class="form-item form-item__signature">
                                <p>Signature</p>
                                <div id="signature" name="hear">
                                    <canvas width="500" height="100"></canvas>
                                    <div class="controls">
                                        <a class="btn-green" href="#" id="clearSig">Reset Signature</a>
                                    </div>
                                </div>
                            </div> -->

                        </div>
                        <!--checkbox-holder-->
                        @error('hear')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror

                    </div>

                    <div class="form-item">

                        <div class="checkbox-holder">
                            <div class="checkbox-item">
                                <input type="checkbox" id="i-agree" name="i-agree" value="I Agree" required data-parsley-required-message="Terms and Condition not accepted">
                                <label for="i-agree"> By accepting this document, I hereby confirm the <a href="{{route('page.index','terms-and-agreement')}}">Terms and Agreement</a> .</label>
                            </div>
                            <!--checkbox-item-->
                        </div>
                        <!--checkbox-holder-->
                    </div>
                    <div class="form-item__button">
                        <button class="button button--tertiary" type="submit">Apply Now</button>

                    </div>
                </form>
            </div>
            <!--canadian-resident__fields-->

            <div class="international-students__fields">
                <form id="data" name="apply" method="post" action="{{route('apply.submit')}}" data-parsley-validate="">
                    @csrf
                    <input type="hidden" id="canadian-resident" name="option" value="international">
                    <h3>Personal Information</h3>
                    <div class="form-item__two-col">
                        <div class="form-item">
                            <label class="form-item__label" for="fname">First Name</label>
                            <input type="text" id="fname" name="first_name" placeholder="First Name" required="" data-parsley-required-message=" your first name is required">
                            @error('first_name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-item">
                            <label class="form-item__label" for="lname">Last Name</label>
                            <input type="text" id="lname" name="last_name" placeholder="Last Name" required="" data-parsley-required-message=" your last name is required">
                            @error('last_name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <!--form-item__two-col-->
                    <div class="form-item__two-col">
                        <div class="form-item">
                            <label class="form-item__label" for="email-intl">Email Address</label>
                            <input type="text" id="email-intl" name="email" placeholder="Email Address" required="" data-parsley-required-message="your email is required">
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-item">
                            <label class="form-item__label" for="nationality">Nationality</label>
                            <input type="text" id="nationality" name="nationality" placeholder="Nationality">
                            @error('nationality')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <!--form-item__two-col-->
                    <div class="form-item__two-col">
                        <div class="form-item">
                            <label class="form-item__label" for="passport">Passport Number</label>
                            <input type="text" id="passport" name="passport_number" placeholder="Passport">
                            @error('passport_number')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-item">
                            <label class="form-item__label" for="passport">Date of Birth</label>
                            <input type="date" id="date" name="date" placeholder="Date of Birth">
                            @error('date')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <!--form-item__two-col-->
                    <div class="form-item__two-col">

                        <div class="form-item__col2 form-item">
                            <p>Gender</p>
                            <div class="radio-holder">
                                <div class="radio-item">
                                    <input type="radio" id="male" name="gender" value="Male" checked>
                                    <label for="male">Male</label>
                                </div>

                                <div class="radio-item">
                                    <input type="radio" id="female" name="gender" value="Female">
                                    <label for="female">Female</label>
                                </div>
                            </div>
                            @error('gender')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <!--form-item__two-col-->

                    </div>
                    <!--form-item__col2-->

                    <h3>Contact Information</h3>
                    <div class="form-item">
                        <textarea id="textarea-intl" name="address" rows="4" cols="50" placeholder="Enter You Address"></textarea>
                        @error('address')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-item">
                        <label class="form-item__label" for="province">Province/State</label>
                        <input type="text" id="province" name="state" placeholder="Province / State">
                        @error('state')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-item">
                        <label class="form-item__label" for="country">Country</label>
                        <input type="text" id="country" name="country_name" placeholder="Enter Your Country Name">
                        @error('country')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-item">
                        <input type="text" id="zipcode-intl" name="zip_code" placeholder="Zip Code">
                        @error('zip_code')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <h3>Emergency Contact Information</h3>
                    <div class="form-item">
                        <input type="text" id="fullname" name="emergency_contact_name" placeholder="Full Name">
                        @error('contact_name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="form-item">
                        <textarea id="textarea-emergency" name="emergency_contact_address" rows="4" cols="50" placeholder="Enter You Address"></textarea>
                        @error('contact_address')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-item__two-col">
                        <div class="form-item">
                            <label class="form-item__label" for="province">Province/State</label>
                            <input type="text" id="province-emergency" name="emergency_contact_state" placeholder="Province / State">
                            @error('state')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-item">
                            <label class="form-item__label" for="country">Country</label>
                            <input type="text" id="country-emergency" name="emergency_contact_country_name" placeholder="Enter Your Country Name">
                            @error('country_name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-item__two-col">
                        <div class="form-item">
                            <input type="text" id="email-emergency" name="emergency_contact_email" placeholder="Email Address">
                            @error('contact_email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-item">
                            <input type="text" id="phone-emergency" name="emergency_contact_number" placeholder="Phone Number">
                            @error('number')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>


                    <h3>Program</h3>
                    <div class="form-item">

                        <select name="interest" id="courses2">
                            <option value="">Select program</option>
                            @foreach ($coursesInternational as $course)
                            <option value="{{$course->title}}">{{$course->title}}</option>
                            @endforeach
                        </select>
                        @error('interest')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <h3>Other Information</h3>
                    <div class="form-item">
                        <p>How Did you hear us</p>
                        <div class="checkbox-holder">
                            <div class="checkbox-item">
                                <input type="checkbox" id="agent" name="hear[]" value="Agent">
                                <label for="agent"> Agent</label>
                            </div>
                            <!--checkbox-item-->
                            <div class="checkbox-item">
                                <input type="checkbox" id="internet" name="hear[]" value="Internet">
                                <label for="internet"> Internet</label>
                            </div>
                            <!--checkbox-item-->
                            <div class="checkbox-item">
                                <input type="checkbox" id="search-engine" name="hear[]" value="Search Engine">
                                <label for="search-engine"> Search Engine</label>
                            </div>
                            <!--checkbox-item-->
                            <div class="checkbox-item">
                                <input type="checkbox" id="socialmedia2" name="hear[]" value="Social Media">
                                <label for="socialmedia2"> Social Media</label>
                            </div>
                            <!--checkbox-item-->
                            <div class="checkbox-item">
                                <input type="checkbox" id="relatives2" name="hear[]" value="Relatives">
                                <label for="relatives2"> Relatives or Friends</label>
                            </div>
                            <!--checkbox-item-->
                            <div class="checkbox-item">
                                <input type="checkbox" id="our-website" name="hear[]" value="Our Website">
                                <label for="our-website"> Our Website</label>
                            </div>
                            <!--checkbox-item-->

                            <div class="checkbox-item">
                                <input type="checkbox" id="others2" name="hear[]" value="Others">
                                <label for="others2"> Others</label>
                            </div>
                            <!--checkbox-item-->
                            <div class="form-item">
                                <input type="text" id="if-agent" name="agent_name" placeholder="if agent, mention name here...">
                            </div>
                            @error('hear')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <!--checkbox-holder-->

                    </div>
                    <div class="form-item">
                        <p>Application Check List*</p>
                        <div class="checkbox-holder">
                            <div class="checkbox-item">
                                <input type="checkbox" id="fees" name="checklist[]" value="Processing Fees">
                                <label for="fees"> $500 CAD Fee. Non-refundable and non-transferable for processing & documentation</label>
                            </div>
                            <!--checkbox-item-->
                            <div class="checkbox-item">
                                <input type="checkbox" id="translate" name="checklist[]" value="Trascript">
                                <label for="translate"> Translated & Notarized Transcript of Records from Highest level of Education</label>
                            </div>
                            <!--checkbox-item-->
                            <div class="checkbox-item">
                                <input type="checkbox" id="proof-of-english" name="checklist[]" value="Proof of English">
                                <label for="proof-of-english"> Proof of English Proficiency</label>
                            </div>
                            <!--checkbox-item-->

                        </div>
                        @error('checklist')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                        <!--checkbox-holder-->
                    </div>

                    <h2>Payment</h2>
                    <div class="form-item">
                        <p>Do you want to submit Online Payment. To secure your seat please do an online payment</p>
                        <div class="radio-holder">
                            <div class="radio-item">
                                <input type="radio" id="payment_yes" name="payment" value="Yes" checked>
                                <label for="payment_yes"> Yes</label>
                            </div>
                            <!--radio-item-->
                            <div class="radio-item">
                                <input type="radio" id="payment_no" name="payment" value="No">
                                <label for="payment_no"> No</label>
                            </div>
                            <!--checkbox-item-->

                        </div>
                        @error('payment')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                        <!--checkbox-holder-->
                    </div>
                    <div class="form-item">

                        <div class="checkbox-holder">
                            <div class="checkbox-item">
                                <input type="checkbox" id="i-agree2" name="i-agree2" value="I Agree" required data-parsley-required-message="Terms and Condition not accepted">
                                <label for="i-agree2"> By accepting this document, I hereby confirm the <a href="{{route('page.index','terms-and-agreement')}}">Terms and Agreement</a> .</label>
                            </div>
                            <!--checkbox-item-->
                        </div>
                        <!--checkbox-holder-->
                    </div>
                    <div class="form-item__button">
                        <button class="button button--tertiary" type="submit">Apply Now</button>

                    </div>
                </form>
            </div>

        </div>
    </div>

</main>
@endsection
@section('scripts')

<script type="text/javascript">
    $('#apply').parsley();
    $('#data').parsley();
</script>
@endsection