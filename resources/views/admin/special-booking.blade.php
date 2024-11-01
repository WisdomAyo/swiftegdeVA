@extends('admin.content')
@section('content')



    <!-- Breadcrumb Area -->
    <div class="breadcrumb-area">
        <h1>Special Booking</h1>
        <ol class="breadcrumb">
            <li class="item"><a href="#">Home</a></li>
            <li class="item"><a href="#">Dashboard</a></li>
            <li class="item">Special Booking</li>
        </ol>
    </div>
    <!-- End Breadcrumb Area -->

    <!-- Start Manage Jobs Area -->
    <div class="manage-jobs-box">


        <div class="manage-jobs-table table-responsive">
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Business Category</th>
                        <th>Number of Freelancers</th>
                        <th>Budget</th>
                        <th>Area of Specialization</th>
                        <th>Pay Type</th>
                        <th>Min Pay</th>
                        <th>Max Pay</th>
                        <th>Location</th>
                        <th>Other Details</th>
                        <th>Monthly Pay Amount</th>
                </tr>
                </thead>

                <tbody>

                    @foreach($special_booking as $booking)
                    <tr>
                        <td>{{ $booking->name }}</td>
                        <td>{{ $booking->email }}</td>
                        <td>{{ $booking->phone }}</td>
                        <td>{{ $booking->businessCategory->name ?? 'N/A' }}</td>
                        <td>{{ $booking->number_of_freelancers }}</td>
                        <td>{{ $booking->budget }}</td>
                        <td>
                            @if(is_array($booking->area_of_specialization))
                                {{ implode(', ', $booking->area_of_specialization) }}
                            @else
                                {{ $booking->area_of_specialization }}
                            @endif
                        </td>
                        <td>{{ $booking->pay_type }}</td>
                        <td>{{ $booking->min_pay }}</td>
                        <td>{{ $booking->max_pay }}</td>
                        <td>{{ $booking->location }}</td>
                        <td>{{ $booking->other_details }}</td>
                        <td>{{ $booking->monthly_pay_amount }}</td>
                    </tr>
                @endforeach


                </tbody>
            </table>

                {{$special_booking->links()}}

        </div>

    </div>
    <!-- End Manage Jobs Area -->

@endsection
