<?php

namespace App\Providers;

use App\View\Components\LeafletScripts;
use App\View\Components\LeafletStyles;
use Illuminate\Pagination\Paginator;
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
        Paginator::defaultView('vendor.pagination.bootstrap-4');
        Blade::if('admin' , function () {
            return auth()->user()->role_id == env('APP_ADMIN_ROLE', 1);
        });
        Blade::if('moder', function () {
            return auth()->user()->role_id == env('APP_MODER_ROLE', 2);
        });
        Blade::if('mayor', function () {
            return auth()->user()->role_id == env('APP_MAYOR_ROLE', 3);
        });
        Blade::component('leaflet-scripts', LeafletScripts::class);
        Blade::component("leaflet-styles",LeafletStyles::class);
    }
}
