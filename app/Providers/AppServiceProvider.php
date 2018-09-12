<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\View\View;

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
        view()->composer('layout.index', function ($view)
        {
            $users_all = \App\User::all()->count();
            $users_online = 1;
            $users_info = [
                'online' => $users_online,
                'all' => $users_all,
            ];
            $view->with('users_layout', $users_info);
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
