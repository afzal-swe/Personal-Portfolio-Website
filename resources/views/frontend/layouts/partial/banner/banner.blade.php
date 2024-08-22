
@php
    $home_slider = DB::table('home_slide')->first();
@endphp

<section class="banner">
    <div class="container custom-container">
        <div class="row align-items-center justify-content-center justify-content-lg-between">
            <div class="col-lg-6 order-0 order-lg-2">
                <div class="banner__img text-center text-xxl-end">
                    <img src="{{ asset($home_slider->home_slide ?? "") }}" alt="">
                </div>
            </div>
            <div class="col-xl-5 col-lg-6">
                <div class="banner__content">
                    <h2 class="title wow fadeInUp" data-wow-delay=".2s"><span>{{ $home_slider->title ?? ""}}</span> <br></h2>
                    <p class="wow fadeInUp" data-wow-delay=".4s">{{ $home_slider->short_title ?? "" }}</p>
                    <a href="{{ route('about') }}" class="btn banner__btn wow fadeInUp" data-wow-delay=".6s">more about me</a>
                </div>
            </div>
        </div>
    </div>
    <div class="scroll__down">
        <a href="#aboutSection" class="scroll__link">Scroll down</a>
    </div>
    <div class="banner__video">
        <a href="{{ $home_slider->video_url ?? "https://www.youtube.com/watch?v=XHOmBV4js_E" }}" class="popup-video"><i class="fas fa-play"></i></a>
   
</section>