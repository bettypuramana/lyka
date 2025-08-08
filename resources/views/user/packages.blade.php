@extends('layouts.user.user_layout')
@section('title', 'Lyka | Packages')
@section('content')
<section class="inner-banner-area">
            <div class="container">
                <div class="inner-banner" style="background-image: url(assets/images/package-banner.png);">
                    <div class="inner-body">
                        <h1 data-aos="fade-up" data-aos-duration="1000">Packages</h1>
                        <nav aria-label="breadcrumb" data-aos="fade-up" data-aos-duration="1500">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('user.home') }}">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Packages</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>
</section>

<section class="package-body p60">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="title-head mb-4" data-aos="fade-up" data-aos-duration="1000">
                    <h2>Explore Popular Tours</h2>
                    <p>Get started with handpicked top rated trips.</p>
                </div>
                <div class="filter-sec mb-4">
                    <div class="filter" data-aos="fade-up" data-aos-duration="1500">
                        <button class="btn active">All</button>
                        <button class="btn">Asia</button>
                        <button class="btn">North America</button>
                        <button class="btn">Europe</button>
                        <button class="btn">South America</button>
                    </div>
                    <div class="tourtype">
                        <select name="" id="" class="form-control">
                            <option selected disabled value="">Tour Type</option>
                            <option value="">Adventure Tour</option>
                            <option value="">Group Tour</option>
                            <option value="">Seasonal Tour</option>
                            <option value="">Relaxation Tour</option>
                            <option value="">Family Friendly Tour</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <!-- loop area -->
             <div class="col-lg-4 col-md-6 mb-3" data-aos="fade-up" data-aos-duration="1000">
                <div class="box">
                    <div class="destination-img">
                        <a href="{{ route('user.package_details') }}"><img src="{{asset('assets/images/destination-img1.jpg')}}" alt=""></a>
                    </div>
                    <div class="content-box">
                        <h3>Borobudur Heritage Trail</h3>
                        <p><span>Budapest, Hungary</span></p>
                        <div class="travel-count">2 Days, 1 Night</div>
                        <div class="btm-box">
                            <div class="price">
                                <p>Start From</p>
                                <div class="amount">4,999.00</div>
                            </div>
                            <div class="more">
                                <a href="{{ route('user.package_details') }}">View More</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- loop area close-->
             <!-- loop area -->
             <div class="col-lg-4 col-md-6 mb-3" data-aos="fade-up" data-aos-duration="1500">
                <div class="box">
                    <div class="destination-img">
                        <a href="{{ route('user.package_details') }}"><img src="{{asset('assets/images/destination-img2.jpg')}}" alt=""></a>
                    </div>
                    <div class="content-box">
                        <h3>Borobudur Heritage Trail</h3>
                        <p><span>Budapest, Hungary</span></p>
                        <div class="travel-count">2 Days, 1 Night</div>
                        <div class="btm-box">
                            <div class="price">
                                <p>Start From</p>
                                <div class="amount">4,999.00</div>
                            </div>
                            <div class="more">
                                <a href="{{ route('user.package_details') }}">View More</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- loop area close-->
             <!-- loop area -->
             <div class="col-lg-4 col-md-6 mb-3" data-aos="fade-up" data-aos-duration="1800">
                <div class="box">
                    <div class="destination-img">
                        <a href="{{ route('user.package_details') }}"><img src="{{asset('assets/images/destination-img3.jpg')}}" alt=""></a>
                    </div>
                    <div class="content-box">
                        <h3>Borobudur Heritage Trail</h3>
                        <p><span>Budapest, Hungary</span></p>
                        <div class="travel-count">2 Days, 1 Night</div>
                        <div class="btm-box">
                            <div class="price">
                                <p>Start From</p>
                                <div class="amount">4,999.00</div>
                            </div>
                            <div class="more">
                                <a href="{{ route('user.package_details') }}">View More</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- loop area close-->
             <!-- loop area -->
             <div class="col-lg-4 col-md-6 mb-3" data-aos="fade-up" data-aos-duration="1000">
                <div class="box">
                    <div class="destination-img">
                        <a href="{{ route('user.package_details') }}"><img src="{{asset('assets/images/destination-img4.jpg')}}" alt=""></a>
                    </div>
                    <div class="content-box">
                        <h3>Borobudur Heritage Trail</h3>
                        <p><span>Budapest, Hungary</span></p>
                        <div class="travel-count">2 Days, 1 Night</div>
                        <div class="btm-box">
                            <div class="price">
                                <p>Start From</p>
                                <div class="amount">4,999.00</div>
                            </div>
                            <div class="more">
                                <a href="{{ route('user.package_details') }}">View More</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- loop area close-->
             <!-- loop area -->
             <div class="col-lg-4 col-md-6 mb-3" data-aos="fade-up" data-aos-duration="1500">
                <div class="box">
                    <div class="destination-img">
                        <a href="{{ route('user.package_details') }}"><img src="{{asset('assets/images/destination-img5.jpg')}}" alt=""></a>
                    </div>
                    <div class="content-box">
                        <h3>Borobudur Heritage Trail</h3>
                        <p><span>Budapest, Hungary</span></p>
                        <div class="travel-count">2 Days, 1 Night</div>
                        <div class="btm-box">
                            <div class="price">
                                <p>Start From</p>
                                <div class="amount">4,999.00</div>
                            </div>
                            <div class="more">
                                <a href="{{ route('user.package_details') }}">View More</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- loop area close-->
             <!-- loop area -->
             <div class="col-lg-4 col-md-6 mb-3" data-aos="fade-up" data-aos-duration="1800">
                <div class="box">
                    <div class="destination-img">
                        <a href="{{ route('user.package_details') }}"><img src="{{asset('assets/images/destination-img6.jpg')}}" alt=""></a>
                    </div>
                    <div class="content-box">
                        <h3>Borobudur Heritage Trail</h3>
                        <p><span>Budapest, Hungary</span></p>
                        <div class="travel-count">2 Days, 1 Night</div>
                        <div class="btm-box">
                            <div class="price">
                                <p>Start From</p>
                                <div class="amount">4,999.00</div>
                            </div>
                            <div class="more">
                                <a href="{{ route('user.package_details') }}">View More</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- loop area close-->
             <!-- loop area -->
             <div class="col-lg-4 col-md-6 mb-3" data-aos="fade-up" data-aos-duration="1000">
                <div class="box">
                    <div class="destination-img">
                        <a href="{{ route('user.package_details') }}"><img src="{{asset('assets/images/destination-img7.jpg')}}" alt=""></a>
                    </div>
                    <div class="content-box">
                        <h3>Borobudur Heritage Trail</h3>
                        <p><span>Budapest, Hungary</span></p>
                        <div class="travel-count">2 Days, 1 Night</div>
                        <div class="btm-box">
                            <div class="price">
                                <p>Start From</p>
                                <div class="amount">4,999.00</div>
                            </div>
                            <div class="more">
                                <a href="{{ route('user.package_details') }}">View More</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- loop area close-->
             <!-- loop area -->
             <div class="col-lg-4 col-md-6 mb-3" data-aos="fade-up" data-aos-duration="1500">
                <div class="box">
                    <div class="destination-img">
                        <a href="{{ route('user.package_details') }}"><img src="{{asset('assets/images/destination-img8.jpg')}}" alt=""></a>
                    </div>
                    <div class="content-box">
                        <h3>Borobudur Heritage Trail</h3>
                        <p><span>Budapest, Hungary</span></p>
                        <div class="travel-count">2 Days, 1 Night</div>
                        <div class="btm-box">
                            <div class="price">
                                <p>Start From</p>
                                <div class="amount">4,999.00</div>
                            </div>
                            <div class="more">
                                <a href="{{ route('user.package_details') }}">View More</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- loop area close-->
             <!-- loop area -->
             <div class="col-lg-4 col-md-6 mb-3" data-aos="fade-up" data-aos-duration="1800">
                <div class="box">
                    <div class="destination-img">
                        <a href="{{ route('user.package_details') }}"><img src="{{asset('assets/images/destination-img9.jpg')}}" alt=""></a>
                    </div>
                    <div class="content-box">
                        <h3>Borobudur Heritage Trail</h3>
                        <p><span>Budapest, Hungary</span></p>
                        <div class="travel-count">2 Days, 1 Night</div>
                        <div class="btm-box">
                            <div class="price">
                                <p>Start From</p>
                                <div class="amount">4,999.00</div>
                            </div>
                            <div class="more">
                                <a href="{{ route('user.package_details') }}">View More</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- loop area close-->
        </div>
    </div>
</section>

@endsection
