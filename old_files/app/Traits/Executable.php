<?php

namespace App\Traits;

use App\Helpers\CommonHelpers;
use App\Mail\WelcomeToSwiftedgeVA;
use App\Models\ArtisanServices;
use App\Models\EmployerJobs;
use App\Models\EmployerRequest;
use App\Models\States;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

trait Executable
{


    public function createEmployerAccount($request){

        $validator = Validator::make($request->all(), [
            'fullname' => 'required|string|max:25',
            'phone' => 'required|numeric',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }


        $identity = CommonHelpers::generateCramp("user");
        $verifycode = CommonHelpers::code_ref(6);

        $state = States::where('id',$request->state)->value('name');
        $post = new User();
        $post->role = "Employer";
        $post->full_name = $request->fullname;
        $post->email = $request->email;
        $post->password = bcrypt($request->password);
        $post->phone = $request->phone;
        $post->business_name = $request->office_title;
        $post->state = $state;
        $post->category_id = $request->country_ep;
        $post->city =  $request->state_area_ep;
        $post->is_admin = 2;
        $post->identity  = $identity;
        $post->status = 0;
        $post->verify_code   = $verifycode;
        $post->save();

        $details    =   [
            'name'=> $request->fullname,
            'email'=> $request->email,
            'link' => url('verify-account/'.$identity.'/'.$verifycode)
        ];

        Mail::to($request->email)->send(new WelcomeToSwiftedgeVA($details));

        if($post->id) {
            return redirect()->route('login')->with('response', 'Your registration was successful, please verify your account login');
        }else {
            return back()->withInput()->with('response', 'an error occurred');
        }
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function createArtisanServices(Request $request): RedirectResponse
    {

        $post = new ArtisanServices();
        $post->user_id = Auth::user()->id ?? null;
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

        $image = $request->picture;
        $filename = time().".".$image->extension();
        // Create directory if it does not exist

        if (!is_dir("artisan_services/photo/". Auth::user()->id ."/")) {
            $path = "artisan_services/photo/". Auth::user()->id ."/";
            File::makeDirectory(public_path() . '/' . $path, 0777, true);
        }

        $location = public_path('artisan_services/photo/'. Auth::user()->id .'/');
        $image->move($location, $filename);

        $post->feature_image = $filename;
        $post->save();

        if ($post->id) {
            return back()->withInput()->with('response', 'Service added successfully');
        } else {
            return back()->withInput()->with('response', 'an error occurred');
        }

    }

    public function updateArtisanServices(Request $request): RedirectResponse
    {

        $post = ArtisanServices::find($request->id);
        $post->title = $request->service_title;
        $post->business_category = $request->business_category;
        $post->experience = $request->experience ?? null;
        $post->cost = $request->cost;
        $post->per_service = $request->per_service ?? null;
        $post->service_description = $request->service_description;
        $post->update();

        if ($post->id) {
            return back()->withInput()->with('response', 'Service added successfully');
        } else {
            return back()->withInput()->with('response', 'an error occurred');
        }

    }


    public function UpdateProfilePhoto(Request $request) {

        $id = Auth::user()->id;

        if ($request->home) {
            $image = $request->file('picture');
            $filename = time().".".$image->getClientOriginalExtension();
            // Create directory if it does not exist
            if(!is_dir("profile/photo/". Auth::user()->id ."/")) {
                $path = "profile/photo/". Auth::user()->id ."/";
                File::makeDirectory(public_path().'/'.$path,0777,true);
            }

            $location = public_path('profile/photo/'. Auth::user()->id .'/');
            $image->move($location, $filename);
        }else {
            return back()->withInput()->with('response','Please Attach a profile photo');
        }
        // update account information
        $post = User::find($id);
        $post->profile_image = $filename;
        $post->save();

        return redirect()->route('gateway.redirect');


    }

}
