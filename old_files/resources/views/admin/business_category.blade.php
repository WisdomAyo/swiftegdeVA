@extends('admin.content')
@section('content')

    <!-- Breadcrumb Area -->
    <div class="breadcrumb-area">
        <h1>Business Category</h1>
        <ol class="breadcrumb">
            <li class="item"><a href="#">Home</a></li>
            <li class="item"><a href="#">Dashboard</a></li>
            <li class="item">Business Category</li>
        </ol>


    </div>
    <!-- End Breadcrumb Area -->

    <!-- Start Manage Jobs Area -->
    <div class="manage-jobs-box">
        <div class="others-options d-flex align-items-center">
            <div class="option-item">
                <a href="{{route('admin.add.business.cat')}}" class="default-btn">Add Business Category <i class="flaticon-plus"></i></a>
            </div>
        </div>
        <br />


        <div class="manage-jobs-table table-responsive">

            @if(session('response'))
                <div class="notification-alert alert alert-success alert-dismissible fade show" role="alert">
                    {{session('response')}}
                    <button type="button" class="close" data-bs-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
            @endif
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>No</th>
                    <th>Title</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
                </thead>

                <tbody>

                <?php $x = 1;?>
                @foreach($business as $row)
                    <tr>
                        <td>{{$x++}}</td>
                        <td>
                            <h5>{{$row->title}}</h5>

                        </td>
                        <td><a href="#">active</a></td>
                        <td>
                            <ul class="option-list">
                                <li><button class="option-btn d-inline-block" data-bs-toggle="tooltip" data-bs-placement="top" title="View Aplication" type="button"><i class="ri-eye-line"></i></button></li>

                                <li> <form action="{{route('delete.exe')}}" method="post" class="login" onclick="return confirm('Are you sure?')" >
                                    {{ csrf_field() }}
                                    <input type="hidden" name="id" value="{{$row->id}}"  />
                                    <input type="hidden" name="type" value="business_category"  />
                                    <button class="option-btn d-inline-block" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete Aplication" type="submit">
                                        <i class="ri-delete-bin-line"></i>
                                    </button>
                                    </form></li>

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
