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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/category/{slug}', 'CategoryController@show')->name('category.show');
Route::get('/item/{slug}', 'ItemController@show')->name('item.show');
Route::get('/brand/{slug}', function () { die('brand.show'); })->name('brand.show');

Auth::routes(['verify' => true]);

Route::group(['middleware' => 'admin', 'prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::get('', 'Admin\AdminController@dashboard')->name('dashboard');

    Route::get('/category', 'Admin\CategoryController@list')->name('category.list');

    Route::resources([
        'brand' => 'Admin\BrandController',
        'container' => 'Admin\ItemContainerController',
    ]);

    Route::resource('/item', 'Admin\ItemController')->except(['index', 'create']);
    Route::get('/item/create/{container}', 'Admin\ItemController@create')->name('item.create');

    Route::get('/category', 'Admin\CategoryController@list')->name('category.list');
});

Route::group(['middleware' => 'verified'], function () {
    Route::get('/dashboard', 'User\UserController@dashboard')->name('user.dashboard');
});

Route::get('/create-item-image/{file}', 'ImageController@createItemImage')->name('item.image.create');
Route::get('/create-brand-logo/{file}', 'ImageController@createBrandLogo')->name('brand.logo.create');
