@extends('home.layouts.content')
@section('content')

    <div class="page-banner-area item-bg-three">
        <div class="d-table">
            <div class="d-table-cell">
                <div class="container">
                    <div class="page-banner-content">
                        <h2>Blue Collar Staffing Solutions </h2>
                    </div>
                </div>
            </div>
        </div>
    </div>


<!-- End Page Banner Area -->


<div class="job-seeker-area pt-100 pb-75" style="background-color: #F5F5F5;">
    <div class="container">
        <div class="col-lg-12 col-md-12">
            <div class="mobile-app-content left-content">
                <h4>Are you an Employer or Job Seeker ? Find a great match as an Employer or Job-seeker.</h4>

                <ul class="mobile-app-btn-list">
                    <li><a href="{{route('index.staffing.employer')}}" class="playstote-btn">Employer? Request Now <i class="ri-google-play-line"></i></a>
                    </li>
                    <li><a href="{{route('index.register.artisan')}}" class="applestore-btn">Job-Seeker? Apply Now <i class="ri-app-store-line"></i></a></li>
                </ul>

            </div>
        </div>
    </div>
</div>


<!-- Start Job Seeker Area -->
<div class="job-seeker-area pt-100 pb-75">
    <div class="container">
        <div class="section-title">
            <h2>How it works for Employers</h2>

        </div>

        <div class="row justify-content-center">

            <div class="col-lg-4 col-md-6">
                <div class="single-job-seeker-card" style="max-width: 100% !important;padding-bottom: 125px !important;">
                    <span>Step 1</span>
                    <h3>Create your free employer dashboard.</h3><br />
                        <p>All you need is your email address to create your dashboard and start posting your jobs.</p>
                </div>

            </div>

            <div class="col-lg-4 col-md-6">
                <div class="single-job-seeker-card" style="max-width: 100% !important;padding-bottom: 100px !important;">
                    <span>Step 2</span>
                    <h3>Build your job post</h3><br />
                       <p>Then just add a job title, description, location, and proposed salary/wages to your job post. Our team will review your job post, approve it and you're ready to go</p>
                </div>
            </div>


            <div class="col-lg-4 col-md-6">
                <div class="single-job-seeker-card" style="max-width: 100% !important;padding-bottom: 40px !important;">
                    <span>Step 3</span>
                    <h3>Start Receiving your screened candidates.</h3><br />
                       <p>We will  use our job matching tools to start screening candidates that match your exact requirements. Successfully screened candidates will be assigned to your dashboard. Start inviting candidates for your interview.</p>

                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Job Seeker Area -->


<!-- Start Job Seeker Area -->
<div class="job-seeker-area pt-100 pb-75">
    <div class="container">
        <div class="section-title">
            <h2>How it works for Job Seekers</h2>

        </div>

        <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6">
                <div class="single-job-seeker-card">
                    <div class="seeker-image">
                        <img src="{{asset('assets/images/job-seeker/seeker-1.png')}}" alt="image" style="width: 40%">
                    </div>
                    <h3>Fill our online form for free and automatically create a CV that employers love.</h3>

                    <div class="step">Step 1</div>
                </div>

                <div class="seeker-arrow-icon">
                    <img src="{{asset('assets/images/job-seeker/layer-1.png')}}" alt="image">
                </div>
            </div>

            <div class="col-lg-4 col-md-6">
                <div class="single-job-seeker-card">
                    <div class="seeker-image">
                        <img src="{{asset('assets/images/job-seeker/seeker-2.png')}}" alt="image"style="width: 40%">
                    </div>
                    <h3>We will call you on phone for first interview. If you wow us on phone, you will be invited to our office for the second interview.</h3>

                    <div class="step">Step 2</div>
                </div>

                <div class="seeker-arrow-icon">
                    <img src="{{asset('assets/images/job-seeker/layer-2.png')}}" alt="image">
                </div>
            </div>

            <div class="col-lg-4 col-md-6">
                <div class="single-job-seeker-card">
                    <div class="seeker-image">
                        <img src="{{asset('assets/images/job-seeker/seeker-3.png')}}" alt="image" style="width: 40%">
                    </div>
                    <h3>We will shedule you for your final interview with prospective employers..</h3>

                    <div class="step">Step 3</div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Job Seeker Area -->

<div class="section-title">
    <h2>OUR GUARANTEE</h2>
    <p>We extend to our clients a free replacement guarantee on all candidates who are successfully hired through our platform should a hired candidate leaves his/her employment for any reason in the first 3 months. SwiftedgeVA will conduct a new search to replace the candidate at no extra cost.</p>

</div>


<div class="section-title">
    <h2>AWARDS</h2>
    <p class="mbr-text mbr-fonts-style display-7">
        SwiftedgeVA is a winner of the prestigious MEA Markets Awards as the Best Blue-collar Recruitment Platform in Nigeria. <br>
        <a class="readmore" href="https://www.mea-markets.com/winners/artisan-oga-ltd/">
            Read more
        </a></p>

</div>
@endsection
