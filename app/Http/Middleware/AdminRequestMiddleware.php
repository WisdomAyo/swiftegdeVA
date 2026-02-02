<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminRequestMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $user = Auth::user();
        if (!$user) {
            abort(401);
        }

        if ($request->is('admin/secure*') || $request->is('actions*') || $request->is('edit-user*') || $request->is('save-user-details')) {
            if ((int) $user->is_admin !== 1) {
                abort(403);
            }
        }

        if ($request->is('user*')) {
            if ((int) $user->is_admin !== 0) {
                abort(403);
            }
        }

        if ($request->is('employer*')) {
            if ((int) $user->is_admin !== 2) {
                abort(403);
            }
        }

        return $next($request);
    }
}
