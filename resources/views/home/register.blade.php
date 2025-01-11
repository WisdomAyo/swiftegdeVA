{{-- @extends('home.layouts.content')
@section('content')
<div id="apus-main-content">
<section id="main-container" class="container inner wrapper-main-page">
<div class="row">
<div id="main-content" class="main-page col-12">
    <div id="main" class="site-main clearfix" role="main">

        <div data-elementor-type="wp-page" data-elementor-id="1878" class="elementor elementor-1878">
            <section
                class="elementor-section elementor-top-section elementor-element elementor-element-a75980c elementor-section-stretched elementor-section-boxed elementor-section-height-default elementor-section-height-default"
                data-id="a75980c" data-element_type="section"
                data-settings="{&quot;stretch_section&quot;:&quot;section-stretched&quot;,&quot;background_background&quot;:&quot;classic&quot;}">
                <div class="elementor-container elementor-column-gap-extended">
                    <div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-d5a9f85"
                        data-id="d5a9f85" data-element_type="column">
                        <div class="elementor-widget-wrap elementor-element-populated">
                            <div class="elementor-element elementor-element-76971b1 elementor-widget elementor-widget-heading"
                                data-id="76971b1" data-element_type="widget"
                                data-widget_type="heading.default">
                                <div class="elementor-widget-container">
                                    <style>
                                        /*! elementor - v3.21.0 - 24-04-2024 */
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
                                    <h2 class="elementor-heading-title elementor-size-default">Register</h2>
                                </div>
                            </div>
                            <div class="elementor-element elementor-element-2a64b06 elementor-widget elementor-widget-text-editor"
                                data-id="2a64b06" data-element_type="widget"
                                data-widget_type="text-editor.default">
                                <div class="elementor-widget-container">
                                    <style>
                                        /*! elementor - v3.21.0 - 24-04-2024 */
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


                                </div>
                            </div>
                            <div class="elementor-element elementor-element-9012cd4 elementor-widget elementor-widget-apus_element_register_tabs"
                                data-id="9012cd4" data-element_type="widget"
                                data-widget_type="apus_element_register_tabs.default">
                                <div class="elementor-widget-container">
                                    <div class="register-form register-form-wrapper box-account ">


                                        <ul class="nav nav-tabs" role="tablist">
                                            <li><a class="active" data-bs-toggle="tab"
                                                    href="#apus_register_form_freelancer_L4hSo"><i
                                                        class="flaticon-web-design"></i>Sign up as a Freelancer</a></li>


                                        </ul>


                                        <div class="tab-content clearfix">
                                            <div class="tab-pane active in"
                                                id="apus_register_form_freelancer_L4hSo">

                                                <div class="register-form-wrapper">
                                                    <div class="container-form">



                                                        <form
                                                            action="{{ route('createUser') }}"
                                                            class="cmb-form _freelancer_register_fields"
                                                            method="post"
                                                            id="_freelancer_register_fields_8777"
                                                            enctype="multipart/form-data"
                                                            encoding="multipart/form-data">

                                                            {{ csrf_field() }}

                                                            @if (session('error'))
                                                                <div class="notification-alert-danger alert alert-danger alert-dismissible fade show"
                                                                    role="alert">
                                                                    {{ session('error') }}
                                                                    <button type="button" class="btn btn-primary"
                                                                        data-bs-dismiss="alert"
                                                                        aria-label="Close">
                                                                        <span aria-hidden="true">×</span>
                                                                    </button>
                                                                </div>
                                                            @endif


                                                            <div class="cmb2-wrap form-table">
                                                                <div id="cmb2-metabox-_freelancer_register_fields"
                                                                    class="cmb2-metabox cmb-field-list">



                                                                    <div class="cmb-row cmb-type-text cmb2-id--freelancer-email table-layout"
                                                                        data-fieldtype="text">

                                                                        <div class="cmb-th">FullName <span
                                                                                class="required">*</span>
                                                                        </div>
                                                                        <div class="cmb-td">
                                                                            <input type="text"
                                                                                class="regular-text"
                                                                                name="fullname"
                                                                                id="_freelancer_email"
                                                                                value=""
                                                                                data-hash='6f8hndb4f7b0'
                                                                                placeholder="fullName"
                                                                                required="required" />
                                                                            @if ($errors->has('fullname'))
                                                                                <div
                                                                                    class="alert alert-info">
                                                                                    <strong>{{ $errors->first('fullname') }}</strong>
                                                                                </div>
                                                                            @endif
                                                                        </div>
                                                                    </div>


                                                                    <div class="cmb-row cmb-type-text cmb2-id--freelancer-email table-layout"
                                                                        data-fieldtype="text">

                                                                        <div class="cmb-th">Email <span
                                                                                class="required">*</span>
                                                                        </div>
                                                                        <div class="cmb-td">
                                                                            <input type="text"
                                                                                class="regular-text"
                                                                                name="email"
                                                                                id="_freelancer_email"
                                                                                value=""
                                                                                data-hash='6f8hndb4f7b0'
                                                                                placeholder="Email"
                                                                                required="required" />
                                                                            @if ($errors->has('email'))
                                                                                <div
                                                                                    class="alert alert-info">
                                                                                    <strong>{{ $errors->first('email') }}</strong>
                                                                                </div>
                                                                            @endif
                                                                        </div>
                                                                    </div>


                                                                    <div class="cmb-row cmb-type-text cmb2-id--freelancer-phone table-layout"
                                                                        data-fieldtype="text">
                                                                        <div class="cmb-th">
                                                                            <label
                                                                                for="_freelancer_phone">Phone
                                                                                Number</label>
                                                                        </div>
                                                                        <div class="cmb-td">
                                                                            <input type="text"
                                                                                class="regular-text"
                                                                                name="phone"
                                                                                id="_freelancer_phone"
                                                                                value=""
                                                                                data-hash='1nv73cileo1g' />
                                                                            @if ($errors->has('phone'))
                                                                                <div
                                                                                    class="alert alert-info">
                                                                                    <strong>{{ $errors->first('phone') }}</strong>
                                                                                </div>
                                                                            @endif
                                                                        </div>
                                                                    </div>


                                                                    <div class="cmb-row cmb-type-hide-show-password cmb2-id--freelancer-password"
                                                                        data-fieldtype="hide_show_password">
                                                                        <div class="cmb-th">Password <span
                                                                                class="required">*</span>
                                                                        </div>
                                                                        <div class="cmb-td">

                                                                            <span
                                                                                class="show_hide_password_wrapper">
                                                                                <input type="password"
                                                                                    class="regular-text"
                                                                                    name="password"
                                                                                    id="hide_show_password"
                                                                                    value=""
                                                                                    data-lpignore='1'
                                                                                    autocomplete="off"
                                                                                    data-hash='gl70hk4g8ss0'
                                                                                    placeholder="Password"
                                                                                    required="required" />
                                                                                <a class="toggle-password"
                                                                                    title="Show"><span
                                                                                        class="dashicons dashicons-hidden"></span></a>
                                                                                @if ($errors->has('password'))
                                                                                    <div
                                                                                        class="alert alert-info">
                                                                                        <strong>{{ $errors->first('password') }}</strong>
                                                                                    </div>
                                                                                @endif
                                                                            </span>

                                                                        </div>
                                                                    </div>
                                                                    <div class="cmb-row cmb-type-hide-show-password cmb2-id--freelancer-confirmpassword"
                                                                        data-fieldtype="hide_show_password">
                                                                        <div class="cmb-th">Confirm
                                                                            Password <span
                                                                                class="required">*</span>
                                                                        </div>
                                                                        <div class="cmb-td">

                                                                            <span
                                                                                class="show_hide_password_wrapper">
                                                                                <input type="password"
                                                                                    class="regular-text"
                                                                                    name="password_confirmation"
                                                                                    id="hide_show_password"
                                                                                    value=""
                                                                                    data-lpignore='1'
                                                                                    autocomplete="off"
                                                                                    data-hash='5mhknr9cfoq0'
                                                                                    placeholder="Confirm Password"
                                                                                    required="required" />
                                                                                <a class="toggle-password"
                                                                                    title="Show"><span
                                                                                        class="dashicons dashicons-hidden"></span></a>
                                                                                @if ($errors->has('password_confirmation'))
                                                                                    <div
                                                                                        class="alert alert-info">
                                                                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                                                                    </div>
                                                                                @endif
                                                                            </span>

                                                                        </div>
                                                                    </div>

                                                                </div>
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="register-terms-and-conditions">
                                                                    <input type="checkbox"
                                                                        name="terms_and_conditions"
                                                                        value="on"
                                                                        id="register-terms-and-conditions"
                                                                        required>
                                                                    You accept our <a href="#">Terms
                                                                        and Conditions and Privacy
                                                                        Policy</a>
                                                                </label>
                                                            </div><button type="submit"
                                                                name="submit-cmb-register-freelancer"
                                                                class="btn btn-theme w-100">Register<i
                                                                    class="flaticon-right-up next"></i></button>
                                                        </form>
                                                    </div>

                                                </div>
                                            </div>

                                            <div class="tab-pane " id="apus_register_form_employer_L4hSo">

                                                <div class="register-form-wrapper">
                                                    <div class="container-form">



                                                        <form
                                                            action="{{ route('index.staffing.employer.save') }}"
                                                            class="cmb-form _employer_register_fields"
                                                            method="post"
                                                            id="_employer_register_fields_9499" 
                                                            enctype="multipart/form-data"
                                                            encoding="multipart/form-data">

                                                            {{ csrf_field() }}

                                                            @if (session('error'))
                                                                <div class="notification-alert-danger alert alert-danger alert-dismissible fade show"
                                                                    role="alert">
                                                                    {{ session('error') }}
                                                                    <button type="button" class="btn btn-primary"
                                                                        data-bs-dismiss="alert"
                                                                        aria-label="Close">
                                                                        <span aria-hidden="true">×</span>
                                                                    </button>
                                                                </div>
                                                            @endif


                                                            <div class="cmb2-wrap form-table">
                                                                <div id="cmb2-metabox-_freelancer_register_fields"
                                                                    class="cmb2-metabox cmb-field-list">



                                                                    <div class="cmb-row cmb-type-text cmb2-id--freelancer-email table-layout"
                                                                        data-fieldtype="text">

                                                                        <div class="cmb-th">Full Name <span
                                                                                class="required">*</span>
                                                                        </div>
                                                                        <div class="cmb-td">
                                                                            <input type="text"
                                                                                class="regular-text"
                                                                                name="fullname"
                                                                                id="_freelancer_email"
                                                                                value=""
                                                                                data-hash='6f8hndb4f7b0'
                                                                                placeholder="Full Name"
                                                                                required="required" />
                                                                            @if ($errors->has('fullname'))
                                                                                <div
                                                                                    class="alert alert-info">
                                                                                    <strong>{{ $errors->first('fullname') }}</strong>
                                                                                </div>
                                                                            @endif
                                                                        </div>
                                                                    </div>


                                                                    <div class="cmb-row cmb-type-text cmb2-id--freelancer-email table-layout"
                                                                        data-fieldtype="text">

                                                                        <div class="cmb-th">Email <span
                                                                                class="required">*</span>
                                                                        </div>
                                                                        <div class="cmb-td">
                                                                            <input type="text"
                                                                                class="regular-text"
                                                                                name="email"
                                                                                id="_freelancer_email"
                                                                                value=""
                                                                                data-hash='6f8hndb4f7b0'
                                                                                placeholder="Email"
                                                                                required="required" />
                                                                            @if ($errors->has('email'))
                                                                                <div
                                                                                    class="alert alert-info">
                                                                                    <strong>{{ $errors->first('email') }}</strong>
                                                                                </div>
                                                                            @endif
                                                                        </div>
                                                                    </div>


                                                                    <div class="cmb-row cmb-type-text cmb2-id--freelancer-phone table-layout"
                                                                        data-fieldtype="text">
                                                                        <div class="cmb-th">
                                                                            <label
                                                                                for="_freelancer_phone">Phone
                                                                                Number</label>
                                                                        </div>
                                                                        <div class="cmb-td">
                                                                            <input type="text"
                                                                                class="regular-text"
                                                                                name="phone"
                                                                                id="_freelancer_phone"
                                                                                value=""
                                                                                data-hash='1nv73cileo1g' />
                                                                            @if ($errors->has('phone'))
                                                                                <div
                                                                                    class="alert alert-info">
                                                                                    <strong>{{ $errors->first('phone') }}</strong>
                                                                                </div>
                                                                            @endif
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-lg-12 form-margin">
                                                                        <div class="form-group">
                                                                            <label>Your Office Title (eg
                                                                                CEO)</label>
                                                                            <input type="text"
                                                                                name="office_title"
                                                                                required="true"
                                                                                class="form-control">
                                                                        </div>
                                                                    </div>


                                                                    <div class="row">

                                                                        <div class="col-lg-6">
                                                                            <div class="form-group">
                                                                                <label>Country</label>
                                                                                <select name="country_ep"
                                                                                    id="country_ep"
                                                                                    class="form-control">
                                                                                    @foreach ($country as $row)
                                                                                        <option
                                                                                            value="{{ $row->id }}">
                                                                                            {{ $row->name }}
                                                                                        </option>
                                                                                    @endforeach
                                                                                </select>
                                                                            </div>
                                                                        </div>

                                                                        <div class="col-lg-6 form-margin">
                                                                            <div class="form-group">
                                                                                <label>State</label>
                                                                                <select name="state_ep"
                                                                                    id="state_ep"
                                                                                    class="form-control">
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                    </div>


                                                                    <div class="row">
                                                                        <div class="col-lg-6 form-margin">
                                                                            <div class="form-group">
                                                                                <label>State Areas</label>
                                                                                <select
                                                                                    name="state_area_ep"
                                                                                    class="form-control">
                                                                                </select>

                                                                            </div>
                                                                        </div>

                                                                        <div class="col-lg-6 form-margin">
                                                                            <div class="form-group">
                                                                                <label>Street
                                                                                    Address</label>
                                                                                <input type="text"
                                                                                    name="StreetAddress"
                                                                                    placeholder="Street Address"
                                                                                    required="true"
                                                                                    class="form-control">
                                                                            </div>
                                                                        </div>


                                                                    </div>



                                                                    <div class="cmb-row cmb-type-hide-show-password cmb2-id--freelancer-password"
                                                                        data-fieldtype="hide_show_password">
                                                                        <div class="cmb-th">Password <span
                                                                                class="required">*</span>
                                                                        </div>
                                                                        <div class="cmb-td">

                                                                            <span
                                                                                class="show_hide_password_wrapper">
                                                                                <input type="password"
                                                                                    class="regular-text"
                                                                                    name="password"
                                                                                    id="hide_show_password"
                                                                                    value=""
                                                                                    data-lpignore='1'
                                                                                    autocomplete="off"
                                                                                    data-hash='gl70hk4g8ss0'
                                                                                    placeholder="Password"
                                                                                    required="required" />
                                                                                <a class="toggle-password"
                                                                                    title="Show"><span
                                                                                        class="dashicons dashicons-hidden"></span></a>
                                                                                @if ($errors->has('password'))
                                                                                    <div
                                                                                        class="alert alert-info">
                                                                                        <strong>{{ $errors->first('password') }}</strong>
                                                                                    </div>
                                                                                @endif
                                                                            </span>

                                                                        </div>
                                                                    </div>
                                                                    <div class="cmb-row cmb-type-hide-show-password cmb2-id--freelancer-confirmpassword"
                                                                        data-fieldtype="hide_show_password">
                                                                        <div class="cmb-th">Confirm
                                                                            Password <span
                                                                                class="required">*</span>
                                                                        </div>
                                                                        <div class="cmb-td">

                                                                            <span
                                                                                class="show_hide_password_wrapper">
                                                                                <input type="password"
                                                                                    class="regular-text"
                                                                                    name="password_confirmation"
                                                                                    id="hide_show_password"
                                                                                    value=""
                                                                                    data-lpignore='1'
                                                                                    autocomplete="off"
                                                                                    data-hash='5mhknr9cfoq0'
                                                                                    placeholder="Confirm Password"
                                                                                    required="required" />
                                                                                <a class="toggle-password"
                                                                                    title="Show"><span
                                                                                        class="dashicons dashicons-hidden"></span></a>
                                                                                @if ($errors->has('password_confirmation'))
                                                                                    <div
                                                                                        class="alert alert-info">
                                                                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                                                                    </div>
                                                                                @endif
                                                                            </span>

                                                                        </div>
                                                                    </div>

                                                                </div>
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="register-terms-and-conditions">
                                                                    <input type="checkbox"
                                                                        name="terms_and_conditions"
                                                                        value="on"
                                                                        id="register-terms-and-conditions"
                                                                        required>
                                                                    You accept our <a href="#">Terms
                                                                        and Conditions and Privacy
                                                                        Policy</a>
                                                                </label>
                                                            </div>
                                                            <button type="submit"
                                                                name="submit-cmb-register-freelancer"
                                                                class="btn btn-theme w-100">Register now<i
                                                                    class="flaticon-right-up next"></i></button>
                                                        </form>



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
        </div>
    </div><!-- .site-main -->
</div><!-- .content-area -->
</div>
</section>
</div><!-- .site-content --> --}}



<!DOCTYPE html>
<html lang="en" data-bs-theme="light" data-pwa="true">
<meta http-equiv="content-type" content="text/html;charset=utf-8" />
    <meta charset="utf-8">

    <!-- Viewport -->
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, viewport-fit=cover">

    <!-- SEO Meta Tags -->
    <title>Finder | Account - Sign Up</title>
    <meta name="description" content="Finder - Directory &amp; Listings Bootstrap HTML Template">
    <meta name="keywords" content="directory, listings, search, car dealer, real estate, city guide, business listings, medical directories, event listings, e-commerce, market, multipurpose, ui kit, light and dark mode, bootstrap, html5, css3, javascript, gallery, slider, mobile, pwa">
    <meta name="author" content="Createx Studio">

    <!-- Webmanifest + Favicon / App icons -->
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <link rel="manifest" href="manifest.json">
    <link rel="icon" type="image/png" href="asset/app-icons/icon-32x32.png" sizes="32x32">
    <link rel="apple-touch-icon" href="asset/app-icons/icon-180x180.png">

    <!-- Theme switcher (color modes) -->
    <script src="assets/js/theme-switcher.js"></script>

    <!-- Preloaded local web font (Inter) -->
    <link rel="preload" href="asset/fonts/inter-variable-latin.woff2" as="font" type="font/woff2" crossorigin="">

    <!-- Font icons -->
    <link rel="preload" href="asset/icons/finder-icons.woff2" as="font" type="font/woff2" crossorigin="">
    <link rel="stylesheet" href="assets/icons/finder-icons.min.css">

    <!-- Bootstrap + Theme styles -->
    <link rel="preload" href="asset/css/theme.min.css" as="style">
    <link rel="preload" href="asset/css/theme.rtl.min.css" as="style">
    <link rel="stylesheet" href="asset/css/theme.min.css" id="theme-styles">

    <!-- Customizer -->
    <script src="asset/js/customizer.min.js"></script>
  </head>


  <!-- Body -->
  <body>



    <!-- Page content -->
    <main class="content-wrapper w-100 px-3 ps-lg-5 pe-lg-4 mx-auto" style="max-width: 1920px">
      <div class="d-lg-flex">

        <!-- Login form + Footer -->
        <div class="d-flex flex-column min-vh-100 w-100 py-4 mx-auto me-lg-5" style="max-width: 416px">

          <!-- Logo -->
          <header class="navbar px-0 pb-4 mt-n2 mt-sm-0 mb-2 mb-md-3 mb-lg-4">
            <a class="navbar-brand pt-0" href="index.html">
              <span class="d-flex flex-shrink-0 text-primary rtl-flip me-2">
                <svg xmlns="http://www.w3.org/2000/svg" width="35" height="34"><path d="M34.5 16.894v10.731c0 3.506-2.869 6.375-6.375 6.375H17.5h-.85C7.725 33.575.5 26.138.5 17c0-9.35 7.65-17 17-17s17 7.544 17 16.894z" fill="currentColor"></path><g fill-rule="evenodd"><path d="M17.5 13.258c-3.101 0-5.655 2.554-5.655 5.655s2.554 5.655 5.655 5.655 5.655-2.554 5.655-5.655-2.554-5.655-5.655-5.655zm-9.433 5.655c0-5.187 4.246-9.433 9.433-9.433s9.433 4.246 9.433 9.433a9.36 9.36 0 0 1-1.569 5.192l2.397 2.397a1.89 1.89 0 0 1 0 2.671 1.89 1.89 0 0 1-2.671 0l-2.397-2.397a9.36 9.36 0 0 1-5.192 1.569c-5.187 0-9.433-4.246-9.433-9.433z" fill="#000" fill-opacity=".05"></path><g fill="#fff"><path d="M17.394 10.153c-3.723 0-6.741 3.018-6.741 6.741s3.018 6.741 6.741 6.741 6.741-3.018 6.741-6.741-3.018-6.741-6.741-6.741zM7.347 16.894A10.05 10.05 0 0 1 17.394 6.847 10.05 10.05 0 0 1 27.44 16.894 10.05 10.05 0 0 1 17.394 26.94 10.05 10.05 0 0 1 7.347 16.894z"></path><path d="M23.025 22.525c.645-.645 1.692-.645 2.337 0l3.188 3.188c.645.645.645 1.692 0 2.337s-1.692.645-2.337 0l-3.187-3.187c-.645-.646-.645-1.692 0-2.337z"></path></g></g><path d="M23.662 14.663c2.112 0 3.825-1.713 3.825-3.825s-1.713-3.825-3.825-3.825-3.825 1.713-3.825 3.825 1.713 3.825 3.825 3.825z" fill="#fff"></path><path fill-rule="evenodd" d="M23.663 8.429a2.41 2.41 0 0 0-2.408 2.408 2.41 2.41 0 0 0 2.408 2.408 2.41 2.41 0 0 0 2.408-2.408 2.41 2.41 0 0 0-2.408-2.408zm-5.242 2.408c0-2.895 2.347-5.242 5.242-5.242s5.242 2.347 5.242 5.242-2.347 5.242-5.242 5.242-5.242-2.347-5.242-5.242z" fill="currentColor"></path></svg>
              </span>
             SwiftedgeVA
            </a>
          </header>

          <h1 class="h2 mt-auto">Create an account</h1>
          <div class="nav fs-sm mb-3 mb-lg-4">
            I already have an account
            <a class="nav-link text-decoration-underline p-0 ms-2" href="{{ route('login') }}">Sign in</a>
          </div>
          <div class="nav fs-sm mb-4 d-lg-none">
            <span class="me-2">Create an Account and Become a Freelnacer</span>
            <a class="nav-link text-decoration-underline p-0" href="#benefits" data-bs-toggle="offcanvas" aria-controls="benefits">Explore the Benefits</a>
          </div>
          @if (session('error'))
          <div class="notification-alert-danger alert alert-danger alert-dismissible fade show"
              role="alert">
              {{ session('error') }}
              <button type="button" class="btn btn-primary"
                  data-bs-dismiss="alert"
                  aria-label="Close">
                  <span aria-hidden="true">×</span>
              </button>
          </div>
      @endif
          <!-- Form -->
          <form class="needs-validation" novalidate="" action="{{ route('createUser') }}" method="post" id="_freelancer_register_fields_8777"  enctype="multipart/form-data"  encoding="multipart/form-data">
            {{ csrf_field() }}




            <div class="position-relative mb-4">
                <label for="full-name" class="form-label">Full Name</label>
                <input type="text" class="form-control form-control-lg @error('fullname') is-invalid @enderror" id="full_name" required="" name="fullname">
                @error('fullname')
                <div class="invalid-tooltip bg-transparent py-0">{{ $errors->first('fullname') }} </div>
            @enderror
                @if ($errors->has('fullname'))
                <div class="invalid-tooltip bg-transparent py-0">{{ $errors->first('fullname') }} </div>
                @endif

              </div>

            <div class="position-relative mb-4">
              <label for="register-email" class="form-label">Email</label>
              <input type="email" class="form-control form-control-lg @error('email') is-invalid @enderror" id="register-email" required="" name="email" placeholder="Enter Email" data-hash='6f8hndb4f7b0'>
              @error('email')
              <div class="invalid-tooltip bg-transparent py-0">{{ $errors->first('email') }} </div>
          @enderror
              @if ($errors->has('email'))
              <div class="invalid-tooltip bg-transparent py-0">{{ $errors->first('email') }} </div>
              @endif
            </div>

            <div class="position-relative mb-4">
                <label for="phone" class="form-label">Phone Number</label>
                <input type="tel" class="form-control form-control-lg @error('phone') is-invalid @enderror" id="phone" data-hash='1nv73cileo1g'  name="phone" value="{{ old('name')}}" required  data-input-format="{&quot;numericOnly&quot;: true, &quot;delimiters&quot;: [&quot;(&quot;, &quot;)&quot;, &quot; &quot;, &quot;-&quot;, &quot; &quot;], &quot;blocks&quot;: [0, 3, 0, 3, 4]}" placeholder="(___) ___-____" required="">
                @error('phone')
                <div class="invalid-tooltip bg-transparent py-0">{{ $errors->first('phone') }} </div>
            @enderror
            </div>


            <div class="mposition-relative mb-4">
              <label for="register-password" class="form-label">Password</label>
              <div class="password-toggle">
                <input type="password" class="form-control form-control-lg @error('password') is-invalid @enderror" name="password" id="register-password" minlength="8" placeholder="Minimum 8 characters" value=""
                data-lpignore='1'
                autocomplete="off"
                data-hash='gl70hk4g8ss0'
                placeholder="Password"
                required="required"  >
                @error('password')
                <div class="invalid-tooltip bg-transparent py-0">{{ $errors->first('password') }} </div>
            @enderror
            <label class="password-toggle-button fs-lg" aria-label="Show/hide password">
                <input type="checkbox" class="btn-check">
              </label>

              </div>
            </div>


            <div class="mb-4">
                <label for="register-password" class="form-label">Password Confirmation</label>
                <div class="password-toggle">
                  <input type="password"  name="password_confirmation" class="form-control form-control-lg @error('password_confirmation') is-invalid @enderror" id="register-paConfirmationssword" minlength="8" placeholder="Minimum 8 characters" value=""
                  value=""
                  data-lpignore='1'
                  autocomplete="off"
                  data-hash='5mhknr9cfoq0'
                  placeholder="Confirm Password"
                  required="required">

                  @error('password_confirmation')
                <div class="invalid-tooltip bg-transparent py-0">{{ $errors->first('password_confirmation') }} </div>
            @enderror
                  <label class="password-toggle-button fs-lg" aria-label="Show/hide password">
                    <input type="checkbox" class="btn-check">
                  </label>
                </div>
              </div>






            <div class="d-flex flex-column gap-2 mb-4">

              <div class="form-check">
                <input type="checkbox" class="form-check-input" id="privacy" required="">
                <label for="privacy" class="form-check-label">I have read and accept the <a class="text-dark-emphasis" href="#!">Privacy Policy</a></label>
              </div>
            </div>
            <button type="submit" class="btn btn-lg btn-primary w-100">
              Create an account
              <i class="fi-chevron-right fs-lg ms-1 me-n1"></i>
            </button>
          </form>

          <!-- Divider -->
          {{-- <div class="d-flex align-items-center my-4">
            <hr class="w-100 m-0">
            <span class="text-body-emphasis fw-medium text-nowrap mx-4">or continue with</span>
            <hr class="w-100 m-0">
          </div> --}}



          <!-- Footer -->
          <footer class="mt-auto">
            <div class="nav mb-4">
              <a class="nav-link text-decoration-underline p-0" href="{{ url('/')}}">Take me Back Home</a>
            </div>

          </footer>
        </div>


        <!-- Benefits section that turns into offcanvas on screens < 992px wide (lg breakpoint) -->
        <div class="offcanvas-lg offcanvas-start w-100 py-5  my-lg-5 ms-auto " id="benefits" style="max-width: 1034px">

 <br><br><br>

          <div class="ratio ratio-16x9 border rounded-5 overflow-hidden my-5">
              <video muted="" loop="" playsinline="" autoplay="" poster="assets/img/about/v1/video-poster.jpg">
                <source src="asset/img/about/v1/video.mp4" type="video/mp4">
              </video>
            </div>


        </div>
      </div>
    </main>





    <!-- Bootstrap + Theme scripts -->
    <script src="asset/js/theme.min.js"></script>



</html>






