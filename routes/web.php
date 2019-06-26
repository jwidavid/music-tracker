<?php

use App\Band;
use App\Album;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::get('/', function () {   
    return view('bands', [
        'bands' => Band::all()
    ]);
});

Route::get('/albums', function () {
    return view('albums', [
        'albums' => Album::all(),
        'bands' => Band::all('id', 'name')
    ]);
});

Route::get('/welcome', function () {
    return view('welcome');
});
