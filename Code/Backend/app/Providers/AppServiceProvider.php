<?php

namespace App\Providers;

use App\Interfaces\BrandInterface;
use App\Interfaces\ModelInterface;
use App\Interfaces\ProductInterface;
use App\Interfaces\StatistiqueInterface;
use App\Repositories\BrandRepo;
use App\Repositories\ModelRepo;
use App\Repositories\ProductRepo;
use App\Repositories\StatistiqueRepo;
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
        $this->app->bind(ProductInterface::class, ProductRepo::class);
        $this->app->bind(StatistiqueInterface::class, StatistiqueRepo::class);

    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
