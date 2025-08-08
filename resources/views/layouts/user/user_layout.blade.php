<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!--<title>Lyka | Explore The Unseen</title>-->
    <title>@yield('title')</title>
    <link rel="canonical" href="">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="">
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
                <li><a href="{{ route('user.home') }}">Home</a></li>
                <li><a href="{{ route('user.about') }}">About Us</a></li>
                <li><a href="{{ route('user.visa') }}">Visa</a></li>
                <li><a href="{{ route('user.packages') }}">Destinations</a></li>
                <li><a href="{{ route('user.blogs') }}">Blogs</a></li>
                <li><a href="{{ route('user.contact') }}">Contact Us</a></li>
            </ul>
            <div class="social-media">
                <a href=""><i class="fa fa-facebook"></i></a>
                <a href=""><i class="fa fa-instagram"></i></a>
                <a href=""><i class="fa fa-linkedin"></i></a>
                <a href=""><img src="{{asset('assets/images/twitter-icon.svg')}}" alt=""></a>
                <a href=""><i class="fa fa-youtube"></i></a>
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
                                <li><a href="{{ route('user.home') }}">Home</a></li>
                                <li><a href="{{ route('user.packages') }}">Destination</a></li>
                                <li><a href="{{ route('user.visa') }}">Visa</a></li>
                                <li><a href="{{ route('user.contact') }}">Contact Us</a></li>
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
                                <a href=""><i class="fa fa-facebook"></i></a>
                                <a href=""><i class="fa fa-instagram"></i></a>
                                <a href=""><i class="fa fa-linkedin"></i></a>
                                <a href=""><img src="{{asset('assets/images/twitter-icon.svg')}}" alt=""></a>
                                <a href=""><i class="fa fa-youtube"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-6 mb-4" data-aos="fade-up" data-aos-duration="1200">
                        <div class="f-box">
                            <h4>Quick Link</h4>
                            <ul>
                                <li><a href="{{ route('user.about') }}">About</a></li>
                                <li><a href="{{ route('user.packages') }}">Destinations</a></li>
                                <li><a href="{{ route('user.contact') }}">Contact</a></li>
                                <li><a href="{{ route('user.visa') }}">Visa</a></li>
                                <li><a href="{{ route('user.privacy_policy') }}">Privacy Policy</a></li>
                                <li><a href="{{ route('user.terms_and_conditions') }}">Terms & Conditions</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-6 mb-4" data-aos="fade-up" data-aos-duration="1400">
                        <div class="f-box">
                            <h4>Tour Type</h4>
                            <ul>
                                <li><a href="{{ route('user.packages') }}">Wild & Adventure Tour</a></li>
                                <li><a href="{{ route('user.packages') }}">Group Tour</a></li>
                                <li><a href="{{ route('user.packages') }}">Seasonal Tour</a></li>
                                <li><a href="{{ route('user.packages') }}">Relaxation Tour</a></li>
                                <li><a href="{{ route('user.packages') }}">Family Friendly Tour</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="f-box" data-aos="fade-up" data-aos-duration="1600">
                            <h4>Reach Out To Us</h4>
                            <ul class="address-sec">
                                <li class="working-time"><p>Hours: 8:00 - 17:00, Mon - Sat</p></li>
                                <li class="phone"><a href="tel:+971 54 346 5001">+971 54 346 5001</a>, <a href="tel:+91 95444 99009">+91 95444 99009</a></li>
                                <li class="mail"><a href="mailto:support@lyka.com">support@lyka.com</a></li>
                                <li class="map">
                                    <p>4517 Washington Ave. Manchester, Kentucky 39495</p>
                                </li>
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
                    <div class="col-lg-6 col-md-6 copyright">
                        <p>© 2025 Lyka, All Rights Reserved</p>
                    </div>
                    <div class="col-lg-6 col-md-6 f-links">
                        <span>Developed by</span> <a href="https://betweenit.com/" target="_blank">Betweenit</a>
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
    <a href="https://web.whatsapp.com/" class="whatsapp" target="_blank">
        <img src="{{asset('assets/images/whatsapp-icon.svg')}}" alt="">
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
 @yield('js')

</body>
</html>