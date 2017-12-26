<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//Route::get('/products',function(){
//   dd(":)");
//});

Route::resource('products', 'ProductController');
Route::resource('customers', 'CustomerController');
Route::resource('orders', 'OrderController');
Route::resource('payments', 'PaymentController');


Route::get('/customers/{customer}/orders','CustomerController@getCustomerOrders');
Route::get('/customers/{customer}/payments','CustomerController@getCustomerPayments');

Route::post('/customers/{customer}/orders','CustomerController@storeCustomerOrder');
Route::post('/customers/{customer}/payments','CustomerController@storeCustomerPayment');
