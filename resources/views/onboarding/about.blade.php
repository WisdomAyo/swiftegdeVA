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
                    <li class="active" style="width:16.67%; font-size:12px">{{__('About Me')}}</li>
                    <li class="" style="width:16.67%; font-size:12px">{{__('Location')}}</li>
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

        <form method="post" action="{{ route('aboutUpdate') }}" style="color:#000000;" onsubmit="return validateWordCount();">
            @csrf

            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="form-group">
                        <label>Write a Powerful ‘About Me’ to Attract Clients (min 200 words)</label>
                        <textarea name="service_description" id="service_description" rows="10" class="form-control"></textarea>
                        <small id="wordCountMessage" class="text-danger"></small>
                    </div>
                </div>

                <div class="col-lg-12 col-md-12 d-flex justify-content-between">
                    <a href="{{ route('onboarding.profile_picture') }}" class="default-btn">Previous</a>
                    <button type="submit" class="default-btn">Save and Continue <i class="flaticon-send"></i></button>
                </div>
            </div>
        </form>

        <script>
            function validateWordCount() {
                const description = document.getElementById('service_description').value;
                const wordCount = description.trim().split(/\s+/).length;
                const wordCountMessage = document.getElementById('wordCountMessage');

                if (wordCount < 200) {
                    wordCountMessage.textContent = 'Your description must be at least 200 words. Currently, it is ' + wordCount + ' words.';
                    return false;
                }

                wordCountMessage.textContent = ''; // Clear any previous messages
                return true;
            }
        </script>

    </div>
</div>

<script>
    // Preview avatar before upload
    document.getElementById('profilePicture').addEventListener('change', function(e) {
        const file = e.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(event) {
                document.getElementById('avatarPreview').setAttribute('src', event.target.result);
            };
            reader.readAsDataURL(file);
        }
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
                <a class="nav-link d-inline-flex px-0 px-lg-3 pe-none" aria-current="page">
                  <i class="fi-arrow-right-circle d-none d-lg-inline-flex fs-lg me-2"></i>
                  {{__('About Me')}}
                </a>
              </li>
              <li class="nat-item">
                <a class="nav-link d-inline-flex px-0 px-lg-3 disabled">
                  <i class="fi-circle fs-lg me-2"></i>
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
          <h1 class="h2 mb-n2 mb-lg-3">About me</h1>

          <div class="row pt-md-1 pt-lg-2 pt-xl-3 pb-2 pb-sm-3 pb-md-4 pb-lg-5">

            <!-- Inputs -->
            <div class="col-lg-12">

                @if(session('response'))
                <div class="notification-alert alert alert-success alert-dismissible fade show" role="alert">
                    {{session('response')}}
                    <button type="button" class="btn btn-primary" data-bs-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                @endif

              <!-- Profile photo -->
              <form  id="onboarding-form" action="{{ route('onboarding.update') }}" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}

              <div class="d-flex align-items-start align-items-sm-center">
                <div class="pt-5">
                    <label for="about" class="form-label text-danger">Write a Powerful ‘About Me’ to Attract Clients (min 100 words)</label>
                    <textarea class="form-control form-control-lg"  name="service_description" id="about-textarea" rows="10" cols="100" placeholder="Your description must be at least 200 words.">{{ $service_description ?? '' }}</textarea>
                    <div id="word-counter" class="form-label mb-3">200 words left</div>
                    <input type="hidden" name="step" value="about">

                    <div class="mt-3">
                        <button type="submit" class="btn btn-success">Save & Next <i class="fi-chevron-right fs-lg ms-1 me-n2"></i></button>
                    </div>
                  </div>


              </div>





              <!-- Next step button -->

            </form>
            </div>


            <!-- Illustration -->


          </div>
        </div>
        </div>
      </div>
    </div>
  </main>



{{--
  <script>
    // Preview avatar before upload
    document.getElementById('profilePicture').addEventListener('change', function(e) {
        const file = e.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(event) {
                document.getElementById('avatarPreview').setAttribute('src', event.target.result);
            };
            reader.readAsDataURL(file);
        }
    });
</script> --}}


<script>


document.addEventListener('DOMContentLoaded', function () {
    const aboutTextarea = document.querySelector('#about-textarea');
    const wordCounter = document.querySelector('#word-counter');

    if (aboutTextarea && wordCounter) {
        aboutTextarea.addEventListener('input', function () {
            const wordCount = this.value.trim().split(/\s+/).length;
            const wordsLeft = 100 - wordCount;
            if (wordsLeft > 0) {
                wordCounter.textContent = `${wordsLeft} words remaining`;
                wordCounter.style.color = 'red';
            } else {
                wordCounter.textContent = 'Word count met but you can continue writing';
                wordCounter.style.color = 'green';
            }
        });
    }
});


document.addEventListener('DOMContentLoaded', function () {
    @if(session('success'))
        Swal.fire('Success', '{{ session('success') }}', 'success');
    @elseif($errors->any())
        Swal.fire('Error', '{{ $errors->first() }}', 'error');
    @endif
});
</script>


