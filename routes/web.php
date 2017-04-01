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


Route::get('/', 'MainController@home');
Route::get('/product/{slug}', 'MainController@show');

Route::get('/checkout', 'ShoppingCartController@view');
Route::resource('checkout', 'inShoppingCartController',['only'=>['store','destroy']]);
Route::get('/payments', 'ShoppingCartController@payment');

Route::get('/payments/store', 'PaymentController@store');
Route::resource('/purchases','PaymentController',['only'=>['show']]);

Route::resource('products', 'ProductsController');
Route::resource('orders','OrdersController',['only'=>['index','update']]);

Auth::routes();
