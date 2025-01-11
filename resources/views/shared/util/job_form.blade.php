


{{-- <form method="post" action="{{ route('index.staffing.job.save')}}"  enctype="multipart/form-data" style="color:#000000;">
    {{ csrf_field() }}
   <p>Complete the form below, letting us know your skills, and a representative will contact you shortly</p>

    <div class="form-group">
        <label class="heading">What skill do you have</label>
        <input type="text" name="skills" class="form-control" placeholder="Eg, Driving" required="true">
    </div>


    <div class="col-lg-12 form-margin">
        <div class="form-group">
            <label>Skill Level</label>
            <select name="skillLevel" id="state" class="form-control">
                <option value="Skilled">Skilled</option>
                <option value="Semi skilled">Semi skilled</option>
                <option value="Internship/Graduate Training">Internship/Graduate Training</option>
                <option value="Unskilled">Unskilled</option>
            </select>
        </div>
    </div>


    <div class="col-lg-12 form-margin">
        <div class="form-group">
            <label>Availability</label>
            <select name="availability" id="state" class="form-control">
                <option value="Full-Time">Full-Time</option>
                <option value="Part-Time">Part-Time</option>
                <option value="Contract">Contract</option>
                <option value="Temporary">Temporary</option>
            </select>
        </div>
    </div>


    <div class="col-lg-12 form-margin">
        <div class="form-group">
            <label >What certifications do you have?</label>
            <input type="text" name="certification"  placeholder="E.g; SSCE, Bsc, NABTEB, Labour Trade Test, etc" class="form-control" required="true">
        </div>
    </div>

    <div class="col-lg-12 form-margin">
        <div class="form-group">
        <label>Upload CV (Optional)</label>&nbsp;<input type="file" name="CV" class="form-control">
    </div>
    </div>

    <div class="job-details-btn-box">
        <div onload="disableSubmit()">
        <input type="checkbox" name="terms" id="terms" onchange="activateButton(this)" required="true">  I have read and agree to the <a href="{{route('index.terms')}}" style="color:#800080 ">terms &amp;
                conditions</a>
        <br><br>
        </div>
        <input type="hidden" name="job_id" value="{{ Request::segment(2) }}">

        <button type="submit" class="default-btn">Apply For Job <i class="flaticon-list-1"></i></button>
    </div>

</form> --}}
@if ($errors->any())
<script>
    Swal.fire({
        icon: 'error',
        title: 'Validation Error',
        html: '{!! implode("<br>", $errors->all()) !!}',
    });
</script>
@endif

@if (session('success'))
<script>
    Swal.fire({
        icon: 'success',
        title: 'Success',
        text: '{{ session('success') }}',
    });
</script>
@endif


<h3>Apply for {{ $job->job_title }}</h3>

<form action="{{ route('job.application.save') }}" method="POST" enctype="multipart/form-data" class="container col-8 mb-4">
    @csrf
     <input type="hidden" name="job_id" value="{{ $job->id }}"> 
    
    
    <div class="row  g-4 mb-4">
      <div class="col position-relative">
        <label for="fn" class="form-label fs-base">Full name *</label>
        <input type="text" class="form-control form-control-lg" name="full_name" id="fullName" value="{{ old('fullName', Auth::check() ? Auth::user()->full_name : '') }}"  required="">
        <div class="invalid-tooltip bg-transparent p-0">Enter your first name!</div>
      </div>

      <div class="col position-relative mb-4">
        <label for="email" class="form-label d-flex align-items-center fs-base">Email address * <span class="badge text-danger bg-danger-subtle ms-2">Verify email</span></label>
        <input type="email" class="form-control form-control-lg" name="email" id="emailAddress" value="{{ old('emailAddress', Auth::check() ? Auth::user()->email : '') }}" required="">
        <div class="invalid-tooltip bg-transparent p-0">Enter a valid email address!</div>
      </div>

      <div class="col position-relative mb-4">
        <label for="phone" class="form-label d-flex align-items-center fs-base">Phone number * <span class="badge bg-success ms-2">Verified</span></label>
        <input type="tel" class="form-control form-control-lg" name="phone" id="phone" data-input-format="{&quot;numericOnly&quot;: true, &quot;delimiters&quot;: [&quot;(&quot;, &quot;)&quot;, &quot; &quot;, &quot;-&quot;, &quot; &quot;], &quot;blocks&quot;: [0, 3, 0, 3, 4]}" value="{{ old('phoneNumber', Auth::check() ? Auth::user()->phone : '') }}" placeholder="(___) ___-____" required="">
        <div class="invalid-tooltip bg-transparent p-0">Enter a valid phone number!</div>
      </div>


      <div class="position-relative  mb-4">
        <label for="birth-date" class="form-label fs-base">Date of birth</label>
        <div class="position-relative">
            <input type="date" name="date_of_birth" id="dob" class="form-control form-control-lg form-icon-end"  data-datepicker="{&quot;dateFormat&quot;: &quot;F j, Y&quot;}" placeholder="Choose date">
          <i class="fi-calendar fs-lg position-absolute top-50 end-0 translate-middle-y me-3"></i>
        </div>
      </div>

      <div class="position-relative mb-4">

        <label class="form-label">Country *</label>
        <select class="form-select form-select-lg"  required name="country" id="country">
        <option value="">Select your Country</option>
        @foreach (\App\Models\Country::all() as $row)
        <option value="{{ $row->id }}">{{ ucfirst(strtolower($row->name)) }}</option>
        @endforeach
        </select>
      </div>


      <div class="position-relative mb-4">
        <label for="state" class="form-label">State *</label>
        <select name="state" id="state" class="form-select form-select-lg"
        required>
            <option value="">Select State</option>
            {{-- @if(Auth::user()->state)
            <option value="{{ Auth::user()->state }}" selected>{{ Auth::user()->stateName->name }}</option>
        @endif --}}
            
        </select>
    </div>
   
    
      <div class="position-relative mb-4">
        <label class="form-label">City *</label>
        <select class="form-select form-select-lg" required="" id="city" name="city" >
        <option value="">Select your City</option>
        {{-- @if(Auth::user()->city)
        <option value="{{ Auth::user()->city }}" selected>{{ Auth::user()->cityName->name }}</option>
    @endif --}}
        </select>
      </div>


    <div class="position-relative mb-4">
        <label for="address" class="form-label fs-base">Address *</label>
        <textarea class="form-control form-control-lg bg-transparent" name="location_address" id="user-info" rows="6">{{ old('location_address', Auth::check() ? Auth::user()->location_address : '') }}</textarea>
        <div class="invalid-tooltip bg-transparent p-0">Enter your address!</div>
      </div>


      
      <div class="position-relative mb-4">
        <label>Skills<span style="font-size:14px;">(Job Skill)</span></label>
            <div class="input-container form-control" id="input-container" onclick="focusInput()">
                <input type="hidden" name="skills[]" id="skills-hidden" value="">

                <input type="text" id="skill-input" class="tag-input form-select form-select-lg"
                    autocomplete="off" value="">
            </div>
            <div id="suggestions" class="suggestions-list"></div>
        </div>



      <div class=" position-relative  mb-4">
        <label for="fl-select">Skill Level</label>
        <select class="form-select form-select-lg" id="fl-select" aria-label="Floating label select" name="skillLevel">

            <option value="Skilled" selected="selected">Skilled</option>
            <option value="Semi skilled" selected="selected">Semi skilled</option>
            <option value="Internship/Graduate Training" selected="selected">Internship/Graduate Training</option>
            <option value="Unskilled" selected="selected">Unskilled</option>
        </select>
        
      </div>


      <div class=" position-relative  mb-4">
        <label for="fl-select">Availabilty</label>
        <select class="form-select form-select-lg" id="fl-select" aria-label="Floating label select" name="availability">

            <option value="Full-Time">Full-Time</option>
            <option value="Part-Time">Part-Time</option>
            <option value="Contract">Contract</option>
            <option value="Temporary">Temporary</option>
        </select>
        
      </div>

     
    

      <div class="position-relative  mb-4">
        <label for="user-info" class="form-label fs-base">What certifications do you have?</label>
        <input type="text" name="certification"  placeholder="E.g; SSCE, Bsc, NABTEB, Labour Trade Test, etc" class="form-control form-control-lg bg-transparent">
      </div>

   


      <div class="position-relative  mb-4">
        <!-- PDF Upload -->
        <label class="form-label">Upload CV (Optional)</label>
        <input type="file" class="form-control form-control-lg" name="cv" accept="application/pdf" onchange="previewPDF(event)">
        <div id="pdfPreview" class="mt-3" style="display: none;">
            <iframe src="{{ isset($user->cv) ? asset($user->cv) : '' }}" width="100%" height="250" style="border: 1px solid #ccc; border-radius: 4px;"></iframe>
        </div>
        @if(isset(Auth::user()->cv) && Auth::user()->cv)
        <small class="form-text text-muted">
            Current file: <a href="{{ asset(Auth::user()->cv) }}" target="_blank">View Resume</a>
        </small>
        @endif
        @error('cv')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>



      <div class="job-details-btn-box">
        <div onload="disableSubmit()">
        <input type="checkbox" name="terms" id="terms" onchange="activateButton(this)" required="true">  I have read and agree to the <a href="{{route('index.terms')}}" style="color:#800080 ">terms &amp;
                conditions</a>
        <br><br>
        </div>
    </div>

   
    <div class="d-flex gap-3">
      <a class="btn btn-lg btn-secondary" href="account-profile.html">Cancel</a>
      <button type="submit" class="btn btn-lg btn-dark">Save changes</button>
    </div>
  </form>