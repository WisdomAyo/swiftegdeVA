<!DOCTYPE html>
<html lang="en" data-bs-theme="dark" data-pwa="true">
<meta http-equiv="content-type" content="text/html;charset=utf-8" />
    <meta charset="utf-8">

    <!-- Viewport -->
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, viewport-fit=cover">

    <!-- SEO Meta Tags -->
    <title>Finder | Account - Sign Up</title>
    <meta name="description" content="Finder - Directory &amp; Listings Bootstrap HTML Template">
    <meta name="keywords" content="directory, listings, search, car dealer, real estate, city guide, business listings, medical directories, event listings, e-commerce, market, multipurpose, ui kit, light and dark mode, bootstrap, html5, css3, javascript, gallery, slider, mobile, pwa">
    <meta name="author" content="Createx Studio">
    <meta name="csrf-token" content="{{ csrf_token() }}">
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
    <link rel="stylesheet" href="asset/icons/finder-icons.min.css">

    <!-- Bootstrap + Theme styles -->
    <link rel="preload" href="{{ asset('asset/css/theme.min.css') }}" as="style">
    <link rel="stylesheet" href="{{ asset('asset/css/theme.min.css') }}" id="theme-styles">
    <link rel="stylesheet" href="{{ asset('asset/vendor/choices.js/choices.min.css')}}">
    <link rel="stylesheet" href="{{ asset('asset/vendor/flatpickr/flatpickr.min.css')}}">

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

          <h1 class="h2 mt-auto">Create an account</h1>
          <div class="nav fs-sm mb-3 mb-lg-4">
            I already have an account
            <a class="nav-link text-decoration-underline p-0 ms-2" href="{{ route('login') }}">Sign in</a>
          </div>
          <div class="nav fs-sm mb-4 d-lg-none">
            <span class="me-2">Create an Account and Become a Freelnacer</span>
            <a class="nav-link text-decoration-underline p-0" href="#benefits" data-bs-toggle="offcanvas" aria-controls="benefits">Explore the Benefits</a>
          </div>
          @if (session('error'))
          <div class="notification-alert-danger alert alert-danger alert-dismissible fade show"
              role="alert">
              {{ session('error') }}
              <button type="button" class="btn btn-primary"
                  data-bs-dismiss="alert"
                  aria-label="Close">
                  <span aria-hidden="true">×</span>
              </button>
          </div>
      @endif
          <!-- Form -->
          <form action="{{ route('index.staffing.employer.save') }}"
          class="cmb-form _employer_register_fields"
          method="post"
          id="_employer_register_fields_9499"
          enctype="multipart/form-data"
          encoding="multipart/form-data">

          {{ csrf_field() }}





            <div class="position-relative mb-4">
                <label for="full-name" class="form-label">Full Name</label>
                <input type="text" class="form-control form-control-lg @error('fullname') is-invalid @enderror" id="full_name" required="" name="fullname">
                @error('fullname')
                <div class="invalid-tooltip bg-transparent py-0">{{ $errors->first('fullname') }} </div>
            @enderror
                @if ($errors->has('fullname'))
                <div class="invalid-tooltip bg-transparent py-0">{{ $errors->first('fullname') }} </div>
                @endif

              </div>

            <div class="position-relative mb-4">
              <label for="register-email" class="form-label">Email</label>
              <input type="email" class="form-control form-control-lg @error('email') is-invalid @enderror" id="register-email" required="" name="email" placeholder="Enter Email" data-hash='6f8hndb4f7b0'>
              @error('email')
              <div class="invalid-tooltip bg-transparent py-0">{{ $errors->first('email') }} </div>
          @enderror
              @if ($errors->has('email'))
              <div class="invalid-tooltip bg-transparent py-0">{{ $errors->first('email') }} </div>
              @endif
            </div>

            <div class="position-relative mb-4">
                <label for="phone" class="form-label">Phone Number</label>
                <input type="tel" class="form-control form-control-lg @error('phone') is-invalid @enderror" id="phone" data-hash='1nv73cileo1g'  name="phone" value="{{ old('name')}}" required  data-input-format="{&quot;numericOnly&quot;: true, &quot;delimiters&quot;: [&quot;(&quot;, &quot;)&quot;, &quot; &quot;, &quot;-&quot;, &quot; &quot;], &quot;blocks&quot;: [0, 3, 0, 3, 4]}" placeholder="(___) ___-____" required="">
                @error('phone')
                <div class="invalid-tooltip bg-transparent py-0">{{ $errors->first('phone') }} </div>
            @enderror
            </div>

            <div class="position-relative mb-4">
                <label for="phone" class="form-label">Your Office Title (eg CEO)</label>
                <input type="text" class="form-control form-control-lg @error('phone') is-invalid @enderror" id="title" data-hash='1nv73cileo1g'  name="office_title" value="{{ old('name')}}" required  data-input-format="{&quot;numericOnly&quot;: true, &quot;delimiters&quot;: [&quot;(&quot;, &quot;)&quot;, &quot; &quot;, &quot;-&quot;, &quot; &quot;], &quot;blocks&quot;: [0, 3, 0, 3, 4]}" placeholder="(___) ___-____" required="">
                @error('office_title')
                <div class="invalid-tooltip bg-transparent py-0">{{ $errors->first('office_title') }} </div>
            @enderror
            </div>

            <div class="position-relative mb-4">

                <label class="form-label">Country *</label>
                <select class="form-select form-select-lg"  required name="country_id" id="country">
                <option value="">Select your Country</option>
                @foreach (\App\Models\Country::all() as $row)
                <option value="{{ $row->id }}">{{ ucfirst(strtolower($row->name)) }}</option>
                @endforeach
                </select>
              </div>


              <div class="position-relative mb-4">
                <label for="state" class="form-label">State *</label>
                <select name="state_id" id="state" class="form-select form-select-lg"
                required>
                    <option value="">Select State</option>
                    {{-- @if(Auth::user()->state)
                    <option value="{{ Auth::user()->state }}" selected>{{ Auth::user()->stateName->name }}</option>
                @endif --}}

                </select>
            </div>


              <div class="position-relative mb-4">
                <label class="form-label">City *</label>
                <select class="form-select form-select-lg" required="" id="city" name="city_id" >
                <option value="">Select your City</option>
                {{-- @if(Auth::user()->city)
                <option value="{{ Auth::user()->city }}" selected>{{ Auth::user()->cityName->name }}</option>
            @endif --}}
                </select>
              </div>

            <div class="pb-4 mb-2 position-relative mb-4">
              <label for="address" class="form-label">Street address *</label>
              <input type="text" name="street_address" class="form-control form-control-lg" id="street_address" value="{{ $street_address ?? '' }}" placeholder="Enter Street address" required="">
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
            </div>


            <div class="mb-4">
                <label for="register-password" class="form-label">Password Confirmation</label>
                <div class="password-toggle">
                  <input type="password"  name="password_confirmation" class="form-control form-control-lg @error('password_confirmation') is-invalid @enderror" id="register-paConfirmationssword" minlength="8" placeholder="Minimum 8 characters" value=""
                  value=""
                  data-lpignore='1'
                  autocomplete="off"
                  data-hash='5mhknr9cfoq0'
                  placeholder="Confirm Password"
                  required="required">

                  @error('password_confirmation')
                <div class="invalid-tooltip bg-transparent py-0">{{ $errors->first('password_confirmation') }} </div>
            @enderror
                  <label class="password-toggle-button fs-lg" aria-label="Show/hide password">
                    <input type="checkbox" class="btn-check">
                  </label>
                </div>
              </div>






            <div class="d-flex flex-column gap-2 mb-4">

              <div class="form-check">
                <input type="checkbox" class="form-check-input"   required name="terms_and_conditions"value="on" id="register-terms-and-conditions">
                <label for="privacy" class="form-check-label">I have read and accept the <a class="text-dark-emphasis" href="#!">Privacy Policy</a></label>
              </div>
            </div>
            <button type="submit" class="btn btn-lg btn-primary w-100">
              Create an account
              <i class="fi-chevron-right fs-lg ms-1 me-n1"></i>
            </button>
          </form>

          <!-- Divider -->
          {{-- <div class="d-flex align-items-center my-4">
            <hr class="w-100 m-0">
            <span class="text-body-emphasis fw-medium text-nowrap mx-4">or continue with</span>
            <hr class="w-100 m-0">
          </div> --}}



          <!-- Footer -->
          <footer class="mt-auto">
            <div class="nav mb-4">
              <a class="nav-link text-decoration-underline p-0" href="{{ url('/')}}">Take me Back Home</a>
            </div>

          </footer>
        </div>


        <!-- Benefits section that turns into offcanvas on screens < 992px wide (lg breakpoint) -->
        <div class="offcanvas-lg offcanvas-start w-100 py-5  my-lg-5 ms-auto " id="benefits" style="max-width: 1034px">

 <br><br><br>

 <div class="d-none d-lg-block w-100 py-4 ms-auto" style="max-width: 1034px">
    <div class="d-flex flex-column justify-content-end h-100 bg-info-subtle rounded-5">
      <div class="ratio" style="--fn-aspect-ratio: calc(1030 / 1032 * 100%)">
        <img src="{{ asset('asset/employer.jpg') }}" alt="Girl">
      </div>
    </div>
  </div>


        </div>
      </div>
    </main>





    <!-- Bootstrap + Theme scripts -->

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    // Configure AJAX globally
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') // CSRF token for Laravel
        },
        error: function (xhr, status, error) {
            // Handle global AJAX errors
            console.error('AJAX Error:', xhr.responseJSON || error);
            alert('Something went wrong. Please try again.');
        }
    });

    $(document).ready(function () {
        // Fetch states when country changes
        $('#country').on('change', function () {
            const countryId = $(this).val();
            if (countryId) {
                $.ajax({
                    url: `/country/${countryId}/states`, // AJAX endpoint to fetch states
                    type: 'GET',
                    dataType: 'json',
                    success: function (data) {
                        console.log('States fetched:', data); // Debug fetched data
                        const stateDropdown = $('#state');
                        stateDropdown.empty().append('<option value="">Select State</option>');
                        $.each(data, function (index, state) {
                            stateDropdown.append(`<option value="${state.id}">${state.name}</option>`);
                        });
                        $('#city').empty().append('<option value="">Select City</option>'); // Reset city dropdown
                    }
                });
            } else {
                $('#state').empty().append('<option value="">Select State</option>');
                $('#city').empty().append('<option value="">Select City</option>');
            }
        });

        // Fetch cities when state changes
        $('#state').on('change', function () {
            const stateId = $(this).val();
            if (stateId) {
                $.ajax({
                    url: `/state/${stateId}/cities`, // AJAX endpoint to fetch cities
                    type: 'GET',
                    dataType: 'json',
                    success: function (data) {
                        console.log('Cities fetched:', data); // Debug fetched data
                        const cityDropdown = $('#city');
                        cityDropdown.empty().append('<option value="">Select City</option>');
                        $.each(data, function (index, city) {
                            cityDropdown.append(`<option value="${city.id}">${city.name}</option>`);
                        });
                    }
                });
            } else {
                $('#city').empty().append('<option value="">Select City</option>');
            }
        });
    });



    // $(function() {
    //     $('select[name=country]').change(function() {
    //         const option = document.getElementById("country").value;
    //         const url = '{{ url('country') }}' +'/'+ option + '/states';

    //         $.ajax({
    //             url: url,
    //             type: "GET",
    //             dataType: "json",
    //             success:function(data) {
    //                 $('select[name="state"]').empty();
    //                 $.each(data, function(key, value) {
    //                     $('select[name="state"]').append('<option value="'+ value.id +'">'+ value.name +'</option>');
    //                 });
    //             }
    //         });
    //     });

    //     $('select[name=state]').change(function() {
    //         const option = document.getElementById("state").value;
    //         const url = '{{ url('state') }}' +'/'+ option + '/cities';

    //         $.ajax({
    //             url: url,
    //             type: "GET",
    //             dataType: "json",
    //             success:function(data) {
    //                 $('select[name="state_area"]').empty();
    //                 $.each(data, function(key, value) {
    //                     $('select[name="state_area"]').append('<option value="'+ value.id +'">'+ value.name +'</option>');
    //                 });
    //             }
    //         });
    //     });

    // });
</script>


  <script src="asset/js/theme.min.js"></script>
<script src="{{ asset('asset/vendor/swiper/swiper-bundle.min.js')}}"></script>
<script src="{{ asset('asset/vendor/choices.js/choices.min.js')}}"></script>
<script src="{{ asset('asset/vendor/flatpickr/flatpickr.min.js')}}"></script>


</body>
</html>

{{-- @endsection --}}

    <!-- Start Page Banner Area -->

    {{-- <div class="page-banner-area item-bg-three">
        <div class="d-table">
            <div class="d-table-cell">
                <div class="container">
                    <div class="page-banner-content">
                        <h2>STAFFING SOLUTION</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Page Banner Area -->

    <!-- Start About Area -->
    <div class="about-area pt-100 center post-a-new-job-box">
        <div class="container col-lg-8">

            @if(session('error'))
                <div class="notification-alert-danger alert alert-danger alert-dismissible fade show" role="alert">
                    {{session('error')}}
                    <button type="button" class="btn btn-primary" data-bs-dismiss="alert" aria-label="Close">
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
            <div class="post-a-new-job-box">
                <h3>STAFFING SOLUTION</h3>

                <form method="post" action="{{ route('index.staffing.employer.save')}}" enctype="multipart/form-data"
                      style="color:#000000;">
                    {{ csrf_field() }}

                    <div class="form-group">
                        <label>Full Name</label>
                        <input type="text" name="fullname" class="form-control"
                               placeholder="Enter Full Name" required="">
                        @if ($errors->has('fullname'))
                            <div class="alert alert-info">
                                <strong>{{ $errors->first('fullname') }}</strong>
                            </div>
                        @endif
                    </div>

                    <div class="form-group">
                        <label>Email Address</label>
                        <input type="email" name="email" class="form-control" placeholder="E.g; someone@example.com">
                        @if ($errors->has('email'))
                            <div class="alert alert-info">
                                <strong>{{ $errors->first('email') }}</strong>
                            </div>
                        @endif
                    </div>

                    <div class="form-group">
                        <label>Phone Number</label>
                        <input type="number" name="phone" class="form-control" placeholder="E.g; 90 000 000 000"
                               required="">
                         @if ($errors->has('phone'))
                            <div class="alert alert-info">
                                <strong>{{ $errors->first('phone') }}</strong>
                            </div>
                        @endif
                    </div>


                    <div class="form-group">
                        <label>Your Office Title (eg CEO)</label>
                        <input type="text" class="form-control" name="office_title" placeholder="Your Office Title (eg CEO)" required="">

                    </div>


                    <div class="form-group">
                        <div class="row">
                        <div class="col-sm-6 ">
                            <label>State</label>
                            <select name="state" id="state" class="form-control">
                                @foreach ($states as $row)
                                    <option  value="{{ $row->id }}">{{ $row->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-sm-6">
                            <label>State Areas</label>
                            <select name="state_area" class="form-control">
                            </select>

                        </div>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" name="password" placeholder="Enter Password" class="form-control" required="true">
                                @if ($errors->has('password'))
                                    <div class="alert alert-info">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </div>
                                @endif
                            </div>
                        </div>

                        <div class="col-lg-6 form-margin">
                            <div class="form-group">
                                <label>Confirm Password</label>
                                <input type="password" name="password_confirmation" placeholder="Retype Password" required="true" class="form-control">
                                @if ($errors->has('password_confirmation'))
                                    <div class="alert alert-info">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </div>
                                @endif
                            </div>
                        </div>

                    <br>
                        <div onload="disableSubmit()">
                            <input type="checkbox" name="terms" id="terms" onchange="activateButton(this)" required="true" style="width: 30px !important;">  I have read and agree to the <a href="{{route('index.terms')}}" target="_blank" style="color:#800080 ">terms &amp;
                                conditions</a>
                            <br><br>
                        </div>


                    <div class="job-details-btn-box">
                        <button type="submit" class="default-btn">Request <i class="flaticon-list-1"></i></button>
                    </div>

                        <div>
                            <br />
                            <a href="{{route('login')}}" style="color: orange;">Already Registered ? Log In Now </a>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div> --}}
    <!-- End About Area -->

