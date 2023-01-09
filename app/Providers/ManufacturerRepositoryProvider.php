<?php

namespace App\Providers;

use App\Http\Repositories\ManufacturerRepository;
use Illuminate\Support\ServiceProvider;

class ManufacturerRepositoryProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('ManufacturerRepository', function(){
            return new ManufacturerRepository;
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
