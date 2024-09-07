<?php

namespace App\Providers;

use App\Models\Lead;
use App\Models\User;
use App\Observers\GenericObserver;
use App\Observers\UserObserver;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot()
    {
        User::observe(GenericObserver::class);
        Lead::observe(GenericObserver::class);
        // Register other models as needed
    }
}
