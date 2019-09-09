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

Route::group(['prefix' => 'v1'], function () {
    Route::group(['prefix' => 'orders', 'namespace' => 'Order'], function () {
        Route::get('/', 'OrderController@index');
        Route::post('/', 'OrderController@create');
        Route::get('/{order-id}', 'OrderController@get');
        Route::put('/{order-id}', 'OrderController@update');
        Route::put('/{order-id}/state', 'OrderController@updateState');
    });
});
