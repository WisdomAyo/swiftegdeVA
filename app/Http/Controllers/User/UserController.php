<?php

namespace App\Http\Controllers\User;

use App\Helpers\CommonHelpers;
use App\Http\Controllers\Controller;
use App\Models\ArtisanGallery;
use App\Models\ArtisanServices;
use App\Models\AwardsAndCertificates;
use App\Models\BusinessCategory;
use App\Models\ChatMessages;
use App\Models\Country;
use App\Models\Education;
use App\Models\Experience;
use App\Models\Invoices;
use App\Models\JobMerging;
use App\Models\JobApplications;
use App\Models\Language;
use App\Models\MySkill;
use App\Models\Project;
use App\Models\State;
use App\Models\City;
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
use Illuminate\Support\Facades\Log;




class UserController extends Controller
{
    use Executable;

    public function getIndex()
    {

        if (Auth::user()) {
            if (Auth::user()->user_status == 0) {
                return back()->withInput()->with('error', "Account is disabled, contact admin");
            } else {
                return redirect()->route('user.login');
            }
        }
        return view('user.login');
    }

    public function getAdminIndex()
    {
        $user = Auth::user();
        $messages = ChatMessages::where('sender_id', Auth::user()->id)->orWhere('receiver_id', Auth::user()->id)->count();
        $jobs = Invoices::where('user_id', Auth::user()->id)->count();
        $service = ArtisanServices::where('user_id', Auth::user()->id)->count();
        $galleryImages = ArtisanGallery::where('user_id', Auth::user()->id)->get();
        $identity = $user->identity;



        return view('users.dashboard', compact('service', 'jobs', 'messages', 'galleryImages', 'identity', 'user'));
    }

    public function getJobs()
    {

        $jobs = DB::table("job_mergings")->where('job_mergings.user_id', Auth::user()->id)
            ->join('employer_jobs', 'job_mergings.employer_id', '=', 'employer_jobs.user_id')
            ->select('job_mergings.*', 'employer_jobs.*')
            ->get();

        $applications = JobApplications::where('user_id', Auth::id())
            ->with('job') // Assuming a `job` relation on `JobApplications`
            ->get();

        return view('users.job', compact('jobs', 'applications'));
    }






    public function getProfile()
    {

        
        $states = State::all();
        $country = Country::all();
        $category = BusinessCategory::all();
        // $states = States::all();
        $user = Auth::user();

        // Fetch education data

        $gallery = ArtisanGallery::where('user_id', Auth::user()->id)->get();
        $award = AwardsAndCertificates::where('user_id', $user->id)->get();
        $education = Education::where('user_id', $user->id)->get();
        $skills = MySkill::where('user_id', $user->id)->get();
        $experience = Experience::where('user_id', Auth::user()->id)->get();
        // Fetch other user-related data as needed
        $projects = Project::where('user_id', $user->id)->get();
        $languages = Language::where('user_id', $user->id)->get();

        $socialMedia = json_decode($user->social_media, true);

// Separate handling based on user type
$socialMedia = json_decode($user->social_media, true) ?? [];

// Separate handling based on user type
$facebook = $socialMedia['facebook'] ?? null;
$instagram = $socialMedia['instagram'] ?? null;

if ($user->is_influencer) {
    // Filter and reindex platforms to ensure proper structure
    $platforms = array_filter($socialMedia, function ($platform) {
        return is_array($platform) && isset($platform['platform'], $platform['followers'], $platform['handle']);
    });
    $platforms = array_values($platforms); // Reindex the array to avoid gaps in indices
} else {
    $platforms = [
        ['platform' => 'Facebook', 'followers' => null, 'handle' => $facebook],
        ['platform' => 'Instagram', 'followers' => null, 'handle' => $instagram],
    ];
}

        // dd($experience);
        $cities = City::where('state_id', $user->state_id)->get();  
        $listed = [
            'experience' => $experience,
            'states' => $states,
            'country' => $country,
            'category' => $category,
            'user' => $user,
            'education' => $education,
            'projects' => $projects,
            'languages' => $languages,
            'skills' => $skills,
            'award' => $award,
            'gallery' => $gallery,
            'facebook'=> $facebook,
            'instagram' => $instagram,
            'platforms' => $platforms,
            'cities' => $cities,

        ];
        return view('users.profile', $listed);
    }

    public function getEducation()
    {
        $education = Education::where('user_id', Auth::user()->id)->get();
        return view('users.education', compact('education'));
    }

    public function getExperience()
    {
        $experience = Experience::where('user_id', Auth::user()->id)->get();
        return view('users.experience', compact('experience'));
    }

    public function getAwards()
    {
        $award = AwardsAndCertificates::where('user_id', Auth::user()->id)->get();
        return view('users.awards', compact('award'));
    }

    public function getProfilePhoto()
    {
        return view('users.add_dp');
    }

    public function getGallery()
    {
        $gallery = ArtisanGallery::where('user_id', Auth::user()->id)->get();
        return view('users.gallery', compact('gallery'));
    }

    public function UpdateGalleryPhoto(Request $request)
    {

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

        return back()->withInput()->with('response', 'Gallery added');
    }





    public function getMessages()
    {

        $messages = JobMerging::where('user_id', Auth::user()->id)->get();
        foreach ($messages as $row) {
            $user = User::where('id', $row->employer_id)->get();
            $row["full_name"] = $user[0]["full_name"];
            $row["skills"] = $user[0]["skills"];
            $row["location_address"] = $user[0]["state"] . ', ' . $user[0]["city"];
            $row["skillLevel"] = $user[0]["business_category"];
            $row["profile_image"] = $user[0]["profile_image"];
            $row["identity"] = $user[0]["identity"];
        }

        $messages_2 = ChatMessages::where('sender_id', Auth::user()->id)->where('receiver_id', 1)->get();
        foreach ($messages_2 as $row) {
            $user = User::where('id', 1)->get();
            $row["full_name"] = $user[0]["full_name"];
            $row["location_address"] = $user[0]["state"] . ', ' . $user[0]["city"];
            $row["profile_image"] = $user[0]["profile_image"];
            $row["identity"] = $user[0]["identity"];
        }

        return view('shared.messaging.message', compact('messages', 'messages_2'));
    }

    public function chatMessage2(Request $request)
    {
        $chat_mate = User::where('identity', $request->segment(3))->get();
        $user_mate = User::where('id', Auth::user()->id)->get();
        $message_id = $request->segment(3);

        $message_views = ChatMessages::Where('sender_id', Auth::user()->id)
            ->orWhere('receiver_id', Auth::user()->id)
            ->orWhere('sender_id', $chat_mate[0]['id'])
            ->orWhere('receiver_id', $chat_mate[0]['id'])->get();
        $receiver_id = User::where('identity', $message_id)->value('id');



        return view('shared.messaging.messages_view', compact('message_views', 'receiver_id', 'message_id', 'chat_mate', 'user_mate'));
    }

    public static function getUser($user_id)
    {
        return User::where('id', $user_id)->get();
    }


    public function getMyServices()
    {
        $service = ArtisanServices::where('user_id', Auth::user()->id)->get();
        return view('users.services', compact('service'));
    }

    public function getEditServices(Request $request)
    {

        $id = $request->segment(3);
        $service = ArtisanServices::where('id', $id)->get();
        $category = BusinessCategory::all();
        return view('users.edit-services', compact('service', 'category'));
    }

    public function updateService(Request $request): RedirectResponse
    {
        $post = ArtisanServices::findOrFail($request->id);
        $post->user_id = Auth::user()->id;
        $post->title = $request->service_title;
        $post->full_name = Auth::user()->full_name ?? null;
        $post->business_category = $request->business_category;
        $post->phone = Auth::user()->phone ?? null;
        $post->email = Auth::user()->email ?? null;
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

    public function saveServices(Request $request)
    {
        return $this->createArtisanServices($request);
    }

    public function addServices()
    {
        $category = BusinessCategory::all();
        return view('users.add-services', compact('category'));
    }


    public function getChangePassword()
    {
        $user = Auth::user();
        
        return view('users.change-password', compact('user'));
    }


    public function saveProfileUpdates(Request $request): RedirectResponse
    {
        switch ($request->type) {
            case "awards":
                $post = new AwardsAndCertificates;
                $post->user_id = Auth::user()->id;
                $post->title = $request->title;
                $post->purpose = $request->purpose;
                $post->desc = $request->service_description;
                $post->year = $request->year;
                $post->save();
                break;
            case "education":
                $post = new Education;
                $post->user_id = Auth::user()->id;
                $post->title = $request->title;
                $post->purpose = $request->course_name;
                $post->desc = $request->service_description;
                $post->year = $request->year;
                $post->save();
                break;
            case "experience":
                $post = new Experience;
                $post->user_id = Auth::user()->id;
                $post->title = $request->title;
                $post->purpose = $request->role;
                $post->desc = $request->service_description;
                $post->year = $request->start_year . '-' . $request->end_year;
                $post->save();
                break;
            default:
                return back()->withInput()->with('error', "no operations");
        }
        return back()->withInput()->with('response', "added successfully");
    }


    public function updateProfile(Request $request)
    {

        if (Auth::user()->state_id === $request->state) {
            $state_id = Auth::user()->state_id;
        } else {
            $state_id = State::where('id', $request["state_id"])->value('name');
        }

        $post = Auth::user();
        $post->fill($request->only([
            'full_name',
            'identity',
            'availability',
            'phone',
            'date_of_birth',
            'street_address',
            'city_id',
            'state_id',
            'profile_image',
            'location_address',
            'delivery_address',
            'business_category',
            'business_name',
            'facebook',
            'instagram',
            'work_experience',
            'website_address',
            'service_description',
            'agreement_status',
            'compensation_type',
            'job_preference',
            'min_amount',
            'max_amount',
            'usd_rate',
            'gbp_rate',
            'eur_rate',
            'ngn_rate',
            'video_url',
            'video_file',
            'company_logo',
            'skillLevel'
        ]));

        $post->update();


        return back()->withInput()->with('response', "updated successfully");
    }



public function storeUser(Request $request)
{
    $user = Auth::user();
    $data = $request->except(
        'skills', 'school', 'project_title', 'language', 'education_id', 'project_id',
        'language_id', 'award_id', 'resume', 'title', 'experience_id', 'start_year',
        'end_year', 'currently_working', 'role', 'service_description', 'profile_image',
        'delete_profile_image', 'company_logo', 'video_file', 'video_url', 'social_media'
    );
      //dd($request);
    try {

        $rules = [
            'service_description' => 'nullable|string|max:10000',
            'profile_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'video_file' => 'nullable|mimes:mp4,mov,avi|max:20480', // 20MB max size
            'video_url' => 'nullable|url',
            'facebook' => 'nullable|url',
            'instagram' => 'nullable|url',
            'social_media.*.platform' => 'required_if:is_influencer,1|string',
            'social_media.*.followers' => 'required_if:is_influencer,1|integer|min:0',
            'social_media.*.handle' => 'required_if:is_influencer,1|string',
            'skills' => 'nullable|string',
            'school.*' => 'nullable|string',
            'project_title.*' => 'nullable|string',
            'award.*' => 'nullable|string',
            'title.*' => 'nullable|string',
            'experience_id.*' => 'nullable|integer',
            'start_year.*' => 'nullable|integer|min:1900|max:' . date('Y'),
            'end_year.*' => 'nullable|integer|min:1900|max:' . date('Y'),
            'resume' => 'nullable|mimes:pdf,doc,docx|max:10240', // 10MB max size
        ];

        $request->validate($rules);


        if (is_null($user->identity)) {
            $data['identity'] = CommonHelpers::generateCramp("user");
        }

        // Update basic user information
        if (!empty($data)) {
            $user->update($data);
        }

        // Handle Profile Picture Update
        if ($request->has('update_profile_image')) {
            $request->validate(['profile_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048']);
            $user->profile_image = $this->handleFileUpload($request->file('profile_image'), 'profile/profile_image', $user->id);
            $user->save();
            return redirect()->back()->with('success', 'Profile picture updated successfully.');
        }

        //Process Video File
        if ($request->hasFile('video_file')) {
            $videoFile = $request->file('video_file');
            Log::info('Uploading video file', [
                'original_name' => $videoFile->getClientOriginalName(),
                'size' => $videoFile->getSize(),
                'mime_type' => $videoFile->getMimeType(),
            ]);

            $directoryPath = "profile/videos/" . $user->id . "/";
            $filename = 'video_' . time() . '.' . $videoFile->getClientOriginalExtension();

            // Ensure directory exists
            if (!is_dir(public_path($directoryPath))) {
                File::makeDirectory(public_path($directoryPath), 0777, true);
            }

            // Delete old video if exists
            if ($user->video_file && File::exists(public_path($user->video_file))) {
                File::delete(public_path($user->video_file));
            }

            // Save new video file
            $videoFile->move(public_path($directoryPath), $filename);

            // Update user's video file path in the database
            $user->update(['video_file' => $directoryPath . $filename]);
        }


        // Process Video URL
        if ($request->has('video_url')) {
            $user->update(['video_url' => $request->video_url]);
        }

        // Handle Social Media based on influencer status
        if ($request->has('is_influencer')) {
            $isInfluencer = (bool) $request->is_influencer;
            // Validate social media input for all users
            $request->validate([
                'social_media.*.platform' => 'required|string',
                'social_media.*.handle' => 'required|string',
                'social_media.*.followers' => 'nullable|integer|min:0',
            ]);
            $socialMedia = $request->input('social_media', []); // Unified input for all users
            // Update the user record
            $user->update([
                'is_influencer' => $isInfluencer,
                'social_media' => json_encode($socialMedia), // Store as JSON
            ]);
        }

            // Process Education Data
            if ($request->has('school')) {
                foreach ($request->school as $key => $school) {
                    if (!empty($school)) {
                        Education::updateOrCreate(
                            [
                                'user_id' => $user->id,
                                'id' => $request->education_id[$key] ?? null,
                            ],
                            [
                                'title' => $school,
                                'desc' => $request->degree[$key] ?? null,
                                'purpose' => $request->field_of_study[$key] ?? null,
                                'year' => $request->year[$key] ?? null,
                            ]
                        );
                    }
                }
            }



                //Process  Gallery image
            if ($request->hasFile('gallery_images')) {
                foreach ($request->file('gallery_images') as $file) {
                    $filename = 'SwiftedgeVA-' . time() . '_' . $file->getClientOriginalName();
                    $directoryPath = "profile/gallery/" . $user->id . "/";
                    if (!is_dir(public_path($directoryPath))) {
                        File::makeDirectory(public_path($directoryPath), 0777, true);
                    }
                    $file->move(public_path($directoryPath), $filename);
                    ArtisanGallery::create([
                        'user_id' => $user->id,
                        'images' => $directoryPath . $filename,
                    ]);
                }
            }
                // Handle deletion of gallery images
            if ($request->has('delete_gallery_images')) {
                foreach ($request->delete_gallery_images as $imageId) {
                    $gallery = ArtisanGallery::find($imageId);
                    if ($gallery && File::exists(public_path($gallery->images))) {
                        File::delete(public_path($gallery->images));
                    }
                    $gallery?->delete();
                }
            }


            if ($request->has('award')) {
                foreach ($request->award as $key => $award) {
                    if (!empty($award)) {
                        AwardsAndCertificates::updateOrCreate(
                            [
                                'user_id' => $user->id,
                                'id' => $request->award_id[$key] ?? null,
                            ],
                            [
                                'title' => $award,
                                'purpose' => $request->purpose[$key] ?? null,
                                'desc' => $request->description[$key] ?? null,
                                'year' => $request->year[$key] ?? null,
                            ]
                        );
                    }
                }
            }


         
            if ($request->has('experience')) {
                foreach ($request->experience as $key => $experience) {
                    if (!empty($experience)) {
                        $startYear = $request->start_year[$key] ?? null;
                        $endYear = isset($request->currently_working[$key]) && $request->currently_working[$key]
                            ? 'Present'
                            : ($request->end_year[$key] ?? null);
                        Experience::updateOrCreate(
                            [
                                'user_id' => $user->id,
                                'id' => $request->experience_id[$key] ?? null,
                            ],
                            [
                                'title' => $experience,
                                'purpose' => $request->role[$key] ?? null,
                                'desc' => $request->desc[$key] ?? null,
                                'year' => $startYear . ' - ' . $endYear,
                                'currently_working' => isset($request->currently_working[$key]) ? true : false,
                            ]
                        );
                    }
                }
            }


             // Process Skills Data
            if ($request->has('skills')) {
                $submittedSkills = explode(',', $request->skills);
                $submittedSkills = array_map('trim', $submittedSkills);
                // Add new skills
                foreach ($submittedSkills as $skill) {
                    if (!empty($skill)) {
                        MySkill::firstOrCreate([
                            'user_id' => $user->id,
                            'title' => $skill,
                        ]);
                    }
                }
                // Remove skills not in the submitted list
                MySkill::where('user_id', $user->id)
                    ->whereNotIn('title', $submittedSkills)
                    ->delete();
            }
            // Process Resume Upload
                if ($request->hasFile('resume')) {
                    $resume = $request->file('resume');
                    $request->validate([
                        'resume' => 'mimes:pdf,doc,docx|max:10240', // Max file size: 10MB
                    ]);
                    $filename = time() . '.' . $resume->getClientOriginalExtension();
                    $directoryPath = "profile/resume/" . $user->id . "/";
                    if (!is_dir(public_path($directoryPath))) {
                        File::makeDirectory(public_path($directoryPath), 0777, true);
                    }
                    $resume->move(public_path($directoryPath), $filename);
                    $user->update(['resume' => $directoryPath . $filename]);
                }

                // Process Language Data
                if ($request->has('language')) {
                    foreach ($request->language as $key => $language) {
                        if (!empty($language)) {
                            Language::updateOrCreate(
                                [
                                    'user_id' => $user->id,
                                    'id' => $request->language_id[$key] ?? null,
                                ],
                                [
                                    'language' => $language,
                                ]
                            );
                        }
                    }
                }

                 // Process Project Data
                    if ($request->has('project_title')) {
                        foreach ($request->project_title as $key => $title) {
                            if (!empty($title)) {
                                Project::updateOrCreate(
                                    [
                                        'user_id' => $user->id,
                                        'id' => $request->project_id[$key] ?? null,
                                    ],
                                    [
                                        'title' => $title,
                                        'description' => $request->project_description[$key] ?? null,
                                        'url' => $request->project_url[$key] ?? null,
                                    ]
                                );
                            }
                        }
                    }




        if ($request->ajax()) {
            return response()->json(['success' => true, 'message' => 'Profile updated successfully.']);
        }

        return back()->withInput()->with('response', 'Profile updated successfully.');

  

    //    } catch (\Exception $e) {
    //     $errorMessage = 'Unexpected Error: ' . $e->getMessage();
    //     Log::error($errorMessage);

    //     // SweetAlert-friendly response for Ajax
    //     if ($request->ajax()) {
    //         return response()->json(['success' => false, 'message' => $errorMessage]);
    //     }

    //     return back()->withErrors($errorMessage);
    // }

} catch (\Illuminate\Validation\ValidationException $e) {
    // Log the detailed validation errors
    Log::error('Validation Error: ', $e->errors());

    // Use SweetAlert to display all validation errors
    $errorMessages = collect($e->errors())
        ->map(function ($messages, $field) {
            return "<strong>{$field}</strong>: " . implode('<br>', $messages);
        })
        ->implode('<br><br>');

    return back()->with('validationErrors', $errorMessages);
} catch (\Exception $e) {
    // Log unexpected errors
    Log::error('Unexpected Error: ', [
        'message' => $e->getMessage(),
        'file' => $e->getFile(),
        'line' => $e->getLine(),
    ]);

    return back()->with('error', 'An unexpected error occurred. Please try again.');
}
}




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




    public function deleteEducation($id)
    {
        $education = Education::findOrFail($id);
        $education->delete();

        return response()->json(['success' => 'Education record deleted successfully.']);
    }

    public function deleteExperience($id)
    {
        $experience = Experience::findOrFail($id);
        $experience->delete();

        return response()->json(['success' => 'Experience record deleted successfully.']);
    }


    public function deleteAward($id)
    {
        $award =  AwardsAndCertificates::findOrFail($id);
        $award->delete();

        return response()->json(['success' => 'Award / Certificate record deleted successfully.']);
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



    public function addSkills()
    {
        $skills = MySkill::query()->where('user_id', Auth::user()->id)->get();
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
        $entry->url = strtolower(CommonHelpers::create_unique_slug($request->title, "my_skills", "url"));
        $entry->save();

        return back()->withInput()->with('response', "added successfully");
    }

    public function destroySkills($id)
    {
        $skill = MySkill::findOrFail($id);

        // Ensure the skill belongs to the authenticated user before deleting
        if ($skill) {
            $skill->delete();
            return redirect()->back()->with('success', 'Skill deleted successfully.');
        }

        return redirect()->back()->with('error', 'You are not authorized to delete this skill.');
    }

    public function deleteGalleryImage($id)
    {
        $image = ArtisanGallery::findOrFail($id);

        // Delete the file from the directory
        if (File::exists(public_path($image->images))) {
            File::delete(public_path($image->images));
        }

        // Delete the record from the database
        $image->delete();

        return redirect()->back()->with('success', 'Gallery image deleted successfully.');
    }



    public function getStates($countryId)
    {
        try {
            $states = State::where('country_id', $countryId)->get(['id', 'name']);
            return response()->json($states);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Unable to fetch states. Please try again.'], 500);
        }
    }

    public function getCities($stateId)
    {
        try {
            $cities = City::where('state_id', $stateId)->get(['id', 'name']);
            return response()->json($cities);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Unable to fetch cities. Please try again.'], 500);
        }
    }

}
