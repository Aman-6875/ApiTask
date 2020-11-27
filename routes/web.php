<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('auth');
});
Route::get('apiData/post', 'ApiDataController@store');

Route::get('/welcome', 'AutocompleteController@index');
Route::get('/autocomplete/fetch', 'AutocompleteController@fetch')->name('autocomplete.fetch');
Route::post('/login-check', 'AutocompleteController@loginCheck');
Route::post('/register', 'AutocompleteController@register');
