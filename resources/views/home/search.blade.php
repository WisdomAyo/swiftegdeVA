
@extends('home.layouts.content')
@section('content')


    {{-- <div id="apus-main-content">
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
    </div> --}}


<div class="bg-body-tertiary">
    <div class="container pt-4 pb-5 mb-xxl-3 ">

        <!-- Breadcrumb -->
        <nav class="pb-2" aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="home-doctors.html">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Search Result</li>
          </ol>
        </nav>

        <h1 class="h2 pb-lg-2">Search Result </h1>
 
       

          <div class="d-flex align-items-center gap-2 gap-sm-3 mb-3 mb-sm-4">
            <div class="fs-sm text-nowrap"><span class="d-none d-sm-inline">Showing </span> {{$freelancers->count()}} results</div>
            
          
          
          </div>





               
                <section class="bg-body-tertiary py-2 py-sm-3 py-md-4 py-lg-5">
                    <div class="container my-xxl-3">
                      <div class="mx-n2">
                        <div class="swiper px-2 pb-4" data-swiper="{
                          &quot;slidesPerView&quot;: 1,
                          &quot;spaceBetween&quot;: 24,
                          &quot;pagination&quot;: {
                            &quot;el&quot;: &quot;.swiper-pagination&quot;,
                            &quot;clickable&quot;: true
                          },
                          &quot;breakpoints&quot;: {
                            &quot;500&quot;: {
                              &quot;slidesPerView&quot;: 2
                            },
                            &quot;992&quot;: {
                              &quot;slidesPerView&quot;: 4
                            }
                          }
                        }">
            
            
                          <div class="swiper-wrapper">
            
                            <!-- Event listing card -->
                            @foreach($freelancers as $row)
                            @php
                                $imagePath = $row->profile_image;
                            @endphp
                            @if ($row->identity)
                            <div class="swiper-slide h-auto">
                                <article class="card h-100 hover-effect-scale hover-effect-opacity border-0 shadow placeholder-wave">
                                    <div class="position-absolute  top-0 end-0 z-2 hover-effect-target  pt-1 pt-sm-0 pe-1 pe-sm-0 mt-2 mt-sm-3 me-2 me-sm-3">
                                  
                                   
                                    @if ($row->is_influencer)
                                    <span class="badge fs-xm m-2  text-bg-success">Top Influencer</span>
                                    @endif
            
                                  
                                </div>
                                <div class="bg-body-light rounded overflow-hidden">
                                  <div class="ratio hover-effect-target" style="--fn-aspect-ratio: calc(290 / 416 * 100%)">
                                    <img src="{{ !empty($row->profile_image) && file_exists(public_path($imagePath)) ? asset($imagePath) : asset('avata2r.png') }}" alt="Image" class="" style="object-fit: cover;">
                                  </div>
                                </div>
                                <div class="card-body">
                                  <ul class="list-unstyled flex-row flex-wrap align-items-center gap-2 fs-sm  placeholder-wave placeholder-glow">
                                    <li class="d-flex align-items-center fs-sm ">
                                        <i class="fi-star-filled fs-xs text-warning me-2 mb-2"> </i>
                                        <span class="fs-xs"> {{ \App\Helpers\CommonHelpers::freelancerRating( $row->id) }}.0  </span>
                                         <span class="fs-xs"> ( {{ \App\Models\ServiceRating::query()->where('service_id', $row->id)->count() }} Reviews )</span>
                                    </li>
            
            
                                    
                                <li class=" ms-auto">
                                <div class=" align-items-center fs-xs placeholder-glow">
                                <i class="fi-map-pin me-1"></i>
                                {{ $row->state->name }}
                                  </ul>
                                  <h3 class="h5 pt-1 mb-2 placeholder-glow">
                                    <a class="hover-effect-underline stretched-link" href="{{ url('user/' . $row->identity) }}">{{ ucwords($row->full_name) }} @if ($row->is_feature)
                                        <i class="fi-check-shield text-success "></i>
                                        @endif </a>
                                  </h3>
                                  <div class="d-flex align-items-center fs-sm placeholder-glow h6 bold">
                                    
                                    {{ $row->business_category }}
                                  </div>
                                </div>
                                <div class="card-footer d-flex align-items-center justify-content-between gap-3 bg-transparent border-0 pt-0 pb-1 placeholder-glow">
                                  <div class="h6 text-success mb-0">{{ $currencySymbols[$currency] }}
                                    @if ($currencySymbols[$currency] == '$')
                                    {{ $row->usd_rate }}/hr
                                    @elseif($currencySymbols[$currency] == '₦')
                                    {{ $row->ngn_rate }}/hr
                                    @elseif($currencySymbols[$currency] == '£')
                                    {{ $row->gbp_rate }}/hr
                                    @elseif($currencySymbols[$currency] == '€')
                                    {{ $row->eur_rate }}/hr
                                    
                                @endif
                                
                            </div>
                                  <a href="{{ url('user/' . $row->identity) }}"class="btn btn-outline-dark position-relative z-2 placeholder-glow">View Profile <i class="fi-arrow-right pe-1"></i></a>
                                
                                </div>
                                <hr>
                                <span class="fs-xs text-center mb-2">Joined {{ $row->created_at->diffForHumans() }}</span>
                              </article>
                            </div>
                            @endif
                            @endforeach
            
                          </div>
            
                          <!-- Pagination (Bullets) -->
                          <div class="swiper-pagination position-static mt-3 mt-md-4"></div>
                        </div>
                      </div>
            
                      <!-- View all button -->
                      <div class="text-center pt-md-2 pt-lg-3">
                        {{-- <a class="btn btn-lg btn-primary" href="/freelancers">Load More Freelancer</a> --}}
                        {{ $freelancers->links('home.util.pagination') }}
                      </div>
                    </div>
                  </section>
          </div>
        </div>
    


@endsection
