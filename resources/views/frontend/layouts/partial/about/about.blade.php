

@php
    $about = DB::table('abouts')->first();
    $multi_image = DB::table('about_multi_images')->limit(7)->get();
@endphp

<section id="aboutSection" class="about">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <ul class="about__icons__wrap">

                    @foreach ($multi_image as $row)
                    <li>
                        <img class="light" src="{{ asset($row->multi_image ?? 'frontend/assets/img/icons/xd_light.png') }}" alt="XD">
                        {{-- <img class="dark" src="{{ asset('frontend/assets/img/icons/xd.png') }}" alt="XD"> --}}
                    </li>
                    @endforeach
                    
                    
                </ul>
            </div>
            <div class="col-lg-6">
                <div class="about__content">
                    <div class="section__title">
                        <span class="sub-title">01 - About me</span>
                        <h2 class="title">{{ $about->title ?? 'I have transform your ideas into remarkable digital products' }}</h2>
                    </div>
                    <div class="about__exp">
                        <div class="about__exp__icon">
                            <img src="{{ asset('frontend/assets/img/icons/about_icon.png') }}" alt="">
                        </div>
                        <div class="about__exp__content">
                            <p>{{ $about->short_title ?? 'I have transform your ideas into remarkable digital products' }}</p>
                        </div>
                    </div>
                    <p class="desc">{{  $about->short_Description ?? 'I have transform your ideas into remarkable digital products'  }}</p>
                    <a href="about.html" class="btn">Download my resume</a>
                </div>
            </div>
        </div>
    </div>
</section>