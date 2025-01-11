@extends('shared.layout.employer')
@section('content')

    <!-- Breadcrumb Area -->
    {{-- <div class="breadcrumb-area">
        <h1>Profile</h1>
        <ol class="breadcrumb">
            <li class="item"><a href="{{'/'}}">Home</a></li>
            <li class="item"><a href="#">Dashboard</a></li>
            <li class="item">Profile</li>
        </ol>
    </div>
    <!-- End Breadcrumb Area -->

    <div class="my-profile-box">
        <h3>Profile Details</h3>

        @if(session('response'))
            <div class="notification-alert alert alert-success alert-dismissible fade show" role="alert">
                {{session('response')}}
                <button type="button" class="btn btn-primary" data-bs-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
        @endif

        <form method="post" action="{{ route('user.basic.profile.update.save')}}"  enctype="multipart/form-data" style="color:#000000;">
            {{ csrf_field() }}
            <div class="row align-items-center">

                <div class="col-xl-6 col-lg-12 col-md-12">
                    <div class="form-group">
                        <label>Your Office Title (eg CEO)</label>
                        <input type="text" class="form-control" placeholder="Your Office Title (eg CEO)" value="{{Auth::user()->business_name}}" name="business_name">
                    </div>
                </div>

                <div class="col-xl-6 col-lg-12 col-md-12">
                    <div class="form-group">
                        <label>Email address</label>
                        <input type="email" class="form-control" placeholder="Email address"  value="{{Auth::user()->email}}" disabled>
                    </div>
                </div>

                <div class="col-xl-6 col-lg-12 col-md-12">
                    <div class="form-group">
                        <label>Phone</label>
                        <input type="text" class="form-control"   value="{{Auth::user()->phone}}" name="phone">
                    </div>
                </div>

                <div class="col-xl-6 col-lg-12 col-md-12">
                    <div class="form-group">
                        <label>Date Of Birth</label>
                        <input type="date" class="form-control"   value="{{Auth::user()->date_of_birth}}" name="date_of_birth">
                    </div>
                </div>

                <div class="col-xl-12 col-lg-12 col-md-12">
                    <div class="form-group">
                        <label>Website</label>
                        <input type="text" class="form-control" placeholder="Website"  value="{{Auth::user()->website_address}}" name="website_address">
                    </div>
                </div>


                <div class="col-lg-12 col-md-12">
                    <div class="form-group">
                        <label>About Company</label>
                        <textarea cols="30" rows="6" placeholder="Short description about company..." class="form-control" name="service_description">
                            {{Auth::user()->service_description}}

                        </textarea>
                    </div>
                </div>


                <div class="col-xl-6 col-lg-12 col-md-12">
                    <div class="form-group">
                        <label>State</label>
                        <select name="state" id="state" class="form-control">
                            <option  value="{{Auth::user()->state}}">{{Auth::user()->state}}</option>
                            @foreach ($states as $row)
                                <option  value="{{ $row->id }}">{{ $row->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>


                <div class="col-xl-6 col-lg-12 col-md-12">
                    <div class="form-group">
                        <label>State Areas</label>
                        <select name="state_area" class="form-control">
                            <option  value="{{Auth::user()->city}}">{{Auth::user()->city}}</option>
                        </select>

                    </div>
                </div>


                <div class="col-lg-12 col-md-12">
                    <div class="form-group">
                        <label>Address</label>
                        <input type="text" class="form-control"   value="{{Auth::user()->street_address}}" name="street_address">
                    </div>
                </div>


                <div class="col-lg-12 col-md-12">
                    <button type="submit" class="default-btn">Submit Now <i class="flaticon-send"></i></button>
                </div>
            </div>
        </form>
    </div> --}}

    <div class="col-lg-9">


        @if ($errors->any())
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Validation Error',
                html: '{!! implode("<br>", $errors->all()) !!}',
            });
        </script>
        @endif
        
        @if (session('success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Success',
                text: '{{ session('success') }}',
            });
        </script>
        @endif

    <div class="tab-content">

        <!-- Personal info tab -->
        <div class="tab-pane fade show active" id="personal-info" role="tabpanel" aria-labelledby="personal-info-tab">
          <div class="vstack gap-4">

            <!-- Profile completeness info card -->
            <div class="card bg-warning-subtle border-0 mb-2">
              <div class="card-body d-flex align-items-center">
                <div class="circular-progress text-warning flex-shrink-0 ms-n2 ms-sm-0" role="progressbar" style="--fn-progress: {{ \App\Helpers\CommonHelpers::getProfileCompleteness() }}" aria-label="Warning progress" aria-valuenow="{{ \App\Helpers\CommonHelpers::getProfileCompleteness() }}" aria-valuemin="0" aria-valuemax="100">
                  <svg class="progress-circle">
                    <circle class="progress-background d-none-dark" r="0" style="stroke: #fff"></circle>
                    <circle class="progress-background d-none d-block-dark" r="0" style="stroke: rgba(255,255,255, .1)"></circle>
                    <circle class="progress-bar" r="0"></circle>
                  </svg>
                  <h5 class="position-absolute top-50 start-50 translate-middle text-center mb-0">{{ \App\Helpers\CommonHelpers::getProfileCompleteness() }}%</h5>
                </div>
                <div class="ps-3 ps-sm-4">
                  <h3 class="h6 bold pb-1 mb-2">{{ Auth::user()->full_name }} <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24">
                      <path fill="#00aa3f"
                            d="m8.6 22.5l-1.9-3.2l-3.6-.8l.35-3.7L1 12l2.45-2.8l-.35-3.7l3.6-.8l1.9-3.2L12 2.95l3.4-1.45l1.9 3.2l3.6.8l-.35 3.7L23 12l-2.45 2.8l.35 3.7l-3.6.8l-1.9 3.2l-3.4-1.45zm2.35-6.95L16.6 9.9l-1.4-1.45l-4.25 4.25l-2.15-2.1L7.4 12z" />
                  </svg> <span class="badge bg-success ms-2">Verified</span>  <span class="badge bg-success">{{ Auth::user()->availability }}</span></h3>
                  <ul class="list-unstyled flex-row flex-wrap fs-sm mb-0">
                    <li class="d-flex me-3"> <small class="h6 bold">Location:</small>
                        <i class="fa-map-pin fs-base me-2 " style="margin-top: .1875rem"></i>
                        <small class="h6 bold">
                            @if (Auth::user()->country_id)
                                {{ Auth::user()->country->name }}
                            @endif

                            @if (Auth::user()->country_id && Auth::user()->state_id)
                                ,
                            @endif

                            @if (Auth::user()->state_id)
                                {{ Auth::user()->state->name }}
                            @endif

                            @if (Auth::user()->stateName && Auth::user()->cityName)
                                ,
                            @endif

                            @if (Auth::user()->cityName)
                                {{ Auth::user()->cityName->name }}
                            @endif
                        </small>
                    </li>

                   
                  </ul>
                  <div class="d-flex me-3"> <small class="h6 bold">Company:</small>
                    <i class="fa-map fs-base me-2 " style="margin-top: .1875rem"></i>
                    <span class="h6 bold"> {{ Auth::user()->business_name  }}</span>
                </div>
                </div>
              </div>
            </div>

            <!-- Profile picture (Avatar) -->
            <div class="d-flex align-items-start align-items-sm-center mb-2">
              <div class="ratio ratio-1x1 hover-effect-opacity bg-body-tertiary border rounded-circle overflow-hidden" style="width: 124px">
                  @if (!empty(Auth::user()->profile_image))
                <img src="{{ asset(Auth::user()->profile_image) }}" alt="Avatar">
                @else
                <img src="{{ asset('avata2.png') }}"  alt="" srcset="{{ asset('avata2.png') }}">
           @endif

                <div class="hover-effect-target position-absolute top-0 start-0 d-flex align-items-center justify-content-center w-100 h-100 opacity-0">
                  <button type="button" class="btn btn-icon btn-sm btn-light position-relative z-2 ms-2" aria-label="Remove">
                    <i class="fi-trash fs-base"></i>
                  </button>
                  <button type="button" class="btn btn-icon btn-sm btn-light position-relative z-2 ms-2" aria-label="Update"data-bs-toggle="modal" data-bs-target="#addimage">
                      <i class="fi-edit fs-base"></i>
                    </button>
                  <span class="position-absolute top-0 start-0 w-100 h-100 bg-black bg-opacity-25 z-1"></span>
                </div>
              </div>
              <div class="ps-3 ps-sm-4">
                <p class="fs-sm" style="max-width: 440px">Your profile photo will appear on your profile and directory listing. PNG or JPG no bigger than 1000px wide and tall.</p>
                <button type="button" class="btn btn-sm btn-outline-secondary" aria-label="Update"data-bs-toggle="modal" data-bs-target="#addimage">
                  <i class="fi-refresh-ccw fs-sm ms-n1 me-2"></i>
                  Update photo
                </button>
              </div>
            </div>

            <!-- Settings form -->
            <form method="POST" action="{{ route('employer.profile.update')}}" enctype="multipart/form-data">
            {{ csrf_field() }}


              <div class="row row-cols-1 row-cols-sm-2 g-4 mb-4">
                <div class="col position-relative">
                                <label for="fn" class="form-label fs-base">Availability Status</label>
                                <select class="form-select form-select-lg" aria-label="Languages select">
                                    @if (!empty(Auth::user()->availability))
                                        <option value="{{ Auth::user()->availability }}">{{ Auth::user()->availability }}
                                        </option>
                                    @else
                                        <option>Select Availability</option>
                                    @endif
                                    <option value="Actively Searching">Actively Hiring</option>
                                    <option value="Passively Searching">Passively Hiring</option>
                                    <option value="Hired">Talent Hunt</option>
                                    <option value="Inactive">Inactive</option>
                                </select>
                            </div>

                <div class="col position-relative">
                  <label for="ln" class="form-label fs-base">Full Name</label>
                  <input type="text" class="form-control form-control-lg" id="ln" value="{{ Auth::user()->full_name }}" required="" placeholder="" name="full_name" value="{{ Auth::user()->full_name }}">
                </div>

                <div class="col position-relative">
                  <label for="ln" class="form-label fs-base">Company name</label>
                  <input type="text" class="form-control form-control-lg" id="ln" value="{{ Auth::user()->business_name }}" required="" name="business_name" >
                </div>

                <div class="col position-relative">
                  <label for="email" class="form-label d-flex align-items-center fs-base">Email address * <span class="badge text-danger bg-danger-subtle ms-2">Verify email</span></label>
                  <input type="email" name="email" class="form-control form-control-lg" id="email" value="{{ Auth::user()->email }}" disabled>
                  <div class="invalid-tooltip bg-transparent p-0">Enter a valid email address!</div>

                </div>
                <div class="col position-relative">
                  <label for="phone" class="form-label d-flex align-items-center fs-base">Phone number</label>
                  <input type="tel" class="form-control form-control-lg" name="phone" id="phone" data-input-format="{&quot;numericOnly&quot;: true, &quot;delimiters&quot;: [&quot;(&quot;, &quot;)&quot;, &quot; &quot;, &quot;-&quot;, &quot; &quot;], &quot;blocks&quot;: [0, 4, 0, 4, 4]}" value="{{ Auth::user()->phone }}" placeholder="(___) ___-____" required="">
                  <div class="invalid-tooltip bg-transparent p-0">Enter a valid phone number!</div>
                </div>

                <div class="col">
                  <label for="date-2" class="form-label">Date of Birth <span class="text-body-secondary fs-xs fw-normal">(F j, Y format)</span></label>
                  <div class="position-relative mb-3" >
                    <input type="date" class="form-control form-control-lg form-icon-end" id="date-2" data-datepicker="{&quot;dateFormat&quot;: &quot;F j, Y&quot;}" placeholder="Choose date" value="{{ Auth::user()->date_of_birth }}"
                    name="date_of_birth">
                    <i class="fi-calendar position-absolute top-50 end-0 translate-middle-y me-3"></i>
                  </div>
                </div>

                <div class="col">
                  <label for="address" class="form-label fs-base">Your Gender</label>
                <select class="form-select form-select-lg" aria-label="Languages select" name="gender" required>
                  @if (!empty(Auth::user()->gender))
                  <option value="{{ Auth::user()->gender }}">{{ Auth::user()->gender }}
                  </option>
                  @else

                          @endif
                          <option value="male">Male</option>
                          <option value="female">Female</option>
                          <option value="others">Other</option>
                </select>
              </div>

                <div class="col">
                <div class="position-relative mb-4">
                  <label for="address" class="form-label fs-base">Company"s Website link</label>
                  <input type="text" class="form-control form-control-lg" value="{{ Auth::user()->website_address }}" name="website_address" placeholder="eg : https://website.com"> 
                
                  @error('website_address')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
                </div>
              </div>

             <div class="col">
                <div class="position-relative mb-4">
                <label for="company_logo">Company Logo</label>
                <input type="file" name="company_logo" class="form-control form-control-lg" onchange="previewCompanyLogo(this)" id="company_logo" >
                @if(Auth::user()->company_logo)
                <img id="company_logo_preview" src="{{ asset(Auth::user()->company_logo) }}" alt="Company Logo" width="50"  class="mt-3 border-dark">
            @else
                <img id="company_logo_preview" src="{{ asset('default-logo.png') }}" alt="Default Logo" width="150" class="mt-3">
            @endif
            @error('company_logo')
                <span class="text-danger">{{ $message }}</span>
            @enderror
            </div>
             </div>
              </div>



               <div class="row row-cols-1 row-cols-sm-2 g-4 mb-4">

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
                    <option value="{{ Auth::user()->city_id }}" selected>{{ Auth::user()->city_id }}</option>
                @endif --}}
                    </select>
                  </div>



              </div>

              <div class="position-relative mb-4">
                <label for="address" class="form-label fs-base">Address *</label>
                <textarea type="text" class="form-control form-control-lg" id="street_address"  name="street_address" value="New York, Brooklyn" required="">{{ trim(Auth::user()->street_address) }}</textarea>
                <div class="invalid-tooltip bg-transparent p-0">Enter your address!</div>
              </div>

                </div>








                <div class="d-flex flex-column align-items-sm-start">
                    <button type="submit" class="btn btn-lg btn-outline-dark" >
                      <i class="fi-study fs-lg ms-n2 me-2"></i>
                     Update Profile
                    </button>
                  </div>
            </form>
          </div>
        </div>

      </div>




      <div class="modal fade" id="addimage" data-bs-backdrop="static" tabindex="-1" role="dialog"> 
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-body tab-content">
              <div class="tab-pane fade show active" id="add-card" role="tabpanel" aria-labelledby="add-card-tab">
                <form method="post" action="{{ route('employer.profile.update')}}" enctype="multipart/form-data" style="color:#000000;">
                    {{ csrf_field() }}
                    <input type="hidden" name="update_profile_image" value="1">

                  <div class="mb-4">
                    <label for="card-number" class="form-label">Upload Image </label>
                    <div class="position-relative" data-input-format="{&quot;creditCard&quot;: true}">
                      <input type="file" name="profile_image" class="form-control form-control-lg form-icon-end bg-image-none" id="profile_image" >
                      <span class="position-absolute d-flex top-50 end-0 translate-middle-y fs-5 text-body-tertiary me-3" data-card-icon=""></span>
                      <div class="invalid-tooltip bg-transparent p-0">Please provide a valid card number!</div>
                    </div>
                  </div>

                  
                    <button type="submit" class="btn btn-primary w-100">Update Profile Image </button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>



      <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>

    function previewCompanyLogo(input) {
        const preview = document.getElementById('company_logo_preview');
        if (input.files && input.files[0]) {
            const reader = new FileReader();
            reader.onload = function (e) {
                preview.src = e.target.result;
            }
            reader.readAsDataURL(input.files[0]);
        }
    }


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









    document.getElementById('country').addEventListener('change', function () {
        const countryId = this.value;
        const stateSelect = document.getElementById('state');
        const citySelect = document.getElementById('city');

        // Clear state and city dropdowns
        stateSelect.innerHTML = '<option value="">Select State</option>';
        citySelect.innerHTML = '<option value="">Select City</option>';

        if (countryId) {
            fetch(`/countries/${countryId}/states`)
                .then(response => response.json())
                .then(data => {
                    for (const [id, name] of Object.entries(data)) {
                        const option = document.createElement('option');
                        option.value = id;
                        option.textContent = name;
                        stateSelect.appendChild(option);
                    }
                })
                .catch(error => console.error('Error fetching states:', error));
        }
    });

    document.getElementById('state').addEventListener('change', function () {
        const stateId = this.value;
        const citySelect = document.getElementById('city');

        // Clear city dropdown
        citySelect.innerHTML = '<option value="">Select City</option>';

        if (stateId) {
            fetch(`/states/${stateId}/cities`)
                .then(response => response.json())
                .then(data => {
                    for (const [id, name] of Object.entries(data)) {
                        const option = document.createElement('option');
                        option.value = id;
                        option.textContent = name;
                        citySelect.appendChild(option);
                    }
                })
                .catch(error => console.error('Error fetching cities:', error));
        }
    });
    </script>

@endsection
