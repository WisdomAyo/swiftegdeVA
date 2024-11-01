
@extends('home.layouts.content')
@section('content')
    <!-- Start Page Banner Area -->
    <div class="page-banner-area item-bg-three">
        <div class="d-table">
            <div class="d-table-cell">
                <div class="container">
                    <div class="page-banner-content">
                        <h2>Job Listing</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Page Banner Area -->

    <!-- Start Job List Area -->
    <div class="job-list-area ptb-100">
        <div class="container">
            <div class="section-title">
                <h2>Discover Latest Jobs</h2>
                <p>Find jobs that match your skill set and start applying now.</p>
            </div>

            <div class="row">

                @foreach($employers_job as $row)
                    @include('shared.util.job_search')
                @endforeach

            </div>
        </div>
    </div>
    <!-- End Job List Area -->

@endsection
