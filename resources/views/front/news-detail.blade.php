@extends('layouts.front.app')

@section('title', $newsDetail->title)

@section('content')
<main class="site-content">
    <section class="inner-banner" style="background-image: url({{asset($newsDetail->image_path)}});">
        <div class="inner-banner__content">
            <div class="container">
                <h1>{{$newsDetail->title}}</h1>
                <p>{{$newsDetail->caption}}</p>


            </div>
        </div>

    </section>



    <div class="course-nav__detail-item">
        <div class="two-columns full">
            <div class="container clearfix">

                <div class="two-columns__content">
                    {!! $newsDetail->description!!}
                </div>
            </div>
        </div>
    </div>
    <!--financial course-nav__detail-item-->




</main>


@endsection
