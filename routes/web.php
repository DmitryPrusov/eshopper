<?php

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

Route::get('/', 'FrontController@index')->name('index');
Route::get('/products', 'FrontController@products')->name('products');
Route::get('/product', 'FrontController@product')->name('product');
Route::get('logout', 'auth\LoginController@logout');


Route::get('/test', function () {
// $product =   \App\Product::findOrFail(1);
    $product2 = new \App\Product();
    // dd($product);
    $image = new \App\Image(['image_name' => 'fefsdf.jpg']);
    $product2->images()->save($image);















} );


Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {
    Route::get('/', function () {
        return view('admin.index');
    })->name('admin.index');

    Route::resource('product', 'ProductsController');
    Route::resource('category', 'CategoriesController');
} );




























Auth::routes();

Route::get('/home', 'HomeController@index');
