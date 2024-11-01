@extends('admin.content')
@section('content')

    <!-- Breadcrumb Area -->
    <div class="breadcrumb-area">
        <h1>Location Management</h1>
        <ol class="breadcrumb">
            <li class="item"><a href="#">Home</a></li>
            <li class="item"><a href="#">Dashboard</a></li>
            <li class="item">Location Management</li>
        </ol>
    </div>
    <!-- End Breadcrumb Area -->

    <!-- Start Manage Jobs Area -->
    <div class="manage-jobs-box">

        <div class="others-options d-flex align-items-center">
            <div class="option-item">
                <a href="{{route('admin.add.cat')}}" class="default-btn">Add Location <i class="flaticon-plus"></i></a>
            </div>
        </div>
        <br />

        @if(session('response'))
            <div class="notification-alert alert alert-success alert-dismissible fade show" role="alert">
                {{session('response')}}
                <button type="button" class="close" data-bs-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
        @endif

        <div class="manage-jobs-table table-responsive">
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>State</th>
                    <th>Area</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
                </thead>

                <tbody>

                @foreach($locations as $row)
                    <tr>
                        <td>
                            <h5>{{$row->name}}</h5>
                        </td>
                        <td><a href="{{url('admin/secure/user/locations/'.$row->id)}}">{{$row->area_count}} areas</a></td>

                        <td class="status">Active</td>
                        <td>
                            <ul class="option-list">
                                <li><a href="{{url('admin/secure/user/locations/'.$row->id)}}" ><i class="ri-eye-line"></i></a></li>

                                <li>


                                    <form action="{{route('delete.exe')}}" method="post" class="login" onclick="return confirm('Are you sure?')" >
                                        {{ csrf_field() }}
                                        <input type="hidden" name="id" value="{{$row->id}}"  />
                                        <input type="hidden" name="type" value="location"  />
                                        <button class="option-btn d-inline-block" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete Aplication" type="submit">
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
        </div>
    </div>
    <!-- End Manage Jobs Area -->

@endsection
