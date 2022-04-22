<!DOCTYPE html>
<html lang="en">
@include('layouts.admin.head')
<!--begin::Body-->

<body id="kt_body" class="header-fixed header-tablet-and-mobile-fixed toolbar-enabled toolbar-fixed toolbar-tablet-and-mobile-fixed aside-enabled aside-fixed" style="--kt-toolbar-height:55px;--kt-toolbar-height-tablet-and-mobile:55px">
    @if (auth()->guest())
    @yield('guest')
    @else
    <!--begin::Main-->
    <div class="d-flex flex-column flex-root">
        <!--begin::Page-->
        <div class="page d-flex flex-row flex-column-fluid">
            @include('layouts.admin.sidebar')
            <!--begin::Wrapper-->
            <div class="wrapper d-flex flex-column flex-row-fluid " id="kt_wrapper">
                <!--begin::header-->
                @include('layouts.admin.header')
                <!--end::header-->
                <!--begin::Content-->
                <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
                    @yield('breadcrumb')

                    <div class="post container-fluid" id="kt_post">
                        @yield('content')
                    </div>
                </div>
                <!--end::Content-->
            </div>
            <!--end::Wrapper-->
        </div>
        @endif
        <!--end::Page-->
    </div>
    <!--end::Root-->

    @include('layouts.admin.footer')
    <!--end::Javascript-->
</body>
<!--end::Body-->

</html>