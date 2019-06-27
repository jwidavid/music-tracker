<?php

use Illuminate\Http\Request;

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
        'bands' => Band::all('id', 'name'),

    ]);
});


Route::get('/album/{id?}', function ($id = null) {    
    if (isset($id)) {
        $band = Album::find($id);
    }
    else {
        $band = new Album();
    }
    
    return view('albums_edit')->with([
        'id' => $id,
        'bands' => Band::all('id', 'name'),
        'details' => $band
    ]);
});


Route::post('/album/{id?}', function (Request $request, $id = null) {
    // validate the album details
    // save the album
    if (isset($id)) {
        Album::find($id)->update($request->all());
    }
    else {
        Album::create($request->all());
    }
    return redirect('/albums')->with('success', 'Album was updated!');
});
