@extends('layouts.admin.app')

@section('title', 'Login')

@section('guest')
<!--begin::Main-->
<div class="d-flex flex-column flex-root">
    <!--begin::Authentication - Signup Free Trial-->
    <div class="d-flex flex-column flex-xl-row flex-column-fluid">
        <!--begin::Aside-->
        <div class="d-flex flex-column flex-lg-row-fluid">
            <!--begin::Wrapper-->
            <div class="d-flex flex-row-fluid flex-center p-10">
                <!--begin::Content-->
                <div class="d-flex flex-column">
                    <!--begin::Logo-->
                    <a href="#" class="mb-15">
                        <h1 class="display-1">{{ __('Reset Password') }}</h1>
                    </a>
                    <!--end::Logo-->
                    <!--begin::Title-->
                    <h1 class="text-dark fs-2x mb-3">Welcome,</h1>
                    <!--end::Title-->
                    <!--begin::Description-->
                    <div class="fw-bold fs-4 text-gray-400 mb-10">You must enter email to reset Password
                        <br /><a href="{{route('login')}}">Back to Login.</a>
                    </div>
                    <!--begin::Description-->
                </div>
                <!--end::Content-->
            </div>
            <!--end::Wrapper-->
            <!--begin::Illustration-->
            <div class="d-flex flex-row-auto bgi-no-repeat bgi-position-x-center bgi-size-contain bgi-position-y-bottom min-h-200px min-h-xl-300px mb-xl-10" style="background-image: url({{asset('assets/admin/media/illustrations/networks.png')}}"></div>
            <!--end::Illustration-->
        </div>
        <!--begin::Aside-->
        <!--begin::Content-->
        <div class="flex-row-fluid d-flex flex-center justfiy-content-xl-first p-10">
            <!--begin::Wrapper-->
            <div class="d-flex flex-center p-15 shadow rounded w-100 w-md-550px mx-auto ms-xl-20">
                <!--begin::Form-->
                <form method="POST" class="form" action="{{ route('password.update') }}">
                    @csrf
                    <input type="hidden" name="token" value="{{ $token }}">
                    <!--begin::Input group-->
                    <div class="fv-row mb-10">
                        <label class="form-label fw-bolder text-dark fs-6">{{ __('Email Address') }}</label>
                        <input class="form-control form-control-solid @error('email') is-invalid @enderror" id="email" placeholder="Enter your email address" type="email" placeholder="" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus />
                        @error('email')
                        <div class="fv-plugins-message-container">
                            <div data-field="email" class="fv-help-block">{{ $message}}</div>
                        </div>
                        @enderror
                    </div>
                    <!--end::Input group-->
                    <!--begin::Input group-->
                    <div class="fv-row mb-10">
                        <label class="form-label fw-bolder text-dark fs-6">{{ __('Password') }}</label>
                        <input class="form-control form-control-solid @error('password') is-invalid @enderror" id="password" placeholder="Enter your new password" type="password" placeholder="" name="password" required autocomplete="new-password" />
                        @error('password')
                        <div class="fv-plugins-message-container">
                            <div data-field="password" class="fv-help-block">{{ $message}}</div>
                        </div>
                        @enderror
                    </div>
                    <!--end::Input group-->
                    <!--begin::Input group-->
                    <div class="fv-row mb-10">
                        <label class="form-label fw-bolder text-dark fs-6">{{ __('Confirm Password') }}</label>
                        <input class="form-control form-control-solid" id="password-confirm" placeholder="Confirm your new password" type="password" placeholder="" name="password_confirmation" required autocomplete="new-password" />
                    </div>
                    <!--end::Input group-->
                    <!--begin::Row-->
                    <div class="text-center pb-lg-0 pb-8">
                        <button type="submit" class="btn btn-lg btn-primary fw-bolder">
                            <span class="indicator-label">{{ __('Reset Password') }}</span>
                        </button>
                    </div>
                    <!--end::Row-->
                </form>
                <!--end::Form-->
            </div>
            <!--end::Wrapper-->
        </div>
        <!--end::Right Content-->
    </div>
    <!--end::Authentication - Signup Free Trial-->
</div>
<!--end::Main-->
@endsection