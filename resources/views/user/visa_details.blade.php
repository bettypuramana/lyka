@extends('layouts.user.user_layout')
@section('title', 'Lyka | Visa Details')
@section('content')
<section class="inner-banner-area">
            <div class="container">
                <div class="inner-banner" style="background-image: url(assets/images/visa-banner.png);">
                    <div class="inner-body">
                        <h1>Visa Details</h1>
                        <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('user.home') }}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('user.visa') }}">Visa</a></li>
                            <li class="breadcrumb-item active" aria-current="page">USA Visa</li>
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
                    <h3>Easily Secure Your US Tourist Visa</h3>
                    <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.</p>
                    <h3>Documents needed for a US tourist</h3>
                    <p>The following documents need to be carried with you on the interview date </p>
                    <ul>
                        <li>Application form confirmation (DS-160)</li>
                        <li>Appointment confirmation</li>
                        <li>NOC from the company/ residence visa sponsor</li>
                        <li>Original  passport, with residence visa copy and Eid copy</li>
                        <li>Bank statement for the past 6 months</li>
                        <li>Invitation letter ( If you are  invited by the company or family or friends)</li>
                        <li>Passport size photo ( white background)</li>
                        <li>Trade License for Owners</li>
                    </ul>
                    <h3>FAQs</h3>
                    <div class="faq-sec">
                        <div class="accordion" id="v-tab">
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="tab-view1">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#tab1" aria-expanded="true" aria-controls="tab1">
                                1. What documents are required for a South Korean visa from the UAE?
                            </button>
                            </h2>
                            <div id="tab1" class="accordion-collapse collapse show" aria-labelledby="tab-view1" data-bs-parent="#v-tab">
                            <div class="accordion-body">
                                <p>Standard requirements include a completed visa application form, passport-sized photos, a valid passport, a flight itinerary, a hotel reservation,employment proof and proof of financial means. However, these requirements may vary based on the type of visa and the applicant’s purpose of travel.</p>
                            </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="tab-view2">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#tab2" aria-expanded="false" aria-controls="tab2">
                                2. How long does it take to get a Korean visa from the UAE?
                            </button>
                            </h2>
                            <div id="tab2" class="accordion-collapse collapse" aria-labelledby="tab-view2" data-bs-parent="#v-tab">
                            <div class="accordion-body">
                                <p>Standard requirements include a completed visa application form, passport-sized photos, a valid passport, a flight itinerary, a hotel reservation,employment proof and proof of financial means. However, these requirements may vary based on the type of visa and the applicant’s purpose of travel.</p>
                            </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="tab-view3">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#tab3" aria-expanded="false" aria-controls="tab2">
                                3. Can I apply for a South Korean visa online?
                            </button>
                            </h2>
                            <div id="tab3" class="accordion-collapse collapse" aria-labelledby="tab-view3" data-bs-parent="#v-tab">
                            <div class="accordion-body">
                                <p>Standard requirements include a completed visa application form, passport-sized photos, a valid passport, a flight itinerary, a hotel reservation,employment proof and proof of financial means. However, these requirements may vary based on the type of visa and the applicant’s purpose of travel.</p>
                            </div>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="visa-enquiry-box sticky-top">
                    <div class="visa-head">
                        <img src="{{asset('assets/images/travel-visa.svg')}}" alt=""> Visa Services Details
                    </div>
                    <div class="visa-content">
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                    </div>
                    <div class="row visa-form">
                        <div class="col-lg-12 mb-3">
                            <input type="text" class="form-control user" id="" placeholder="Name">
                        </div>
                        <div class="col-lg-12 mb-3">
                            <input type="text" class="form-control phone" id="" placeholder="Phone Number">
                        </div>
                        <div class="col-lg-12 mb-3">
                            <input type="email" class="form-control mail" id="" placeholder="Enter Your Email">
                        </div>
                        <div class="col-lg-12 mb-3">
                            <select name="" id="" class="form-control destinations1">
                                <option selected disabled value="">Your Nationality</option>
                                <option value="">Abu Dhabi</option>
                                <option value="">Mexico</option>
                                <option value="">France</option>
                                <option value="">Italy</option>
                                <option value="">Spain</option>
                                <option value="">Germany</option>
                            </select>
                        </div>
                        <div class="col-lg-12 mb-3">
                            <select name="" id="" class="form-control travel1">
                                <option selected disabled value="">Travelling to</option>
                                <option value="">Abu Dhabi</option>
                                <option value="">Mexico</option>
                                <option value="">France</option>
                                <option value="">Italy</option>
                                <option value="">Spain</option>
                                <option value="">Germany</option>
                            </select>
                        </div>
                        <div class="col-lg12">
                            <button class="btn form-btn">Send Enquiry</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


@endsection
