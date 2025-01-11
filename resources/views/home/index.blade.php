@extends('home.layouts.content')
@section('content')
<main class="content-wrapper">
 <!-- Hero with search form and featured events slider -->
 <section class="position-relative overflow-hidden pt-5" style="margin-top: -76px">
    <div class="container position-relative pt-5 mt-sm-2">

      <!-- Search form -->
      <form method="GET" class="position-relative z-3 bg-body border rounded shadow p-2 mb-4"  action="{{ route('search.now')}}" id="filter-listing-form-VPDNx">
        {{ csrf_field() }}

        <div class="d-flex flex-column flex-md-row gap-2 p-1">
          <div class="d-flex flex-column flex-sm-row w-100 gap-2 gap-sm-3">
            <div class="position-relative w-100">
              <i class="fi-search position-absolute top-50 start-0 translate-middle-y fs-xl text-secondary-emphasis ms-2"></i>
              <select class="form-select form-select-lg form-icon-start border-0" name="job_category" data-select="{
                &quot;classNames&quot;: {
                  &quot;containerInner&quot;: [&quot;form-select&quot;, &quot;form-select-lg&quot;, &quot;form-icon-start&quot;, &quot;border-0&quot;]
                },
                &quot;searchEnabled&quot;: true
              }" aria-label="Location select" id="VPDNx_category">

                <option value="">Select Service</option>
                @foreach ($category as $row)
                <option value="{{ $row->id}}">{{ $row->title}}</option>
                @endforeach

              </select>
            </div>
            <hr class="d-sm-none m-0">
            <hr class="vr d-none d-sm-block my-2">
            <div class="position-relative w-100" style="max-width: 200px">
              <i class="fi-map-pin position-absolute top-50 start-0 translate-middle-y z-1 fs-xl text-secondary-emphasis ms-2"></i>
              <select class="form-select form-select-lg form-icon-start border-0" name="" data-select="{
                &quot;classNames&quot;: {
                  &quot;containerInner&quot;: [&quot;form-select&quot;, &quot;form-select-lg&quot;, &quot;form-icon-start&quot;, &quot;border-0&quot;]
                },
                &quot;searchEnabled&quot;: true
              }" aria-label="Location select" >

                <option value="">Select Location</option>
                <option value="New York">New York</option>
                    <option value="Los Angeles">Los Angeles</option>
                    <option value="Chicago">Chicago</option>
                    <option value="Houston">Houston</option>
                    <option value="Phoenix">Phoenix</option>
                    <option value="Philadelphia">Philadelphia</option>
                    <option value="San Antonio">San Antonio</option>
                    <option value="San Diego">San Diego</option>
                    <option value="Dallas">Dallas</option>
                    <option value="San Jose">San Jose</option>

              </select>
            </div>
          </div>
          <button type="submit" class="btn btn-lg btn-primary">Search</button>
        </div>
      </form>



      <!-- Featured events slider -->
      <div class="row position-relative z-2">
        <div class="col-md-4 d-flex flex-column">
          <div class="text-center text-md-start pt-3 pt-md-4 pt-lg-5 mt-xl-5 mb-4">
            <h1 class="display-5 mt-xxl-3 mb-xxl-4">Look No Further!</h1>
            <p class="mb-0">At Swift Edge, we offer a comprehensive range of virtual assistance solutions tailored to meet your unique needs.
            </p>
          </div>
          <div class="d-flex justify-content-center justify-content-md-start gap-3 mt-auto pb-lg-2 mb-4 mb-md-0 mb-lg-4">
            <button type="button" class="btn btn-icon btn-outline-secondary animate-slide-start bg-body rounded-circle" id="hero-prev" aria-label="Prev">
              <i class="fi-chevron-left fs-lg animate-target"></i>
            </button>
            <button type="button" class="btn btn-icon btn-outline-secondary animate-slide-end bg-body rounded-circle" id="hero-next" aria-label="Next">
              <i class="fi-chevron-right fs-lg animate-target"></i>
            </button>
          </div>
        </div>
        <div class="col-md-8">
          <div class="swiper" data-swiper="{
            &quot;effect&quot;: &quot;creative&quot;,
            &quot;loop&quot;: true,
            &quot;speed&quot;: 450,
            &quot;autoplay&quot;: {
              &quot;delay&quot;: 7000,
              &quot;disableOnInteraction&quot;: false
            },
            &quot;creativeEffect&quot;: {
              &quot;prev&quot;: {
                &quot;translate&quot;: [0, 0, -800],
                &quot;rotate&quot;: [180, 0, 0]
              },
              &quot;next&quot;: {
                &quot;translate&quot;: [0, 0, -800],
                &quot;rotate&quot;: [-180, 0, 0]
              }
            },
            &quot;navigation&quot;: {
              &quot;prevEl&quot;: &quot;#hero-prev&quot;,
              &quot;nextEl&quot;: &quot;#hero-next&quot;
            }
          }">
            <div class="swiper-wrapper">

              <!-- Event -->
              <div class="swiper-slide">
                <a class="ratio d-block bg-body-secondary rounded-4 overflow-hidden" href="single-entry-events.html" style="--fn-aspect-ratio: calc(463 / 856 * 100%)">
                  <img src="asset/img/home/events/hero-slider/1.jpg" alt="Image">
                </a>
                <div class="position-absolute shadow" style="bottom: 9%; left: 7%; width: 160px; height: 86px" data-bs-theme="light">
                  <div class="position-absolute vstack text-white z-2" style="top: 19px; left: 75px">
                    <div style="font-size: 10px; line-height: 10px">From</div>
                    <div class="fs-4 fw-semibold">$56</div>
                  </div>
                  <svg class="position-relative z-1" style="margin: 4px 0 0 8px" xmlns="http://www.w3.org/2000/svg" width="142" height="69"><path class="text-primary" d="M8 0h31.189c.666 2.588 3.015 4.5 5.811 4.5s5.145-1.912 5.811-4.5H134a8 8 0 0 1 8 8v53a8 8 0 0 1-8 8H50.659c-.824-2.33-3.046-4-5.659-4s-4.835 1.67-5.659 4H8a8 8 0 0 1-8-8V8a8 8 0 0 1 8-8z" fill="currentColor"></path><path d="M45 65V4.5c2.796 0 5.145-1.912 5.811-4.5H134a8 8 0 0 1 8 8v53a8 8 0 0 1-8 8H50.659c-.824-2.33-3.046-4-5.659-4z" fill="url(#A)"></path><path d="M45 4v61" stroke="#1d2735" stroke-width="1.5" stroke-dasharray="4 2"></path><path d="M23.5 25l.008 8.919a1 1 0 0 0 .499.865l7.72 4.466-7.728-4.453a1 1 0 0 0-.998 0l-7.728 4.453 7.72-4.466a1 1 0 0 0 .499-.865L23.5 25z" stroke="currentColor" stroke-width="2" style="color: var(--fn-primary-text-emphasis)"></path><defs><linearGradient id="A" x1="46" y1="35.5" x2="66.5" y2="35.5" gradientUnits="userSpaceOnUse"><stop stop-color="rgba(0,0,0,.15)"></stop><stop class="text-primary" offset="1" stop-color="currentColor" stop-opacity="0"></stop></linearGradient></defs></svg>
                  <img src="asset/img/home/events/hero-slider/ticket.png" class="position-absolute top-0 start-0 w-100 h-100 object-fit-cover" alt="Ticket">
                </div>
              </div>

              <!-- Event -->
              <div class="swiper-slide">
                <a class="ratio d-block bg-body-secondary rounded-4 overflow-hidden" href="single-entry-events.html" style="--fn-aspect-ratio: calc(463 / 856 * 100%)">
                  <img src="asset/img/home/events/hero-slider/02.jpg" alt="Image">
                </a>
                <div class="position-absolute shadow" style="bottom: 9%; left: 7%; width: 160px; height: 86px" data-bs-theme="light">
                  <div class="position-absolute vstack text-white z-2" style="top: 19px; left: 75px">
                    <div style="font-size: 10px; line-height: 10px">From</div>
                    <div class="fs-4 fw-semibold">$40</div>
                  </div>
                  <svg class="position-relative z-1" style="margin: 4px 0 0 8px" xmlns="http://www.w3.org/2000/svg" width="142" height="69"><path class="text-primary" d="M8 0h31.189c.666 2.588 3.015 4.5 5.811 4.5s5.145-1.912 5.811-4.5H134a8 8 0 0 1 8 8v53a8 8 0 0 1-8 8H50.659c-.824-2.33-3.046-4-5.659-4s-4.835 1.67-5.659 4H8a8 8 0 0 1-8-8V8a8 8 0 0 1 8-8z" fill="currentColor"></path><path d="M45 65V4.5c2.796 0 5.145-1.912 5.811-4.5H134a8 8 0 0 1 8 8v53a8 8 0 0 1-8 8H50.659c-.824-2.33-3.046-4-5.659-4z" fill="url(#A)"></path><path d="M45 4v61" stroke="#1d2735" stroke-width="1.5" stroke-dasharray="4 2"></path><path d="M23.5 25l.008 8.919a1 1 0 0 0 .499.865l7.72 4.466-7.728-4.453a1 1 0 0 0-.998 0l-7.728 4.453 7.72-4.466a1 1 0 0 0 .499-.865L23.5 25z" stroke="currentColor" stroke-width="2" style="color: var(--fn-primary-text-emphasis)"></path><defs><linearGradient id="A" x1="46" y1="35.5" x2="66.5" y2="35.5" gradientUnits="userSpaceOnUse"><stop stop-color="rgba(0,0,0,.15)"></stop><stop class="text-primary" offset="1" stop-color="currentColor" stop-opacity="0"></stop></linearGradient></defs></svg>
                  <img src="asset/img/home/events/hero-slider/ticket.png" class="position-absolute top-0 start-0 w-100 h-100 object-fit-cover" alt="Ticket">
                </div>
              </div>

              <!-- Event -->
              <div class="swiper-slide">
                <a class="ratio d-block bg-body-secondary rounded-4 overflow-hidden" href="single-entry-events.html" style="--fn-aspect-ratio: calc(463 / 856 * 100%)">
                  <img src="asset/img/home/events/hero-slider/03.jpg" alt="Image">
                </a>
                <div class="position-absolute shadow" style="bottom: 9%; left: 7%; width: 160px; height: 86px" data-bs-theme="light">
                  <div class="position-absolute vstack text-white z-2" style="top: 19px; left: 75px">
                    <div style="font-size: 10px; line-height: 10px">From</div>
                    <div class="fs-4 fw-semibold">Free</div>
                  </div>
                  <svg class="position-relative z-1" style="margin: 4px 0 0 8px" xmlns="http://www.w3.org/2000/svg" width="142" height="69"><path class="text-primary" d="M8 0h31.189c.666 2.588 3.015 4.5 5.811 4.5s5.145-1.912 5.811-4.5H134a8 8 0 0 1 8 8v53a8 8 0 0 1-8 8H50.659c-.824-2.33-3.046-4-5.659-4s-4.835 1.67-5.659 4H8a8 8 0 0 1-8-8V8a8 8 0 0 1 8-8z" fill="currentColor"></path><path d="M45 65V4.5c2.796 0 5.145-1.912 5.811-4.5H134a8 8 0 0 1 8 8v53a8 8 0 0 1-8 8H50.659c-.824-2.33-3.046-4-5.659-4z" fill="url(#A)"></path><path d="M45 4v61" stroke="#1d2735" stroke-width="1.5" stroke-dasharray="4 2"></path><path d="M23.5 25l.008 8.919a1 1 0 0 0 .499.865l7.72 4.466-7.728-4.453a1 1 0 0 0-.998 0l-7.728 4.453 7.72-4.466a1 1 0 0 0 .499-.865L23.5 25z" stroke="currentColor" stroke-width="2" style="color: var(--fn-primary-text-emphasis)"></path><defs><linearGradient id="A" x1="46" y1="35.5" x2="66.5" y2="35.5" gradientUnits="userSpaceOnUse"><stop stop-color="rgba(0,0,0,.15)"></stop><stop class="text-primary" offset="1" stop-color="currentColor" stop-opacity="0"></stop></linearGradient></defs></svg>
                  <img src="asset/img/home/events/hero-slider/ticket.png" class="position-absolute top-0 start-0 w-100 h-100 object-fit-cover" alt="Ticket">
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <span class="position-absolute z-1 fw-bold" style="top: -15px; right: 100%; margin-right: -216px; font-size: 128px; color: var(--fn-tertiary-bg); text-shadow: 1px 1px 0 var(--fn-border-color), -1px 1px 0 var(--fn-border-color), -1px -1px 0 var(--fn-border-color), 1px -1px 0 var(--fn-border-color)">Executives</span>
      <span class="position-absolute z-1 fw-bold" style="top: 82px; right: 100%; margin-right: -365px; font-size: 128px; color: var(--fn-tertiary-bg); text-shadow: 1px 1px 0 var(--fn-border-color), -1px 1px 0 var(--fn-border-color), -1px -1px 0 var(--fn-border-color), 1px -1px 0 var(--fn-border-color)">Assitant</span>
      <span class="position-absolute z-1 fw-bold" style="top: 110px; left: 100%; margin-left: 90px; font-size: 128px; color: var(--fn-tertiary-bg); text-shadow: 1px 1px 0 var(--fn-border-color), -1px 1px 0 var(--fn-border-color), -1px -1px 0 var(--fn-border-color), 1px -1px 0 var(--fn-border-color)">Web</span>
      <span class="position-absolute z-1 fw-bold" style="top: 206px; left: 100%; margin-left: 10px; font-size: 128px; color: var(--fn-tertiary-bg); text-shadow: 1px 1px 0 var(--fn-border-color), -1px 1px 0 var(--fn-border-color), -1px -1px 0 var(--fn-border-color), 1px -1px 0 var(--fn-border-color)">Email</span>
    </div>
    <span class="position-absolute top-0 start-0 w-100 bg-body-tertiary d-lg-none" style="height: calc(100% - 20px)"></span>
    <span class="position-absolute top-0 start-0 w-100 bg-body-tertiary d-none d-lg-block" style="height: calc(100% - 52px)"></span>
  </section>




  <section class="container pt-2 pt-sm-3 pt-md-4 pt-lg-5 pb-5 mb-xxl-3">
    <div class="d-flex align-items-start justify-content-between gap-4 pt-5 pb-3 mb-2 mb-sm-3">
      <h2 class="mb-0">Browse Service by category</h2>
      <div class="nav">
        <a class="nav-link position-relative fs-base text-nowrap py-1 px-0" href="#!">
          <span class="hover-effect-underline stretched-link me-1">View all</span>
          <i class="fi-chevron-right fs-lg"></i>
        </a>
      </div>
    </div>

    <!-- Row of cards that turns into carousel on screens < 1200px wide (xl breakpoint) -->
    <div class="swiper" data-swiper="{
      &quot;slidesPerView&quot;: 2,
      &quot;spaceBetween&quot;: 16,
      &quot;pagination&quot;: {
        &quot;el&quot;: &quot;.swiper-pagination&quot;,
        &quot;clickable&quot;: true
      },
      &quot;breakpoints&quot;: {
        &quot;460&quot;: {
          &quot;slidesPerView&quot;: 2,
          &quot;spaceBetween&quot;: 24
        },
        &quot;600&quot;: {
          &quot;slidesPerView&quot;: 3,
          &quot;spaceBetween&quot;: 24
        },
        &quot;768&quot;: {
          &quot;slidesPerView&quot;: 4,
          &quot;spaceBetween&quot;: 24
        },
        &quot;992&quot;: {
          &quot;slidesPerView&quot;: 5,
          &quot;spaceBetween&quot;: 24
        },
        &quot;1200&quot;: {
          &quot;slidesPerView&quot;: 6,
          &quot;spaceBetween&quot;: 24
        }
      }
    }">
      <div class="swiper-wrapper">

        <!-- Category -->
        @php
        $count = 0;
    @endphp
        @foreach ($index_cat as $row)
        @if ($count < 6)
        <div class="swiper-slide">
          <article class="card w-100 hover-effect-scale bg-body-tertiary border-0">
            <div class="card-body text-center px-3">
              <div class="ratio hover-effect-target" style="--fn-aspect-ratio: calc(160 / 164 * 100%)">
                @if (!empty($row->featured_img))
                    <img src="{{ asset('category_icons/' . $row->created_by . '/' . $row->featured_img) }}" alt="Image" style="width: 150px" height="150px" class="img_fluid rounded">
                @else
                    <img src="{{ asset('asset/img/home/cars/body-type/sedan.svg')}}" alt="Image">
                @endif

              </div>
              <h3 class="h6 pt-3 mb-1">
                <a class=" stretched-link" href="{{ url('service-category/' . $row->url) }}">{{ $row->title }}</a>
              </h3>
              {{-- <p class="fs-sm text-body-secondary mb-1 mb-sm-2">{{ $row->users_count }} offers</p> --}}
            </div>
          </article>
        </div>
        @php
        $count++;
    @endphp
        @endif
        @endforeach





      </div>

      <!-- Pagination (Bullets) -->
      <div class="swiper-pagination position-static mt-3"></div>
    </div>
  </section>




        <!-- Hero -->
        <section class="container pt-4 pt-sm-5 pb-5 mt-md-2 mt-lg-3 mt-xl-4 mb-xxl-3">
            <div class="row align-items-center justify-content-center pb-2 pb-sm-3 pb-md-4 pb-lg-5">

              <!-- Image -->
              <div class="col-9 col-sm-7 col-md-5 pb-2 pb-sm-0 mt-2 mt-sm-0 mb-4 mb-sm-5 mb-md-0">
                <div class="ratio ratio-16x9 border rounded-5 overflow-hidden">
                    <video muted="" loop="" playsinline="" autoplay="" poster="assets/img/about/v1/video-poster.jpg">
                      <source src="asset/img/about/v1/videos.mp4" type="video/mp4">
                    </video>
                  </div>
              </div>

              <!-- Text -->
              <div class="col-md-7 col-xl-6 offset-xl-1 text-center text-md-start">
                <div class="ps-md-3 ps-lg-4 ps-xl-0">
                  <h1 class="display-3 pb-1 pb-md-2 pb-lg-3 pb-xl-4">Trusted By Best Freelancer</h1>
                  <p class="fs-lg pb-2 pb-lg-3 pb-xl-4"> We specialize in providing top-notch virtual assistance services to
                    businesses of all sizes. With a team of experienced professionals, we
                    are dedicated to helping our clients achieve their goals by offering
                    efficient, cost-effective, and personalized virtual assistance
                    solutions.</p>
                  {{-- <div class="d-flex align-items-center justify-content-center justify-content-md-start">
                    <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="none"><path d="M25.176 14.273c0-.79-.064-1.585-.201-2.362h-10.97v4.479h6.281c-.129.715-.401 1.397-.8 2.005a5.38 5.38 0 0 1-1.524 1.529v2.905h3.747c2.202-2.024 3.465-5.017 3.465-8.555h.001z" fill="#2a84fc"></path><path d="M14.008 25.636c3.136 0 5.782-1.029 7.709-2.807l-3.748-2.906c-1.043.709-2.388 1.111-3.957 1.111-3.033 0-5.607-2.046-6.53-4.799H3.614v2.996a11.63 11.63 0 0 0 10.394 6.405z" fill="#00ac47"></path><path d="M7.476 16.235c-.487-1.444-.487-3.009 0-4.453V8.785H3.612a11.64 11.64 0 0 0 0 10.445l3.864-2.996v.001z" fill="#ffba00"></path><path d="M14.008 6.979a6.32 6.32 0 0 1 4.461 1.743l3.32-3.32a11.18 11.18 0 0 0-7.782-3.025A11.63 11.63 0 0 0 3.614 8.785l3.864 2.998c.918-2.757 3.495-4.804 6.53-4.804z" fill="#fc2c25"></path></svg>
                    <div class="fs-sm fw-semibold text-dark-emphasis ms-1 me-3">Google</div>
                    <i class="fi-star-filled fs-xl text-warning me-1"></i>
                    <div class="fs-sm fw-semibold text-dark-emphasis">4.9</div>
                  </div> --}}
                  <div class=" gy-3">
                    <div class="col d-flex align-items-start gap-2 pb-3">
                      <i class="fi-check fs-xl me-1"></i>
                      Experienced professionals with expertise in diverse domainsAccessible ticket
                    </div>
                    <div class="col d-flex align-items-left gap-2 pb-3">
                      <i class="fi-check fs-xl me-1 "></i>
                      Customized solutions tailored to your specific requirements
                    </div>
                    <div class="col d-flex align-items-left gap-2 pb-3">
                      <i class="fi-check fs-xl me-1"></i>
                      Ability to communicate effectively
                    </div>
                    <div class="col d-flex align-items-center gap-2 pb-3">
                      <i class="fi-check fs-xl me-1"></i>
                      Intrisic attention to detail
                    </div>

                  </div>
                </div>
              </div>
            </div>
          </section>




          {{-- <section class="row g-3 g-xl-4 pb-5 mb-md-3">
            @foreach ($jobs as $job)
                <div class="col-md-6 col-lg-6 col-xl-4">
                    <div class="card bg-light border-0 h-100">
                        <div class="card-body">
                            <h3 class="fs-sm fw-bold mb-3 text-dark">{{ $job->title }}</h3>
                            <div class="mb-3">
                                <span class="badge bg-info-subtle text-info fs-xs fw-medium">
                                    {{ $job->location ?? 'Location Not Specified' }}
                                </span>
                            </div>
                            <p class="text-muted fs-sm mb-4">
                                {{ \Illuminate\Support\Str::limit($job->description, 100, '...') }}
                            </p>
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <span class="text-success fw-medium">Salary: </span>
                                    <span class="fw-semibold text-dark">${{ number_format($job->salary, 2) }}</span>
                                </div>
                                <a href="{{ url('job/' . $job->url) }}" class="btn btn-outline-primary btn-sm">
                                    View Details
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </section> --}}




          <section class="bg-body-tertiary py-2 py-sm-3 py-md-4 py-lg-5">
            <div class="container py-5 my-xxl-3">
              <h2 class="text-nowrap pb-2 pb-lg-3">Highest Rated Freelancers</h2>
              {{-- <span class=" ">Get access to the best virtual assistance around the world</span> --}}

              <!-- Filters + Sort selector -->



              <!-- Row of event cards that turns into carousel on screens < 992px wide (lg breakpoint) -->
              <div class="mx-n2">
                <div class="swiper px-2 pb-4" data-swiper="{
                  &quot;slidesPerView&quot;: 1,
                  &quot;spaceBetween&quot;: 24,
                  &quot;pagination&quot;: {
                    &quot;el&quot;: &quot;.swiper-pagination&quot;,
                    &quot;clickable&quot;: true
                  },
                  &quot;breakpoints&quot;: {
                    &quot;500&quot;: {
                      &quot;slidesPerView&quot;: 2
                    },
                    &quot;992&quot;: {
                      &quot;slidesPerView&quot;: 4
                    }
                  }
                }">


                  <div class="swiper-wrapper">

                    <!-- Event listing card -->
                    @foreach (\App\Models\User::query()->where('is_admin', 0)->whereNotNull('identity') ->where('is_influencer', 0)->limit(30)->get() as $row)
                    @php
                        $imagePath = $row->profile_image;
                    @endphp

                    @if ($row->identity)
                    <div class="swiper-slide h-auto">
                      <article class="card h-100 hover-effect-scale hover-effect-opacity border-0 shadow placeholder-wave">
                        <div class="position-absolute top-0 end-0 z-2 hover-effect-target opacity-0 pt-1 pt-sm-0 pe-1 pe-sm-0 mt-2 mt-sm-3 me-2 me-sm-3">
                          <button type="button" class="btn btn-sm btn-icon btn-light bg-light border-0 rounded-circle animate-pulse" aria-label="Add to wishlist">
                            <i class="fi-heart animate-target fs-sm"></i>
                          </button>
                        </div>
                        <div class="bg-body-light rounded overflow-hidden">
                          <div class="ratio hover-effect-target" style="--fn-aspect-ratio: calc(290 / 416 * 100%)">
                            <img src="{{ !empty($row->profile_image) && file_exists(public_path($imagePath)) ? asset($imagePath) : asset('avata2r.png') }}" alt="Image" class="" style="object-fit: cover;">
                          </div>
                        </div>
                        <div class="card-body">
                          <ul class="list-unstyled flex-row flex-wrap align-items-center gap-2 fs-sm  placeholder-wave placeholder-glow">
                            <li class="d-flex align-items-center fs-sm ">
                                <i class="fi-star-filled fs-xs text-warning me-2 mb-2"> </i>
                                <span class="fs-xs"> {{ \App\Helpers\CommonHelpers::freelancerRating( $row->id) }}.0  </span>
                                 <span class="fs-xs"> ( {{ \App\Models\ServiceRating::query()->where('service_id', $row->id)->count() }} Reviews )</span>
                            </li>


                            <li class=" ms-auto">
                                <div class=" align-items-center fs-xs placeholder-glow">
                                <i class="fi-map-pin me-1"></i>
                                {{ $row->state->name }}
                              </div>
                            </li>
                          </ul>
                          <h3 class="h5 pt-1 mb-2 placeholder-glow">
                            <a class="hover-effect-underline stretched-link" href="{{ url('user/' . $row->identity) }}">{{ ucwords($row->full_name) }}   @if ($row->is_feature)
                                <i class="fi-check-shield text-success "></i>
                                @endif </a>
                          </h3>
                          <div class="d-flex align-items-center gap-3 border-bottom pb-2 mb-4">
                          <div class=" pb-3 ">
                          <div class="d-flex gap-2">
                            @php
                            // Get the first 3 skills
                            $visibleSkills = $row->mySkills->take(2);
                            // Count remaining skills
                            $remainingSkills = $row->mySkills->count() - 3;
                        @endphp

                        @foreach ($visibleSkills as $skill)
                            <span class="fs-xs badge text-bg-success">
                                {{ $skill->title }}
                            </span>
                        @endforeach

                        <!-- Show "See X more" button if there are remaining skills -->
                        @if ($remainingSkills > 0)
                            <a type="button" class="btn btn-link p-0 fs-xs text-primary" data-bs-toggle="modal" data-bs-target="#skillsModal-{{ $row->id }}">
                                See {{ $remainingSkills }} more
                            </a>
                        @endif
                          </div>
                          </div>
                          </div>
                        </div>
                        <div class="card-footer d-flex align-items-center justify-content-between gap-3 bg-transparent border-0 pt-0 pb-4 placeholder-glow">
                          <div class="h6 text-success mb-0">{{ $currencySymbols[$currency] }}
                            @if ($currencySymbols[$currency] == '$')
                            {{ $row->usd_rate }}/hr
                            @elseif($currencySymbols[$currency] == '₦')
                            {{ $row->ngn_rate }}/hr
                            @elseif($currencySymbols[$currency] == '£')
                            {{ $row->gbp_rate }}/hr
                            @elseif($currencySymbols[$currency] == '€')
                            {{ $row->eur_rate }}/hr
                        @endif</div>
                          <a href="{{ url('user/' . $row->identity) }}"class="btn btn-outline-dark position-relative z-2 placeholder-glow">View Profile <i class="fi-arrow-right pe-2"></i></a>
                        </div>
                      </article>
                    </div>
                    @endif
                    @endforeach

                  </div>

                  <div class="modal fade" id="skillsModal-{{ $row->id }}" tabindex="-1" aria-labelledby="skillsModalLabel-{{ $row->id }}" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="skillsModalLabel-{{ $row->id }}">All Skills</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="d-flex flex-wrap gap-2">
                                    @foreach ($row->mySkills as $skill)
                                        <span class="fs-xs badge text-bg-success">
                                            {{ $skill->title }}
                                        </span>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                  <!-- Pagination (Bullets) -->
                  <div class="swiper-pagination position-static mt-3 mt-md-4"></div>
                </div>
              </div>

              <!-- View all button -->
              <div class="text-center pt-md-2 pt-lg-3">
                <a class="btn btn-lg btn-primary" href="/freelancers">Load More Freelancer</a>
              </div>
            </div>
          </section>





          <section class="bg-body-tertiary py-2 py-sm-3 py-md-4 py-lg-5">
            <div class="container py-5 my-xxl-3">
              <h2 class="text-nowrap pb-2 pb-lg-3">Top Influencers</h2>
              {{-- <span class=" ">Get access to the best virtual assistance around the world</span> --}}

              <!-- Filters + Sort selector -->



              <!-- Row of event cards that turns into carousel on screens < 992px wide (lg breakpoint) -->
              <div class="mx-n2">
                <div class="swiper px-2 pb-4" data-swiper="{
                  &quot;slidesPerView&quot;: 1,
                  &quot;spaceBetween&quot;: 24,
                  &quot;pagination&quot;: {
                    &quot;el&quot;: &quot;.swiper-pagination&quot;,
                    &quot;clickable&quot;: true
                  },
                  &quot;breakpoints&quot;: {
                    &quot;500&quot;: {
                      &quot;slidesPerView&quot;: 2
                    },
                    &quot;992&quot;: {
                      &quot;slidesPerView&quot;: 4
                    }
                  }
                }">


                  <div class="swiper-wrapper">

                    <!-- Event listing card -->

                    @foreach ($influencer  as $row)
                    @php
                    $imagePath = $row->profile_image;
                    @endphp
                    <div class="swiper-slide h-auto">
                      <article class="card h-100 hover-effect-scale hover-effect-opacity border-0 shadow placeholder-wave">
                        <div class="position-absolute  top-0 start-0 z-2 hover-effect-target  pt-1 pt-sm-0 pe-1 pe-sm-0 mt-2 mt-sm-3 me-2 me-sm-3">
                          {{-- <button type="button" class="btn btn-sm btn-icon btn-light bg-light border-0 ms-auto rounded-circle animate-pulse" aria-label="Add to wishlist">
                            <i class="fi-heart animate-target fs-sm"></i>

                          </button> --}}
                          @if ($row->is_influencer)
                          <span class="badge fs-xm m-2  text-bg-success">Top Influencer</span>
                          @endif
                        </div>
                        <div class="bg-body-light rounded overflow-hidden">
                          <div class="ratio hover-effect-target" style="--fn-aspect-ratio: calc(290 / 416 * 100%)">
                            <img src="{{ !empty($row->profile_image) && file_exists(public_path($imagePath)) ? asset($imagePath) : asset('avatar.png') }}" alt="Image" class="" style="object-fit: cover;">
                          </div>
                        </div>
                        <div class="card-body">
                          <ul class="list-unstyled flex-row flex-wrap align-items-center gap-2 fs-sm placeholder-wave placeholder-glow">
                            <li class="d-flex align-items-center">
                              <i class="fi-star-filled fs-xm text-warning me-2 mb-2"> </i>
                              <span class="fs-xs">{{ \App\Helpers\CommonHelpers::freelancerRating($row->id) }}.0</span>
                              <span class="fs-xs">({{ \App\Models\ServiceRating::query()->where('service_id', $row->id)->count() }} Reviews)</span>
                            </li>
                            <li class=" fs-xs ms-auto">
                                <div class=" align-items-center fs-xs placeholder-glow">
                                <i class="fs-xs fi-map-pin me-1"></i>
                                {{ $row->state->name }}
                              </div>
                            </li> <!-- Display category name -->
                          </ul>
                          <h3 class="h5 pt-1 mb-2 placeholder-glow">
                            <a class="hover-effect-underline stretched-link" href="{{ url('user/' . $row->identity) }}">{{ ucwords($row->full_name) }} @if ($row->is_feature)
                                <i class="fi-check-shield text-success"></i>
                                @endif</a>

                          </h3>
                          <div class="d-flex align-items-center gap-3 border-bottom pb-2 mb-4">
                            <div class="w-100 pb-3 overflow-x-hidden">
                            <div class="d-flex gap-2">
                              @php
                              // Get the first 3 skills
                              $visibleSkills = $row->mySkills->take(2);
                              // Count remaining skills
                              $remainingSkills = $row->mySkills->count() - 3;
                          @endphp

                          @foreach ($visibleSkills as $skill)
                              <span class="fs-xs badge text-bg-success">
                                  {{ $skill->title }}
                              </span>
                          @endforeach

                          <!-- Show "See X more" button if there are remaining skills -->
                          @if ($remainingSkills > 0)
                              <a type="button" class="btn btn-link p-0 fs-xs text-primary" data-bs-toggle="modal" data-bs-target="#skillsModal-{{ $row->id }}">
                                  See {{ $remainingSkills }} more
                              </a>
                          @endif
                            </div>
                            </div>
                            </div>
                        </div>
                        <div class="card-footer d-flex align-items-center justify-content-between gap-3 bg-transparent border-0 pt-0 pb-4 placeholder-glow">
                          <div class="h6 text-success mb-0">
                            {{ $currencySymbols[$currency] }}
                            @if ($currencySymbols[$currency] == '$')
                              {{ $row->usd_rate }}/hr
                            @elseif ($currencySymbols[$currency] == '₦')
                              {{ $row->ngn_rate }}/hr
                            @elseif ($currencySymbols[$currency] == '£')
                              {{ $row->gbp_rate }}/hr
                            @elseif ($currencySymbols[$currency] == '€')
                              {{ $row->eur_rate }}/hr
                            @endif
                          </div>
                          <a href="{{ url('user/' . $row->identity) }}" class="btn btn-outline-dark position-relative z-2 placeholder-glow">View Profile <i class="fi-arrow-right pe-2"></i></a>
                        </div>
                      </article>
                    </div>
                    @endforeach

                  </div>

                  <!-- Pagination (Bullets) -->
                  <div class="swiper-pagination position-static mt-3 mt-md-4"></div>
                </div>
              </div>

              <!-- View all button -->
              <div class="text-center pt-md-2 pt-lg-3">
                <a class="btn btn-lg btn-primary" href="/freelancers">Load More Freelancer</a>
              </div>
            </div>
          </section>








                                <!-- Offers -->
      <section class="bg-info overflow-hidden">
        <div class="container">
          <div class="row align-items-center justify-content-center justify-content-md-end">
            <div class="col-lg-6 py-2 py-sm-3 py-md-4 py-lg-5 my-xxl-3">
              <h2 class="h1 text-white pt-5 pb-2 pb-md-3">Advantages Of Working With A Virtual Assistant</h2>
              <div class="row row-cols-1 row-cols-md-2 row-cols-lg-1 g-3 pb-3 mb-2 mb-md-3" data-bs-theme="light">

                <!-- Card -->
                <div class="col">
                  <div class="card h-100 bg-white bg-opacity-10 border-0 p-xl-2">
                    <div class="card-body d-flex">
                        <div class="d-flex flex-column pe-4">
                          <h3 class="h4 mb-2">
                            <a class="hover-effect-underline stretched-link text-white" href="#!">Increased
                                Productivity</a>
                          </h3>
                          <p class="fs-sm text-white opacity-75">By delegating repetitive or low-value tasks to a virtual assistant, you can increase your overall productivity and focus on high-priority tasks that drive business growth.</p>
                          <div class="d-flex align-items-center">
                          </div>
                        </div>
                        <div class="ratio ratio-1x1 flex-shrink-0 bg-white bg-opacity-10 rounded overflow-hidden align-self-center" style="width: 106px">
                          <img src="asset/img/home/doctors/offers/01.png" alt="Image">
                        </div>
                    </div>
                  </div>
                </div>

                <!-- Card -->
                <div class="col">
                  <div class="card h-100 bg-white bg-opacity-10 border-0 p-xl-2">
                    <div class="card-body d-flex">
                      <div class="d-flex flex-column pe-4">
                        <h3 class="h4 mb-2">
                          <a class="hover-effect-underline stretched-link text-white" href="#!">Time Savings:</a>
                        </h3>
                        <p class="fs-sm text-white opacity-75">Virtual assistants can handle time-consuming tasks such as administrative work, email management, and scheduling, freeing up your time to focus on core business activities.</p>
                        <div class="d-flex align-items-center mt-auto">

                        </div>
                      </div>
                      <div class="ratio ratio-1x1 flex-shrink-0 bg-white bg-opacity-10 rounded overflow-hidden align-self-center" style="width: 106px">
                        <img src="asset/img/home/doctors/offers/02.png" alt="Image">
                      </div>
                    </div>
                  </div>
                </div>

                <!-- Card -->
                <div class="col">
                  <div class="card h-100 bg-white bg-opacity-10 border-0 p-xl-2">
                    <div class="card-body d-flex">
                      <div class="d-flex flex-column pe-4">
                        <h3 class="h4 mb-2">
                          <a class="hover-effect-underline stretched-link text-white" href="#!">Cost-Effectiveness</a>
                        </h3>
                        <p class="fs-sm text-white opacity-75">Hiring a virtual assistant can be more cost-effective than hiring a full-time employee. You can save on expenses such as office space, equipment, and benefits.</p>
                        <div class="d-flex align-items-center">
                        </div>
                      </div>
                      <div class="ratio ratio-1x1 flex-shrink-0 bg-white bg-opacity-10 rounded overflow-hidden align-self-center" style="width: 106px">
                        <img src="asset/img/home/doctors/offers/03.jpg" alt="Image">
                      </div>
                    </div>
                  </div>
                </div>
              </div>

            </div>

            <!-- Main image -->
            <div class="col-7 col-sm-6 col-md-5 col-lg-6">
                <div class="d-none d-md-block d-lg-none" style="margin-top: -360px;"></div>
                <div class="d-md-none" style="margin-bottom: -40px;"></div>
                <div class="ratio opacity-75" style="--fn-aspect-ratio: calc(832 / 636 * 100%)">
                  <img src="asset/img/home/doctors/offers/3.png" alt="Image">
                  </div>
                <div class="d-sm-none" style="margin-bottom: -75px;"></div>
                <div class="d-none d-sm-block d-md-none" style="margin-bottom: -110px;"></div>
              </div>
          </div>
        </div>
      </section>




 <!-- What's new section -->
 <section class="container position-relative pt-5 pt-sm-5 pt-md-5 pt-lg-5 pb-5 my-xxl-3">
    <h2 class="pb-2 pb-sm-3">Our Success Story </h2>
    <div class="row align-items-start align-items-xl-center">

      <!-- Controlled image slider -->
      <div class="col-md-5 mb-4 mb-md-0 pb-1 pb-md-0">
        <div class="position-relative">
          <div class="ratio" style="--fn-aspect-ratio: calc(431 / 526 * 100%)"></div>
          <div class="swiper position-absolute top-0 start-0 w-100 h-100" id="images" data-swiper="{
            &quot;allowTouchMove&quot;: false,
            &quot;loop&quot;: true,
            &quot;effect&quot;: &quot;flip&quot;,
            &quot;flipEffect&quot;: {
              &quot;slideShadows&quot;: false
            }
          }">
            <div class="swiper-wrapper">
              <div class="swiper-slide">
                <img src="asset/img/home/city-guide/new/01.jpg" class="position-absolute top-0 start-0 w-100 h-100 bg-body-tertiary rounded object-fit-cover" alt="Image">
              </div>
              <div class="swiper-slide">
                <img src="asset/img/home/city-guide/new/02.jpg" class="position-absolute top-0 start-0 w-100 h-100 bg-body-tertiary rounded object-fit-cover" alt="Image">
              </div>
              <div class="swiper-slide">
                <img src="asset/img/home/city-guide/new/03.jpg" class="position-absolute top-0 start-0 w-100 h-100 bg-body-tertiary rounded object-fit-cover" alt="Image">
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Master content slider -->
      <div class="col-md-7 col-xl-6 offset-xl-1 ps-md-4 ps-lg-5 ps-xl-0">
        <div class="swiper" data-swiper="{
          &quot;spaceBetween&quot;: 32,
          &quot;loop&quot;: true,
          &quot;speed&quot;: 400,
          &quot;autoHeight&quot;: true,
          &quot;controlSlider&quot;: &quot;#images&quot;,
          &quot;navigation&quot;: {
            &quot;prevEl&quot;: &quot;#new-prev&quot;,
            &quot;nextEl&quot;: &quot;#new-next&quot;
          }
        }">

          <!-- Slider nav: Prev/next buttons -->
          <div class="d-flex justify-content-start gap-2 pb-3 mb-2 mb-lg-3">
            <button type="button" class="btn btn-icon btn-outline-secondary animate-slide-start rounded-circle me-1" id="new-prev" aria-label="Prev">
              <i class="fi-chevron-left fs-lg animate-target"></i>
            </button>
            <button type="button" class="btn btn-icon btn-outline-secondary animate-slide-end rounded-circle" id="new-next" aria-label="Next">
              <i class="fi-chevron-right fs-lg animate-target"></i>
            </button>
          </div>

          <div class="swiper-wrapper">

            <!-- Item -->
            <div class="swiper-slide">
              <h3 class="h2">Elizabeth Okonkwo</h3>
              <div class="d-flex align-items-center gap-3 mb-3 mb-xl-4">
                <div class="d-flex align-items-center gap-1">
                  <i class="fi-star-filled text-warning"></i>
                  <span class="fs-sm text-secondary-emphasis">Product Manager</span>
                  {{-- <span class="fs-xs text-body-secondary align-self-end">(597)</span> --}}
                </div>
                {{-- <div class="d-flex align-items-center gap-1 min-w-0 fs-sm">
                  <i class="fi-credit-card"></i>
                  $60
                </div>
                <div class="d-flex align-items-center gap-1 min-w-0 fs-sm">
                  <i class="fi-map-pin"></i>
                  <span class="text-truncate">0.3 km from center</span>
                </div> --}}
              </div>
              <p class="pb-2 pb-xl-3">“ Working with a
                virtual assistant from Swift Edge has been
                an absolute game-changer for my business.
                Their professionalism, efficiency, and
                attention to detail have greatly enhanced my
                productivity and allowed me to focus on
                growing my company. I highly recommend their
                services to anyone seeking reliable virtual
                assistance. ”</p>

            </div>

            <!-- Item -->
            <div class="swiper-slide">
              <h3 class="h2">Adekunle Peter</h3>
              <div class="d-flex align-items-center gap-3 mb-3 mb-xl-4">
                <div class="d-flex align-items-center gap-1">
                  <i class="fi-star-filled text-warning"></i>
                  <span class="fs-sm text-secondary-emphasis">Freelancer</span>
                  {{-- <span class="fs-xs text-body-secondary align-self-end">(8325)</span> --}}
                </div>
                {{-- <div class="d-flex align-items-center gap-1 min-w-0 fs-sm">
                  <i class="fi-credit-card"></i>
                  $40
                </div>
                <div class="d-flex align-items-center gap-1 min-w-0 fs-sm">
                  <i class="fi-map-pin"></i>
                  <span class="text-truncate">1.8 km from center</span>
                </div> --}}
              </div>
              <p class="pb-2 pb-xl-3">“ As a freelancer, my
                collaboration with Swift Edge Virtual
                Assistance has truly transformed my
                professional journey. Their tailored
                approach, combined with a deep understanding
                of my needs, has not only elevated my
                productivity but also empowered me to exceed
                client expectations. ”</p>

            </div>

            <!-- Item -->
            <div class="swiper-slide">
              <h3 class="h2">Salvation Alibor</h3>
              <div class="d-flex align-items-center gap-3 mb-3 mb-xl-4">
                <div class="d-flex align-items-center gap-1">
                  <i class="fi-star-filled text-warning"></i>
                  <span class="fs-sm text-secondary-emphasis">Digital Marketer </span>
                  {{-- <span class="fs-xs text-body-secondary align-self-end">(112)</span> --}}
                </div>
                {{-- <div class="d-flex align-items-center gap-1 min-w-0 fs-sm">
                  <i class="fi-credit-card"></i>
                  $25
                </div>
                <div class="d-flex align-items-center gap-1 min-w-0 fs-sm">
                  <i class="fi-map-pin"></i>
                  <span class="text-truncate">2.1 km from center</span>
                </div> --}}
              </div>
              <p class="pb-2 pb-xl-3">“ With Swift Edge by
                my side, I've unlocked new levels of
                efficiency and effectiveness in my freelance
                endeavors, making every project a remarkable
                success ”</p>

            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Decorations -->
    <span class="position-absolute bg-primary-subtle rounded-circle z-n1 d-none d-sm-block" style="bottom: 32px; right: 190px; width: 60px; height: 60px"></span>
    <span class="position-absolute bg-success-subtle rounded-circle z-n1 d-none d-sm-block" style="bottom: 84px; right: 260px; width: 27px; height: 27px"></span>
  </section>









                            <section class="container py-2 py-sm-3 py-md-4 py-lg-5 mb-xxl-3">
                                <h2 class="pt-5">How it works</h2>
                                <p class="fs-lg pb-3">Effortlessly find, connect, and hire the perfect contractor for your job - all in just three easy steps.</p>

                                <!-- Row of items that turns into carousel on screens < 800px wide -->
                                <div class="swiper pb-5" data-swiper="{
                                  &quot;slidesPerView&quot;: 1,
                                  &quot;spaceBetween&quot;: 24,
                                  &quot;pagination&quot;: {
                                    &quot;el&quot;: &quot;.swiper-pagination&quot;,
                                    &quot;clickable&quot;: true
                                  },
                                  &quot;breakpoints&quot;: {
                                    &quot;450&quot;: {
                                      &quot;slidesPerView&quot;: 2
                                    },
                                    &quot;800&quot;: {
                                      &quot;slidesPerView&quot;: 3
                                    }
                                  }
                                }">
                                  <div class="swiper-wrapper">

                                    <!-- Item -->
                                    <div class="swiper-slide">
                                      <svg class="text-secondary-emphasis" xmlns="http://www.w3.org/2000/svg" width="48" height="48" fill="currentColor"><path d="M41.441 35.281a.95.95 0 0 1-.184-.018.99.99 0 0 1-.175-.054.93.93 0 0 1-.162-.086.91.91 0 0 1-.142-.116c-.043-.043-.082-.091-.117-.142s-.063-.105-.085-.162-.042-.116-.053-.175a.95.95 0 0 1-.019-.184.93.93 0 0 1 .019-.183.88.88 0 0 1 .053-.175c.023-.057.052-.112.085-.162a.93.93 0 0 1 .117-.142c.174-.174.416-.275.663-.275a.94.94 0 0 1 .663.275c.043.043.082.091.116.142a.97.97 0 0 1 .087.162c.024.057.041.115.053.175a.93.93 0 0 1 .019.183.95.95 0 0 1-.019.184c-.012.059-.03.118-.053.175a.94.94 0 0 1-.087.162c-.034.052-.073.099-.116.142s-.091.082-.143.116a.86.86 0 0 1-.162.086.95.95 0 0 1-.175.054.93.93 0 0 1-.183.018zM27.48 37.367c-9.238 0-16.753-7.515-16.753-16.752S18.242 3.862 27.48 3.862s16.754 7.515 16.754 16.752-7.516 16.753-16.754 16.753zm0-31.63c-8.204 0-14.878 6.674-14.878 14.877A14.9 14.9 0 0 0 27.48 35.492a14.9 14.9 0 0 0 14.879-14.878A14.9 14.9 0 0 0 27.48 5.737zm-3.993 17.638a.94.94 0 0 1-.925-.79.94.94 0 0 1 .617-1.033c.162-.489.689-.756 1.18-.596l1.025.334a.94.94 0 0 1 .644.965c-.034.432-.359.784-.787.852l-1.605.256a.94.94 0 0 1-.149.012zm8.37 0a.94.94 0 0 1-.149-.012l-1.605-.256a.94.94 0 0 1-.143-1.817l1.025-.334a.94.94 0 0 1 1.18.596.94.94 0 0 1 .617 1.033.94.94 0 0 1-.925.79zM41.989 6.104A20.38 20.38 0 0 0 27.478.094a20.39 20.39 0 0 0-14.511 6.01 20.38 20.38 0 0 0-6.011 14.51 20.37 20.37 0 0 0 5.363 13.833l-1.308 1.308-1.546-1.546a.94.94 0 0 0-1.326 0l-6.95 6.95C.423 41.925 0 42.945 0 44.03s.423 2.105 1.189 2.871a4.05 4.05 0 0 0 2.872 1.188 4.05 4.05 0 0 0 2.872-1.188l6.95-6.949c.176-.176.275-.414.275-.663s-.099-.487-.275-.663l-1.546-1.546 1.308-1.308c3.018 2.76 6.728 4.53 10.788 5.136 1.029.154 2.057.23 3.08.23a20.38 20.38 0 0 0 9.325-2.256.94.94 0 0 0 .407-1.262.94.94 0 0 0-1.262-.407c-7.226 3.703-15.941 2.332-21.688-3.414a18.52 18.52 0 0 1-5.463-13.186A18.52 18.52 0 0 1 14.293 7.43c7.271-7.27 19.101-7.27 26.371 0 5.964 5.963 7.184 15.221 2.966 22.512a.94.94 0 0 0 .342 1.281.94.94 0 0 0 1.281-.342c4.643-8.025 3.3-18.214-3.263-24.777zM11.895 39.289l-6.287 6.287a2.19 2.19 0 0 1-3.092 0 2.17 2.17 0 0 1 0-3.092l6.287-6.287.883.883-2.639 2.639a.94.94 0 0 0 0 1.326c.183.183.423.275.663.275s.48-.092.663-.275l2.639-2.639.883.883zm23.459-13.825v-2.415c.184-.75 1.136-4.809 1.137-8.386 0-1.47-.33-2.859-.607-3.765l-.418-1.188c-.201-.5-.284-.707-.579-.879a.94.94 0 0 0-1.058.078l-.241.193a6.23 6.23 0 0 1-5.206 1.234c-2.622-.557-5.338.498-6.898 2.64-.835.124-1.604.543-2.164 1.192a3.55 3.55 0 0 0-.824 2.839 1.01 1.01 0 0 0 .024.114l1.46 5.258v3.086c0 1.853.942 3.422 2.725 4.535.703.439 1.511.796 2.408 1.063l-.022 1.583a.94.94 0 0 0 .938.95h3.273a.94.94 0 0 0 .938-.95l-.022-1.581c.9-.266 1.709-.622 2.413-1.061 1.779-1.111 2.72-2.68 2.72-4.539zm-6.222 3.95l-.103.025a.94.94 0 0 0-.693.918l.018 1.363h-1.372l.019-1.363a.94.94 0 0 0-.693-.918l-.097-.024c-1.309-.314-4.352-1.325-4.352-3.952v-6.082c0-.19.155-.345.345-.345h3.445a8.71 8.71 0 0 0 6.002-2.385.94.94 0 0 0 .038-1.325.94.94 0 0 0-1.325-.038c-1.28 1.208-2.955 1.873-4.715 1.873h-3.444c-.601 0-1.148.241-1.548.63l-.309-1.111a1.67 1.67 0 0 1 .395-1.288c.319-.369.781-.58 1.268-.58a.94.94 0 0 0 .799-.447l.015-.024c1.09-1.724 3.168-2.596 5.169-2.171a8.09 8.09 0 0 0 5.992-1.054c.291.869.63 2.176.63 3.547l-.103 2.099a.95.95 0 0 0-.148-.01.94.94 0 0 0-.93.945l.043 5.239v2.528c0 2.636-3.04 3.641-4.347 3.95zm-1.461-1.163a2.41 2.41 0 0 1-2.201-1.433.94.94 0 0 1 .479-1.237.94.94 0 0 1 1.236.478.53.53 0 0 0 .971 0c.209-.474.763-.688 1.236-.478a.94.94 0 0 1 .479 1.237 2.41 2.41 0 0 1-2.201 1.433z"></path></svg>
                                      <h3 class="h5 pt-3 pt-md-4 mb-2">Post a job</h3>
                                      <p class="mb-0">It’s free and easy to post a job. Simply fill in a title, description.</p>
                                    </div>

                                    <!-- Item -->
                                    <div class="swiper-slide">
                                      <svg class="text-secondary-emphasis" xmlns="http://www.w3.org/2000/svg" width="48" height="48" fill="currentColor"><path d="M43.313 0H18.938c-2.585 0-4.687 2.103-4.687 4.688v8.438H4.688C2.103 13.125 0 15.228 0 17.813v19.875c0 2.585 2.103 4.688 4.688 4.688h1.875v4.688a.94.94 0 0 0 .938.937.94.94 0 0 0 .663-.275l5.35-5.35h15.549c2.585 0 4.688-2.103 4.688-4.687V29.25h1.875v4.688a.94.94 0 0 0 .938.937.94.94 0 0 0 .663-.275l5.35-5.35h1.487c2.392 0 3.938-1.84 3.938-4.687V4.688A4.7 4.7 0 0 0 43.313 0zM31.875 37.688c0 1.551-1.262 2.813-2.812 2.813H13.125a.94.94 0 0 0-.663.275l-4.025 4.025v-3.362A.94.94 0 0 0 7.5 40.5H4.688c-1.551 0-2.812-1.262-2.812-2.812V17.813C1.875 16.262 3.137 15 4.688 15h24.375c1.551 0 2.813 1.262 2.813 2.813v19.875zm14.25-13.125c0 1.05-.268 2.813-2.062 2.813h-1.875a.94.94 0 0 0-.663.275L37.5 31.674v-3.362a.94.94 0 0 0-.937-.937H33.75v-6.75h5.813a.94.94 0 0 0 .938-.937.94.94 0 0 0-.937-.937H33.75v-.937c0-2.585-2.103-4.687-4.687-4.687H16.125V4.688c0-1.551 1.262-2.812 2.813-2.812h24.375c1.551 0 2.813 1.262 2.813 2.813v19.875zM39.563 7.5H22.688a.94.94 0 0 0-.937.938.94.94 0 0 0 .938.938h16.875a.94.94 0 0 0 .938-.937.94.94 0 0 0-.937-.937zm0 5.625h-3.75a.94.94 0 0 0-.937.938.94.94 0 0 0 .938.938h3.75a.94.94 0 0 0 .938-.937.94.94 0 0 0-.937-.937zM8.438 22.5a.94.94 0 0 0 .938-.937.94.94 0 0 0-.937-.937.94.94 0 0 0-.937.938.94.94 0 0 0 .938.938zm16.875-1.875H12.188a.94.94 0 0 0-.937.938.94.94 0 0 0 .938.938h13.125a.94.94 0 0 0 .938-.937.94.94 0 0 0-.937-.937zm0 5.625h-9.375a.94.94 0 0 0-.937.938.94.94 0 0 0 .938.938h9.375a.94.94 0 0 0 .938-.937.94.94 0 0 0-.937-.937zM8.438 28.125h3.75a.94.94 0 0 0 .938-.937.94.94 0 0 0-.937-.937h-3.75a.94.94 0 0 0-.937.938.94.94 0 0 0 .938.938zm9.375 3.75H8.625a.94.94 0 0 0-.937.938.94.94 0 0 0 .938.938h9.188a.94.94 0 0 0 .938-.937.94.94 0 0 0-.937-.937z"></path></svg>
                                      <h3 class="h5 pt-3 pt-md-4 mb-2">Choose freelancers</h3>
                                      <p class="mb-0">It’s free and easy to post a job. Simply fill in a title, description.</p>
                                    </div>

                                    <!-- Item -->
                                    <div class="swiper-slide">
                                      <svg class="text-secondary-emphasis" xmlns="http://www.w3.org/2000/svg" width="48" height="48" fill="currentColor"><path d="M4.519 8.136c.196.471.752.703 1.224.507s.703-.752.507-1.224-.752-.703-1.224-.507-.704.753-.507 1.224zm3.875 0c.153.368.535.607.935.576.391-.03.729-.307.834-.685.222-.798-.673-1.478-1.384-1.054-.393.234-.56.74-.384 1.163zM4.752 44.84h35.053A8.21 8.21 0 0 0 48 36.645a8.21 8.21 0 0 0-7.257-8.141l-.001-20.593A4.76 4.76 0 0 0 35.99 3.16H4.752A4.76 4.76 0 0 0 0 7.912v32.175a4.76 4.76 0 0 0 4.752 4.753zm0-1.875a2.88 2.88 0 0 1-2.877-2.878V12.202h36.993v16.302a8.28 8.28 0 0 0-6.536 4.779H5.76a.94.94 0 0 0-.937.938v4.766a.94.94 0 0 0 .938.938h9.613a.94.94 0 0 0 .938-.937.94.94 0 0 0-.937-.937H6.698V35.16h25.048a8.24 8.24 0 0 0-.135 1.487c0 .47.04.941.12 1.405h-8.109a.94.94 0 0 0-.937.938.94.94 0 0 0 .938.938h8.675a8.28 8.28 0 0 0 2.298 3.04H4.752zm41.373-6.32a6.33 6.33 0 0 1-6.32 6.32 6.39 6.39 0 0 1-6.32-6.32 6.31 6.31 0 0 1 .132-1.285c.595-2.871 3.144-5.035 6.188-5.035a6.33 6.33 0 0 1 6.32 6.319zM4.752 5.035H35.99a2.88 2.88 0 0 1 2.877 2.877v2.415H1.875V7.912a2.88 2.88 0 0 1 2.877-2.877zm2.879 23.769a8.43 8.43 0 0 0 5.579 2.124 8.43 8.43 0 0 0 5.58-2.125 8.4 8.4 0 0 0-5.579-14.654 8.4 8.4 0 0 0-5.579 14.655zm5.293.242a6.54 6.54 0 0 1-3.678-1.339 4.04 4.04 0 0 1 3.954-3.3c1.973.004 3.628 1.419 3.972 3.3-1.208.927-2.728 1.407-4.249 1.34zm-1.021-7.821a1.31 1.31 0 0 1 1.307-1.307 1.31 1.31 0 0 1 1.307 1.307 1.31 1.31 0 0 1-1.301 1.307 1.31 1.31 0 0 1-1.312-1.307zm1.307-5.201c3.593 0 6.515 2.922 6.515 6.514 0 1.287-.383 2.534-1.08 3.589-.563-1.321-1.596-2.39-2.879-3.01.393-.529.626-1.184.626-1.893 0-1.755-1.428-3.182-3.182-3.182s-3.182 1.427-3.182 3.182c0 .708.233 1.363.626 1.892-1.283.62-2.315 1.69-2.878 3.011a6.52 6.52 0 0 1-1.08-3.589c0-3.592 2.922-6.514 6.514-6.514zm25.504 21.598l-1.285-1.285a.94.94 0 0 0-1.326 0 .94.94 0 0 0 0 1.326l1.948 1.948a.94.94 0 0 0 1.326 0l4.368-4.367a.94.94 0 0 0 0-1.326.94.94 0 0 0-1.326 0l-3.704 3.705z"></path></svg>
                                      <h3 class="h5 pt-3 pt-md-4 mb-2">Pay safely</h3>
                                      <p class="mb-0">It’s free and easy to post a job. Simply fill in a title, description.</p>
                                    </div>
                                  </div>

                                  <!-- Pagination (Bullets) -->
                                  <div class="swiper-pagination position-static mt-3"></div>
                                </div>
                              </section>


                            <section class="position-relative bg-info py-5 px-sm-5 px-md-0">


                                <div class="container position-relative z-2 py-lg-5">
                                  <div class="row py-2 py-sm-4 py-lg-5">
                                    <div class="col-md-4 col-lg-5 py-lg-2 py-xl-4 py-xxl-5 mb-md-3">
                                      <h2 class="text-white text-center text-md-start pb-2 pb-sm-3">Need
                                        something done?</h2>
                                      <div class="d-flex flex-column flex-sm-row flex-md-column flex-lg-row justify-content-center justify-content-md-start gap-3">
                                        <a class="btn btn-lg btn-primary animate-scale" href="{{ route('index.staffing.employer') }}">
                                          <i class="fi-plus fs-lg animate-target ms-n2 me-2"></i>
                                          Add business
                                        </a>
                                        <a class="btn btn-lg btn-outline-light animate-slide-end" href="#!">
                                          Learn more
                                          <i class="fi-chevron-right fs-lg animate-target ms-2 me-n2"></i>
                                        </a>
                                      </div>
                                      <div class="position-absolute top-50 start-50 translate-middle d-none d-md-flex align-items-center justify-content-center" style="width: 164px; height: 164px">
                                        <svg class="animate-spin" width="144" viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg" style="animation-duration: 22s">
                                          <path id="circlePath" fill="none" d="M 10, 50a 40,40 0 1,1 80,0a 40,40 0 1,1 -80,0"></path>
                                          <text id="text" font-size="7.7" fill="#fff" style="letter-spacing: -.05">
                                            <textPath id="textPath" href="#circlePath">Feature your business customers &nbsp; Feature your business customers</textPath>
                                          </text>
                                        </svg>
                                        <span class="position-absolute top-0 start-0 w-100 h-100 border border-2 border-white rounded-circle"></span>
                                        <span class="position-absolute top-50 start-50 translate-middle border border-2 border-white rounded-circle" style="width: 87px; height: 87px"></span>
                                        <span class="position-absolute top-50 start-50 translate-middle bg-primary rounded-circle" style="width: 30px; height: 30px"></span>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                                <img src="asset/img/home/contractors/become-pro-cta.jpg" class="position-absolute top-0 end-0 w-50 h-100 object-fit-cover d-none d-md-block" alt="Image">
                              </section>

                            {{-- <section
                                class="elementor-section elementor-top-section elementor-element elementor-element-3ed2471 elementor-section-stretched elementor-section-boxed elementor-section-height-default elementor-section-height-default"
                                data-id="3ed2471" data-element_type="section"
                                data-settings="{&quot;stretch_section&quot;:&quot;section-stretched&quot;}">
                                <div class="elementor-container elementor-column-gap-extended">
                                    <div
                                        class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-cab437d elementor-invisible"
                                        data-id="cab437d" data-element_type="column"
                                        data-settings="{&quot;animation&quot;:&quot;slide-up&quot;}">
                                        <div class="elementor-widget-wrap elementor-element-populated">
                                            <div
                                                class="elementor-element elementor-element-5cd74c6 elementor-widget elementor-widget-heading"
                                                data-id="5cd74c6" data-element_type="widget"
                                                data-widget_type="heading.default">
                                                <div class="elementor-widget-container">
                                                    <h2 class="elementor-heading-title elementor-size-default">
                                                        Frequently Asked Questions</h2></div>
                                            </div>
                                            <div
                                                class="elementor-element elementor-element-a8f3911 elementor-widget elementor-widget-text-editor"
                                                data-id="a8f3911" data-element_type="widget"
                                                data-widget_type="text-editor.default">
                                                <div class="elementor-widget-container">
                                                    Lorem ipsum dolor sit amet, consectetur.
                                                </div>
                                            </div>
                                            <div
                                                class="elementor-element elementor-element-8b53871 elementor-widget__width-initial st-green elementor-widget elementor-widget-accordion"
                                                data-id="8b53871" data-element_type="widget"
                                                data-widget_type="accordion.default">
                                                <div class="elementor-widget-container">
                                                    <style>/*! elementor - v3.21.0 - 24-04-2024 */
                                                        .elementor-accordion {
                                                            text-align: start
                                                        }

                                                        .elementor-accordion .elementor-accordion-item {
                                                            border: 1px solid #d5d8dc
                                                        }

                                                        .elementor-accordion .elementor-accordion-item + .elementor-accordion-item {
                                                            border-top: none
                                                        }

                                                        .elementor-accordion .elementor-tab-title {
                                                            margin: 0;
                                                            padding: 15px 20px;
                                                            font-weight: 700;
                                                            line-height: 1;
                                                            cursor: pointer;
                                                            outline: none
                                                        }

                                                        .elementor-accordion .elementor-tab-title .elementor-accordion-icon {
                                                            display: inline-block;
                                                            width: 1.5em
                                                        }

                                                        .elementor-accordion .elementor-tab-title .elementor-accordion-icon svg {
                                                            width: 1em;
                                                            height: 1em
                                                        }

                                                        .elementor-accordion .elementor-tab-title .elementor-accordion-icon.elementor-accordion-icon-right {
                                                            float: right;
                                                            text-align: right
                                                        }

                                                        .elementor-accordion .elementor-tab-title .elementor-accordion-icon.elementor-accordion-icon-left {
                                                            float: left;
                                                            text-align: left
                                                        }

                                                        .elementor-accordion .elementor-tab-title .elementor-accordion-icon .elementor-accordion-icon-closed {
                                                            display: block
                                                        }

                                                        .elementor-accordion .elementor-tab-title .elementor-accordion-icon .elementor-accordion-icon-opened, .elementor-accordion .elementor-tab-title.elementor-active .elementor-accordion-icon-closed {
                                                            display: none
                                                        }

                                                        .elementor-accordion .elementor-tab-title.elementor-active .elementor-accordion-icon-opened {
                                                            display: block
                                                        }

                                                        .elementor-accordion .elementor-tab-content {
                                                            display: none;
                                                            padding: 15px 20px;
                                                            border-top: 1px solid #d5d8dc
                                                        }

                                                        @media (max-width: 767px) {
                                                            .elementor-accordion .elementor-tab-title {
                                                                padding: 12px 15px
                                                            }

                                                            .elementor-accordion .elementor-tab-title .elementor-accordion-icon {
                                                                width: 1.2em
                                                            }

                                                            .elementor-accordion .elementor-tab-content {
                                                                padding: 7px 15px
                                                            }
                                                        }

                                                        .e-con-inner > .elementor-widget-accordion, .e-con > .elementor-widget-accordion {
                                                            width: var(--container-widget-width);
                                                            --flex-grow: var(--container-widget-flex-grow)
                                                        }</style>
                                                    <div class="elementor-accordion">
                                                        <div class="elementor-accordion-item">
                                                            <div id="elementor-tab-title-1461"
                                                                 class="elementor-tab-title" data-tab="1" role="button"
                                                                 aria-controls="elementor-tab-content-1461"
                                                                 aria-expanded="false">
													<span
                                                        class="elementor-accordion-icon elementor-accordion-icon-right"
                                                        aria-hidden="true">
															<span class="elementor-accordion-icon-closed"><i
                                                                    class="fas fa-plus"></i></span>
								<span class="elementor-accordion-icon-opened"><i class="fas fa-minus"></i></span>
														</span>
                                                                <a class="elementor-accordion-title" tabindex="0">What
                                                                    methods of payments are supported?</a>
                                                            </div>
                                                            <div id="elementor-tab-content-1461"
                                                                 class="elementor-tab-content elementor-clearfix"
                                                                 data-tab="1" role="region"
                                                                 aria-labelledby="elementor-tab-title-1461">Cras vitae
                                                                ac nunc orci. Purus amet tortor non at phasellus
                                                                ultricies hendrerit. Eget a, sit morbi nunc sit id
                                                                massa. Metus, scelerisque volutpat nec sit vel donec.
                                                                Sagittis, id volutpat erat vel.
                                                            </div>
                                                        </div>
                                                        <div class="elementor-accordion-item">
                                                            <div id="elementor-tab-title-1462"
                                                                 class="elementor-tab-title" data-tab="2" role="button"
                                                                 aria-controls="elementor-tab-content-1462"
                                                                 aria-expanded="false">
													<span
                                                        class="elementor-accordion-icon elementor-accordion-icon-right"
                                                        aria-hidden="true">
															<span class="elementor-accordion-icon-closed"><i
                                                                    class="fas fa-plus"></i></span>
								<span class="elementor-accordion-icon-opened"><i class="fas fa-minus"></i></span>
														</span>
                                                                <a class="elementor-accordion-title" tabindex="0">Can I
                                                                    cancel at anytime?</a>
                                                            </div>
                                                            <div id="elementor-tab-content-1462"
                                                                 class="elementor-tab-content elementor-clearfix"
                                                                 data-tab="2" role="region"
                                                                 aria-labelledby="elementor-tab-title-1462">Lorem ipsum
                                                                dolor sit amet, consectetur adipiscing elit, sed do
                                                                eiusmod tempor incididunt ut labore et dolore magna
                                                                aliqua. Ut enim ad minim veniam, quis nostrud
                                                                exercitation ullamco laboris nisi ut aliquip ex ea
                                                                commodo consequat. Duis aute irure dolor in
                                                                reprehenderit in voluptate velit esse cillum dolore eu
                                                                fugiat nulla pariatur.
                                                            </div>
                                                        </div>
                                                        <div class="elementor-accordion-item">
                                                            <div id="elementor-tab-title-1463"
                                                                 class="elementor-tab-title" data-tab="3" role="button"
                                                                 aria-controls="elementor-tab-content-1463"
                                                                 aria-expanded="false">
													<span
                                                        class="elementor-accordion-icon elementor-accordion-icon-right"
                                                        aria-hidden="true">
															<span class="elementor-accordion-icon-closed"><i
                                                                    class="fas fa-plus"></i></span>
								<span class="elementor-accordion-icon-opened"><i class="fas fa-minus"></i></span>
														</span>
                                                                <a class="elementor-accordion-title" tabindex="0">How do
                                                                    I get a receipt for my purchase?</a>
                                                            </div>
                                                            <div id="elementor-tab-content-1463"
                                                                 class="elementor-tab-content elementor-clearfix"
                                                                 data-tab="3" role="region"
                                                                 aria-labelledby="elementor-tab-title-1463">Cras vitae
                                                                ac nunc orci. Purus amet tortor non at phasellus
                                                                ultricies hendrerit. Eget a, sit morbi nunc sit id
                                                                massa. Metus, scelerisque volutpat nec sit vel donec.
                                                                Sagittis, id volutpat erat vel.
                                                            </div>
                                                        </div>
                                                        <div class="elementor-accordion-item">
                                                            <div id="elementor-tab-title-1464"
                                                                 class="elementor-tab-title" data-tab="4" role="button"
                                                                 aria-controls="elementor-tab-content-1464"
                                                                 aria-expanded="false">
													<span
                                                        class="elementor-accordion-icon elementor-accordion-icon-right"
                                                        aria-hidden="true">
															<span class="elementor-accordion-icon-closed"><i
                                                                    class="fas fa-plus"></i></span>
								<span class="elementor-accordion-icon-opened"><i class="fas fa-minus"></i></span>
														</span>
                                                                <a class="elementor-accordion-title" tabindex="0">Which
                                                                    license do I need?</a>
                                                            </div>
                                                            <div id="elementor-tab-content-1464"
                                                                 class="elementor-tab-content elementor-clearfix"
                                                                 data-tab="4" role="region"
                                                                 aria-labelledby="elementor-tab-title-1464">Lorem ipsum
                                                                dolor sit amet, consectetur adipiscing elit, sed do
                                                                eiusmod tempor incididunt ut labore et dolore magna
                                                                aliqua. Ut enim ad minim veniam, quis nostrud
                                                                exercitation ullamco laboris nisi ut aliquip ex ea
                                                                commodo consequat.
                                                            </div>
                                                        </div>
                                                        <div class="elementor-accordion-item">
                                                            <div id="elementor-tab-title-1465"
                                                                 class="elementor-tab-title" data-tab="5" role="button"
                                                                 aria-controls="elementor-tab-content-1465"
                                                                 aria-expanded="false">
													<span
                                                        class="elementor-accordion-icon elementor-accordion-icon-right"
                                                        aria-hidden="true">
															<span class="elementor-accordion-icon-closed"><i
                                                                    class="fas fa-plus"></i></span>
								<span class="elementor-accordion-icon-opened"><i class="fas fa-minus"></i></span>
														</span>
                                                                <a class="elementor-accordion-title" tabindex="0">How do
                                                                    I get access to a theme I purchased?</a>
                                                            </div>
                                                            <div id="elementor-tab-content-1465"
                                                                 class="elementor-tab-content elementor-clearfix"
                                                                 data-tab="5" role="region"
                                                                 aria-labelledby="elementor-tab-title-1465">Cras vitae
                                                                ac nunc orci. Purus amet tortor non at phasellus
                                                                ultricies hendrerit. Eget a, sit morbi nunc sit id
                                                                massa. Metus, scelerisque volutpat nec sit vel donec.
                                                                Sagittis, id volutpat erat vel.
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section> --}}



                        </div>
                    </div><!-- .site-main -->
                </div><!-- .content-area -->
            </div>
        </section>
    </div><!-- .site-content -->
@endsection
