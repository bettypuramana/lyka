@extends('layouts.user.user_layout')
@section('title', 'Lyka | ' .  $visa->title )
@section('content')
<section class="inner-banner-area">
            <div class="container">
                <div class="inner-banner" style="background-image: url({{ asset('assets/images/visa-banner.png') }});">
                    <div class="inner-body">
                        <h1>{{$visa->title}}</h1>
                        <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('user.home') }}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('user.visa') }}">Visa</a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{$visa->title}}</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>
</section>

<section class="visa-details-body p60">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="visa-body-content">
                    <h3>Easily Secure Your Tourist Visa</h3>
                    <p>{!! $visa->description !!}</p>
                    @if(!empty($documents) && count($documents) > 0)
                    <h3>Documents needed for a tourist</h3>
                    <p>The following documents need to be carried with you on the interview date </p>
                    <ul>
                        @foreach($documents as $doc)
                            <li>{{ $doc->title }}</li>
                        @endforeach
                    </ul>
                    @endif
                    @if(!empty($faqs) && count($faqs) > 0)
                    <h3>FAQs</h3>
                    <div class="faq-sec">
                        <div class="accordion" id="v-tab">
                            @foreach($faqs as $index => $faq)
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="tab-view{{ $index }}">
                                        <button class="accordion-button {{ $index != 0 ? 'collapsed' : '' }}"
                                                type="button"
                                                data-bs-toggle="collapse"
                                                data-bs-target="#tab{{ $index }}"
                                                aria-expanded="{{ $index == 0 ? 'true' : 'false' }}"
                                                aria-controls="tab{{ $index }}">
                                            {{ $index + 1 }}. {{ $faq->question }}
                                        </button>
                                    </h2>
                                    <div id="tab{{ $index }}"
                                        class="accordion-collapse collapse {{ $index == 0 ? 'show' : '' }}"
                                        aria-labelledby="tab-view{{ $index }}"
                                        data-bs-parent="#v-tab">
                                        <div class="accordion-body">
                                            <p>{{ $faq->answer }}</p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    @endif
                </div>
            </div>
            <div class="col-lg-4">
                <div class="visa-enquiry-box sticky-top">
                    <div class="visa-head">
                        <img src="{{asset('assets/images/travel-visa.svg')}}" alt=""> Visa Services Details
                    </div>
                    <div class="visa-content">
                       <!-- <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>-->
                        <div id="enquirySuccess" class="alert alert-success mt-3 d-none"></div>
                    </div>

                    <form id="visaEnquiryForm">
                        @csrf
                        <div class="row visa-form">
                            <div class="col-lg-12 mb-3">
                                <input type="text" name="name" class="form-control user" placeholder="Name" oninput="this.value = this.value.replace(/[^A-Za-z\s]/g, '')" required>
                            </div>
                            <div class="col-lg-12 mb-3">
                                <input type="text" name="phone" class="form-control phone" placeholder="Phone Number with Country Code" oninput="
                                            this.value = this.value.replace(/[^0-9+]/g, '');
                                            if (this.value.length > 0 && this.value[0] !== '+' && this.value[0] != 0) {
                                                this.value = '+' + this.value.replace(/^\+/, '');
                                            }
                                        " required>
                            </div>
                            <div class="col-lg-12 mb-3">
                                <input type="email" name="email" class="form-control mail" placeholder="Enter Your Email" required>
                            </div>
                            <div class="col-lg-12 mb-3">
                                <select name="nationality_id" class="form-control destinations1" id="destinations" onchange="syncCountries()" required>
                                    <option selected disabled value="">Your Nationality</option>
                                    @foreach($countries as $country)
                                        <option value="{{ $country->id }}">{{ $country->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-lg-12 mb-3">
                                <select name="travel_to" class="form-control travel1" id="travel" onchange="syncCountries()" required>
                                    <option selected disabled value="">Travelling to</option>
                                    @foreach($countries as $country)
                                        <option value="{{ $country->id }}">{{ $country->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-lg-12">
                                <button type="submit" class="btn form-btn">Send Enquiry</button>
                            </div>
                        </div>
                    </form>


                </div>
            </div>
        </div>
    </div>
</section>
@endsection
@section('js')
<script>
function syncCountries() {
    let nationalityValue = $("#destinations").val();
    let travelValue = $("#travel").val();

    // Reset (show all options again)
    $("#destinations ~ .nice-select li").show();
    $("#travel ~ .nice-select li").show();

    // Hide nationality in travel list
    if (nationalityValue) {
        $(`#travel ~ .nice-select li[data-value="${nationalityValue}"]`).hide();
        if (travelValue === nationalityValue) {
            $("#travel").val("").niceSelect("update");
        }
    }

    // Hide travel in nationality list
    if (travelValue) {
        $(`#destinations ~ .nice-select li[data-value="${travelValue}"]`).hide();
        if (nationalityValue === travelValue) {
            $("#destinations").val("").niceSelect("update");
        }
    }
}
</script>
    <script>
        document.getElementById('visaEnquiryForm').addEventListener('submit', function(e) {
            e.preventDefault();
            let form = this;

            fetch("{{ route('visa.enquiry.store') }}", {
                method: 'POST',
                body: new FormData(form),
                headers: { 'X-CSRF-TOKEN': '{{ csrf_token() }}' }
            })
            .then(res => res.json())
            .then(data => {
                if (data.success) {
                    document.getElementById('enquirySuccess').textContent = data.message;
                    document.getElementById('enquirySuccess').classList.remove('d-none');
                    form.reset();
                    Swal.fire({
                        icon: 'success',
                        title: 'Submitted!',
                        text: 'submitted successfully.',
                        confirmButtonText: 'OK'
                    }).then((result) => {
                        // Reload the page if the user clicks "OK"
                        if (result.isConfirmed) {
                            window.location.reload();
                        }
                    });
                }
            })
            .catch(err => console.error(err));
        });
    </script>

@endsection
