<?php

namespace App\Http\Controllers\Employer;

use App\Helpers\CommonHelpers;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\ArtisanServices;
use App\Models\BusinessCategory;
use App\Models\ChatMessages;
use App\Models\EmployerJobs;
use App\Models\JobApplications;
use App\Models\JobMerging;
use App\Models\Location;
use App\Models\Country;
use App\Models\State;
use App\Models\City;
use App\Models\User;
use App\Traits\Executable;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class EmployerController extends Controller
{

    use Executable;

    public function getIndex(){

        if(Auth::user()){
            if(Auth::user()->user_status  == 0 ) {
                return back()->withInput()->with('error', "Account is disabled, contact admin");
            }else {
                return redirect()->route('user.login');
            }

        }
        return view('user.login');
    }

    public function getAdminIndex(){
        $messages = ChatMessages::where('sender_id', Auth::user()->id)->orWhere('receiver_id', Auth::user()->id)->count();
        $jobs = EmployerJobs::where('user_id',Auth::user()->id )->count();
        $service = ArtisanServices::where('user_id', Auth::user()->id)->count();


        return view('employers.dashboard', compact('service','jobs','messages'));
    }

    public function getJobs(){
        $jobs = EmployerJobs::where('user_id',Auth::user()->id)->orderBy('id','DESC')->get();
        return view('employers.job',compact('jobs'));
    }

    public function editJobs($id){
        $jobs = EmployerJobs::where('id',$id)->get();
        foreach ($jobs as $row){
            $row['state_id'] = State::where('name', $row->state_id)->value('id');
        }
        $category =  BusinessCategory::all();
        $states = State::all();
        return view('employers.job_edit',compact('jobs','category','states'));
    }



    public function getAddJobs(){
        $job = new EmployerJobs();
        $country = Country::all();
        $states = State::all();
        $category =  BusinessCategory::all();
        return view('employers.new-job', compact('job','states','category', 'country'));
    }

    public function createJob(Request $request){

        $state_id = State::where('id',$request->state_id)->value('name');
        $country_id = Country::where('id',$request->country_id)->value('name');
        $url = CommonHelpers::create_unique_slug($request->job_title,"employer_jobs","url");

        $category_name = BusinessCategory::where('id', $request->job_category)->value('title');

        $post_ = new EmployerJobs();
        $post_->user_id = Auth::user()->id;
        $post_->job_title = $request->job_title;
        $post_->url = $url;
        $post_->job_description = $request->job_description;
        $post_->firstname = Auth::user()->full_name;
        $post_->email = Auth::user()->email;
        $post_->phone = Auth::user()->phone;
        $post_->industry = $request->company;
        $post_->position = $request->position;
        $post_->hire_type = $request->job_type;
        $post_->quantity = $request->quantity;
        $post_->business_category_name = $category_name;
        $post_->business_category_id = $request->job_category;
        $post_->age_range = $request->age_range;
        $post_->gender = $request->gender;
        $post_->experience = $request->experience;
        $post_->level_of_education = $request->career_level;
        $post_->it_skills = $request->itSkills;
        $post_->skills = implode(',', $request->skills ?? []);
        $post_->benefits = implode(',', $request->benefits ?? []);
        $post_->special_requirements = implode(',', $request->special_requirements ?? []);
        $post_->views = 0;
        $post_->basic_salary =  "₦".number_format($request->min_amount)." - ₦".number_format($request->max_amount) ?? null;
        $post_->allowances = $request->allowances ?? null;
        $post_->country_id = $country_id;
        $post_->state_id = $state_id;
        $post_->city_id = $request->state_area;
        $post_->status = 0;
        $post_->application_deadline = $request->application_deadline;
        $post_->save();

        if($post_->id) {
            return back()->withInput()->with('response', 'Job created Successfully');
        }else {
            return back()->withInput()->with('response', 'an error occurred');
        }
    }



    public function EditJob(Request $request): RedirectResponse
    {
        $state = State::where('id',$request->state)->value('name');
        $url = CommonHelpers::create_unique_slug($request->job_title,"employer_jobs","url");

        $category_name = BusinessCategory::where('id', $request->job_category)->value('title');

        $post_ = EmployerJobs::find($request->id);
        $post_->job_title = $request->job_title;
        $post_->url = $url;
        $post_->job_description = $request->job_description;
        $post_->industry = $request->company;
        $post_->position = $request->position;
        $post_->hire_type = $request->job_type;
        $post_->quantity = $request->quantity;
        $post_->business_category_name = $category_name;
        $post_->business_category_id = $request->job_category;
        $post_->age_range = $request->age_range;
        $post_->gender = $request->gender;
        $post_->experience = $request->experience;
        $post_->level_of_education = $request->career_level;
        $post_->it_skills = $request->itSkills;
        $post_->skills = implode(', ', array_map('trim', explode(',', $request->skills)));
        $post_->benefits = implode(',', $request->benefits ?? []);
        $post_->special_requirements = implode(',', $request->special_requirements ?? []);
        $post_->basic_salary =  "₦".number_format($request->min_amount)." - ₦".number_format($request->max_amount) ?? null;
        $post_->allowances = $request->allowances ?? null;
        $post_->state = $state;
        $post_->city = $request->state_area;
        $post_->status = 0;
        $post_->application_deadline = $request->application_deadline;
        $post_->save();

        if($post_->id) {
            return back()->withInput()->with('response', 'Job created Successfully');
        }else {
            return back()->withInput()->with('response', 'an error occurred');
        }
    }



    public function getProfile(){
        
        // $employer = Auth::user();
        // $states = State::all();
        // $country = Country::all(); 
        // $city = City::all();

        
        return view('employers.profile');
    }


//     public function editProfile()
// {
  

//     if ($employer->role !== 'Employer') {
//         abort(403, 'Unauthorized action.'); // Restrict access to employers only
//     }

//     return view('employer.edit-profile', compact('employer'));
// }

// public function updateProfile(Request $request)
// {
//     $employer = Auth::user();

//     // Update one field at a time and test
//     $employer->full_name = $request->full_name;

//     if (!$employer->save()) {
//         dd('Save failed after full_name');
//     }

//     // Add another field
//     $employer->business_name = $request->business_name;

//     if (!$employer->save()) {
//         dd('Save failed after business_name');
//     }

//     $employer->phone = $request->phone;

//     if (!$employer->save()) {
//         dd('Save failed after phone');
//     }

//     $employer->date_of_birth = $request->date_of_birth;

//     if (!$employer->save()) {
//         dd('Save failed after date_of_birth');
//     }

//     $employer->gender = $request->gender;

//     if (!$employer->save()) {
//         dd('Save failed after gender');
//     }

//     $employer->website_address = $request->website_address;

//     if (!$employer->save()) {
//         dd('Save failed after website_address');
//     }

//     $employer->country_id = $request->country_id;

//     if (!$employer->save()) {
//         dd('Save failed after country_id');
//     }

//     $employer->state_id = $request->state_id;

//     if (!$employer->save()) {
//         dd('Save failed after state_id');
//     }

//     $employer->city_id = $request->city_id;

//     if (!$employer->save()) {
//         dd('Save failed after city_id');
//     }

//     $employer->street_address = $request->street_address;

//     if (!$employer->save()) {
//         dd('Save failed after street_address');
//     }

//     if ($request->hasFile('company_logo')) {
//         $file = $request->file('company_logo'); // Get the uploaded file
//         $logoPath = $file->store('uploads/company_logos', 'public');
//         // Optional: Debug the file object
//         // dd([
//         //     'Original Name' => $file->getClientOriginalName(),
//         //     'Extension' => $file->getClientOriginalExtension(),
//         //     'Mime Type' => $file->getMimeType(),
//         //     'Size' => $file->getSize(),
//         //     'Stored Path' => $logoPath,
//         //     'Full Path' => storage_path('app/public/' . $logoPath),
//         // ]);
    
//         // Save the file and get the path
        
    
//         // Assign the file path to the model
//         $employer->company_logo = $logoPath;
//     }


//     // // Continue testing each field...
//     // $employer->phone = $request->phone;
//     // $employer->street_address = $request->street_address;

//     $employer->save();

//     return redirect()->back()->with('success', 'Profile updated successfully.');
// }

public function updateProfile(Request $request)
{
    $employer = Auth::user();

    if ($employer->role !== 'Employer') {
        abort(403, 'Unauthorized action.');
    }

    if ($request->has('update_profile_image')) {
        // Handle Profile Picture Update
        $request->validate([
            'profile_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Handle file upload
        $employer->profile_image = $this->handleFileUpload(
            $request->file('profile_image'),
            'profile/profile_image',
            $employer->id
        );

        $employer->save();

        return redirect()->back()->with('success', 'Profile picture updated successfully.');
    }

    // Handle Other Profile Updates
    $request->validate([
        'full_name' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email,' . $employer->id,
        'phone' => 'required|string|max:15',
        'street_address' => 'nullable|string|max:255',
        'gender' => 'nullable|string|max:255',
        'business_name' => 'nullable|string|max:255',
        'date_of_birth' => 'nullable|date',
        'website_address' => 'nullable|url|max:255',
        'company_logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    $employer->fill($request->except(['company_logo', 'profile_image', 'update_profile_image']));

    // Handle Company Logo Upload
    if ($request->hasFile('company_logo')) {
        $employer->company_logo = $this->handleFileUpload(
            $request->file('company_logo'),
            'profile/company_logos',
            $employer->id
        );
    }

    $employer->save();

    return redirect()->back()->with('success', 'Profile updated successfully.');
}




/**
 * Handle file uploads to custom folders.
 *
 * @param \Illuminate\Http\UploadedFile $file
 * @param string $folder
 * @param int $userId
 * @return string
 */
private function handleFileUpload($file, $folder, $userId, $existingFilePath = null)
{
    $customPath = public_path("{$folder}/{$userId}");

    // Delete the existing file if it exists
    if ($existingFilePath && File::exists(public_path($existingFilePath))) {
        File::delete(public_path($existingFilePath));
    }

    // Ensure the directory exists
    if (!File::exists($customPath)) {
        File::makeDirectory($customPath, 0755, true);
    }

    // Save the new file
    $fileName = uniqid() . '.' . $file->getClientOriginalExtension();
    $file->move($customPath, $fileName);

    // Return the relative path for database storage
    return "{$folder}/{$userId}/{$fileName}";
}









    public function getMessages(){

        $messages = JobMerging::where('employer_id',Auth::user()->id)->get();

        foreach ($messages as $row){
            $user = User::where('id',$row->user_id)->get();
            $row["full_name"] = $user[0]["full_name"];
            $row["skills"] = $user[0]["skills"];
            $row["location_address"] =$user[0]["state"].', '.$user[0]["city"];
            $row["skillLevel"] = $user[0]["business_category"];
            $row["profile_image"] = $user[0]["profile_image"];
            $row["identity"] = $user[0]["identity"];
        }
        $messages_2 = ChatMessages::where('sender_id',Auth::user()->id)->where('receiver_id', 1)->get();
        foreach ($messages_2 as $row){
            $user = User::where('id',1)->get();
            $row["full_name"] = $user[0]["full_name"];
            $row["location_address"] =$user[0]["state"].', '.$user[0]["city"];
            $row["profile_image"] = $user[0]["profile_image"];
            $row["identity"] = $user[0]["identity"];
        }

        return view('shared.messaging.message', compact('messages','messages_2'));
    }



    public function chatMessage2(Request $request){

        $chat_mate = User::where('identity',  $request->segment(3))->get();
        $user_mate = User::where('id',  Auth::user()->id)->get();
        $message_id = $request->segment(3);

        $message_views =  ChatMessages::Where('sender_id', Auth::user()->id)
            ->orWhere('receiver_id',Auth::user()->id)
            ->orWhere('sender_id',$chat_mate[0]['id'])
            ->orWhere('receiver_id',$chat_mate[0]['id'])->get();
        $receiver_id = User::where('identity', $message_id)->value('id');



        return view('shared.messaging.messages_view', compact('message_views','receiver_id','message_id','user_mate','chat_mate'));
    }



    public function  allApplicant(){
        $service = JobApplications::where('employer_id',Auth::user()->id)->get();
        foreach ($service as $row){
            $user = User::where('email', $row->email)->get();
            $row["full_name"] = $row->full_name;
            $row["skills"] = $row->skills;
            $row["location_address"] = $user[0]["street_address"]. ', '.$user[0]["city"].' ,'.$user[0]["state"] ?? $row->location_address;
            $row["skillLevel"] = $row->skillLevel;
            $row["profile_image"] = $user[0]["profile_image"] ?? null;
            $row["identity"] = $user[0]["identity"] ?? null;
        }
        return view('employers.all_applicant', compact('service'));
    }
    public function getRequests(){
        $service = JobMerging::where('employer_id',Auth::user()->id)->get();

        foreach ($service as $row){
            $user = User::where('id',$row->user_id)->get();
            $row["full_name"] = $user[0]["full_name"];
            $row["skills"] = $user[0]["skills"];
            $row["location_address"] =$user[0]["state"].', '.$user[0]["city"];
            $row["skillLevel"] = $user[0]["business_category"];
            $row["profile_image"] = $user[0]["profile_image"];
            $row["identity"] = $user[0]["identity"];
        }

        return view('employers.request', compact('service'));
    }


    public function getChangePassword(){
        return view('employers.change-password');
    }

    public function getProfilePhoto(){
        return view('employers.add_dp');
    }

    public function getLogOut(){
        Auth::logout();
        return redirect()->route('index.home');
    }


    public function getStates($countryId)
    {
        try {
            $states = State::where('country_id', $countryId)->get(['id', 'name']);
            return response()->json($states);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function getCities($stateId)
    {
        try {
            $cities = City::where('state_id', $stateId)->get(['id', 'name']);
            return response()->json($cities);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }



}
