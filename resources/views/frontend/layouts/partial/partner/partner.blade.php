
@php
    $partners = DB::table('partners')->first();
    $multi_image = DB::table('about_multi_images')->limit(6)->get();
@endphp

<section class="partner">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <ul class="partner__logo__wrap">
                    @foreach ($multi_image as $row)
                    <li>
                        <img class="light" src="{{ asset($row->multi_image ?? 'frontend/assets/img/icons/xd_light.png') }}" alt="XD">
                        {{-- <img class="dark" src="{{ asset($row->multi_image ?? 'frontend/assets/img/icons/xd.png') }}" alt="XD"> --}}
                    </li>
                    @endforeach
                   
                </ul>
            </div>
            <div class="col-lg-6">
                <div class="partner__content">
                    <div class="section__title">
                        <span class="sub-title">== partners ==</span>
                        <h2 class="title">{{ $partners->title ?? "Null" }}</h2>
                    </div>
                    <p>{!! $partners->description ?? "Null" !!}.</p>
                    <a href="{{ route('contact') }}" class="btn">Start a conversation</a>
                </div>
            </div>
        </div>
    </div>
</section>