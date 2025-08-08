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
                            <li class="breadcrumb-item"><a href="{{ route('user.home') }}">Home</a></li>
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
                    @foreach($continents as $continent)
                        <button class="btn">{{ $continent->name }}</button>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="row">
            @foreach($visas as $visa)
                <div class="col-lg-3 col-md-4 mb-3">
                    <div class="box">
                        <a href="{{ route('user.visa_details', $visa->slug) }}">
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

    </div>
</section>

@endsection
