<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\ProductService;

class ProductServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void

    {
        $this->app->singleton(ProductService::class, function ($app){
            $products = [
                [
                    'id' => 1,
                    'name' => 'Apple',
                    'category' => 'Fruits'
                ],
                [
                    'id' => 2,
                    'name' => 'Brocolli',
                    'category' => 'Vegetablerette'
                ],
                [
                    'id' => 3,
                    'name' => 'Sardinesru',
                    'category' => 'Canned Foods'
                ],
            ];
                return new ProductService($products);
        });
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
        view()->share('productKey', 'key-pie');
    }
}