<?php

namespace App\Providers;

use App\Library\Repositories\Interfaces\ProductRepositoryInterface;
use App\Library\Repositories\Interfaces\ShoppingListRepositoryInterface;
use App\Library\Repositories\ProductRepository;
use App\Library\Repositories\ShoppingListRepository;
use App\Library\Services\Interfaces\ProductServiceInterface;
use App\Library\Services\Interfaces\ShoppingListServiceInterface;
use App\Library\Services\ProductService;
use App\Library\Services\ShoppingListService;
use Illuminate\Support\ServiceProvider;

class RegisterServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->singleton(ShoppingListRepositoryInterface::class, ShoppingListRepository::class);
        $this->app->singleton(ProductRepositoryInterface::class,ProductRepository::class);
        $this->app->singleton(ShoppingListServiceInterface::class, ShoppingListService::class);
        $this->app->singleton(ProductServiceInterface::class,ProductService::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
