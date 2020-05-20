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
    Route::post('login', 'LoginController');
    // Register Api
    Route::post('register', 'RegisterController');
    // Verify
    Route::post('verify', 'VerifyController');
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
    Route::post('change-language', 'ChangeLanguageController');

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

    // Update Token Api
    Route::post('update-token', 'UpdateTokenController@updateToken');

    // Check Promo Api
    Route::post('promo-code', 'PromoCodeController@check');

    // Contact Message
    Route::post('message', 'MessageController@send');

    //Contact Info
    Route::get('contact', 'ContactInfoController@getContactInfo');

});


