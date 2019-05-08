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

Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => 'admin'], function () {
    Route::get('/admin', 'Admin\AdminController@show')->name('admin.show');
});

Route::group(['middleware' => 'verified'], function () {
    Route::get('/dashboard', 'User\UserController@dashboard')->name('user.dashboard');
});
