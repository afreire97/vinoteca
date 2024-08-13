<?php

namespace App\Providers;

use App\Repositories\Category\CategoryRepositoryInterface;
use App\Repositories\Category\EloquentCategoryRepository;
use App\Repositories\Wine\EloquentWineRepository;
use App\Repositories\Wine\WineRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(



            CategoryRepositoryInterface::class,
            EloquentCategoryRepository::class,



        );



        $this->app->bind(
            
            WineRepositoryInterface::class,
            EloquentWineRepository::class,

        );
      }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
