@extends('admin.content')
@section('content')

    <!-- Breadcrumb Area -->
    <div class="breadcrumb-area">
        <h1>Artisan Services</h1>
        <ol class="breadcrumb">
            <li class="item"><a href="#">Home</a></li>
            <li class="item"><a href="#">Dashboard</a></li>
            <li class="item">Artisan Services</li>
        </ol>
    </div>
    <!-- End Breadcrumb Area -->

    <!-- Start Manage Jobs Area -->
    <div class="manage-jobs-box">
        <h3>Artisan Services</h3>

        <div class="manage-jobs-table table-responsive">
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>FullName</th>
                    <th>Email</th>
                    <th>Service Category</th>
                    <th>Cost</th>
                    <th>City</th>
                    <th>State</th>
                    <th>Street Address</th>
                    <th>Employers</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
                </thead>

                <tbody>

                @foreach($artisan_services as $row)
                    <tr>
                        <td>
                            <h5><a href="">{{$row->full_name}}</a> </h5>

                        </td>
                        <td>{{$row->email}}</td>
                        <td>{{$row->service_category}}</td>
                        <td>{{$row->cost}}</td>
                        <td>{{$row->city}}</td>
                        <td>{{$row->state}}</td>
                        <td>{{$row->street_address}}</td>
                        <td>{{$row->employers}}</td>
                        <td class="status">Active</td>
                        <td>
                            <ul class="option-list">
                                <li><button class="option-btn d-inline-block" data-bs-toggle="tooltip" data-bs-placement="top" title="View User" type="button"><i class="ri-eye-line"></i></button></li>

                                <li>
                                    <form action="{{route('delete.exe')}}" method="post" class="login" onclick="return confirm('Are you sure?')" >
                                        {{ csrf_field() }}
                                        <input type="hidden" name="id" value="{{$row->id}}"  />
                                        <input type="hidden" name="type" value="user_mgt"  />
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
