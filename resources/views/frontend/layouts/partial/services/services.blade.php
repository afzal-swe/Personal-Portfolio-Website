

@php
    $services = DB::table('services')->where('status', '1')->get();
@endphp


<section class="services">
    <div class="container">
        <div class="services__title__wrap">
            <div class="row align-items-center justify-content-between">
                <div class="col-xl-5 col-lg-6 col-md-8">
                    <div class="section__title">
                        <span class="sub-title">02 - my Services</span>
                        <h2 class="title">Creates amazing digital experiences</h2>
                    </div>
                </div>
                <div class="col-xl-5 col-lg-6 col-md-4">
                    <div class="services__arrow"></div>
                </div>
            </div>
        </div>
        <div class="row gx-0 services__active">

            @foreach ($services as $row)
                
            
            <div class="col-xl-3 p-2">
                <div class="services__item">
                    <div class="services__thumb">
                        <a href="#"><img src="{{ asset( $row->image ?? 'frontend/assets/img/images/services_img01.jpg') }}" alt=""></a>
                    </div>
                    <div class="services__content">
                        <div class="services__icon">
                            <img class="light" src="{{ asset($row->icon ?? 'frontend/assets/img/icons/services_light_icon01.png') }}" alt="">
                            {{-- <img class="dark" src="{{ asset('frontend/assets/img/icons/services_icon01.png') }}" alt=""> --}}
                        </div>
                        <h4 class="title"><a href="#">{{ $row->title ?? '' }}</a></h4>
                        <p>{!! Str::of($row->short_description)->limit(150) ?? '' !!}</p>
                        <ul class="services__list">
                            <li>{!! $row->logn_description ?? '' !!}</li>
                            
                        </ul>
                        <a href="#" class="btn border-btn">Read more</a>
                    </div>
                </div>
            </div>

            @endforeach

        </div>
    </div>
</section>