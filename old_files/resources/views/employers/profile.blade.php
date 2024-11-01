@extends('shared.layouts.users')
@section('content')

    <!-- Breadcrumb Area -->
    <div class="breadcrumb-area">
        <h1>Profile</h1>
        <ol class="breadcrumb">
            <li class="item"><a href="{{'/'}}">Home</a></li>
            <li class="item"><a href="#">Dashboard</a></li>
            <li class="item">Profile</li>
        </ol>
    </div>
    <!-- End Breadcrumb Area -->

    <div class="my-profile-box">
        <h3>Profile Details</h3>

        @if(session('response'))
            <div class="notification-alert alert alert-success alert-dismissible fade show" role="alert">
                {{session('response')}}
                <button type="button" class="close" data-bs-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
        @endif

        <form method="post" action="{{ route('user.basic.profile.update.save')}}"  enctype="multipart/form-data" style="color:#000000;">
            {{ csrf_field() }}
            <div class="row align-items-center">

                <div class="col-xl-6 col-lg-12 col-md-12">
                    <div class="form-group">
                        <label>Your Office Title (eg CEO)</label>
                        <input type="text" class="form-control" placeholder="Your Office Title (eg CEO)" value="{{Auth::user()->business_name}}" name="business_name">
                    </div>
                </div>

                <div class="col-xl-6 col-lg-12 col-md-12">
                    <div class="form-group">
                        <label>Email address</label>
                        <input type="email" class="form-control" placeholder="Email address"  value="{{Auth::user()->email}}" disabled>
                    </div>
                </div>

                <div class="col-xl-6 col-lg-12 col-md-12">
                    <div class="form-group">
                        <label>Phone</label>
                        <input type="text" class="form-control"   value="{{Auth::user()->phone}}" name="phone">
                    </div>
                </div>

                <div class="col-xl-6 col-lg-12 col-md-12">
                    <div class="form-group">
                        <label>Date Of Birth</label>
                        <input type="date" class="form-control"   value="{{Auth::user()->date_of_birth}}" name="date_of_birth">
                    </div>
                </div>

                <div class="col-xl-12 col-lg-12 col-md-12">
                    <div class="form-group">
                        <label>Website</label>
                        <input type="text" class="form-control" placeholder="Website"  value="{{Auth::user()->website_address}}" name="website_address">
                    </div>
                </div>


                <div class="col-lg-12 col-md-12">
                    <div class="form-group">
                        <label>About Company</label>
                        <textarea cols="30" rows="6" placeholder="Short description about company..." class="form-control" name="service_description">
                            {{Auth::user()->service_description}}

                        </textarea>
                    </div>
                </div>


                <div class="col-xl-6 col-lg-12 col-md-12">
                    <div class="form-group">
                        <label>State</label>
                        <select name="state" id="state" class="form-control">
                            <option  value="{{Auth::user()->state}}">{{Auth::user()->state}}</option>
                            @foreach ($states as $row)
                                <option  value="{{ $row->id }}">{{ $row->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>


                <div class="col-xl-6 col-lg-12 col-md-12">
                    <div class="form-group">
                        <label>State Areas</label>
                        <select name="state_area" class="form-control">
                            <option  value="{{Auth::user()->city}}">{{Auth::user()->city}}</option>
                        </select>

                    </div>
                </div>


                <div class="col-lg-12 col-md-12">
                    <div class="form-group">
                        <label>Address</label>
                        <input type="text" class="form-control"   value="{{Auth::user()->street_address}}" name="street_address">
                    </div>
                </div>


                <div class="col-lg-12 col-md-12">
                    <button type="submit" class="default-btn">Submit Now <i class="flaticon-send"></i></button>
                </div>
            </div>
        </form>
    </div>

@endsection
