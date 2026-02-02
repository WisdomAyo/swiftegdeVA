@extends('shared.layout.user')
@section('content')

<div class="col-lg-9">
    <!-- Success/Error Messages (SweetAlert) -->
    @if (session('success') || session('response'))
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                title: 'Success!',
                text: '{{ session('
                success ') ?? session('
                response ') }}',
                icon: 'success',
                confirmButtonColor: '#6366f1',
                timer: 3000
            });
        });
    </script>
    @endif

    @if ($errors->any() || session('error') || session('validationErrors'))
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                title: 'Attention Needed',
                html: `
                    @if(session('error')) {{ session('error') }} <br> @endif
                    @foreach($errors->all() as $error) {{ $error }} <br> @endforeach
                    @if(session('validationErrors')) 
                        {!! nl2br(e(json_encode(session('validationErrors')))) !!} 
                    @endif
                `,
                icon: 'warning',
                confirmButtonColor: '#6366f1'
            });
        });
    </script>
    @endif

    <!-- Profile Header -->
    <div class="card border-0 shadow-sm rounded-4 overflow-hidden mb-4">
        <div class="position-relative" style="height: 160px; background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);">
            <!-- Cover Pattern/Overlay -->
            <div class="position-absolute top-0 start-0 w-100 h-100" style="background-image: url('data:image/svg+xml,...'); opacity: 0.1;"></div>
        </div>
        <div class="card-body pt-0 position-relative">
            <div class="d-sm-flex align-items-end justify-content-between">
                <div class="d-flex align-items-end mb-4 mb-sm-0">
                    <div class="flex-shrink-0 position-relative" style="margin-top: -60px; z-index: 2;">
                        @if (!empty(Auth::user()->profile_image))
                        <img src="{{ asset(Auth::user()->profile_image) }}" class="rounded-circle border border-4 border-white shadow-sm object-fit-cover" width="120" height="120" alt="Avatar">
                        @else
                        <div class="rounded-circle border border-4 border-white shadow-sm bg-light d-flex align-items-center justify-content-center" style="width: 120px; height: 120px;">
                            <i class="fi-user fs-1 text-muted"></i>
                        </div>
                        @endif
                        <button class="btn btn-icon btn-sm btn-light rounded-circle shadow-sm position-absolute bottom-0 end-0 mb-1 me-1"
                            data-bs-toggle="modal" data-bs-target="#addimage" title="Update Photo">
                            <i class="fi-camera"></i>
                        </button>
                    </div>
                    <div class="pt-3 ps-3">
                        <h3 class="h4 mb-1">{{ Auth::user()->full_name }}
                            <i class="fi-check-circle text-success fs-base ms-1" data-bs-toggle="tooltip" title="Verified"></i>
                        </h3>
                        <div class="fs-sm text-muted">
                            <i class="fi-map-pin me-1"></i>
                            {{ Auth::user()->country->name ?? '' }}
                            {{ Auth::user()->state ? ', '.Auth::user()->state->name : '' }}
                        </div>
                    </div>
                </div>
                <div class="d-flex gap-2 pb-3">
                    <span class="badge bg-success-subtle text-success fs-sm px-3 py-2 rounded-pill">
                        {{ Auth::user()->availability ?? 'Availability Not Set' }}
                    </span>
                </div>
            </div>

            <!-- Profile Completion -->
            <div class="mt-4 p-3 bg-light rounded-3">
                <div class="d-flex justify-content-between align-items-center mb-2">
                    <span class="fw-medium text-dark"><i class="fi-pie-chart me-2 text-primary"></i>Profile Strength</span>
                    <span class="fw-bold text-primary">{{ \App\Helpers\CommonHelpers::getProfileCompleteness() }}%</span>
                </div>
                <div class="progress" style="height: 8px;">
                    <div class="progress-bar bg-gradient-primary" role="progressbar"
                        style="width: {{ \App\Helpers\CommonHelpers::getProfileCompleteness() }}%; background: linear-gradient(90deg, #667eea 0%, #764ba2 100%);"
                        aria-valuenow="{{ \App\Helpers\CommonHelpers::getProfileCompleteness() }}" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
            </div>
        </div>
    </div>

    <!-- Navigation Tabs -->
    <ul class="nav nav-pills nav-fill gap-2 mb-4 overflow-x-auto pb-2 flex-nowrap" id="profileTabs" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link active rounded-pill fw-medium" id="personal-tab" data-bs-toggle="pill" data-bs-target="#personal" type="button" role="tab"><i class="fi-user me-2"></i>Personal</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link rounded-pill fw-medium" id="professional-tab" data-bs-toggle="pill" data-bs-target="#professional" type="button" role="tab"><i class="fi-briefcase me-2"></i>Professional</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link rounded-pill fw-medium" id="education-tab" data-bs-toggle="pill" data-bs-target="#education" type="button" role="tab"><i class="fi-education me-2"></i>Education</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link rounded-pill fw-medium" id="experience-tab" data-bs-toggle="pill" data-bs-target="#experience" type="button" role="tab"><i class="fi-star me-2"></i>Experience</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link rounded-pill fw-medium" id="gallery-tab" data-bs-toggle="pill" data-bs-target="#gallery" type="button" role="tab"><i class="fi-image me-2"></i>Gallery</button>
        </li>
    </ul>

    <!-- Tab Content -->
    <div class="tab-content" id="profileTabContent">

        <!-- PERSONAL TAB -->
        <div class="tab-pane fade show active" id="personal" role="tabpanel">
            <form method="post" action="{{ route('settings.save') }}" enctype="multipart/form-data" id="profile-form">
                {{ csrf_field() }}
                @method('PUT')

                <div class="card border-0 shadow-sm rounded-4 mb-4">
                    <div class="card-header bg-transparent border-bottom py-3">
                        <h5 class="mb-0"><i class="fi-info-circle me-2 text-primary"></i>Basic Information</h5>
                    </div>
                    <div class="card-body p-4">
                        <div class="row g-4">
                            <div class="col-md-6">
                                <label class="form-label fw-medium">Full Name</label>
                                <input type="text" class="form-control form-control-lg" name="full_name" value="{{ Auth::user()->full_name }}" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-medium">Email Address</label>
                                <input type="email" class="form-control form-control-lg bg-light" value="{{ Auth::user()->email }}" disabled>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-medium">Phone Number</label>
                                <input type="tel" class="form-control form-control-lg" name="phone" value="{{ Auth::user()->phone }}" placeholder="(___) ___-____">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-medium">Availability</label>
                                <select class="form-select form-select-lg" name="availability">
                                    <option value="{{ Auth::user()->availability }}" selected>{{ Auth::user()->availability ?? 'Select Status' }}</option>
                                    <option value="Actively Searching">Actively Searching</option>
                                    <option value="Passively Searching">Passively Searching</option>
                                    <option value="Hired">Hired</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-medium">Date of Birth</label>
                                <input type="date" class="form-control form-control-lg" name="date_of_birth" value="{{ Auth::user()->date_of_birth }}">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-medium">Gender</label>
                                <select class="form-select form-select-lg" name="gender">
                                    <option value="{{ Auth::user()->gender }}" selected>{{ Auth::user()->gender ?? 'Select Gender' }}</option>
                                    <option value="male">Male</option>
                                    <option value="female">Female</option>
                                    <option value="others">Other</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card border-0 shadow-sm rounded-4 mb-4">
                    <div class="card-header bg-transparent border-bottom py-3">
                        <h5 class="mb-0"><i class="fi-map me-2 text-info"></i>Location</h5>
                    </div>
                    <div class="card-body p-4">
                        <div class="row g-4">
                            <div class="col-md-4">
                                <label class="form-label fw-medium">Country</label>
                                <select class="form-select form-select-lg" name="country_id" id="country" required>
                                    <option value="">Select Country</option>
                                    @foreach (\App\Models\Country::all() as $row)
                                    <option value="{{ $row->id }}" {{ old('country_id', Auth::user()->country_id) == $row->id ? 'selected' : '' }}>
                                        {{ ucfirst(strtolower($row->name)) }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label fw-medium">State</label>
                                <select class="form-select form-select-lg" name="state_id" id="state" required>
                                    <option value="{{ Auth::user()->state_id }}" selected>{{ Auth::user()->state->name ?? 'Select State' }}</option>
                                    @foreach (\App\Models\State::where('country_id', Auth::user()->country_id)->get() as $row)
                                    <option value="{{ $row->id }}">{{ $row->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label fw-medium">City</label>
                                <select class="form-select form-select-lg" name="city_id" id="city">
                                    <option value="{{ Auth::user()->city_id }}" selected>{{ Auth::user()->cityName->name ?? 'Select City' }}</option>
                                </select>
                            </div>
                            <div class="col-12">
                                <label class="form-label fw-medium">Street Address</label>
                                <input type="text" class="form-control form-control-lg" name="street_address" value="{{ Auth::user()->street_address }}">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="text-end">
                    <button type="submit" class="btn btn-primary btn-lg rounded-pill px-5 shadow-sm">Save Changes</button>
                </div>

        </div>

        <!-- PROFESSIONAL TAB -->
        <div class="tab-pane fade" id="professional" role="tabpanel">

            <div class="card border-0 shadow-sm rounded-4 mb-4">
                <div class="card-header bg-transparent border-bottom py-3">
                    <h5 class="mb-0"><i class="fi-briefcase me-2 text-warning"></i>Professional Details</h5>
                </div>
                <div class="card-body p-4">
                    <div class="mb-4">
                        <label class="form-label fw-medium">Professional Bio</label>
                        <textarea class="form-control" id="texteditor" name="service_description" rows="6">{{ Auth::user()->service_description }}</textarea>
                        <div class="form-text text-muted">Describe your expertise and what makes you unique (Min 100 chars)</div>
                    </div>

                    <div class="row g-4 mb-4">
                        <div class="col-md-6">
                            <label class="form-label fw-medium">Service Category</label>
                            <select class="form-select form-select-lg" name="business_category">
                                <option value="{{ Auth::user()->business_category_id }}">{{ Auth::user()->businessCategory->title ?? 'Select Category' }}</option>
                                @foreach ($category as $row)
                                <option value="{{ $row->id }}">{{ $row->title }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-medium">Years of Experience</label>
                            <input type="number" class="form-control form-control-lg" name="work_experience" value="{{ Auth::user()->work_experience }}">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-medium">Skill Level</label>
                            <select class="form-select form-select-lg" name="skillLevel">
                                <option value="{{ Auth::user()->skillLevel }}" selected>{{ Auth::user()->skillLevel ?? 'Select Level' }}</option>
                                <option value="Beginner">Beginner</option>
                                <option value="Intermediate">Intermediate</option>
                                <option value="Expert">Expert</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-medium">Compensation Type</label>
                            <select class="form-select form-select-lg" name="compensation_type">
                                <option value="{{ Auth::user()->compensation_type }}" selected>{{ Auth::user()->compensation_type ?? 'Select Type' }}</option>
                                <option value="Pay per job">Pay per job</option>
                                <option value="Salary">Salary</option>
                            </select>
                        </div>
                    </div>

                    <h6 class="mb-3 pt-2">Hourly Rates</h6>
                    <div class="row g-3">
                        <div class="col-6 col-md-3">
                            <label class="form-label fs-sm text-muted">USD ($)</label>
                            <input type="number" class="form-control" name="usd_rate" value="{{ Auth::user()->usd_rate }}">
                        </div>
                        <div class="col-6 col-md-3">
                            <label class="form-label fs-sm text-muted">EUR (€)</label>
                            <input type="number" class="form-control" name="eur_rate" value="{{ Auth::user()->eur_rate }}">
                        </div>
                        <div class="col-6 col-md-3">
                            <label class="form-label fs-sm text-muted">GBP (£)</label>
                            <input type="number" class="form-control" name="gbp_rate" value="{{ Auth::user()->gbp_rate }}">
                        </div>
                        <div class="col-6 col-md-3">
                            <label class="form-label fs-sm text-muted">NGN (₦)</label>
                            <input type="number" class="form-control" name="ngn_rate" value="{{ Auth::user()->ngn_rate }}">
                        </div>
                    </div>
                </div>
            </div>

            <div class="text-end">
                <button type="submit" class="btn btn-primary btn-lg rounded-pill px-5 shadow-sm">Save Professional Info</button>
            </div>
            </form>
        </div>

        <!-- EDUCATION TAB -->
        <div class="tab-pane fade" id="education" role="tabpanel">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h4 class="mb-0">Education History</h4>
                <a href="{{ route('user.profile.education') }}" class="btn btn-outline-primary rounded-pill"><i class="fi-plus me-2"></i>Add Education</a>
            </div>

            @if ($education->isEmpty())
            <div class="text-center py-5 bg-light rounded-4">
                <i class="fi-education fs-1 text-muted opacity-50 mb-3"></i>
                <p class="text-muted">No education records found. Add your qualifications.</p>
            </div>
            @else
            <div class="vstack gap-3">
                @foreach ($education as $row)
                <div class="card border-0 shadow-sm rounded-4">
                    <div class="card-body d-flex align-items-center gap-3">
                        <div class="bg-primary-subtle text-primary p-3 rounded-circle">
                            <i class="fi-education fs-4"></i>
                        </div>
                        <div class="flex-grow-1">
                            <h5 class="mb-1">{{ $row->title }}</h5>
                            <p class="mb-0 text-muted">{{ $row->purpose }} <span class="mx-2">•</span> {{ $row->year }}</p>
                        </div>
                        <div class="dropdown">
                            <button class="btn btn-icon btn-light rounded-circle" data-bs-toggle="dropdown"><i class="fi-more-vertical"></i></button>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li><a class="dropdown-item" href="#"><i class="fi-edit me-2"></i>Edit</a></li>
                                <li><a class="dropdown-item text-danger" href="#"><i class="fi-trash me-2"></i>Delete</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            @endif
        </div>

        <!-- EXPERIENCE TAB -->
        <div class="tab-pane fade" id="experience" role="tabpanel">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h4 class="mb-0">Work Experience</h4>
                <a href="{{ route('user.profile.experience') }}" class="btn btn-outline-primary rounded-pill"><i class="fi-plus me-2"></i>Add Experience</a>
            </div>
            <div class="text-center py-5 bg-light rounded-4">
                <i class="fi-briefcase fs-1 text-muted opacity-50 mb-3"></i>
                <p class="text-muted">Add your past work experience to build credibility.</p>
            </div>
        </div>

        <!-- GALLERY TAB -->
        <div class="tab-pane fade" id="gallery" role="tabpanel">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h4 class="mb-0">Portfolio Gallery</h4>
                <a href="{{ route('user.profile.gallery') }}" class="btn btn-outline-primary rounded-pill"><i class="fi-image me-2"></i>Add Image</a>
            </div>
            <div class="text-center py-5 bg-light rounded-4">
                <i class="fi-image fs-1 text-muted opacity-50 mb-3"></i>
                <p class="text-muted">Showcase your best work. Upload images to your gallery.</p>
            </div>
        </div>

    </div>
</div>

<!-- Modal for Profile Image -->
<div class="modal fade" id="addimage" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content rounded-4 border-0">
            <div class="modal-header border-0">
                <h5 class="modal-title">Update Profile Photo</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('settings.save') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label class="form-label">Select Image</label>
                        <input type="file" name="profile_image" class="form-control" accept="image/*" required>
                    </div>
                    <button type="submit" class="btn btn-primary w-100 rounded-pill">Upload</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection