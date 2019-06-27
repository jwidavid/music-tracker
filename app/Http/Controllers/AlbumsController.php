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
        $album->update(request()->all());
        $album->save();
        return redirect('/albums')->with('success', 'You updated the album!');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        Album::create(request()->all());
        return redirect('/albums')->with('success', 'You created a new album!');
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
        return redirect('/albums')->with('success', 'You removed a band.');
    }
}
