@extends('shared.layouts.users')
@section('content')


    <!-- Breadcrumb Area -->
    <div class="breadcrumb-area">
        <h1>New Skill</h1>
        <ol class="breadcrumb">
            <li class="item"><a href="{{route('employer.home')}}">Home</a></li>
            <li class="item"><a href="{{route('employer.job.request')}}">Dashboard</a></li>
            <li class="item">Add New Skill</li>
        </ol>
    </div>
    <!-- End Breadcrumb Area -->

    <!-- Start Post a New Job Area -->
    <div class="post-a-new-job-box">
        <h3>New Skill</h3>

        @if(session('response'))
            <div class="notification-alert alert alert-success alert-dismissible fade show" role="alert">
                {{session('response')}}
                <button type="button" class="close" data-bs-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
        @endif

        <form method="post" action="{{ route('user.skills.save')}}"  enctype="multipart/form-data" style="color:#000000;">
            {{ csrf_field() }}
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="form-group">
                        <label>Title</label>
                        <input type="text" class="form-control" placeholder="Title Here" name="title">
                    </div>
                </div>
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
                    </tr>
                    </thead>

                    <tbody>

                    @foreach($skills as $row)
                        <tr>

                            <td>{{$row->title}}</td>
                        </tr>
                    @endforeach


                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- End Post a New Job Area -->


@endsection
