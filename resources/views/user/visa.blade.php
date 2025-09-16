@extends('layouts.user.user_layout')
@section('title', 'Lyka | Visa')
@section('og-tags')
<meta property="og:title" content="Lyka | Visa" />
  <meta property="og:url" content="{{ url()->current() }}" />
  <meta property="og:site_name" content="LykaHolidays" />
@endsection
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
                </nav>
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
                    <button class="btn active" data-code="all">All</button>
                    @foreach($continents as $continent)
                        <button class="btn" data-code="{{ $continent->code }}">{{ $continent->name }}</button>
                    @endforeach
                </div>
            </div>
        </div>

        <div class="row" id="visa-container">
            @include('user.partials.visa_list', ['visas' => $visas])
        </div>
    </div>
</section>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function(){
    $('.filter .btn').click(function(){
        $('.filter .btn').removeClass('active');
        $(this).addClass('active');

        let continentCode = $(this).data('code');

        $.get('{{ url("/visa/filter") }}/' + continentCode, function(data){
            $('#visa-container').html(data);
        });
    });
});
</script>
@endsection
