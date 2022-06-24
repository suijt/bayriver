<div class="form-item">
    <!-- <label for="name">Name</label>-->
    @if($type == 'front')
    <div class="form-item">
        <!-- <label for="phone">Phone</label>-->
        <select name="program" required>
            <option value="">Select Program</option>
            @foreach ($allCourses as $course)
            <option value="{{$course->title}}">{{$course->title}} </option>
            @endforeach

        </select>
        @error('program')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
    @else
    <input type="hidden" name="program" value="@if(isset($course->title)){{ $course->title }}@elseif(isset($country->title)){{$country->title }} @endif">
    @endif
    <input type="text" id="name" name="name" placeholder="Your Name.." required="" data-parsley-required-message="Your name is required" data-parsley-trigger="change focusout">
    @error('name')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror
</div>
<div class="form-item">
    <!--<label for="email">Email</label>-->
    <input type="email" id="email" name="email" placeholder="Email" required="" data-parsley-required-message="Your email is required">
    @error('email')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror
</div>
<div class="form-item">
    <!-- <label for="phone">Phone</label>-->
    <input type="text" id="phone" name="phone" placeholder="Phone">
    @error('phone')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror
</div>
<div class="form-item">
    <!--  <label for="address">Address</label>-->
    <input type="text" id="address" name="address" placeholder="Address">
    @error('address')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror
</div>
<div class="form-item">
    <!-- <label for="date">Date</label>-->
    <input type="date" id="date" name="date" placeholder="Date">
    @error('date')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror
</div>
<div class="form-item">
    <div class="g-recaptcha" id="feedback-recaptcha" data-sitekey="{{ env('GOOGLE_RECAPTCHA_KEY')  }}"></div>
</div>
<div class="form-button">
    <input class="button" type="submit" value="Submit Now">
</div>