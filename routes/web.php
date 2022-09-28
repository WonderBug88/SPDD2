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
// dd("sdf");

Route::group(['middleware' => ['guest']], function() {
    Route::get('/login', 'LoginController@show')->name('login');
    Route::post('/login', 'LoginController@login')->name('login.perform');
});

Route::group(['middleware' => ['auth']], function() {
    Route::get('/logout', 'LogoutController@perform')->name('logout.perform');
});

Route::group(['middleware' => ['auth']], function() {
	Route::get('{any}', function () {
		return view('welcome');
	})->where('any', '.*');
	Route::get('/', function () {
		return view('welcome');
	})->where('any', '.*');

    Route::get('/', function () {
		return view('welcome');
	})->name('home');
    
});
