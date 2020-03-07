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
    // Reset Password Api
    Route::post('reset-password', 'AuthController@sendResetPasswordEmail');
    //Route::post('send-reset-email', 'AuthController@reset');
});

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::group(['namespace'  => 'Api'], function() {

    // Products Api
    Route::get('products', 'ProductController@getAllProducts');

    // Payment Setting Api
    Route::get('checkout', 'CheckoutController@getPaymentSetting');

    // Order Finance Api
    Route::post('order-finance', 'CheckoutController@saveOrderFinance');

    // Order Items Api
    Route::post('order-items', 'CheckoutController@saveOrderItems');

});
