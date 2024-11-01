@extends('shared.layouts.users')
@section('content')


    <!-- Breadcrumb Area -->
    <div class="breadcrumb-area">
        <h1>New Experience</h1>
        <ol class="breadcrumb">
            <li class="item"><a href="{{route('employer.home')}}">Home</a></li>
            <li class="item"><a href="{{route('employer.job.request')}}">Dashboard</a></li>
            <li class="item">Add New Experience</li>
        </ol>
    </div>
    <!-- End Breadcrumb Area -->

    <!-- Start Post a New Job Area -->
    <div class="post-a-new-job-box">
        <h3>New Experience</h3>

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
                        <label>Employer</label>
                        <input type="text" class="form-control" placeholder="Employer Here" name="title">
                    </div>
                </div>

                <div class="col-xl-6 col-lg-12 col-md-12">
                    <div class="form-group">
                        <label>role</label>
                        <input type="text" class="form-control" placeholder="Role" name="role">
                    </div>
                </div>

                <div class="col-xl-3 col-lg-12 col-md-12">
                    <div class="form-group">
                        <label>Start Year</label>
                        <input type="text" class="form-control" placeholder="Start Year" name="start_year">
                    </div>
                </div>

                <div class="col-xl-3 col-lg-12 col-md-12">
                    <div class="form-group">
                        <label>End Year</label>
                        <input type="text" class="form-control" placeholder="End Year" name="end_year">
                    </div>
                </div>

                <div class="col-lg-12 col-md-12">
                    <div class="form-group">
                        <label>Description</label>
                        <textarea cols="30" rows="6" placeholder="Short description..." class="form-control" name="service_description"></textarea>
                    </div>
                </div>


                <input type="hidden" name="type" value="experience">
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
                        <th>Title</th>
                        <th>Purpose</th>
                        <th>Year</th>
                    </tr>
                    </thead>

                    <tbody>

                    @foreach($experience as $row)
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
