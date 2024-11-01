@extends('shared.layouts.users')
@section('content')

    <!-- Breadcrumb Area -->
    <div class="breadcrumb-area">
        <h1>Change Password</h1>
        <ol class="breadcrumb">
            <li class="item"><a href="dashboard.html">Home</a></li>
            <li class="item"><a href="dashboard.html">Dashboard</a></li>
            <li class="item">Change Password</li>
        </ol>
    </div>
    <!-- End Breadcrumb Area -->

    <div class="change-password-box">
        <h3>Change Password</h3>

        @if(session('response'))
            <div class="notification-alert alert alert-success alert-dismissible fade show" role="alert">
                {{session('response')}}
                <button type="button" class="close" data-bs-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
        @endif

        <form role="form" method="post" action="{{ route('user.settings.password.update')}}" class="post">
            {{ csrf_field() }}
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="form-group">
                        <label>Current Password</label>
                        <input type="text" class="form-control" name="current_password">
                        @if ($errors->has('current_password'))
                            <div class="alert alert-info">
                                <strong>{{ $errors->first('current_password') }}</strong>
                            </div>
                        @endif
                    </div>
                </div>

                <div class="col-lg-12 col-md-12">
                    <div class="form-group">
                        <label>New Password</label>
                        <input type="text" class="form-control" name="new_password">
                        @if ($errors->has('new_password'))
                            <div class="alert alert-info">
                                <strong>{{ $errors->first('new_password') }}</strong>
                            </div>
                        @endif
                    </div>
                </div>

                <div class="col-lg-12 col-md-12">
                    <div class="form-group">
                        <label>Confirm New Password</label>
                        <input type="text" class="form-control" name="confirm_new_password">
                        @if ($errors->has('confirm_new_password'))
                            <div class="alert alert-info">
                                <strong>{{ $errors->first('confirm_new_password') }}</strong>
                            </div>
                        @endif
                    </div>
                </div>

                <div class="col-lg-12 col-md-12">
                    <button type="submit" class="default-btn">Change Password <i class="flaticon-send"></i></button>
                </div>
            </div>
        </form>

    </div>

@endsection
