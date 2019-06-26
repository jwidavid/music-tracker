<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::get('/', function () {

    $bands = [
        ['name' => 'Glenn Miller', 'albums' => 2],
        ['name' => 'Frank Sinatra', 'albums' => 3],
        ['name' => 'Mills Brothers', 'albums' => 2],
        ['name' => 'Nat King Cole', 'albums' => 1]
    ];
    
    return view('bands', [
        'bands' => $bands
    ]);
});

Route::get('/albums', function () {

    $bands = [
        ['name' => 'Glenn Miller', 'albums' => 2],
        ['name' => 'Frank Sinatra', 'albums' => 3],
        ['name' => 'Mills Brothers', 'albums' => 2],
        ['name' => 'Nat King Cole', 'albums' => 1]
    ];

    $albums = [
        ['title' => 'The Glenn Miller Carnegie Hall Concert', 'tracks' => 9, 'band' => 'Glenn Miller'],
        ['title' => 'Glenn Miller and his Orchestra', 'tracks' => 10, 'band' => 'Glenn Miller'],
        ['title' => 'Come Fly with Me', 'tracks' => 15, 'band' => 'Frank Sinatra'],
        ['title' => "That's Life", 'tracks' => 10, 'band' => 'Frank Sinatra'],
        ['title' => 'My Way', 'tracks' => 24, 'band' => 'Frank Sinatra'],
        ['title' => "Singin' and Swingin'", 'tracks' => 24, 'band' => 'Mills Brothers'],
        ['title' => '22 Great Hits', 'tracks' => 22, 'band' => 'Mills Brothers'],
        ['title' => 'Unforgettable', 'tracks' => 12, 'band' => "Nat 'King' Cole"]
    ];
    
    return view('albums', [
        'albums' => $albums,
        'bands' => $bands
    ]);
});

Route::get('/welcome', function () {
    return view('welcome');
});
