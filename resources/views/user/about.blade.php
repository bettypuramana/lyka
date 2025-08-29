@extends('layouts.user.user_layout')
@section('title', 'Lyka | About')
@section('content')
 <section class="inner-banner-area">
            <div class="container">
                <div class="inner-banner" style="background-image: url(assets/images/about-banner.jpg);">
                    <div class="inner-body">
                        <h1 data-aos="fade-up" data-aos-duration="1000">About Us</h1>
                        <nav aria-label="breadcrumb" data-aos="fade-up" data-aos-duration="1500">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('user.home') }}">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">About Us</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>
</section>

<section class="about-body">
    <div class="about-body-sec p60">
        <div class="container">
        <div class="row">
            <div class="col-lg-4" data-aos="fade-up" data-aos-duration="1000">
                <div class="about-img">
                    <img src="{{ asset('uploads/about_us/' . $about->about_image) }}" alt="">
                    <div class="experience">
                        <h5>{{ $about->year_experince }}</h5>
                        <span>Year Experience</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-8" data-aos="fade-up" data-aos-duration="1500">
                <div class="about-content">
                    <h2>About Our Travel Agency</h2>
                    <h3>{{ $about->about_title }}</h3>
                    <p>{!! $about->about_description !!}</p>
                </div>
            </div>
        </div>

    </div>
    </div>
    <section class="testimonials-sec p60" data-aos="fade-up" data-aos-duration="1500">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 mb-3 title-head" data-aos="fade-up" data-aos-duration="1500">
                <h2>What Our Travelers Say</h2>
                <p>Real Stories From Happy Adventurers</p>
            </div>
            <div class="col-lg-12 owl-carousel testimonial-scroll owl-theme">
                <!-- loop area -->
                @foreach($testimonials as $testimonial)
                    <div class="item">
                        <div class="box">
                            <div class="item-box">
                                <div class="pic">
                                    <img src="{{ asset('uploads/testimonial/' . $testimonial->image) }}" alt="{{ $testimonial->name }}">
                                </div>
                                <div class="content">
                                    <h5>{{ $testimonial->name }}</h5>
                                    <h6>{{ $testimonial->designation }}</h6>
                                    <p>{!! Str::limit($testimonial->message, 120) !!}</p>
                                </div>
                                <a href="#" data-bs-toggle="modal" data-bs-target="#testimonial-modal-{{ $testimonial->id }}" class="btn-nav">
                                    <img src="{{ asset('assets/images/link-arrow.svg') }}" alt="">
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
                 <!-- loop area close-->
            </div>
        </div>
    </div>
</section>
<!-- popup area -->
            @foreach($testimonials as $testimonial)
                <div class="modal fade" id="testimonial-modal-{{ $testimonial->id }}" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <div class="first">
                                    <div class="pic">
                                        <img src="{{ asset('uploads/testimonial/' . $testimonial->image) }}" alt="{{ $testimonial->name }}">
                                    </div>
                                    <div class="content">
                                        <h5>{{ $testimonial->name }}</h5>
                                        <h6>{{ $testimonial->designation }}</h6>
                                    </div>
                                </div>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                            </div>
                            <div class="modal-body">
                                <div class="box-testi">
                                    <div class="content-box">
                                        {!! nl2br(e($testimonial->message)) !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
    <!-- popup area close-->
    <div class="abt-mission p60">
       <div class="container">
            <div class="row">
                <div class="col-lg-5 mb-4" data-aos="fade-up" data-aos-duration="1000">
                    <div class="abt-mission-img"><img src="{{asset('assets/images/abt-mission.webp')}}" alt=""></div>
                </div>
                <div class="col-lg-7 mb-4 d-flex align-items-center" data-aos="fade-up" data-aos-duration="1500">
                    <div class="abt-mission-content">
                        <div class="watermark">Mission</div>
                        <div class="content-box">
                            <h4>Our Mission</h4>
                            <h5>Crafting Unforgettable Travel Experiences.</h5>
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
                            <ul>
                                <li>Crafting journeys that match your interests and needs.</li>
                                <li>Making your trip stress-free from start to finish.</li>
                                <li>Explore with expert knowledge and local guidance.</li>
                                <li>Ensuring a seamless and comfortable travel experience.</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row flex-row-reverse">
                <div class="col-lg-5 mb-4" data-aos="fade-up" data-aos-duration="1000">
                    <div class="abt-mission-img"><img src="{{asset('assets/images/abt-vision.webp')}}" alt=""></div>
                </div>
                <div class="col-lg-7 mb-4 d-flex align-items-center" data-aos="fade-up" data-aos-duration="1500">
                    <div class="abt-mission-content">
                        <div class="watermark">Vision</div>
                        <div class="content-box">
                            <h4>Our Vision</h4>
                            <h5>Redefining Global Travel & Exploration.</h5>
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
                            <ul>
                                <li>Crafting journeys that match your interests and needs.</li>
                                <li>Making your trip stress-free from start to finish.</li>
                                <li>Explore with expert knowledge and local guidance.</li>
                                <li>Ensuring a seamless and comfortable travel experience.</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
       </div>
    </div>
</section>

	@endsection
