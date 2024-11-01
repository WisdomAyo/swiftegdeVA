@extends('admin.content')
@section('content')



    <!-- Breadcrumb Area -->
    <div class="breadcrumb-area">
        <h1>Freelancer Request</h1>
        <ol class="breadcrumb">
            <li class="item"><a href="#">Home</a></li>
            <li class="item"><a href="#">Dashboard</a></li>
            <li class="item">Freelancer Request</li>
        </ol>
    </div>
    <!-- End Breadcrumb Area -->

    <!-- Start Manage Jobs Area -->
    <div class="manage-jobs-box">



        <div class="manage-jobs-table table-responsive">
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>Fullname</th>
                    <th>Email</th>
                    <th>Phone number</th>
                    <th>Subject</th>
                    <th>Message</th>
                    <th>Freelancer</th>
                    <th>Created At</th>
                </tr>
                </thead>

                <tbody>

                @foreach($freelancer_request as $row)
                <tr id="tr_{{$row->id}}">
                    <td>
                        <h5><a href="#">{{$row->full_name}}</a> </h5>

                    </td>
                    <td>{{$row->email}}</td>
                    <td>{{$row->phone_number}}</td>
                    <td>{{$row->subject}}</td>
                    <td>{{$row->message}}</td>
                    <td>{{$row->freelancer->full_name}}</td>
                    <td >{{$row->created_at}}</td>

                </tr>
                @endforeach


                </tbody>
            </table>

                {{$freelancer_request->links()}}

        </div>

    </div>
    <!-- End Manage Jobs Area -->

@endsection
