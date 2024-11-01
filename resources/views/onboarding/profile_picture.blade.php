@extends('shared.layouts.onboarding')
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

@endsection