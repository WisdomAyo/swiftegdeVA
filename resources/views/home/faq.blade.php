@extends('home.layouts.content')
@section('content')
    <!-- Start Page Banner Area -->

    <div class="page-banner-area item-bg-three">
        <div class="d-table">
            <div class="d-table-cell">
                <div class="container">
                    <div class="page-banner-content">
                        <h2>FAQ </h2>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- End Page Banner Area -->

    <!-- Start FAQ Area -->
    <div class="faq-area ptb-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-12">
                    <div class="faq-box-content">
                        <h3>Frequently Asked Questions</h3>


                        <form class="faq-search-form">
                            <div class="form-group">
                                <label><i class="flaticon-edit"></i></label>
                                <input class="form-control" type="text" placeholder="Keywords">
                            </div>

                            <div class="search-btn">
                                <button type="submit"><i class="ri-search-line"></i></button>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="col-lg-8 col-md-12">
                    <div class="faq-accordion">
                        <div class="accordion" id="FaqAccordion">
                            <div class="accordion-item">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                   1. What is SwiftedgeVA?
                                </button>
                                <div id="collapseOne" class="accordion-collapse collapse show"
                                     data-bs-parent="#FaqAccordion">
                                    <div class="accordion-body">
                                        <p>SwiftedgeVA is an online recruitment platform that connects screened blue-collar job seekers to jobs in Nigeria.</p>
                                    </div>
                                </div>
                            </div>

                            <div class="accordion-item">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                   2. As an employer, how fast can I get the screened candidates for my interview?
                                </button>
                                <div id="collapseTwo" class="accordion-collapse collapse"
                                     data-bs-parent="#FaqAccordion">
                                    <div class="accordion-body">
                                        <p>It takes three (3) to five (5) working days for our recruitment team to screen applicants for your job role(s). After which the shortlisted candidates are assigned to your account and are ready for your interview.</p>
                                    </div>
                                </div>
                            </div>

                            <div class="accordion-item">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseThree" aria-expanded="false"
                                        aria-controls="collapseThree">
                                    3. How many screened applicants do I get to hire for each vacancy?
                                </button>
                                <div id="collapseThree" class="accordion-collapse collapse"
                                     data-bs-parent="#FaqAccordion">
                                    <div class="accordion-body">
                                        <p>You get 3 candidates.</p>
                                    </div>
                                </div>
                            </div>


                            <div class="accordion-item">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseFour" aria-expanded="false"
                                        aria-controls="collapseFour">
                                    4. Can I get more screened candidates to interview if I’m unable to hire from the first set of screened candidates?
                                </button>
                                <div id="collapseFour" class="accordion-collapse collapse"
                                     data-bs-parent="#FaqAccordion">
                                    <div class="accordion-body">
                                        Yes. In such cases, you can apply for a rework by sending an email to our support team. Rework is free.
                                    </div>
                                </div>
                            </div>

                            <div class="accordion-item">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseFive" aria-expanded="false"
                                        aria-controls="collapseFive">
                                    5. Can I post a job for free?
                                </button>
                                <div id="collapseFive" class="accordion-collapse collapse"
                                     data-bs-parent="#FaqAccordion">
                                    <div class="accordion-body">
                                        Yes, job posting is free but payment is required before candidates are screened and assigned to you for an interview
                                    </div>
                                </div>
                            </div>


                            <div class="accordion-item">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
                                    6.How are the candidates screened?
                                </button>
                                <div id="collapseSix" class="accordion-collapse collapse"
                                     data-bs-parent="#FaqAccordion">
                                    <div class="accordion-body">
                                        We evaluate applicants by scanning resumes and selecting suitable candidates to match your job descriptions based on their educational qualifications, experience, skill sets and more.
                                    </div>
                                </div>
                            </div>

                            <div class="accordion-item">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseSeven" aria-expanded="false" aria-controls="collapseSeven">
                                    7.How do I create an employer account with SwiftedgeVA?
                                </button>
                                <div id="collapseSeven" class="accordion-collapse collapse"
                                     data-bs-parent="#FaqAccordion">
                                    <div class="accordion-body">Creating an account with SwiftedgeVA is simple. You can start by posting your first job including your email address to create your employer account.
                                    </div>
                                </div>
                            </div>


                            <div class="accordion-item">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseEight" aria-expanded="false" aria-controls="collapseEight">
                                    8. I want to hire more than 10 people, do you have any bulk-hiring plans?
                                </button>
                                <div id="collapseEight" class="accordion-collapse collapse"
                                     data-bs-parent="#FaqAccordion">
                                    <div class="accordion-body">
                                        a.Yes, we offer bulk-hiring plans at discounted prices.
                                    </div>
                                </div>
                            </div>


                            <div class="accordion-item">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseNine" aria-expanded="false" aria-controls="collapseNine">
                                    9.Are your services available nationwide?
                                </button>
                                <div id="collapseNine" class="accordion-collapse collapse"
                                     data-bs-parent="#FaqAccordion">
                                    <div class="accordion-body">
                                        Yes. Our services are available in all the 36 states of Nigeria including Abuja FCT.
                                    </div>
                                </div>
                            </div>

                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Start FAQ Area -->
@endsection
