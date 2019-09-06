<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use View;
use App\Category;

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
       View::composer('frontEnd.includes.menu',function($view){
           
           $view->with('categories',Category:: where('publication_status',1)->get());
           
       });
    }
}
