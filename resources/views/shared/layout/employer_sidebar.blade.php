<!-- Sidebar navigation that turns into offcanvas on screens < 992px wide (lg breakpoint) -->






<aside class="col-lg-3" style="margin-top: -105px">
    <div class="offcanvas-lg offcanvas-start sticky-lg-top pe-lg-3 pe-xl-4" id="accountSidebar">
      <div class="d-none d-lg-block" style="height: 105px"></div>

      <!-- Header -->
      <div class="offcanvas-header d-lg-block py-3 p-lg-0">
        <div class="d-flex flex-row flex-lg-column align-items-center align-items-lg-start">
          <div class="flex-shrink-0 bg-body-secondary border rounded-circle overflow-hidden" style="width: 64px; height: 64px">
            @if (!empty(Auth::user()->profile_image))
            <img src="{{ asset(Auth::user()->profile_image) }}" alt="Avatar">
            @else
            <img src="{{asset('asset/avata2.png')}}" alt="Avatar">
            @endif
          </div>
          <div class="pt-lg-3 ps-3 ps-lg-0">
            <h6 class="mb-1">{{Auth::user()->full_name}}</h6>
            <p class="fs-sm mb-0">{{Auth::user()->email}}</p>
          </div>
        </div>
        <button type="button" class="btn-close d-lg-none" data-bs-dismiss="offcanvas" data-bs-target="#accountSidebar" aria-label="Close"></button>
      </div>

      <!-- Body (Navigation) -->
      <div class="offcanvas-body d-block pt-2 pt-lg-4 pb-lg-0">
        <nav class="list-group list-group-borderless">
          <a class="list-group-item list-group-item-action d-flex align-items-center {{Request::segment(2)  === "dashboard" ? "active" : ""}}" aria-current="page" href="{{route('employer.home')}}">
            <i class="fi-user fs-base opacity-75 me-2"></i>
           Dashboard
          </a>
          <a class="list-group-item list-group-item-action d-flex align-items-center {{Request::segment(2)  === "profile" ? "active" : ""}}" href="{{route('employer.profile')}}">
            <i class="fi-layers fs-base opacity-75 me-2"></i>
            View Profile
          </a>
          <a class="list-group-item list-group-item-action d-flex align-items-center {{Request::segment(2)  === "requests" ? "active" : ""}}" href="{{route('employer.requests')}}">
            <i class="fi-star fs-base opacity-75 me-2"></i>
            All Assigned Applicant
          </a>
          <a class="list-group-item list-group-item-action d-flex align-items-center {{Request::segment(2)  === "jobs" ? "active" : ""}}" href="{{route('employer.job')}}">
            <i class="fi-heart fs-base opacity-75 me-2"></i>
            Jobs
          </a>
          <a class="list-group-item list-group-item-action d-flex align-items-center {{Request::segment(2)  === "messages" ? "active" : ""}}" href="{{route('employer.message')}}">
            <i class="fi-credit-card fs-base opacity-75 me-2"></i>
            Messages
          </a>
          <a class="list-group-item list-group-item-action d-flex align-items-center {{Request::segment(3)  === "change-password" ? "active" : ""}}" href="{{route('employer.change.password')}}">
            <i class="fi-settings fs-base opacity-75 me-2"></i>
           Change Password
          </a>

        </nav>
        <nav class="list-group list-group-borderless pt-3">
          <a class="list-group-item list-group-item-action d-flex align-items-center text-danger" href="{{route('account.logout')}}">
            <i class="fi-log-out fs-base opacity-75 me-2"></i>
            Sign out
          </a>
        </nav>
      </div>
    </div>
  </aside>
