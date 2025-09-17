<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>@yield('title')</title>
    @yield('og-tags')
    <link rel="shortcut icon" href="{{asset('assets/images/favicon/favicon.ico')}}" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/nice-select.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/owl.carousel.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/jquery.fancybox.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/aos.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/jquery-ui.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/main.css')}}">

    @yield('css')
    <style>
        .swal2-select{
            display:none;
        }

    </style>

</head>
<body>
<!-- navigation menu -->
 <div id="mySidenav" class="sidenav">

    <div class="menu-wrapper">
        <div class="nav-head">
                <div class="nav-logo"><a href="{{ route('user.home') }}"><img src="{{asset('assets/images/f-logo.svg')}}" alt=""></a></div>
                <div class="close"><a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a></div>
            </div>
        <div class="nav-box">
            <ul>
                <li class="{{ request()->routeIs('user.home') ? 'active' : '' }}"><a href="{{ route('user.home') }}">Home</a></li>
                <li class="{{ request()->routeIs('user.about') ? 'active' : '' }}"><a href="{{ route('user.about') }}">About Us</a></li>
                <li class="{{ request()->routeIs('user.visa') || request()->routeIs('user.visa_details') ? 'active' : '' }}"><a href="{{ route('user.visa') }}">Visa</a></li>
                <li class="{{ request()->routeIs('user.packages') || request()->routeIs('user.package_details') ? 'active' : '' }}"><a href="{{ route('user.packages') }}">Destinations</a></li>
                <li><a href="{{ route('user.blogs') }}">Blogs</a></li>
                <li><a href="{{ route('user.contact') }}">Contact Us</a></li>
            </ul>
            <div class="social-media">
                @if($settings->facebook)
                    <a href="{{ $settings->facebook }}" target="_blank"><i class="fa fa-facebook"></i></a>
                @endif

                @if($settings->instagram)
                    <a href="{{ $settings->instagram }}" target="_blank"><i class="fa fa-instagram"></i></a>
                @endif

                @if($settings->linkedin)
                    <a href="{{ $settings->linkedin }}" target="_blank"><i class="fa fa-linkedin"></i></a>
                @endif

                @if($settings->twitter)
                    <a href="{{ $settings->twitter }}" target="_blank">
                        <img src="{{ asset('assets/images/twitter-icon.svg') }}" alt="Twitter">
                    </a>
                @endif

                @if($settings->youtube)
                    <a href="{{ $settings->youtube }}" target="_blank"><i class="fa fa-youtube"></i></a>
                @endif
            </div>
        </div>
    </div>
</div>
<!-- navigation menu close-->
    <section class="header-body">
        <header>
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="logo"><a href="{{ route('user.home') }}"><img src="{{asset('assets/images/logo.svg')}}" alt=""></a></div>
                        <div class="nav">
                            <ul>
                                <li class="{{ request()->routeIs('user.home') ? 'active' : '' }}"><a href="{{ route('user.home') }}">Home</a></li>
                                <li class="{{ request()->routeIs('user.packages') || request()->routeIs('user.package_details') ? 'active' : '' }}"><a href="{{ route('user.packages') }}">Destination</a></li>
                                <li class="{{ request()->routeIs('user.visa') || request()->routeIs('user.visa_details') ? 'active' : '' }}"><a href="{{ route('user.visa') }}">Visa</a></li>
                                <li class="{{ request()->routeIs('user.contact') ? 'active' : '' }}"><a href="{{ route('user.contact') }}">Contact Us</a></li>
                            </ul>
                        </div>
                        <div class="side-nav">
                            <button class="btn-click" onclick="openNav()">
                                <span class="line1"></span>
                                <span class="line2"></span>
                                <span class="line3"></span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </header>
            @yield('content')
<footer>
    <section class="f-img"><img src="{{asset('assets/images/ft-img.svg')}}" alt=""></section>
    <section class="footer-sec">
        <div class="f-first">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 mb-4">
                        <div class="f-about" data-aos="fade-up" data-aos-duration="1000">
                            <div class="f-logo"><img src="{{asset('assets/images/f-logo.svg')}}" alt=""></div>
                            <p>Sit amet consectetur adipiscinelit Sem et aliquam enimdeassa ornare vulputate neque feugiat secursun blandit volutpat hendr mauris</p>
                            <h6>Follow Us On:</h6>
                            <div class="social-media">
                                @if($settings->facebook)
                                    <a href="{{ $settings->facebook }}" target="_blank"><i class="fa fa-facebook"></i></a>
                                @endif

                                @if($settings->instagram)
                                    <a href="{{ $settings->instagram }}" target="_blank"><i class="fa fa-instagram"></i></a>
                                @endif

                                @if($settings->linkedin)
                                    <a href="{{ $settings->linkedin }}" target="_blank"><i class="fa fa-linkedin"></i></a>
                                @endif

                                @if($settings->twitter)
                                    <a href="{{ $settings->twitter }}" target="_blank">
                                        <img src="{{ asset('assets/images/twitter-icon.svg') }}" alt="Twitter">
                                    </a>
                                @endif

                                @if($settings->youtube)
                                    <a href="{{ $settings->youtube }}" target="_blank"><i class="fa fa-youtube"></i></a>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-6 mb-4" data-aos="fade-up" data-aos-duration="1200">
                        <div class="f-box">
                            <h4>Quick Link</h4>
                            <ul>
                                <li class="{{ request()->routeIs('user.about') ? 'active' : '' }}"><a href="{{ route('user.about') }}">About</a></li>
                                <li class="{{ request()->routeIs('user.packages') || request()->routeIs('user.package_details') ? 'active' : '' }}"><a href="{{ route('user.packages') }}">Destinations</a></li>
                                <li><a href="{{ route('user.contact') }}">Contact</a></li>
                                <li class="{{ request()->routeIs('user.visa') || request()->routeIs('user.visa_details') ? 'active' : '' }}"><a href="{{ route('user.visa') }}">Visa</a></li>
                                <li><a href="{{ route('user.privacy_policy') }}">Privacy Policy</a></li>
                                <li><a href="{{ route('user.terms_and_conditions') }}">Terms & Conditions</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-6 mb-4" data-aos="fade-up" data-aos-duration="1400">
                        <div class="f-box">
                            <h4>Tour Type</h4>
                            <ul>
                                @foreach($tourTypes as $type)
                                    <li>
                                        <a href="{{ route('user.packages') }}">
                                            {{ $type->type }}
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="f-box" data-aos="fade-up" data-aos-duration="1600">
                            <h4>Reach Out To Us</h4>
                            <ul class="address-sec">
                                @if ($settings->working_time)
                                    <li class="working-time"><p>{{$settings->working_time}}</p></li>
                                @endif

                                <li class="phone">
                                    @if ($settings->contact_number)
                                        <a href="tel:{{$settings->contact_number}}">{{$settings->contact_number}}</a>,
                                    @endif
                                    @if ($settings->contact_number_two)
                                        <a href="tel:{{$settings->contact_number_two}}">{{$settings->contact_number_two}}</a>
                                    @endif

                                </li>
                                @if ($settings->email)
                                    <li class="mail"><a href="mailto:{{$settings->email}}">{{$settings->email}}</a></li>
                                @endif
                                @if ($settings->address)
                                  <li class="map">
                                    <p>{{$settings->address}}</p>
                                </li>
                                @endif

                            </ul>
                        </div>
                    </div>
                </div>
                <hr>
            </div>
        </div>
        <div class="copyright-sec">
            <div class="container">
                <div class="row flex-md-row flex-column-reverse">
                    <div class="col-lg-12 copyright">
                        <p>© {{ date('Y') }} Lyka, All Rights Reserved</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
</footer>
	<div class="progress-wrap">
		<svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
			<path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98"/>
		</svg>
	</div>
    <a href="https://wa.me/{{ preg_replace('/\D/', '', $settings->whats_app) }}" class="whatsapp" target="_blank" onclick="trackWhatsAppClick()">
        <div class="pop-view" id="pop-view1">
            Click here for more package details
        </div>
        <img src="{{ asset('assets/images/whatsapp-icon.svg') }}" alt="WhatsApp">
        <div class="wave"></div>
    </a>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="{{asset('assets/js/jquery.min.js')}}"></script>
<script src="{{asset('assets/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('assets/js/owl.carousel.min.js')}}"></script>
<script src="{{asset('assets/js/jquery.fancybox.min.js')}}"></script>
<script src="{{asset('assets/js/jquery.nice-select.min.js')}}"></script>
<script src="{{asset('assets/js/jquery-ui.js')}}"></script>
<script src="{{asset('assets/js/aos.js')}}"></script>
<script src="{{asset('assets/js/main.js')}}"></script>
<script>
    function trackWhatsAppClick() {
    fetch("{{ route('user.whatsapp_click') }}", {
        method: "POST",
        headers: {
            "Content-Type": "application/json",
            "X-CSRF-TOKEN": "{{ csrf_token() }}"
        }
    });
}
</script>
<script type='text/javascript' src='https://platform-api.sharethis.com/js/sharethis.js#property=68c8fe8f7639aa9f80d5e1b9&product=sop' async='async'></script>
 @yield('js')
 @if(session('enquiry_success'))
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                Swal.fire({
                    icon: 'success',
                    title: 'Submitted!',
                    text: 'submitted successfully.',
                    confirmButtonText: 'OK'
                });
            });
        </script>
    @endif
</body>
</html>
