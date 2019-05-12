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

Auth::routes(['verify' => true]);

Route::group(['middleware' => 'admin'], function () {
    Route::get('/admin', 'Admin\AdminController@dashboard')->name('admin.dashboard');
    Route::get('/admin/category', 'Admin\CategoryController@list')->name('admin.category.list');
    Route::resource('/admin/brand', 'Admin\BrandController');
});

Route::group(['middleware' => 'verified'], function () {
    Route::get('/dashboard', 'User\UserController@dashboard')->name('user.dashboard');
});
