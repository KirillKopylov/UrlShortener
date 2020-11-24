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

Route::namespace('App\Http\Controllers\Shorten')->group(function() {
    Route::get('/', 'ShortenController@index')->name('index');
    Route::post('/shorten', 'ShortenController@shorten')->name('shortenUrl');
    Route::get('/go/{token}', 'ShortenController@redirectWithToken')->name('go');
});
