@extends('shared.layouts.admin')
@section('content')
    <style>
        div#AvatarFileUpload {
            position: relative;
            width: 100px;
            height: 100px;
            background: #f9f9f9;
            border: 3px solid #bbb;
            border-radius: 50% 50%;
            margin: auto;
        }

        /* Image Preview Wrapper and Container */
        div#AvatarFileUpload>.selected-image-holder {
            width: 100%;
            height: 100%;
            border-radius: 50% 50%;

        }

        div#AvatarFileUpload>.selected-image-holder {
            width: 100%;
            overflow: hidden;
        }

        div#AvatarFileUpload>.selected-image-holder>img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            object-fit: center center;
        }

        /* Image Selector to Browse Image to Upload */
        div#AvatarFileUpload>.avatar-selector {
            position: absolute;
            bottom: 8px;
            right: 19%;
            width: 20px;
            height: 20px;
        }

        div#AvatarFileUpload>.avatar-selector input[type="file"] {
            display: none;
        }

        div#AvatarFileUpload>.avatar-selector>.avatar-selector-btn {
            width: 100%;
            height: 100%;
            background: #f5f5f59e;
            padding: 5px 7px;
            border-radius: 50% 50%;
        }

        div#AvatarFileUpload>.avatar-selector>.avatar-selector-btn>img {
            width: 100%;
            height: 100%;
            object-fit: scale-down;
            object-position: center center;
            z-index: 2;
        }

        .my-profile-box form .form-group .form-control {
            height: 38px !important;
            font-size: 14px !important;
        }

        .my-profile-box form .form-group textarea.form-control {
            padding-top: 3px !important;
            height: auto;
        }

        .my-profile-box form .form-group {
            margin-bottom: 6px !important;

        }
    </style>
    <!-- Breadcrumb Area -->
    <div class="breadcrumb-area">
        <h1>Profile</h1>
        <ol class="breadcrumb">
            <li class="item"><a href="{{ '/' }}">Home</a></li>
            <li class="item"><a href="#">Dashboard</a></li>
            <li class="item">Profile</li>
        </ol>
    </div>
    <!-- End Breadcrumb Area -->
    <div>


        @if (session('response'))
            <div class="notification-alert alert alert-success alert-dismissible fade show" role="alert">
                {{ session('response') }}
                <button type="button" class="btn btn-primary" data-bs-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
        @endif
        @if (session('error'))
            <div class="notification-alert-danger alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('error') }}
                <button type="button" class="btn btn-primary" data-bs-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
        @endif
        <div class="row">
            <div class="col-sm-3 d-flex flex-column align-items-center my-profile-box m-2">
                <div class="justify-items-center text-center">
                    <div class="col-sm-12">
                        <div class="form-group p-4 d-flex flex-column align-items-center">
                            <div class="freelancer-logo d-flex flex-column align-items-center text-center">

                                <div class="avatar mb-3">
                                    <div id="AvatarFileUpload">
                                        <!-- Image Preview Wrapper -->
                                        <div class="selected-image-holder">
                                            @if (!empty($edit_user->profile_image))
                                                <img src="{{ asset( $edit_user->profile_image) }}"
                                                    alt="{{ $edit_user->full_name }}" class="rounded-circle">
                                            @else
                                                <img src="{{ asset('icon_02.jpeg') }}" class="avatar-img rounded-circle"
                                                    alt="" srcset="{{ asset('icon_02.jpeg') }}">
                                            @endif
                                        </div>
                                        <!-- Image Preview Wrapper -->
                                        <!-- Browse Image to Upload Wrapper -->
                                        <!--<div class="avatar-selector mt-2">-->
                                        <!--    <a href="{{ route('user.profile.photo') }}" class="avatar-selector-btn">-->
                                        <!--        <svg xmlns="http://www.w3.org/2000/svg" width="2em" height="2em"-->
                                        <!--            viewBox="0 0 24 24">-->
                                        <!--            <path fill="currentColor"-->
                                        <!--                d="M4 4h3l2-2h6l2 2h3a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2m8 3a5 5 0 0 0-5 5a5 5 0 0 0 5 5a5 5 0 0 0 5-5a5 5 0 0 0-5-5m0 2a3 3 0 0 1 3 3a3 3 0 0 1-3 3a3 3 0 0 1-3-3a3 3 0 0 1 3-3" />-->
                                        <!--        </svg>-->
                                        <!--    </a>-->
                                        <!--</div>-->
                                        
                                        <div class="avatar-selector mt-2">
    <button type="button" class="avatar-selector-btn" data-toggle="modal" data-target="#profilePhotoModal">
        <svg xmlns="http://www.w3.org/2000/svg" width="2em" height="2em" viewBox="0 0 24 24">
            <path fill="currentColor"
                d="M4 4h3l2-2h6l2 2h3a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2m8 3a5 5 0 0 0-5 5a5 5 0 0 0 5 5a5 5 0 0 0 5-5a5 5 0 0 0-5-5m0 2a3 3 0 0 1 3 3a3 3 0 0 1-3 3a3 3 0 0 1-3-3a3 3 0 0 1 3-3" />
        </svg>
    </button>
</div>

                                        <!-- Browse Image to Upload Wrapper -->
                                        
                                        <!-- Modal Structure -->
<div class="modal fade" id="profilePhotoModal" tabindex="-1" role="dialog" aria-labelledby="profilePhotoModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="profilePhotoModalLabel">Upload Profile Photo</h5>
                <button type="button" class="btn btn-secondary" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" action="{{ route('save.user.photo',$edit_user->id)}}" enctype="multipart/form-data" style="color:#000000;">
                    {{ csrf_field() }}
                    <div class="row">
                        <div class="col-lg-12 col-md-12">
                            <div class="form-group">
                                <label>Profile Photo</label>
                                <input type="file" class="form-control" name="profile_picture" required>
                                <input type="hidden" name="home" value="home">
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12">
                            <button type="submit" class="default-btn">Submit <i class="flaticon-send"></i></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

                                    </div>
                                </div>
                            </div>

                            <style>
                                .freelancer-logo {
                                    width: 100px !important;
                                }

                                .avatar img {
                                    width: 100px !important;
                                    /* Adjust as needed */
                                    height: 100px !important;
                                    /* Adjust as needed */
                                    object-fit: cover !important;
                                    /* Ensures the image covers the entire area */
                                }
                            </style>

                            <div class="d-flex flex-column align-items-center">
                                <a href="#"
                                    class="text-gray-900 text-hover-primary fs-2 fw-bold me-1">{{ $edit_user->full_name }}</a>
                                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24">
                                    <path fill="#00aa3f"
                                        d="m8.6 22.5l-1.9-3.2l-3.6-.8l.35-3.7L1 12l2.45-2.8l-.35-3.7l3.6-.8l1.9-3.2L12 2.95l3.4-1.45l1.9 3.2l3.6.8l-.35 3.7L23 12l-2.45 2.8l.35 3.7l-3.6.8l-1.9 3.2l-3.4-1.45zm2.35-6.95L16.6 9.9l-1.4-1.45l-4.25 4.25l-2.15-2.1L7.4 12z" />
                                </svg>
                            </div>
                            <div class="d-flex flex-column align-items-center mt-3">
                                <p style="font-size:.8em !important;">Profile Completion &nbsp;
                                    {{ \App\Helpers\CommonHelpers::getProfileCompleteness() }}%</p>
                                <div class="progress" style="height: 10px; width: 100%;">
                                    <div class="progress-bar bg-success" role="progressbar"
                                        style="width: {{ \App\Helpers\CommonHelpers::getProfileCompleteness() }}%;"
                                        aria-valuenow="{{ \App\Helpers\CommonHelpers::getProfileCompleteness() }}"
                                        aria-valuemin="0" aria-valuemax="100">
                                    </div>
                                </div>
                            </div>
                            <div class="p-4">

                                <span class="badge bg-success">{{ $edit_user->availability }}</span>
                            </div>
                            <div class="p-2">
                                <h5>Skills </h5>
                               
                                <div>
    @foreach($edit_user->mySkills as $skill)
        <span class="badge bg-primary">{{ $skill->title }}</span>
    @endforeach
</div>

                            </div>

                            <div class="p-2">
                                <h5>Location </h5>
                                <div>
                                    <small>
                                        @if ($edit_user->countryName)
                                            {{ $edit_user->countryName->name }}
                                        @endif

                                        @if ($edit_user->countryName && $edit_user->stateName)
                                            ,
                                        @endif

                                        @if ($edit_user->stateName)
                                            {{ $edit_user->stateName->name }}
                                        @endif

                                        @if ($edit_user->stateName && $edit_user->cityName)
                                            ,
                                        @endif

                                        @if ($edit_user->cityName)
                                            {{ $edit_user->cityName->name }}
                                        @endif
                                    </small>


                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>


            <div class="col my-profile-box m-2">
                <form method="post" action="{{ route('save.user.details') }}" enctype="multipart/form-data"
                    style="color:#000000;">
                    {{ csrf_field() }}
                    @method('PUT')
                    <input type="hidden" name="user_id" value="{{ $edit_user->id }}" />

                    <div class="row align-items-center">

                        <div class="col-xl-6 col-lg-12 col-md-12">
                            <div class="form-group">
                                <label>Availability Status</label>
                                <select name="availability" class="form-control">
                                    @if (!empty($edit_user->availability))
                                        <option value="{{ $edit_user->availability }}">{{ $edit_user->availability }}
                                        </option>
                                    @else
                                        <option>Select Availability</option>
                                    @endif
                                    <option value="ACTIVELY SEARCHING">ACTIVELY SEARCHING</option>
                                    <option value="PASSIVELY SEARCHING">PASSIVELY SEARCHING</option>
                                    <option value="HIRED">HIRED</option>
                                    <option value="INACTIVE">INACTIVE</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-12 col-md-12">
                            <div class="form-group">
                                <label>Company name (optional)</label>
                                <input type="text" class="form-control" placeholder="Company name (optional)"
                                    value="{{ $edit_user->business_name }}" name="business_name">
                            </div>
                        </div>

                        <div class="col-xl-6 col-lg-12 col-md-12">
                            <div class="form-group">
                                <label>Email address</label>
                                <input type="email" class="form-control" placeholder="Email address"
                                    value="{{ $edit_user->email }}" disabled>
                            </div>
                        </div>

                        <div class="col-xl-6 col-lg-12 col-md-12">
                            <div class="form-group">
                                <label>Phone</label>
                                <input type="text" class="form-control" value="{{ $edit_user->phone }}"
                                    name="phone">
                            </div>
                        </div>

                        <div class="col-xl-6 col-lg-12 col-md-12">
                            <div class="form-group">
                                <label>Date Of Birth</label>
                                <input type="date" class="form-control" value="{{ $edit_user->date_of_birth }}"
                                    name="date_of_birth">
                            </div>
                        </div>

                        <div class="col-xl-6 col-lg-12 col-md-12">
                            <div class="form-group">
                                <label>Portfolio link</label>
                                <input type="text" class="form-control" placeholder="Website"
                                    value="{{ $edit_user->website_address }}" name="website_address">
                            </div>
                        </div>


                        <div class=" col-lg-12 col-md-12">
                            <div class="form-group">
                                <label>
                                    Write a bio to tell the World about yourself
                                    <span id="description-error" style="color: red; display: none; font-size:12px;bvbdui">
                                        Minimum of 300 characters
                                    </span>
                                </label>
                                <textarea id="service_description" cols="15" rows="10"
                                    placeholder="Short description about yourself..."
                                    class="form-control" name="service_description"
                                    minlength="300" maxlength="1500" required style="height:200px !important;">{{ trim($edit_user->service_description) }}</textarea>

                                <div id="char-count" style="margin-top: 5px;">0/1500 characters</div>

                                <script>
                                    document.addEventListener('DOMContentLoaded', (event) => {
                                        const textarea = document.getElementById('service_description');
                                        const errorDiv = document.getElementById('description-error');
                                        const charCountDiv = document.getElementById('char-count');

                                        textarea.focus();
                                        textarea.setSelectionRange(0, 0);

                                        // Initialize character count
                                        charCountDiv.textContent = `${textarea.value.length}/1500 characters`;

                                        textarea.addEventListener('input', () => {
                                            const charCount = textarea.value.length;
                                            charCountDiv.textContent = `${charCount}/1500 characters`;

                                            if (charCount < 300) {
                                                errorDiv.style.display = 'block';
                                            } else {
                                                errorDiv.style.display = 'none';
                                            }

                                            if (charCount > 1500) {
                                                textarea.value = textarea.value.slice(0, 1500);
                                                charCountDiv.textContent = '1500/1500 characters';
                                            }
                                        });
                                    });
                                </script>
                            </div>
                        </div>


                       <div class="col-xl-6 col-lg-12 col-md-12">
                            <div class="form-group">
                                <label>Country</label>
                                <select name="country" id="country" class="form-control" required="true">
                                    <option value="{{ $edit_user->country ?? '' }}">{{ $edit_user->countryName->name ?? '' }}</option>
                                    @foreach (\App\Models\Country::all() as $row)
                                        <option value="{{ $row->id }}">{{ $row->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-12 col-md-12">
                            <div class="form-group">
                                <label>State</label>
                                <select name="state" id="state" class="form-control">

                                </select>
                            </div>
                        </div>


                        <div class="col-xl-6 col-lg-12 col-md-12">
                            <div class="form-group">
                                <label>State Areas</label>
                                <select name="city" class="form-control">
                                </select>

                            </div>
                        </div>
                        <div class=" col-lg-12 col-md-12">
    <div class="form-group">
        <label>Skills<span style="font-size:12px;">(e.g podcasting, web development....)</span></label>
        <!-- Container to hold the input and skills -->
        <div class="input-container form-control" id="input-container" onclick="focusInput()">
            <!-- Hidden input to submit skills -->
            <input type="hidden" name="skills" id="skills-hidden">
            <!-- Input field for typing skills -->
            <input type="text" id="skill-input" class="tag-input" placeholder="Enter skills..." autocomplete="off">
        </div>
        <div id="suggestions" class="suggestions-list"></div>
    </div>

</div>

<!-- CSS to style the input, suggestions, and tags -->
<style>
    .input-container {
        display: flex;
        flex-wrap: wrap;
        padding: 5px;
        min-height: 45px;
        border: 1px solid #ddd;
        border-radius: 5px;
        cursor: text;
    }

    .tag-input {
        border: none;
        outline: none;
        flex: 1;
        min-width: 150px;
    }

    .tag {
        background-color: #e9ecef;
        border-radius: 10%;
        padding: 5px 10px;
        margin: 3px;
        display: flex;
        align-items: center;
        color: #343a40;
    }

    .tag i {
        margin-left: 5px;
        cursor: pointer;
    }

    .suggestions-list {
        border: 1px solid #ddd;
        max-height: 150px;
        overflow-y: auto;
        position: absolute;
        z-index: 1000;
        background: #fff;
        width: 100%;
        display: none;
    }

    .suggestion-item {
        padding: 8px 12px;
        cursor: pointer;
    }

    .suggestion-item:hover {
        background-color: #f0f0f0;
    }
</style>






                        <div class=" col-lg-12 col-md-12">
                            <div class="form-group">
                                <label>Address</label>
                                {{-- <input type="text" class="form-control" value="{{ $edit_user->street_address }}"
                                    name="street_address"> --}}
                                <textarea id="street_address" cols="15" rows="10" placeholder="Address" class="form-control"
                                    name="street_address" required>
                                    {{ trim($edit_user->street_address) }}
                                </textarea>
                            </div>
                        </div>

                        <div class="col-xl-6 col-lg-12 col-md-12">
                            <div class="form-group">
                                <label>Job Preference </label>

                                <select class="form-control" name="job_preference">
                                    <option>FullTime</option>
                                    <option>PartTime</option>
                                </select>

                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-12 col-md-12">
                            <div class="form-group">
                                <label>Your Service Category</label>
                                <select name="category_id" class="form-control" required="true">
                                    <option>{{ $edit_user->businessCategory->title ?? 'Select Business Category' }}
                                    </option>
                                    @foreach (\App\Models\BusinessCategory::all() as $row)
                                        <option value="{{ $row->id }}">{{ $row->title }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-xl-6 col-lg-12 col-md-12">
                            <div class="form-group">
                                <label>Compensation Type </label>

                                <select class="form-control" id="select" name="compensation_type">
                                    <option value="{{ $edit_user->compensation_type }}">
                                        {{ $edit_user->compensation_type }}
                                    </option>
                                    <option value="pay per job">Pay Per Job</option>
                                    <option value="salary">Salary</option>

                                </select>

                            </div>
                        </div>

                        <div class="col-xl-6 col-lg-12 col-md-12"
                            id="{{ $edit_user->compensation_type === 'salary' ? '' : 'compensation' }}">
                            <div class="form-group">
                                <label>Min Amount </label>
                                <input type="number" class="form-control" name="min_amount"
                                    value="{{ $edit_user->min_amount }}">

                            </div>
                        </div>

                        <div class="col-xl-6 col-lg-12 col-md-12"
                            id="{{ $edit_user->compensation_type === 'salary' ? '' : 'compensation2' }}">
                            <div class="form-group">
                                <label>Max Amount </label>
                                <input type="number" class="form-control" name="max_amount"
                                    value="{{ $edit_user->max_amount }}">

                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-12">
                            <div class="form-group">
                                <label>USD Rate</label>
                                <input type="number" class="form-control" name="usd_rate"
                                    value="{{ $edit_user->usd_rate }}">

                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-12">
                            <div class="form-group">
                                <label>GBP Rate</label>
                                <input type="number" class="form-control" name="gbp_rate"
                                    value="{{ $edit_user->gbp_rate }}">

                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-12">
                            <div class="form-group">
                                <label>EUR Rate</label>
                                <input type="number" class="form-control" name="eur_rate"
                                    value="{{ $edit_user->eur_rate }}">

                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-12">
                            <div class="form-group">
                                <label>NGN Rate</label>
                                <input type="number" class="form-control" name="ngn_rate"
                                    value="{{ $edit_user->ngn_rate }}">

                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-12">
                            <div class="form-group">
                                <label>Upload Cv</label>
                               <input type="file" class="form-control" placeholder="Upload Cv" name="resume">
                                @if(isset($edit_user->resume) && $edit_user->resume)
                                    <small class="form-text text-muted">
                                        Current file: <a href="{{ asset($edit_user->resume) }}" target="_blank">View Resume</a>
                                    </small>
                                @endif

                            </div>
                        </div>

                        <div class="col-lg-12 col-md-12">
                            <button type="submit" class="default-btn">Submit Now <i class="flaticon-send"></i></button>
                        </div>
                        <button type="button" class="default-btn mt-4 mb-4" data-toggle="modal"
                            data-target="#addDetailsModal">
                            Click here to add more info
                        </button>

                        <div class="modal fade" id="addDetailsModal" tabindex="-1"
                            aria-labelledby="addDetailsModalLabel" aria-hidden="true">
                            <div class="modal-dialog " >
                                <div class="modal-content" style="width:850px !important;" >
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="addDetailsModalLabel">Add Details</h5>
                                        <button type="button" class="btn btn-outline" data-dismiss="modal"
                                            aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <!-- Form to add educations -->
                                        <div class="row">
                                            <div class="col">
                                                <div id="educationSection">
                                                    <h6>Education</h6>

                                                    <!-- Loop through existing educations -->
                                                    @foreach($edit_user->educations as $key => $education)
                                                        <div class="education-entry">
                                                            <input type="hidden" name="education_id[]" value="{{ $education->id }}">
                                                            <div class="form-group">
                                                                <label>School</label>
                                                                <input type="text" name="school[{{ $education->id }}]" class="form-control" value="{{ $education->title }}">
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Degree</label>
                                                                <input type="text" name="degree[{{ $education->id }}]" class="form-control" value="{{ $education->desc }}">
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Field of Study</label>
                                                                <input type="text" name="field_of_study[{{ $education->id }}]" class="form-control" value="{{ $education->purpose }}">
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Year</label>
                                                                <input type="text" name="year[{{ $education->id }}]" class="form-control" value="{{ $education->year }}">
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                </div>

                                                <!-- Hidden education entry template for adding new records -->
                                                <div id="educationTemplate" style="display:none;">
                                                    <div class="education-entry">
                                                        <div class="form-group">
                                                            <label>School</label>
                                                            <input type="text" name="school[]" class="form-control">
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Degree</label>
                                                            <input type="text" name="degree[]" class="form-control">
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Field of Study</label>
                                                            <input type="text" name="field_of_study[]" class="form-control">
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Year</label>
                                                            <input type="text" name="year[]" class="form-control">
                                                        </div>
                                                    </div>
                                                </div>

                                                <button type="button" class="default-btn" id="addEducation">Add Education</button>
                                           <hr>
                                                <!-- Form to add projects -->
                                                <div id="projectSection">
                                                    <h6>Projects</h6>

                                                    @foreach($edit_user->projects as $project)
                                                        <div class="project-entry">
                                                            <input type="hidden" name="project_id[]" value="{{ $project->id }}">
                                                            <div class="form-group">
                                                                <label>Title</label>
                                                                <input type="text" name="project_title[]" class="form-control" value="{{ $project->title }}">
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Description</label>
                                                                <textarea name="project_description[]" class="form-control">{{ $project->description }}</textarea>
                                                            </div>
                                                            <div class="form-group">
                                                                <label>URL</label>
                                                                <input type="text" name="project_url[]" class="form-control" value="{{ $project->url }}">
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                </div>
                                                <button type="button" class="default-btn" id="addProject">Add Projects</button>
                                            </div>
                                        </div>

                                        <hr>

                                        <!-- Form to add languages -->
                                        <div id="languageSection">
                                            <h6>Languages</h6>

                                            @foreach($edit_user->languages as $language)
                                                <div class="language-entry">
                                                    <input type="hidden" name="language_id[]" value="{{ $language->id }}">
                                                    <div class="form-group">
                                                        <label>Language</label>
                                                        <input type="text" name="language[]" class="form-control" value="{{ $language->language }}">
                                                    </div>
                                                </div>
                                            @endforeach

                                        </div>
                                        <button type="button" class="btn default-btn" id="addLanguage">Add Languages</button>
                                    </div>

                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-dismiss="modal">Close</button>

                                        <button type="submit" class="default-btn">Submit Now <i
                                                class="flaticon-send"></i></button>
                                    </div>

                                </div>
                            </div>
                        </div>

                    </div>
                </form>

            </div>
        </div>





    </div>
    @include('admin.edit-user-script')
@endsection
