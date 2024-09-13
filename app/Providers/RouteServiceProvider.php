<?php

namespace App\Providers;

use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    public const EMPLOYER_HOME = '/employer/dashboard';
    public const HOME = '/admin/dashboard';
    public const EMPLOYEE_HOME = '/employee/dashboard';

    public function boot(): void
    {
        RateLimiter::for('api', function (Request $request) {
            return Limit::perMinute(60)->by($request->user()?->id ?: $request->ip());
        });

        $this->routes(function () {
            Route::middleware('api')
                ->prefix('api')
                ->group(base_path('routes/api.php'));

            Route::middleware('web')
                ->group(base_path('routes/web.php'));
        });
    }

    public static function redirectTo()
    {
        if (auth()->guard('admin')->check()) {
            return self::HOME;
        } elseif (auth()->guard('employer')->check()) {
            return self::EMPLOYER_HOME;
        } elseif (auth()->guard('employee')->check()) {
            return self::EMPLOYEE_HOME;
        }

        return '/'; // Default redirect
    }
}
