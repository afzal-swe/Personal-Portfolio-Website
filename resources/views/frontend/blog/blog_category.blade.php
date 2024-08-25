@extends('frontend.layouts.app')
@section('content')


 <!-- breadcrumb-area -->
 <section class="breadcrumb__wrap">
    <div class="container custom-container">
        <div class="row justify-content-center">
            <div class="col-xl-6 col-lg-8 col-md-10">
                <div class="breadcrumb__wrap__content">
                    <h2 class="title">Recent Article</h2>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Blog</li>
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


<!-- blog-area -->
<section class="standard__blog">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">

                @foreach ($blog_post as $row)
                    
                
                <div class="standard__blog__post">
                    <div class="standard__blog__thumb">
                        <a href="blog-details.html"><img src="{{ asset($row->blog_image ?? 'frontend/assets/img/blog/blog_thumb01.jpg') }}" alt="" style="height: 430px; width:850px;"></a>
                        <a href="blog-details.html" class="blog__link"><i class="far fa-long-arrow-right"></i></a>
                    </div>
                    <div class="standard__blog__content">
                        <div class="blog__post__avatar">
                            <div class="thumb"><img src="{{ asset($user->image ??  'frontend/assets/img/blog/blog_avatar.png') }}" alt=""></div>
                            <span class="post__by">By : <a href="#">{{ $user->name }}</a></span>
                        </div>
                        <h2 class="title"><a href="blog-details.html">Best website traffice Booster with great tools.</a></h2>
                        <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable</p>
                        <ul class="blog__post__meta">
                            <li><i class="fal fa-calendar-alt"></i> 25 january 2021</li>
                        </ul>
                    </div>
                </div>

                @endforeach

            </div>
            <div class="col-lg-4">
                <aside class="blog__sidebar">
                    <div class="widget">
                        <form action="#" class="search-form">
                            <input type="text" placeholder="Search">
                            <button type="submit"><i class="fal fa-search"></i></button>
                        </form>
                    </div>
                    <div class="widget">
                        <h4 class="widget-title">Recent Blog</h4>
                        <ul class="rc__post">
                            <li class="rc__post__item">
                                <div class="rc__post__thumb">
                                    <a href="blog-details.html"><img src="{{ asset('frontend/assets/img/blog/rc_thumb01.jpg') }}" alt=""></a>
                                </div>
                                <div class="rc__post__content">
                                    <h5 class="title"><a href="blog-details.html">Best website traffick booster with
                                    great tools.</a></h5>
                                    <span class="post-date"><i class="fal fa-calendar-alt"></i> 28 january 2021</span>
                                </div>
                            </li>
                            <li class="rc__post__item">
                                <div class="rc__post__thumb">
                                    <a href="blog-details.html"><img src="{{ asset('frontend/assets/img/blog/rc_thumb02.jpg') }}" alt=""></a>
                                </div>
                                <div class="rc__post__content">
                                    <h5 class="title"><a href="blog-details.html">How to become a best sale marketer
                                    in a year!</a></h5>
                                    <span class="post-date"><i class="fal fa-calendar-alt"></i> 28 january 2021</span>
                                </div>
                            </li>
                            <li class="rc__post__item">
                                <div class="rc__post__thumb">
                                    <a href="blog-details.html"><img src="{{ asset('frontend/assets/img/blog/rc_thumb03.jpg') }}" alt=""></a>
                                </div>
                                <div class="rc__post__content">
                                    <h5 class="title"><a href="blog-details.html">Google take latest step & catch the
                                    black SEO</a></h5>
                                    <span class="post-date"><i class="fal fa-calendar-alt"></i> 28 january 2021</span>
                                </div>
                            </li>
                            <li class="rc__post__item">
                                <div class="rc__post__thumb">
                                    <a href="blog-details.html"><img src="{{ asset('frontend/assets/img/blog/rc_thumb04.jpg') }}" alt=""></a>
                                </div>
                                <div class="rc__post__content">
                                    <h5 class="title"><a href="blog-details.html">Businesses are thriving societies. Time for urgent change</a></h5>
                                    <span class="post-date"><i class="fal fa-calendar-alt"></i> 28 january 2021</span>
                                </div>
                            </li>
                            <li class="rc__post__item">
                                <div class="rc__post__thumb">
                                    <a href="blog-details.html"><img src="{{ asset('frontend/assets/img/blog/rc_thumb05.jpg') }}" alt=""></a>
                                </div>
                                <div class="rc__post__content">
                                    <h5 class="title"><a href="blog-details.html">TikTok influencer marketing:How to
                                    work with influencer</a></h5>
                                    <span class="post-date"><i class="fal fa-calendar-alt"></i> 28 january 2021</span>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="widget">
                        <h4 class="widget-title">Categories</h4>
                        <ul class="sidebar__cat">
                            <li class="sidebar__cat__item"><a href="blog.html">Web Design (6)</a></li>
                            <li class="sidebar__cat__item"><a href="blog.html">Web Development (4)</a></li>
                            <li class="sidebar__cat__item"><a href="blog.html">Product Design (9)</a></li>
                            <li class="sidebar__cat__item"><a href="blog.html">Animation (6)</a></li>
                            <li class="sidebar__cat__item"><a href="blog.html">Ui/Ux Design (8)</a></li>
                            <li class="sidebar__cat__item"><a href="blog.html">Branding Design (12)</a></li>
                            <li class="sidebar__cat__item"><a href="blog.html">Web Design (6)</a></li>
                            <li class="sidebar__cat__item"><a href="blog.html">Logo Design (6)</a></li>
                        </ul>
                    </div>
                    
                    <div class="widget">
                        <h4 class="widget-title">Popular Tags</h4>
                        <ul class="sidebar__tags">
                            <li><a href="blog.html">Business</a></li>
                            <li><a href="blog.html">Design</a></li>
                            <li><a href="blog.html">apps</a></li>
                            <li><a href="blog.html">landing page</a></li>
                            <li><a href="blog.html">data</a></li>
                            <li><a href="blog.html">website</a></li>
                            <li><a href="blog.html">book</a></li>
                            <li><a href="blog.html">Design</a></li>
                            <li><a href="blog.html">product design</a></li>
                            <li><a href="blog.html">landing page</a></li>
                            <li><a href="blog.html">data</a></li>
                        </ul>
                    </div>
                </aside>
            </div>
        </div>
    </div>
</section>
<!-- blog-area-end -->


@endsection