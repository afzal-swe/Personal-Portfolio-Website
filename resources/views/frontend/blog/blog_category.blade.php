@extends('frontend.layouts.app')
@section('content')


 <!-- breadcrumb-area -->
 <section class="breadcrumb__wrap">
    <div class="container custom-container">
        <div class="row justify-content-center">
            <div class="col-xl-6 col-lg-8 col-md-10">
                <div class="breadcrumb__wrap__content">
                    <h2 class="title">{{ $category_name->blog_category }}</h2>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{ $category_name->blog_category }}</li>
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
                        <a href="{{ route('blog_details',$row->id) }}"><img src="{{ asset($row->blog_image ?? 'frontend/assets/img/blog/blog_thumb01.jpg') }}" alt="" style="height: 430px; width:850px;"></a>
                        <a href="{{ route('blog_details',$row->id) }}" class="blog__link"><i class="far fa-long-arrow-right"></i></a>
                    </div>
                    <div class="standard__blog__content">
                        <div class="blog__post__avatar">
                            <div class="thumb"><img src="{{ asset($user->image ??  'frontend/assets/img/blog/blog_avatar.png') }}" alt=""></div>
                            <span class="post__by">By : <a href="#">{{ $user->name }}</a></span>
                        </div>
                        <h2 class="title"><a href="{{ route('blog_details',$row->id) }}">{{ $row->blog_title }}</a></h2>
                        <p>{!! Str::of($row->blog_description)->limit(300) !!}</p>
                        <ul class="blog__post__meta">
                            <li><i class="fal fa-calendar-alt"></i> {{ Carbon\Carbon::parse($row->created_at)->diffForHumans() }}</li>
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
                            @foreach ($new_blog as $row)
                                
                           
                            <li class="rc__post__item">
                                <div class="rc__post__thumb">
                                    <a href="{{ route('blog_details',$row->id) }}"><img src="{{ asset($row->blog_image ?? 'frontend/assets/img/blog/rc_thumb01.jpg') }}" alt=""></a>
                                </div>
                                <div class="rc__post__content">
                                    <h5 class="title"><a href="{{ route('blog_details',$row->id) }}">{{ $row->blog_title }}.</a></h5>
                                    <span class="post-date"><i class="fal fa-calendar-alt"></i> {{ Carbon\Carbon::parse($row->created_at)->diffForHumans() }}</span>
                                </div>
                            </li>

                            @endforeach
                        </ul>
                    </div>
                    <div class="widget">
                        <h4 class="widget-title">Categories</h4>
                        <ul class="sidebar__cat">
                            @foreach ($categories as $row)
                                
                            <li class="sidebar__cat__item"><a href="{{ route('category.post',$row->id) }}">{{ $row->blog_category }}</a></li>
                            @endforeach
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