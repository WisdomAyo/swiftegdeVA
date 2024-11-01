<?php



namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckUserProfile
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $user = Auth::user();
        if ($user) {
            $fields = [
                'full_name',
                'email',
                'password',
                'phone',
                'street_address',
                'city',
                'state',
                'profile_image',
                'usd_rate',
                'gbp_rate',
                'eur_rate',
                'ngn_rate',
            ];

            foreach ($fields as $field) {
                // Allow access to profile edit/update and profile image upload routes
                if (!$user->$field && !$request->is('user/profile') && !$request->is('user/profile/photo/add') && !$request->is('user/settings/save')) {
                    return redirect()->route('onboarding.check')->with('error', 'Please update your profile information.');
                }
            }
        }




        return $next($request);
    }
}


