<div class="sidemenu-body">
    <ul class="sidemenu-nav metisMenu h-100" id="sidemenu-nav" data-simplebar>
        <li class="nav-item {{Request::segment(3)  === "dashboard" ? "active" : ""}}">

            <a href="{{route('admin.home')}}" class="nav-link">
                <span class="icon"><i class="ri-home-line"></i></span>
                <span class="menu-title">Dashboard</span>
            </a>
        </li>

        <li class="nav-item {{Request::segment(3)  === "user" ? "active" : ""}}">
            <a href="{{route('admin.user.mgt')}}" class="nav-link">
                <span class="icon"><i class="ri-user-line"></i></span>
                <span class="menu-title">Freelancer Management</span>
            </a>
        </li>

        <li class="nav-item {{Request::segment(3)  === "services" ? "active" : ""}}">
            <a href="{{route('admin.user.artisan.services')}}" class="nav-link">
                <span class="icon"><i class="ri-user-line"></i></span>
                <span class="menu-title">Freelancer Services</span>
            </a>
        </li>



        <li class="nav-item {{Request::segment(4)  === "applicant" ? "active" : ""}}">
            <a href="{{route('admin.user.business.applicant')}}" class="nav-link">
                <span class="icon"><i class="ri-briefcase-2-fill"></i></span>
                <span class="menu-title">All Applicant</span>
            </a>
        </li>


        <li class="nav-item {{Request::segment(4)  === "business" ? "active" : ""}}">
            <a href="{{route('admin.user.business.category')}}" class="nav-link">
                <span class="icon"><i class="ri-file-list-2-fill"></i></span>
                <span class="menu-title">Business Category</span>
            </a>
        </li>



        <li class="nav-item {{Request::segment(4)  === "locations" ? "active" : ""}}">
            <a href="{{route('admin.user.locations')}}" class="nav-link">
                <span class="icon"><i class="ri-user-location-fill"></i></span>
                <span class="menu-title">Locations</span>
            </a>
        </li>


        <li class="nav-item {{Request::segment(4)  === "change-password" ? "active" : ""}}">
            <a href="{{route('admin.user.password')}}" class="nav-link">
                <span class="icon"><i class="ri-lock-line"></i></span>
                <span class="menu-title">Change Password</span>
            </a>
        </li>


        <li class="nav-item {{Request::segment(4)  === "photo" ? "active" : ""}}">
            <a href="{{route('admin.profile.photo')}}" class="nav-link">
                <span class="icon"><i class="ri-folder-user-line"></i></span>
                <span class="menu-title">Update Profile Picture</span>
            </a>
        </li>

        <li class="nav-item {{Request::segment(4)  === "profile" ? "active" : ""}}">
            <a href="{{route('admin.user.profile')}}" class="nav-link">
                <span class="icon"><i class="ri-user-line"></i></span>
                <span class="menu-title">View Profile</span>
            </a>
        </li>

        <li class="nav-item">
            <a href="{{route('account.logout')}}" class="nav-link">
                <span class="icon"><i class="ri-logout-circle-r-line"></i></span>
                <span class="menu-title">Logout</span>
            </a>
        </li>

    </ul>
</div>
