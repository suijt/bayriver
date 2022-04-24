@extends('layouts.front.app')

@section('title', 'Alumni')

@section('content')
<main class="site-content">
    <section class="inner-banner" style="background-image: url('images/slider4.jpg');">
        <div class="inner-banner__content">
            <div class="container">
                <h1>News & Events</h1>
                <p>Find the latest news and blogs</p>
            </div>
        </div>

    </section>
    <div class="course-nav__detail-item">
        <div class="container flex-container">
            <div class="left-col full">
                <div class="prenews prenews--3cols flex-container">
                    @foreach ($news as $new)
                    <div class="prenews-item">
                        <div class="prenews-item__inner">
                            <a href="{{route('news.detail',$new->slug)}}" class="prenews-item__image" style="background-image: url({{asset($new->image_path)}});">
                            </a>
                            <div class="prenews-item__content">
                                <div class="prenews-item__header">
                                    <h3><a href="{{route('news.detail',$new->slug)}}">{{$new->titile}}</a> </h3>
                                </div>
                                <p> {{$new->caption}} </p>
                                <a href="{{route('news.detail',$new->slug)}}" class="hvr-underline-from-left">Read More</a>
                            </div>
                            <!--prenews-item__content-->
                        </div>
                    </div>
                    @endforeach

                </div>
                <!--prenews-->



            </div>


        </div>

    </div>
    <!--industrial-acceptance course-nav__detail-item-->




</main>

@endsection