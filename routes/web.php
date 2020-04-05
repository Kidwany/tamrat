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

Route::group(['namespace' => 'Dashboard', 'prefix' => 'tamra-admin', 'middleware' => ['auth', 'Admin']], function ()
{

    Route::get('/', 'DashboardController@index');

    Route::resource('product', 'ProductController');

    Route::resource('user', 'UserController');

    Route::resource('admin', 'AdminController');

    Route::resource('order', 'OrderController');

    Route::resource('bank-transfer', 'BankTransferController');

    Route::resource('notification', 'NotificationController');

    Route::resource('promo-code', 'PromoCodeController');

    Route::resource('offer', 'OfferController');

    Route::resource('payment-setting', 'PaymentSettingController');

    Route::get('/logout', 'DashboardController@logout');


});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::get('reset/password/{token}', 'Api\AuthController@resetPasswordView');
Route::post('update-password', 'Api\AuthController@resetPassword');
