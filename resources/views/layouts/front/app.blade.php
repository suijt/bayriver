<!DOCTYPE html>
<html lang="en">

@include('layouts.front.head')
<!--begin::Body-->

<body>
    @if(config('settings.site_cookies_message'))
    <div class="popup-message">
        <div class="container">
            <div class="popup-message__content">
                {!! config('settings.site_cookies_message') !!}
            </div>
            <a href="#" class="popup-message__close"> Close X</a>

        </div>

    </div>
    @endif
    @if(config('settings.site_popup_message'))
    <section class="modal-box">
        <span class="modal-box__overlay"></span>
        <div class="modal-box__overflow">
            <div class="modal-box__inner">
                <div class="entry-content modal-box__body">
                    <h3>{{config('settings.site_popup_title')}}</h3>
                    {!! config('settings.site_popup_message') !!}
                </div>
                <a class="btn" href="{{config('settings.site_popup_link')}}" target="_blank">
                    {{config('settings.site_popup_button_text')}}
                </a>
                <button type="button" class="modal-close" title="Close">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                        <path d="M13 12l5-5-1-1-5 5-5-5-1 1 5 5-5 5 1 1 5-5 5 5 1-1z"></path>
                    </svg>
                </button>
            </div>
        </div>
    </section>
    @endif
    <div class="main-content">
        @include('layouts.front.header')
        @yield('content')
    </div>
    @include('layouts.front.footer')

</body>

</html>