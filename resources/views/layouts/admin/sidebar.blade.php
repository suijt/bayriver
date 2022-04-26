<!--begin::Aside-->
<div id="kt_aside" class="aside aside-light aside-hoverable" data-kt-drawer="true" data-kt-drawer-name="aside" data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true" data-kt-drawer-width="{default:'200px', '300px': '250px'}" data-kt-drawer-direction="start" data-kt-drawer-toggle="#kt_aside_mobile_toggle">
    <!--begin::Brand-->
    <div class="aside-logo flex-column-auto" id="kt_aside_logo">
        <!--begin::Logo-->
        <a href="{{asset('assets/front/images/logo.png')}}">
            <img alt="Logo" src="{{asset('assets/front/images/logo.png')}}" class="h-15px logo" />
        </a>
        <!--end::Logo-->
        <!--begin::Aside toggler-->
        <div id="kt_aside_toggle" class="btn btn-icon w-auto px-0 btn-active-color-primary aside-toggle" data-kt-toggle="true" data-kt-toggle-state="active" data-kt-toggle-target="body" data-kt-toggle-name="aside-minimize">
            <!--begin::Svg Icon | path: icons/duotone/Navigation/Angle-double-left.svg-->
            <span class="svg-icon svg-icon-1 rotate-180">
                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                        <polygon points="0 0 24 0 24 24 0 24" />
                        <path d="M5.29288961,6.70710318 C4.90236532,6.31657888 4.90236532,5.68341391 5.29288961,5.29288961 C5.68341391,4.90236532 6.31657888,4.90236532 6.70710318,5.29288961 L12.7071032,11.2928896 C13.0856821,11.6714686 13.0989277,12.281055 12.7371505,12.675721 L7.23715054,18.675721 C6.86395813,19.08284 6.23139076,19.1103429 5.82427177,18.7371505 C5.41715278,18.3639581 5.38964985,17.7313908 5.76284226,17.3242718 L10.6158586,12.0300721 L5.29288961,6.70710318 Z" fill="#000000" fill-rule="nonzero" transform="translate(8.999997, 11.999999) scale(-1, 1) translate(-8.999997, -11.999999)" />
                        <path d="M10.7071009,15.7071068 C10.3165766,16.0976311 9.68341162,16.0976311 9.29288733,15.7071068 C8.90236304,15.3165825 8.90236304,14.6834175 9.29288733,14.2928932 L15.2928873,8.29289322 C15.6714663,7.91431428 16.2810527,7.90106866 16.6757187,8.26284586 L22.6757187,13.7628459 C23.0828377,14.1360383 23.1103407,14.7686056 22.7371482,15.1757246 C22.3639558,15.5828436 21.7313885,15.6103465 21.3242695,15.2371541 L16.0300699,10.3841378 L10.7071009,15.7071068 Z" fill="#000000" fill-rule="nonzero" opacity="0.5" transform="translate(15.999997, 11.999999) scale(-1, 1) rotate(-270.000000) translate(-15.999997, -11.999999)" />
                    </g>
                </svg>
            </span>
            <!--end::Svg Icon-->
        </div>
        <!--end::Aside toggler-->
    </div>
    <!--end::Brand-->
    <!--begin::Aside menu-->
    <div class="aside-menu flex-column-fluid">

        <!--begin::Aside Menu-->
        <div class="hover-scroll-overlay-y my-5 my-lg-5" id="kt_aside_menu_wrapper" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-height="auto" data-kt-scroll-dependencies="#kt_aside_logo, #kt_aside_footer" data-kt-scroll-wrappers="#kt_aside_menu" data-kt-scroll-offset="0">
            <!--begin::Menu-->
            <div class="menu menu-column menu-title-gray-800 menu-state-title-primary menu-state-icon-primary menu-state-bullet-primary menu-arrow-gray-500" id="#kt_aside_menu" data-kt-menu="true" data-kt-menu-expand="false">
                <div class="menu-item">
                    <div class="menu-content pb-2">
                        <span class="menu-section text-muted text-uppercase fs-8 ls-1">Dashboard</span>
                    </div>
                </div>
                <div data-kt-menu-trigger="click" class="menu-item here show menu-accordion">
                    <a class="menu-link {{ request()->is('admin/dashboard') || request()->is('admin/dashboard/*')
                        ? " active" : "" }}" href="{{route('admin.dashboard')}}">
                        <span class="menu-icon">
                            <i class="bi bi-grid fs-3"></i>
                        </span>
                        <span class="menu-title">Home</span>
                    </a>
                </div>
                <div class="menu-item">
                    <a class="menu-link {{ request()->is('admin/slider') || request()->is('admin/slider/*')
                        ? " active" : "" }}" href="{{route('admin.slider.index')}}">
                        <span class="menu-icon">
                            <i class="bi bi-images fs-3"></i>
                        </span>
                        <span class="menu-title">Slider Management</span>
                    </a>
                </div>
                <div class="menu-item">
                    <div class="menu-item">
                        <a class="menu-link {{ request()->is('admin/client') || request()->is('admin/client/*')
                        ? " active" : "" }}" href="{{route('admin.client.index')}}">
                            <span class="menu-icon">
                                <i class="bi bi-briefcase fs-3"></i>

                            </span>
                            <span class="menu-title">Clients/Partners</span>
                        </a>
                    </div>
                </div>
                <div class="menu-item">
                    <div class="menu-item">
                        <a class="menu-link {{ request()->is('admin/testimonial') || request()->is('admin/testimonial/*')
                        ? " active" : "" }}" href="{{route('admin.testimonial.index')}}">
                            <span class="menu-icon">
                                <i class="bi bi-back fs-3"></i>

                            </span>
                            <span class="menu-title">Testimonials/Reviews</span>
                        </a>
                    </div>
                </div>
                <div class="menu-item">
                    <div class="menu-item">
                        <a class="menu-link {{ request()->is('admin/category') || request()->is('admin/category/*')
                        ? " active" : "" }}" href="{{route('admin.category.index')}}">
                            <span class="menu-icon">
                                <i class="bi bi-grid-3x2-gap fs-3"></i>
                            </span>
                            <span class="menu-title">Category Management</span>
                        </a>
                    </div>
                </div>
                <div class="menu-item">
                    <div class="menu-item">
                        <a class="menu-link {{ request()->is('admin/country') || request()->is('admin/country/*')
                        ? " active" : "" }}" href="{{route('admin.country.index')}}">
                            <span class="menu-icon">
                                <i class="bi bi-globe fs-3"></i>

                            </span>
                            <span class="menu-title">Country Management</span>
                        </a>
                    </div>
                </div>
                <div class="menu-item">
                    <div class="menu-item">
                        <a class="menu-link {{ request()->is('admin/course') || request()->is('admin/course/*')
                        ? " active" : "" }}" href="{{route('admin.course.index')}}">
                            <span class="menu-icon">
                                <i class="bi bi-folder fs-3"></i>

                            </span>
                            <span class="menu-title">Course Management</span>
                        </a>
                    </div>
                </div>
                <div class="menu-item">
                    <div class="menu-item">
                        <a class="menu-link {{ request()->is('admin/news') || request()->is('admin/news/*')
                        ? " active" : "" }}" href="{{route('admin.news.index')}}">
                            <span class="menu-icon">
                                <i class="bi bi-newspaper fs-3"></i>

                            </span>
                            <span class="menu-title">News/Event Management</span>
                        </a>
                    </div>
                </div>
                <div class="menu-item">
                    <div class="menu-item">
                        <a class="menu-link {{ request()->is('admin/setting') || request()->is('admin/setting/*')
                        ? " active" : "" }}" href="{{route('admin.setting.index')}}">
                            <span class="menu-icon">
                                <i class="bi bi-pen fs-3"></i>

                            </span>
                            <span class="menu-title">Content Management</span>
                        </a>
                    </div>
                </div>
                <div class="menu-item">
                    <div class="menu-item">
                        <a class="menu-link {{ request()->is('admin/inquiry') || request()->is('admin/inquiry/*')
                        ? " active" : "" }}" href="{{route('admin.inquiry.index')}}">
                            <span class="menu-icon">
                                <i class="bi bi-pencil-square fs-3"></i>

                            </span>
                            <span class="menu-title">Inquiries</span>
                        </a>
                    </div>
                </div>
                <div class="menu-item">
                    <div class="menu-item">
                        <a class="menu-link {{ request()->is('admin/page') || request()->is('admin/page/*')
                        ? " active" : "" }}" href="{{route('admin.page.index')}}">
                            <span class="menu-icon">
                                <i class="bi bi-file fs-3"></i>

                            </span>
                            <span class="menu-title">Pages</span>
                        </a>
                    </div>
                </div>
                <div class="menu-item">
                    <div class="menu-item">
                        <a class="menu-link {{ request()->is('admin/faq') || request()->is('admin/faq/*')
                        ? " active" : "" }}" href="{{route('admin.faq.index')}}">
                            <span class="menu-icon">
                                <i class="bi bi-pencil-square fs-3"></i>

                            </span>
                            <span class="menu-title">FAQ</span>
                        </a>
                    </div>
                </div>
                <!--end::Menu-->
            </div>
            <!--end::Aside Menu-->
        </div>
        <!--end::Aside menu-->
    </div>
</div>
<!--end::Aside-->
