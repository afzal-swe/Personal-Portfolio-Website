

@php
    $all_website = DB::table('project_portfolio')->where('status', '1')->get();
    $all_website_portfolio = DB::table('project_portfolio')->where('status', '1')->where('type', '1')->get();
    $all_deshboard_portfolio = DB::table('project_portfolio')->where('status', '1')->where('type', '2')->get();
@endphp



<section class="portfolio">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-6 col-lg-8">
                <div class="section__title text-center">
                    <span class="sub-title">04 - Portfolio</span>
                    <h2 class="title">All Creative work</h2>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-xl-10 col-lg-12">
                <ul class="nav nav-tabs portfolio__nav" id="portfolioTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="all-tab" data-bs-toggle="tab" data-bs-target="#all" type="button"
                            role="tab" aria-controls="all" aria-selected="true">All</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="website-tab" data-bs-toggle="tab" data-bs-target="#website" type="button"
                            role="tab" aria-controls="website" aria-selected="false">website</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="dashboard-tab" data-bs-toggle="tab" data-bs-target="#dashboard" type="button"
                            role="tab" aria-controls="dashboard" aria-selected="false">Dashboard</button>
                    </li>
                    
                </ul>
            </div>
        </div>
    </div>
    <div class="tab-content" id="portfolioTabContent">
        <div class="tab-pane show active" id="all" role="tabpanel" aria-labelledby="all-tab">
            <div class="container">
                <div class="row gx-0 justify-content-center">
                    <div class="col">
                        <div class="portfolio__active">

                            @foreach ($all_website as  $row)
                                <div class="portfolio__item">
                                    <div class="portfolio__thumb">
                                        <img src="{{ asset($row->portfolio_image ?? 'frontend/assets/img/portfolio/portfolio_img01.jpg') }}" alt="">
                                    </div>
                                    <div class="portfolio__overlay__content">
                                        <span>{{ $row->portfolio_name ?? "Null" }}</span>
                                        <h4 class="title"><a href="{{ route('project_portfolio_details',$row->id) }}">{{ $row->portfolio_title ?? "Null" }}</a></h4>
                                        <a href="{{ $row->website_link ?? '#' }}" target="_blank" class="link">Website View</a>
                                    </div>
                                </div>
                            @endforeach
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="tab-pane" id="website" role="tabpanel" aria-labelledby="website-tab">
            <div class="container">
                <div class="row gx-0 justify-content-center">
                    <div class="col">
                        <div class="portfolio__active">

                            @foreach ($all_website_portfolio as $row)
                                <div class="portfolio__item">
                                    <div class="portfolio__thumb">
                                        <img src="{{ asset($row->portfolio_image ?? 'frontend/assets/img/portfolio/portfolio_img07.jpg') }}" alt="">
                                    </div>
                                    <div class="portfolio__overlay__content">
                                        <span>{{ $row->portfolio_name ?? 'Web Development'}}</span>
                                        <h4 class="title"><a href="{{ route('project_portfolio_details',$row->id) }}">{{ $row->portfolio_title ?? "Null" }}</a></h4>
                                        <a href="{{ $row->website_link ?? '#' }}" target="_blank" class="link">Website View</a>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="tab-pane" id="dashboard" role="tabpanel" aria-labelledby="dashboard-tab">
            <div class="container">
                <div class="row gx-0 justify-content-center">
                    <div class="col">
                        <div class="portfolio__active">

                            @foreach ($all_deshboard_portfolio as  $row)
                                <div class="portfolio__item">
                                    <div class="portfolio__thumb">
                                        <img src="{{ asset($row->portfolio_image ?? 'frontend/assets/img/portfolio/portfolio_img05.jpg') }}" alt="">
                                    </div>
                                    <div class="portfolio__overlay__content">
                                        <span>{{ $row->portfolio_name ?? 'Web Development'}}</span>
                                        <h4 class="title"><a href="{{ route('project_portfolio_details',$row->id) }}">{{ $row->portfolio_title ?? "Null" }}</a></h4>
                                        <a href="{{ $row->website_link ?? '#' }}" target="_blank" class="link">Website View</a>
                                    </div>
                                </div>
                            @endforeach
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
       
       
        
    </div>
</section>