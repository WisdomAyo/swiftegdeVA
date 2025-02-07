<div class="sidebar-wrapper ">
    <aside class="sidebar sidebar-left" itemscope="itemscope" itemtype="">
        <div class="close-sidebar-btn d-lg-none"> <i class="ti-close"></i> <span>Close</span></div>
        <aside class="widget widget_apus_elementor_template">
            <div data-elementor-type="section" data-elementor-id="2061" class="elementor elementor-2061">
                <section
                    class="elementor-section elementor-top-section elementor-element elementor-element-cdf50f8 elementor-section-boxed elementor-section-height-default elementor-section-height-default"
                    data-id="cdf50f8" data-element_type="section">
                    <div class="elementor-container elementor-column-gap-no">
                        <div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-73e5261"
                            data-id="73e5261" data-element_type="column">
                            <div class="elementor-widget-wrap elementor-element-populated">
                                <div class="elementor-element elementor-element-0ec44e6 elementor-widget elementor-widget-apus_element_freelancer_search_form"
                                    data-id="0ec44e6" data-element_type="widget"
                                    data-widget_type="apus_element_freelancer_search_form.default">
                                    <!-- Desktop Version -->
<div class="elementor-widget-container card shadow border-0 p-3 d-none d-lg-block"> 
    <div class="widget-listing-search-form w-100">
        <form action="{{ route('changeCurrency') }}" method="POST" class="d-flex align-items-center justify-content-between">
            @csrf

            <!-- Currency Dropdown -->
            {{-- <label class="heading-label" style="margin-right: 10px;">
                <strong>Currency</strong>
            </label>
            <select class="form-control" style="margin-right: 10px;" onchange="this.form.submit()" name="currency" id="currency">
                <option value="USD" {{ session('currency', $currency) == 'USD' ? 'selected' : '' }}>USD</option>
                <option value="NGN" {{ session('currency', $currency) == 'NGN' ? 'selected' : '' }}>NGN</option>
                <option value="GBP" {{ session('currency', $currency) == 'GBP' ? 'selected' : '' }}>GBP</option>
                <option value="EUR" {{ session('currency', $currency) == 'EUR' ? 'selected' : '' }}>EUR</option>
            </select> --}}

            <!-- Categories Dropdown -->
            <label class="heading-label" style="margin-right: 10px;">
                <strong>Categories</strong>
            </label>
            <select name="job_category" class="form-control" style="margin-right: 10px;">
                @foreach (\App\Models\BusinessCategory::all() as $row)
                    <option value="{{ $row->id }}">{{ $row->title }}</option>
                @endforeach
            </select>

            <!-- Gender Dropdown -->
            <label for="MT80j_Male" class="heading-label" style="margin-right: 10px;">
                <strong>Gender</strong>
            </label>
            <select name="filter-gender" class="form-control" id="MT80j_Male" style="margin-right: 10px;">
                <option value="">Gender</option>
                <option value="Both">Both</option>
                <option value="Female">Female</option>
                <option value="Male">Male</option>
            </select>

            <!-- Find Listing Button -->
            <button class="btn btn-theme btn-inverse" type="submit">
                Find Listing<i class="flaticon-right-up next"></i>
            </button>
        </form>
    </div>
</div>

<!-- Mobile Version -->
<div class="elementor-widget-container d-block d-md-none">
    <div class="widget-listing-search-form vertical">
        <label class="heading-label">
            <strong>Currency</strong>
        </label>
        <form action="{{ route('changeCurrency') }}" method="POST">
            @csrf
            <select class="form-control border-0" onchange="this.form.submit()" name="currency" id="currency">
                <option value="USD" {{ session('currency', $currency) == 'USD' ? 'selected' : '' }}>USD</option>
                <option value="NGN" {{ session('currency', $currency) == 'NGN' ? 'selected' : '' }}>NGN</option>
                <option value="GBP" {{ session('currency', $currency) == 'GBP' ? 'selected' : '' }}>GBP</option>
                <option value="EUR" {{ session('currency', $currency) == 'EUR' ? 'selected' : '' }}>EUR</option>
            </select>
        </form>

        <form id="filter-listing-form-MT80j" action="{{ route('search.now') }}" class="form-search filter-listing-form" method="GET">
            {{ csrf_field() }}
            <div class="search-form-inner">
                <div class="main-inner clearfix">
                    <div class="content-main-inner">
                        <div class="row">
                            <div class="item-column col-12">
                                <div class="form-group form-group-category tax-checklist-field tax-viewmore-field show-more">
                                    <label class="heading-label">Categories</label>
                                    <div class="form-group-inner">
                                        <div class="terms-list-wrapper">
                                            <ul class="terms-list circle-check level-0">
                                                @foreach (\App\Models\BusinessCategory::all() as $row)
                                                    <li class="list-item level-0">
                                                        <div class="list-item-inner">
                                                            <input id="filter-category-business-{{ $row->id }}" type="checkbox" name="job_category" value="{{ $row->id }}">
                                                            <label for="filter-category-business-{{ $row->id }}">{{ $row->title }}</label>
                                                        </div>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                        <a class="toggle-filter-viewmore" href="javascript:void(0);">
                                            <span class="icon-more"><i class="ti-plus"></i></span>
                                            <span class="text">Show More</span>
                                        </a>
                                    </div>
                                </div>
                            </div>

                            <div class="item-column col-12">
                                <div class="form-group form-group-Male">
                                    <label for="MT80j_Male" class="heading-label">Gender</label>
                                    <div class="form-group-inner inner">
                                        <select name="filter-gender" class="form-control select2-hidden-accessible" id="MT80j_Male" data-placeholder="Gender">
                                            <option value="">Gender</option>
                                            <option value="Both">Both</option>
                                            <option value="Female">Female</option>
                                            <option value="Male">Male</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12 form-group-search">
                                <button class="btn-submit w-100 btn btn-theme btn-inverse" type="submit">
                                    Find Listing<i class="flaticon-right-up next"></i>
                                </button>
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
                    </div>
                </section>
            </div>
        </aside>
    </aside>
</div>
