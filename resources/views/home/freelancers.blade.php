@extends('home.layouts.content')
@section('content')
    <div id="apus-main-content">
        <section id="main-container" class="page-job-board inner layout-type-default inline-margin-top">

            <div class="freelancers-top-content-wrapper" style="margin-bottom: 0px !important; height:150px;">
                <div data-elementor-type="section" data-elementor-id="2077" class="elementor elementor-2077">
                    <section
                        class="elementor-section elementor-top-section elementor-element elementor-element-1ea5391 elementor-section-stretched elementor-section-boxed elementor-section-height-default elementor-section-height-default"
                        data-id="1ea5391" data-element_type="section"
                        data-settings="{&quot;stretch_section&quot;:&quot;section-stretched&quot;,&quot;background_background&quot;:&quot;classic&quot;}"
                        style="width: 1440px; left: 0px;">
                        <div class="elementor-container elementor-column-gap-extended">
                            <div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-e183e00"
                                data-id="e183e00" data-element_type="column">
                                <div class="elementor-widget-wrap elementor-element-populated">
                                    <div class="elementor-element elementor-element-2d079f7 elementor-widget elementor-widget-heading"
                                        data-id="2d079f7" data-element_type="widget" data-widget_type="heading.default">
                                        <div class="elementor-widget-container">
                                            <style>
                                                /*! elementor - v3.17.0 - 08-11-2023 */
                                                .elementor-heading-title {
                                                    padding: 0;
                                                    margin: 0;
                                                    line-height: 1
                                                }

                                                .elementor-widget-heading .elementor-heading-title[class*=elementor-size-]>a {
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
                                                }
                                            </style>
                                            <h2 class="elementor-heading-title elementor-size-default">All
                                                Freelancers</h2>
                                        </div>
                                    </div>
                                    <div class="elementor-element elementor-element-4768ef7 elementor-widget elementor-widget-text-editor"
                                        data-id="4768ef7" data-element_type="widget" data-widget_type="text-editor.default">
                                        <div class="elementor-widget-container">
                                            <style>
                                                /*! elementor - v3.17.0 - 08-11-2023 */
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
                                            Give your visitor a smooth online experience
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>


            <div class="layout-freelancer-sidebar main-content p-4 inner">

                <a href="javascript:void(0)" class="mobile-sidebar-btn d-lg-none btn-left"><i class="ti-menu-alt"></i></a>
                <div class="mobile-sidebar-panel-overlay"></div>
                @include('home.layouts.freelancer-side-bar')
                <div class="row">

                    <div id="main-content" class="col">
                        <main id="main" class="site-main layout-type-default" role="main">

                            <div class="freelancers-listing-wrapper main-items-wrapper layout-type-grid"
                                data-display_mode="grid">
                                <div class="wrapper-fillter">
                                    <div class="apus-listing-filter d-sm-flex align-items-center">
                                        <div class="results-count">
                                            Showing all {{ $freelancers->count() }} results
                                        </div>
                                    </div>
                                </div>
                                <div class="freelancers-wrapper items-wrapper">
                                    <div class="row">

                                        @foreach ($freelancers as $row)
                                            @if($row->identity)
                                            <div class="col-sm-3">
                                                <div class="freelancer-item position-relative">


                                                    <div class="freelancer-logo d-flex align-items-center">

                                                        <div class="avatar">
                                                            @php
                                                                $imagePath = $row->profile_image;
                                                            @endphp
                                                            
                                                            @if (!empty($row->profile_image) && file_exists(public_path($imagePath)))
                                                                <img src="{{ asset($imagePath) }}" class="avatar-img rounded-circle" alt=""
                                                                     srcset="{{ asset($imagePath) }}">
                                                            @else
                                                                <img src="{{ asset('freelancer.png') }}" class="avatar-img rounded-circle" alt=""
                                                                     srcset="{{ asset('freelancer.png') }}">
                                                            @endif

                                                        </div>

                                                    </div>


                                                    <style>
                                                        .freelancer-logo {
                                                            width: 100px !important;
                                                        }

                                                        .avatar img {
                                                            width: 100px !important;
                                                            /* Adjust as needed */
                                                            height: 100px !important;
                                                            /* Adjust as needed */
                                                            object-fit: cover !important;
                                                            /* Ensures the image covers the entire area */
                                                        }
                                                    </style>
                                                    <div class="inner-bottom">
                                                        <div class="text-center">
                                                            <h2 class="freelancer-title">
                                                                <a href="{{ url('user/' . $row->identity) }}"
                                                                    rel="bookmark">
                                                                    {{ ucwords($row->full_name) }}

                                                                </a>
                                                            </h2>

                                                            <div class="freelancer-tags">
                                                                                            @foreach($row->mySkills as $skill)
                                                                                        <a class="tag-freelancer"
                                                                                            href="#">{{ $skill->title }}</a>
                                                                                            
                                                                                        @endforeach

                                                                                    </div>
                                                            <div class="rating-reviews">
                                                                <i class="fa fa-star"></i>

                                                                <span
                                                                    class="rating text-link">{{ \App\Helpers\CommonHelpers::freelancerRating($row->id) }}.0</span>
                                                                <span
                                                                    class="text">({{ \App\Models\ServiceRating::query()->where('user_id', $row->id)->count() }}
                                                                    Reviews)</span>

                                                            </div>
                                                        </div>
                                                        <div class="freelancer-metas d-flex align-items-center">
                                                            <div class="freelancer-location with-title">
                                                                <strong>Location:</strong>
                                                                @if (is_numeric($row->state))
                                                                     {{ $row->stateName->name ?? 'Remote' }}
                                                                @elseif (preg_match('/^[a-zA-Z]+$/', $row->state))
                                                                    {{ $row->state }}
                                                                @else
                                                                    Remote
                                                                @endif

                                                            </div>
                                                            <div class="freelancer-salary with-title">
                                                                <strong>Rate:</strong>
                                                                <span>
                                                                    <span class="woocommerce-Price-amount amount">
                                                                        <bdi>
                                                                            <span class="woocommerce-Price-currencySymbol">
                                                                                {{ $currencySymbols[$currency] }}</span>
                                                                            {{-- @php
                                                                                $viewerCurrency = $currency;
                                                                                $conversionRates = $conversionRates;
                                                                                $currencySymbols = $currencySymbols;
                                                                                $rate = $row->rate;
                                                                                $artisanCurrency = $row->currency;

                                                                                // Ensure both currencies are available in the conversion rates array
                                                                                if (
                                                                                    isset(
                                                                                        $conversionRates[
                                                                                            $artisanCurrency
                                                                                        ],
                                                                                    ) &&
                                                                                    isset(
                                                                                        $conversionRates[
                                                                                            $viewerCurrency
                                                                                        ],
                                                                                    )
                                                                                ) {
                                                                                    // Calculate the converted rate
                                                                                    $convertedRate =
                                                                                        $rate *
                                                                                        ($conversionRates[
                                                                                            $viewerCurrency
                                                                                        ] /
                                                                                            $conversionRates[
                                                                                                $artisanCurrency
                                                                                            ]);
                                                                                } else {
                                                                                    // If conversion rate not found, fallback to the original rate
                                                                                    $convertedRate = $rate;
                                                                                }

                                                                                // Get the currency symbol
                                                                                $currencySymbol =
                                                                                    $currencySymbols[$viewerCurrency] ??
                                                                                    '';
                                                                            @endphp --}}
                                                                            <span class="price-text">
                                                                                @if ($currencySymbols[$currency] === '$')
                                                                                    {{ $row->usd_rate }}/hr
                                                                                @elseif ($currencySymbols[$currency] === '₦')
                                                                                    {{ $row->ngn_rate }}/hr
                                                                                @elseif ($currencySymbols[$currency] === '£')
                                                                                    {{ $row->gbp_rate }}/hr
                                                                                @elseif ($currencySymbols[$currency] === '€')
                                                                                    {{ $row->eur_rate }}/hr
                                                                                @endif
                                                                            </span>
                                                                        </bdi>
                                                                    </span>
                                                                </span>
                                                            </div>
                                                        </div>
                                                        @if (!$row->identity == null)
                                                            <div class="freelancer-link">
                                                                <a href="{{ url('user/' . $row->identity) }}"
                                                                    class="btn btn-theme-rgba10 w-100 radius-sm">View
                                                                    Profile <i class="next flaticon-right-up"></i></a>
                                                            </div>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                            @endif
                                        @endforeach

                                    </div>
                                </div>


                            </div>
                            {{ $freelancers->links('home.util.pagination') }}

                        </main><!-- .site-main -->
                    </div><!-- .content-area -->

                </div>
            </div>
        </section>
    </div>
@endsection
