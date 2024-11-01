@extends('shared.layouts.users')
@section('content')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Breadcrumb Area -->
    <div class="breadcrumb-area">
        <h1>New Skill</h1>
        <ol class="breadcrumb">
            <li class="item"><a href="{{route('employer.home')}}">Home</a></li>
            <li class="item"><a href="{{route('employer.job.request')}}">Dashboard</a></li>
            <li class="item">Add New Skill</li>
        </ol>
    </div>
    <!-- End Breadcrumb Area -->

    <!-- Start Post a New Job Area -->
    <div class="post-a-new-job-box">
        <h3>New Skill</h3>

        @if(session('success'))
            <div class="notification-alert alert alert-success alert-dismissible fade show" role="alert">
                {{session('success')}}
                <button type="button" class="btn btn-primary" data-bs-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
        @endif
        @if(session('error'))
            <div class="notification-alert alert alert-danger alert-dismissible fade show" role="alert">
                {{session('error')}}
                <button type="button" class="btn btn-primary" data-bs-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
        @endif
            <div style="margin-left: 27px;">
        @foreach(Auth::user()->mySkills as $skill)
            <span class="badge bg-primary ">
                {{ $skill->title }}
                <form action="{{ route('skills.destroy', $skill->id) }}" method="POST" style="display: inline; padding:5px !important;">
                    @csrf
                    @method('DELETE')
                    <i class="fa fa-times text-white ms-1" style="cursor: pointer;" 
                   onclick="event.preventDefault(); this.closest('form').submit();" aria-hidden="true"></i>
                </form>
            </span>
        @endforeach
    </div>

        <form method="post" action="{{ route('updateSkills') }}" style="color:#000000;">
                {{ csrf_field() }}
                


                <div class="row">


                    <div class=" col-lg-12 col-md-12">
                        <div class="form-group">
                            <label>Skills<span style="font-size:14px;">(e.g podcasting, web development....)</span></label>
                            <div class="input-container form-control" id="input-container" onclick="focusInput()">
                                <input type="hidden" name="skills" id="skills-hidden">
                                <input type="text" id="skill-input" class="tag-input" placeholder="Enter skills..."
                                    autocomplete="off">
                            </div>
                            <div id="suggestions" class="suggestions-list"></div>
                        </div>

                    </div>

                    <!-- CSS to style the input, suggestions, and tags -->
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
                            color: #343a40;
                            max-width: calc(20% - 5px);

                            box-sizing: border-box;

                        }

                        .tag i {
                            margin-left: 5px;
                            cursor: pointer;
                            color: #dc3545;

                        }

                        .suggestions-list {
                            border: 1px solid #ddd;
                            max-height: 150px;
                            overflow-y: auto;
                            position: absolute;
                            z-index: 1000;
                            background: #fff;
                            width: 100%;
                            display: none;
                        }

                        .suggestion-item {
                            padding: 8px 12px;
                            cursor: pointer;
                        }

                        .suggestion-item:hover {
                            background-color: #f0f0f0;
                        }
                    </style>




                    <div class="col-lg-12 col-md-12 d-flex justify-content-between">
                        <button type="submit" class="default-btn">Add Skills<i class="flaticon-send"></i></button>
                    </div>
                </div>
            </form>

        <!--<div class="manage-jobs-box">-->
        <!--    <div class="manage-jobs-table table-responsive">-->
        <!--        <table class="table table-bordered">-->
        <!--            <thead>-->
        <!--            <tr>-->
        <!--                <th>Title</th>-->
        <!--            </tr>-->
        <!--            </thead>-->

        <!--            <tbody>-->

        <!--            @foreach($skills as $row)-->
        <!--                <tr>-->

        <!--                    <td>{{$row->title}}</td>-->
        <!--                </tr>-->
        <!--            @endforeach-->


        <!--            </tbody>-->
        <!--        </table>-->
        <!--    </div>-->
        <!--</div>-->
    </div>
    <!-- End Post a New Job Area -->
<script src="{{ asset('assets/js/jquery.min.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
    <!-- JavaScript for skill suggestions and skill tags -->
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
    </script>

@endsection
