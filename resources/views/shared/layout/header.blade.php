<!DOCTYPE html>
<html lang="en" data-bs-theme="dark" data-pwa="true">
<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Viewport -->
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, viewport-fit=cover">
    @if(session('success'))
     <meta name="success-message" content="{{ session('success') }}">
     @endif

   @if($errors->any())
    <meta name="error-message" content="{{ $errors->first() }}">
     @endif

    <!-- SEO Meta Tags -->
    <title>SwiftedgeVA | Home </title>
    <meta name="description" content="Finder - Directory &amp; Listings Bootstrap HTML Template">
    <meta name="keywords" content="directory, listings, search, car dealer, real estate, city guide, business listings, medical directories, event listings, e-commerce, market, multipurpose, ui kit, light and dark mode, bootstrap, html5, css3, javascript, gallery, slider, mobile, pwa">
    <meta name="author" content="Createx Studio">

    <!-- Webmanifest + Favicon / App icons -->
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <link rel="manifest" href="manifest.json">
    <link rel="icon" type="image/png" href="assets/app-icons/icon-32x32.png" sizes="32x32">
    <link rel="apple-touch-icon" href="assets/app-icons/icon-180x180.png">

    <!-- Theme switcher (color modes) -->
    <script src="assets/js/theme-switcher.js"></script>

    <!-- Preloaded local web font (Inter) -->
    <link rel="preload" href="{{ asset("asset/fonts/inter-variable-latin.woff2")}}" as="font" type="font/woff2" crossorigin="">

    <!-- Font icons -->
    <link rel="preload" href="{{ asset('asset/icons/finder-icons.woff2')}}" as="font" type="font/woff2" crossorigin="">
    <link rel="stylesheet" href="{{ asset('asset/icons/finder-icons.min.css')}}">

    <!-- Vendor styles -->
    <link rel="stylesheet" href="{{ asset('asset/vendor/swiper/swiper-bundle.min.css')}}">
    <link rel="stylesheet" href="{{ asset('asset/vendor/flatpickr/flatpickr.min.css') }}">
    <link rel="stylesheet" href="{{ asset('asset/vendor/simplebar/simplebar.min.css') }}">
    <link rel="stylesheet" href="{{ asset('asset/vendor/choices/choices.min.css') }}">
    <link rel="stylesheet" href="{{ asset('asset/vendor/glightbox/glightbox.min.css') }}">
   

    <link rel="stylesheet" href="../../cdnjs.cloudflare.com/ajax/libs/highlight.js/11.9.0/styles/atom-one-dark.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.0/dist/sweetalert2.min.css">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.0/dist/sweetalert2.min.js"></script>


    <!-- Bootstrap + Theme styles -->
    <link rel="preload" href="{{ asset('asset/css/theme.min.css')}}" as="style">
    <link rel="preload" href="{{ asset('asset/css/theme.rtl.min.css')}}" as="style">
    <link rel="stylesheet" href="{{ asset('asset/css/theme.min.css')}}" id="theme-styles">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/7.6.0/tinymce.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tinymce/7.6.0/skins/ui/oxide/content.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tinymce/7.6.0/skins/ui/oxide/content.inline.min.css">

    

    <link rel="stylesheet" href="{{ asset('asset/css/sweetalert.css') }}">

    <!-- Customizer -->
    <script src="{{ asset('asset/js/customizer.min.js')}}"></script>

<style>
.gallery {
    display: flex;
    flex-wrap: wrap;
    gap: 10px;
}
.gallery-item {
    position: relative;
    width: 150px;
    height: 150px;
    overflow: hidden;
    border-radius: 8px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
}
.gallery-item img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}


 /* Preloader container */
 #preloader {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    display: flex;
    justify-content: center;
    align-items: center;
    background: rgba(112, 147, 163, 0.6); /* Semi-transparent white */
    backdrop-filter: blur(10px); /* Blur effect */
    z-index: 9999;
    transition: opacity 0.5s ease, visibility 0.5s ease; /* Smooth fade-out */
}

/* Assistant animation */
.assistant-animation {
    text-align: center;
    animation: fadeIn 1s ease-in-out;
}

/* Assistant avatar */
.avatar img {
    width: 100px;
    height: 100px;
    border-radius: 50%;
    animation: zoomInOut 2s ease-in-out infinite; /* Zoom in and out */
}

/* Keyframes for zoom in and zoom out */
@keyframes zoomInOut {
    0%, 100% {
        transform: scale(1); /* Normal size */
    }
    50% {
        transform: scale(1.2); /* Zoomed in */
    }
}

/* Typing dots */
.typing-dots {
    margin-top: 20px;
    display: flex;
    justify-content: center;
    gap: 5px;
}

.typing-dots span {
    width: 10px;
    height: 10px;
    background-color: #ece3e3;
    border-radius: 50%;
    animation: blink 1.5s infinite;
}

.typing-dots span:nth-child(2) {
    animation-delay: 0.2s;
}

.typing-dots span:nth-child(3) {
    animation-delay: 0.4s;
}

/* Loading text */
.assistant-animation p {
    margin-top: 10px;
    font-family: 'Arial', sans-serif;
    font-size: 18px;
    color: #333;
}

/* Keyframes for animations */
@keyframes fadeIn {
    0% {
        opacity: 0;
    }
    100% {
        opacity: 1;
    }
}



@keyframes blink {
    0%, 100% {
        opacity: 0.2;
    }
    50% {
        opacity: 1;
    }
}
</style>

  </head>

  <body>
    <div id="preloader" class="preloader">
        <div class="assistant-animation">
            <div class="avatar">
                <img src="{{ asset('avata2.png') }}" alt="Assistant Avatar">
            </div>
            <div class="typing-dots">
                <span></span>
                <span></span>
                <span></span>
            </div>
         
        </div>
    </div>


    <header class="navbar navbar-expand-lg navbar-sticky sticky-top z-fixed px-0" data-sticky-element="">
        <div class="container">

          <!-- Mobile offcanvas menu toggler (Hamburger) -->
          <button type="button" class="navbar-toggler me-3 me-lg-0" data-bs-toggle="offcanvas" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>

          <!-- Navbar brand (Logo) -->
          <a class="navbar-brand py-1 py-md-2 py-xl-1 me-2 me-sm-n4 me-md-n5 me-lg-0" href="{{ url('/') }}">
            <span class="d-none d-sm-flex flex-shrink-0 text-primary rtl-flip me-2">
                <svg xmlns="http://www.w3.org/2000/svg" width="35" height="34"><path d="M34.5 16.894v10.731c0 3.506-2.869 6.375-6.375 6.375H17.5h-.85C7.725 33.575.5 26.138.5 17c0-9.35 7.65-17 17-17s17 7.544 17 16.894z" fill="currentColor"></path><g fill-rule="evenodd"><path d="M17.5 13.258c-3.101 0-5.655 2.554-5.655 5.655s2.554 5.655 5.655 5.655 5.655-2.554 5.655-5.655-2.554-5.655-5.655-5.655zm-9.433 5.655c0-5.187 4.246-9.433 9.433-9.433s9.433 4.246 9.433 9.433a9.36 9.36 0 0 1-1.569 5.192l2.397 2.397a1.89 1.89 0 0 1 0 2.671 1.89 1.89 0 0 1-2.671 0l-2.397-2.397a9.36 9.36 0 0 1-5.192 1.569c-5.187 0-9.433-4.246-9.433-9.433z" fill="#000" fill-opacity=".05"></path><g fill="#fff"><path d="M17.394 10.153c-3.723 0-6.741 3.018-6.741 6.741s3.018 6.741 6.741 6.741 6.741-3.018 6.741-6.741-3.018-6.741-6.741-6.741zM7.347 16.894A10.05 10.05 0 0 1 17.394 6.847 10.05 10.05 0 0 1 27.44 16.894 10.05 10.05 0 0 1 17.394 26.94 10.05 10.05 0 0 1 7.347 16.894z"></path><path d="M23.025 22.525c.645-.645 1.692-.645 2.337 0l3.188 3.188c.645.645.645 1.692 0 2.337s-1.692.645-2.337 0l-3.187-3.187c-.645-.646-.645-1.692 0-2.337z"></path></g></g><path d="M23.662 14.663c2.112 0 3.825-1.713 3.825-3.825s-1.713-3.825-3.825-3.825-3.825 1.713-3.825 3.825 1.713 3.825 3.825 3.825z" fill="#fff"></path>
                    <path fill-rule="evenodd" d="M23.663 8.429a2.41 2.41 0 0 0-2.408 2.408 2.41 2.41 0 0 0 2.408 2.408 2.41 2.41 0 0 0 2.408-2.408 2.41 2.41 0 0 0-2.408-2.408zm-5.242 2.408c0-2.895 2.347-5.242 5.242-5.242s5.242 2.347 5.242 5.242-2.347 5.242-5.242 5.242-5.242-2.347-5.242-5.242z" fill="currentColor"></path>
                </svg>
                Swiftegde VA
            </span>

          </a>

          <!-- Main navigation that turns into offcanvas on screens < 992px wide (lg breakpoint) -->
          <nav class="offcanvas offcanvas-start" id="navbarNav" tabindex="-1" aria-labelledby="navbarNavLabel">
            <div class="offcanvas-header py-3">
              <h5 class="offcanvas-title" id="navbarNavLabel"> SwiftVA</h5>
              <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body pt-2 pb-4 py-lg-0 mx-lg-auto">
              <ul class="navbar-nav position-relative">
                <li class="nav-item dropdown py-lg-2 me-lg-n1 me-xl-0">
                  <a class="nav-link active" aria-current="page" href="{{ url('/') }}" role="button"  data-bs-trigger="hover" aria-expanded="false">Home</a>

                </li>
                <li class="nav-item dropdown position-static py-lg-2 me-lg-n1 me-xl-0">
                  <a class="nav-link" href="{{ route('index.jobs') }}" role="button"  data-bs-trigger="hover" aria-expanded="false">Jobs</a>

                </li>
                <li class="nav-item dropdown py-lg-2 me-lg-n1 me-xl-0">
                  <a class="nav-link" href="{{ route('index.freelancers.list') }}" role="button"  data-bs-trigger="hover" data-bs-auto-close="outside" aria-expanded="false">Freelancer</a>

                </li>


                <li class="nav-item dropdown py-lg-2 me-lg-n1 me-xl-0">
                  <a class="nav-link" href="{{ route('index.booking.form') }}" role="button"  data-bs-trigger="hover" data-bs-auto-close="outside" aria-expanded="false">Booking</a>

                </li>
              </ul>
            </div>
          </nav>

          <!-- Button group -->
          <div class="d-flex gap-sm-1">



            <!-- Theme switcher (light/dark/auto) -->
            {{-- <div class="dropdown me-1 me-sm-2">
              <button type="button" class="theme-switcher btn btn-icon btn-outline-secondary fs-lg border-0 animate-scale" data-bs-toggle="dropdown" data-bs-display="dynamic" aria-expanded="false" aria-label="Toggle theme (light)">
                <span class="theme-icon-active d-flex animate-target">
                  <i class="fi-sun"></i>
                </span>
              </button>
              <ul class="dropdown-menu start-50 translate-middle-x" style="--fn-dropdown-min-width: 9rem; --fn-dropdown-spacer: .5rem">
                <li>
                  <button type="button" class="dropdown-item active" data-bs-theme-value="light" aria-pressed="true">
                    <span class="theme-icon d-flex fs-base me-2">
                      <i class="fi-sun"></i>
                    </span>
                    <span class="theme-label">Light</span>
                    <i class="item-active-indicator fi-check ms-auto"></i>
                  </button>
                </li>
                <li>
                  <button type="button" class="dropdown-item" data-bs-theme-value="dark" aria-pressed="false">
                    <span class="theme-icon d-flex fs-base me-2">
                      <i class="fi-moon"></i>
                    </span>
                    <span class="theme-label">Dark</span>
                    <i class="item-active-indicator fi-check ms-auto"></i>
                  </button>
                </li>
                <li>
                  <button type="button" class="dropdown-item" data-bs-theme-value="auto" aria-pressed="false">
                    <span class="theme-icon d-flex fs-base me-2">
                      <i class="fi-auto"></i>
                    </span>
                    <span class="theme-label">Auto</span>
                    <i class="item-active-indicator fi-check ms-auto"></i>
                  </button>
                </li>
              </ul>
            </div> --}}

            <form action="{{ route('changeCurrency') }}" method="POST">
                @csrf

                <select class="form-control border-0" onchange="this.form.submit()" name="currency" id="currency">
                    <option value="USD" {{ session('currency', $currency) == 'USD' ? 'selected' : '' }}>USD</option>
                    <option value="NGN" {{ session('currency', $currency) == 'NGN' ? 'selected' : '' }}>NGN</option>
                    <option value="GBP" {{ session('currency', $currency) == 'GBP' ? 'selected' : '' }}>GBP</option>
                    <option value="EUR" {{ session('currency', $currency) == 'EUR' ? 'selected' : '' }}>EUR</option>
                    <!-- Add more currencies as needed -->
                </select>

            </form>

            <!-- Sign up / Register button  -->



            <div class="dropdown pe-1 me-2">
                @if(!empty(Auth::user()->profile_image))
                <a class="btn btn-icon hover-effect-scale position-relative bg-body-secondary border rounded-circle overflow-hidden" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false" aria-label="My account">
                  <img src="{{ asset(Auth::user()->profile_image) }}" class="hover-effect-target position-absolute top-0 start-0 w-100 h-100 object-fit-cover" alt="Avatar">
                </a>
                @else
                <a class="btn btn-icon hover-effect-scale position-relative bg-body-secondary border rounded-circle overflow-hidden" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false" aria-label="My account">
                    <img src="{{asset('avata2.jpg')}}" class="hover-effect-target position-absolute top-0 start-0 w-100 h-100 object-fit-cover" alt="Avatar">
                  </a>
                  @endif


                <ul class="dropdown-menu dropdown-menu-end" style="--fn-dropdown-spacer: .5rem">
                  <li><span class="h6 dropdown-header">{{Auth::user()->full_name}}</span></li>
                  @if (Auth::user()->role === 'Artisan')
                  <li>
                    <a class="dropdown-item" href="{{route('user.home')}}">
                      <i class="fi-user opacity-75 me-2"></i>
                     Dashboard
                    </a>
                  </li>
                  @endif

                  <li><hr class="dropdown-divider"></li>
                  <li>
                    <a class="dropdown-item" href="{{route('account.logout')}}">
                      <i class="fi-log-out opacity-75 me-2"></i>
                      Sign out
                    </a>
                  </li>
                </ul>
              </div>


          </div>
        </div>
      </header>

      <main class="content-wrapper">
        <div class="container pt-4 pt-sm-5 pb-5 mb-xxl-3">
          <div class="row pt-2 pt-sm-0 pt-lg-2 pb-2 pb-sm-3 pb-md-4 pb-lg-5">


