<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
    protected function redirectTo($request)
    {
        if (!$request->expectsJson()) {
            if ($request->is('admin/*')) {
                return route('admin.login');
            } elseif ($request->is('employer/*')) {
                return route('employer.login');
            }elseif ($request->is('employee/*')) {
                return route('employee.login');
            }
        }
    }
}
