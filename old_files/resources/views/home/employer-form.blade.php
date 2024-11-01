@extends('home.layouts.content')
@section('content')
    <!-- Start Page Banner Area -->

    <div class="page-banner-area item-bg-three">
        <div class="d-table">
            <div class="d-table-cell">
                <div class="container">
                    <div class="page-banner-content">
                        <h2>STAFFING SOLUTION</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Page Banner Area -->

    <!-- Start About Area -->
    <div class="about-area pt-100 center post-a-new-job-box">
        <div class="container col-lg-8">

            @if(session('error'))
                <div class="notification-alert-danger alert alert-danger alert-dismissible fade show" role="alert">
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
            <div class="post-a-new-job-box">
                <h3>STAFFING SOLUTION</h3>

                <form method="post" action="{{ route('index.staffing.employer.save')}}" enctype="multipart/form-data"
                      style="color:#000000;">
                    {{ csrf_field() }}

                    <div class="form-group">
                        <label>Full Name</label>
                        <input type="text" name="fullname" class="form-control"
                               placeholder="Enter Full Name" required="">
                        @if ($errors->has('fullname'))
                            <div class="alert alert-info">
                                <strong>{{ $errors->first('fullname') }}</strong>
                            </div>
                        @endif
                    </div>

                    <div class="form-group">
                        <label>Email Address</label>
                        <input type="email" name="email" class="form-control" placeholder="E.g; someone@example.com">
                        @if ($errors->has('email'))
                            <div class="alert alert-info">
                                <strong>{{ $errors->first('email') }}</strong>
                            </div>
                        @endif
                    </div>

                    <div class="form-group">
                        <label>Phone Number</label>
                        <input type="number" name="phone" class="form-control" placeholder="E.g; 90 000 000 000"
                               required="">
                         @if ($errors->has('phone'))
                            <div class="alert alert-info">
                                <strong>{{ $errors->first('phone') }}</strong>
                            </div>
                        @endif
                    </div>


                    <div class="form-group">
                        <label>Your Office Title (eg CEO)</label>
                        <input type="text" class="form-control" name="office_title" placeholder="Your Office Title (eg CEO)" required="">

                    </div>


                    <div class="form-group">
                        <div class="row">
                        <div class="col-sm-6 ">
                            <label>State</label>
                            <select name="state" id="state" class="form-control">
                                @foreach ($states as $row)
                                    <option  value="{{ $row->id }}">{{ $row->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-sm-6">
                            <label>State Areas</label>
                            <select name="state_area" class="form-control">
                            </select>

                        </div>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" name="password" placeholder="Enter Password" class="form-control" required="true">
                                @if ($errors->has('password'))
                                    <div class="alert alert-info">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </div>
                                @endif
                            </div>
                        </div>

                        <div class="col-lg-6 form-margin">
                            <div class="form-group">
                                <label>Confirm Password</label>
                                <input type="password" name="password_confirmation" placeholder="Retype Password" required="true" class="form-control">
                                @if ($errors->has('password_confirmation'))
                                    <div class="alert alert-info">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </div>
                                @endif
                            </div>
                        </div>

                    <br>
                        <div onload="disableSubmit()">
                            <input type="checkbox" name="terms" id="terms" onchange="activateButton(this)" required="true" style="width: 30px !important;">  I have read and agree to the <a href="{{route('index.terms')}}" target="_blank" style="color:#397E62 ">terms &amp;
                                conditions</a>
                            <br><br>
                        </div>


                    <div class="job-details-btn-box">
                        <button type="submit" class="default-btn">Request <i class="flaticon-list-1"></i></button>
                    </div>

                        <div>
                            <br />
                            <a href="{{route('login')}}" style="color: orange;">Already Registered ? Log In Now </a>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
    <!-- End About Area -->

@endsection
