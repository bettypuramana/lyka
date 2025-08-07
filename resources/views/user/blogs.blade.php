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
                            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
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
        <div class="col-lg-4 col-md-6 mb-3">
        <div class="box">
            <div class="blog-img"><a href="blog-details.html"><img src="{{asset('assets/images/blog-1.jpg')}}" alt=""></a></div>
            <div class="content">
                <h4><span>24 May 2023</span> | <span>Tent Camping</span></h4>
                <div class="title">
                    <h6><a href="blog-details.html">It’s That Time Of (December 2022) Desktop Edition</a></h6>
                </div>
                <a class="b-link" href="blog-details.html">Read More</a>
            </div>
        </div>
       </div>
       <div class="col-lg-4 col-md-6 mb-3">
        <div class="box">
            <div class="blog-img"><a href="blog-details.html"><img src="{{asset('assets/images/blog-2.jpg')}}" alt=""></a></div>
            <div class="content">
                <h4><span>24 May 2023</span> | <span>Tent Camping</span></h4>
                <div class="title">
                    <h6><a href="blog-details.html">It’s That Time Of (December 2022) Desktop Edition</a></h6>
                </div>
                <a class="b-link" href="blog-details.html">Read More</a>
            </div>
        </div>
       </div>
       <div class="col-lg-4 col-md-6 mb-3">
        <div class="box">
            <div class="blog-img"><a href="blog-details.html"><img src="{{asset('assets/images/blog-3.jpg')}}" alt=""></a></div>
            <div class="content">
                <h4><span>24 May 2023</span> | <span>Tent Camping</span></h4>
                <div class="title">
                    <h6><a href="blog-details.html">It’s That Time Of (December 2022) Desktop Edition</a></h6>
                </div>
                <a class="b-link" href="blog-details.html">Read More</a>
            </div>
        </div>
       </div>
       <div class="col-lg-4 col-md-6 mb-3">
        <div class="box">
            <div class="blog-img"><a href="blog-details.html"><img src="{{asset('assets/images/blog-1.jpg')}}" alt=""></a></div>
            <div class="content">
                <h4><span>24 May 2023</span> | <span>Tent Camping</span></h4>
                <div class="title">
                    <h6><a href="blog-details.html">It’s That Time Of (December 2022) Desktop Edition</a></h6>
                </div>
                <a class="b-link" href="blog-details.html">Read More</a>
            </div>
        </div>
       </div>
       <div class="col-lg-4 col-md-6 mb-3">
        <div class="box">
            <div class="blog-img"><a href="blog-details.html"><img src="{{asset('assets/images/blog-2.jpg')}}" alt=""></a></div>
            <div class="content">
                <h4><span>24 May 2023</span> | <span>Tent Camping</span></h4>
                <div class="title">
                    <h6><a href="blog-details.html">It’s That Time Of (December 2022) Desktop Edition</a></h6>
                </div>
                <a class="b-link" href="blog-details.html">Read More</a>
            </div>
        </div>
       </div>
       <div class="col-lg-4 col-md-6 mb-3">
        <div class="box">
            <div class="blog-img"><a href="blog-details.html"><img src="{{asset('assets/images/blog-3.jpg')}}" alt=""></a></div>
            <div class="content">
                <h4><span>24 May 2023</span> | <span>Tent Camping</span></h4>
                <div class="title">
                    <h6><a href="blog-details.html">It’s That Time Of (December 2022) Desktop Edition</a></h6>
                </div>
                <a class="b-link" href="blog-details.html">Read More</a>
            </div>
        </div>
       </div>
       </div>
    </div>
</section>

	@endsection
