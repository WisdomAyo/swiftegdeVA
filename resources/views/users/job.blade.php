@extends('shared.layouts.users')
@section('content')

    <!-- Breadcrumb Area -->
    <div class="breadcrumb-area">
        <h1>Jobs</h1>
        <ol class="breadcrumb">
            <li class="item"><a href="dashboard.html">Home</a></li>
            <li class="item"><a href="dashboard.html">Dashboard</a></li>
            <li class="item">Jobs</li>
        </ol>
    </div>
    <!-- End Breadcrumb Area -->

    <!-- Start Manage Jobs Area -->
    <div class="manage-jobs-box">
        <h3>Jobs</h3>

        <div class="manage-jobs-table table-responsive">
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>Job Title</th>
                    <th>Job Description</th>
                    <th>Industry</th>
                    <th>Hire Type</th>
                    <th>Salary</th>


                </tr>
                </thead>

                <tbody>

                @foreach($jobs as $row)
                    <tr>
                        <td>
                            <h5>{{$row->job_title}}</h5>

                        </td>
                        <td><p>{{$row->job_description}}</p></td>
                        <td><p>{{$row->industry}}</p></td>
                        <td><p>{{$row->hire_type}}</p></td>
                        <td>
                            @if(!empty($row->basic_salary) && ($row->basic_salary !== "₦0 - ₦0"))
                              <p>{{$row->basic_salary}}</p>
                            @else
                                <p>Pay Per Job</p>
                            @endif
                        </td>



                    </tr>
                @endforeach


                </tbody>
            </table>
        </div>
    </div>
    <!-- End Manage Jobs Area -->

@endsection
