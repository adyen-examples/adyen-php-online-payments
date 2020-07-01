<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'CheckoutController@index');
Route::get('/preview', 'CheckoutController@preview');
Route::get('/checkout/{type}', 'CheckoutController@getPaymentMethods');
Route::post('/api/initiatePayment', 'CheckoutController@initiatePayment');
Route::match(['get', 'post'], '/api/handleShopperRedirect', 'CheckoutController@handleShopperRedirect');
Route::post('/api/submitAdditionalDetails', 'CheckoutController@submitAdditionalDetails');

Route::get('/error', 'CheckoutController@error')->name('error');
Route::get('/pending', 'CheckoutController@pending')->name('pending');
Route::get('/failed', 'CheckoutController@failed')->name('failed');
Route::get('/success', 'CheckoutController@success')->name('success');
