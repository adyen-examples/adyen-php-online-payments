<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'CheckoutController@index');
Route::get('/preview', 'CheckoutController@preview');
Route::get('/checkout/{type}', 'CheckoutController@checkout');
Route::get('/result/{type}', 'CheckoutController@result')->name('result');
// The API routes are exempted from app/Http/Middleware/VerifyCsrfToken.php
Route::post('/api/getPaymentMethods', 'CheckoutController@getPaymentMethods');
Route::post('/api/initiatePayment', 'CheckoutController@initiatePayment');
Route::post('/api/submitAdditionalDetails', 'CheckoutController@submitAdditionalDetails');
Route::match(['get', 'post'], '/api/handleShopperRedirect', 'CheckoutController@handleShopperRedirect');

