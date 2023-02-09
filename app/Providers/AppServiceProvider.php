<?php

namespace App\Providers;

use App\Services\Uploader;
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
        // the first argument to the bind method, 
        // must match the return string of the facades 
        // getFacadeAccessor method
        
        $this->app->bind('uploader', fn() => new Uploader());
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
