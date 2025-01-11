<script src="{{asset('assets/js/jquery.min.js')}}"></script>










 <script>



document.getElementById('gallery-input').addEventListener('change', function (event) {
        const files = event.target.files;
        const previews = document.getElementById('gallery-previews');
        previews.innerHTML = ''; // Clear existing previews
    
        Array.from(files).forEach(file => {
            const reader = new FileReader();
            reader.onload = function (e) {
                const preview = `
                    <div class="col-md-3">
                        <img src="${e.target.result}" alt="Preview Image" class="img-fluid mb-2">
                    </div>`;
                previews.insertAdjacentHTML('beforeend', preview);
            };
            reader.readAsDataURL(file);
        });
    });
    
    // Remove existing gallery images
    function removeGalleryImage(imageId) {
        const imageDiv = document.getElementById(`gallery-image-${imageId}`);
        if (imageDiv) {
            imageDiv.remove();
        }
    }
    
    
    
    
    function toggleVideoInput() {
        const switchElement = document.getElementById('videoSwitch');
        const youtubeInput = document.getElementById('youtubeInput');
        const fileInput = document.getElementById('fileInput');
        const youtubePreview = document.getElementById('youtubePreview');
    
        if (switchElement.checked) {
            youtubeInput.style.display = 'none';
            fileInput.style.display = 'block';
            youtubePreview.style.display = 'none'; // Hide the preview when switching
        } else {
            youtubeInput.style.display = 'block';
            fileInput.style.display = 'none';
        }
    }
    
    function previewYouTubeVideo(url) {
        const youtubePreview = document.getElementById('youtubePreview');
        const iframe = youtubePreview.querySelector('iframe');
    
        // Extract the video ID from the URL
        if (url.includes('youtube.com') || url.includes('youtu.be')) {
            const videoId = url.split('v=')[1] || url.split('/').pop();
            iframe.src = `https://www.youtube.com/embed/${videoId}`;
            youtubePreview.style.display = 'block';
        } else {
            youtubePreview.style.display = 'none';
        }
    }
    
    function getYouTubeVideoId(url) {
        const regex = /(?:https?:\/\/)?(?:www\.)?(?:youtube\.com\/(?:[^\/\n\s]+\/\S+\/|(?:v|e(?:mbed)?)\/|\S*?[?&]v=)|youtu\.be\/)([a-zA-Z0-9_-]{11})/;
        const match = url.match(regex);
        return match ? match[1] : null;
    }
    
    
    function previewVideo(event) {
        const videoPreview = document.getElementById('videoPreview');
        const videoSource = document.getElementById('videoSource');
        const file = event.target.files[0];
    
        if (file) {
            const fileType = file.type;
    
            // Check if the file is a supported video type
            if (fileType.startsWith('video/')) {
                const fileURL = URL.createObjectURL(file); // Generate a preview URL
                videoSource.src = fileURL; // Set the video source
                videoPreview.style.display = 'block'; // Show the video preview
                videoPreview.querySelector('video').load(); // Reload the video to apply the source
            } else {
                alert('Please upload a valid video file.');
                videoPreview.style.display = 'none';
            }
        } else {
            videoPreview.style.display = 'none'; // Hide preview if no file is selected
        }
    }
    
    // PDF Preview
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
    
    
    document.addEventListener('DOMContentLoaded', function () {
        document.querySelectorAll('.delete-education').forEach(button => {
            button.addEventListener('click', function () {
                const id = this.dataset.id;
                fetch(`/user/education/${id}`, {
                    method: 'DELETE',
                    headers: { 'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content') },
                })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            Swal.fire('Success', data.success, 'success').then(() => location.reload());
                        }
                    })
                    .catch(err => Swal.fire('Error', err.message, 'error'));
            });
        });
    
        document.querySelectorAll('.delete-experience').forEach(button => {
            button.addEventListener('click', function () {
                const id = this.dataset.id;
                fetch(`/user/experience/${id}`, {
                    method: 'DELETE',
                    headers: { 'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content') },
                })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            Swal.fire('Success', data.success, 'success').then(() => location.reload());
                        }
                    })
                    .catch(err => Swal.fire('Error', err.message, 'error'));
            });
        });
    
        document.querySelectorAll('.delete-award').forEach(button => {
            button.addEventListener('click', function () {
                const id = this.dataset.id;
                fetch(`/user/award/${id}`, {
                    method: 'DELETE',
                    headers: { 'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content') },
                })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            Swal.fire('Success', data.success, 'success').then(() => location.reload());
                        }
                    })
                    .catch(err => Swal.fire('Error', err.message, 'error'));
            });
        });
    });
    
    
    
    
    // Disable the "End Year" field if "Currently Working" is checked.
    document.addEventListener('DOMContentLoaded', function () {
        document.querySelectorAll('.currently-working').forEach(function (checkbox) {
            checkbox.addEventListener('change', function () {
                const endYearField = this.closest('form').querySelector('.end-year');
                if (this.checked) {
                    endYearField.value = ''; // Clear the end year value
                    endYearField.disabled = true; // Disable the field
                } else {
                    endYearField.disabled = false; // Enable the field
                }
            });
        });
    });
    
    
    // // Function to toggle visibility based on compensation type
    
    
    document.addEventListener('DOMContentLoaded', function () {
        const compensationType = document.getElementById('compensation-type');
        const minAmountContainer = document.getElementById('min-amount-container');
        const maxAmountContainer = document.getElementById('max-amount-container');
    
        // Function to toggle visibility based on compensation type
        function toggleCompensationFields() {
            if (compensationType.value === 'Salary') {
                minAmountContainer.style.display = 'block';
                maxAmountContainer.style.display = 'block';
            } else {
                minAmountContainer.style.display = 'none';
                maxAmountContainer.style.display = 'none';
            }
        }
    
        // Initialize on page load
        toggleCompensationFields();
    
        // Add event listener to compensation dropdown
        compensationType.addEventListener('change', toggleCompensationFields);
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
    
    
    
    
    
    
    
    
    document.addEventListener('DOMContentLoaded', function () {
        const hiddenInput = document.getElementById('skills-hidden');
        const inputContainer = document.getElementById('input-container');
    
        // Pre-fill existing skills
        const existingSkills = hiddenInput.value.split(', ');
        existingSkills.forEach(skill => addSkill(skill));
    
        function addSkill(skill) {
            const skillTag = document.createElement('span');
            skillTag.className = 'tag';
            skillTag.textContent = skill;
            skillTag.dataset.value = skill;
    
            const removeButton = document.createElement('i');
            removeButton.className = 'fa fa-times-circle';
            removeButton.onclick = function () {
                inputContainer.removeChild(skillTag);
                updateHiddenInput();
            };
    
            skillTag.appendChild(removeButton);
            inputContainer.insertBefore(skillTag, document.getElementById('skill-input'));
            updateHiddenInput();
        }
    
        function updateHiddenInput() {
            const skills = [...document.querySelectorAll('.tag')].map(tag => tag.dataset.value);
            hiddenInput.value = skills.join(', ');
        }
    });
    


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




tinymce.init({
        selector: '#texteditor',
        plugins: 'wordcount',
        toolbar: 'undo redo | bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent',
        content_style: `
            body {
                font-family: Arial, sans-serif;
                font-size: 16px;
                line-height: 1.5;
                color: #333;
                background-color: #f8f9fa;
                padding: 10px;
            }
            p {
                margin: 0 0 1em;
            }
        `,
        setup: function (editor) {
            editor.on('keyup', function () {
                const charCount = editor.plugins.wordcount.getCount();
                document.getElementById('char-count').textContent = `${charCount}/1500 characters`;
            });
        }
    });






    document.getElementById('gallery-input').addEventListener('change', function (event) {
    const files = event.target.files;
    const previews = document.getElementById('gallery-previews');
    previews.innerHTML = ''; // Clear existing previews

    Array.from(files).forEach(file => {
        const reader = new FileReader();
        reader.onload = function (e) {
            const preview = `
                <div class="col-md-3">
                    <img src="${e.target.result}" alt="Preview Image" class="img-fluid mb-2">
                </div>`;
            previews.insertAdjacentHTML('beforeend', preview);
        };
        reader.readAsDataURL(file);
    });
});

// Remove existing gallery images
function removeGalleryImage(imageId) {
    const imageDiv = document.getElementById(`gallery-image-${imageId}`);
    if (imageDiv) {
        imageDiv.remove();
    }
}






// PDF Preview
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





function toggleVideoInput() {
    const switchElement = document.getElementById('videoSwitch');
    const youtubeInput = document.getElementById('youtubeInput');
    const fileInput = document.getElementById('fileInput');
    const youtubePreview = document.getElementById('youtubePreview');

    if (switchElement.checked) {
        youtubeInput.style.display = 'none';
        fileInput.style.display = 'block';
        youtubePreview.style.display = 'none'; // Hide the preview when switching
    } else {
        youtubeInput.style.display = 'block';
        fileInput.style.display = 'none';
    }
}

function previewYouTubeVideo(url) {
    const youtubePreview = document.getElementById('youtubePreview');
    const iframe = youtubePreview.querySelector('iframe');

    // Extract the video ID from the URL
    if (url.includes('youtube.com') || url.includes('youtu.be')) {
        const videoId = url.split('v=')[1] || url.split('/').pop();
        iframe.src = `https://www.youtube.com/embed/${videoId}`;
        youtubePreview.style.display = 'block';
    } else {
        youtubePreview.style.display = 'none';
    }
}

function getYouTubeVideoId(url) {
    const regex = /(?:https?:\/\/)?(?:www\.)?(?:youtube\.com\/(?:[^\/\n\s]+\/\S+\/|(?:v|e(?:mbed)?)\/|\S*?[?&]v=)|youtu\.be\/)([a-zA-Z0-9_-]{11})/;
    const match = url.match(regex);
    return match ? match[1] : null;
}


function previewVideo(event) {
    const videoPreview = document.getElementById('videoPreview');
    const videoSource = document.getElementById('videoSource');
    const file = event.target.files[0];

    if (file) {
        const fileType = file.type;

        // Check if the file is a supported video type
        if (fileType.startsWith('video/')) {
            const fileURL = URL.createObjectURL(file); // Generate a preview URL
            videoSource.src = fileURL; // Set the video source
            videoPreview.style.display = 'block'; // Show the video preview
            videoPreview.querySelector('video').load(); // Reload the video to apply the source
        } else {
            alert('Please upload a valid video file.');
            videoPreview.style.display = 'none';
        }
    } else {
        videoPreview.style.display = 'none'; // Hide preview if no file is selected
    }
}







// Disable the "End Year" field if "Currently Working" is checked.
document.addEventListener('DOMContentLoaded', function () {
    document.querySelectorAll('.currently-working').forEach(function (checkbox) {
        checkbox.addEventListener('change', function () {
            const endYearField = this.closest('form').querySelector('.end-year');
            if (this.checked) {
                endYearField.value = ''; // Clear the end year value
                endYearField.disabled = true; // Disable the field
            } else {
                endYearField.disabled = false; // Enable the field
            }
        });
    });
});






// SweetAlert Notification
document.addEventListener('DOMContentLoaded', function () {
    @if($errors->any())
        Swal.fire({
            title: 'Validation Error',
            text: '{{ $errors->first() }}',
            icon: 'error',
            confirmButtonText: 'OK'
        });
    @endif
});






        document.addEventListener('DOMContentLoaded', (event) => {
            const textarea = document.getElementById('service_description');
            const errorDiv = document.getElementById('description-error');
            const charCountDiv = document.getElementById('char-count');

            textarea.focus();
            textarea.setSelectionRange(0, 0);

            // Initialize character count
            charCountDiv.textContent = `${textarea.value.length}/1500 characters`;

            textarea.addEventListener('input', () => {
                const charCount = textarea.value.length;
                charCountDiv.textContent = `${charCount}/1500 characters`;

                if (charCount < 300) {
                    errorDiv.style.display = 'block';
                } else {
                    errorDiv.style.display = 'none';
                }

                if (charCount > 1500) {
                    textarea.value = textarea.value.slice(0, 1500);
                    charCountDiv.textContent = '1500/1500 characters';
                }
            });
        });














// // Function to handle adding new education entries
// document.getElementById('addEducation').addEventListener('click', function () {
//     let educationTemplate = document.getElementById('educationTemplate').innerHTML;
//     let educationSection = document.getElementById('educationSection');
//     educationSection.insertAdjacentHTML('beforeend', educationTemplate);

//     // Change the button text after adding the first education
//     if (educationSection.querySelectorAll('.education-entry').length > 1) {
//         this.textContent = 'Add More Education';
//     }
// });

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




// Fetch states when country is selected


$(document).ready(function () {
    function reinitializeSelect(selector) {
        const element = document.querySelector(selector);
        if (element) {
            // Reinitialize Choices.js (or other select library)
            if (typeof Choices !== 'undefined') {
                new Choices(element, {
                    searchEnabled: true,
                    classNames: {
                        containerInner: 'form-select form-select-lg',
                    },
                });
            }
        }
    }



    // Fetch states when country is selected
    $('select[name=country_id]').change(function () {
        const countryId = $(this).val();
        const url = `/onboarding/country/${countryId}/states`;

        if (countryId) {
            $.ajax({
                url: url,
                type: "GET",
                dataType: "json",
                success: function (data) {
                    const stateSelect = $('select[name="state_id"]');
                    stateSelect.empty().append('<option value="">Select State</option>');
                    data.forEach(function (state) {
                        stateSelect.append(`<option value="${state.id}">${state.name}</option>`);
                    });

                    // Reinitialize the state dropdown
                    reinitializeSelect('#state');
                },
                error: function () {
                    Swal.fire('Error', 'Unable to fetch states. Please try again.', 'error');
                },
            });
        } else {
            $('select[name="state_id"]').empty().append('<option value="">Select State</option>');
            $('select[name="city_id"]').empty().append('<option value="">Select City</option>');
        }
    });

    // Fetch cities when a state is selected
    $('select[name=state_id]').change(function () {
        const stateId = $(this).val();
        const url = `/onboarding/state/${stateId}/cities`;

        if (stateId) {
            $.ajax({
                url: url,
                type: "GET",
                dataType: "json",
                success: function (data) {
                    const citySelect = $('select[name="city_id"]');
                    citySelect.empty().append('<option value="">Select City</option>');
                    data.forEach(function (city) {
                        citySelect.append(`<option value="${city.id}">${city.name}</option>`);
                    });

                    // Reinitialize the city dropdown
                    reinitializeSelect('#city');
                },
                error: function () {
                    Swal.fire('Error', 'Unable to fetch cities. Please try again.', 'error');
                },
            });
        } else {
            $('select[name="city_id"]').empty().append('<option value="">Select City</option>');
        }
    });
});







function addSocialMediaRow() {
    const index = document.querySelectorAll('.social-group').length;
    const newRow = `
        <div class="social-group" data-index="${index}">
            <div class="row row-cols-1 row-cols-sm-2 g-3 g-sm-4 pb-3 pb-sm-4 mb-xl-2">
                <div class="col-md-3">
                    <label>Platform</label>
                    <input type="text" name="social_media[${index}][platform]" class="form-control form-control-lg" placeholder="Enter platform">
                </div>
                <div class="col-md-3">
                    <label>Followers</label>
                    <input type="number" name="social_media[${index}][followers]" class="form-control form-control-lg" placeholder="Enter followers">
                </div>
                <div class="col-md-4">
                    <label>Handle</label>
                    <input type="text" name="social_media[${index}][handle]" class="form-control form-control-lg" placeholder="Enter handle">
                </div>
                <div class="col-md-2">
                    <button type="button" class="remove-platform btn btn-danger mt-4 btn-lg" onclick="removeSocialMediaRow(this)">
                        <i class="fi-trash"></i> Remove
                    </button>
                </div>
            </div>
        </div>
    `;
    document.getElementById('socialMediaContainer').insertAdjacentHTML('beforeend', newRow);
}

function removeSocialMediaRow(button) {
    button.closest('.social-group').remove();
}



</script>
