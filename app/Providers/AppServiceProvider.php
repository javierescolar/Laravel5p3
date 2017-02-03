<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Brand;
use View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $brandsnav = Brand::all();
         View::share('brandsnav', $brandsnav);
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
