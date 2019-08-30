<?php

namespace App\Providers;

use App\User;
use App\Observer\UserObserver;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
	    \Schema::defaultStringLength(191);
		User::observe(UserObserver::class);
    }
}
