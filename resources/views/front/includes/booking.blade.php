<div class="form-item">
    <!-- <label for="name">Name</label>-->
    <input type="text" id="name" name="name" placeholder="Your Name.." required="" data-parsley-required-message = "Your name is required" data-parsley-trigger="change focusout">
    @error('name')
    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                             </span>
    @enderror
</div>
<div class="form-item">
    <!--<label for="email">Email</label>-->
    <input type="email" id="email" name="email" placeholder="Email" required="" data-parsley-required-message = "Your email is required" >
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

<div class="form-button">
    <input class="button" type="submit" value="Submit Now">
</div>
