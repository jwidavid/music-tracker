<?php

namespace App\Http\Controllers;

use App\Band;
use App\Album;
use Illuminate\Http\Request;

class AlbumsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('albums', [
            'albums' => Album::all(),
            'bands' => Band::all('id', 'name')
        ]);
    }

    /**
     * Show the form for editing or creating the specified resource.
     *
     * @param  Album  $album
     * @return \Illuminate\Http\Response
     */
    public function edit(Album $album)
    {
        return view('albums_edit')->with([
            'bands' => Band::all('id', 'name'),
            'details' => $album
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Album  $album
     * @return \Illuminate\Http\Response
     */
    public function update(Album $album)
    {
        $album->update(request()->validate([
            'name' => 'bail|required|max:255',
            'band_id' => 'required|integer',
            'recorded_date' => 'nullable|date|before:today',
            'release_date' => 'nullable|date|before:today',
            'number_of_tracks' => 'nullable|integer|max:50',
            'label' => 'nullable|max:32',
            'producer' => 'nullable|max:32',
            'genre' => 'nullable|max:21'

        ]));
        $album->save();
        return redirect('/albums')->withSuccessMessage('You updated the album');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        Album::create(request()->validate([
            'name' => 'bail|required|max:255',
            'band_id' => 'required|integer',
            'recorded_date' => 'nullable|before:today',
            'release_date' => 'nullable|before:today',
            'number_of_tracks' => 'nullable|integer',
            'label' => 'nullable|max:32',
            'producer' => 'nullable|max:32',
            'genre' => 'nullable|max:21'

        ]));
        return redirect('/albums')->withSuccessMessage('You created a new album');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Album $album
     * @return \Illuminate\Http\Response
     */
    public function destroy(Album $album)
    {
        $album->delete();
        return redirect('/albums')->withSuccessMessage('You removed an album');
    }
}
