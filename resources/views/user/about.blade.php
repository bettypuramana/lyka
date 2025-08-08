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
                    <img src="{{asset('assets/images/about-img1.jpg')}}" alt="">
                    <div class="experience">
                        <h5>10</h5>
                        <span>Year Experience</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-8" data-aos="fade-up" data-aos-duration="1500">
                <div class="about-content">
                    <h2>About Our Travel Agency</h2>
                    <h3>Creating Unforgettable Travel Memories.</h3>
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>
                    <p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source.</p>
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>
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
                 <div class="item">
                    <div class="box">
                        <div class="item-box">
                            <div class="pic"><img src="{{asset('assets/images/test-img1.png')}}" alt=""></div>
                            <div class="content">
                                <h5>Brian A. Barnes</h5>
                                <h6>CEO & Founder</h6>
                                <p>Sit amet consectetur adipiscing congue pose  habit ante dignissim faucibus tincidunt vulputate ullamcorper mattis quisque esta sidiculus.</p>
                            </div>
                            <a href="#" data-bs-toggle="modal" data-bs-target="#testimonials-pop1" class="btn-nav"><img src="{{asset('assets/images/link-arrow.svg')}}" alt=""></a>
                        </div>
                    </div>
                </div>
                 <!-- loop area close-->
                  <!-- loop area -->
                 <div class="item">
                    <div class="box">
                        <div class="item-box">
                            <div class="pic"><img src="{{asset('assets/images/test-img2.png')}}" alt=""></div>
                            <div class="content">
                                <h5>Brian A. Barnes</h5>
                                <h6>CEO & Founder</h6>
                                <p>Sit amet consectetur adipiscing congue pose  habit ante dignissim faucibus tincidunt vulputate ullamcorper mattis quisque esta sidiculus.</p>
                            </div>
                            <a href="#" data-bs-toggle="modal" data-bs-target="#testimonials-pop1" class="btn-nav"><img src="{{asset('assets/images/link-arrow.svg')}}" alt=""></a>
                        </div>
                    </div>
                </div>
                 <!-- loop area close-->
                  <!-- loop area -->
                 <div class="item">
                    <div class="box">
                        <div class="item-box">
                            <div class="pic"><img src="{{asset('assets/images/test-img3.png')}}" alt=""></div>
                            <div class="content">
                                <h5>Brian A. Barnes</h5>
                                <h6>CEO & Founder</h6>
                                <p>Sit amet consectetur adipiscing congue pose  habit ante dignissim faucibus tincidunt vulputate ullamcorper mattis quisque esta sidiculus.</p>
                            </div>
                            <a href="#" data-bs-toggle="modal" data-bs-target="#testimonials-pop1" class="btn-nav"><img src="{{asset('assets/images/link-arrow.svg')}}" alt=""></a>
                        </div>
                    </div>
                </div>
                 <!-- loop area close-->
            </div>
        </div>
    </div>
</section>
<!-- popup area -->
            <div class="modal fade" id="testimonials-pop1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                <div class="modal-header">
                    <div class="first">
                            <div class="pic"><img src="{{asset('assets/images/test-img3.png')}}" alt=""></div>
                            <div class="content">
                                <h5>Brian A. Barnes</h5>
                                <h6>CEO & Founder</h6>
                            </div>
                        </div>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="box-testi">
                        <div class="content-box">
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                            <p>Sit amet consectetur adipiscing congue pose  habit ante dignissim faucibus tincidunt vulputate ullamcorper mattis quisque esta sidiculus.</p>
                        </div>
                    </div>
                </div>
                </div>
            </div>
            </div>
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
