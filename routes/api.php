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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/user/register',   'Api\UserController@register');

Route::post('/user/{id}',       'Api\UserController@updateUser');

Route::get('/user/all',         'Api\UserController@all');

Route::get('/user/{id}',        'Api\UserController@find');

Route::get('/user/{id}/delete', 'Api\UserController@deleteUser');



Route::post('/item/register',      'Api\ItemController@register');

Route::post('/item/{id}',           'Api\ItemController@updateItem');

Route::get('/item/all',             'Api\ItemController@all');

Route::get('/item/{id}',            'Api\ItemController@find');

Route::get('/item/{id}/delete',     'Api\ItemController@deleteItem');


