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
                                                @foreach($chat_mate as $row)
                                                    <a href="#">
                                                        <li>
                                                            <div class="d-flex align-items-center">
                                                                <div class="avatar me-3">
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
                                                        </li>
                                                    </a>
                                                @endforeach

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

                                    @foreach($user_mate as $row)

                                    <div class="avatar me-3">

                                    @if(!empty($row->profile_image))
                                            <img src=" {{asset('profile/photo/'.$row->id.'/'.$row->profile_image)}}"  width="30" height="30" class="rounded-circle" alt="image">
                                        @else
                                            <img src="{{asset('icon_02.jpeg')}}" width="30" height="30" class="rounded-circle" alt="image">
                                        @endif

                                    </div>

                                    <div class="user-name">
                                        <h6>{{$row->full_name}}</h6>
                                    </div>
                                    @endforeach
                            </div>



                        </div>

                        <div class="chat-container" data-simplebar="init">
                            <div class="simplebar-wrapper" style="margin: -25px -20px;">
                                <div class="simplebar-height-auto-observer-wrapper">
                                    <div class="simplebar-height-auto-observer"></div>
                                </div>
                                <div class="simplebar-mask">
                                    <div class="simplebar-offset" style="right: -20px; bottom: 0px;">
                                        <div class="simplebar-content-wrapper"
                                             style="height: 100%; padding-right: 20px; padding-bottom: 0px; overflow: hidden scroll;">
                                            <div class="simplebar-content" style="padding: 25px 20px;">
                                                <div class="chat-content">

                                                    @foreach($message_views as $row)

                                                        @if($row->initiator_id == Auth::user()->id)

                                                            <div class="chat">
                                                                <div class="chat-avatar">
                                                                    <a routerlink="#" class="d-inline-block">

                                                                        @if(!empty(Auth::user()->profile_image))
                                                                            <a href="#">
                                                                                <img src=" {{asset('profile/photo/'.Auth::user()->id.'/'.Auth::user()->profile_image)}}" width="50"
                                                                                                                                   height="50" class="rounded-circle" alt="image"></a>
                                                                        @else
                                                                            <img src="{{asset('icon_02.jpeg')}}" width="50"
                                                                                 height="50" class="rounded-circle" alt="image">
                                                                        @endif

                                                                    </a>
                                                                </div>

                                                                <div class="chat-body">
                                                                    <div class="chat-message">
                                                                        <p>{{$row->messages}}</p>
                                                                        <span class="time d-block">{{$row->created_at}}</span>
                                                                    </div>
                                                                </div>
                                                            </div>


                                                        @else

                                                            <div class="chat chat-left">
                                                                <div class="chat-avatar">
                                                                    <a routerlink="#" class="d-inline-block">

                                                                        @if(!empty(\App\Http\Controllers\User\UserController::getUser($row->receiver_id)))
                                                                            @if(!empty(\App\Http\Controllers\User\UserController::getUser($row->receiver_id)[0]['profile_image']))
                                                                                <a href="#">
                                                                                    <img src=" {{asset('profile/photo/'.\App\Http\Controllers\User\UserController::getUser($row->receiver_id)[0]['id'].'/'.\App\Http\Controllers\User\UserController::getUser($row->receiver_id)[0]['profile_image'])}}" width="50"
                                                                                         height="50" class="rounded-circle" alt="image"></a>
                                                                            @else
                                                                            <img src="{{asset('icon_02.jpeg')}}" width="50"
                                                                                 height="50" class="rounded-circle" alt="image">
                                                                             @endif
                                                                        @endif

                                                                    </a>
                                                                </div>

                                                                <div class="chat-body">
                                                                    <div class="chat-message">
                                                                        <h6>{{$row->messages}}</h6>
                                                                        <div class="user-name">
                                                                            @if(!empty(\App\Http\Controllers\User\UserController::getUser($row->receiver_id)))
                                                                                    <span>{{\App\Http\Controllers\User\UserController::getUser($row->receiver_id)[0]['full_name']}}</span>
                                                                            @endif
                                                                        </div>
                                                                        <span class="time d-block">{{$row->created_at}}</span>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                        @endif

                                                    @endforeach


                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="simplebar-placeholder" style="width: auto; height: 724px;"></div>
                            </div>
                            <div class="simplebar-track simplebar-horizontal" style="visibility: hidden;">
                                <div class="simplebar-scrollbar"
                                     style="transform: translate3d(0px, 0px, 0px); display: none;"></div>
                            </div>
                            <div class="simplebar-track simplebar-vertical" style="visibility: visible;">
                                <div class="simplebar-scrollbar"
                                     style="height: 25px; transform: translate3d(0px, 0px, 0px); display: block;"></div>
                            </div>
                        </div>

                        <div class="chat-list-footer">
                            <form method="post" action="{{ route('message.send.save')}}"  enctype="multipart/form-data" style="color:#000000;">
                                {{ csrf_field() }}
                                <input type="text" class="form-control" placeholder="Type your message..." name="message">
                                <input type="hidden" value="{{$receiver_id}}" name="sender_id">
                                <input type="hidden" value="{{Auth::user()->id}}" name="receiver_id">
                                <input type="hidden" value="{{$message_id}}" name="message_id">
                                <input type="hidden" value="{{Auth::user()->id}}" name="initiator_id">


                                <button type="submit" class="send-btn d-inline-block">Send <i class="ri-send-plane-line"></i></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Start Messages Area -->

@endsection
