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
            @foreach($galleries as $gallery)
                <div class="col-lg-3 col-md-6 mb-3">
                    <div class="box" data-aos="fade-up" data-aos-duration="1000">
                        <a href="{{ asset('uploads/gallery/' . $gallery->image) }}"
                           data-fancybox="gallery"
                           data-caption="{{ $gallery->title }}">
                            <img src="{{ asset('uploads/gallery/' . $gallery->image) }}" alt="{{ $gallery->title }}">
                            <div class="title">
                                <h5>{{ $gallery->title }}</h5>
                                <p>{{ $gallery->date->format('d M Y') }}</p>
                            </div>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

@endsection
