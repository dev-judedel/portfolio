<?php

namespace App\Providers;

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
    public function boot(): void
    {
        // Share profile data with footer component
        view()->composer('components.footer', function ($view) {
            $profile = \App\Models\Profile::first();
            $view->with('profile', $profile);
        });
    }
}
