

    <!-- Start Post a New Job Area -->
    <div class="post-a-new-job-box">


        @if(session('response'))
            <div class="notification-alert alert alert-success alert-dismissible fade show" role="alert">
                {{session('response')}}
                <button type="button" class="close" data-bs-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
        @endif

        <form method="post" action="{{ route('profile.dp.save')}}"  enctype="multipart/form-data" style="color:#000000;">
            {{ csrf_field() }}
            <div class="row">


                <div class="col-lg-12 col-md-12">
                    <div class="form-group">
                        <label>Profile Photo</label>
                        <input type="file" class="form-control" placeholder="Service Title Here" name="picture">
                        <input type="hidden" name="home" value="home">
                    </div>
                </div>


                <div class="col-lg-12 col-md-12">
                    <button type="submit" class="default-btn">Submit <i class="flaticon-send"></i></button>
                </div>
            </div>
        </form>
    </div>
    <!-- End Post a New Job Area -->
