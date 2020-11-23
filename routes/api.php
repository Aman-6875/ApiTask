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

Route::get('apiData', 'ApiDataController@index');
Route::get('apiData/{id}', 'ApiDataController@show');
Route::post('apiData/post', 'ApiDataController@store');
Route::put('apiData/{id}', 'ApiDataController@update');
Route::delete('apiData/{id}', 'ApiDataController@delete');
