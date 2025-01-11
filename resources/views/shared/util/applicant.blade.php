{{-- <div class="col-lg-6 col-md-12">
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

                        @endif --}}

{{--                    <li><button class="option-btn d-inline-block" data-bs-toggle="tooltip" data-bs-placement="top" title="Approve Aplication" type="button"><i class="ri-check-line"></i></button></li>--}}
{{--                    <li><button class="option-btn d-inline-block" data-bs-toggle="tooltip" data-bs-placement="top" title="Reject Aplication" type="button"><i class="ri-close-line"></i></button></li>--}}
{{--                    <li><button class="option-btn d-inline-block" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete Aplication" type="button"><i class="ri-delete-bin-line"></i></button></li>--}}
{{--                --}}
                {{-- </ul>
            </div>
        </div>
    </div>
</div> --}}



<div class="col-lg-9">
    <h1 class="h2 pb-2 pb-lg-3">All Assigned Applicants</h1>



    <div class="tab-content">

      <!-- Published tab -->
      <div class="tab-pane fade show active" id="published" role="tabpanel" aria-labelledby="published-tab">

       

        <!-- Published listings -->
        <div class="vstack gap-4" id="publishedSelection">

          <!-- Item -->
          <div class="d-sm-flex align-items-center">
            <div class="d-inline-flex position-relative z-2 pt-1 pb-2 ps-2 p-sm-0 ms-2 ms-sm-0 me-sm-2">
              <div class="form-check position-relative z-1 fs-lg m-0">
                <input type="checkbox" class="form-check-input" checked="">
              </div>
              <span class="position-absolute top-0 start-0 w-100 h-100 bg-body border rounded d-sm-none"></span>
            </div>

            <article class="card w-100">
              <div class="d-sm-none" style="margin-top: -44px"></div>
              <div class="row g-0">
                <div class="col-sm-4 col-md-3 rounded overflow-hidden pb-2 pb-sm-0 pe-sm-2">
                  <a class="position-relative d-flex h-100 bg-body-tertiary" href="#!" style="min-height: 174px">
                    @if(!empty($row->profile_image))
                    <img src="{{asset('profile/photo/'.$row->user_id.'/'.$row->profile_image)}}" class="position-absolute top-0 start-0 w-100 h-100 object-fit-cover" alt="Image">
                    @else
                    <img src="{{ asset('asset/avatar1.png')}}" class="position-absolute top-0 start-0 w-100 h-100 object-fit-cover" alt="Image">
                    @endif
                    <div class="ratio d-none d-sm-block" style="--fn-aspect-ratio: calc(180 / 240 * 100%)"></div>
                    <div class="ratio ratio-16x9 d-sm-none"></div>
                  </a>
                </div>
                <div class="col-sm-8 col-md-9 align-self-center">
                  <div class="card-body d-flex justify-content-between p-3 py-sm-4 ps-sm-2 ps-md-3 pe-md-4 mt-n1 mt-sm-0">
                    <div class="position-relative pe-3">
                      <span class="badge text-body-emphasis bg-body-secondary mb-2">{{$row->skillLevel}}</span>
                      <div class="h5 mb-2">{{$row->full_name}}</div>
                      <a class="stretched-link d-block fs-sm text-body text-decoration-none mb-2" href="#!">{{$row->location_address}}</a>
                      <div class="h6 fs-sm mb-0">{{$row->business_category}}</div>
                    </div>
                    <div class="text-end">
                      <div class="fs-xs text-body-secondary mb-3">Created: 05/10/2024</div>
                      <div class="d-flex justify-content-end gap-2 mb-3">
                        <button type="button" class="btn btn-outline-secondary">Statistics</button>
                        <div class="dropdown">
                          <button type="button" class="btn btn-icon btn-outline-secondary" data-bs-toggle="dropdown" aria-expanded="false" aria-label="Settings">
                            <i class="fi-settings fs-base"></i>
                          </button>
                          <ul class="dropdown-menu dropdown-menu-end">
                            <li>
                              <a class="dropdown-item" href="#!">
                                <i class="fi-edit opacity-75 me-2"></i>
                                Edit
                              </a>
                            </li>
                            <li>
                              <a class="dropdown-item" href="#!">
                                <i class="fi-zap fs-base opacity-75 me-2"></i>
                                Promote
                              </a>
                            </li>
                            <li>
                              <a class="dropdown-item" href="#!">
                                <i class="fi-archive opacity-75 me-2"></i>
                                Move to archive
                              </a>
                            </li>
                            <li>
                              <a class="dropdown-item text-danger" href="#!">
                                <i class="fi-trash opacity-75 me-2"></i>
                                Delete
                              </a>
                            </li>
                          </ul>
                        </div>
                      </div>
                      <ul class="list-unstyled flex-row flex-wrap justify-content-end fs-sm mb-0">
                        <li class="d-flex align-items-center me-2 me-md-3">
                          <i class="fi-eye fs-base me-1"></i>
                          1246
                        </li>
                        <li class="d-flex align-items-center me-2 me-md-3">
                          <i class="fi-heart fs-base me-1"></i>
                          23
                        </li>
                        <li class="d-flex align-items-center">
                          <i class="fi-phone-incoming fs-base me-1"></i>
                          8
                        </li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
            </article>
          </div>

         
        </div>
      </div>


   
      </div>


    
    </div>
  </div>