@extends('home.layouts.content')
@section('content')

    <br/><br/>
    @foreach($user as $row)
        <div id="apus-main-content">
            <section class="freelancer_single_layout freelancer-detail-version-v2">
                <section id="primary" class="content-area inner">
                    <div id="main" class="site-main content" role="main">
                        <div class="single-listing-wrapper freelancer" data-latitude="40.719842982477104" data-longitude="-73.96004443216296">

                            <article id="post-4098" class="freelancer-single v2 post-4098 freelancer type-freelancer status-publish has-post-thumbnail hentry location-los-angeles freelancer_category-business freelancer_category-digital-marketing freelancer_tag-creative freelancer_tag-figma freelancer_tag-prototyping">
                                <div class="freelancer-detail-header">
                                    <div class="service-detail-breadcrumbs">
                                        <div class="container d-md-flex align-items-center">
                                            <div class="left-column">
                                                <div class="breadcrumbs-simple">
                                                    <div class="container">
                                                        <ol class="breadcrumb">
                                                            <li><a href="#">Home</a></li>
                                                            <li>
                                                                <a href="#">Freelancers</a>
                                                            </li>
                                                            <li><span class="active">{{$row->full_name}}</span></li>
                                                        </ol>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="freelancer-content-area container">

                                    @if(session('error'))
                                        <div class="notification-alert-danger alert alert-danger alert-dismissible fade show" role="alert">
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

                                    <!-- Main content -->
                                    <div class="row content-single-freelancer content-service-detail">
                                        <div class="col-12 list-content-freelancer list-content-service col-lg-8">
                                            <div class="content-main-service content-main-freelancer">

                                                <div class="freelancer-detail-header mt-0">
                                                    <div class="header-detail-freelancer v2">
                                                        <div class="d-flex align-items-center flex-grow-1">
                                                            <div
                                                                class="freelancer-thumbnail flex-shrink-0 position-relative">
                                                                <div class="freelancer-logo d-flex align-items-center">
                                                                    <div class="image-wrapper">

                                                                        @if(!empty($rw->profile_image))
                                                                            <img loading="lazy" decoding="async" width="150" height="150" src="{{asset('profile/photo/'.$rw->user_id.'/'.$rw->profile_image)}}" class="attachment-thumbnail size-thumbnail" alt="" srcset="{{asset('profile/photo/'.$rw->user_id.'/'.$rw->profile_image)}} 150w, {{asset('profile/photo/'.$rw->user_id.'/'.$rw->profile_image)}} 300w, {{asset('profile/photo/'.$rw->user_id.'/'.$rw->profile_image)}} 410w, {{asset('profile/photo/'.$rw->user_id.'/'.$rw->profile_image)}} 420w" sizes="(max-width: 150px) 100vw, 150px" />
                                                                        @else
                                                                            <img  width="100" height="100" src="{{asset('icon_02.jpeg')}}" alt="image" />
                                                                        @endif

                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="freelancer-information flex-grow-1">
                                                                <div class="d-flex freelancer-detail-title-wrapper">
                                                                    <h1 class="freelancer-detail-title">
                                                                        {{$row->full_name}}
                                                                    </h1>
                                                                    <span class="flex-shrink-0"></span>
                                                                </div>
                                                                <div class="freelancer-job">
                                                                    {{$row->business_category}}
                                                                </div>
                                                                <div
                                                                    class="service-metas-detail d-flex flex-wrap align-items-center">
                                                                    <div class="d-none d-sm-block">
                                                                        <div class="rating-reviews">
                                                                            <i class="fa fa-star"></i>
                                                                            <span class="rating text-link">4.0</span>
                                                                            <span class="text">(1 Review)</span></div>
                                                                    </div>
                                                                    <div class="freelancer-location with-icon">
                                                                        <i class="flaticon-place"></i>
                                                                        {{$row->street_address. ",".$row->city.",".$row->state}}
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="freelancer-detail-detail service-detail-detail">
                                                    <ul class="list-service-detail column-4 d-flex align-items-center flex-wrap">

                                                        <li>
                                                            <div class="icon">
                                                                <i class="flaticon-target"></i>
                                                            </div>
                                                            <div class="details">
                                                                <div class="text">Project Success</div>
                                                                <div class="value">0</div>
                                                            </div>
                                                        </li>

                                                        <li>
                                                            <div class="icon">
                                                                <i class="flaticon-goal"></i>
                                                            </div>
                                                            <div class="details">
                                                                <div class="text">Total Service</div>
                                                                <div class="value">2</div>
                                                            </div>
                                                        </li>

                                                        <li>
                                                            <div class="icon">
                                                                <i class="flaticon-target"></i>
                                                            </div>
                                                            <div class="details">
                                                                <div class="text">Completed Service</div>
                                                                <div class="value">0</div>
                                                            </div>
                                                        </li>



                                                    </ul>


                                                </div>
                                                <div id="job-freelancer-description"
                                                     class="job-detail-description box-detail">
                                                    <h3 class="title">About Freelancer</h3>
                                                    <div class="inner">
                                                        {{$row->service_description}}
                                                    </div>
                                                </div>


                                                <div id="job-freelancer-education"
                                                     class="freelancer-detail-education my_resume_eduarea">
                                                    <h4 class="title">Education</h4>

                                                    @foreach($education as $rw)
                                                        <div class="content">
                                                            <div class="circle">
                                                                B
                                                            </div>
                                                            <div class="top-info">
                                                                <span class="year">{{$rw->year}}</span>
                                                                <span class="edu_stats">{{$rw->title}}</span>
                                                            </div>
                                                            <div class="edu_center">
                                                                <span class="university">{{$rw->purpose}}</span>
                                                            </div>
                                                            <p class="mb0">{{$rw->desc}}</p>
                                                        </div>
                                                    @endforeach


                                                </div>

                                                <div id="job-freelancer-experience"
                                                     class="freelancer-detail-experience my_resume_eduarea">
                                                    <h4 class="title">Work &amp; Experience</h4>
                                                    @foreach($experience as $exp)
                                                        <div class="content">
                                                            <div class="circle">
                                                                D
                                                            </div>
                                                            <div class="top-info">
                                                        <span class="year">
                                                            {{$row->year}}
                                                        </span>
                                                                <span class="edu_stats">{{$row->title}}</span>
                                                            </div>
                                                            <div class="edu_center">
                                                                <span class="university">{{$row->purpose}}</span>
                                                            </div>
                                                            <p>{{$row->desc}}</p>
                                                        </div>
                                                    @endforeach


                                                </div>

                                                <div id="job-freelancer-award" class="my_resume_eduarea color-award">
                                                    <h4 class="title">Awards</h4>

                                                    @foreach($awards as $row)
                                                        <div class="content">
                                                            <div class="circle">
                                                                B
                                                            </div>
                                                            <div class="top-info">
                                                                <span class="year">{{$row->year}}</span>
                                                                <span class="edu_stats">{{$row->title}}</span>
                                                            </div>
                                                            <div class="mb0"> {{$row->desc}}</div>
                                                        </div>
                                                    @endforeach

                                                    <!-- Review -->
                                                    <div id="reviews">

                                                        <div class="box-info-white max-780">

                                                            <h3 class="title">1 Review</h3>

                                                            <div class="d-md-flex align-items-center">
                                                                <div class="detail-average-rating flex-column d-flex align-items-center justify-content-center">
                                                                    <div class="average-value">5.0</div>
                                                                    <div class="average-star">
                                                                        <div class="review-stars-rated-wrapper">
                                                                            <div class="review-stars-rated">
                                                                                <ul class="review-stars">
                                                                                    <li><span class="fa fa-star"></span></li>
                                                                                    <li><span class="fa fa-star"></span></li>
                                                                                    <li><span class="fa fa-star"></span></li>
                                                                                    <li><span class="fa fa-star"></span></li>
                                                                                    <li><span class="fa fa-star"></span></li>
                                                                                </ul>

                                                                                <ul class="review-stars filled"  style="width: 100%" >
                                                                                    <li><span class="fa fa-star"></span></li>
                                                                                    <li><span class="fa fa-star"></span></li>
                                                                                    <li><span class="fa fa-star"></span></li>
                                                                                    <li><span class="fa fa-star"></span></li>
                                                                                    <li><span class="fa fa-star"></span></li>
                                                                                </ul>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="total-rating">
                                                                        1 rating				</div>
                                                                </div>

                                                                <div class="detail-rating">
                                                                    <div class="item-rating">
                                                                        <div class="list-rating">

                                                                            <div class="value-content">
                                                                                <div class="list-number">
                                                                                    5 Star								</div>
                                                                                <div class="progress">
                                                                                    <div class="progress-bar progress-bar-success" style="width: 100%">
                                                                                    </div>
                                                                                </div>
                                                                                <div class="value">
                                                                                    100%								</div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="item-rating">
                                                                        <div class="list-rating">

                                                                            <div class="value-content">
                                                                                <div class="list-number">
                                                                                    4 Star
                                                                                </div>
                                                                                <div class="progress">
                                                                                    <div class="progress-bar progress-bar-success" style="width: 0%">
                                                                                    </div>
                                                                                </div>
                                                                                <div class="value">
                                                                                    0%
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="item-rating">
                                                                        <div class="list-rating">

                                                                            <div class="value-content">
                                                                                <div class="list-number">
                                                                                    3 Star
                                                                                </div>
                                                                                <div class="progress">
                                                                                    <div class="progress-bar progress-bar-success" style="width: 0%">
                                                                                    </div>
                                                                                </div>
                                                                                <div class="value">
                                                                                    0%
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="item-rating">
                                                                        <div class="list-rating">

                                                                            <div class="value-content">
                                                                                <div class="list-number">
                                                                                    2 Star								</div>
                                                                                <div class="progress">
                                                                                    <div class="progress-bar progress-bar-success" style="width: 0%">
                                                                                    </div>
                                                                                </div>
                                                                                <div class="value">
                                                                                    0%
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="item-rating">
                                                                        <div class="list-rating">

                                                                            <div class="value-content">
                                                                                <div class="list-number">
                                                                                    1 Star								</div>
                                                                                <div class="progress">
                                                                                    <div class="progress-bar progress-bar-success" style="width: 0%">
                                                                                    </div>
                                                                                </div>
                                                                                <div class="value">
                                                                                    0%
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div id="comments">

                                                            <ol class="comment-list">
                                                                @foreach($reviews as $review)
                                                                <li class="comment even thread-even depth-1" id="li-comment-41">

                                                                    <div id="comment-41" class="the-comment ">
                                                                        <div class="avatar">
                                                                            <img alt='' src='http://2.gravatar.com/avatar/?s=80&amp;d=mm&amp;r=g' srcset='http://2.gravatar.com/avatar/?s=160&#038;d=mm&#038;r=g 2x' class='avatar avatar-80 photo avatar-default' height='80' width='80' decoding='async'/>		</div>
                                                                        <div class="comment-box">
                                                                            <div class="clearfix">
                                                                                <div class="name-comment">
                                                                                    {{$review->full_name}}
                                                                                </div>
                                                                                <div class="meta d-flex align-items-center">
                                                                                    <div class="star-rating" title="Rated 5 out of 5">
                                                                                        <span class="review-avg">
                                                                                            <i class="fa fa-star"></i>{{$review->rating}}.0</span>
                                                                                    </div>
                                                                                    <div class="date">
                                                                                        {{$review->created_at}}
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div itemprop="description" class="comment-text">
                                                                            <p>{{$review->review}}</p>
                                                                        </div>
                                                                    </div></li><!-- #comment-## -->
                                                                @endforeach
                                                            </ol>


                                                        </div>

                                                        @if(isset(Auth::user()->id) && (Auth::user()->is_admin == 0))

                                                        <div id="review_form_wrapper" class="commentform ">
                                                            <div id="review_form">
                                                                <div class="commentform reset-button-default">
                                                                    <div class="clearfix">
                                                                        <div id="respond" class="comment-respond">
                                                                            <h4 class="title comment-reply-title">Add a review</h4>
                                                                            <form action="{{route('freelancer.review.save')}}" method="post" id="commentform" enctype="multipart/form-data" class="comment-form" novalidate>
                                                                                {{ csrf_field() }}
                                                                                <div class="choose-rating clearfix">
                                                                                    <div class="choose-rating-inner row">
                                                                                        <div class="col-sm-12 col-xs-12"><div class="form-group yourview">
                                                                                                <div class="your-rating">Your Rating for this listing</div>
                                                                                                <div class="wrapper-rating-form">
                                                                                                    <div class="comment-form-rating">
                                                                                                        <ul class="review-stars">
                                                                                                            <li><span class="fa fa-star"></span></li>
                                                                                                            <li><span class="fa fa-star"></span></li>
                                                                                                            <li><span class="fa fa-star"></span></li>
                                                                                                            <li><span class="fa fa-star"></span></li>
                                                                                                            <li><span class="fa fa-star"></span></li>
                                                                                                        </ul>
                                                                                                        <ul class="review-stars filled">
                                                                                                            <li><span class="fa fa-star"></span></li>
                                                                                                            <li><span class="fa fa-star"></span></li>
                                                                                                            <li><span class="fa fa-star"></span></li>
                                                                                                            <li><span class="fa fa-star"></span></li>
                                                                                                            <li><span class="fa fa-star"></span></li>
                                                                                                        </ul>
                                                                                                        <input type="hidden" name="rating" id="_input_rating">
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="group-upload-preview clearfix"></div>
                                                                                <div class="form-group space-30"><label>Your Comment</label>
                                                                                    <textarea id="comment" class="form-control" placeholder="Comment" name="review" cols="45" rows="5" aria-required="true" required></textarea></div>
                                                                                <div class="row">
                                                                                    <div class="col-12 col-sm-6">
                                                                                        <div class="form-group"><label>Your Name</label>
                                                                                            <input id="author" placeholder="Name" class="form-control" name="author" type="text" value="" size="30" aria-required="true"/>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-12 col-sm-6">
                                                                                        <div class="form-group"><label>Your Email</label>
                                                                                            <input id="email" placeholder="Email" class="form-control" name="email" type="text" value="" size="30" aria-required="true"/>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <p class="comment-form-cookies-consent">
                                                                                    <input id="wp-comment-cookies-consent" name="wp-comment-cookies-consent" type="checkbox" value="yes"/>
                                                                                    <label for="wp-comment-cookies-consent">Save my name, email, and website in this browser for the next time I comment.</label></p>
                                                                                <p class="form-submit">
                                                                                    <input type="hidden" value="{{$row->id}}" name="user_id"/>
                                                                                    <input name="submit" type="submit" id="submit" class="btn btn-theme btn-inverse" value="Submit Review"/>
                                                                                </p>
                                                                            </form>
                                                                        </div><!-- #respond -->
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        @endif
                                                    </div>


                                                </div>


                                            </div>
                                        </div>
                                        <div class="sidebar-wrapper sidebar-service col-lg-4 col-12 d-none d-lg-block">
                                            <aside class="sidebar sidebar-listing-detail sidebar-right sticky-top">
                                                <aside class="widget widget_apus_freelancer_info">
                                                    <div class="freelancer-info-detail ">
                                                        <div class="freelancer-salary-wrapper">
                                                            <span class="woocommerce-Price-amount amount"><bdi><span
                                                                        class="woocommerce-Price-currencySymbol">₦</span><span
                                                                        class="price-text">{{$row->min_amount}}</span></bdi></span> -
                                                            <span class="woocommerce-Price-amount amount"><bdi><span
                                                                        class="woocommerce-Price-currencySymbol">₦</span><span
                                                                        class="price-text">{{$row->max_amount}}</span></bdi></span> / hr
                                                        </div>
                                                        <ul class="list-freelancer-info">


                                                            <li>
                                                                <div class="icon">
                                                                    <i class="flaticon-place"></i>
                                                                </div>
                                                                <div class="details">
                                                                    <div class="text">Location</div>
                                                                    <div class="value">
                                                                        <div class="freelancer-location">
                                                                           {{$row->state}}
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </li>


                                                            <li>
                                                                <div class="icon">
                                                                    <i class="flaticon-document"></i>
                                                                </div>
                                                                <div class="details">
                                                                    <div class="text">Type</div>
                                                                    <div class="value">
                                                                        <div class="freelancer-meta with-icon">

                                                                            <div class="freelancer-meta">

                                                                                Agency Freelancers
                                                                            </div>

                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </li>

                                                            <li>
                                                                <div class="icon">
                                                                    <i class="flaticon-translator"></i>
                                                                </div>
                                                                <div class="details">
                                                                    <div class="text">English Level</div>
                                                                    <div class="value">
                                                                        <div class="freelancer-meta with-icon">

                                                                            <div class="freelancer-meta">

                                                                                Fluent
                                                                            </div>

                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </li>

                                                            <li>
                                                                <div class="icon">
                                                                    <i class="flaticon-mars"></i>
                                                                </div>
                                                                <div class="details">
                                                                    <div class="text">Gender</div>
                                                                    <div class="value">
                                                                        <div class="freelancer-meta with-icon">

                                                                            <div class="freelancer-meta">

                                                                                Male
                                                                            </div>

                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </li>

                                                        </ul>



                                                        <a href="#apus-contact-form-wrapper" class="btn btn-theme btn-inverse btn-service-contact-form btn-show-popup w-100">Contact Me <i class="flaticon-right-up next"></i></a>

                                                        <div id="apus-contact-form-wrapper" class="apus-contact-form mfp-hide" data-effect="fadeIn">
                                                            <a href="javascript:void(0);" class="close-magnific-popup ali-right"><i class="ti-close"></i></a>

                                                            <form method="post" action="{{route('freelancers.now')}}" class="contact-form-wrapper">
                                                                {{ csrf_field() }}
                                                                <div class="row">

                                                                    <div class="col-12">
                                                                        <div class="form-group">
                                                                            <input type="text" class="form-control" name="full_name" placeholder="Your Fill Name" required="required">
                                                                        </div><!-- /.form-group -->
                                                                    </div>
                                                                    <div class="col-12">
                                                                        <div class="form-group">
                                                                            <input type="text" class="form-control" name="subject" placeholder="Subject" required="required">
                                                                        </div><!-- /.form-group -->
                                                                    </div>
                                                                    <div class="col-12">
                                                                        <div class="form-group">
                                                                            <input type="email" class="form-control" name="email" placeholder="E-mail" required="required">
                                                                        </div><!-- /.form-group -->
                                                                    </div>
                                                                    <div class="col-12">
                                                                        <div class="form-group">
                                                                            <input type="text" class="form-control style2" name="phone_number" placeholder="Phone" required="required">
                                                                        </div><!-- /.form-group -->
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <textarea class="form-control" name="message" placeholder="Message" required="required"></textarea>
                                                                </div><!-- /.form-group -->


                                                                <input type="hidden" name="freelancer_id" value=" {{$row->id}}">
                                                                <button class="button btn btn-theme btn-block" name="contact-form">Book</button>
                                                            </form>

                                                        </div>
                                                    </div>
                                                </aside>
                                                <aside class="widget widget_apus_freelancer_tags"><h2
                                                        class="widget-title"><span>My Skills</span></h2>
                                                    <div class="freelancer-detail-tags">
                                                        <div class="freelancer-tags">

                                                            @foreach($skills as $skill)
                                                                <a class="tag-freelancer"
                                                                   href="#">{{$skill->title}}</a>
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                </aside>
                                            </aside>
                                        </div>

                                    </div>

                                </div>
                            </article><!-- #post-## -->

                        </div>

                    </div><!-- .site-main -->
                </section><!-- .content-area -->
            </section>
        </div>
    @endforeach
@endsection
