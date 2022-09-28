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

Route::get('/bigcommerce/{name}', 'BigCommerce@get');
Route::get('/bigcommerce/{name}/{id}', 'BigCommerce@getId');
Route::get('/bigcommerce/{name}/{id}/{var}', 'BigCommerce@getIdVar');

Route::get('/serr', function (Request $request) {
    return "";
});


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
