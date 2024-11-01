
@extends('shared.layouts.users')
@section('content')
    <!-- Breadcrumb Area -->
    <div class="breadcrumb-area">
        <h1>welcome, {{Auth::user()->firstname}}</h1>
        <ol class="breadcrumb">
            <li class="item"><a href="{{route('user.home')}}">Home</a></li>
            <li class="item">Dashboard</li>
        </ol>
    </div>
    <!-- End Breadcrumb Area -->


    <!-- Start Dashboard Fun Fact Area -->
    <div class="dashboard-fun-fact-area">
        <div class="row">

            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="stats-fun-fact-box">
                    <div class="icon-box">
                        <i class="ri-file-list-line"></i>
                    </div>
                    <span class="sub-title">Availability</span>
                    <h3 style="font-size: 14px !important;">{{Auth::user()->availability}}</h3>
                    <a href="{{route('user.profile')}}"> Edit</a>
                    <br />
                </div>
            </div>


            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="stats-fun-fact-box">
                    <div class="icon-box">
                        <i class="ri-file-list-line"></i>
                    </div>
                    <span class="sub-title">Services</span>
                    <h3>{{$service}}</h3>
                </div>
            </div>


        </div>
    </div>


    <!-- End Dashboard Fun Fact Area -->

@endsection
