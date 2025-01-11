@extends('shared.layout.employer')
@section('content')

    <!-- Breadcrumb Area -->
    {{-- <div class="breadcrumb-area">
        <h1>Messages</h1>
        <ol class="breadcrumb">
            <li class="item"><a href="#">Home</a></li>
            <li class="item"><a href="#">Dashboard</a></li>
            <li class="item">Messages</li>
        </ol>
    </div>
    <!-- End Breadcrumb Area -->

    <!-- Start Messages Area -->
    <div class="chat-content-area">
        <div class="sidebar-left">
            <div class="sidebar">

                <div class="sidebar-content d-flex chat-sidebar" data-simplebar="init"><div class="simplebar-wrapper" style="margin: 0px;"><div class="simplebar-height-auto-observer-wrapper"><div class="simplebar-height-auto-observer"></div></div><div class="simplebar-mask"><div class="simplebar-offset" style="right: -20px; bottom: 0px;"><div class="simplebar-content-wrapper" style="height: 100%; padding-right: 20px; padding-bottom: 0px; overflow: hidden scroll;"><div class="simplebar-content" style="padding: 0px;">
                                        <div class="chat-menu">
                                            <label class="d-block list-group-label mt-0">Chats</label>

                                            <ul class="list-group list-group-user list-unstyled mb-0">
                                                @foreach($messages as $row)
                                                    @if(\Illuminate\Support\Facades\Request::segment(1) === "employer")
                                                        <a href="{{url('/employer/messages'.'/'.$row->identity)}}">
                                                        @elseif(\Illuminate\Support\Facades\Request::segment(1) === "user")
                                                        <a href="{{url('/user/messages'.'/'.$row->identity)}}">
                                                            @else
                                                                <a href="{{url('/admin/secure/user/messages'.'/'.$row->identity)}}">
                                                        @endif

                                                        <li>
                                                            <div class="d-flex align-items-center">
                                                                <div class="avatar me-3" style="margin: 10px;">
                                                                    @if(!empty($row->profile_image))
                                                                        <img src=" {{asset('profile/photo/'.$row->id.'/'.$row->profile_image)}}"  width="30" height="30" class="rounded-circle" alt="image">
                                                                    @else
                                                                        <img src="{{asset('icon_02.jpeg')}}" width="30" height="30" class="rounded-circle" alt="image">
                                                                    @endif
                                                                </div>

                                                                <div class="user-name">
                                                                    <h6>{{$row->full_name}}</h6>
                                                                </div>
                                                            </div>
                                                            <hr />
                                                        </li></a>
                                                @endforeach

                                                @if(\Illuminate\Support\Facades\Request::segment(1) === "admin")
                                                    @else
                                                        @foreach($messages_2 as $rw)
                                                            @if(\Illuminate\Support\Facades\Request::segment(1) === "employer")
                                                                <a href="{{url('/employer/messages'.'/'.$rw->identity)}}">
                                                                    @elseif(\Illuminate\Support\Facades\Request::segment(1) === "user")
                                                                        <a href="{{url('/user/messages'.'/'.$rw->identity)}}">
                                                                            @else
                                                                                <a href="{{url('/admin/secure/user/messages'.'/'.$rw->identity)}}">
                                                                                    @endif

                                                                                    <li>
                                                                                        <div class="d-flex align-items-center">
                                                                                            <div class="avatar me-3" style="margin: 10px;">

                                                                                                @if($rw->receiver_id == 1)
                                                                                                    @if(!empty($rw->profile_image))
                                                                                                        <img src=" {{asset('profile/photo/'.$rw->receiver_id .'/'.$rw->profile_image)}}"  width="30" height="30" class="rounded-circle" alt="image">
                                                                                                    @else
                                                                                                        <img src="{{asset('icon_02.jpeg')}}" width="30" height="30" class="rounded-circle" alt="image">
                                                                                                    @endif
                                                                                                @else
                                                                                                    @if(!empty($rw->profile_image))
                                                                                                        <img src=" {{asset('profile/photo/'.$rw->id.'/'.$rw->profile_image)}}"  width="30" height="30" class="rounded-circle" alt="image">
                                                                                                    @else
                                                                                                        <img src="{{asset('icon_02.jpeg')}}" width="30" height="30" class="rounded-circle" alt="image">
                                                                                                    @endif
                                                                                                @endif
                                                                                            </div>

                                                                                            <div class="user-name">
                                                                                                <h6>{{$rw->full_name}}</h6>
                                                                                            </div>
                                                                                        </div>
                                                                                        <hr />
                                                                                    </li>
                                                                                </a>

                                                        @endforeach
                                                @endif

                                            </ul>


                                        </div>
                                    </div></div></div></div><div class="simplebar-placeholder" style="width: 250px; height: 725px;"></div></div><div class="simplebar-track simplebar-horizontal" style="visibility: hidden;"><div class="simplebar-scrollbar" style="transform: translate3d(0px, 0px, 0px); display: none;"></div></div><div class="simplebar-track simplebar-vertical" style="visibility: visible;"><div class="simplebar-scrollbar" style="height: 25px; transform: translate3d(0px, 0px, 0px); display: block;"></div></div></div>
            </div>
        </div>

        <div class="content-right">
            <div class="chat-area">
                <div class="chat-list-wrapper">
                    <div class="chat-list">
                        <div class="chat-list-header d-flex align-items-center">

                            <div class="header-left d-flex align-items-center">

                                @if(!empty(Auth::user()->profile_image))
                                    <div class="avatar me-3">
                                        <img src="{{asset('profile/photo/'.Auth::user()->id.'/'.Auth::user()->profile_image)}}"  width="70" height="70" class="rounded-circle" alt="image">
                                        <span class="status-online"></span>
                                    </div>
                                @else
                                    <div class="avatar me-3">
                                        <img src="{{asset('icon_02.jpeg')}}"  width="70" height="70" class="rounded-circle" alt="image">
                                        <span class="status-online"></span>
                                    </div>
                                @endif

                            </div>



                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div> --}}
    <!-- Start Messages Area -->


<link rel="stylesheet" href="{{ asset('asset/css/template.bundle.css') }}">


    <div class="col-lg-9">


        <aside class="sidebar bg-light">
            <div class="tab-content h-100" role="tablist">

                <!-- Chats -->
                <div class="tab-pane fade h-100 show active" id="tab-content-chats" role="tabpanel">
                    <div class="d-flex flex-column h-100 position-relative">
                        <div class="hide-scrollbar">

                            <div class="container py-8">
                                <!-- Title -->
                                <div class="mb-8">
                                    <h2 class="fw-bold m-0">Chats</h2>
                                </div>

                                <!-- Search -->
                                <div class="mb-6">
                                    <form action="#">
                                        <div class="input-group">
                                            <div class="input-group-text">
                                                <div class="icon icon-lg">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>
                                                </div>
                                            </div>

                                            <input type="text" class="form-control form-control-lg ps-0" placeholder="Search messages or users" aria-label="Search for messages or users...">
                                        </div>
                                    </form>
                                </div>

                                <!-- Chats -->
                                <div class="card-list">


                                    <!-- Card -->
                                    <a href="chat-direct.html" class="card border-0 text-reset">
                                        <div class="card-body">
                                            <div class="row gx-5">
                                                <div class="col-auto">
                                                    <div class="avatar avatar-online">
                                                        <img src="assets/img/avatars/6.jpg" alt="#" class="avatar-img">
                                                    </div>
                                                </div>

                                                <div class="col">
                                                    <div class="d-flex align-items-center mb-3">
                                                        <h5 class="me-auto mb-0">Ollie Chandler</h5>
                                                        <span class="text-muted extra-small ms-2">08:45 PM</span>
                                                    </div>

                                                    <div class="d-flex align-items-center">
                                                        <div class="line-clamp me-auto">
                                                            Hello! Yeah, I'm going to meet friend of mine at the departments stores now.
                                                        </div>

                                                        <div class="badge badge-circle bg-primary ms-5">
                                                            <span>3</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div><!-- .card-body -->
                                    </a>
                                    <!-- Card -->
                                    <!-- Card -->
                                </div>
                                <!-- Chats -->
                            </div>

                        </div>
                    </div>
                </div>

            </div>
        </aside>
        <!-- Sidebar -->

        <!-- Chat -->
        <main class="main is-visible" data-dropzone-area="">
            <div class="container h-100">

                <div class="d-flex flex-column h-100 position-relative">
                    <!-- Chat: Header -->
                    <div class="chat-header border-bottom py-4 py-lg-7">
                        <div class="row align-items-center">

                            <!-- Mobile: close -->
                            <div class="col-2 d-xl-none">
                                <a class="icon icon-lg text-muted" href="#" data-toggle-chat="">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-left"><polyline points="15 18 9 12 15 6"></polyline></svg>
                                </a>
                            </div>
                            <!-- Mobile: close -->

                            <!-- Content -->
                            <div class="col-8 col-xl-12">
                                <div class="row align-items-center text-center text-xl-start">
                                    <!-- Title -->
                                    <div class="col-12 col-xl-6">
                                        <div class="row align-items-center gx-5">
                                            <div class="col-auto">
                                                <div class="avatar avatar-online d-none d-xl-inline-block">
                                                    <img class="avatar-img" src="assets/img/avatars/2.jpg" alt="">
                                                </div>
                                            </div>

                                            <div class="col overflow-hidden">
                                                <h5 class="text-truncate">Ollie Chandler</h5>
                                                <p class="text-truncate">is typing<span class='typing-dots'><span>.</span><span>.</span><span>.</span></span></p>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Title -->

                                    <!-- Toolbar -->
                                    <div class="col-xl-6 d-none d-xl-block">
                                        <div class="row align-items-center justify-content-end gx-6">
                                            <div class="col-auto">
                                                <a href="#" class="icon icon-lg text-muted" data-bs-toggle="offcanvas" data-bs-target="#offcanvas-more" aria-controls="offcanvas-more">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-horizontal"><circle cx="12" cy="12" r="1"></circle><circle cx="19" cy="12" r="1"></circle><circle cx="5" cy="12" r="1"></circle></svg>
                                                </a>
                                            </div>

                                            <div class="col-auto">
                                                <div class="avatar-group">
                                                    <a href="#" class="avatar avatar-sm" data-bs-toggle="modal" data-bs-target="#modal-user-profile">
                                                        <img class="avatar-img" src="assets/img/avatars/2.jpg" alt="#">
                                                    </a>

                                                    <a href="#" class="avatar avatar-sm" data-bs-toggle="modal" data-bs-target="#modal-profile">
                                                        <img class="avatar-img" src="assets/img/avatars/1.jpg" alt="#">
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Toolbar -->
                                </div>
                            </div>
                            <!-- Content -->

                            <!-- Mobile: more -->
                            <div class="col-2 d-xl-none text-end">
                                <a href="#" class="icon icon-lg text-muted" data-bs-toggle="offcanvas" data-bs-target="#offcanvas-more" aria-controls="offcanvas-more">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-vertical"><circle cx="12" cy="12" r="1"></circle><circle cx="12" cy="5" r="1"></circle><circle cx="12" cy="19" r="1"></circle></svg>
                                </a>
                            </div>
                            <!-- Mobile: more -->

                        </div>
                    </div>
                    <!-- Chat: Header -->

                    <!-- Chat: Content -->
                    <div class="chat-body hide-scrollbar flex-1 h-100">
                        <div class="chat-body-inner">
                            <div class="py-6 py-lg-12">

                                <!-- Message -->
                                <div class="message">
                                    <a href="#" data-bs-toggle="modal" data-bs-target="#modal-user-profile" class="avatar avatar-responsive">
                                        <img class="avatar-img" src="assets/img/avatars/2.jpg" alt="">
                                    </a>

                                    <div class="message-inner">
                                        <div class="message-body">
                                            <div class="message-content">
                                                <div class="message-text">
                                                    <p>Hey, Marshall! How are you? Can you please change the color theme of the website to pink and purple?</p>
                                                </div>

                                                <!-- Dropdown -->
                                                <div class="message-action">
                                                    <div class="dropdown">
                                                        <a class="icon text-muted" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-vertical"><circle cx="12" cy="12" r="1"></circle><circle cx="12" cy="5" r="1"></circle><circle cx="12" cy="19" r="1"></circle></svg>
                                                        </a>

                                                        <ul class="dropdown-menu">
                                                            <li>
                                                                <a class="dropdown-item d-flex align-items-center" href="#">
                                                                    <span class="me-auto">Edit</span>
                                                                    <div class="icon">
                                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-3"><path d="M12 20h9"></path><path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z"></path></svg>
                                                                    </div>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a class="dropdown-item d-flex align-items-center" href="#">
                                                                    <span class="me-auto">Reply</span>
                                                                    <div class="icon">
                                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-corner-up-left"><polyline points="9 14 4 9 9 4"></polyline><path d="M20 20v-7a4 4 0 0 0-4-4H4"></path></svg>
                                                                    </div>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <hr class="dropdown-divider">
                                                            </li>
                                                            <li>
                                                                <a class="dropdown-item d-flex align-items-center text-danger" href="#">
                                                                    <span class="me-auto">Delete</span>
                                                                    <div class="icon">
                                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg>
                                                                    </div>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="message-content">
                                                <div class="message-text">
                                                    <p>Send me the files please.</p>
                                                </div>

                                                <!-- Dropdown -->
                                                <div class="message-action">
                                                    <div class="dropdown">
                                                        <a class="icon text-muted" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-vertical"><circle cx="12" cy="12" r="1"></circle><circle cx="12" cy="5" r="1"></circle><circle cx="12" cy="19" r="1"></circle></svg>
                                                        </a>

                                                        <ul class="dropdown-menu">
                                                            <li>
                                                                <a class="dropdown-item d-flex align-items-center" href="#">
                                                                    <span class="me-auto">Edit</span>
                                                                    <div class="icon">
                                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-3"><path d="M12 20h9"></path><path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z"></path></svg>
                                                                    </div>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a class="dropdown-item d-flex align-items-center" href="#">
                                                                    <span class="me-auto">Reply</span>
                                                                    <div class="icon">
                                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-corner-up-left"><polyline points="9 14 4 9 9 4"></polyline><path d="M20 20v-7a4 4 0 0 0-4-4H4"></path></svg>
                                                                    </div>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <hr class="dropdown-divider">
                                                            </li>
                                                            <li>
                                                                <a class="dropdown-item d-flex align-items-center text-danger" href="#">
                                                                    <span class="me-auto">Delete</span>
                                                                    <div class="icon">
                                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg>
                                                                    </div>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="message-footer">
                                            <span class="extra-small text-muted">08:45 PM</span>
                                        </div>
                                    </div>
                                </div>

                                <!-- Message -->
                                <div class="message message-out">
                                    <a href="#" data-bs-toggle="modal" data-bs-target="#modal-profile" class="avatar avatar-responsive">
                                        <img class="avatar-img" src="assets/img/avatars/1.jpg" alt="">
                                    </a>

                                    <div class="message-inner">
                                        <div class="message-body">
                                            <div class="message-content">
                                                <div class="message-text">
                                                    <blockquote class="blockquote overflow-hidden">
                                                        <h6 class="text-reset text-truncate">William Wright</h6>
                                                        <p class="small text-truncate">Hey, Marshall! How are you? Can you please change the color theme of the website to pink and purple?</p>
                                                    </blockquote>
                                                    <p>Hey, Marshall! How are you? Can you please change the color theme of the website to pink and purple?</p>
                                                </div>

                                                <!-- Dropdown -->
                                                <div class="message-action">
                                                    <div class="dropdown">
                                                        <a class="icon text-muted" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-vertical"><circle cx="12" cy="12" r="1"></circle><circle cx="12" cy="5" r="1"></circle><circle cx="12" cy="19" r="1"></circle></svg>
                                                        </a>

                                                        <ul class="dropdown-menu">
                                                            <li>
                                                                <a class="dropdown-item d-flex align-items-center" href="#">
                                                                    <span class="me-auto">Edit</span>
                                                                    <div class="icon">
                                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-3"><path d="M12 20h9"></path><path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z"></path></svg>
                                                                    </div>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a class="dropdown-item d-flex align-items-center" href="#">
                                                                    <span class="me-auto">Reply</span>
                                                                    <div class="icon">
                                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-corner-up-left"><polyline points="9 14 4 9 9 4"></polyline><path d="M20 20v-7a4 4 0 0 0-4-4H4"></path></svg>
                                                                    </div>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <hr class="dropdown-divider">
                                                            </li>
                                                            <li>
                                                                <a class="dropdown-item d-flex align-items-center text-danger" href="#">
                                                                    <span class="me-auto">Delete</span>
                                                                    <div class="icon">
                                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg>
                                                                    </div>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="message-content">
                                                <div class="message-text">

                                                    <div class="row align-items-center gx-4">
                                                        <div class="col-auto">
                                                            <a href="#" class="avatar avatar-sm">
                                                                <div class="avatar-text bg-white text-primary">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-down"><line x1="12" y1="5" x2="12" y2="19"></line><polyline points="19 12 12 19 5 12"></polyline></svg>
                                                                </div>
                                                            </a>
                                                        </div>
                                                        <div class="col overflow-hidden">
                                                            <h6 class="text-truncate text-reset">
                                                                <a href="#" class="text-reset">filename.json</a>
                                                            </h6>
                                                            <ul class="list-inline text-uppercase extra-small opacity-75 mb-0">
                                                                <li class="list-inline-item">79.2 KB</li>
                                                            </ul>
                                                        </div>
                                                    </div>

                                                </div>

                                                <!-- Dropdown -->
                                                <div class="message-action">
                                                    <div class="dropdown">
                                                        <a class="icon text-muted" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-vertical"><circle cx="12" cy="12" r="1"></circle><circle cx="12" cy="5" r="1"></circle><circle cx="12" cy="19" r="1"></circle></svg>
                                                        </a>

                                                        <ul class="dropdown-menu">
                                                            <li>
                                                                <a class="dropdown-item d-flex align-items-center" href="#">
                                                                    <span class="me-auto">Edit</span>
                                                                    <div class="icon">
                                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-3"><path d="M12 20h9"></path><path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z"></path></svg>
                                                                    </div>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a class="dropdown-item d-flex align-items-center" href="#">
                                                                    <span class="me-auto">Reply</span>
                                                                    <div class="icon">
                                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-corner-up-left"><polyline points="9 14 4 9 9 4"></polyline><path d="M20 20v-7a4 4 0 0 0-4-4H4"></path></svg>
                                                                    </div>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <hr class="dropdown-divider">
                                                            </li>
                                                            <li>
                                                                <a class="dropdown-item d-flex align-items-center text-danger" href="#">
                                                                    <span class="me-auto">Delete</span>
                                                                    <div class="icon">
                                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg>
                                                                    </div>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="message-footer">
                                            <span class="extra-small text-muted">08:45 PM</span>
                                        </div>
                                    </div>
                                </div>

                                <!-- Divider -->
                                <div class="message-divider">
                                    <small class="text-muted">Monday, Sep 16</small>
                                </div>




                            </div>
                        </div>
                    </div>
                    <!-- Chat: Content -->

                    <!-- Chat: Footer -->
                    <div class="chat-footer pb-3 pb-lg-7 position-absolute bottom-0 start-0">
                        <!-- Chat: Files -->
                        <div class="dz-preview bg-dark" id="dz-preview-row" data-horizontal-scroll="">
                        </div>
                        <!-- Chat: Files -->

                        <!-- Chat: Form -->
                        <form class="chat-form rounded-pill bg-dark" data-emoji-form="">
                            <div class="row align-items-center gx-0">
                                <div class="col-auto">
                                    <a href="#" class="btn btn-icon btn-link text-body rounded-circle" id="dz-btn">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-paperclip"><path d="M21.44 11.05l-9.19 9.19a6 6 0 0 1-8.49-8.49l9.19-9.19a4 4 0 0 1 5.66 5.66l-9.2 9.19a2 2 0 0 1-2.83-2.83l8.49-8.48"></path></svg>
                                    </a>
                                </div>

                                <div class="col">
                                    <div class="input-group">
                                        <textarea class="form-control px-0" placeholder="Type your message..." rows="1" data-emoji-input="" data-autosize="true"></textarea>

                                        <a href="#" class="input-group-text text-body pe-0" data-emoji-btn="">
                                            <span class="icon icon-lg">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-smile"><circle cx="12" cy="12" r="10"></circle><path d="M8 14s1.5 2 4 2 4-2 4-2"></path><line x1="9" y1="9" x2="9.01" y2="9"></line><line x1="15" y1="9" x2="15.01" y2="9"></line></svg>
                                            </span>
                                        </a>
                                    </div>
                                </div>

                                <div class="col-auto">
                                    <button class="btn btn-icon btn-primary rounded-circle ms-5">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-send"><line x1="22" y1="2" x2="11" y2="13"></line><polygon points="22 2 15 22 11 13 2 9 22 2"></polygon></svg>
                                    </button>
                                </div>
                            </div>
                        </form>
                        <!-- Chat: Form -->
                    </div>
                    <!-- Chat: Footer -->
                </div>

            </div>
        </main>



    </div>
<script src="{{ asset('asset/js/vendor.js') }}"></script>
<script src="{{ asset('asset/js/template.js') }}"></script>
@endsection
