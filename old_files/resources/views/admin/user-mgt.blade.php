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

        @if($title === "Artisan Management")
            <div class="others-options d-flex align-items-center">
                <div class="option-item">
                    <a href="{{route('admin.user.mgt.create')}}" class="default-btn">Create Freelancer <i class="flaticon-plus"></i></a>
                </div>
            </div>
        @else
            <div class="others-options d-flex align-items-center">
                <div class="option-item">
                    <a href="{{route('admin.employer.mgt.create')}}" class="default-btn">Create Employer <i class="flaticon-plus"></i></a>
                </div>
            </div>
            @endif

        <div class="manage-jobs-table table-responsive">
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>Fullname</th>
                    <th>Email</th>
                    <th>Category</th>
                    <th>Status</th>
                    <th>Make Feature</th>
                    <th>Created At</th>
                    <th>Action</th>
                </tr>
                </thead>

                <tbody>

                @foreach($user as $row)
                <tr id="tr_{{$row->id}}">
                    <td>
                        <h5><a href="#">{{$row->full_name}}</a> </h5>

                    </td>
                    <td>{{$row->email}}</td>
                    <td>{{$row->business_category}}</td>

                    @if($row->status == 1)
                    <td class="status">Active</td>
                    @else
                        <td class="danger">Inactive</td>
                    @endif
                    <td>
                        @if($row->is_feature == 1)
                            {{ csrf_field() }}
                            <form role="form" method="post" action="{{ route('admin.freelancer.action')}}" class="post">
                                {{ csrf_field() }}
                            <input name="user_id" type="hidden" value="{{$row->id}}">
                            <input name="is_feature" type="hidden" value="0">
                            <button type="submit" class="btn btn-danger">UnFeature</button>
                            </form>
                            @else
                        <form role="form" method="post" action="{{ route('admin.freelancer.action')}}" class="post">
                            {{ csrf_field() }}
                            <input name="user_id" type="hidden" value="{{$row->id}}">
                            <input name="is_feature" type="hidden" value="1">
                            <button type="submit" class="btn btn-primary">Make Feature</button>
                        </form>
                        @endif

                    </td>
                    <td >{{$row->created_at}}</td>
                    <td>
                        <ul class="option-list">
                            <li><a href="{{url('/user/'.$row->identity)}}" target="_blank" class="option-btn d-inline-block" data-bs-toggle="tooltip" data-bs-placement="top" title="View User" style="padding-left: 8px;" ><i class="ri-eye-line"></i></a></li>

                           <li> <form action="{{route('user.exe.status')}}" method="post" class="login">
                                {{ csrf_field() }}
                                <input type="hidden" name="id" value="{{$row->id}}"  />
                                <input type="hidden" name="status" value="1"  />
                                <button class="option-btn d-inline-block" data-bs-toggle="tooltip" data-bs-placement="top" title="Approve Aplication" type="submit">
                                    <i class="ri-check-line"></i>
                                </button>
                               </form>
                           </li>

                            <li> <form action="{{route('user.exe.status')}}" method="post" class="login">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="id" value="{{$row->id}}"  />
                                    <input type="hidden" name="status" value="0"  />
                                    <button class="option-btn d-inline-block" data-bs-toggle="tooltip" data-bs-placement="top"title="Reject Aplication"  type="submit">
                                        <i class="ri-close-line"></i>
                                    </button>
                                </form>
                            </li>

                            <li>


                                <form action="{{route('delete.exe')}}" method="post" class="login" onclick="return confirm('Are you sure?')" >
                                    {{ csrf_field() }}
                                    <input type="hidden" name="id" value="{{$row->id}}"  />
                                    <input type="hidden" name="type" value="user_mgt"  />
                                    <button class="option-btn d-inline-block" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete User" type="submit">
                                        <i class="ri-delete-bin-line"></i>
                                    </button>
                                </form>

                            </li>
                        </ul>
                    </td>
                </tr>
                @endforeach


                </tbody>
            </table>

                {{$user->links()}}

        </div>

    </div>
    <!-- End Manage Jobs Area -->

@endsection
