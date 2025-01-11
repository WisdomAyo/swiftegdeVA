@extends('home.layouts.content')
@section('content')


<div class="container">
    <div class="onboarding" id="onboarding">
        <!-- Progress Bar -->

        <div class="progress rounded-0" role="progressbar" id="progress-bar" aria-label="Dark example" aria-valuenow="14.29" aria-valuemin="0" aria-valuemax="100" style="height: 4px; ">
            <div class="progress-bar bg-dark d-none-dark"  style="width: {{ (array_search($step, ['profile_picture',  'about', 'location', 'category', 'charge', 'skills', 'socials' ]) + 1) * 14.2 }}%;"></div>
            <div class="progress-bar bg-light d-none d-block-dark" style="width: {{ (array_search($step, ['profile_picture',  'about', 'location', 'category', 'charge', 'skills', 'socials' ]) + 1) * 14.3 }}%;"></div>
          </div>


        <!-- Dynamic Step Content -->
        <div id="step-content">
            @include("onboarding.{$step}", $formData)

        </div>

        <div class="d-flex justify-content-between m-5">
            @if ($previousStep)
<a href="onboarding?step={previousStep} " 
   id="prev-button" 
   class="btn btn-secondary" 
   data-previous-step="{{ $previousStep }}">
   Previous
</a>
@endif
    
        <!-- Next Button -->
        <button type="submit"  id="next-button" class="btn btn-primary">{{ $step === 'socials' ? 'Finish' : 'Next' }}
        </button>
        </div>

    </div>
</div>
<script src="{{asset('assets/js/jquery.min.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>



function toggleSocialMediaFields(isInfluencer) {
    const socialMediaFields = document.getElementById('socialMediaFields');
    
        socialMediaFields.style.display = 'block'; // Show influencer-specific fields
}

// Initialize visibility on page load
document.addEventListener('DOMContentLoaded', () => {
    const isInfluencer = document.querySelector('input[name="is_influencer"]:checked').value;
    toggleSocialMediaFields(parseInt(isInfluencer));
});

    function addSocialMediaRow() {
        const container = document.getElementById('socialMediaContainer');
        const index = container.children.length / 1 // Two columns per row

        const row = `
        <div class="row row-cols-1 row-cols-sm-2 g-3 g-sm-4 pb-3 pb-sm-4 mb-xl-2" id="socialMediaRow-${index}">
        <div class="col-md-3" >
                <label for="platform-${index}" class="form-label">Social Media Platform *</label>
                <select class="form-select form-select-lg" data-select="{
                  &quot;classNames&quot;: {
                    &quot;containerInner&quot;: [&quot;form-select&quot;, &quot;form-select-lg&quot;]
                  },
                  &quot;searchEnabled&quot;: true
                }" aria-label="Select Platform" name="social_media[${index}][platform]" id="platform-${index}" required>
                <option value="">Select your Handle </option>
                  <option value="instagram">Instagram</option>
                  <option value="facebook">Facebook</option>
                  <option value="tiktok">Tiktok</option>
                  <option value="snapchat">Snapchat</option>
                </select>
            </div>
            <div class="col-md-4">
                <label for="platform" class="form-label">Social Media Platform *</label>
                <input type="text" class="form-control form-control-lg" name="social_media[${index}][handle]" id="handle-${index}" placeholder="e.g., @username or link"   required>
            </div>
            <div class="col-md-3">
                <label for="followers" class="form-label">Number of Followers *</label>
                <input type="number" class="form-control form-control-lg" name="social_media[${index}][followers]" id="followers-${index}" min="0" placeholder="e.g., 50000" required>
            </div>

                <div class="col-md-2 ">
                <button type="button" class="btn btn-danger mt-4 btn-lg" onclick="removeSocialMediaRow(${index})">
                    <i class="fi-trash"></i> Remove
                </button>
            </div
            </div>
        `;

        container.insertAdjacentHTML('beforeend', row);
    }

    function removeSocialMediaRow(index) {
    const row = document.getElementById(`socialMediaRow-${index}`);
    if (row) {
        row.remove();
    }
}


document.addEventListener('DOMContentLoaded', function () {
    @if(session('success'))
        Swal.fire({
            title: 'Success!',
            text: '{{ session('success') }}',
            icon: 'success',
            confirmButtonText: 'OK'
        });
    @endif

    @if(session('validationErrors'))
        Swal.fire({
            title: 'Validation Error',
            text: '{{ session('validationErrors') }}',
            html: `{!! nl2br(e(session('validationErrors'))) !!}`,
            icon: 'error',
            confirmButtonText: 'Fix Errors'
        });
    @elseif($errors->any())
        Swal.fire({
            title: 'Error',
            text: '{{ $errors->first() }}',
            icon: 'error',
            confirmButtonText: 'OKay'
        });
    @endif
});




    // Define all steps
    const steps = ['profile_picture', 'about', 'location', 'category', 'charge', 'skills', 'socials'];
    let currentStepIndex = steps.indexOf('{{ $step }}'); // Initialize from server-provided current step
    if (currentStepIndex === -1) currentStepIndex = 0; // Fallback to first step if invalid

    // Update progress bar and buttons dynamically
    function updateUI() {
        const percentage = ((currentStepIndex + 1) / steps.length) * 100;
        prevButton.style.display = currentStepIndex > 0 ? 'block' : 'none';
        nextButton.style.display = currentStepIndex < steps.length - 1 ? 'block' : 'none';
        nextButton.innerText = currentStepIndex === steps.length - 1 ? 'Finish' : 'Next';
    }

    // Load a step dynamically

    function loadStep(step) {
    console.log(`Attempting to load step: ${step}`); // Debugging
    fetch(`/onboarding?step=${step}`)
        .then(response => {
            if (!response.ok) {
                console.error(`Failed to fetch step: ${response.status} - ${response.statusText}`);
                throw new Error('Failed to load the step.');
            }
            return response.text();
        })
        .then(html => {
            console.log(`Loaded HTML for step: ${step}`);
            document.getElementById('step-content').innerHTML = html; // Replace content
            reinitializeScripts(document.getElementById('step-content')); // Reinitialize plugins/scripts
        })
        .catch(err => {
            console.error('Error loading step:', err);
            Swal.fire('Error', 'Failed to load the step.', 'error');
        });
}



/**
 * Reinitialize scripts and event listeners after replacing the DOM content
 * @param {HTMLElement} container - The container where new content has been loaded
 */
 function reinitializeScripts(container) {
    // Reinitialize scripts inside the loaded step content
    const scripts = container.querySelectorAll('script');
    scripts.forEach(script => {
        const newScript = document.createElement('script');
        newScript.textContent = script.textContent;
        document.body.appendChild(newScript).parentNode.removeChild(newScript);
    });

    // Reinitialize TinyMCE or other plugins
    if (typeof tinymce !== 'undefined') {
        tinymce.remove(); // Clear existing instances
        tinymce.init({ selector: '#texteditor' });
    }

    // Reinitialize Choices.js or custom select elements
    const selectElements = container.querySelectorAll('.form-select');
    selectElements.forEach(select => {
        if (typeof Choices !== 'undefined') {
            new Choices(select, { searchEnabled: true });
        }
    });
}



    // Handle form submission for the current step
    nextButton.addEventListener('click', function () {
        const form = stepContent.querySelector('.onboarding-form');
        if (!form) return;

        const formData = new FormData(form);
        fetch(form.action, {
            method: 'POST',
            headers: { 'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content') },
            body: formData,
        })
            .then((response) => {
                if (!response.ok) {
                    return response.json().then((data) => {
                        throw new Error(data.error || 'Validation failed.');
                    });
                }
                return response.json();
            })
            .then((data) => {
                if (data.nextStep) {
                    loadStep(data.nextStep);
                } else {
                    window.location.href = '/dashboard';
                }
            })
            .catch((err) => {
                Swal.fire('Error', err.message, 'error');
            });
 

    nextButton.addEventListener('click', function () {
        if (currentStepIndex < steps.length - 1) {
            const nextStep = steps[++currentStepIndex];
            console.log(`Navigating to next step: ${nextStep}`);
            loadStep(nextStep);
        }
    });

    // Previous Button Handler
    prevButton.addEventListener('click', function (e) {
    e.preventDefault(); // Prevent default link behavior

    // Get the previous step from the button's data attribute
    const previousStep = this.getAttribute('data-previous-step');

    if (previousStep) {
        console.log(`Navigating to previous step: ${previousStep}`); // Debugging log
        loadStep(previousStep); // Load the previous step
    } else {
        Swal.fire('Error', 'Unable to determine the previous step.', 'error'); // Show error if undefined
    }
});



    // Initialize UI on page load
    updateUI();
});





document.addEventListener('DOMContentLoaded', function () {
    @if(session('success'))
        Swal.fire('Success', '{{ session('success') }}', 'success');
    @elseif($errors->any())
        Swal.fire('Error', '{{ $errors->first() }}', 'error');
    @endif


});


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
});

function clearEventListeners(element) {
    const newElement = element.cloneNode(true);
    element.parentNode.replaceChild(newElement, element);
    return newElement;
}

const prevButton = document.getElementById('prev-button');
if (prevButton) {
    const cleanPrevButton = clearEventListeners(prevButton);
    cleanPrevButton.addEventListener('click', function (e) {
        e.preventDefault();
        const previousStep = this.getAttribute('data-previous-step');
        if (previousStep) {
            loadStep(previousStep);
        }
    });
}

</script>





@endsection
