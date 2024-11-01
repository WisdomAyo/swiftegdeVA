@extends('home.layouts.content')
@section('content')
    <!-- Start Page Banner Area -->
    <div class="page-banner-area item-bg-three">
        <div class="d-table">
            <div class="d-table-cell">
                <div class="container">
                    <div class="page-banner-content">
                        <h2>REQUEST A CALL BACK</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- End Page Banner Area -->

    <div class="contact-area ptb-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-12">
                    <div class="contact-address">
                        <h3>Contact Information</h3>

                        <ul class="address-info">
                            <li>
                                <i class="flaticon-a"></i>
                                Head Office: B7, Obanta Close, Off Ajao Road, Ikeja, Lagos
                            </li>

                            <li>
                                <i class="flaticon-p"></i>
                                <a href="tel:+2347069481591">+234 706 948 1591</a>
                            </li>

                            <li>
                                <i class="flaticon-e"></i>
                                <a href="mailto:info@swiftedgeva.com">info@swiftedgeva.com</a>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="col-lg-8 col-md-12">
                    <div class="contact-form">
                        <h3>Get In Touch</h3>

                        <form action="{{ route('contact.us.now') }}" method="post" class="form contact-us-form">
                            {{ csrf_field() }}
                            <div class="row">
                                <div class="col-lg-6 col-md-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Your Name" required="" data-error="Please enter your name">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>

                                <div class="col-lg-6 col-md-6">
                                    <div class="form-group">
                                        <input type="email" class="form-control" placeholder="Your Email" required="" data-error="Please enter your email">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>

                                <div class="col-lg-6 col-md-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Subject" required="" data-error="Please enter your subject">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>

                                <div class="col-lg-6 col-md-6">
                                    <div class="form-group">
                                        <input type="number" class="form-control" placeholder="Phone No" required="" data-error="Please enter your number">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>

                                <div class="col-lg-12 col-md-12">
                                    <div class="form-group">
                                        <textarea placeholder="Your Comments" class="form-control" required="" data-error="Write your message"></textarea>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>

                                <div class="col-lg-12 col-md-12">
                                    <p class="form-cookies-consent">
                                        <input type="checkbox" id="test1">
                                        <label for="test1">I Accept All <a href="{{route('index.terms')}}">Terms &amp; Conditions</a></label>
                                    </p>
                                </div>

                                <div class="col-lg-12 col-md-12">
                                    <button type="submit" class="default-btn disabled" style="pointer-events: all; cursor: pointer;">Send Message <i class="flaticon-send"></i></button>

                                    <div id="msgSubmit" class="h3 text-center hidden"></div>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>


        </div>
    </div>
    <!-- End About Area -->

@endsection
