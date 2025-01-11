
@extends('shared.layout.employer')
@section('content')
    <!-- Breadcrumb Area -->
    {{-- <div class="breadcrumb-area">
        <h1>welcome, {{Auth::user()->firstname}}</h1>
        <ol class="breadcrumb">
            <li class="item"><a href="{{route('user.home')}}">Home</a></li>
            <li class="item">Dashboard</li>
        </ol>
    </div> --}}
    <!-- End Breadcrumb Area -->

    <!-- Start Notification Alert Area -->
    {{--    <div class="notification-alert alert alert-success alert-dismissible fade show" role="alert">--}}
    {{--        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.--}}
    {{--        <button type="button" class="btn btn-primary" data-bs-dismiss="alert" aria-label="Close">--}}
    {{--            <span aria-hidden="true">&times;</span>--}}
    {{--        </button>--}}
    {{--    </div>--}}
    <!-- End Notification Alert Area -->

    <!-- Start Dashboard Fun Fact Area -->
    {{-- <div class="dashboard-fun-fact-area">
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="stats-fun-fact-box">
                    <div class="icon-box">
                        <i class="ri-briefcase-line"></i>
                    </div>
                    <span class="sub-title"> Your Job Posts</span>
                    <h3>{{$jobs}}</h3>
                </div>
            </div>

            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="stats-fun-fact-box">
                    <div class="icon-box">
                        <i class="ri-file-list-line"></i>
                    </div>
                    <span class="sub-title">Your Applicants</span>
                    <h3>{{$service}}</h3>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="stats-fun-fact-box">
                    <div class="icon-box">
                        <i class="ri-chat-2-line"></i>
                    </div>
                    <span class="sub-title">Messages</span>
                    <h3>{{$messages}}</h3>
                </div>
            </div>

        </div>
    </div> --}}
    <!-- End Dashboard Fun Fact Area -->


  <!-- Account profile content -->
   <div class="col-lg-9">
    <h1 class="h2 pb-2 pb-lg-3">My profile</h1>

    <!-- Wallet + Account progress -->
    <section class="row g-3 g-xl-4 pb-5 mb-md-3">
      <div class="col-md-4 col-lg-4 col-xl-4">
        <div class="card bg-success-subtle border-0 h-100">
          <div class="card-body">
            <h3 class="fs-sm fw-normal mb-2">Jobs</h3>
            <div class="h5 mb-0">{{$jobs}}</div>
          </div>
          <div class="card-footer bg-transparent border-0 pt-0 pb-4 mt-n2 mt-sm-0">
            <a class="position-relative d-inline-flex align-items-center fs-sm fw-medium text-success text-decoration-none" href="#!">
              <span class="hover-effect-underline stretched-link">Available Jobs</span>
              <i class="fi-chevron-right fs-base ms-1"></i>
            </a>
          </div>
        </div>
      </div>

      <div class="col-md-4 col-lg-4 col-xl-4">
        <div class="card bg-success-subtle border-0 h-100">
          <div class="card-body">
            <h3 class="fs-sm fw-normal mb-2">Applications</h3>
            <div class="h5 mb-0">{{$service}}</div>
          </div>
          <div class="card-footer bg-transparent border-0 pt-0 pb-4 mt-n2 mt-sm-0">
            <a class="position-relative d-inline-flex align-items-center fs-sm fw-medium text-success text-decoration-none" href="#!">
              <span class="hover-effect-underline stretched-link">Your Application</span>
              <i class="fi-chevron-right fs-base ms-1"></i>
            </a>
          </div>
        </div>
      </div>

      <div class="col-md-4 col-lg-4 col-xl-4">
        <div class="card bg-warning-subtle border-0 h-100">
          <div class="card-body d-flex align-items-center">
            <div class="circular-progress text-warning flex-shrink-0 ms-n2 ms-sm-0" role="progressbar" style="--fn-progress: 65" aria-label="Warning progress" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100">
              <svg class="progress-circle">
                <circle class="progress-background d-none-dark" r="0" style="stroke: #fff"></circle>
                <circle class="progress-background d-none d-block-dark" r="0" style="stroke: rgba(255,255,255, .1)"></circle>
                <circle class="progress-bar" r="100"></circle>
              </svg>
              <h5 class="position-absolute top-50 start-50 translate-middle text-center mb-0">{{$messages}}</h5>
            </div>
            <div class="ps-3 ps-sm-4">
              <h3 class="h6 pb-1 mb-2">Complete your profile</h3>
              <ul class="list-unstyled fs-sm mb-0">
                <li class="d-flex">
                  <i class="fi-plus fs-base me-2" style="margin-top: .1875rem"></i>
                  Add the languages you speak
                </li>
                <li class="d-flex">
                  <i class="fi-plus fs-base me-2" style="margin-top: .1875rem"></i>
                  Verify your email
                </li>
                <li class="d-flex">
                  <i class="fi-plus fs-base me-2" style="margin-top: .1875rem"></i>
                  Add date of birth
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </section>





  </div> 



@endsection
