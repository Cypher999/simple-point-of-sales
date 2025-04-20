<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\User as UserM;
use Illuminate\Support\Facades\View;
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
        View::composer('layout.admin', function ($view) {
            $view->with('user', UserM::find(session()->get('session_poc')));
        });
    }
}
