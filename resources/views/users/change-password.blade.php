@extends('shared.layout.user')
@section('content')

   

    <div class="col-lg-9">
        <h1 class="h2 pb-2 pb-lg-3">Account settings</h1>

        <!-- Nav pills -->
        {{-- @if(session('response'))
        <div class="notification-alert alert alert-success alert-dismissible fade show" role="alert">
            {{session('response')}}
            <button type="button" class="btn btn-primary" data-bs-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
        </div>
    @endif --}}

    @if (session('response'))
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            Swal.fire({
                title: 'Success',
                text: '{{ session('Password Changed Successfully') }}',
                icon: 'success',
                confirmButtonText: 'OK'
            });
        });
    </script>
@endif

@if (session('error'))
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            Swal.fire({
                title: 'Error',
                text: '{{ session('error') }}',
                icon: 'error',
                confirmButtonText: 'OK'
            });
        });
    </script>
@endif

        <div class="tab-content">



          <!-- Password and security tab -->
          <div class="tab-pane fade show active" id="security" role="tabpanel" aria-labelledby="security-tab">
            <p class="mb-sm-4">Your current email address is <span class="fw-medium text-primary">{{ $user->email }}</span></p>

            <!-- Change password form -->
            <form class="needs-validation" novalidate="" method="post" action="{{ route('user.settings.password.update')}}">
                {{ csrf_field() }}

              <div class="row row-cols-1 row-cols-sm-2 g-4 mb-4">
                <div class="col">
                  <label for="current-password" class="form-label fs-base">Current password</label>
                  <div class="password-toggle">
                    <input type="password" class="form-control form-control-lg" id="current-password" required="" name="current_password">
                    @if ($errors->has('current_password'))
                    <div class="invalid-tooltip bg-transparent p-0">  <strong>{{ $errors->first('current_password') }}</strong></div>
                   @endif
                    <label class="password-toggle-button" aria-label="Show/hide password">
                      <input type="checkbox" class="btn-check">
                    </label>
                  </div>
                </div>
              </div>
              <div class="row row-cols-1 row-cols-sm-2 g-4 mb-4">
                <div class="col">
                  <label for="new-password" class="form-label fs-base">New password <span class="fs-sm fw-normal text-body-secondary">(Min 8 chars)</span></label>
                  <div class="password-toggle">
                    <input type="password" class="form-control form-control-lg" minlength="8" id="new-password" required="" name="new_password">

                    @if ($errors->has('new_password'))
                    <div class="invalid-tooltip bg-transparent p-0">  <strong>{{ $errors->first('new_password') }}</strong></div>
                   @endif
                    <label class="password-toggle-button" aria-label="Show/hide password">
                      <input type="checkbox" class="btn-check">
                    </label>
                  </div>
                </div>
                <div class="col">
                  <label for="confirm-new-password" class="form-label fs-base">Confirm new password</label>
                  <div class="password-toggle">
                    <input type="password" class="form-control form-control-lg" minlength="8" id="confirm-new-password" required="" name="confirm_new_password" >
                    @if ($errors->has('confirm_new_password'))
                    <div class="invalid-tooltip bg-transparent p-0">  <strong>{{ $errors->first('confirm_new_password') }}</strong></div>
                   @endif
                    <label class="password-toggle-button" aria-label="Show/hide password">
                      <input type="checkbox" class="btn-check">
                    </label>
                  </div>
                </div>
              </div>
              <div class="d-flex gap-3">
                <button type="reset" class="btn btn-lg btn-secondary">Cancel</button>
                <button type="submit" class="btn btn-lg btn-dark">Update password</button>
              </div>
            </form>

            <!-- Device history -->
            <h3 class="h4 pt-5 mt-md-3 mb-sm-4">Device history</h3>
            <div class="row g-3 g-xl-4 mb-3 mb-md-4">
              <div class="col-sm-6 col-md-4">
                <div class="card h-100">
                  <div class="dropdown position-absolute top-0 end-0 mt-2 me-2">
                    <button type="button" class="btn btn-icon btn-sm fs-xl text-dark-emphasis border-0" data-bs-toggle="dropdown" aria-expanded="false" aria-label="Actions">
                      <i class="fi-more-vertical"></i>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end" style="--fn-dropdown-min-width: 8rem">
                      <li>
                        <a class="dropdown-item" href="#!">
                          <i class="fi-log-out opacity-75 me-2"></i>
                          Sign out
                        </a>
                      </li>
                    </ul>
                  </div>
                  <div class="card-body pb-2">
                    <i class="fi-computer fs-3 text-body-tertiary pb-1 mb-2"></i>
                    <h6 class="mb-0">Mac - New York, USA</h6>
                  </div>
                  <div class="card-footer d-flex align-items-center gap-2 bg-transparent border-0 pt-0 pb-4">
                    <span class="fs-sm text-body-secondary">Chrome</span>
                    <span class="badge text-success bg-success-subtle">Active now</span>
                  </div>
                </div>
              </div>
              <div class="col-sm-6 col-md-4">
                <div class="card h-100">
                  <div class="dropdown position-absolute top-0 end-0 mt-2 me-2">
                    <button type="button" class="btn btn-icon btn-sm fs-xl text-dark-emphasis border-0" data-bs-toggle="dropdown" aria-expanded="false" aria-label="Actions">
                      <i class="fi-more-vertical"></i>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end" style="--fn-dropdown-min-width: 8rem">
                      <li>
                        <a class="dropdown-item" href="#!">
                          <i class="fi-log-out opacity-75 me-2"></i>
                          Sign out
                        </a>
                      </li>
                    </ul>
                  </div>
                  <div class="card-body pb-2">
                    <i class="fi-smartphone fs-3 text-body-tertiary pb-1 mb-2"></i>
                    <h6 class="mb-0">iPhone 15 - New York, USA</h6>
                  </div>
                  <div class="card-footer d-flex align-items-center gap-1 bg-transparent border-0 pt-0 pb-4">
                    <span class="fs-sm text-body-secondary">Finder App</span>
                    <i class="fi-bullet"></i>
                    <span class="fs-sm text-body-secondary">20 hours ago</span>
                  </div>
                </div>
              </div>
            </div>
            {{-- <div class="nav">
              <a class="nav-link position-relative px-0" href="#!">
                <i class="fi-log-out fs-base me-2"></i>
                <span class="hover-effect-underline stretched-link">Sign out of all sessions</span>
              </a>
            </div> --}}
         
        </div>
      </div>



@endsection
