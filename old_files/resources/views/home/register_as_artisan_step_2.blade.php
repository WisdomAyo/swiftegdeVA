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
                                                    <h2 class="elementor-heading-title elementor-size-default">Provide more details about your business</h2>
                                                </div>
                                            </div>
                                            <br />
                                            <div class="elementor-element elementor-element-9012cd4 elementor-widget elementor-widget-apus_element_register_tabs" data-id="9012cd4" data-element_type="widget" data-widget_type="apus_element_register_tabs.default">
                                                <div class="elementor-widget-container">
                                                    <div class="elementor-shortcode">
                                                        <div class="box-account">
                                                            <div class="login-form-wrapper">

                                                                <div id="login-form-wrapper2712" class="form-container">


                                                                    <form class="login-form" action="{{route('index.register.artisan.two')}}" method="post">

                                                                        {{ csrf_field() }}
                                                                        <div class="col-lg-12 col-md-12">
                                                                            <div class="form-group">
                                                                                <label>Years of Experience</label>
                                                                                <input type="number" name="WorkExperience" placeholder="Years of Experience"
                                                                                       class="form-control" required="true">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-lg-12 col-md-12">
                                                                            <div class="form-group">
                                                                                <label>Your Service Category</label>
                                                                                <select name="BusinessCategory" class="form-control" required="true">
                                                                                    <option>--Select Business Category--</option>
                                                                                    @foreach($category as $row)
                                                                                        <option value="{{$row->id}}">{{$row->title}}</option>
                                                                                    @endforeach
                                                                                </select>
                                                                            </div>
                                                                        </div>

                                                                        <div class="col-lg-12 col-md-12">
                                                                            <div class="form-group">
                                                                                <label>Website Address (Optional)</label>
                                                                                <input type="url" name="WebsiteAddress" placeholder="Website Address (Optional)"
                                                                                       class="form-control">
                                                                            </div>
                                                                        </div>

                                                                        <div class="col-lg-12 col-md-12">
                                                                            <div class="form-group">
                                                                                <label>Please describe what you do</label>
                                                                                <textarea name="ServiceDescription" required="true" class="form-control" row="10" col="10"
                                                                                          placeholder="Describe your Service"></textarea>
                                                                            </div>
                                                                        </div>

                                                                        <div class="col-lg-12 col-md-12">
                                                                            <div class="form-group">
                                                                                <label>Experience Level</label>
                                                                                <select name="experience_level" class="form-control" required="true">
                                                                                    <option>--Select Experience Level--</option>
                                                                                        <option value="Entry level - Intermediate level">Entry level - Intermediate level</option>
                                                                                        <option value="Intermediate level - Senior level">Intermediate level - Senior level</option>
                                                                                        <option value="Senior level">Senior level</option>
                                                                                </select>
                                                                            </div>
                                                                        </div>

                                                                        @foreach($old_request as $old_request_)
                                                                            <input type="hidden" name="old_request[]" value="{{ $old_request_ }}">

                                                                        @endforeach



                                                                        <div class="form-group">
                                                                            <button type="submit" class="btn btn-theme w-100" name="submit">Register<i class="flaticon-right-up next"></i></button>
                                                                        </div>

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

