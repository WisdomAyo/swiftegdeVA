@extends('home.layouts.content')
@section('content')


{{-- <style>
    #skills-container {
        border: 1px solid #ced4da;
        padding: 8px;
        border-radius: 0.25rem;
        cursor: text;
    }

    .badge {
        font-size: 0.9rem;
        padding: 0.4em 0.6em;
        display: inline-flex;
        align-items: center;
    }
</style>

    <div id="apus-main-content" style="display: flex; justify-content: center; align-items: center; min-height: 100vh;">
        <section id="main-container" class="page-job-board inner layout-type-default inline-margin-top">


            <div class="layout-freelancer-sidebar main-content p-4 inner" style="width: 800px">
                <div class="row justify-content-center">
                    <div id="main-content" class="col">
                        <div class="card shadow p-4">
                            <main id="main" class="site-main layout-type-default" role="main">
                                <div class="freelancers-listing-wrapper main-items-wrapper layout-type-grid"
                                    data-display_mode="grid">
                                    @if ($errors->any())
                                        <div class="alert alert-danger">
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif
                                    
                                    @if (session('success'))
                                        <div class="alert alert-success">
                                            {{ session('success') }}
                                        </div>
                                    @endif

                                    <div class="elementor-widget-wrap elementor-element-populated text-center">
                                        <div class="elementor-element elementor-element-2d079f7 elementor-widget elementor-widget-heading"
                                            data-id="2d079f7" data-element_type="widget" data-widget_type="heading.default">
                                            <div class="elementor-widget-container">
                                                <h2 class="elementor-heading-title elementor-size-default">Book Freelancers
                                                </h2>
                                            </div>
                                        </div>
                                        <div class="elementor-element elementor-element-4768ef7 elementor-widget elementor-widget-text-editor"
                                            data-id="4768ef7" data-element_type="widget"
                                            data-widget_type="text-editor.default">
                                            <div class="elementor-widget-container justify-content-center">
                                                Book a freelancer in Seconds
                                            </div>
                                        </div>

                                    </div>
                                    <form action="{{ route('bookings.store') }}" method="POST">
                                        @csrf
                                    
                                        <div class="form-group text-left">
                                            <label for="name">Name:</label>
                                            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name"
                                                value="{{ old('name') }}" required>
                                            @error('name')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    
                                        <div class="form-group text-left">
                                            <label for="email">Email:</label>
                                            <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="email"
                                                value="{{ old('email') }}" required>
                                            @error('email')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    
                                        <div class="form-group text-left">
                                            <label for="phone">Phone:</label>
                                            <input type="number" class="form-control @error('phone') is-invalid @enderror" name="phone" id="phone"
                                                value="{{ old('phone') }}" required>
                                            @error('phone')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    
                                        <div class="form-group text-left">
                                            <label for="business_category">Business Category:</label>
                                            <select class="form-control @error('business_category') is-invalid @enderror" name="business_category" id="business_category" required>
                                                <option>Select Business Category</option>
                                                @foreach (\App\Models\BusinessCategory::all() as $item)
                                                    <option value="{{ $item->id }}" {{ old('business_category') == $item->id ? 'selected' : '' }}>
                                                        {{ $item->title }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('business_category')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    
                                        <div class="form-group text-left">
                                            <label for="number_of_freelancers">Number of Freelancers Needed:</label>
                                            <input type="number" class="form-control @error('number_of_freelancers') is-invalid @enderror" name="number_of_freelancers"
                                                id="number_of_freelancers" value="{{ old('number_of_freelancers') }}" required>
                                            @error('number_of_freelancers')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    
                                        <div class="form-group text-left">
                                            <label for="budget">Budget:</label>
                                            <input type="number" class="form-control @error('budget') is-invalid @enderror" name="budget" id="budget"
                                                value="{{ old('budget') }}" required>
                                            @error('budget')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    
                                        <div class="form-group">
                                            <label for="area_of_specialization">Area of Specialization (Skills):</label>
                                            <div id="skills-container" class="form-control d-flex flex-wrap align-items-center">
                                                <input type="text" id="skill-input" class="border-0 flex-grow-1"
                                                    placeholder="Enter skills and seperate them with enter" style="min-width: 100px;">
                                            </div>
                                            @error('area_of_specialization')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    
                                        <div class="form-group text-left">
                                            <label for="pay_type">Pay Type:</label>
                                            <select class="form-control @error('pay_type') is-invalid @enderror" name="pay_type" id="pay_type" required>
                                                <option>Select Pay Type</option>
                                                <option value="hour" {{ old('pay_type') == 'hour' ? 'selected' : '' }}>Hourly</option>
                                                <option value="monthly" {{ old('pay_type') == 'monthly' ? 'selected' : '' }}>Monthly</option>
                                            </select>
                                            @error('pay_type')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    
                                        <div id="monthly_pay" style="display: none;">
                                            <label for="monthly_pay_amount">Monthly Pay:</label>
                                            <input type="number" class="form-control @error('monthly_pay_amount') is-invalid @enderror" name="monthly_pay_amount"
                                                id="monthly_pay_amount" value="{{ old('monthly_pay_amount') }}">
                                            @error('monthly_pay_amount')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    
                                        <div id="hourly_pay" style="display: none;" class="text-left">
                                            <label for="min_pay">Minimum Pay (Per Hour):</label>
                                            <input type="number" class="form-control @error('min_pay') is-invalid @enderror" name="min_pay" id="min_pay"
                                                value="{{ old('min_pay') }}">
                                            @error('min_pay')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                    
                                            <label for="max_pay">Maximum Pay (Per Hour):</label>
                                            <input type="number" class="form-control @error('max_pay') is-invalid @enderror" name="max_pay" id="max_pay"
                                                value="{{ old('max_pay') }}">
                                            @error('max_pay')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    
                                        <div class="form-group text-left">
                                            <label for="location">Location:</label>
                                            <input type="text" class="form-control @error('location') is-invalid @enderror" name="location" id="location"
                                                value="{{ old('location') }}" required>
                                            @error('location')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    
                                        <div class="form-group">
                                            <label for="other_details">Other Details:</label>
                                            <textarea class="form-control @error('other_details') is-invalid @enderror" name="other_details" id="other_details" rows="4">{{ old('other_details') }}</textarea>
                                            @error('other_details')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    
                                        <div class="form-group mt-4">
                                            <button type="submit" class="btn btn-theme-rgba10 w-100 radius-sm">Submit Booking</button>
                                        </div>
                                    </form>

                                </div>
                            </main>
                        </div>
                    </div>
                </div>
            </div>

            <script>
                function addSkill() {
                    const input = document.getElementById('skill-input');
                    const skill = input.value.trim();

                    if (skill !== '') {
                        const skillsContainer = document.getElementById('skills-container');

                        // Create a skill tag
                        const skillTag = document.createElement('span');
                        skillTag.className = 'badge p-2 d-flex align-items-center';
                        skillTag.textContent = skill;
                        skillTag.style.borderRadius = '10%';
                        skillTag.style.color = '#343a40';
                        skillTag.style.marginRight = '8px';
                        skillTag.style.backgroundColor = '#e9ecef';

                        // Create a remove button for the skill
                        const removeButton = document.createElement('i');
                        removeButton.className = 'fas fa-times ml-2 ';
                        removeButton.style.cursor = 'pointer';
                        removeButton.style.padding = '0 5px';
                        removeButton.onclick = function() {
                            skillsContainer.removeChild(skillTag);
                        };
                        // Append the remove button to the skill tag
                        skillTag.appendChild(removeButton);

                        // Insert the skill tag before the input field
                        skillsContainer.insertBefore(skillTag, input);

                        // Create a hidden input to submit the skill
                        const hiddenInput = document.createElement('input');
                        hiddenInput.type = 'hidden';
                        hiddenInput.name = 'area_of_specialization[]';
                        hiddenInput.value = skill;
                        skillTag.appendChild(hiddenInput);

                        input.value = ''; // Clear the input field
                    }
                }

                // Add skill on pressing 'Enter' key
                document.getElementById('skill-input').addEventListener('keypress', function(event) {
                    if (event.key === 'Enter') {
                        event.preventDefault();
                        addSkill();
                    }
                });



                document.getElementById('pay_type').addEventListener('change', function() {
                    const hourlyPayDiv = document.getElementById('hourly_pay');
                    const monthlyPayDiv = document.getElementById('monthly_pay');

                    if (this.value === 'hour') {
                        hourlyPayDiv.style.display = 'block';
                        monthlyPayDiv.style.display = 'none';
                    } else if (this.value === 'monthly') {
                        monthlyPayDiv.style.display = 'block';
                        hourlyPayDiv.style.display = 'none';
                    } else {
                        hourlyPayDiv.style.display = 'none';
                        monthlyPayDiv.style.display = 'none';
                    }
                });
            </script>
        </section>
    </div> --}}





    <main class="content-wrapper position-relative overflow-hidden">
        <div class="container position-relative z-2 pt-4 pt-sm-5 pb-5 mt-3 mt-sm-0 mt-md-4">
          <div class="row align-items-center justify-content-center">
            <div class="col-8 col-sm-7 col-md-6 col-lg-7 pb-3 pb-md-0 mb-4 mb-md-0">
              <svg xmlns="http://www.w3.org/2000/svg" width="663" viewBox="0 0 663 825" fill="none"><style>.B{fill:#fff}[data-bs-theme="dark"] .B{fill:#e0e5eb}.C{stroke-linecap:round}.D{stroke-width:.947}.E{stroke-miterlimit:10}.F{stroke-linejoin:round}.G{stroke:#1f2937}.H{fill:#1f2937}.I{stroke:#fff}.J{fill:var(--fn-info)}</style>
               
                <g class="B"><path d="M261.374 166.318c9.864 0 17.86-7.996 17.86-17.86s-7.996-17.861-17.86-17.861-17.86 7.997-17.86 17.861 7.996 17.86 17.86 17.86zm30.057 7.123c6.149 0 11.134-4.984 11.134-11.134s-4.985-11.134-11.134-11.134-11.134 4.985-11.134 11.134 4.985 11.134 11.134 11.134zm21.517-7.394a6.71 6.71 0 0 0 6.705-6.706c0-3.703-3.002-6.705-6.705-6.705a6.71 6.71 0 0 0-6.706 6.705 6.71 6.71 0 0 0 6.706 6.706z" class="D E F I"></path>
  
                  <path d="M217.384 388.077c-8.197-6.281-9.736-17.996-3.455-26.193l55.842-76.414c6.282-8.197 17.997-9.736 26.194-3.455s9.736 17.997 3.455 26.194l-55.842 76.414c-6.313 8.165-18.028 9.736-26.194 3.454z" class="D E F G"></path><path d="M272.975 307.204c-7.192-7.381-7.067-19.19.314-26.414l67.777-69.252c7.381-7.193 19.19-7.067 26.413.345 7.193 7.381 7.067 19.19-.314 26.413l-67.776 69.253c-7.413 7.193-19.222 7.036-26.414-.345z"></path></g><g class="D E F G"><path d="M298.73 308.931l1.696-2.481 66.709-68.185a18.67 18.67 0 0 0 .314-26.414c-7.193-7.38-19.033-7.537-26.414-.345l-67.745 69.316a18.37 18.37 0 0 0-3.015 3.831l-1.822 2.607m6.598 1.79c.251 3.581 2.355 6.973 5.842 8.637 3.486 1.696 7.412 1.288 10.427-.753" class="C"></path><path d="M63.196 808.076c9.453-8.812 10.903-22.621 3.238-30.843s-21.541-7.744-30.994 1.068-10.902 22.62-3.238 30.843 21.541 7.744 30.994-1.068z" class="H"></path><g class="C"><path d="M122.029 504.064l17.117-85.208c2.167-10.113 11.118-17.368 21.451-17.368h65.798c11.935 0 20.855 11.024 18.342 22.708l-16.583 82.632"></path><path d="M139.146 418.856c2.168-10.113 11.119-17.368 21.452-17.368h65.798c11.934 0 20.854 11.024 18.342 22.708"></path></g><path d="M172.44 808.088c9.453-8.812 10.903-22.621 3.238-30.843s-21.541-7.744-30.994 1.068-10.902 22.62-3.238 30.842 21.541 7.744 30.994-1.067z" class="H"></path><path d="M195.184 793.168H68.142c-16.677 0-29.146-15.39-25.628-31.722l49.906-233.261c4.052-18.939 20.76-32.444 40.139-32.444h115.044c16.678 0 29.146 15.39 25.629 31.722l-52.419 244.976a26.19 26.19 0 0 1-25.628 20.729z" class="B"></path><path d="M147.726 793.168H30.577c-16.677 0-29.146-15.39-25.628-31.722l49.906-233.261c4.051-18.939 20.76-32.444 40.138-32.444h112.124c9.391 0 16.363 8.637 14.416 17.808l-56.91 265.957c-1.727 7.977-8.763 13.662-16.897 13.662z" class="J"></path><path d="M120.869 771.654H22.815c-13.976 0-24.403-12.877-21.483-26.539l41.803-195.322c3.392-15.829 17.4-27.167 33.606-27.167h93.876c7.852 0 13.693 7.224 12.06 14.918L135.033 760.19c-1.444 6.69-7.349 11.464-14.164 11.464z" class="B"></path></g><path d="M215.249 366.501l24.215 8.197c5.434 1.853 7.915 8.166 5.151 13.191l-1.068 1.916c-4.899 8.919-15.044 13.599-25 11.495l-44.881-9.422 1.665-8.26c1.224-5.999 5.621-10.867 11.526-12.626l15.955-4.774a21 21 0 0 1 12.437.283z" class="B"></path><path d="M173.666 391.94l1.665-8.26c1.224-5.998 5.621-10.867 11.526-12.625l15.955-4.774a20.53 20.53 0 0 1 10.678-.283m29.773 11.181c2.607 2.795 3.298 7.098 1.319 10.741l-1.068 1.916c-4.899 8.92-15.044 13.6-25 11.495l-3.203-.659" class="C D E F G"></path><g class="B"><path d="M174.732 414.711c-2.889-.597-4.742-3.424-4.146-6.282l3.455-18.279 10.427 2.136-3.454 18.279c-.597 2.889-3.424 4.742-6.282 4.146z"></path><path d="M185.189 416.689c-2.889-.596-4.742-3.423-4.146-6.281l3.392-18.091 10.742 2.167-3.738 18.06c-.565 2.858-3.36 4.711-6.25 4.145z"></path><path d="M195.588 418.856c-2.89-.596-4.743-3.423-4.146-6.281l3.769-18.091 10.49 2.042-3.832 18.185c-.597 2.858-3.423 4.711-6.281 4.145z"></path><path d="M218.639 412.041c.66 2.858-1.13 5.716-3.988 6.376l-6.125 1.413c-2.858.66-5.747-1.131-6.407-3.989s1.131-5.716 3.989-6.375l6.156-1.445c2.858-.628 5.716 1.162 6.375 4.02z" class="D E F G"></path><path d="M206.203 419.861c-2.89-.596-4.743-3.423-4.146-6.281l3.612-17.086 10.427 2.136-3.612 17.086c-.565 2.889-3.392 4.742-6.281 4.145z"></path></g><g class="D E F G"><g class="C"><path d="M184.468 392.286l-3.454 18.279c-.597 2.889-3.424 4.742-6.282 4.146-2.889-.597-4.742-3.424-4.146-6.282l3.455-18.279"></path><path d="M195.208 394.453l-3.737 18.059c-.597 2.89-3.424 4.743-6.282 4.146-2.889-.597-4.742-3.423-4.146-6.282l3.392-18.09"></path><path d="M205.701 396.526l-3.832 18.185c-.597 2.889-3.423 4.742-6.281 4.145-2.89-.596-4.743-3.423-4.146-6.281l3.769-18.091"></path><path d="M205.669 396.526l-3.612 17.085c-.597 2.89 1.256 5.685 4.146 6.282.408.094.816.125 1.193.094 0 0 1.131.032 3.643-.722m5.056-20.603l-2.89 13.725"></path></g><path d="M436.705 139.709s3.863 10.521 5.339 16.834c.188.785-.314 1.602-1.131 1.728-1.476.282-6.061.408-6.061.408l1.005-18.53.848-.44z" class="B"></path></g><path d="M419.872 185.752c11.118-.817 19.473-10.521 18.656-21.64l-2.889-38.787c-1.1-14.542-13.757-25.44-28.298-24.341S381.901 114.74 383 129.282l1.979 26.413c1.319 17.965 16.96 31.408 34.893 30.057z" class="B"></path><g class="D E F G"><path d="M437.933 156.48l.566 7.632c.816 11.119-7.507 20.823-18.656 21.64-17.934 1.351-33.574-12.123-34.925-30.057l-1.979-26.413c-1.099-14.542 9.831-27.199 24.341-28.298 14.542-1.099 27.199 9.83 28.298 24.341l1.099 14.478.628 1.696" class="C"></path><path d="M414.689 179.785v5.936c1.696.157 3.455.157 5.214.031 3.047-.22 5.873-1.131 8.354-2.513l-13.568-3.454z" class="H"></path></g><path d="M394.304 211.6h11.212c5.057 0 9.171-4.114 9.171-9.171v-40.546c0-5.057-4.114-9.171-9.171-9.171h-11.212c-5.057 0-9.171 4.114-9.171 9.171v40.546c0 5.057 4.083 9.171 9.171 9.171z" class="B"></path><g class="D E F G"><path d="M405.516 152.68h-11.212c-5.057 0-9.171 4.115-9.171 9.171v40.547c0 5.056 4.114 9.171 9.171 9.171h11.212c5.057 0 9.171-4.115 9.171-9.171v-24.906" class="C"></path><g class="H"><path d="M438.905 126.298c0-16.551-13.411-29.962-29.963-29.962h-3.706c-25.22 0-45.666 20.446-45.666 45.666v18.75c0 6.878 5.591 12.469 12.469 12.469h37.626c2.921 0 5.308-2.387 5.308-5.308v-35.805s1.036-1.224 3.14-3.454c4.492-4.774 4.711-12.72 4.711-12.72 1.351 3.517-2.324 15.986-2.324 15.986 2.796-2.167 5.559-15.609 5.559-15.609.629 2.826-.91 10.176-1.758 13.756-.252 1.036.565 2.041 1.633 2.041h11.432c.817 0 1.508-.659 1.508-1.507v-4.303h.031z"></path><path d="M411.332 149.759l6.627-4.271-1.288-17.18-6.909.534 1.57 20.917z"></path></g></g><path d="M410.383 157.454l3.957 1.445c4.743 1.821 9.768-1.916 9.391-6.973-.188-2.669-1.916-4.993-4.397-5.936l-3.957-1.444c-4.743-1.822-9.642 2.198-9.234 7.286.188 2.67 1.727 4.68 4.24 5.622z" class="B"></path><g class="D E F"><g class="G"><g class="C"><path d="M419.586 146.116c-.095-.031-.189-.063-.283-.126l-3.957-1.444c-4.743-1.822-9.643 2.198-9.234 7.286.188 2.67 1.759 4.68 4.271 5.622l3.957 1.445c.848.345 1.728.471 2.576.471m-3.047-10.867c1.916-1.068 4.366-.408 5.434 1.539 1.067 1.916.408 4.366-1.539 5.433"></path><path d="M415.504 153.308c.816-1.601 2.575-2.418 4.271-2.104"></path></g><path d="M429.982 143.195c.125 1.633 1.099 1.696 2.261 1.633 1.162-.094 2.104-.314 1.979-1.947-.158-2.167-1.1-2.104-2.293-2.01-1.131.063-2.104.189-1.947 2.324z" class="H"></path><path d="M435.573 143.038s-1.821-4.585-8.731-2.45c0 0-2.984 1.194-5.119.032" class="C"></path><path d="M426.844 136.443l5.842-.44a1.44 1.44 0 0 0 1.319-1.539 1.44 1.44 0 0 0-1.539-1.319l-5.842.44a1.44 1.44 0 0 0-1.319 1.539c.032.785.723 1.382 1.539 1.319z" class="H"></path><g class="B"><path d="M436.55 165.432c.063 1.036.942 1.821 1.948 1.821.094-1.036.094-2.104 0-3.172l-.063-.754h-.063c-1.068.095-1.885 1.037-1.822 2.105z"></path><path d="M435.605 165.62c.377.974 1.351 2.136 2.796 2.732.125-.816.157-1.633.188-2.481-.973 0-1.979-.094-2.984-.251z"></path></g><path d="M433.848 165.275a21.68 21.68 0 0 0 4.711.628" class="C"></path><path d="M409.483 146.762c28.595-32.113 44.194-64.896 34.841-73.225s-40.115 10.953-68.71 43.066-44.194 64.896-34.842 73.224 40.116-10.953 68.711-43.065z" class="B"></path><g class="J"><path d="M407.725 145.181c28.595-32.112 44.194-64.896 34.841-73.224s-40.115 10.953-68.71 43.065-44.194 64.896-34.841 73.224 40.115-10.952 68.71-43.065z"></path><path d="M392.576 131.7c8.449-9.485 15.735-19.001 21.608-27.952 1.162-1.79.503-4.209-1.444-5.12l-9.642-4.648c-10.271-4.931-22.551-2.481-30.151 6.03l-14.102 15.83c-7.569 8.511-8.606 21.011-2.513 30.622l5.716 9.045c1.131 1.822 3.612 2.198 5.245.848 8.229-6.847 16.835-15.201 25.283-24.655z"></path></g><path d="M412.737 98.629l-1.853-.911c-6.093 9.547-13.85 19.849-22.958 30.056-9.014 10.113-18.216 18.939-26.916 26.037l1.068 1.696c1.13 1.822 3.611 2.198 5.245.848 8.197-6.847 16.834-15.201 25.251-24.686 8.449-9.485 15.735-19.002 21.608-27.953 1.162-1.758.471-4.145-1.445-5.087z" class="H"></path><g class="B"><path d="M372.726 555.666c18.248 1.728 33.449-11.558 35.176-29.805l5.465-205.937-13.725-1.288c-28.894-2.732-54.554 18.467-57.318 47.394l1.162 153.895c-1.727 18.216 10.993 34.014 29.24 35.741z"></path><path d="M518.926 537.387c15.892-9.139 20.603-28.769 11.464-44.661l-93.06-163.6c-3.769-6.595-13.945-11.307-20.54-7.538l-5.497 1.225c-25.157 14.479-36.495 46.137-22.016 71.295l85.114 130.936c9.139 15.924 28.643 21.483 44.535 12.343z"></path><path d="M351.15 206.418l33.952-5.151 29.554-.031 26.916 5.182 3.894 31.344 5.025 15.107c3.706 13.254.629 27.482-8.197 38.034l-1.288 1.539-2.638 38.506-80.685 2.638-6.533-127.168zm-13.447 550.694h31.03l38.097-221.044c4.837-18.059-6.532-36.432-24.811-40.201-18.311-3.769-36.024 8.668-38.694 27.167l-5.622 234.078z"></path></g><path d="M323.758 805.668h112.375a2.95 2.95 0 0 0 2.952-2.952v-6.596a2.95 2.95 0 0 0-2.952-2.952H323.758a2.95 2.95 0 0 0-2.953 2.952v6.596c-.031 1.601 1.319 2.952 2.953 2.952z" class="J"></path><path d="M418.767 769.581l-39.416-26.759v-1.225a4.21 4.21 0 0 0-4.208-4.209h-3.424l-1.036 7.758c-.189 1.319-1.319 2.324-2.638 2.324h-1.602a2.67 2.67 0 0 1-2.67-2.669v-4.335c0-1.696-1.382-3.078-3.078-3.078h-22.864a7.28 7.28 0 0 0-7.224 6.282l-7.003 49.466h112.469c.031-11.055-7.255-20.446-17.306-23.555z" class="H"></path></g><path d="M379.387 742.822v4.585m-52.201 18.908a30.28 30.28 0 0 1 12.154-2.544c16.426 0 29.806 13.065 30.339 29.365m48.997-23.618c4.114 5.182 6.595 11.746 6.595 18.876m-36.023-32.507l17.148 10.836" class="C I"></path><g class="G"><path d="M585.662 706.641l-27.638 10.301-85.805-196.923c-7.537-17.085.848-36.998 18.342-43.53 17.526-6.533 36.935 3.046 42.4 20.917l52.701 209.235z" class="B"></path><path d="M632.617 686.069l-45.007 4.24-.502-1.57c-.817-2.482-3.424-3.895-5.936-3.235l-.785.219 1.538 6.565c.252 1.036-.345 2.041-1.35 2.355l-2.042.628c-1.067.314-2.198-.314-2.481-1.382l-.502-1.884c-.691-2.575-3.329-4.083-5.905-3.392l-21.262 5.716c-3.424.911-5.685 4.209-5.277 7.726l5.245 47.519 42.149-9.233 66.489-35.145c-2.042-9.359-9.14-16.3-17.808-18.562-2.104-.628-4.334-.753-6.564-.565z" class="H"></path></g><path d="M622.758 687.011s16.332 2.544 18.938 21.043m-44.534-7.506l28.518-5.905m-38.069-4.334l1.728 5.622m-44.126 25.031c3.455-1.664 7.286-2.701 11.369-2.952 14.824-.911 27.796 8.983 31.282 22.865" class="C I"></path><g class="G"><path d="M579.6 741.314l-31.376 2.921c-1.759.157-3.046 1.696-2.921 3.455l.377 5.088c.126 1.79 1.696 3.109 3.486 2.984l32.319-2.387c7.663-.566 15.138-2.733 21.922-6.376l56.878-30.402c1.288-.691 1.947-2.167 1.633-3.612l-1.224-5.245c-.472-2.073-2.796-3.109-4.68-2.136l-55.748 29.492c-6.438 3.454-13.474 5.559-20.666 6.218z" class="J"></path><path class="text-primary" d="M355.172 327.524s-23.022 24.843-23.022 57.884-6.972 165.767-6.972 165.767l50.911-3.015c40.547-2.418 80.12-13.254 116.207-31.847l40.107-20.666 7.318-1.602-97.646-163.506.911-37.343s9.988-9.767 11.15-23.398c1.13-13.631-8.417-38.254-8.417-38.254l.691-24.969-31.722-5.339-29.554.031-32.381 4.083-5.213 2.042 7.632 120.132z" fill="currentColor"></path><path d="M378.918 202.084l6.219-5.465 3.768.408a97.03 97.03 0 0 0 19.096.189l6.69-.597 4.868 5.465s-21.42 4.648-40.641 0z" class="H"></path><path d="M410.73 437.073l47.331 58.166 7.192 25.942m-54.524-38.191v33.197l-2.764 23.65" class="C"></path><path d="M527.437 225.074c-8.826 5.339-20.321 2.481-25.628-6.344l-45.352-81.345c-5.34-8.825-7.915-18.813.91-24.152s19.598-1.822 24.938 7.004l51.476 79.177c5.308 8.857 2.481 20.352-6.344 25.66z" class="B"></path></g></g><path d="M536.166 205.947c1.884 10.144-5.748 20.006-15.892 21.891l-74.435 15.421c-10.145 1.884-19.881-4.806-21.765-14.95s4.805-19.881 14.949-21.765l71.64-14.322c10.145-1.916 23.619 3.58 25.503 13.725z" class="B"></path><path d="M501.367 194.075l-62.344 12.469c-10.144 1.884-16.834 11.62-14.949 21.765s11.62 16.834 21.765 14.95l74.435-15.421c10.144-1.885 17.776-11.747 15.892-21.891-.22-1.256-.66-2.45-1.225-3.581l-3.612-6.658" class="C D E F G"></path><path d="M463.458 137.479l10.459-3.989a17.81 17.81 0 0 0 9.987-23.743l-7.852-17.965-40.107 15.232 7.601 21.263c2.921 8.103 11.903 12.249 19.912 9.202z" class="B"></path><path d="M436.006 107.046l7.6 21.262c2.89 8.103 11.841 12.218 19.881 9.171m18.91-10.678c3.266-4.868 4.083-11.244 1.539-17.054l-7.852-17.965" class="C D E F G"></path><path d="M441.031 121.116l10.019-3.581-8.26-23.147a5.28 5.28 0 1 0-9.988 3.58l8.229 23.147z" class="B"></path><path d="M451.018 117.535l-8.26-23.147a5.28 5.28 0 1 0-9.987 3.58l8.26 23.147" class="C D E F G"></path><path d="M466.404 96.21l9.988-3.612-3.989-10.207a5.28 5.28 0 1 0-9.988 3.58l3.989 10.239z" class="B"></path><g class="D E F G"><path d="M476.392 92.567l-3.989-10.207a5.28 5.28 0 1 0-9.988 3.58l3.581 9.171" class="C"></path><path d="M464.084 80.695c.502-2.889-1.414-5.653-4.303-6.156l-7.821-1.382c-2.889-.502-5.653 1.413-6.155 4.303s1.413 5.653 4.302 6.156l7.821 1.382c2.889.502 5.653-1.413 6.156-4.303z" class="B"></path></g><path d="M459.971 98.471l10.019-3.518-6.03-16.897a5.28 5.28 0 1 0-9.988 3.58l5.999 16.834z" class="B"></path><g class="D E F G"><path d="M453.939 81.606l5.748 16.143m10.303-2.795l-6.031-16.897c-.659-1.822-2.198-3.047-3.957-3.423l-2.356-.471" class="C"></path><path d="M455.882 81.386c.503-2.889-1.413-5.653-4.302-6.156l-7.821-1.382c-2.889-.502-5.653 1.413-6.156 4.303s1.414 5.653 4.303 6.156l7.821 1.382c2.889.503 5.653-1.413 6.155-4.303z" class="B"></path></g><path d="M452.584 101.11l10.019-3.581-6.438-18.656a5.28 5.28 0 1 0-9.988 3.58l6.407 18.656z" class="B"></path><g class="D E F G"><path d="M446.145 82.454l6.155 17.902m10.273-2.827l-6.439-18.656c-.565-1.57-1.79-2.732-3.266-3.235 0 0-.942-.377-2.513-.628" class="C"></path><path d="M449.761 84.37c.503-2.889-1.413-5.653-4.302-6.156l-7.821-1.382c-2.889-.503-5.653 1.413-6.156 4.303s1.414 5.653 4.303 6.156l7.821 1.382c2.889.502 5.653-1.413 6.155-4.303z" class="B"></path></g><path d="M445.99 103.465l10.019-3.58-6.282-18.31a5.28 5.28 0 0 0-9.987 3.581l6.25 18.31z" class="B"></path><path d="M439.707 85.155l6.281 18.31m10.02-3.58l-6.281-18.31c-.754-2.104-2.701-3.455-4.806-3.518l-2.23-.377" class="C D E F G"></path></svg>
            </div>
            <div class="col-sm-10 col-md-6 col-lg-5 text-center text-md-start">
              
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

                    <!-- Project description -->
                    <h1 class="h3">Create your first project</h1>
                    <p class="pb-2 pb-md-3">A project is a compilation of photos showcasing your work. These photos help homeowners discover and hire your business on Finder.</p>
                    <form action="{{ route('bookings.store') }}" method="POST">
                        @csrf 

                    <div class="mb-3 mb-md-4">
                      <label for="project-name" class="form-label">Name *</label>
                      <input type="text" class="form-control form-control-lg @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name')}}" required>
                      @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                      @enderror
                    </div>

                    <div class="mb-3 mb-md-4">
                        <label for="email" class="form-label">Email *</label>
                        <input type="email" class="form-control form-control-lg @error('email') is-invalid @enderror" id="email" required name="email">
                        @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                      </div>

                    <div class="mb-3 mb-md-4">
                        <label for="phone" class="form-label">Phone number *</label>
                        <input type="tel" class="form-control form-control-lg @error('name') is-invalid @enderror" id="phone" name="phone" value="{{ old('name')}}" required  data-input-format="{&quot;numericOnly&quot;: true, &quot;delimiters&quot;: [&quot;(&quot;, &quot;)&quot;, &quot; &quot;, &quot;-&quot;, &quot; &quot;], &quot;blocks&quot;: [0, 3, 0, 3, 4]}" placeholder="(___) ___-____" required="">
                        @error('phone')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                    </div>

                      <div class="mb-3 mb-md-4">
                        <label for="project-name" class="form-label">Location</label>
                        <input type="text" name="location" class="form-control form-control-lg @error('location') is-invalid @enderror" id="project-name" required="" value="{{ old('location') }}" >
                      </div>

                    <div class="mb-3 mb-md-4">
                      <label for="project-description" class="form-label">Project Description *</label>
                      <textarea class="form-control form-control-lg" name="other_details" rows="6" id="project-description" placeholder="Tell potential customers about project" required="">{{ old('other_details') }}</textarea>
                      @error('other_details')
                      <div class="invalid-feedback">{{ $message }}</div>
                      @enderror
                    </div>

                    <div class="mb-3 mb-md-4">
                        <label class="form-label">Business Category *</label>
                        <select class="form-select form-select-lg" name="business_category" id="business_category" required data-select="{
                          &quot;classNames&quot;: {
                            &quot;containerInner&quot;: [&quot;form-select&quot;, &quot;form-select-lg&quot;]
                          }
                        }" aria-label="Engine select" required="">
                          <option value="">Select Business Categories</option>

                         @foreach (\App\Models\BusinessCategory::all() as $item)
                                <option value="{{ $item->id }}" {{ old('business_category') == $item->id ? 'selected' : '' }}>
                                       {{ $item->title }}
                            </option>
                        @endforeach
                          
                        </select>
                        @error('business_category')
                                 <div class="invalid-feedback">{{ $message }}</div>
                       @enderror
                      </div>

                      <div class="mb-3 mb-md-4" >
                        <label for="number_of_freelancers" class="form-label">Number of Freelancer Needed</label>
                        <input type="number" class="form-control form-control-lg @error('number_of_freelancers') is-invalid @enderror" name="number_of_freelancers"
                                                id="number_of_freelancers" value="{{ old('number_of_freelancers') }}" required  >
                        @error('number_of_freelancers')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                    </div>


                   
                      <div class="mb-3 mb-md-4">
                        <label for="project-name" class="form-label">Area Of Specialization (Skill) *</label>
                        <div id="skills-container" class=" d-flex flex-wrap" style="min-height: 50px;">
                            <!-- Skills will be dynamically added here -->
                            <input type="text" id="skill-input" placeholder="Enter skills and separate them with commas" 
                                   class="flex-grow-1 form-control form-control-lg" style="outline: none;" >
                        </div>
                    </div>
                    
                



                    <label for="price" class="form-label">Budget*</label>
                    <div class="d-flex gap-2" style="max-width: 630px">
                      <div class="position-relative">
                        <i class="fi-dollar-sign fs-lg position-absolute top-50 start-0 translate-middle-y ms-3"></i>
                        <input type="number" class="form-control form-control-lg form-icon-start @error('budget') is-invalid @enderror" name="budget"  id="price" min="5" placeholder="Set a fair price" required="">
                        @error('budget')
                                <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                      <div style="width: 200px">
                        <select class="form-select form-select-lg @error('pay_type') is-invalid @enderror" name="pay_type" id="pay_type" data-select="{
                          &quot;classNames&quot;: {
                            &quot;containerInner&quot;: [&quot;form-select&quot;, &quot;form-select-lg&quot;]
                          }
                        }" aria-label="Select per period">
                          <option value="">Select Pay Type</option>
                          <option value="hour" {{ old('pay_type') == 'hour' ? 'selected' : '' }}>Hourly</option>
                          <option value="monthly" {{ old('pay_type') == 'monthly' ? 'selected' : '' }}>Monthly</option>
                        </select>
                      </div>
                    </div>
                    
                    <div class="mb-3 mb-md-4" id="monthly_pay" style="display: none">
                        <label for="monthly_Pay" class="form-label">Montly Pay</label>
                        <input type="number" class="form-control form-control-lg  @error('name') is-invalid @enderror" name="monthly_pay_amount"
                        id="monthly_pay_amount" value="{{ old('monthly_pay_amount') }}"   >
                        @error('monthly_pay_amount')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                    </div>

                    
                    <div class="mb-3 mb-md-4" id="hourly_pay" style="display: none">
                        <label for="min_pay" class="form-label">Minimum Pay ( Per Hour ) </label>
                        <input type="number" class="form-control form-control-lg  @error('min_pay') is-invalid @enderror" name="min_pay"
                        id="min_pay" value="{{ old('min_pay') }}"   >
                        @error('min_pay')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror


                    <label for="max_pay" class="form-label">Maximum Pay ( Per Hour ) </label>
                        <input type="number" class="form-control form-control-lg  @error('max_pay') is-invalid @enderror" name="max_pay"
                        id="max_pay" value="{{ old('max_pay') }}"   >
                        @error('max_pay')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror

                    </div>
                  
        
                    <!-- Complete button + Skip step button -->
                    <div class="d-flex flex-column flex-sm-row align-items-sm-center gap-3 pt-5">
                      <button type="submit" class="btn btn-lg btn-primary">
                        Save project and become a pro
                        <i class="fi-chevron-right fs-lg ms-1 me-n2"></i>
                      </button>
                      
                    </div>
                    </form>
                  </div>

            
          </div>
        </div>
        <div class="position-absolute top-0 bg-primary-subtle rounded-circle rtl-flip mt-3" style="width: 1255px; height: 1255px; right: 50.6%"></div>
      </main>


      <script>
        // document.addEventListener("DOMContentLoaded", function() {
        //     const skillsContainer = document.getElementById("skills-container");
        //     const skillInput = document.getElementById("skill-input");
        //     const hiddenSkillsInput = document.getElementById("area_of_specialization");
            
        //     // Function to add a new skill tag
        //     function addSkillTag(skill) {
        //         if (skill && !document.querySelector(`#skills-container [data-skill="${skill}"]`)) {
        //             // Create skill tag element
        //             const skillTag = document.createElement("span");
        //             skillTag.className = "badge bg-primary text-white me-1 mb-1";
        //             skillTag.dataset.skill = skill;
        //             skillTag.innerText = skill;
    
        //             // Add remove button to skill tag
        //             const removeBtn = document.createElement("button");
        //             removeBtn.className = "btn-close btn-close-white ms-1";
        //             removeBtn.type = "button";
        //             removeBtn.style.fontSize = "0.7rem";
        //             removeBtn.onclick = function() {
        //                 removeSkillTag(skillTag);
        //             };
    
        //             skillTag.appendChild(removeBtn);
        //             skillsContainer.insertBefore(skillTag, skillInput);
    
        //             // Update hidden input
        //             updateSkillsInput();
        //         }
        //     }
    
        //     // Function to remove a skill tag
        //     function removeSkillTag(skillTag) {
        //         skillsContainer.removeChild(skillTag);
        //         updateSkillsInput();
        //     }
    
        //     // Function to update the hidden input with the list of skills
        //     function updateSkillsInput() {
        //         const skillTags = skillsContainer.querySelectorAll("span[data-skill]");
        //         const skills = Array.from(skillTags).map(tag => tag.dataset.skill);
        //         hiddenSkillsInput.value = skills.join(",");
        //     }
    
        //     // Event listener to handle input field and create skill tags on comma
        //     skillInput.addEventListener("keydown", function(event) {
        //         if (event.key === ",") {
        //             event.preventDefault();
        //             const skill = skillInput.value.trim();
        //             if (skill) {
        //                 addSkillTag(skill);
        //                 skillInput.value = ""; // Clear input
        //             }
        //         }
        //     });
            
        //     // Allow skill tag creation when user types comma and moves away from input
        //     skillInput.addEventListener("blur", function() {
        //         const skill = skillInput.value.trim();
        //         if (skill) {
        //             addSkillTag(skill);
        //             skillInput.value = ""; // Clear input
        //         }
        //     });
        // });


        function addSkill() {
                    const input = document.getElementById('skill-input');
                    const skill = input.value.trim();

                    if (skill !== '') {
                        const skillsContainer = document.getElementById('skills-container');

                        // Create a skill tag
                        const skillTag = document.createElement('span');
                        skillTag.className = 'badge bg-primary text-white me-1 mb-1';
                        skillTag.textContent = skill;
                        skillTag.style.borderRadius = '10%';
                        skillTag.style.color = '#343a40';
                        skillTag.style.marginRight = '8px';
                        skillTag.style.backgroundColor = '#e9ecef';

                        // Create a remove button for the skill
                        const removeButton = document.createElement('i');
                       
                        removeButton.className = 'btn-close btn-close-white ms-1';
                        removeButton.style.cursor = 'pointer';
                        removeButton.style.padding = '0 5px';
                        removeButton.style.fontSize = "0.7rem";
                        removeButton.onclick = function() {
                            skillsContainer.removeChild(skillTag);
                        };
                        // Append the remove button to the skill tag
                        skillTag.appendChild(removeButton);

                        // Insert the skill tag before the input field
                        skillsContainer.insertBefore(skillTag, input);

                        // Create a hidden input to submit the skill
                        const hiddenInput = document.createElement('input');
                        hiddenInput.type = 'hidden';
                        hiddenInput.name = 'area_of_specialization[]';
                        hiddenInput.value = skill;
                        skillTag.appendChild(hiddenInput);

                        input.value = ''; // Clear the input field
                    }
                }

                // Add skill on pressing 'Enter' key
                document.getElementById('skill-input').addEventListener('keypress', function(event) {
                    if (event.key === 'Enter') {
                        event.preventDefault();
                        addSkill();
                    }
                });

                    // Add skill on pressing 'comma' key
                    document.getElementById('skill-input').addEventListener('keydown', function(event) {
                    if (event.key === ',') {
                        event.preventDefault();
                        addSkill();
                    }
                });

        


                 document.getElementById('pay_type').addEventListener('change', function() {
                    const hourlyPayDiv = document.getElementById('hourly_pay');
                    const monthlyPayDiv = document.getElementById('monthly_pay');

                    if (this.value === 'hour') {
                        hourlyPayDiv.style.display = 'block';
                        monthlyPayDiv.style.display = 'none';
                    } else if (this.value === 'monthly') {
                        monthlyPayDiv.style.display = 'block';
                        hourlyPayDiv.style.display = 'none';
                    } else {
                        hourlyPayDiv.style.display = 'none';
                        monthlyPayDiv.style.display = 'none';
                    }
                });
    </script>
@endsection
