<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->check()) {
            if ($guard === 'admin') {
                return redirect('/admin/dashboard');
            } elseif ($guard === 'employer') {
                return redirect('/employer/dashboard');
            }elseif ($guard === 'employee') {
                return redirect('/employee/dashboard');
            }
        }

        return $next($request);
    }
}
