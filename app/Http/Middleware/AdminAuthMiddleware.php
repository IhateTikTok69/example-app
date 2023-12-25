<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AdminAuthMiddleware
{
    public function handle($request, Closure $next)
    {
        // Check if the user is authenticated as an admin
        if (Auth::guard('admin')->check()) {
            $user = Auth::guard('admin')->user();
            return $next($request);
        }

        // Redirect to the admin login page if not authenticated
        return redirect()->route('adminLogin')->with('error', 'Unauthorized access');
    }
}
