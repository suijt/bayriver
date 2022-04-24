@extends('layouts.front.app')

@section('title', 'Alumni')

@section('content')
<main class="site-content">
    @if(!empty(config('settings.site_alumni_image')))
    <section class="inner-banner" style="background-image: url({{asset(config('settings.site_alumni_image_image_path'))}});">
        <div class="inner-banner__content">
            <div class="container">
                <h1>{{config('settings.site_alumni_title')}} </h1>
                <p>{{config('settings.site_alumni_short_description')}}</p>
            </div>
        </div>
    </section>
    @endif

    <div class="tab-holder">
        <section class="course-nav">
            <div class="container">
                <ul class="hor_1 resp-tabs-list course-nav__navigation">
                    @if(config('settings.site_alumni_title'))
                    <li>{{config('settings.site_alumni_title')}}</li>
                    @endif
                    @if(config('settings.site_alumni_title1'))
                    <li>{{config('settings.site_alumni_title1')}}</li>
                    @endif
                    @if(config('settings.site_alumni_title2'))
                    <li>{{config('settings.site_alumni_title2')}}</li>
                    @endif
                    @if(config('settings.site_alumni_title3'))
                    <li>{{config('settings.site_alumni_title3')}}</li>
                    @endif
                    @if(config('settings.site_alumni_title4'))
                    <li>{{config('settings.site_alumni_title4')}}</li>
                    @endif
                    @if(config('settings.site_alumni_title5'))
                    <li>{{config('settings.site_alumni_title5')}}</li>
                    @endif
                </ul>
            </div>
        </section>
        <div class="general-page" style="background-image: url('images/map-bg.png');">
            <div class="container flex-container">
                <div class="general-page__left-col">
                    <div class="hor_1 resp-tabs-container">
                        <div class="general-page__item">
                            <h3>{{config('settings.site_alumni_title')}}</h3>
                            {!! config('settings.site_alumni_description') !!}
                        </div>
                        <!--general-page__item-->
                        <div class="general-page__item">
                            <h3>{{config('settings.site_alumni_title1')}}</h3>
                            {!! config('settings.site_alumni_description1') !!}
                        </div>
                        <!--general-page__item-->
                        <div class="general-page__item">
                            <h3>{{config('settings.site_alumni_title2')}}</h3>
                            {!! config('settings.site_alumni_description2') !!}
                        </div>
                        <!--general-page__item-->
                        <div class="general-page__item">
                            <h3>{{config('settings.site_alumni_title3')}}</h3>
                            {!! config('settings.site_alumni_description3') !!}
                        </div>
                        <!--general-page__item-->
                        <!--general-page__item-->
                        <div class="general-page__item">
                            <h3>{{config('settings.site_alumni_title4')}}</h3>
                            {!! config('settings.site_alumni_description4') !!}
                        </div>
                        <!--general-page__item-->
                        <!--general-page__item-->
                        <div class="general-page__item">
                            <h3>{{config('settings.site_alumni_title5')}}</h3>
                            {!! config('settings.site_alumni_description5') !!}
                        </div>
                        <!--general-page__item-->

                    </div>
                    <!--resp-tabs-container-->
                </div>
                <div class="general-page__right-col">
                    @include('layouts.front.quicklinks')

                    <!--table-of-contents-->
                </div>
            </div>

        </div>
        <!--generl-page-->

    </div>
    <!--tab-holder-->
</main>
@endsection