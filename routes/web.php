<?php


Route::get('/', 'FrontController@index')->name('index');
Route::get('/products', 'FrontController@products')->name('products');
Route::get('/item/{item}', 'FrontController@product')->name('item');
Route::get('/cat/{cat}', 'FrontController@show_category')->name('cat');
Route::get('logout', 'auth\LoginController@logout');
Route::get('blog', 'FrontController@blog')->name('blog');

Route::get('/log', 'FrontController@log')->name('log');
Route::resource('cart', 'CartController');

Route::get('/test', function () {
    $product = \App\Product::findOrFail(3);
   $image = $product->images()->first();
   echo $image->image_name;
} );

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {
    Route::get('/', function () {
        return view('admin.index');
    })->name('admin.index');

    Route::resource('product', 'ProductsController');
    Route::resource('category', 'CategoriesController');
    Route::resource('brand', 'BrandsController');
} );




























Auth::routes();

Route::get('/home', 'HomeController@index');
