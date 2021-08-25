<?php

namespace App\Providers;

use App\Models\categories;
use App\Models\mathang;
use App\Models\Product;
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
        view()->share('data_categories', categories::all());
        view()->share('data_product', Product::all());
    }
}
