@extends('home.layouts.content')
@section('content')
    <!-- Start Page Banner Area -->
    <div class="page-banner-area item-bg-three">
        <div class="d-table">
            <div class="d-table-cell">
                <div class="container">
                    <div class="page-banner-content">
                        <h2>APPLY FOR JOB</h2>
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

                <h3> APPLY FOR THIS JOB</h3>

                @foreach($result as $row)
                    <h3>{{$row->job_title}}</h3>

                @endforeach

                @include('shared.util.job_form')

        </div>
    </div>
    <!-- End About Area -->

@endsection
