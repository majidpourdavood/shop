<?php

namespace App\Providers;

use App\Model\Category;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

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
        //
        Schema::defaultStringLength(191);

        view()->composer('site.*' , function($view) {

            $menus = Category::with('children')->where('active', 1)
                ->where('parent_id', 0)->get();

            $view->with([
                'menus' => $menus,
            ]);
        });
    }
}
