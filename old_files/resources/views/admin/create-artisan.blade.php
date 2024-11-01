@extends('admin.content')
@section('content')


    <!-- Breadcrumb Area -->
    <div class="breadcrumb-area">
        <h1>Create Artisan</h1>
        <ol class="breadcrumb">
            <li class="item"><a href="{{route('admin.home')}}">Home</a></li>
            <li class="item"><a href="">Dashboard</a></li>
            <li class="item">Create Artisan</li>
        </ol>
    </div>
    <!-- End Breadcrumb Area -->

    <!-- Start Post a New Job Area -->
    <div class="post-a-new-job-box">
        <h3>Create Artisan</h3>


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

        <form method="post" action="{{route('admin.register.artisan')}}" enctype="multipart/form-data"  role="form">
            {{ csrf_field() }}
            <h4>YOUR PERSONAL DETAILS</h4>
            <input type="hidden" name="Role" value="Artisan" class="form-control" required="false">

            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="form-group">
                        <label>FullName</label>
                        <input type="text" name="fullname" placeholder="Enter FirstName and Last Name" class="form-control" required="true">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-6">
                    <div class="form-group">
                        <label>Email Address</label>
                        <input type="email" name="email" placeholder="Enter Email Address: someone@example.com" class="form-control " required="true">
                    </div>
                </div>
                <div class="col-lg-6 form-margin">
                    <div class="form-group">
                        <label>Confirm Email Address</label>
                        <input type="text" name="email2" placeholder="Re-Enter Email Address: someone@example.com" required="false" class="form-control">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-4">
                    <div class="form-group">
                        <label>Password</label>

                        <input type="password" name="password" placeholder="Enter Password" class="form-control" required="true">
                    </div>
                </div>

                <div class="col-lg-4 form-margin">
                    <div class="form-group">
                        <label>Confirm Password</label>
                        <input type="password" name="password_confirmation" placeholder="Retype Password" required="true" class="form-control">
                    </div>
                </div>

                <div class="col-lg-4 form-margin">
                    <div class="form-group">
                        <label>Phone</label>
                        <input type="tel" name="phone" placeholder="Enter Phone Number" required="true" class="form-control">
                    </div>
                </div>
            </div>
            <div class="col-lg-12 form-margin">
                <div class="form-group">
                    <label>Date Of Birth</label>
                    <input type="text" name="DateOfBirth" required="true" class="form-control">
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 form-margin">
                    <div class="form-group">
                        <label>Street Address</label>
                        <input type="text" name="StreetAddress" placeholder="Street Address" required="true" class="form-control">
                    </div>
                </div>
                <div class="col-lg-4 form-margin">
                    <div class="form-group">
                        <label>State</label>
                        <select name="state" id="state" class="form-control">
                            @foreach ($states as $row)
                                <option  value="{{ $row->id }}">{{ $row->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>


                <div class="col-lg-4 form-margin">
                    <div class="form-group">
                        <label>State Areas</label>
                        <select name="state_area" class="form-control">
                        </select>

                    </div>
                </div>


            </div>

                <div class="col-lg-12 col-md-12">
                    <div class="form-group">
                        <label>Years of Experience</label>
                        <input type="number" name="WorkExperience" placeholder="Years of Experience"
                               class="form-control" required="true">
                    </div>
                </div>
                <div class="col-lg-12 col-md-12">
                    <div class="form-group">
                        <label>Business Category</label>
                        <select name="BusinessCategory" class="form-control" required="true">
                            <option>--Select Business Category--</option>
                            @foreach($category as $row)
                                <option value="{{$row->title}}">{{$row->title}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="col-lg-12 col-md-12">
                    <div class="form-group">
                        <label>Business Name</label>
                        <input type="text" name="Title" placeholder="Business Name" required="true"
                               class="form-control">
                    </div>
                </div>

                <div class="col-lg-12 col-md-12">
                    <div class="form-group">
                        <label>Website Address (Optional)</label>
                        <input type="url" name="WebsiteAddress" placeholder="Website Address (Optional)"
                               class="form-control">
                    </div>
                </div>

                <div class="col-lg-12 col-md-12">
                    <div class="form-group">
                        <label>Service Description</label>
                        <textarea name="ServiceDescription" required="true" class="form-control" row="10" col="10"
                                  placeholder="Describe your Service"></textarea>
                    </div>
                </div>

            <button type="submit" class="default-btn">CREATE <i class="flaticon-send"></i></button>

        </form>
    </div>




@endsection
