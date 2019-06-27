<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Band;
use App\Album;

class BandsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('bands', [
            'bands' => Band::all()
        ]);
    }

    /**
     * Show the form for editing or creating the specified resource.
     *
     * @param  Band  $band
     * @return \Illuminate\Http\Response
     */
    public function edit(Band $band)
    {
        return view('bands_edit')->with([
            'details' => $band
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Band  $band
     * @return \Illuminate\Http\Response
     */
    public function update(Band $band)
    {
        $band->update(request()->all());
        $band->save();
        return redirect('/bands')->with('success', 'You updated the band!');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        Band::create(request()->all());
        return redirect('/bands')->with('success', 'You created a new band!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Band  $band
     * @return \Illuminate\Http\Response
     */
    public function destroy(Band $band)
    {
        $band->delete();
        return redirect('/bands')->with('success', 'You removed a band.');
    }
}
