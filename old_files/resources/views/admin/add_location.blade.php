@extends('admin.content')
@section('content')


    <!-- Breadcrumb Area -->
    <div class="breadcrumb-area">
        <h1>Add Location</h1>
        <ol class="breadcrumb">
            <li class="item"><a href="{{route('admin.home')}}">Home</a></li>
            <li class="item"><a href="">Dashboard</a></li>
            <li class="item">Business Category</li>
        </ol>
    </div>
    <!-- End Breadcrumb Area -->

    <!-- Start Post a New Job Area -->
    <div class="post-a-new-job-box">
        <h3>Add State Location</h3>


        @if(session('error'))
            <div class="notification-alert alert alert-danger alert-dismissible fade show" role="alert">
                {{session('error')}}
                <button type="button" class="close" data-bs-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
        @endif

        @if(session('response'))
            <div class="notification-alert alert alert-success alert-dismissible fade show" role="alert">
                {{session('response')}}
                <button type="button" class="close" data-bs-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
        @endif

        <form method="post" action="{{ route('admin.add.location.save')}}"  enctype="multipart/form-data" style="color:#000000;">
            {{ csrf_field() }}
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="form-group">
                        <label>State Name</label>
                        <input type="text" class="form-control" placeholder="State Name" name="cat_name">
                    </div>
                </div>


                <div class="col-lg-12 col-md-12">
                    <button type="submit" class="default-btn">Submit<i class="flaticon-send"></i></button>
                </div>
            </div>
        </form>
    </div>


    <div class="post-a-new-job-box">

        <h3>Add State Area Location</h3>

        <form method="post" action="{{ route('admin.add.location.save')}}"  enctype="multipart/form-data" style="color:#000000;">
            {{ csrf_field() }}
            <div class="row">

                <div class="col-lg-12 col-md-12">
                    <div class="form-group">
                        <select name="category_id" class="form-control">
                            <option>Select State</option>
                              @foreach($state as $row)
                                <option value="{{$row->id}}">{{$row->name}}</option>
                                @endforeach
                        </select>
                    </div>
                </div>

                <div class="col-lg-12 col-md-12">
                    <div class="form-group">
                        <label>State Area Name</label>
                        <input type="text" class="form-control" placeholder="State Area Name" name="cat_name">
                    </div>
                </div>


                <div class="col-lg-12 col-md-12">
                    <button type="submit" class="default-btn">Submit<i class="flaticon-send"></i></button>
                </div>
            </div>
        </form>
    </div>
    <!-- End Post a New Job Area -->


@endsection
