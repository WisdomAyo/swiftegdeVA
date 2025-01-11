<!DOCTYPE html>
<html lang="en" data-bs-theme="light" data-pwa="true">
    <head>
    <meta http-equiv="content-type" content="text/html;charset=utf-8" />
        <meta charset="utf-8">

        <!-- Viewport -->
        <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, viewport-fit=cover">

        <!-- SEO Meta Tags -->
        <title>Finder | Account - Sign Up</title>
        <meta name="description" content="Finder - Directory &amp; Listings Bootstrap HTML Template">
        <meta name="keywords" content="directory, listings, search, car dealer, real estate, city guide, business listings, medical directories, event listings, e-commerce, market, multipurpose, ui kit, light and dark mode, bootstrap, html5, css3, javascript, gallery, slider, mobile, pwa">
        <meta name="author" content="Createx Studio">

        <!-- Webmanifest + Favicon / App icons -->
        <meta name="mobile-web-app-capable" content="yes">
        <meta name="apple-mobile-web-app-status-bar-style" content="black">
        <link rel="manifest" href="manifest.json">
        <link rel="icon" type="image/png" href="asset/app-icons/icon-32x32.png" sizes="32x32">
        <link rel="apple-touch-icon" href="asset/app-icons/icon-180x180.png">

        <!-- Theme switcher (color modes) -->
        <script src="assets/js/theme-switcher.js"></script>

        <!-- Preloaded local web font (Inter) -->
        <link rel="preload" href="asset/fonts/inter-variable-latin.woff2" as="font" type="font/woff2" crossorigin="">

        <!-- Font icons -->
        <link rel="preload" href="asset/icons/finder-icons.woff2" as="font" type="font/woff2" crossorigin="">
        <link rel="stylesheet" href="assets/icons/finder-icons.min.css">

        <!-- Bootstrap + Theme styles -->
        <link rel="preload" href="{{ asset('asset/css/theme.min.css')}}" as="style">
        <link rel="preload" href="{{ asset('asset/css/theme.rtl.min.css')}}" as="style">
        <link rel="stylesheet" href="{{asset('asset/css/theme.min.css')}}" id="theme-styles">

        <!-- Customizer -->

      </head>


      <!-- Body -->
      <body>



        <!-- Page content -->
        <main class="content-wrapper w-100 px-3 ps-lg-5 pe-lg-4 mx-auto" style="max-width: 1920px">
          <div class="d-lg-flex">

            <!-- Login form + Footer -->
            <div class="d-flex flex-column min-vh-100 w-100 py-4 mx-auto me-lg-5" style="max-width: 416px">

              <!-- Logo -->
              <header class="navbar px-0 pb-4 mt-n2 mt-sm-0 mb-2 mb-md-3 mb-lg-4">
                <a class="navbar-brand pt-0" href="{{ url('/') }}">
                  <span class="d-flex flex-shrink-0 text-primary rtl-flip me-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="35" height="34"><path d="M34.5 16.894v10.731c0 3.506-2.869 6.375-6.375 6.375H17.5h-.85C7.725 33.575.5 26.138.5 17c0-9.35 7.65-17 17-17s17 7.544 17 16.894z" fill="currentColor"></path><g fill-rule="evenodd"><path d="M17.5 13.258c-3.101 0-5.655 2.554-5.655 5.655s2.554 5.655 5.655 5.655 5.655-2.554 5.655-5.655-2.554-5.655-5.655-5.655zm-9.433 5.655c0-5.187 4.246-9.433 9.433-9.433s9.433 4.246 9.433 9.433a9.36 9.36 0 0 1-1.569 5.192l2.397 2.397a1.89 1.89 0 0 1 0 2.671 1.89 1.89 0 0 1-2.671 0l-2.397-2.397a9.36 9.36 0 0 1-5.192 1.569c-5.187 0-9.433-4.246-9.433-9.433z" fill="#000" fill-opacity=".05"></path><g fill="#fff"><path d="M17.394 10.153c-3.723 0-6.741 3.018-6.741 6.741s3.018 6.741 6.741 6.741 6.741-3.018 6.741-6.741-3.018-6.741-6.741-6.741zM7.347 16.894A10.05 10.05 0 0 1 17.394 6.847 10.05 10.05 0 0 1 27.44 16.894 10.05 10.05 0 0 1 17.394 26.94 10.05 10.05 0 0 1 7.347 16.894z"></path><path d="M23.025 22.525c.645-.645 1.692-.645 2.337 0l3.188 3.188c.645.645.645 1.692 0 2.337s-1.692.645-2.337 0l-3.187-3.187c-.645-.646-.645-1.692 0-2.337z"></path></g></g><path d="M23.662 14.663c2.112 0 3.825-1.713 3.825-3.825s-1.713-3.825-3.825-3.825-3.825 1.713-3.825 3.825 1.713 3.825 3.825 3.825z" fill="#fff"></path><path fill-rule="evenodd" d="M23.663 8.429a2.41 2.41 0 0 0-2.408 2.408 2.41 2.41 0 0 0 2.408 2.408 2.41 2.41 0 0 0 2.408-2.408 2.41 2.41 0 0 0-2.408-2.408zm-5.242 2.408c0-2.895 2.347-5.242 5.242-5.242s5.242 2.347 5.242 5.242-2.347 5.242-5.242 5.242-5.242-2.347-5.242-5.242z" fill="currentColor"></path></svg>
                  </span>
                 SwiftedgeVA
                </a>
              </header>



            <div id="login-form-wrapper2712">  <br> <br> <br> <br> <br> <br>
              <h1 class="h2 mt-auto">Welcome Back !</h1>
              <div class="nav fs-sm mb-3 mb-lg-4">
                Don't have an account
                <a class="nav-link text-decoration-underline p-0 ms-2" href="{{ route('index.register') }}">Register</a>
              </div>


              <!-- Form -->
              <form class="needs-validation"  action="{{ route('login.in.user') }}" method="post"   >
                {{ csrf_field() }}





            @if(session('error'))
            <div class="toast text-bg-danger border-0 fade show w-100" role="alert" aria-live="assertive" aria-atomic="true">
                <div class="d-flex">
                  <i class="fi-check-circle text-success fs-base mt-1 me-2"></i>
                  <div class="toast-body me-2">
                    {{session('error')}}
                  </div>
                  <button type="button" class="btn-close ms-auto" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
                 </div>
                    @endif


            @if(session('response'))
            <div class="toast text-bg-info border-0 fade show w-100" role="alert" aria-live="assertive" aria-atomic="true">
                <div class="d-flex">
                  <i class="fi-check-circle text-success fs-base mt-1 me-2"></i>
                  <div class="toast-body me-2">
                    {{session('response')}}
                  </div>
                  <button type="button" class="btn-close ms-auto" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
                 </div>
                    @endif



                <div class="position-relative mb-4">
                  <label for="register-email" class="form-label">Email</label>
                  <input type="email" class="form-control form-control-lg @error('options') is-invalid @enderror" id="username_or_email" required="" name="options" id="lostpassword_username" placeholder="Username or E-mail" data-hash='6f8hndb4f7b0'>
                  @error('options')
                  <div class="invalid-tooltip bg-transparent py-0">{{ $errors->first('options') }} </div>
              @enderror
                  @if ($errors->has('options'))
                  <div class="invalid-tooltip bg-transparent py-0">{{ $errors->first('options') }} </div>
                  @endif
                </div>



                <div class="mposition-relative mb-4">
                  <label for="register-password" class="form-label">Password</label>
                  <div class="password-toggle">
                    <input type="password" class="form-control form-control-lg @error('password') is-invalid @enderror" name="password" id="register-password" minlength="8" placeholder="Minimum 8 characters" value=""
                    data-lpignore='1'
                    autocomplete="off"
                    data-hash='gl70hk4g8ss0'
                    placeholder="Password"
                    required="required"  >
                    @error('password')
                    <div class="invalid-tooltip bg-transparent py-0">{{ $errors->first('password') }} </div>
                @enderror
                <label class="password-toggle-button fs-lg" aria-label="Show/hide password">
                    <input type="checkbox" class="btn-check">
                  </label>

                  </div>
                  <a class="text-success fs-sm text-decoration-none float-xl-end mt-2 mb-2 " href="javascript:void(0)" onclick="showForgetPasswordForm()"> Forget Password</a>
                </div>








                {{-- <div class="d-flex flex-column gap-2 mb-4">

                  <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="privacy" required="">
                    <label for="privacy" class="form-check-label">Keep me signed in </label>

                  </div>
                </div> --}}
                <button type="submit" class="btn btn-lg btn-primary w-100">
                  Login
                  <i class="fi-chevron-right fs-lg ms-1 me-n1"></i>
                </button>
                <input type="hidden" id="security_login" name="security_login" value="e8cc53a709">
              </form>
              </div>

              <!-- Divider -->
              {{-- <div class="d-flex align-items-center my-4">
                <hr class="w-100 m-0">
                <span class="text-body-emphasis fw-medium text-nowrap mx-4">or continue with</span>
                <hr class="w-100 m-0">
              </div> --}}




              <div id="forgot-password-form-wrapper2712" class="form-container forgotpassword-form-wrapper"  style="display: none" > <br> <br> <br> <br> <br> <br>

              <h1 class="h2 mt-auto">Reset Password</h1>
              <div class="nav fs-sm mb-3 mb-lg-4">
                Please Enter Username or Email

              </div>


              <!-- Form -->
              <form class="needs-validation" novalidate="" name="forgotpasswordform" action="{{ route('forget.password.reset') }}" method="post" id="_employer_register_fields_9499"   enctype="multipart/form-data"  encoding="multipart/form-data">
                {{ csrf_field() }}


                @if(session('error'))
                <div class="notification-alert-danger alert alert-danger alert-dismissible fade show" role="alert">
                    {{session('error')}}
                    <button type="button" class="btn btn-sm-primary" data-bs-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
            @endif


            @if(session('response'))

                <div class="notification-alert alert alert-success alert-dismissible fade show" role="alert">
                    {{session('response')}}
                    <button type="button" class="btn btn-primary" data-bs-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
            @endif



                <div class="position-relative mb-4">
                  <label for="register-email" class="form-label">Email</label>
                  <input type="email" class="form-control form-control-lg @error('email') is-invalid @enderror"  required="" name="email" id="lostpassword_username" placeholder="Username or E-mail" data-hash='6f8hndb4f7b0'>
                  @error('email')
                  <div class="invalid-tooltip bg-transparent py-0">{{ $errors->first('email') }} </div>
              @enderror
                  @if ($errors->has('email'))
                  <div class="invalid-tooltip bg-transparent py-0">{{ $errors->first('email') }} </div>
                  @endif
                </div>


                <button type="submit" class="btn btn-lg btn-primary w-100">
                  Get New Password
                  <i class="fi-chevron-right fs-lg ms-1 me-n1"></i>
                </button>

              </form>
              <a class="text-success fs-sm  text-decoration-none float-xl-end" href="javascript:void(0)" onclick="showLoginForm()"> Back to login</a>

              </div>


              <!-- Footer -->
              <footer class="mt-auto">
                <div class="nav mb-4">
                  <a class="nav-link text-decoration-underline p-0" href="{{url('/')}}">Take me home</a>
                </div>

              </footer>
            </div>


            <!-- Benefits section that turns into offcanvas on screens < 992px wide (lg breakpoint) -->
            <div class="d-none d-lg-block w-100 py-4 ms-auto" style="max-width: 934px">
                <div class="d-flex flex-column justify-content-end h-100  rounded-5">
                  <div class="ratio" style="--fn-aspect-ratio: calc(1030 / 1032 * 100%)">
                    <img src="{{asset('asset/login.svg')}}" alt="Girl">
                  </div>
                </div>
              </div>
          </div>
        </main>




<script>
         function showForgetPasswordForm(){
        document.getElementById('login-form-wrapper2712').style.display='none';
        document.getElementById('forgot-password-form-wrapper2712').style.display='block';
    }
        function showLoginForm(){
            document.getElementById('login-form-wrapper2712').style.display='block';
            document.getElementById('forgot-password-form-wrapper2712').style.display='none'
        }



</script>

        <!-- Bootstrap + Theme scripts -->
        <script src="{{asset('asset/js/theme.min.js')}}"></script>



    </html>


