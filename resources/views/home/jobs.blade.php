@extends('home.layouts.content')
@section('content')


<div class="container pt-4 pb-5 mb-xxl-3">
<nav class="pb-2" aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="home-doctors.html">Home</a></li>
      <li class="breadcrumb-item active" aria-current="page">Jobs</li>
    </ol>
  </nav>

  <!-- Page title -->
  <h1 class="h2">Jobs you might like</h1>
  <p class="fs-xs text-body-secondary align-self-end mb-4">Browse jobs that match your experience to a client's hiring preferences. Ordered by most relevant.</p>
  <!-- Filters -->
  {{-- <form action="{{ route('user.job') }}" method="GET" class="row align-items-center g-3 gx-xl-4 mb-3 mb-sm-4"> --}}

  <div class="row align-items-center g-3 gx-xl-4 mb-3 mb-sm-4">
    <div class="col-md-5 col-lg-3">
      <div class="position-relative">
        <i class="fi-search position-absolute top-50 start-0 translate-middle-y ms-3"></i>
        <input type="search" id="keyword" class="form-control form-icon-start bg-transparent" placeholder="Search job">
      </div>
    </div>
    <div class="col-sm-7 col-md-4 col-lg-3 col-xl-2">
      <div class="position-relative">
        <i class="fi-map-pin position-absolute top-50 start-0 translate-middle-y z-1 ms-3"></i>
        <select class="form-select form-icon-start bg-transparent" data-select="{
          &quot;classNames&quot;: {
            &quot;containerInner&quot;: [&quot;form-select&quot;, &quot;form-icon-start&quot;, &quot;bg-transparent&quot;]
          },
          &quot;searchEnabled&quot;: true
        }" aria-label="Job location select" id="location" >
          <option value="">Any location</option>
          @foreach ($locations as $location)
                    <option value="{{ $location }}" {{ request('location') === $location ? 'selected' : '' }}>
                        {{ $location }}
                    </option>
                @endforeach
        </select>
      </div>
    </div>
    <div class="col-sm-5 col-md-4 col-lg-3">
      <div class="position-relative">
        <i class="fi-navigation position-absolute top-50 start-0 translate-middle-y z-1 ms-3"></i>
        <select class="form-select form-icon-start bg-transparent" data-select="{
          &quot;classNames&quot;: {
            &quot;containerInner&quot;: [&quot;form-select&quot;, &quot;form-icon-start&quot;, &quot;bg-transparent&quot;]
          }
        }" aria-label="Location radius select" id="business_category_name">
          <option value="">Select Job Category</option>
          @foreach ($categories as $category)
                    <option value="{{ $category }}" {{ request('business_category_name') === $category ? 'selected' : '' }}>
                        {{ $category }}
                    </option>
                @endforeach
        </select>
      </div>
    </div>
    <div class="col-lg-4 d-flex gap-4">
      <div class="form-check form-switch mb-0">
        <label class="form-check-label">
            <input type="radio" name="hire_type" value="Full-Time" class="form-check-input" {{ request('hire_type') === 'Full-Time' ? 'checked' : '' }}>
          Full Time
        </label>
      </div>
      <div class="form-check form-switch mb-0">
        <label class="form-check-label">
            <input type="radio" name="hire_type" value="Part-Time" class="form-check-input" {{ request('hire_type') === 'Part-Time' ? 'checked' : '' }}>
          Part-Time
        </label>
      </div>
    </div>
  </div>
  {{-- </form> --}}
  <!-- Sort selector + View switcher -->
  <div class="d-flex align-items-center gap-2 gap-sm-3 mb-3 mb-sm-4">
    <div class="fs-sm text-nowrap"><span class="d-none d-sm-inline">Showing </span>56 results</div>
    <div class="fs-sm fw-semibold text-dark-emphasis ms-auto d-none d-sm-inline">Sort by:</div>
    <div class="position-relative ms-auto ms-sm-0" style="width: 140px">
      <i class="fi-sort position-absolute top-50 start-0 translate-middle-y z-2"></i>
      <select class="form-select bg-transparent border-0 rounded-0 ps-4 pe-1" data-select="{
        &quot;removeItemButton&quot;: false,
        &quot;classNames&quot;: {
          &quot;containerInner&quot;: [&quot;form-select&quot;, &quot;bg-transparent&quot;, &quot;border-0&quot;, &quot;rounded-0&quot;, &quot;ps-4&quot;, &quot;pe-1&quot;]
        }
      }">
      <option value="Popular">Popular</option>
      <option value="Rating">Rating</option>
      <option value="Price asc">Price asc</option>
      <option value="Price desc">Price desc</option>
      </select>
    </div>
    <div class="nav ms-n2">
      <a class="nav-link fs-xl text-body-secondary py-0 px-2" href="listings-grid-doctors.html" aria-label="Grid view">
        <i class="fi-grid"></i>
      </a>
      <a class="nav-link fs-xl text-body-secondary py-0 px-2 active pe-none" href="listings-list-doctors.html" aria-label="List view">
        <i class="fi-list"></i>
      </a>
    </div>
  </div>


  <!-- Listings list view -->
  <div class="vstack gap-4" id="job-listings">

    <!-- Listing -->
    @include('home.util.job-list', ['jobs' => $jobs])
    
   
 
  </div>
</div>





<script>
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});


ddocument.addEventListener('DOMContentLoaded', function () {
    // Attach change events to filter inputs
    const filterInputs = ['#keyword', '#location', '#business_category_name', 'input[name="hire_type"]'];

    filterInputs.forEach(selector => {
        document.querySelectorAll(selector).forEach(element => {
            element.addEventListener('change', filterJobs);
            if (element.tagName === 'INPUT' && element.type === 'text') {
                element.addEventListener('keyup', filterJobs);
            }
        });
    });

    function filterJobs() {
        // Gather filter parameters
        const keyword = document.querySelector('#keyword')?.value || '';
        const location = document.querySelector('#location')?.value || '';
        const category = document.querySelector('#business_category_name')?.value || '';
        const hireType = document.querySelector('input[name="hire_type"]:checked')?.value || '';

        // Send AJAX request
        fetch(`{{ route('jobs.filter') }}?keyword=${keyword}&location=${location}&business_category_name=${category}&hire_type=${hireType}`, {
            method: 'GET',
            headers: {
                'X-Requested-With': 'XMLHttpRequest',
            },
        })
        .then(response => {
            if (!response.ok) {
                throw new Error('Failed to fetch filtered jobs.');
            }
            return response.json();
        })
        .then(data => {
            // Update the job listings container
            document.querySelector('#job-listings').innerHTML = data.html;
        })
        .catch(error => {
            console.error('Error:', error);
        });
    }
});
</script>
@endsection