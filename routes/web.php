<?php
Route::get('searchajax',array('as'=>'searchajax','uses'=>'FrontController@autoComplete'));
Route::group(['middleware' => ['web']], function () {
    Route::post('logout', 'Auth\LoginController@logout')->name('logout');
    Route::get('logout', 'auth\LoginController@logout');
    Route::get('/', 'FrontController@index')->name('index');
    Route::post('/', 'FrontController@search')->name('search');
    Route::get('/products', 'FrontController@products')->name('products');
    Route::get('/item/{item}', 'FrontController@product')->name('item');
    Route::get('/cat/{cat}', 'FrontController@show_category')->name('cat');
    Route::get('blog', 'FrontController@blog')->name('blog');
    Route::resource('cart', 'CartController');
    Route::get('admin/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
    Route::post('admin/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
});
Route::


Route::group(['prefix' => 'admin', 'middleware' => 'auth:admin'], function () {
    Route::get('/', 'AdminController@index')->name('admin.index');
    Route::resource('product', 'ProductsController');
    Route::resource('category', 'CategoriesController');
    Route::resource('brand', 'BrandsController');
});





























Auth::routes();

Route::get('/home', 'HomeController@index');
