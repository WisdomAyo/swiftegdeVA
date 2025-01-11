<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\CurrencyController;
use App\Http\Controllers\Home\BookingController;
use App\Http\Controllers\Home\HomeController;
use App\Http\Controllers\Employer\EmployerController;
use App\Http\Controllers\OnboardingController;
use App\Http\Controllers\User\UserController;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;





/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::post('/upload-profile-image', [OnboardingController::class,'imagesUpload'])->name('upimage')->middleware('auth');
// Route::post('/update-about', [OnboardingController::class,'aboutUpdate'])->name('aboutUpdate')->middleware('auth');
// Route::post('/location-update', [OnboardingController::class,'updateLocation'])->name('updateLocation')->middleware('auth');
// Route::post('/category-update', [OnboardingController::class,'updateCategory'])->name('updateCategory')->middleware('auth');
// Route::post('/charge-update', [OnboardingController::class,'updateCharge'])->name('updateCharge')->middleware('auth');
// Route::post('/skills-update', [OnboardingController::class,'updateSkills'])->name('updateSkills')->middleware('auth');


// Route::get('/onboarding', [OnboardingController::class, 'checkOnboarding'])->name('onboarding');
Route::post('/onboarding/update', [OnboardingController::class, 'update'])->name('onboarding.update');
Route::get('/onboarding/{step?}', [OnboardingController::class, 'checkOnboarding'])->name('onboarding');



Route::get('edit-user/{identity}', [AdminController::class, 'editUser'])->name('edit.user')->middleware('auth');
Route::put('/save-user-details', [AdminController::class, 'storeUserDetails'])->name('save.user.details')->middleware('auth');
Route::middleware('auth')->group(function () {
    Route::get('/onboarding/check', [OnboardingController::class, 'checkOnboarding'])->name('onboarding.check'); 
    Route::get('/onboarding/country/{id}/states', [OnboardingController::class, 'getStates']);
    Route::get('/onboarding/state/{id}/cities', [OnboardingController::class, 'getCities']);
    Route::post('/onboarding/update', [OnboardingController::class, 'update'])->name('onboarding.update');
});

Route::post('/create-booking', [BookingController::class, 'store'])->name('bookings.store');
Route::
        namespace('App\Http\Controllers')->group(function () {

            Route::get('/clear-cache', function () {
                return "done";
            });
            Route::group(['middleware' => ['web', 'auth.users', 'auth', 'check.profile'], 'prefix' => 'gateway'], function () {
                Route::get('/dashboard', ['uses' => 'Auth\AuthController@redirectDashboard', 'as' => 'gateway.redirect']);
            });

            /**
             * USER DASHBOARD ROUTES
             */
            Route::group(['middleware' => ['web', 'auth.users', 'auth', 'check.profile'], 'prefix' => 'user'], function () {
                Route::get('/dashboard', ['uses' => 'User\UserController@getAdminIndex', 'as' => 'user.home']);
                Route::get('/jobs', ['uses' => 'User\UserController@getJobs', 'as' => 'user.job']);
               
                Route::get('/services', ['uses' => 'User\UserController@getMyServices', 'as' => 'user.service']);
                Route::get('/services/add', ['uses' => 'User\UserController@addServices', 'as' => 'user.service.add']);
                Route::get('/services/{any}', ['uses' => 'User\UserController@getEditServices', 'as' => 'user.service.edit']);
                Route::post('/services/add/save', ['uses' => 'User\UserController@saveServices', 'as' => 'user.service.save']);
                Route::post('/services/update', ['uses' => 'User\UserController@updateService', 'as' => 'user.service.update']);
                Route::get('/messages', ['uses' => 'User\UserController@getMessages', 'as' => 'user.message']);
                Route::get('/messages/{id}', ['uses' => 'User\UserController@chatMessage2', 'as' => 'user.user.message2']);
                Route::get('/profile', ['uses' => 'User\UserController@getProfile', 'as' => 'user.profile']);
                Route::get('/profile/change-password', ['uses' => 'User\UserController@getChangePassword', 'as' => 'user.change.password']);
                Route::post('/profile/password/update', ['uses' => 'Home\HomeController@ChangeUserPassword', 'as' => 'user.settings.password.update']);
                Route::get('/profile/education/add', ['uses' => 'User\UserController@getEducation', 'as' => 'user.profile.education']);
                Route::get('/profile/experience/add', ['uses' => 'User\UserController@getExperience', 'as' => 'user.profile.experience']);
                Route::get('/profile/awards/add', ['uses' => 'User\UserController@getAwards', 'as' => 'user.profile.awards']);
                Route::get('/profile/gallery/add', ['uses' => 'User\UserController@getGallery', 'as' => 'user.profile.gallery']);
                Route::post('/profile/gallery/save', ['uses' => 'User\UserController@UpdateGalleryPhoto', 'as' => 'user.profile.gallery.save']);
                Route::get('/country/{countryId}/states', [UserController::class, 'getStates'])->name('get.states');
                Route::get('/state/{stateId}/areas', [UserController::class, 'getCities'])->name('get.areas');
                Route::put('/settings/save', [UserController::class, 'storeUser'])->name('settings.save');
                Route::delete('/education/{id}', [UserController::class, 'deleteEducation'])->name('education.delete');
                Route::delete('/experience/{id}', [UserController::class, 'deleteExperience'])->name('experience.delete');
                Route::delete('/award/{id}', [UserController::class, 'deleteAward'])->name('award.delete');
              

                Route::get('/country/{id}/states', [UserController::class, 'getStates']);
                Route::get('/state/{id}/cities', [UserController::class, 'getCities']);

                Route::post('/profile/update/save', ['uses' => 'User\UserController@UpdateGalleryPhoto', 'as' => 'user.profile.update.save']);
                Route::post('/profile/basic/update/save', ['uses' => 'User\UserController@updateProfile', 'as' => 'user.basic.profile.update.save']);
                //Route::put('/profile/basic/update/save', ['uses' => 'User\UserController@updateUserProfile', 'as' => 'user.basic.profile.update.save']);
                Route::post('/profile/education/experience/awards/update/save', ['uses' => 'User\UserController@saveProfileUpdates', 'as' => 'user.additional.profile.update.save']);
                Route::get('/payment/course/{id}', 'User\UserController@buyCourse');

                Route::get('/skills', ['uses' => 'User\UserController@addSkills', 'as' => 'user.skills']);
                Route::post('/skill/create', ['uses' => 'User\UserController@saveSkills', 'as' => 'user.skills.save']);
Route::delete('/skills/{id}', ['uses' => 'User\UserController@destroySkills', 'as' => 'skills.destroy']);

                Route::get('/profile/photo/add', ['uses' => 'User\UserController@getProfilePhoto', 'as' => 'user.profile.photo']);
            });


            /**
             * EMPLOYERS DASHBOARD ROUTES
             */
            Route::group(['middleware' => ['web', 'auth.users', 'auth'], 'prefix' => 'employer'], function () {
                Route::get('/dashboard', ['uses' => 'Employer\EmployerController@getAdminIndex', 'as' => 'employer.home']);
                Route::get('/jobs', ['uses' => 'Employer\EmployerController@getJobs', 'as' => 'employer.job']);
                Route::get('jobs/request', ['uses' => 'Employer\EmployerController@getAddJobs', 'as' => 'employer.job.request']);
                Route::get('jobs/request/{id}', ['uses' => 'Employer\EmployerController@editJobs', 'as' => 'employer.job.request.edit']);
                Route::post('jobs/request/save', ['uses' => 'Employer\EmployerController@createJob', 'as' => 'employer.job.save']);
                Route::post('jobs/request/edit/save', ['uses' => 'Employer\EmployerController@EditJob', 'as' => 'employer.job.edit.save']);
                Route::get('/requests', ['uses' => 'Employer\EmployerController@getRequests', 'as' => 'employer.requests']);
                Route::get('/applicant/requests', ['uses' => 'Employer\EmployerController@allApplicant', 'as' => 'employer.applicant.requests']);
                Route::get('/messages', ['uses' => 'Employer\EmployerController@getMessages', 'as' => 'employer.message']);
                Route::get('/messages/{id}', ['uses' => 'Employer\EmployerController@chatMessage2', 'as' => 'employer.user.message2']);
                Route::get('/profile', ['uses' => 'Employer\EmployerController@getProfile', 'as' => 'employer.profile']);
                Route::get('/profile/change-password', ['uses' => 'Employer\EmployerController@getChangePassword', 'as' => 'employer.change.password']);
                Route::post('/profile/password/update', ['uses' => 'Employer\EmployerController@ChangeUserPassword', 'as' => 'employer.settings.password.update']);
                Route::get('/profile/photo/add', ['uses' => 'Employer\EmployerController@getProfilePhoto', 'as' => 'employer.profile.photo']);
                
                Route::post('/profile/update', [EmployerController::class, 'updateProfile'])->name('employer.profile.update');
                



                Route::get('/country/{id}/states', [EmployerController::class, 'getStates'])->name('getStates');
                Route::get('/state/{id}/cities', [EmployerController::class, 'getCities'])->name('getCities');
            });

            /**
             * GENERAL ACTION ROUTES
             */
            Route::group(['middleware' => ['web', 'auth.users', 'auth'], 'prefix' => 'actions'], function () {
                Route::post('delete', ['uses' => 'Admin\AdminController@deletingExe', 'as' => 'delete.exe']);
                Route::post('updating/user/status', ['uses' => 'Admin\AdminController@userStatusUpdate', 'as' => 'user.exe.status']);
                Route::post('profile/photo/save', ['uses' => 'Admin\AdminController@UpdateProfilePhoto', 'as' => 'profile.dp.save']);
                Route::post('user-photo-save/{id}', ['uses' => 'Admin\AdminController@UpdateUserPhoto', 'as' => 'save.user.photo']);
                Route::post('message/send', ['uses' => 'Admin\AdminController@sendMessage', 'as' => 'message.send.save']);
            });

            /**
             * ADMIN DASHBOARD ROUTES
             */
            Route::group(['middleware' => ['web', 'auth.users', 'auth'], 'prefix' => 'admin/secure'], function () {
                Route::get('/freelancer-request', [AdminController::class, 'freelancerRequest'])->name('admin.user.request');
                Route::get('/special-booking', [AdminController::class, 'specialBooking'])->name('admin.user.booking');
                Route::get('/dashboard', ['uses' => 'Admin\AdminController@getAdminIndex', 'as' => 'admin.home']);

Route::get('/getSkills', [AdminController::class, 'getSkills'])->name('admin.getSkills');
Route::post('/skills/create', [AdminController::class, 'createSkill'])->name('admin.skills.create');
    Route::post('/skills/{id}/update', [AdminController::class, 'updateSkill'])->name('admin.skills.update');
    Route::delete('/skills/{id}/delete', [AdminController::class, 'deleteSkill'])->name('admin.skills.delete');

                Route::get('/category/add', ['uses' => 'Admin\AdminController@createBusinessCategory', 'as' => 'admin.add.business.cat']);
                Route::post('/category/add/save', ['uses' => 'Admin\AdminController@saveBusinessCategory', 'as' => 'admin.add.business.cat.save']);
                Route::put('/update-business-category/{id}', [AdminController::class, 'updateBusinessCategory'])->name('update.business.category');
                Route::get('/location/add', ['uses' => 'Admin\AdminController@createLocation', 'as' => 'admin.add.cat']);
                Route::post('/location/add/save', ['uses' => 'Admin\AdminController@saveLocation', 'as' => 'admin.add.location.save']);

                Route::post('/freelancer/action', ['uses' => 'Admin\AdminController@updateFreelancerAction', 'as' => 'admin.freelancer.action']);
                Route::post('/verification/{id}', ['uses' => 'Admin\AdminController@updateFreelancerVerification', 'as' => 'admin.freelancer.verification']);

                Route::get('/user/management', ['uses' => 'Admin\AdminController@userManagement', 'as' => 'admin.user.mgt']);
                Route::get('/user/management/create', ['uses' => 'Admin\AdminController@userManagementCreate', 'as' => 'admin.user.mgt.create']);
                Route::post('/user/management/create/save', ['uses' => 'Admin\AdminController@registerAsArtisan', 'as' => 'admin.register.artisan']);

                Route::get('/employer/jobs', ['uses' => 'Admin\AdminController@getJobs', 'as' => 'employer.job.index']);
                Route::post('/employer/jobs/updated', ['uses' => 'Admin\AdminController@ApproveEmployerJobs', 'as' => 'employer.job.index.updated']);

                Route::get('/employer/management', ['uses' => 'Admin\AdminController@employerManagement', 'as' => 'admin.employer.mgt']);
                Route::get('/employer/management/create', ['uses' => 'Admin\AdminController@employerManagementCreate', 'as' => 'admin.employer.mgt.create']);
                Route::post('/employer/management/create/save', ['uses' => 'Admin\AdminController@createEmployerAccount', 'as' => 'admin.employer.mgt.save']);
                Route::post('/user/management/update', ['uses' => 'Admin\AdminController@updateAvailability', 'as' => 'admin.user.mgt.update']);
                Route::get('/user/services', ['uses' => 'Admin\AdminController@businessServices', 'as' => 'admin.user.business.category.all']);
                Route::get('/user/service/category', ['uses' => 'Admin\AdminController@artisanServices', 'as' => 'admin.user.artisan.services']);
                Route::get('/user/business/category', ['uses' => 'Admin\AdminController@businessServices', 'as' => 'admin.user.business.category']);
                Route::get('/user/applicant', ['uses' => 'Admin\AdminController@allApplicant', 'as' => 'admin.user.business.applicant']);
                Route::get('/user/subscription', ['uses' => 'Admin\AdminController@subscriptions', 'as' => 'admin.user.subscriptions']);
                Route::get('/user/locations', ['uses' => 'Admin\AdminController@locations', 'as' => 'admin.user.locations']);
                Route::get('/user/locations/{id}', ['uses' => 'Admin\AdminController@getLocations', 'as' => 'admin.user.locations.get']);
                Route::get('/user/messages', ['uses' => 'Admin\AdminController@chatMessage', 'as' => 'admin.user.message']);
                Route::get('/user/messages/{id}', ['uses' => 'Admin\AdminController@chatMessage2', 'as' => 'admin.user.message2']);
                Route::get('/user/change-password', ['uses' => 'Admin\AdminController@changePassword', 'as' => 'admin.user.password']);
                Route::get('/user/profile', ['uses' => 'Admin\AdminController@profile', 'as' => 'admin.user.profile']);
                Route::post('/login', ['uses' => 'Admin\AdminController@postSignIn', 'as' => 'login.admin']);

                Route::get('/profile/photo/add', ['uses' => 'Admin\AdminController@getProfilePhoto', 'as' => 'admin.profile.photo']);
            });


            /**
             * HOMEPAGE ROUTES
             */


            Route::any('/', ['uses' => 'Home\HomeController@getIndex', 'as' => 'index.home']);
            Route::any('booking', ['uses' => 'Home\HomeController@bookingForm', 'as' => 'index.booking.form']);
            Route::any('about', ['uses' => 'Home\HomeController@getAboutUs', 'as' => 'index.about']);
            Route::any('contact-us', ['uses' => 'Home\HomeController@getContactus', 'as' => 'index.contact.us']);
            Route::any('faqs', ['uses' => 'Home\HomeController@getFaqs', 'as' => 'index.faqs.us']);
            Route::any('contact-us-now', ['uses' => 'Home\HomeController@storeContactus', 'as' => 'contact.us.now']); /* this is post */
            Route::any('freelancers', ['uses' => 'Home\HomeController@allFreelancers', 'as' => 'index.freelancers.list']);

           // Route::get('freelancers', [HomeController::class, 'loadMoreFreelancers'])->name('index.freelancers.list');
            Route::get('state/{state}/areas', ['uses' => 'Home\HomeController@getStates', 'as' => 'index.job.list.location']);
            Route::any('services/all', ['uses' => 'Home\HomeController@allServices', 'as' => 'index.services.list']);
            Route::any('service-category/{url}', ['uses' => 'Home\HomeController@allServicesByURL', 'as' => 'index.services.list.category']);
            Route::any('search-result', ['uses' => 'Home\HomeController@getSearchResult', 'as' => 'search.now']);
            Route::get('/currency-form', [CurrencyController::class, 'showCurrencyForm'])->name('currencyForm');
            Route::post('/change-currency', [CurrencyController::class, 'changeCurrency'])->name('changeCurrency');

            Route::post('request/freelancers', ['uses' => 'Home\HomeController@sendFreelancersRequest', 'as' => 'freelancers.now']);
            Route::get('/jobs', [HomeController::class, 'jobs'])->name('index.jobs');
            Route::get('/jobs/filter', [HomeController::class, 'filterJobs'])->name('jobs.filter');
            Route::get('/job/{url}', [HomeController::class, 'showJobDetails'])->name('job.detail');

            Route::post('freelancer/review/save', ['uses' => 'Home\HomeController@StoreReviewsFreelancer', 'as' => 'freelancer.review.save']);
            Route::post('services/review/save', ['uses' => 'Home\HomeController@StoreReviewsService', 'as' => 'index.review.save']);

            Route::get('staffing/solutions', ['uses' => 'Home\HomeController@getBlueCollarStaffing', 'as' => 'index.staffing']);
            Route::get('staffing/solutions/employer', ['uses' => 'Home\HomeController@getEmployerForm', 'as' => 'index.staffing.employer']);
            Route::post('staffing/solutions/employer/save', ['uses' => 'Home\HomeController@saveEmployerForm', 'as' => 'index.staffing.employer.save']);

            Route::get('/job/{url}/apply', ['uses' => 'Home\HomeController@getJobApplicationForm', 'as' => 'job.apply.form']);
            Route::post('/staffing/solutions/job/application/save', ['uses' => 'Home\HomeController@saveJobApplication', 'as' => 'job.application.save']);

            Route::get('register', ['uses' => 'Home\HomeController@register', 'as' => 'index.register']);
            Route::post('register/step/one/save', ['uses' => 'Home\HomeController@registerAsArtisan2', 'as' => 'index.register.artisan.one']);
            Route::post('register/step/two/save', ['uses' => 'Home\HomeController@saveArtisan', 'as' => 'index.register.artisan.two']);

            Route::post('createUser', [HomeController::class, 'createUser'])->name('createUser');

            // Route::get('country/{state}/states', ['uses' => 'Home\HomeController@getStates', 'as' => 'index.job.list.location.country']);
            // Route::get('state/{state}/areas', ['uses' => 'Home\HomeController@getStatesAreas', 'as' => 'index.job.list.location']);

            Route::get('country/{id}/states', [HomeController::class, 'getStates']);
            Route::get('state/{id}/cities', [HomeController::class, 'getCities']);



            Route::get('account/login', ['uses' => 'Home\HomeController@getLogin', 'as' => 'login']);
            Route::post('account/login/now', ['uses' => 'Auth\AuthController@postSignIn', 'as' => 'login.in.user']);
            Route::get('account/logout', ['uses' => 'Auth\AuthController@getLogOut', 'as' => 'account.logout']);
            Route::get('account/password/reset', ['uses' => 'Auth\AuthController@forgetPassword', 'as' => 'account.forget.pass']);
            Route::post('account/forget-password', ['uses' => 'Auth\AuthController@verifyingEmailAccountReset', 'as' => 'forget.password.reset']);
            Route::get('password/verify', ['uses' => 'Auth\AuthController@VerifyUserAccountPasswordResetView', 'as' => 'password.verify']);
            Route::post('password/verify/save', ['uses' => 'Auth\AuthController@VerifyUserAccountPasswordReset', 'as' => 'password.verify.save']);

            Route::any('terms-and-conditions', ['uses' => 'Home\HomeController@terms', 'as' => 'index.terms']);
            Route::any('tailoring', ['uses' => 'Home\HomeController@Tailoring', 'as' => 'index.tailoring']);


            Route::any('category/job/{url}', ['uses' => 'Home\HomeController@getCategoryJobs', 'as' => 'index.category.job.list']);
            Route::any('service/{url}', ['uses' => 'Home\HomeController@ServicesByURL', 'as' => 'index.job.list.per']);
            Route::get('service/{url}/apply', ['uses' => 'Home\HomeController@getThisJobApplicationForm', 'as' => 'index.job.apply']);
            Route::post('service/{url}/apply/save', ['uses' => 'Home\HomeController@saveJobApplication', 'as' => 'index.job.apply.save']);
            Route::any('user/{url}', ['uses' => 'Home\HomeController@getUserDetails', 'as' => 'index.user.view']);
            Route::post('user/review/save', ['uses' => 'Home\HomeController@SubmitReviews', 'as' => 'index.user.review.save']);
            Route::post('user/contact/request', ['uses' => 'Home\HomeController@SubmitContactCandidate', 'as' => 'index.user.contact.request']);
            Route::post('user/contact/phone/request', ['uses' => 'Home\HomeController@SubmitContactPhoneCandidate', 'as' => 'index.user.contact.phone.request']);

            Route::get('/payment/callback', ['uses' => 'User\PaymentController@handleGatewayCallback', 'as' => 'user.payment.callback']);
            Route::post('pay', ['uses' => 'User\PaymentController@redirectToGateway', 'as' => 'user.pay']);

            Route::get('verify-account', ['uses' => 'Home\HomeController@getVerified', 'as' => 'reg.verify']);
            Route::get('verify-account/{slug}', ['uses' => 'Home\HomeController@getVerified', 'as' => 'reg.verify22']);
            Route::get('verify-account/{slug}/{slug2}', ['uses' => 'Home\HomeController@VerifyUserAccount', 'as' => 'reg.verify.2']);


        });
