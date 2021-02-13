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
// Route::get('/{search}','FrontendController@search')->name('search');
Route::get('/category/{category}','FrontendController@categoryWiseProduct')->name('category.product');
Route::get('/product/{product}','FrontendController@productSingle')->name('productSingle');
Route::get('/offers','FrontendController@offers')->name('offers');
Route::get('/toutorials','FrontendController@toutorials')->name('toutorials');
Route::post('/contact','FrontendController@contact')->name('contact');


Route::group(['middleware'=>['auth','verified']],function(){
  Route::get('/addtocart/{id}','FrontendController@addToCart')->name('addtocart');
  Route::get('/mycart','FrontendController@myCart')->name('mycart');
  Route::get('/increaseqty/{id}','FrontendController@increaseQuantity')->name('increaseqty');
  Route::get('/decreaseqty/{id}','FrontendController@decreaseQuantity')->name('decreaseqty');
  Route::get('/deletefromcart/{id}','FrontendController@deleteFromCart')->name('deletefromcart');
  Route::get('/order/procede','FrontendController@checkout')->name('checkout');
  Route::post('/order/placeorder','OrderController@placeorder')->name('order.placeorder');
  Route::get('/monerecipt/{order}','FrontendController@moneyRecipt')->name('moneyRecipt');
  Route::get('/orders','FrontendController@orders')->name('orders');
  Route::get('/profiles','FrontendController@profile')->name('profile');
  Route::get('/profiles/edit','FrontendController@profileEdit')->name('profile.edit');
  Route::post('/profiles/update','FrontendController@profileUpdate')->name('profile.update');

});



Route::group(['prefix' => 'admin','middleware' => ['auth','admin','verified']],function(){

    Route::get('/','AdminController@index')->name('adminDashboard');
    Route::resource('/category', 'CategoryController');
    Route::resource('/product', 'ProductController');
    Route::resource('/stock','StockController');
    Route::resource('/toutorials','ToutorialController');
    Route::get('/order/confirm/{order}','OrderController@confirm')->name('order.confirm');
    Route::get('/order/decline/{order}','OrderController@decline')->name('order.decline');
    Route::get('/order/delivered/{order}','OrderController@delivered')->name('order.delivered');
    Route::get('/orders','OrderController@adminOrders')->name('admin.orders');
    Route::get('/order/{order}','OrderController@orderSingle')->name('admin.order.single');
    Route::get('/offers/create','OfferController@create')->name('offer.create');
    Route::post('/offers/store','OfferController@store')->name('offer.store');
    Route::get('/offers','OfferController@index')->name('offer.index');
    Route::get('/offer/delete/{offer}','OfferController@destroy')->name('offer.delete');
    Route::get('/parts/create','ToutorialPartController@create')->name('parts.create');
    Route::post('/parts/store','ToutorialPartController@store')->name('parts.store');

    Route::resource('/announcement','AnnouncementController');
    Route::get('/announcement/{announcement}/visibility','AnnouncementController@toggleVisible')->name('announcement.change_visibility');
});

Auth::routes(['verify' => true]);



// Route::get('/home', 'HomeController@index')->name('home');
