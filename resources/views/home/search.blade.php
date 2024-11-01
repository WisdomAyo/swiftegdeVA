
@extends('home.layouts.content')
@section('content')
<style>
.top-content-wrapper{
margin-bottom:0px !important;
}
@media (min-width: 1200px) {
  [class*="top-content-wrapper"] {
    margin-bottom: 0px !important;
  }
}

</style>

    <div id="apus-main-content">
    <section id="main-container" class="page-job-board inner layout-type-default inline-margin-top">

        <div class="freelancers-top-content-wrapper">
            <div data-elementor-type="section" data-elementor-id="2077" class="elementor elementor-2077">
                <section
                    class="elementor-section elementor-top-section elementor-element elementor-element-1ea5391 elementor-section-stretched elementor-section-boxed elementor-section-height-default elementor-section-height-default"
                    data-id="1ea5391" data-element_type="section"
                    data-settings="{&quot;stretch_section&quot;:&quot;section-stretched&quot;,&quot;background_background&quot;:&quot;classic&quot;}"
                    style=" left: 0px;">
                    <div class="elementor-container elementor-column-gap-extended">
                        <div
                            class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-e183e00"
                            data-id="e183e00" data-element_type="column">
                            <div class="elementor-widget-wrap elementor-element-populated">
                                <div
                                    class="elementor-element elementor-element-2d079f7 elementor-widget elementor-widget-heading"
                                    data-id="2d079f7" data-element_type="widget" data-widget_type="heading.default">
                                    <div class="elementor-widget-container">
                                        <style>/*! elementor - v3.17.0 - 08-11-2023 */
                                            .elementor-heading-title {
                                                padding: 0;
                                                margin: 0;
                                                line-height: 1
                                            }

                                            .elementor-widget-heading .elementor-heading-title[class*=elementor-size-] > a {
                                                color: inherit;
                                                font-size: inherit;
                                                line-height: inherit
                                            }

                                            .elementor-widget-heading .elementor-heading-title.elementor-size-small {
                                                font-size: 15px
                                            }

                                            .elementor-widget-heading .elementor-heading-title.elementor-size-medium {
                                                font-size: 19px
                                            }

                                            .elementor-widget-heading .elementor-heading-title.elementor-size-large {
                                                font-size: 29px
                                            }

                                            .elementor-widget-heading .elementor-heading-title.elementor-size-xl {
                                                font-size: 39px
                                            }

                                            .elementor-widget-heading .elementor-heading-title.elementor-size-xxl {
                                                font-size: 59px
                                            }</style>
                                        <h2 class="elementor-heading-title elementor-size-default">Search Results</h2>
                                    </div>
                                </div>
                                <div
                                    class="elementor-element elementor-element-4768ef7 elementor-widget elementor-widget-text-editor"
                                    data-id="4768ef7" data-element_type="widget"
                                    data-widget_type="text-editor.default">
                                    <div class="elementor-widget-container">
                                        <style>/*! elementor - v3.17.0 - 08-11-2023 */
                                            .elementor-widget-text-editor.elementor-drop-cap-view-stacked .elementor-drop-cap {
                                                background-color: #69727d;
                                                color: #fff
                                            }

                                            .elementor-widget-text-editor.elementor-drop-cap-view-framed .elementor-drop-cap {
                                                color: #69727d;
                                                border: 3px solid;
                                                background-color: transparent
                                            }

                                            .elementor-widget-text-editor:not(.elementor-drop-cap-view-default) .elementor-drop-cap {
                                                margin-top: 8px
                                            }

                                            .elementor-widget-text-editor:not(.elementor-drop-cap-view-default) .elementor-drop-cap-letter {
                                                width: 1em;
                                                height: 1em
                                            }

                                            .elementor-widget-text-editor .elementor-drop-cap {
                                                float: left;
                                                text-align: center;
                                                line-height: 1;
                                                font-size: 50px
                                            }

                                            .elementor-widget-text-editor .elementor-drop-cap-letter {
                                                display: inline-block
                                            }
                                        </style>
                                        <!--Give your visitor a smooth online experience-->
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>


        <div class="layout-freelancer-sidebar main-content inner p-4">

            <a href="javascript:void(0)" class="mobile-sidebar-btn d-lg-none btn-left"><i
                    class="ti-menu-alt"></i></a>
            <div class="mobile-sidebar-panel-overlay"></div>
            <div class="row">

                <div id="main-content" class="col-12 col-lg-12 col-12">
                    <main id="main" class="site-main layout-type-default" role="main">

                        <div class="freelancers-listing-wrapper main-items-wrapper layout-type-grid"
                             data-display_mode="grid">
                            <div class="wrapper-fillter">
                                <div class="apus-listing-filter d-sm-flex align-items-center">
                                    <div class="results-count">
                                        Showing all {{$freelancers->count()}} results
                                    </div>
                                </div>
                            </div>
                            <div class="freelancers-wrapper items-wrapper">
                                <div class="row">

                                    @foreach($freelancers as $row)
                                        <div class="col-sm-6  col-xl-3 col-12">
                                            <article id="post-4100"
                                                     class="map-item freelancer-card post-4100 freelancer type-freelancer status-publish has-post-thumbnail hentry location-new-york freelancer_category-digital-marketing freelancer_category-graphics-design freelancer_tag-design-writing freelancer_tag-html5 freelancer_tag-prototyping"
                                                     data-latitude="40.7344656879219"
                                                     data-longitude="-73.95750712673748"
                                                     data-img="https://demoapus1.com/freeio-new/wp-content/uploads/2022/10/12-150x150.jpg"
                                                     data-logo="https://demoapus1.com/freeio-new/wp-content/uploads/2022/10/12-150x150.jpg">
                                                <div class="freelancer-item position-relative">
                                                    <div class="freelancer-logo d-flex align-items-center">
                                                        <a href="#">

                                                            <div class="image-wrapper">
                                                                 @php
                                                                $imagePath = 'profile/photo/' . $row->id . '/' . $row->profile_image;
                                                            @endphp

                                                                @if (!empty($row->profile_image) && file_exists(public_path($imagePath)))
                                                                    <img decoding="async" width="150" height="150"
                                                                         src="{{asset($imagePath)}}"
                                                                         class="attachment-thumbnail size-thumbnail"
                                                                         alt=""
                                                                         srcset="{{asset($imagePath)}}"
                                                                         sizes="(max-width: 150px) 100vw, 150px">
                                                                @else

                                                                    <img decoding="async" width="150" height="150"
                                                                         src="{{asset('freelancer.png')}}"
                                                                         class="attachment-thumbnail size-thumbnail"
                                                                         alt=""
                                                                         srcset="{{asset('freelancer.png')}}"
                                                                         sizes="(max-width: 150px) 100vw, 150px">

                                                                @endif


                                                            </div>
                                                        </a>

                                                    </div>
                                                    <a href="javascript:void(0)" class="btn-add-freelancer-favorite"
                                                       data-freelancer_id="4100" data-nonce="b972fb274b"
                                                       data-toggle="tooltip" title="Add Favorite">
                                                        <i class="flaticon-like"></i>
                                                        <span>Save</span>
                                                    </a>
                                                    <div class="inner-bottom">
                                                        <div class="text-center">
                                                            <h2 class="freelancer-title">
                                                                <a href="{{url('user/'.$row->identity)}}"
                                                                   rel="bookmark">
                                                                    {{$row->full_name}}
                                                                </a>
                                                            </h2>

                                                            <div class="freelancer-job">
                                                                {{$row->business_category}}
                                                            </div>
                                                            <div class="rating-reviews">
                                                                <i class="fa fa-star"></i>
                                                                <span class="rating text-link">4.0</span>
                                                                <span class="text">(1 Review)</span>
                                                            </div>
                                                        </div>
                                                        <div class="freelancer-metas d-flex align-items-center">
                                                            <div class="freelancer-location with-title">
                                                                <strong>Location:</strong>
                                                                {{substr($row->state, 0, -5)}}
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
                                                            <a href="{{url('user/'.$row->identity)}}"
                                                               class="btn btn-theme-rgba10 w-100 radius-sm">View
                                                                Profile <i class="next flaticon-right-up"></i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </article><!-- #post-## -->
                                        </div>
                                    @endforeach

                                </div>
                            </div>


                        </div>
                        <div class="freelancers-pagination-wrapper main-pagination-wrapper">
                        </div>


                    </main><!-- .site-main -->
                </div><!-- .content-area -->

            </div>
        </div>
    </section>
    </div>


@endsection
