@extends('layouts.user.user_layout')
@section('title', 'Lyka | Visa')
@section('content')
<section class="inner-banner-area">
            <div class="container">
                <div class="inner-banner" style="background-image: url(assets/images/visa-banner.png);">
                    <div class="inner-body">
                        <h1>Visa</h1>
                        <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Visa</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>
</section>

<section class="visa-body p60">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="title-head mb-4">
                    <h2>Countries We Assist</h2>
                    <p>Reliable visa services all over the world</p>
                </div>
                <div class="filter mb-4">
                    <button class="btn active">All</button>
                    <button class="btn">Asia</button>
                    <button class="btn">Europe</button>
                    <button class="btn">Middle East</button>
                </div>
            </div>
        </div>
        <div class="row">
            <!-- loop area -->
            <div class="col-lg-3 col-md-4 mb-3">
                <div class="box">
                    <a href="visa-details.html">
                        <div class="visa-location">
                            <img src="{{asset('assets/images/usa-visa.jpg')}}" alt="">
                        </div>
                        <div class="content">
                            <div class="map">
                                <img src="{{asset('assets/images/flag-img1.jpg')}}" alt="">
                            </div>
                            <h4>USA Visa</h4>
                        </div>
                    </a>
                </div>
            </div>
            <!-- loop area close-->
             <!-- loop area -->
            <div class="col-lg-3 col-md-4 mb-3">
                <div class="box">
                    <a href="visa-details.html">
                        <div class="visa-location">
                            <img src="{{asset('assets/images/uk-visa.jpg')}}" alt="">
                        </div>
                        <div class="content">
                            <div class="map">
                                <img src="{{asset('assets/images/flag-img2.jpg')}}" alt="">
                            </div>
                            <h4>UK Visa</h4>
                        </div>
                    </a>
                </div>
            </div>
            <!-- loop area close-->
             <!-- loop area -->
            <div class="col-lg-3 col-md-4 mb-3">
                <div class="box">
                    <a href="visa-details.html">
                        <div class="visa-location">
                            <img src="{{asset('assets/images/canada-visa.jpg')}}" alt="">
                        </div>
                        <div class="content">
                            <div class="map">
                                <img src="{{asset('assets/images/flag-img3.jpg')}}" alt="">
                            </div>
                            <h4>Canada Visa</h4>
                        </div>
                    </a>
                </div>
            </div>
            <!-- loop area close-->
             <!-- loop area -->
            <div class="col-lg-3 col-md-4 mb-3">
                <div class="box">
                    <a href="visa-details.html">
                        <div class="visa-location">
                            <img src="{{asset('assets/images/australia-visa.jpg')}}" alt="">
                        </div>
                        <div class="content">
                            <div class="map">
                                <img src="{{asset('assets/images/flag-img4.jpg')}}" alt="">
                            </div>
                            <h4>Australia Visa</h4>
                        </div>
                    </a>
                </div>
            </div>
            <!-- loop area close-->
             <!-- loop area -->
            <div class="col-lg-3 col-md-4 mb-3">
                <div class="box">
                    <a href="visa-details.html">
                        <div class="visa-location">
                            <img src="{{asset('assets/images/uae-visa.jpg')}}" alt="">
                        </div>
                        <div class="content">
                            <div class="map">
                                <img src="{{asset('assets/images/flag-img5.jpg')}}" alt="">
                            </div>
                            <h4>UAE Visa</h4>
                        </div>
                    </a>
                </div>
            </div>
            <!-- loop area close-->
             <!-- loop area -->
            <div class="col-lg-3 col-md-4 mb-3">
                <div class="box">
                    <a href="visa-details.html">
                        <div class="visa-location">
                            <img src="{{asset('assets/images/singapore-visa.jpg')}}" alt="">
                        </div>
                        <div class="content">
                            <div class="map">
                                <img src="{{asset('assets/images/flag-img6.jpg')}}" alt="">
                            </div>
                            <h4>Singapore Visa</h4>
                        </div>
                    </a>
                </div>
            </div>
            <!-- loop area close-->
              <!-- loop area -->
            <div class="col-lg-3 col-md-4 mb-3">
                <div class="box">
                    <a href="visa-details.html">
                        <div class="visa-location">
                            <img src="{{asset('assets/images/turkey-visa.jpg')}}" alt="">
                        </div>
                        <div class="content">
                            <div class="map">
                                <img src="{{asset('assets/images/flag-img7.jpg')}}" alt="">
                            </div>
                            <h4>Turkey Visa</h4>
                        </div>
                    </a>
                </div>
            </div>
            <!-- loop area close-->
              <!-- loop area -->
            <div class="col-lg-3 col-md-4 mb-3">
                <div class="box">
                    <a href="visa-details.html">
                        <div class="visa-location">
                            <img src="{{asset('assets/images/kenya-visa.jpg')}}" alt="">
                        </div>
                        <div class="content">
                            <div class="map">
                                <img src="{{asset('assets/images/flag-img8.jpg')}}" alt="">
                            </div>
                            <h4>Kenya Visa</h4>
                        </div>
                    </a>
                </div>
            </div>
            <!-- loop area close-->
        </div>
    </div>
</section>

@endsection
