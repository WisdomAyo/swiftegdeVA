
<!doctype html>
<html lang="zxx">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Links of CSS files -->
    <link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/aos.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/animate.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/meanmenu.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/flaticon.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/remixicon.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/odometer.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/owl.theme.default.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/magnific-popup.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/fancybox.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/selectize.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/metismenu.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/simplebar.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/dropzone.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/navbar.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/footer.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/dashboard.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/responsive.css')}}">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Dashboard</title>

    <link rel="icon" type="image/png" href="{{asset('_images/artisanfavicon-122x122.png')}}">
</head>

<body>

<!-- Start Preloader Area -->
<div class="preloader-area">
    <div class="spinner">
        <div class="inner">
            <div class="disc"></div>
            <div class="disc"></div>
            <div class="disc"></div>
        </div>
    </div>
</div>
<!-- End Preloader Area -->

<!-- Start Sidemenu Area -->
<div class="sidemenu-area">
    <div class="sidemenu-header">
        <a href="{{url('/')}}" class="navbar-brand d-flex align-items-center">
            <img src="{{asset('logo.png')}}" alt="image">
        </a>

        <div class="responsive-burger-menu d-block d-lg-none">
            <span class="top-bar"></span>
            <span class="middle-bar"></span>
            <span class="bottom-bar"></span>
        </div>
    </div>

    @if(\Illuminate\Support\Facades\Request::segment(1) ==="admin")
        @include('shared.sidebars.admin')

    @elseif(\Illuminate\Support\Facades\Request::segment(1) ==="employer")
        @include('shared.sidebars.employers')
    @else
        @include('shared.sidebars.users')
    @endif


</div>
<!-- End Sidemenu Area -->

<!-- Start Main Dashboard Content Wrapper Area -->
<div class="main-dashboard-content d-flex flex-column">

    <!-- Start Navbar Area -->
    <div class="navbar-area">
        <div class="main-responsive-nav">
            <div class="main-responsive-menu">
                <div class="responsive-burger-menu d-lg-none d-block">
                    <span class="top-bar"></span>
                    <span class="middle-bar"></span>
                    <span class="bottom-bar"></span>
                </div>
            </div>
        </div>

        <div class="main-navbar">
            <nav class="navbar navbar-expand-md navbar-light">
                <div class="collapse navbar-collapse mean-menu" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto">
                        <li class="nav-item">
                            <a href="{{url('/')}}" class="nav-link">
                                Home

                            </a>
                        </li>


                        <li class="nav-item">
                            <a href="{{route('index.freelancers.list')}}" class="nav-link">All Freelancer

                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{route('index.services.list')}}" class="nav-link ">All Services

                            </a>
                        </li>


                    </ul>

                    <div class="others-options d-flex align-items-center">
                        <div class="option-item">
                            <div class="dropdown profile-nav-item">
                                <a href="#" class="dropdown-bs-toggle" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

                                    @if(!empty(Auth::user()->profile_image))
                                        <div class="menu-profile">
                                            <img src="{{asset('profile/photo/'.Auth::user()->id.'/'.Auth::user()->profile_image)}}" class="rounded-circle" alt="image">
                                            <span class="name">My Account</span>
                                        </div>
                                     @else
                                    <div class="menu-profile">
                                        <img src="{{asset('icon_02.jpeg')}}" class="rounded-circle" alt="image">
                                        <span class="name">My Account</span>
                                    </div>
                                        @endif
                                </a>

                                <div class="dropdown-menu">
                                    <div class="dropdown-header d-flex flex-column align-items-center">

                                        @if(!empty(Auth::user()->profile_image))
                                            <div class="figure mb-3">
                                                <img src="{{asset('profile/photo/'.Auth::user()->id.'/'.Auth::user()->profile_image)}}" class="rounded-circle" alt="image">
                                            </div>
                                            @else
                                        <div class="figure mb-3">
                                            <img src="{{asset('icon_02.jpeg')}}" class="rounded-circle" alt="image">
                                        </div>
                                        @endif
                                        <div class="info text-center">
                                            <span class="name">{{Auth::user()->firstname.' '.Auth::user()->lastname}}</span>
                                            <p class="mb-3 email">{{Auth::user()->email}}</p>
                                        </div>
                                    </div>

                                    <div class="dropdown-body">
                                        <ul class="profile-nav p-0 pt-3">
                                            <li class="nav-item active">
                                                <a href="{{route('admin.home')}}" class="nav-link">
                                                    <span class="icon"><i class="ri-home-line"></i></span>
                                                    <span class="menu-title">Dashboard</span>
                                                </a>
                                            </li>


                                        </ul>
                                    </div>

                                    <div class="dropdown-footer">
                                        <ul class="profile-nav">
                                            <li class="nav-item">
                                                <a href="{{route('account.logout')}}" class="nav-link"><i class="ri-logout-box-r-line"></i> <span>Logout</span></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </nav>
        </div>
    </div>
    <!-- End Navbar Area -->
