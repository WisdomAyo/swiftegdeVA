<?php

namespace App\Http\Controllers\User;

use App\Helpers\CommonHelpers;
use App\Http\Controllers\Controller;
use App\Models\ArtisanGallery;
use App\Models\ArtisanServices;
use App\Models\AwardsAndCertificates;
use App\Models\BusinessCategory;
use App\Models\ChatMessages;
use App\Models\Education;
use App\Models\Experience;
use App\Models\Invoices;
use App\Models\JobMerging;
use App\Models\MySkill;
use App\Models\States;
use App\Models\User;
use App\Traits\Executable;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class UserController extends Controller
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
        $jobs = Invoices::where('user_id',Auth::user()->id )->count();
        $service = ArtisanServices::where('user_id', Auth::user()->id)->count();


        return view('users.dashboard', compact('service','jobs','messages'));
    }

    public function getJobs(){

        $jobs = DB::table("job_mergings")->where('job_mergings.user_id',Auth::user()->id)
            ->join('employer_jobs', 'job_mergings.employer_id', '=', 'employer_jobs.user_id')
            ->select('job_mergings.*', 'employer_jobs.*')
            ->get();
        return view('users.job',compact('jobs'));
    }


    public function getProfile(){
        $states = States::all();
        return view('users.profile', compact('states'));
    }

    public function getEducation(){
        $education = Education::where('user_id', Auth::user()->id)->get();
        return view('users.education', compact('education'));
    }

    public function getExperience(){
        $experience = Experience::where('user_id', Auth::user()->id)->get();
        return view('users.experience', compact('experience'));
    }

    public function getAwards(){
        $award = AwardsAndCertificates::where('user_id', Auth::user()->id)->get();
        return view('users.awards', compact('award'));
    }

    public function getProfilePhoto(){
        return view('users.add_dp');
    }

    public function getGallery(){
        $gallery = ArtisanGallery::where('user_id',Auth::user()->id)->get();
        return view('users.gallery', compact('gallery'));
    }

    public function UpdateGalleryPhoto(Request $request) {

        $id = Auth::user()->id;
        $files = $request->file('post_image1');

        if (!is_dir("profile/gallery/" . $id . "/")) {
            $path = "profile/gallery/" . $id . "/";
            File::makeDirectory(public_path() . '/' . $path, 0777, true);
        }

        foreach ($files as $file) {
            $filename = "SwiftedgeVA-" . CommonHelpers::generateCramp("post") . "." . $file->getClientOriginalExtension();
            // Create directory if it does not exist
            $location = public_path('profile/gallery/' . $id . '/');

            $file->move($location, $filename);

            // update account information
            $post = new ArtisanGallery();
            $post->images = $filename;
            $post->user_id = $id;
            $post->save();
        }

        return back()->withInput()->with('response','Gallery added');


    }





    public function getMessages(){

        $messages = JobMerging::where('user_id',Auth::user()->id)->get();
        foreach ($messages as $row){
            $user = User::where('id',$row->employer_id)->get();
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



        return view('shared.messaging.messages_view', compact('message_views','receiver_id','message_id','chat_mate','user_mate'));
    }

    public static function getUser($user_id){
        return User::where('id', $user_id)->get();
    }


    public function getMyServices(){
        $service = ArtisanServices::where('user_id', Auth::user()->id)->get();
        return view('users.services', compact('service'));
    }

    public function getEditServices(Request $request){

        $id = $request->segment(3);
        $service = ArtisanServices::where('id',$id)->get();
        $category = BusinessCategory::all();
        return view('users.edit-services', compact('service','category'));
    }

    public function updateService(Request $request): RedirectResponse
    {
        $post = ArtisanServices::findOrFail($request->id);
        $post->user_id = Auth::user()->id;
        $post->title = $request->service_title;
        $post->full_name =  Auth::user()->full_name ?? null;
        $post->business_category = $request->business_category;
        $post->phone = Auth::user()->phone ?? null;
        $post->email =Auth::user()->email ?? null;
        $post->experience = $request->experience ?? null;
        $post->cost = $request->cost;
        $post->per_service = $request->per_service ?? null;
        $post->street_address = Auth::user()->location_address ?? null;
        $post->city = Auth::user()->city ?? null;
        $post->service_description = $request->service_description;
        $post->update();

        if ($post->id) {
            return back()->withInput()->with('response', 'Service added successfully');
        } else {
            return back()->withInput()->with('response', 'an error occurred');
        }

    }

    public function saveServices(Request $request){
        return $this->createArtisanServices($request);
    }

    public function addServices(){
        $category = BusinessCategory::all();
        return view('users.add-services', compact('category'));
    }


    public function getChangePassword(){
        return view('users.change-password');
    }


    public function saveProfileUpdates(Request $request): RedirectResponse
    {
        switch ($request->type) {
            case  "awards" :
                $post = new AwardsAndCertificates;
                $post->user_id = Auth::user()->id;
                $post->title = $request->title;
                $post->purpose = $request->purpose;
                $post->desc = $request->service_description;
                $post->year = $request->year;
                $post->save();
                break;
            case  "education" :
                $post = new Education;
                $post->user_id = Auth::user()->id;
                $post->title = $request->title;
                $post->purpose = $request->course_name;
                $post->desc = $request->service_description;
                $post->year = $request->year;
                $post->save();
                break;
            case  "experience" :
                $post = new Experience;
                $post->user_id = Auth::user()->id;
                $post->title = $request->title;
                $post->purpose = $request->role;
                $post->desc = $request->service_description;
                $post->year = $request->start_year. '-'.$request->end_year;
                $post->save();
                break;
            default:
                return back()->withInput()->with('error', "no operations");

        }
        return back()->withInput()->with('response', "added successfully");
    }


    public function updateProfile(Request $request){

        if(Auth::user()->state === $request->state){
            $state = Auth::user()->state;
        }else {
            $state = States::where('id',$request["state"])->value('name');
        }

        $post = User::find(Auth::user()->id);
        $post->compensation_type = $request->compensation_type;
        $post->service_description = $request->service_description;
        $post->website_address = $request->website_address;
        $post->phone = $request->phone;
        $post->date_of_birth = $request->date_of_birth;
        $post->business_name = $request->business_name;
        $post->street_address = $request->street_address;
        $post->job_preference = $request->job_preference;
        $post->min_amount = $request->min_amount;
        $post->max_amount = $request->max_amount;
        $post->city = $request["state_area"];
        $post->state = $state;
        $post->update();

        return back()->withInput()->with('response', "updated successfully");

    }


    /**
     * @param $id
     * @return Application|Factory|View
     */
    public function buyCourse($id)
    {
        $service = ArtisanServices::query()->where('id', $id)->get();
        return view('users.buy-services', compact('service'));
    }



    public function addSkills(){
        $skills = MySkill::query()->where('user_id',Auth::user()->id)->get();
        return view('users.add-skill', compact('skills'));
    }


    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function saveSkills(Request $request): RedirectResponse
    {

        $entry = new MySkill();
        $entry->title = $request->title;
        $entry->user_id = Auth::user()->id;
        $entry->url = strtolower(CommonHelpers::create_unique_slug($request->title,"my_skills","url"));
        $entry->save();

        return back()->withInput()->with('response', "added successfully");

    }




}
