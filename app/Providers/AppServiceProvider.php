<?php

namespace App\Providers;

use App\User;
use Illuminate\Support\Facades\Schema;
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
        Schema::defaultStringLength(191);

        view()->composer('layout.index', function ($view)
        {
            $users = User::all();
            $users_all = $users->count();
            $users_online = 0;
            foreach ($users as $user)
                $user->isOnline()? $users_online++ : Null;

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
