<?php

namespace App\Providers;

use App\Interfaces\BrandInterface;
use App\Interfaces\ModelInterface;
use App\Repositories\BrandRepo;
use App\Repositories\ModelRepo;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(BrandInterface::class, BrandRepo::class);
        $this->app->bind(ModelInterface::class, ModelRepo::class);

    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
