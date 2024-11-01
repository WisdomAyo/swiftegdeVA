@extends('admin.content')
@section('content')


    <!-- Breadcrumb Area -->
    <div class="breadcrumb-area">
        <h1>All Applicant</h1>
        <ol class="breadcrumb">
            <li class="item"><a href="{{route('admin.home')}}">Home</a></li>
            <li class="item"><a href="">Dashboard</a></li>
            <li class="item">All Applicant</li>
        </ol>
    </div>
    <!-- End Breadcrumb Area -->

    <div class="all-applicants-box">
        <h2>Recent Applicants</h2>

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

        <div class="row">
            @foreach($job_applicant as $row)

                @include('shared.util.applicant')

            @endforeach
        </div>
    </div>



@endsection
