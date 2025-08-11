<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Stellar Admin</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{asset('theme/assets/vendors/simple-line-icons/css/simple-line-icons.css')}}">
    <link rel="stylesheet" href="{{asset('theme/assets/vendors/flag-icon-css/css/flag-icons.min.css')}}">
    <link rel="stylesheet" href="{{asset('theme/assets/vendors/css/vendor.bundle.base.css')}}">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="{{asset('theme/assets/vendors/font-awesome/css/font-awesome.min.css')}}" />
    <link rel="stylesheet" href="{{asset('theme/assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.css')}}">
    <link rel="stylesheet" href="{{asset('theme/assets/vendors/jvectormap/jquery-jvectormap.css')}}">
    <link rel="stylesheet" href="{{asset('theme/assets/vendors/daterangepicker/daterangepicker.css')}}">
    <link rel="stylesheet" href="{{asset('theme/assets/vendors/chartist/chartist.min.css')}}">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="{{asset('theme/assets/css/vertical-light-layout/style.css')}}">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="{{asset('theme/assets/images/favicon.png')}}" />
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css" />
    <link rel="stylesheet" href="https://unpkg.com/@yaireo/tagify/dist/tagify.css">
  </head>
  <body>
    <div class="container-scroller">

      <!-- partial:partials/_navbar.html -->
      <nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
        <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
          <a class="navbar-brand brand-logo" href="index.html">
            <img src="{{asset('theme/assets/images/logo.svg')}}" alt="logo" class="logo-dark" />
            <img src="{{asset('theme/assets/images/logo-light.svg')}}" alt="logo-light" class="logo-light">
          </a>
          <a class="navbar-brand brand-logo-mini" href="index.html"><img src="{{asset('theme/assets/images/logo-mini.svg')}}" alt="logo" /></a>
          <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
            <span class="icon-menu"></span>
          </button>
        </div>
        <div class="navbar-menu-wrapper d-flex align-items-center">
          <h5 class="mb-0 font-weight-medium d-none d-lg-flex">Welcome stellar dashboard!</h5>
          <ul class="navbar-nav navbar-nav-right">
            {{-- <form class="search-form d-none d-md-block" action="#">
              <i class="icon-magnifier"></i>
              <input type="search" class="form-control" placeholder="Search Here" title="Search here">
            </form> --}}
            {{-- <li class="nav-item"><a href="#" class="nav-link"><i class="icon-basket-loaded"></i></a></li> --}}
            {{-- <li class="nav-item"><a href="#" class="nav-link"><i class="icon-chart"></i></a></li> --}}
            <li class="nav-item dropdown">
              <a class="nav-link count-indicator message-dropdown" id="messageDropdown" href="#" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="icon-speech"></i>
                <span class="count">7</span>
              </a>
              <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list pb-0" aria-labelledby="messageDropdown">
                <a class="dropdown-item py-3">
                  <p class="mb-0 font-weight-medium float-start me-2">You have 7 unread mails </p>
                  <span class="badge badge-pill badge-primary float-end">View all</span>
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item preview-item">
                  <div class="preview-thumbnail">
                    <img src="{{asset('theme/assets/images/faces/face10.jpg')}}" alt="image" class="img-sm profile-pic">
                  </div>
                  <div class="preview-item-content flex-grow py-2">
                    <p class="preview-subject ellipsis font-weight-medium text-dark">Marian Garner </p>
                    <p class="font-weight-light small-text"> The meeting is cancelled </p>
                  </div>
                </a>
                <a class="dropdown-item preview-item">
                  <div class="preview-thumbnail">
                    <img src="{{asset('theme/assets/images/faces/face12.jpg')}}" alt="image" class="img-sm profile-pic">
                  </div>
                  <div class="preview-item-content flex-grow py-2">
                    <p class="preview-subject ellipsis font-weight-medium text-dark">David Grey </p>
                    <p class="font-weight-light small-text"> The meeting is cancelled </p>
                  </div>
                </a>
                <a class="dropdown-item preview-item">
                  <div class="preview-thumbnail">
                    <img src="{{asset('theme/assets/images/faces/face1.jpg')}}" alt="image" class="img-sm profile-pic">
                  </div>
                  <div class="preview-item-content flex-grow py-2">
                    <p class="preview-subject ellipsis font-weight-medium text-dark">Travis Jenkins </p>
                    <p class="font-weight-light small-text"> The meeting is cancelled </p>
                  </div>
                </a>
              </div>
            </li>
            {{-- <li class="nav-item dropdown language-dropdown d-none d-sm-flex align-items-center">
              <a class="nav-link d-flex align-items-center dropdown-toggle" id="LanguageDropdown" href="#" data-bs-toggle="dropdown" aria-expanded="false">
                <div class="d-inline-flex">
                  <i class="flag-icon flag-icon-us"></i>
                </div>
                <span class="profile-text font-weight-normal">English</span>
              </a>
              <div class="dropdown-menu dropdown-menu-left navbar-dropdown py-2" aria-labelledby="LanguageDropdown">
                <a class="dropdown-item">
                  <i class="flag-icon flag-icon-us"></i> English </a>
                <a class="dropdown-item">
                  <i class="flag-icon flag-icon-fr"></i> French </a>
                <a class="dropdown-item">
                  <i class="flag-icon flag-icon-ae"></i> Arabic </a>
                <a class="dropdown-item">
                  <i class="flag-icon flag-icon-ru"></i> Russian </a>
              </div>
            </li> --}}
            <li class="nav-item dropdown d-none d-xl-inline-flex user-dropdown">
              <a class="nav-link dropdown-toggle" id="UserDropdown" href="#" data-bs-toggle="dropdown" aria-expanded="false">
                {{-- <img class="img-xs rounded-circle ms-2" src="{{asset('theme/assets/images/faces/face8.jpg')}}" alt="Profile image"> --}}
                 <span class="font-weight-normal"> {{ Auth::user()->name }} </span>
                </a>
              <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
                <div class="dropdown-header text-center">
                  {{-- <img class="img-md rounded-circle" src="{{asset('theme/assets/images/faces/face8.jpg')}}" alt="Profile image"> --}}
                  <p class="mb-1 mt-3">{{ Auth::user()->name }}</p>
                  <p class="font-weight-light text-muted mb-0">{{ Auth::user()->email }}</p>
                </div>
                <a class="dropdown-item"><i class="dropdown-item-icon icon-user text-primary"></i>Change Password </a>
                {{-- <a class="dropdown-item"><i class="dropdown-item-icon icon-speech text-primary"></i> Messages</a>
                <a class="dropdown-item"><i class="dropdown-item-icon icon-energy text-primary"></i> Activity</a>
                <a class="dropdown-item"><i class="dropdown-item-icon icon-question text-primary"></i> FAQ</a> --}}
                <a class="dropdown-item" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="dropdown-item-icon icon-power text-primary"></i>Sign Out</a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
              </div>
            </li>
          </ul>
          <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
            <span class="icon-menu"></span>
          </button>
        </div>
      </nav>
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_sidebar.html -->
        <nav class="sidebar sidebar-offcanvas" id="sidebar">
          <ul class="nav">
            <li class="nav-item navbar-brand-mini-wrapper">
              <a class="nav-link navbar-brand brand-logo-mini" href="index.html"><img src="{{asset('theme/assets/images/logo-mini.svg')}}" alt="logo" /></a>
            </li>
            <li class="nav-item nav-profile">
              {{-- <a href="#" class="nav-link">
                <div class="profile-image">
                  <img class="img-xs rounded-circle" src="{{asset('theme/assets/images/faces/face8.jpg')}}" alt="profile image">
                  <div class="dot-indicator bg-success"></div>
                </div>
                <div class="text-wrapper">
                  <p class="profile-name">Henry Klein</p>
                  <p class="designation">Administrator</p>
                </div>
                <div class="icon-container">
                  <i class="icon-bubbles"></i>
                  <div class="dot-indicator bg-danger"></div>
                </div>
              </a> --}}
            </li>
            {{-- <li class="nav-item nav-category">
              <span class="nav-link">Dashboard</span>
            </li> --}}
            <li class="nav-item">
              <a class="nav-link" href="{{route('admin.dashboard')}}">
                <span class="menu-title">Dashboard</span>
                <i class="icon-screen-desktop menu-icon"></i>
              </a>
            </li>
            {{-- <li class="nav-item nav-category"><span class="nav-link">UI Elements</span></li> --}}
            <li class="nav-item">
              <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
                <span class="menu-title">Continents and Country</span>
                <i class="icon-layers menu-icon"></i>
              </a>
              <div class="collapse" id="ui-basic">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item"> <a class="nav-link" href="{{route('admin.continents')}}">Continents</a></li>
                  <li class="nav-item"> <a class="nav-link" href="{{route('admin.countries')}}">Countries</a></li>
                </ul>
              </div>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-bs-toggle="collapse" href="#icons" aria-expanded="false" aria-controls="icons">
                <span class="menu-title">Packages</span>
                <i class="icon-globe menu-icon"></i>
              </a>
              <div class="collapse" id="icons">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item"> <a class="nav-link" href="{{route('admin.packages')}}">Packages</a></li>
                  <li class="nav-item"> <a class="nav-link" href="{{route('admin.package_new')}}">Add Package</a></li>
                </ul>
              </div>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-bs-toggle="collapse" href="#forms" aria-expanded="false" aria-controls="forms">
                <span class="menu-title">Visa</span>
                <i class="icon-book-open menu-icon"></i>
              </a>
              <div class="collapse" id="forms">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item"> <a class="nav-link" href="{{route('admin.visa_list')}}">Visa</a></li>
                  <li class="nav-item"> <a class="nav-link" href="{{route('admin.visa_new')}}">Add Visa</a></li>
                </ul>
              </div>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-bs-toggle="collapse" href="#charts" aria-expanded="false" aria-controls="charts">
                <span class="menu-title">Blog</span>
                <i class="icon-chart menu-icon"></i>
              </a>
              <div class="collapse" id="charts">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item"> <a class="nav-link" href="{{route('admin.blogs')}}">Blogs</a></li>
                  <li class="nav-item"> <a class="nav-link" href="{{route('admin.blog_new')}}">Add Blogs</a></li>
                </ul>
              </div>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-bs-toggle="collapse" href="#tables" aria-expanded="false" aria-controls="tables">
                <span class="menu-title">Banner And Gallery</span>
                <i class="icon-grid menu-icon"></i>
              </a>
              <div class="collapse" id="tables">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item"> <a class="nav-link" href="{{route('admin.banners')}}">Banner</a></li>
                  <li class="nav-item"> <a class="nav-link" href="{{route('admin.banner_new')}}">Add Banner</a></li>
                  <li class="nav-item"> <a class="nav-link" href="{{route('admin.gallery')}}">Gallery</a></li>
                </ul>
              </div>
            </li>
            {{-- <li class="nav-item nav-category"><span class="nav-link">Extra Pages</span></li> --}}
            <li class="nav-item">
              <a class="nav-link" data-bs-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
                <span class="menu-title">Enquiry</span>
                <i class="icon-disc menu-icon"></i>
              </a>
              <div class="collapse" id="auth">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item"> <a class="nav-link" href="{{route('admin.package_enquiries')}}"> Package enquiry </a></li>
                  <li class="nav-item"> <a class="nav-link" href="{{route('admin.visa_enquiries')}}"> Visa enquiry </a></li>
                  <li class="nav-item"> <a class="nav-link" href="{{route('admin.contact_enquiries')}}"> Contact enquiry </a></li>
                </ul>
              </div>
            </li>
            {{-- <li class="nav-item nav-category"><span class="nav-link">Testimonials</span></li> --}}
           
            <li class="nav-item">
              <a class="nav-link" data-bs-toggle="collapse" href="#forms" aria-expanded="false" aria-controls="forms">
                <span class="menu-title">Testimonials</span>
                <i class="icon-book-open menu-icon"></i>
              </a>
              <div class="collapse" id="forms">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item"> <a class="nav-link" href="{{route('admin.testimonials')}}">Testimonials</a></li>
                  <li class="nav-item"> <a class="nav-link" href="{{route('admin.testimonial_new')}}">Add Testimonial</a></li>
                </ul>
              </div>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{route('admin.subscriptions')}}" >
                <span class="menu-title">Subscriptions</span>
                <i class="icon-folder-alt menu-icon"></i>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-bs-toggle="collapse" href="#settings" aria-expanded="false" aria-controls="settings">
                <span class="menu-title">Settings</span>
                <i class="icon-disc menu-icon"></i>
              </a>
              <div class="collapse" id="settings">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item"> <a class="nav-link" href="{{route('admin.settings.contact')}}"> Contact </a></li>
                  <li class="nav-item"> <a class="nav-link" href="{{route('admin.settings.aboutus')}}"> About us </a></li>
                  <li class="nav-item"> <a class="nav-link" href="{{route('admin.settings.social_media_links')}}"> Social media </a></li>
                </ul>
              </div>
            </li>
          </ul>
        </nav>
        <!-- partial -->
        <div class="main-panel">
            @yield('content')
          <!-- content-wrapper ends -->
          <!-- partial:partials/_footer.html -->
          <footer class="footer">
            <div class="d-sm-flex justify-content-center justify-content-sm-between">
              <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © {{date('Y')}} Lyka. All rights reserved. </span>
              {{-- <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Hand-crafted & made with <i class="icon-heart text-danger"></i></span> --}}
            </div>
          </footer>
          <!-- partial -->
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->

    <script src="{{asset('theme/assets/vendors/js/vendor.bundle.base.js')}}"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="{{asset('theme/assets/vendors/chart.js/chart.umd.js')}}"></script>
    <script src="{{asset('theme/assets/vendors/jvectormap/jquery-jvectormap.min.js')}}"></script>
    <script src="{{asset('theme/assets/vendors/jvectormap/jquery-jvectormap-world-mill-en.js')}}"></script>
    <script src="{{asset('theme/assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js')}}"></script>
    <script src="{{asset('theme/assets/vendors/moment/moment.min.js')}}"></script>
    <script src="{{asset('theme/assets/vendors/daterangepicker/daterangepicker.js')}}"></script>
    <script src="{{asset('theme/assets/vendors/chartist/chartist.min.js')}}"></script>
    <script src="{{asset('theme/assets/vendors/progressbar.js/progressbar.min.js')}}"></script>
    <script src="{{asset('theme/assets/js/jquery.cookie.js')}}"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="{{asset('theme/assets/js/off-canvas.js')}}"></script>
    <script src="{{asset('theme/assets/js/hoverable-collapse.js')}}"></script>
    <script src="{{asset('theme/assets/js/misc.js')}}"></script>
    <script src="{{asset('theme/assets/js/settings.js')}}"></script>
    <script src="{{asset('theme/assets/js/todolist.js')}}"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="{{asset('theme/assets/js/dashboard.js')}}"></script>
    {{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> --}}
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script src="https://unpkg.com/@yaireo/tagify"></script>
    <!-- End custom js for this page -->
    <script>
        $(document).ready(function () {
            $('#myTable').DataTable();
        });
    </script>
    @yield('js')
  </body>
</html>
