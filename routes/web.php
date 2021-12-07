<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'CheckoutController@index');
Route::get('/preview', 'CheckoutController@preview');
Route::get('/checkout/{type}', 'CheckoutController@checkout');
Route::get('/redirect', 'CheckoutController@redirect');
Route::get('/result/{type}', 'CheckoutController@result')->name('result');
// The API routes are exempted from app/Http/Middleware/VerifyCsrfToken.php
Route::post('/api/sessions', 'CheckoutController@sessions');