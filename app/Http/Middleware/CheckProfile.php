<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckProfile
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // If user tries to access the 'create' route but already has a UserDetail
        if ($request->route()->named('user.create') && auth()->user() && auth()->user()->userDetail) {
            return redirect()->route('user.edit');
        }
        
        // If user tries to access the 'edit' route but doesn't have a UserDetail
        if ($request->route()->named('user.edit') && auth()->user() && !auth()->user()->userDetail) {
            return redirect()->route('user.create');
        }

        return $next($request);
    }
}
