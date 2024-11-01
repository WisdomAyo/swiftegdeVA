<div class="sidemenu-body">
    <ul class="sidemenu-nav metisMenu h-100" id="sidemenu-nav" data-simplebar>
        <li class="nav-item {{Request::segment(2)  === "dashboard" ? "active" : ""}}">
            <a href="{{route('employer.home')}}" class="nav-link">
                <span class="icon"><i class="ri-home-line"></i></span>
                <span class="menu-title">Dashboard</span>
            </a>
        </li>


        <li class="nav-item {{Request::segment(2)  === "requests" ? "active" : ""}}">
            <a href="{{route('employer.requests')}}" class="nav-link">
                <span class="icon"><i class="ri-briefcase-line"></i></span>
                <span class="menu-title">All Assigned Applicant</span>
            </a>
        </li>


{{--        <li class="nav-item {{Request::segment(3)  === "requests" ? "active" : ""}}">--}}
{{--            <a href="{{route('employer.applicant.requests')}}" class="nav-link">--}}
{{--                <span class="icon"><i class="ri-send-plane-fill"></i></span>--}}
{{--                <span class="menu-title">All Direct Applicant </span>--}}
{{--            </a>--}}
{{--        </li>--}}

        <li class="nav-item {{Request::segment(2)  === "jobs" ? "active" : ""}}">
            <a href="{{route('employer.job')}}" class="nav-link">
                <span class="icon"><i class="ri-send-plane-fill"></i></span>
                <span class="menu-title">Jobs </span>
            </a>
        </li>


        <li class="nav-item">
            <a href="{{route('employer.message')}}" class="nav-link">
                <span class="icon"><i class="ri-chat-1-line"></i></span>
                <span class="menu-title">Messages</span>
            </a>
        </li>

        <li class="nav-item {{Request::segment(3)  === "change-password" ? "active" : ""}}">
            <a href="{{route('employer.change.password')}}" class="nav-link">
                <span class="icon"><i class="ri-lock-line"></i></span>
                <span class="menu-title">Change Password</span>
            </a>
        </li>

        <li class="nav-item {{Request::segment(2)  === "profile" ? "active" : ""}}">
            <a href="{{route('employer.profile')}}" class="nav-link">
                <span class="icon"><i class="ri-user-line"></i></span>
                <span class="menu-title">View Profile</span>
            </a>
        </li>


        <li class="nav-item {{Request::segment(3)  === "photo" ? "active" : ""}}">
            <a href="{{route('employer.profile.photo')}}" class="nav-link">
                <span class="icon"><i class="ri-user-5-line"></i></span>
                <span class="menu-title">Update profile Photo</span>
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
