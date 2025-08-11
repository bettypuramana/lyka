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
@if($visas->isEmpty())
    <div class="col-12">
        <p>No visas found for this continent.</p>
    </div>
@endif
