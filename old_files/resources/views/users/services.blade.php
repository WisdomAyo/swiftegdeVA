@extends('shared.layouts.users')
@section('content')

    <!-- Breadcrumb Area -->
    <div class="breadcrumb-area">
        <h1>My Services</h1>
        <ol class="breadcrumb">
            <li class="item"><a href="#">Home</a></li>
            <li class="item"><a href="#">Dashboard</a></li>
            <li class="item">My Services</li>
        </ol>
    </div>
    <!-- End Breadcrumb Area -->

    <!-- Start Manage Jobs Area -->
    <div class="manage-jobs-box">


        @if(session('response'))
            <div class="notification-alert alert alert-success alert-dismissible fade show" role="alert">
                {{session('response')}}
                <button type="button" class="close" data-bs-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
        @endif

        <div class="others-options d-flex align-items-center">
            <div class="option-item">
                <a href="{{route('user.service.add')}}" class="default-btn">Add A New Service <i class="flaticon-plus"></i></a>
            </div>
        </div>
        <br />

        <div class="manage-jobs-table table-responsive">
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>Fullname</th>
                    <th>Title</th>
                    <th>Service Name</th>
                    <th>Cost</th>
                    <th>Per Service</th>
                    <th>Action</th>
                </tr>
                </thead>

                <tbody>

                @foreach($service as $row)
                    <tr>
                        <td>
                           {{$row->full_name}}
                        </td>
                        <td>{{$row->title}}</td>
                        <td>{{$row->business_category}}</td>
                        <td>{{$row->cost}}</td>
                        <td>{{$row->per_service}}</td>


                        <td>
                            <ul class="option-list">
                                <li><a href="{{url('/user/services/'.$row->id)}}" class="option-btn" data-bs-toggle="tooltip" data-bs-placement="top" title="View Aplication" ><i class="ri-eye-line"></i></a></li>

                                <li>
                                    <form action="{{route("delete.exe")}}" method="post" class="login" onclick="return confirm('Are you sure?')">
                                        {{ csrf_field() }}
                                        <input type="hidden" name="id" value="{{$row->id}}"  />
                                        <input type="hidden" name="type" value="services"  />
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
