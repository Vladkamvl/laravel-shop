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
