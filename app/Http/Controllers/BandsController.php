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
        $band->update(request()->validate([
            'name' => 'bail|required|min:1|max:50',
            'start_date' => 'nullable|date',
            'website' => 'nullable|url|max:255',
            'still_active' => 'boolean'

        ]));
        $band->save();
        return redirect('/bands')->withSuccessMessage('You updated the band');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        Band::create(request()->validate([
            'name' => 'bail|required|min:1|max:50',
            'start_date' => 'nullable|date',
            'website' => 'nullable|url|max:255',
            'still_active' => 'boolean'

        ]));
        return redirect('/bands')->withSuccessMessage('You created a new band');
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
        return redirect('/bands')->withSuccessMessage('You removed a band');
    }
}
