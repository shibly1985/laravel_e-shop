<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Category;
use App\Subcategory;
use View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        View:: share('title','Welcome to online eShop');  //static view to show every where
        
        View::composer('frontEnd.include.menu',function($view){ // to show only selected page dynamic value
          $mensCategories = Subcategory::where('publicationStatus',1)
                  ->where('categoryId',1)
                  ->get();
          $view->with('mensCategories',$mensCategories);
        });
        
        
        View::composer('frontEnd.include.menu',function($view){ // to show only selected page dynamic value
          $womensCategory = Subcategory::where('publicationStatus', 1)
                  ->where('categoryId',2)
                  ->get();
          $view->with('womensCategory',$womensCategory);
        });
        
        
        View::composer('frontEnd.include.menu',function($view){ // to show only selected page dynamic value
          $kidsCategory = Subcategory::where('publicationStatus', 1)
                  ->where('categoryId',3)
                  ->get();
          $view->with('kidsCategory',$kidsCategory);
        });
        
        View::composer('frontEnd.include.header',function($view){ // to show only selected page dynamic value
          $categories = Category::all();
          $view->with('categories',$categories);
        });
         
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
