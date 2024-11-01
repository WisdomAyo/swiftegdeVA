<script src="{{asset('assets/js/jquery.min.js')}}"></script>
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

        // Create a skill tag
        const skillTag = document.createElement('span');
        skillTag.className = 'tag';
        skillTag.textContent = skill;
        skillTag.dataset.value = skill;

        // Create a remove button for the skill
        const removeButton = document.createElement('i');
        removeButton.className = 'fas fa-times';
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
<script>
// Function to handle adding new education entries
document.getElementById('addEducation').addEventListener('click', function () {
    let educationTemplate = document.getElementById('educationTemplate').innerHTML;
    let educationSection = document.getElementById('educationSection');
    educationSection.insertAdjacentHTML('beforeend', educationTemplate);

    // Change the button text after adding the first education
    if (educationSection.querySelectorAll('.education-entry').length > 1) {
        this.textContent = 'Add More Education';
    }
});

// Function to handle adding new project entries
document.getElementById('addProject').addEventListener('click', function () {
    let projectTemplate = `
        <div class="project-entry">
            <div class="form-group">
                <label>Title</label>
                <input type="text" name="project_title[]" class="form-control">
            </div>
            <div class="form-group">
                <label>Description</label>
                <textarea name="project_description[]" class="form-control"></textarea>
            </div>
            <div class="form-group">
                <label>URL</label>
                <input type="text" name="project_url[]" class="form-control">
            </div>
        </div>
    `;
    let projectSection = document.getElementById('projectSection');
    projectSection.insertAdjacentHTML('beforeend', projectTemplate);

    // Change the button text after adding the first project
    if (projectSection.querySelectorAll('.project-entry').length > 1) {
        this.textContent = 'Add More Projects';
    }
});

// Function to handle adding new language entries
document.getElementById('addLanguage').addEventListener('click', function () {
    let languageTemplate = `
        <div class="language-entry">
            <div class="form-group">
                <label>Language</label>
                <input type="text" name="language[]" class="form-control">
            </div>
        </div>
    `;
    let languageSection = document.getElementById('languageSection');
    languageSection.insertAdjacentHTML('beforeend', languageTemplate);

    // Change the button text after adding the first language
    if (languageSection.querySelectorAll('.language-entry').length > 1) {
        this.textContent = 'Add More Languages';
    }
});


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