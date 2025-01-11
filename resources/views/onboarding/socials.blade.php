<main class="content-wrapper">
    <div class="container pt-3 pt-sm-4 pt-md-5 pb-5">
      <div class="row pt-lg-2 pt-xl-3 pb-1 pb-sm-2 pb-md-3 pb-lg-4 pb-xl-5">

        <!-- Sidebar navigation -->
        <aside class="col-lg-3 col-xl-4 mb-3" style="margin-top: -100px">
          <div class="sticky-top overflow-y-auto" style="padding-top: 100px">
            <ul class="nav flex-lg-column flex-nowrap gap-4 gap-lg-0 text-nowrap pb-2 pb-lg-0">
              <li class="nat-item">
                <a class="nav-link d-inline-flex px-0 px-lg-3  disabled" >
                  <i class="fi-circle fs-lg me-2 "></i>
                  <i class="fi-arrow-down-circle d-lg-none fs-lg me-2"></i>
                  {{__('Upload Picture')}}
                </a>
              </li>
              <li class="nat-item">
                <a class="nav-link d-inline-flex px-0 px-lg-3 disabled" >
                  <i class="fi-circle fs-lg me-2 "></i>
                  {{__('About Me')}}
                </a>
              </li>
              <li class="nat-item">
                <a class="nav-link d-inline-flex px-0 px-lg-3 disabled">
                  <i class="fi-circle fs-lg me-2"></i>
                  {{__('Location')}}
                </a>
              </li>
              <li class="nat-item">
                <a class="nav-link d-inline-flex px-0 px-lg-3 disabled">
                  <i class="fi-circle fs-lg me-2"></i>
                  {{__('Category')}}
                </a>
              </li>
              <li class="nat-item">
                <a class="nav-link d-inline-flex px-0 px-lg-3 disabled">
                  <i class="fi-circle fs-lg me-2"></i>
                  {{__('Charge')}}
                </a>
              </li>
              <li class="nat-item">
                <a class="nav-link d-inline-flex px-0 px-lg-3 disabled">
                  <i class="fi-arrow-right-circle d-none d-lg-inline-flex fs-lg me-2"></i>
                  {{__('Skills')}}
                </a>
              </li>


              <li class="nat-item">
                <a class="nav-link d-inline-flex px-0 px-lg-3 pe-none " aria-current="page">
                  <i class="fi-arrow-right-circle d-none d-lg-inline-flex fs-lg me-2"></i>
                  {{__('Socials')}}
                </a>
              </li>
            </ul>
          </div>
        </aside>


        <div class="col-lg-9 col-xl-8">
        <h1 class="h2 pb-2 pb-lg-3">Are you an Influecer ?</h1>
        <form id="onboarding-form" action="{{ route('onboarding.update') }}" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}

            <input type="hidden" name="step" value="socials">

        <div class="nav nav-pills row row-cols-2 gap-0 g-3 g-sm-4 pb-3 pb-sm-4 mb-xl-4">
            <div class="col">
                <input type="radio" class="btn-check" id="influencer-yes" name="is_influencer" value="1" onchange="toggleSocialMediaFields(1)">
                <label class="nav-link flex-column w-100 h-100 align-items-start rounded" for="influencer-yes">
                    <span class="h6 pt-1 mb-1">I am an Influencer</span>
                    <span class="fw-normal text-body pb-1">I have a large community influence</span>
                </label>
            </div>
            <div class="col">
                <input type="radio" class="btn-check" id="influencer-no" name="is_influencer" value="0" onchange="toggleSocialMediaFields(0)" checked>
                <label class="nav-link flex-column w-100 h-100 align-items-start rounded" for="influencer-no">
                    <span class="h6 pt-1 mb-1">I am not an Influencer</span>
                    <span class="fw-normal text-body pb-1">I don't have a community influence</span>
                </label>
            </div>
        </div>

        {{-- <div id="basicSocialInputs" class="mb-3 pb-3">
            <label for="facebook">Facebook</label>
            <input type="url" name="facebook" id="facebook" class="form-control form-control-lg mb-3">
            <label for="instagram">Instagram</label>
            <input type="url" name="instagram" id="instagram" class="form-control form-control-lg" >
        </div> --}}


        <div id="socialMediaFields" style="display: none;">
            <div id="socialMediaContainer" class="mb-3">
                <!-- Dynamically added social media rows will appear here -->
            </div > 
            <div class="d-flex justify-content-between">
            <button type="button" class="btn btn-primary mb-3" onclick="addSocialMediaRow()">
                <i class="fi-plus"></i> Add Social Media
            </button>  
        </div>
        
        </div>

        
        <button type="submit" class="btn btn-success ms-auto justify-content-start align-center-end mb-3">
            Submit Onboarding
        </button>
        </form>
    </div>
       

    
      
     

        
      </div>
    </div>
  </div>
</main>
