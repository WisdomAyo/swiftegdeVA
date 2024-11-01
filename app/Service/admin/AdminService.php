<?php

namespace App\Service\admin;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class AdminService
{


    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function saveIsFeature(Request $request): RedirectResponse
    {
        try {
            $entry = User::find($request->user_id);
            $entry->is_feature = $request->is_feature;
            $entry->update();
            return back()->withInput()->with('response','Registration was successfully');
        }catch (\Exception $exception){
            return back()->withInput()->with('error','an error occurred');
        }


    }
}
