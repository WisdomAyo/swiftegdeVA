{{-- @extends('shared.layouts.onboarding')
@section('content')
<style>
    .center-screen {
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 100vh;
        background-color: #fff;
    }

    .post-a-new-job-box {
        width: 100%;
        max-width: auto;
        padding: 20px;
        background-color: white;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        border-radius: 8px;
    }

    .avatar-preview {
        display: flex;
        flex-direction: column;
        align-items: center;
        margin-bottom: 15px;
    }

    .avatar-preview img {
        max-width: 150px;
        max-height: 150px;
        border-radius: 50%;
        margin-bottom: 10px;
        object-fit: cover;
    }
</style>
<div class="center-screen">
    <div class="post-a-new-job-box">
        @include('onboarding.includes.stages')
        <div class="row justify-content-center">
            <a href="{{url('/')}}" class="navbar-brand d-flex align-items-center justify-content-center mb-3">
                <img src="{{asset('logo.png')}}" alt="image" width="200px">
            </a>
            <h6 class="text-center mb-3">Profile Setup</h6>
            <div class="col-md-12">
                <ul id="progressbar" class="text-center">
                    <li class="" style="width:16.67%; font-size:12px">{{__('Upload Picture')}}</li>
                    <li class="" style="width:16.67%; font-size:12px">{{__('About Me')}}</li>
                    <li class="active" style="width:16.67%; font-size:12px">{{__('Location')}}</li>
                    <li class="" style="width:16.67%; font-size:12px">{{__('Category')}}</li>
                    <li class="" style="width:16.67%; font-size:12px">{{__('Charge')}}</li>
                    <li class="" style="width:16.67%; font-size:12px">{{__('Skills')}}</li>
                </ul>
            </div>
        </div>
        @if(session('response'))
        <div class="notification-alert alert alert-success alert-dismissible fade show" role="alert">
            {{session('response')}}
            <button type="button" class="btn btn-primary" data-bs-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
        </div>
        @endif

        <form  action="{{ route('onboarding.update') }}" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}

            <div class="row">
                <!-- Country Selection -->
                <div class="col-xl-6 col-lg-12 col-md-12">
                    <div class="form-group">
                        <label>Country</label>
                        <select name="country" id="country" class="form-control" required>
                            <!-- Display user's country name if available -->
                            <option value="{{ Auth::user()->country ?? '' }}">{{ ucfirst(strtolower(Auth::user()->countryName->name ?? '')) }}</option>
                            <!-- Loop through all countries -->
                            @foreach (\App\Models\Country::all() as $row)
                                <option value="{{ $row->id }}">{{ ucfirst(strtolower($row->name)) }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <!-- State Selection -->
                <div class="col-xl-6 col-lg-12 col-md-12">
                    <div class="form-group">
                        <label>State</label>
                        <select name="state" id="state" class="form-control">
                            <!-- States will be populated via JS or backend -->
                        </select>
                    </div>
                </div>

                <!-- City Selection -->
                <div class="col-xl-6 col-lg-12 col-md-12">
                    <div class="form-group">
                        <label>State Areas</label>
                        <select name="city" class="form-control">
                            <!-- Cities will be populated via JS or backend -->
                        </select>
                    </div>
                </div>

                 <!-- City Selection -->
                 <div class="col-xl-6 col-lg-12 col-md-12">
                    <div class="form-group">
                        <label>Street Address</label>
                        <input type="text" name="street_address" id="" class="form-control">
                    </div>
                </div>

                <!-- Navigation Buttons -->
                <div class="col-lg-12 col-md-12 d-flex justify-content-between">
                    <!-- Previous Button -->
                    <a href="{{ route('onboarding.about') }}" class="default-btn">Previous</a>
                    <!-- Save Button -->
                    <button type="submit" class="default-btn">Save and Continue <i class="flaticon-send"></i></button>
                </div>
            </div>
        </form>


    </div>
</div>
<script src="{{asset('assets/js/jquery.min.js')}}"></script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
<script>

    $(function() {
        $('select[name=country]').change(function() {
            const option = document.getElementById("country").value;
            const url = '{{ url('country') }}' +'/'+ option + '/states';

            $.ajax({
                url: url,
                type: "GET",
                dataType: "json",
                success:function(data) {
                    $('select[name="state"]').empty();
                    $.each(data, function(key, value) {
                        $('select[name="state"]').append('<option value="'+ value.id +'">'+ value.name +'</option>');
                    });
                }
            });
        });

        $('select[name=state]').change(function() {
            const option = document.getElementById("state").value;
            const url = '{{ url('state') }}' +'/'+ option + '/areas';

            $.ajax({
                url: url,
                type: "GET",
                dataType: "json",
                success:function(data) {
                    $('select[name="city"]').empty();
                    $.each(data, function(key, value) {
                        //console.log('<option value="'+ value.id +'">'+ value.name +'</option>')
                        $('select[name="city"]').append('<option value="'+ value.id +'">'+ value.name +'</option>');
                    });
                }
            });
        });

    });
</script>

@endsection --}}




<main class="content-wrapper">
    <div class="container pt-3 pt-sm-4 pt-md-5 pb-5">
      <div class="row pt-lg-2 pt-xl-3 pb-1 pb-sm-2 pb-md-3 pb-lg-4 pb-xl-5">

        <!-- Sidebar navigation -->
        <aside class="col-lg-3 col-xl-4 mb-3" style="margin-top: -100px">
          <div class="sticky-top overflow-y-auto" style="padding-top: 100px">
            <ul class="nav flex-lg-column flex-nowrap gap-4 gap-lg-0 text-nowrap pb-2 pb-lg-0">
              <li class="nat-item">
                <a class="nav-link d-inline-flex px-0 px-lg-3  disabled" >
                  <i class="fi-circle fs-lg me-2 "></i>
                  <i class="fi-arrow-down-circle d-lg-none fs-lg me-2"></i>
                  {{__('Upload Picture')}}
                </a>
              </li>
              <li class="nat-item">
                <a class="nav-link d-inline-flex px-0 px-lg-3 disabled" >
                  <i class="fi-circle fs-lg me-2 "></i>
                  {{__('About Me')}}
                </a>
              </li>
              <li class="nat-item">
                <a class="nav-link d-inline-flex px-0 px-lg-3 pe-none " aria-current="page">
                  <i class="fi-arrow-right-circle d-none d-lg-inline-flex fs-lg me-2"></i>
                  {{__('Location')}}
                </a>
              </li>
              <li class="nat-item">
                <a class="nav-link d-inline-flex px-0 px-lg-3 disabled">
                  <i class="fi-circle fs-lg me-2"></i>
                  {{__('Category')}}
                </a>
              </li>
              <li class="nat-item">
                <a class="nav-link d-inline-flex px-0 px-lg-3 disabled">
                  <i class="fi-circle fs-lg me-2"></i>
                  {{__('Charge')}}
                </a>
              </li>
              <li class="nat-item">
                <a class="nav-link d-inline-flex px-0 px-lg-3 disabled">
                  <i class="fi-circle fs-lg me-2"></i>
                  {{__('Skills')}}
                </a>
              </li>
              <li class="nat-item">
                <a class="nav-link d-inline-flex px-0 px-lg-3 disabled">
                  <i class="fi-circle fs-lg me-2"></i>
                  {{__('Socials')}}
                </a>
              </li>
            </ul>
          </div>
        </aside>


        <!-- Property type inputs -->
        <div class="col-lg-9 col-xl-8">

            @if(session('response'))
            <div class="notification-alert alert alert-success alert-dismissible fade show" role="alert">
                {{session('response')}}
                <button type="button" class="btn btn-primary" data-bs-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            @endif


            <h1 class="h2 pb-1 pb-lg-2">Location</h1>
            <form id="onboarding-form" action="{{ route('onboarding.update') }}"  method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}

            <div class="row row-cols-1 row-cols-sm-2 g-3 g-sm-4 pb-3 pb-sm-4 mb-xl-2">
              <div class="col">

                <label class="form-label">Country *</label>
                <select class="form-select form-select-lg" data-select="{
                  &quot;classNames&quot;: {
                    &quot;containerInner&quot;: [&quot;form-select&quot;, &quot;form-select-lg&quot;]
                  },
                  &quot;searchEnabled&quot;: true
                }" aria-label="Country select" required="" name="country_id" id="country">
                <option value="">Select your Country</option>
                  <option value="{{ Auth::user()->country ?? '' }}">{{ ucfirst(strtolower(Auth::user()->countryName->name ?? '')) }}</option>
                  @foreach (\App\Models\Country::all() as $row)
                  <option value="{{ $row->id }}">{{ ucfirst(strtolower($row->name)) }}</option>
              @endforeach
                </select>
              </div>
{{--

              <div class="col">
                <label class="form-label">State *</label>
                <select class="form-select form-select-lg" data-select="{
                  &quot;classNames&quot;: {
                    &quot;containerInner&quot;: [&quot;form-select&quot;, &quot;form-select-lg&quot;]
                  },
                  &quot;searchEnabled&quot;: true
                }" aria-label="State select" required="" name="state" id="state" >
                <option value="">Select your State</option>
                </select>
              </div> --}}


              <div class="col">
                <label for="state" class="form-label">State *</label>
                <select name="state_id" id="state" class="form-select form-select-lg"
                required>
                    <option value="">Select State</option>
                </select>
            </div>
            </div>
            <div class="row row-cols-1 row-cols-sm-2 g-3 g-sm-4 pb-3 pb-sm-4 mb-xl-2">
              <div class="col">
                <label class="form-label">City *</label>
                <select class="form-select form-select-lg" required="" id="city" name="city_id" >
                <option value="">Select your City</option>
                </select>
              </div>
            </div>
            <div class="pb-4 mb-2">
              <label for="address" class="form-label">Street address *</label>
              <input type="text" name="street_address" class="form-control form-control-lg" id="address" value="{{ $street_address ?? '' }}" placeholder="Enter Street address" required="">
            </div>

            <input type="hidden" name="step" value="location">
            <div class="mt-3">
                <button type="submit" class="btn btn-primary">Submit and Next<i class="fi-chevron-right fs-lg ms-1 me-n2"></i></button>
            </div>
        </form>

        </div>
      </div>
  </main>



<script src="{{asset('assets/js/jquery.min.js')}}"></script>


<script>

$(document).ready(function () {
    function reinitializeSelect(selector) {
        const element = document.querySelector(selector);
        if (element) {
            // Reinitialize Choices.js (or other select library)
            if (typeof Choices !== 'undefined') {
                new Choices(element, {
                    searchEnabled: true,
                    classNames: {
                        containerInner: 'form-select form-select-lg',
                    },
                });
            }
        }
    }



    // Fetch states when country is selected
    $('select[name=country_id]').change(function () {
        const countryId = $(this).val();
        const url = `/onboarding/country/${countryId}/states`;

        if (countryId) {
            $.ajax({
                url: url,
                type: "GET",
                dataType: "json",
                success: function (data) {
                    const stateSelect = $('select[name="state_id"]');
                    stateSelect.empty().append('<option value="">Select State</option>');
                    data.forEach(function (state) {
                        stateSelect.append(`<option value="${state.id}">${state.name}</option>`);
                    });

                    // Reinitialize the state dropdown
                    reinitializeSelect('#state');
                },
                error: function () {
                    Swal.fire('Error', 'Unable to fetch states. Please try again.', 'error');
                },
            });
        } else {
            $('select[name="state_id"]').empty().append('<option value="">Select State</option>');
            $('select[name="city_id"]').empty().append('<option value="">Select City</option>');
        }
    });

    // Fetch cities when a state is selected
    $('select[name=state_id]').change(function () {
        const stateId = $(this).val();
        const url = `/onboarding/state/${stateId}/cities`; 

        if (stateId) {
            $.ajax({
                url: url,
                type: "GET",
                dataType: "json",
                success: function (data) {
                    const citySelect = $('select[name="city_id"]');
                    citySelect.empty().append('<option value="">Select City</option>');
                    data.forEach(function (city) {
                        citySelect.append(`<option value="${city.id}">${city.name}</option>`);
                    });

                    // Reinitialize the city dropdown
                    reinitializeSelect('#city');
                },
                error: function () {
                    Swal.fire('Error', 'Unable to fetch cities. Please try again.', 'error');
                },
            });
        } else {
            $('select[name="city_id"]').empty().append('<option value="">Select City</option>');
        }
    });
});





document.addEventListener('DOMContentLoaded', function () {
    @if(session('success'))
        Swal.fire('Success', '{{ session('success') }}', 'success');
    @elseif($errors->any())
        Swal.fire('Error', '{{ $errors->first() }}', 'error');
    @endif
});

</script>




