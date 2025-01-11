@extends('shared.layout.employer')
@section('content')

    <!-- Breadcrumb Area -->
    {{-- <div class="breadcrumb-area">
        <h1>Jobs</h1>
        <ol class="breadcrumb">
            <li class="item"><a href="#">Home</a></li>
            <li class="item"><a href="#">Dashboard</a></li>
            <li class="item">Jobs</li>
        </ol>
    </div>
    <!-- End Breadcrumb Area -->

    <!-- Start Manage Jobs Area -->
    <div class="manage-jobs-box">

        @if(session('response'))
            <div class="notification-alert alert alert-success alert-dismissible fade show" role="alert">
                {{session('response')}}
                <button type="button" class="btn btn-primary" data-bs-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
        @endif

        <div class="others-options d-flex align-items-center">
            <div class="option-item">
                <a href="{{route('employer.job.request')}}" class="default-btn">Post A Job <i class="flaticon-plus"></i></a>
            </div>
        </div>
        <br />
        <div class="manage-jobs-table table-responsive">
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>Job Title</th>
                    <th>Company Name</th>
                    <th>Qualification</th>
                    <th>Type</th>
                    <th>Status</th>
                    <th>Application Deadline </th>
                    <th>Date Created</th>
                    <th>Action</th>
                </tr>
                </thead>

                <tbody>

                @foreach($jobs as $row)
                    <tr>
                        <td><span>{{$row->job_title}}</span></td>
                        <td><span>{{$row->industry}}</span></td>
                        <td><span>{{$row->level_of_education}}</span></td>
                        <td><span>{{$row->hire_type}}</span></td>
                        <td>@if($row->status == 1)
                                <span>Active</span>
                                @else
                            <span>InActive</span>
                                @endif

                        </td>
                        <td><span>{{$row->application_deadline}}</span></td>
                        <td><span>{{$row->created_at}}</span></td>
                        <td>
                            <ul class="option-list">
                                <li><a href="{{url('employer/jobs/request/'.$row->id)}}" class="option-btn d-inline-block" ><i class="ri-eye-line"></i></a></li>
                                <li>
                                    <form action="{{route("delete.exe")}}" method="post" class="login" onclick="return confirm('Are you sure?')">
                                        {{ csrf_field() }}
                                        <input type="hidden" name="id" value="{{$row->id}}"  />
                                        <input type="hidden" name="type" value="employers_job"  />
                                        <button class="option-btn d-inline-block" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete Aplication" type="submit">
                                            <i class="ri-delete-bin-line"></i>
                                        </button>
                                    </form>

                                </li>
                            </ul>
                        </td>

                    </tr>
                @endforeach


                </tbody>
            </table>
        </div>
    </div> --}}
    <!-- End Manage Jobs Area -->



    <div class="col-lg-9">


        <div class="d-flex align-items-center gap-2 gap-sm-3 pb-3 mb-2">

            <div class="nav ms-auto">
              <a class="nav-link fw-normal p-0" href="{{route('employer.job.request')}}">
                <button type="submit" class="btn btn-primary w-100">Create Job</button>
              </a>
            </div>

          </div>


        <!-- Grid of items -->
        <div class="vstack gap-4">


            @if ($jobs->isEmpty())

            <p>You've not Post any Job yet kindly post a Job</p>
                
            @else
          <!-- Listing -->
          @foreach($jobs as $row)
          <article class="card hover-effect-scale bg-body-tertiary border-0 overflow-hidden">
            <div class="row g-0">
              <div class="col-sm-3 position-relative bg-body-secondary overflow-hidden" style="min-height: 120px">
                <div class="d-flex flex-column gap-2 align-items-start position-absolute top-0 start-0 z-1 pt-1 pt-sm-0 ps-1 ps-sm-0 mt-2 mt-sm-3 ms-2 ms-sm-3">
                  <span class="badge text-bg-info d-inline-flex align-items-center">
                    Verified
                    <i class="fi-shield ms-1"></i>
                  </span>
                  <span class="badge text-bg-warning">Used</span>
                </div>
                <img src="{{ asset($row->employer->company_logo) }}" class="hover-effect-target position-absolute bottom-0 start-0 w-50  object-fit-cover" alt="Image">
              </div>
              <div class="col-sm-9 py-md-2">
                <div class="card-body pb-3 pb-md-4">
                  <div class="d-flex align-items-center justify-content-between mb-2">
                    <div class="fs-xs text-body-secondary me-3">{{$row->industry}}</div>
                    <div class="d-flex gap-2 position-relative z-2">

                      <span class="badge text-bg-info d-inline-flex align-items-center">
                        @if($row->status == 1)
                        <span>Active</span>
                        @else
                    <span>InActive</span>
                        @endif
                        <i class="fi-shield ms-1"></i>
                      </span>
                      <a href="{{url('employer/jobs/request/'.$row->id)}}" type="button" class="btn btn-icon btn-sm btn-outline-secondary animate-shake rounded-circle" data-bs-toggle="tooltip" data-bs-custom-class="tooltip-sm" title="Edit" aria-label="Notify">
                        <i class="fi-edit animate-target fs-sm"></i>
                      </a>
                      <form action="{{route("delete.exe")}}" method="post" class="login" onclick="return confirm('Are you sure?')">
                        {{ csrf_field() }}
                        <input type="hidden" name="id" value="{{$row->id}}"  />
                        <input type="hidden" name="type" value="employers_job"  />
                      <button type="submit" class="btn btn-icon btn-sm btn-outline-secondary animate-rotate rounded-circle" data-bs-toggle="tooltip" data-bs-custom-class="tooltip-sm" title="Compare" aria-label="Compare">
                        <i class="fi-trash animate-target fs-sm"></i>
                      </button>
                      </form>

                      <button type="button" class="btn btn-outline-primary btn-sm">View Applicant</button>
                    </div>
                  </div>
                  <h3 class="h5 mb-2">
                    <a class="hover-effect-underline stretched-link me-1" href="single-entry-cars.html">{{$row->job_title}}</a>
                    <span class="fs-sm fw-normal text-body-secondary">(2019)</span>
                  </h3>
                  <div class="h6 mb-0">{{$row->level_of_education}}</div>
                  <p class="fs-sm pt-2 mt-1 mb-0">This SUV combines robust power with sophisticated design, offering advanced safety features and all-terrain capability.</p>
                </div>
                <div class="card-footer bg-transparent border-0 pt-0 pb-4">
                  <div class="d-flex flex-wrap justify-content-between gap-3 border-top fs-sm text-nowrap pt-3 pt-md-4">
                    <div class="d-flex align-items-center gap-2">
                      <i class="fi-map-pin">{{$row->country_id}} </i>
                      {{$row->hire_type}}
                    </div>
                  
                    <div class="d-flex align-items-center gap-2">
                      <i class=""> Application Deadline:</i>
                      {{$row->application_deadline}}
                    </div>
                    <div class="d-flex align-items-center gap-2">
                      <i class="">Posted:</i>
                      {{ $row->created_at->diffForHumans() }}
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </article>
        @endforeach
        @endif
        </div>

        <!-- Pagination -->

      </div>

@endsection
