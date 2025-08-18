@extends('layouts.user.user_layout')
@section('title', 'Lyka | ' .  $package->package_title )
@section('content')
<section class="inner-banner-area">
            <div class="container">
                <div class="inner-banner" style="background-image: url({{ asset('assets/images/package-view-banner.png') }});">
                    <div class="inner-body">
                        <h1 data-aos="fade-up" data-aos-duration="1000">{{ $package->package_title }}</h1>
                        <nav aria-label="breadcrumb" data-aos="fade-up" data-aos-duration="1500">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('user.home') }}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('user.packages') }}">Package</a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{ $package->package_title }}</li>
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
                        <h2>{{ $package->package_title }}</h2>
                        <h3>{{ $country->name }} of {{ $continent->name }}</h3>
                    </div>
                    <div class="price-sec" data-aos="fade-up" data-aos-duration="1500">
                        <div class="price-box">
                            <span class="start-from">Start From</span>
                            <div class="price">{{ $package->price }}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="row">
            {{-- @php
                print_r($displayImages);
                exit;
            @endphp --}}
            @foreach ($displayImages as $index => $image)
                <div class="col-lg-{{ $index == 0 ? '6' : '3' }} col-md-4 col-sm-4 mb-3 {{ $index == 0 ? 'd-none d-sm-none d-md-block' : '' }}" data-aos="fade-up" data-aos-duration="{{ 1000 + ($index * 500) }}">
                    <div class="img-box">
                        @if ($index == 2)
                            <a href="{{ asset($image) }}" class="view-more" data-fancybox="gallery" data-caption="">
                                <img src="{{ asset('assets/images/gallery-icon.svg') }}" alt="">View Gallery
                            </a>
                        @endif
                            <a href="{{ asset($image) }}" data-fancybox="gallery" data-caption="">
                                <img src="{{ asset($image) }}" alt="">
                            </a>

                    </div>
                </div>
            @endforeach

            {{-- Hidden Fancybox links --}}
            @foreach ($allImages->slice(3) as $hiddenImage)
                <a href="{{ $hiddenImage }}" data-fancybox="gallery" data-caption="" style="display:none;"></a>
            @endforeach

        </div>


        <div class="row">
            <div class="col-lg-12 mb-3">
                <div class="tour-type-sec">
                    <div class="box" data-aos="fade-up" data-aos-duration="1000">
                        <div class="icon"><img src="{{asset('assets/images/duration-icon.svg')}}" alt=""></div>
                        <div class="content">
                            <span class="sub-title">Duration</span>
                            <span class="title">{{ $package->duration }} Days</span>
                        </div>
                    </div>
                    <div class="box" data-aos="fade-up" data-aos-duration="1500">
                        <div class="icon"><img src="{{asset('assets/images/adventure-icon.svg')}}" alt=""></div>
                        <div class="content">
                            <span class="sub-title">Tour Type</span>
                            <span class="title">{{ $tourType->type }}</span>
                        </div>
                    </div>
                    <div class="box" data-aos="fade-up" data-aos-duration="1800">
                        <div class="icon"><img src="{{asset('assets/images/group-icon.svg')}}" alt=""></div>
                        <div class="content">
                            <span class="sub-title">Group Size</span>
                            <span class="title">{{ $package->group_size }} People</span>
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
                        @foreach($highlights as $highlight)
                            <li>{{ $highlight->title }}</li>
                        @endforeach
                    </ul>


                    <h4>Included / Exclude</h4>
                    <div class="conbined-sec">
                        <ul class="include">
                            @foreach($includes as $include)
                                <li>{{ $include->title }}</li>
                            @endforeach
                        </ul>
                        <ul class="exclude">
                            @foreach($excludes as $exclude)
                                <li>{{ $exclude->title }}</li>
                            @endforeach
                        </ul>
                    </div>

                    <h4>Tour Plan</h4>
                    <div class="itinerary">
                    <div class="accordion" id="v-tab">
                        @foreach ($dayPlans as $index => $dayPlan)
                        <div class="accordion-item" data-aos="fade-up" data-aos-duration="1000">
                            <h2 class="accordion-header" id="tab-view{{ $index + 1 }}">
                            <button
                                class="accordion-button {{ $index != 0 ? 'collapsed' : '' }}"
                                type="button"
                                data-bs-toggle="collapse"
                                data-bs-target="#tab{{ $index + 1 }}"
                                aria-expanded="{{ $index == 0 ? 'true' : 'false' }}"
                                aria-controls="tab{{ $index + 1 }}"
                            >
                                <span>Day {{ str_pad($dayPlan->day, 2, '0', STR_PAD_LEFT) }}</span> {{ $dayPlan->title }}
                            </button>
                            </h2>
                            <div
                            id="tab{{ $index + 1 }}"
                            class="accordion-collapse collapse {{ $index == 0 ? 'show' : '' }}"
                            aria-labelledby="tab-view{{ $index + 1 }}"
                            data-bs-parent="#v-tab"
                            >
                            <div class="accordion-body">
                                <p>{{ $dayPlan->description }}</p>
                                <div class="itinerary-img">
                                @if ($dayPlan->image_one)
                                    <div class="img-box"><img src="{{ asset('uploads/package/images/' . $dayPlan->image_one) }}" alt="Day {{ $dayPlan->day }} Image One"></div>
                                @endif
                                @if ($dayPlan->image_two)
                                    <div class="img-box"><img src="{{ asset('uploads/package/images/' . $dayPlan->image_two) }}" alt="Day {{ $dayPlan->day }} Image Two"></div>
                                @endif
                                @if ($dayPlan->image_three)
                                    <div class="img-box"><img src="{{ asset('uploads/package/images/' . $dayPlan->image_three) }}" alt="Day {{ $dayPlan->day }} Image Three"></div>
                                @endif
                                </div>
                            </div>
                            </div>
                        </div>
                        @endforeach
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
                        <form action="{{ route('user.store_enquiry') }}" method="POST">
                                @csrf
                        <div class="row">
                                <div class="col-lg-12 mb-3">
                                    <input type="text" class="form-control user" name="name" placeholder="Name" oninput="this.value = this.value.replace(/[^A-Za-z\s]/g, '')">
                                    @error('name')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                </div>
                                <div class="col-lg-12 mb-3">
                                    <input type="text" class="form-control phone" name="phone" placeholder="Phone Number" oninput="this.value = this.value.replace(/[^0-9]/g, '')">
                                    @error('phone')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                </div>
                                <div class="col-lg-12 mb-3">
                                    <input type="text" readonly class="form-control date" name="travel_date" id="datepicker" placeholder="Travel Date">
                                    @error('travel_date')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                </div>
                                <div class="col-lg-12 mb-3">
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
                                <div class="col-lg-12 mb-3">
                                    <div class="input-group plus-minus-input form-control passenger">
                                        <div>Passenger</div>
                                        <div class="count">
                                            <div class="input-group-button">
                                            <button type="button" class="button hollow circle" data-quantity="minus" data-field="quantity">
                                            <i class="fa fa-minus" aria-hidden="true"></i>
                                            </button>
                                        </div>
                                        <input class="input-group-field " type="number" name="quantity" value="1">
                                        <div class="input-group-button">
                                            <button type="button" class="button hollow circle" data-quantity="plus" data-field="quantity">
                                            <i class="fa fa-plus" aria-hidden="true"></i>
                                            </button>
                                        </div>
                                        </div>
                                        @error('quantity')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <button type="submit" class="form-control form-btn">SEND Enquiry <img src="{{asset('assets/images/button-arrow.svg')}}" alt=""></button>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>



@endsection
