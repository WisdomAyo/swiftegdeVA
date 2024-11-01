@extends('shared.layouts.users')
@section('content')


    <!-- Breadcrumb Area -->
    <div class="breadcrumb-area">
        <h1>New Education</h1>
        <ol class="breadcrumb">
            <li class="item"><a href="{{route('employer.home')}}">Home</a></li>
            <li class="item"><a href="{{route('employer.job.request')}}">Dashboard</a></li>
            <li class="item">Add New Education</li>
        </ol>
    </div>
    <!-- End Breadcrumb Area -->

    <!-- Start Post a New Job Area -->
    <div class="post-a-new-job-box">
        <h3>New Education</h3>

        @if(session('response'))
            <div class="notification-alert alert alert-success alert-dismissible fade show" role="alert">
                {{session('response')}}
                <button type="button" class="close" data-bs-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
        @endif

        <form method="post" action="{{ route('user.additional.profile.update.save')}}"  enctype="multipart/form-data" style="color:#000000;">
            {{ csrf_field() }}
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="form-group">
                        <label>School Name</label>
                        <input type="text" class="form-control" placeholder="School Name" name="title">
                    </div>
                </div>

                <div class="col-xl-6 col-lg-12 col-md-12">
                    <div class="form-group">
                        <label>Course Name</label>
                        <input type="text" class="form-control" placeholder="Course Name" name="course_name">
                    </div>
                </div>

                <div class="col-xl-6 col-lg-12 col-md-12">
                    <div class="form-group">
                        <label>Year</label>
                        <input type="text" class="form-control" placeholder="Year" name="year">
                    </div>
                </div>

                <div class="col-lg-12 col-md-12">
                    <div class="form-group">
                        <label>Certificate Obtained (Eg: HND, BSc, Diploma, etc)</label>
                        <input class="form-control" name="service_description" placeholder="Certificate Obtained (Eg: HND, BSc, Diploma, etc)" />
                    </div>
                </div>

                <input type="hidden" name="type" value="education">

                <div class="col-lg-12 col-md-12">
                    <button type="submit" class="default-btn">Submit <i class="flaticon-send"></i></button>
                </div>
            </div>
        </form>

        <div class="manage-jobs-box">
            <div class="manage-jobs-table table-responsive">
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th>School Name</th>
                        <th>Course Name</th>
                        <th>Year</th>
                    </tr>
                    </thead>

                    <tbody>

                    @foreach($education as $row)
                        <tr>

                            <td>{{$row->title}}</td>
                            <td>{{$row->purpose}}</td>
                            <td>{{$row->year}}</td>

                            <td>
                                <ul class="option-list">
                                    <li><button class="option-btn d-inline-block" data-bs-toggle="tooltip" data-bs-placement="top" title="View Aplication" type="button"><i class="ri-eye-line"></i></button></li>
                                    <li><button class="option-btn d-inline-block" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete Aplication" type="button"><i class="ri-delete-bin-line"></i></button></li>
                                </ul>
                            </td>
                        </tr>
                    @endforeach


                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- End Post a New Job Area -->


@endsection
