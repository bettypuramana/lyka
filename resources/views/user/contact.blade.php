@extends('layouts.user.user_layout')
@section('title', 'Lyka | Contact')
@section('content')
 <section class="inner-banner-area">
            <div class="container">
                <div class="inner-banner" style="background-image: url(assets/images/contact-baner.png);">
                    <div class="inner-body">
                        <h1 data-aos="fade-up" data-aos-duration="1000">Contact Us</h1>
                        <nav aria-label="breadcrumb" data-aos="fade-up" data-aos-duration="1500">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Contact Us</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>
</section>

<section class="contact-body p60">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10 mb-4">
                <div class="row">
                    <div class="col-lg-6 mb-3" data-aos="fade-up" data-aos-duration="1000">
                        <h5>UAE Office</h5>
                        <div class="address-box">
                            <ul class="txt">
                                <li class="icon-map">Abu Dhabi</li>
                                <li class="icon-phone"><a href="tel:+971543465001">+971 54 346 5001</a></li>
                                <li class="icon-email"><a href="mailto:tours@lykaholidays.com">tours@lykaholidays.com</a></li>
                            </ul>
                         <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d34553.31660223335!2d54.36302652624375!3d24.451825842341393!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3e5e440f723ef2b9%3A0xc7cc2e9341971108!2sAbu%20Dhabi%20-%20United%20Arab%20Emirates!5e0!3m2!1sen!2sin!4v1753869407528!5m2!1sen!2sin"  style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>
                    </div>
                    <div class="col-lg-6 mb-3" data-aos="fade-up" data-aos-duration="1500">
                        <h5>India Office</h5>
                        <div class="address-box">
                            <ul class="txt">
                                <li class="icon-map">Kochi</li>
                                <li class="icon-phone"><a href="tel:+91 95444 99009">+91 95444 99009</a></li>
                                <li class="icon-email"><a href="mailto:info@wanderinggfoodie.com">info@wanderinggfoodie.com</a></li>
                            </ul>
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d5558.08737343504!2d76.26697988614764!3d9.920523325655111!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3b080d514abec6bf%3A0xbd582caa5844192!2sKochi%2C%20Kerala!5e0!3m2!1sen!2sin!4v1753870551448!5m2!1sen!2sin" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 c-form-p" data-aos="fade-up" data-aos-duration="1000">
                <h6>Lets craft brilliance together</h6>
                <p>Got something in mind? We'd love to help.</p>
                <div class="row">
                    <div class="col-lg-6 mb-3">
                        <input type="text" class="form-control" id="" placeholder="Name">
                    </div>
                    <div class="col-lg-6 mb-3">
                        <input type="email" class="form-control" id="" placeholder="Email">
                    </div>
                    <div class="col-lg-12 mb-3">
                        <input type="text" class="form-control" id="" placeholder="Subject">
                    </div>
                    <div class="col-lg-12 mb-3">
                        <textarea class="form-control txt" name="" placeholder="Enter Your Message"></textarea>
                    </div>
                    <div class="col-lg-12 mb-3 d-flex justify-content-center">
                        <button class="btn form-btn">SEND Enquiry <img src="{{asset('assets/images/button-arrow.svg')}}" alt=""></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

	@endsection
