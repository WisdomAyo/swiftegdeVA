
@extends('shared.layouts.admin')
@section('content')
    <!-- Breadcrumb Area -->
    <div class="breadcrumb-area">
        <h1>welcome, {{Auth::user()->firstname}}</h1>
        <ol class="breadcrumb">
            <li class="item"><a href="{{route('admin.home')}}">Home</a></li>
            <li class="item">Dashboard</li>
        </ol>
    </div>
    <!-- End Breadcrumb Area -->


    <!-- Start Dashboard Fun Fact Area -->
    <div class="dashboard-fun-fact-area">
        <div class="row">
            <div class="col">
                <div class="stats-fun-fact-box">
                    <div class="icon-box">
                        <i class="ri-briefcase-line"></i>
                    </div>
                    <span class="sub-title">Freelancers</span>
                    <h3>{{$freelancer}}</h3>
                </div>
            </div>

            <div class="col">
                <div class="stats-fun-fact-box">
                    <div class="icon-box">
                        <i class="ri-file-list-line"></i>
                    </div>
                    <span class="sub-title">Requests</span>
                    <h3>{{$request}}</h3>
                </div>
            </div>

            <div class="col">
                <div class="stats-fun-fact-box">
                    <div class="icon-box">
                        <i class="ri-bookmark-line"></i>
                    </div>
                    <span class="sub-title">Services</span>
                    <h3>{{$service}}</h3>
                </div>
            </div>
            <div class="col">
                <div class="stats-fun-fact-box">
                    <div class="icon-box">
                        <i class="ri-bookmark-line"></i>
                    </div>
                    <span class="sub-title">Special Booking</span>
                    <h3>{{$special_booking}}</h3>
                </div>
            </div>
            <div class="col">
                <div class="stats-fun-fact-box">
                    <div class="icon-box">
                        <i class="ri-bookmark-line"></i>
                    </div>
                    <span class="sub-title">Freelancer Request</span>
                    <h3>{{$freelancer_request}}</h3>
                </div>
            </div>
        </div>

    </div>

@endsection
