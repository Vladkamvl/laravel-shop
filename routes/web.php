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

//Shop routes
Route::get('/', function(){
    return redirect()->route('shop.products.index');
});
//Products
Route::resource('products', 'Shop\ProductController')
    ->only(['index', 'show'])
    ->names('shop.products');

//Categories
Route::resource('categories', 'Shop\CategoryController')
    ->only(['index', 'show'])
    ->names('shop.categories');

//Basket
Route::get('bascket/', 'Shop\BasketController@index')->name('basket.index');
Route::post('basket/add/{id}', 'Shop\BasketController@add')->name('basket.add');
Route::post('basket/remove/{id}', 'Shop\BasketController@remove')->name('basket.remove');
Route::get('bascket/checkout/', 'Shop\BasketController@checkout')->name('basket.checkout');
Route::patch('bascket/confirm/', 'Shop\BasketController@confirm')->name('basket.confirm');

//Auth
Auth::routes([
    'reset' => false,
    'confirm' => false,
    'verify' => false,
]);

Route::get('/home', 'HomeController@index')->name('home');
