<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Session;


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
      // $cart = app('session')->get('cart');
      // print_r("hello");
      // if(is_null($cart))
      // {
      //   $cart_count = 100;
      //
      //   // $cart_count = 10;
      // }
      // else
      // {
      //   $cart_count = count($cart);
      // }
      // View::share('cart_count', $cart_count);
    }
}
