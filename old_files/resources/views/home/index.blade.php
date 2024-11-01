@extends('home.layouts.content')
@section('content')

    <div id="apus-main-content">
        <section id="main-container" class="container inner wrapper-main-page">
            <div class="row">
                <div id="main-content" class="main-page col-12">
                    <div id="main" class="site-main clearfix" role="main">

                        <div data-elementor-type="wp-page" data-elementor-id="29" class="elementor elementor-29">
                            <section class="elementor-section elementor-top-section elementor-element elementor-element-5d08eff elementor-section-stretched elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="5d08eff" data-element_type="section" data-settings="{&quot;stretch_section&quot;:&quot;section-stretched&quot;,&quot;background_background&quot;:&quot;classic&quot;}">
                                <div class="elementor-container elementor-column-gap-extended">
                                    <div class="elementor-column elementor-col-50 elementor-top-column elementor-element elementor-element-dd80c15" data-id="dd80c15" data-element_type="column">
                                        <div class="elementor-widget-wrap elementor-element-populated">
                                            <div class="elementor-element elementor-element-eb616e4 elementor-widget__width-initial elementor-invisible elementor-widget elementor-widget-heading" data-id="eb616e4" data-element_type="widget" data-settings="{&quot;_animation&quot;:&quot;slide-up&quot;}" data-widget_type="heading.default">
                                                <div class="elementor-widget-container">
                                                    <style>/*! elementor - v3.21.0 - 24-04-2024 */
                                                        .elementor-heading-title{padding:0;margin:0;line-height:1}.elementor-widget-heading .elementor-heading-title[class*=elementor-size-]>a{color:inherit;font-size:inherit;line-height:inherit}.elementor-widget-heading .elementor-heading-title.elementor-size-small{font-size:15px}.elementor-widget-heading .elementor-heading-title.elementor-size-medium{font-size:19px}.elementor-widget-heading .elementor-heading-title.elementor-size-large{font-size:29px}.elementor-widget-heading .elementor-heading-title.elementor-size-xl{font-size:39px}.elementor-widget-heading .elementor-heading-title.elementor-size-xxl{font-size:59px}</style><h2 class="elementor-heading-title elementor-size-default">Look no further!</h2>
                                                </div>
                                            </div>
                                            <div class="elementor-element elementor-element-469f76f elementor-widget__width-initial elementor-invisible elementor-widget elementor-widget-text-editor" data-id="469f76f" data-element_type="widget" data-settings="{&quot;_animation&quot;:&quot;slide-up&quot;}" data-widget_type="text-editor.default">
                                                <div class="elementor-widget-container">
                                                    <style>/*! elementor - v3.21.0 - 24-04-2024 */
                                                        .elementor-widget-text-editor.elementor-drop-cap-view-stacked .elementor-drop-cap{background-color:#69727d;color:#fff}.elementor-widget-text-editor.elementor-drop-cap-view-framed .elementor-drop-cap{color:#69727d;border:3px solid;background-color:transparent}.elementor-widget-text-editor:not(.elementor-drop-cap-view-default) .elementor-drop-cap{margin-top:8px}.elementor-widget-text-editor:not(.elementor-drop-cap-view-default) .elementor-drop-cap-letter{width:1em;height:1em}.elementor-widget-text-editor .elementor-drop-cap{float:left;text-align:center;line-height:1;font-size:50px}.elementor-widget-text-editor .elementor-drop-cap-letter{display:inline-block}</style>
                                                    At Swift Edge, we offer a comprehensive range of virtual assistance solutions tailored to meet your unique needs.
                                                </div>
                                            </div>
                                            <div class="elementor-element elementor-element-be1232c elementor-invisible elementor-widget elementor-widget-apus_element_service_search_form" data-id="be1232c" data-element_type="widget" data-settings="{&quot;_animation&quot;:&quot;slide-up&quot;}" data-widget_type="apus_element_service_search_form.default">
                                                <div class="elementor-widget-container">


                                                    <div class="widget-listing-search-form   horizontal">
                                                        <form id="filter-listing-form-VPDNx" action="{{ route('search.now') }}" class="form-search filter-listing-form " method="GET">
                                                            {{ csrf_field() }}
                                                            <div class="search-form-inner">
                                                                <div class="main-inner clearfix">
                                                                    <div class="content-main-inner">
                                                                        <div class="row row-20 align-items-center list-fileds">
                                                                            <div class="item-column col-12 col-md-5 col-lg-5  has-icon ">
                                                                                <div class="form-group form-group-title  ">
                                                                                    <div class="form-group-inner inner has-icon">
                                                                                        <i class="flaticon-loupe"></i>
                                                                                        <input type="text" name="keyword" class="form-control " value="" id="VPDNx_title" placeholder="What are you looking for?">
                                                                                    </div>
                                                                                </div><!-- /.form-group -->


                                                                            </div>
                                                                            <div class="item-column col-12 col-md-4 col-lg-4   item-last">
                                                                                <div class="form-group form-group-category   tax-select-field">
                                                                                    <div class="form-group-inner inner ">
                                                                                        <select name="job_category" class="form-control" id="VPDNx_category" required>

                                                                                            <option value="">Select Category</option>
                                                                                            @foreach($category as $row)
                                                                                                <option value="{{$row->id}}">{{$row->title}}</option>
                                                                                            @endforeach
                                                                                        </select>
                                                                                    </div>
                                                                                </div><!-- /.form-group -->


                                                                            </div>
                                                                            <div class="col-12 col-md-3 form-group-search ">
                                                                                <div class="d-flex align-items-center justify-content-end">
                                                                                    <button class="btn-submit btn w-100 btn-theme btn-inverse" type="submit">
                                                                                        Search
                                                                                    </button>

                                                                                </div>
                                                                            </div>

                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </form>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="elementor-column elementor-col-50 elementor-top-column elementor-element elementor-element-507925c elementor-hidden-tablet elementor-hidden-mobile" data-id="507925c" data-element_type="column">
                                        <div class="elementor-widget-wrap elementor-element-populated">
                                            <section class="elementor-section elementor-inner-section elementor-element elementor-element-b5e4c9e elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="b5e4c9e" data-element_type="section" data-settings="{&quot;background_background&quot;:&quot;classic&quot;}">
                                                <div class="elementor-container elementor-column-gap-no">
                                                    <div class="elementor-column elementor-col-50 elementor-inner-column elementor-element elementor-element-06cd99e" data-id="06cd99e" data-element_type="column">
                                                        <div class="elementor-widget-wrap elementor-element-populated">
                                                            <div class="elementor-element elementor-element-af5f397 elementor-widget__width-auto elementor-invisible elementor-widget elementor-widget-image" data-id="af5f397" data-element_type="widget" data-settings="{&quot;_animation&quot;:&quot;scale&quot;,&quot;_animation_delay&quot;:500}" data-widget_type="image.default">
                                                                <div class="elementor-widget-container">
                                                                    <style>/*! elementor - v3.21.0 - 24-04-2024 */
                                                                        .elementor-widget-image{text-align:center}.elementor-widget-image a{display:inline-block}.elementor-widget-image a img[src$=".svg"]{width:48px}.elementor-widget-image img{vertical-align:middle;display:inline-block}</style>
                                                                    <a href="#">
                                                                        <img fetchpriority="high" decoding="async" width="350" height="600" src="{{asset("home-assets/img/banner3.jpeg")}}" class="attachment-full size-full wp-image-412" alt="" srcset="{{asset("home-assets/img/banner3.jpeg")}}" sizes="(max-width: 350px) 100vw, 350px" />								</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="elementor-column elementor-col-50 elementor-inner-column elementor-element elementor-element-b669817" data-id="b669817" data-element_type="column">
                                                        <div class="elementor-widget-wrap elementor-element-populated">
                                                            <div class="elementor-element elementor-element-1f37ba7 elementor-widget__width-auto elementor-invisible elementor-widget elementor-widget-image" data-id="1f37ba7" data-element_type="widget" data-settings="{&quot;_animation&quot;:&quot;scale&quot;,&quot;_animation_delay&quot;:600}" data-widget_type="image.default">
                                                                <div class="elementor-widget-container">
                                                                    <a href="#">
                                                                        <img decoding="async" width="300" height="300" src="{{asset("home-assets/img/banner4.jpeg")}}" class="attachment-full size-full wp-image-413" alt="" srcset="{{asset("home-assets/img/banner4.jpeg")}}" sizes="(max-width: 300px) 100vw, 300px" />
                                                                    </a>
                                                                </div>
                                                            </div>
                                                            <div class="elementor-element elementor-element-f9465e3 elementor-widget__width-auto elementor-invisible elementor-widget elementor-widget-image" data-id="f9465e3" data-element_type="widget" data-settings="{&quot;_animation&quot;:&quot;scale&quot;,&quot;_animation_delay&quot;:700}" data-widget_type="image.default">
                                                                <div class="elementor-widget-container">
                                                                    <a href="#">
                                                                        <img loading="lazy" decoding="async" width="300" height="338" src="{{asset("home-assets/img/banner5.jpeg")}}" class="attachment-full size-full wp-image-414" alt="" srcset="{{asset("home-assets/img/banner5.jpeg")}}" sizes="(max-width: 300px) 100vw, 300px" />
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </section>
                                        </div>
                                    </div>
                                </div>
                            </section>
                            <section class="elementor-section elementor-top-section elementor-element elementor-element-ea29f57 elementor-section-stretched elementor-section-boxed elementor-section-height-default elementor-section-height-default elementor-invisible" data-id="ea29f57" data-element_type="section" data-settings="{&quot;stretch_section&quot;:&quot;section-stretched&quot;,&quot;animation&quot;:&quot;slide-up&quot;}">
                                <div class="elementor-container elementor-column-gap-extended">
                                    <div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-3c15d23" data-id="3c15d23" data-element_type="column">
                                        <div class="elementor-widget-wrap elementor-element-populated">
                                            <div class="elementor-element elementor-element-0bf7e3d elementor-widget elementor-widget-heading" data-id="0bf7e3d" data-element_type="widget" data-widget_type="heading.default">
                                                <div class="elementor-widget-container">
                                                    <h2 class="elementor-heading-title elementor-size-default">Popular Services</h2>
                                                </div>
                                            </div>
                                            <div class="elementor-element elementor-element-b908a42 elementor-widget elementor-widget-text-editor" data-id="b908a42" data-element_type="widget" data-widget_type="text-editor.default">
                                                <div class="elementor-widget-container">
                                                    Most viewed and all-time top-selling services
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>
                            <section class="elementor-section elementor-top-section elementor-element elementor-element-f1cf0d3 elementor-section-stretched elementor-section-boxed elementor-section-height-default elementor-section-height-default elementor-invisible" data-id="f1cf0d3" data-element_type="section" data-settings="{&quot;stretch_section&quot;:&quot;section-stretched&quot;,&quot;animation&quot;:&quot;slide-up&quot;}">
                                <div class="elementor-container elementor-column-gap-extended">
                                    <div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-d2aea9d" data-id="d2aea9d" data-element_type="column">
                                        <div class="elementor-widget-wrap elementor-element-populated">
                                            <div class="elementor-element elementor-element-2c4a4ee elementor-widget elementor-widget-apus_element_services_tabs" data-id="2c4a4ee" data-element_type="widget" data-settings="{&quot;columns&quot;:&quot;4&quot;,&quot;slides_to_scroll&quot;:&quot;4&quot;,&quot;columns_tablet&quot;:&quot;2&quot;,&quot;slides_to_scroll_tablet&quot;:&quot;2&quot;}" data-widget_type="apus_element_services_tabs.default">
                                                <div class="elementor-widget-container">
                                                    <div class="widget-services-tabs carousel ">
                                                        <div class="top-widget-info d-xl-flex align-items-end">
                                                            <ul role="tablist" class="nav nav-tabs nav-categories justify-content-xl-center">

                                                                <?php $x = 1;?>
                                                                @foreach($feature_category as $row)
                                                                    <?php $number = $x++;?>
                                                                    <li class="nav-item">
                                                                        <a href="#tab-bLyu7-{{$number}}" class="{{$number == 1 ? "active" : ""}}" data-bs-toggle="tab">
                                                                            {{$row->title}}
                                                                        </a>
                                                                    </li>
                                                                @endforeach

                                                            </ul>
                                                        </div>
                                                        <div class="tab-content">

                                                            <?php $x_ = 1;?>
                                                            @foreach($feature_category as $row)
                                                                <?php $number = $x_++;?>

                                                                <div id="tab-bLyu7-{{$number}}" class="tab-pane fade {{$number == 1 ? "active show" : ""}}">
                                                                    <div class="slick-carousel "
                                                                         data-items="4"
                                                                         data-large="2"
                                                                         data-medium="2"
                                                                         data-small="1"
                                                                         data-smallest="1"

                                                                         data-slidestoscroll="4"
                                                                         data-slidestoscroll_large="2"
                                                                         data-slidestoscroll_medium="2"
                                                                         data-slidestoscroll_small="1"
                                                                         data-slidestoscroll_smallest="1"

                                                                         data-pagination="true" data-nav="false" data-rows="1" data-infinite="true" data-autoplay="true">

                                                                        @foreach(\App\Helpers\CommonHelpers::getServicesByCategory($row->id) as $rw)
                                                                            <div class="item">


                                                                                <article class="map-item service-item post-5556 service type-service status-publish has-post-thumbnail hentry location-new-york service_category-design-creative service_category-digital-marketing is-featured" data-latitude="40.77693245895672" data-longitude="-73.9212720020022" data-img="home-assets/uploads/2022/11/service11-495x370.jpg" data-logo="home-assets/uploads/2022/11/service11-150x150.jpg">
                                                                                    <div class="position-relative">
                                                                                        <div class="service-image">

                                                                                            <a href="{{url('service/'.$rw->url)}}">
                                                                                                <div class="image-wrapper">

                                                                                                    @if(!empty($rw->feature_image))
                                                                                                        <img loading="lazy" decoding="async" width="495" height="370" src="{{asset('artisan_services/photo/'.$rw->user_id.'/'.$rw->feature_image)}}" class="attachment-freeio-listing-grid size-freeio-listing-grid" alt="" srcset="{{asset('artisan_services/photo/'.$rw->user_id.'/'.$rw->feature_image)}} 495w, {{asset('artisan_services/photo/'.$rw->user_id.'/'.$rw->feature_image)}} 300w, {{asset('artisan_services/photo/'.$rw->user_id.'/'.$rw->feature_image)}} 768w, {{asset('artisan_services/photo/'.$rw->user_id.'/'.$rw->feature_image)}} 600w" sizes="(max-width: 495px) 100vw, 495px">
                                                                                                    @else

                                                                                                        <a href="#"><img src="{{asset('icon_02.jpeg')}}" alt="image"></a>
                                                                                                    @endif

                                                                                                </div>
                                                                                            </a>
                                                                                        </div>

                                                                                    </div>

                                                                                    <div class="service-information">
                                                                                        <div class="category-service">
                                                                                            <a href="#" style="">{{$rw->business_category}}</a>
                                                                                        </div>

                                                                                        <h2 class="service-title">
                                                                                            <a href="{{url('service/'.$rw->url)}}" rel="bookmark">{{$rw->title}}</a></h2>
                                                                                        <div class="rating-reviews">
                                                                                            <i class="fa fa-star"></i>
                                                                                            <span class="rating">{{\App\Helpers\CommonHelpers::rating($rw->id)}}.0</span>
                                                                                            <span class="text">({{\App\Models\ServiceRating::query()->where('service_id', $rw->id)->count()}} Reviews)</span>
                                                                                        </div>
                                                                                        <div class="info-bottom d-flex align-items-center">
                                                                                            <div class="service-author">
                                                                                                <a href="#">
                                                                                                    <div class="freelancer-logo d-flex align-items-center">
                                                                                                        <div class="image-wrapper">
                                                                                                            @if(!empty($rw->profile_image))
                                                                                                                <img loading="lazy" decoding="async" width="100" height="100" src="{{asset('profile/photo/'.$rw->user_id.'/'.$rw->profile_image)}}" class="attachment-thumbnail size-thumbnail" alt="" srcset="{{asset('profile/photo/'.$rw->user_id.'/'.$rw->profile_image)}} 150w, {{asset('profile/photo/'.$rw->user_id.'/'.$rw->profile_image)}} 300w, {{asset('profile/photo/'.$rw->user_id.'/'.$rw->profile_image)}} 410w, {{asset('profile/photo/'.$rw->user_id.'/'.$rw->profile_image)}} 420w" sizes="(max-width: 150px) 100vw, 150px" />
                                                                                                            @else
                                                                                                                <img  width="100" height="100" src="{{asset('icon_02.jpeg')}}" alt="image" />
                                                                                                            @endif
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <span class="text">{{$rw->full_name}}
                                                                                            </span>
                                                                                                </a>
                                                                                            </div>
                                                                                            <div class="ms-auto">
                                                                                                <div class="service-salary with-title">
                                                                                                    <span class="text">Starting at:</span> <span><span class="woocommerce-Price-amount amount"><bdi><span class="woocommerce-Price-currencySymbol">₦</span><span class="price-text">{{number_format($rw->cost)}}</span></bdi></span></span>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </article><!-- #post-## -->

                                                                            </div>
                                                                        @endforeach

                                                                    </div>
                                                                </div>

                                                            @endforeach

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>


                            <section class="elementor-section elementor-top-section elementor-element elementor-element-0d20f9c elementor-section-stretched elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="0d20f9c" data-element_type="section" data-settings="{&quot;stretch_section&quot;:&quot;section-stretched&quot;}">
                                <div class="elementor-container elementor-column-gap-extended">
                                    <div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-2c4c081 elementor-invisible" data-id="2c4c081" data-element_type="column" data-settings="{&quot;animation&quot;:&quot;slide-up&quot;}">
                                        <div class="elementor-widget-wrap elementor-element-populated">
                                            <div class="elementor-element elementor-element-5e9a3f7 elementor-widget elementor-widget-apus_element_service_categories" data-id="5e9a3f7" data-element_type="widget" data-settings="{&quot;columns&quot;:&quot;4&quot;,&quot;columns_mobile&quot;:&quot;2&quot;}" data-widget_type="apus_element_service_categories.default">
                                                <div class="elementor-widget-container">
                                                    <div class="widget-service-categories ">
                                                        <div class="top-widget-info d-md-flex align-items-end">
                                                            <div class="inner-left">
                                                                <h2 class="widget-title">Browse Service by category</h2>
                                                                <div class="des">Get some Inspirations from 1800+ skills</div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            @foreach($index_cat as $row)
                                                                <div class="col-lg-3 col-md-6 col-6 list-item">
                                                                    <a class="category-banner-inner style3" href="{{url("service-category/".$row->url)}}">

                                                                        <div class="banner-image icon">
                                                                            <img src="{{asset('category_icons/'.$row->created_by.'/'.$row->featured_img)}}" />
                                                                        </div>
                                                                        <div class="inner">
                                                                            <div class="number"><span>{{$row->total_service}}</span> Services</div>
                                                                            <h4 class="title">
                                                                                {{$row->title}}
                                                                            </h4>
                                                                        </div>
                                                                    </a>
                                                                </div>
                                                            @endforeach

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>
                            <section class="elementor-section elementor-top-section elementor-element elementor-element-2b914e1 elementor-section-content-middle elementor-section-stretched elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="2b914e1" data-element_type="section" data-settings="{&quot;stretch_section&quot;:&quot;section-stretched&quot;,&quot;background_background&quot;:&quot;classic&quot;}">
                                <div class="elementor-container elementor-column-gap-extended">
                                    <div class="elementor-column elementor-col-50 elementor-top-column elementor-element elementor-element-829c8e5" data-id="829c8e5" data-element_type="column">
                                        <div class="elementor-widget-wrap elementor-element-populated">
                                            <div class="elementor-element elementor-element-3f2b785 elementor-invisible elementor-widget elementor-widget-image" data-id="3f2b785" data-element_type="widget" data-settings="{&quot;_animation&quot;:&quot;scale&quot;}" data-widget_type="image.default">
                                                <div class="elementor-widget-container">
                                                    <img loading="lazy" decoding="async" width="633" height="561" src="{{asset("home-assets/uploads/2022/09/h34.png")}}" class="attachment-large size-large wp-image-460" alt="" srcset="home-assets/uploads/2022/09/h34.png 633w, home-assets/uploads/2022/09/h34-300x266.png 300w, home-assets/uploads/2022/09/h34-600x532.png 600w" sizes="(max-width: 633px) 100vw, 633px" />													</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="elementor-column elementor-col-50 elementor-top-column elementor-element elementor-element-6645145" data-id="6645145" data-element_type="column">
                                        <div class="elementor-widget-wrap elementor-element-populated">
                                            <div class="elementor-element elementor-element-1689e5b elementor-widget__width-initial elementor-invisible elementor-widget elementor-widget-heading" data-id="1689e5b" data-element_type="widget" data-settings="{&quot;_animation&quot;:&quot;slide-left&quot;,&quot;_animation_delay&quot;:150}" data-widget_type="heading.default">
                                                <div class="elementor-widget-container">
                                                    <h2 class="elementor-heading-title elementor-size-default">Trusted By Best
                                                        Freelancer</h2>
                                                </div>
                                            </div>
                                            <div class="elementor-element elementor-element-3210101 elementor-widget__width-initial elementor-invisible elementor-widget elementor-widget-text-editor" data-id="3210101" data-element_type="widget" data-settings="{&quot;_animation&quot;:&quot;slide-left&quot;,&quot;_animation_delay&quot;:300}" data-widget_type="text-editor.default">
                                                <div class="elementor-widget-container">
                                                    We specialize in providing top-notch virtual assistance services to businesses of all sizes. With a team of experienced professionals, we are dedicated to helping our clients achieve their goals by offering efficient, cost-effective, and personalized virtual assistance solutions.
                                                </div>
                                            </div>
                                            <div class="elementor-element elementor-element-368fbfb elementor-invisible elementor-widget elementor-widget-text-editor" data-id="368fbfb" data-element_type="widget" data-settings="{&quot;_animation&quot;:&quot;slide-left&quot;,&quot;_animation_delay&quot;:450}" data-widget_type="text-editor.default">
                                                <div class="elementor-widget-container">
                                                    <ul class="tick-2 st-yellow">
                                                        <li><i class="flaticon-tick"></i>Experienced professionals with expertise in diverse domains</li>
                                                        <li><i class="flaticon-tick"></i>Customized solutions tailored to your specific requirements</li>
                                                        <li><i class="flaticon-tick"></i>Ability to communicate effectively</li>
                                                        <li><i class="flaticon-tick"></i>Intrisic attention to detail</li>
                                                    </ul>						</div>
                                            </div>
                                            <div class="elementor-element elementor-element-73cf442 elementor-invisible elementor-widget elementor-widget-button" data-id="73cf442" data-element_type="widget" data-settings="{&quot;_animation&quot;:&quot;slide-left&quot;,&quot;_animation_delay&quot;:600}" data-widget_type="button.default">
                                                <div class="elementor-widget-container">
                                                    <div class="elementor-button-wrapper">
                                                        <a class="elementor-button elementor-button-link elementor-size-sm" href="{{url('/freelancers')}}">
                                                            <span class="elementor-button-content-wrapper">
                                                            <span class="elementor-button-icon elementor-align-icon-right">
                                                                </span>
                                                                        <span class="elementor-button-text">See More</span>
                                                        </span>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>
                           <br />

                            <section class="elementor-section elementor-top-section elementor-element elementor-element-45d2670 elementor-section-stretched elementor-section-boxed elementor-section-height-default elementor-section-height-default elementor-invisible" data-id="45d2670" data-element_type="section" data-settings="{&quot;stretch_section&quot;:&quot;section-stretched&quot;,&quot;animation&quot;:&quot;slide-up&quot;}">
                                <div class="elementor-container elementor-column-gap-extended">
                                    <div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-de3ba20" data-id="de3ba20" data-element_type="column">
                                        <div class="elementor-widget-wrap elementor-element-populated">
                                            <div class="elementor-element elementor-element-b2eac18 elementor-widget elementor-widget-apus_element_freeio_freelancers" data-id="b2eac18" data-element_type="widget" data-settings="{&quot;columns&quot;:&quot;4&quot;,&quot;slides_to_scroll&quot;:1}" data-widget_type="apus_element_freeio_freelancers.default">
                                                <div class="elementor-widget-container">
                                                    <div class="widget-freelancers carousel ">
                                                        <div class="top-widget-info d-md-flex align-items-end">
                                                            <div class="inner-left">
                                                                <h2 class="widget-title">Highest Rated Freelancers</h2>
                                                                <div class="des">Get access to the best virtual assistance around the world</div>
                                                            </div>
                                                            <div class="view_more ms-auto">
                                                                <a href="#" class="btn btn-small btn-theme-rgba10 radius-50">
                                                                    All Freelancers<i class="flaticon-right-up next"></i>
                                                                </a>
                                                            </div>
                                                        </div>
                                                        <div class="widget-content">
                                                            <div class="slick-carousel                         "
                                                                 data-items="4"
                                                                 data-large="2"
                                                                 data-medium="2"
                                                                 data-small="1"
                                                                 data-smallest="1"

                                                                 data-slidestoscroll="1"
                                                                 data-slidestoscroll_large="1"
                                                                 data-slidestoscroll_medium="1"
                                                                 data-slidestoscroll_small="1"
                                                                 data-slidestoscroll_smallest="1"

                                                                 data-pagination="true"
                                                                 data-nav="false"
                                                                 data-rows="1"
                                                                 data-infinite="true"
                                                                 data-autoplay="true">

                                                                @foreach(\App\Models\User::query()->where('is_admin',0)->where('is_feature',1)->limit(12)->get() as $row)
                                                                <div class="item">

                                                                    <article id="post-4100" class="map-item freelancer-card post-4100 freelancer type-freelancer status-publish has-post-thumbnail hentry location-new-york freelancer_category-digital-marketing freelancer_category-graphics-design freelancer_tag-design-writing freelancer_tag-html5 freelancer_tag-prototyping" data-latitude="40.7344656879219" data-longitude="-73.95750712673748" data-img="https://demoapus1.com/freeio-new/wp-content/uploads/2022/10/12-150x150.jpg" data-logo="https://demoapus1.com/freeio-new/wp-content/uploads/2022/10/12-150x150.jpg">
                                                                        <div class="freelancer-item position-relative">
                                                                            <div class="freelancer-logo d-flex align-items-center">
                                                                                <a href="{{url('user/'.$row->identity)}}">
                                                                                    <div class="image-wrapper">

                                                                                        @if(!empty($row->profile_image))
                                                                                            <img decoding="async" width="150" height="150"
                                                                                                 src="{{asset('profile/photo/'.$row->id.'/'.$row->profile_image)}}"
                                                                                                 class="attachment-thumbnail size-thumbnail"
                                                                                                 alt=""
                                                                                                 srcset="{{asset('profile/photo/'.$row->id.'/'.$row->profile_image)}}"
                                                                                                 sizes="(max-width: 150px) 100vw, 150px">
                                                                                        @else

                                                                                            <a href="#">
                                                                                                <img src="{{asset('icon_02.jpeg')}}" alt="image"></a>
                                                                                        @endif
                                                                                    </div>
                                                                                </a>

                                                                            </div>
                                                                            <div class="inner-bottom">
                                                                                <div class="text-center">
                                                                                    <h2 class="freelancer-title">
                                                                                        <a href="{{url('user/'.$row->identity)}}" rel="bookmark">
                                                                                            {{$row->full_name}}
                                                                                        </a>
                                                                                    </h2>

                                                                                    <div class="freelancer-job">
                                                                                        {{$row->business_category}}
                                                                                    </div>
                                                                                    <div class="rating-reviews">
                                                                                        <i class="fa fa-star"></i>
                                                                                        <span class="rating text-link">4.0</span>
                                                                                        <span class="text">(1 Review)</span>        </div>


                                                                                </div>
                                                                                <div class="freelancer-metas d-flex align-items-center">
                                                                                    <div class="freelancer-location with-title">
                                                                                        <strong>Location:</strong>
                                                                                        {{$row->state}}
                                                                                    </div>
                                                                                    <div class="freelancer-salary with-title">
                                                                                        <strong>Rate:</strong>
                                                                                        <span>
                                                                    <span class="woocommerce-Price-amount amount">
                                                                        <bdi>
                                                                            <span
                                                                                class="woocommerce-Price-currencySymbol"> ₦</span>
                                                                            <span
                                                                                class="price-text">0</span>
                                                                        </bdi>
                                                                    </span>
                                                                </span>
                                                                                    </div>
                                                                                </div>

                                                                                <div class="freelancer-link">
                                                                                    <a href="{{url('user/'.$row->identity)}}" class="btn btn-theme-rgba10 w-100 radius-sm">View Profile <i class="next flaticon-right-up"></i></a>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </article><!-- #post-## -->
                                                                </div>
                                                                @endforeach

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>


                            <section class="elementor-section elementor-top-section elementor-element elementor-element-7162a28 elementor-section-stretched elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="7162a28" data-element_type="section" data-settings="{&quot;stretch_section&quot;:&quot;section-stretched&quot;}">
                                <div class="elementor-container elementor-column-gap-no">
                                    <div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-b0a2182" data-id="b0a2182" data-element_type="column">
                                        <div class="elementor-widget-wrap elementor-element-populated">
                                            <section class="elementor-section elementor-inner-section elementor-element elementor-element-fd9b29e elementor-section-content-middle elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="fd9b29e" data-element_type="section" data-settings="{&quot;background_background&quot;:&quot;classic&quot;}">
                                                <div class="elementor-container elementor-column-gap-extended">
                                                    <div class="elementor-column elementor-col-50 elementor-inner-column elementor-element elementor-element-42b4cf3" data-id="42b4cf3" data-element_type="column">
                                                        <div class="elementor-widget-wrap elementor-element-populated">
                                                            <div class="elementor-element elementor-element-530b5a9 elementor-widget__width-initial elementor-invisible elementor-widget elementor-widget-heading" data-id="530b5a9" data-element_type="widget" data-settings="{&quot;_animation&quot;:&quot;slide-up&quot;}" data-widget_type="heading.default">
                                                                <div class="elementor-widget-container">
                                                                    <h2 class="elementor-heading-title elementor-size-default">Advantages Of Working With A Virtual Assistant</h2>		</div>
                                                            </div>
                                                            <div class="elementor-element elementor-element-73ee79b elementor-widget__width-initial elementor-invisible elementor-widget elementor-widget-apus_element_features_box" data-id="73ee79b" data-element_type="widget" data-settings="{&quot;_animation&quot;:&quot;slide-up&quot;,&quot;_animation_delay&quot;:100}" data-widget_type="apus_element_features_box.default">
                                                                <div class="elementor-widget-container">
                                                                    <div class="widget-features-box ">
                                                                        <div class="row">
                                                                            <div class="item col-12 col-md-12 col-lg-12">
                                                                                <div class="item-features-inner style2">
                                                                                    <div class="top-inner position-relative">
                                                                                        <div class="features-box-image icon"><i class="flaticon-badge"></i></div></div><div class="features-box-content"><h3 class="title">Increased Productivity</h3><div class="description"> By delegating repetitive or low-value tasks to a virtual assistant, you can increase your overall productivity and focus on high-priority tasks that drive business growth.</div></div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="elementor-element elementor-element-ecd6ed5 elementor-widget__width-initial elementor-invisible elementor-widget elementor-widget-apus_element_features_box" data-id="ecd6ed5" data-element_type="widget" data-settings="{&quot;_animation&quot;:&quot;slide-up&quot;,&quot;_animation_delay&quot;:200}" data-widget_type="apus_element_features_box.default">
                                                                <div class="elementor-widget-container">
                                                                    <div class="widget-features-box ">
                                                                        <div class="row">
                                                                            <div class="item col-12 col-md-12 col-lg-12">
                                                                                <div class="item-features-inner style2">
                                                                                    <div class="top-inner position-relative">
                                                                                        <div class="features-box-image icon"><i class="flaticon-money"></i></div></div><div class="features-box-content"><h3 class="title">Cost-Effectiveness</h3><div class="description">Hiring a virtual assistant can be more cost-effective than hiring a full-time employee. You can save on expenses such as office space, equipment, and benefits.</div></div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="elementor-element elementor-element-c0f0e33 elementor-widget__width-initial elementor-invisible elementor-widget elementor-widget-apus_element_features_box" data-id="c0f0e33" data-element_type="widget" data-settings="{&quot;_animation&quot;:&quot;slide-up&quot;,&quot;_animation_delay&quot;:300}" data-widget_type="apus_element_features_box.default">
                                                                <div class="elementor-widget-container">
                                                                    <div class="widget-features-box ">
                                                                        <div class="row">
                                                                            <div class="item col-12 col-md-12 col-lg-12">
                                                                                <div class="item-features-inner style2">
                                                                                    <div class="top-inner position-relative">
                                                                                        <div class="features-box-image icon"><i class="flaticon-secure"></i></div></div><div class="features-box-content"><h3 class="title">Time Savings:</h3><div class="description">Virtual assistants can handle time-consuming tasks such as administrative work, email management, and scheduling, freeing up your time to focus on core business activities.</div></div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="elementor-column elementor-col-50 elementor-inner-column elementor-element elementor-element-3de5850" data-id="3de5850" data-element_type="column">
                                                        <div class="elementor-widget-wrap elementor-element-populated">
                                                            <div class="elementor-element elementor-element-da4e9be elementor-invisible elementor-widget elementor-widget-image" data-id="da4e9be" data-element_type="widget" data-settings="{&quot;_animation&quot;:&quot;scale&quot;,&quot;_animation_delay&quot;:500}" data-widget_type="image.default">
                                                                <div class="elementor-widget-container">
                                                                    <img loading="lazy" decoding="async" width="776" height="700" src="home-assets/uploads/2022/09/h1.jpg" class="attachment-full size-full wp-image-129" alt="" srcset="home-assets/uploads/2022/09/h1.jpg 776w, home-assets/uploads/2022/09/h1-300x271.jpg 300w, home-assets/uploads/2022/09/h1-768x693.jpg 768w, home-assets/uploads/2022/09/h1-600x541.jpg 600w" sizes="(max-width: 776px) 100vw, 776px" />													</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </section>
                                        </div>
                                    </div>
                                </div>
                            </section>
                            <section class="elementor-section elementor-top-section elementor-element elementor-element-f6e1e19 elementor-section-content-bottom elementor-section-stretched elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="f6e1e19" data-element_type="section" data-settings="{&quot;stretch_section&quot;:&quot;section-stretched&quot;}">
                                <div class="elementor-container elementor-column-gap-extended">
                                    <div class="elementor-column elementor-col-50 elementor-top-column elementor-element elementor-element-efc3bd9 elementor-hidden-tablet elementor-hidden-mobile" data-id="efc3bd9" data-element_type="column">
                                        <div class="elementor-widget-wrap elementor-element-populated">
                                            <div class="elementor-element elementor-element-3997201 elementor-invisible elementor-widget elementor-widget-image" data-id="3997201" data-element_type="widget" data-settings="{&quot;_animation&quot;:&quot;scale&quot;}" data-widget_type="image.default">
                                                <div class="elementor-widget-container">
                                                    <img loading="lazy" decoding="async" width="448" height="520" src="{{asset("home-assets/uploads/2022/09/h35.png")}}" class="attachment-full size-full wp-image-495" alt="" srcset="{{asset("home-assets/uploads/2022/09/h35.png")}} 448w, {{asset("home-assets/uploads/2022/09/h35-258x300.png")}} 258w" sizes="(max-width: 448px) 100vw, 448px" />													</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="elementor-column elementor-col-50 elementor-top-column elementor-element elementor-element-098a945" data-id="098a945" data-element_type="column">
                                        <div class="elementor-widget-wrap elementor-element-populated">
                                            <div class="elementor-element elementor-element-4a49e4c elementor-invisible elementor-widget elementor-widget-apus_element_testimonials" data-id="4a49e4c" data-element_type="widget" data-settings="{&quot;_animation&quot;:&quot;slide-left&quot;,&quot;_animation_delay&quot;:200,&quot;columns&quot;:1}" data-widget_type="apus_element_testimonials.default">
                                                <div class="elementor-widget-container">
                                                    <div class="widget-testimonials  style3  nofullscreen">

                                                        <div class="slick-carousel testimonial-main " data-items="1" data-large="1" data-medium="1" data-small="1" data-smallest="1" data-pagination="true" data-nav="false" data-infinite="true">
                                                            <div class="item">

                                                                <div class="testimonials-item3">
                                                                    <div class="d-flex align-items-center">
                                                                        <div class="info-testimonials flex-grow-1">

                                                                            <h3 class="title">Elizabeth </h3>
                                                                            <div class="description">“ Working with a virtual assistant from Swift Edge has been an absolute game-changer for my business. Their professionalism, efficiency, and attention to detail have greatly enhanced my productivity and allowed me to focus on growing my company. I highly recommend their services to anyone seeking reliable virtual assistance. ”</div>
                                                                            <h3 class="name-client">Elizabeth Okonkwo</h3>                                                                                                                            <div class="job">Product Manager </div>

                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="item">

                                                                <div class="testimonials-item3">
                                                                    <div class="d-flex align-items-center">
                                                                        <div class="info-testimonials flex-grow-1">

                                                                            <h3 class="title">Adekunle</h3>
                                                                            <div class="description">“ As a freelancer, my collaboration with Swift Edge Virtual Assistance has truly transformed my professional journey. Their tailored approach, combined with a deep understanding of my needs, has not only elevated my productivity but also empowered me to exceed client expectations.  ”</div>
                                                                            <h3 class="name-client">Adekunle Peter</h3>                                                                                                                            <div class="job">Freelancer</div>

                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="item">

                                                                <div class="testimonials-item3">
                                                                    <div class="d-flex align-items-center">
                                                                        <div class="info-testimonials flex-grow-1">

                                                                            <h3 class="title">Salvation  </h3>
                                                                            <div class="description">“ With Swift Edge by my side, I've unlocked new levels of efficiency and effectiveness in my freelance endeavors, making every project a remarkable success ”</div>
                                                                            <h3 class="name-client">Salvation Alibor</h3>
                                                                            <div class="job">Digital Marketer</div>

                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="item">

                                                                <div class="testimonials-item3">
                                                                    <div class="d-flex align-items-center">
                                                                        <div class="info-testimonials flex-grow-1">

                                                                            <h3 class="title">Henry</h3>
                                                                            <div class="description">“ With Swift Edge handling key aspects of our workload, we've experienced increased efficiency, reduced overhead costs, and more time to focus on core business objectives.  ”</div>
                                                                            <h3 class="name-client">Henry Peter</h3>
                                                                            <div class="job">Digital Marketer</div>

                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>
                            <section class="elementor-section elementor-top-section elementor-element elementor-element-b90a2f6 elementor-section-stretched elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="b90a2f6" data-element_type="section" data-settings="{&quot;stretch_section&quot;:&quot;section-stretched&quot;,&quot;background_background&quot;:&quot;classic&quot;}">
                                <div class="elementor-container elementor-column-gap-no">
                                    <div class="elementor-column elementor-col-50 elementor-top-column elementor-element elementor-element-1bf5229" data-id="1bf5229" data-element_type="column">
                                        <div class="elementor-widget-wrap elementor-element-populated">
                                            <div class="elementor-element elementor-element-539450e elementor-invisible elementor-widget elementor-widget-heading" data-id="539450e" data-element_type="widget" data-settings="{&quot;_animation&quot;:&quot;slide-up&quot;}" data-widget_type="heading.default">
                                                <div class="elementor-widget-container">
                                                    <h2 class="elementor-heading-title elementor-size-default">Need something done?</h2>		</div>
                                            </div>
                                            <div class="elementor-element elementor-element-2c0e72c elementor-invisible elementor-widget elementor-widget-text-editor" data-id="2c0e72c" data-element_type="widget" data-settings="{&quot;_animation&quot;:&quot;slide-up&quot;}" data-widget_type="text-editor.default">
                                                <div class="elementor-widget-container">
                                                    Most viewed and all-time top-selling services						</div>
                                            </div>
                                            <section class="elementor-section elementor-inner-section elementor-element elementor-element-addf82a elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="addf82a" data-element_type="section">
                                                <div class="elementor-container elementor-column-gap-extended">
                                                    <div class="elementor-column elementor-col-33 elementor-inner-column elementor-element elementor-element-e48ded4 elementor-invisible" data-id="e48ded4" data-element_type="column" data-settings="{&quot;background_background&quot;:&quot;classic&quot;,&quot;animation&quot;:&quot;slide-up&quot;}">
                                                        <div class="elementor-widget-wrap elementor-element-populated">
                                                            <div class="elementor-element elementor-element-a2c48bc elementor-widget elementor-widget-apus_element_features_box" data-id="a2c48bc" data-element_type="widget" data-widget_type="apus_element_features_box.default">
                                                                <div class="elementor-widget-container">
                                                                    <div class="widget-features-box ">
                                                                        <div class="row">
                                                                            <div class="item col-12 col-md-12 col-lg-12">
                                                                                <div class="item-features-inner style1">
                                                                                    <div class="top-inner position-relative">
                                                                                        <div class="features-box-image icon"><i class="flaticon-cv"></i></div></div><div class="features-box-content"><h3 class="title">Post a job</h3><div class="description">It’s free and easy to post a job. Simply fill in a title, description.</div></div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="elementor-column elementor-col-33 elementor-inner-column elementor-element elementor-element-7392ead elementor-invisible" data-id="7392ead" data-element_type="column" data-settings="{&quot;background_background&quot;:&quot;classic&quot;,&quot;animation&quot;:&quot;slide-up&quot;,&quot;animation_delay&quot;:200}">
                                                        <div class="elementor-widget-wrap elementor-element-populated">
                                                            <div class="elementor-element elementor-element-5a07744 elementor-widget elementor-widget-apus_element_features_box" data-id="5a07744" data-element_type="widget" data-widget_type="apus_element_features_box.default">
                                                                <div class="elementor-widget-container">
                                                                    <div class="widget-features-box ">
                                                                        <div class="row">
                                                                            <div class="item col-12 col-md-12 col-lg-12">
                                                                                <div class="item-features-inner style1">
                                                                                    <div class="top-inner position-relative">
                                                                                        <div class="features-box-image icon"><i class="flaticon-web-design"></i></div></div><div class="features-box-content"><h3 class="title">Choose freelancers</h3><div class="description">It’s free and easy to post a job. Simply fill in a title, description.</div></div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="elementor-column elementor-col-33 elementor-inner-column elementor-element elementor-element-5755674 elementor-invisible" data-id="5755674" data-element_type="column" data-settings="{&quot;background_background&quot;:&quot;classic&quot;,&quot;animation&quot;:&quot;slide-up&quot;,&quot;animation_delay&quot;:400}">
                                                        <div class="elementor-widget-wrap elementor-element-populated">
                                                            <div class="elementor-element elementor-element-0206a0f elementor-widget elementor-widget-apus_element_features_box" data-id="0206a0f" data-element_type="widget" data-widget_type="apus_element_features_box.default">
                                                                <div class="elementor-widget-container">
                                                                    <div class="widget-features-box ">
                                                                        <div class="row">
                                                                            <div class="item col-12 col-md-12 col-lg-12">
                                                                                <div class="item-features-inner style1">
                                                                                    <div class="top-inner position-relative">
                                                                                        <div class="features-box-image icon"><i class="flaticon-secure"></i></div></div><div class="features-box-content"><h3 class="title">Pay safely</h3><div class="description">It’s free and easy to post a job. Simply fill in a title, description.</div></div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </section>
                                        </div>
                                    </div>
                                    <div class="elementor-column elementor-col-50 elementor-top-column elementor-element elementor-element-c509acf elementor-hidden-tablet elementor-hidden-mobile" data-id="c509acf" data-element_type="column">
                                        <div class="elementor-widget-wrap">
                                        </div>
                                    </div>
                                </div>
                            </section>

                            <section
                                class="elementor-section elementor-top-section elementor-element elementor-element-3ed2471 elementor-section-stretched elementor-section-boxed elementor-section-height-default elementor-section-height-default"
                                data-id="3ed2471" data-element_type="section"
                                data-settings="{&quot;stretch_section&quot;:&quot;section-stretched&quot;}">
                                <div class="elementor-container elementor-column-gap-extended">
                                    <div
                                        class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-cab437d elementor-invisible"
                                        data-id="cab437d" data-element_type="column"
                                        data-settings="{&quot;animation&quot;:&quot;slide-up&quot;}">
                                        <div class="elementor-widget-wrap elementor-element-populated">
                                            <div
                                                class="elementor-element elementor-element-5cd74c6 elementor-widget elementor-widget-heading"
                                                data-id="5cd74c6" data-element_type="widget"
                                                data-widget_type="heading.default">
                                                <div class="elementor-widget-container">
                                                    <h2 class="elementor-heading-title elementor-size-default">
                                                        Frequently Asked Questions</h2></div>
                                            </div>
                                            <div
                                                class="elementor-element elementor-element-a8f3911 elementor-widget elementor-widget-text-editor"
                                                data-id="a8f3911" data-element_type="widget"
                                                data-widget_type="text-editor.default">
                                                <div class="elementor-widget-container">
                                                    Lorem ipsum dolor sit amet, consectetur.
                                                </div>
                                            </div>
                                            <div
                                                class="elementor-element elementor-element-8b53871 elementor-widget__width-initial st-green elementor-widget elementor-widget-accordion"
                                                data-id="8b53871" data-element_type="widget"
                                                data-widget_type="accordion.default">
                                                <div class="elementor-widget-container">
                                                    <style>/*! elementor - v3.21.0 - 24-04-2024 */
                                                        .elementor-accordion {
                                                            text-align: start
                                                        }

                                                        .elementor-accordion .elementor-accordion-item {
                                                            border: 1px solid #d5d8dc
                                                        }

                                                        .elementor-accordion .elementor-accordion-item + .elementor-accordion-item {
                                                            border-top: none
                                                        }

                                                        .elementor-accordion .elementor-tab-title {
                                                            margin: 0;
                                                            padding: 15px 20px;
                                                            font-weight: 700;
                                                            line-height: 1;
                                                            cursor: pointer;
                                                            outline: none
                                                        }

                                                        .elementor-accordion .elementor-tab-title .elementor-accordion-icon {
                                                            display: inline-block;
                                                            width: 1.5em
                                                        }

                                                        .elementor-accordion .elementor-tab-title .elementor-accordion-icon svg {
                                                            width: 1em;
                                                            height: 1em
                                                        }

                                                        .elementor-accordion .elementor-tab-title .elementor-accordion-icon.elementor-accordion-icon-right {
                                                            float: right;
                                                            text-align: right
                                                        }

                                                        .elementor-accordion .elementor-tab-title .elementor-accordion-icon.elementor-accordion-icon-left {
                                                            float: left;
                                                            text-align: left
                                                        }

                                                        .elementor-accordion .elementor-tab-title .elementor-accordion-icon .elementor-accordion-icon-closed {
                                                            display: block
                                                        }

                                                        .elementor-accordion .elementor-tab-title .elementor-accordion-icon .elementor-accordion-icon-opened, .elementor-accordion .elementor-tab-title.elementor-active .elementor-accordion-icon-closed {
                                                            display: none
                                                        }

                                                        .elementor-accordion .elementor-tab-title.elementor-active .elementor-accordion-icon-opened {
                                                            display: block
                                                        }

                                                        .elementor-accordion .elementor-tab-content {
                                                            display: none;
                                                            padding: 15px 20px;
                                                            border-top: 1px solid #d5d8dc
                                                        }

                                                        @media (max-width: 767px) {
                                                            .elementor-accordion .elementor-tab-title {
                                                                padding: 12px 15px
                                                            }

                                                            .elementor-accordion .elementor-tab-title .elementor-accordion-icon {
                                                                width: 1.2em
                                                            }

                                                            .elementor-accordion .elementor-tab-content {
                                                                padding: 7px 15px
                                                            }
                                                        }

                                                        .e-con-inner > .elementor-widget-accordion, .e-con > .elementor-widget-accordion {
                                                            width: var(--container-widget-width);
                                                            --flex-grow: var(--container-widget-flex-grow)
                                                        }</style>
                                                    <div class="elementor-accordion">
                                                        <div class="elementor-accordion-item">
                                                            <div id="elementor-tab-title-1461"
                                                                 class="elementor-tab-title" data-tab="1" role="button"
                                                                 aria-controls="elementor-tab-content-1461"
                                                                 aria-expanded="false">
													<span
                                                        class="elementor-accordion-icon elementor-accordion-icon-right"
                                                        aria-hidden="true">
															<span class="elementor-accordion-icon-closed"><i
                                                                    class="fas fa-plus"></i></span>
								<span class="elementor-accordion-icon-opened"><i class="fas fa-minus"></i></span>
														</span>
                                                                <a class="elementor-accordion-title" tabindex="0">What
                                                                    methods of payments are supported?</a>
                                                            </div>
                                                            <div id="elementor-tab-content-1461"
                                                                 class="elementor-tab-content elementor-clearfix"
                                                                 data-tab="1" role="region"
                                                                 aria-labelledby="elementor-tab-title-1461">Cras vitae
                                                                ac nunc orci. Purus amet tortor non at phasellus
                                                                ultricies hendrerit. Eget a, sit morbi nunc sit id
                                                                massa. Metus, scelerisque volutpat nec sit vel donec.
                                                                Sagittis, id volutpat erat vel.
                                                            </div>
                                                        </div>
                                                        <div class="elementor-accordion-item">
                                                            <div id="elementor-tab-title-1462"
                                                                 class="elementor-tab-title" data-tab="2" role="button"
                                                                 aria-controls="elementor-tab-content-1462"
                                                                 aria-expanded="false">
													<span
                                                        class="elementor-accordion-icon elementor-accordion-icon-right"
                                                        aria-hidden="true">
															<span class="elementor-accordion-icon-closed"><i
                                                                    class="fas fa-plus"></i></span>
								<span class="elementor-accordion-icon-opened"><i class="fas fa-minus"></i></span>
														</span>
                                                                <a class="elementor-accordion-title" tabindex="0">Can I
                                                                    cancel at anytime?</a>
                                                            </div>
                                                            <div id="elementor-tab-content-1462"
                                                                 class="elementor-tab-content elementor-clearfix"
                                                                 data-tab="2" role="region"
                                                                 aria-labelledby="elementor-tab-title-1462">Lorem ipsum
                                                                dolor sit amet, consectetur adipiscing elit, sed do
                                                                eiusmod tempor incididunt ut labore et dolore magna
                                                                aliqua. Ut enim ad minim veniam, quis nostrud
                                                                exercitation ullamco laboris nisi ut aliquip ex ea
                                                                commodo consequat. Duis aute irure dolor in
                                                                reprehenderit in voluptate velit esse cillum dolore eu
                                                                fugiat nulla pariatur.
                                                            </div>
                                                        </div>
                                                        <div class="elementor-accordion-item">
                                                            <div id="elementor-tab-title-1463"
                                                                 class="elementor-tab-title" data-tab="3" role="button"
                                                                 aria-controls="elementor-tab-content-1463"
                                                                 aria-expanded="false">
													<span
                                                        class="elementor-accordion-icon elementor-accordion-icon-right"
                                                        aria-hidden="true">
															<span class="elementor-accordion-icon-closed"><i
                                                                    class="fas fa-plus"></i></span>
								<span class="elementor-accordion-icon-opened"><i class="fas fa-minus"></i></span>
														</span>
                                                                <a class="elementor-accordion-title" tabindex="0">How do
                                                                    I get a receipt for my purchase?</a>
                                                            </div>
                                                            <div id="elementor-tab-content-1463"
                                                                 class="elementor-tab-content elementor-clearfix"
                                                                 data-tab="3" role="region"
                                                                 aria-labelledby="elementor-tab-title-1463">Cras vitae
                                                                ac nunc orci. Purus amet tortor non at phasellus
                                                                ultricies hendrerit. Eget a, sit morbi nunc sit id
                                                                massa. Metus, scelerisque volutpat nec sit vel donec.
                                                                Sagittis, id volutpat erat vel.
                                                            </div>
                                                        </div>
                                                        <div class="elementor-accordion-item">
                                                            <div id="elementor-tab-title-1464"
                                                                 class="elementor-tab-title" data-tab="4" role="button"
                                                                 aria-controls="elementor-tab-content-1464"
                                                                 aria-expanded="false">
													<span
                                                        class="elementor-accordion-icon elementor-accordion-icon-right"
                                                        aria-hidden="true">
															<span class="elementor-accordion-icon-closed"><i
                                                                    class="fas fa-plus"></i></span>
								<span class="elementor-accordion-icon-opened"><i class="fas fa-minus"></i></span>
														</span>
                                                                <a class="elementor-accordion-title" tabindex="0">Which
                                                                    license do I need?</a>
                                                            </div>
                                                            <div id="elementor-tab-content-1464"
                                                                 class="elementor-tab-content elementor-clearfix"
                                                                 data-tab="4" role="region"
                                                                 aria-labelledby="elementor-tab-title-1464">Lorem ipsum
                                                                dolor sit amet, consectetur adipiscing elit, sed do
                                                                eiusmod tempor incididunt ut labore et dolore magna
                                                                aliqua. Ut enim ad minim veniam, quis nostrud
                                                                exercitation ullamco laboris nisi ut aliquip ex ea
                                                                commodo consequat.
                                                            </div>
                                                        </div>
                                                        <div class="elementor-accordion-item">
                                                            <div id="elementor-tab-title-1465"
                                                                 class="elementor-tab-title" data-tab="5" role="button"
                                                                 aria-controls="elementor-tab-content-1465"
                                                                 aria-expanded="false">
													<span
                                                        class="elementor-accordion-icon elementor-accordion-icon-right"
                                                        aria-hidden="true">
															<span class="elementor-accordion-icon-closed"><i
                                                                    class="fas fa-plus"></i></span>
								<span class="elementor-accordion-icon-opened"><i class="fas fa-minus"></i></span>
														</span>
                                                                <a class="elementor-accordion-title" tabindex="0">How do
                                                                    I get access to a theme I purchased?</a>
                                                            </div>
                                                            <div id="elementor-tab-content-1465"
                                                                 class="elementor-tab-content elementor-clearfix"
                                                                 data-tab="5" role="region"
                                                                 aria-labelledby="elementor-tab-title-1465">Cras vitae
                                                                ac nunc orci. Purus amet tortor non at phasellus
                                                                ultricies hendrerit. Eget a, sit morbi nunc sit id
                                                                massa. Metus, scelerisque volutpat nec sit vel donec.
                                                                Sagittis, id volutpat erat vel.
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>

                            <section class="elementor-section elementor-top-section elementor-element elementor-element-b1f1ad6 elementor-section-content-middle elementor-section-stretched elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="b1f1ad6" data-element_type="section" data-settings="{&quot;stretch_section&quot;:&quot;section-stretched&quot;,&quot;background_background&quot;:&quot;classic&quot;}">
                                <div class="elementor-container elementor-column-gap-extended">
                                    <div class="elementor-column elementor-col-50 elementor-top-column elementor-element elementor-element-0ab5f5e" data-id="0ab5f5e" data-element_type="column">
                                        <div class="elementor-widget-wrap elementor-element-populated">
                                            <div class="elementor-element elementor-element-92c8dce elementor-widget__width-initial elementor-invisible elementor-widget elementor-widget-heading" data-id="92c8dce" data-element_type="widget" data-settings="{&quot;_animation&quot;:&quot;slide-up&quot;}" data-widget_type="heading.default">
                                                <div class="elementor-widget-container">
                                                    <h2 class="elementor-heading-title elementor-size-default">Find the talent needed to get your business growing.</h2>
                                                </div>
                                            </div>
                                            <div class="elementor-element elementor-element-933fad2 elementor-invisible elementor-widget elementor-widget-text-editor" data-id="933fad2" data-element_type="widget" data-settings="{&quot;_animation&quot;:&quot;slide-up&quot;}" data-widget_type="text-editor.default">
                                                <div class="elementor-widget-container">
                                                    Advertise your jobs to millions of monthly users and search 15.8 million CVs
                                                </div>
                                            </div>
                                            <div class="elementor-element elementor-element-b0ce467 elementor-invisible elementor-widget elementor-widget-button" data-id="b0ce467" data-element_type="widget" data-settings="{&quot;_animation&quot;:&quot;slide-up&quot;}" data-widget_type="button.default">
                                                <div class="elementor-widget-container">
                                                    <div class="elementor-button-wrapper">
                                                        <a class="elementor-button elementor-button-link elementor-size-sm" href="{{url('register')}}">
                                                            <span class="elementor-button-content-wrapper">
                                                            <span class="elementor-button-icon elementor-align-icon-right">
                                                                </span>

                                                                <span class="elementor-button-text">Get Started</span>
                                                        </span>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="elementor-column elementor-col-50 elementor-top-column elementor-element elementor-element-b0ef9be elementor-hidden-mobile" data-id="b0ef9be" data-element_type="column">
                                        <div class="elementor-widget-wrap elementor-element-populated">
                                            <div class="elementor-element elementor-element-c79605a elementor-invisible elementor-widget elementor-widget-image" data-id="c79605a" data-element_type="widget" data-settings="{&quot;_animation&quot;:&quot;scale&quot;,&quot;_animation_delay&quot;:400}" data-widget_type="image.default">
                                                <div class="elementor-widget-container">
                                                    <img loading="lazy" decoding="async" width="588" height="524" src="{{asset("home-assets/uploads/2022/09/h36.png")}}" class="attachment-full size-full wp-image-564" alt="" srcset="{{asset("home-assets/uploads/2022/09/h36.png")}} 588w, {{asset("home-assets/uploads/2022/09/h36-300x267.png")}} 300w" sizes="(max-width: 588px) 100vw, 588px" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>

                        </div>
                    </div><!-- .site-main -->
                </div><!-- .content-area -->
            </div>
        </section>
    </div><!-- .site-content -->




@endsection
