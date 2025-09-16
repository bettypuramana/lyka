@extends('layouts.user.user_layout')
@section('title', 'Lyka | Packages')
@section('og-tags')
<meta property="og:title" content="Lyka | Packages" />
  <meta property="og:url" content="{{ url()->current() }}" />
  <meta property="og:site_name" content="LykaHolidays" />
@endsection
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

                {{-- Filters --}}
                <div class="filter-sec mb-4">
                    {{-- Continent Buttons --}}
                    <div class="filter" data-aos="fade-up" data-aos-duration="1500">
                        <button class="btn active" data-continent="all">All</button>
                        @foreach($continents as $continent)
                            <button class="btn" data-continent="{{ $continent->code }}">
                                {{ $continent->name }}
                            </button>
                        @endforeach
                    </div>

                    {{-- Tour Type Dropdown --}}
                    <div class="tourtype">
                        <select name="tour_type" class="form-control" id="tourTypeSelect">
                            <option value="">Tour Type</option>
                            @foreach($tourTypes as $type)
                                <option value="{{ $type->id }}">{{ ucfirst($type->type) }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
        </div>

        {{-- Packages Loop --}}
        <div class="row"  id="packagesList">

                @foreach($packages as $package)
                    <div class="col-lg-4 col-md-6 mb-3">
                        <div class="box">
                            <div class="destination-img">
                                <a href="{{ route('user.package_details', ['id' => $package->id, 'slug' => $package->slug]) }}">
                                    <img src="{{ asset('uploads/package/image/' . $package->main_image) }}" alt="{{ $package->title }}">
                                </a>
                            </div>
                            <div class="content-box">
                                <h3>{{ $package->package_title }}</h3>
                                <p><span>{{ $package->country_name }}</span></p>
                                <div class="travel-count">{{ $package->duration }} {{ $package->duration > 1 ? 'Days' : 'Day' }}@if(!empty($package->night) && $package->night > 0), {{ $package->night }} {{ $package->night > 1 ? 'Nights' : 'Night' }} @endif</div>
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

        {{-- Pagination (optional) --}}
        {{-- {{ $packages->links() }} --}}
    </div>
</section>


@endsection
@section('js')
<script>
    $(document).ready(function () {
        let selectedContinent = "all";
        let selectedTourType = "";

        // Handle continent button click
        $(".filter button").on("click", function () {
            $(".filter button").removeClass("active");
            $(this).addClass("active");
            selectedContinent = $(this).data("continent");
            loadPackages();
        });

        // Handle tour type dropdown change
        $("#tourTypeSelect").on("change", function () {
            selectedTourType = $(this).val();
            loadPackages();
        });

        // Function to load packages via AJAX
        function loadPackages() {
            $.ajax({
                url: "{{ route('user.packages') }}", // Same route as current page
                type: "GET",
                data: {
                    continent: selectedContinent,
                    tour_type: selectedTourType,
                    ajax: 1 // flag for AJAX requests
                },
                success: function (data) {
                    $("#packagesList").html($(data).find("#packagesList").html());
                }
            });
        }
    });
</script>
@endsection
