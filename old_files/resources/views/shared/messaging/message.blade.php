@extends('shared.layouts.users')
@section('content')

    <!-- Breadcrumb Area -->
    <div class="breadcrumb-area">
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
    </div>
    <!-- Start Messages Area -->

@endsection
