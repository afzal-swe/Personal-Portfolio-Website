            
    
@php
    $feedback = DB::table('feedback')->limit(6)->get();
    $multi_image = DB::table('about_multi_images')->limit(7)->get();
@endphp    
    
<section class="testimonial">
    <div class="container">
        <div class="row align-items-center justify-content-between">
            <div class="col-lg-6 order-0 order-lg-2">
                <ul class="testimonial__avatar__img">
                    @foreach ($multi_image as $row)
                    <li>
                        <img class="light" src="{{ asset($row->multi_image ?? 'frontend/assets/img/icons/xd_light.png') }}" alt="XD">
                        {{-- <img class="dark" src="{{ asset($row->multi_image ?? 'frontend/assets/img/icons/xd.png') }}" alt="XD"> --}}
                    </li>
                    @endforeach
                </ul>
            </div>
            <div class="col-xl-5 col-lg-6">
                <div class="testimonial__wrap">
                    <div class="section__title">
                        <span class="sub-title">06 - Client Feedback</span>
                        <h2 class="title">Happy clients feedback</h2>
                    </div>
                    <div class="testimonial__active">

                        @foreach ($feedback as $row)
                            
                        
                        <div class="testimonial__item">
                            <div class="testimonial__icon">
                                <i class="fas fa-quote-left"></i>
                            </div>
                            <div class="testimonial__content">
                                <p>{!! $row->short_title ?? "Null" !!}</p>
                                <div class="testimonial__avatar">
                                    <span class="text-primary">{{ $row->name ?? "Null"}}</span>
                                </div>
                            </div>
                        </div>

                        @endforeach

                    </div>
                    <div class="testimonial__arrow"></div>
                </div>
            </div>
        </div>
    </div>
</section>