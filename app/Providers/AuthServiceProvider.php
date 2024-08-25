<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;

use App\Contracts\Roleable;
use App\Models\User;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        //
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('access-permission', function (Roleable $user, $module, $action) {
            $role = $user->role; // Get the user's role
    
            // Check if the role has the specified permission
            $rolePermission = $role->permissions()->where('permissions.module', $module)->first();
    
            if ($rolePermission) {
                return $rolePermission->pivot->{'can_' . $action};
            }
    
            return false;
        });
    }
}
