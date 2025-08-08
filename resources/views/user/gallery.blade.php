@extends('layouts.user.user_layout')
@section('title', 'Lyka | Gallery')
@section('content')
<section class="inner-banner-area">
            <div class="container">
                <div class="inner-banner" style="background-image: url(assets/images/package-banner.png);">
                    <div class="inner-body">
                        <h1 data-aos="fade-up" data-aos-duration="1000">Gallery</h1>
                        <nav aria-label="breadcrumb" data-aos="fade-up" data-aos-duration="1500">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('user.home') }}">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Gallery</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>
</section>

<section class="inner-gallery-sec p60">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-6 mb-3">
                <div class="box" data-aos="fade-up" data-aos-duration="1000">
                    <a href="assets/images/gallery-img1.jpg" data-fancybox="gallery" data-caption="Thailand">
                        <img src="assets/images/gallery-img1.jpg" alt="">
                        <div class="title">
                             <h5>Thailand</h5>
                            <p>08 Jul 2025</p>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-3">
                <div class="box" data-aos="fade-up" data-aos-duration="1000">
                    <a href="assets/images/gallery-img2.jpg" data-fancybox="gallery" data-caption="Thailand">
                        <img src="assets/images/gallery-img2.jpg" alt="">
                        <div class="title">
                             <h5>Thailand</h5>
                            <p>08 Jul 2025</p>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-3">
                <div class="box" data-aos="fade-up" data-aos-duration="1000">
                    <a href="assets/images/gallery-img3.jpg" data-fancybox="gallery" data-caption="Thailand">
                        <img src="assets/images/gallery-img3.jpg" alt="">
                        <div class="title">
                             <h5>Thailand</h5>
                            <p>08 Jul 2025</p>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-3">
                <div class="box" data-aos="fade-up" data-aos-duration="1000">
                    <a href="assets/images/gallery-img4.jpg" data-fancybox="gallery" data-caption="Thailand">
                        <img src="assets/images/gallery-img4.jpg" alt="">
                        <div class="title">
                             <h5>Thailand</h5>
                            <p>08 Jul 2025</p>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-3">
                <div class="box" data-aos="fade-up" data-aos-duration="1000">
                    <a href="assets/images/gallery-img5.jpg" data-fancybox="gallery" data-caption="Thailand">
                        <img src="assets/images/gallery-img5.jpg" alt="">
                        <div class="title">
                             <h5>Thailand</h5>
                            <p>08 Jul 2025</p>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-3">
                <div class="box" data-aos="fade-up" data-aos-duration="1000">
                    <a href="assets/images/gallery-img1.jpg" data-fancybox="gallery" data-caption="Thailand">
                        <img src="assets/images/gallery-img1.jpg" alt="">
                        <div class="title">
                             <h5>Thailand</h5>
                            <p>08 Jul 2025</p>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-3">
                <div class="box" data-aos="fade-up" data-aos-duration="1000">
                    <a href="assets/images/gallery-img5.jpg" data-fancybox="gallery" data-caption="Thailand">
                        <img src="assets/images/gallery-img5.jpg" alt="">
                        <div class="title">
                             <h5>Thailand</h5>
                            <p>08 Jul 2025</p>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-3">
                <div class="box" data-aos="fade-up" data-aos-duration="1000">
                    <a href="assets/images/gallery-img1.jpg" data-fancybox="gallery" data-caption="Thailand">
                        <img src="assets/images/gallery-img1.jpg" alt="">
                        <div class="title">
                             <h5>Thailand</h5>
                            <p>08 Jul 2025</p>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
