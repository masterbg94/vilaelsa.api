<?php

namespace App\Providers;

use App\Repositories\ApartmentRepositories;
use App\Repositories\BuildingRepository;
use App\Repositories\FloorsRepositories;
use App\Repositories\GarageRepository;
use App\Repositories\IApartmentRepositories;
use App\Repositories\IBuildingRepository;
use App\Repositories\IFloorsRepositories;
use App\Repositories\IRoomsRepositories;
use App\Repositories\ITypeRepositories;
use App\Repositories\RoomsRepositories;
use App\Repositories\TypeRepositories;
use Illuminate\Support\ServiceProvider;

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
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(IBuildingRepository::class, BuildingRepository::class);
        $this->app->singleton(ITypeRepositories::class, TypeRepositories::class);
        $this->app->singleton(IFloorsRepositories::class, FloorsRepositories::class);
        $this->app->singleton(IApartmentRepositories::class, ApartmentRepositories::class);
        $this->app->singleton(IRoomsRepositories::class, RoomsRepositories::class);
        $this->app->singleton(GarageRepository::class);
    }
}
