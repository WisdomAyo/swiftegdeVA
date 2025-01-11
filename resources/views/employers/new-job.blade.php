@extends('shared.layout.employer')
@section('content')


        <!-- Breadcrumb Area -->
        {{-- <div class="breadcrumb-area">
            <h1>Post a New Job</h1>
            <ol class="breadcrumb">
                <li class="item"><a href="{{route('employer.home')}}">Home</a></li>
                <li class="item"><a href="{{route('employer.job.request')}}">Dashboard</a></li>
                <li class="item">Post a New Job</li>
            </ol>
        </div>
        <!-- End Breadcrumb Area -->

        <!-- Start Post a New Job Area -->
        <div class="post-a-new-job-box">


            <h3>Post Your Job</h3>
            @if(session('error'))
                <div class="notification-alert alert alert-danger alert-dismissible fade show" role="alert">
                    {{session('error')}}
                    <button type="button" class="btn btn-primary" data-bs-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
            @endif

            @if(session('response'))
                <div class="notification-alert alert alert-success alert-dismissible fade show" role="alert">
                    {{session('response')}}
                    <button type="button" class="btn btn-primary" data-bs-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
            @endif

            <form method="post" action="{{ route('employer.job.save')}}"  enctype="multipart/form-data" style="color:#000000;">
                {{ csrf_field() }}
                <div class="row">
                    <div class="col-lg-12 col-md-12">
                        <div class="form-group">
                            <label>Job Title</label>
                            <input type="text" class="form-control" placeholder="Job Title Here" name="job_title">
                        </div>
                    </div>

                    <div class="col-lg-12 col-md-12">
                        <div class="form-group">
                            <label>Job Description</label>
                            <textarea cols="30" rows="6" placeholder="Short description..." class="form-control" name="job_description"></textarea>
                        </div>
                    </div>


                    <div class="col-xl-6 col-lg-12 col-md-12">
                        <div class="form-group">
                            <label>Job Type</label>

                            <select class="selectize-filter selectized" tabindex="-1" style="display: none;" name="job_type">
                                <option value="Full-Time" selected="selected">Full-Time</option>
                                <option value="Part-Time" selected="selected">Part-Time</option>
                                <option value="Contract" selected="selected">Contract</option>
                                <option value="Temporary" selected="selected">Temporary</option>
                            </select>

                        </div>
                    </div>

                    <div class="col-xl-6 col-lg-12 col-md-12">
                        <div class="form-group">
                            <label>Job category</label>
                            <select class="selectize-filter" name="job_category">
                                @foreach($category as $row)
                                    <option value="{{$row->id}}">{{$row->title}}</option>
                                @endforeach
                            </select>

                        </div>
                    </div>

                    <div class="col-xl-6 col-lg-12 col-md-12">
                        <div class="form-group">
                            <label>Skill Level</label>

                            <select class="selectize-filter selectized" tabindex="-1" style="display: none;" name="itSkills">
                                <option value="Skilled" selected="selected">Skilled</option>
                                <option value="Semi skilled" selected="selected">Semi skilled</option>
                                <option value="Internship/Graduate Training" selected="selected">Internship/Graduate Training</option>
                                <option value="Unskilled" selected="selected">Unskilled</option>
                            </select>

                        </div>
                    </div>

                    <div class="col-xl-6 col-lg-12 col-md-12">
                        <div class="form-group">
                            <label>Academic Qualification</label>
                            <input type="text" class="form-control" placeholder="Career Level" name="career_level">
                        </div>
                    </div>

                    <div class="col-xl-6 col-lg-12 col-md-12">
                        <div class="form-group">
                            <label>How many people do you want to hire for this opening?</label>
                            <input type="text" class="form-control"  name="position">

                        </div>
                    </div>

                    <div class="col-xl-6 col-lg-12 col-md-12">
                        <div class="form-group">
                            <label>Gender</label>
                            <select class="selectize-filter selectized" tabindex="-1" style="display: none;" name="gender">
                                <option value="No Preference">No Preference</option>
                                <option value="Male" selected="selected">Male</option>
                                <option value="Female" selected="selected">Female</option>

                            </select>

                        </div>
                    </div>

                    <div class="col-xl-6 col-lg-12 col-md-12">
                        <div class="form-group">
                            <label>YOUR COMPANY'S NAME</label>
                            <input type="text" class="form-control" placeholder="Industry" name="company">
                        </div>
                    </div>

                    <div class="col-xl-6 col-lg-12 col-md-12">
                        <div class="form-group">
                            <label>Compensation Type </label>

                            <select  class="form-control" id="select" name="compensation_type">
                                <option value="payperjob">Pay Per Job</option>
                                <option value="salary">Salary</option>

                            </select>

                        </div>
                    </div>

                    <div class="col-xl-6 col-lg-12 col-md-12" id="compensation">
                        <div class="form-group">
                            <label>Proposed Minimum Salary </label>
                            <input type="number" class="form-control"  name="min_amount">

                        </div>
                    </div>

                    <div class="col-xl-6 col-lg-12 col-md-12" id="compensation2">
                        <div class="form-group">
                            <label>Proposed Maximum Salary </label>
                            <input type="number" class="form-control" name="max_amount">

                        </div>
                    </div>


                    <div class="col-xl-6 col-lg-12 col-md-12">
                        <div class="form-group">
                            <label>Application Deadline Date</label>
                            <input type="date" class="form-control" placeholder="Application Deadline Date" name="application_deadline">
                        </div>
                    </div>

                    <div class="col-xl-6 col-lg-12 col-md-12">
                        <div class="form-group">
                            <label>State</label>
                            <select name="state" id="state" class="form-control">
                                @foreach ($states as $row)
                                    <option  value="{{ $row->id }}">{{ $row->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>


                    <div class="col-xl-6 col-lg-12 col-md-12">
                        <div class="form-group">
                            <label>State Areas</label>
                            <select name="state_area" class="form-control">
                            </select>

                        </div>
                    </div>


                    <div class="col-lg-12 col-md-12">
                        <button type="submit" class="default-btn">Post A Job <i class="flaticon-send"></i></button>
                    </div>
                </div>
            </form>
        </div> --}}
        <!-- End Post a New Job Area -->


        <div class="col-lg-9">
        <form  method="post" action="{{ route('employer.job.save')}}"  enctype="multipart/form-data">
            {{ csrf_field() }}

            <div class="row row-cols-1 row-cols-sm-2 g-4 mb-4">

            <div class="col form-floating mb-3">
                <input class="form-control" type="text" id="fl-text" placeholder="Job Title" name="job_title">
                <label for="fl-text">Job Title</label>
              </div>

              <!-- Floating label: Select -->
              <div class=" col form-floating mb-3">
                <select class="form-select" id="fl-select" aria-label="Floating label select" name="job_type">
                    <option value="Full-Time" selected="selected">Full-Time</option>
                    <option value="Part-Time" selected="selected">Part-Time</option>
                    <option value="Contract" selected="selected">Contract</option>
                    <option value="Temporary" selected="selected">Temporary</option>
                </select>
                <label for="fl-select">Job Type</label>
              </div>

              <div class="col form-floating mb-3">
                <input class="form-control" type="text" id="fl-text" placeholder="Job Title" name="career_level" value="{{$job->career_level}}">
                <label for="fl-text">Academic Qualification </label>
              </div>
            </div>


              <!-- Floating label: Textarea -->
              <div class="form-floating mb-3">
                <textarea class="form-control" id="fl-textarea" style="height: 120px;" placeholder="Short description..." name="job_description"></textarea>
                <label for="fl-textarea">Job Description</label>
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


            <div class="position-relative mb-4">

                <div id="requirementContainer" class="">
                    <!-- Container for benefits -->
                </div>
                <label for="benefits">Special Requirement</label>
                <button type="button" class="btn btn-sm btn-primary" id="addSpecialRequirement">Add Requirement</button>
            </div>


            <div class="position-relative mb-4">

                <div id="benefitsContainer" class="">
                    <!-- Container for benefits -->
                </div>
                <label for="benefits">Job / Role Benefit  (Optional)</label>
                <button type="button" class="btn btn-sm btn-primary" id="addBenefit">Add Benefit </button>
            </div>




              <div class="row row-cols-1 row-cols-sm-2 g-4 mb-4">

                <div class="col form-floating mb-3">
                    <input class="form-control" type="text" id="fl-text" placeholder="Job Title" name="position" value="{{$job->position}}">
                    <label for="fl-text">How many people do you want to hire for this opening?</label>
                  </div>




                  <!-- Floating label: Select -->
                  <div class=" col form-floating mb-3">
                    <select class="form-select" id="fl-select" aria-label="Floating label select" name="gender">
                        <option value="{{$job->gender}}">{{$job->gender}}</option>
                      <option value="Argentina" selected>No Prefrence</option>
                      <option value="Male">Male</option>
                      <option value="Female">Female</option>
                    </select>
                    <label for="fl-select">gender</label>
                  </div>

                  <div class="col form-floating mb-3">
                    <input class="form-control" type="text" id="fl-text" placeholder="Job Title" name="company" value="{{$job->company}}">
                    <label for="fl-text">Company Name</label>
                  </div>


                  <div class=" col form-floating mb-3">
                    <select class="form-select" id="fl-select" aria-label="Floating label select" name="job_category">
                      <option value="Argentina" selected>Select Job Category</option>
                      @foreach($category as $row)
                      <option value="{{$row->id}}">{{$row->title}}</option>
                      @endforeach
                    </select>
                    <label for="fl-select">Job category</label>
                  </div>

                  <div class=" col form-floating mb-3">
                    <select class="form-select" id="fl-select" aria-label="Floating label select" name="itSkills">

                        <option value="Skilled" selected="selected">Skilled</option>
                        <option value="Semi skilled" selected="selected">Semi skilled</option>
                        <option value="Internship/Graduate Training" selected="selected">Internship/Graduate Training</option>
                        <option value="Unskilled" selected="selected">Unskilled</option>
                    </select>
                    <label for="fl-select">Skill Level</label>
                  </div>

                  <div class=" col form-floating mb-3">
                    <select class="form-select" id="fl-select" aria-label="Floating label select" name="compensation_type">
                        <option value="payperjob">Pay Per Job</option>
                        <option value="salary">Salary</option>
                    </select>
                    <label for="fl-select">Compensation Type</label>
                  </div>

                  <div class="col form-floating mb-3">
                    <input class="form-control" type="text" id="fl-text" placeholder="Job Title" name="max_amount">
                    <label for="fl-text">Proposed Maximum Salary </label>
                  </div>

                  <div class="col form-floating mb-3">
                    <input class="form-control" type="text" id="fl-text" placeholder="Job Title" name="min_amount">
                    <label for="fl-text">Proposed Minimum Salary</label>
                  </div>

                  <div class="col form-floating mb-3">
                    <input class="form-control" type="date" id="fl-text" placeholder="Job Title" name="application_deadline" value="{{$job->application_deadline}}">
                    <label for="fl-text">Application Deadline</label>
                  </div>


                  <div class="col form-floating mb-3">
                <select class="form-select form-select-lg"  required name="country_id" id="country">
                <option value="">Select your Country</option>
                @foreach (\App\Models\Country::all() as $row)
                <option value="{{ $row->id }}">{{ ucfirst(strtolower($row->name)) }}</option>
                @endforeach
                </select>
                <label class="form-label">Country *</label>
              </div>


              <div class="col form-floating mb-3">

                <select name="state_id" id="state" class="form-select form-select-lg"
                required>
                    <option value="">Select State</option>
                    {{-- @if(Auth::user()->state)
                    <option value="{{ Auth::user()->state }}" selected>{{ Auth::user()->stateName->name }}</option>
                @endif --}}

                </select>
                <label for="state" class="form-label">State *</label>
            </div>


            <div class="col form-floating mb-3">

                <select class="form-select form-select-lg" required="" id="city" name="city_id" >
                <option value="">Select your City</option>
                {{-- @if(Auth::user()->city)
                <option value="{{ Auth::user()->city }}" selected>{{ Auth::user()->cityName->name }}</option>
            @endif --}}
                </select>
                <label class="form-label">City *</label>
              </div>


              <div class="d-flex gap-3">

                <button type="submit" class="btn btn-lg btn-dark">Save changes</button>
              </div>

            </form>

        </div>

        <style>
            .input-container {
           display: flex;
           flex-wrap: wrap;
           padding: 5px;
           min-height: 45px;
           border: 1px solid #ddd;
           border-radius: 5px;
           cursor: text;
       }

       .tag-input {
           border: none;
           outline: none;
           flex: 1;
           min-width: 150px;
       }

       .tag {
           background-color: #e9ecef;
           border-radius: 10%;
           padding: 5px 10px;
           margin: 3px;
           display: flex;
           align-items: center;
           color: #0e0f0f;
           /*max-width: calc(20% - 5px);*/

           box-sizing: border-box;

       }

       .tag i {
           margin-left: 5px;
           cursor: pointer;
           color: #dc3545;

       }

       .suggestions-list {
           border: 1px solid #0d0152;
           max-height: 150px;
           overflow-y: auto;
           position: absolute;
           z-index: 1000;
           background: #080429;
           border-radius: 20px;
           width: 25%;
           display: none;
       }

       .suggestion-item {
           padding: 8px 12px;
           cursor: pointer;
       }

       .suggestion-item:hover {
           background-color: #f0f0f0;
           color: #080429;
       }
       </style>


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>

const skillsData = @json(\App\Models\Skill::pluck('name')); // Fetching skills from the database

// Show suggestions based on input
document.getElementById('skill-input').addEventListener('input', function() {
    const input = this.value.toLowerCase();
    const suggestionsBox = document.getElementById('suggestions');
    suggestionsBox.innerHTML = ''; // Clear previous suggestions
    if (input) {
        const filteredSkills = skillsData.filter(skill => skill.toLowerCase().includes(input));
        filteredSkills.forEach(skill => {
            const suggestionItem = document.createElement('div');
            suggestionItem.className = 'suggestion-item';
            suggestionItem.textContent = skill;
            suggestionItem.onclick = () => selectSkill(skill);
            suggestionsBox.appendChild(suggestionItem);
        });
        suggestionsBox.style.display = filteredSkills.length ? 'block' : 'none';
    } else {
        suggestionsBox.style.display = 'none';
    }
});

// Function to handle skill selection
function selectSkill(skill) {
    addSkill(skill);
    document.getElementById('skill-input').value = '';
    document.getElementById('suggestions').style.display = 'none';
}

// Function to add skill tags inside the input container
function addSkill(skill) {
    const inputContainer = document.getElementById('input-container');

    // Check if skill is already added
    if ([...inputContainer.querySelectorAll('.tag')].some(tag => tag.dataset.value === skill)) {
        return;
    }
    const currentSkills = inputContainer.querySelectorAll('.tag');
    if (currentSkills.length >= 5) {
        alert('You can only add a maximum of 5 skills.');
        return; // Stop if 5 skills are already added
    }

    // Create a skill tag
    const skillTag = document.createElement('span');
    skillTag.className = 'tag';
    skillTag.textContent = skill;
    skillTag.dataset.value = skill;

    // Create a remove button for the skill
    const removeButton = document.createElement('i');
    removeButton.className = 'fa fa-times-circle';
    removeButton.onclick = function() {
        inputContainer.removeChild(skillTag);
        updateHiddenInput();
    };

    // Append the remove button to the skill tag
    skillTag.appendChild(removeButton);

    // Insert the skill tag before the input field
    inputContainer.insertBefore(skillTag, document.getElementById('skill-input'));

    updateHiddenInput(); // Update hidden input with selected skills
}

// Update hidden input with selected skills
function updateHiddenInput() {
    const skills = [...document.querySelectorAll('.tag')].map(tag => tag.dataset.value);
    document.getElementById('skills-hidden').value = skills.join(', ');
}

// Add skill on pressing 'Enter' key
document.getElementById('skill-input').addEventListener('keypress', function(event) {
    if (event.key === 'Enter') {
        event.preventDefault();
        const skill = this.value.trim();
        if (skill) {
            addSkill(skill);
            this.value = '';
        }
    }
});

// Focus the input when the input-container is clicked
function focusInput() {
    document.getElementById('skill-input').focus();
}




    // Add Benefits
    document.getElementById('addBenefit').addEventListener('click', () => {
        const container = document.getElementById('benefitsContainer');
        const input = document.createElement('div');
        input.className = 'col form-floating mb-2';

        const textInput = document.createElement('input');
        textInput.type = 'text';
        textInput.name = 'benefits[]';
        textInput.className = 'form-control mb-1';
        textInput.placeholder = 'Enter a benefit';

        const removeButton = document.createElement('button');
        removeButton.className = 'btn btn-outline-danger';
        removeButton.type = 'button';
        removeButton.textContent = 'Remove';

        removeButton.onclick = () => container.removeChild(input);

        input.appendChild(textInput);
        input.appendChild(removeButton);

        container.appendChild(input);
    });



    document.getElementById('addSpecialRequirement').addEventListener('click', () => {
        const container = document.getElementById('requirementContainer');
        const input = document.createElement('div');
        input.className = 'col form-floating mb-2';

        const textInput = document.createElement('input');
        textInput.type = 'text';
        textInput.name = 'special_requirements[]';
        textInput.className = 'form-control mb-1';
        textInput.placeholder = 'Enter a benefit';

        const removeButton = document.createElement('button');
        removeButton.className = 'btn btn-outline-danger';
        removeButton.type = 'button';
        removeButton.textContent = 'Remove';

        removeButton.onclick = () => container.removeChild(input);

        input.appendChild(textInput);
        input.appendChild(removeButton);

        container.appendChild(input);
    });








    // Configure AJAX globally
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') // CSRF token for Laravel
        },
        error: function (xhr, status, error) {
            // Handle global AJAX errors
            console.error('AJAX Error:', xhr.responseJSON || error);
            alert('Something went wrong. Please try again.');
        }
    });

    $(document).ready(function () {
        // Fetch states when country changes
        $('#country').on('change', function () {
            const countryId = $(this).val();
            if (countryId) {
                $.ajax({
                    url: `/country/${countryId}/states`, // AJAX endpoint to fetch states
                    type: 'GET',
                    dataType: 'json',
                    success: function (data) {
                        console.log('States fetched:', data); // Debug fetched data
                        const stateDropdown = $('#state');
                        stateDropdown.empty().append('<option value="">Select State</option>');
                        $.each(data, function (index, state) {
                            stateDropdown.append(`<option value="${state.id}">${state.name}</option>`);
                        });
                        $('#city').empty().append('<option value="">Select City</option>'); // Reset city dropdown
                    }
                });
            } else {
                $('#state').empty().append('<option value="">Select State</option>');
                $('#city').empty().append('<option value="">Select City</option>');
            }
        });

        // Fetch cities when state changes
        $('#state').on('change', function () {
            const stateId = $(this).val();
            if (stateId) {
                $.ajax({
                    url: `/state/${stateId}/cities`, // AJAX endpoint to fetch cities
                    type: 'GET',
                    dataType: 'json',
                    success: function (data) {
                        console.log('Cities fetched:', data); // Debug fetched data
                        const cityDropdown = $('#city');
                        cityDropdown.empty().append('<option value="">Select City</option>');
                        $.each(data, function (index, city) {
                            cityDropdown.append(`<option value="${city.id}">${city.name}</option>`);
                        });
                    }
                });
            } else {
                $('#city').empty().append('<option value="">Select City</option>');
            }
        });
    });

</script>

@endsection
