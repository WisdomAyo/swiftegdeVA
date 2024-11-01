@extends('home.layouts.content')
@section('content')
    <!-- Start Page Banner Area -->

    <div class="page-banner-area item-bg-three">
        <div class="d-table">
            <div class="d-table-cell">
                <div class="container">
                    <div class="page-banner-content">
                        <h2>Authentication</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Page Banner Area -->

    <!-- Start Profile Authentication Area -->
    <div class="profile-authentication-area ptb-100">
        <div class="container">
            <div class="profile-authentication-tabs">
                <br />
                <div class="authentication-tabs-list">
                    <h2>New Password</h2>
                </div>

                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="login" role="tabpanel">
                        <div class="eeza-authentication-form">
                            <form action="{{ route('password.verify.save') }}" method="post" class="mt-5 card__form">
                                {{ csrf_field() }}



                            @if(session('error'))
                                    <div class="notification-alert-danger alert alert-danger alert-dismissible fade show" role="alert">
                                        {{session('error')}}
                                        <button type="button" class="close" data-bs-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                    </div>
                                @endif


                                @if(session('response'))

                                    <div class="notification-alert alert alert-success alert-dismissible fade show" role="alert">
                                        {{session('response')}}
                                        <button type="button" class="close" data-bs-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                    </div>
                                @endif



                                <div class="form-group">
                                    <label for="email">Verification Code</label>
                                    <input type="text" name="verify_code" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="email">New Password* :</label>
                                    <input type="password" name="password" class="form-control" required>

                                    @if ($errors->has('password'))
                                        <div class="alert alert-info">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </div>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="email">Confirm Password*:</label>
                                    <input type="password" name="password_confirmation" class="form-control" required>
                                    @if ($errors->has('password_confirmation'))
                                        <div class="alert alert-info">
                                            <strong>{{ $errors->first('password_confirmation') }}</strong>
                                        </div>
                                    @endif

                                <button type="submit" class="default-btn">Submit<i class="flaticon-send"></i></button>
                            </form>


                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>
    <!-- Start Profile Authentication Area -->
@endsection
