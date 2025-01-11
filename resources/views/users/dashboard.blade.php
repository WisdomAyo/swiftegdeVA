
@extends('shared.layout.user')
@section('content')
    <!-- Breadcrumb Area -->

    {{-- <div class="breadcrumb-area">
        <h1>welcome, {{Auth::user()->firstname}}</h1>
        <ol class="breadcrumb">
            <li class="item"><a href="{{route('user.home')}}">Home</a></li>
            <li class="item">Dashboard</li>
        </ol>
    </div>
    <!-- End Breadcrumb Area -->


    <!-- Start Dashboard Fun Fact Area -->
    <div class="dashboard-fun-fact-area">
        <div class="row">

            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="stats-fun-fact-box">
                    <div class="icon-box">
                        <i class="ri-file-list-line"></i>
                    </div>
                    <span class="sub-title">Availability</span>
                    <h3 style="font-size: 12px !important;">{{Auth::user()->availability}}</h3>
                    <a href="{{route('user.profile')}}" class="text-white"> Edit</a>
                    <br />
                </div>
            </div>


            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="stats-fun-fact-box">
                    <div class="icon-box">
                        <i class="ri-file-list-line"></i>
                    </div>
                    <span class="sub-title">Services</span>
                    <h3>{{$service}}</h3>
                </div>
            </div>


        </div>
    </div> --}}


    <!-- End Dashboard Fun Fact Area -->



    @if (session('onboarding_completed'))
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            Swal.fire({
                title: 'Welcome!',
                html: `
                         <p>Congratulations on completing your onboarding! 🎉</p>
                          <img src="https://media.giphy.com/media/l4FGJ5worg45NZFJ2/giphy.gif" width="100" alt="Happiness">
                      `,
                icon: 'success',
                customClass: {
                    popup: 'animated tada' // Add an animation class if desired
                },
                backdrop: `
                    rgba(0,0,123,0.4)
                    url('https://i.giphy.com/media/26AHONQ79FdWZhAI0/giphy.gif') // Happiness emoji animation
                    center left
                    no-repeat
                `,
                confirmButtonText: 'Let\'s Go!'
                timer: 5000
            });
        });
    </script>
@endif

      <!-- Account profile content -->
      <div class="col-lg-9">
        <h1 class="h2 pb-2 pb-lg-3">Welcome Back !, {{Auth::user()->full_name}}</h1>

        <!-- Wallet + Account progress -->
        <section class="row g-3 g-xl-4 pb-5 mb-md-3">
          <div class="col-md-6 col-lg-5 col-xl-6">
            <div class="card bg-success-subtle border-0 h-100">
              <div class="card-body">
                <h6 class="h2 fw-strong mb-2">Availability</h6>
                <div class="fs-sm mb-0">{{Auth::user()->availability}}</div>
              </div>
              <div class="card-footer bg-transparent border-0 pt-0 pb-4 mt-n2 mt-sm-0">
                {{-- <a class="position-relative d-inline-flex align-items-center fs-sm fw-medium text-success text-decoration-none" href="{{route('user.profile')}}">
                  <span class="hover-effect-underline stretched-link">Edit</span>
                  <i class="fi-chevron-right fs-base ms-1"></i>
                </a> --}}
              </div>
            </div>
          </div>
          <div class="col-md-6 col-lg-7 col-xl-6">
            <div class="card bg-warning-subtle border-0 h-100">
              <div class="card-body d-flex align-items-center">
                <div class="circular-progress text-warning flex-shrink-0 ms-n2 ms-sm-0" role="progressbar" style="--fn-progress: 65" aria-label="Warning progress" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100">
                  <svg class="progress-circle">
                    <circle class="progress-background d-none-dark" r="0" style="stroke: #fff"></circle>
                    <circle class="progress-background d-none d-block-dark" r="0" style="stroke: rgba(255,255,255, .1)"></circle>
                    <circle class="progress-bar" r="0"></circle>
                  </svg>
                  <h5 class="position-absolute top-50 start-50 translate-middle text-center mb-0"></h5>
                </div>
                <div class="ps-3 ps-sm-4">
                  <h3 class="h6 pb-1 mb-2">Services</h3>
                  <ul class="list-unstyled fs-sm mb-0">
                    <li class="d-flex">
                      <i class="fi-plus fs-base me-2" style="margin-top: .1875rem"></i>
                      {{$service}}
                    </li>
                    {{-- <li class="d-flex">
                      <i class="fi-plus fs-base me-2" style="margin-top: .1875rem"></i>
                      Verify your email
                    </li>
                    <li class="d-flex">
                      <i class="fi-plus fs-base me-2" style="margin-top: .1875rem"></i>
                      Add date of birth
                    </li> --}}
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </section>


      
        

            <h1 class="h2 pb-1 pb-lg-2">Photos Gallery</h1>
            {{-- <p class="fs-sm mb-0">The maximum photo size is 8 MB. Formats: jpeg, jpg, png. Put the main picture first.</p>
            <p class="fs-sm">The maximum video size is 10 MB. Formats: mp4, mov.</p> --}}
            <div class="border rounded p-3">
              <div class="row row-cols-2 row-cols-sm-3 g-2">

                <!-- Item -->
                @foreach ($galleryImages as $image)
                
                <div class="col">
                    <a class="hover-effect-scale hover-effect-opacity position-relative d-flex rounded overflow-hidden" href="{{ asset($image->images) }}" data-glightbox="" data-gallery="image-gallery">
                      <i class="fi-eye hover-effect-target fs-3 text-white position-absolute top-50 start-50 translate-middle opacity-0 z-2"></i>
                      <span class="hover-effect-target position-absolute top-0 start-0 w-100 h-100 bg-black bg-opacity-25 opacity-0 z-1"></span>
                      <div class="ratio hover-effect-target bg-body-tertiary rounded" style="--fn-aspect-ratio: calc(180 / 268 * 100%)">
                        <img src="{{ asset($image->images) }}" alt="Image"  class="img-fluid" style="object-fit: cover">
                      </div>
                    </a>
                  </div>
               
                @endforeach



                <!-- Upload button -->

              </div>
            </div>


            <div class="modal fade" id="profileModal" tabindex="-1" aria-labelledby="profileModalLabel" aria-hidden="true" data-bs-backdrop="static" tabindex="-1" role="dialog">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content  ">
                        
                        <div class="modal-body ">
                            <div class="modal-content align-items-center shadow">

                            <img src="{{ asset('asset/rb_51232.png') }}" alt="" class=""  style="width: 200px; height:200; object-fit:contain;">
                            
                            <p class="centered"> 🎉 Congratulation 🎉<span class="h6 bold">{{ $user->full_name }} </span>  on Taking the First Step 🌟</p>
                            <span class="p-4 fs-sm bold ">Welcome to the world of remote work and virtual assistance! 🌍✨ Here, opportunities are limitless, and your skills can shine on a global stage. To maximize your chances of being noticed by top recruiters, take a moment to complete your profile.</span>

                            <p class="h6 fw-bold bold mb-3 shadow">Update your profile today and start attracting recruiters!</p>

                        </div>
                        </div>
                        <div class="modal-footer">
                            <a href="{{route('user.profile')}}" class="btn btn-primary">🚀 Get Started Today</a>
                        </div>
                    </div>
                </div>
            </div>
            
            
            <script>
                document.addEventListener('DOMContentLoaded', function () {
                    // Get the identity value from the backend
                    const identity = "{{ $identity }}";
            
                    // Check if identity is null
                    if (!identity) {
                        // Show the modal
                        const profileModal = new bootstrap.Modal(document.getElementById('profileModal'));
                        profileModal.show();
                    }
                });
            </script>




@endsection
