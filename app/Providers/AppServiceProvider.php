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
      $cart = Session::get('cart');
      if($cart)
      {
        $cart_count = count(Session::get('cart'));
      }
      else
      {
        $cart_count = 0;
      }
      View::share('cart_count', $cart_count);
    }
}
