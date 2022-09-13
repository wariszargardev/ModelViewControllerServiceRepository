<?php

namespace App\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

class FrontRoutesServiceProvider extends ServiceProvider
{
    // APPLY ONLY THE CONTROLLER AVAILABLE IN FRONT FOLDER INSIDE THE CONTROLLERS

    protected $namespace = 'App\Http\Controllers\Front'; // NAMESPACE FOR PREFIX FRONT CONTROLLER PATCH
//    protected $namespace = 'App\Http\Controllers'; // NAMESPACE FOR PREFIX FRONT CONTROLLER PATCH

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->map();
    }

    public function map(){
        $this->mapFrontRoutes();
    }


    protected function mapFrontRoutes()
    {
        Route::middleware('web')
            ->prefix('front')
            ->namespace($this->namespace)
            ->group(base_path('routes/front.php')); // CREATE front.php FILE IN ROUTES FOLDER
    }
}
