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


@endsection
