


<div class="col-lg-4 col-md-6">
    <div class="single-job-list-box">
       <h4><a href="{{url('job/'.$row->url)}}">{{ucwords($row->job_title)}}</a></h4>
        <p>{{$row->industry}}</p>
        <br />

        <ul class="location-information">
            @if(!empty($row->basic_salary) && ($row->basic_salary !== "₦0 - ₦0"))
                <li><img src="{{asset('images/job_icon.jpeg')}}" style="width: 30px;float: left;">{{$row->basic_salary}}</li>
            @else
                <li><img src="{{asset('images/job_icon.jpeg')}}" style="width: 30px;float: left;">Pay Per Job</li>
            @endif

            <li><i class="ri-map-pin-line"></i> {{$row->city.",".$row->state}}</li>
            <li><i class="ri-time-line"></i> {{$row->created_at}}</li>
        </ul>

        <div class="job-btn">
            <a href="{{url('job/'.$row->url)}}" class="default-btn">View <i class="flaticon-list-1"></i></a>

            @if(isset(Auth::user()->id) && Auth::user()->is_admin  == 0)
                <a href="{{url('/job/'.$row->url.'/apply')}}" class="default-btn">Apply <i class="flaticon-send"></i></a>
            @else
                <a href="{{route('index.register.artisan')}}" class="default-btn">Apply <i class="flaticon-send"></i></a>
            @endif

        </div>
    </div>
</div>
