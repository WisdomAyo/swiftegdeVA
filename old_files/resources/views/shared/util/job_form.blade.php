


<form method="post" action="{{ route('index.staffing.job.save')}}"  enctype="multipart/form-data" style="color:#000000;">
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
        <input type="checkbox" name="terms" id="terms" onchange="activateButton(this)" required="true">  I have read and agree to the <a href="{{route('index.terms')}}" style="color:#397E62 ">terms &amp;
                conditions</a>
        <br><br>
        </div>
        <input type="hidden" name="job_id" value="{{ Request::segment(2) }}">

        <button type="submit" class="default-btn">Apply For Job <i class="flaticon-list-1"></i></button>
    </div>

</form>
