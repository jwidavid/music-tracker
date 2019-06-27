<?php

use Illuminate\Http\Request;

use App\Band;
use App\Album;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::view('/', 'welcome');

Route::get('/bands', 'BandsController@index');
Route::get('/band/{band?}', 'BandsController@edit');
Route::post('/band/{band?}', 'BandsController@update');
Route::post('/band', 'BandsController@store');
Route::delete('/band/{band?}/delete', 'BandsController@destroy');

Route::get('/albums', 'AlbumsController@index');
Route::get('/album/{album?}', 'AlbumsController@edit');
Route::post('/album/{album?}', 'AlbumsController@update');
Route::post('/album', 'AlbumsController@store');
Route::delete('/album/{album?}/delete', 'AlbumsController@destroy');
