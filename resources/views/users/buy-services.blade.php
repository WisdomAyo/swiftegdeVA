@extends('shared.layouts.users')
@section('content')


    <!-- Breadcrumb Area -->
    <div class="breadcrumb-area">
        <h1>Freelancer Service</h1>
        <ol class="breadcrumb">
            <li class="item"><a href="{{route('employer.home')}}">Home</a></li>
            <li class="item"><a href="{{route('employer.job.request')}}">Dashboard</a></li>
            <li class="item">Pay for Freelancer Service</li>
        </ol>
    </div>
    <!-- End Breadcrumb Area -->

    <!-- Start Post a New Job Area -->
    <div class="post-a-new-job-box">
        <h3>Pay for Freelancer Service</h3>

        <div style="padding: 20px;">
        @if(session('response'))
            <div class="notification-alert alert alert-success alert-dismissible fade show" role="alert">
                {{session('response')}}
                <button type="button" class="btn btn-primary" data-bs-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
        @endif

         @if(Session::has('message'))
            <p class="alert alert-success">{{ Session::get('message') }}</p>
        @endif


            @if (session('error'))
                <div class="alert alert-danger" role="alert">
                    <button type="button" class="btn btn-primary" data-dismiss="alert">x</button>
                    {{ session('error') }}
                </div>
            @endif


                @foreach($service as $row)
                    <div class="col-md-6 col-xl-5">
                        <!-- Detailed Project 1 -->
                            <div class="block-content">
                                <p class="fs-sm text-muted mb-0"><b>Service Name: </b>  {{ucwords($row->title)}}</p>
                            </div>
                            <br />
                            <div class="block-content">
                                <p><b>Amount:</b> {{number_format($row->cost)}}</p>
                            </div>

                            <br /><br />
                            <div class="block-content block-content-full">

                                <div>
                                    <h4>Pay with bank transfer</h4>
                                    <p>Bank Name: Guarantee Trust Bank</p>
                                    <p>Account Number: 043 269 7596 </p>
                                    <p>Account Name: Swift Edge Solutions </p>
                                </div>

                                <br />


                                <div class="block-content block-content-full">

                                    <form method="POST" action="{{ route('user.pay') }}" accept-charset="UTF-8" class="form-horizontal" role="form">
                                        {{ csrf_field() }}
                                        <input type="hidden" name="email" value="{{Auth::user()->email}}">
                                        <input type="hidden" name="orderID" value="{{ \App\Helpers\CommonHelpers::generateCramp('payment') }}">
                                        <input type="hidden" name="quantity" value="1">
                                        <input type="hidden" name="first_name" value="{{Auth::user()->full_name}}">
                                        <input type="hidden" name="user_id" value="{{Auth::user()->id}}">


                                        <input type="hidden" name="currency" value="NGN">
                                        <input type="hidden" name="reference" value="{{ Paystack::genTranxRef() }}_{{$row->id}}_course">

                                        <div class="input-group">
                                            <div class="form-floating">
                                                <input type="hidden"  name="amount" value="{{$row->cost}}">
                                            </div>
                                            <button class="default-btn">Pay with Paystack</button>
                                        </div>

                                    </form>

                                    <hr />

                                    <p> or send you a direct message on whatsapp</p>
                                    <a href="https://api.whatsapp.com/send?phone=+2348063427286"> <img src="{{asset('assets/WhatsApp_icon.png')}}" style="width: 50px" /> Send Message</a>
                                </div>
                            </div>
                            <!-- END Detailed Project 1 -->
                    </div>
                @endforeach
        </div>
    </div>
    <!-- End Post a New Job Area -->


@endsection
