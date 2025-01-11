@extends('home.layouts.content')
@section('content')

    <br />
    <br />



    <div id="apus-main-content"><section class="service-detail-version-v1">

            <section id="primary" class="content-area inner">
                <div id="main" class="site-main content" role="main">



                    <div class="single-listing-wrapper service" data-latitude="34.01747866833639" data-longitude="-118.25982593444947" data-img="{{asset('assets/service5-495x370.jpg')}}" data-logo="{{asset('assets/service5-495x370.jpg')}}">

                        <article id="post-5549" class="service-single post-5549 service type-service status-publish has-post-thumbnail hentry location-los-angeles service_category-design-creative service_category-development-it">

                            <!-- heading -->


                            <div class="service-detail-header v1">
                                <div class="service-detail-breadcrumbs">
                                    <div class="container d-md-flex align-items-center">
                                        <div class="left-column">
                                            <div class="breadcrumbs-simple">
                                                <div class="container">
                                                    <ol class="breadcrumb">
                                                        <li><a href="{{url('/')}}">Home</a>  </li>
                                                        <li><a href="#">Services</a></li>
                                                        <li><span class="active">{{$service->title}}</span></li>
                                                    </ol>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="right-column ms-auto">
                                            <div class="apus-social-share share-listing position-relative">
                                                <div class="d-flex align-items-center">
                                                    <span class="icon-share"><i class="flaticon-share"></i></span>
                                                    <h6 class="share-title">
                                                        Share		</h6>
                                                </div>
                                                <div class="bo-social-icons">


                                                    <a class="facebook" href="https://www.facebook.com/sharer.php?s=100&amp;u=#" target="_blank" title="Share on facebook">
                                                        <i class="fab fa-facebook-f"></i>
                                                    </a>

                                                    <a class="twitter" href="https://twitter.com/intent/tweet?url=#" target="_blank" title="Share on Twitter">
                                                        <i class="fab fa-twitter"></i>
                                                    </a>


                                                    <a class="linkedin" href="https://linkedin.com/shareArticle?mini=true&amp;url=#" target="_blank" title="Share on LinkedIn">
                                                        <i class="fab fa-linkedin-in"></i>
                                                    </a>



                                                    <a class="pinterest" href="https://pinterest.com/pin/create/button/?url=#" target="_blank" title="Share on Pinterest">
                                                        <i class="fab fa-pinterest-p"></i>
                                                    </a>

                                                </div>
                                            </div>
                                            <a href="javascript:void(0)" class="btn-add-service-favorite" data-service_id="5549" data-nonce="3aa7ad7e72" data-bs-toggle="tooltip" title="Add Favorite"
                                            >
                                                <i class="flaticon-like"></i>
                                                <span>Save</span>
                                            </a>

                                        </div>
                                    </div>
                                </div>

                                <div class="header-detail-service" >
                                    <div class="container">

                                        <div class="info-detail-service">
                                            <div class="title-wrapper d-flex">
                                                <h1 class="service-detail-title">{{$service->title}}</h1>
                                                <span class="flex-shrink-0"></span>
                                            </div>
                                            <div class="service-metas-detail d-flex align-items-center flex-wrap">

                                                <div class="service-author">
                                                    <a href="{{url('user/'.$profile->identity)}}">
                                                        <div class="freelancer-logo d-flex align-items-center">
                                                            <div class="image-wrapper">

                                                                @if(!empty($profile->profile_image))
                                                                    <img decoding="async" width="150" height="150"
                                                                         src="{{asset('profile/photo/'.$profile->id.'/'.$profile->profile_image)}}"
                                                                         class="attachment-thumbnail size-thumbnail"
                                                                         alt=""
                                                                         srcset="{{asset('profile/photo/'.$profile->id.'/'.$profile->profile_image)}}"
                                                                         sizes="(max-width: 150px) 100vw, 150px">
                                                                @else

                                                                    <img decoding="async" width="150" height="150"
                                                                         src="{{asset('icon_02.jpeg')}}"
                                                                         class="attachment-thumbnail size-thumbnail"
                                                                         alt=""
                                                                         srcset="{{asset('icon_02.jpeg')}}"
                                                                         sizes="(max-width: 150px) 100vw, 150px">

                                                                @endif


                                                            </div>
                                                        </div>
                                                        <span class="text">
                                                            {{$profile->full_name}}
                                                        </span>
                                                    </a>
                                                </div>

                                                <div class="rating-reviews">
                                                    <i class="fa fa-star"></i>
                                                    <span class="rating">{{\App\Helpers\CommonHelpers::rating($service->id)}}.0</span>
                                                    <span class="text">({{\App\Models\ServiceRating::query()->where('service_id', $service->id)->count()}} Reviews)</span>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="service-content-area container">
                                <!-- Main content -->
                                <div class="row content-service-detail">
                                    <div class="list-content-service col-12 col-lg-8">
                                        <div class="content-main-service">


                                            <div class="service-detail-detail">
                                                <ul class="list-service-detail d-flex align-items-center flex-wrap">
                                                    <li>
                                                        <div class="icon">
                                                            <i class="flaticon-calendar"></i>
                                                        </div>
                                                        <div class="details">
                                                            <div class="text">Delivery Time</div>
                                                            <div class="value">
                                                                2 Days
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="icon">
                                                            <i class="flaticon-goal"></i>
                                                        </div>
                                                        <div class="details">
                                                            <div class="text">English level</div>
                                                            <div class="value">
                                                                Professional
                                                            </div>
                                                        </div>
                                                    </li>

                                                    <li>
                                                        <div class="icon">
                                                            <i class="flaticon-tracking"></i>
                                                        </div>
                                                        <div class="details">
                                                            <div class="text">Location</div>
                                                            <div class="value">
                                                                <div class="service-location">
                                                                   {{$service->location}}
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>

                                                </ul>
                                            </div>



                                            <div class="property-detail-gallery gallery-listing">
                                                <div class="gallery-listing-main">
                                                    <div class="slick-carousel slick-carousel-gallery-main" data-carousel="slick" data-items="1" data-large="1" data-medium="1" data-small="1" data-smallest="1" data-pagination="false" data-nav="true" data-autoplay="false" data-slickparent="true">


                                                        <div class="item">
                                                            <a href="#" data-elementor-lightbox-slideshow="freeio-gallery" class="p-popup-image">
                                                                <div class="image-wrapper">

                                                                    @if(!empty($service->feature_image))
                                                                        <img fetchpriority="high"  decoding="async"width="900" height="500"  src="{{asset('artisan_services/photo/'.$service->user_id.'/'.$service->feature_image)}}" class="attachment-freeio-gallery size-freeio-gallery">
                                                                    @else

                                                                        <a href="#"><img src="{{asset('icon_02.jpeg')}}" alt="image"></a>
                                                                    @endif

                                                                </div>
                                                            </a>
                                                        </div>



                                                    </div>
                                                </div>
                                                <div class="slick-carousel slick-carousel-gallery-thumbs d-none d-md-block" data-carousel="slick" data-items="6" data-large="5" data-medium="4" data-small="3" data-smallest="2" data-pagination="false" data-nav="false" data-autoplay="false" data-asnavfor=".slick-carousel-gallery-main" data-slidestoscroll="1" data-focusonselect="true">
                                                    <div class="item">
                                                        <div class="image-wrapper">

                                                            @if(!empty($service->feature_image))
                                                                <img loading="lazy" width="150" height="150" src="{{asset('artisan_services/photo/'.$service->user_id.'/'.$service->feature_image)}}" class="attachment-thumbnail size-thumbnail">
                                                            @else

                                                                <a href="#"><img src="{{asset('icon_02.jpeg')}}" alt="image"></a>
                                                            @endif

                                                        </div>
                                                    </div>

                                                </div>


                                            </div>
                                            <!-- service description -->
                                            <div class="service-detail-description">
                                                <h3 class="title">Service Description</h3>
                                               <p>{!! $service->service_description !!}</p>
                                            </div>


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
                                                                            5 Star
                                                                        </div>
                                                                        <div class="progress">
                                                                            <div class="progress-bar progress-bar-success" style="width: 100%">
                                                                            </div>
                                                                        </div>
                                                                        <div class="value">
                                                                            100%
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="item-rating">
                                                                <div class="list-rating">

                                                                    <div class="value-content">
                                                                        <div class="list-number">
                                                                            4 Star								</div>
                                                                        <div class="progress">
                                                                            <div class="progress-bar progress-bar-success" style="width: 0%">
                                                                            </div>
                                                                        </div>
                                                                        <div class="value">
                                                                            0%								</div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="item-rating">
                                                                <div class="list-rating">

                                                                    <div class="value-content">
                                                                        <div class="list-number">
                                                                            3 Star								</div>
                                                                        <div class="progress">
                                                                            <div class="progress-bar progress-bar-success" style="width: 0%">
                                                                            </div>
                                                                        </div>
                                                                        <div class="value">
                                                                            0%								</div>
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
                                                                            0%								</div>
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
                                                                            0%								</div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div id="comments">

                                                    <ol class="comment-list">

                                                            <li class="comment even thread-even depth-1" id="li-comment-41">
                                                        @foreach($reviews as $review)
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
                                                                        <form action="{{route('index.review.save')}}" method="post" id="commentform" enctype="multipart/form-data" class="comment-form" novalidate>
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
                                                                                <input type="hidden" value="{{$service->user_id}}" name="user_id"/>
                                                                                <input type="hidden" value="{{$service->id}}" name="service_id"/>
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

                                    <div class="sidebar-wrapper sidebar-service col-lg-4 col-12 d-none d-lg-block">
                                        <aside class="sidebar-listing-detail sidebar sidebar-right sticky-top">
                                            <aside class="widget widget_apus_service_price">
                                                <div class="service-price">

                                                    <form id="service-add-to-cart-5549_nxlxK" class="service-add-to-cart" method="post">
                                                        <div class="service-price-inner">
                                                            <span class="woocommerce-Price-amount amount">
                                                                <bdi>

                                                                    <span class="price-text">{{$service->price_text}}</span></bdi>
                                                            </span>
                                                        </div>


                                                        @if(\Illuminate\Support\Facades\Auth::user())
                                                            @if(Auth::user()->id == $service->user_id)
                                                                <a class="btn btn-theme btn-inverse w-100"  href="{{url('user.dashboard.course.all')}}">View</a>
                                                            @else

                                                                <a class="btn btn-theme btn-inverse w-100" href="{{url('user/payment/course/'.$service->user_id)}}">Buy Now</a>

                                                            @endif
                                                        @else
                                                            <a class="btn btn-theme btn-inverse w-100" href="{{url('account/login')}}">Buy Now</a>

                                                        @endif

                                                    </form>


                                                </div>
                                            </aside>



                                            <aside class="widget widget_apus_service_author">
                                                <h2 class="widget-title">
                                                    <span>About The Seller</span>
                                                </h2>
                                                <div class="widget-service-author">
                                                    <div class="service-author-heading d-flex align-items-center">
                                                        <div class="service-author-image flex-shrink-0">
                                                            <a href="{{url('/user/'.$profile->identity)}}">
                                                                <div class="freelancer-logo d-flex align-items-center">
                                                                    <div class="image-wrapper">

                                                                        @if(!empty($profile->profile_image))
                                                                            <img decoding="async" width="150" height="150"
                                                                                 src="{{asset('profile/photo/'.$profile->id.'/'.$profile->profile_image)}}"
                                                                                 class="attachment-thumbnail size-thumbnail"
                                                                                 alt=""
                                                                                 srcset="{{asset('profile/photo/'.$profile->id.'/'.$profile->profile_image)}}"
                                                                                 sizes="(max-width: 150px) 100vw, 150px">
                                                                        @else

                                                                            <img decoding="async" width="150" height="150"
                                                                                 src="{{asset('icon_02.jpeg')}}"
                                                                                 class="attachment-thumbnail size-thumbnail"
                                                                                 alt=""
                                                                                 srcset="{{asset('icon_02.jpeg')}}"
                                                                                 sizes="(max-width: 150px) 100vw, 150px">

                                                                        @endif

                                                                    </div>
                                                                </div>
                                                            </a>
                                                        </div>
                                                        <div class="service-author-right flex-grow-1">
                                                            <h5><a href="{{url('/user/'.$profile->identity)}}">
                                                                   {{$profile->full_name}}
                                                                </a>
                                                            </h5>
                                                            <!-- job -->
                                                            <div class="freelancer-job">
                                                               {{$profile->business_category}}
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="metas">
                                                        <div class="freelancer-location with-title"><strong>Location:</strong>
                                                            {{$service->location}}
                                                        </div>

                                                    </div>

                                                    <a href="#apus-contact-form-wrapper" class="btn btn-theme btn-outline w-100 btn-service-contact-form btn-show-popup">Contact Me <i class="flaticon-right-up next"></i></a>
                                                </div>
                                                <div id="apus-contact-form-wrapper" class="apus-contact-form mfp-hide apus-popup-form" data-effect="fadeIn">

                                                    <a href="javascript:void(0);" class="close-magnific-popup ali-right"><i class="ti-close"></i></a>

                                                    <form method="post" action="#" class="contact-form-wrapper">
                                                        <div class="row">
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
                                                                    <input type="text" class="form-control style2" name="phone" placeholder="Phone" required="required">
                                                                </div><!-- /.form-group -->
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <textarea class="form-control" name="message" placeholder="Message" required="required"></textarea>
                                                        </div><!-- /.form-group -->


                                                        <input type="hidden" name="post_id" value="5549">
                                                        <button class="button btn btn-theme btn-outline w-100" name="contact-form">Send Message<i class="flaticon-right-up next"></i></button>
                                                    </form>
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
























    <section class="container pt-4 pb-5 mb-xxl-3">

        <!-- Breadcrumb -->
        <nav class="pb-2" aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('/')}}">Home</a></li>
            <li class="breadcrumb-item"><a href="listings-grid-cars.html">Used cars</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{$service->title}}</li>
          </ol>
        </nav>


        <!-- Title + Share button -->
        <div class="d-flex justify-content-between gap-3 position-relative z-2 mb-3 mb-lg-4">
          <h1 class="mb-0">{{$service->title}} &nbsp;&nbsp;<span class="fs-xl fw-normal text-body-secondary align-middle">(2021)</span></h1>
          <div class="d-fle x gap-2">
            <div class="dropdown" data-bs-toggle="tooltip" data-bs-custom-class="tooltip-sm" title="Share">
              <button type="button" class="btn btn-icon btn-ghost btn-secondary animate-scale rounded-circle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" aria-label="Share">
                <i class="fi-share-2 animate-target fs-base"></i>
              </button>
              <ul class="dropdown-menu dropdown-menu-end" style="--fn-dropdown-min-width: 9.5rem">
                <li>
                  <a class="dropdown-item" href="#!">
                    <i class="fi-facebook fs-base me-2"></i>
                    Facebook
                  </a>
                </li>
                <li>
                  <a class="dropdown-item" href="#!">
                    <i class="fi-instagram fs-base me-2"></i>
                    Instagram
                  </a>
                </li>
                <li>
                  <a class="dropdown-item" href="#">
                    <i class="fi-linkedin fs-base me-2"></i>
                    LinkedIn
                  </a>
                </li>
              </ul>
            </div>
            <button type="button" class="btn btn-icon btn-secondary animate-pulse rounded-circle" data-bs-toggle="tooltip" data-bs-custom-class="tooltip-sm" title="Wishlist" aria-label="Wishlist">
              <i class="fi-heart animate-target fs-base"></i>
            </button>
          </div>
        </div>

        <!-- Listing meta visible on screens < 992px wide (lg breakpoint) -->
        <div class="d-lg-none mb-4">
          <div class="d-flex align-items-center justify-content-between gap-3 pb-1 mb-2">
            <div class="h2 mb-0">$41 900</div>
            <div class="d-flex gap-2 mb-3">
              <span class="badge text-bg-info d-inline-flex align-items-center">
                Verified
                <i class="fi-shield ms-1"></i>
              </span>
              <span class="badge text-bg-warning">Used</span>
            </div>
          </div>
          <div class="d-flex flex-wrap gap-2 gap-sm-3 fs-sm text-nowrap">
            <div class="d-flex align-items-center gap-2 me-2">
              <i class="fi-map-pin"></i>
              Chicago
            </div>
            <div class="d-flex align-items-center gap-2 me-2">
              <i class="fi-tachometer"></i>
              60K mi
            </div>
            <div class="d-flex align-items-center gap-2 me-2">
              <i class="fi-gas-pump"></i>
              Gasoline
            </div>
            <div class="d-flex align-items-center gap-2">
              <i class="fi-gearbox"></i>
              Automatic
            </div>
          </div>
        </div>

        <div class="row">

          <!-- Gallery (slider) + Description -->
          <div class="col-lg-8 pb-3 pb-sm-0 mb-4 mb-sm-5 mb-lg-0">

            <!-- Main slider -->
            <div class="swiper hover-effect-opacity" data-swiper="{
              &quot;spaceBetween&quot;: 16,
              &quot;loop&quot;: true,
              &quot;navigation&quot;: {
                &quot;prevEl&quot;: &quot;.btn-prev&quot;,
                &quot;nextEl&quot;: &quot;.btn-next&quot;
              },
              &quot;thumbs&quot;: {
                &quot;swiper&quot;: &quot;#thumbs&quot;
              }
            }">
              <div class="swiper-wrapper">
                <div class="swiper-slide">
                  <div class="ratio bg-body-tertiary rounded overflow-hidden" style="--fn-aspect-ratio: calc(482 / 856 * 100%)">


                    @if(!empty($service->feature_image))
                    <img src="{{asset('artisan_services/photo/'.$service->user_id.'/'.$service->feature_image)}}" alt="Image" srcset="">
                    @else
                    <img src="{{asset('asset/img/services.jpg')}}" alt="Image">
                    @endif
                  </div>
                </div>

                
              
           
              </div>

              <!-- Prev / next buttons -->
              <div class="position-absolute top-50 start-0 z-2 translate-middle-y ms-3 ms-sm-4 hover-effect-target opacity-0">
                <button type="button" class="btn btn-prev btn-icon btn-secondary bg-body border-0 rounded-circle animate-slide-start" aria-label="Prev" data-bs-theme="light">
                  <i class="fi-chevron-left fs-lg animate-target"></i>
                </button>
              </div>
              <div class="position-absolute top-50 end-0 z-2 translate-middle-y me-3 me-sm-4 hover-effect-target opacity-0">
                <button type="button" class="btn btn-next btn-icon btn-secondary bg-body border-0 rounded-circle animate-slide-end" aria-label="Next" data-bs-theme="light">
                  <i class="fi-chevron-right fs-lg animate-target"></i>
                </button>
              </div>
            </div>

            <!-- Thumbnails slider -->
            <div class="swiper swiper-load swiper-thumbs pt-2 mt-1" id="thumbs" data-swiper="{
              &quot;loop&quot;: true,
              &quot;spaceBetween&quot;: 16,
              &quot;slidesPerView&quot;: 3,
              &quot;watchSlidesProgress&quot;: true,
              &quot;breakpoints&quot;: {
                &quot;340&quot;: {
                  &quot;slidesPerView&quot;: 4
                },
                &quot;500&quot;: {
                  &quot;slidesPerView&quot;: 5
                },
                &quot;600&quot;: {
                  &quot;slidesPerView&quot;: 6
                },
                &quot;768&quot;: {
                  &quot;slidesPerView&quot;: 4
                },
                &quot;992&quot;: {
                  &quot;slidesPerView&quot;: 5
                },
                &quot;1200&quot;: {
                  &quot;slidesPerView&quot;: 5
                }
              }
            }">
              <div class="swiper-wrapper">
                <div class="swiper-slide swiper-thumb overflow-hidden">
                  
                  <div class="ratio bg-body-tertiary" style="--fn-aspect-ratio: calc(115 / 156 * 100%)">
                    @if(!empty($profile->profile_image))
                    <img src="{{asset('artisan_services/photo/'.$service->user_id.'/'.$service->feature_image)}}" alt="Image" srcset="">
                    @else
                    <img src="{{asset('asset/img/services.jpg')}}" alt="Image">
                    @endif
                  </div>
                  
                </div>
                
              </div>
            </div>

            <!-- Specifications -->
            <h2 class="h3 pt-5 mt-sm-2 my-lg-4">Specifications</h2>
            <div class="row row-cols-1 row-cols-sm-2 gy-2">
              <div class="col">
                <ul class="list-unstyled text-body-secondary mt-n1 mb-0">
                  <li class="mt-1">
                    <span class="fw-medium text-dark-emphasis me-1">Manufacturing year:</span>
                    2021
                  </li>
                  <li class="mt-1">
                    <span class="fw-medium text-dark-emphasis me-1">Mileage:</span>
                    60K miles
                  </li>
                  <li class="mt-1">
                    <span class="fw-medium text-dark-emphasis me-1">Body type:</span>
                    Convertible
                  </li>
                  <li class="mt-1">
                    <span class="fw-medium text-dark-emphasis me-1">Drive type:</span>
                    2 wheel drive - rear
                  </li>
                  <li class="mt-1">
                    <span class="fw-medium text-dark-emphasis me-1">Engine:</span>
                    6-Cylinder Turbo
                  </li>
                  <li class="mt-1">
                    <span class="fw-medium text-dark-emphasis me-1">Transmission:</span>
                    7-Speed Shiftable Automatic
                  </li>
                </ul>
              </div>
              <div class="col">
                <ul class="list-unstyled text-body-secondary mt-n1 mb-0">
                  <li class="mt-1">
                    <span class="fw-medium text-dark-emphasis me-1">Fuel type:</span>
                    2021
                  </li>
                  <li class="mt-1">
                    <span class="fw-medium text-dark-emphasis me-1">City MPG:</span>
                    60K miles
                    <i class="fi-alert-circle fs-lg text-primary align-middle ms-2" data-bs-toggle="tooltip" title="Verified by seller"></i>
                  </li>
                  <li class="mt-1">
                    <span class="fw-medium text-dark-emphasis me-1">Highway MPG:</span>
                    Convertible
                    <i class="fi-alert-circle fs-lg text-primary align-middle ms-2" data-bs-toggle="tooltip" title="Verified by seller"></i>
                  </li>
                  <li class="mt-1">
                    <span class="fw-medium text-dark-emphasis me-1">Exterior color:</span>
                    2 wheel drive - rear
                  </li>
                  <li class="mt-1">
                    <span class="fw-medium text-dark-emphasis me-1">Interior color:</span>
                    Charcoal
                  </li>
                  <li class="mt-1">
                    <span class="fw-medium text-dark-emphasis me-1">VIN:</span>
                    2VW821AU9JM754284
                  </li>
                </ul>
              </div>
            </div>

            <!-- Features (Icon boxes) -->
            <div class="pt-5 mt-sm-2">
              <div class="row row-cols-2 row-cols-md-4 g-3 gx-xl-4">
                <div class="col">
                  <div class="card h-100 bg-info-subtle border-0 py-xl-2">
                    <div class="card-body">
                      <svg class="text-info" xmlns="http://www.w3.org/2000/svg" width="48" viewBox="0 0 48 48" fill="none" stroke="currentColor" stroke-width="1.9" stroke-miterlimit="10" stroke-linejoin="round"><path d="M19.031 24.413l3.55 3.549 7.099-7.099" stroke-linecap="round"></path><path d="M24 10.925c7.052 0 12.778 5.726 12.778 12.778S31.053 36.481 24 36.481s-12.778-5.726-12.778-12.778S16.948 10.925 24 10.925z"></path><path d="M20.158 5.647l.796-3.024c.994-.143 2.012-.217 3.046-.217s2.052.074 3.046.217l.796 3.024c2.245.476 4.341 1.361 6.205 2.574l2.705-1.578a21.4 21.4 0 0 1 2.307 2.001 21.42 21.42 0 0 1 2 2.307l-1.577 2.705c1.212 1.864 2.098 3.96 2.574 6.205l3.024.796a21.44 21.44 0 0 1 0 6.092l-3.024.796c-.476 2.246-1.362 4.341-2.574 6.205l1.577 2.705c-.602.804-1.269 1.576-2 2.307a21.39 21.39 0 0 1-2.307 2.001l-2.705-1.578a18.36 18.36 0 0 1-6.205 2.574l-.796 3.024c-.994.143-2.012.217-3.046.217s-2.052-.074-3.046-.217l-.796-3.024a18.36 18.36 0 0 1-6.205-2.574l-2.705 1.578c-.804-.602-1.576-1.269-2.307-2.001s-1.398-1.503-2-2.307l1.577-2.705c-1.212-1.864-2.098-3.96-2.574-6.205l-3.024-.796a21.45 21.45 0 0 1 0-6.092l3.024-.796c.476-2.246 1.362-4.341 2.574-6.205L6.94 10.951a21.42 21.42 0 0 1 2-2.307c.731-.731 1.503-1.398 2.307-2.001l2.705 1.578a18.36 18.36 0 0 1 6.205-2.574z"></path></svg>
                      <h4 class="h6 fs-sm mt-3 mb-0">Checked and Certified by Finder</h4>
                    </div>
                  </div>
                </div>
                <div class="col">
                  <div class="card h-100 bg-info-subtle border-0 py-xl-2">
                    <div class="card-body">
                      <svg class="text-info" xmlns="http://www.w3.org/2000/svg" width="48" viewBox="0 0 48 48" fill="none" stroke="currentColor" stroke-width="1.7" stroke-miterlimit="10" stroke-linejoin="round"><path d="M24.031 45.063c11.615 0 21.031-9.416 21.031-21.031S35.647 3 24.031 3 3 12.416 3 24.031s9.416 21.031 21.031 21.031z"></path><path d="M24.031 39.912c8.771 0 15.881-7.11 15.881-15.881S32.802 8.151 24.031 8.151 8.15 15.261 8.15 24.031s7.11 15.881 15.881 15.881z"></path><path d="M24.031 27.036c1.659 0 3.004-1.345 3.004-3.004s-1.345-3.004-3.004-3.004-3.004 1.345-3.004 3.004 1.345 3.005 3.004 3.005z"></path><path d="M29.806 38.83a11.97 11.97 0 0 1-1.053-4.926 12.02 12.02 0 0 1 11.02-11.977M18.257 38.83a11.97 11.97 0 0 0 1.053-4.926A12.02 12.02 0 0 0 8.29 21.927m30.262-4.334H9.51" stroke-linecap="round"></path></svg>
                      <h4 class="h6 fs-sm mt-3 mb-0">Single Owner</h4>
                    </div>
                  </div>
                </div>
                <div class="col">
                  <div class="card h-100 bg-info-subtle border-0 py-xl-2">
                    <div class="card-body">
                      <svg xmlns="http://www.w3.org/2000/svg" width="48" viewBox="0 0 48 48" fill="none"><g class="text-info" fill="currentColor"><path d="M42.25 11.5h-6.457c-.913-1.356-2.461-2.25-4.215-2.25h-2.924a4.8 4.8 0 0 0 .025-.835 4.69 4.69 0 0 0-4.364-4.405c-1.313-.086-2.562.359-3.519 1.255-.943.883-1.484 2.13-1.484 3.422a4.71 4.71 0 0 0 .033.563H16.61c-1.754 0-3.303.894-4.216 2.25H5.75c-2.171 0-3.937 1.767-3.937 3.938v24.625C1.813 42.234 3.579 44 5.75 44h36.5c2.171 0 3.938-1.766 3.938-3.937V15.437c0-2.171-1.767-3.937-3.937-3.937zm-25.641-.375h3.954c.316 0 .612-.159.785-.424a.94.94 0 0 0 .075-.889 2.79 2.79 0 0 1-.234-1.125c0-.786.316-1.515.891-2.053a2.79 2.79 0 0 1 2.114-.753c1.387.091 2.536 1.251 2.616 2.641.025.448-.052.882-.23 1.29a.94.94 0 0 0 .859 1.313h4.141c1.123 0 2.112.582 2.684 1.459a.93.93 0 0 0 .28.533c.153.374.238.783.238 1.211 0 .405-.329.734-.734.734H14.141c-.405 0-.734-.329-.734-.734a3.19 3.19 0 0 1 .188-1.08c.28-.162.469-.464.469-.811l-.002-.046a3.2 3.2 0 0 1 2.549-1.267zm27.703 28.937c0 1.138-.925 2.063-2.062 2.063H5.75c-1.137 0-2.062-.925-2.062-2.062V15.437c0-1.137.925-2.062 2.063-2.062h5.872c-.059.309-.091.627-.091.953 0 1.439 1.171 2.609 2.609 2.609h19.906c1.439 0 2.61-1.17 2.61-2.609 0-.326-.032-.644-.091-.953h5.685c1.137 0 2.063.925 2.063 2.063v24.625z"></path><use href="#B"></use><path d="M13.219 33.5c-.246 0-.489.1-.663.275s-.275.416-.275.663.1.489.275.663.416.275.663.275.489-.1.663-.275.275-.416.275-.663-.1-.489-.275-.663-.416-.275-.663-.275z"></path><use href="#B" y="-5.25"></use><use href="#C"></use><path d="M34.78 33.5H17.359a.94.94 0 0 0-.937.938.94.94 0 0 0 .938.938H34.78a.94.94 0 0 0 .938-.937.94.94 0 0 0-.937-.937z"></path><use href="#C" y="-5.25"></use><path d="M24 9.625c.247 0 .488-.1.663-.275s.275-.416.275-.663-.1-.488-.275-.663-.416-.275-.663-.275-.488.1-.663.275-.275.416-.275.663.1.489.275.663.416.275.663.275z"></path></g><defs><path id="B" d="M13.219 28.25c-.246 0-.489.1-.663.275s-.275.416-.275.663.1.488.275.663.416.275.663.275.489-.1.663-.275.275-.416.275-.663-.1-.488-.275-.663-.416-.275-.663-.275z"></path><path id="C" d="M34.781 28.25H17.156a.94.94 0 0 0-.937.938.94.94 0 0 0 .937.938h17.625a.94.94 0 0 0 .938-.937.94.94 0 0 0-.937-.937z"></path></defs></svg>
                      <h4 class="h6 fs-sm mt-3 mb-0">Well-Equipped</h4>
                    </div>
                  </div>
                </div>
                <div class="col">
                  <div class="card h-100 bg-info-subtle border-0 py-xl-2">
                    <div class="card-body">
                      <svg class="text-info" xmlns="http://www.w3.org/2000/svg" width="48" viewBox="0 0 48 48" fill="none" stroke="currentColor" stroke-width="1.7" stroke-miterlimit="10" stroke-linejoin="round"><path d="M26.945 34.801a5.68 5.68 0 0 1-6.186 5.127c-3.124-.293-5.419-3.062-5.127-6.186a5.68 5.68 0 1 1 11.312 1.059z"></path><path d="M47.125 27.236v-4.578h-5.306a3.35 3.35 0 0 0-3.233 2.47L34.528 40h12.596v-4.452M10.611 23.72l2.694.252" stroke-linecap="round"></path><path d="M23.304 34.46c-.104 1.114-1.092 1.932-2.206 1.828s-1.932-1.092-1.828-2.206 1.092-1.932 2.205-1.828 1.932 1.092 1.828 2.206zm13.59-3.131l-1.377-.177c-1.589-.204-3.04.926-3.231 2.516l-.08.67c-.131 1.091.663 2.075 1.758 2.178l1.478.139 1.452-5.326z"></path><path d="M37.704 28.359l-2.263 8.295-8.686-.834a5.66 5.66 0 0 0 .189-1.018 5.68 5.68 0 0 0-5.126-6.187c-3.125-.292-5.894 2.003-6.187 5.127-.032.342-.033.68-.006 1.011L4.419 33.647l2.234-13.408V9.424l3.675.4c2.53.382 5.084 1.77 7.253 3.652s3.95 4.259 4.931 6.621c.528 1.269 1.617 2.22 2.947 2.57l4.711 1.239c.162.119.284.285.348.475l.759 2.248a.98.98 0 0 0 1.412.537l2.194-1.251a.98.98 0 0 1 1.282.282l1.539 2.161z"></path><path d="M19.063 21.636l-.609-1.298c-1.512-3.221-5.304-6.591-9.14-7.002l-2.662-.265v7.168l12.411 1.397z"></path><g stroke-linecap="round"><path d="M1 9.154l5.653.269v10.811L1 19.606"></path><path d="M1 19.606l5.653.629-2.234 13.412L1 33.304"></path><path d="M1 19.606l5.653.629v-7.164L1 12.761"></path></g></svg>
                      <h4 class="h6 fs-sm mt-3 mb-0">No Accident / Damage Reported</h4>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Fetures (Accordion) -->
            <h2 class="h3 pt-5 mt-sm-2 mb-2 mb-lg-3">Features</h2>
            <div class="accordion accordion-alt-icon" id="features">
              <div class="accordion-item">
                <h3 class="accordion-header" id="headingExterior">
                  <button type="button" class="accordion-button fs-5 collapsed" data-bs-toggle="collapse" data-bs-target="#exterior" aria-expanded="false" aria-controls="exterior">
                    <span class="hover-effect-underline stretched-link me-2">Exterior</span>
                  </button>
                </h3>
                <div class="accordion-collapse collapse" id="exterior" aria-labelledby="headingExterior" data-bs-parent="#features">
                  <div class="accordion-body fs-base">
                    <ul class="mt-n1 mb-0">
                      <li class="mt-1">Alloy Wheels</li>
                      <li class="mt-1">Sunroof / Moonroof</li>
                      <li class="mt-1">Tinged glass</li>
                      <li class="mt-1">LED Headlights</li>
                      <li class="mt-1">Foldable Roof</li>
                      <li class="mt-1">Tow Hitch</li>
                    </ul>
                  </div>
                </div>
              </div>
              <div class="accordion-item">
                <h3 class="accordion-header" id="headingInterior">
                  <button type="button" class="accordion-button fs-5" data-bs-toggle="collapse" data-bs-target="#interior" aria-expanded="true" aria-controls="interior">
                    <span class="hover-effect-underline stretched-link me-2">Interior</span>
                  </button>
                </h3>
                <div class="accordion-collapse collapse show" id="interior" aria-labelledby="headingInterior" data-bs-parent="#features">
                  <div class="accordion-body fs-base">
                    <div class="row row-cols-1 row-cols-sm-2 gy-2">
                      <div class="col">
                        <ul class="mt-n1 mb-0">
                          <li class="mt-1">Adjustable Steering Wheel</li>
                          <li class="mt-1">Auto-Dimming Rearview Mirror</li>
                          <li class="mt-1">Driver Adjustable Lumbar</li>
                          <li class="mt-1">Driver Illuminated Vanity Mirror</li>
                          <li class="mt-1">Universal Garage Door Opener</li>
                          <li class="mt-1">Steering Wheel Audio Controls</li>
                        </ul>
                      </div>
                      <div class="col">
                        <ul class="mt-n1 mb-0">
                          <li class="mt-1">Heated Front Seats</li>
                          <li class="mt-1">Leather Seats</li>
                          <li class="mt-1">Leather Steering Wheel</li>
                          <li class="mt-1">Pass-Through Rear Seat</li>
                          <li class="mt-1">Passenger Adjustable Lumbar</li>
                          <li class="mt-1">Passenger Illuminated Visor Mirror</li>
                        </ul>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="accordion-item">
                <h3 class="accordion-header" id="headingSafety">
                  <button type="button" class="accordion-button fs-5 collapsed" data-bs-toggle="collapse" data-bs-target="#safety" aria-expanded="false" aria-controls="safety">
                    <span class="hover-effect-underline stretched-link me-2">Safety</span>
                  </button>
                </h3>
                <div class="accordion-collapse collapse" id="safety" aria-labelledby="headingSafety" data-bs-parent="#features">
                  <div class="accordion-body fs-base">
                    <div class="row row-cols-1 row-cols-sm-2 gy-2">
                      <div class="col">
                        <ul class="mt-n1 mb-0">
                          <li class="mt-1">Airbag: Driver</li>
                          <li class="mt-1">Airbag: Passenger</li>
                          <li class="mt-1">Adaptive Cruise Control</li>
                          <li class="mt-1">Blind Spot Monitor</li>
                          <li class="mt-1">Alarm</li>
                          <li class="mt-1">Antilock Brakes</li>
                        </ul>
                      </div>
                      <div class="col">
                        <ul class="mt-n1 mb-0">
                          <li class="mt-1">Brake Assist</li>
                          <li class="mt-1">Lane Departure Warning</li>
                          <li class="mt-1">Stability Control</li>
                          <li class="mt-1">Fog Lights</li>
                          <li class="mt-1">Power Door Locks</li>
                        </ul>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="accordion-item">
                <h3 class="accordion-header" id="headingTechnology">
                  <button type="button" class="accordion-button fs-5 collapsed" data-bs-toggle="collapse" data-bs-target="#technology" aria-expanded="false" aria-controls="technology">
                    <span class="hover-effect-underline stretched-link me-2">Technology</span>
                  </button>
                </h3>
                <div class="accordion-collapse collapse" id="technology" aria-labelledby="headingTechnology" data-bs-parent="#features">
                  <div class="accordion-body fs-base">
                    <div class="row row-cols-1 row-cols-sm-2 gy-2">
                      <div class="col">
                        <ul class="mt-n1 mb-0">
                          <li class="mt-1">Multi-Zone A/C</li>
                          <li class="mt-1">Climate Control</li>
                          <li class="mt-1">Navigation System</li>
                          <li class="mt-1">Remote Start</li>
                          <li class="mt-1">Bluetooth</li>
                          <li class="mt-1">Remote Start</li>
                        </ul>
                      </div>
                      <div class="col">
                        <ul class="mt-n1 mb-0">
                          <li class="mt-1">Apple CarPlay</li>
                          <li class="mt-1">Android Auto</li>
                          <li class="mt-1">Backup Camera</li>
                          <li class="mt-1">HomeLink</li>
                          <li class="mt-1">Keyless Start</li>
                          <li class="mt-1">Premium Sound System</li>
                        </ul>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Seller's description -->
            <h2 class="h3 pt-5 mt-sm-2">Service description</h2>
            <p>{!! $service->service_description !!}</p>
            <div class="collapse" id="moreDescription">
              <p>This A205 Cabriolet comes equipped with top-of-the-line features, including a responsive infotainment system, advanced safety options, and a finely crafted interior that showcases Mercedes-Benz's commitment to quality. The soft-top roof operates seamlessly, allowing you to transition from a cozy cabin to an open-air cruiser in seconds. Whether you're navigating city streets or cruising along the coast, this cabriolet delivers a smooth, refined ride every time.</p>
              <p>With low mileage and a full service history, this 2021 model remains in excellent condition, both mechanically and aesthetically. The exterior shines in pristine condition, and the interior has been meticulously cared for, ensuring a like-new experience. This Mercedes-Benz A205 Cabriolet is the perfect choice for those who desire a blend of sophistication, comfort, and thrilling performance in their next vehicle.</p>
            </div>
            <div class="nav">
              <a class="nav-link position-relative px-0 collapsed" href="#moreDescription" data-bs-toggle="collapse" aria-expanded="false" aria-controls="moreDescription" aria-label="Show / hide services">
                <span class="hover-effect-underline stretched-link" data-label-collapsed="Show more" data-label-expanded="Show less"></span>
                <i class="collapse-toggle-icon fi-chevron-down fs-base mt-1 ms-1"></i>
              </a>
            </div>

            <div class="d-flex fs-sm text-body-secondary border-top pt-4 mt-4 mt-md-5">
              <div>Published: <span class="text-dark-emphasis">Jul 15, 2024</span></div>
              <hr class="vr my-1 mx-3">
              <div>Ad number: <span class="text-dark-emphasis">681013232</span></div>
              <hr class="vr my-1 mx-3">
              <div>Views: <span class="text-dark-emphasis">48</span></div>
            </div>
          </div>

          <!-- Sidebar with car detail and seller info -->
          <aside class="col-lg-4" style="margin-top: -110px">
            <div class="position-sticky top-0" style="padding-top: 110px">

              <!-- Listing meta visible on screens > 991px (lg breakpoint) -->
              <div class="d-none d-lg-block">
                <div class="d-flex gap-2 pb-1 mb-2">
                  <span class="badge text-bg-info d-inline-flex align-items-center">
                    Verified
                    <i class="fi-shield ms-1"></i>
                  </span>
                  <span class="badge text-bg-warning">Used</span>
                </div>
                <div class="h2 pb-1 mb-2">{{$service->price_text}}</div>
                <div class="d-flex flex-wrap justify-content-lg-between gap-2 fs-sm text-nowrap mb-4">
                  <div class="d-flex align-items-center gap-2 me-2">
                    <i class="fi-map-pin"></i>
                    {{$service->location}}
                  </div>
                  <div class="d-flex align-items-center gap-2 me-2">
                    <i class="fi-tachometer"></i>
                    60K mi
                  </div>
                  <div class="d-flex align-items-center gap-2 me-2">
                    <i class="fi-gas-pump"></i>
                    Gasoline
                  </div>
                  <div class="d-flex align-items-center gap-2">
                    <i class="fi-gearbox"></i>
                    Automatic
                  </div>
                </div>
              </div>

              <!-- Seller info card -->
              <div class="card bg-body-tertiary border-0 p-sm-2 p-lg-0 p-xl-2 mb-4">
                <div class="card-body">
                  <div class="d-flex align-items-center position-relative mb-3">
                    <div class="ratio ratio-1x1 flex-shrink-0 bg-body-secondary rounded-circle overflow-hidden" style="width: 72px">
                        @if(!empty($profile->profile_image))
                      <img src="{{asset('profile/photo/'.$profile->id.'/'.$profile->profile_image)}}" alt="Avatar">
                      @else
                      <img src="{{asset('asset/avata2.png')}}" alt="Avatar">
                        @endif
                    </div>
                    <div class="w-100 ps-3">
                      <div class="d-flex align-items-center justify-content-between gap-3 mb-1">
                        <a class="h6 fs-sm hover-effect-underline stretched-link text-decoration-none mb-0" href="{{url('user/'.$profile->identity)}}">{{$profile->full_name}}</a>
                        <span class="badge text-bg-light">Private seller</span>
                      </div>
                      <div class="d-flex align-items-center gap-1">
                        <i class="fi-star-filled text-warning"></i>
                        <span class="fs-sm fw-medium text-dark-emphasis">{{\App\Helpers\CommonHelpers::rating($service->id)}}.0</span>
                        <span class="fs-xs text-body-secondary">({{\App\Models\ServiceRating::query()->where('service_id', $service->id)->count()}} Reviews)</span>
                      </div>
                    </div>
                  </div>
                  <div class="nav mb-3">
                    <a class="nav-link position-relative px-0" href="#!">
                      <span class="hover-effect-underline stretched-link">Other ads by this seller</span>
                      <i class="fi-chevron-right fs-base ms-1"></i>
                    </a>
                  </div>
                  <div class="d-flex flex-wrap gap-3">
                    <button type="button" class="btn btn-outline-dark">(316) *** **** - reveal</button>
                    <a class="btn btn-primary" href="mailto:d.steward@example.com">
                      <i class="fi-mail fs-base me-2"></i>
                      Buy Now 
                    </a>
                  </div>
                </div>
              </div>

              <!-- Subscribe -->
              <div class="card p-sm-2 p-lg-0 p-xl-2">
                <div class="card-body">
                  <h4 class="h6">Email me price drops and new listings for these search results:</h4>
                  <form class="needs-validation d-flex flex-column flex-sm-row flex-lg-column flex-xl-row gap-2 gap-sm-3 gap-lg-2 gap-xl-3 mb-3" novalidate="">
                    <div class="position-relative">
                      <i class="fi-mail position-absolute top-50 start-0 translate-middle-y ms-3"></i>
                      <input type="email" class="form-control form-icon-start" placeholder="Your email" required="">
                    </div>
                    <button type="submit" class="btn btn-secondary">Subscribe</button>
                  </form>
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="concent">
                    <label class="form-check-label fs-xs" for="concent">I agree to receive price drop alerts on this vehicle and helpful shopping information.</label>
                  </div>
                </div>
              </div>
            </div>
          </aside>
        </div>
      </section>





@endsection
