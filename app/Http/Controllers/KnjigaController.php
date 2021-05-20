<?php

namespace App\Http\Controllers;

use App\Models\Autor;
use App\Models\Izdavac;
use App\Models\Kategorija;
use App\Models\Knjiga;
use App\Models\Pismo;
use App\Models\Zanr;
use Illuminate\Http\Request;

class KnjigaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $knjige=Knjiga::all();
        return view('knjiga.index', compact('knjige'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $kategorije = Kategorija::all();
        $zanrovi = Zanr::all();
        $autori = Autor::all();
        $pisma = Pismo::all();
        $izdavaci = Izdavac::all();

        return view('knjiga.create',
            compact('kategorije', 'zanrovi', 'autori', 'pisma', 'izdavaci')
        );
    }
    /**
     * Prikaz forme za specifikaciju knjige.
     *
     * @return \Illuminate\Http\Response
     */
    public function specifikacija()
    {
        return view('knjiga.createspecifikacija');
    }

    /**
     * Prikaz forme za multimedia knjige.
     *
     * @return \Illuminate\Http\Response
     */
    public function multimedia()
    {
        return view('knjiga.createmultimedia');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Knjiga  $knjiga
     * @return \Illuminate\Http\Response
     */
    public function show(Knjiga $knjiga)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Knjiga  $knjiga
     * @return \Illuminate\Http\Response
     */
    public function edit(Knjiga $knjiga)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Knjiga  $knjiga
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Knjiga $knjiga)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Knjiga  $knjiga
     * @return \Illuminate\Http\Response
     */
    public function destroy(Knjiga $knjiga)
    {
        //
    }
}
