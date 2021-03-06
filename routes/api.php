<?php

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
        Route::post('/search', 'OrderController@search');
        Route::post('/', 'OrderController@create');
        Route::get('/{order}', 'OrderController@get');
        Route::put('/{order}', 'OrderController@update');
        Route::delete('/{order}', 'OrderController@delete');
        Route::put('/{order}/state', 'OrderController@updateState');
    });
});
