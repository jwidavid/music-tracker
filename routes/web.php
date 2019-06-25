<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::get('/', function () {

    $bands = [
        ['name' => 'Glen Miller', 'albums' => 3],
        ['name' => 'Frank Sinatra', 'albums' => 10],
        ['name' => 'Mills Brothers', 'albums' => 4],
        ['name' => 'Nat King Cole', 'albums' => 3]
    ];
    
    return view('bands', [
        'bands' => $bands
    ]);
});

Route::get('/welcome', function () {
    return view('welcome');
});
