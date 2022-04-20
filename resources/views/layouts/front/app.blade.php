<!DOCTYPE html>
<html lang="en">

@include('layouts.front.head')
<!--begin::Body-->

<body>
    <div class="popup-message">
        <div class="container">
            <div class="popup-message__content">
                <p>Cookies message Cookies message Cookies message Cookies message Cookies message Cookies message Cookies message Cookies message Cookies message . We use cookies to personalise content and ads, to provide social media features and to analyse our traffic. We also share information about your use of our site with our social media, advertising and analytics partners.</p>
            </div>
            <a href="#" class="popup-message__close"> Close X</a>

        </div>

    </div>
    <section class="modal-box">
        <span class="modal-box__overlay"></span>
        <div class="modal-box__overflow">
            <div class="modal-box__inner">
                <div class="entry-content modal-box__body">
                    <h3>COVID-19 UPDATE</h3>
                    <p>
                        We have online class starting from March 06, due to Covid. We have online class starting from March 06, due to Covid. We have online class starting from March 06, due to Covid. We have online class starting from March 06, due to Covid.
                    </p>
                </div>
                <a class="btn" href="#" target="_blank">
                    Learn More
                </a>
                <button type="button" class="modal-close" title="Close">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                        <path d="M13 12l5-5-1-1-5 5-5-5-1 1 5 5-5 5 1 1 5-5 5 5 1-1z"></path>
                    </svg>
                </button>
            </div>
        </div>
    </section>
    <div class="main-content">
        @include('layouts.front.header')
        @yield('content')
    </div>
    @include('layouts.front.footer')

</body>

</html>