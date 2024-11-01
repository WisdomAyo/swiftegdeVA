<?php

namespace App\Http\Controllers\Employer;

use App\Helpers\CommonHelpers;
use App\Http\Controllers\Controller;
use App\Models\ArtisanServices;
use App\Models\BusinessCategory;
use App\Models\ChatMessages;
use App\Models\EmployerJobs;
use App\Models\JobApplications;
use App\Models\JobMerging;
use App\Models\Location;
use App\Models\States;
use App\Models\User;
use App\Traits\Executable;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
            $row['state_id'] = States::where('name', $row->state)->value('id');
        }
        $category =  BusinessCategory::all();
        $states = States::all();
        return view('employers.job_edit',compact('jobs','category','states'));
    }



    public function getAddJobs(){
        $states = States::all();
        $category =  BusinessCategory::all();
        return view('employers.new-job', compact('states','category'));
    }

    public function createJob(Request $request){

        $state = States::where('id',$request->state)->value('name');
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



    public function EditJob(Request $request): RedirectResponse
    {
        $state = States::where('id',$request->state)->value('name');
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

        $states = States::all();
        return view('employers.profile', compact('states'));
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
}
