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
                    <li class="active" style="width:16.67%; font-size:12px">{{__('Upload Picture')}}</li>
                    <li class="" style="width:16.67%; font-size:12px">{{__('About Me')}}</li>
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

        <form method="post" action="{{ route('upimage')}}" enctype="multipart/form-data" style="color:#000000;">
            {{ csrf_field() }}

            <!-- Avatar Preview -->
            <div class="avatar-preview">
                @if(Auth::user()->profile_image)
                    <!-- Show the user's profile image if it exists -->
                    <img id="avatarPreview" src="{{ asset( Auth::user()->profile_image) }}" alt="Avatar Preview" style="width: 150px; height: 150px;">
                @else
                    <!-- Show placeholder if no profile image is found -->
                    <img id="avatarPreview" src="https://via.placeholder.com/150" alt="Avatar Preview" style="width: 150px; height: 150px;">
                @endif
            </div>

            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="form-group">
                        <label>Profile Photo</label>
                        <input type="file" class="form-control" name="profile_picture" id="profilePicture" accept="image/*">
                        <input type="hidden" name="home" value="home">
                    </div>
                </div>

                <div class="col-lg-12 col-md-12 text-right">
                    <button type="submit" class="default-btn">Save and Continue <i class="flaticon-send"></i></button>
                </div>
            </div>
        </form>

        <!-- JavaScript to preview the new image -->
        <script>
            document.getElementById('profilePicture').addEventListener('change', function(event) {
                const [file] = event.target.files;
                if (file) {
                    document.getElementById('avatarPreview').src = URL.createObjectURL(file);
                }
            });
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
                <a class="nav-link d-inline-flex px-0 px-lg-3 pe-none" aria-current="page">
                  <i class="fi-arrow-right-circle d-none d-lg-inline-flex fs-lg me-2"></i>
                  <i class="fi-arrow-down-circle d-lg-none fs-lg me-2"></i>
                  {{__('Upload Picture')}}
                </a>
              </li>
              <li class="nat-item">
                <a class="nav-link d-inline-flex px-0 px-lg-3 disabled">
                  <i class="fi-circle fs-lg me-2"></i>
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
          <h1 class="h2 mb-n2 mb-lg-3">Upload Picture</h1>

          <div class="row pt-md-1 pt-lg-2 pt-xl-3 pb-2 pb-sm-3 pb-md-4 pb-lg-5">

            <!-- Inputs -->
            <div class="col-lg-7">

                @if(session('response'))
                <div class="notification-alert alert alert-success alert-dismissible fade show" role="alert">
                    {{session('response')}}
                    <button type="button" class="btn btn-primary" data-bs-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                @endif

              <!-- Profile photo -->
              <h1 class="h3 pb-sm-1 pb-md-2">Add your profile photo</h1>
              <form id="onboarding-form"  action="{{ route('onboarding.update') }}" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}

              <div class="d-flex align-items-start align-items-sm-center">
                <div class="ratio ratio-1x1 hover-effect-opacity bg-body-tertiary border rounded-circle overflow-hidden" style="width: 160px">
                    @if (Auth::user()->profile_picture)
                    <img id="avatarPreview" src="{{ asset('storage/' . $profile_picture) }}" alt="Avatar">
                    @else
                    <img id="avatarPreview" src="https://via.placeholder.com/150" alt="Avatar Preview">
                    @endif


                  <div class="hover-effect-target position-absolute top-0 start-0 d-flex align-items-center justify-content-center w-100 h-100 opacity-0">
                    <button type="button" class="btn btn-icon btn-sm btn-light position-relative z-2" aria-label="Remove">
                      <i class="fi-trash fs-base"></i>
                    </button>
                    <span class="position-absolute top-0 start-0 w-100 h-100 bg-black bg-opacity-25 z-1"></span>
                  </div>
                </div>
                <div class="ps-3 ps-sm-4">
                  <p class="fs-sm" style="max-width: 440px">Your profile photo will appear on your profile and directory listing. PNG or JPG no bigger than 1000px wide and tall.</p>
                  {{-- <button type="button" class="btn btn-sm btn-outline-secondary">
                    <i class="fi-refresh-ccw fs-sm ms-n1 me-2"></i>
                    Update photo
                  </button> --}}
                  <input type="file" class="form-control" name="profile_image" id="profilePicture" accept="image/*">
                  <input type="hidden" name="step" value="profile_picture">


                <div class="mt-3">
                    <button type="submit" class="btn btn-success">Save<i class="fi-chevron-right fs-lg ms-1 me-n2"></i></button>
                </div>
                </div>


              </div>





              <!-- Next step button -->

            </form>
            </div>


            <!-- Illustration -->
            <div class="col-lg-5 d-none d-lg-block">
              <svg xmlns="http://www.w3.org/2000/svg" width="526" viewBox="0 0 526 526" fill="none"><rect x="25.5" y="74.5" width="476" height="377" rx="18.5" stroke="currentColor" stroke-width="5" style="color: var(--fn-info-border-subtle)"></rect><path fill="currentColor" d="M28 77h471v30H28z" style="color: var(--fn-info-border-subtle)"></path><g fill="currentColor" style="color: var(--fn-body-bg)"><circle cx="51.5" cy="92.5" r="5.5"></circle><circle cx="69.5" cy="92.5" r="5.5"></circle><circle cx="87.5" cy="92.5" r="5.5"></circle></g><g clip-path="url(#A)"><circle class="text-info" cx="104.5" cy="183.5" r="52" stroke="currentColor"></circle><g class="text-info" fill="currentColor"><path d="M88.559 157c-.376-.02-.673 0-.99.019-.218.02-.455.02-.633.06-.218.039-.356.138-.515.217-.099.059-.178.099-.237.178.099.04.158.158.277.178 1.583.553 3.028.257 4.473-.297l-1.742-.276c-.198-.04-.435-.06-.633-.079zm38.455 17.83c.039.455.02.91.02 1.384.396-.079.653-.237.752-.474.178-.455-.198-1.147-1.01-2.017.08.356.198.732.238 1.107zm-37.032 54.797l4.473-16.882-1.069-.336-2.91 10.971-1.564 5.871 1.069.376zm27.832-.475c.376-.158.693-.237 1.089-.395l-.614-6.603-1.108-12.058-1.049.751 1.682 18.305z"></path></g><path d="M56.375 306.662l10.668-.178-.356-.929 2.237-.04 6.116-71.757.099-1.225.376-4.409c0-.039 0-.079.02-.118-5.878 2.372-17.892 9.31-22.939 12.79l.119 1.937 3.503 61.675.158 2.254z" fill="currentColor" style="color: var(--fn-info-border-subtle)"></path><g class="text-info" fill="currentColor"><path d="M81.392 200.133c.079-.02.178.02.277 0 .396-.119.574.514.178.613a5.92 5.92 0 0 1-5.364-1.186c-1.425-1.226-2.157-3.183-1.94-5.061.04-.395.693-.415.633 0-.198 1.68.416 3.4 1.682 4.527 1.148 1.028 2.771 1.344 4.275 1.107-2.87.198-5.483-1.977-5.799-4.982-.317-3.064 1.841-5.811 4.81-6.128l.554-.039c.396 0 .752.138 1.108.217l.099-1.087c-.04 0-.079-.02-.119-.02l-.04.02c-.02 0-.04-.039-.059-.039-.336-.06-.633-.198-.99-.198-.237 0-.455.02-.673.039-3.582.376-6.195 3.677-5.799 7.354.376 3.44 3.226 6.009 6.551 6.009.238 0 .455-.019.673-.039.396-.04.732-.237 1.108-.356-.099-.336-.178-.712-.257-1.067-.317.138-.594.276-.91.316zm-4.017-6.385a3.08 3.08 0 0 0 1.564 3.242c.356.198.693-.356.317-.554-.891-.474-1.445-1.522-1.267-2.51s1.069-1.799 2.078-1.918c.396-.039.416-.672 0-.632-1.287.138-2.454 1.087-2.692 2.372z"></path><path d="M76.842 199.046c-1.267-1.127-1.88-2.847-1.682-4.527.04-.415-.594-.396-.633 0-.218 1.858.515 3.835 1.94 5.06 1.465 1.266 3.503 1.7 5.364 1.186.396-.118.218-.731-.178-.612-.079.019-.178-.02-.277 0s-.178 0-.277 0c-1.504.237-3.107-.079-4.255-1.107zm47.798-10.734l.08.87c.554-.119 1.088-.218 1.662-.159 2.989.317 5.146 3.064 4.81 6.128-.297 2.807-2.573 4.883-5.225 4.982 1.345.079 2.711-.218 3.721-1.127 1.266-1.127 1.88-2.846 1.682-4.527-.04-.415.594-.395.633 0 .218 1.858-.514 3.835-1.939 5.061-1.465 1.265-3.504 1.7-5.364 1.186-.396-.119-.218-.731.178-.613.079.02.178-.02.257 0-.316-.039-.594-.198-.89-.277l-.258 1.068c.376.118.713.316 1.109.356l.673.039c3.305 0 6.175-2.57 6.551-6.009.396-3.677-2.217-6.978-5.799-7.354l-.673-.039c-.238 0-.436.098-.673.138-.139.198-.317.356-.535.277zm3.899 5.614c.198 1.008-.376 2.056-1.267 2.51-.356.198-.039.732.317.554 1.148-.613 1.801-1.957 1.563-3.242-.257-1.285-1.405-2.254-2.691-2.372-.416-.04-.396.593 0 .632a2.42 2.42 0 0 1 2.078 1.918z"></path><path d="M124.858 200.133c-.396-.119-.574.514-.179.613a5.92 5.92 0 0 0 5.364-1.186c1.425-1.226 2.158-3.183 1.94-5.061-.04-.395-.693-.415-.634 0 .198 1.68-.415 3.4-1.682 4.527-1.009.909-2.375 1.186-3.721 1.127-.277-.02-.554.039-.831-.02-.079-.02-.158.02-.257 0zm-26.639 13.818l.99.138a5.86 5.86 0 0 1 .237.04l.515.039 3.305.158 3.306-.158.534-.039-.02-.554.238.534.989-.139c2.89-.474 5.463-1.66 7.838-3.123.376-.237.693-.494 1.049-.751.812-.593 1.742-1.028 2.454-1.72 2.059-2.036 3.484-4.527 4.335-7.433.099-.336.178-.711.257-1.067.713-2.945.931-6.286.535-10.141 0-.099-.04-.356-.04-.534l-.079-.869-1.148-.356.158 1.878c.812 7.927-.752 13.719-4.809 17.731-2.771 2.728-6.571 4.606-10.827 5.298l-.811.119c-.079 0-.139.02-.238.039l-.495.04c-1.999.198-4.393.198-6.412 0l-.535-.04c-.059-.019-.138-.019-.158-.019-.337-.04-.653-.079-.97-.139-4.156-.672-7.957-2.55-10.708-5.298-4.058-4.012-5.621-9.804-4.81-17.731.02-.297.099-1.068.178-2.036l-1.148.276v.06l-.099 1.087a6.01 6.01 0 0 0-.04.494c-.396 3.855-.178 7.196.534 10.141.079.356.158.712.257 1.067.871 2.906 2.276 5.397 4.335 7.433 1.781 1.779 4.058 3.044 6.492 4.053.337.138.713.217 1.069.336 1.227.435 2.415.968 3.741 1.186zm-15.243-41.078c-.218 5.021-.673 10.695-1.009 14.154l1.108-.336c.336-3.222.772-8.579 1.009-13.264-.317-.099-.772-.336-1.108-.554zm-.099 13.146c0 .336-.673.454-.673 0 .218-2.57.455-5.12.554-7.571a.34.34 0 0 1 .673 0c-.218 2.451-.336 5.021-.554 7.571zm40.517.85l.218.059-.079-1.423c-.02-.178.158-.317.316-.317.178 0 .317.159.317.317l.099 1.64.277.079-.475-6.108c-.416-.02-.772-.099-1.148-.277l.475 6.03zm-21.891 7.867c-.456-2.115.415-4.289 1.167-6.227.139-.375-.475-.553-.613-.177-.812 2.134-1.722 4.526-1.109 6.839.456 1.7 1.762 3.301 3.603 3.558.395.06.574-.553.178-.612-1.742-.218-2.87-1.76-3.226-3.381zm-10.432-10.477l.178-.296c.02-.02.059-.099.099-.139.02-.019.099-.118.119-.138l.237-.257.237-.217c.02-.02.059-.04.079-.06l.534-.356a1.88 1.88 0 0 1 .277-.138c.02 0 .04-.02.079-.039.198-.08.396-.139.594-.198.119-.02.218-.059.337-.079 0 0 .04 0 .079-.02.218-.02.435-.039.673-.02.673.02 1.306-.593 1.267-1.265-.04-.712-.554-1.245-1.267-1.265-2.316-.059-4.572 1.226-5.74 3.202-.337.574-.158 1.424.455 1.74.633.336 1.405.158 1.762-.455zm21.495-1.68c.04 0 .08.02.099.02s-.019 0-.039 0c-.02-.02-.04-.02-.06-.02z"></path><path d="M111.913 182.559l.633.02c-.039 0-.019 0-.079-.02.02 0 .06 0 .079.02h.06c.02 0 .059.02.039 0l.297.059.614.198c-.02-.02-.02 0-.06-.02.02.02.04.02.06.04.039 0 .039 0 .039.02h.02c.099.059.198.098.317.158a7.84 7.84 0 0 1 .534.336c.02.019.218.158.04.019s0 0 .039.04c.08.059.159.138.238.217l.237.257c.04.04.139.139.179.198.019.04.059.079.079.119l.178.296c.336.574 1.168.831 1.742.455s.811-1.127.455-1.74c-1.168-1.996-3.424-3.281-5.74-3.202-.673.02-1.306.573-1.267 1.265.02.652.554 1.285 1.267 1.265z"></path><path d="M113.556 182.856c.138.059.118.059.059.02-.02 0-.02-.02-.059-.02zm-3.108 16.842c-.139.87-.653 1.641-1.425 2.056-.832.474-1.9.454-2.732 0-.356-.198-.673.356-.316.553 1.009.554 2.276.593 3.305.04.93-.494 1.603-1.443 1.761-2.471.02-.178-.039-.336-.217-.395-.139-.04-.357.059-.376.217zm-15.754-14.786c-.891 0-1.682.771-1.682 1.68a1.72 1.72 0 0 0 1.682 1.68c.891 0 1.682-.771 1.682-1.68s-.792-1.68-1.682-1.68zm-.891 2.787c-.119 0-.218-.217-.218-.336 0-.217.119-.336.218-.336a.3.3 0 0 1 .337.336c0 .099-.099.336-.337.336zm18.745-2.787c-.891 0-1.683.771-1.683 1.68a1.72 1.72 0 0 0 1.683 1.68c.89 0 1.682-.771 1.682-1.68s-.792-1.68-1.682-1.68zm-.891 2.787c-.119 0-.218-.217-.218-.336 0-.217.119-.336.218-.336a.3.3 0 0 1 .336.336c0 .099-.099.336-.336.336zm-28.877-9.291l-.515 7.591c-.02.415.614.415.633 0l.515-7.591c.04-.415-.614-.395-.633 0zm41.386 7.097c-.02-.158-.138-.336-.317-.316-.158 0-.336.138-.316.316l.079 1.423.653.198-.099-1.621zm2.611-11.782c-1.543-1.641-4.77-3.894-9.025-6.246.95.889 1.663 2.134 1.979 3.419.535 2.096.436 4.29.871 6.405.218 1.068.614 2.155 1.366 2.946.257.276.613.415.93.593.376.197.732.257 1.148.276.297.02.614.099.91 0 1.188-.435 1.782-1.719 1.999-3.004.04-.218.06-.455.08-.672.039-.416-.02-.831-.02-1.246 0-.454.039-.909-.02-1.384-.02-.355-.139-.731-.218-1.087zm-38.873.949c4.334.475 8.946-2.016 10.49-6.069 1.009 2.768 4.434 4.409 7.224 3.42 1.881-.652 3.246-2.214 4.731-3.538 1.465-1.305 3.345-2.471 5.265-2.155-2.237-1.146-4.652-2.293-7.284-3.38-7.026-2.906-13.281-4.883-17.417-5.614-1.425.533-2.89.85-4.473.296-.119-.039-.158-.138-.277-.178-.02-.019-.04-.039-.059-.039-2.236-.949-3.82-2.867-4.532-5.14-.416-1.364-.614-2.787-.792-4.191-1.682 2.55-3.384 5.575-3.978 8.599-.673 3.499-.416 7.255 1.089 10.497 1.089 2.333 2.909 4.29 5.087 5.654l1.069.632c1.247.593 2.514 1.068 3.86 1.206z"></path></g><g class="text-warning" fill="currentColor"><path d="M112.209 158.443c3.582 1.522 7.106 3.222 10.49 5.119 1.722.969 3.424 1.977 5.087 3.045.831.533 1.603 1.126 2.315 1.799.08-.692.159-1.345.159-2.037.396-11.959-9.026-21.942-21-22.357-7.165-.237-13.657 3.044-17.695 8.283 5.621.79 13.202 3.321 20.248 6.266.099-.099.238-.178.396-.118z"></path><path d="M86.143 157.395c.059-.059.218-.079.317-.139.139-.079.277-.177.515-.217.178-.04.416-.04.633-.059l.99-.02h.198c.119 0 .317.059.455.079.495.04 1.128.178 1.742.277 4.137.731 10.371 2.708 17.417 5.614a101.24 101.24 0 0 1 7.284 3.38 43.11 43.11 0 0 1 2.138 1.147c4.255 2.332 7.481 4.586 9.025 6.246.812.85 1.188 1.562 1.01 2.017v.019c.791-.751 2.375-2.55 3.443-5.199.099-.257.04-.573-.158-.929.02.238-.277.435-.435.178-.95-1.542-2.653-2.431-4.157-3.36a99.06 99.06 0 0 0-4.671-2.728c-3.206-1.779-6.512-3.361-9.876-4.784-.159-.059-.178-.217-.099-.336-7.046-2.945-14.627-5.456-20.248-6.266-1.247-.198-2.355-.297-3.305-.257-.079.019-2.949 3.143-2.217 5.337z"></path></g><path class="text-info" d="M122.7 163.582c-3.404-1.897-6.907-3.617-10.49-5.119-.158-.06-.296.019-.376.138-.059.119-.059.257.099.336 3.385 1.423 6.67 3.024 9.877 4.784 1.583.87 3.127 1.779 4.671 2.728 1.504.929 3.206 1.838 4.156 3.36.159.257.475.06.436-.178 0-.039.039-.059.019-.098-.277-.435-.653-.771-1.009-1.107-.693-.673-1.484-1.266-2.316-1.799-1.642-1.068-3.345-2.076-5.067-3.045z" fill="currentColor"></path><g class="text-warning" fill="currentColor"><path d="M113.439 175.878c-4.355 0-7.818 4.23-7.818 9.251a8.8 8.8 0 0 0-3.464-.336c-.455.119-.891.336-1.227.455v-.119c0-5.021-3.563-9.251-7.917-9.251-4.236 0-7.699 4.23-7.699 9.251 0 .455.119.672.119 1.008h.218c.218-.118.455 0 .554.336.119.218-.119.554-.336.554l-.218.119c.772 4.131 3.682 7.353 7.363 7.353 4.236 0 7.58-3.894 7.818-8.915 1.563-.672 3.226-.554 4.79 0 .118 4.902 3.562 8.915 7.818 8.915 3.681 0 6.689-3.123 7.481-7.353l-.336-.119c-.218 0-.337-.336-.218-.554 0-.336.336-.454.554-.336h.218c0-.336.119-.672.119-1.008 0-5.021-3.563-9.251-7.818-9.251zm-20.406 17.158c-3.226 0-6.017-3.558-6.017-7.907 0-4.23 2.791-7.808 6.017-7.808 3.464 0 6.255 3.558 6.255 7.808-.02 4.349-2.791 7.907-6.255 7.907zm20.406 0c-3.345 0-6.136-3.558-6.136-7.907 0-4.23 2.791-7.808 6.136-7.808s6.135 3.558 6.135 7.808c0 4.349-2.771 7.907-6.135 7.907z"></path><path d="M123.61 186.928l-.218-.059-2.236-.692-.258-.079c-.257-.079-.514.059-.594.336s.06.553.317.632l.337.099 2.513.771 1.148.356c.218.079.396-.099.515-.297.02-.039.079-.019.079-.039.079-.277-.059-.554-.317-.633l-.376-.118-.277-.079-.633-.198zm-41.821 1.186l.119-.04 1.148-.276 2.553-.633.277-.079c.257-.079.396-.376.317-.633-.079-.276-.337-.415-.594-.336l-.178.04-2.296.573-1.148.277-.534.138c-.257.079-.396.376-.317.633.079.237.317.356.534.316.02 0 .04.04.059.04l.059-.02z"></path></g><path class="text-info" d="M112.39 237.198a36.13 36.13 0 0 1-9.322.968c-6.393-.178-12.628-2.075-17.992-5.555-.297-.177-.554.277-.277.455 5.443 3.539 11.776 5.456 18.269 5.634 3.186.099 6.373-.237 9.46-.988 3.306-.791 6.136-2.214 9.184-3.638.317-.138.04-.613-.277-.454-2.969 1.383-5.799 2.807-9.045 3.578z" fill="currentColor"></path></g><path class="text-warning" d="M194 158l1.82 3.645 4.18.586-3.034 2.799.742 3.97-3.708-1.888-3.708 1.888.674-3.97-2.966-2.799 4.112-.586L194 158zm16.034 0l1.81 3.645 4.156.586-3.017 2.799.738 3.97-3.687-1.888-3.755 1.888.738-3.97-3.017-2.799 4.156-.586 1.878-3.645zm15.466 0l1.73 3.645 3.77.586-2.719 2.799.618 3.97-3.399-1.888-3.399 1.888.68-3.97-2.781-2.799 3.831-.586L225.5 158zm15.5 0l1.888 3.645 4.112.586-2.966 2.799.674 3.97-3.708-1.888-3.708 1.888.674-3.97-2.966-2.799 4.112-.586L241 158zm15.531 0l1.659 3.645 3.81.586-2.765 2.799.676 3.97-3.38-1.888-3.38 1.888.614-3.97-2.765-2.799 3.81-.586 1.721-3.645z" fill="currentColor"></path><g fill="currentColor" style="color: var(--fn-info-bg-subtle)"><rect x="188" y="181" width="125" height="8" rx="4"></rect><rect x="188" y="201" width="276" height="8" rx="4"></rect><rect x="52" y="264" width="200.5" height="161" rx="12"></rect><rect x="274" y="264" width="200.5" height="161" rx="12"></rect></g><defs><clipPath id="A"><rect x="52" y="131" width="105" height="105" rx="52.5"></rect></clipPath></defs></svg>
            </div>
          </div>
        </div>
        </div>
      </div>
    </div>
  </main>




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


    document.addEventListener('DOMContentLoaded', function () {
    @if(session('success'))
        Swal.fire('Success', '{{ session('success') }}', 'success');
    @elseif($errors->any())
        Swal.fire('Error', '{{ $errors->first() }}', 'error');
    @endif
});
</script>


