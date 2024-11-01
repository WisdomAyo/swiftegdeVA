
    <div class="image">
        <div class="circle">
        @if(!empty($row->profile_image))
            <a href="{{url('user/'.$row->identity)}}"><img src=" {{asset('profile/photo/'.$row->id.'/'.$row->profile_image)}}" alt="image"></a>
        @else
            <a href="{{url('user/'.$row->identity)}}"><img src="{{asset('icon_02.jpeg')}}" width="100" alt="image"></a>
        @endif
        </div>

    </div>

    <div class="content">
        @if(!empty($row->availability))
            <p style="list-style-type: none;
                            display: inline-block;
                            background-color: #FFF4F3;
                            color: #0e7dc2;
                            font-size: 14px;
                            font-weight: 500;
                            padding: 5px 10px;
                            border-radius: 5px;
                            margin-right: 5px;
                            -webkit-transition: var(--transition);
                            transition: var(--transition);">{{$row->availability}}</p>
        @endif
        <h3>
            <a href="{{url('user/'.$row->identity)}}">{{$row->full_name}}</a>
        </h3>
        <span>{{$row->business_category}}</span>

        <div class="rating">
            @for($x = 1; $x <= $row->rating; $x++)
                <i class="flaticon-star"></i>
            @endfor
            @if(is_numeric( $row->rating ) && floor( $row->rating ) != $row->rating)
                <i class="ri-star-half-fill"></i>
            @endif

            <span>{{$row->rating}} Rating</span>
        </div>

        <ul class="job-info">
            <li><i class="ri-map-pin-line"></i> {{$row->city}}</li>
            @if(!empty($row->cost))
                <li><i class="ri-time-line"></i> {{$row->cost}}</li>
            @endif
        </ul>
    </div>

