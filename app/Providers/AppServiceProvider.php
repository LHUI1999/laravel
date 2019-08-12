<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

use App\Http\COntrollers\Home\IndexController;
use App\Http\COntrollers\Home\CarController;
use App\Http\COntrollers\Home\CollectionController;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //共享数据
        View::share('common_title','test title');
        View::share('common_cates_data',IndexController::getPidCatesData());
        View::share('carcount',CarController::countCar());
        View::share('collectioncount',CollectionController::countCollection());
     
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
