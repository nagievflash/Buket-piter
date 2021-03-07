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

Route::get('/', 'HomepageController@index')->name('home');
Route::get('/product', 'ProductController@index')->name('product');
Route::resource('cart', CartController::class);

Route::get('/product/{slug}', 'ProductController@index')->name('bouquet');
Route::get('/checkout/', 'CheckoutController@index')->name('checkout');

Auth::routes();


Route::group(['prefix' => 'admin'], function () {
    Route::get('products/{id}/copy','VoyagerBouquetsController@copy')->name('product.copy');
    Voyager::routes();
});
