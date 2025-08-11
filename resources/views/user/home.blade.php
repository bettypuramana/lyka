@extends('layouts.user.user_layout')
@section('title', 'Lyka | Explore The Unseen')
@section('content')
        <section class="banner-area">
            <div class="container">
                <div id="demo" class="carousel slide" data-bs-ride="carousel">
                    <!-- Indicators/dots -->
                    <div class="carousel-indicators">
                        @foreach ($banners as $index => $banner)
                            <button type="button" data-bs-target="#demo" data-bs-slide-to="{{ $index }}" class="{{ $index == 0 ? 'active' : '' }}"></button>
                        @endforeach
                    </div>

                    <!-- The slideshow/carousel -->
                    <div class="carousel-inner">
                        @foreach ($banners as $index => $banner)
                            <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                                <img src="{{ asset('uploads/banners/' . $banner->image) }}" alt="{{ $banner->title }}" class="d-block" style="width:100%">
                                <div class="carousel-caption">
                                    <h1>{{ $banner->title }}</h1>
                                    <p>{{ $banner->subtitle }}</p>
                                    <a href="{{ route('user.packages') }}">Know More</a>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <!-- Controls -->
                    <button class="carousel-control-prev" type="button" data-bs-target="#demo" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon"></span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#demo" data-bs-slide="next">
                        <span class="carousel-control-next-icon"></span>
                    </button>
                </div>
            </div>
        </section>

        <section class="form-sec" data-aos="fade-up" data-aos-duration="1000">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-10">
                        <div class="form-box">
                            <form action="{{ route('user.store_enquiry') }}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-4 col-md-6 mb-3">
                                        <select name="destination" id="destination" class="form-control destinations1">
                                            <option selected disabled value="">Destinations</option>
                                            @foreach($countries as $country)
                                                <option value="{{ $country->id }}">{{ $country->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('destination')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-lg-4 col-md-6 mb-3">
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
                                        @error('quantity')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-lg-4 col-md-6 mb-3">
                                        <input type="text" class="form-control date"  name="travel_date" id="datepicker" placeholder="Travel Date">
                                        @error('travel_date')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-lg-4 col-md-6 mb-3">
                                        <input type="text" class="form-control user" name="name" id="" placeholder="Name">
                                        @error('name')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-lg-4 col-md-6 mb-3">
                                        <input type="text" class="form-control phone" name="phone" id="" placeholder="Phone Number">
                                        @error('phone')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-lg-4 col-md-6">
                                        <button type="submit" class="form-control form-btn">SEND Enquiry <img src="{{asset('assets/images/button-arrow.svg')}}" alt=""></button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
</section>

<section class="destination-sec p60" data-aos="fade-up" data-aos-duration="1000">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 title-head">
                <h2>From Dream to Destination</h2>
                <p>Travel with Lyka Holidays</p>
            </div>
            <div class="col-lg-12 mb-3 owl-carousel destinations owl-theme">
                @foreach($packages as $package)
                <div class="item">
                    <div class="box">
                        <div class="destination-img">
                            <a href="{{ route('user.package_details', ['id' => $package->id, 'slug' => $package->slug]) }}">
                                <img src="{{ asset('uploads/package/image/' . ($package->main_image ?? 'placeholder.jpg')) }}" alt="{{ $package->package_title }}">
                            </a>
                        </div>
                        <div class="content-box">
                            <h3>{{ $package->package_title }}</h3>
                            <p>
                                <span>{{ $package->countryName->name ?? '' }}</span>
                            </p>
                            <div class="travel-count">{{ $package->duration ?? '-' }}</div>
                            <div class="btm-box">
                                <div class="price">
                                    <p>Start From</p>
                                    <div class="amount">{{ number_format($package->price, 2) }}</div>
                                </div>
                                <div class="more">
                                    <a href="{{ route('user.package_details', ['id' => $package->id, 'slug' => $package->slug]) }}">View More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="col-lg-12 d-flex justify-content-center">
                <a class="link" href="{{ route('user.packages') }}">Explore More</a>
            </div>
        </div>
    </div>
</section>

<section class="visa-sec p60" data-aos="fade-up" data-aos-duration="1000">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 title-head">
                <h2>Visa Services</h2>
                <p>From Paperwork to Passport - We've Got It Covered.</p>
            </div>
            <div class="col-lg-12 mb-3 owl-carousel visa-scroll owl-theme">
                @foreach ($visas as $visa)
                    <div class="item">
                        <div class="box">
                            <a href="{{ route('user.visa_details', $visa->id) }}">
                                <div class="visa-location">
                                    <img src="{{ asset('uploads/visa/' . $visa->image) }}" alt="{{ $visa->title }}">
                                </div>
                                <div class="content">
                                    <div class="map">
                                        <img src="{{ asset('uploads/visa/flags/' . $visa->flag) }}" alt="{{ $visa->title }} Flag">
                                    </div>
                                    <h4>{{ $visa->title }}</h4>
                                </div>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="col-lg-12 d-flex justify-content-center">
                <a class="link" href="{{ route('user.visa') }}">View all visa services</a>
            </div>
        </div>
    </div>
</section>

<section class="why-choose-area p60">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 d-flex align-items-center">
                <div class="content">
                    <h4>Why Choose Us?</h4>
                    <h5>Dare to live the lift you've always wanted</h5>
                    <p>Discover how you can offset your adventure's carbon emissions and support the sustainable initiatives practiced by our operators worldwide.</p>
                    <div class="count-box">
                        <div class="box" data-aos="fade-up" data-aos-duration="800">
                            <div class="number">20+</div>
                            <div class="txt">Years Experience</div>
                        </div>
                        <div class="box" data-aos="fade-up" data-aos-duration="900">
                            <div class="number">460+</div>
                            <div class="txt">Destination Collabration</div>
                        </div>
                        <div class="box" data-aos="fade-up" data-aos-duration="1000">
                            <div class="number">50K</div>
                            <div class="txt">Happy Customers</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="why-choose-img-area">
                    <img src="{{asset('assets/images/why-choose-us.png')}}" alt="" data-aos="fade-left" data-aos-duration="2000">
                    <div class="emoji-sec">
                        <h6>How Your Experience?</h6>
                        <div class="emoji">
                            <img src="{{asset('assets/images/emoji-img1.svg')}}" alt="">
                            <img src="{{asset('assets/images/emoji-img2.svg')}}" alt="">
                            <img src="{{asset('assets/images/emoji-img3.svg')}}" alt="">
                            <img src="{{asset('assets/images/emoji-img4.svg')}}" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="gallery-sec p60">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 mb-3 title-head" data-aos="fade-up" data-aos-duration="2000">
                <h2>Journey to the Most Beautiful Places on Earth</h2>
                <p>From hidden gems To global icons</p>
            </div>
        </div>

        @php
            // Make sure we don't break if less than 5 items
            $chunks = $galleries->chunk(2); // 2 per column except middle which has 1
        @endphp

        <div class="row">
            {{-- First column --}}
            <div class="col-lg-4 col-md-4">
                <div class="box">
                    @foreach($galleries->take(2) as $index => $item)
                        <div class="sm-ht" data-aos="fade-up" data-aos-duration="{{ 1000 + ($index * 100) }}">
                            <a href="{{ asset('uploads/gallery/'.$item->image) }}" data-fancybox="gallery" data-caption="{{ $item->title }}">
                                <img src="{{ asset('uploads/gallery/'.$item->image) }}" alt="">
                                <div class="title">
                                    <h5>{{ $item->title }}</h5>
                                    <p>{{ $item->created_at->format('d M Y') }}</p>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>

            {{-- Middle column --}}
            <div class="col-lg-4 col-md-4">
                <div class="box">
                    @if($galleries->count() >= 3)
                        <div class="lg-ht" data-aos="fade-up" data-aos-duration="1200">
                            <a href="{{ asset('uploads/gallery/'.$galleries[2]->image) }}" data-fancybox="gallery" data-caption="{{ $galleries[2]->title }}">
                                <img src="{{ asset('uploads/gallery/'.$galleries[2]->image) }}" alt="">
                                <div class="title">
                                    <h5>{{ $galleries[2]->title }}</h5>
                                    <p>{{ $galleries[2]->created_at->format('d M Y') }}</p>
                                </div>
                            </a>
                        </div>
                    @endif
                </div>
            </div>

            {{-- Last column --}}
            <div class="col-lg-4 col-md-4">
                <div class="box">
                    @foreach($galleries->slice(3, 2) as $index => $item)
                        <div class="sm-ht" data-aos="fade-up" data-aos-duration="{{ 1300 + ($index * 100) }}">
                            <a href="{{ asset('uploads/gallery/'.$item->image) }}" data-fancybox="gallery" data-caption="{{ $item->title }}">
                                <img src="{{ asset('uploads/gallery/'.$item->image) }}" alt="">
                                <div class="title">
                                    <h5>{{ $item->title }}</h5>
                                    <p>{{ $item->created_at->format('d M Y') }}</p>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12 mt-3 d-flex justify-content-center" data-aos="fade-up" data-aos-duration="1500">
                <a class="link" href="{{ route('user.gallery') }}">View Gallery</a>
            </div>
        </div>
    </div>
</section>


<section class="testimonials-sec p60" data-aos="fade-up" data-aos-duration="1500">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 mb-3 title-head" data-aos="fade-up" data-aos-duration="1500">
                <h2>What Our Travelers Say</h2>
                <p>Real Stories From Happy Adventurers</p>
            </div>
            <div class="col-lg-12 owl-carousel testimonial-scroll owl-theme">
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
                                    <p>{{ Str::limit($testimonial->message, 120) }}</p>
                                </div>
                                <a href="#" data-bs-toggle="modal" data-bs-target="#testimonial-modal-{{ $testimonial->id }}" class="btn-nav">
                                    <img src="{{ asset('assets/images/link-arrow.svg') }}" alt="">
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>

<!-- Popup area -->
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
<section class="newsletter-sec" style="background-image: url(assets/images/newsletter-bg.jpg);">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <h5 data-aos="fade-up" data-aos-duration="1000">Book Early. Save More.</h5>
                <h6 data-aos="fade-up" data-aos-duration="1500">Unlock limited-time AED savings with our exclusive pre-booking offers.</h6>
                <div class="input-sec" data-aos="fade-up" data-aos-duration="1700">
                    <form action="{{ route('user.subscribe') }}" method="POST">
                        @csrf
                        <input type="email" name="email" class="form-control" placeholder="Enter your email" required>
                        <button  type="submit" class="btn">Subscribe Now</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="blog-sec p60"> 
    <div class="container">
        <div class="row justify-content-center" data-aos="fade-up" data-aos-duration="1000">
            <div class="col-lg-6 mb-3 title-head">
                <h5>Your Ultimate Travel Guide</h5>
                <h6>Discover Travel Insights, and Must-visit Destinations</h6>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 owl-carousel blog-scroll owl-theme" data-aos="fade-up" data-aos-duration="1500">
                @foreach($blogs as $blog)
                <div class="item">
                    <div class="box">
                        <div class="blog-img">
                            <a href="{{ route('user.blog_details', ['id' => $blog->id, 'slug' => $blog->slug]) }}">
                                <img src="{{ asset('uploads/blogs/' . $blog->image) }}" alt="">
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
                            <a class="b-link" href="{{ route('user.blog_details', ['id' => $blog->id, 'slug' => $blog->slug]) }}">Read More</a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
@endsection
