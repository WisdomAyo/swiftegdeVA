@extends('shared.layouts.users')
@section('content')

    <!-- Breadcrumb Area -->
    <div class="breadcrumb-area">
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
                <button type="button" class="close" data-bs-dismiss="alert" aria-label="Close">
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
    </div>
    <!-- End Manage Jobs Area -->

@endsection
