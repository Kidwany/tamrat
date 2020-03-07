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

Route::group(['namespace' => 'Dashboard', 'prefix' => 'tamra-admin', 'middleware' => 'auth'], function ()
{

    Route::get('/', 'DashboardController@index');

    Route::resource('product', 'ProductController');

    Route::resource('user', 'UserController');

    Route::resource('admin', 'AdminController');

    Route::resource('order', 'OrderController');

    Route::resource('bank-transfer', 'BankTransferController');

    Route::resource('notification', 'NotificationController');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
