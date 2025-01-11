@extends('shared.layout.user')
@section('content')

    <div class="col-lg-9">


        <script>
            document.addEventListener('DOMContentLoaded', function() {
                @if (session('success'))
                    Swal.fire({
                        title: 'Success!',
                        text: '{{ session('success') }}',
                        icon: 'success',
                        confirmButtonText: 'OK'
                    });
                @endif

                @if (session('validationErrors'))
                    Swal.fire({
                        title: 'Validation Error',
                        html: `{!! nl2br(e(json_encode(session('validationErrors'), JSON_PRETTY_PRINT))) !!}`,
                        icon: 'error',
                        confirmButtonText: 'Fix Errors'
                    });
                @elseif ($errors->any()) 
                    Swal.fire({
                        title: 'Error',
                        text: '{{ $errors->first() }}',
                        icon: 'error',
                        confirmButtonText: 'OK'
                    });
                @endif
            });
        </script>


        <h1 class="h2 pb-2 pb-lg-3">Profile Account settings</h1>

        @if (session('response'))
            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    Swal.fire({
                        title: 'Success',
                        text: '{{ session('response') }}',
                        icon: 'success',
                        confirmButtonText: 'OK'
                    });
                });
            </script>
        @endif

        @if (session('error'))
            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    Swal.fire({
                        title: 'Error',
                        text: '{{ session('error') }}',
                        icon: 'error',
                        confirmButtonText: 'OK'
                    });
                });
            </script>
        @endif

        <!-- Nav pills -->
        <div class="nav overflow-x-auto mb-3">
            <ul class="nav nav-pills flex-nowrap gap-2 pb-2 mb-1" role="tablist">
                <li class="nav-item me-1" role="presentation">
                    <button type="button" class="nav-link text-nowrap active" id="personal-info-tab" data-bs-toggle="pill"
                        data-bs-target="#personal-info" role="tab" aria-controls="personal-info" aria-selected="true">
                        Personal info
                    </button>
                </li>
                <li class="nav-item me-1" role="presentation">
                    <button class="nav-link text-nowrap" id="security-tab" data-bs-toggle="pill" data-bs-target="#education"
                        type="button" role="tab" aria-controls="security" aria-selected="false">
                        Education
                    </button>
                </li>

                <li class="nav-item" role="presentation">
                    <button class="nav-link text-nowrap" id="notifications-tab" data-bs-toggle="pill"
                        data-bs-target="#experience" type="button" role="tab" aria-controls="notifications"
                        aria-selected="false">
                        Experience
                    </button>
                </li>

                <li class="nav-item" role="presentation">
                    <button class="nav-link text-nowrap" id="notifications-tab" data-bs-toggle="pill"
                        data-bs-target="#award" type="button" role="tab" aria-controls="notifications"
                        aria-selected="false">
                        Awards
                    </button>
                </li>



                <li class="nav-item" role="presentation">
                    <button class="nav-link text-nowrap" id="notifications-tab" data-bs-toggle="pill"
                        data-bs-target="#gallery" type="button" role="tab" aria-controls="notifications"
                        aria-selected="false">
                        Gallery
                    </button>
                </li>
            </ul>
        </div>



        <div class="tab-content">

            <!-- Personal info tab -->
            <div class="tab-pane fade show active" id="personal-info" role="tabpanel" aria-labelledby="personal-info-tab">
                <div class="vstack gap-4">

                    <!-- Profile completeness info card -->
                    <div class="card bg-warning-subtle border-0 mb-2">
                        <div class="card-body d-flex align-items-center">
                            <div class="circular-progress text-warning flex-shrink-0 ms-n2 ms-sm-0" role="progressbar"
                                style="--fn-progress: {{ \App\Helpers\CommonHelpers::getProfileCompleteness() }}"
                                aria-label="Warning progress"
                                aria-valuenow="{{ \App\Helpers\CommonHelpers::getProfileCompleteness() }}" aria-valuemin="0"
                                aria-valuemax="100">
                                <svg class="progress-circle">
                                    <circle class="progress-background d-none-dark" r="0" style="stroke: #fff"></circle>
                                    <circle class="progress-background d-none d-block-dark" r="0"
                                        style="stroke: rgba(255,255,255, .1)"></circle>
                                    <circle class="progress-bar" r="0"></circle>
                                </svg>
                                <h5 class="position-absolute top-50 start-50 translate-middle text-center mb-0">
                                    {{ \App\Helpers\CommonHelpers::getProfileCompleteness() }}%</h5>
                            </div>
                            <div class="ps-3 ps-sm-4">
                                <h3 class="h6 bold pb-1 mb-2">{{ Auth::user()->full_name }} <svg
                                        xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
                                        viewBox="0 0 24 24">
                                        <path fill="#00aa3f"
                                            d="m8.6 22.5l-1.9-3.2l-3.6-.8l.35-3.7L1 12l2.45-2.8l-.35-3.7l3.6-.8l1.9-3.2L12 2.95l3.4-1.45l1.9 3.2l3.6.8l-.35 3.7L23 12l-2.45 2.8l.35 3.7l-3.6.8l-1.9 3.2l-3.4-1.45zm2.35-6.95L16.6 9.9l-1.4-1.45l-4.25 4.25l-2.15-2.1L7.4 12z" />
                                    </svg> <span class="badge bg-success ms-2">Verified</span> <span
                                        class="badge bg-success">{{ Auth::user()->availability }}</span></h3>
                                <ul class="list-unstyled flex-row flex-wrap fs-sm mb-0">
                                    {{-- <li class="d-flex me-3">
                        <i class="fs-base me-2" style="margin-top: .1875rem"></i>
                        Profile Completion
                      </li> --}}
                                    <li class="d-flex me-3"> <small class="h6 bold">Location:</small>
                                        <i class="fa-map fs-base me-2 " style="margin-top: .1875rem"></i>
                                        <small class="h6 bold">
                                            @if (Auth::user()->country_id)
                                                {{ Auth::user()->country->name }}
                                            @endif

                                            @if (Auth::user()->country_id && Auth::user()->state_id)
                                                ,
                                            @endif

                                            @if (Auth::user()->state_id)
                                                {{ Auth::user()->state->name }}
                                            @endif

                                            @if (Auth::user()->stateName && Auth::user()->cityName)
                                                ,
                                            @endif

                                            @if (Auth::user()->cityName)
                                                {{ Auth::user()->cityName->name }}
                                            @endif
                                        </small>
                                    </li>






                                </ul>
                                <div class="">
                                    <li class="d-flex h6 bold">Skills:&nbsp;
                                        <div>
                                            @foreach (Auth::user()->mySkills as $skill)
                                                <span class="badge bg-primary me-1">{{ $skill->title }}</span>
                                            @endforeach
                                        </div>

                                    </li>
                                </div>

                            </div>
                        </div>
                    </div>

                    <!-- Profile picture (Avatar) -->
                    <div class="d-flex align-items-start align-items-sm-center mb-2">
                        <div class="ratio ratio-1x1 hover-effect-opacity bg-body-tertiary border rounded-circle overflow-hidden"
                            style="width: 124px">
                            @if (!empty(Auth::user()->profile_image))
                                <img src="{{ asset(Auth::user()->profile_image) }}" alt="Avatar">
                            @else
                                <img src="{{ asset('avata2.png') }}" alt="" srcset="{{ asset('avata2.png') }}">
                            @endif

                            <div
                                class="hover-effect-target position-absolute top-0 start-0 d-flex align-items-center justify-content-center w-100 h-100 opacity-0">
                                <button type="button" class="btn btn-icon btn-sm btn-light position-relative z-2 ms-2"
                                    aria-label="Remove">
                                    <i class="fi-trash fs-base"></i>
                                </button>
                                <button type="button" class="btn btn-icon btn-sm btn-light position-relative z-2 ms-2"
                                    aria-label="Update"data-bs-toggle="modal" data-bs-target="#addimage">
                                    <i class="fi-edit fs-base"></i>
                                </button>
                                <span
                                    class="position-absolute top-0 start-0 w-100 h-100 bg-black bg-opacity-25 z-1"></span>
                            </div>
                        </div>
                        <div class="ps-3 ps-sm-4">
                            <p class="fs-sm" style="max-width: 440px">Your profile photo will appear on your profile and
                                directory listing. PNG or JPG no bigger than 1000px wide and tall.</p>
                            <button type="button" class="btn btn-sm btn-outline-secondary">
                                <i class="fi-refresh-ccw fs-sm ms-n1 me-2"></i>
                                Update photo
                            </button>
                        </div>
                    </div>

                    <!-- Settings form -->
                    <form method="post" action="{{ route('settings.save') }}" enctype="multipart/form-data"
                        id="profile-form">
                        {{ csrf_field() }}
                        @method('PUT')

                        <div class="row row-cols-1 row-cols-sm-2 g-4 mb-4">
                            <div class="col position-relative">
                                <label for="fn" class="form-label fs-base">Availability Status</label>
                                <select class="form-select form-select-lg" aria-label="Languages select">
                                    @if (!empty(Auth::user()->availability))
                                        <option value="{{ Auth::user()->availability }}">{{ Auth::user()->availability }}
                                        </option>
                                    @else
                                        <option>Select Availability</option>
                                    @endif
                                    <option value="Actively Searching">Actively Searching</option>
                                    <option value="Passively Searching">Passively Searching</option>
                                    <option value="Hired">Hired</option>
                                    <option value="Inactive">Inactive</option>
                                </select>
                            </div>
                            <div class="col position-relative">
                                <label for="ln" class="form-label fs-base">Full Name</label>
                                <input type="text" class="form-control form-control-lg" id="ln"
                                    value="{{ Auth::user()->full_name }}" required="" placeholder=""
                                    name="full_name" value="{{ Auth::user()->full_name }}">
                            </div>

                            <div class="col position-relative">
                                <label for="ln" class="form-label fs-base">Company name (optional)</label>
                                <input type="text" class="form-control form-control-lg" id="ln"
                                    value="{{ Auth::user()->business_name }}" required="" name="business_name">
                            </div>

                            <div class="col position-relative">
                                <label for="email" class="form-label d-flex align-items-center fs-base">Email address *
                                    <span class="badge text-danger bg-danger-subtle ms-2">Verify email</span></label>
                                <input type="email" name="email" class="form-control form-control-lg" id="email"
                                    value="{{ Auth::user()->email }}" disabled>
                                <div class="invalid-tooltip bg-transparent p-0">Enter a valid email address!</div>

                            </div>
                            <div class="col position-relative">
                                <label for="phone" class="form-label d-flex align-items-center fs-base">Phone
                                    number</label>
                                <input type="tel" class="form-control form-control-lg" name="phone" id="phone"
                                    data-input-format="{&quot;numericOnly&quot;: true, &quot;delimiters&quot;: [&quot;(&quot;, &quot;)&quot;, &quot; &quot;, &quot;-&quot;, &quot; &quot;], &quot;blocks&quot;: [0, 3, 0, 4, 4]}"
                                    value="{{ Auth::user()->phone }}" placeholder="(___) ___-____" required="">
                                <div class="invalid-tooltip bg-transparent p-0">Enter a valid phone number!</div>
                            </div>

                            <div class="col">

                                <label for="date-2" class="form-label">Date of Birth <span
                                        class="text-body-secondary fs-xs fw-normal">(F j, Y format)</span></label>
                                <div class="position-relative mb-3">
                                    <i class="fi-calendar position-absolute top-50 start-0 translate-middle-y ms-3"></i>
                                    <input type="text" class="form-control form-icon-start bg-transparent"
                                        data-datepicker="{&quot;dateFormat&quot;: &quot;M j, Y&quot;}" placeholder="Date"
                                        name="date_of_birth" value="">
                                </div>
                            </div>

                            <div class="col">
                                <label for="address" class="form-label fs-base">Your Gender</label>
                                <select class="form-select form-select-lg" aria-label="Languages select" name="gender"
                                    required>
                                    @if (!empty(Auth::user()->gender))
                                        <option value="{{ Auth::user()->gender }}">{{ Auth::user()->gender }}
                                        </option>
                                    @else
                                    @endif
                                    <option value="male">Male</option>
                                    <option value="female">Female</option>
                                    <option value="others">Other</option>
                                </select>
                            </div>

                            <div class="col">
                                <label for="fn" class="form-label fs-base">Your Service Category</label>
                                <select class="form-select form-select-lg" aria-label="Category select"
                                    name="business_category">
                                    <option>{{ Auth::user()->businessCategory->title ?? 'Select Business Category' }}
                                    </option>
                                    @foreach ($category as $row)
                                        <option value="{{ $row->id }}">{{ $row->title }}</option>
                                    @endforeach
                                </select>
                            </div>


                        </div>
                        <div class="row row-cols-1 row-cols-sm-2 g-4 mb-4">
                            <div class="col">
                                <!-- Toggle Switch -->
                                <div class="form-check form-switch mb-4">
                                    <input type="checkbox" class="form-check-input" role="switch" id="videoSwitch"
                                        onchange="toggleVideoInput()">
                                    <label for="videoSwitch" class="form-check-label">Paste or Upload Your video
                                        Introduction</label>
                                </div>

                                <!-- YouTube URL Input -->
                                <div id="youtubeInput" class="position-relative mb-4"
                                    style="display: {{ $user->video_file ? 'none' : 'block' }}">
                                    <label for="video_url">YouTube Video URL</label>
                                    <input type="url" name="video_url" id="video_url" class="form-control"
                                        oninput="previewYouTubeVideo(this.value)" value="{{ $user->video_url }}">
                                    <div id="youtubePreview" class="mt-3"
                                        style="display: {{ $user->video_url ? 'block' : 'none' }}">
                                        <iframe width="100%" height="200" frameborder="0" allowfullscreen></iframe>
                                    </div>
                                    @error('video_url')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <!-- Video File Input (Hidden by Default) -->
                                <div id="fileInput" class="position-relative mb-4"
                                    style="display: {{ $user->video_file ? 'block' : 'none' }}">
                                    <label for="video_file">Upload Video File</label>
                                    <input type="file" name="video_file" id="video_file" class="form-control"
                                        accept="video/mp4,video/x-m4v,video/*" onchange="previewVideo(event)">
                                    <div id="videoPreview" class="mt-3"
                                        style="display: {{ $user->video_file ? 'block' : 'none' }}">
                                        <video width="100%" height="200" controls>
                                            <source src="{{ asset($user->video_file) }}" id="videoSource">
                                            Your browser does not support the video tag.
                                        </video>
                                    </div>

                                    @error('video_file')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <!-- Video File Input (Hidden by Default) -->


                            <div class="col mt-4">
                                <!-- PDF Upload -->
                                <label class="form-label">Upload CV</label>
                                <input type="file" class="form-control form-control-lg" name="resume"
                                    accept="application/pdf" onchange="previewPDF(event)">
                                <div id="pdfPreview" class="mt-3" style="display: none;">
                                    <iframe src="{{ isset($user->resume) ? asset($user->resume) : '' }}" width="100%"
                                        height="250" style="border: 1px solid #ccc; border-radius: 4px;"></iframe>
                                </div>
                                @if (isset(Auth::user()->resume) && Auth::user()->resume)
                                    <small class="form-text text-muted">
                                        Current file: <a href="{{ asset(Auth::user()->resume) }}" target="_blank">View
                                            Resume</a>
                                    </small>
                                @endif
                                @error('resume')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>


                        </div>

                        <div class="col-12  mb-4">
                            <label for="user-info" class="form-label fs-base">Write a bio to tell the world about yourself
                                <span id="description-error" style="color: red; display: none; font-size:12px;bvbdui">
                                    Minimum of 300 characters
                                </span></label>
                            <textarea class="form-control form-control-lg bg-transparent" id="texteditor" name="service_description"
                                rows="6" maxlength="1000" minlength="100">{{ Auth::user()->service_description }}</textarea>
                            <div id="char-count" style="margin-top: 5px;">0/1500 characters</div>
                        </div>

                        <div class="row row-cols-1 row-cols-sm-2 g-4 mb-4">
                            <div class="col position-relative mb-4">
                                <label class="form-label">Country *</label>
                                <select class="form-select form-select-lg"
                                    data-select="{
                            &quot;classNames&quot;: {
                              &quot;containerInner&quot;: [&quot;form-select&quot;, &quot;form-select-lg&quot;]
                            },
                            &quot;searchEnabled&quot;: true
                          }"
                                    aria-label="Country select" required name="country_id" id="country">
                                    <option value="">Select your Country</option>
                                    @foreach (\App\Models\Country::all() as $row)
                                        <option value="{{ $row->id }}">{{ ucfirst(strtolower($row->name)) }}
                                        </option>
                                    @endforeach
                                </select>

                            </div>


                            <div class="col position-relative mb-4">
                                <label for="state" class="form-label">State *</label>
                                <select name="state_id" id="state" class="form-select form-select-lg" required>
                                    <option value="">Select State</option>
                                    @foreach (\App\Models\State::all() as $row)
                                        <option value="{{ $row->id }}"
                                            {{ old('state_id', Auth::user()->state_id) == $row->id ? 'selected' : '' }}>
                                            {{ $row->name }}
                                        </option>
                                    @endforeach

                                </select>

                            </div>


                            <div class="col position-relative mb-4">
                                <label class="form-label">City *</label>
                                <select class="form-select form-select-lg" required="" id="city" name="city_id">
                                    <option value="">Select your City</option>
                                    @foreach ($cities as $city)
                                        <option value="{{ $city->id }}"
                                            {{ old('city_id', Auth::user()->city_id) == $city->id ? 'selected' : '' }}>
                                            {{ $city->name }}
                                        </option>
                                    @endforeach
                                </select>

                            </div>


                            <div class="col position-relative">
                                <label for="fn" class="form-label fs-base">Job Prefrence</label>
                                <select class="form-select form-select-lg" aria-label="Countries select"
                                    name="job_preference">
                                    <option>FullTime</option>
                                    <option>PartTime</option>
                                </select>
                            </div>

                        </div>

                        <div class="position-relative mb-4">
                            <label for="address" class="form-label fs-base">Address *</label>
                            <textarea type="text" class="form-control form-control-lg" id="street_address" name="street_address"
                                value="New York, Brooklyn" required="">{{ trim(Auth::user()->street_address) }}</textarea>
                            <div class="invalid-tooltip bg-transparent p-0">Enter your address!</div>
                        </div>

                        <div class="position-relative mb-4 mt-4">
                            <label>Skills<span style="font-size:14px;">(e.g podcasting, web development....)</span></label>
                            <div class="input-container form-control" id="input-container" onclick="focusInput()">
                                <input type="hidden" name="skills" id="skills-hidden"
                                    value="{{ $skills->pluck('title')->implode(', ') }}">

                                <input type="text" id="skill-input" class="tag-input form-select form-select-lg"
                                    autocomplete="off" value="">
                            </div>
                            <div id="suggestions" class="suggestions-list"></div>
                        </div>





                        <div class="form-group">
                            <input type="hidden" id="is_influencer" name="is_influencer"
                                value="{{ $user->is_influencer }}">
                        </div>



                        <div id="influencer-socials" class="border shadow p-3">
                            <h2>Socials</h2>
                            <div id="socialMediaContainer">
                                @forelse ($platforms as $index => $platform)
                                    <div class="social-group" data-index="{{ $index }}">
                                        <div class="row row-cols-1 row-cols-sm-2 g-3 g-sm-4 pb-3 pb-sm-4 mb-xl-2">
                                            <div class="col-md-3">
                                                <label>Platform</label>
                                                <input type="text" name="social_media[{{ $index }}][platform]"
                                                    value="{{ $platform['platform'] ?? '' }}"
                                                    class="form-control form-control-lg">
                                            </div>
                                            <div class="col-md-3">
                                                <label>Followers</label>
                                                <input type="number" name="social_media[{{ $index }}][followers]"
                                                    value="{{ $platform['followers'] ?? '' }}"
                                                    class="form-control form-control-lg">
                                            </div>
                                            <div class="col-md-4">
                                                <label>Handle</label>
                                                <input type="text" name="social_media[{{ $index }}][handle]"
                                                    value="{{ $platform['handle'] ?? '' }}"
                                                    class="form-control form-control-lg">
                                            </div>
                                            <div class="col-md-2">
                                                <button type="button" class="remove-platform btn btn-danger mt-4 btn-lg"
                                                    onclick="removeSocialMediaRow(this)">
                                                    <i class="fi-trash"></i> Remove
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                @empty
                                    <p>No social media platforms added. Click "Add Social Media" to add a new platform.</p>
                                @endforelse
                            </div>
                            <button type="button" class="btn btn-success mb-3" onclick="addSocialMediaRow()">
                                <i class="fi-plus"></i> Add Social Media
                            </button>
                        </div>


                        <div class="row row-cols-1 row-cols-sm-2 g-4 mb-4 mt-4">

                            <div class=" position-relative  mb-4">
                                <label for="fl-select">Skill Level</label>
                                <select class="form-select form-select-lg" id="fl-select"
                                    aria-label="Floating label select" name="skillLevel">

                                    <option value="Skilled" selected="selected">Skilled</option>
                                    <option value="Semi skilled" selected="selected">Semi skilled</option>
                                    <option value="Internship/Graduate Training" selected="selected">Internship/Graduate
                                        Training</option>
                                    <option value="Unskilled" selected="selected">Unskilled</option>
                                </select>

                            </div>


                            <div class="col position-relative">
                                <label for="fn" class="form-label fs-base">Work Experience</label>
                                <input type="number" class="form-select form-select-lg" aria-label="Countries select"
                                    name="work_experience" value="{{ Auth::user()->work_experience }}">

                            </div>



                            <div class="col">
                                <label for="fn" class="form-label fs-base">Compensation</label>
                                <select class="form-select form-select-lg" id="compensation-type"
                                    name="compensation_type">
                                    <option value="{{ Auth::user()->compensation_type }}">
                                        {{ Auth::user()->compensation_type ?? 'Select Compensation' }}
                                    </option>
                                    <option value="Pay per job">Pay Per Job</option>
                                    <option value="Salary">Salary</option>
                                </select>
                            </div>



                            <div class="col" id="min-amount-container" style="display: none;">
                                <label for="min_amount" class="form-label fs-base">Min Amount</label>
                                <input type="number" class="form-control form-control-lg" name="min_amount"
                                    value="{{ Auth::user()->min_amount }}" placeholder="Enter Min Amount">
                            </div>

                            <div class="col" id="max-amount-container" style="display: none;">
                                <label for="max_amount" class="form-label fs-base">Max Amount</label>
                                <input type="number" class="form-control form-control-lg" name="max_amount"
                                    value="{{ Auth::user()->max_amount }}" placeholder="Enter Max Amount">
                            </div>


                            <div class="col">
                                <label for="fn" class="form-label fs-base">USD Rate</label>
                                <div class="input-group mb-3">

                                    <span class="input-group-text">
                                        <i class="fi-dollar-sign"></i>
                                    </span>
                                    <input type="number" class="form-control form-control-lg" name="min_rate"
                                        value="{{ Auth::user()->usd_rate }}">
                                </div>
                            </div>



                            <div class="col">
                                <label for="fn" class="form-label fs-base">EUR Rate</label>
                                <div class="input-group mb-3">

                                    <span class="input-group-text">
                                        <i class="fa-euro-sign fas"></i>
                                    </span>

                                    <input type="number" class="form-control form-control-lg" name="max_rate"
                                        value="{{ Auth::user()->eur_rate }}">
                                </div>
                            </div>

                            <div class="col">
                                <label for="fn" class="form-label fs-base">NGN Rate</label>
                                <div class="input-group mb-3">
                                    <span class="input-group-text">
                                        <i class="fa-naira-sign fas"></i>
                                    </span>
                                    <input type="number" class="form-control form-control-lg" name="min_rate"
                                        value="{{ Auth::user()->ngn_rate }}">
                                </div>
                            </div>

                            <div class="col">
                                <label for="fn" class="form-label fs-base">GBP Rate</label>
                                <div class="input-group mb-3">
                                    <span class="input-group-text">
                                        <i class="fa-pound-sign fas"></i>
                                    </span>
                                    <input type="number" class="form-control form-control-lg" name="max_rate"
                                        value="{{ Auth::user()->gbp_rate }}">
                                </div>
                            </div>


                        </div>

                        <div class="d-flex gap-3">
                            <a class="btn btn-lg btn-secondary" href="account-profile.html">Cancel</a>
                            <button type="submit" class="btn btn-lg btn-dark">Save changes</button>
                        </div>
                    </form>
                </div>
            </div>




            <!-- Education tab -->
            <div class="tab-pane fade" id="education" role="tabpanel" aria-labelledby="security-tab">
                <div class="col-lg-9">
                    <h1 class="h2">Education Details </h1>
                    <p class="pb-2 pb-lg-3">Add and manage payment methods with our secure payment system.</p>

                    <!-- Cards -->
                    <div class="d-flex flex-column flex-sm-row gap-3 gap-md-4 pb-2 pb-lg-3 mb-3" style="max-width: 810px">

                        <!--  card -->
                        @if ($education->isEmpty())
                            <p>No education records found.</p>
                        @else
                            @foreach ($education as $row)
                                <div class="card w-100 border-0">
                                    <div class="card-body position-relative z-2">
                                        <div class="d-flex align-items-center pb-4 mb-2 mb-md-3">
                                            <svg id="svg" version="1.1" xmlns="http://www.w3.org/2000/svg"
                                                xmlns:xlink="http://www.w3.org/1999/xlink" width="70" height="60"
                                                viewBox="0, 0, 400,400">
                                                <g id="svgg">
                                                    <path id="path0"
                                                        d="M195.106 32.800 L 193.506 34.400 186.727 34.400 C 179.153 34.400,178.402 34.591,178.396 36.514 C 178.393 37.221,178.280 38.475,178.143 39.300 L 177.895 40.800 172.286 40.800 C 165.131 40.800,162.169 41.882,161.009 44.921 L 160.337 46.681 155.417 46.944 C 148.216 47.329,147.200 47.932,147.200 51.814 L 147.200 53.109 141.653 53.262 C 135.159 53.440,134.980 53.529,134.603 56.771 C 134.281 59.549,134.178 59.588,127.114 59.596 C 122.133 59.601,122.000 59.699,122.000 63.374 L 122.000 65.600 116.700 65.605 C 111.076 65.611,109.600 65.809,109.600 66.557 C 109.600 66.812,108.835 67.376,107.900 67.810 C 106.670 68.382,105.979 69.053,105.400 70.240 L 104.600 71.880 99.798 72.094 C 92.930 72.399,91.200 73.386,91.200 77.001 C 91.200 77.834,90.977 77.897,87.100 78.154 C 79.328 78.669,79.108 78.814,78.386 83.901 C 77.945 87.004,77.760 87.480,76.548 88.623 C 75.807 89.322,75.200 90.098,75.200 90.347 C 75.200 90.596,74.589 90.800,73.843 90.800 C 71.975 90.800,72.000 90.634,72.000 102.956 C 72.000 115.666,71.885 115.254,75.496 115.515 L 77.899 115.689 78.097 118.459 C 78.339 121.839,78.159 121.661,81.586 121.906 L 84.400 122.107 84.400 135.843 L 84.400 149.579 82.618 151.361 C 81.543 152.436,80.394 153.194,79.722 153.272 C 78.170 153.451,78.051 154.465,78.023 167.658 L 78.000 178.716 76.500 178.246 C 74.413 177.592,72.186 175.316,71.842 173.484 L 71.564 172.000 68.602 172.000 L 65.640 172.000 65.365 169.574 C 64.993 166.281,64.766 166.129,59.724 165.786 C 52.533 165.295,47.230 165.869,47.168 167.143 C 47.142 167.687,47.100 167.697,46.922 167.200 C 46.382 165.688,45.715 165.600,34.750 165.600 C 21.613 165.600,22.000 165.491,22.000 169.190 L 22.000 172.000 19.043 172.000 C 15.607 172.000,15.600 172.007,15.600 175.833 L 15.600 178.400 13.644 178.400 C 9.916 178.400,9.820 178.630,9.677 187.881 C 9.560 195.482,9.591 195.868,10.377 196.580 C 10.830 196.989,11.200 197.542,11.200 197.808 C 11.200 198.680,12.906 200.485,14.267 201.054 L 15.600 201.611 15.625 204.905 C 15.688 213.349,16.288 215.193,18.976 215.205 C 22.065 215.219,22.000 215.094,22.000 221.047 C 22.000 227.519,22.259 228.000,25.738 228.000 L 27.875 228.000 28.127 233.821 C 28.429 240.819,28.206 240.400,31.624 240.400 L 34.400 240.400 34.400 246.351 C 34.400 250.922,34.528 252.408,34.952 252.760 C 35.255 253.012,35.618 253.790,35.758 254.490 C 36.096 256.180,37.416 257.520,39.223 258.006 L 40.698 258.403 40.877 264.018 C 41.087 270.596,41.325 271.063,44.667 271.459 L 46.692 271.699 46.928 274.515 C 47.206 277.824,47.381 277.986,50.700 277.994 L 53.200 278.000 53.200 280.786 C 53.200 284.112,53.517 284.400,57.174 284.400 L 59.600 284.400 59.600 287.400 L 59.600 290.400 62.600 290.400 L 65.600 290.400 65.600 293.413 C 65.600 295.613,65.750 296.483,66.155 296.638 C 66.460 296.755,66.824 297.418,66.962 298.111 C 67.295 299.773,69.024 301.531,70.621 301.830 C 71.922 302.074,72.537 302.865,72.960 304.835 C 73.345 306.627,74.720 307.978,76.438 308.252 C 77.307 308.391,78.114 308.661,78.232 308.853 C 78.351 309.044,79.787 309.200,81.424 309.200 L 84.400 309.200 84.400 312.544 L 84.400 315.889 82.324 316.134 C 79.891 316.423,79.270 316.933,78.780 319.044 C 78.264 321.267,78.290 358.285,78.808 358.605 C 79.032 358.743,79.657 359.729,80.197 360.795 C 80.933 362.246,81.575 362.907,82.751 363.427 L 84.323 364.120 84.461 367.440 C 84.546 369.459,84.804 370.964,85.120 371.280 C 85.678 371.838,183.888 372.329,188.300 371.796 L 190.400 371.542 190.400 368.571 L 190.400 365.600 192.924 365.600 C 197.244 365.600,196.862 368.299,196.717 338.789 C 196.564 307.359,197.303 310.293,189.360 309.597 C 183.842 309.113,184.407 309.431,184.120 306.645 C 183.837 303.909,183.478 303.586,180.415 303.308 L 178.000 303.089 178.000 297.107 C 178.000 291.520,177.949 291.112,177.223 290.922 C 176.773 290.804,176.339 290.235,176.193 289.570 C 175.935 288.393,174.191 286.642,172.856 286.218 C 172.233 286.020,172.048 285.362,171.754 282.293 C 171.486 279.502,171.254 278.588,170.800 278.528 C 170.470 278.485,169.165 278.335,167.900 278.196 L 165.600 277.942 165.553 273.471 C 165.477 266.364,165.398 266.210,161.557 265.798 L 159.314 265.557 159.100 261.668 C 158.778 255.838,157.986 254.409,154.736 253.799 L 153.288 253.527 152.944 250.464 L 152.600 247.400 149.753 247.068 L 146.905 246.736 146.683 244.285 C 146.411 241.279,145.866 240.800,142.724 240.800 L 140.400 240.800 140.400 239.026 C 140.400 235.476,139.969 235.011,136.300 234.600 L 134.000 234.342 134.000 232.416 C 134.000 229.639,133.132 228.727,130.266 228.489 L 128.000 228.301 127.994 222.650 C 127.987 215.903,128.020 215.974,124.698 215.707 L 122.096 215.498 121.910 209.449 C 121.711 202.980,121.796 201.866,122.235 205.176 C 122.715 208.796,122.969 208.928,129.846 209.131 L 135.800 209.308 136.600 210.954 C 137.174 212.135,137.877 212.826,139.086 213.400 C 140.013 213.840,140.778 214.406,140.786 214.657 C 140.811 215.448,141.910 215.600,147.586 215.600 L 153.107 215.600 153.274 218.227 C 153.484 221.528,153.363 221.463,159.963 221.813 C 165.903 222.127,165.985 222.165,165.994 224.624 C 166.005 227.618,166.349 227.781,172.967 227.938 L 178.800 228.075 178.801 229.338 C 178.807 233.839,181.156 234.400,200.000 234.400 C 218.844 234.400,221.193 233.839,221.199 229.338 L 221.200 228.075 227.033 227.938 C 233.651 227.781,233.995 227.618,234.006 224.624 C 234.015 222.173,234.087 222.141,240.200 221.840 C 246.704 221.519,246.800 221.462,246.800 217.924 L 246.800 215.600 252.216 215.600 C 260.466 215.600,263.565 214.437,264.486 210.995 L 264.947 209.272 270.613 209.136 C 276.722 208.989,277.427 208.765,277.716 206.871 C 277.806 206.282,277.907 207.980,277.940 210.645 L 278.000 215.490 275.350 215.703 C 271.973 215.974,272.013 215.891,272.006 222.650 L 272.000 228.301 269.734 228.489 C 266.868 228.727,266.000 229.639,266.000 232.416 L 266.000 234.342 263.700 234.600 C 260.031 235.011,259.600 235.476,259.600 239.026 L 259.600 240.800 257.276 240.800 C 254.134 240.800,253.589 241.279,253.317 244.285 L 253.095 246.736 250.247 247.068 L 247.400 247.400 247.056 250.464 L 246.712 253.527 245.264 253.799 C 242.014 254.409,241.222 255.838,240.900 261.668 L 240.686 265.557 238.443 265.798 C 234.602 266.210,234.523 266.364,234.447 273.471 L 234.400 277.942 232.100 278.196 C 230.835 278.335,229.530 278.485,229.200 278.528 C 228.746 278.588,228.514 279.502,228.246 282.293 C 227.952 285.362,227.767 286.020,227.144 286.218 C 225.809 286.642,224.065 288.393,223.807 289.570 C 223.661 290.235,223.227 290.804,222.777 290.922 C 222.051 291.112,222.000 291.520,222.000 297.107 L 222.000 303.089 219.585 303.308 C 216.522 303.586,216.163 303.909,215.880 306.645 C 215.592 309.440,216.155 309.130,210.523 309.590 C 207.875 309.806,205.439 310.087,205.109 310.214 C 203.446 310.852,203.408 311.440,203.277 338.588 C 203.134 368.327,202.750 365.600,207.076 365.600 L 209.600 365.600 209.600 368.571 L 209.600 371.542 211.700 371.796 C 216.112 372.329,314.322 371.838,314.880 371.280 C 315.196 370.964,315.454 369.459,315.539 367.440 L 315.677 364.120 317.249 363.427 C 318.425 362.907,319.067 362.246,319.803 360.795 C 320.343 359.729,320.968 358.743,321.192 358.605 C 321.698 358.292,321.726 321.833,321.222 319.224 C 320.812 317.095,320.086 316.492,317.530 316.153 L 315.600 315.897 315.600 312.548 L 315.600 309.200 318.576 309.200 C 320.213 309.200,321.649 309.044,321.768 308.853 C 321.886 308.661,322.693 308.391,323.562 308.252 C 325.280 307.978,326.655 306.627,327.040 304.835 C 327.463 302.865,328.078 302.074,329.379 301.830 C 330.976 301.531,332.705 299.773,333.038 298.111 C 333.176 297.418,333.540 296.755,333.845 296.638 C 334.250 296.483,334.400 295.613,334.400 293.413 L 334.400 290.400 337.400 290.400 L 340.400 290.400 340.400 287.400 L 340.400 284.400 342.826 284.400 C 346.483 284.400,346.800 284.112,346.800 280.786 L 346.800 278.000 349.300 277.994 C 352.619 277.986,352.794 277.824,353.072 274.515 L 353.308 271.699 355.333 271.459 C 358.675 271.063,358.913 270.596,359.123 264.018 L 359.302 258.403 360.777 258.006 C 362.584 257.520,363.904 256.180,364.242 254.490 C 364.382 253.790,364.745 253.012,365.048 252.760 C 365.472 252.408,365.600 250.922,365.600 246.351 L 365.600 240.400 368.376 240.400 C 371.794 240.400,371.571 240.819,371.873 233.821 L 372.125 228.000 374.262 228.000 C 377.741 228.000,378.000 227.519,378.000 221.047 C 378.000 215.094,377.935 215.219,381.024 215.205 C 383.712 215.193,384.312 213.349,384.375 204.905 L 384.400 201.611 385.733 201.054 C 387.094 200.485,388.800 198.680,388.800 197.808 C 388.800 197.542,389.170 196.989,389.623 196.580 C 390.408 195.869,390.440 195.481,390.323 187.931 C 390.180 178.755,390.191 178.781,386.620 178.485 L 384.400 178.301 384.400 175.783 C 384.400 172.013,384.388 172.000,380.957 172.000 L 378.000 172.000 378.000 169.190 C 378.000 165.491,378.387 165.600,365.250 165.600 C 354.285 165.600,353.618 165.688,353.078 167.200 C 352.900 167.697,352.858 167.687,352.832 167.143 C 352.770 165.869,347.467 165.295,340.276 165.786 C 335.234 166.129,335.007 166.281,334.635 169.574 L 334.360 172.000 331.407 172.000 C 328.805 172.000,328.424 172.095,328.200 172.800 C 328.060 173.240,327.694 173.600,327.387 173.600 C 326.586 173.600,324.089 175.890,323.762 176.925 C 323.610 177.406,323.151 178.035,322.743 178.323 C 322.076 178.792,322.000 179.454,322.000 184.823 L 322.000 190.800 319.676 190.800 C 315.910 190.800,315.839 190.923,315.661 197.804 L 315.509 203.682 314.304 203.441 C 313.642 203.308,312.244 203.200,311.198 203.200 L 309.296 203.200 309.122 200.788 C 308.847 196.986,309.324 197.140,296.937 196.864 C 291.032 196.733,286.916 196.530,287.790 196.413 C 290.507 196.049,290.388 197.521,290.394 164.300 L 290.400 134.400 295.300 134.353 C 302.732 134.281,302.533 134.371,302.938 130.897 L 303.276 128.000 309.024 128.000 C 315.646 128.000,315.600 128.026,315.600 124.280 L 315.600 122.107 318.414 121.906 C 321.841 121.661,321.661 121.839,321.903 118.459 L 322.101 115.689 324.504 115.515 C 328.115 115.254,328.000 115.666,328.000 102.956 C 328.000 90.634,328.025 90.800,326.157 90.800 C 325.411 90.800,324.800 90.596,324.800 90.347 C 324.800 90.098,324.198 89.327,323.462 88.633 C 322.285 87.523,322.063 86.973,321.610 84.066 C 320.834 79.078,320.259 78.686,312.932 78.153 C 308.972 77.865,308.839 77.770,308.793 75.200 C 308.750 72.826,306.366 72.025,299.287 72.008 C 296.486 72.001,295.941 71.892,295.758 71.300 C 295.013 68.893,294.307 67.922,292.896 67.365 C 292.073 67.041,290.922 66.511,290.338 66.187 C 289.546 65.749,287.848 65.600,283.638 65.600 L 278.000 65.600 278.000 63.080 C 278.000 59.765,277.783 59.601,273.420 59.597 C 271.429 59.595,268.878 59.482,267.752 59.347 L 265.704 59.101 265.449 56.668 C 265.106 53.382,265.182 53.420,258.581 53.262 L 252.800 53.125 252.800 51.389 C 252.800 47.481,252.541 47.335,244.932 46.949 L 239.663 46.681 238.991 44.921 C 237.831 41.882,234.869 40.800,227.714 40.800 L 222.105 40.800 221.857 39.300 C 221.720 38.475,221.607 37.221,221.604 36.514 C 221.598 34.591,220.847 34.400,213.273 34.400 L 206.494 34.400 204.894 32.800 L 203.294 31.200 200.000 31.200 L 196.706 31.200 195.106 32.800 M205.943 45.171 C 206.774 45.595,207.700 46.239,208.002 46.602 C 208.885 47.667,212.183 49.163,215.096 49.820 C 218.973 50.695,220.672 51.436,223.258 53.380 C 224.966 54.664,226.382 55.316,228.871 55.965 C 233.842 57.261,235.572 57.978,237.161 59.402 C 239.174 61.206,240.437 61.755,244.901 62.771 C 248.324 63.549,249.056 63.874,250.864 65.417 C 252.872 67.131,254.447 67.807,260.117 69.387 C 261.524 69.779,263.015 70.553,263.917 71.361 C 265.973 73.204,267.416 73.871,271.832 75.018 C 275.880 76.070,278.300 77.116,279.202 78.202 C 280.010 79.176,283.090 80.619,285.600 81.199 C 288.907 81.964,290.828 82.789,292.600 84.204 C 294.880 86.025,296.209 86.633,300.028 87.601 C 303.784 88.553,304.296 88.820,306.633 91.045 C 307.531 91.900,308.875 92.960,309.618 93.400 C 312.784 95.273,313.922 100.261,312.621 106.560 C 311.763 110.714,311.272 111.350,307.937 112.624 C 306.347 113.232,304.075 114.545,302.686 115.660 C 301.075 116.953,299.480 117.834,298.019 118.237 C 291.254 120.103,290.540 120.393,288.832 121.970 C 287.614 123.095,286.188 123.871,284.007 124.598 C 275.689 127.368,276.281 124.932,275.993 157.600 L 275.755 184.600 274.634 187.600 C 273.164 191.535,272.699 191.976,268.313 193.592 C 264.649 194.943,261.915 196.367,261.406 197.190 C 260.945 197.937,258.172 199.149,255.349 199.837 C 252.148 200.617,249.020 202.058,247.600 203.407 C 246.321 204.622,244.447 205.398,240.765 206.235 C 236.907 207.113,234.805 208.043,232.932 209.700 C 231.325 211.122,229.933 211.778,227.600 212.209 C 223.701 212.929,220.924 214.066,218.893 215.774 C 217.036 217.336,216.325 217.647,212.893 218.402 C 210.752 218.873,207.740 219.722,206.200 220.289 C 202.065 221.811,198.309 221.937,195.110 220.663 C 193.729 220.113,190.890 219.266,188.800 218.782 C 184.417 217.765,183.182 217.212,181.079 215.327 C 179.189 213.633,178.734 213.446,173.855 212.359 C 170.275 211.562,169.710 211.306,167.752 209.592 C 165.561 207.674,165.477 207.641,158.277 205.796 C 156.447 205.327,155.014 204.647,153.905 203.721 C 151.451 201.670,149.716 200.917,144.775 199.759 C 141.169 198.913,140.022 198.464,138.851 197.437 C 136.747 195.590,135.817 195.094,131.736 193.636 C 127.375 192.079,126.733 191.471,125.339 187.577 L 124.274 184.600 124.037 157.400 C 123.752 124.730,124.408 127.475,116.190 124.558 C 114.462 123.944,112.497 122.978,111.824 122.411 C 109.222 120.220,109.405 120.272,107.406 121.156 C 105.754 121.887,105.428 122.265,104.247 124.814 L 102.930 127.656 102.065 125.575 C 101.589 124.430,101.200 123.251,101.200 122.955 C 101.200 122.658,100.120 121.224,98.800 119.768 C 97.480 118.311,96.400 116.971,96.400 116.790 C 96.400 115.963,94.086 113.853,92.047 112.819 C 87.825 110.679,86.480 107.329,87.018 100.296 C 87.335 96.150,88.037 94.849,91.014 92.898 C 92.106 92.181,93.524 91.035,94.165 90.350 C 95.532 88.888,96.737 88.354,100.800 87.406 C 103.834 86.698,106.616 85.386,107.603 84.197 C 108.465 83.157,110.147 82.443,114.226 81.383 C 118.221 80.345,121.469 78.922,122.398 77.802 C 123.330 76.680,125.694 75.695,129.627 74.791 C 133.145 73.982,136.400 72.461,136.400 71.627 C 136.400 70.880,139.123 69.627,142.601 68.774 C 146.071 67.922,149.200 66.582,149.200 65.947 C 149.200 64.980,152.145 63.564,155.817 62.763 C 160.351 61.775,162.099 61.000,163.776 59.235 C 164.940 58.010,165.826 57.664,173.074 55.608 C 174.697 55.148,176.700 54.227,177.674 53.492 C 180.658 51.244,181.476 50.831,184.679 49.957 C 188.222 48.990,190.545 47.925,192.000 46.604 C 194.629 44.215,202.487 43.408,205.943 45.171 M109.433 69.410 C 109.129 70.621,107.833 72.000,107.000 72.000 C 106.084 72.000,106.265 71.572,107.881 69.917 C 109.631 68.125,109.767 68.081,109.433 69.410 M106.386 158.623 C 107.231 160.396,108.363 162.376,108.902 163.023 C 110.692 165.174,110.800 165.698,110.800 172.226 C 110.800 179.710,110.716 179.915,106.151 183.588 L 103.153 186.000 100.010 186.000 L 96.868 186.000 95.226 184.134 C 94.323 183.108,93.031 181.303,92.355 180.122 L 91.127 177.975 91.272 172.088 C 91.511 162.372,94.363 155.656,98.516 155.033 C 99.479 154.889,100.882 154.436,101.633 154.027 L 103.000 153.283 103.925 154.341 C 104.434 154.924,105.542 156.850,106.386 158.623 M327.289 177.289 C 326.855 177.723,326.162 178.009,325.750 177.925 C 325.098 177.792,325.180 177.591,326.386 176.386 C 327.591 175.180,327.792 175.098,327.925 175.750 C 328.009 176.162,327.723 176.855,327.289 177.289 M38.104 180.194 C 42.011 180.942,43.962 181.932,45.597 183.996 L 46.886 185.623 48.667 183.981 C 53.266 179.742,61.420 180.438,62.845 185.191 C 63.097 186.034,64.001 187.596,64.854 188.662 C 67.051 191.410,67.807 193.183,68.960 198.294 C 70.052 203.138,70.627 204.557,72.000 205.800 C 73.341 207.014,73.838 208.238,74.762 212.600 C 75.834 217.662,76.613 219.838,77.986 221.600 C 79.775 223.897,80.381 225.394,81.416 230.072 C 82.357 234.326,82.487 234.615,84.362 236.597 C 85.441 237.738,86.874 239.761,87.546 241.094 C 88.219 242.426,89.451 244.072,90.285 244.751 C 91.118 245.431,92.797 247.654,94.015 249.693 C 96.758 254.282,97.093 254.314,98.501 250.118 L 99.602 246.835 98.675 243.918 C 98.162 242.304,97.106 240.159,96.311 239.118 C 93.914 235.979,92.958 230.766,93.539 224.000 C 93.965 219.034,93.814 219.300,99.539 213.368 C 101.878 210.944,102.748 210.688,105.463 211.622 C 110.624 213.397,111.417 214.443,112.988 221.547 C 114.138 226.746,114.567 227.793,116.306 229.650 C 117.280 230.690,117.928 232.009,118.600 234.321 C 120.070 239.377,120.934 241.022,122.707 242.141 C 124.243 243.111,127.200 246.221,127.200 246.867 C 127.200 247.045,127.965 247.662,128.900 248.239 C 130.604 249.290,133.791 252.225,139.716 258.200 C 142.040 260.543,143.256 262.167,144.258 264.263 C 145.196 266.225,146.179 267.578,147.381 268.563 C 148.798 269.724,149.307 270.519,150.033 272.700 C 151.471 277.028,152.182 278.336,153.879 279.790 C 155.107 280.840,155.737 281.870,156.599 284.234 C 157.359 286.316,158.302 287.963,159.517 289.332 C 162.999 293.253,163.996 297.591,163.998 308.838 C 164.000 317.837,164.338 318.175,173.800 318.648 C 182.703 319.093,183.151 320.136,183.182 340.453 L 183.200 352.706 181.622 356.253 C 180.754 358.204,179.574 360.205,179.000 360.700 L 177.955 361.600 140.050 361.600 C 98.063 361.600,99.181 361.665,96.585 359.061 C 93.708 356.175,93.509 354.756,93.715 338.600 C 93.963 319.268,93.783 319.783,100.565 318.959 C 109.504 317.874,111.450 316.605,108.696 313.661 C 107.694 312.590,106.511 311.001,106.066 310.130 C 105.036 308.111,104.623 307.785,101.598 306.599 C 100.089 306.008,98.330 304.896,97.133 303.776 C 95.977 302.695,93.792 301.298,91.861 300.406 C 89.403 299.270,88.191 298.428,87.099 297.095 C 86.294 296.112,85.042 295.025,84.317 294.680 C 82.527 293.828,81.352 292.666,80.408 290.817 C 79.973 289.963,78.852 288.751,77.918 288.124 C 76.985 287.496,75.821 286.357,75.333 285.592 C 73.748 283.107,72.717 281.958,71.234 281.022 C 70.383 280.484,69.371 279.311,68.798 278.197 C 68.187 277.007,67.046 275.720,65.763 274.773 C 64.633 273.938,63.235 272.447,62.657 271.461 C 62.078 270.474,60.714 268.887,59.625 267.933 C 57.707 266.255,56.137 263.519,55.433 260.627 C 55.054 259.066,53.310 256.128,52.601 255.856 C 51.725 255.519,50.604 252.941,49.645 249.055 C 48.673 245.114,47.726 242.999,46.400 241.800 C 45.134 240.656,44.218 238.642,43.397 235.200 C 42.564 231.705,41.127 228.233,40.311 227.743 C 39.094 227.012,38.005 224.861,37.200 221.600 C 35.973 216.633,35.219 214.868,33.934 213.953 C 32.419 212.874,31.832 211.644,30.996 207.800 C 30.075 203.565,29.433 202.080,27.800 200.400 C 25.209 197.734,24.034 192.552,24.725 186.835 C 25.250 182.488,26.140 181.488,30.426 180.425 C 34.207 179.488,34.385 179.482,38.104 180.194 M369.311 180.444 C 374.173 181.691,374.931 182.620,375.349 187.841 C 375.804 193.517,374.713 197.655,371.971 200.661 C 371.137 201.574,370.266 203.014,370.035 203.861 C 369.803 204.707,369.229 206.893,368.758 208.718 C 368.060 211.427,367.615 212.335,366.337 213.666 C 364.478 215.601,364.025 216.610,362.820 221.504 C 361.966 224.976,360.975 226.939,359.673 227.743 C 358.850 228.251,357.396 231.798,356.637 235.146 C 355.884 238.470,354.901 240.625,353.600 241.800 C 352.227 243.041,351.321 245.143,350.156 249.789 C 349.261 253.364,348.856 254.306,347.687 255.533 C 346.242 257.050,344.400 260.132,344.400 261.033 C 344.400 262.566,342.217 266.383,340.538 267.787 C 339.540 268.621,338.115 270.256,337.370 271.420 C 336.625 272.584,335.302 274.046,334.430 274.668 C 333.558 275.291,332.430 276.507,331.923 277.372 C 330.955 279.020,329.268 280.818,327.343 282.251 C 326.714 282.719,325.732 283.979,325.160 285.051 C 324.457 286.368,323.584 287.300,322.467 287.926 C 321.392 288.528,320.370 289.593,319.548 290.968 C 318.656 292.460,317.661 293.455,316.172 294.346 C 315.010 295.041,313.484 296.336,312.781 297.224 C 311.841 298.411,310.532 299.299,307.850 300.570 C 305.609 301.632,303.475 302.998,302.321 304.110 C 301.157 305.232,299.682 306.174,298.444 306.585 C 295.861 307.443,294.575 308.481,293.547 310.538 C 293.090 311.452,291.976 312.966,291.072 313.903 C 288.525 316.541,290.845 317.971,299.163 318.888 C 306.195 319.662,306.036 319.224,306.285 338.600 C 306.491 354.756,306.292 356.175,303.415 359.061 C 300.819 361.665,301.939 361.600,259.934 361.600 L 222.013 361.600 220.837 360.500 C 220.191 359.895,219.018 357.883,218.231 356.030 L 216.800 352.659 216.818 340.430 C 216.849 320.139,217.299 319.093,226.200 318.648 C 235.700 318.173,236.000 317.867,236.001 308.638 C 236.001 297.668,237.109 292.800,240.376 289.400 C 242.083 287.623,242.764 286.402,243.776 283.305 C 244.241 281.883,244.948 280.791,245.976 279.905 C 247.684 278.435,248.685 276.632,249.977 272.700 C 250.697 270.511,251.197 269.728,252.619 268.563 C 253.819 267.579,254.805 266.223,255.743 264.263 C 256.727 262.207,257.955 260.554,260.096 258.400 C 265.884 252.578,269.419 249.321,271.100 248.261 C 272.035 247.672,272.800 247.045,272.800 246.867 C 272.800 246.221,275.757 243.111,277.293 242.141 C 279.062 241.025,279.930 239.375,281.387 234.364 C 282.088 231.951,282.691 230.774,283.889 229.474 C 285.517 227.708,285.620 227.424,287.587 219.234 C 288.790 214.221,289.450 213.481,294.279 211.728 L 296.932 210.765 298.795 212.036 C 299.820 212.736,301.079 213.922,301.593 214.672 C 302.108 215.423,303.062 216.417,303.715 216.882 C 307.427 219.525,307.697 233.433,304.131 238.345 C 300.794 242.942,300.123 246.031,301.545 250.261 C 302.879 254.230,303.275 254.224,305.638 250.200 C 306.671 248.440,308.515 246.005,309.735 244.788 C 310.955 243.572,312.320 241.720,312.769 240.672 C 313.218 239.624,314.489 237.812,315.593 236.645 C 317.521 234.607,317.638 234.348,318.584 230.072 C 319.614 225.418,320.275 223.764,321.871 221.852 C 323.242 220.210,323.895 218.441,325.063 213.212 C 326.181 208.207,326.651 207.020,328.000 205.800 C 329.371 204.559,329.948 203.139,331.032 198.338 C 332.240 192.983,332.805 191.555,334.464 189.666 C 335.160 188.873,336.234 187.112,336.851 185.752 C 339.301 180.349,346.445 179.475,351.333 183.981 L 353.114 185.623 354.403 183.996 C 355.982 182.002,358.016 180.926,361.523 180.227 C 365.252 179.484,365.606 179.494,369.311 180.444 M14.674 197.670 C 16.014 198.928,15.977 200.266,14.628 199.381 C 13.143 198.409,12.169 196.800,13.065 196.800 C 13.441 196.800,14.165 197.191,14.674 197.670 M94.610 197.171 C 91.367 197.437,90.816 198.036,90.806 201.300 L 90.800 203.200 88.850 203.200 C 87.778 203.200,86.338 203.313,85.650 203.450 L 84.400 203.700 84.400 200.250 L 84.400 196.800 90.900 196.871 C 95.449 196.920,96.563 197.010,94.610 197.171 M386.981 197.772 C 386.009 199.257,384.400 200.231,384.400 199.335 C 384.400 198.405,385.970 196.800,386.879 196.800 C 387.570 196.800,387.577 196.863,386.981 197.772 M278.276 205.100 C 278.175 205.485,278.093 205.170,278.093 204.400 C 278.093 203.630,278.175 203.315,278.276 203.700 C 278.376 204.085,278.376 204.715,278.276 205.100 M139.782 210.218 C 140.735 211.172,141.150 212.400,140.519 212.400 C 140.124 212.400,137.600 209.911,137.600 209.522 C 137.600 208.854,138.802 209.238,139.782 210.218 M174.179 289.292 C 175.363 290.981,174.508 291.416,172.926 289.930 C 171.736 288.813,171.627 287.372,172.779 287.989 C 173.208 288.218,173.838 288.805,174.179 289.292 M227.166 289.836 C 226.225 290.838,225.200 291.116,225.200 290.369 C 225.200 290.132,225.779 289.367,226.486 288.669 C 228.066 287.109,228.703 288.200,227.166 289.836 M83.566 360.164 C 84.932 361.617,84.560 362.760,83.097 361.607 C 82.491 361.129,81.810 360.392,81.583 359.969 C 80.962 358.808,82.428 358.952,83.566 360.164 M318.417 359.969 C 317.668 361.367,315.824 362.596,315.664 361.802 C 315.490 360.941,317.109 359.200,318.084 359.200 C 318.694 359.200,318.754 359.338,318.417 359.969 "
                                                        stroke="none" fill="#4e3024" fill-rule="evenodd"></path>
                                                    <path id="path1"
                                                        d="M97.905 155.079 C 94.402 155.633,91.493 163.094,91.272 172.088 L 91.127 177.975 92.355 180.122 C 93.031 181.303,94.323 183.108,95.226 184.134 L 96.868 186.000 100.010 186.000 L 103.153 186.000 106.151 183.588 C 110.716 179.915,110.800 179.710,110.800 172.226 C 110.800 165.803,110.649 165.023,109.076 163.296 C 108.623 162.798,107.507 160.831,106.597 158.924 L 104.941 155.458 102.971 155.396 C 101.887 155.363,100.550 155.238,100.000 155.120 C 99.450 155.002,98.507 154.984,97.905 155.079 M109.582 316.557 C 108.611 317.473,105.123 318.406,100.621 318.953 C 93.774 319.784,93.963 319.247,93.715 338.600 C 93.509 354.756,93.708 356.175,96.585 359.061 C 99.181 361.665,98.063 361.600,140.050 361.600 L 177.955 361.600 179.000 360.700 C 179.574 360.205,180.754 358.204,181.622 356.253 L 183.200 352.706 183.182 340.453 C 183.153 321.173,182.316 318.800,175.546 318.800 C 171.884 318.800,166.673 317.871,165.304 316.974 C 164.389 316.375,164.267 316.384,163.462 317.119 C 161.125 319.253,161.794 319.200,137.400 319.200 C 112.788 319.200,113.663 319.275,111.182 316.958 C 110.313 316.147,110.079 316.088,109.582 316.557 M288.800 317.074 C 286.601 319.222,286.874 319.200,262.531 319.200 C 238.213 319.200,238.874 319.253,236.538 317.119 C 235.733 316.384,235.611 316.375,234.696 316.974 C 233.327 317.871,228.116 318.800,224.454 318.800 C 217.686 318.800,216.847 321.176,216.818 340.430 L 216.800 352.659 218.231 356.030 C 219.018 357.883,220.191 359.895,220.837 360.500 L 222.013 361.600 259.934 361.600 C 301.939 361.600,300.819 361.665,303.415 359.061 C 306.292 356.175,306.491 354.756,306.285 338.600 C 306.036 319.224,306.195 319.662,299.163 318.888 C 294.987 318.427,291.521 317.520,290.400 316.593 C 289.908 316.186,289.621 316.273,288.800 317.074 "
                                                        stroke="none" fill="#8bc5d3" fill-rule="evenodd"></path>
                                                    <path id="path2"
                                                        d="M194.200 45.064 C 193.540 45.411,192.550 46.104,192.000 46.604 C 190.545 47.925,188.222 48.990,184.679 49.957 C 181.476 50.831,180.658 51.244,177.674 53.492 C 176.700 54.227,174.697 55.148,173.074 55.608 C 165.826 57.664,164.940 58.010,163.776 59.235 C 162.099 61.000,160.351 61.775,155.817 62.763 C 152.145 63.564,149.200 64.980,149.200 65.947 C 149.200 66.582,146.071 67.922,142.601 68.774 C 139.123 69.627,136.400 70.880,136.400 71.627 C 136.400 72.461,133.145 73.982,129.627 74.791 C 125.694 75.695,123.330 76.680,122.398 77.802 C 121.469 78.922,118.221 80.345,114.226 81.383 C 110.147 82.443,108.465 83.157,107.603 84.197 C 106.616 85.386,103.834 86.698,100.800 87.406 C 96.737 88.354,95.532 88.888,94.165 90.350 C 93.524 91.035,92.106 92.181,91.014 92.898 C 88.037 94.849,87.335 96.150,87.018 100.296 C 86.480 107.329,87.825 110.679,92.047 112.819 C 94.086 113.853,96.400 115.963,96.400 116.790 C 96.400 116.971,97.480 118.311,98.800 119.768 C 100.120 121.224,101.200 122.658,101.200 122.955 C 101.200 123.251,101.589 124.430,102.065 125.575 L 102.930 127.656 104.247 124.814 C 105.428 122.265,105.754 121.887,107.406 121.156 C 109.405 120.272,109.222 120.220,111.824 122.411 C 112.497 122.978,114.462 123.944,116.190 124.558 C 121.335 126.384,123.600 128.286,123.600 130.780 C 123.600 131.756,123.423 131.740,126.185 131.021 C 129.632 130.123,134.441 131.530,139.000 134.770 C 139.880 135.395,142.375 136.474,144.544 137.166 C 148.924 138.564,150.172 139.140,152.539 140.854 C 153.427 141.498,155.964 142.583,158.177 143.266 C 162.284 144.533,165.740 146.056,166.200 146.800 C 166.641 147.513,170.208 149.144,173.065 149.938 C 176.698 150.949,178.355 151.673,179.800 152.883 C 181.508 154.313,182.910 154.956,187.000 156.185 C 188.980 156.780,192.068 158.062,193.862 159.034 C 198.561 161.579,201.440 161.579,206.138 159.032 C 207.959 158.046,211.344 156.709,213.800 156.007 C 216.976 155.100,218.923 154.268,220.800 153.017 C 223.400 151.284,224.412 150.858,229.961 149.164 C 231.589 148.667,233.690 147.674,234.630 146.957 C 237.001 145.146,237.998 144.690,242.800 143.216 C 245.872 142.272,247.567 141.491,249.113 140.304 C 250.720 139.071,252.294 138.365,255.684 137.358 C 259.017 136.367,260.819 135.566,262.829 134.180 C 266.458 131.678,271.040 130.306,273.379 131.021 C 274.270 131.294,275.244 131.581,275.543 131.659 C 275.893 131.750,276.289 131.120,276.661 129.880 C 277.359 127.550,279.271 126.175,284.007 124.598 C 286.188 123.871,287.614 123.095,288.832 121.970 C 290.540 120.393,291.254 120.103,298.019 118.237 C 299.480 117.834,301.075 116.953,302.686 115.660 C 304.075 114.545,306.347 113.232,307.937 112.624 C 311.272 111.350,311.763 110.714,312.621 106.560 C 313.922 100.261,312.784 95.273,309.618 93.400 C 308.875 92.960,307.531 91.900,306.633 91.045 C 304.296 88.820,303.784 88.553,300.028 87.601 C 296.209 86.633,294.880 86.025,292.600 84.204 C 290.828 82.789,288.907 81.964,285.600 81.199 C 283.090 80.619,280.010 79.176,279.202 78.202 C 278.300 77.116,275.880 76.070,271.832 75.018 C 267.416 73.871,265.973 73.204,263.917 71.361 C 263.015 70.553,261.524 69.779,260.117 69.387 C 254.447 67.807,252.872 67.131,250.864 65.417 C 249.056 63.874,248.324 63.549,244.901 62.771 C 240.437 61.755,239.174 61.206,237.161 59.402 C 235.572 57.978,233.842 57.261,228.871 55.965 C 226.382 55.316,224.966 54.664,223.258 53.380 C 220.672 51.436,218.973 50.695,215.096 49.820 C 212.183 49.163,208.885 47.667,208.002 46.602 C 206.189 44.418,197.308 43.428,194.200 45.064 M107.881 69.917 C 106.265 71.572,106.084 72.000,107.000 72.000 C 107.833 72.000,109.129 70.621,109.433 69.410 C 109.767 68.081,109.631 68.125,107.881 69.917 M189.100 96.016 C 190.976 96.683,190.726 97.021,187.818 97.751 C 184.272 98.642,178.678 98.595,176.600 97.657 L 175.000 96.935 176.419 96.463 C 180.118 95.233,186.289 95.016,189.100 96.016 M166.193 102.494 L 167.385 103.119 165.793 103.536 C 160.664 104.877,156.678 105.008,153.300 103.946 C 151.412 103.353,151.695 102.917,154.300 102.403 C 155.565 102.153,156.780 101.873,157.000 101.781 C 158.002 101.358,165.072 101.907,166.193 102.494 M138.400 108.198 C 140.131 108.394,143.302 109.499,142.400 109.592 C 142.290 109.604,140.400 109.938,138.200 110.336 C 131.567 111.534,124.093 109.918,130.227 108.611 C 131.972 108.240,133.580 107.873,133.800 107.795 C 134.020 107.718,134.650 107.721,135.200 107.802 C 135.750 107.884,137.190 108.062,138.400 108.198 M116.412 114.914 L 117.800 115.502 116.648 115.961 C 115.081 116.585,103.128 116.388,102.911 115.734 C 102.753 115.260,103.523 114.906,105.488 114.550 C 106.089 114.441,106.652 114.281,106.738 114.195 C 107.143 113.790,115.166 114.386,116.412 114.914 M326.386 176.386 C 325.180 177.591,325.098 177.792,325.750 177.925 C 326.719 178.123,328.123 176.719,327.925 175.750 C 327.792 175.098,327.591 175.180,326.386 176.386 M30.426 180.425 C 26.140 181.488,25.250 182.488,24.725 186.835 C 24.034 192.552,25.209 197.734,27.800 200.400 C 29.433 202.080,30.075 203.565,30.996 207.800 C 31.832 211.644,32.419 212.874,33.934 213.953 C 35.219 214.868,35.973 216.633,37.200 221.600 C 38.005 224.861,39.094 227.012,40.311 227.743 C 41.127 228.233,42.564 231.705,43.397 235.200 C 44.218 238.642,45.134 240.656,46.400 241.800 C 47.726 242.999,48.673 245.114,49.645 249.055 C 50.604 252.941,51.725 255.519,52.601 255.856 C 53.310 256.128,55.054 259.066,55.433 260.627 C 56.137 263.519,57.707 266.255,59.625 267.933 C 60.714 268.887,62.078 270.474,62.657 271.461 C 63.235 272.447,64.633 273.938,65.763 274.773 C 67.046 275.720,68.187 277.007,68.798 278.197 C 69.371 279.311,70.383 280.484,71.234 281.022 C 72.717 281.958,73.748 283.107,75.333 285.592 C 75.821 286.357,76.985 287.496,77.918 288.124 C 78.852 288.751,79.973 289.963,80.408 290.817 C 81.352 292.666,82.527 293.828,84.317 294.680 C 85.042 295.025,86.294 296.112,87.099 297.095 C 88.191 298.428,89.403 299.270,91.861 300.406 C 93.792 301.298,95.977 302.695,97.133 303.776 C 98.330 304.896,100.089 306.008,101.598 306.599 C 104.676 307.806,104.882 307.976,106.338 310.533 C 106.985 311.670,108.094 313.140,108.801 313.800 L 110.087 315.000 109.044 313.444 C 108.470 312.588,108.000 311.703,108.000 311.476 C 108.000 311.249,107.685 310.703,107.300 310.263 C 106.820 309.715,106.787 309.573,107.193 309.812 C 108.032 310.307,106.252 308.113,105.043 307.162 C 104.490 306.727,103.444 306.168,102.719 305.919 C 101.195 305.397,99.225 304.003,97.154 301.982 C 96.355 301.201,94.464 300.047,92.951 299.416 C 91.228 298.698,89.627 297.670,88.667 296.665 C 87.823 295.783,86.293 294.621,85.267 294.082 C 82.769 292.772,82.074 292.113,81.041 290.083 C 80.560 289.136,79.294 287.701,78.218 286.883 C 77.120 286.048,75.815 284.561,75.234 283.481 C 74.663 282.421,73.573 281.171,72.800 280.689 C 70.920 279.517,70.313 278.876,69.385 277.083 C 68.953 276.249,68.061 275.169,67.402 274.683 C 65.585 273.343,63.948 271.500,62.404 269.051 C 61.619 267.808,60.625 266.743,60.135 266.619 C 59.226 266.391,56.889 262.035,56.054 259.011 C 55.550 257.184,54.095 254.987,53.003 254.400 C 52.460 254.109,51.889 252.906,51.240 250.685 C 49.518 244.798,48.828 243.076,47.287 240.821 C 45.813 238.663,45.455 237.781,43.595 231.719 C 42.946 229.600,42.300 228.417,41.156 227.250 C 40.300 226.377,39.600 225.348,39.600 224.963 C 39.600 224.578,39.357 223.979,39.060 223.631 C 38.634 223.133,37.450 219.035,37.032 216.607 C 36.881 215.732,35.907 214.339,34.408 212.855 C 33.546 212.002,32.743 210.875,32.624 210.352 C 32.504 209.828,32.218 208.590,31.987 207.600 C 31.757 206.610,31.469 205.265,31.346 204.612 C 31.011 202.818,29.305 199.684,28.400 199.200 C 27.427 198.679,26.334 196.307,26.188 194.400 C 26.129 193.630,25.955 192.688,25.800 192.307 C 25.175 190.762,25.760 184.511,26.641 183.329 C 29.105 180.022,40.636 180.317,43.600 183.763 C 46.860 187.553,47.449 187.822,48.930 186.200 C 49.332 185.760,49.547 185.625,49.407 185.900 C 49.267 186.175,49.249 186.400,49.366 186.400 C 49.483 186.400,49.846 185.884,50.172 185.254 C 50.750 184.135,53.301 182.568,53.919 182.950 C 54.090 183.056,55.393 183.196,56.815 183.263 C 59.991 183.411,60.568 183.891,61.185 186.899 C 61.676 189.293,64.072 192.650,64.918 192.127 C 65.141 191.989,65.208 192.064,65.066 192.293 C 64.925 192.522,65.085 192.939,65.423 193.219 C 65.760 193.499,65.944 193.969,65.831 194.264 C 65.718 194.559,65.780 194.800,65.969 194.800 C 66.366 194.800,66.709 196.006,67.013 198.469 C 67.621 203.409,68.079 205.436,68.692 205.900 C 69.055 206.175,69.229 206.400,69.076 206.400 C 68.685 206.400,70.021 207.675,71.240 208.466 C 71.805 208.832,72.267 209.391,72.267 209.709 C 72.267 210.768,73.306 215.200,73.555 215.204 C 73.690 215.206,73.845 216.406,73.899 217.871 C 73.962 219.561,74.218 220.778,74.600 221.200 C 74.931 221.566,75.081 221.985,74.934 222.132 C 74.787 222.280,74.899 222.400,75.182 222.400 C 75.603 222.400,75.603 222.515,75.181 223.023 C 74.897 223.365,74.830 223.597,75.032 223.538 C 75.781 223.319,77.177 224.545,76.757 225.052 C 76.459 225.411,76.554 225.485,77.121 225.337 C 78.127 225.073,79.154 227.544,79.641 231.400 C 80.017 234.372,80.669 236.400,81.249 236.400 C 81.442 236.400,81.600 236.679,81.600 237.021 C 81.600 237.362,82.140 237.830,82.800 238.060 C 83.459 238.290,83.899 238.640,83.776 238.839 C 83.653 239.038,83.795 239.200,84.090 239.200 C 84.661 239.200,86.118 241.349,85.778 241.688 C 85.668 241.799,85.792 242.409,86.053 243.045 C 86.315 243.680,86.503 244.327,86.471 244.481 C 86.439 244.636,87.305 245.515,88.395 246.435 C 90.209 247.964,92.321 250.493,91.212 249.807 C 90.420 249.318,91.699 251.287,92.721 252.131 C 93.228 252.549,93.557 252.976,93.453 253.080 C 93.151 253.382,94.903 255.226,96.070 255.833 C 97.392 256.520,99.058 254.381,99.290 251.700 C 99.314 251.425,99.453 251.200,99.600 251.200 C 99.747 251.200,99.891 250.975,99.922 250.700 C 99.952 250.425,100.080 249.660,100.207 249.000 C 100.408 247.954,100.427 246.479,100.271 243.900 C 100.248 243.515,100.077 243.200,99.891 243.200 C 99.705 243.200,99.638 243.062,99.743 242.892 C 100.026 242.435,98.757 239.923,97.481 238.416 C 95.084 235.583,94.720 234.314,94.496 228.001 L 94.289 222.160 95.544 219.780 C 96.234 218.471,96.799 217.555,96.799 217.744 C 96.800 218.174,99.578 215.121,99.591 214.676 C 99.596 214.498,99.761 214.452,99.958 214.574 C 100.155 214.696,100.416 214.536,100.538 214.219 C 100.998 213.019,103.120 212.313,104.724 212.825 C 109.757 214.432,110.831 215.994,112.410 224.000 C 112.979 226.887,113.948 229.145,115.192 230.487 C 116.581 231.985,116.976 232.536,117.149 233.216 C 118.607 238.933,120.037 242.231,121.221 242.607 C 121.944 242.836,124.957 245.623,126.433 247.427 C 127.266 248.446,130.000 250.880,130.000 250.603 C 130.000 250.392,131.270 251.731,132.697 253.445 C 133.084 253.910,134.100 254.765,134.956 255.345 C 135.812 255.925,136.408 256.400,136.281 256.400 C 136.154 256.400,137.253 257.622,138.725 259.116 C 141.784 262.221,141.923 262.415,143.807 266.189 C 144.573 267.723,145.200 268.840,145.200 268.673 C 145.200 268.359,145.811 268.793,147.380 270.224 C 148.196 270.967,150.132 275.823,150.133 277.127 C 150.133 277.417,151.333 278.915,152.800 280.457 C 154.267 281.998,155.482 283.471,155.501 283.729 C 155.588 284.911,156.030 286.154,156.814 287.423 C 157.282 288.180,157.554 288.800,157.419 288.800 C 157.283 288.800,157.810 289.360,158.590 290.045 C 159.369 290.729,160.115 291.719,160.247 292.245 C 160.379 292.770,160.619 293.200,160.780 293.200 C 161.105 293.200,162.046 296.046,162.230 297.583 C 162.295 298.124,162.475 299.474,162.631 300.583 C 162.786 301.692,162.907 304.400,162.898 306.600 C 162.890 308.821,163.113 311.312,163.400 312.200 C 163.872 313.665,163.920 313.293,163.957 307.800 C 164.024 297.750,162.922 293.166,159.517 289.332 C 158.302 287.963,157.359 286.316,156.599 284.234 C 155.737 281.870,155.107 280.840,153.879 279.790 C 152.182 278.336,151.471 277.028,150.033 272.700 C 149.307 270.519,148.798 269.724,147.381 268.563 C 146.179 267.578,145.196 266.225,144.258 264.263 C 143.256 262.167,142.040 260.543,139.716 258.200 C 133.791 252.225,130.604 249.290,128.900 248.239 C 127.965 247.662,127.200 247.045,127.200 246.867 C 127.200 246.221,124.243 243.111,122.707 242.141 C 120.934 241.022,120.070 239.377,118.600 234.321 C 117.928 232.009,117.280 230.690,116.306 229.650 C 114.567 227.793,114.138 226.746,112.988 221.547 C 111.417 214.443,110.624 213.397,105.463 211.622 C 102.748 210.688,101.878 210.944,99.539 213.368 C 93.814 219.300,93.965 219.034,93.539 224.000 C 92.958 230.766,93.914 235.979,96.311 239.118 C 97.106 240.159,98.162 242.304,98.675 243.918 L 99.602 246.835 98.501 250.118 C 97.093 254.314,96.758 254.282,94.015 249.693 C 92.797 247.654,91.118 245.431,90.285 244.751 C 89.451 244.072,88.219 242.426,87.546 241.094 C 86.874 239.761,85.441 237.738,84.362 236.597 C 82.487 234.615,82.357 234.326,81.416 230.072 C 80.381 225.394,79.775 223.897,77.986 221.600 C 76.613 219.838,75.834 217.662,74.762 212.600 C 73.838 208.238,73.341 207.014,72.000 205.800 C 70.627 204.557,70.052 203.138,68.960 198.294 C 67.807 193.183,67.051 191.410,64.854 188.662 C 64.001 187.596,63.097 186.034,62.845 185.191 C 61.420 180.438,53.266 179.742,48.667 183.981 L 46.886 185.623 45.597 183.996 C 42.729 180.375,36.521 178.914,30.426 180.425 M361.523 180.227 C 358.016 180.926,355.982 182.002,354.403 183.996 L 353.114 185.623 351.333 183.981 C 348.685 181.540,347.443 181.146,343.383 181.458 C 339.221 181.778,338.412 182.310,336.851 185.752 C 336.234 187.112,335.160 188.873,334.464 189.666 C 332.805 191.555,332.240 192.983,331.032 198.338 C 329.948 203.139,329.371 204.559,328.000 205.800 C 326.651 207.020,326.181 208.207,325.063 213.212 C 323.895 218.441,323.242 220.210,321.871 221.852 C 320.275 223.764,319.614 225.418,318.584 230.072 C 317.638 234.348,317.521 234.607,315.593 236.645 C 314.489 237.812,313.218 239.624,312.769 240.672 C 312.320 241.720,310.955 243.572,309.735 244.788 C 308.515 246.005,306.671 248.440,305.638 250.200 C 303.275 254.224,302.879 254.230,301.545 250.261 C 300.123 246.031,300.794 242.942,304.131 238.345 C 307.697 233.433,307.427 219.525,303.715 216.882 C 303.062 216.417,302.108 215.423,301.593 214.672 C 301.079 213.922,299.820 212.736,298.795 212.036 L 296.932 210.765 294.279 211.728 C 289.450 213.481,288.790 214.221,287.587 219.234 C 285.620 227.424,285.517 227.708,283.889 229.474 C 282.691 230.774,282.088 231.951,281.387 234.364 C 279.930 239.375,279.062 241.025,277.293 242.141 C 275.757 243.111,272.800 246.221,272.800 246.867 C 272.800 247.045,272.035 247.672,271.100 248.261 C 269.419 249.321,265.884 252.578,260.096 258.400 C 257.955 260.554,256.727 262.207,255.743 264.263 C 254.805 266.223,253.819 267.579,252.619 268.563 C 251.197 269.728,250.697 270.511,249.977 272.700 C 248.685 276.632,247.684 278.435,245.976 279.905 C 244.948 280.791,244.241 281.883,243.776 283.305 C 242.764 286.402,242.083 287.623,240.376 289.400 C 237.189 292.716,235.977 297.808,236.042 307.600 C 236.092 315.087,237.035 313.952,237.166 306.248 C 237.206 303.855,237.348 300.975,237.480 299.848 C 237.613 298.722,237.730 297.395,237.740 296.900 C 237.751 296.405,237.904 296.000,238.080 296.000 C 238.256 296.000,238.400 295.712,238.400 295.360 C 238.400 294.323,239.501 292.305,240.998 290.595 C 242.550 288.824,243.734 286.760,244.138 285.121 C 244.510 283.614,246.501 280.428,247.080 280.413 C 247.976 280.389,249.495 277.810,250.608 274.423 C 251.227 272.538,252.116 270.683,252.620 270.223 C 254.190 268.793,254.800 268.359,254.800 268.673 C 254.800 268.840,255.427 267.723,256.193 266.189 C 256.959 264.655,257.814 263.041,258.093 262.603 C 258.811 261.476,270.690 249.600,271.100 249.600 C 271.286 249.600,272.060 248.951,272.819 248.157 C 276.659 244.143,278.066 242.833,278.779 242.607 C 279.963 242.231,281.393 238.933,282.851 233.216 C 283.024 232.536,283.419 231.985,284.808 230.487 C 286.135 229.056,287.034 226.869,287.804 223.200 C 289.312 216.018,290.115 214.763,294.166 213.247 C 296.954 212.204,297.956 212.412,299.758 214.406 C 300.516 215.245,301.240 215.827,301.368 215.699 C 301.496 215.571,301.600 215.703,301.600 215.993 C 301.600 216.282,302.224 217.125,302.986 217.866 C 305.647 220.449,306.583 232.741,304.328 235.482 C 304.110 235.748,304.065 236.198,304.230 236.482 C 304.394 236.767,304.390 236.876,304.222 236.725 C 303.843 236.384,301.534 239.370,300.915 241.000 C 300.371 242.435,299.406 246.483,299.513 246.883 C 299.554 247.038,299.673 248.025,299.776 249.076 C 299.878 250.127,300.152 251.051,300.384 251.128 C 300.615 251.205,300.698 251.441,300.568 251.652 C 300.438 251.863,300.511 252.252,300.732 252.518 C 300.952 252.783,301.127 253.090,301.120 253.200 C 301.043 254.547,302.960 256.338,303.935 255.830 C 304.928 255.314,307.055 253.200,306.582 253.200 C 306.465 253.200,306.736 252.806,307.184 252.325 C 307.950 251.502,308.160 251.011,308.047 250.300 C 308.021 250.135,308.180 250.000,308.400 250.000 C 308.620 250.000,308.800 249.736,308.800 249.414 C 308.800 249.092,309.175 248.627,309.634 248.382 C 310.093 248.136,310.372 247.838,310.253 247.720 C 309.935 247.401,311.051 246.400,311.725 246.400 C 312.231 246.400,314.400 242.549,314.400 241.651 C 314.400 240.658,315.774 238.818,316.775 238.469 C 318.400 237.902,319.823 235.208,320.404 231.600 C 321.125 227.118,321.558 225.976,323.281 224.000 C 325.668 221.262,325.777 221.101,325.835 220.220 C 325.864 219.769,326.000 218.770,326.137 218.000 C 326.273 217.230,326.480 215.911,326.595 215.068 C 326.711 214.226,326.961 213.236,327.150 212.868 C 327.339 212.501,327.506 211.589,327.522 210.842 C 327.544 209.742,327.901 209.178,329.393 207.881 C 331.837 205.758,331.941 205.515,332.815 199.902 C 333.230 197.242,333.711 194.962,333.884 194.833 C 334.058 194.705,334.200 194.385,334.200 194.123 C 334.200 193.861,335.023 192.781,336.028 191.723 C 337.815 189.843,338.464 188.810,338.621 187.600 C 338.664 187.270,338.767 186.460,338.849 185.800 C 339.092 183.867,339.835 183.420,343.170 183.200 C 347.700 182.901,348.586 183.227,350.315 185.826 C 350.598 186.252,350.719 186.330,350.584 186.000 C 350.443 185.653,350.647 185.737,351.070 186.200 C 352.551 187.822,353.140 187.553,356.400 183.763 C 360.056 179.512,372.363 180.206,373.915 184.749 C 374.582 186.704,374.195 194.340,373.323 196.400 C 373.183 196.730,373.054 197.094,373.035 197.209 C 373.016 197.325,372.578 197.865,372.062 198.409 C 370.966 199.567,369.026 202.421,368.942 203.000 C 368.648 205.014,367.414 209.905,367.100 210.300 C 366.881 210.575,366.812 210.800,366.947 210.800 C 367.210 210.800,366.299 212.010,364.999 213.389 C 363.224 215.271,362.706 216.477,362.162 220.000 C 361.825 222.181,360.259 226.000,359.702 226.000 C 359.426 226.000,359.197 226.225,359.193 226.500 C 359.189 226.775,358.761 227.403,358.240 227.897 C 357.720 228.390,357.018 229.650,356.681 230.697 C 356.002 232.803,355.071 236.052,355.028 236.467 C 355.013 236.613,354.865 236.868,354.700 237.033 C 354.535 237.198,354.400 237.663,354.400 238.067 C 354.400 238.470,354.190 238.800,353.933 238.800 C 353.677 238.800,353.582 238.915,353.723 239.056 C 353.863 239.197,353.447 239.983,352.798 240.803 C 351.607 242.306,350.405 244.788,349.796 247.000 C 349.614 247.660,349.428 248.335,349.383 248.500 C 349.337 248.665,349.257 248.935,349.204 249.100 C 349.151 249.265,349.083 249.580,349.052 249.800 C 349.021 250.020,348.764 250.609,348.480 251.108 C 348.195 251.608,348.061 252.175,348.180 252.368 C 348.299 252.561,347.508 253.680,346.422 254.856 C 345.135 256.248,344.297 257.585,344.019 258.690 C 343.257 261.717,340.820 266.379,339.869 266.630 C 339.075 266.839,336.800 269.580,336.800 270.327 C 336.800 270.684,334.943 272.652,332.463 274.923 C 331.548 275.760,330.800 276.709,330.800 277.031 C 330.800 277.685,327.084 281.600,326.464 281.600 C 326.246 281.600,325.502 282.521,324.809 283.647 C 324.116 284.773,322.976 286.168,322.275 286.747 C 320.542 288.179,319.614 289.190,318.200 291.186 C 317.470 292.217,316.217 293.276,315.000 293.891 C 313.900 294.448,312.155 295.780,311.123 296.852 C 310.090 297.923,309.044 298.800,308.798 298.800 C 307.720 298.800,304.036 300.922,302.236 302.581 C 301.155 303.577,299.445 304.769,298.436 305.231 C 295.072 306.772,294.847 306.907,293.760 308.042 C 292.916 308.923,291.200 312.604,291.200 313.534 C 291.200 314.113,292.619 312.340,293.418 310.765 C 294.573 308.484,295.802 307.463,298.444 306.585 C 299.682 306.174,301.157 305.232,302.321 304.110 C 303.475 302.998,305.609 301.632,307.850 300.570 C 310.532 299.299,311.841 298.411,312.781 297.224 C 313.484 296.336,315.010 295.041,316.172 294.346 C 317.661 293.455,318.656 292.460,319.548 290.968 C 320.370 289.593,321.392 288.528,322.467 287.926 C 323.584 287.300,324.457 286.368,325.160 285.051 C 325.732 283.979,326.714 282.719,327.343 282.251 C 329.268 280.818,330.955 279.020,331.923 277.372 C 332.430 276.507,333.558 275.291,334.430 274.668 C 335.302 274.046,336.625 272.584,337.370 271.420 C 338.115 270.256,339.540 268.621,340.538 267.787 C 342.217 266.383,344.400 262.566,344.400 261.033 C 344.400 260.132,346.242 257.050,347.687 255.533 C 348.856 254.306,349.261 253.364,350.156 249.789 C 351.321 245.143,352.227 243.041,353.600 241.800 C 354.901 240.625,355.884 238.470,356.637 235.146 C 357.396 231.798,358.850 228.251,359.673 227.743 C 360.975 226.939,361.966 224.976,362.820 221.504 C 364.025 216.610,364.478 215.601,366.337 213.666 C 367.615 212.335,368.060 211.427,368.758 208.718 C 369.229 206.893,369.803 204.707,370.035 203.861 C 370.266 203.014,371.137 201.574,371.971 200.661 C 374.713 197.655,375.804 193.517,375.349 187.841 C 374.931 182.620,374.173 181.691,369.311 180.444 C 365.606 179.494,365.252 179.484,361.523 180.227 M13.019 197.772 C 14.026 199.310,15.600 200.228,15.600 199.279 C 15.600 198.370,13.995 196.800,13.065 196.800 C 12.433 196.800,12.430 196.873,13.019 197.772 M385.270 197.726 C 384.791 198.235,384.400 198.959,384.400 199.335 C 384.400 200.231,386.009 199.257,386.981 197.772 C 387.866 196.423,386.528 196.386,385.270 197.726 M137.600 209.522 C 137.600 209.911,140.124 212.400,140.519 212.400 C 141.150 212.400,140.735 211.172,139.782 210.218 C 138.802 209.238,137.600 208.854,137.600 209.522 M172.000 288.316 C 172.000 289.128,173.565 290.800,174.326 290.800 C 175.317 290.800,174.185 288.741,172.779 287.989 C 172.137 287.645,172.000 287.702,172.000 288.316 M226.486 288.669 C 225.129 290.009,224.848 290.800,225.730 290.800 C 226.565 290.800,228.088 288.949,227.922 288.136 C 227.791 287.495,227.606 287.563,226.486 288.669 M81.583 359.969 C 82.332 361.367,84.176 362.596,84.336 361.802 C 84.510 360.941,82.891 359.200,81.916 359.200 C 81.306 359.200,81.246 359.338,81.583 359.969 M316.434 360.164 C 315.068 361.617,315.440 362.760,316.903 361.607 C 317.509 361.129,318.190 360.392,318.417 359.969 C 319.038 358.808,317.572 358.952,316.434 360.164 "
                                                        stroke="none" fill="#f37ca3" fill-rule="evenodd"></path>
                                                    <path id="path3"
                                                        d="M180.219 95.620 C 178.909 95.824,177.199 96.204,176.419 96.463 L 175.000 96.935 176.600 97.657 C 179.360 98.902,190.400 98.209,190.400 96.791 C 190.400 95.717,184.180 95.001,180.219 95.620 M157.000 101.781 C 156.780 101.873,155.565 102.153,154.300 102.403 C 151.695 102.917,151.412 103.353,153.300 103.946 C 156.678 105.008,160.664 104.877,165.793 103.536 L 167.385 103.119 166.193 102.494 C 165.072 101.907,158.002 101.358,157.000 101.781 M133.800 107.795 C 133.580 107.873,131.972 108.240,130.227 108.611 C 124.093 109.918,131.567 111.534,138.200 110.336 C 140.400 109.938,142.290 109.604,142.400 109.592 C 143.302 109.499,140.131 108.394,138.400 108.198 C 137.190 108.062,135.750 107.884,135.200 107.802 C 134.650 107.721,134.020 107.718,133.800 107.795 M106.738 114.195 C 106.652 114.281,106.089 114.441,105.488 114.550 C 103.523 114.906,102.753 115.260,102.911 115.734 C 103.128 116.388,115.081 116.585,116.648 115.961 L 117.800 115.502 116.412 114.914 C 115.166 114.386,107.143 113.790,106.738 114.195 M128.000 130.732 C 128.000 130.923,129.512 131.478,131.360 131.967 C 133.789 132.608,135.421 133.348,137.246 134.632 C 139.029 135.888,141.119 136.846,144.358 137.894 C 146.880 138.709,149.496 139.780,150.172 140.273 C 152.451 141.936,155.137 143.185,158.276 144.042 C 161.895 145.029,163.081 145.580,165.727 147.505 C 166.918 148.372,169.208 149.397,171.727 150.190 C 175.875 151.496,178.942 152.859,179.400 153.600 C 179.847 154.324,182.567 155.520,187.095 156.984 C 189.520 157.768,191.930 158.742,192.452 159.149 C 196.822 162.562,203.183 162.559,207.559 159.141 C 208.087 158.729,210.337 157.837,212.559 157.160 C 218.827 155.250,219.866 154.830,222.064 153.318 C 224.324 151.764,226.381 150.877,230.600 149.638 C 232.140 149.186,233.871 148.498,234.447 148.108 C 235.023 147.719,236.221 146.892,237.110 146.271 C 237.999 145.650,240.588 144.606,242.863 143.950 C 245.138 143.294,247.699 142.272,248.553 141.679 C 249.407 141.085,250.577 140.284,251.153 139.897 C 251.729 139.511,254.180 138.573,256.600 137.812 C 259.556 136.884,261.906 135.834,263.761 134.614 C 265.280 133.615,267.755 132.430,269.261 131.982 C 270.768 131.533,272.000 131.006,272.000 130.811 C 272.000 130.616,270.786 130.804,269.301 131.228 C 267.817 131.653,266.484 132.000,266.339 132.000 C 266.194 132.000,264.725 132.912,263.076 134.026 C 260.791 135.570,259.022 136.366,255.651 137.367 C 252.293 138.365,250.717 139.074,249.113 140.304 C 247.567 141.491,245.872 142.272,242.800 143.216 C 237.998 144.690,237.001 145.146,234.630 146.957 C 233.690 147.674,231.589 148.667,229.961 149.164 C 224.412 150.858,223.400 151.284,220.800 153.017 C 218.923 154.268,216.976 155.100,213.800 156.007 C 211.344 156.709,207.959 158.046,206.138 159.032 C 201.440 161.579,198.561 161.579,193.862 159.034 C 192.068 158.062,188.980 156.780,187.000 156.185 C 182.910 154.956,181.508 154.313,179.800 152.883 C 178.355 151.673,176.698 150.949,173.065 149.938 C 170.208 149.144,166.641 147.513,166.200 146.800 C 165.740 146.056,162.284 144.533,158.177 143.266 C 155.964 142.583,153.427 141.498,152.539 140.854 C 150.177 139.143,148.927 138.566,144.568 137.169 C 142.411 136.479,139.937 135.438,139.070 134.857 C 138.202 134.276,137.022 133.483,136.446 133.095 C 134.846 132.017,128.000 130.101,128.000 130.732 M30.684 182.970 C 27.219 183.611,27.249 183.573,26.956 187.819 C 26.611 192.835,27.386 195.679,29.742 198.044 C 31.560 199.868,32.209 201.476,33.194 206.600 C 33.884 210.189,33.934 210.294,35.392 211.195 C 37.145 212.279,38.144 214.451,39.166 219.400 C 39.938 223.138,40.097 223.492,41.589 224.800 C 43.483 226.461,44.569 228.784,45.228 232.585 C 45.855 236.196,46.470 237.609,47.864 238.639 C 49.350 239.736,50.636 242.374,51.367 245.822 C 52.291 250.181,53.074 251.971,54.782 253.629 C 55.919 254.733,56.558 255.824,57.038 257.484 C 58.193 261.481,59.406 263.760,61.257 265.413 C 63.363 267.292,64.643 269.037,65.021 270.542 C 65.218 271.326,65.850 271.916,67.262 272.632 C 69.273 273.650,70.575 275.266,71.020 277.293 C 71.197 278.099,71.679 278.589,72.719 279.024 C 74.790 279.889,75.589 280.716,76.650 283.094 C 77.428 284.836,77.895 285.335,79.429 286.055 C 80.965 286.778,81.450 287.296,82.336 289.161 C 83.245 291.074,83.700 291.546,85.456 292.400 C 88.074 293.673,88.685 294.206,89.613 296.026 C 90.220 297.215,90.664 297.560,91.884 297.785 C 94.639 298.294,98.276 300.314,99.812 302.188 C 100.933 303.557,101.882 304.191,104.049 305.019 C 106.636 306.007,106.932 306.246,108.067 308.256 C 108.740 309.450,109.766 310.673,110.346 310.973 C 111.606 311.627,113.416 313.589,113.761 314.677 C 113.897 315.107,114.374 315.851,114.820 316.329 L 115.631 317.200 137.606 317.200 L 159.582 317.200 160.146 316.300 C 162.736 312.175,161.674 296.088,158.614 293.068 C 156.341 290.826,155.340 289.045,154.628 285.973 C 154.035 283.416,153.683 282.929,151.073 281.058 C 150.079 280.346,148.729 277.359,147.554 273.273 C 147.224 272.126,146.712 271.367,146.029 271.011 C 144.416 270.172,143.357 268.776,142.626 266.523 C 141.961 264.478,140.233 262.525,132.431 255.000 C 131.518 254.120,130.308 252.908,129.742 252.306 C 129.175 251.704,127.982 250.804,127.089 250.306 C 126.126 249.768,125.154 248.793,124.697 247.905 C 123.869 246.299,121.872 244.400,121.011 244.400 C 119.430 244.400,117.376 240.450,116.566 235.856 C 116.379 234.790,115.646 233.585,114.199 231.963 C 112.036 229.539,111.923 229.250,111.004 223.800 C 109.538 215.110,103.633 211.047,100.378 216.490 C 99.815 217.431,98.793 218.560,98.107 219.000 C 94.461 221.336,94.602 233.002,98.321 236.721 C 103.588 241.988,101.805 258.387,96.065 257.456 C 94.254 257.162,93.367 256.292,91.936 253.407 C 91.280 252.085,90.128 250.496,89.376 249.876 C 87.272 248.142,85.129 244.644,84.894 242.561 C 84.706 240.891,84.556 240.690,82.843 239.822 C 79.928 238.345,78.510 234.487,78.407 227.749 C 78.403 227.500,77.881 227.082,77.247 226.819 C 74.655 225.746,72.800 222.041,72.800 217.936 C 72.800 215.052,72.003 212.457,70.868 211.643 C 69.579 210.719,67.325 207.062,67.019 205.400 C 66.898 204.740,66.610 202.490,66.380 200.400 C 65.873 195.807,65.710 195.200,64.979 195.200 C 63.159 195.200,60.000 189.626,60.000 186.415 C 60.000 184.106,59.821 184.000,55.937 184.000 L 52.359 184.000 51.790 185.363 C 50.084 189.446,45.270 189.651,43.393 185.721 C 42.049 182.906,36.970 181.807,30.684 182.970 M361.629 182.697 C 359.116 182.870,357.505 183.840,356.607 185.721 C 354.730 189.651,349.916 189.446,348.210 185.363 L 347.641 184.000 344.028 184.000 C 340.012 184.000,340.306 183.772,339.820 187.264 C 339.289 191.077,336.783 195.200,334.996 195.200 C 334.335 195.200,334.118 195.893,333.807 199.000 C 333.093 206.140,332.680 207.356,330.037 210.121 C 328.049 212.199,327.221 214.392,327.208 217.616 C 327.189 222.072,325.650 225.567,323.238 226.631 C 321.663 227.326,321.647 227.355,321.416 229.966 C 320.859 236.240,319.748 238.678,316.901 239.867 C 316.166 240.174,315.508 240.645,315.437 240.913 C 315.367 241.181,315.101 242.272,314.846 243.338 C 314.350 245.412,313.220 247.111,310.489 249.888 C 309.548 250.844,308.357 252.579,307.842 253.742 C 304.421 261.479,298.595 256.964,298.626 246.600 C 298.641 241.718,299.574 238.682,301.672 236.686 C 303.691 234.765,303.996 233.714,304.283 227.695 C 304.514 222.857,303.898 219.600,302.753 219.600 C 302.117 219.600,299.680 217.177,299.431 216.296 C 299.292 215.803,298.651 214.988,298.007 214.484 L 296.835 213.569 294.894 214.552 C 291.164 216.443,289.948 218.138,289.222 222.467 C 288.084 229.251,287.991 229.509,285.795 231.970 C 284.353 233.586,283.621 234.791,283.434 235.856 C 282.624 240.450,280.570 244.400,278.989 244.400 C 278.128 244.400,276.131 246.299,275.303 247.905 C 274.859 248.767,273.870 249.774,272.967 250.283 C 272.105 250.769,270.912 251.669,270.316 252.283 C 269.719 252.897,268.503 254.120,267.612 255.000 C 266.721 255.880,264.205 258.365,262.021 260.523 C 258.738 263.766,257.932 264.806,257.374 266.523 C 256.644 268.770,255.584 270.172,253.983 271.005 C 253.210 271.408,252.751 272.237,252.066 274.467 C 250.624 279.157,249.810 280.658,248.128 281.719 C 246.421 282.797,245.875 283.700,245.221 286.528 C 244.687 288.833,243.312 291.115,241.418 292.838 C 238.328 295.650,237.228 312.142,239.853 316.303 L 240.423 317.207 262.680 317.103 L 284.937 317.000 285.819 315.248 C 286.857 313.185,288.580 311.264,289.812 310.796 C 290.294 310.612,291.244 309.478,291.923 308.274 C 293.068 306.246,293.362 306.008,295.930 305.027 C 298.125 304.188,299.043 303.563,300.339 302.026 C 301.985 300.074,306.694 297.600,308.764 297.600 C 309.311 297.600,309.843 297.092,310.363 296.073 C 311.314 294.209,311.911 293.682,314.530 292.400 C 316.176 291.594,316.770 291.013,317.586 289.407 C 318.178 288.244,319.183 287.043,320.000 286.522 C 322.714 284.792,323.107 284.425,323.370 283.376 C 323.824 281.568,324.849 280.388,326.846 279.377 C 328.425 278.577,328.852 278.121,329.242 276.818 C 329.779 275.026,331.461 273.121,333.107 272.439 C 333.846 272.132,334.520 271.312,335.136 269.969 C 335.660 268.827,337.011 267.061,338.264 265.879 C 340.835 263.455,341.176 262.873,342.600 258.473 C 343.439 255.883,344.036 254.805,345.394 253.427 C 347.164 251.632,347.499 250.808,348.927 244.728 C 349.578 241.956,351.192 238.931,352.234 238.532 C 353.080 238.207,354.256 235.725,354.570 233.600 C 355.199 229.352,356.431 226.428,358.206 224.973 C 359.984 223.517,360.007 223.460,361.373 217.228 C 362.127 213.785,363.210 211.822,364.810 210.995 C 366.037 210.360,366.117 210.184,366.806 206.600 C 367.805 201.407,368.426 199.870,370.232 198.123 C 372.823 195.617,373.735 191.341,372.839 185.896 C 372.667 184.849,372.441 183.907,372.337 183.804 C 372.016 183.482,365.857 182.396,364.800 182.474 C 364.250 182.515,362.823 182.615,361.629 182.697 "
                                                        stroke="none" fill="#f7d7af" fill-rule="evenodd"></path>
                                                    <path id="path4"
                                                        d="M125.064 131.277 L 123.928 131.691 124.096 158.145 L 124.263 184.600 125.334 187.577 C 126.735 191.472,127.376 192.079,131.736 193.636 C 135.817 195.094,136.747 195.590,138.851 197.437 C 140.022 198.464,141.169 198.913,144.775 199.759 C 149.708 200.916,151.452 201.671,153.890 203.708 C 155.470 205.028,156.084 205.252,162.883 206.993 C 164.985 207.531,166.038 208.092,167.738 209.580 C 169.712 211.307,170.270 211.561,173.855 212.359 C 178.734 213.446,179.189 213.633,181.079 215.327 C 183.182 217.212,184.417 217.765,188.800 218.782 C 190.890 219.266,193.729 220.113,195.110 220.663 C 198.309 221.937,202.065 221.811,206.200 220.289 C 207.740 219.722,210.752 218.873,212.893 218.402 C 216.325 217.647,217.036 217.336,218.893 215.774 C 220.924 214.066,223.701 212.929,227.600 212.209 C 229.933 211.778,231.325 211.122,232.932 209.700 C 234.805 208.043,236.907 207.113,240.765 206.235 C 244.447 205.398,246.321 204.622,247.600 203.407 C 249.021 202.057,252.149 200.617,255.355 199.835 C 258.467 199.076,260.144 198.318,261.600 197.011 C 262.981 195.771,264.445 195.028,268.400 193.560 C 272.737 191.950,273.221 191.479,274.633 187.493 L 275.800 184.200 275.800 158.002 L 275.800 131.804 274.296 131.311 C 272.278 130.649,267.492 132.160,263.696 134.656 C 261.909 135.833,259.517 136.896,256.600 137.812 C 254.180 138.573,251.729 139.511,251.153 139.897 C 250.577 140.284,249.407 141.085,248.553 141.679 C 247.699 142.272,245.138 143.294,242.863 143.950 C 240.588 144.606,237.999 145.650,237.110 146.271 C 236.221 146.892,235.023 147.719,234.447 148.108 C 233.871 148.498,232.140 149.186,230.600 149.638 C 226.381 150.877,224.324 151.764,222.064 153.318 C 219.866 154.830,218.827 155.250,212.559 157.160 C 210.337 157.837,208.087 158.729,207.559 159.141 C 203.183 162.559,196.822 162.562,192.452 159.149 C 191.930 158.742,189.520 157.768,187.095 156.984 C 182.567 155.520,179.847 154.324,179.400 153.600 C 178.942 152.859,175.875 151.496,171.727 150.190 C 169.208 149.397,166.918 148.372,165.727 147.505 C 163.081 145.580,161.895 145.029,158.276 144.042 C 155.076 143.168,152.189 141.830,150.378 140.379 C 149.816 139.929,147.206 138.848,144.578 137.976 C 141.344 136.904,138.960 135.819,137.200 134.617 C 133.400 132.024,127.484 130.395,125.064 131.277 M100.800 154.488 C 99.824 154.915,99.840 154.935,101.476 155.315 C 103.560 155.798,104.720 155.467,103.996 154.595 C 103.424 153.905,102.224 153.865,100.800 154.488 M30.440 181.570 C 26.369 182.436,25.847 183.164,25.661 188.240 C 25.560 190.991,25.669 192.206,26.061 192.689 C 26.357 193.054,26.394 193.230,26.143 193.080 C 25.811 192.881,25.778 193.215,26.024 194.308 C 26.571 196.742,27.541 198.741,28.400 199.200 C 29.305 199.684,31.011 202.818,31.346 204.612 C 31.469 205.265,31.757 206.610,31.987 207.600 C 32.218 208.590,32.504 209.828,32.624 210.352 C 32.743 210.875,33.546 212.002,34.408 212.855 C 35.907 214.339,36.881 215.732,37.032 216.607 C 37.450 219.035,38.634 223.133,39.060 223.631 C 39.357 223.979,39.600 224.578,39.600 224.963 C 39.600 225.348,40.300 226.377,41.156 227.250 C 42.300 228.417,42.946 229.600,43.595 231.719 C 45.455 237.781,45.813 238.663,47.287 240.821 C 48.828 243.076,49.518 244.798,51.240 250.685 C 51.889 252.906,52.460 254.109,53.003 254.400 C 54.095 254.987,55.550 257.184,56.054 259.011 C 56.889 262.035,59.226 266.391,60.135 266.619 C 60.625 266.743,61.619 267.808,62.404 269.051 C 63.948 271.500,65.585 273.343,67.402 274.683 C 68.061 275.169,68.953 276.249,69.385 277.083 C 70.313 278.876,70.920 279.517,72.800 280.689 C 73.573 281.171,74.663 282.421,75.234 283.481 C 75.815 284.561,77.120 286.048,78.218 286.883 C 79.294 287.701,80.560 289.136,81.041 290.083 C 82.074 292.113,82.769 292.772,85.267 294.082 C 86.293 294.621,87.823 295.783,88.667 296.665 C 89.627 297.670,91.228 298.698,92.951 299.416 C 94.464 300.047,96.355 301.201,97.154 301.982 C 99.225 304.003,101.195 305.397,102.719 305.919 C 103.444 306.168,104.490 306.727,105.043 307.162 C 106.252 308.113,108.032 310.307,107.193 309.812 C 106.693 309.518,106.697 309.584,107.216 310.231 C 107.554 310.654,108.152 311.630,108.543 312.400 C 112.293 319.777,109.845 319.200,137.404 319.200 C 157.458 319.200,160.186 319.126,161.320 318.553 C 162.810 317.800,164.441 316.391,164.227 316.042 C 164.146 315.909,163.976 315.170,163.849 314.400 C 163.723 313.630,163.446 312.410,163.234 311.688 C 163.022 310.967,162.863 308.627,162.881 306.488 C 162.898 304.350,162.786 301.692,162.630 300.583 C 162.475 299.474,162.295 298.124,162.230 297.583 C 162.046 296.046,161.105 293.200,160.780 293.200 C 160.619 293.200,160.379 292.770,160.247 292.245 C 160.115 291.719,159.369 290.729,158.590 290.045 C 157.810 289.360,157.283 288.800,157.419 288.800 C 157.554 288.800,157.282 288.180,156.814 287.423 C 156.030 286.154,155.588 284.911,155.501 283.729 C 155.482 283.471,154.267 281.998,152.800 280.457 C 151.333 278.915,150.133 277.417,150.133 277.127 C 150.132 275.823,148.196 270.967,147.380 270.224 C 145.811 268.793,145.200 268.359,145.200 268.673 C 145.200 268.840,144.573 267.723,143.807 266.189 C 141.923 262.415,141.784 262.221,138.725 259.116 C 137.253 257.622,136.154 256.400,136.281 256.400 C 136.408 256.400,135.812 255.925,134.956 255.345 C 134.100 254.765,133.084 253.910,132.697 253.445 C 131.270 251.731,130.000 250.392,130.000 250.603 C 130.000 250.880,127.266 248.446,126.433 247.427 C 124.957 245.623,121.944 242.836,121.221 242.607 C 120.037 242.231,118.607 238.933,117.149 233.216 C 116.976 232.536,116.581 231.985,115.192 230.487 C 113.948 229.145,112.979 226.887,112.410 224.000 C 110.831 215.994,109.757 214.432,104.724 212.825 C 103.120 212.313,100.998 213.019,100.538 214.219 C 100.416 214.536,100.155 214.696,99.958 214.574 C 99.761 214.452,99.596 214.498,99.591 214.676 C 99.578 215.121,96.800 218.174,96.799 217.744 C 96.799 217.555,96.234 218.471,95.544 219.780 L 94.289 222.160 94.496 228.001 C 94.720 234.314,95.084 235.583,97.481 238.416 C 98.757 239.923,100.026 242.435,99.743 242.892 C 99.638 243.062,99.705 243.200,99.891 243.200 C 100.077 243.200,100.248 243.515,100.271 243.900 C 100.427 246.479,100.408 247.954,100.207 249.000 C 100.080 249.660,99.952 250.425,99.922 250.700 C 99.891 250.975,99.747 251.200,99.600 251.200 C 99.453 251.200,99.314 251.425,99.290 251.700 C 99.058 254.381,97.392 256.520,96.070 255.833 C 94.903 255.226,93.151 253.382,93.453 253.080 C 93.557 252.976,93.228 252.549,92.721 252.131 C 91.699 251.287,90.420 249.318,91.212 249.807 C 92.321 250.493,90.209 247.964,88.395 246.435 C 87.305 245.515,86.439 244.636,86.471 244.481 C 86.503 244.327,86.315 243.680,86.053 243.045 C 85.792 242.409,85.668 241.799,85.778 241.688 C 86.118 241.349,84.661 239.200,84.090 239.200 C 83.795 239.200,83.653 239.038,83.776 238.839 C 83.899 238.640,83.459 238.290,82.800 238.060 C 82.140 237.830,81.600 237.362,81.600 237.021 C 81.600 236.679,81.442 236.400,81.249 236.400 C 80.669 236.400,80.017 234.372,79.641 231.400 C 79.154 227.544,78.127 225.073,77.121 225.337 C 76.554 225.485,76.459 225.411,76.757 225.052 C 77.177 224.545,75.781 223.319,75.032 223.538 C 74.830 223.597,74.897 223.365,75.181 223.023 C 75.603 222.515,75.603 222.400,75.182 222.400 C 74.899 222.400,74.787 222.280,74.934 222.132 C 75.081 221.985,74.931 221.566,74.600 221.200 C 74.218 220.778,73.962 219.561,73.899 217.871 C 73.845 216.406,73.690 215.206,73.555 215.204 C 73.306 215.200,72.267 210.768,72.267 209.709 C 72.267 209.391,71.805 208.832,71.240 208.466 C 70.021 207.675,68.685 206.400,69.076 206.400 C 69.229 206.400,69.055 206.175,68.692 205.900 C 68.079 205.436,67.621 203.409,67.013 198.469 C 66.709 196.006,66.366 194.800,65.969 194.800 C 65.780 194.800,65.718 194.559,65.831 194.264 C 65.944 193.969,65.760 193.499,65.423 193.219 C 65.085 192.939,64.925 192.522,65.066 192.293 C 65.208 192.064,65.141 191.989,64.918 192.127 C 64.072 192.650,61.676 189.293,61.185 186.899 C 60.568 183.891,59.991 183.411,56.815 183.263 C 55.393 183.196,54.090 183.056,53.919 182.950 C 53.301 182.568,50.750 184.135,50.172 185.254 C 49.846 185.884,49.483 186.400,49.366 186.400 C 49.249 186.400,49.267 186.175,49.407 185.900 C 49.547 185.625,49.332 185.760,48.930 186.200 C 47.449 187.822,46.860 187.553,43.600 183.763 C 41.390 181.194,36.242 180.336,30.440 181.570 M361.200 181.288 C 358.794 181.752,357.599 182.369,356.400 183.763 C 353.140 187.553,352.551 187.822,351.070 186.200 C 350.647 185.737,350.443 185.653,350.584 186.000 C 350.719 186.330,350.598 186.252,350.315 185.826 C 348.586 183.227,347.700 182.901,343.170 183.200 C 339.835 183.420,339.092 183.867,338.849 185.800 C 338.767 186.460,338.664 187.270,338.621 187.600 C 338.464 188.810,337.815 189.843,336.028 191.723 C 335.023 192.781,334.200 193.861,334.200 194.123 C 334.200 194.385,334.058 194.705,333.884 194.833 C 333.711 194.962,333.230 197.242,332.815 199.902 C 331.941 205.515,331.837 205.758,329.393 207.881 C 327.901 209.178,327.544 209.742,327.522 210.842 C 327.506 211.589,327.339 212.501,327.150 212.868 C 326.961 213.236,326.711 214.226,326.595 215.068 C 326.480 215.911,326.273 217.230,326.137 218.000 C 326.000 218.770,325.864 219.769,325.835 220.220 C 325.777 221.101,325.668 221.262,323.281 224.000 C 321.558 225.976,321.125 227.118,320.404 231.600 C 319.823 235.208,318.400 237.902,316.775 238.469 C 315.774 238.818,314.400 240.658,314.400 241.651 C 314.400 242.549,312.231 246.400,311.725 246.400 C 311.051 246.400,309.935 247.401,310.253 247.720 C 310.372 247.838,310.093 248.136,309.634 248.382 C 309.175 248.627,308.800 249.092,308.800 249.414 C 308.800 249.736,308.620 250.000,308.400 250.000 C 308.180 250.000,308.021 250.135,308.047 250.300 C 308.160 251.011,307.950 251.502,307.184 252.325 C 306.736 252.806,306.465 253.200,306.582 253.200 C 307.055 253.200,304.928 255.314,303.935 255.830 C 302.953 256.341,301.253 254.809,301.017 253.200 C 301.001 253.090,300.845 252.775,300.670 252.500 C 300.496 252.225,300.455 251.835,300.579 251.634 C 300.703 251.433,300.615 251.205,300.384 251.128 C 300.152 251.051,299.878 250.127,299.776 249.076 C 299.673 248.025,299.554 247.038,299.513 246.883 C 299.406 246.483,300.371 242.435,300.915 241.000 C 301.534 239.370,303.843 236.384,304.222 236.725 C 304.390 236.876,304.394 236.767,304.230 236.482 C 304.065 236.198,304.110 235.748,304.328 235.482 C 306.583 232.741,305.647 220.449,302.986 217.866 C 302.224 217.125,301.600 216.282,301.600 215.993 C 301.600 215.703,301.496 215.571,301.368 215.699 C 301.240 215.827,300.516 215.245,299.758 214.406 C 297.956 212.412,296.954 212.204,294.166 213.247 C 290.115 214.763,289.312 216.018,287.804 223.200 C 287.034 226.869,286.135 229.056,284.808 230.487 C 283.419 231.985,283.024 232.536,282.851 233.216 C 281.393 238.933,279.963 242.231,278.779 242.607 C 278.066 242.833,276.659 244.143,272.819 248.157 C 272.060 248.951,271.286 249.600,271.100 249.600 C 270.690 249.600,258.811 261.476,258.093 262.603 C 257.814 263.041,256.959 264.655,256.193 266.189 C 255.427 267.723,254.800 268.840,254.800 268.673 C 254.800 268.359,254.189 268.793,252.620 270.224 C 252.123 270.677,251.308 272.297,250.810 273.824 C 249.589 277.564,248.787 279.239,248.346 278.967 C 248.145 278.842,248.030 278.972,248.090 279.256 C 248.151 279.539,247.840 279.936,247.400 280.139 C 246.476 280.563,244.529 283.538,244.138 285.121 C 243.734 286.760,242.550 288.824,240.998 290.595 C 239.501 292.305,238.400 294.323,238.400 295.360 C 238.400 295.712,238.256 296.000,238.080 296.000 C 237.904 296.000,237.751 296.405,237.740 296.900 C 237.729 297.395,237.610 298.790,237.475 300.000 C 237.340 301.210,237.199 304.085,237.162 306.388 C 237.124 308.691,236.933 311.121,236.737 311.788 C 236.541 312.455,236.277 313.630,236.151 314.400 C 236.024 315.170,235.854 315.909,235.773 316.042 C 235.559 316.391,237.190 317.800,238.680 318.553 C 240.532 319.489,284.334 319.538,286.451 318.607 C 288.176 317.848,289.600 316.629,289.600 315.911 C 289.600 315.603,289.926 315.001,290.325 314.573 C 290.723 314.145,291.389 312.806,291.804 311.597 C 292.584 309.327,294.205 307.217,295.727 306.489 C 296.207 306.260,297.426 305.694,298.436 305.231 C 299.445 304.769,301.155 303.577,302.236 302.581 C 304.036 300.922,307.720 298.800,308.798 298.800 C 309.044 298.800,310.090 297.923,311.123 296.852 C 312.155 295.780,313.900 294.448,315.000 293.891 C 316.217 293.276,317.470 292.217,318.200 291.186 C 319.614 289.190,320.542 288.179,322.275 286.747 C 322.976 286.168,324.116 284.773,324.809 283.647 C 325.502 282.521,326.246 281.600,326.464 281.600 C 327.084 281.600,330.800 277.685,330.800 277.031 C 330.800 276.709,331.548 275.760,332.463 274.923 C 334.943 272.652,336.800 270.684,336.800 270.327 C 336.800 269.580,339.075 266.839,339.869 266.630 C 340.820 266.379,343.257 261.717,344.019 258.690 C 344.297 257.585,345.135 256.248,346.422 254.856 C 347.508 253.680,348.299 252.561,348.180 252.368 C 348.061 252.175,348.195 251.608,348.480 251.108 C 348.764 250.609,349.021 250.020,349.052 249.800 C 349.083 249.580,349.151 249.265,349.204 249.100 C 349.257 248.935,349.337 248.665,349.383 248.500 C 349.428 248.335,349.614 247.660,349.796 247.000 C 350.405 244.788,351.607 242.306,352.798 240.803 C 353.447 239.983,353.863 239.197,353.723 239.056 C 353.582 238.915,353.677 238.800,353.933 238.800 C 354.190 238.800,354.400 238.470,354.400 238.067 C 354.400 237.663,354.535 237.198,354.700 237.033 C 354.865 236.868,355.013 236.613,355.028 236.467 C 355.071 236.052,356.002 232.803,356.681 230.697 C 357.018 229.650,357.720 228.390,358.240 227.897 C 358.761 227.403,359.189 226.775,359.193 226.500 C 359.197 226.225,359.426 226.000,359.702 226.000 C 360.259 226.000,361.825 222.181,362.162 220.000 C 362.706 216.477,363.224 215.271,364.999 213.389 C 366.299 212.010,367.210 210.800,366.947 210.800 C 366.812 210.800,366.881 210.575,367.100 210.300 C 367.414 209.905,368.648 205.014,368.942 203.000 C 369.026 202.421,370.966 199.567,372.062 198.409 C 372.578 197.865,373.016 197.325,373.035 197.209 C 373.054 197.094,373.183 196.730,373.323 196.400 C 374.195 194.340,374.582 186.704,373.915 184.749 C 372.923 181.844,366.862 180.194,361.200 181.288 M41.691 183.674 C 42.291 184.096,43.057 185.017,43.393 185.721 C 45.270 189.651,50.084 189.446,51.790 185.363 L 52.359 184.000 55.937 184.000 C 59.821 184.000,60.000 184.106,60.000 186.415 C 60.000 189.626,63.159 195.200,64.979 195.200 C 65.710 195.200,65.873 195.807,66.380 200.400 C 66.610 202.490,66.898 204.740,67.019 205.400 C 67.325 207.062,69.579 210.719,70.868 211.643 C 72.003 212.457,72.800 215.052,72.800 217.936 C 72.800 222.041,74.655 225.746,77.247 226.819 C 77.881 227.082,78.403 227.500,78.407 227.749 C 78.510 234.487,79.928 238.345,82.843 239.822 C 84.556 240.690,84.706 240.891,84.894 242.561 C 85.129 244.644,87.272 248.142,89.376 249.876 C 90.128 250.496,91.280 252.085,91.936 253.407 C 93.367 256.292,94.254 257.162,96.065 257.456 C 101.805 258.387,103.588 241.988,98.321 236.721 C 94.602 233.002,94.461 221.336,98.107 219.000 C 98.793 218.560,99.815 217.431,100.378 216.490 C 102.052 213.691,102.801 213.383,105.087 214.551 C 108.864 216.481,110.093 218.403,111.004 223.800 C 111.923 229.250,112.036 229.539,114.199 231.963 C 115.646 233.585,116.379 234.790,116.566 235.856 C 117.376 240.450,119.430 244.400,121.011 244.400 C 121.872 244.400,123.869 246.299,124.697 247.905 C 125.154 248.793,126.126 249.768,127.089 250.306 C 127.982 250.804,129.175 251.704,129.742 252.306 C 130.308 252.908,131.518 254.120,132.431 255.000 C 140.233 262.525,141.961 264.478,142.626 266.523 C 143.357 268.776,144.416 270.172,146.029 271.011 C 146.712 271.367,147.224 272.126,147.554 273.273 C 148.729 277.359,150.079 280.346,151.073 281.058 C 153.683 282.929,154.035 283.416,154.628 285.973 C 155.340 289.045,156.341 290.826,158.614 293.068 C 161.674 296.088,162.736 312.175,160.146 316.300 L 159.582 317.200 137.606 317.200 L 115.631 317.200 114.820 316.329 C 114.374 315.851,113.897 315.107,113.761 314.677 C 113.416 313.589,111.606 311.627,110.346 310.973 C 109.766 310.673,108.740 309.450,108.067 308.256 C 106.932 306.246,106.636 306.007,104.049 305.019 C 101.882 304.191,100.933 303.557,99.812 302.188 C 98.276 300.314,94.639 298.294,91.884 297.785 C 90.664 297.560,90.220 297.215,89.613 296.026 C 88.685 294.206,88.074 293.673,85.456 292.400 C 83.700 291.546,83.245 291.074,82.336 289.161 C 81.450 287.296,80.965 286.778,79.429 286.055 C 77.895 285.335,77.428 284.836,76.650 283.094 C 75.589 280.716,74.790 279.889,72.719 279.024 C 71.679 278.589,71.197 278.099,71.020 277.293 C 70.575 275.266,69.273 273.650,67.262 272.632 C 65.850 271.916,65.218 271.326,65.021 270.542 C 64.643 269.037,63.363 267.292,61.257 265.413 C 59.406 263.760,58.193 261.481,57.038 257.484 C 56.558 255.824,55.919 254.733,54.782 253.629 C 53.074 251.971,52.291 250.181,51.367 245.822 C 50.636 242.374,49.350 239.736,47.864 238.639 C 46.470 237.609,45.855 236.196,45.228 232.585 C 44.569 228.784,43.483 226.461,41.589 224.800 C 40.097 223.492,39.938 223.138,39.166 219.400 C 38.144 214.451,37.145 212.279,35.392 211.195 C 33.934 210.294,33.884 210.189,33.194 206.600 C 32.209 201.476,31.560 199.868,29.742 198.044 C 27.069 195.360,25.619 185.821,27.585 183.855 C 29.070 182.370,39.645 182.235,41.691 183.674 M368.974 183.008 C 372.727 183.726,372.447 183.517,372.839 185.896 C 373.735 191.341,372.823 195.617,370.232 198.123 C 368.426 199.870,367.805 201.407,366.806 206.600 C 366.117 210.184,366.037 210.360,364.810 210.995 C 363.210 211.822,362.127 213.785,361.373 217.228 C 360.007 223.460,359.984 223.517,358.206 224.973 C 356.431 226.428,355.199 229.352,354.570 233.600 C 354.256 235.725,353.080 238.207,352.234 238.532 C 351.192 238.931,349.578 241.956,348.927 244.728 C 347.499 250.808,347.164 251.632,345.394 253.427 C 344.036 254.805,343.439 255.883,342.600 258.473 C 341.176 262.873,340.835 263.455,338.264 265.879 C 337.011 267.061,335.660 268.827,335.136 269.969 C 334.520 271.312,333.846 272.132,333.107 272.439 C 331.461 273.121,329.779 275.026,329.242 276.818 C 328.852 278.121,328.425 278.577,326.846 279.377 C 324.849 280.388,323.824 281.568,323.370 283.376 C 323.107 284.425,322.714 284.792,320.000 286.522 C 319.183 287.043,318.178 288.244,317.586 289.407 C 316.770 291.013,316.176 291.594,314.530 292.400 C 311.911 293.682,311.314 294.209,310.363 296.073 C 309.843 297.092,309.311 297.600,308.764 297.600 C 306.694 297.600,301.985 300.074,300.339 302.026 C 299.043 303.563,298.125 304.188,295.930 305.027 C 293.362 306.008,293.068 306.246,291.923 308.274 C 291.244 309.478,290.294 310.612,289.812 310.796 C 288.580 311.264,286.857 313.185,285.819 315.248 L 284.937 317.000 262.680 317.103 L 240.423 317.207 239.853 316.303 C 237.228 312.142,238.328 295.650,241.418 292.838 C 243.312 291.115,244.687 288.833,245.221 286.528 C 245.875 283.700,246.421 282.797,248.128 281.719 C 249.810 280.658,250.624 279.157,252.066 274.467 C 252.751 272.237,253.210 271.408,253.983 271.005 C 255.584 270.172,256.644 268.770,257.374 266.523 C 257.932 264.806,258.738 263.766,262.021 260.523 C 264.205 258.365,266.721 255.880,267.612 255.000 C 268.503 254.120,269.719 252.897,270.316 252.283 C 270.912 251.669,272.105 250.769,272.967 250.283 C 273.870 249.774,274.859 248.767,275.303 247.905 C 276.131 246.299,278.128 244.400,278.989 244.400 C 280.570 244.400,282.624 240.450,283.434 235.856 C 283.621 234.791,284.353 233.586,285.795 231.970 C 287.991 229.509,288.084 229.251,289.222 222.467 C 289.948 218.138,291.164 216.443,294.894 214.552 L 296.835 213.569 298.007 214.484 C 298.651 214.988,299.292 215.803,299.431 216.296 C 299.680 217.177,302.117 219.600,302.753 219.600 C 303.898 219.600,304.514 222.857,304.283 227.695 C 303.996 233.714,303.691 234.765,301.672 236.686 C 299.574 238.682,298.641 241.718,298.626 246.600 C 298.595 256.964,304.421 261.479,307.842 253.742 C 308.357 252.579,309.548 250.844,310.489 249.888 C 313.220 247.111,314.350 245.412,314.846 243.338 C 315.101 242.272,315.367 241.181,315.437 240.913 C 315.508 240.645,316.166 240.174,316.901 239.867 C 319.748 238.678,320.859 236.240,321.416 229.966 C 321.647 227.355,321.663 227.326,323.238 226.631 C 325.650 225.567,327.189 222.072,327.208 217.616 C 327.221 214.392,328.049 212.199,330.037 210.121 C 332.680 207.356,333.093 206.140,333.807 199.000 C 334.118 195.893,334.335 195.200,334.996 195.200 C 336.783 195.200,339.289 191.077,339.820 187.264 C 340.306 183.772,340.012 184.000,344.028 184.000 L 347.641 184.000 348.210 185.363 C 349.916 189.446,354.730 189.651,356.607 185.721 C 357.505 183.840,359.116 182.870,361.629 182.697 C 362.823 182.615,364.250 182.515,364.800 182.474 C 365.350 182.433,367.228 182.673,368.974 183.008 "
                                                        stroke="none" fill="#b9dfa1" fill-rule="evenodd"></path>
                                                </g>
                                            </svg>
                                            <h4><span
                                                    class=" badge bg-secondary text-light ms-2 mt-3">{{ $row->title }}</span>
                                            </h4>
                                            <div class="dropdown ms-auto">
                                                <button type="button"
                                                    class="btn btn-icon btn-sm fs-xl text-dark-emphasis border-0"
                                                    data-bs-toggle="dropdown" aria-expanded="false" aria-label="Actions">
                                                    <i class="fi-more-vertical"></i>
                                                </button>
                                                <ul class="dropdown-menu dropdown-menu-end"
                                                    style="--fn-dropdown-min-width: 8rem">
                                                    <li>
                                                        <button class="dropdown-item edit-education"
                                                            data-id="{{ $row->id }}">
                                                            <i class="fi-edit opacity-75 me-2"></i>
                                                            Edit
                                                        </button>
                                                    </li>
                                                    <li>
                                                        <button class="dropdown-item text-danger delete-education"
                                                            data-id="{{ $row->id }}">
                                                            <i class="fi-trash opacity-75 me-2"></i>
                                                            Delete
                                                        </button>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="fs-xs text-body mb-1">Field of Study </div>
                                        <div class="h5 pt-md-1 pb-2 pb-md-3" style="letter-spacing: 1.25px">
                                            {{ $row->purpose }}</div>
                                        <div class="d-flex justify-content-between">
                                            <div class="me-3">
                                                <div class="fs-xs text-body mb-1">Name </div>
                                                <div class="h6 fs-sm mb-0">{{ Auth::user()->full_name }}</div>
                                            </div>
                                            <div>
                                                <span class="badge text-bg-danger mt-n1 mb-1">Graduation Year</span>
                                                <div class="h6 fs-sm mb-0 text-center">{{ $row->year }}</div>
                                            </div>
                                        </div>
                                    </div>
                                    <span class="position-absolute top-0 start-0 w-100 h-100 rounded-4 d-none-dark"
                                        style="background: linear-gradient(90deg, #fcb69f 0%, #ffe8c9 100%)"></span>
                                    <span class="position-absolute top-0 start-0 w-100 h-100 rounded-4 d-none d-block-dark"
                                        style="background: linear-gradient(-90deg, #2f2c3a 0%, #372e2f 52.24%)"></span>
                                </div>
                            @endforeach
                        @endif
                    </div>

                    <!-- Add payment method button -->
                    <div class="d-flex flex-column align-items-sm-start">
                        <button type="button" class="btn btn-lg btn-outline-dark" data-bs-toggle="modal"
                            data-bs-target="#addEducation">
                            <i class="fi-study fs-lg ms-n2 me-2"></i>
                            Add Education Section
                        </button>
                    </div>
                </div>
            </div>







            <!-- Experiece tab -->
            <div class="tab-pane fade" id="experience" role="tabpanel" aria-labelledby="security-tab">
                <div class="col-lg-12">
                    <h1 class="h2">Work history and Experience </h1>
                    {{-- <p class="pb-2 pb-lg-3">Add and manage payment methods with our secure payment system.</p> --}}

                    <!-- Cards -->
                    <div class=" flex-sm-row gap-3 gap-md-4 pb-2 pb-lg-3 mb-3 mt-3">

                        <!--  card -->
                        {{-- @if ($experience->isEmpty())
                <p>No experience records found.</p>
            @else --}}
                        @if ($experience->isEmpty())
                            <p>No Work history and Experience records found.</p>
                        @else
                            @foreach ($experience as $exp)
                                <div class="card w-100 border-2 mb-3 mt-3">
                                    <div class="card-body position-relative z-2">
                                        <div class="d-flex align-items-center pb-4 mb-2 mb-md-3">
                                            <svg height="50px" width="80px" version="1.1" id="Layer_1"
                                                xmlns="http://www.w3.org/2000/svg"
                                                xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 512 512"
                                                xml:space="preserve">
                                                <path style="fill:#90B5BF;" d="M202.105,234.442v140.126H29.642c-11.906,0-21.558-9.651-21.558-21.558V234.442
                       c0-35.718,28.955-64.674,64.674-64.674h64.674C173.15,169.768,202.105,198.724,202.105,234.442z" />
                                                <path style="fill:#769CA5;" d="M105.095,374.568H29.642c-11.906,0-21.558-9.651-21.558-21.558V234.442
                       c0-35.718,28.955-64.674,64.674-64.674h32.337V374.568z" />
                                                <path style="fill:#A89B80;" d="M503.916,374.568v118.568c0,5.953-4.826,10.779-10.779,10.779H29.642
                       c-5.953,0-10.779-4.826-10.779-10.779V374.568c0-5.953,4.826-10.779,10.779-10.779h463.495
                       C499.09,363.789,503.916,368.615,503.916,374.568z" />
                                                <path style="fill:#E5E5E5;" d="M148.211,379.958L148.211,379.958c0,14.882-12.065,26.947-26.947,26.947H99.705
                       c-14.882,0-26.947-12.065-26.947-26.947l0,0c0-14.883,12.065-26.947,26.947-26.947h21.558
                       C136.146,353.01,148.211,365.075,148.211,379.958z" />
                                                <path style="fill:#F4C064;" d="M148.211,94.316c0,23.812-19.304,43.116-43.116,43.116s-43.116-19.304-43.116-43.116
                       S81.283,51.2,105.095,51.2S148.211,70.504,148.211,94.316z M105.095,331.453H51.2v-64.674c0-5.953-4.826-10.779-10.779-10.779H8.084
                       v75.453v21.558c0,11.906,9.651,21.558,21.558,21.558H51.2h53.895c11.906,0,21.558-9.651,21.558-21.558l0,0
                       C126.653,341.104,117.001,331.453,105.095,331.453z" />
                                                <path style="fill:#F4AB53;"
                                                    d="M105.095,51.2v86.232c-23.812,0-43.116-19.304-43.116-43.116S81.283,51.2,105.095,51.2z" />
                                                <path style="fill:#C1C1C1;" d="M471.579,245.221v194.021c0,11.906-9.651,21.558-21.558,21.558H202.105
                       c-11.906,0-21.558-9.651-21.558-21.558V245.221c0-11.906,9.651-21.558,21.558-21.558h247.916
                       C461.927,223.663,471.579,233.315,471.579,245.221z" />
                                                <path style="fill:#DBDBDB;" d="M471.579,245.221v194.021c0,11.906-9.651,21.558-21.558,21.558H326.063V223.663h123.958
                       C461.927,223.663,471.579,233.315,471.579,245.221z" />
                                                <path style="fill:#F7F7F7;" d="M364.532,373.799l4.647,130.117h-86.232l4.647-130.117c0.414-11.599,9.937-20.788,21.544-20.788
                       h33.849C354.594,353.01,364.117,362.2,364.532,373.799z" />
                                                <path style="fill:#BBFFAB;" d="M363.789,126.653v43.116c0,5.953-4.826,10.779-10.779,10.779h-43.116
                       c-5.953,0-10.779-4.826-10.779-10.779v-43.116c0-5.953,4.826-10.779,10.779-10.779h43.116
                       C358.964,115.874,363.789,120.699,363.789,126.653z" />
                                                <path style="fill:#D199D1;" d="M471.579,61.979v32.337c0,5.953-4.826,10.779-10.779,10.779h-32.337
                       c-5.953,0-10.779-4.826-10.779-10.779V61.979c0-5.953,4.826-10.779,10.779-10.779H460.8C466.753,51.2,471.579,56.026,471.579,61.979
                       z" />
                                                <path style="fill:#A7E5CB;" d="M299.116,18.863v21.558c0,5.953-4.826,10.779-10.779,10.779h-21.558
                       C260.826,51.2,256,46.374,256,40.421V18.863c0-5.953,4.826-10.779,10.779-10.779h21.558C294.29,8.084,299.116,12.91,299.116,18.863z
                       " />
                                                <path
                                                    d="M428.463,113.179H460.8c10.401,0,18.863-8.463,18.863-18.863V61.979c0-10.401-8.463-18.863-18.863-18.863h-32.337
                       c-10.401,0-18.863,8.463-18.863,18.863v32.337C409.6,104.716,418.063,113.179,428.463,113.179z M425.768,61.979
                       c0-1.486,1.208-2.695,2.695-2.695H460.8c1.486,0,2.695,1.208,2.695,2.695v32.337c0,1.486-1.208,2.695-2.695,2.695h-32.337
                       c-1.486,0-2.695-1.208-2.695-2.695V61.979z M309.895,107.789h43.116c10.401,0,18.863,8.463,18.863,18.863v43.116
                       c0,10.401-8.463,18.863-18.863,18.863h-43.116c-10.401,0-18.863-8.463-18.863-18.863v-10.779c0-4.466,3.618-8.084,8.084-8.084
                       s8.084,3.618,8.084,8.084v10.779c0,1.486,1.208,2.695,2.695,2.695h43.116c1.486,0,2.695-1.208,2.695-2.695v-43.116
                       c0-1.486-1.208-2.695-2.695-2.695h-43.116c-1.486,0-2.695,1.208-2.695,2.695c0,4.466-3.618,8.084-8.084,8.084
                       s-8.084-3.618-8.084-8.084C291.032,116.252,299.494,107.789,309.895,107.789z M105.095,145.516c28.231,0,51.2-22.969,51.2-51.2
                       s-22.969-51.2-51.2-51.2s-51.2,22.969-51.2,51.2S76.864,145.516,105.095,145.516z M105.095,59.284
                       c19.316,0,35.032,15.715,35.032,35.032s-15.716,35.032-35.032,35.032s-35.032-15.715-35.032-35.032S85.779,59.284,105.095,59.284z
                        M503.916,355.705h-24.253V245.221c0-16.344-13.298-29.642-29.642-29.642H202.105c-16.345,0-29.642,13.298-29.642,29.642v110.484
                       h-25.9c-3.419-3.57-7.612-6.433-12.36-8.314c-2.633-13.668-14.684-24.023-29.109-24.023H59.284V256c0-4.466-3.62-8.084-8.084-8.084
                       s-8.084,3.618-8.084,8.084v75.453c0,4.466,3.62,8.084,8.084,8.084h53.895c7.43,0,13.474,6.044,13.474,13.474
                       s-6.044,13.474-13.474,13.474H29.642c-7.43,0-13.474-6.044-13.474-13.474V234.442c0-31.203,25.385-56.589,56.589-56.589h64.674
                       c16.67,0,32.417,7.304,43.203,20.039c2.886,3.404,7.987,3.831,11.393,0.943c3.407-2.886,3.83-7.986,0.944-11.393
                       c-13.864-16.369-34.108-25.757-55.541-25.757H72.758C32.639,161.684,0,194.323,0,234.442V353.01
                       c0,16.344,13.297,29.642,29.642,29.642h35.134c1.381,18.062,16.519,32.337,34.929,32.337h21.558
                       c19.316,0,35.032-15.715,35.032-35.032c0-2.77-0.323-5.479-0.939-8.084h17.107v67.368c0,16.344,13.297,29.642,29.642,29.642h74.004
                       l-0.964,26.947h-35.314c-4.465,0-8.084,3.618-8.084,8.084s3.62,8.084,8.084,8.084h43.079c0.029,0,0.057,0,0.082,0h86.141
                       c0.013,0,0.026,0,0.04,0c0.014,0,0.027,0,0.041,0h43.08c4.466,0,8.084-3.618,8.084-8.084s-3.618-8.084-8.084-8.084H376.98
                       l-0.964-26.947h74.005c16.344,0,29.642-13.298,29.642-29.642v-67.368h24.253c4.466,0,8.084-3.618,8.084-8.084
                       S508.382,355.705,503.916,355.705z M121.263,398.821H99.705c-9.487,0-17.359-7.039-18.671-16.168h24.061
                       c12.205,0,22.71-7.416,27.249-17.976c4.78,3.466,7.782,9.086,7.782,15.281C140.126,390.358,131.664,398.821,121.263,398.821z
                        M463.495,439.242c0,7.43-6.044,13.474-13.474,13.474H375.44l-2.829-79.205c-0.571-16.028-13.584-28.585-29.623-28.585
                       c-4.466,0-8.084,3.618-8.084,8.084s3.618,8.084,8.084,8.084c7.291,0,13.205,5.707,13.465,12.993l4.348,121.744h-69.476
                       l4.348-121.744c0.26-7.285,6.175-12.993,13.465-12.993c4.466,0,8.084-3.618,8.084-8.084c0-4.466-3.618-8.084-8.084-8.084
                       c-16.04,0-29.051,12.555-29.623,28.585l-2.831,79.205h-74.581c-7.43,0-13.474-6.044-13.474-13.474V245.221
                       c0-7.43,6.044-13.474,13.474-13.474h247.916c7.43,0,13.474,6.044,13.474,13.474V439.242z M266.779,59.284h21.558
                       c10.401,0,18.863-8.463,18.863-18.863V18.863C307.2,8.463,298.737,0,288.337,0h-21.558c-10.401,0-18.863,8.463-18.863,18.863v21.558
                       C247.916,50.822,256.378,59.284,266.779,59.284z M264.084,18.863c0-1.486,1.208-2.695,2.695-2.695h21.558
                       c1.486,0,2.695,1.208,2.695,2.695v21.558c0,1.486-1.208,2.695-2.695,2.695h-21.558c-1.486,0-2.695-1.208-2.695-2.695V18.863z" />
                                            </svg>
                                            <h4><span
                                                    class=" badge bg-secondary text-light ms-2 mt-3">{{ $exp->title }}</span>
                                            </h4>
                                            <div class="dropdown ms-auto">
                                                <button type="button"
                                                    class="btn btn-icon btn-sm fs-xl text-dark-emphasis border-0"
                                                    data-bs-toggle="dropdown" aria-expanded="false" aria-label="Actions">
                                                    <i class="fi-more-vertical"></i>
                                                </button>
                                                <ul class="dropdown-menu dropdown-menu-end"
                                                    style="--fn-dropdown-min-width: 8rem">
                                                    <li>
                                                        <a class="dropdown-item edit-experience" href="#!"
                                                            data-id="{{ $exp->id }}">
                                                            <i class="fi-edit opacity-75 me-2"></i>
                                                            Edit
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a class="dropdown-item text-danger delete-experience"
                                                            href="#!" data-id="{{ $exp->id }}">
                                                            <i class="fi-trash opacity-75 me-2"></i>
                                                            Delete
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="fs-xs text-body mb-1">Job Role </div>
                                        <div class="h5 pt-md-1 pb-2 pb-md-3" style="letter-spacing: 1.25px">
                                            {{ $exp->purpose }}</div>
                                        <div class="d-flex justify-content-between">
                                            <div class="me-3">
                                                <div class="fs-xs text-body mb-1">Job Description </div>
                                                <div class="h6 fs-sm mb-0">{{ $exp->desc }}</div>
                                            </div>
                                            <div>
                                                <span class="badge text-bg-danger mt-n1 mb-1">Job Duration</span>
                                                <div class="h6 fs-sm mb-0 text-center">{{ $exp->year }}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <span class="position-absolute top-0 start-0 w-100 h-100 rounded-4 d-none-dark"
                                        style="background: linear-gradient(90deg, 0%, #ffe8c9 100%)"></span>
                                    <span class="position-absolute top-0 start-0 w-100 h-100 rounded-4 d-none d-block-dark"
                                        style="background: linear-gradient(-90deg, #2f2c3a 0%, #372e2f 52.24%)"></span>
                                </div>
                            @endforeach
                        @endif
                    </div>

                    <!-- Add payment method button -->
                    <div class="d-flex flex-column align-items-sm-start">
                        <button type="button" class="btn btn-lg btn-outline-dark" data-bs-toggle="modal"
                            data-bs-target="#addExperience">
                            <i class="fi-study fs-lg ms-n2 me-2"></i>
                            Add Experience Section
                        </button>
                    </div>
                </div>
            </div>




            <!-- Award tab -->
            <div class="tab-pane fade" id="award" role="tabpanel" aria-labelledby="notifications-tab">
                <div class="col-lg-12">
                    <h1 class="h2">Work history and Experience </h1>
                    {{-- <p class="pb-2 pb-lg-3">Add and manage payment methods with our secure payment system.</p> --}}

                    <!-- Cards -->
                    <div class=" flex-sm-row gap-3 gap-md-4 pb-2 pb-lg-3 mb-3 mt-3">

                        @if ($award->isEmpty())
                            <p>No Award / Certificate records found.</p>
                        @else
                            @foreach ($award as $awd)
                                <div class="card w-100 border-2 mb-3 mt-3">
                                    <div class="card-body position-relative z-2">
                                        <div class="d-flex align-items-center pb-4 mb-2 mb-md-3">

                                            <h4><span
                                                    class=" badge bg-secondary text-light ms-2 mt-3">{{ $awd->title }}</span>
                                            </h4>
                                            <div class="dropdown ms-auto">
                                                <button type="button"
                                                    class="btn btn-icon btn-sm fs-xl text-dark-emphasis border-0"
                                                    data-bs-toggle="dropdown" aria-expanded="false" aria-label="Actions">
                                                    <i class="fi-more-vertical"></i>
                                                </button>
                                                <ul class="dropdown-menu dropdown-menu-end"
                                                    style="--fn-dropdown-min-width: 8rem">
                                                    <li>
                                                        <a class="dropdown-item edit-experience" href="#!"
                                                            data-id="">
                                                            <i class="fi-edit opacity-75 me-2"></i>
                                                            Edit
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a class="dropdown-item text-danger delete-award" href="#!"
                                                            data-id="{{ $awd->id }}">
                                                            <i class="fi-trash opacity-75 me-2"></i>
                                                            Delete
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="fs-xs text-body mb-1">Job Role </div>
                                        <div class="h5 pt-md-1 pb-2 pb-md-3" style="letter-spacing: 1.25px">
                                            {{ $awd->purpose }}</div>
                                        <div class="d-flex justify-content-between">
                                            <div class="me-3">
                                                <div class="fs-xs text-body mb-1">Job Description </div>
                                                <div class="h6 fs-sm mb-0">{{ $awd->desc }}</div>
                                            </div>
                                            <div>
                                                <span class="badge text-bg-danger mt-n1 mb-1">Award / Certificate Date
                                                </span>
                                                <div class="h6 fs-sm mb-0 text-center">{{ $awd->year }}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <span class="position-absolute top-0 start-0 w-100 h-100 rounded-4 d-none-dark"
                                        style="background: linear-gradient(90deg, 0%, #628ca0 100%)"></span>
                                    <span class="position-absolute top-0 start-0 w-100 h-100 rounded-4 d-none d-block-dark"
                                        style="background: linear-gradient(-90deg, #2f2c3a 0%, #372e2f 52.24%)"></span>
                                </div>
                            @endforeach
                        @endif


                        <!-- Add payment method button -->
                        <div class="d-flex flex-column align-items-sm-start">
                            <button type="button" class="btn btn-lg btn-outline-dark" data-bs-toggle="modal"
                                data-bs-target="#addAward">
                                <i class="fi-study fs-lg ms-n2 me-2"></i>
                                Add Award and Certificate Section
                            </button>
                        </div>
                    </div>
                </div>
            </div>



            <!-- Gallery tab -->
            <div class="tab-pane fade" id="gallery" role="tabpanel" aria-labelledby="security-tab">



                <h2 class="h2 pb-1 pb-lg-2">Photos and videos</h2>
                {{-- <p class="fs-sm mb-0">The maximum photo size is 8 MB. Formats: jpeg, jpg, png. Put the main picture first.</p> --}}
                <p class="fs-sm">The maximum video size is 10 MB. Formats: mp4, mov.</p>

                <div class="border w-auto rounded p-3">
                    <div class="row row-cols-2 row-cols-sm-3 g-2">
                        @if ($gallery->isEmpty())
                            <p>No photos or videos available.</p>
                        @else
                            @foreach ($gallery as $image)
                                <div class="col">
                                    <a class="hover-effect-scale hover-effect-opacity position-relative d-flex rounded overflow-hidden"
                                        href="{{ asset($image->images) }}" data-glightbox=""
                                        data-gallery="image-gallery">
                                        <i
                                            class="fi-zoom-in hover-effect-target fs-3 text-white position-absolute top-50 start-50 translate-middle opacity-0 z-2"></i>
                                        <span
                                            class="hover-effect-target position-absolute top-0 start-0 w-100 h-100 bg-black bg-opacity-25 opacity-0 z-1"></span>
                                        <div class="ratio hover-effect-target bg-body-tertiary rounded"
                                            style="--fn-aspect-ratio: calc(180 / 268 * 100%)">
                                            <img src="{{ asset($image->images) }}" alt="Image" class="img-fluid"
                                                style="object-fit: cover">
                                        </div>
                                    </a>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>






                <!-- Add payment method button -->
                <div class="d-flex flex-column align-items-sm-start mt-5">
                    <button type="button" class="btn btn-lg btn-outline-dark" data-bs-toggle="modal"
                        data-bs-target="#addGallery">
                        <i class="fi-study fs-lg ms-n2 me-2"></i>
                        Add Picture Gallery
                    </button>
                </div>
            </div>

        </div>

    </div>
    </div>

    {{-- MODALS --}}


    {{-- Education Modal --}}
    <div class="modal fade" id="addEducation" data-bs-backdrop="static" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <ul class="nav nav-pills gap-3" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button type="button" class="nav-link active" id="add-card-tab" data-bs-toggle="pill"
                                data-bs-target="#add-card" role="tab" aria-controls="add-card" aria-selected="true">
                                Add Educational Records
                            </button>
                        </li>

                    </ul>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body tab-content">
                    <div class="tab-pane fade show active" id="add-card" role="tabpanel"
                        aria-labelledby="add-card-tab">
                        <form method="post" action="{{ route('settings.save') }}" enctype="multipart/form-data"
                            style="color:#000000;">
                            {{ csrf_field() }}
                            @method('PUT')

                            <div class="mb-4">
                                <label for="card-number" class="form-label">School</label>
                                <div class="position-relative">
                                    <input type="text" name="school[]"
                                        class="form-control form-control-lg form-icon-end bg-image-none"
                                        placeholder="University of XYz" required="" value="">
                                    <span
                                        class="position-absolute d-flex top-50 end-0 translate-middle-y fs-5 text-body-tertiary me-3"
                                        data-card-icon=""></span>
                                    <div class="invalid-tooltip bg-transparent p-0">Please provide a valid card number!
                                    </div>
                                </div>
                            </div>
                            <div class="position-relative mb-4">
                                <label for="card-name" class="form-label">Degree</label>
                                <input type="text" name="degree[]" class="form-control form-control-lg"
                                    id="degree" required="" value="">
                                <div class="invalid-tooltip bg-transparent p-0">Please enters cardholder's name!</div>
                            </div>
                            <div class="row row-cols-2 g-4 mb-4">
                                <div class="col position-relative">
                                    <label for="card-expiration" class="form-label">Year of Graduation</label>
                                    <input type="text" name="year[]" class="form-control form-control-lg"
                                        placeholder="Year" required="" value="">
                                    <div class="invalid-tooltip bg-transparent p-0">Field is required!</div>
                                </div>
                                <div class="col position-relative">
                                    <label for="card-cvc" class="form-label">Field of Study</label>
                                    <input type="text" name="field_of_study[]" class="form-control form-control-lg"
                                        id="card-cvc" placeholder="Certificate" required="" value="">
                                    <div class="invalid-tooltip bg-transparent p-0">Field is required!</div>
                                </div>
                            </div>
                            <div class="d-flex gap-3">
                                <button type="reset" class="btn btn-secondary w-100"
                                    data-bs-dismiss="modal">Cancel</button>
                                <button type="submit" class="btn btn-primary w-100">Add Education</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Experience Modal --}}
    <div class="modal fade" id="addExperience" data-bs-backdrop="static" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body tab-content">
                    <div class="tab-pane fade show active" id="add-card" role="tabpanel"
                        aria-labelledby="add-card-tab">
                        <form method="post" action="{{ route('settings.save') }}" enctype="multipart/form-data"
                            style="color:#000000;">
                            {{ csrf_field() }}
                            @method('PUT')

                            <div class="mb-4">
                                <label for="card-number" class="form-label">Employer</label>
                                <div class="position-relative">
                                    <input type="text" name="experience[]"
                                        class="form-control form-control-lg form-icon-end bg-image-none"
                                        placeholder="Company Name" required="" value="">
                                    <span
                                        class="position-absolute d-flex top-50 end-0 translate-middle-y fs-5 text-body-tertiary me-3"
                                        data-card-icon=""></span>
                                    <div class="invalid-tooltip bg-transparent p-0">Please provide a valid card number!
                                    </div>
                                </div>
                            </div>
                            <div class="position-relative mb-4">
                                <label for="card-name" class="form-label">Role</label>
                                <input type="text" name="role[]" class="form-control form-control-lg" id="degree"
                                    required="" placeholder="Job Role" value="">
                                <div class="invalid-tooltip bg-transparent p-0">Please enters cardholder's name!</div>
                            </div>
                            <div class="row row-cols-2 g-4 mb-4">
                                <div class="col position-relative">
                                    <label for="card-expiration" class="form-label">Start Year</label>
                                    <input type="number" name="start_year[]" class="form-control form-control-lg"
                                        placeholder="20xx" required="" value="">
                                    <div class="invalid-tooltip bg-transparent p-0">Field is required!</div>
                                </div>
                                <div class="col position-relative">
                                    <label for="card-cvc" class="form-label">End Year</label>
                                    <input type="number" name="end_year[]" class="form-control form-control-lg end-year"
                                        id="card-cvc"
                                        data-input-format="{&quot;numericOnly&quot;: true, &quot;blocks&quot;: [3]}"
                                        placeholder="20xx" required="" value="">
                                    <div class="invalid-tooltip bg-transparent p-0">Field is required!</div>
                                </div>
                                <div class="col position-relative mb-4">
                                    <div class="form-check">
                                        <input class="form-check-input currently-working" type="checkbox"
                                            id="currentlyWorking" name="currently_working[]">
                                        <label class="form-check-label text-light" for="currentlyWorking">
                                            Currently Working
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="col position-relative g-4 mb-4">
                                <label for="card-cvc" class="form-label">Description</label>
                                <textarea name="desc[]" id="" cols="10" rows="6" class="form-control form-control-lg"></textarea>
                                <div class="invalid-tooltip bg-transparent p-0">Field is required!</div>
                            </div>
                            <div class="d-flex gap-3">
                                <button type="reset" class="btn btn-secondary w-100"
                                    data-bs-dismiss="modal">Cancel</button>
                                <button type="submit" class="btn btn-primary w-100">Add Work History</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Add Profile Image Modal --}}
    <div class="modal fade" id="addimage" data-bs-backdrop="static" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body tab-content">
                    <div class="tab-pane fade show active" id="add-card" role="tabpanel"
                        aria-labelledby="add-card-tab">
                        <form method="post" action="{{ route('settings.save') }}" enctype="multipart/form-data"
                            style="color:#000000;">
                            {{ csrf_field() }}
                            @method('PUT')
                            <input type="hidden" name="update_profile_image" value="1">
                            <div class="mb-4">
                                <label for="card-number" class="form-label">Upload Image </label>
                                <div class="position-relative" data-input-format="{&quot;creditCard&quot;: true}">
                                    <input type="file" name="profile_image"
                                        class="form-control form-control-lg form-icon-end bg-image-none"
                                        id="profile_image">
                                    <span
                                        class="position-absolute d-flex top-50 end-0 translate-middle-y fs-5 text-body-tertiary me-3"
                                        data-card-icon=""></span>
                                    <div class="invalid-tooltip bg-transparent p-0">Please provide a valid card number!
                                    </div>
                                </div>
                            </div>

                            <div class="d-flex gap-3">
                                <button type="submit" class="btn btn-primary w-100">Update Profile Image </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Add Picture Gallery Modal --}}
    <div class="modal fade" id="addGallery" data-bs-backdrop="static" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body tab-content">
                    <div class="tab-pane fade show active" id="add-card" role="tabpanel"
                        aria-labelledby="add-card-tab">
                        <form method="post" action="{{ route('settings.save') }}" enctype="multipart/form-data"
                            style="color:#000000;">
                            {{ csrf_field() }}
                            @method('PUT')

                            <input type="hidden" name="home" value="home">

                            <div id="gallery-previews" class="row mb-3">
                                @foreach ($user->gallery ?? [] as $gallery)
                                    <div class="col-md-3 gallery-image" id="gallery-image-{{ $gallery->id }}">
                                        <img src="{{ asset($gallery->images) }}" alt="Gallery Image"
                                            class="img-fluid mb-2">
                                        <button type="button" class="btn btn-danger btn-sm"
                                            onclick="removeGalleryImage({{ $gallery->id }})">Delete</button>
                                        <input type="hidden" name="delete_gallery_images[]"
                                            value="{{ $gallery->id }}">
                                    </div>
                                @endforeach
                            </div>

                            <div class="mb-4">
                                <label for="card-number" class="form-label">Upload Multiple Images </label>
                                <div class="position-relative" data-input-format="{&quot;creditCard&quot;: true}">

                                    <input type="file" id="gallery-input" name="gallery_images[]" multiple
                                        accept="image/*" class="form-control form-control-lg form-icon-end bg-image-none">
                                    <span
                                        class="position-absolute d-flex top-50 end-0 translate-middle-y fs-5 text-body-tertiary me-3"></span>
                                    <div class="invalid-tooltip bg-transparent p-0"> Post you Work Gallery</div>
                                </div>
                            </div>

                            <div class="d-flex gap-3">
                                <button type="submit" class="btn btn-primary w-100">Update Image Gallery</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


    {{-- Award Modal --}}
    <div class="modal fade" id="addAward" data-bs-backdrop="static" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <ul class="nav nav-pills gap-3" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button type="button" class="nav-link active" id="add-card-tab" data-bs-toggle="pill"
                                data-bs-target="#add-card" role="tab" aria-controls="add-card" aria-selected="true">
                                Add Award and Certificate Records
                            </button>
                        </li>

                    </ul>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body tab-content">
                    <div class="tab-pane fade show active" id="add-card" role="tabpanel"
                        aria-labelledby="add-card-tab">
                        <form method="post" action="{{ route('settings.save') }}" enctype="multipart/form-data"
                            style="color:#000000;">
                            {{ csrf_field() }}
                            @method('PUT')

                            {{-- <input type="hidden" name="award_id[]" value="1"> --}}
                            <div class="mb-4">
                                <label for="card-number" class="form-label">Title</label>
                                <div class="position-relative">
                                    <input type="text" name="award[]"
                                        class="form-control form-control-lg form-icon-end bg-image-none"
                                        placeholder="Title of your Award or Certificate!" required="" value="">
                                    <span
                                        class="position-absolute d-flex top-50 end-0 translate-middle-y fs-5 text-body-tertiary me-3"
                                        data-card-icon=""></span>
                                    <div class="invalid-tooltip bg-transparent p-0">Title of your Award or Certificate!
                                    </div>
                                </div>
                            </div>
                            <div class="position-relative mb-4">
                                <label for="card-name" class="form-label">Degree</label>
                                <input type="text" name="purpose[]" class="form-control form-control-lg"
                                    irequired="" value="" placeholder="Purpose of Award">
                                <div class="invalid-tooltip bg-transparent p-0">Purpose</div>
                            </div>
                            <div class="row row-cols-2 g-4 mb-4">
                                <div class="col position-relative">
                                    <label for="card-expiration" class="form-label">Year of Achievement</label>
                                    <input type="text" name="year[]" class="form-control form-control-lg"
                                        placeholder="Year" required="" value="">
                                    <div class="invalid-tooltip bg-transparent p-0">Field is required!</div>
                                </div>
                            </div>
                            <div class="col position-relative mb-4">
                                <label for="card-cvc" class="form-label">What did you do to deserve the Achievemnt
                                    (briefly write a shoty description)</label>
                                <textarea type="text" name="description" class="form-control form-control-lg" placeholder="Certificate"
                                    required=""></textarea>
                                <div class="invalid-tooltip bg-transparent p-0">Field is required!</div>
                            </div>

                            <div class="d-flex gap-3">
                                <button type="reset" class="btn btn-secondary w-100"
                                    data-bs-dismiss="modal">Cancel</button>
                                <button type="submit" class="btn btn-primary w-100">Add Award and Certificaion</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- END OF MODAL --}}


    @include('users.profile-script')





@endsection
