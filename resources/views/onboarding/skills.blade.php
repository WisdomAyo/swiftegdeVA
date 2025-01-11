{{-- @extends('shared.layouts.onboarding')
@section('content')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
                <a href="{{ url('/') }}" class="navbar-brand d-flex align-items-center justify-content-center mb-3">
                    <img src="{{ asset('logo.png') }}" alt="image" width="200px">
                </a>
                <h6 class="text-center mb-3">Profile Setup</h6>
                <div class="col-md-12">
                    <ul id="progressbar" class="text-center">
                        <li class="" style="width:16.67%; font-size:12px">{{ __('Upload Picture') }}</li>
                        <li class="" style="width:16.67%; font-size:12px">{{ __('About Me') }}</li>
                        <li class="" style="width:16.67%; font-size:12px">{{ __('Location') }}</li>
                        <li class="" style="width:16.67%; font-size:12px">{{ __('Category') }}</li>
                        <li class="" style="width:16.67%; font-size:12px">{{ __('Charge') }}</li>
                        <li class="active" style="width:16.67%; font-size:12px">{{ __('Skills') }}</li>
                    </ul>
                </div>
            </div>
            @if (session('response'))
                <div class="notification-alert alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('response') }}
                    <button type="button" class="btn btn-primary" data-bs-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
            @endif

            <form  action="{{ route('onboarding.update') }}" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                 <div>
                    @foreach(Auth::user()->mySkills as $skill)
                        <span class="badge bg-primary">{{ $skill->title }}</span>
                    @endforeach
                </div>

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
                            /*max-width: calc(20% - 5px);*/

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
                        <a href="{{ route('onboarding.charge') }}" class="default-btn">Previous</a>
                        <button type="submit" class="default-btn">Complete<i class="flaticon-send"></i></button>
                    </div>
                </div>
            </form>
        </div>
    </div>
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
@endsection --}}




<main class="content-wrapper">
    <div class="container pt-3 pt-sm-4 pt-md-5 pb-5">
      <div class="row pt-lg-2 pt-xl-3 pb-1 pb-sm-2 pb-md-3 pb-lg-4 pb-xl-5">

        <!-- Sidebar navigation -->
        <aside class="col-lg-3 col-xl-4 mb-3" style="margin-top: -100px">
          <div class="sticky-top overflow-y-auto" style="padding-top: 100px">
            <ul class="nav flex-lg-column flex-nowrap gap-4 gap-lg-0 text-nowrap pb-2 pb-lg-0">
              <li class="nat-item">
                <a class="nav-link d-inline-flex px-0 px-lg-3  disabled" >
                  <i class="fi-circle fs-lg me-2 "></i>
                  <i class="fi-arrow-down-circle d-lg-none fs-lg me-2"></i>
                  {{__('Upload Picture')}}
                </a>
              </li>
              <li class="nat-item">
                <a class="nav-link d-inline-flex px-0 px-lg-3 disabled" >
                  <i class="fi-circle fs-lg me-2 "></i>
                  {{__('About Me')}}
                </a>
              </li>
              <li class="nat-item">
                <a class="nav-link d-inline-flex px-0 px-lg-3 disabled">
                  <i class="fi-circle fs-lg me-2"></i>
                  {{__('Location')}}
                </a>
              </li>
              <li class="nat-item">
                <a class="nav-link d-inline-flex px-0 px-lg-3 disabled">
                  <i class="fi-circle fs-lg me-2"></i>
                  {{__('Category')}}
                </a>
              </li>
              <li class="nat-item">
                <a class="nav-link d-inline-flex px-0 px-lg-3 disabled">
                  <i class="fi-circle fs-lg me-2"></i>
                  {{__('Charge')}}
                </a>
              </li>
              <li class="nat-item">
                <a class="nav-link d-inline-flex px-0 px-lg-3 pe-none " aria-current="page">
                  <i class="fi-arrow-right-circle d-none d-lg-inline-flex fs-lg me-2"></i>
                  {{__('Skills')}}
                </a>
              </li>
              <li class="nat-item">
                <a class="nav-link d-inline-flex px-0 px-lg-3 disabled">
                  <i class="fi-circle fs-lg me-2"></i>
                  {{__('Socials')}}
                </a>
              </li>
            </ul>
          </div>
        </aside>


        <!-- Property type inputs -->
        <div class="col-lg-9 col-xl-8">
            <div class="row pt-md-1 pt-lg-2 pt-xl-3 pb-2 pb-sm-3 pb-md-4 pb-lg-5">
    
                <!-- Inputs -->
                <div class="col-lg-7">

            @if(session('response'))
            <div class="notification-alert alert alert-success alert-dismissible fade show" role="alert">
                {{session('response')}}
                <button type="button" class="btn btn-primary" data-bs-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            @endif


            <h1 class="h2 pb-1 pb-lg-2">Skills</h1>
            <form id="onboarding-form" action="{{ route('onboarding.update') }}"  method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}

           
                <div class="form-group position-relative  mb-4">
                    <label for="fl-select">Skill Level</label>
                    <select class="form-select form-select-lg" id="fl-select" aria-label="Floating label select" name="skillLevel" required>
                        {{-- <option value="Internship" selected="selected">Internship</option> --}}
                        <option value="Beginner" selected="selected">Beginner</option>
                        <option value="Intermidiate" selected="selected">Intermidiate </option>
                        <option value="Advance" selected="selected">Advance</option>
                        <option value="Expert" selected="selected">Expert</option>
                        
                    </select>
                    
                  </div>

                <div class="form-group">
                    <label>Skills<span style="font-size:14px;">(e.g podcasting, web development....)</span></label>
                    <div class="input-container form-control" id="input-container" onclick="focusInput()">
                        <input type="hidden" name="skills" id="skills-hidden">
                        <input type="text" id="skill-input" class="tag-input form-select form-select-lg" placeholder="Enter skills..."
                            autocomplete="off">
                    </div>
                    <div id="suggestions" class="suggestions-list"></div>

                   




                    <input type="hidden" name="step" value="skills">

            <div class="mt-3">
                <button type="submit" class="btn btn-primary">Submit<i class="fi-chevron-right fs-lg ms-1 me-n2"></i></button>
            </div>
        </form>
                </div>


        </div>

        <div class="col-lg-5 d-none d-lg-block">
            <svg xmlns="http://www.w3.org/2000/svg" width="526" viewBox="0 0 526 526" fill="none"><path d="M198.321 301.258c3.113-6.999 9.34-12.043 15.542-16.58 2.076-1.472 4.127-3.016 6.203-4.537l-6.203-28.984-6.081-28.14c-5.455 2.486-10.692 5.406-15.567 8.688-10.353 7.264-19.427 15.928-26.691 26.185-3.62 5.044-6.878 10.498-9.461 16.194-5.575 11.922-8.808 24.737-9.726 37.696-.12 1.424-.12 2.848-.12 4.417h51.453c-1.69-4.827-1.69-9.75.651-14.939zm138.863-21.044l1.761 1.303c5.237 3.813 10.354 8.061 13.732 13.467l49.619-9.099c-1.496-5.092-3.282-10.136-5.551-14.987-2.582-5.695-5.84-11.15-9.46-16.193-7.264-10.257-16.338-18.945-26.692-26.185-3.475-2.341-7.143-4.417-10.932-6.372l-6.251 29.081-6.226 28.985z" fill="currentColor" style="color: var(--fn-info-border-subtle)"></path><g class="text-info" fill="currentColor"><path d="M280.25 414.976h-3.234l1.303-12.96v-.12c.386.265.651.386.772.386l1.159 12.694zm-25.966-204.895c.217-.096.483-.024.652.145 1.665 1.617 3.74 2.969 5.961 4.175l2.172-8.181c-7.771.507-15.277 1.279-22.083 2.534l.58 5.575 12.718-4.248zm48.148.145c.169-.169.434-.241.651-.145l11.85 3.958.869-5.43c-6.01-1.038-12.502-1.786-19.259-2.292l.7 7.722c1.906-1.11 3.668-2.341 5.189-3.813zm-40.834-84.154c-.434-.024-.796 0-1.134 0-.241.025-.531.025-.724.073-.266.048-.41.145-.579.241-.097.073-.218.121-.29.193.121.049.193.169.314.218 1.834.651 3.523.289 5.189-.338l-2.004-.314-.772-.073zm44.669 20.731c.049.531.025 1.062.025 1.593.458-.097.772-.29.893-.555.193-.531-.242-1.327-1.183-2.341l.265 1.303zm-44.162 68.178l6.371-24.062-1.255-.41-4.151 15.735-2.172 8.181 1.207.556z"></path><path d="M293.621 188.675l2.389 25.968c.411-.217.869-.362 1.255-.579l-.7-7.723-1.689-18.511-1.255.845zm-39.288-12.767c-.338.097-.651.29-1.038.338.097-.024.218.024.314 0 .459-.121.652.579.193.724a6.84 6.84 0 0 1-6.226-1.375c-1.665-1.424-2.51-3.717-2.245-5.865.049-.458.797-.483.748 0-.241 1.955.483 3.958 1.955 5.261 1.328 1.207 3.186 1.569 4.948 1.279-3.283.242-6.347-2.317-6.709-5.792-.194-1.737.313-3.427 1.351-4.778 1.062-1.352 2.558-2.172 4.223-2.365l.652-.049c.459 0 .869.145 1.303.242l.121-1.279c-.048 0-.097-.024-.145-.024l-.048.024c-.024 0-.024-.049-.048-.024-.387-.073-.749-.218-1.159-.218a8.5 8.5 0 0 0-.796.049c-2.028.217-3.838 1.23-5.117 2.847-1.255 1.617-1.858 3.645-1.641 5.72.435 4.006 3.765 6.999 7.602 6.999.266 0 .507-.024.773-.048.458-.049.868-.29 1.303-.411-.145-.41-.217-.844-.314-1.255zm-5.72-7.095a3.55 3.55 0 0 0 1.81 3.765c.41.217.796-.411.362-.652-1.038-.531-1.69-1.762-1.472-2.92s1.23-2.1 2.413-2.22c.458-.049.483-.797 0-.748-1.472.168-2.824 1.279-3.113 2.775z"></path><path d="M247.986 174.967c-1.472-1.327-2.172-3.33-1.954-5.261.048-.483-.676-.458-.748 0-.266 2.172.603 4.441 2.244 5.865 1.689 1.448 4.079 1.978 6.226 1.375.459-.121.266-.845-.193-.724-.096.024-.193-.024-.313 0s-.242 0-.338 0c-1.714.314-3.572-.072-4.924-1.255zm55.505-12.477l.097 1.038c.627-.145 1.279-.266 1.93-.193 1.665.169 3.186 1.013 4.224 2.365 1.062 1.351 1.544 3.041 1.351 4.778-.338 3.258-3.017 5.696-6.106 5.792 1.569.097 3.162-.241 4.344-1.303 1.472-1.327 2.172-3.306 1.955-5.261-.048-.483.676-.459.748 0 .266 2.172-.603 4.44-2.244 5.864-1.689 1.448-4.079 1.979-6.227 1.376-.458-.121-.265-.845.193-.724.097.024.194-.024.314 0-.362-.048-.676-.217-1.038-.338l-.313 1.231c.434.121.82.362 1.303.41l.772.048c3.862 0 7.192-2.992 7.602-6.998.218-2.076-.362-4.103-1.641-5.72s-3.089-2.631-5.116-2.848c-.266-.024-.531-.048-.797-.048s-.53.121-.796.145c-.096.289-.29.458-.555.386zm4.536 6.516c.218 1.158-.434 2.389-1.472 2.92-.41.217-.048.869.386.652 1.328-.7 2.1-2.293 1.81-3.765-.289-1.496-1.641-2.607-3.113-2.775-.483-.049-.458.699 0 .748 1.159.12 2.172 1.062 2.389 2.22z"></path><path d="M303.758 176.222c-.459-.121-.652.579-.193.724 2.148.603 4.537.073 6.226-1.375 1.666-1.424 2.51-3.717 2.245-5.865-.048-.458-.797-.483-.748 0 .241 1.955-.483 3.958-1.955 5.261-1.183 1.062-2.776 1.4-4.344 1.303-.314-.024-.628.049-.941-.024-.073-.024-.193 0-.29-.024zm-35.285 14.673c1.424.507 2.824 1.135 4.344 1.376l1.231.169a4.22 4.22 0 0 1 .193.024l.58.048c1.158.121 2.389.169 3.644.169h.193l3.861-.169.579-.048c.073 0 .145-.024.29-.048l1.158-.169c3.355-.531 6.348-1.907 9.075-3.62.434-.266.82-.579 1.23-.869.942-.676 2.028-1.207 2.848-2.003 2.389-2.365 4.031-5.261 5.044-8.64.121-.41.217-.821.314-1.231.82-3.427 1.062-7.312.603-11.801 0-.097-.048-.41-.048-.603l-.097-1.038-1.327-.411.193 2.173c.941 9.219-.869 15.952-5.575 20.634-3.209 3.185-7.626 5.357-12.453 6.154-.362.072-.748.12-1.11.169l.073.651-.314-.603-.579.048c-1.135.121-2.293.169-3.524.169-.145-.024-.265 0-.41 0-1.207 0-2.389-.048-3.524-.169l-.579-.048-.072.652-.169-.676a20.89 20.89 0 0 1-1.11-.169c-4.827-.772-9.244-2.968-12.453-6.154-4.706-4.658-6.54-11.415-5.575-20.634.024-.338.121-1.255.217-2.365l-1.327.337v.073c-.049.579-.073.941-.121 1.279-.024.169-.048.483-.048.579-.459 4.489-.217 8.374.603 11.801.097.411.193.845.314 1.231 1.013 3.379 2.655 6.275 5.044 8.64 2.075 2.051 4.706 3.548 7.554 4.706.386.169.82.241 1.23.386zm33.039-37.093l.555 7.023.241.072-.096-1.665c-.025-.217.169-.362.362-.362.217 0 .362.169.362.362l.12 1.907.338.096-.555-7.095c-.483-.048-.893-.121-1.327-.338zm-46.383-9.364c-.265 5.84-.772 12.574-1.158 16.58l1.424-.386 1.037-15.422c-.41-.265-.796-.507-1.303-.772zm-.145 15.421c0 .386-.772.386-.651 0 .12-2.968.386-5.961.507-8.929.12-.386.772-.386.772 0l-.628 8.929zm25.194 14.746c.458.072.676-.652.193-.724-2.003-.265-3.33-2.051-3.741-3.934-.531-2.461.483-4.995 1.352-7.24.169-.434-.555-.627-.724-.193-.966 2.486-2.003 5.261-1.279 7.964.555 1.979 2.075 3.837 4.199 4.127zm-15.663-16.821l.217-.338c.025-.024.073-.097.121-.169.024-.024.121-.121.145-.169l.29-.289c.096-.097.168-.169.265-.242.024-.024.072-.048.097-.072a5.5 5.5 0 0 1 .627-.41l.314-.169c.024 0 .048-.025.096-.049a3.39 3.39 0 0 1 .7-.217l.386-.096s.049 0 .073-.025c.265-.024.506-.048.772-.024.772.024 1.52-.7 1.472-1.472-.048-.82-.652-1.448-1.472-1.472-2.679-.072-5.309 1.424-6.661 3.741-.386.675-.169 1.641.531 2.027.724.338 1.617.145 2.027-.555zm24.207-2.003l.749.024c-.049 0-.025 0-.097-.024.024 0 .072 0 .097.024h.024c.072 0 .12.024.096.024l.338.073c.241.048.483.144.7.217-.024-.024 0 0-.072-.024.024.024.048.024.072.024h.024c.024 0 .024 0 .024.024h.024c.121.048.242.121.362.193a5.09 5.09 0 0 1 .604.386c.024.024.241.193.048.024-.193-.145 0 0 .048.048a2.67 2.67 0 0 1 .266.242l.289.289c.049.049.145.145.193.218.025.048.073.096.097.144l.217.338c.386.676 1.352.966 2.027.531s.942-1.303.531-2.027c-1.351-2.317-3.982-3.813-6.661-3.741-.772.024-1.52.676-1.472 1.472.024.821.652 1.545 1.472 1.521z"></path><path d="M289.495 155.805c-.025 0-.025 0 0 0 .049 0 .098.024.098.024h-.049c-.025 0-.049 0-.049-.024zm1.157.338c.147.073.147.073.074.024-.049-.024-.049-.024-.074-.024zm-4.969 22.661c1.086-.579 1.858-1.689 2.051-2.872.024-.193-.048-.386-.265-.458-.169-.048-.435.072-.459.265-.169 1.014-.748 1.907-1.641 2.414-.965.555-2.196.531-3.162 0-.41-.242-.796.41-.362.651 1.159.604 2.631.652 3.838 0zm-16.969-20.248c-1.037 0-1.81.917-1.81 1.955s.773 1.955 1.81 1.955c1.159 0 1.955-.917 1.955-1.955s-.772-1.955-1.955-1.955zm-.893 3.114c-.265 0-.386-.121-.386-.266 0-.265.121-.386.386-.386.121 0 .266.121.266.386-.024.145-.145.266-.266.266zm21.628-3.114c-1.038 0-1.81.917-1.81 1.955s.772 1.955 1.81 1.955a1.93 1.93 0 0 0 1.955-1.955c0-1.038-.773-1.955-1.955-1.955zm-.893 3.114c-.266 0-.386-.121-.386-.266a.33.33 0 0 1 .386-.386c.12 0 .265.121.265.386 0 .145-.145.266-.265.266zm-33.526-1.859l.603-8.833c.024-.482-.7-.482-.748 0l-.603 8.833c-.024.459.724.459.748 0zm48.03 1.303l-.121-1.906c0-.193-.169-.386-.362-.362-.193 0-.386.169-.362.362l.096 1.665.749.241zm2.941-15.59c-1.786-1.906-5.55-4.537-10.474-7.264 1.11 1.038 1.931 2.486 2.317 3.982.628 2.437.507 4.996 1.014 7.433.265 1.255.7 2.51 1.593 3.427.289.314.699.483 1.086.676.434.217.844.314 1.327.338.362.024.724.12 1.062 0 1.4-.507 2.051-2.003 2.317-3.5.048-.265.072-.531.096-.772.048-.483-.024-.965-.024-1.448 0-.531.048-1.062-.024-1.593-.072-.434-.217-.869-.29-1.279zm-49.595-.314c1.4.7 2.848 1.255 4.417 1.424 5.02.555 10.401-2.341 12.187-7.071 1.183 3.234 5.141 5.116 8.399 3.982 2.172-.748 3.789-2.558 5.502-4.103 1.714-1.52 3.886-2.871 6.13-2.509-2.582-1.328-5.406-2.655-8.447-3.934-8.181-3.379-15.421-5.672-20.224-6.54-1.665.627-3.354.989-5.188.337-.121-.048-.193-.168-.314-.217-.024-.024-.048-.048-.072-.048-2.583-1.086-4.441-3.33-5.262-5.985-.482-1.593-.699-3.234-.917-4.875-1.954 2.968-3.933 6.492-4.609 10.015-.797 4.079-.483 8.423 1.279 12.212 1.255 2.703 3.379 4.996 5.913 6.588.386.242.796.507 1.206.724z"></path></g><g class="text-warning" fill="currentColor"><path d="M288.649 127.907c.072-.145.241-.218.434-.145a120.75 120.75 0 0 1 12.188 5.961l5.912 3.547c.966.628 1.883 1.304 2.679 2.1l.193-2.365c.459-13.901-10.474-25.509-24.375-25.992-8.326-.265-15.856 3.548-20.537 9.629 6.492.917 15.3 3.862 23.506 7.265z"></path><path d="M258.797 126.555c.073-.072.266-.096.362-.145.169-.096.338-.193.58-.241.193-.048.482-.048.724-.072.337-.024.699-.024 1.134 0h.217c.145 0 .386.072.531.096.579.048 1.303.193 2.003.314 4.803.845 12.043 3.137 20.224 6.54 3.041 1.255 5.865 2.582 8.447 3.934.869.434 1.665.893 2.461 1.327 4.924 2.727 8.689 5.334 10.474 7.264.942.99 1.376 1.811 1.183 2.341v.025c.917-.869 2.751-2.969 4.006-6.034.121-.314.048-.676-.169-1.086.024.29-.313.507-.507.217-1.11-1.786-3.089-2.823-4.826-3.909-1.786-1.11-3.572-2.172-5.406-3.186-3.717-2.051-7.554-3.91-11.488-5.575-.193-.072-.193-.241-.12-.386-8.182-3.427-16.991-6.347-23.507-7.264-1.448-.241-2.751-.338-3.837-.29 0-.072-3.33 3.548-2.486 6.13z"></path></g><path class="text-info" d="M307.161 137.27l-5.913-3.547c-3.957-2.221-8.012-4.199-12.187-5.961-.193-.073-.362.024-.434.145-.073.144-.073.313.12.386 3.91 1.665 7.747 3.499 11.488 5.575a109.27 109.27 0 0 1 5.406 3.185c1.737 1.086 3.716 2.124 4.826 3.91.194.289.531.072.507-.217 0-.049.049-.073.024-.097-.313-.507-.748-.893-1.158-1.279-.796-.796-1.713-1.496-2.679-2.1z" fill="currentColor"></path><g class="text-warning" fill="currentColor"><path d="M306.147 174.364a.97.97 0 0 0-.965-.966.97.97 0 0 0-.965.966.97.97 0 0 0 .965.965.97.97 0 0 0 .965-.965zm-15.661-26.306c-5.044 0-9.074 4.803-9.074 10.764-1.303-.386-2.582-.652-4.006-.386-.507.12-.917.386-1.424.506v-.12c0-5.961-4.151-10.764-9.195-10.764-4.923 0-8.93 4.803-8.93 10.764 0 .386.121.772.121 1.158l.266-.121a.71.71 0 0 1 .651.387c.121.386-.121.651-.386.772l-.265.121c.917 4.802 4.271 8.543 8.543 8.543 4.923 0 8.809-4.537 9.074-10.378 1.81-.772 3.765-.651 5.575-.12.265 5.84 4.151 10.498 9.074 10.498 4.272 0 7.771-3.765 8.688-8.543l-.386-.121c-.265-.121-.386-.386-.265-.772 0-.266.386-.387.651-.387l.266.121c.12-.386.12-.772.12-1.158-.024-5.961-4.175-10.764-9.098-10.764zm-23.699 19.838c-3.765 0-6.999-4.006-6.999-9.074 0-5.044 3.234-9.075 6.999-9.075 4.006 0 7.264 4.007 7.264 9.075-.024 5.044-3.258 9.074-7.264 9.074zm23.699 0c-3.885 0-7.119-4.006-7.119-9.074 0-5.044 3.234-9.075 7.119-9.075s7.119 4.007 7.119 9.075c.025 5.044-3.233 9.074-7.119 9.074z"></path><path class="text-info" d="M302.31 160.873l-.241-.072-2.582-.797-.29-.096c-.289-.097-.603.072-.676.386-.096.314.073.651.362.748l.387.121 2.92.917 1.327.41c.241.072.459-.097.579-.338.024-.048.097 0 .097-.048.096-.314-.073-.652-.362-.748l-.435-.145-.337-.097-.749-.241zm-48.582 1.376l.145-.049 1.327-.337 2.968-.749.338-.072c.29-.097.459-.434.362-.748s-.386-.483-.675-.386l-.218.048-2.654.676-1.328.338-.627.169c-.29.096-.459.434-.362.748.072.289.362.41.627.362.024 0 .024.048.049.024l.048-.024z"></path></g><path class="text-info" d="M281.678 414.976h-1.424l-1.159-12.694c-.12 0-.386-.121-.772-.386v.12l-1.303 12.96h-1.159l1.304-14.118a.87.87 0 0 1 .265-.507h.386.266c2.075 1.038 2.196 1.158 2.341 1.545l1.255 13.08zm-3.04-194.952c9.677 0 18.534-3.113 24.399-8.567l11.656 3.886.218-1.304-11.85-3.958c-.217-.096-.483-.024-.652.145-1.52 1.448-3.258 2.703-5.188 3.813-.387.218-.845.387-1.255.58-4.972 2.582-10.933 4.102-17.352 4.102-6.01 0-11.729-1.424-16.556-3.765-.386-.193-.821-.362-1.207-.555-2.22-1.206-4.296-2.534-5.961-4.175-.169-.169-.434-.241-.651-.145l-12.743 4.248.145 1.327 12.646-4.223c5.816 5.478 14.649 8.591 24.351 8.591zm-19.479 162.034c-.314.41-.555.844-.966 1.182 9.968 1.255 20.828 2.558 30.023 2.558 6.781 0 12.163-.724 16.724-1.592v-1.328c-4.537.869-9.919 1.617-16.7 1.617-8.881.024-19.355-1.207-29.081-2.437z" fill="currentColor"></path><path d="M304.869 414.976v-30.698-3.62c6.468-1.689 13.081-2.727 19.693-2.848 2.993-.121 5.696-.386 8.423-.651L339.597 415h-34.728v-.024zm9.845-199.633c-2.872 17.593-5.019 32.17-6.612 44.55-2.148 17.376-3.186 30.891-3.596 43.923l28.767-5.285 3.934-18.341 6.226-28.985 6.251-29.081.555-2.582c-8.061-4.682-20.031-8.544-34.414-10.933l-.869 5.43c-.097.435-.169.869-.242 1.304zm-94.65 64.798l8.061 37.673 19.572-3.596c0-17.014-.41-33.015-1.979-54.808l-4.054-43.754-.145-1.327-.579-5.575c-14.191 2.413-25.944 6.202-33.932 10.812l.748 3.451 6.082 28.14 6.226 28.984zm27.272 134.835h-29.66l5.575-31.736 1.81-.265c1.954 1.158 3.885 2.341 5.961 3.113 1.81.772 4.151 1.689 6.467 1.689h.266c2.462 0 4.803-.917 6.226-2.582.917-1.158 1.424-2.727 1.304-4.151l1.954 1.424.097 32.508z" fill="currentColor" style="color: var(--fn-info-border-subtle)"></path><g class="text-info" fill="currentColor"><path d="M368.508 374.166l-.048-.652c-.073-.748-.217-1.568-.362-2.413l-.242-1.279c-.024-.145-.096-.338-.12-.483-3.234 1.328-6.782 2.462-10.547 3.451 4.007 5.068 7.651 7.916 9.75 6.975.893-.41 1.424-1.472 1.593-3.041 0-.072 0-.121.024-.193a19.77 19.77 0 0 0-.048-2.365z"></path><path d="M367.738 369.339l-.338-1.255c-6.83 2.824-14.866 4.996-24.327 6.227l-.241.048-1.689.314-1.159.169-4.078.579c-3.355.458-7.313.941-11.343 1.038a92.51 92.51 0 0 0-23.386 3.668l-.603.169c-2.196.651-4.441 1.327-6.685 1.086-2.172-.217-4.634-1.69-4.947-3.958-.459-3.282 3.547-5.671 4.802-6.323 1.11-.579 2.317-.917 3.5-1.376l-5.334.99c-2.003 1.303-4.682 3.62-4.223 6.902.41 2.968 3.378 4.803 6.105 5.092.362.048.724.048 1.062.048 2.1 0 4.151-.603 6.13-1.182l.604-.169c1.11-.314 2.244-.483 3.378-.748 6.444-1.617 13.032-2.679 19.693-2.872 2.92-.072 5.696-.362 8.326-.676l3.138-.386 4.102-.579 1.159-.169c.579-.072 1.158-.193 1.762-.314l.193-.048c5.044-.652 9.581-1.641 13.877-2.8 3.764-1.013 7.336-2.147 10.546-3.451l-.024-.024z"></path></g><path d="M363.73 357.538c1.617 3.813 2.872 7.385 3.693 10.546.096.41.241.845.338 1.255.048.169.048.338.096.507.097.458.169.869.242 1.279.169.845.289 1.641.362 2.413.024.218.024.435.048.652.072.893.072 1.665 0 2.365 0 .073 0 .121-.024.193-.121 1.086-.338 2.027-.772 2.607 11.149-6.806 20.489-16.387 27.15-27.513l-31.133 5.696zm70.251-77.493l-6.467 1.182c-.773.145-1.4.579-2.1.845l11.295 61.613c.772-.024 1.496.193 2.268.048l6.468-1.182c7.892-1.448 13.129-9.026 11.681-16.918l-6.227-33.908c-1.448-7.891-9.002-13.128-16.918-11.68z" fill="currentColor" style="color: var(--fn-info-border-subtle)"></path><path class="text-info" d="M80.645 361.93c.193-.145.459-.193.7-.048.217.12.362.362.338.627v.266l29.949-22.589c.387-.29.845-.483 1.328-.579l1.617-.29c-.555-.121-1.086-.314-1.69-.362l35.549-6.516-.121-.652-35.572 6.516a4.55 4.55 0 0 0-1.883.821l-36.9 27.826c-.845.627-1.544 1.4-2.196 2.196.652-.796 1.352-1.545 2.196-2.196l6.685-5.02zm-10.378 20.659c-.121-.242-.169-.556-.265-.797.121.241.145.555.265.797zm1.205-13.153c-2.003 2.654-2.848 6.009-2.317 9.388-.507-3.379.338-6.734 2.317-9.388zm54.302 31.084l-1.569.289c-.483.097-.989.049-1.472-.072l-36.007-10.498c.048.072.048.169.097.241a.62.62 0 0 1-.097.7c-.121.145-.314.217-.483.217-.072 0-.121 0-.193-.024l-8.036-2.341 44.382 12.912a4.42 4.42 0 0 0 1.255.193c.266 0 .531-.025.796-.073l40.497-7.433c.362-.072.579-.41.531-.748l-41.172 7.578c.555-.266.989-.628 1.472-.941z" fill="currentColor"></path><g class="text-warning" fill="currentColor"><path d="M155.407 350.66l-38.469 7.047c-.072.048-.145.072-.217.12 5.985-.41 11.511 4.007 12.694 10.378 1.158 6.371-2.438 12.453-8.181 14.19.072 0 .169.024.241.024l51.284-9.412c-7.071-6.395-13.056-13.925-17.352-22.347zm59.708-10.957l14.022 7.192 10.957 5.647c4.006-1.786 7.698-3.089 11.27-4.006 2.341-.603 4.851-1.086 7.361-.603 2.823.53 5.116 2.389 5.792 4.73.362 1.231.193 2.437-.193 3.547l156.241-28.646-4.537-24.713-200.913 36.852z"></path><path d="M333.25 298.531l-28.767 5.285-56.787 10.426-19.572 3.596-26.981 4.947c2.534 3.765 5.792 7.313 9.412 10.45h.048c1.207.555 1.689 2.365 1.593 4.948l2.896 1.544 200.936-36.852-3.451-18.872-10.305 1.882-49.619 9.099-19.403 3.547zm-210.206 48.412c.797 4.32-1.786 8.592-6.081 10.788l38.469-7.047c-.193-.362-.435-.7-.628-1.062-2.727-5.382-4.875-11.198-6.347-17.159l-35.549 6.516c.604.048 1.11.241 1.69.362 4.271.821 7.698 3.62 8.446 7.602zm61.254 32.774c-.073-.7-.049-1.497 0-2.366-.049.869-.049 1.666 0 2.366zm.769-7.168c-.048.169-.048.314-.096.458.024-.144.072-.313.12-.458h-.024zm-.698 4.151c.073-.748.217-1.569.362-2.389l-.362 2.389zm236.221-49.112l-156.241 28.647c-.579 1.761-1.786 3.33-3.185 4.295-1.81 1.279-3.958 1.907-6.01 2.365l7.361 2.655.628.193c1.013.29 2.051.604 3.016 1.062.724.338 1.497.628 2.269.917 1.158.435 2.389.893 3.499 1.521 1.062.579 3.234 2.123 3.765 4.416l16.194-2.968 5.333-.99 66.488-12.187 31.133-5.72 29.177-5.358-3.427-18.848zm-197.607 54.253c-.942-.628-1.545-1.304-2.148-1.955l-.024-.024c-9.678-.387-17.956-1.762-25.244-3.789-3.982 4.995-7.578 7.795-9.654 6.854-.893-.411-1.424-1.473-1.593-3.041.121 1.086.338 2.027.773 2.606-4.441-2.703-8.495-5.985-12.333-9.46l-51.283 9.412c4.802.531 8.736 3.596 9.532 7.916.724 3.982-1.496 7.843-5.213 10.16-.506.314-.917.676-1.472.941l41.148-7.554 57.824-10.594 1.786-.338c-.7-.41-1.448-.676-2.099-1.134z"></path></g><g class="text-info" fill="currentColor"><path d="M86.677 390.239c-1.81-3.886-3.379-8.543-4.272-13.346-.772-4.923-1.038-9.726-.772-14.118.121 0 .121-.121.121-.121v-.121a.71.71 0 0 0-.386-.651.63.63 0 0 0-.772.121l-6.613 4.923c-.917.651-1.544 1.424-2.196 2.196-.121.121-.265.265-.265.386-2.076 2.582-2.848 5.961-2.341 9.34v.386c.121.917.507 1.81.772 2.582.121.266.121.507.266.773.265.265.386.506.652.772 1.544 2.727 4.006 4.802 7.119 5.695l8.037 2.341h.265c.121 0 .265 0 .386-.265.266-.121.266-.386.121-.652.024-.12.024-.12-.121-.241zm-8.278-2.462c-4.151-1.158-7.119-4.537-7.892-8.688-.772-4.271.772-8.543 4.272-11.005l5.575-4.271c-.266 4.151 0 8.808.917 13.225.772 4.537 2.075 8.929 3.765 12.694l-6.637-1.955zm346.967-105.729v-.386c-.121-.386-.386-.507-.773-.507l-11.535 2.076c-.121 0-.266.12-.387.265-.12.121-.12.386-.12.507l3.499 18.921 4.537 24.737 3.5 18.775c0 .266.12.387.265.507h.386.121l11.391-2.075c.386 0 .652-.386.507-.773v-.386l-11.391-61.661zm-.121 63.616l-11.27-61.275 10.232-1.81 11.15 61.154-10.112 1.931zm-214.616-12.453h-.048l.072.073c-1.086-.507-2.679.12-4.489 1.496l6.058 3.403c.072-2.607-.387-4.417-1.593-4.972zm-25.656 39.796l-.241 1.304-.362 2.389-.048.652c-.073.868-.073 1.689 0 2.365 0 .072 0 .12.024.193.169 1.568.7 2.63 1.593 3.041 2.075.941 5.671-1.859 9.653-6.854-3.74-1.038-7.288-2.172-10.474-3.548l-.145.458z"></path><path d="M264.517 352.687c-.676-2.341-2.944-4.199-5.792-4.73-2.51-.459-5.02.024-7.361.603-3.572.893-7.264 2.196-11.27 4.006-2.679-1.496-6.541-3.427-10.957-5.647l-14.022-7.192-2.896-1.544c-2.075-1.111-4.078-2.245-6.057-3.403-.362.265-.724.531-1.11.869 7.529 4.368 16.097 8.712 23.53 12.428l11.198 5.768c.169.097.386.097.579.024 4.055-1.81 7.771-3.161 11.367-4.054 2.196-.555 4.561-1.038 6.806-.579 2.365.434 4.247 1.93 4.778 3.837.748 2.534-.965 5.116-2.872 6.42-2.22 1.544-5.044 2.099-7.554 2.582-.289.048-.482.289-.53.579-.025.29.12.555.386.676 3.282 1.424 6.274 2.558 9.412 3.523l.627.193c.966.29 1.955.58 2.824.99.772.338 1.569.651 2.365.965 1.134.435 2.293.869 3.33 1.448s3.452 2.172 3.307 4.441c-.145 1.762-1.4 3.499-3.186 4.32-1.931.893-4.489.82-6.975-.193-1.978-.797-3.74-2.052-5.43-3.355-.289-.29-.603-.555-.989-.748-.29-.169-.652-.072-.845.217s-.12.652.145.869.555.41.821.627c.917.99 1.23 2.631.651 4.007-.676 1.592-2.365 2.751-4.32 2.968-2.196.266-4.199-.627-5.502-1.376-1.714-1.013-3.162-2.389-4.634-3.837-.241-.241-.627-.241-.869-.024a.64.64 0 0 0-.096.869c1.062 1.424.869 3.692-.435 5.213-1.182 1.351-3.233 2.123-5.381 2.123-2.197-.024-4.393-.844-6.058-1.52a46.77 46.77 0 0 1-7.819-4.175c-.821-.555-1.352-1.134-1.907-1.738l-.193-.217c-.12-.121-.289-.193-.458-.217-14.698-.579-26.378-3.306-35.718-7.361l-.362 1.303h.024c3.186 1.376 6.733 2.51 10.474 3.548 7.288 2.003 15.59 3.379 25.244 3.789l.024.024c.579.652 1.182 1.328 2.148 1.955.651.434 1.4.724 2.099 1.11 1.931 1.159 3.886 2.317 5.937 3.186 1.762.748 4.103 1.593 6.541 1.641h.144c2.534 0 4.803-.941 6.203-2.558a5.91 5.91 0 0 0 1.424-4.2c.579.507 1.23.942 1.834 1.376.386.29.724.603 1.158.869 1.472.869 3.717 1.834 6.299 1.569 1.376-.169 2.558-.773 3.572-1.593.41-.338.675-.773.965-1.183.266-.362.652-.603.821-1.013.41-.942.482-1.979.313-2.921 1.135.773 2.341 1.497 3.645 2.028 2.823 1.158 5.743 1.206 8.012.169 2.172-.99 3.765-3.162 3.934-5.406.024-.459-.121-.845-.218-1.255-.53-2.269-2.678-3.813-3.764-4.417-1.135-.627-2.341-1.086-3.5-1.52-.772-.29-1.544-.579-2.268-.917-.966-.435-2.003-.748-3.017-1.062l-.627-.193a87.28 87.28 0 0 1-7.361-2.655c2.051-.458 4.175-1.11 6.009-2.365 1.376-.965 2.582-2.534 3.186-4.296.41-1.255.579-2.437.217-3.668z"></path></g><path d="M148.434 332.439c1.473 5.961 3.62 11.777 6.348 17.159.193.362.434.7.627 1.062 4.296 8.422 10.281 15.952 17.352 22.372 3.837 3.499 7.892 6.757 12.332 9.46-.458-.579-.675-1.496-.772-2.606 0-.073 0-.121-.024-.194-.048-.699-.048-1.496 0-2.365.024-.217.024-.434.048-.651.073-.748.193-1.545.362-2.389.073-.435.145-.845.242-1.304.048-.169.048-.289.096-.458.097-.41.241-.869.362-1.303 1.231-4.682 3.355-10.305 6.299-16.194 4.296-8.736 9.316-15.832 13.322-19.403.386-.338.748-.58 1.11-.869 1.81-1.376 3.379-2.003 4.489-1.497l-.073-.072c-3.62-3.137-6.902-6.661-9.412-10.45-1.424-2.124-2.679-4.32-3.475-6.588h-51.429c.049 5.188.845 10.45 2.076 15.614.048.241.072.459.12.676z" fill="currentColor" style="color: var(--fn-info-border-subtle)"></path></svg>
          </div>
      </div>
      </div>
  </main>


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


<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="{{asset('assets/js/jquery.min.js')}}"></script>


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
    if (currentSkills.length >= 15) {
        Swal.fire({
            title: 'Skill Limit Reached',
            text: 'You can only add a maximum of 5 skills.',
            icon: 'warning',
            confirmButtonText: 'OK',
        });
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

document.addEventListener('DOMContentLoaded', function () {
    @if(session('success'))
        Swal.fire('Success', '{{ session('success') }}', 'success');
    @elseif($errors->any())
        Swal.fire('Error', '{{ $errors->first() }}', 'error');
    @endif
});

</script>
