
    
@forelse($jobs as $job)
<article class="position-relative">
  <div class="row flex-lg-nowrap g-0">
    <div class="col-lg-8 p-4">
      <div class="d-flex align-items-start p-xl-2">
        <a class="d-block text-decoration-none flex-shrink-0" href="single-entry-doctors.html">
          <div class="d-md-none" style="width: 48px"></div>
          <div class="d-none d-sm-block d-md-none" style="width: 100px"></div>
          <div class="d-none d-md-block" style="width: 100px"></div>
          <div class="hover-effect-scale rounded overflow-hidden" style="max-width: 80px;">
            @if($job->employer && $job->employer->company_logo)
            <img src="{{ asset($job->employer->company_logo) }}" class="rounded" alt="Image">
            @endif
          </div>
          <div class="d-none d-sm-flex align-items-center justify-content-center gap-1 pt-3">
            {{-- <i class="fi-star-filled text-warning"></i> --}}
            <span class="fs-sm text-secondary-emphasis">Posted</span>
            <span class="fs-xs text-body-secondary align-self-end">{{ $job->created_at->diffForHumans() }}</span>
          </div>
        </a>
        <div class="ps-sm-4 ps-xl-5 pe-xl-3 ms-md-2 ms-xl-0">
          <div class="position-relative">
            <h3 class="d-flex align-items-center gap-2 gap-sm-3 mb-3 mb-sm-4 h5 ms-3 ms-sm-0 mb-2">
              <a class="hover-effect-underline stretched-link" href="{{ route('job.detail', $job->url) }}">{{ $job->job_title }}</a>
              <div class="fs-sm fw-semibold text-dark-emphasis ms-auto ">
                Application deadline : <div class="me-2">{{ $job->application_deadline}}</div>
              </div>
            </h3>
            <div class="d-flex align-items-center gap-3 pb-1 ms-3 ms-sm-0 mb-2">
              <div class="h6 fs-sm mb-0">{{ $job->industry ?? 'N/A' }}</div>
              <div class="d-flex d-sm-none align-items-center gap-1">
                <i class="fi-star-filled text-warning"></i>
                <span class="fs-sm text-secondary-emphasis">4.5</span>
                <span class="fs-xs text-body-secondary align-self-end">(176)</span>
              </div>
            </div>
            <ul class="list-unstyled flex-row flex-wrap align-items-center text-nowrap pt-2 pt-sm-0 ms-n5 ms-sm-0 mb-3">
            
              <li class="d-flex align-items-center gap-1 fs-sm text-dark-emphasis me-2">
                <i class="fi-map-pin fs-base"></i>
                {{ $job->country_id ?? 'Location Not Specified' }}
              </li>
              <li class="d-flex align-items-center gap-2 me-2">
                <span class="badge text-bg-primary">21</span>
                <span class="fs-sm text-dark-emphasis">years experience</span>
              </li>
              <li class="d-flex align-items-center gap-1 fs-sm text-dark-emphasis me-2">
                <i class="fi-baby fs-base"></i>
                Children
              </li>
            </ul>
          </div>
          <p class="fs-sm ms-n5 ms-sm-0">Dr. Michael Johnston, a cardiologist with over two decades of experience, offers advanced cardiovascular care, utilizing cutting-edge techniques and thorough diagnostic analysis. Trust his expertise for all your heart health needs.</p>
          <dl class="ms-n5 ms-sm-0 mb-0">
            <dt class="fs-sm mb-2">Required Skills</dt>
            
            
                @foreach(explode(',', $job->skills) as $skill)
                <div class="d-flex d-inline-flex">
                  
                  {{-- <label class="btn btn-outline-secondary w-100 rounded-pill px-5" for="visit-time-1-1"></label> --}}
                  <span class="badge h4 text-success border border-success d-flex align-items-center">{{ trim($skill) }}</span>
                </div>
                @endforeach
           
          </dl>
          <div class="d-flex d-sm-block d-lg-none flex-column mt-4 ms-n5 ms-sm-0">
            <button type="button" class="btn btn-outline-primary" data-bs-toggle="offcanvas" data-bs-target="#bookAppointment-1" aria-controls="bookAppointment-1">
              Swift Apply
            </button>
          </div>
        </div>
      </div>
    </div>
    <hr class="vr d-none d-lg-block m-0">
    <div class="col-lg-4 p-lg-4">
      <div class="offcanvas-lg offcanvas-end" tabindex="-1" id="bookAppointment-1">
        <div class="offcanvas-header pt-3">
          <h5 class="offcanvas-title">Apply for </h5>
          <button type="button" class="btn-close" data-bs-dismiss="offcanvas" data-bs-target="#bookAppointment-1" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body d-block pt-0 p-xl-2">
          <ul class="list-unstyled gap-1 fs-sm text-body-secondary mb-4">
            <li>
              {{-- <span class="fs-6 fw-semibold text-primary me-1">$75.00</span> --}}
              <strong>Pay</strong> 
            </li>
            <li>
              <span class="fs-6 fw-semibold text-dark-emphasis me-1"> From {{ $job->basic_salary}} a month</span>
             
            </li>

            <li class="gap-4 pt-4 mb-1"> <strong>Job Type: </strong>
                <span class="badge fs-6 fw-semibold text-success-emphasis bg-success-subtle me-1"> {{ $job->hire_type }}</span>
               
              </li>

              <li class="gap-4 pt-4 mb-1"> <strong>Skill Level </strong>
                <span class="badge fs-6 fw-semibold text-success-emphasis bg-success-subtle me-1"> {{ $job->it_skills }}</span>
               
              </li>


          </ul>
          <div class="d-flex gap-4 pb-2 mb-1">
           
            
          </div>
          <a class="btn btn-primary animate-scale ms-n2 me-1 me-sm-2 mt-4" href="">
            <i class="fi-plus fs-lg animate-target ms-n2 me-1 me-sm-2"></i>
           Apply Now
          </a>
        </div>
      </div>
    </div>
  </div>
  <span class="position-absolute top-0 start-0 w-100 h-100 bg-white rounded shadow z-n1 d-none-dark"></span>
  <span class="position-absolute top-0 start-0 w-100 h-100 bg-body-tertiary rounded z-n1 d-none d-block-dark"></span>

 
</article>
@empty

<div>No Record for your Search </div>
        
@endforelse

