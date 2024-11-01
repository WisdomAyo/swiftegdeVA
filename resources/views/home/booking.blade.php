@extends('home.layouts.content')
@section('content')
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
    </div>
@endsection
