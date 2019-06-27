<?php

use Illuminate\Http\Request;

use App\Band;
use App\Album;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::get('/bands', function () {   
    return view('bands', [
        'bands' => Band::all()
    ]);
});


Route::get('/band/{id?}', function ($id = null) {    
    if (isset($id)) {
        $band = Band::find($id);
    }
    else {
        $band = new Band();
    }
    
    return view('bands_edit')->with([
        'id' => $id,
        'details' => $band
    ]);
});

Route::post('/band/{id?}', function (Request $request, $id = null) {
    // validate the album details
    // save the album
    if (isset($id)) {
        Band::find($id)->update($request->all());
        $message = 'Band was updated!';
    }
    else {
        Band::create($request->all());
        $message = 'Band was created!';
    }
    return redirect('/bands')->with('success', $message);
});





Route::get('/albums', function () {
    return view('albums', [
        'albums' => Album::all(),
        'bands' => Band::all('id', 'name'),

    ]);
});


Route::get('/album/{id?}', function ($id = null) {    
    if (isset($id)) {
        $album = Album::find($id);
    }
    else {
        $album = new Album();
    }
    
    return view('albums_edit')->with([
        'id' => $id,
        'bands' => Band::all('id', 'name'),
        'details' => $album
    ]);
});


Route::post('/album/{id?}', function (Request $request, $id = null) {
    // validate the album details
    // save the album
    if (isset($id)) {
        Album::find($id)->update($request->all());
        $message = 'Album was updated!';
    }
    else {
        Album::create($request->all());
        $message = 'Album was created!';
    }
    return redirect('/albums')->with('success', $message);
});
