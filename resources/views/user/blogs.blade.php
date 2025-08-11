@extends('layouts.user.user_layout')
@section('title', 'Lyka | Blogs')
@section('content')
 <section class="inner-banner-area">
            <div class="container">
                <div class="inner-banner" style="background-image: url(assets/images/package-view-banner.png);">
                    <div class="inner-body">
                        <h1>Blogs</h1>
                        <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('user.home') }}">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Blogs</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>
</section>

<section class="blog-details-body p60">
    <div class="container">
        <div class="row">
            @foreach($blogs as $blog)
                <div class="col-lg-4 col-md-6 mb-3">
                    <div class="box">
                        <div class="blog-img">
                            <a href="{{ route('user.blog_details', ['id' => $blog->id, 'slug' => $blog->slug]) }}">
                                <img src="{{ asset('uploads/blogs/' . $blog->image) }}" alt="{{ $blog->title }}">
                            </a>
                        </div>
                        <div class="content">
                            <h4>
                                <span>{{ \Carbon\Carbon::parse($blog->published_at)->format('d M Y') }}</span> |
                                <span>{{ $blog->tags ?? '' }}</span>
                            </h4>
                            <div class="title">
                                <h6>
                                    <a href="{{ route('user.blog_details', ['id' => $blog->id, 'slug' => $blog->slug]) }}">
                                        {{ $blog->short_description }}
                                    </a>
                                </h6>
                            </div>
                            <a class="b-link" href="{{ route('user.blog_details', ['id' => $blog->id, 'slug' => $blog->slug]) }}">
                                Read More
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

	@endsection
