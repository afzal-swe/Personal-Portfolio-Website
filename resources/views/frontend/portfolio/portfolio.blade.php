@extends('frontend.layouts.app')
@section('content')



 <!-- breadcrumb-area -->
 <section class="breadcrumb__wrap">
    <div class="container custom-container">
        <div class="row justify-content-center">
            <div class="col-xl-6 col-lg-8 col-md-10">
                <div class="breadcrumb__wrap__content">
                    <h2 class="title">Project Portfolio</h2>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Portfolio</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <div class="breadcrumb__wrap__icon">
        <ul>
            <li><img src="{{ asset('frontend/assets/img/icons/breadcrumb_icon01.png') }}" alt=""></li>
            <li><img src="{{ asset('frontend/assets/img/icons/breadcrumb_icon02.png') }}" alt=""></li>
            <li><img src="{{ asset('frontend/assets/img/icons/breadcrumb_icon03.png') }}" alt=""></li>
            <li><img src="{{ asset('frontend/assets/img/icons/breadcrumb_icon04.png') }}" alt=""></li>
            <li><img src="{{ asset('frontend/assets/img/icons/breadcrumb_icon05.png') }}" alt=""></li>
            <li><img src="{{ asset('frontend/assets/img/icons/breadcrumb_icon06.png') }}" alt=""></li>
        </ul>
    </div>
</section>
<!-- breadcrumb-area-end -->

<!-- portfolio-area -->
<section class="portfolio__inner">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="portfolio__inner__nav">
                    <button class="active" data-filter="*">All My Woking Project</button>
                    
                </div>
            </div>
        </div>
        <div class="portfolio__inner__active">
            @foreach ($portfolio as $row)
                
            
            <div class="portfolio__inner__item grid-item cat-two cat-three">
                <div class="row gx-0 align-items-center">
                    <div class="col-lg-6 col-md-10">
                        <div class="portfolio__inner__thumb">
                            <a href="{{ route('project_portfolio_details',$row->id) }}">
                                <img src="{{ asset($row->portfolio_image ?? 'frontend/assets/img/portfolio/portfolio__img01.jpg') }}" alt="">
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-10">
                        <div class="portfolio__inner__content">
                            <h2 class="title text-info"><a href="{{ route('project_portfolio_details',$row->id) }}">{{ $row->portfolio_name ?? "Null" }}</a></h2>
                            <p>{!! Str::of($row->portfolio_description ?? "Null")->limit(300) !!}</p>
                            
                            <a href="{{ $row->website_link ?? '#' }}" target="_blank" class="link">View Site</a>
                        </div>
                    </div>
                </div>
            </div>

            @endforeach
           
        </div>
        <div class="pagination-wrap">
            <nav aria-label="Page navigation example">
                <ul class="pagination">
                    <li class="page-item"><a class="page-link" href="#"><i class="far fa-long-arrow-left"></i></a></li>
                    <li class="page-item active"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item"><a class="page-link" href="#">...</a></li>
                    <li class="page-item"><a class="page-link" href="#"><i class="far fa-long-arrow-right"></i></a></li>
                </ul>
            </nav>
        </div>
    </div>
</section>
<!-- portfolio-area-end -->




@endsection