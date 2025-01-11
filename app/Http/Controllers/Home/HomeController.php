<?php

namespace App\Http\Controllers\Home;

use App\Helpers\CommonHelpers;
use App\Http\Controllers\Controller;
use App\Mail\WelcomeToSwiftedgeVA;
use App\Models\ArtisanGallery;
use App\Models\ArtisanServices;
use App\Models\AwardsAndCertificates;
use App\Models\BusinessCategory;
use App\Models\City;
use App\Models\ContactUs;
use App\Models\Country;
use App\Models\CustomerRating;
use App\Models\Education;
use App\Models\EmployerJobs;
use App\Models\Experience;
use App\Models\FreelancerRequest;
use App\Models\JobApplications;
use App\Models\Locals;
use App\Models\MySkill;
use App\Models\Project;
use App\Models\ServiceRating;
use App\Models\State;
use App\Models\User;
use App\Service\HomeService;
use App\Traits\Executable;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Stevebauman\Location\Facades\Location;
use Illuminate\Support\Str;

class HomeController extends Controller
{
    use Executable;


    private HomeService $homeService;


    /**
     * @param HomeService $homeService
     */
    public function __construct(HomeService $homeService)
    {
        $this->homeService = $homeService;
    }


    /**
     * @return Application|Factory|View
     */
    public function getIndex(Request $request)
    {

       
        
        // Check if user is an influencer
        $ip = $_SERVER['REMOTE_ADDR'];
        $position = Location::get($ip);
        if (!$position) {
            $countryCode = "NG";
        } else {
            $countryCode = $position->countryCode;
        }

        /** SEO */
        $seo = CommonHelpers::seoTemplate("home");
        /** END OF SEO */

        $artisan_services = ArtisanServices::query()->where('status', 1)->get();
        $jobs = EmployerJobs::query()
        ->where('status', 0)
        ->with('employer')
        ->latest()
        ->paginate(10);

        $users = User::with('mySkills') // Fetch users and their related skills
        ->where('is_admin', 0) // Filter non-admin users
        ->whereNotNull('identity') // Ensure users have an identity
        ->limit(30)
        ->get();

        $artisans = User::with(['state', 'country', 'businessCategory'])
        ->where('is_admin', 0)
        ->whereNotNull('identity')
        ->where('is_influencer', 0)
        ->limit(30)
        ->get();

        $influencer = User::query()
        ->where('is_admin', 0) // Ensure not admin
        ->whereNotNull('identity') // Ensure identity exists
        ->where('is_influencer', 1) // Only influencers
        ->limit(30)
        ->get();

        $verified = User::query()
        ->where('is_admin', 0) // Ensure not admin
        ->whereNotNull('identity') // Ensure identity exists
        ->where('is_feature', 1) // Only influencers
        ->get();

        foreach ($artisan_services as $row) {
            $row["profile_image"] = User::query()->where('id', $row->user_id)->value('profile_image');
            $this->homeService->getServicePricesByLocation($countryCode, $row);
        }
        $skills = MySkill::all();
        $country = Country::all();
        $state_area = State::all();
        $category = BusinessCategory::all();
        $feature_category = BusinessCategory::query()->limit(6)->get();
       $index_cat = BusinessCategory::where('parent_id', 0)
            ->withCount(['users_category' => function ($query) {
                $query->whereNotNull('category_id');
            }])
            ->get();
// $index_cat = BusinessCategory::where('parent_id', 0)
//     ->withCount(['artisanServices' => function ($query) {
//         $query->where('status', 1)
//               ->whereNotNull('business_category_id');
//     }])
//     ->get();


        foreach ($index_cat as $row) {
            $row["total_service"] = ArtisanServices::query()->where('business_category_id', $row->id)->count();
        }

        $listed = [
           
            'artisans' => $artisans,
            'artisan_services' => $artisan_services,
            'feature_category' => $feature_category,
            'country' => $country,
            'state_area' => $state_area,
            'category' => $category,
            'index_cat' => $index_cat,
            'jobs' =>$jobs,
            'influencer'=> $influencer,
            'skills' => $skills,
            'verified' => $verified
        ];

        if (App::environment('production')) {
            $listed = array_merge($listed, $seo);
        }

        return view('home.index', $listed);
    }




    public function bookingForm()
    {
        return view('home.booking');
    }




    /**
     * @return Application|Factory|View
     */
    public function allFreelancers()
    {

        /** SEO */
        $seo = CommonHelpers::seoTemplate("All Freelancers");
        /** END OF SEO */





        $freelancers = User::orderBy('id', 'DESC')->where('role', 'Artisan')->where('is_admin', 0)->where('status', 1)->with( 'country','city','state')->paginate(30);
        $influencer = User::orderBy('id', 'DESC')->where('role', 'Artisan')->where('is_admin', 0)->where('is_influencer', 1)->where('status', 1)->with( 'country','city','state')->paginate(30);

        //dd($freelancers);
        foreach( $freelancers as $freelancer){
            $freelancer->service_description = $freelancer->service_description
            ? \Illuminate\Support\Str::words($freelancer->service_description, 10, '...')
            : 'No description';
        }

        $listed = ['freelancers' => $freelancers,
                    'influencer' => $influencer
                ];

        if (App::environment('production')) {
            $listed = array_merge($listed, $seo);
        }
        return view('home.freelancers', $listed);
    }


    public function getUserDetails(Request $request)
    {

        if ($request->status) {
            $request->session()->put('status', $request->status);
        }
        $id = $request->segment(2);
        // if (is_null($id)) {
        //     return back()->with('error', 'User identity not found');
        // }
        $influencer = User::where('identity', $id)->where('is_influencer', 1)->get();
        $verified =  User::where('identity', $id)->where('is_feature', 1)->get();
        $user = User::where('identity', $id)->with('city','country')->first();
            // Check if user is an influencer
    
          $galleryImages = ArtisanGallery::where('user_id', $user->id)->get();
       



        //dd(json_decode($user));
       // $country = Country::get('name');
       
        $awards = AwardsAndCertificates::where('user_id', $user->id)->get();
        $services = ArtisanServices::where('user_id', $user->id)->get();
        $education = Education::where('user_id', $user->id)
            ->where(function ($query) {
                $query->whereNotNull('title')
                    ->orWhereNotNull('desc')
                    ->orWhereNotNull('purpose')
                    ->orWhereNotNull('year');
            })
            ->get();
        $project = Project::where('user_id', $user->id)
            ->where(function ($query) {
                $query->whereNotNull('title')
                    ->orWhereNotNull('description')
                    ->orWhereNotNull('url');
            })
            ->get();

        $experience = Experience::where('user_id', $user->id)->get();
        $gallery = ArtisanGallery::where('user_id', $user->id)->get();
        $status = Session::get('status');
        $reviews = ServiceRating::query()->where('type', "freelancer")->where('user_id', $user->id)->get();
        $skills = MySkill::query()->where('user_id', $user->id)->get();

       // $exchangeRate = 1.2; // Example exchange rate
        $convertedMinAmount = $user->min_amount ? $user->min_amount : null;
        $convertedMaxAmount = $user->max_amount ? $user->max_amount : null;
        /** SEO */
        $seo = CommonHelpers::seoTemplate("Artisan (" . $user->full_name . ")");
        /** END OF SEO */

        $listed = [
            'user' => $user,
            'awards' => $awards,
            'education' => $education,
            'experience' => $experience,
            'project' => $project,
            'reviews' => $reviews,
            'gallery' => $gallery,
            'status' => $status,
            'services' => $services,
            'skills' => $skills,
            'influencer' => $influencer,
            'verified' => $verified,
         //   'country' => $country,
            'convertedMinAmount' => $convertedMinAmount,
            'convertedMaxAmount' => $convertedMaxAmount,
            'galleryImages' => $galleryImages,
        ];
        if (App::environment('production')) {
            $listed = array_merge($listed, $seo);
        }

        return view('home.candidates_details', $listed);
    }


    public function loadMoreFreelancers (Request $request){
            $offset =$request->input('offset', 0);
            $limit = 12;

            $freelancers = User::orderBy('id','DESC')->where('role','Artisan')->where('is_admin', 0)->where('status', 1)->with('city', 'state')->offset($offset)->limit($limit)->get();

          foreach( $freelancers as $freelancer){
            $freelancer->service_description = $freelancer->service_description
            ? \illuminate\Support\Str::words($freelancer->service, 10, '..')
            : ' No Description';
        }

        return response()->json($freelancers);
    }

    /**
     * @return Application|Factory|View
     */
    public function getAboutUs()
    {
        /** SEO */
        $seo = CommonHelpers::seoTemplate("About Us");
        /** END OF SEO */

        $listed = [];
        if (App::environment('production')) {
            $listed = $seo;
        }
        return view('home.about', $listed);
    }

    /**
     * @return Application|Factory|View
     */
    public function getFaqs()
    {

        /** SEO */
        $seo = CommonHelpers::seoTemplate("FAQ");
        /** END OF SEO */
        $listed = [];

        if (App::environment('production')) {
            $listed = array_merge($listed, $seo);
        }

        return view('home.faq', $listed);
    }

    /**
     * @return Application|Factory|View
     */
    public function getContactus()
    {

        /** SEO */
        $seo = CommonHelpers::seoTemplate("Contact Us");
        /** END OF SEO */
        $listed = [];

        if (App::environment('production')) {
            $listed = array_merge($listed, $seo);
        }

        return view('home.contact-us', $listed);
    }



    /**
     * @return Application|Factory|View
     */
    public function allServices()
    {

        /** SEO */
        $seo = CommonHelpers::seoTemplate("All Candidates");
        /** END OF SEO */

        $artisan_services = ArtisanServices::orderBy('id', 'DESC')->with('user')->paginate(18);

        // dd($artisan_services);

        $listed = ['artisan_services' => $artisan_services];
        if (App::environment('production')) {
            $listed = array_merge($listed, $seo);
        }

        return view('home.all_services', $listed);
    }


    /**
     * @return Application|Factory|View
     */
    public function allServicesByURL($url)
    {

        /** SEO */
        $seo = CommonHelpers::seoTemplate("All Candidates");
        /** END OF SEO */

        $category = BusinessCategory::query()->where('url', $url)->get();
        $artisan_services = ArtisanServices::query()->where('business_category_id', $category[0]->id)->orderBy('id', 'DESC')->paginate(20);

        $listed = ['artisan_services' => $artisan_services, 'category_title' => $category[0]->title];
        if (App::environment('production')) {
            $listed = array_merge($listed, $seo);
        }

        return view('home.all_services', $listed);
    }


    /**
     * @param Request $request
     * @return Application|Factory|View
     */
    public function getCategoryJobs(Request $request)
    {


        $business_category_id = BusinessCategory::where('url', $request->segment(3))->value('id') ?? 0;
        $employers_job = EmployerJobs::where('business_category_id', $business_category_id)->get();

        /** SEO */
        $seo = CommonHelpers::seoTemplate($request->segment(3));
        /** END OF SEO */

        $listed = ['employers_job' => $employers_job];
        if (App::environment('production')) {
            $listed = array_merge($listed, $seo);
        }

        return view('home.all_category_jobs', $listed);
    }

    /**
     * @param Request $request
     * @return Application|Factory|View
     */
    public function getSearchResult(Request $request)
    {


        /** SEO */
        $seo = CommonHelpers::seoTemplate("Search -" . $request->keyword);
        /** END OF SEO */

        $state_area = State::all();
        $category = BusinessCategory::all();

        if (!empty($request->keyword) && (!empty($request->job_category))) {
            $results = User::select('*')->where('full_name', 'LIKE', '%' . $request->keyword . '%')
                ->where('status', 1)->where('category_id', $request->job_category)->paginate(40);
        } elseif (!empty($request->keyword)) {
            $results = User::select('*')->where('full_name', 'LIKE', '%' . $request->keyword . '%')
                ->where('status', 1)->paginate(40);
        } else {
            $results = User::select('*')
                ->where('status', 1)->where('category_id', $request->job_category)->paginate(40);
        }

        $listed = ['freelancers' => $results, 'state_area' => $state_area, 'category' => $category];

        if (App::environment('production')) {
            $listed = array_merge($listed, $seo);
        }

        return view('home.search', $listed);
    }

    /**
     * @param Request $request
     * @return Application|Factory|View
     */
    // public function ServicesByURL(Request $request)
    // {

    //     $ip = $_SERVER['REMOTE_ADDR'];
    //     $position = Location::get($ip);
    //     if (!$position) {
    //         $countryCode = "NG";
    //     } else {
    //         $countryCode = $position->countryCode;
    //     }



    //     $url = $request->segment(2);

    //     $result = ArtisanServices::query()->where('url', $url)->get();
    //     $reviews = ServiceRating::query()->where('type', "service")->where('user_id', $result[0]->user_id)->get();

    //     $profile = User::query()->where('id', $result[0]->id)->get();

    //     foreach ($result as $row) {
    //         $row["location"] = StateAreas::query()->where('id', $row->city)->value('name');
    //         $this->homeService->getServicePricesByLocation($countryCode, $row);
    //     }

    //     /** SEO */
    //     $seo = [];
    //     /** END OF SEO */

    //     $listed = ['result' => $result, 'reviews' => $reviews, "profile" => $profile];
    //     if (App::environment('production')) {
    //         $listed = array_merge($listed, $seo);
    //     }
    //     return view('home.services_details', $listed);
    // }



    public function ServicesByURL(Request $request)
    {
        $ip = $_SERVER['REMOTE_ADDR'];
        $position = Location::get($ip);
        $countryCode = $position ? $position->countryCode : "NG";

        $url = $request->segment(2);

        // Get the single service by URL
        $service = ArtisanServices::query()->where('url', $url)->first();

        // If the service is not found, you may want to handle this case
        if (!$service) {
            return redirect()->back()->with('error', 'Service not found');
        }

        // Get reviews related to the service
        $reviews = ServiceRating::query()->where('type', "service")->where('user_id', $service->user_id)->get();

        // Get the profile of the user associated with the service
        $profile = User::query()->where('id', $service->user_id)->first();

        //dd($service->city);
        // Add location and service prices by location
        $service->location = City::query()->where('state_id', $service->city)->value('name');
        $this->homeService->getServicePricesByLocation($countryCode, $service);

        /** SEO */
        $seo = [];
        /** END OF SEO */
    //dd($service);
        $data = ['service' => $service, 'reviews' => $reviews, 'profile' => $profile];
        if (App::environment('production')) {
            $data = array_merge($data, $seo);
        }

        return view('home.services_details', $data);
    }


    /**
     * @param Request $request
     * @return Application|Factory|View
     */



    /**
     * @return Application|Factory|View
     */
    public function getBlueCollarStaffing()
    {

        /** SEO */
        $seo = CommonHelpers::seoTemplate("Blue Collar Staffing");
        /** END OF SEO */

        $listed = [];
        if (App::environment('production')) {
            $listed = array_merge($listed, $seo);
        }

        return view('home.staffing-solutions', $listed);
    }


    /**
     * @return Application|Factory|View
     */
    public function getEmployerForm()
    {




        /** SEO */
        $seo = CommonHelpers::seoTemplate("Employer form");
        /** END OF SEO */
        $country = Country::all();
        $states = State::all();
        $category = BusinessCategory::all();

        $listed = ['country' => $country,'states' => $states, 'category' => $category];
        if (App::environment('production')) {
            $listed = array_merge($listed, $seo);
        }

        return view('home.employer-form', $listed);
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function saveEmployerForm(Request $request): RedirectResponse
    {

        return $this->createEmployerAccount($request);
    }




    /**
     * @param Request $request
     * @return Application|Factory|View
     */
    public function getThisJobApplicationForm(Request $request)
    {

        /** SEO */
        $seo = CommonHelpers::seoTemplate("Job form");
        /** END OF SEO */

        $url = $request->segment(2);
        $result = EmployerJobs::where('url', $url)->where('status', 1)->get();
        $states = State::all();

        $listed = ['result' => $result, 'states' => $states];
        if (App::environment('production')) {
            $listed = array_merge($listed, $seo);
        }

        return view('home.apply_for_job', $listed);
    }

    /**
     * @return Application|Factory|View
     */
    public function getJobApplicationForm(Request $request)
    {
        /** SEO */
        $seo = CommonHelpers::seoTemplate("Job form");
        /** END OF SEO */
        $url = $request->segment(2);
        $job =  EmployerJobs::where('url', $url)->where('status', 0)->first();

        // if (!$job) {
        //     return redirect()->route('index.home')->with('error', 'Job not found.');
        // }

        $states = State::all();
        $listed = ['states' => $states,
                     'job' => $job
];
        if (App::environment('production')) {
            $listed = array_merge($listed, $seo);
        }

        return view('home.job-application-form', $listed);
    }




    public function jobs(Request $request)
    {
        /** SEO */
        $seo = CommonHelpers::seoTemplate("Find Jobs");

        // Start building the query for filtering jobs
        $query = EmployerJobs::query()
            ->where('status', 0) // Only active jobs
            ->with('employer'); // Include employer details

        // Apply filters
        if ($request->filled('keyword')) {
            $query->where('job_title', 'LIKE', '%' . $request->keyword . '%')
                  ->orWhere('job_description', 'LIKE', '%' . $request->keyword . '%');
        }

        if ($request->filled('location')) {
            $query->where('state', $request->location);
        }

        if ($request->filled('business_category_name')) {
            $query->where('business_category_name', $request->business_category_name);
        }

        if ($request->filled('hire_type')) {
            $query->where('hire_type', $request->hire_type);
        }

        // Fetch filtered jobs
        $jobs = $query->latest()->paginate(10);

        // Get unique filter options
        $locations = EmployerJobs::where('status', 0)->distinct()->pluck('country_id');
        $categories = EmployerJobs::where('status', 0)->distinct()->pluck('business_category_name');

        $listed = [
            'jobs' => $jobs,
            'locations' => $locations,
            'categories' => $categories,
        ];

        if (App::environment('production')) {
            $listed = array_merge($listed, $seo);
        }

        return view('home.jobs', $listed);
    }


    public function filterJobs(Request $request)
{
    $query = EmployerJobs::query()->where('status', 0); // Only active jobs

    // Apply filters
    if ($request->filled('keyword')) {
        $query->where('job_title', 'LIKE', '%' . $request->keyword . '%')
              ->orWhere('job_description', 'LIKE', '%' . $request->keyword . '%');
    }
    if ($request->filled('location')) {
        $query->where('state', $request->location);
    }
    if ($request->filled('business_category_name')) {
        $query->where('business_category_name', $request->business_category_name);
    }
    if ($request->filled('hire_type')) {
        $query->where('hire_type', $request->hire_type);
    }

    // Fetch filtered jobs
    $jobs = $query->get();

    // Render the jobs as HTML
    $html = view('home.util.job-list', compact('jobs'))->render();

    return view (['html' => $html]);
}



public function showJobDetails($url)
{
    /** SEO */
    $seo = CommonHelpers::seoTemplate("Find Jobs");

    $job = EmployerJobs::where('url', $url)->with('employer', 'category')->first();
    $sessionKey = 'viewed_jobs';
    $viewedJobs = session()->get($sessionKey, []);
    $job->applicants->contains('id', Auth::id());

    if (!in_array($job->id, $viewedJobs)) {
        // Increment the views count and add the job ID to the session
        $job->increment('views');
        $viewedJobs[] = $job->id;

        // Store the updated viewed jobs in the session
        session()->put($sessionKey, $viewedJobs);
    }

    if (!$job) {
        return redirect()->route('home')->with('error', 'Job not found.');
    }

    // Fetch related jobs or other dynamic content if needed
    $relatedJobs = EmployerJobs::where('business_category_id', $job->business_category_id)
        ->where('id', '!=', $job->id)
        ->take(5)
        ->first();

        $hasApplied = Auth::check() && JobApplications::where('job_id', $job->id)
        ->where('user_id', Auth::id())
        ->exists();

    return view('home.job_detail', compact('job', 'relatedJobs', 'hasApplied'));
}





    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function saveJobApplication(Request $request): RedirectResponse
    {

        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'You must be logged in to apply for jobs.');
        }

        // Validate the input
        $request->validate([
            'job_id' => 'required|exists:employer_jobs,id',
            'full_name' => 'required|string|max:255',
            'email' => 'required|email',
            'location_address' => 'required|string',
            'skills' => 'required|array',
            'skills.*' => 'required|string',
            'skillLevel' => 'required|string',
            'availability' => 'required|string',
            'date_of_birth' => 'required|date',
            'certification' => 'required|string',
            'phone' => 'required|string|max:20',
            'cv' => 'nullable|mimes:pdf,doc,docx|max:10240', // Max 10MB
        ]);

        // Check if the user has already applied for the job
        $jobId = $request->job_id;
        $existingApplication = JobApplications::where('job_id', $jobId)
            ->where('user_id', Auth::id())
            ->first();

        if ($existingApplication) {
            return redirect()->back()->with('error', 'You have already applied for this job.');
        }

                // Fetch job and employer information
            $job = EmployerJobs::find($request->job_id);
            if (!$job) {
                return redirect()->back()->with('error', 'Job not found.');
            }

            $employerId = $job->user_id;

            $application = new JobApplications();
            $application->user_id = Auth::id();
            $application->job_id = $job->id;
        $application->full_name = Auth::user()->full_name ?? $request->fullName;
        $application->location_address = $request->address . "," . $request->city . "," . $request->State . "," . $request->country;
        $application->email = Auth::user()->email ?? $request->emailAddress;
        $application->phone = Auth::user()->phone ?? $request->phoneNumber;
        $application->dob = $request->dob;
        $application->skills = implode(',', $request->skills);
        $application->skillLevel = $request->skillLevel;
        $application->availability = Auth::user()->availability ?? $request->availability;
        $application->certification = $request->certification;
        $application->employer_id = $job->user_id;

            // Save the application
            $application->save();

        if ($request->hasFile('cv')) {
            $file = $request->file('cv');

            // Allowed file extensions
            $allowedExtensions = ['docx', 'pdf', 'doc', 'odt', 'xls', 'xlsx', 'ppt', 'pptx'];
            if (!in_array($file->getClientOriginalExtension(), $allowedExtensions)) {
                return back()->with('error', 'Unsupported file type. Please upload a valid document.');
            }


            // Sanitize and create the file name
            $userFullName = preg_replace('/[^A-Za-z0-9_\-]/', '_', Auth::user()->full_name); // Replace special characters with underscores
            $fileName = $userFullName . '_job_cv_' . time() . '.' . $file->getClientOriginalExtension();

            // Define the directory inside the profile folder
            $directory = 'profile/job_cvs/';
            $fullDirectoryPath = public_path($directory);

            // Ensure the directory exists
            if (!File::exists($fullDirectoryPath)) {
                File::makeDirectory($fullDirectoryPath, 0777, true);
            }

            // Move the file to the desired directory
            $file->move($fullDirectoryPath, $fileName);

            // Save the relative path to the database
            $application->cv = $directory . $fileName;
        }

        if ($request->has('skills')) {
            $application->skills = implode(', ', $request->skills);
        }



        return redirect()->route('job.detail', ['url' => $request->job_url])
        ->with('success', 'Your application has been submitted successfully.');


    }


    /**
     * @return Application|Factory|View
     */
    public function register()
    {

        /** SEO */
        $seo = CommonHelpers::seoTemplate("Registration");
        /** END OF SEO */

        $country = Country::all();

        $listed = ['country' => $country];
        if (App::environment('production')) {
            $listed = array_merge($listed, $seo);
        }


        return view('home.register', $listed);
    }

    /**
     * @param Request $request
     * @return Application|Factory|View|RedirectResponse
     */
    // public function registerAsArtisan2(Request $request) {


    //     /** SEO */
    //     $seo = CommonHelpers::seoTemplate("Register As An Artisan");
    //     /** END OF SEO */

    //     if($request->email != null){
    //         $validator = Validator::make($request->all(), [
    //             'fullname' => 'required|string|max:25',
    //             'email' => 'required|string|email|max:255|unique:users',
    //             'phone' => 'required|numeric|unique:users',
    //             'password' => 'required|string|min:6|confirmed',
    //         ]);
    //     }else {
    //         $validator = Validator::make($request->all(), [
    //             'fullname' => 'required|string|max:25',
    //             'phone' => 'required|numeric|unique:users',
    //             'password' => 'required|string|min:6|confirmed',
    //         ]);
    //     }

    //     if ($validator->fails()) {
    //         return redirect()->route('index.register')->withErrors($validator)->withInput();
    //     }


    //     $details_one = $request->all();
    //     $category  = BusinessCategory::all();

    //     $listed = ['category' => $category, 'old_request' => $details_one];
    //     if (App::environment('production')) {
    //         $listed = array_merge($listed,$seo);
    //     }

    //     return view('home.register_as_artisan_step_2', $listed);
    // }
    public function createUser(Request $request)
    {
        // SEO
        $seo = CommonHelpers::seoTemplate("Register As An Artisan");

        // Validation rules
        $rules = [
            'fullname' => 'required|string|max:50',
            'email' => 'required|string|email|max:255|unique:users',
            'phone' => 'required|numeric|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ];


        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return redirect()->route('index.register')
                ->withErrors($validator)
                ->withInput();
        }

        // Create new user
        $user = new User();
        $user->role = "Artisan";
        $user->full_name = $request->fullname;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->phone = $request->phone;
        //dd($user);
        $user->save();

        // Redirect to login with success message
        return redirect()->route('login')
            ->with('response', 'Your registration was successful, please login');
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     */
    // public function saveArtisan(Request $request): RedirectResponse
    // {


    //     $step_one       = $request->old_request;
    //     $fullname       = $step_one[1];
    //     $email          =  $step_one[2];
    //     $phone          = $step_one[3];
    //     $dob            = $step_one[4];
    //     $country        = $step_one[5];
    //     $state          = $step_one[6];
    //     $state_area     = $step_one[7];
    //     $street         = $step_one[8];
    //     $password       = $step_one[9];


    //     if (!empty($email)) {
    //         $check = User::where('email', $email)->count();
    //         if ($check > 0) {
    //             return redirect()->route('index.register.artisan')->with('error', 'Email Address already exist');
    //         }
    //     }
    //     if (!empty($phone)) {

    //         $check = User::where('phone', $phone)->count();
    //         if ($check > 0) {
    //             return redirect()->route('index.register.artisan')->with('error', 'Phone Number already exist');
    //         }
    //     }

    //     $bus_category = $request->BusinessCategory;
    //     $check_ = BusinessCategory::where('id', $bus_category)->get();
    //     if ($check_->count() == 0) {
    //         return redirect()->route('index.register.artisan')->with('error', 'Invalid Category');
    //     }

    //     $identity               = CommonHelpers::generateCramp("user");
    //     $verify                 = CommonHelpers::code_ref(6);


    //     $state                  = States::where('id', $state)->value('name');
    //     $post                   = new User();
    //     $post->role             = "Artisan";
    //     $post->full_name        = $fullname;
    //     $post->email            = $email;
    //     $post->password         = bcrypt($password);
    //     $post->phone            = $phone;
    //     $post->date_of_birth    = $dob ?? null;
    //     $post->street_address   = $street;
    //     $post->city             = $state_area ?? null;
    //     $post->state            = $state ?? null;
    //     $post->country          = $request->country;
    //     $post->work_experience  = $request->WorkExperience;
    //     $post->business_category = $check_[0]->title;
    //     $post->category_id      =  $check_[0]->id;

    //     $post->website_address  = $request->WebsiteAddress;
    //     $post->service_description = $request->ServiceDescription;
    //     $post->identity         = $identity;
    //     $post->verify_code      = $verify;

    //     $post->save();

    //     if (!empty($email)) {
    //         $details    =   [
    //             'name' => $fullname,
    //             'email' => $email,
    //             'link' => url('verify-account/' . $identity . '/' . $verify)
    //         ];
    //         Mail::to($email)->send(new WelcomeToSwiftedgeVA($details));
    //     }


    //     return redirect()->route('login')->with('response', 'Your registration was successful, please login');
    // }


    /**
     * @return Application|Factory|View
     */
    public function getLogin()
    {

        /** SEO */
        $seo = CommonHelpers::seoTemplate("Login");
        /** END OF SEO */

        $listed = [];
        if (App::environment('production')) {
            $listed = array_merge($listed, $seo);
        }

        return view('home.login', $listed);
    }





    /**
     * @param Request $request
     * @return Collection
     */



    // public function getStates(Request $request): Collection
    // {
    //     if ($request->segment(2)) {
    //         return State::where('country_id', $request->segment(2))->get();
    //     } else {
    //         return State::all();
    //     }
    // }



    // /**
    //  * @param Request $request
    //  * @return Collection
    //  */
    // public function getStatesAreas(Request $request): Collection
    // {
    //     if ($request->segment(2)) {
    //         return City::where('state_id', $request->segment(2))->get();
    //     } else {
    //         return StateAreas::all();
    //     }
    // }



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


    // public function getStates(Request $request): Collection
    // {
    //     if ($request->segment(2)) {
    //         return State::where('country_id', $request->segment(2))->get();

    //     } else {
    //         return State::all();
    //     }

    // }



    // /**
    //  * @param Request $request
    //  * @return Collection
    //  */
    // public function getCities(Request $request): Collection
    // {
    //     if ($request->segment(2)) {
    //         return City::where('state_id', $request->segment(2))->get();

    //     } else {
    //         return City::all();
    //     }

    // }


    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function ChangeUserPassword(Request $request): RedirectResponse
    {
        $user = Auth::user();

        if (!Hash::check($request->current_password, $user->password)) {
            return back()->withInput()->with('response', "The current password is incorrect");
        }

        $validator = Validator::make($request->all(), [
            'new_password' => ['nullable', 'string'],
            'confirm_new_password' => ['nullable', 'required_with:new_password', 'same:new_password']
        ]);

        if ($validator->fails()) {
            return back()->withInput()->with('response', "Password didn't match or your current password is wrong");
        }

        $password = $request->new_password;
        $encrypt_pass = bcrypt($password);
        $Users = Auth::user();
        $Users->password = $encrypt_pass;
        $Users->save();

        return back()->withInput()->with('response', 'Password Updated Successfully');
    }


    /**
     * @return Application|Factory|View
     */
    public function terms()
    {

        /** SEO */
        $seo = CommonHelpers::seoTemplate("Login");
        /** END OF SEO */

        $listed = [];
        if (App::environment('production')) {
            $listed = array_merge($listed, $seo);
        }
        return view('home.terms', $listed);
    }

    /**
     * @return Application|Factory|View
     */
    public function Tailoring()
    {
        return view('home.tailoring');
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function SubmitReviews(Request $request): RedirectResponse
    {
        if ($request->rating_pro):
            $data = CommonHelpers::StoreReviews($request);
            if ($data->id) {
                return redirect()->back()->with('response', 'Rating was successful');
            }
        endif;
        return redirect()->back()->with('error', 'something went wrong');
    }


    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function SubmitContactCandidate(Request $request): RedirectResponse
    {
        $message = "Thank you for your interest in hiring " . $request->full_name . " Kindly submit your job vacancy in order to hire the candidate";
        return redirect()->back()->with('response', $message);
    }

    /**
     * @return RedirectResponse
     */
    public function SubmitContactPhoneCandidate(): RedirectResponse
    {
        $message = "To view this candidate's phone number, kindly submit your job vacancy.";
        return redirect()->back()->with('response', $message);
    }


    /**
     * @param Request $request
     * @return Application|RedirectResponse|Redirector
     */
    public function storeContactus(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'name_contact' => 'required|string|max:255',
            'message_contact' => 'required|string|max:255',
            'phone_contact' => 'required|string|max:255',
            'email_contact' => 'required|string|email|max:255',
            'verify_contact' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            return redirect('/contact-us')
                ->withErrors($validator)
                ->withInput();
        }

        $post = new ContactUs();
        $post->firstname = $request->name_contact;
        $post->email = $request->email_contact;
        $post->phone = $request->phone_contact;
        $post->message = $request->message;

        $post->save();
        return back()->withInput()->with('response', 'Thanks for messaging us, we will contact you soon');
    }

    /**
     * @param Request $request
     * @return Application|RedirectResponse|Redirector
     */
    public function VerifyUserAccount(Request $request)
    {

        $verify_code = $request->segment(3);

        $check = User::where('verify_code', $verify_code)->where('status', 0)->get();
        if ($check->count() > 0) {
            $data = User::find($check[0]->id);

            if ($check[0]->role === "Employer") {
                $data->status = 1;
            }
            $data->is_verified = 1;
            $data->update();

            return redirect('/account/login')->with('response', 'account verified');
        } else {
            return back()->withInput()->with('responses', 'Invalid code');
        }
    }


    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public static function StoreReviewsFreelancer(Request $request): RedirectResponse
    {
        $data = new ServiceRating();
        $data->user_id = $request->user_id;
        $data->rating_user = Auth::user()->id;
        $data->full_name = $request->author;
        $data->email = $request->email;
        $data->type = "freelancer";
        $data->review = $request->review;
        $data->rating = $request->rating ?? 5;
        $data->save();
        return back()->withInput()->with('response', 'Rating added successfully');
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public static function StoreReviewsService(Request $request): RedirectResponse
    {
        $data = new ServiceRating();
        $data->user_id = $request->user_id;
        $data->rating_user = Auth::user()->id;
        $data->service_id = $request->service_id;
        $data->type = "service";
        $data->full_name = $request->author;
        $data->email = $request->email;
        $data->review = $request->review;
        $data->rating = $request->rating ?? 5;
        $data->save();
        return back()->withInput()->with('response', 'Rating added successfully');
    }


    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function sendFreelancersRequest(Request $request): RedirectResponse
    {


        $data = new FreelancerRequest();
        $data->full_name = $request->full_name;
        $data->phone_number = $request->phone_number;
        $data->email = $request->email;
        $data->subject = $request->subject;
        $data->message = $request->message;
        $data->freelancer_id = $request->freelancer_id;
        $data->save();
        return back()->withInput()->with('response', 'Request sent successfully');
    }
}
