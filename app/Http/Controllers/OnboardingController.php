<?php

namespace App\Http\Controllers;

use App\Helpers\CommonHelpers;
use App\Http\Controllers\Controller;
use App\Models\MySkill;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class OnboardingController extends Controller
{
    public function checkOnboarding()
    {
        $user = Auth::user();
        if (is_null($user->profile_image)) {
            return redirect()->route('onboarding.profile_picture');
        }

        if (is_null($user->service_description)) {
            return redirect()->route('onboarding.about');
        }

        if (is_null($user->country) || is_null($user->state) || is_null($user->city)) {
            return redirect()->route('onboarding.location');
        }

        if (is_null($user->category_id)) {
            return redirect()->route('onboarding.category');
        }

        if (is_null($user->ngn_rate)) {
            return redirect()->route('onboarding.charge');
        }

       if ($user->mySkills->isEmpty()) {
        return redirect()->route('onboarding.skills');
    }

        return redirect()->route('user.home');
    }

    public function profilePicture(Request $request)
    {
        return view('onboarding.profile_picture');
    }

    public function about()
    {
        return view('onboarding.about');
    }

    public function location()
    {
        return view('onboarding.location');
    }

    public function category()
    {
        return view('onboarding.category');
    }

    public function charge()
    {
        return view('onboarding.charge');
    }

    public function skills()
    {
        return view('onboarding.skills');
    }

    public function imagesUpload(Request $request)
    {
        try {
            $user = Auth::user();
            if (is_null($user->identity)) {
                $user->update(['identity' => CommonHelpers::generateCramp("user")]);
            }

            if (is_null($user->profile_image) && $request->hasFile('profile_picture')) {
                $request->validate([
                    'profile_picture' => 'max:2048',
                ]);

                $profilePicture = $request->file('profile_picture');
                $filename = time() . '.' . $profilePicture->getClientOriginalExtension();

                $directoryPath = "profile/pictures/" . $user->id . "/";
                if (!is_dir($directoryPath)) {
                    File::makeDirectory(public_path($directoryPath), 0777, true);
                }

                $location = public_path($directoryPath);
                $profilePicture->move($location, $filename);

                $user->update(['profile_image' => $directoryPath . $filename]);
            }

            return $this->checkOnboarding();
        } catch (\Exception $e) {
            return redirect()->back()->with('error', "An error occurred: " . $e->getMessage());
        }
    }

    public function updateLocation(Request $request)
    {
        $user = Auth::user();
        if (is_null($user->identity)) {
            $user->update(['identity' => CommonHelpers::generateCramp("user")]);
        }

        $data = $request->only('country', 'street_address', 'city', 'state');
        if (!empty($data)) {
            $user->update($data);
        }

        return $this->checkOnboarding();
    }

    public function aboutUpdate(Request $request)
    {
        $user = Auth::user();
        if (is_null($user->identity)) {
            $user->update(['identity' => CommonHelpers::generateCramp("user")]);
        }

        $data = $request->only('service_description');
        if (!empty($data)) {
            $user->update($data);
        }

        return $this->checkOnboarding();
    }

    public function updateCategory(Request $request)
    {
        $user = Auth::user();
        if (is_null($user->identity)) {
            $user->update(['identity' => CommonHelpers::generateCramp("user")]);
        }

        $data = $request->only('category_id');
        if (!empty($data)) {
            $user->update($data);
        }

        return $this->checkOnboarding();
    }

    public function updateCharge(Request $request)
    {
        $user = Auth::user();
        if (is_null($user->identity)) {
            $user->update(['identity' => CommonHelpers::generateCramp("user")]);
        }

        $data = $request->only('ngn_rate', 'eur_rate', 'gbp_rate', 'usd_rate');
        if (!empty($data)) {
            $user->update($data);
        }

        return $this->checkOnboarding();
    }

    public function updateSkills(Request $request)
    {
        $user = Auth::user();
        if (is_null($user->identity)) {
            $user->update(['identity' => CommonHelpers::generateCramp("user")]);
        }

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

        return $this->checkOnboarding();
    }
}


