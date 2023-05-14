<?php

namespace App\Providers;

use App\Modules\Ingredient\Repositories\IngredientProductRepository;
use App\Modules\Ingredient\Repositories\IngredientProductRepositoryInterface;
use App\Modules\Ingredient\Repositories\IngredientRepository;
use App\Modules\Ingredient\Repositories\IngredientRepositoryInterface;
use App\Modules\Ingredient\Services\IngredientProductService;
use App\Modules\Ingredient\Services\IngredientProductServiceInterface;
use App\Modules\Ingredient\Services\IngredientService;
use App\Modules\Ingredient\Services\IngredientServiceInterface;
use App\Modules\Order\Repositories\OrderRepository;
use App\Modules\Order\Repositories\OrderRepositoryInterface;
use App\Modules\Order\Services\OrderService;
use App\Modules\Order\Services\OrderServiceInterface;
use App\Modules\Product\Repositories\ProductRepository;
use App\Modules\Product\Repositories\ProductRepositoryInterface;
use App\Modules\Product\Services\ProductService;
use App\Modules\Product\Services\ProductServiceInterface;
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
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->bind(OrderRepositoryInterface::class, OrderRepository::class);
        $this->app->bind(OrderServiceInterface::class, OrderService::class);
        $this->app->bind(IngredientProductServiceInterface::class, IngredientProductService::class);
        $this->app->bind(IngredientProductRepositoryInterface::class, IngredientProductRepository::class);
        $this->app->bind(IngredientServiceInterface::class, IngredientService::class);
        $this->app->bind(IngredientRepositoryInterface::class, IngredientRepository::class);
        $this->app->bind(ProductServiceInterface::class, ProductService::class);
        $this->app->bind(ProductRepositoryInterface::class, ProductRepository::class);
    }
}
