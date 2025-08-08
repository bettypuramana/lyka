@extends('layouts.user.user_layout')
@section('title', 'Lyka | Blog Details')
@section('content')
 <section class="inner-banner-area">
            <div class="container">
                <div class="inner-banner" style="background-image: url({{ asset('assets/images/package-view-banner.png') }});">
                    <div class="inner-body">
                        <h1>Blog Details</h1>
                        <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('user.home') }}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('user.blogs') }}">Blogs</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Blog Details</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>
</section>

<section class="blog-details-body p60">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="blog-details">
                    <div class="blog-card-img mb-3">
                        <img src="{{ asset('uploads/blogs/' . $blog->image) }}" alt="">
                        <div class="post-det">
                            <h6>{{ \Carbon\Carbon::parse($blog->published_at)->format('d') }}</h6>
                            <p>{{ \Carbon\Carbon::parse($blog->published_at)->format('M') }}</p>
                        </div>
                    </div>
                    <div class="blog-content">
                        <h3>{{ $blog->title }}</h3>
                        <h4><span>{{ $blog->tags ?? '' }}</span></h4>
                        {!! $blog->description !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
	@endsection
