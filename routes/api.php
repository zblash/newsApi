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







Route::prefix('v1')->group(function () {
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::middleware('auth:api')->get('/news', 'apiController@apiIndex');

Route::middleware('auth:api')->get('/news/{id}', 'apiController@apiStore');

Route::middleware('auth:api')->get('/groups/news/{id}', 'apiController@apiStorebyGroup');

Route::middleware('auth:api')->get('/groups', 'apiController@apiGroupIndex');

Route::middleware('auth:api')->get('/groups/{id}', 'apiController@apiGroupStore');

});