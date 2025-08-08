@extends('layouts.user.user_layout')
@section('title', 'Lyka | Blog Details')
@section('content')
 <section class="inner-banner-area">
            <div class="container">
                <div class="inner-banner" style="background-image: url(assets/images/package-view-banner.png);">
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
                        <img src="{{asset('assets/images/blog-d-1-1.webp')}}" alt="">
                        <div class="post-det">
                            <h6>20</h6>
                            <p>Feb</p>
                        </div>
                    </div>
                    <div class="blog-content">
                        <h3>Get Best Advertiser in Your Side Pocket</h3>
                        <h4><span>Tent Camping</span></h4>
                        <p>Consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore of magna aliqua. Ut enim ad minim veniam, made of owl the quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea dolor commodo consequat. Duis aute irure and dolor in reprehenderit.</p>
                        <p>The is ipsum dolor sit amet consectetur adipiscing elit. Fusce eleifend porta arcu In hac habitasse the is platea augue thelorem turpoi dictumst. In lacus libero faucibus at malesuada sagittis placerat eros sed istincidunt augue ac ante rutrum sed the is sodales augue consequat.</p>
                        <div class="row">
                            <div class="col-lg-6 col-md-6 mb-3">
                                <div class="inner-blog-box"><img src="{{asset('assets/images/blog-d-1-2.webp')}}" alt=""></div>
                            </div>
                            <div class="col-lg-6 col-md-6 mb-3">
                                <div class="inner-blog-box"><img src="{{asset('assets/images/blog-d-1-3.webp')}}" alt=""></div>
                            </div>
                        </div>
                        <p>The is ipsum dolor sit amet consectetur adipiscing elit. Fusce eleifend porta arcu In hac habitasse the is platea augue thelorem turpoi dictumst. In lacus libero faucibus at malesuada sagittis placerat eros sed istincidunt augue ac ante rutrum sed the is sodales augue consequat.</p>
                        <div class="blog-details-inner-text">
                            <div class="qoute-icon"><img src="{{asset('assets/images/quote-Icon.webp')}}" alt=""></div>
                            <p>Pellentesque sollicitudin congue dolor non aliquam. Morbi volutpat, nisi vel ultricies urnacondimentum, sapien neque lobortis tortor, quis efficitur mi ipsum eu metus. Praesent eleifend orci sit amet est vehicula.</p>
                        </div>
                        <p>Consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore of magna aliqua. Ut enim ad minim veniam, made of owl the quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea dolor commodo consequat. Duis aute irure and dolor in reprehenderit.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
	@endsection
