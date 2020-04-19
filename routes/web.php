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

Route::view('/buttons', 'buttons');
Route::view('/', 'index');
Route::post('/paypal-checkout', 'PaypalController@postPaypalCheckout');
Route::get('/paypal-checkout-cancel', 'PaypalController@getCancelOrder');
Route::get('/paypal-checkout-success', 'PaypalController@getSuccessOrder');
