<!DOCTYPE html>
<html dir="ltr" lang="en-US" data-bs-theme="dark" data-pwa="true">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />

<head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Viewport -->
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, viewport-fit=cover">
    <title>SwiftedgeVA | Home </title>




        <link rel="icon" type="image/png" href="{{ asset('assets/app-icons/icon-32x32.png')}}" sizes="32x32">
        <link rel="apple-touch-icon" href="{{ asset('asset/app-icons/icon-180x180.png')}}">
        <!-- Theme switcher (color modes) -->
        <script src="{{ asset('asset/js/theme-switcher.js')}}"></script>

        <!-- Preloaded local web font (Inter) -->
        <link rel="preload" href="{{ asset('asset/fonts/inter-variable-latin.woff2')}}" as="font" type="font/woff2" crossorigin="">

        <!-- Font icons -->
        <link rel="preload" href="{{ asset('asset/icons/finder-icons.woff2')}}" as="font" type="font/woff2" crossorigin="">
        <link rel="stylesheet" href="{{ asset('asset/icons/finder-icons.min.css')}}">
        <!-- Vendor styles -->
        <link rel="stylesheet" href="{{ asset('asset/vendor/swiper/swiper-bundle.min.css')}}">
        <link rel="stylesheet" href="{{ asset('asset/vendor/choices/choices.min.css')}}">
        <link rel="stylesheet" href="{{ asset('asset/vendor/flatpickr/flatpickr.min.css')}}">
        <link rel="stylesheet" href="{{ asset('asset/vendor/glightbox/glightbox.min.css') }}">
        <!-- Bootstrap + Theme styles -->
        <link rel="preload" href="{{ asset('asset/css/theme.min.css')}}" as="style">
        <link rel="preload" href="{{ asset('asset/css/theme.rtl.min.css')}}" as="style">
        <link rel="stylesheet" href="{{ asset('asset/css/theme.min.css')}}" id="theme-styles">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.0/dist/sweetalert2.min.css">
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.0/dist/sweetalert2.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/7.6.0/tinymce.min.js"></script>

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css">

</head>

<style>

       .input-container {
        display: flex;
        flex-wrap: wrap;
        padding: 5px;
        min-height: 45px;
        border: 1px solid #ddd;
        border-radius: 5px;
        cursor: text;
    }

    .tag-input {
        border: none;
        outline: none;
        flex: 1;
        min-width: 150px;
    }

    .tag {
        background-color: #e9ecef;
        border-radius: 10%;
        padding: 5px 10px;
        margin: 3px;
        display: flex;
        align-items: center;
        color: #0e0f0f;
        /*max-width: calc(20% - 5px);*/

        box-sizing: border-box;

    }

    .tag i {
        margin-left: 5px;
        cursor: pointer;
        color: #dc3545;

    }

    .suggestions-list {
        border: 1px solid #0d0152;
        max-height: 150px;
        overflow-y: auto;
        position: absolute;
        z-index: 1000;
        background: #080429;
        border-radius: 20px;
        width: 25%;
        display: none;
    }

    .suggestion-item {
        padding: 8px 12px;
        cursor: pointer;
    }

    .suggestion-item:hover {
        background-color: #f0f0f0;
        color: #080429;
    }


#youtubePreview iframe {
    border: 1px solid #ccc;
    border-radius: 10px;
    margin-top: 10px;
    width: 100%;
}

#videoPreview{
    border: 1px solid #ccc;
    border-radius: 10px;
    margin-top: 10px;
    width: 100%;
}

@media (max-width:499.98px) {
    #youtubePreview iframe {
    width: 100%;
    }
}



     .ribbon {
            position: absolute;
            top: 15px;
            right: -5px;
            z-index: 1;
            overflow: hidden;
            width: 75px;
            height: 75px;
            text-align: right;
        }

        .ribbon span {
            font-size: 10px;
            font-weight: bold;
            color: #fff;
            text-transform: uppercase;
            text-align: center;
            line-height: 20px;
            transform: rotate(45deg);
            width: 100px;
            display: block;
            background: #79a70a;
            box-shadow: 0 3px 10px -5px rgba(0, 0, 0, 1);
            position: absolute;
            top: 19px;
            right: -21px;
        }

        .ribbon span.paid {
            background: #ff0000; /* Red background for Paid */
        }

        .ribbon span.free {
            background: #79a70a; /* Green background for Free */
        }

</style>




<body style="visibility: hidden">




























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
                      <a class="nav-link {{Request::segment(2)  === "home" ? "active" : ""}}" aria-current="page" href="{{ url('/') }}" role="button"  data-bs-trigger="hover" aria-expanded="false">Home</a>

                    </li>
                    <li class="nav-item dropdown position-static py-lg-2 me-lg-n1 me-xl-0">
                      <a class="nav-link  {{Request::segment(2)  === "services" ? "active" : ""}}" href="{{ route('index.jobs') }}" role="button"  data-bs-trigger="hover" aria-expanded="false">Jobs</a>

                    </li>
                    <li class="nav-item dropdown py-lg-2 me-lg-n1 me-xl-0">
                      <a class="nav-link {{Request::segment(2)  === "freelancers" ? "active" : ""}}" href="{{ route('index.freelancers.list') }}" role="button"  data-bs-trigger="hover" data-bs-auto-close="outside" aria-expanded="false">Freelancer</a>

                    </li>


                    <li class="nav-item dropdown py-lg-2 me-lg-n1 me-xl-0">
                      <a class="nav-link {{Request::segment(2)  === "booking" ? "active" : ""}}" href="{{ route('index.booking.form') }}" role="button"  data-bs-trigger="hover" data-bs-auto-close="outside" aria-expanded="false">Booking</a>

                    </li>


                    <li class="nav-item dropdown py-lg-2 me-lg-n1 me-xl-0">
                        <a class="nav-link {{Request::segment(2)  === "contact" ? "active" : ""}}" href="{{ route('index.contact.us') }}" role="button"  data-bs-trigger="hover" data-bs-auto-close="outside" aria-expanded="false">Contact Us</a>

                      </li>
                  </ul>
                </div>
              </nav>

              <!-- Button group -->
              <div class="d-flex gap-sm-1">

                <a class="btn btn-primary animate-scale" href="{{ route('index.register') }}">
                    <i class="fi-plus fs-lg animate-target ms-n2 me-1 me-sm-2"></i>
                    Become A<span class="d-none d-xl-inline ms-1">Freelancer</span>
                  </a>

                <!-- Theme switcher (light/dark/auto) -->
                <div class="dropdown me-1 me-sm-2">
                  <button type="button" class="theme-switcher btn btn-icon btn-outline-secondary fs-lg border-0 animate-scale" data-bs-toggle="dropdown" data-bs-display="dynamic" aria-expanded="false" aria-label="Toggle theme (light)">
                    <span class="theme-icon-active d-flex animate-target">
                      <i class="fi-sun"></i>
                    </span>
                  </button>
                  <ul class="dropdown-menu start-50 translate-middle-x" style="--fn-dropdown-min-width: 9rem; --fn-dropdown-spacer: .5rem">
                    <li>
                      <button type="button" class="dropdown-item " data-bs-theme-value="light" aria-pressed="false">
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
                      <button type="button" class="dropdown-item active" data-bs-theme-value="auto" aria-pressed="true">
                        <span class="theme-icon d-flex fs-base me-2">
                          <i class="fi-auto"></i>
                        </span>
                        <span class="theme-label">Auto</span>
                        <i class="item-active-indicator fi-check ms-auto"></i>
                      </button>
                    </li>
                  </ul>
                </div>

                <!-- Sign up / Register button  -->
@auth


                <div class="dropdown pe-1 me-2">
                    @if(!empty(Auth::user()->profile_image))
                    <a class="btn btn-icon hover-effect-scale position-relative bg-body-secondary border rounded-circle overflow-hidden"  role="button" data-bs-toggle="dropdown" aria-expanded="false" aria-label="My account">
                    <img src="{{asset(Auth::user()->profile_image)}}" class="hover-effect-target position-absolute top-0 start-0 w-100 h-100 object-fit-cover" alt="Avatar">
                    </a>
                    @else
                    <a class="btn btn-icon hover-effect-scale position-relative bg-body-secondary border rounded-circle overflow-hidden" role="button" data-bs-toggle="dropdown" aria-expanded="false" aria-label="My account">
                        <img src="{{asset('ava.jpg')}}" class="hover-effect-target position-absolute top-0 start-0 w-100 h-100 object-fit-cover" alt="Avatar">
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

                @else
                <a class="btn btn-outline-dark animate-shake" href="{{ route('login') }}">
                  <i class="fi-user fs-base animate-target ms-n1 me-1 me-sm-2"></i>
                  Sign in
                </a>

                @endauth
              </div>
            </div>
          </header>


