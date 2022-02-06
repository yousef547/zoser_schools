<?php

namespace App\Providers;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\admin\languagesController;
use App\Http\Controllers\admin\levelController;
use App\Models\language;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
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
        view()->composer('*', function ($view) {
            if (Auth::check()) {
                $data = language::find(Auth::user()->defLang);
                View::share('flags', $data);
                View::share('newLang', json_decode($data->languagePhrases));
            } else {
                $view->with('currentUser', null);
            }
        });

       ;


    }
}
