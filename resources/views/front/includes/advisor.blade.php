<div class="form-item">
    <!--  <label for="name">Name</label>-->
    <input type="hidden" name="program_name" value="{{$course->title ?? $country->title}}">
    <input type="text" id="name2" name="name" placeholder="Your name.." required="" data-parsley-required-message="Your name is required">
    @error('name')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror
</div>
<div class="form_two-col">
    <div class="form-item">
        <!-- <label for="email">Email</label>-->
        <input type="email" id="email2" name="email" placeholder="Email" required="" data-parsley-required-message="Your email is required">
        @error('email')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
    <div class="form-item">
        <!-- <label for="phone">Phone</label>-->
        <input type="text" id="phone2" name="phone" placeholder="Phone">
        @error('phone')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>
<!--form_two-col-->
<div class="form-item">
    <!-- <label for="phone">Phone</label>-->
    <select name="interest">
        <option value="Interested In">Interested In </option>
        <option value="Class Room Leaning">Class Room Leaning </option>
        <option value="Online Learning">Online Learning </option>

    </select>
    @error('interest')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror
</div>
<div class="form-item">
    <!-- <label for="phone">Phone</label>-->
    <textarea placeholder="Describe yourself here..." name="message"></textarea>
    @error('message')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror
</div>
<div class="form-item">
    <div class="g-recaptcha" id="feedback-recaptcha" data-sitekey="{{ env('GOOGLE_RECAPTCHA_KEY')  }}"></div>
</div>
<div class="form-button">
    <input class="button button--white" type="submit" value="Submit Now">
</div>