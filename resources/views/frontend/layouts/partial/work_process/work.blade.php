
@php
    $working_process = DB::table('working_process')->where('status','1')->limit(4)->get();
@endphp

<section class="work__process">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-6 col-lg-8">
                <div class="section__title text-center">
                    <span class="sub-title">03 - Working Process</span>
                    <h2 class="title">A Clear Product Developing Process Is The Basis of success</h2>
                </div>
            </div>
        </div>
        <div class="row work__process__wrap">

            @foreach ($working_process as $key=>$row)
                
            
            <div class="col">
                <div class="work__process__item">
                    <span class="work__process_step">Step - {{ ++$key }}</span>
                    <div class="work__process__icon">
                        <img class="light" src="{{ asset( $row->image ?? 'frontend/assets/img/icons/wp_light_icon01.png') }}" alt="">
                        {{-- <img class="dark" src="{{ asset( $row->image ?? 'frontend/assets/img/icons/wp_icon01.png') }}" alt=""> --}}
                    </div>
                    <div class="work__process__content">
                        <h4 class="title">{{ $row->title ?? "Null" }}</h4>
                        <p>{!! Str::of($row->description ?? "Null")->limit(250) !!}</p>
                    </div>
                </div>
            </div>

            @endforeach
           
        </div>
    </div>
</section>