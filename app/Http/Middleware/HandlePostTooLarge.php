<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class HandlePostTooLarge
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle($request, Closure $next)
    {
        try {
            return $next($request);
        } catch (PostTooLargeException $e) {
            return redirect()->back()->with('validationErrors', 'The uploaded file is too large. Maximum file size allowed is 2MB.');
        }
    }
}
