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
                    <h2>Find Your Account</h2>
                </div>

                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="login" role="tabpanel">
                        <div class="eeza-authentication-form">
                            <form action="{{ route('forget.password.reset') }}" method="post" class="login">
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

                                @if(session('responses'))
                                    <div class="notification-alert alert alert-success alert-dismissible fade show" role="alert">
                                        {{session('responses')}}
                                        <button type="button" class="close" data-bs-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                    </div>
                                @endif


                                <div class="form-group">
                                    <input type="email" class="form-control" placeholder="Email" name="email">
                                    @if ($errors->has('email'))
                                        <div class="alert alert-info">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </div>
                                    @endif
                                </div>


                                <button type="submit" class="default-btn">Submit <i class="flaticon-send"></i></button>
                            </form>


                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>
    <!-- Start Profile Authentication Area -->
@endsection
