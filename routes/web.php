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
    Route::resource('/brand', 'Admin\BrandController');
    Route::resource('/container', 'Admin\ItemContainerController');
});

Route::group(['middleware' => 'verified'], function () {
    Route::get('/dashboard', 'User\UserController@dashboard')->name('user.dashboard');
});
