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
                                                    <h2 class="elementor-heading-title elementor-size-default">Register</h2>
                                                </div>
                                            </div>
                                            <div class="elementor-element elementor-element-2a64b06 elementor-widget elementor-widget-text-editor" data-id="2a64b06" data-element_type="widget" data-widget_type="text-editor.default">
                                                <div class="elementor-widget-container">
                                                    <style>/*! elementor - v3.21.0 - 24-04-2024 */
                                                        .elementor-widget-text-editor.elementor-drop-cap-view-stacked .elementor-drop-cap{background-color:#69727d;color:#fff}.elementor-widget-text-editor.elementor-drop-cap-view-framed .elementor-drop-cap{color:#69727d;border:3px solid;background-color:transparent}.elementor-widget-text-editor:not(.elementor-drop-cap-view-default) .elementor-drop-cap{margin-top:8px}.elementor-widget-text-editor:not(.elementor-drop-cap-view-default) .elementor-drop-cap-letter{width:1em;height:1em}.elementor-widget-text-editor .elementor-drop-cap{float:left;text-align:center;line-height:1;font-size:50px}.elementor-widget-text-editor .elementor-drop-cap-letter{display:inline-block}</style>

                                                    Give your visitor a smooth online experience with a solid UX design						</div>
                                            </div>
                                            <div class="elementor-element elementor-element-9012cd4 elementor-widget elementor-widget-apus_element_register_tabs" data-id="9012cd4" data-element_type="widget" data-widget_type="apus_element_register_tabs.default">
                                                <div class="elementor-widget-container">
                                                    <div class="register-form register-form-wrapper box-account ">


                                                        <ul class="nav nav-tabs" role="tablist">
                                                            <li><a class="active" data-bs-toggle="tab" href="#apus_register_form_freelancer_L4hSo"><i class="flaticon-web-design"></i>Freelancer</a></li>

                                                            <li><a class="" data-bs-toggle="tab" href="#apus_register_form_employer_L4hSo"><i class="flaticon-briefcase"></i>Employer</a></li>
                                                        </ul>


                                                        <div class="tab-content clearfix">
                                                            <div class="tab-pane active in" id="apus_register_form_freelancer_L4hSo">

                                                                <div class="register-form-wrapper">
                                                                    <div class="container-form">



                                                                        <form action="{{route('index.register.artisan.one')}}" class="cmb-form _freelancer_register_fields" method="post" id="_freelancer_register_fields_8777" enctype="multipart/form-data" encoding="multipart/form-data">

                                                                            {{ csrf_field() }}

                                                                            @if(session('error'))
                                                                                <div class="notification-alert-danger alert alert-danger alert-dismissible fade show" role="alert">
                                                                                    {{session('error')}}
                                                                                    <button type="button" class="close" data-bs-dismiss="alert" aria-label="Close">
                                                                                        <span aria-hidden="true">×</span>
                                                                                    </button>
                                                                                </div>
                                                                            @endif


                                                                            <div class="cmb2-wrap form-table">
                                                                                <div id="cmb2-metabox-_freelancer_register_fields" class="cmb2-metabox cmb-field-list">



                                                                                    <div class="cmb-row cmb-type-text cmb2-id--freelancer-email table-layout" data-fieldtype="text">

                                                                                        <div class="cmb-th">FullName <span class="required">*</span></div>
                                                                                        <div class="cmb-td">
                                                                                            <input type="text" class="regular-text" name="fullname" id="_freelancer_email" value="" data-hash='6f8hndb4f7b0' placeholder="fullName" required="required"/>
                                                                                            @if ($errors->has('fullname'))
                                                                                                <div class="alert alert-info">
                                                                                                    <strong>{{ $errors->first('fullname') }}</strong>
                                                                                                </div>
                                                                                            @endif
                                                                                        </div>
                                                                                    </div>


                                                                                    <div class="cmb-row cmb-type-text cmb2-id--freelancer-email table-layout" data-fieldtype="text">

                                                                                        <div class="cmb-th">Email <span class="required">*</span></div>
                                                                                        <div class="cmb-td">
                                                                                            <input type="text" class="regular-text" name="email" id="_freelancer_email" value="" data-hash='6f8hndb4f7b0' placeholder="Email" required="required"/>
                                                                                            @if ($errors->has('email'))
                                                                                                <div class="alert alert-info">
                                                                                                    <strong>{{ $errors->first('email') }}</strong>
                                                                                                </div>
                                                                                            @endif
                                                                                        </div>
                                                                                    </div>


                                                                                    <div class="cmb-row cmb-type-text cmb2-id--freelancer-phone table-layout" data-fieldtype="text">
                                                                                        <div class="cmb-th">
                                                                                            <label for="_freelancer_phone">Phone Number</label>
                                                                                        </div>
                                                                                        <div class="cmb-td">
                                                                                            <input type="text" class="regular-text" name="phone" id="_freelancer_phone" value="" data-hash='1nv73cileo1g'/>
                                                                                            @if ($errors->has('phone'))
                                                                                                <div class="alert alert-info">
                                                                                                    <strong>{{ $errors->first('phone') }}</strong>
                                                                                                </div>
                                                                                            @endif
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="col-lg-12 form-margin">
                                                                                        <div class="form-group">
                                                                                            <label>Date Of Birth</label>
                                                                                            <input type="date" name="DateOfBirth" required="true" class="form-control">
                                                                                        </div>
                                                                                    </div>


                                                                                    <div class="row">

                                                                                        <div class="col-lg-6">
                                                                                            <div class="form-group">
                                                                                                <label>Country</label>
                                                                                                <select name="country" id="country" class="form-control">
                                                                                                    @foreach ($country as $row)
                                                                                                        <option  value="{{ $row->id }}">{{ $row->name }}</option>
                                                                                                    @endforeach
                                                                                                </select>
                                                                                            </div>
                                                                                        </div>

                                                                                        <div class="col-lg-6 form-margin">
                                                                                            <div class="form-group">
                                                                                                <label>State</label>
                                                                                                <select name="state" id="state" class="form-control">
                                                                                                </select>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>


                                                                                    <div class="row">
                                                                                        <div class="col-lg-6 form-margin">
                                                                                            <div class="form-group">
                                                                                                <label>State Areas</label>
                                                                                                <select name="state_area" class="form-control">
                                                                                                </select>

                                                                                            </div>
                                                                                        </div>

                                                                                        <div class="col-lg-6 form-margin">
                                                                                            <div class="form-group">
                                                                                                <label>Street Address</label>
                                                                                                <input type="text" name="StreetAddress" placeholder="Street Address" required="true" class="form-control">
                                                                                            </div>
                                                                                        </div>


                                                                                    </div>



                                                                                    <div class="cmb-row cmb-type-hide-show-password cmb2-id--freelancer-password" data-fieldtype="hide_show_password">
                                                                                        <div class="cmb-th">Password <span class="required">*</span></div>
                                                                                        <div class="cmb-td">

                                                                                            <span class="show_hide_password_wrapper">
                                                                                                <input type="password" class="regular-text" name="password" id="hide_show_password" value="" data-lpignore='1' autocomplete="off" data-hash='gl70hk4g8ss0' placeholder="Password" required="required"/>
                                                                                                <a class="toggle-password" title="Show"><span class="dashicons dashicons-hidden"></span></a>
                                                                                                 @if ($errors->has('password'))
                                                                                                    <div class="alert alert-info">
                                                                                                        <strong>{{ $errors->first('password') }}</strong>
                                                                                                    </div>
                                                                                                @endif
                                                                                            </span>

                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="cmb-row cmb-type-hide-show-password cmb2-id--freelancer-confirmpassword" data-fieldtype="hide_show_password">
                                                                                        <div class="cmb-th">Confirm Password <span class="required">*</span></div>
                                                                                        <div class="cmb-td">

                                                                                            <span class="show_hide_password_wrapper">
                                                                                                <input type="password" class="regular-text" name="password_confirmation" id="hide_show_password" value="" data-lpignore='1' autocomplete="off" data-hash='5mhknr9cfoq0' placeholder="Confirm Password" required="required"/>
                                                                                                <a class="toggle-password" title="Show"><span class="dashicons dashicons-hidden"></span></a>
                                                                                                 @if ($errors->has('password_confirmation'))
                                                                                                    <div class="alert alert-info">
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
                                                                                    <input type="checkbox" name="terms_and_conditions" value="on" id="register-terms-and-conditions" required>
                                                                                    You accept our <a href="#">Terms and Conditions and Privacy Policy</a>
                                                                                </label>
                                                                            </div><button type="submit" name="submit-cmb-register-freelancer" class="btn btn-theme w-100">Register<i class="flaticon-right-up next"></i></button></form>
                                                                    </div>

                                                                </div>
                                                            </div>
                                                            <div class="tab-pane " id="apus_register_form_employer_L4hSo">

                                                                <div class="register-form-wrapper">
                                                                    <div class="container-form">



                                                                        <form action="{{ route('index.staffing.employer.save')}}" class="cmb-form _employer_register_fields" method="post" id="_employer_register_fields_9499" enctype="multipart/form-data" encoding="multipart/form-data">

                                                                            {{ csrf_field() }}

                                                                            @if(session('error'))
                                                                                <div class="notification-alert-danger alert alert-danger alert-dismissible fade show" role="alert">
                                                                                    {{session('error')}}
                                                                                    <button type="button" class="close" data-bs-dismiss="alert" aria-label="Close">
                                                                                        <span aria-hidden="true">×</span>
                                                                                    </button>
                                                                                </div>
                                                                            @endif


                                                                            <div class="cmb2-wrap form-table">
                                                                                <div id="cmb2-metabox-_freelancer_register_fields" class="cmb2-metabox cmb-field-list">



                                                                                    <div class="cmb-row cmb-type-text cmb2-id--freelancer-email table-layout" data-fieldtype="text">

                                                                                        <div class="cmb-th">FullName <span class="required">*</span></div>
                                                                                        <div class="cmb-td">
                                                                                            <input type="text" class="regular-text" name="fullname" id="_freelancer_email" value="" data-hash='6f8hndb4f7b0' placeholder="fullName" required="required"/>
                                                                                            @if ($errors->has('fullname'))
                                                                                                <div class="alert alert-info">
                                                                                                    <strong>{{ $errors->first('fullname') }}</strong>
                                                                                                </div>
                                                                                            @endif
                                                                                        </div>
                                                                                    </div>


                                                                                    <div class="cmb-row cmb-type-text cmb2-id--freelancer-email table-layout" data-fieldtype="text">

                                                                                        <div class="cmb-th">Email <span class="required">*</span></div>
                                                                                        <div class="cmb-td">
                                                                                            <input type="text" class="regular-text" name="email" id="_freelancer_email" value="" data-hash='6f8hndb4f7b0' placeholder="Email" required="required"/>
                                                                                            @if ($errors->has('email'))
                                                                                                <div class="alert alert-info">
                                                                                                    <strong>{{ $errors->first('email') }}</strong>
                                                                                                </div>
                                                                                            @endif
                                                                                        </div>
                                                                                    </div>


                                                                                    <div class="cmb-row cmb-type-text cmb2-id--freelancer-phone table-layout" data-fieldtype="text">
                                                                                        <div class="cmb-th">
                                                                                            <label for="_freelancer_phone">Phone Number</label>
                                                                                        </div>
                                                                                        <div class="cmb-td">
                                                                                            <input type="text" class="regular-text" name="phone" id="_freelancer_phone" value="" data-hash='1nv73cileo1g'/>
                                                                                            @if ($errors->has('phone'))
                                                                                                <div class="alert alert-info">
                                                                                                    <strong>{{ $errors->first('phone') }}</strong>
                                                                                                </div>
                                                                                            @endif
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="col-lg-12 form-margin">
                                                                                        <div class="form-group">
                                                                                            <label>Your Office Title (eg CEO)</label>
                                                                                            <input type="text" name="office_title" required="true" class="form-control">
                                                                                        </div>
                                                                                    </div>


                                                                                    <div class="row">

                                                                                        <div class="col-lg-6">
                                                                                            <div class="form-group">
                                                                                                <label>Country</label>
                                                                                                <select name="country_ep" id="country_ep" class="form-control">
                                                                                                    @foreach ($country as $row)
                                                                                                        <option  value="{{ $row->id }}">{{ $row->name }}</option>
                                                                                                    @endforeach
                                                                                                </select>
                                                                                            </div>
                                                                                        </div>

                                                                                        <div class="col-lg-6 form-margin">
                                                                                            <div class="form-group">
                                                                                                <label>State</label>
                                                                                                <select name="state_ep" id="state_ep" class="form-control">
                                                                                                </select>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>


                                                                                    <div class="row">
                                                                                        <div class="col-lg-6 form-margin">
                                                                                            <div class="form-group">
                                                                                                <label>State Areas</label>
                                                                                                <select name="state_area_ep" class="form-control">
                                                                                                </select>

                                                                                            </div>
                                                                                        </div>

                                                                                        <div class="col-lg-6 form-margin">
                                                                                            <div class="form-group">
                                                                                                <label>Street Address</label>
                                                                                                <input type="text" name="StreetAddress" placeholder="Street Address" required="true" class="form-control">
                                                                                            </div>
                                                                                        </div>


                                                                                    </div>



                                                                                    <div class="cmb-row cmb-type-hide-show-password cmb2-id--freelancer-password" data-fieldtype="hide_show_password">
                                                                                        <div class="cmb-th">Password <span class="required">*</span></div>
                                                                                        <div class="cmb-td">

                                                                                            <span class="show_hide_password_wrapper">
                                                                                                <input type="password" class="regular-text" name="password" id="hide_show_password" value="" data-lpignore='1' autocomplete="off" data-hash='gl70hk4g8ss0' placeholder="Password" required="required"/>
                                                                                                <a class="toggle-password" title="Show"><span class="dashicons dashicons-hidden"></span></a>
                                                                                                 @if ($errors->has('password'))
                                                                                                    <div class="alert alert-info">
                                                                                                        <strong>{{ $errors->first('password') }}</strong>
                                                                                                    </div>
                                                                                                @endif
                                                                                            </span>

                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="cmb-row cmb-type-hide-show-password cmb2-id--freelancer-confirmpassword" data-fieldtype="hide_show_password">
                                                                                        <div class="cmb-th">Confirm Password <span class="required">*</span></div>
                                                                                        <div class="cmb-td">

                                                                                            <span class="show_hide_password_wrapper">
                                                                                                <input type="password" class="regular-text" name="password_confirmation" id="hide_show_password" value="" data-lpignore='1' autocomplete="off" data-hash='5mhknr9cfoq0' placeholder="Confirm Password" required="required"/>
                                                                                                <a class="toggle-password" title="Show"><span class="dashicons dashicons-hidden"></span></a>
                                                                                                 @if ($errors->has('password_confirmation'))
                                                                                                    <div class="alert alert-info">
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
                                                                                    <input type="checkbox" name="terms_and_conditions" value="on" id="register-terms-and-conditions" required>
                                                                                    You accept our <a href="#">Terms and Conditions and Privacy Policy</a>
                                                                                </label>
                                                                            </div>
                                                                            <button type="submit" name="submit-cmb-register-freelancer" class="btn btn-theme w-100">Register now<i class="flaticon-right-up next"></i></button></form>
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
    </div><!-- .site-content -->



@endsection
