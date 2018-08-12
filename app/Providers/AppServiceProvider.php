<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        // IF YOU ARE NOT IN LOCAL ENVIRONMENT
        // $this->app->bind('path.public', function() {
        //     return base_path().'/public_html';
        // });
    }
}
