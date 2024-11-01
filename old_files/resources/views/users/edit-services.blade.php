@extends('shared.layouts.users')
@section('content')


    <!-- Breadcrumb Area -->
    <div class="breadcrumb-area">
        <h1>Update Service</h1>
        <ol class="breadcrumb">
            <li class="item"><a href="{{route('employer.home')}}">Home</a></li>
            <li class="item"><a href="{{route('employer.job.request')}}">Dashboard</a></li>
            <li class="item">Update Service</li>
        </ol>
    </div>
    <!-- End Breadcrumb Area -->

    <!-- Start Post a New Job Area -->
    <div class="post-a-new-job-box">
        <h3>Update Service</h3>

        @if(session('response'))
            <div class="notification-alert alert alert-success alert-dismissible fade show" role="alert">
                {{session('response')}}
                <button type="button" class="close" data-bs-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
        @endif

        @foreach($service as $rp)
        <form method="post" action="{{ route('user.service.update')}}"  enctype="multipart/form-data" style="color:#000000;">
            {{ csrf_field() }}
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="form-group">
                        <label>Service Title</label>
                        <input type="text" class="form-control" placeholder="Service Title Here" name="service_title" value="{{$rp->title}}">
                    </div>
                </div>

                <div class="col-lg-12 col-md-12">
                    <div class="form-group">
                        <label>Service Description</label>
                        <textarea cols="30" rows="6" placeholder="Short description..." class="form-control" name="service_description">
                            {{$rp->service_description}}
                        </textarea>
                    </div>
                </div>


                <div class="col-xl-12 col-lg-12 col-md-12">
                    <div class="form-group">
                        <label>Business Category</label>
                        <select name="business_category" class="form-control" required="true">
                            <option>{{$rp->business_category}}</option>
                            @foreach($category as $row)
                                <option value="{{$row->title}}">{{$row->title}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="col-lg-6 col-md-12">
                    <div class="form-group">
                        <label>Amount </label>
                        <input type="text" class="form-control" placeholder="Amount" name="cost" value="{{$rp->cost}}">
                    </div>
                </div>

                <div class="col-lg-6 col-md-12">
                    <div class="form-group">
                        <label>Amount Per Service</label>
                        <select name="per_service" class="form-control" required="true">
                            <option> {{$rp->per_service}}</option>
                            <option>Per Day</option>
                            <option>Per Hour</option>
                            <option>Per Week</option>
                            <option>Per Month</option>
                        </select>

                    </div>
                </div>


                <div class="col-xl-12 col-lg-12 col-md-12">
                    <div class="form-group">
                        <label>Experience</label>
                        <textarea type="text" class="form-control" placeholder="Experience" name="experience">
                            {{$rp->experience}}
                        </textarea>
                    </div>
                </div>



                <div class="col-lg-12 col-md-12">
                    <input type="hidden" name="id" value="{{$rp->id}}">
                    <button type="submit" class="default-btn">Submit <i class="flaticon-send"></i></button>
                </div>
            </div>
        </form>

        @endforeach
    </div>
    <!-- End Post a New Job Area -->


@endsection
