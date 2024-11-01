<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\CommonHelpers;
use App\Http\Controllers\Controller;
use App\Mail\WelcomeToSwiftedgeVA;
use App\Models\ArtisanServices;
use App\Models\Booking;
use App\Models\Skill;
use App\Models\BusinessCategory;
use App\Models\ChatMessages;
use App\Models\City;
use App\Models\ClientRequests;
use App\Models\EmployerJobs;
use App\Models\FreelancerRequest;
use App\Models\Invoices;
use App\Models\JobApplications;
use App\Models\JobMerging;
use App\Models\Locals;
use App\Models\States;
use App\Models\Subscription;
use App\Models\User;
use App\Models\Project;
use App\Models\Education;
use App\Models\Experience;
use App\Models\Language;
use App\Models\MySkill;
use App\Service\admin\AdminService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class AdminController extends Controller
{

    private AdminService $adminService;

    /**
     * @param AdminService $adminService
     */
    public function __construct(AdminService $adminService)
    {
        $this->adminService = $adminService;
    }

    public function getIndex()
    {

        if (Auth::user()) {
            if (Auth::user()->user_status == 0) {
                return back()->withInput()->with('error', "Account is disabled, contact admin");
            } else {
                return redirect()->route('admin.login');
            }

        }
        return view('admin.login');
    }


    /**
     * @param Request $request
     * @return RedirectResponse
     * @throws ValidationException
     */
    public function postSignIn(Request $request): RedirectResponse
    {
        $this->validate($request, [
            'email' => 'required',
            'password' => 'required',
        ]);
        if (
            Auth::attempt([
                'email' => $request->input('email'),
                'password' => $request->input('password')
            ])
        ) {
            //dd($request);
            if (Auth::user()) {
                if (Auth::user()->status == 0) {
                    return back()->withInput()->with('error', "Account is disabled, contact admin");
                } elseif (Auth::user()->is_admin == 1) {
                    return redirect()->route('admin.home');
                } else {
                    return back()->withInput()->with('error', "you are not allowed here!");
                }

            }
            return back()->withInput()->with('error', "Email Or Password didn't match");
        }
        return back()->withInput()->with('error', "Email Or Password didn't match");
    }


    /**
     * @return Application|Factory|View
     */
    public function getAdminIndex()
    {
        $messages = ChatMessages::groupBy('message_id')->count();
        $freelancer = User::query()->where('role', "Artisan")->count();
        $service = ArtisanServices::all()->count();
        $freelancer_request = FreelancerRequest::all()->count();
        $special_booking = Booking::all()->count();
        $request = JobApplications::all()->count();
        $requests = JobApplications::all();
        foreach ($requests as $row) {
            if (empty($row->user_id)) {
                $row["identity"] = User::where('email', $row->email)->value('identity');
            } else {
                $row["identity"] = User::where('id', $row->user_id)->value('identity');
            }

        }
        return view('admin.dashboard', compact('messages', 'freelancer', 'service', 'request', 'requests','special_booking','freelancer_request'));
    }


    /**
     * @return Application|Factory|View
     */
    public function userManagement()
    {
        $title = "Freelancer Management";
        $user = User::where('Role', '=', "Artisan")->where('is_admin', 0)->orderBy('id', 'DESC')->simplePaginate(20);
        return view('admin/user-mgt', compact('user', 'title'));
    }


    /**
     * @return Application|Factory|View
     */
    public function userManagementCreate()
    {
        $title = "Freelancer Management";
        $states = States::all();
        $category = BusinessCategory::all();
        return view('admin/create-artisan', compact('title', 'states', 'category'));
    }


    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function registerAsArtisan(Request $request): RedirectResponse
    {

        $validator = Validator::make($request->all(), [
            'fullname' => 'required|string|max:25',
            'phone' => 'required|numeric',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $state = States::where('id', $request["state"])->value('name');

        $post = new User();
        $post->role = $request["Role"];
        $post->full_name = $request["fullname"];
        $post->email = $request["email"];
        $post->password = bcrypt($request["password"]);
        $post->phone = $request["phone"];
        $post->date_of_birth = $request["DateOfBirth"];
        $post->street_address = $request["StreetAddress"];
        $post->city = $request["state_area"];
        $post->state = $state;
        $post->work_experience = $request->WorkExperience;
        $post->business_category = $request->BusinessCategory;
        $post->business_name = $request->Title;
        $post->website_address = $request->WebsiteAddress;
        $post->service_description = $request->ServiceDescription;
        $post->identity = CommonHelpers::generateCramp("user");

        $post->save();
        //sending email
        $details = [
            'name' => $request["fullname"],
        ];
        Mail::to($request["email"])->send(new WelcomeToSwiftedgeVA($details));

        return back()->withInput()->with('response', 'Registration was successfully');
    }

    public function employerManagement()
    {
        $title = "Employer Management";
        $user = User::where('Role', '=', "Employer")->orderBy('id', 'DESC')->simplePaginate(20);
        return view('admin/user-mgt', compact('user', 'title'));
    }

    public function employerManagementCreate()
    {
        $title = "Employer Management";
        $states = States::all();
        $category = BusinessCategory::all();
        return view('admin/create-employer', compact('title', 'states', 'category'));
    }

    public function getJobs()
    {
        $title = "Employer Management";
        $jobs = EmployerJobs::orderBy('id', 'DESC')->simplePaginate(20);
        return view('admin/employer-jobs', compact('title', 'jobs'));

    }

    public function ApproveEmployerJobs(Request $request)
    {

        $post = EmployerJobs::find($request->id);
        $post->status = $request->status;
        $post->update();
        return back()->withInput()->with('response', 'Updated successfully');

    }

    public function createEmployerAccount(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'fullname' => 'required|string|max:25',
            'phone' => 'required|numeric',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $state = States::where('id', $request->state)->value('name');

        $post = new User();
        $post->role = "Employer";
        $post->full_name = $request->fullname;
        $post->email = $request->email;
        $post->password = bcrypt($request["password"]);
        $post->phone = $request->phone;
        $post->business_name = $request->company;
        $post->state = $state;
        $post->city = $request->state_area;
        $post->is_admin = 2;
        $post->identity = CommonHelpers::generateCramp("user");
        $post->save();

        return back()->withInput()->with('response', 'Registration was successfully');
    }

    public function updateAvailability(Request $request)
    {
        $post = User::find($request->id);
        $post->availability = $request->availability;
        $post->update();
        return back()->withInput()->with('response', "Updated successfully");

    }

    public function userStatusUpdate(Request $request)
    {

        $user = User::find($request->id);
        $user->status = $request->status;
        $user->update();
        return back()->withInput()->with('response', "Updated successfully");

    }


    public function createBusinessCategory()
    {
        $category = BusinessCategory::query()->where('parent_id', 0)->get();
        return view('admin/add_business_cat', compact('category'));
    }

    public function createLocation()
    {
        $state = States::all();
        return view('admin/add_location', compact('state'));
    }



    public function saveLocation(Request $request)
    {

        if (!empty($request->category_id)) {

            $check = Locals::where('local_name', $request->cat_name)->count();
            if ($check > 0) {
                return back()->withInput()->with('error', $request->cat_name . "Already exist");
            }
            $post = new Locals;
            $post->state_id = $request->category_id;
            $post->local_name = $request->cat_name;
        } else {
            $check = States::where('name', $request->cat_name)->count();
            if ($check > 0) {
                return back()->withInput()->with('error', $request->cat_name . "Already exist");
            }
            $post = new States;
            $post->name = $request->cat_name;
        }
        $post->save();
        return back()->withInput()->with('response', "added successfully");

    }


    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function saveBusinessCategory(Request $request): RedirectResponse
    {

        if (empty($request->assoc_category)) {
            $parent_ID = 0;
        } else {
            $parent_ID = $request->assoc_category;
        }
        $post = new BusinessCategory();
        $user_id = Auth::user()->id;
        $post->title = $request->category_name;
        $post->parent_id = $parent_ID;
        $post->created_by = $user_id;
        $post->url = strtolower(CommonHelpers::create_unique_slug($request->category_name, "business_categories", "url"));

        if ($request->icon) {
            $image = $request->icon;
            $filename = time() . "." . $image->extension();
            // Create directory if it does not exist

            if (!is_dir("category_icons/" . Auth::user()->id . "/")) {
                $path = "category_icons/" . Auth::user()->id . "/";
                File::makeDirectory(public_path() . '/' . $path, 0777, true);
            }

            $location = public_path('category_icons/' . Auth::user()->id . '/');
            $image->move($location, $filename);

            $post->featured_img = $filename;
        }


        $post->save();

        return back()->withInput()->with('response', "added successfully");


    }

    public function artisanServices()
    {

        $artisan_services = ArtisanServices::all();
        foreach ($artisan_services as $row) {
            $row["location"] = City::query()->where('id', $row->city)->value('name');
        }
        return view('admin/artisan_services', compact('artisan_services'));
    }

    public function businessServices()
    {

        $business = BusinessCategory::all();
        return view('admin/business_category', compact('business'));
    }


    public function updateBusinessCategory(Request $request, $id)
    {

        $business = BusinessCategory::find($id)->update(['title' => $request->title]);
        return back()->withInput()->with('response', 'Business Category updated');
    }


    public function allApplicant()
    {
        $job_applicant = JobApplications::all();
        return view('admin/applicant', compact('job_applicant'));
    }


    public function subscriptions()
    {
        $subscriptions = Subscription::all();
        return view('admin/subscriptions', compact('subscriptions'));
    }


    public function clientRequests()
    {
        $client_requests = ClientRequests::all();
        return view('admin/client_requests', compact('client_requests'));
    }

    public function locations()
    {

        $locations = States::all();
        foreach ($locations as $row) {
            $row["area_count"] = Locals::where('state_id', $row->id)->count();
        }
        return view('admin/locations', compact('locations'));
    }

    public function getLocations(Request $request)
    {
        $segment = $request->segment(5);
        $state_name = States::where('id', $segment)->value('name');
        $state = Locals::where('state_id', $segment)->get();
        foreach ($state as $row) {
            $row["area_count"] = 0;
        }
        return view('admin/location_area', compact('state', 'state_name'));
    }

    public function chatMessage()
    {
        $messages = User::where('Role', "Artisan")->orderBy('id', 'DESC')->get();
        return view('shared.messaging.message', compact('messages'));
    }

    public function chatMessage2(Request $request)
    {

        $chat_mate = User::where('identity', $request->segment(5))->get();
        $user_mate = User::where('id', Auth::user()->id)->get();
        $message_id = $request->segment(5);

        $message_views = ChatMessages::Where('initiator_id', Auth::user()->id)
            ->Where('sender_id', Auth::user()->id)
            ->Where('initiator_id', $chat_mate[0]['id'])
            ->Where('sender_id', $chat_mate[0]['id'])->get();
        $receiver_id = User::where('identity', $message_id)->value('id');



        return view('shared.messaging.messages_view', compact('message_views', 'receiver_id', 'message_id', 'chat_mate', 'user_mate'));
    }

    public function changePassword()
    {
        return view('admin/change-password');
    }

    public function profile()
    {
        $states = States::all();
        return view('admin/profile', compact('states'));
    }

    public function getLogOut()
    {
        Auth::logout();
        return redirect()->route('index');
    }

    public function deletingExe(Request $request): RedirectResponse
    {

        switch ($request->type) {
            case "user_mgt":
                $post = User::find($request->id);
                $post->delete();
                break;
            case "subscriptions":
                $post = Subscription::find($request->id);
                $post->delete();
                break;
            case "business_category":
                $post = BusinessCategory::find($request->id);
                $post->delete();
                break;
            case "location":
                $post = States::find($request->id);
                $post->delete();
                break;
            case "location_state":
                $post = Locals::find($request->id);
                $post->delete();
                break;
            case "employers_job":
                $post = EmployerJobs::find($request->id);
                $post->delete();
                break;
            case "chat_message":
                $post = ChatMessages::find($request->id);
                $post->delete();
                break;

            case "services":
                $post = ArtisanServices::find($request->id);
                $post->delete();
                break;
            default:
                return back()->withInput()->with('error', "no operations");

        }

        return back()->withInput()->with('response', "deleted successfully");

    }


    public function sendMessage(Request $request)
    {
        $post = new ChatMessages();
        $post->sender_id = $request->sender_id;
        $post->receiver_id = $request->receiver_id;
        $post->messages = $request->message;
        $post->message_id = $request->message_id;
        $post->initiator_id = $request->initiator_id;
        $post->save();
        return back()->withInput()->with('response', "message sent successfully");
    }


    public function updateFreelancerAction(Request $request): RedirectResponse
    {
        return $this->adminService->saveIsFeature($request);
    }
    
    public function updateFreelancerVerification($id)
    {
        $user = User::find($id);
        $user->verification_badge = 1;
        $user->update();
        return back()->withInput()->with('response', "Verification successfully");
    }



    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function UpdateProfilePhoto(Request $request): RedirectResponse
    {

        $user = Auth::user();

        if ($request->home) {
            $profilePicture = $request->file('profile_picture');
                $filename = time() . '.' . $profilePicture->getClientOriginalExtension();

                $directoryPath = "profile/pictures/" . $user->id . "/";
                if (!is_dir($directoryPath)) {
                    File::makeDirectory(public_path($directoryPath), 0777, true);
                }

                $location = public_path($directoryPath);
                $profilePicture->move($location, $filename);

                $user->update(['profile_image' => $directoryPath . $filename]);
        } else {
            return back()->withInput()->with('response', 'Please Attach a profile photo');
        }
        // update account information
        // $post = User::find($id);
        // $post->profile_image = $filename;
        // $post->save();

        return back()->withInput()->with('response', 'profile picture updated');


    }
    
    public function UpdateUserPhoto(Request $request,$id): RedirectResponse
    {

        $user = User::find($id);

        if ($request->home) {
            $profilePicture = $request->file('profile_picture');
                $filename = time() . '.' . $profilePicture->getClientOriginalExtension();

                $directoryPath = "profile/pictures/" . $user->id . "/";
                if (!is_dir($directoryPath)) {
                    File::makeDirectory(public_path($directoryPath), 0777, true);
                }

                $location = public_path($directoryPath);
                $profilePicture->move($location, $filename);

                $user->update(['profile_image' => $directoryPath . $filename]);
        } else {
            return back()->withInput()->with('response', 'Please Attach a profile photo');
        }
        // update account information
        // $post = User::find($id);
        // $post->profile_image = $filename;
        // $post->save();

        return back()->withInput()->with('response', 'profile picture updated');


    }

    public function getProfilePhoto()
    {
        return view('admin.add_dp');
    }



    public function freelancerRequest()
    {
        $freelancer_request = FreelancerRequest::with('freelancer')->paginate(20);
        return view('admin.freelancer-request', compact('freelancer_request'));
    }

    public function specialBooking()
    {
        $special_booking = Booking::paginate(20);
        return view('admin.special-booking', compact('special_booking'));
    }
    
    public function getSkills()
{
    $skills = Skill::orderBy('created_at', 'desc')->paginate(20);
    return view('admin.skills', compact('skills'));
}

    
    public function createSkill(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        try {
            Skill::create([
                'name' => $request->name,
                'slug' => strtolower(CommonHelpers::create_unique_slug($request->name, "my_skills", "url")),
            ]);

            return redirect()->back()->with('success', 'Skill created successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error creating skill: ' . $e->getMessage());
        }
    }

    public function updateSkill(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        try {
            $skill = Skill::findOrFail($id);
        //dd($request->all(), $skill);
            $skill->update([
                'name' => $request->name,
                'slug' => strtolower(CommonHelpers::create_unique_slug($request->name, "my_skills", "url")),
            ]);

            return redirect()->back()->with('success', 'Skill updated successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error updating skill: ' . $e->getMessage());
        }
    }

    public function deleteSkill($id)
    {
        try {
            $skill = Skill::findOrFail($id);
            $skill->delete();

            return redirect()->back()->with('success', 'Skill deleted successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error deleting skill: ' . $e->getMessage());
        }
    }
    public function editUser($identity)
{
    $edit_user = User::where('identity', $identity)
        ->with([
            'ArtisanServices',
            'cityName',
            'stateName',
            'countryName',
            'businessCategory',
            'mySkills',
            'experience',
            'videoBio',
            'educations',
            'projects',
            'languages'
        ])
        ->first();
        
        return view('admin.edit-user', compact('edit_user'));
}

public function storeUserDetails(Request $request)
    {
        $user = User::find($request->user_id);
        $data = $request->except('skills', 'school', 'project_title', 'language', 'education_id', 'project_id', 'language_id', 'resume');

        if ($user->identity == null) {
            $data['identity'] = CommonHelpers::generateCramp("user");
        }

        if (!empty($data)) {
            $user->update($data);
        }

        // Process education data
        if ($request->has('school')) {
            foreach ($request->school as $key => $school) {
                $educationId = $request->education_id[$key] ?? null;

                $education = Education::where('user_id', $user->id)
                    ->where('title', $school)
                    ->first();

                if ($education) {
                    $education->update([
                        'desc' => $request->degree[$key] ?? null,
                        'purpose' => $request->field_of_study[$key] ?? null,
                        'year' => $request->year[$key] ?? null,
                    ]);
                } else {
                    Education::create([
                        'user_id' => $user->id,
                        'title' => $school,
                        'desc' => $request->degree[$key] ?? null,
                        'purpose' => $request->field_of_study[$key] ?? null,
                        'year' => $request->year[$key] ?? null,
                    ]);
                }
            }
        }

        // Process project data
        if ($request->has('project_title')) {
            foreach ($request->project_title as $key => $title) {
                $project = Project::where('user_id', $user->id)
                    ->where('title', $title)
                    ->first();

                if ($project) {
                    $project->update([
                        'description' => $request->project_description[$key] ?? null,
                        'url' => $request->project_url[$key] ?? null,
                    ]);
                } else {
                    Project::create([
                        'user_id' => $user->id,
                        'title' => $title,
                        'description' => $request->project_description[$key] ?? null,
                        'url' => $request->project_url[$key] ?? null,
                    ]);
                }
            }
        }

        // Process language data
        if ($request->has('language')) {
            foreach ($request->language as $key => $language) {
                $lang = Language::where('user_id', $user->id)
                    ->where('language', $language)
                    ->first();

                if ($lang) {
                    $lang->update([
                        'language' => $language,
                    ]);
                } else {
                    Language::create([
                        'user_id' => $user->id,
                        'language' => $language,
                    ]);
                }
            }
        }

        // Process skills data
        if ($request->has('skills')) {
            $skills = explode(',', $request->skills);
            foreach ($skills as $skill) {
                $skill = trim($skill);

                if (!empty($skill)) {
                    $existingSkill = MySkill::where('user_id', $user->id)
                        ->where('title', $skill)
                        ->first();

                    if (!$existingSkill) {
                        MySkill::create([
                            'title' => $skill,
                            'user_id' => $user->id,
                            'url' => strtolower(CommonHelpers::create_unique_slug($skill, "my_skills", "url")),
                        ]);
                    }
                }
            }
        }

        // Process resume upload
        if ($request->hasFile('resume')) {
            $resume = $request->file('resume');

            // Validate that the file is either a PDF or DOC/DOCX
            $request->validate([
                'resume' => 'mimes:pdf,doc,docx|max:10240', // Max file size is 10MB
            ]);

            $filename = time() . "." . $resume->getClientOriginalExtension();

            // Create directory if it does not exist
            $directoryPath = "profile/resume/" . Auth::user()->id . "/";
            if (!is_dir($directoryPath)) {
                File::makeDirectory(public_path($directoryPath), 0777, true);
            }

            // Define the location where the resume will be stored
            $location = public_path($directoryPath);

            // Move the uploaded file to the specified location
            $resume->move($location, $filename);

            // Update the user's resume path in the database
            $user->update(['resume' => $directoryPath . $filename]);
        }

        return back()->withInput()->with('response', "Updated successfully");
    }
}
