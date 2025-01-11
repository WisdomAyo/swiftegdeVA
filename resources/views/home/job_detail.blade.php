@extends('home.layouts.content')
@section('content')

<section class="container pt-4 pb-5 mb-xxl-3">

    <!-- Breadcrumb -->
    <nav class="pb-2" aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
        <li class="breadcrumb-item"><a href="">{{ $job->industry ?? 'N/A' }}</a></li>
        <li class="breadcrumb-item active" aria-current="page">{{ $job->job_title }}</li>
      </ol>
    </nav>

    <!-- Title + Share button -->
    <div class="d-flex align-items-center justify-content-between gap-3 position-relative z-2 mb-3 mb-lg-4">
      <div class="d-flex align-items-center w-100 gap-3">
        <div class="ratio ratio-1x1 flex-shrink-0" style="max-width: 56px">
            @if($job->employer && $job->employer->company_logo)
            <img src="{{ asset($job->employer->company_logo) }}" class="rounded d-none-dark" alt="Image">
            @endif
        </div>
        <h1 class="mb-0">{{ $job->job_title }}</h1>
      </div>
      <div class="d-flex gap-2">
        <div class="dropdown" data-bs-toggle="tooltip" data-bs-custom-class="tooltip-sm" title="Share">
          <button type="button" class="btn btn-icon btn-ghost btn-secondary animate-scale rounded-circle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" aria-label="Share">
            <i class="fi-share-2 animate-target fs-base"></i>
          </button>
          <ul class="dropdown-menu dropdown-menu-end" style="--fn-dropdown-min-width: 9.5rem">
            <li>
              <a class="dropdown-item rounded-pill" href="#!">
                <i class="fi-facebook fs-base me-2"></i>
                Facebook
              </a>
            </li>
            <li>
              <a class="dropdown-item rounded-pill" href="#!">
                <i class="fi-instagram fs-base me-2"></i>
                Instagram
              </a>
            </li>
            <li>
              <a class="dropdown-item rounded-pill" href="#">
                <i class="fi-linkedin fs-base me-2"></i>
                LinkedIn
              </a>
            </li>
          </ul>
        </div>
        <button type="button" class="btn btn-icon btn-secondary animate-pulse rounded-circle" data-bs-toggle="tooltip" data-bs-custom-class="tooltip-sm" title="Wishlist" aria-label="Wishlist">
          <i class="fi-heart animate-target fs-base"></i>
        </button>
      </div>
    </div>

    <!-- Place meta -->
    <div class="d-flex flex-wrap align-items-center gap-2 ms-n2 pb-1 mb-3">
      <div class="d-flex align-items-center gap-1 fs-sm ms-2">
        <i class="fi-star-filled text-warning"></i>
        <span class="fw-bold text-secondary-emphasis">{{ $job->industry }}</span>
        <span class="fs-xs text-body-secondary align-self-end">(127)</span>
      </div>

      <span class="badge text-bg-success d-inline-flex align-items-center ms-2">
       {{$job->employer->availability}}
        <i class="fi-leaf ms-1"></i>
      </span>
      <span class="badge text-bg-info d-inline-flex align-items-center">
        Verified Hires
        <i class="fi-shield ms-1"></i>
      </span>
    </div>

    <!-- Place contacts -->
    <ul class="nav gap-2 mb-4">
      <li class="nav-item">
        <a class="nav-link position-relative text-body fw-normal p-0" href="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2993.6497646883918!2d2.162960877113986!3d41.3816934713005!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x12a4a2f5699e318d%3A0xbcc7ea0e7c2eca52!2sCarrer%20de%20la%20Lluna%2C%2028%2C%20Ciutat%20Vella%2C%2008001%20Barcelona%2C%20Spain!5e0!3m2!1sen!2suk!4v1726777347955!5m2!1sen!2suk" data-glightbox="width: 100vw; height: 100vh" data-gallery="map1">
          <i class="fi-map-pin fs-base me-1"></i>
          <span class="hover-effect-underline stretched-link">{{ $job->state_id ?? 'Location Not Specified' }}, {{ $job->country_id ?? 'Location Not Specified' }}</span>
        </a>
      </li>
      <li class="d-flex align-items-center mx-1"><i class="fi-bullet"></i></li>
      <li class="nav-item">
        <a class="nav-link position-relative text-body fw-normal p-0" href="tel:+34931234567">
          <i class="fi-pin fs-base me-1"></i>
          <span class="hover-effect-underline stretched-link">{{ $job->employer->business_name ?? 'Unknown Employer' }}</span>
        </a>
      </li>
      <li class="d-flex align-items-center mx-1"><i class="fi-bullet"></i></li>
      <li class="nav-item">
        <a class="nav-link position-relative text-body fw-normal p-0" href="{{ $job->employer->website_address}}">
          <i class="fi-globe fs-base me-1"></i>
          <span class="hover-effect-underline stretched-link">Website</span>
        </a>
      </li>
      <li class="d-flex align-items-center mx-1"><i class="fi-bullet"></i></li>
      <li class="nav-item">
        <span class="nav-link position-relative text-body fw-normal pe-none p-0">
          <i class="fi-clock fs-base me-1"></i>
          <span><span class="fw-semibold">Posted</span> {{ $job->created_at->diffForHumans() }}</span>
        </span>
      </li>
    </ul>
  </section>

  <section class="container  pb-5 mb-xxl-3">


    <div class="row">

        <!-- Gallery (slider) + Description -->
        <div class="col-lg-8 pb-3 pb-sm-0 mb-4 mb-sm-5 mb-lg-0">


            <h2 class="h3  ">Job  Summary</h2>
            <p>This stunning convertible blends luxury with performance, featuring a sleek design, advanced technology, and a powerful engine. Enjoy open-air driving with premium comfort and the unmistakable elegance of Mercedes-Benz. Impeccably maintained and ready to provide an exhilarating driving experience. Don't miss out on this exceptional vehicle.</p>
            <div class="collapse" id="moreDescription">
              <p>This A205 Cabriolet comes equipped with top-of-the-line features, including a responsive infotainment system, advanced safety options, and a finely crafted interior that showcases Mercedes-Benz's commitment to quality. The soft-top roof operates seamlessly, allowing you to transition from a cozy cabin to an open-air cruiser in seconds. Whether you're navigating city streets or cruising along the coast, this cabriolet delivers a smooth, refined ride every time.</p>
              <p>With low mileage and a full service history, this 2021 model remains in excellent condition, both mechanically and aesthetically. The exterior shines in pristine condition, and the interior has been meticulously cared for, ensuring a like-new experience. This Mercedes-Benz A205 Cabriolet is the perfect choice for those who desire a blend of sophistication, comfort, and thrilling performance in their next vehicle.</p>
            </div>
            <div class="nav">
              <a class="nav-link position-relative px-0 collapsed" href="#moreDescription" data-bs-toggle="collapse" aria-expanded="false" aria-controls="moreDescription" aria-label="Show / hide services">
                <span class="hover-effect-underline stretched-link" data-label-collapsed="Show more" data-label-expanded="Show less"></span>
                <i class="collapse-toggle-icon fi-chevron-down fs-base mt-1 ms-1"></i>
              </a>
            </div>

            <div class="d-flex fs-sm text-body-secondary border-top pt-4 mt-4 mt-md-5">
              <div>Application Deadline: <span class="text-dark-emphasis">{{ $job->application_deadline}}</span></div>
              <hr class="vr my-1 mx-3">
              <div>Over <span class="text-dark-emphasis">{{ $job->applications_count }}</span>people already apply</div>
              <hr class="vr my-1 mx-3">
              <div>Views: <span class="text-dark-emphasis">{{ $job->views }}</span></div>

              {{-- @if($hasApplied)
                 <div class="alert alert-success">You have already applied for this job.</div>
             @endif    --}}


            </div>



          <h2 class="h3 pt-5 mt-sm-2 my-lg-4">Required Skills</h2>

          @foreach(explode(',', $job->skills) as $skill)
          <div class="d-flex   d-inline-flex flex-wrap gap-3">

              <button class="btn btn-outline-dark">{{ trim($skill) }}</button>
            </div>
            @endforeach


          <!-- Specifications -->
          <h2 class="h3 pt-5 mt-sm-2 my-lg-4">Required Specifications</h2>
          <div class="row row-cols-1 row-cols-sm-2 gy-2">
            <div class="col">
              <ul class="list-unstyled text-body-secondary mt-n1 mb-0">
                @foreach (explode(',', $job->special_requirements) as $requirements)
                <li class="mt-1">
                  <span class="fw-medium text-dark-emphasis me-1">{{ trim($requirements) }}</span>

                </li>
                @endforeach
              </ul>
            </div>
          </div>

          <!-- Specifications -->
          <h2 class="h3 pt-5 mt-sm-2 my-lg-4">Benefits</h2>
          <div class="row row-cols-1 row-cols-sm-2 gy-2">
            <div class="col">
              <ul class="text-body-secondary mt-n1 mb-0">
                @foreach (explode(',', $job->benefits) as $benefit)
                <li class="mt-1">
                  <span class="fw-medium text-dark-emphasis me-1">{{ trim($benefit) }}</span>

                </li>
                @endforeach
              </ul>
            </div>
          </div>










        </div>

        <!-- Sidebar with car detail and seller info -->
        <aside class="col-lg-4" style="margin-top: -110px">
          <div class="position-sticky top-0" style="padding-top: 110px">

            <!-- Listing meta visible on screens > 991px (lg breakpoint) -->
            <div class="d-none d-lg-block">
              <div class="d-flex gap-2 pb-1 mb-2">
                <span class="badge text-bg-info d-inline-flex align-items-center">
                  Verified
                  <i class="fi-shield ms-1"></i>
                </span>
                <span class="fw-bold ">Base Pay Range</span>
              </div>
              <div class="h2 pb-1 mb-2">{{ $job->basic_salary }} </div>
              <div class="d-flex flex-wrap justify-content-lg-between gap-2 fs-sm text-nowrap mb-4">
                @if($hasApplied)
                <div class="toast border-success fade show" >
                    <div class="d-flex">
                      <i class="fi-check-circle text-success fs-base mt-1 me-2"></i>
                      <div class="toast-body me-2">
                        You have already applied for this job
                      </div>

                    </div>
                  </div>
                  @endif
              </div>

            </div>

            <!-- Seller info card -->
            <div class="card bg-body-tertiary border-0 p-sm-2 p-lg-0 p-xl-2 mb-4">
              <div class="card-body">
                <div class="d-flex gap-2 pb-1 mb-2">

                    <span class="fw-bold ">Job Type</span>
                    <span class="badge fw-bold text-bg-info d-inline-flex align-items-center">
                        {{ $job->hire_type }}
                        <i class="fi-heart ms-1"></i>
                      </span>
                  </div>

                  <div class="d-flex gap-2 pb-1 mb-2">


                    <span class="badge fw-bold text-bg-info d-inline-flex align-items-center">
                        {{ $job->position}}
                        <i class="fi-heart ms-1"></i>
                      </span>
                  </div>


                  <div class="nav mb-3">
                  <a class="nav-link position-relative px-0" href="#!">
                    <span class="hover-effect-underline stretched-link">Other ads by this seller</span>
                    <i class="fi-chevron-right fs-base ms-1"></i>
                  </a>
                </div>
                <div class="d-flex flex-wrap gap-3">
                    <a href="{{ route('job.apply.form', $job->url) }}"
                        id="applyJobBtn"
                        class="btn btn-outline-dark"
                        data-logged-in="{{ Auth::check() ? 'true' : 'false' }}"
                        data-login-url="{{ route('login') }}"
                        data-applied="{{ $hasApplied ? 'true' : 'false' }}">
                        Apply for the Job
                     </a>
                </div>
              </div>
            </div>

            <!-- Subscribe -->
            <div class="card p-sm-2 p-lg-0 p-xl-2">
              <div class="card-body">
                <h4 class="h6">Email me price drops and new listings for these search results:</h4>
                <form class="needs-validation d-flex flex-column flex-sm-row flex-lg-column flex-xl-row gap-2 gap-sm-3 gap-lg-2 gap-xl-3 mb-3" novalidate="">
                  <div class="position-relative">
                    <i class="fi-mail position-absolute top-50 start-0 translate-middle-y ms-3"></i>
                    <input type="email" class="form-control form-icon-start" placeholder="Your email" required="">
                  </div>
                  <button type="submit" class="btn btn-secondary">Subscribe</button>
                </form>
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" id="concent">
                  <label class="form-check-label fs-xs" for="concent">I agree to receive price drop alerts on this vehicle and helpful shopping information.</label>
                </div>
              </div>
            </div>
          </div>
        </aside>
      </div>
  </section>
</main>



@endsection
