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

@endsection