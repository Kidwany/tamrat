<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

/**
 * Authentication Routes For Api
 */
Route::group(['prefix' => 'auth', 'namespace'  => 'Api'], function() {
    // Login Api
    Route::post('login', 'AuthController@login');
    // Register Api
    Route::post('register', 'AuthController@register');
    // Verify
    Route::post('verify', 'AuthController@verify');
    // Reset Password Api
    Route::post('reset-password', 'AuthController@sendResetPasswordEmail');
});



Route::group(['middleware' => 'auth:api', 'namespace'  => 'Api'], function() {

    // Order Finance Api
    Route::post('order-finance', 'OrderController@saveOrderFinance');

    // My Orders
    Route::get('my-orders', 'OrderController@myOrders');

    // My Order Details
    Route::post('my-order-details', 'OrderController@myOrderDetails');

    // Bank Transfer
    Route::post('bank-transfer', 'BankTransferController@store');

    // Change Language
    Route::post('change-language', 'AuthController@changeLanguage');

    // Logout
    Route::get('logout', 'AuthController@logout');

});



Route::group(['namespace'  => 'Api'], function() {

    // Products Api
    Route::get('products', 'ProductController@getAllProducts');

    // Payment Setting Api
    Route::get('checkout', 'CheckoutController@getPaymentSetting');

    // Order Items Api
    Route::post('order-items', 'CheckoutController@saveOrderItems');

});


