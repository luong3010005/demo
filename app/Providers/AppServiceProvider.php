<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Http\View\Composers\HomeComposer;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Gate;
use App\Policies\AdminPolicy;
use App\Models\User;
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
    public function boot(): void
    {
        view()->composer(
            ['fonend.*'], 
            HomeComposer::class
        );
        Gate::define('access-admin', [AdminPolicy::class, 'accessAdmin']);

    }
}
