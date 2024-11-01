@extends('shared.layouts.onboarding')
@section('content')
<style>
    .center-screen {
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 100vh;
        background-color: #fff;
    }

    .post-a-new-job-box {
        width: 100%;
        max-width: auto;
        padding: 20px;
        background-color: white;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        border-radius: 8px;
    }

    .avatar-preview {
        display: flex;
        flex-direction: column;
        align-items: center;
        margin-bottom: 15px;
    }

    .avatar-preview img {
        max-width: 150px;
        max-height: 150px;
        border-radius: 50%;
        margin-bottom: 10px;
        object-fit: cover;
    }
</style>
<div class="center-screen">
    <div class="post-a-new-job-box">
        @include('onboarding.includes.stages')
        <div class="row justify-content-center">
            <a href="{{url('/')}}" class="navbar-brand d-flex align-items-center justify-content-center mb-3">
                <img src="{{asset('logo.png')}}" alt="image" width="200px">
            </a>
            <h6 class="text-center mb-3">Profile Setup</h6>
            <div class="col-md-12">
                <ul id="progressbar" class="text-center">
                    <li class="" style="width:16.67%; font-size:12px">{{__('Upload Picture')}}</li>
                    <li class="" style="width:16.67%; font-size:12px">{{__('About Me')}}</li>
                    <li class="active" style="width:16.67%; font-size:12px">{{__('Location')}}</li>
                    <li class="" style="width:16.67%; font-size:12px">{{__('Category')}}</li>
                    <li class="" style="width:16.67%; font-size:12px">{{__('Charge')}}</li>
                    <li class="" style="width:16.67%; font-size:12px">{{__('Skills')}}</li>
                </ul>
            </div>
        </div>
        @if(session('response'))
        <div class="notification-alert alert alert-success alert-dismissible fade show" role="alert">
            {{session('response')}}
            <button type="button" class="btn btn-primary" data-bs-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
        </div>
        @endif

        <form method="post" action="{{ route('updateLocation') }}"  style="color:#000000;">
            {{ csrf_field() }}

            <div class="row">
                <!-- Country Selection -->
                <div class="col-xl-6 col-lg-12 col-md-12">
                    <div class="form-group">
                        <label>Country</label>
                        <select name="country" id="country" class="form-control" required>
                            <!-- Display user's country name if available -->
                            <option value="{{ Auth::user()->country ?? '' }}">{{ ucfirst(strtolower(Auth::user()->countryName->name ?? '')) }}</option>
                            <!-- Loop through all countries -->
                            @foreach (\App\Models\Country::all() as $row)
                                <option value="{{ $row->id }}">{{ ucfirst(strtolower($row->name)) }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <!-- State Selection -->
                <div class="col-xl-6 col-lg-12 col-md-12">
                    <div class="form-group">
                        <label>State</label>
                        <select name="state" id="state" class="form-control">
                            <!-- States will be populated via JS or backend -->
                        </select>
                    </div>
                </div>

                <!-- City Selection -->
                <div class="col-xl-6 col-lg-12 col-md-12">
                    <div class="form-group">
                        <label>State Areas</label>
                        <select name="city" class="form-control">
                            <!-- Cities will be populated via JS or backend -->
                        </select>
                    </div>
                </div>

                 <!-- City Selection -->
                 <div class="col-xl-6 col-lg-12 col-md-12">
                    <div class="form-group">
                        <label>Street Address</label>
                        <input type="text" name="street_address" id="" class="form-control">
                    </div>
                </div>

                <!-- Navigation Buttons -->
                <div class="col-lg-12 col-md-12 d-flex justify-content-between">
                    <!-- Previous Button -->
                    <a href="{{ route('onboarding.about') }}" class="default-btn">Previous</a>
                    <!-- Save Button -->
                    <button type="submit" class="default-btn">Save and Continue <i class="flaticon-send"></i></button>
                </div>
            </div>
        </form>


    </div>
</div>
<script src="{{asset('assets/js/jquery.min.js')}}"></script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
<script>

    $(function() {
        $('select[name=country]').change(function() {
            const option = document.getElementById("country").value;
            const url = '{{ url('country') }}' +'/'+ option + '/states';

            $.ajax({
                url: url,
                type: "GET",
                dataType: "json",
                success:function(data) {
                    $('select[name="state"]').empty();
                    $.each(data, function(key, value) {
                        $('select[name="state"]').append('<option value="'+ value.id +'">'+ value.name +'</option>');
                    });
                }
            });
        });

        $('select[name=state]').change(function() {
            const option = document.getElementById("state").value;
            const url = '{{ url('state') }}' +'/'+ option + '/areas';

            $.ajax({
                url: url,
                type: "GET",
                dataType: "json",
                success:function(data) {
                    $('select[name="city"]').empty();
                    $.each(data, function(key, value) {
                        //console.log('<option value="'+ value.id +'">'+ value.name +'</option>')
                        $('select[name="city"]').append('<option value="'+ value.id +'">'+ value.name +'</option>');
                    });
                }
            });
        });

    });
</script>

@endsection