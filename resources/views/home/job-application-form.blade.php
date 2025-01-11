@extends('home.layouts.content')
@section('content')
    <!-- Start Page Banner Area -->
    <div class="page-banner-area item-bg-three">
        <div class="d-table">
            <div class="d-table-cell">
                <div class="container">
                    <div class="page-banner-content">
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Page Banner Area -->

    <!-- Start About Area -->
    <div class="about-area pt-100 center post-a-new-job-box">
        <div class="container col-lg-8">

            @if(session('response'))

                <div class="notification-alert alert alert-success alert-dismissible fade show" role="alert">
                    {{session('response')}}
                    <button type="button" class="btn btn-primary" data-bs-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
            @endif

            <div class="post-a-new-job-box mb-5 mt-5 pb-5 container mb-4">
                
                    @include('shared.util.job_form')
            </div>
        </div>
    </div>
    <!-- End About Area -->



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
        Swal.fire({
            title: 'Skill Limit Reached',
            text: 'You can only add a maximum of 5 skills.',
            icon: 'warning',
            confirmButtonText: 'OK',
        });
        return; 
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



function previewPDF(event) {
    const pdfPreview = document.getElementById('pdfPreview');
    const iframe = pdfPreview.querySelector('iframe');

    const file = event.target.files[0];
    if (file) {
        const fileURL = URL.createObjectURL(file); // Create a URL for the PDF file
        iframe.src = fileURL; // Set the iframe source
        pdfPreview.style.display = 'block'; // Show the PDF preview
    } else {
        pdfPreview.style.display = 'none'; // Hide preview if no file is selected
    }
}






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
