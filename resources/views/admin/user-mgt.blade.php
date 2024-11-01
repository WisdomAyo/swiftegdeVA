@extends('admin.content')
@section('content')



    <!-- Breadcrumb Area -->
    <div class="breadcrumb-area">
        <h1>{{$title}}</h1>
        <ol class="breadcrumb">
            <li class="item"><a href="#">Home</a></li>
            <li class="item"><a href="#">Dashboard</a></li>
            <li class="item">{{$title}}</li>
        </ol>
    </div>
    <!-- End Breadcrumb Area -->

    <!-- Start Manage Jobs Area -->
    <div class="manage-jobs-box">

            <div class="others-options d-flex align-items-center">
                <div class="option-item">
                    <a href="{{route('admin.user.mgt.create')}}" class="default-btn">Create Freelancer <i class="flaticon-plus"></i></a>
                </div>
            </div>
        <!--@if($title === "Artisan Management")-->
        <!--@else-->
            <!--<div class="others-options d-flex align-items-center">-->
            <!--    <div class="option-item">-->
            <!--        <a href="{{route('admin.employer.mgt.create')}}" class="default-btn">Create Employer <i class="flaticon-plus"></i></a>-->
            <!--    </div>-->
            <!--</div>-->
        <!--    @endif-->

        <div class="manage-jobs-table table-responsive">
    <table class="table table-bordered  table-sm">
        <thead>
            <tr>
                <th>Fullname</th>
                <th>Email</th>
                <th>Resume</th>
                <th>Category</th>
                <th>Status</th>
                <th class="text-center">Verification</th>
                <th>Make Feature</th>
                <th>Created At</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($user as $row)
                @if($row->identity)
                    <tr id="tr_{{$row->id}}">
                        <td><h5><a href="{{ url('user/' . $row->identity) }}" target="_blank">{{$row->full_name}}</a></h5></td>
                        <td>{{$row->email}}</td>
                        @if(isset($row->resume) && !empty($row->resume) && file_exists(public_path($row->resume)))
                            <td><a href="{{ asset($row->resume) }}" target="_blank">View Resume</a></td>
                        @else
                            <td>No Resume Available</td>
                        @endif
                        <td>{{$row->business_category}}</td>
                        @if($row->status == 1)
                            <td class="status">Active</td>
                        @else
                            <td class="danger">Inactive</td>
                        @endif
                       @if($row->verification_badge == 0)
                            <td class="text-center">
                                <form role="form" method="POST" action="{{ route('admin.freelancer.verification', $row->id) }}" class="post">
                                    @csrf
                                    <button type="submit" class="btn btn-success btn-sm">Verify</button>
                                </form>
                            </td>
                        @else
                            <td class="text-center">
                                <img width="48" height="48" src="https://img.icons8.com/color/48/warranty.png" alt="warranty"/>
                            </td>
                        @endif

                        <td>
                            @if($row->is_feature == 1)
                                <form role="form" method="post" action="{{ route('admin.freelancer.action')}}" class="post">
                                    {{ csrf_field() }}
                                    <input name="user_id" type="hidden" value="{{$row->id}}">
                                    <input name="is_feature" type="hidden" value="0">
                                    <button type="submit" class="btn btn-danger btn-sm">UnFeature</button>
                                </form>
                            @else
                                <form role="form" method="post" action="{{ route('admin.freelancer.action')}}" class="post">
                                    {{ csrf_field() }}
                                    <input name="user_id" type="hidden" value="{{$row->id}}">
                                    <input name="is_feature" type="hidden" value="1">
                                    <button type="submit" class="btn btn-primary btn-sm">Make Feature</button>
                                </form>
                            @endif
                        </td>
                        <td>{{$row->created_at}}</td>
                        <td>
                            <ul class="option-list list-inline">
                                <li><a href="{{url('/edit-user/'.$row->identity)}}" target="_blank" class="option-btn d-inline-block" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit User" style="padding-left: 8px;"><i class="ri-ball-pen-line"></i></a></li>
                                <li><a href="{{url('/user/'.$row->identity)}}" target="_blank" class="option-btn d-inline-block" data-bs-toggle="tooltip" data-bs-placement="top" title="View User" style="padding-left: 8px;"><i class="ri-eye-line"></i></a></li>
                                <li>
                                    <form action="{{route('user.exe.status')}}" method="post" class="login">
                                        {{ csrf_field() }}
                                        <input type="hidden" name="id" value="{{$row->id}}" />
                                        <input type="hidden" name="status" value="1" />
                                        <button class="option-btn d-inline-block" data-bs-toggle="tooltip" data-bs-placement="top" title="Approve Application" type="submit">
                                            <i class="ri-check-line"></i>
                                        </button>
                                    </form>
                                </li>
                                <li>
                                    <form action="{{route('user.exe.status')}}" method="post" class="login">
                                        {{ csrf_field() }}
                                        <input type="hidden" name="id" value="{{$row->id}}" />
                                        <input type="hidden" name="status" value="0" />
                                        <button class="option-btn d-inline-block" data-bs-toggle="tooltip" data-bs-placement="top" title="Reject Application" type="submit">
                                            <i class="ri-close-line"></i>
                                        </button>
                                    </form>
                                </li>
                                <li>
                                    <form action="{{route('delete.exe')}}" method="post" class="login" onclick="return confirm('Are you sure?')">
                                        {{ csrf_field() }}
                                        <input type="hidden" name="id" value="{{$row->id}}" />
                                        <input type="hidden" name="type" value="user_mgt" />
                                        <button class="option-btn d-inline-block" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete User" type="submit">
                                            <i class="ri-delete-bin-line"></i>
                                        </button>
                                    </form>
                                </li>
                            </ul>
                        </td>
                    </tr>
                @endif
            @endforeach
        </tbody>
    </table>
    {{$user->links()}}
</div>


    </div>
    <!-- End Manage Jobs Area -->

@endsection
