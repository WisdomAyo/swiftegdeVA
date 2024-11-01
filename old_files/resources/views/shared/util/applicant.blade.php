<div class="col-lg-6 col-md-12">
    <div class="single-applicants-card">
        <div class="image">

            @if(!empty($row->profile_image))

                    <img src=" {{asset('profile/photo/'.$row->user_id.'/'.$row->profile_image)}}" style="max-width: 120px; max-height: 120px" alt="image">

            @else
               <img src="{{asset('icon_02.jpeg')}}" width="100" alt="image">
            @endif
        </div>

        <div class="content">

            @if(empty($row->identity))
                <h3>
                    <a href="#">{{$row->full_name}}</a>
                </h3>
            @else
                <h3>
                    <a href="{{url('user/'.$row->identity)}}" target="_blank">{{$row->full_name}}</a>
                </h3>
                @endif

            <span>{{$row->skills}}</span>

            <ul class="job-info">
                <li><i class="ri-map-pin-line"></i> {{$row->location_address}}</li>
                <li><i class="ri-time-line"></i> {{$row->skillLevel}}</li>
            </ul>

            <div class="applicants-footer">
                <ul class="option-list">
                    @if(empty($row->identity))
                    <li><a href="#"><i class="ri-eye-line"></i></a></li>
                    @else
                        <li>
                            @if(!empty($row->identity))
                                <form action="{{url('user/'.$row->identity)}}" method="get">
                                    <input type="hidden" name="status" value="view/{{$row->identity}}/{{Auth::user()->identity}}">
                                    <button class="option-btn d-inline-block" data-bs-toggle="tooltip" data-bs-placement="top" title="View Applicant" type="submit"><i class="ri-eye-line"></i></button>

                                </form>
                                @else
                                <form action="#" method="get">
                                    <input type="hidden" name="status" value="view">
                                    <button class="option-btn d-inline-block" data-bs-toggle="tooltip" data-bs-placement="top" title="View Applicant" type="submit"><i class="ri-eye-line"></i></button>

                                </form>
                            @endif
                        </li>

                        @endif

{{--                    <li><button class="option-btn d-inline-block" data-bs-toggle="tooltip" data-bs-placement="top" title="Approve Aplication" type="button"><i class="ri-check-line"></i></button></li>--}}
{{--                    <li><button class="option-btn d-inline-block" data-bs-toggle="tooltip" data-bs-placement="top" title="Reject Aplication" type="button"><i class="ri-close-line"></i></button></li>--}}
{{--                    <li><button class="option-btn d-inline-block" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete Aplication" type="button"><i class="ri-delete-bin-line"></i></button></li>--}}
{{--                --}}
                </ul>
            </div>
        </div>
    </div>
</div>
