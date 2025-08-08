@extends('layouts.user.user_layout')
@section('title', 'Lyka | Package Details')
@section('content')
<section class="inner-banner-area">
            <div class="container">
                <div class="inner-banner" style="background-image: url(assets/images/package-view-banner.png);">
                    <div class="inner-body">
                        <h1 data-aos="fade-up" data-aos-duration="1000">Package Details</h1>
                        <nav aria-label="breadcrumb" data-aos="fade-up" data-aos-duration="1500">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('user.home') }}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('user.packages') }}">Package</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Parthenon in Athens, Greece</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>
</section>

<section class="package-details-body p60">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 mb-3">
                <div class="package-head" data-aos="fade-up" data-aos-duration="1000">
                    <div class="destination-sec">
                        <h2>Parthenon in Athens, Greece</h2>
                        <h3>Acropolis of Athens</h3>
                    </div>
                    <div class="price-sec" data-aos="fade-up" data-aos-duration="1500">
                        <div class="price-box">
                            <span class="start-from">Start From</span>
                            <div class="price">4,999.00</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6 col-md-4 col-sm-4 mb-3 d-none d-sm-none d-md-block" data-aos="fade-up" data-aos-duration="1000">
                <div class="img-box"><a href="{{asset('assets/images/package-img1.jpg')}}" data-fancybox="gallery" data-caption=""><img src="{{asset('assets/images/package-img1.jpg')}}" alt=""></a></div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-4 mb-3 d-none d-sm-none d-md-block" data-aos="fade-up" data-aos-duration="1500">
                <div class="img-box"><a href="{{asset('assets/images/package-img2.jpg')}}" data-fancybox="gallery" data-caption=""><img src="{{asset('assets/images/package-img2.jpg')}}" alt=""></a></div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-12 mb-3">
                <div class="img-box">
                    <img src="{{asset('assets/images/package-img3.jpg')}}" alt="" data-aos="fade-up" data-aos-duration="1800">
                    <a href="{{asset('assets/images/package-img3.jpg')}}" class="view-more" data-fancybox="gallery" data-caption="">
                        <img src="{{asset('assets/images/gallery-icon.svg')}}" alt="">View Gallery
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-4 mb-3 d-none">
                <div class="img-box"><a href="{{asset('assets/images/package-img4.jpg')}}" data-fancybox="gallery" data-caption=""><img src="{{asset('assets/images/package-img4.jpg')}}" alt=""></a></div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-4 mb-3 d-none">
                <div class="img-box"><a href="{{asset('assets/images/package-img5.jpg')}}" data-fancybox="gallery" data-caption=""><img src="{{asset('assets/images/package-img5.jpg')}}" alt=""></a></div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-4 mb-3 d-none">
                <div class="img-box"><a href="{{asset('assets/images/package-img6.jpg')}}" data-fancybox="gallery" data-caption=""><img src="{{asset('assets/images/package-img6.jpg')}}" alt=""></a></div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 mb-3">
                <div class="tour-type-sec">
                    <div class="box" data-aos="fade-up" data-aos-duration="1000">
                        <div class="icon"><img src="{{asset('assets/images/duration-icon.svg')}}" alt=""></div>
                        <div class="content">
                            <span class="sub-title">Duration</span>
                            <span class="title">4 Days</span>
                        </div>
                    </div>
                    <div class="box" data-aos="fade-up" data-aos-duration="1500">
                        <div class="icon"><img src="{{asset('assets/images/adventure-icon.svg')}}" alt=""></div>
                        <div class="content">
                            <span class="sub-title">Tour Type</span>
                            <span class="title">Adventure</span>
                        </div>
                    </div>
                    <div class="box" data-aos="fade-up" data-aos-duration="1800">
                        <div class="icon"><img src="{{asset('assets/images/group-icon.svg')}}" alt=""></div>
                        <div class="content">
                            <span class="sub-title">Group Size</span>
                            <span class="title">50 People</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-8">
                <div class="tour-sec" data-aos="fade-up" data-aos-duration="1000">
                    <h4>About This Tour</h4>
                    <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum.</p>    
                    <h4>Trip Highlights</h4>
                    <ul class="heighlight">
                        <li>Tour the city with a licensed NYC tour guide, who</li>
                        <li>Explore with a guide to delve deeper into the history</li>
                        <li>Great for history buffs and travelers with limited time</li>
                    </ul>
                    <h4>Included/ Exclude</h4>
                    <div class="conbined-sec">
                        <ul class="include">
                            <li>Pick and Drop Service</li>
                            <li>1 Meal Per Day</li>
                            <li>Cruise Dinner & Music Event</li>
                            <li>Visit 7 Best Places</li>
                        </ul>
                        <ul class="exclude">
                            <li>Return airport and round trip</li>
                            <li>transfers</li>
                            <li>Luxury air-conditioned coach</li>
                            <li>Tickets</li>
                        </ul>
                    </div>
                    <h4>Tour Plan</h4>
                    <div class="itinerary">
                        <div class="accordion" id="v-tab">
                        <div class="accordion-item" data-aos="fade-up" data-aos-duration="1000">
                            <h2 class="accordion-header" id="tab-view1">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#tab1" aria-expanded="true" aria-controls="tab1">
                                <span>Day 01</span> Lorem ipsum dolor sit amet, consetetur sadipscing elitr
                            </button>
                            </h2>
                            <div id="tab1" class="accordion-collapse collapse show" aria-labelledby="tab-view1" data-bs-parent="#v-tab">
                            <div class="accordion-body">
                                <p>Standard requirements include a completed visa application form, passport-sized photos, a valid passport, a flight itinerary, a hotel reservation,employment proof and proof of financial means. However, these requirements may vary based on the type of visa and the applicant’s purpose of travel.</p>
                                <div class="itinerary-img">
                                    <div class="img-box"><img src="{{asset('assets/images/destination-img1.jpg')}}" alt=""></div>
                                    <div class="img-box"><img src="{{asset('assets/images/destination-img2.jpg')}}" alt=""></div>
                                    <div class="img-box"><img src="{{asset('assets/images/destination-img3.jpg')}}" alt=""></div>
                                </div>
                            </div>
                            </div>
                        </div>
                        <div class="accordion-item" data-aos="fade-up" data-aos-duration="1000">
                            <h2 class="accordion-header" id="tab-view2">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#tab2" aria-expanded="false" aria-controls="tab2">
                                <span>Day 02</span> Lorem ipsum dolor sit amet, consetetur sadipscing elitr
                            </button>
                            </h2>
                            <div id="tab2" class="accordion-collapse collapse" aria-labelledby="tab-view2" data-bs-parent="#v-tab">
                            <div class="accordion-body">
                                <p>Standard requirements include a completed visa application form, passport-sized photos, a valid passport, a flight itinerary, a hotel reservation,employment proof and proof of financial means. However, these requirements may vary based on the type of visa and the applicant’s purpose of travel.</p>
                                <div class="itinerary-img">
                                    <div class="img-box"><img src="{{asset('assets/images/destination-img1.jpg')}}" alt=""></div>
                                    <div class="img-box"><img src="{{asset('assets/images/destination-img2.jpg')}}" alt=""></div>
                                    <div class="img-box"><img src="{{asset('assets/images/destination-img3.jpg')}}" alt=""></div>
                                </div>
                            </div>
                            </div>
                        </div>
                        <div class="accordion-item" data-aos="fade-up" data-aos-duration="1000">
                            <h2 class="accordion-header" id="tab-view3">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#tab3" aria-expanded="false" aria-controls="tab2">
                                <span>Day 03</span> Lorem ipsum dolor sit amet, consetetur sadipscing elitr
                            </button>
                            </h2>
                            <div id="tab3" class="accordion-collapse collapse" aria-labelledby="tab-view3" data-bs-parent="#v-tab">
                            <div class="accordion-body">
                                <p>Standard requirements include a completed visa application form, passport-sized photos, a valid passport, a flight itinerary, a hotel reservation,employment proof and proof of financial means. However, these requirements may vary based on the type of visa and the applicant’s purpose of travel.</p>
                                <div class="itinerary-img">
                                    <div class="img-box"><img src="{{asset('assets/images/destination-img1.jpg')}}" alt=""></div>
                                    <div class="img-box"><img src="{{asset('assets/images/destination-img2.jpg')}}" alt=""></div>
                                    <div class="img-box"><img src="{{asset('assets/images/destination-img3.jpg')}}" alt=""></div>
                                </div>
                            </div>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4" data-aos="fade-up" data-aos-duration="1500">
                <div class="package-enquiry sticky-top">
                    <div class="head">
                        <h5>Package Enquiry</h5>
                        <p>We will get back to you</p>
                    </div>
                    <div class="form-box">
                        <div class="row">
                                <div class="col-lg-12 mb-3">
                                    <input type="text" class="form-control user" id="" placeholder="Name">
                                </div>
                                <div class="col-lg-12 mb-3">
                                    <input type="text" class="form-control phone" id="" placeholder="Phone Number">
                                </div>
                                <div class="col-lg-12 mb-3">
                                    <input type="text" class="form-control date" id="datepicker" placeholder="Travel Date">
                                </div>
                                <div class="col-lg-12 mb-3">
                                    <input type="text" class="form-control destinations1" id="" placeholder="Destinations">
                                </div>
                                <div class="col-lg-12 mb-3">
                                    <div class="input-group plus-minus-input form-control passenger">
                                        <div>Passenger</div>
                                        <div class="count">
                                            <div class="input-group-button">
                                            <button type="button" class="button hollow circle" data-quantity="minus" data-field="quantity">
                                            <i class="fa fa-minus" aria-hidden="true"></i>
                                            </button>
                                        </div>
                                        <input class="input-group-field " type="number" name="quantity" value="0">
                                        <div class="input-group-button">
                                            <button type="button" class="button hollow circle" data-quantity="plus" data-field="quantity">
                                            <i class="fa fa-plus" aria-hidden="true"></i>
                                            </button>
                                        </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <button class="form-control form-btn">SEND Enquiry <img src="{{asset('assets/images/button-arrow.svg')}}" alt=""></button>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>



@endsection
