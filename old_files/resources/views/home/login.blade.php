@extends('home.layouts.content')
@section('content')

    <div id="apus-main-content">
        <section id="main-container" class="container inner wrapper-main-page">
            <div class="row">
                <div id="main-content" class="main-page col-12">
                    <div id="main" class="site-main clearfix" role="main">

                        <div data-elementor-type="wp-page" data-elementor-id="1878" class="elementor elementor-1878">
                            <section class="elementor-section elementor-top-section elementor-element elementor-element-a75980c elementor-section-stretched elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="a75980c" data-element_type="section" data-settings="{&quot;stretch_section&quot;:&quot;section-stretched&quot;,&quot;background_background&quot;:&quot;classic&quot;}">
                                <div class="elementor-container elementor-column-gap-extended">
                                    <div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-d5a9f85" data-id="d5a9f85" data-element_type="column">
                                        <div class="elementor-widget-wrap elementor-element-populated">
                                            <div class="elementor-element elementor-element-76971b1 elementor-widget elementor-widget-heading" data-id="76971b1" data-element_type="widget" data-widget_type="heading.default">
                                                <div class="elementor-widget-container">
                                                    <style>/*! elementor - v3.21.0 - 24-04-2024 */
                                                        .elementor-heading-title{padding:0;margin:0;line-height:1}.elementor-widget-heading .elementor-heading-title[class*=elementor-size-]>a{color:inherit;font-size:inherit;line-height:inherit}.elementor-widget-heading .elementor-heading-title.elementor-size-small{font-size:15px}.elementor-widget-heading .elementor-heading-title.elementor-size-medium{font-size:19px}.elementor-widget-heading .elementor-heading-title.elementor-size-large{font-size:29px}.elementor-widget-heading .elementor-heading-title.elementor-size-xl{font-size:39px}.elementor-widget-heading .elementor-heading-title.elementor-size-xxl{font-size:59px}</style>
                                                    <h2 class="elementor-heading-title elementor-size-default">Login</h2>
                                                </div>
                                            </div>
                                            <br />
                                            <div class="elementor-element elementor-element-9012cd4 elementor-widget elementor-widget-apus_element_register_tabs" data-id="9012cd4" data-element_type="widget" data-widget_type="apus_element_register_tabs.default">
                                                <div class="elementor-widget-container">
                                                    <div class="elementor-shortcode">
                                                        <div class="box-account">
                                                            <div class="login-form-wrapper">

                                                                <div id="login-form-wrapper2712" class="form-container">


                                                                    <form class="login-form" action="{{ route('login.in.user') }}" method="post">


                                                                        {{ csrf_field() }}


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


                                                                        <div class="form-group">
                                                                            <label>Email</label>
                                                                            <input autocomplete="off" type="text" name="options" class="form-control" id="username_or_email" placeholder="Email">
                                                                        </div>

                                                                        <div class="form-group">
                                                                            <label>Password</label>
                                                                            <span class="show_hide_password">
                                                                                    <input name="password" type="password" class="password required form-control" id="login_password" placeholder="Password">
                                                                                    <a class="toggle-password" title="Show"><span class="dashicons dashicons-hidden"></span></a>
                                                                            </span>
                                                                        </div>

                                                                        <div class="row form-group info">
                                                                            <div class="col-6">
                                                                                <label for="user-remember-field2712" class="remember">
                                                                                    <input type="checkbox" name="remember" id="user-remember-field2712" value="true">
                                                                                    Keep me signed in
                                                                                </label>
                                                                            </div>
                                                                            <div class="col-6 link-right">
                                                                                <a class="back-link" href="#forgot-password-form-wrapper2712" title="Forgotten password">Forgotten password?</a>
                                                                            </div>
                                                                        </div>


                                                                        <div class="form-group">
                                                                            <button type="submit" class="btn btn-theme w-100" name="submit">Login<i class="flaticon-right-up next"></i></button>
                                                                        </div>
                                                                        <input type="hidden" id="security_login" name="security_login" value="e8cc53a709">
                                                                    </form>
                                                                </div>




                                                                <!-- reset form -->
                                                                <div id="forgot-password-form-wrapper2712" class="form-container forgotpassword-form-wrapper">
                                                                    <div class="top-info-user">
                                                                        <h3 class="title">Reset Password</h3>
                                                                        <div class="des-forgot">Please Enter Username or Email</div>
                                                                    </div>
                                                                    <form name="forgotpasswordform" class="forgotpassword-form" action="{{ route('forget.password.reset') }}" method="post">

                                                                        {{ csrf_field() }}


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

                                                                        @if(session('responses'))
                                                                            <div class="notification-alert alert alert-success alert-dismissible fade show" role="alert">
                                                                                {{session('responses')}}
                                                                                <button type="button" class="close" data-bs-dismiss="alert" aria-label="Close">
                                                                                    <span aria-hidden="true">×</span>
                                                                                </button>
                                                                            </div>
                                                                        @endif



                                                                        <div class="lostpassword-fields">
                                                                            <div class="form-group">
                                                                                <input type="text" name="email" class="user_login form-control" id="lostpassword_username" placeholder="Username or E-mail">
                                                                                @if ($errors->has('email'))
                                                                                    <div class="alert alert-info">
                                                                                        <strong>{{ $errors->first('email') }}</strong>
                                                                                    </div>
                                                                                @endif
                                                                            </div>

                                                                            <div class="form-group">
                                                                                <button type="submit" class="btn btn-theme w-100" name="wp-submit">Get New Password<i class="flaticon-right-up next"></i></button>
                                                                            </div>
                                                                        </div>
                                                                        <div class="lostpassword-link"><a href="#login-form-wrapper2712" class="back-link">Back To Login</a></div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div></div>
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
