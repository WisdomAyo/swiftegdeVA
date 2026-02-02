@extends('shared.layout.user')
@section('content')

@if (session('onboarding_completed'))
<script>
  document.addEventListener('DOMContentLoaded', function() {
    Swal.fire({
      title: 'Welcome to SwiftEdge VA! 🎉',
      html: `<p>Congratulations on completing your onboarding!</p>
                   <p class="text-muted">Your profile is now live. Let's get you connected with opportunities.</p>`,
      icon: 'success',
      confirmButtonText: 'Let\'s Go!',
      confirmButtonColor: '#6366f1',
      timer: 5000
    });
  });
</script>
@endif

<style>
  /* Dashboard Custom Styles */
  .dashboard-hero {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    border-radius: 1.5rem;
    padding: 2rem;
    color: white;
    position: relative;
    overflow: hidden;
  }

  .dashboard-hero::before {
    content: '';
    position: absolute;
    top: -50%;
    right: -20%;
    width: 400px;
    height: 400px;
    background: rgba(255, 255, 255, 0.1);
    border-radius: 50%;
  }

  .dashboard-hero::after {
    content: '';
    position: absolute;
    bottom: -30%;
    left: -10%;
    width: 300px;
    height: 300px;
    background: rgba(255, 255, 255, 0.05);
    border-radius: 50%;
  }

  .stat-card {
    background: var(--bs-body-bg);
    border: 1px solid rgba(99, 102, 241, 0.1);
    border-radius: 1rem;
    padding: 1.5rem;
    transition: all 0.3s ease;
    position: relative;
    overflow: hidden;
  }

  .stat-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 20px 40px rgba(99, 102, 241, 0.15);
    border-color: rgba(99, 102, 241, 0.3);
  }

  .stat-card .stat-icon {
    width: 56px;
    height: 56px;
    border-radius: 12px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.5rem;
  }

  .stat-card.services .stat-icon {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
  }

  .stat-card.messages .stat-icon {
    background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
  }

  .stat-card.applications .stat-icon {
    background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);
  }

  .stat-card.views .stat-icon {
    background: linear-gradient(135deg, #43e97b 0%, #38f9d7 100%);
  }

  .progress-ring {
    width: 120px;
    height: 120px;
    position: relative;
  }

  .progress-ring svg {
    transform: rotate(-90deg);
  }

  .progress-ring circle {
    fill: none;
    stroke-width: 8;
    stroke-linecap: round;
  }

  .progress-ring .bg {
    stroke: rgba(99, 102, 241, 0.1);
  }

  .progress-ring .progress {
    stroke: url(#gradient);
    stroke-dasharray: 339.292;
    stroke-dashoffset: calc(339.292 - (339.292 * var(--progress)) / 100);
    transition: stroke-dashoffset 1s ease;
  }

  .progress-ring .percentage {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    font-size: 1.5rem;
    font-weight: 700;
    color: var(--bs-body-color);
  }

  .skill-tag {
    background: linear-gradient(135deg, rgba(102, 126, 234, 0.1) 0%, rgba(118, 75, 162, 0.1) 100%);
    border: 1px solid rgba(102, 126, 234, 0.2);
    color: #667eea;
    padding: 0.5rem 1rem;
    border-radius: 2rem;
    font-size: 0.875rem;
    font-weight: 500;
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    transition: all 0.2s ease;
  }

  .skill-tag:hover {
    background: linear-gradient(135deg, rgba(102, 126, 234, 0.2) 0%, rgba(118, 75, 162, 0.2) 100%);
    transform: scale(1.05);
  }

  .quick-action-card {
    background: var(--bs-body-bg);
    border: 1px solid var(--bs-border-color);
    border-radius: 1rem;
    padding: 1.5rem;
    text-align: center;
    transition: all 0.3s ease;
    cursor: pointer;
    text-decoration: none;
    color: inherit;
    display: block;
  }

  .quick-action-card:hover {
    transform: translateY(-3px);
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
    border-color: #667eea;
    color: inherit;
  }

  .quick-action-card .action-icon {
    width: 60px;
    height: 60px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto 1rem;
    font-size: 1.5rem;
    color: white;
  }

  .activity-item {
    display: flex;
    align-items: center;
    padding: 1rem;
    border-radius: 0.75rem;
    transition: background 0.2s ease;
  }

  .activity-item:hover {
    background: rgba(99, 102, 241, 0.05);
  }

  .activity-dot {
    width: 10px;
    height: 10px;
    border-radius: 50%;
    margin-right: 1rem;
  }

  .gallery-preview {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 0.75rem;
  }

  .gallery-item {
    aspect-ratio: 1;
    border-radius: 0.75rem;
    overflow: hidden;
    position: relative;
  }

  .gallery-item img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.3s ease;
  }

  .gallery-item:hover img {
    transform: scale(1.1);
  }

  .empty-state {
    text-align: center;
    padding: 3rem 1rem;
    color: var(--bs-secondary);
  }

  .empty-state i {
    font-size: 3rem;
    opacity: 0.5;
    margin-bottom: 1rem;
  }

  .section-card {
    background: var(--bs-body-bg);
    border: 1px solid var(--bs-border-color);
    border-radius: 1rem;
    padding: 1.5rem;
  }

  .section-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 1.5rem;
  }

  @media (max-width: 768px) {
    .dashboard-hero {
      padding: 1.5rem;
    }

    .stat-card {
      padding: 1rem;
    }
  }
</style>


<div class="col-lg-9">
  <!-- Welcome Hero Section -->
  <div class="dashboard-hero mb-4">
    <div class="row align-items-center position-relative" style="z-index: 1;">
      <div class="col-md-8">
        <p class="mb-1 opacity-75"><i class="fi-sun me-2"></i>Good {{ date('H') < 12 ? 'morning' : (date('H') < 17 ? 'afternoon' : 'evening') }},</p>
        <h1 class="h2 mb-2 text-white">{{ Auth::user()->full_name }} 👋</h1>
        <p class="mb-3 opacity-75">Ready to explore new opportunities? Your profile is looking great!</p>
        <a href="{{ route('index.jobs') }}" class="btn btn-light btn-sm me-2">
          <i class="fi-search me-2"></i>Browse Jobs
        </a>
        <a href="{{ route('user.profile') }}" class="btn btn-outline-light btn-sm">
          <i class="fi-edit me-2"></i>Edit Profile
        </a>
      </div>
      <div class="col-md-4 text-center mt-4 mt-md-0">
        @if(!empty(Auth::user()->profile_image))
        <img src="{{ asset(Auth::user()->profile_image) }}" alt="Profile"
          class="rounded-circle border border-3 border-white shadow"
          style="width: 100px; height: 100px; object-fit: cover;">
        @else
        <div class="rounded-circle border border-3 border-white mx-auto d-flex align-items-center justify-content-center bg-white bg-opacity-25"
          style="width: 100px; height: 100px;">
          <i class="fi-user fs-1 text-white opacity-75"></i>
        </div>
        @endif
      </div>
    </div>
  </div>

  <!-- Stats Grid -->
  <div class="row g-3 mb-4">
    <div class="col-6 col-lg-3">
      <div class="stat-card services">
        <div class="d-flex align-items-center mb-3">
          <div class="stat-icon text-white">
            <i class="fi-briefcase"></i>
          </div>
        </div>
        <h3 class="h2 mb-1">{{ $service }}</h3>
        <p class="text-muted mb-0 small">Active Services</p>
      </div>
    </div>
    <div class="col-6 col-lg-3">
      <div class="stat-card messages">
        <div class="d-flex align-items-center mb-3">
          <div class="stat-icon text-white">
            <i class="fi-chat"></i>
          </div>
        </div>
        <h3 class="h2 mb-1">{{ $messages }}</h3>
        <p class="text-muted mb-0 small">Messages</p>
      </div>
    </div>
    <div class="col-6 col-lg-3">
      <div class="stat-card applications">
        <div class="d-flex align-items-center mb-3">
          <div class="stat-icon text-white">
            <i class="fi-file"></i>
          </div>
        </div>
        <h3 class="h2 mb-1">{{ count($recentApplications) }}</h3>
        <p class="text-muted mb-0 small">Applications</p>
      </div>
    </div>
    <div class="col-6 col-lg-3">
      <div class="stat-card views">
        <div class="d-flex align-items-center mb-3">
          <div class="stat-icon text-white">
            <i class="fi-eye"></i>
          </div>
        </div>
        <h3 class="h2 mb-1">{{ $profileViews }}</h3>
        <p class="text-muted mb-0 small">Profile Views</p>
      </div>
    </div>
  </div>

  <div class="row g-4">
    <!-- Left Column -->
    <div class="col-lg-8">
      <!-- Quick Actions -->
      <div class="section-card mb-4">
        <div class="section-header">
          <h5 class="mb-0"><i class="fi-lightning me-2 text-warning"></i>Quick Actions</h5>
        </div>
        <div class="row g-3">
          <div class="col-6 col-md-3">
            <a href="{{ route('user.profile') }}" class="quick-action-card">
              <div class="action-icon" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);">
                <i class="fi-user"></i>
              </div>
              <h6 class="mb-0">Update Profile</h6>
            </a>
          </div>
          <div class="col-6 col-md-3">
            <a href="{{ route('user.service.add') }}" class="quick-action-card">
              <div class="action-icon" style="background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);">
                <i class="fi-plus"></i>
              </div>
              <h6 class="mb-0">Add Service</h6>
            </a>
          </div>
          <div class="col-6 col-md-3">
            <a href="{{ route('index.jobs') }}" class="quick-action-card">
              <div class="action-icon" style="background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);">
                <i class="fi-search"></i>
              </div>
              <h6 class="mb-0">Find Jobs</h6>
            </a>
          </div>
          <div class="col-6 col-md-3">
            <a href="{{ route('user.message') }}" class="quick-action-card">
              <div class="action-icon" style="background: linear-gradient(135deg, #43e97b 0%, #38f9d7 100%);">
                <i class="fi-chat"></i>
              </div>
              <h6 class="mb-0">Messages</h6>
            </a>
          </div>
        </div>
      </div>

      <!-- Skills Section -->
      <div class="section-card mb-4">
        <div class="section-header">
          <h5 class="mb-0"><i class="fi-star me-2 text-primary"></i>Your Skills</h5>
          <a href="{{ route('user.profile') }}" class="btn btn-sm btn-outline-primary">
            <i class="fi-plus me-1"></i>Add More
          </a>
        </div>
        @if($skills->count() > 0)
        <div class="d-flex flex-wrap gap-2">
          @foreach($skills as $skill)
          <span class="skill-tag">
            <i class="fi-check-circle"></i>
            {{ $skill->title }}
          </span>
          @endforeach
        </div>
        @else
        <div class="empty-state py-4">
          <i class="fi-star d-block"></i>
          <p class="mb-2">No skills added yet</p>
          <a href="{{ route('user.profile') }}" class="btn btn-sm btn-primary">Add Skills</a>
        </div>
        @endif
      </div>

      <!-- Recent Applications -->
      <div class="section-card">
        <div class="section-header">
          <h5 class="mb-0"><i class="fi-file-text me-2 text-info"></i>Recent Applications</h5>
          <a href="{{ route('user.job') }}" class="btn btn-sm btn-outline-primary">View All</a>
        </div>
        @if(count($recentApplications) > 0)
        @foreach($recentApplications as $application)
        <div class="activity-item">
          <div class="activity-dot" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);"></div>
          <div class="flex-grow-1">
            <h6 class="mb-1">{{ $application->job->job_title ?? 'Job Application' }}</h6>
            <p class="text-muted small mb-0">Applied {{ $application->created_at->diffForHumans() }}</p>
          </div>
          <span class="badge bg-{{ $application->status == 'accepted' ? 'success' : ($application->status == 'rejected' ? 'danger' : 'warning') }} bg-opacity-10 text-{{ $application->status == 'accepted' ? 'success' : ($application->status == 'rejected' ? 'danger' : 'warning') }}">
            {{ ucfirst($application->status ?? 'Pending') }}
          </span>
        </div>
        @endforeach
        @else
        <div class="empty-state py-4">
          <i class="fi-file-text d-block"></i>
          <p class="mb-2">No applications yet</p>
          <a href="{{ route('index.jobs') }}" class="btn btn-sm btn-primary">Browse Jobs</a>
        </div>
        @endif
      </div>
    </div>

    <!-- Right Column -->
    <div class="col-lg-4">
      <!-- Profile Completeness -->
      <div class="section-card mb-4 text-center">
        <h5 class="mb-4"><i class="fi-trending-up me-2 text-success"></i>Profile Strength</h5>
        <div class="progress-ring mx-auto mb-3" style="--progress: {{ $profileCompleteness }};">
          <svg width="120" height="120">
            <circle class="bg" cx="60" cy="60" r="54"></circle>
            <circle class="progress" cx="60" cy="60" r="54"></circle>
          </svg>
          <span class="percentage">{{ round($profileCompleteness) }}%</span>
        </div>
        <p class="text-muted small mb-3">
          @if($profileCompleteness < 50)
            Complete your profile to attract more opportunities!
            @elseif($profileCompleteness < 80)
            Great progress! Add more details to stand out.
            @else
            Excellent! Your profile is highly complete.
            @endif
            </p>
            <div class="d-flex justify-content-center gap-3 small">
              <span><i class="fi-graduation-cap me-1"></i>{{ $educationCount }} Education</span>
              <span><i class="fi-briefcase me-1"></i>{{ $experienceCount }} Experience</span>
            </div>
      </div>

      <!-- Availability Status -->
      <div class="section-card mb-4">
        <div class="section-header">
          <h5 class="mb-0"><i class="fi-clock me-2 text-primary"></i>Availability</h5>
          <a href="{{ route('user.profile') }}" class="text-primary small">Edit</a>
        </div>
        <div class="d-flex align-items-center p-3 rounded-3" style="background: linear-gradient(135deg, rgba(102, 126, 234, 0.1) 0%, rgba(118, 75, 162, 0.1) 100%);">
          <div class="rounded-circle bg-success me-3" style="width: 12px; height: 12px;"></div>
          <span class="fw-medium">{{ Auth::user()->availability ?? 'Not Set' }}</span>
        </div>
      </div>

      <!-- Gallery Preview -->
      <div class="section-card">
        <div class="section-header">
          <h5 class="mb-0"><i class="fi-image me-2 text-warning"></i>Gallery</h5>
          <a href="{{ route('user.profile.gallery') }}" class="text-primary small">View All</a>
        </div>
        @if($galleryImages->count() > 0)
        <div class="gallery-preview">
          @foreach($galleryImages->take(6) as $image)
          <div class="gallery-item">
            <a href="{{ asset($image->images) }}" data-glightbox data-gallery="gallery">
              <img src="{{ asset($image->images) }}" alt="Gallery Image">
            </a>
          </div>
          @endforeach
        </div>
        @if($galleryImages->count() > 6)
        <p class="text-center text-muted small mt-3 mb-0">+{{ $galleryImages->count() - 6 }} more images</p>
        @endif
        @else
        <div class="empty-state py-3">
          <i class="fi-image d-block"></i>
          <p class="small mb-2">Showcase your work</p>
          <a href="{{ route('user.profile.gallery') }}" class="btn btn-sm btn-outline-primary">Add Images</a>
        </div>
        @endif
      </div>
    </div>
  </div>
</div>

<!-- Profile Incomplete Modal -->
<div class="modal fade" id="profileModal" tabindex="-1" aria-labelledby="profileModalLabel" aria-hidden="true" data-bs-backdrop="static">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content border-0 shadow-lg">
      <div class="modal-body text-center py-5">
        <div class="mb-4">
          <img src="{{ asset('asset/rb_51232.png') }}" alt="Welcome" style="width: 150px; height: 150px; object-fit: contain;">
        </div>
        <h4 class="mb-3">🎉 Welcome to SwiftEdge VA!</h4>
        <p class="text-muted mb-4">
          Complete your profile to unlock the full potential of our platform.
          Stand out to recruiters and land your dream remote job!
        </p>
        <div class="d-flex gap-3 justify-content-center">
          <a href="{{ route('user.profile') }}" class="btn btn-primary px-4">
            <i class="fi-edit me-2"></i>Complete Profile
          </a>
        </div>
      </div>
    </div>
  </div>
</div>


<!-- SVG Gradient Definition for Progress Ring -->
<svg width="0" height="0">
  <defs>
    <linearGradient id="gradient" x1="0%" y1="0%" x2="100%" y2="0%">
      <stop offset="0%" stop-color="#667eea" />
      <stop offset="100%" stop-color="#764ba2" />
    </linearGradient>
  </defs>
</svg>

<script>
  document.addEventListener('DOMContentLoaded', function() {
    const identity = "{{ $identity }}";
    if (!identity) {
      const profileModal = new bootstrap.Modal(document.getElementById('profileModal'));
      profileModal.show();
    }
  });
</script>

@endsection