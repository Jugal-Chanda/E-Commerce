<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/','FrontendController@home')->name('home');
Route::get('/product/{product}','FrontendController@productSingle')->name('productSingle');
Route::get('/addtocart/{id}','FrontendController@addToCart')->name('addtocart');
Route::get('/mycart','FrontendController@myCart')->name('mycart');
Route::get('/increaseqty/{id}','FrontendController@increaseQuantity')->name('increaseqty');
Route::get('/decreaseqty/{id}','FrontendController@decreaseQuantity')->name('decreaseqty');
Route::get('/deletefromcart/{id}','FrontendController@deleteFromCart')->name('deletefromcart');

Route::get('/order/procede','FrontendController@checkout')->name('checkout');
Route::post('/order/placeorder','OrderController@placeorder')->name('order.placeorder');

Route::group(['prefix' => 'admin','middleware' => 'admin'],function(){
    // For admin Category
    Route::get('/','AdminController@index')->name('adminDashboard');
    Route::resource('category', 'CategoryController');
    Route::resource('product', 'ProductController');
    Route::resource('stock','StockController');
    Route::get('/orders/','OrderController@adminOrders')->name('admin.orders');
    Route::get('/order/{order}','OrderController@orderSingle')->name('admin.order.single');
});

Auth::routes();



// Route::get('/home', 'HomeController@index')->name('home');
