<footer class="site-footer">
    <div class="site-footer__primary">
        <div class="container flex-container">
            <div class="footer-col col1">
                @if(!empty(config('settings.site_footer_image')))
                <a class="footer-logo" href="{{config('settings.site_footer_logo_link')}}"><img src="{{asset(config('settings.site_footer_image_image_path'))}}" alt="Logo"></a>
                @endif
                    <h3>{{config('settings.site_footer_title')}}</h3>
                    <ul class="social-media">
                    <li><a href="{{config('settings.site_footer_icon_1_link')}}" target="_blank"> <i class="fab fa-twitter"></i></a></li>
                    <li><a href="{{config('settings.site_footer_icon_2_link')}}" target="_blank"> <i class="fab fa-facebook-f"></i></a> </li>
                    <li><a href="{{config('settings.site_footer_icon_3_link')}}" target="_blank"> <i class="fab fa-instagram"></i></a> </li>

                </ul>
            </div>
            <!--footer-col col1-->

            <div class="footer-col col2">
                <!--   <h3>Highlights</h3>-->
                <ul class="footer-menu">
                    @foreach (pages() as $page)
                    <li> <a href="{{route('page.index', $page->slug)}}">{{$page->name}} </a> </li>
                    @endforeach
                </ul>

            </div><!-- footer-col col1-->
            <div class="footer-col col3">
                <!--    <h3>Admission & Career</h3>-->
                <ul class="footer-menu">
                    @foreach (active_page() as $page)
                        <li> <a href="{{route('page.index', $page->slug)}}">{{$page->name}} </a> </li>
                    @endforeach
                </ul>

            </div>
            <div class="footer-col col4">

                <ul class="footer-contact">

                    <li>
                        <i class="fa-solid fa-map-location"></i>
                        <address class="footer-contact__detail"> <a href="#"> {{config('settings.site_footer_state_number')}}</br>{{config('settings.site_footer_state')}}</a>
                        </address>
                    </li>
                    <li><i class="fa-solid fa-phone"></i> <a class="footer-contact__detail" href="tel:14444">{{config('settings.site_footer_number')}}</a> </li>
                    <li><i class="fa-solid fa-envelope"></i> <a class="footer-contact__detail" href="mailto:info@gis.com">{{config('settings.site_footer_email')}}</a> </li>
                </ul>
            </div>
        </div>
        <!--container-->
    </div>
    <div class="site-footer__secondary">
        <div class="container flex-container">
            <div class="copyright">
                <p>{{config('settings.site_footer_bottom_left')}} </p>

            </div>
            <!--copyright-->
            <div class="footer-credit">
                <p>Powered By: <a href="{{config('settings.site_footer_bottom_right_link')}}" target="_blank">{{config('settings.site_footer_bottom_right')}}</a></p>

            </div>
            <!--copyright-->
        </div>
        <!--container-->
    </div>

</footer>

<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0/dist/fancybox.umd.js"></script>
<script src="{{asset('assets/front/js/slick.min.js')}}"></script>
<script src="{{asset('assets/front/js/easyResponsiveTabs.js')}}"></script>
<script src="{{asset('assets/front/js/menu.js')}}"></script>
<script src="{{asset('assets/front/js/custom.js')}}"></script>
