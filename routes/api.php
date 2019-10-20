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

Route::get('menu','RestController@menu');
Route::get('submenu','RestController@submenu');
Route::get('updatecheck','RestController@UpdateCheck');

Route::get('checkupdate','RestController@checkupdate');