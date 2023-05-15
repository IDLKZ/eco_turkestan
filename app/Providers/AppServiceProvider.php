<?php

namespace App\Providers;

use App\View\Components\LeafletScripts;
use App\View\Components\LeafletStyles;
use Illuminate\Support\Facades\Blade;
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
        Blade::if('admin' , function () {
            return auth()->user()->role_id == 1;
        });
        Blade::if('moder', function () {
            return auth()->user()->role_id == 2;
        });
        Blade::component('leaflet-scripts', LeafletScripts::class);
        Blade::component("leaflet-styles",LeafletStyles::class);
    }
}
