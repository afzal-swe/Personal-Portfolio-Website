

@php
     $blogs = DB::table('blogs')->orderBy('id', 'ASC')
            ->join('blog_categories', 'blogs.blog_category_id', 'blog_categories.id')
            ->select('blogs.*', 'blog_categories.blog_category')
            ->limit(6)
            ->get();
    // @dd($blog);
@endphp

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
        <div class="blog__button text-center">
            <a href="{{ route('blog') }}" class="btn">more blog</a>
        </div>
    </div>
</section>