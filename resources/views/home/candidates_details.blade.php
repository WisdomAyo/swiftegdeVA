@extends('home.layouts.content')
@section('content')
    <br /><br />


    <div class="container pt-4 pb-5 mb-xxl-3">

        <!-- Breadcrumb -->
        <nav class="pb-2" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="home-doctors.html">Home</a></li>
                <li class="breadcrumb-item"><a href="listings-list-doctors.html">Freelancer</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ $user->full_name }}</li>
            </ol>
        </nav>

        <div class="row pb-2 pb-sm-3 pb-md-4 pb-lg-5">

            @if (session('error'))
                <div class="notification-alert-danger alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('error') }}
                    <button type="button" class="btn btn-primary" data-bs-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
            @endif


            @if (session('response'))
                <div class="notification-alert alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('response') }}
                    <button type="button" class="btn btn-primary" data-bs-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
            @endif
            <!-- Doctor information + Reviews -->
            <div class="col-lg-8">

                <!-- Doctor information -->
                <div class="position-relative p-4 mb-4">
                    <div class="position-relative z-1 p-xl-2">
                        <div class="d-flex align-items-">
                            <div class="flex-shrink-0">
                                <div class="d-md-none" style="width: 48px"></div>
                                <div class="d-none d-sm-block d-md-none" style="width: 100px"></div>
                                <div class="d-none d-md-block" style="width: 172px"></div>
                                <div class="ratio" style="--fn-aspect-ratio: calc(214 / 172 * 100%)">
                                    @php
                                        $imagePath = $user->profile_image;
                                    @endphp

                                    {{-- @if (!empty($user->profile_image) && file_exists(public_path($imagePath))) --}}
                                    <img src="{{ !empty($user->profile_image) && file_exists(public_path($imagePath)) ? asset($imagePath) : asset('avata2r.png') }}"
                                        class="rounded" alt="Image" style="object-fit: cover">
                                </div>
                            </div>
                            <div class="vstack ps-sm-4 ps-xl-5 ms-md-2 ms-xl-0">
                                <div class="d-flex align-items-start justify-content-between gap-3 pb-1 ms-3 ms-sm-0 mb-2">
                                    <h1 class="h4 mb-0">{{ $user->full_name }}@if($user->is_influencer)  <i class="fi-check-shield"> @endif </i></h1>
                                    <div class="d-flex align-items-center position-relative gap-1 mt-1">

                                        <i class="fi-star-filled text-warning"></i>
                                        <a
                                            class="fs-xs text-secondary-emphasis hover-effect-underline stretched-link text-decoration-none">
                                            {{ \App\Helpers\CommonHelpers::freelancerRating($user->id) }}.0 (
                                            {{ \App\Models\ServiceRating::query()->where('service_id', $user->id)->count() }}
                                            )</a>
                                        <span class="fs-xs text-body-secondary align-self-end">Reviews</span>
                                    </div>
                                </div>
                                <div class="h6 fs-sm ms-3 ms-sm-0 pb-1 mb-2">{{ $user->business_category ?? 'Data Management' }}
                                    <span class="badge text-bg-success pt-2 me-n1 ms-2 ">{{ $user->availability }}</span>
                                </div>
                                <ul
                                    class="list-unstyled flex-row flex-wrap align-items-center text-nowrap pt-2 pt-sm-0 ms-n5 ms-sm-0 mb-0">
                                    <li class="d-flex align-items-center gap-2 me-2">
                                        <span
                                            class="badge text-bg-primary">{{ $user->work_experience ? $user->work_experience : '0' }}</span>
                                        <span class="fs-sm text-dark-emphasis">years experience</span>
                                    </li>
                                    <li class="d-flex align-items-center gap-1 fs-sm text-dark-emphasis me-2">
                                        <i class="fi-user fs-base"></i>

                                    </li>
                                    <li class="d-flex align-items-center gap-1 fs-sm text-dark-emphasis me-2">
                                        <i class="fi-map-pin fs-base"></i>
                                        {{ $user->state->name }} , {{ $user->country->name }}
                                    </li>
                                </ul>
                                <figure class="pt-4 mt-auto ms-n5 ms-sm-0 mb-0">
                                    <blockquote class="blockquote fs-base fw-medium">
                                        <p>{{ Str::limit($user->service_description, 150) }}</p>
                                    </blockquote>
                                    <figcaption class="blockquote-footer d-flex mb-1">
                                        Joined
                                        <i class="fi-bullet align-self-center mx-1"></i>
                                        {{ $user->created_at->diffForHumans() }}
                                    </figcaption>
                                </figure>
                            </div>
                        </div>
                        <h2 class="h4 pt-4 pt-md-5 mt-3 mt-md-0">About Freelancer</h2>
                        <p class="fs-sm mb-0">{{ Str::limit($user->service_description, 1500) }}</p>
                        <dl class="pt-4 pt-md-5 mt-3 mt-md-0 mb-0">
                            <dt class="fs-sm mb-2">Address</dt>
                            <dd class="d-flex flex-wrap gap-2 fs-sm mb-3">
                                <div class="d-flex align-items-center gap-1 me-2">
                                    <i class="fi-map-pin fs-base"></i>
                                    {{ ($user->street_address ?? '') .
                                        ', ' .
                                        ($user->city->name ?? '') .
                                        ' ' .
                                        (is_numeric($user->state->name)
                                            ? $user->state->name ?? 'Unknown State'
                                            : (preg_match('/^[a-zA-Z]+$/', $user->state->name)
                                                ? $user->state->name
                                                : 'Remote')) }}
                                </div>

                                <div class="nav mt-n1">
                                    <a class="nav-link position-relative gap-2 fs-xs py-1 px-0" href="#!">
                                        <i class="fi-map fs-sm"></i>
                                        <span class="hover-effect-underline stretched-link">Show on map</span>
                                    </a>
                                </div>
                            </dd>
                            <dt class="fs-sm mb-2">Skyline Medical Center</dt>
                            <dd class="d-flex flex-wrap gap-2 fs-sm mb-0">
                                <div class="d-flex align-items-center gap-1 me-2">
                                    <i class="fi-map-pin fs-base"></i>
                                    3.2 mi
                                </div>
                                <div class="me-2">233 S Wacker Dr, Chicago, IL 60606</div>
                                <div class="nav mt-n1">
                                    <a class="nav-link position-relative gap-2 fs-xs py-1 px-0" href="#!">
                                        <i class="fi-map fs-sm"></i>
                                        <span class="hover-effect-underline stretched-link">Show on map</span>
                                    </a>
                                </div>
                            </dd>
                        </dl>
                        <h2 class="h4 pt-4 pt-md-5 mt-3 mt-md-0">Skills</h2>
                        {{-- <div class="row row-cols-1 row-cols-sm-2 fs-sm gy-2 ">
                            <div class="col container-fluid">
                                <ul class="list-unstyled flex-row ">
                                    @foreach ($skills as $skill)
                                        <li class="badge text-bg-primary  me-n1">
                                            <span></span>
                                            {{ $skill->title }}
                                            <i class="fi-shield me-n1"></i>
                                        </li>
                                    @endforeach

                                </ul>
                            </div>

                        </div> --}}


                        <div class="d-flex align-items-center gap-3 border-bottom pb-2 mb-4">

                            <div class="w-100 pb-3 overflow-x-auto">
                              <div class="d-flex gap-2">
                                @foreach ($skills as $skill)
                                <button type="button" class="btn btn-sm btn-secondary rounded-pill">
                                  {{-- <i class="fi-close fs-sm me-1 ms-n1"></i> --}}
                                  {{ $skill->title }}
                                </button>
                                @endforeach
                              </div>
                            </div>

                          </div>


                        <h2 class="h4 pt-4 pt-md-5 mt-3 mt-md-0">Education</h2>
                        @foreach ($education as $rw)
                            <ul class="list-unstyled fs-sm">
                                <li>
                                    <span class="fw-medium text-body-emphasis">{{ $rw->title }}</span> -
                                    {{ $rw->year }}
                                </li>
                                <li>
                                    <span class="fw-medium text-body-emphasis">{{ $rw->desc }}</span> -
                                    {{ $rw->purpose }}
                                </li>
                            </ul>
                        @endforeach


                        <h2 class="h4 pt-4 pt-md-5 mt-3 mt-md-0">Work &amp; Exprience </h2>
                        @foreach ($experience as $exp)
                            <ul class="list-unstyled fs-sm">
                                <li>
                                    <span class="fw-medium text-body-emphasis">{{ $exp->title }}</span> -
                                    {{ $exp->year }}
                                </li>
                                <li>
                                    <span class="fw-medium text-body-emphasis">{{ $exp->purpose }}</span>
                                </li>
                                <p>{{ $exp->desc }}</p>
                            </ul>
                        @endforeach


                        
                            <h2 class="h4 pt-4 pt-md-5 mt-3 mt-md-0">Gallery</h2>
                            {{-- <p class="fs-sm mb-0">The maximum photo size is 8 MB. Formats: jpeg, jpg, png. Put the main picture first.</p> --}}
                            <p class="fs-sm">The maximum video size is 10 MB. Formats: mp4, mov.</p>

                            <div class="border w-auto rounded p-3">
                                <div class="row row-cols-2 row-cols-sm-3 g-2">
                                    @if ($galleryImages->isEmpty())
                                        <p>No photos or videos available.</p>
                                    @else
                                        @foreach ($galleryImages as $image)



                                            <div class="col">
                                                <a class="hover-effect-scale hover-effect-opacity position-relative d-flex rounded overflow-hidden" href="{{ asset($image->images) }}" data-glightbox="" data-gallery="image-gallery">
                                                  <i class="fi-zoom-in hover-effect-target fs-3 text-white position-absolute top-50 start-50 translate-middle opacity-0 z-2"></i>
                                                  <span class="hover-effect-target position-absolute top-0 start-0 w-100 h-100 bg-black bg-opacity-25 opacity-0 z-1"></span>
                                                  <div class="ratio hover-effect-target bg-body-tertiary rounded" style="--fn-aspect-ratio: calc(180 / 268 * 100%)">
                                                    <img src="{{ asset($image->images) }}" alt="Image"  class="img-fluid" style="object-fit: cover">
                                                  </div>
                                                </a>
                                              </div>
                                        @endforeach
                                    @endif
                                </div>
                            </div>
                     

                        <h2 class="h4 pt-4 pt-md-5 mt-3 mt-md-0">Awards</h2>
                        @foreach ($awards as $awd)
                            <ul class="list-unstyled fs-sm">
                                <li>
                                    <span class="fw-medium text-body-emphasis">{{ $awd->year }}</span> -
                                    {{ $awd->title }}
                                </li>
                                <li>
                                    <span class="fw-medium text-body-emphasis">{{ $awd->desc }}</span>
                                </li>
                            </ul>
                        @endforeach
                    </div>


                    <span class="position-absolute top-0 start-0 w-100 h-100 bg-white rounded shadow d-none-dark"></span>
                    <span
                        class="position-absolute top-0 start-0 w-100 h-100 bg-body-tertiary rounded d-none d-block-dark"></span>
                </div>



                <!-- Reviews -->
                <div class="position-relative p-4 mt-4" id="reviews" style="scroll-margin-top: 98px">
                    <div class="position-relative z-1 p-xl-2">
                        <div class="d-flex align-items-center justify-content-between mb-4">
                            <h2 class="h4 mb-0">Reviews</h2>
                            <button type="button" class="btn btn-outline-secondary" data-bs-toggle="modal"
                                data-bs-target="#reviewForm">
                                <i class="fi-edit-3 fs-base ms-n1 me-2"></i>
                                Add review
                            </button>
                        </div>

                        <!-- Rating breakdown -->
                        <div class="row g-4 pb-3 mb-3">
                            <div class="col-sm-5 col-md-3 col-lg-4">
                                <div class="vstack h-100 position-relative">
                                    <div
                                        class="d-flex flex-column align-items-center justify-content-center h-100 position-relative z-1 p-4">
                                        <div class="h1 pb-2 mb-1">4.5</div>
                                        <div class="hstack justify-content-center gap-1 fs-sm mb-2">
                                            <i class="fi-star-filled text-warning"></i>
                                            <i class="fi-star-filled text-warning"></i>
                                            <i class="fi-star-filled text-warning"></i>
                                            <i class="fi-star-filled text-warning"></i>
                                            <i class="fi-star-half text-warning"></i>
                                        </div>
                                        <div class="fs-sm">176 reviews</div>
                                    </div>
                                    <span
                                        class="position-absolute top-0 start-0 w-100 h-100 bg-body-tertiary rounded d-none-dark"></span>
                                    <span
                                        class="position-absolute top-0 start-0 w-100 h-100 bg-body-secondary rounded opacity-50 d-none d-block-dark"></span>
                                </div>
                            </div>
                            <div class="col-sm-7 col-md-9 col-lg-8">
                                <div class="vstack gap-3">
                                    <div class="hstack gap-2">
                                        <div class="hstack fs-sm gap-1">
                                            5<i class="fi-star-filled text-warning"></i>
                                        </div>
                                        <div class="progress w-100" role="progressbar" aria-label="Five stars"
                                            aria-valuenow="65" aria-valuemin="0" aria-valuemax="100"
                                            style="height: 4px">
                                            <div class="progress-bar bg-warning rounded-pill" style="width: 65%"></div>
                                        </div>
                                        <div class="fs-sm text-nowrap text-end" style="width: 40px;">128</div>
                                    </div>
                                    <div class="hstack gap-2">
                                        <div class="hstack fs-sm gap-1">
                                            4<i class="fi-star-filled text-warning"></i>
                                        </div>
                                        <div class="progress w-100" role="progressbar" aria-label="Four stars"
                                            aria-valuenow="21" aria-valuemin="0" aria-valuemax="100"
                                            style="height: 4px">
                                            <div class="progress-bar bg-warning rounded-pill" style="width: 21%"></div>
                                        </div>
                                        <div class="fs-sm text-nowrap text-end" style="width: 40px;">27</div>
                                    </div>
                                    <div class="hstack gap-2">
                                        <div class="hstack fs-sm gap-1">
                                            3<i class="fi-star-filled text-warning"></i>
                                        </div>
                                        <div class="progress w-100" role="progressbar" aria-label="Three stars"
                                            aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"
                                            style="height: 4px">
                                            <div class="progress-bar bg-warning rounded-pill" style="width: 10%"></div>
                                        </div>
                                        <div class="fs-sm text-nowrap text-end" style="width: 40px;">13</div>
                                    </div>
                                    <div class="hstack gap-2">
                                        <div class="hstack fs-sm gap-1">
                                            2<i class="fi-star-filled text-warning"></i>
                                        </div>
                                        <div class="progress w-100" role="progressbar" aria-label="Two stars"
                                            aria-valuenow="5" aria-valuemin="0" aria-valuemax="100" style="height: 4px">
                                            <div class="progress-bar bg-warning rounded-pill" style="width: 5%"></div>
                                        </div>
                                        <div class="fs-sm text-nowrap text-end" style="width: 40px;">6</div>
                                    </div>
                                    <div class="hstack gap-2">
                                        <div class="hstack fs-sm gap-1">
                                            1<i class="fi-star-filled text-warning"></i>
                                        </div>
                                        <div class="progress w-100" role="progressbar" aria-label="One star"
                                            aria-valuenow="2.6" aria-valuemin="0" aria-valuemax="100"
                                            style="height: 4px">
                                            <div class="progress-bar bg-warning rounded-pill" style="width: 2.6%"></div>
                                        </div>
                                        <div class="fs-sm text-nowrap text-end" style="width: 40px;">2</div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Reviews -->
                        <div class="vstack gap-4">




                            <!-- Rreview -->
                            @foreach ($reviews as $review)
                                <div class="vstack gap-2 mb-sm-2">
                                    <div class="d-flex align-items-center gap-3 mb-1">
                                        <h6 class="mb-0">{{ $review->full_name }}</h6>
                                        <span
                                            class="fs-xs text-body-secondary">{{ $review->created_at->diffForHumans() }}</span>
                                    </div>
                                    <div class="d-flex gap-1 fs-sm mb-1">
                                        <i class="fi-star-filled text-warning"></i>
                                        <i class="fi-star-filled text-warning"></i>
                                        <i class="fi-star-filled text-warning"></i>
                                        <i class="fi-star-filled text-warning"></i>
                                        <i class="fi-star-filled text-warning"></i>
                                    </div>
                                    <p class="fs-sm mb-1">{{ $review->review }} </p>
                                    <div class="nav align-items-center">
                                        <button type="button"
                                            class="nav-link text-body-secondary animate-scale px-0 me-n1">
                                            <i class="fi-thumbs-up fs-base animate-target me-1"></i>
                                            6
                                        </button>
                                        <hr class="vr my-2 mx-3">
                                        <button type="button"
                                            class="nav-link text-body-secondary animate-scale px-0 ms-n1">
                                            <i class="fi-thumbs-down fs-base animate-target me-1"></i>
                                            0
                                        </button>
                                    </div>
                                </div>
                            @endforeach



                            <!-- Pagination -->
                            {{-- <nav class="pt-1 pt-sm-2 pb-2" aria-label="Reviews pagination">
                    <ul class="pagination">
                      <li class="page-item active" aria-current="page">
                        <span class="page-link">
                          1
                          <span class="visually-hidden">(current)</span>
                        </span>
                      </li>
                      <li class="page-item">
                        <a class="page-link" href="#!">2</a>
                      </li>
                      <li class="page-item">
                        <a class="page-link" href="#!">3</a>
                      </li>
                      <li class="page-item">
                        <a class="page-link" href="#!">4</a>
                      </li>
                      <li class="page-item">
                        <span class="page-link pe-none">...</span>
                      </li>
                      <li class="page-item">
                        <a class="page-link" href="#!">36</a>
                      </li>
                    </ul>
                  </nav> --}}
                        </div>
                    </div>
                    <span class="position-absolute top-0 start-0 w-100 h-100 bg-white rounded shadow d-none-dark"></span>
                    <span
                        class="position-absolute top-0 start-0 w-100 h-100 bg-body-tertiary rounded d-none d-block-dark"></span>
                </div>
            </div>


            <!-- Sidebar with appointment booking form that turns into offcanvas on screens < 992px wide (lg breakpoint) -->
            <div class="col-lg-4" style="margin-top: -100px">
                <div class="offcanvas-lg offcanvas-end sticky-lg-top" id="bookAppointment">
                    <div class="d-none d-lg-block" style="height: 100px"></div>
                    <div class="offcanvas-header pt-3">

                        <button type="button" class="btn-close" data-bs-dismiss="offcanvas"
                            data-bs-target="#bookAppointment" aria-label="Close"></button>
                    </div>


                    <div id="youtubePreview" class="mb-3" style="display: {{ $user->video_url ? 'block' : 'none' }}">
                        @if ($user->video_url)
                            @php
                                // Extract the video ID from the URL
                                preg_match(
                                    '/(?:https?:\/\/)?(?:www\.)?(?:youtube\.com\/(?:[^\/\n\s]+\/\S+\/|(?:v|e(?:mbed)?)\/|\S*?[?&]v=)|youtu\.be\/)([a-zA-Z0-9_-]{11})/',
                                    $user->video_url,
                                    $matches,
                                );
                                $youtubeId = $matches[1] ?? null;
                            @endphp
                            @if ($youtubeId)
                                <iframe width="100%" height="200"
                                    src="https://www.youtube.com/embed/{{ $youtubeId }}" frameborder="0"
                                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                    allowfullscreen>
                                </iframe>
                            @else
                                <p class="text-danger">Invalid YouTube URL</p>
                            @endif
                        @else
                            <p>No video available</p>
                        @endif
                    </div>
                    <div class="offcanvas-body position-relative d-block pt-0 p-lg-4">
                        <div class="position-relative z-1 p-xl-2">

                            @if ($user->compensation_type === 'salary')
                                <span class="fw-bold ">{{ $user->compensation_type }} </span>
                                <div class=" d-flex p-xl-1">
                                    <h3 class="offcanvas-title me-2">{{ $currencySymbols[$currency] }}
                                        {{ number_format($convertedMinAmount, 2) }}</h3> <span class="mt-2">to</span>
                                    <h3 class="offcanvas-title ms-2">{{ $currencySymbols[$currency] }}
                                        {{ number_format($convertedMaxAmount, 2) }}</h3>
                                </div>
                            @else
                                @if ($currencySymbols[$currency] === '$')
                                    <h2 class="offcanvas-title">{{ $currencySymbols[$currency] }}
                                        {{ $user->usd_rate }}/hr</h2>
                                @elseif ($currencySymbols[$currency] === '₦')
                                    <h2 class="offcanvas-title">{{ $currencySymbols[$currency] }}
                                        {{ $user->ngn_rate }}/hr</h2>
                                @elseif ($currencySymbols[$currency] === '£')
                                    <h2 class="offcanvas-title">{{ $currencySymbols[$currency] }}
                                        {{ $user->gbp_rate }}/hr</h2>
                                @elseif ($currencySymbols[$currency] === '€')
                                    <h2 class="offcanvas-title">{{ $currencySymbols[$currency] }}
                                        {{ $user->eur_rate }}/hr</h2>
                                @endif
                            @endif
                            <ul class="list-unstyled gap-1 fs-sm text-body-secondary mb-4">
                                <hr>
                                <li>
                                    <span class="fs-6 fw-semibold text-primary me-3">Location</span>
                                    @if (is_numeric($user->state))
                                        {{ $user->stateName->name ?? 'Remote' }}
                                    @elseif (preg_match('/^[a-zA-Z]+$/', $user->state))
                                        {{ $user->state }}
                                    @else
                                        Remote
                                    @endif
                                </li>
                                <hr>
                                <li>
                                    <span class="fs-6 fw-semibold text-dark-emphasis me-3">Type</span>
                                    Agency Freelancers
                                </li>
                                <hr>
                                <li>
                                    <span class="fs-6 fw-semibold text-dark-emphasis me-3">English Level</span>
                                    Fluent
                                </li>
                                <hr>
                                <li>
                                    <span class="fs-6 fw-semibold text-dark-emphasis me-3">Gender</span>
                                    {{ $user->gender }}
                                </li>
                                <hr>
                                <li>
                                    @if ($user->is_influencer && !empty($user->social_media))
                                        <div class="social-media-links">
                                            <ul>
                                                @foreach (json_decode($user->social_media, true) as $social)
                                                    <li>
                                                        @if ($social === null )
                                                            no social media
                                                            @else
                                                            <strong>{{ ucfirst($social['platform'])  }}:</strong>
                                                        <a href="{{ $social['handle'] }}"
                                                            target="_blank">{{ $social['handle'] }}</a>
                                                        ({{ $social['followers'] }} followers)
                                                        @endif
                                                        
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif
                                </li>
                            </ul>
                            {{-- <div class="d-flex gap-4 pb-2 mb-1">
                    <div class="form-check form-switch">
                      <label class="form-check-label">
                        <input type="radio" class="form-check-input" name="visit-method" checked="">
                        Online
                      </label>
                    </div>
                    <div class="form-check form-switch">
                      <label class="form-check-label">
                        <input type="radio" class="form-check-input" name="visit-method">
                        Visit clinic
                      </label>
                    </div>
                  </div>

                  <div class="btn-group w-100" role="group" aria-label="Date/time selection">
                    <input type="radio" class="btn-check" name="visit-day" id="visit-day-1" checked="">
                    <label class="btn btn-outline-info w-100 px-2" for="visit-day-1">Mon, 11</label>
                    <input type="radio" class="btn-check" name="visit-day" id="visit-day-2" checked="">
                    <label class="btn btn-outline-info w-100 px-2" for="visit-day-2">Tue, 12</label>
                    <input type="radio" class="btn-check" name="visit-day" id="visit-day-3">
                    <label class="btn btn-outline-info w-100 px-2" for="visit-day-3">Wed, 13</label>
                    <button type="button" class="btn btn-icon btn-outline-info flex-grow-0 px-2" aria-label="Next">
                      <i class="fi-chevron-right fs-lg"></i>
                    </button>
                  </div>
                  <div class="row row-cols-4 g-2 pt-4 pb-2">
                    <div class="col">
                      <input type="radio" class="btn-check" name="visit-time" id="visit-time-1">
                      <label class="btn btn-outline-secondary w-100 rounded-pill px-2" for="visit-time-1">10:00</label>
                    </div>
                    <div class="col">
                      <input type="radio" class="btn-check" name="visit-time" id="visit-time-2">
                      <label class="btn btn-outline-secondary w-100 rounded-pill px-2" for="visit-time-2">10:30</label>
                    </div>
                    <div class="col">
                      <input type="radio" class="btn-check" name="visit-time" id="visit-time-3">
                      <label class="btn btn-outline-secondary w-100 rounded-pill px-2" for="visit-time-3">11:00</label>
                    </div>
                    <div class="col">
                      <input type="radio" class="btn-check" name="visit-time" id="visit-time-4">
                      <label class="btn btn-outline-secondary w-100 rounded-pill px-2" for="visit-time-4">11:30</label>
                    </div>
                    <div class="col">
                      <input type="radio" class="btn-check" name="visit-time" id="visit-time-5">
                      <label class="btn btn-outline-secondary w-100 rounded-pill px-2" for="visit-time-5">12:00</label>
                    </div>
                    <div class="col">
                      <input type="radio" class="btn-check" name="visit-time" id="visit-time-6" checked="">
                      <label class="btn btn-outline-secondary w-100 rounded-pill px-2" for="visit-time-6">12:30</label>
                    </div>
                    <div class="col">
                      <input type="radio" class="btn-check" name="visit-time" id="visit-time-7">
                      <label class="btn btn-outline-secondary w-100 rounded-pill px-2" for="visit-time-7">13:00</label>
                    </div>
                    <div class="col">
                      <input type="radio" class="btn-check" name="visit-time" id="visit-time-8">
                      <label class="btn btn-outline-secondary w-100 rounded-pill px-2" for="visit-time-8">13:30</label>
                    </div>
                    <div class="col">
                      <input type="radio" class="btn-check" name="visit-time" id="visit-time-9">
                      <label class="btn btn-outline-secondary w-100 rounded-pill px-2" for="visit-time-9">14:00</label>
                    </div>
                    <div class="col">
                      <input type="radio" class="btn-check" name="visit-time" id="visit-time-10">
                      <label class="btn btn-outline-secondary w-100 rounded-pill px-2" for="visit-time-10">14:30</label>
                    </div>
                    <div class="col">
                      <input type="radio" class="btn-check" name="visit-time" id="visit-time-11">
                      <label class="btn btn-outline-secondary w-100 rounded-pill px-2" for="visit-time-11">15:00</label>
                    </div>
                    <div class="col">
                      <input type="radio" class="btn-check" name="visit-time" id="visit-time-12">
                      <label class="btn btn-outline-secondary w-100 rounded-pill px-2" for="visit-time-12">15:30</label>
                    </div>
                  </div> --}}
                            <button type="button" class="btn btn-lg btn-primary w-100 mt-4" data-bs-toggle="modal"
                                data-bs-target="#modalContact">
                                <i class="fi-clock fs-lg me-2 ms-n1 d-lg-none d-xl-inline-flex"></i>
                                Contact Me Now
                            </button>
                        </div>

                        <div class="position-absolute top-0 start-0 w-100 h-100 d-none d-lg-block">
                            <span
                                class="position-absolute top-0 start-0 w-100 h-100 bg-white rounded shadow d-none-dark"></span>
                            <span
                                class="position-absolute top-0 start-0 w-100 h-100 bg-body-tertiary rounded d-none d-block-dark"></span>
                        </div>
                    </div>
                </div>
            </div>

        </div>



        <!-- Row of cards that turns into carousel on screens < 992px wide (lg breakpoint) -->
        <div class="swiper pb-2 pb-sm-3 pb-md-4 pb-lg-5"
            data-swiper="{
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
            &quot;768&quot;: {
              &quot;slidesPerView&quot;: 3
            },
            &quot;992&quot;: {
              &quot;slidesPerView&quot;: 4
            }
          }
        }">
            <div class="swiper-wrapper">






                <!-- Pagination (Bullets) -->
                <div class="swiper-pagination position-static mt-3"></div>
            </div>
        </div>
    </div>

    @if (isset(Auth::user()->id) && Auth::user()->is_admin == 0)
        <div class="modal fade" id="reviewForm" data-bs-backdrop="static" tabindex="-1"
            aria-labelledby="reviewFormLabel" aria-hidden="true">

            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                <form class="modal-content needs-validation" novalidate=""
                    action="{{ route('freelancer.review.save') }}" method="post" id="commentform"
                    enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="modal-header border-0">
                        <h5 class="modal-title" id="reviewFormLabel">Leave a review</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body pb-3 pt-0">
                        <div class="mb-3">
                            <label for="review-name" class="form-label">Your name <span
                                    class="text-danger">*</span></label>
                            <input type="text" name="author" class="form-control  form-control-lg" id="review-name"
                                required="">
                            <div class="invalid-feedback">Please enter your name!</div>
                            <small class="form-text">Will be displayed on the comment.</small>
                        </div>
                        <div class="mb-3">
                            <label for="review-email" class="form-label">Your email <span
                                    class="text-danger">*</span></label>
                            <input type="email" name="email" class="form-control form-control-lg" id="review-email"
                                required="">

                        </div>
                        <div class="mb-3">
                            <label class="form-label">Rating <span class="text-danger">*</span></label>
                            <select type="hidden" name="rating" class="form-select-lg"
                                data-select="{
                  &quot;placeholderValue&quot;: &quot;Select rating&quot;,
                  &quot;choices&quot;: [
                    {
                      &quot;value&quot;: &quot;&quot;,
                      &quot;label&quot;: &quot;Select rating&quot;,
                      &quot;placeholder&quot;: true
                    },
                    {
                      &quot;value&quot;: &quot;1&quot;,
                      &quot;label&quot;: &quot;<span class=\&quot;visually-hidden\&quot;>1 star</span>&quot;,
                      &quot;customProperties&quot;: {
                        &quot;icon&quot;: &quot;<span class=\&quot;d-flex gap-1 py-1\&quot;><i class=\&quot;fi-star-filled text-warning\&quot;></i></span>&quot;,
                        &quot;selected&quot;: &quot;1 star&quot;
                      }
                    },
                    {
                      &quot;value&quot;: &quot;2&quot;,
                      &quot;label&quot;: &quot;<span class=\&quot;visually-hidden\&quot;>2 stars</span>&quot;,
                      &quot;customProperties&quot;: {
                        &quot;icon&quot;: &quot;<span class=\&quot;d-flex gap-1 py-1\&quot;><i class=\&quot;fi-star-filled text-warning\&quot;></i><i class=\&quot;fi-star-filled text-warning\&quot;></i></span>&quot;,
                        &quot;selected&quot;: &quot;2 stars&quot;
                      }
                    },
                    {
                      &quot;value&quot;: &quot;3&quot;,
                      &quot;label&quot;: &quot;<span class=\&quot;visually-hidden\&quot;>3 stars</span>&quot;,
                      &quot;customProperties&quot;: {
                        &quot;icon&quot;: &quot;<span class=\&quot;d-flex gap-1 py-1\&quot;><i class=\&quot;fi-star-filled text-warning\&quot;></i><i class=\&quot;fi-star-filled text-warning\&quot;></i><i class=\&quot;fi-star-filled text-warning\&quot;></i></span>&quot;,
                        &quot;selected&quot;: &quot;3 stars&quot;
                      }
                    },
                    {
                      &quot;value&quot;: &quot;4&quot;,
                      &quot;label&quot;: &quot;<span class=\&quot;visually-hidden\&quot;>4 stars</span>&quot;,
                      &quot;customProperties&quot;: {
                        &quot;icon&quot;: &quot;<span class=\&quot;d-flex gap-1 py-1\&quot;><i class=\&quot;fi-star-filled text-warning\&quot;></i><i class=\&quot;fi-star-filled text-warning\&quot;></i><i class=\&quot;fi-star-filled text-warning\&quot;></i><i class=\&quot;ci-star-filled text-warning\&quot;></i></span>&quot;,
                        &quot;selected&quot;: &quot;4 stars&quot;
                      }
                    },
                    {
                      &quot;value&quot;: &quot;5&quot;,
                      &quot;label&quot;: &quot;<span class=\&quot;visually-hidden\&quot;>5 stars</span>&quot;,
                      &quot;customProperties&quot;: {
                        &quot;icon&quot;: &quot;<span class=\&quot;d-flex gap-1 py-1\&quot;><i class=\&quot;fi-star-filled text-warning\&quot;></i><i class=\&quot;fi-star-filled text-warning\&quot;></i><i class=\&quot;fi-star-filled text-warning\&quot;></i><i class=\&quot;fi-star-filled text-warning\&quot;></i><i class=\&quot;ci-star-filled text-warning\&quot;></i></span>&quot;,
                        &quot;selected&quot;: &quot;5 stars&quot;
                      }
                    }
                  ]
                }"
                                data-select-template="true" aria-label="Rating select" required=""></select>
                            <div class="invalid-feedback">Please select your rating!</div>
                        </div>

                        <div>
                            <label class="form-label" for="review-text">Review <span class="text-danger">*</span></label>
                            <textarea class="form-control" rows="4" id="review-text" name="review required=""></textarea>
                            <div class="invalid-feedback">Please write a review!</div>
                            <small class="form-text">Your review must be at least 50 characters.</small>
                        </div>
                        <input type="hidden" value="{{ $user->id }}" name="user_id" />
                    </div>
                    <div class="modal-footer flex-nowrap gap-3 border-0 px-4">
                        <button type="reset" class="btn btn-secondary w-100 m-0"
                            data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary w-100 m-0">Submit review</button>
                    </div>
                </form>
            </div>
        </div>
    @endif

    <div class="modal fade" id="modalContact" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body tab-content px-sm-5 pb-sm-5">

                    <!-- Tab with sign in form -->
                    <div class="tab-pane fade show active" id="signin" role="tabpanel">
                        <h2 class="h5 mb-4">Contact Me </h2>
                        <form method="post" action="{{ route('freelancers.now') }}">
                            {{ csrf_field() }}

                            <div class="position-relative mb-4">
                                <input type="text" class="form-control form-control-lg" name="full_name"
                                    placeholder="Your Fill Name" required>
                            </div>
                            <div class="position-relative mb-4">
                                <input type="text" class="form-control form-control-lg" name="subject"
                                    placeholder="Subject" required>
                            </div>
                            <div class="position-relative mb-4">
                                <input type="email" class="form-control form-control-lg" name="email"
                                    placeholder="Email" required>
                            </div>
                            <div class="position-relative mb-4">
                                <input type="text" class="form-control  form-control-lg" name="phone_number"
                                    placeholder="Phone" required>
                            </div>
                            <div class="form-group mb-4">
                                <textarea class="form-control form-control-lg" name="message" placeholder="Message" required="required"
                                    rows="4"></textarea>
                            </div>
                            <input type="hidden" name="freelancer_id" value=" {{ $user->id }}">


                            <button type="submit" name="contact-form" class="btn btn-primary w-100">Book Now</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
