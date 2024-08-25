@extends('frontend.layouts.app')
@section('content')



@php
     $blogs = DB::table('blogs')->orderBy('id', 'ASC')
            ->join('blog_categories', 'blogs.blog_category_id', 'blog_categories.id')
            ->select('blogs.*', 'blog_categories.blog_category')
            ->get();
    // @dd($blog);
@endphp


 <!-- breadcrumb-area -->
 <section class="breadcrumb__wrap">
    <div class="container custom-container">
        <div class="row justify-content-center">
            <div class="col-xl-6 col-lg-8 col-md-10">
                <div class="breadcrumb__wrap__content">
                    <h2 class="title">Our Blog</h2>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Our Blogs</li>
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

<section class="blog">
    <div class="container">
        <div class="row gx-0 justify-content-center">

            @foreach ($blogs as $row)
           
            <div class="col-lg-4 col-md-6 col-sm-9 ml-2 p-2">
                <div class="blog__post__item">
                    <div class="blog__post__thumb">
                        <a href="{{ route('blog_details',$row->id) }}"><img src="{{ asset($row->blog_image ?? 'frontend/assets/img/blog/blog_post_thumb01.jpg') }}" alt=""></a>
                        <div class="blog__post__tags">
                            <a href="#">{{ $row->blog_category }}</a>
                        </div>
                    </div>
                    <div class="blog__post__content">
                        <span class="date">{{ Carbon\Carbon::parse($row->created_at)->diffForHumans() }}</span>
                        <h3 class="title"><a href="{{ route('blog_details',$row->id) }}">{{ Str::of($row->blog_title)->limit(22) }}</a></h3>
                        <a href="{{ route('blog_details',$row->id) }}" class="read__more">Read mORe</a>
                    </div>
                </div>
            </div>

            @endforeach

        </div>
    </div>
</section>



@endsection