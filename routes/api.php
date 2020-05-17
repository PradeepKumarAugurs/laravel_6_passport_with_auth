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

/* Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
}); */

Route::post('login', 'API\UserController@login');

Route::post('register', 'API\UserController@register');

Route::group(['middleware' => 'auth:api'], function(){
    
    Route::post('details', 'API\UserController@details');
    Route::post('add_product', 'API\Products@save_products');
    Route::put('update_product','API\Products@update_product');

});


