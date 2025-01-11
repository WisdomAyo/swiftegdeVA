@extends('shared.layout.user')
@section('content')

    <!-- Breadcrumb Area -->
    {{-- <div class="breadcrumb-area">
        <h1>Jobs</h1>
        <ol class="breadcrumb">
            <li class="item"><a href="dashboard.html">Home</a></li>
            <li class="item"><a href="dashboard.html">Dashboard</a></li>
            <li class="item">Jobs</li>
        </ol>
    </div>
    <!-- End Breadcrumb Area -->

    <!-- Start Manage Jobs Area -->
    <div class="manage-jobs-box">
        <h3>Jobs</h3>

        <div class="manage-jobs-table table-responsive">
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>Job Title</th>
                    <th>Job Description</th>
                    <th>Industry</th>
                    <th>Hire Type</th>
                    <th>Salary</th>


                </tr>
                </thead>

                <tbody>

                @foreach($jobs as $row)
                    <tr>
                        <td>
                            <h5>{{$row->job_title}}</h5>

                        </td>
                        <td><p>{{$row->job_description}}</p></td>
                        <td><p>{{$row->industry}}</p></td>
                        <td><p>{{$row->hire_type}}</p></td>
                        <td>
                            @if(!empty($row->basic_salary) && ($row->basic_salary !== "₦0 - ₦0"))
                              <p>{{$row->basic_salary}}</p>
                            @else
                                <p>Pay Per Job</p>
                            @endif
                        </td>



                    </tr>
                @endforeach


                </tbody>
            </table>
        </div>
    </div>
    <!-- End Manage Jobs Area --> --}}

    <div class="col-lg-9">
        <h1 class="h2 pb-2 pb-lg-3">My Jobs</h1>

    <h3 class="h4 pt-5 mt-md-3 mb-sm-4">Applied Jobs</h3>
    <div class="row g-3 g-xl-4 mb-3 mb-md-4">
        @if($applications->isEmpty())
        <p>You've not applied for any Job</p>
        @else
        @foreach($applications as $application)
      <div class="col-sm-6 col-md-6">
        <div class="card h-100">
          <div class="dropdown position-absolute top-0 end-0 mt-2 me-2">
            <button type="button" class="btn btn-icon btn-sm fs-xl text-dark-emphasis border-0" data-bs-toggle="dropdown" aria-expanded="false" aria-label="Actions">
              <i class="fi-more-vertical"></i>
            </button>
            <ul class="dropdown-menu dropdown-menu-end" style="--fn-dropdown-min-width: 8rem">
              <li>
                <a class="dropdown-item" href="{{ route('job.detail', ['url' => $application->job->url]) }}">
                  <i class="fi-eye opacity-75 me-2"></i>
                  View Job
                </a>
              </li>
            </ul>
          </div>
          
          <div class="card-body pb-2">
            <i class="fi-computer fs-3 text-body-tertiary pb-1 mb-2"></i>
            <h6 class="mb-0"> {{ $application->job->job_title }}</h6>
          </div>
          <div class="card-footer d-flex align-items-center gap-2 bg-transparent border-0 pt-0 pb-4">
            <span class="fs-sm text-body-secondary">{{ $application->job->industry }}</span>
            <span class="badge text-success bg-success-subtle ms-auto">Applied on: {{ $application->created_at->format('M d, Y') }}</span>
          </div>
        </div>
      </div>
      @endforeach
      @endif
      
    </div>
    <div class="nav">
      <a class="nav-link position-relative px-0" href="#!">
        <i class="fi-log-out fs-base me-2"></i>
        <span class="hover-effect-underline stretched-link">Sign out of all sessions</span>
      </a>
    </div>

    </div>



@endsection
