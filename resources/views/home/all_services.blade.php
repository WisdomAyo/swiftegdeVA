
@extends('home.layouts.content')
@section('content')


    <div id="apus-main-content">
        <section id="main-container" class="page-service-board inner layout-type-default has-filter-top inline-margin-top">

            <div class="freelancers-top-content-wrapper" style="margin-bottom: 0px !important; height:150px;">
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

            <div class="layout-service-sidebar main-content p-4 inner">

                <a href="javascript:void(0)" class="mobile-sidebar-btn d-lg-none btn-left"><i class="ti-menu-alt"></i></a>
                <div class="mobile-sidebar-panel-overlay"></div>
                <div class="row">
                    @include('home.layouts.freelancer-side-bar')
                    <div id="main-content" class="col">
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
                                            <div class="item-service col-sm-3">


                                                <article class="map-item service-item post-5556 service type-service status-publish has-post-thumbnail hentry location-new-york service_category-design-creative service_category-digital-marketing is-featured" data-latitude="40.77693245895672" data-longitude="-73.9212720020022" data-img="https://demoapus1.com/freeio-new/wp-content/uploads/2022/11/service11-495x370.jpg" data-logo="https://demoapus1.com/freeio-new/wp-content/uploads/2022/11/service11-150x150.jpg">
                                                    <div class="position-relative">
                                                        <div class="service-image">
                                                            <a href="{{url('service/'.$rw->url)}}">
                                                                <div class="image-wrapper">
                                                                    @php
                                                                        $imagePath = 'artisan_services/photo/' . $rw->user_id . '/' . $rw->feature_image;
                                                                    @endphp
                                                                    
                                                                    @if(!empty($rw->feature_image) && file_exists(public_path($imagePath)))
                                                                        <img loading="lazy" decoding="async" width="495" height="370" 
                                                                             src="{{ asset($imagePath) }}" 
                                                                             class="attachment-freeio-listing-grid size-freeio-listing-grid" 
                                                                             alt="" 
                                                                             srcset="{{ asset($imagePath) }} 495w, {{ asset($imagePath) }} 300w, {{ asset($imagePath) }} 768w, {{ asset($imagePath) }} 600w" 
                                                                             sizes="(max-width: 295px) 100vw, 495px">
                                                                    @else
                                                                        <a href="#"><img src="{{ asset('services.png') }}" alt="image"></a>
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
                                                                <a href="{{url('/user/'.$rw->user->identity)}}">
                                                                    <div class="freelancer-logo d-flex align-items-center">
                                                                        <div class="image-wrapper">

                                                                            @php
                                                                                $imagePath = 'profile/photo/' . $rw->user_id . '/' . $rw->profile_image;
                                                                            @endphp
                                                                            
                                                                            @if(!empty($rw->profile_image) && file_exists(public_path($imagePath)))
                                                                                <img decoding="async" width="150" height="150"
                                                                                     src="{{ asset($imagePath) }}"
                                                                                     class="attachment-thumbnail size-thumbnail"
                                                                                     alt=""
                                                                                     srcset="{{ asset($imagePath) }}"
                                                                                     sizes="(max-width: 150px) 100vw, 150px">
                                                                            @else
                                                                                <img decoding="async" width="150" height="150"
                                                                                     src="{{ asset('freelancer.png') }}"
                                                                                     class="attachment-thumbnail size-thumbnail"
                                                                                     alt=""
                                                                                     srcset="{{ asset('freelancer.png') }}"
                                                                                     sizes="(max-width: 150px) 100vw, 150px">
                                                                            @endif


                                                                        </div>
                                                                    </div>
                                                                    <span class="text">{{ ucwords($rw->full_name) }}
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


    <div class="container pt-4 pb-5 mb-xxl-3">

        <!-- Breadcrumb -->
        <nav class="pb-2" aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="home-doctors.html">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">All Services </li>
          </ol>
        </nav>

       

        @if(!empty($category_title))
        <h1 class="h2 pb-lg-2">All Services ( {{$category_title}} )</h1>
        
        @else
        <h1 class="h2 pb-lg-2">All Services</h1>
       
        @endif

        <div class="row align-items-center g-3 gx-xl-4 mb-3 mb-sm-4">
            <div class="col-md-5 col-lg-10">
              <div class="position-relative">
                <form class="bg-white border rounded-4 p-2 mb-4 mb-md-5" data-bs-theme="light">
                    <div class="d-flex flex-column flex-md-row gap-3 p-1">
                      <div class="d-flex flex-column flex-sm-row w-100 gap-2 gap-sm-3">
                        <div class="position-relative w-100">
                          <i class="fi-search position-absolute top-50 start-0 translate-middle-y fs-xl text-secondary-emphasis ms-2"></i>
                          <input type="search" class="form-control form-control-lg form-icon-start border-0 rounded-0 pe-0" placeholder="What service do you need?" required="">
                        </div>
                        <hr class="d-sm-none m-0">
                        <hr class="vr d-none d-sm-block my-2">
                        <div class="position-relative w-100" style="max-width: 150px">
                          <i class="fi-user position-absolute top-50 start-0 translate-middle-y fs-xl text-secondary-emphasis ms-2"></i>
                          <input type="text" class="form-control form-control-lg form-icon-start border-0 rounded-0 pe-0" placeholder="Z" required="">
                        </div>
                      </div>
                      <button type="submit" class="btn btn-lg btn-primary">Search</button>
                    </div>
                  </form>
              </div>
            </div>


          </div>

          <div class="d-flex align-items-center gap-2 gap-sm-3 mb-3 mb-sm-4">
            <div class="fs-sm text-nowrap"><span class="d-none d-sm-inline">Showing </span>73 results</div>
            <div class="fs-sm fw-semibold text-dark-emphasis ms-auto d-none d-sm-inline">Sort by:</div>
            <div class="position-relative ms-auto ms-sm-0" style="width: 140px">
              <i class="fi-sort position-absolute top-50 start-0 translate-middle-y z-2"></i>
              <select class="form-select bg-transparent border-0 rounded-0 ps-4 pe-1" data-select="{
                &quot;removeItemButton&quot;: false,
                &quot;classNames&quot;: {
                  &quot;containerInner&quot;: [&quot;form-select&quot;, &quot;bg-transparent&quot;, &quot;border-0&quot;, &quot;rounded-0&quot;, &quot;ps-4&quot;, &quot;pe-1&quot;]
                }
              }">
              <option value="Popular">Popular</option>
              <option value="Rating">Rating</option>
              <option value="Price asc">Price asc</option>
              <option value="Price desc">Price desc</option>
              </select>
            </div>
            <div class="nav ms-n2">
              <a class="nav-link fs-xl text-body-secondary py-0 px-2 active pe-none" href="listings-grid-doctors.html" aria-label="Grid view">
                <i class="fi-grid"></i>
              </a>
              <a class="nav-link fs-xl text-body-secondary py-0 px-2" href="listings-list-doctors.html" aria-label="List view">
                <i class="fi-list"></i>
              </a>
            </div>
          </div>








@endsection
