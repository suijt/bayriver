@extends('layouts.front.app')

@section('title', 'Contact Us')

@section('content')

<main class="site-content">
    @if(!empty(config('settings.site_apply_image')))
    <section class="inner-banner" style="background-image: url({{asset(config('settings.site_apply_image_image_path'))}})">
        <div class="inner-banner__content">
            <div class="container">
                <h1>{{config('settings.site_apply_title')}}</h1>
                <p>{{config('settings.site_apply_caption')}}</p>


            </div>
        </div>
        @endif

    </section>
     @if(!empty(config('settings.site_apply_map')))
    <div class="apply-now__admission-form" style="background-image: url({{asset(config('settings.site_apply_map_image_path'))}})">
        <div class="container">
            <h2>Enrollment</h2>
            <form id="apply" name="apply" method="post" action="{{route('apply.submit')}}" data-parsley-validate="">
                @csrf
                <div class="form-item form-item__radio-student">
                    <p>Which best describes you?  Please select an option</p>
                    <div class="form-item__col2 radio-holder">
                        <div class="radio-item">
                            <input type="radio" id="canadian-resident" name="option" value="Canadian" checked>
                            <label for="canadian-resident">Canadian Resident</label>
                        </div>

                        <div class="radio-item">
                            <input type="radio" id="international-student" name="option" value="international-student">
                            <label for="international-student">International Students</label>
                        </div>
                    </div><!--form-item__col2-->

                </div><!--form-item-->

                <div class="canadian-resident__fields">
                    <div class="form-item__two-col">
                        <div class="form-item">
                            <input type="text" id="firstname" name="first_name" placeholder="First Name" required="this value is required">
                        </div>
                        <div class="form-item">
                            <input type="text" id="lastname" name="last_name" placeholder="Last Name" required="">
                        </div>
                    </div><!--form-item__two-col-->

                    <div class="form-item__two-col">
                        <div class="form-item">
                            <input type="text" id="email" name="email" placeholder="Email Address">
                        </div>
                        <div class="form-item">
                            <input type="number" id="phone" name="phone_number" placeholder="Phone Number">
                        </div>
                    </div><!--form-item__two-col-->

                    <div class="form-item">
                        <textarea id="textarea" name="address" rows="4" cols="50" placeholder="Enter You Address"></textarea>
                    </div>

                    <div class="form-item">
                        <p>What is your preferred study time?*</p>
                        <div class="checkbox-holder" name="study">
                            <div class="checkbox-item">
                                <input type="checkbox" id="morning" name="study" value="Morning">
                                <label for="morning"> Morning</label>
                            </div><!--checkbox-item-->
                            <div class="checkbox-item">
                                <input type="checkbox" id="afternoon" name="study" value="Afternoon">
                                <label for="afternoon"> Afternoon</label>
                            </div><!--checkbox-item-->
                            <div class="checkbox-item">
                                <input type="checkbox" id="evening" name="study" value="Evening">
                                <label for="evening"> Evening</label>
                            </div><!--checkbox-item-->
                        </div><!--checkbox-holder-->
                    </div>

                    <div class="form-item">
                        <p> What program are you interested in?*                         </p>
                        <select name="interest" id="courses">
                            <option value="international-business-management-diploma">International Business Management Diploma</option>
                            <option value="hospitality-business-banagement-biploma">Hospitality Business Management Diploma</option>
                            <option value="Information-Technolog-Network-Administrator-Diploma">Information Technology & Network Administrator Diploma</option>
                            <option value="Cyber-security-Cloud-Computing-Diploma">Cyber Security & Cloud Computing Diploma</option>
                            <option value="security">Health Care Aide Diploma</option>
                            <option value="cyber-security">Pharmacy Assistant Diploma</option>
                        </select>
                    </div>
                    <div class="form-item">
                        <p>What is your preferred study time?*</p>
                        <div class="checkbox-holder">
                            <div class="checkbox-item">
                                <input type="checkbox" id="highschool" name="time" value="High School">
                                <label for="highschool"> High School</label>
                            </div><!--checkbox-item-->
                            <div class="checkbox-item">
                                <input type="checkbox" id="college" name="time" value="College">
                                <label for="college"> College</label>
                            </div><!--checkbox-item-->
                            <div class="checkbox-item">
                                <input type="checkbox" id="university" name="time" value="University">
                                <label for="university"> University</label>
                            </div><!--checkbox-item-->
                            <div class="checkbox-item">
                                <input type="checkbox" id="others" name="time" value="Others">
                                <label for="others"> Others</label>
                            </div><!--checkbox-item-->
                        </div><!--checkbox-holder-->
                    </div>

                    <div class="form-item">
                        <p>How Did you hear us</p>
                        <div class="checkbox-holder">
                            <div class="checkbox-item">
                                <input type="checkbox" id="website" name="hear" value="Website">
                                <label for="website"> Website</label>
                            </div><!--checkbox-item-->
                            <div class="checkbox-item">
                                <input type="checkbox" id="socialmedia" name="hear" value="Social Media">
                                <label for="socialmedia"> Social Media</label>
                            </div><!--checkbox-item-->
                            <div class="checkbox-item">
                                <input type="checkbox" id="relatives" name="hear" value="Relatives">
                                <label for="relatives"> Relatives or Friends</label>
                            </div><!--checkbox-item-->

                            <div class="form-item form-item__signature">
                                <p>Signature</p>
                                <div id="signature">
                                    <canvas width="500" height="100"></canvas>
                                    <div class="controls">
                                        <a class="btn-green" href="#" id="clearSig" >Reset Signature</a>
                                    </div>
                                </div>
                            </div>

                        </div><!--checkbox-holder-->
                    </div>

                    <div class="form-item">

                        <div class="checkbox-holder">
                            <div class="checkbox-item">
                                <input type="checkbox" id="i-agree" name="i-agree" value="I Agree">
                                <label for="i-agree"> By accepting this document, I hereby confirm the <a href="privacy.html">terms and agreement</a> .</label>
                            </div><!--checkbox-item-->
                        </div><!--checkbox-holder-->
                    </div>
                </div><!--canadian-resident__fields-->

                <div class="international-students__fields">
                    <h3>Personal Information</h3>
                    <div class="form-item__two-col">
                        <div class="form-item">
                            <label class="form-item__label" for="fname">First Name</label>
                            <input type="text" id="fname" name="first_name" placeholder="First Name" required="">
                        </div>
                        <div class="form-item">
                            <label class="form-item__label" for="lname">Last Name</label>
                            <input type="text" id="lname" name="last_name" placeholder="Last Name" required="">
                        </div>
                    </div><!--form-item__two-col-->
                    <div class="form-item__two-col">
                        <div class="form-item">
                            <label class="form-item__label" for="email-intl">Email Address</label>
                            <input type="text" id="email-intl" name="email" placeholder="Email Address">
                        </div>
                        <div class="form-item">
                            <label class="form-item__label" for="nationality">Nationality</label>
                            <input type="text" id="nationality" name="nationality" placeholder="Nationality">
                        </div>
                    </div><!--form-item__two-col-->
                    <div class="form-item__two-col">
                        <div class="form-item">
                            <label class="form-item__label" for="passport">Passport Number</label>
                            <input type="text" id="passport" name="passport_number" placeholder="Passport">
                        </div>

                        <div class="form-item">
                            <label class="form-item__label" for="passport">Date of Birth</label>
                            <input type="date" id="date" name="date" placeholder="Date of Birth">
                        </div>
                    </div><!--form-item__two-col-->
                    <div class="form-item__two-col">

                        <div class="form-item__col2 form-item">
                            <p>Gender</p>
                            <div class="radio-holder">
                                <div class="radio-item">
                                    <input type="radio" id="male" name="gender" value="Male" checked>
                                    <label for="canadian-resident">Male</label>
                                </div>

                                <div class="radio-item">
                                    <input type="radio" id="female" name="gender" value="Female">
                                    <label for="female">Female</label>
                                </div>
                            </div>
                        </div><!--form-item__two-col-->

                    </div><!--form-item__col2-->

                    <h3>Contact Information</h3>
                    <div class="form-item">
                        <textarea id="textarea-intl" name="address" rows="4" cols="50" placeholder="Enter You Address"></textarea>
                    </div>
                    <div class="form-item">
                        <label class="form-item__label" for="province">Province/State</label>
                        <input type="text" id="province" name="state" placeholder="Province / State">
                    </div>
                    <div class="form-item">
                        <label class="form-item__label" for="country">Country</label>
                        <input type="text" id="country" name="country_name" placeholder="Enter Your Country Name">
                    </div>
                    <div class="form-item">
                        <input type="text" id="zipcode-intl" name="zip_code" placeholder="Zip Code">
                    </div>

                    <h3>Emergency Contact Information</h3>
                    <div class="form-item">
                        <input type="text" id="fullname" name="emergency_contact_name" placeholder="Full Name">
                    </div>

                    <div class="form-item">
                        <textarea id="textarea-emergency" name="emergency_contact_address" rows="4" cols="50" placeholder="Enter You Address"></textarea>
                    </div>
                    <div class="form-item__two-col">
                        <div class="form-item">
                            <label class="form-item__label" for="province">Province/State</label>
                            <input type="text" id="province-emergency" name="emergency_contact_state" placeholder="Province / State">
                        </div>
                        <div class="form-item">
                            <label class="form-item__label" for="country">Country</label>
                            <input type="text" id="country-emergency" name="emergency_contact_country_name" placeholder="Enter Your Country Name">
                        </div>
                    </div>

                    <div class="form-item__two-col">
                        <div class="form-item">
                            <input type="text" id="email-emergency" name="emergency_contact_email" placeholder="Email Address">
                        </div>
                        <div class="form-item">
                            <input type="text" id="phone-emergency" name="emergency_contact_number" placeholder="Phone Number">
                        </div>
                    </div>


                    <h3>Program</h3>
                    <div class="form-item">

                        <select name="interest" id="courses">
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
                                <input type="checkbox" id="agent" name="hear" value="Agent">
                                <label for="agent"> Agent</label>
                            </div><!--checkbox-item-->
                            <div class="checkbox-item">
                                <input type="checkbox" id="internet" name="hear" value="Internet">
                                <label for="internet"> Internet</label>
                            </div><!--checkbox-item-->
                            <div class="checkbox-item">
                                <input type="checkbox" id="search-engine" name="hear" value="Search Engine">
                                <label for="search-engine"> Search Engine</label>
                            </div><!--checkbox-item-->
                            <div class="checkbox-item">
                                <input type="checkbox" id="socialmedia2" name="hear" value="Social Media">
                                <label for="socialmedia2"> Social Media</label>
                            </div><!--checkbox-item-->
                            <div class="checkbox-item">
                                <input type="checkbox" id="relatives2" name="hear" value="Relatives">
                                <label for="relatives2"> Relatives or Friends</label>
                            </div><!--checkbox-item-->
                            <div class="checkbox-item">
                                <input type="checkbox" id="our-website" name="hear" value="our-website">
                                <label for="our-website"> Our Website</label>
                            </div><!--checkbox-item-->

                            <div class="checkbox-item">
                                <input type="checkbox" id="others2" name="hear" value="Others">
                                <label for="others2"> Others</label>
                            </div><!--checkbox-item-->
                            <div class="form-item">
                                <input type="text" id="if-agent" name="hear" placeholder="if agent, mention name here...">
                            </div>
                        </div><!--checkbox-holder-->

                    </div>

                    <div class="form-item">
                        <p>Application Check List*</p>
                        <div class="checkbox-holder">
                            <div class="checkbox-item">
                                <input type="checkbox" id="fees" name="checklist" value="Fees">
                                <label for="agent"> $500 CND Fee. Non refunable & transferable for processing & documentation</label>
                            </div><!--checkbox-item-->
                            <div class="checkbox-item">
                                <input type="checkbox" id="translate" name="checklist" value="Translate">
                                <label for="internet"> Translated & Natorized Trascript from Highest level of Education</label>
                            </div><!--checkbox-item-->
                            <div class="checkbox-item">
                                <input type="checkbox" id="proof-of-english" name="checklist" value="Proof of English">
                                <label for="search-engine"> Proof of Engine Proficiency</label>
                            </div><!--checkbox-item-->

                        </div><!--checkbox-holder-->
                    </div>

                    <h2>Payment</h2>
                    <div class="form-item">
                        <p>Do you want to submit Online Payment. To secure your seat please do an online payment</p>
                        <div class="checkbox-holder">
                            <div class="checkbox-item">
                                <input type="checkbox" id="yes" name="payment" value="Yes">
                                <label for="yes"> Yes</label>
                            </div><!--checkbox-item-->
                            <div class="checkbox-item">
                                <input type="checkbox" id="no" name="payment" value="No">
                                <label for="college"> College</label>
                            </div><!--checkbox-item-->

                        </div><!--checkbox-holder-->
                    </div>
                    <div class="form-item">

                        <div class="checkbox-holder">
                            <div class="checkbox-item">
                                <input type="checkbox" id="i-agree2" name="i-agree2" value="I Agree">
                                <label for="i-agree2"> By accepting this document, I hereby confirm the <a href="privacy.html">terms and agreement</a> .</label>
                            </div><!--checkbox-item-->
                        </div><!--checkbox-holder-->
                    </div>

                </div><!--international-students__fields-->
                <div class="form-item__button">
                    <button class="button button--tertiary" type="submit">Apply Now</button>

                </div>
            </form>
        </div>
    </div>
@endif

</main>
@endsection
@section('scripts')
<script src="https://parsleyjs.org/dist/parsley.min.js"></script>
<script type="text/javascript">
    $('#data').parsley();
</script>
@endsection
