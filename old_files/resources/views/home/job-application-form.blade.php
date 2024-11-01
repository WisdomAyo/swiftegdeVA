@extends('home.layouts.content')
@section('content')
    <!-- Start Page Banner Area -->
    <div class="page-banner-area item-bg-three">
        <div class="d-table">
            <div class="d-table-cell">
                <div class="container">
                    <div class="page-banner-content">
                        <h2>STAFFING SOLUTION </h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Page Banner Area -->

    <!-- Start About Area -->
    <div class="about-area pt-100 center post-a-new-job-box">
        <div class="container col-lg-8">

            @if(session('response'))

                <div class="notification-alert alert alert-success alert-dismissible fade show" role="alert">
                    {{session('response')}}
                    <button type="button" class="close" data-bs-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
            @endif

            <div class="post-a-new-job-box">
                <h3> APPLY FOR A JOB</h3>
                    @include('shared.util.job_form')
            </div>
        </div>
    </div>
    <!-- End About Area -->

@endsection
