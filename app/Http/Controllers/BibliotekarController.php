<?php

namespace App\Http\Controllers;

use App\Models\Bibliotekar;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Tipkorisnika;
use Illuminate\Support\Facades\Hash;
class BibliotekarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $idb=Tipkorisnika::where('Naziv','Bibliotekar')->first()->id;
        $bib=User::where('tipkorisnika_id',$idb)->get();
        return view('bibliotekar.index',['bib'=>$bib]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tip=Tipkorisnika::all();
        return view('bibliotekar.create',['tip'=>$tip]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
        'imePrezimeBibliotekar'=>'required',
        'jmbgBibliotekar'=>'required|max:13',
        'emailBibliotekar'=>'required|email',
        'usernameBibliotekar'=>'required',
        'pwBibliotekar'=>'required',
        'pw2Bibliotekar'=>'required',
        'tip_korisnika'=>'required'
        ]);
        $bibliotekar=new User;
        $bibliotekar->ImePrezime=$request->imePrezimeBibliotekar;
        $bibliotekar->JMBG=$request->jmbgBibliotekar;
        $bibliotekar->Email=$request->emailBibliotekar;
        $bibliotekar->KorisnickoIme=$request->usernameBibliotekar;
        $bibliotekar->password=Hash::make($request->pwBibliotekar);
        $bibliotekar->tipkorisnika_id=$request->tip_korisnika;
        $bibliotekar=$bibliotekar->save();
        if($bibliotekar){
          return redirect()->route('bibliotekar.index')->with('success','Bibliotekar je uspjesno dodat');
        }else{
          return redirect()->route('bibliotekar.index')->with('fail','Bibliotekar nije uspjesno dodat');
        }

    
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Bibliotekar  $bibliotekar
     * @return \Illuminate\Http\Response
     */
    public function show(User $bibliotekar)
    {
        $bibliotekar=User::where('Id',$bibliotekar->id)->first();
    
        return view('bibliotekar.show',['b'=>$bibliotekar]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Bibliotekar  $bibliotekar
     * @return \Illuminate\Http\Response
     */
    public function edit(User $bibliotekar)
    {
        $bibliotekar=User::where('id',$bibliotekar->id)->first();
        $tip=Tipkorisnika::all();
       //'t'=>$tip
        return view('bibliotekar.edit',['b'=>$bibliotekar,'tip'=>$tip]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Bibliotekar  $bibliotekar
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $bibliotekar)
    {
        $request->validate([
            'imePrezimeBibliotekarEdit'=>'required',
            'jmbgBibliotekarEdit'=>'required|max:13',
            'emailBibliotekarEdit'=>'required|email',
            'usernameBibliotekarEdit'=>'required',
            'pwBibliotekarEdit'=>'required',
            'pw2BibliotekarEdit'=>'required',
            'tip_korisnika'=>'required'
            ]);
            $bibliotekar=new User;
            $bibliotekar->ImePrezime=$request->imePrezimeBibliotekarEdit;
            $bibliotekar->JMBG=$request->jmbgBibliotekarEdit;
            $bibliotekar->Email=$request->emailBibliotekarEdit;
            $bibliotekar->KorisnickoIme=$request->usernameBibliotekarEdit;
            $bibliotekar->password=Hash::make($request->pwBibliotekarEdit);
            $bibliotekar->tipkorisnika_id=$request->tip_korisnika;
            $bibliotekar=$bibliotekar->save();
            if($bibliotekar){
              return redirect()->route('bibliotekar.index')->with('success','Bibliotekar je uspjesno azuriran');
            }else{
              return redirect()->route('bibliotekar.index')->with('fail','Bibliotekar nije uspjesno azuriran');
            }
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Bibliotekar  $bibliotekar
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $bibliotekar)
    {
        $bibliotekar=User::where('id',$bibliotekar->id)->delete();
        if($bibliotekar){
            return redirect()->route('bibliotekar.index')->with('success','Bibliotekar je uspjesno obrisan');
          }else{
            return redirect()->route('bibliotekar.index')->with('fail','Bibliotekar nije uspjesno obrisan');
          }
  
    }
}
