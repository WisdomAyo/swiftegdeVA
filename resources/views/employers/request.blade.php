@extends('shared.layouts.users')
@section('content')


    <!-- Breadcrumb Area -->
    <div class="breadcrumb-area">
        <h1>All Applicants</h1>
        <ol class="breadcrumb">
            <li class="item"><a href="#">Home</a></li>
            <li class="item"><a href="#">Dashboard</a></li>
            <li class="item">All Assigned Applicants</li>
        </ol>
    </div>
    <!-- End Breadcrumb Area -->

    <!-- Start Applicants Area -->
    <div class="all-applicants-box">
        <h2>All Assigned Applicants</h2>

        <div class="row">

            @foreach($service as $row)

                @include('shared.util.applicant')

            @endforeach

        </div>
    </div>
    <!-- Start Applicants Area -->

@endsection
