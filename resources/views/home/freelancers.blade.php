@extends('home.layouts.content')
@section('content')

<div class="bg-body-tertiary">

    <div class="container pt-4 pb-5 mb-xxl-3 ">

        <!-- Breadcrumb -->
        <nav class="pb-2" aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="home-doctors.html">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">All Services </li>
          </ol>
        </nav>

        <h1 class="h2 pb-lg-2">All Freelancers</h1>


        <div class="col-md-5 col-lg-12">
            <div class="position-relative">
              <form class="bg-white border rounded-4 p-2 mb-4 mb-md-5" data-bs-theme="light" action="{{ route('changeCurrency') }}" method="POST">
                  @csrf

                  <div class="d-flex flex-column flex-md-row gap-3 p-1">
                    <div class="d-flex flex-column flex-sm-row w-100 gap-2 gap-sm-3">
                      <div class="position-relative w-100">
                        <i class="fi-search position-absolute top-50 start-0 translate-middle-y fs-xl text-secondary-emphasis ms-2"></i>
                        <select class="form-select form-select-lg form-icon-start border-0" name="job_category" data-select="{
                          &quot;classNames&quot;: {
                            &quot;containerInner&quot;: [&quot;form-select&quot;, &quot;form-select-lg&quot;, &quot;form-icon-start&quot;, &quot;border-0&quot;]
                          },
                          &quot;searchEnabled&quot;: true
                        }" aria-label="Location select" >

                          <option value="">Select Service Category</option>
                          @foreach (\App\Models\BusinessCategory::all() as $row)
                          <option value="{{ $row->id }}">{{ $row->title }}</option>
                          @endforeach


                        </select>
                      </div>
                      <hr class="d-sm-none m-0">
                      <hr class="vr d-none d-sm-block my-2">
                      <div class="position-relative w-100" style="max-width: 150px">
                        <i class="fi-user position-absolute top-50 start-0 translate-middle-y fs-xl text-secondary-emphasis ms-2"></i>
                        <select class="form-select form-select-lg form-icon-start border-0" name="filter-gender" data-select="{
                          &quot;classNames&quot;: {
                            &quot;containerInner&quot;: [&quot;form-select&quot;, &quot;form-select-lg&quot;, &quot;form-icon-start&quot;, &quot;border-0&quot;]
                          },
                          &quot;searchEnabled&quot;: true
                        }" aria-label="Location select" >
                          <option value="">Gender</option>
                          <option value="Both">Both</option>
                          <option value="Female">Female</option>
                          <option value="Male">Male</option>

                        </select>
                      </div>
                    </div>
                    <button type="submit" class="btn btn-lg btn-primary">Search</button>
                  </div>
                </form>
            </div>
          </div>


          <div class="d-flex align-items-center gap-2 gap-sm-3 mb-3 mb-sm-4">
            <div class="fs-sm text-nowrap">
                <span class="d-none d-sm-inline"> Showing {{ $freelancers->firstItem() }} to {{ $freelancers->lastItem() }} of {{ $freelancers->total() }} result </div>



          </div>


    <section class="bg-body-tertiary py-2 py-sm-3 py-md-4 py-lg-5">
        <div class="container my-xxl-3">
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
                @foreach (\App\Models\User::query()->where('is_admin', 0)->whereNotNull('identity')->limit(30)->get() as $row)
                @php
                    $imagePath = $row->profile_image;
                @endphp
                @if ($row->identity)
                <div class="swiper-slide h-auto">
                    <article class="card h-100 hover-effect-scale hover-effect-opacity border-0 shadow placeholder-wave">
                        <div class="position-absolute  top-0 end-0 z-2 hover-effect-target  pt-1 pt-sm-0 pe-1 pe-sm-0 mt-2 mt-sm-3 me-2 me-sm-3">
                      
                       
                        @if ($row->is_influencer)
                        <span class="badge fs-xm m-2  text-bg-success">Top Influencer</span>
                        @endif

                      
                    </div>
                    <div class="bg-body-light rounded overflow-hidden">
                      <div class="ratio hover-effect-target" style="--fn-aspect-ratio: calc(290 / 416 * 100%)">
                        <img src="{{ !empty($row->profile_image) && file_exists(public_path($imagePath)) ? asset($imagePath) : asset('avata2r.png') }}" alt="Image" class="" style="object-fit: cover;" data-src="{{ !empty($row->profile_image) && file_exists(public_path($imagePath)) ? asset($imagePath) : asset('avata2r.png') }}">
                      </div>
                    </div>
                    <div class="card-body">
                      <ul class="list-unstyled flex-row flex-wrap align-items-center gap-2 fs-sm  placeholder-wave placeholder-glow">
                        <li class="d-flex align-items-center">
                            <i class="fi-star-filled fs-xl text-warning me-2 mb-2"> </i>
                            <span class=""> {{ \App\Helpers\CommonHelpers::freelancerRating( $row->id) }}.0  </span>
                             <span class=""> ( {{ \App\Models\ServiceRating::query()->where('service_id', $row->id)->count() }} Reviews )</span>
                        </li>


                        <li >{{ $row->category_id ?? 'Data Management' }}</li>
                      </ul>
                      <h3 class="h5 pt-1 mb-2 placeholder-glow">
                        <a class="hover-effect-underline stretched-link" href="{{ url('user/' . $row->identity) }}">{{ ucwords($row->full_name) }}</a>
                      </h3>
                      <div class="d-flex align-items-center fs-sm placeholder-glow">
                        <i class="fi-map-pin me-1"></i>
                        {{ $row->state->name }}
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
                      <a href="{{ url('user/' . $row->identity) }}"class="btn btn-outline-dark position-relative z-2 placeholder-glow">View Profile <i class="fi-arrow-right pe-1"></i></a>
                    </div>
                  </article>
                </div>
                @endif
                @endforeach

              </div>

              <!-- Pagination (Bullets) -->
              <div class="swiper-pagination position-static mt-3 mt-md-4"></div>
            </div>
          </div>

          <!-- View all button -->
          <div class="text-center pt-md-2 pt-lg-3">
            {{-- <a class="btn btn-lg btn-primary" href="/freelancers">Load More Freelancer</a> --}}
            {{ $freelancers->links('home.util.pagination') }}
          </div>
        </div>
      </section>


          <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
{{-- <script>
    $(document).ready(function() {
        let offset = 12; // Initial offset, since we load the first 12 by default

        $('#load-more').click(function() {
            $.ajax({
                url: '{{ route("freelancers") }}',
                type: 'GET',
                data: { offset: offset },
                success: function(data) {
                    if (data.length > 0) {
                        data.forEach(freelancer => {
                            $('#freelancer-list').append(`
                                <div class="freelancer-item">
                                    <p>${freelancer.service_description}</p>
                                </div>
                            `);
                        });
                        offset += data.length; // Update the offset for the next request
                    } else {
                        $('#load-more').hide(); // Hide button if no more data
                    }
                },
                error: function(xhr) {
                    console.log(xhr.responseText);
                }
            });
        });
    });
</script> --}}
</div>
@endsection
