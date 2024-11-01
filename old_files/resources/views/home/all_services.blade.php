
@extends('home.layouts.content')
@section('content')


    <div id="apus-main-content">
        <section id="main-container" class="page-service-board inner layout-type-default has-filter-top inline-margin-top">

            <div class="freelancers-top-content-wrapper">
                <div data-elementor-type="section" data-elementor-id="2077" class="elementor elementor-2077">
                    <section class="elementor-section elementor-top-section elementor-element elementor-element-1ea5391 elementor-section-stretched elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="1ea5391" data-element_type="section" data-settings="{&quot;stretch_section&quot;:&quot;section-stretched&quot;,&quot;background_background&quot;:&quot;classic&quot;}" style="width: 1440px; left: 0px;">
                        <div class="elementor-container elementor-column-gap-extended">
                            <div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-e183e00" data-id="e183e00" data-element_type="column">
                                <div class="elementor-widget-wrap elementor-element-populated">
                                    <div class="elementor-element elementor-element-2d079f7 elementor-widget elementor-widget-heading" data-id="2d079f7" data-element_type="widget" data-widget_type="heading.default">
                                        <div class="elementor-widget-container">
                                            <style>/*! elementor - v3.17.0 - 08-11-2023 */
                                                .elementor-heading-title{padding:0;margin:0;line-height:1}.elementor-widget-heading .elementor-heading-title[class*=elementor-size-]>a{color:inherit;font-size:inherit;line-height:inherit}.elementor-widget-heading .elementor-heading-title.elementor-size-small{font-size:15px}.elementor-widget-heading .elementor-heading-title.elementor-size-medium{font-size:19px}.elementor-widget-heading .elementor-heading-title.elementor-size-large{font-size:29px}.elementor-widget-heading .elementor-heading-title.elementor-size-xl{font-size:39px}.elementor-widget-heading .elementor-heading-title.elementor-size-xxl{font-size:59px}</style>

                                            @if(!empty($category_title))
                                            <h2 class="elementor-heading-title elementor-size-default">All Services ( {{$category_title}} )</h2>
                                            @else
                                                <h2 class="elementor-heading-title elementor-size-default">All Services</h2>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="elementor-element elementor-element-4768ef7 elementor-widget elementor-widget-text-editor" data-id="4768ef7" data-element_type="widget" data-widget_type="text-editor.default">
                                        <div class="elementor-widget-container">
                                            <style>/*! elementor - v3.17.0 - 08-11-2023 */
                                                .elementor-widget-text-editor.elementor-drop-cap-view-stacked .elementor-drop-cap{background-color:#69727d;color:#fff}.elementor-widget-text-editor.elementor-drop-cap-view-framed .elementor-drop-cap{color:#69727d;border:3px solid;background-color:transparent}.elementor-widget-text-editor:not(.elementor-drop-cap-view-default) .elementor-drop-cap{margin-top:8px}.elementor-widget-text-editor:not(.elementor-drop-cap-view-default) .elementor-drop-cap-letter{width:1em;height:1em}.elementor-widget-text-editor .elementor-drop-cap{float:left;text-align:center;line-height:1;font-size:50px}.elementor-widget-text-editor .elementor-drop-cap-letter{display:inline-block}
                                            </style>
                                            Give your visitor a smooth online experience
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>

            <div class="layout-service-sidebar main-content container inner">

                <a href="javascript:void(0)" class="mobile-sidebar-btn d-lg-none btn-left"><i class="ti-menu-alt"></i></a>
                <div class="mobile-sidebar-panel-overlay"></div>
                <div class="row">
                    @include('home.layouts.freelancer-side-bar')
                    <div id="main-content" class="col-12 col-lg-9 col-sm-12 col-12">
                        <main id="main" class="site-main layout-type-default" role="main">

                            <div class="services-listing-wrapper main-items-wrapper" data-display_mode="grid">
                                <div class="wrapper-fillter"><div class="apus-listing-filter d-sm-flex align-items-center">
                                        <div class="results-count">
                                            Showing  {{$artisan_services->count()}} results
                                        </div>
                                        <div class="services-alert-ordering-wrapper">

                                        </div>
                                    </div></div>

                                <div class="services-wrapper items-wrapper">
                                    <div class="row items-wrapper-grid">
                                        @foreach($artisan_services as $rw)
                                            <div class="item-service col-md-6 col-lg-4 col-xl-4 col-12">


                                                <article class="map-item service-item post-5556 service type-service status-publish has-post-thumbnail hentry location-new-york service_category-design-creative service_category-digital-marketing is-featured" data-latitude="40.77693245895672" data-longitude="-73.9212720020022" data-img="https://demoapus1.com/freeio-new/wp-content/uploads/2022/11/service11-495x370.jpg" data-logo="https://demoapus1.com/freeio-new/wp-content/uploads/2022/11/service11-150x150.jpg">
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

                                                        <h2 class="service-title">
                                                            <a href="{{url('service/'.$rw->url)}}" rel="bookmark">{{$rw->title}}</a>
                                                        </h2>
                                                        <div class="rating-reviews">
                                                            <i class="fa fa-star"></i>
                                                            <span class="rating">{{\App\Helpers\CommonHelpers::rating($rw->id)}}.0</span>
                                                            <span class="text">({{\App\Models\ServiceRating::query()->where('service_id', $rw->id)->count()}} Reviews)</span>
                                                        </div>
                                                            <div class="info-bottom d-flex align-items-center">
                                                            <div class="service-author">
                                                                <a href="{{url('/user/'.$rw->identity)}}">
                                                                    <div class="freelancer-logo d-flex align-items-center">
                                                                        <div class="image-wrapper">

                                                                            @if(!empty($rw->profile_image))
                                                                                <img decoding="async" width="150" height="150"
                                                                                     src="{{asset('profile/photo/'.$rw->user_id.'/'.$rw->profile_image)}}"
                                                                                     class="attachment-thumbnail size-thumbnail"
                                                                                     alt=""
                                                                                     srcset="{{asset('profile/photo/'.$rw->user_id.'/'.$rw->profile_image)}}"
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
                                                                    <span class="text">{{$rw->full_name}}
                                                                </span>
                                                                </a>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </article><!-- #post-## -->

                                            </div>
                                        @endforeach

                                    </div>
                                </div>



                            </div>

                            {{ $artisan_services->links('home.util.pagination') }}



                        </main><!-- .site-main -->
                    </div><!-- .content-area -->

                </div>
            </div>
        </section>
    </div><!-- .site-content -->


@endsection
