@extends('shared.layouts.users')
@section('content')


    <!-- Breadcrumb Area -->
    <div class="breadcrumb-area">
        <h1>Work Picture</h1>
        <ol class="breadcrumb">
            <li class="item"><a href="{{route('employer.home')}}">Home</a></li>
            <li class="item"><a href="{{route('employer.job.request')}}">Dashboard</a></li>
            <li class="item">Add Work Picture</li>
        </ol>
    </div>
    <!-- End Breadcrumb Area -->

    <!-- Start Post a New Job Area -->
    <div class="post-a-new-job-box">


        @if(session('response'))
            <div class="notification-alert alert alert-success alert-dismissible fade show" role="alert">
                {{session('response')}}
                <button type="button" class="close" data-bs-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
        @endif

        <form method="post" action="{{ route('user.profile.gallery.save')}}"  enctype="multipart/form-data" style="color:#000000;">
            {{ csrf_field() }}
            <div class="row">


                <div class="col-lg-12 col-md-12">
                    <div class="form-group">
                        <label>Work Picture </label>
                        <input type="file" class="form-control" placeholder="Service Title Here"  multiple name="post_image1[]">
                        <input type="hidden" name="home" value="home">
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
                    <th>Image</th>
                    <th>Action</th>
                </tr>
                </thead>

                <tbody>

                @foreach($gallery as $row)
                    <tr>
                        <td>
                            <img src="{{asset('profile/gallery/'.$row->user_id.'/'.$row->images)}}" width="50px" alt="image">
                        </td>

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
