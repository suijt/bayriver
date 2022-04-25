@extends('layouts.front.app')

@section('title', $page->name)

@section('content')
<main class="site-content">
    <section class="inner-banner" style="background-image: url({{asset($page->banner_path)}});">
        <div class="inner-banner__content">
            <div class="container">
                <h1>{{$page->name}}</h1>
                <p>{{$page->short_description}}</p>


            </div>
        </div>

    </section>



    <div class="course-nav__detail-item">
        <div class="two-columns full">
            <div class="container clearfix">

                <div class="two-columns__content">
                    {!! $page->description!!}
                </div>
            </div>
        </div>
    </div>
    <!--financial course-nav__detail-item-->




</main>


@endsection