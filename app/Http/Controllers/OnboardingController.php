<?php

namespace App\Http\Controllers;

use App\Helpers\CommonHelpers;
use App\Http\Controllers\Controller;
use App\Models\MySkill;
use App\Models\State;
use App\Models\City;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class OnboardingController extends Controller
{
    // public function checkOnboarding()
    // {
    //     $user = Auth::user();
    //     if (is_null($user->profile_image)) {
    //         return redirect()->route('onboarding.profile_picture');
    //     }

    //     if (is_null($user->service_description)) {
    //         return redirect()->route('onboarding.about');
    //     }

    //     if (is_null($user->country) || is_null($user->state) || is_null($user->city)) {
    //         return redirect()->route('onboarding.location');
    //     }

    //     if (is_null($user->category_id)) {
    //         return redirect()->route('onboarding.category');
    //     }

    //     if (is_null($user->ngn_rate)) {
    //         return redirect()->route('onboarding.charge');
    //     }

    //    if ($user->mySkills->isEmpty()) {
    //     return redirect()->route('onboarding.skills');
    // }

    //     return redirect()->route('user.home');
    // }

    // public function profilePicture(Request $request)
    // {
    //     return view('onboarding.profile_picture');
    // }

    // public function about()
    // {
    //     return view('onboarding.about');
    // }

    // public function location()
    // {
    //     return view('onboarding.location');
    // }

    // public function category()
    // {
    //     return view('onboarding.category');
    // }

    // public function charge()
    // {
    //     return view('onboarding.charge');
    // }

    // public function skills()
    // {
    //     return view('onboarding.skills');
    // }

    // public function imagesUpload(Request $request)
    // {
    //     try {
    //         $user = Auth::user();
    //         if (is_null($user->identity)) {
    //             $user->update(['identity' => CommonHelpers::generateCramp("user")]);
    //         }

    //         if (is_null($user->profile_image) && $request->hasFile('profile_picture')) {
    //             $request->validate([
    //                 'profile_picture' => 'max:2048',
    //             ]);

    //             $profilePicture = $request->file('profile_picture');
    //             $filename = time() . '.' . $profilePicture->getClientOriginalExtension();

    //             $directoryPath = "profile/pictures/" . $user->id . "/";
    //             if (!is_dir($directoryPath)) {
    //                 File::makeDirectory(public_path($directoryPath), 0777, true);
    //             }

    //             $location = public_path($directoryPath);
    //             $profilePicture->move($location, $filename);

    //             $user->update(['profile_image' => $directoryPath . $filename]);
    //         }

    //         return $this->checkOnboarding();
    //     } catch (\Exception $e) {
    //         return redirect()->back()->with('error', "An error occurred: " . $e->getMessage());
    //     }
    // }

    // public function updateLocation(Request $request)
    // {
    //     $user = Auth::user();
    //     if (is_null($user->identity)) {
    //         $user->update(['identity' => CommonHelpers::generateCramp("user")]);
    //     }

    //     $data = $request->only('country', 'street_address', 'city', 'state');
    //     if (!empty($data)) {
    //         $user->update($data);
    //     }

    //     return $this->checkOnboarding();
    // }

    // public function aboutUpdate(Request $request)
    // {
    //     $user = Auth::user();
    //     if (is_null($user->identity)) {
    //         $user->update(['identity' => CommonHelpers::generateCramp("user")]);
    //     }

    //     $data = $request->only('service_description');
    //     if (!empty($data)) {
    //         $user->update($data);
    //     }

    //     return $this->checkOnboarding();
    // }

    // public function updateCategory(Request $request)
    // {
    //     $user = Auth::user();
    //     if (is_null($user->identity)) {
    //         $user->update(['identity' => CommonHelpers::generateCramp("user")]);
    //     }

    //     $data = $request->only('category_id');
    //     if (!empty($data)) {
    //         $user->update($data);
    //     }

    //     return $this->checkOnboarding();
    // }

    // public function updateCharge(Request $request)
    // {
    //     $user = Auth::user();
    //     if (is_null($user->identity)) {
    //         $user->update(['identity' => CommonHelpers::generateCramp("user")]);
    //     }

    //     $data = $request->only('ngn_rate', 'eur_rate', 'gbp_rate', 'usd_rate');
    //     if (!empty($data)) {
    //         $user->update($data);
    //     }

    //     return $this->checkOnboarding();
    // }

    // public function updateSkills(Request $request)
    // {
    //     $user = Auth::user();
    //     if (is_null($user->identity)) {
    //         $user->update(['identity' => CommonHelpers::generateCramp("user")]);
    //     }

    //     if ($request->has('skills')) {
    //         $skills = explode(',', $request->skills);
    //         foreach ($skills as $skill) {
    //             $skill = trim($skill);
    //             if (!empty($skill)) {
    //                 $existingSkill = MySkill::where('user_id', $user->id)
    //                     ->where('title', $skill)
    //                     ->first();

    //                 if (!$existingSkill) {
    //                     MySkill::create([
    //                         'title' => $skill,
    //                         'user_id' => $user->id,
    //                         'url' => strtolower(CommonHelpers::create_unique_slug($skill, "my_skills", "url")),
    //                     ]);
    //                 }
    //             }
    //         }
    //     }

    //     return $this->checkOnboarding();
    // }




        // Check the user's onboarding progress
        private $steps = ['profile_picture', 'about', 'location', 'category', 'charge', 'skills','socials'];

        private function getNextStep($currentStep)
        {
            $currentIndex = array_search($currentStep, $this->steps);
            if ($currentIndex === false || $currentIndex === count($this->steps) - 1) {
                return 'dashboard'; // Redirect to the dashboard after completing all steps
            }
        
            return $this->steps[$currentIndex + 1];
        }

        private function getPreviousStep($currentStep)
        {
            $index = array_search($currentStep, $this->steps);
            if ($index === false || $index <= 0) {
                return null; // No previous step
            }
            return $this->steps[$index - 1];
        }

        public function checkOnboarding(Request $request)
        {
            $user = Auth::user();

        
            if (!$user) {
                return redirect()->route('login')->with('error', 'Please log in to continue.');
            }
            
        
            $currentStep = $this->getCurrentStep($user);
            $previousStep = $this->getPreviousStep($currentStep);
            

            if ($currentStep === 'dashboard') {
                return redirect()->route('user.home')->with('success', 'Welcome to your dashboard!');
            }

            $step =   $currentStep;
            $currentIndex = array_search($step, $this->steps);
            $formData = $this->getFormState($user);
            if ($request->ajax()) {
                return response()->json([
                    'success' => true,
                    'html' => view("onboarding.{$currentStep}", compact('formData'))->render(),
                    'currentStep' => $currentStep,
                    'previousStep' => $previousStep,
                ]);
            }
        
            // dd($step);
            return view('onboarding.index', [
                'step' => $currentStep,
                'currentStep' => $currentStep,
                'previousStep' => $previousStep,
                'formData' => $formData,
            ]);
        }

        public function update(Request $request)
        {
            $user = Auth::user();
           // dd($request->all());


            try {

                   // Ensure step exists in steps array
                  if (!in_array($request->step, $this->steps)) {
                 throw new \Exception("Invalid step: {$request->step}");
                  }

                 
                // Save data for the current step
                switch ($request->step) {
                    case 'profile_picture':
                        $request->validate(['profile_image' => 'required|image|max:2048']);
                        $this->saveProfilePicture($request, $user);
                        break;


                        case 'location':
                            
                            $request->validate([
                                'country_id' => 'required|string',
                                'state_id' => 'required|string',
                                'city_id' => 'required|string',
                                'street_address' => 'required|string',
                            ]);
                           
                            $user->update($request->only(['country_id', 'state_id', 'city_id', 'street_address']));
                            break;

                    case 'about':
                        $request->validate(['service_description' => 'required|string|min:100']);
                        $user->update(['service_description' => $request->service_description]);
                        break;

                    case 'category':
                        $request->validate(['category_id' => 'required|integer']);
                        $user->update($request->only('category_id'));
                        break;
        
                        case 'charge':
                            $request->validate([
                                'ngn_rate' => 'required|numeric|min:0',
                                'eur_rate' => 'required|numeric|min:0',
                                'gbp_rate' => 'required|numeric|min:0',
                                'usd_rate' => 'required|numeric|min:0',
                            ]);
                            $user->update($request->only(['ngn_rate', 'eur_rate', 'gbp_rate', 'usd_rate']));
                            break;

                    case 'skills':
                        $request->validate([
                            'skillLevel' => 'required|string',
                            'skills' => 'required'
                        ]);

                        $this->saveSkills($request, $user) ;
                         $user->update(['skillLevel'=> $request->skillLevel]);
                        break;


                    case 'socials':
                            $request->validate([
                                'is_influencer' => 'required|boolean',
                                'social_media.*.platform' => 'required_if:is_influencer,1|string',
                                'social_media.*.followers' => 'required_if:is_influencer,1|integer|min:0',
                                'social_media.*.handle' => 'required_if:is_influencer,1|string',
                                
                            ]);
                            $socialMedia = json_encode($request->social_media) ;
                        
                            $user->update([
                                'is_influencer' => (bool) $request->is_influencer,
                                'social_media' => $socialMedia, // Store socials as JSON

                                
                            ]);
                       
                            return redirect()->route('user.home')->with('success', 'Welcome to your dashboard!');
                            break;

                            

                    default:
                        throw new \Exception("Invalid step: {$request->step}");
                }

                $nextStep = $this->getNextStep($request->step);
                $previousStep = $this->getPreviousStep($request->step);

                if ($request->has('previous')) {
                    return redirect()->route('onboarding', ['step' => $previousStep])->with('success', 'Step reverted.');
                }
        
                

                return redirect()->route('onboarding', ['step' => $nextStep])->with('success', 'Step completed!');
            } catch (\Illuminate\Validation\ValidationException $e) {
                // Use SweetAlert for validation errors
                $errors = $e->errors();
                $errorMessage = implode("\n", array_map(fn ($field) => implode("\n", $field), $errors));
                return back()->with('validationErrors', $errorMessage);
            // } catch (\Symfony\Component\HttpFoundation\Exception\PostTooLargeException $e) {
            //     // File too large exception
            
            //     return back()->with('validationErrors', 'Your Profile image  file is too large. Maximum file size allowed is 2MB.');
            } catch (\Exception $e) {
                return back()->withErrors($e->getMessage());
            }

        }

        private function getCurrentStep($user)
        {
            if (!$user->profile_image) {
                return 'profile_picture';
            } elseif (!$user->service_description) {
                return 'about';
            } elseif (!$user->country_id || !$user->state_id || !$user->city_id || !$user->street_address) {
                return 'location';
            } elseif (!$user->category_id) {
                return 'category';
            } elseif (!$user->ngn_rate || !$user->eur_rate || !$user->gbp_rate || !$user->usd_rate) {
                return 'charge';
            } elseif (!$user->mySkills()->exists()) {
                return 'skills';
            } elseif (!$user->social_media) {
                return 'socials';
            }

            return 'dashboard';
        }

        private function getFormState($user)
        {
            return [
            'profile_image' => $user->profile_image,
            'service_description' => $user->service_description,
            'country_id' => $user->country_id,
            'state_id' => $user->state_id,
            'city_id' => $user->city_id,
            'street_address' => $user->street_address,
            'category_id' => $user->category_id,
            'ngn_rate' => $user->ngn_rate,
            'eur_rate' => $user->eur_rate,
            'gbp_rate' => $user->gbp_rate,
            'usd_rate' => $user->usd_rate,
            'skills' => $user->mySkills->pluck('title')->implode(', '),
            'is_influencer' => $user->is_influencer, // New socials data
            'social_media' => $user->social_media ?? [],
            ];
        }

        private function saveProfilePicture(Request $request, $user)
        {
            $file = $request->file('profile_image');
            $folder = 'profile/profile_picture/' . $user->id;
        
            // Ensure directory exists
            if (!File::exists(public_path($folder))) {
                File::makeDirectory(public_path($folder), 0755, true);
            }
        
            // Delete existing file if present
            if ($user->profile_picture && File::exists(public_path($user->profile_picture))) {
                File::delete(public_path($user->profile_image));
            }
        
            // Save new file
            $fileName = uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path($folder), $fileName);
        
            // Update user's profile picture path
            $user->profile_image = "$folder/$fileName";
            $user->save();
        }

        private function saveSkills(Request $request, $user)
        {
            $skills = explode(',', $request->skills);
            foreach ($skills as $skill) {
                $user->mySkills()->firstOrCreate(['title' => trim($skill)]);
            }
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
