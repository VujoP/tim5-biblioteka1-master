<?php

namespace App\Http\Controllers;

use App\Models\Knjiga;
use App\Models\KnjigaZanr;
use App\Models\AutorKnjiga;
use App\Models\Autor;
use App\Models\Zanr;
use App\Models\Jezik;
use App\Models\Pismo;
use App\Models\Format;
use App\Models\Povez;
use App\Models\Kategorija;
use App\Models\KategorijaKnjiga;
use Illuminate\Http\Request;
use App\Models\Izdavac;
class KnjigaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $knjige=Knjiga::with(['autors','zanrs','kategorijas'])->get();
        return view('knjiga.index',['knjige'=>$knjige]);
    }
     /*
       Start test
    */
        public function create0(){
            $kategorije=Kategorija::all();
        $zanri=Zanr::all();
        $autori=Autor::all();
        $izdavaci=Izdavac::all();
        $pisma=Pismo::all();
        $formati=Format::all();
        $jezici=Jezik::all();
        $povezi=Povez::all();
        return view('knjiga.create0',compact(
        'zanri',
        'autori',
        'kategorije',
        'pisma',
        'formati',
        'jezici',
        'povezi',
        'izdavaci'
        ));
        }

     /* kraj test*/
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kategorije=Kategorija::all();
        $zanri=Zanr::all();
        $autori=Autor::all();
        $izdavaci=Izdavac::all();
        $pisma=Pismo::all();
        $formati=Format::all();
        $jezici=Jezik::all();
        $povezi=Povez::all();
        return view('knjiga.create',compact(
        'zanri',
        'autori',
        'kategorije',
        'pisma',
        'formati',
        'jezici',
        'povezi',
        'izdavaci'
        ));
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
         'nazivKnjiga'=>'required',
         'kategorije'=>'required',
         'zanrovi'=>'required',
         'autori'=>'required',
         'izdavac'=>'required',
         'godina'=>'required',
         'knjigaKolicina'=>'required',
         'brStrana'=>'required',
         'pismo'=>'required',
         'jezik'=>'required',
         'format'=>'required',
         'povez'=>'required',
         'pismo'=>'required',
         'isbn'=>'required|min:20|max:20'
        ]);

        $autori=explode(',',$request->autori);
        $zanri=explode(',',$request->zanrovi);
        $kategorije=explode(',',$request->kategorije);
        $knjiga=Knjiga::create([
            'Naslov'=>$request->nazivKnjiga,
            'izdavac_id'=>$request->izdavac,
            'pismo_id'=>$request->pismo,
            'jezik_id'=>$request->izdavac,
            'format_id'=>$request->format,
            'povez_id'=>$request->povez,
            'BrojStrana'=>$request->brStrana,
            'DatumIzdavanja'=>$request->godina,
            'UkupnoPrimjeraka'=>$request->knjigaKolicina,
            'Sadrzaj'=>$request->kratki_sadrzaj,
            'ISBN'=>$request->isbn
           ]);

           foreach($autori as $autor):
           $knjiga->autors()->attach($autor);
           endforeach;
           foreach($zanri as $zanr):
           $knjiga->zanrs()->attach($zanr);
           endforeach;
           foreach($kategorije as $kategorija):
           $knjiga->kategorijas()->attach($kategorija);
          endforeach;
         if($knjiga){
            return redirect()->route('knjiga.index')->with('success','Nova knjige je uspjesno dodata');
           }
            return redirect()->route('knjiga.index')->with('fail','Nova knjige nije uspjesno dodata');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Knjiga  $knjiga
     * @return \Illuminate\Http\Response
     */
    public function show(Knjiga $knjiga)
    {
        $knjiga=Knjiga::with('autors','zanrs','kategorijas')->where('id',$knjiga->id)->first();
        return view('knjiga.show',compact('knjiga'));
    }
   public function spec(Knjiga $knjiga){
        $knjiga=Knjiga::with('autors','zanrs','kategorijas')->where('id',$knjiga->id)->first();

        return view('knjiga.spec',compact('knjiga'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Knjiga  $knjiga
     * @return \Illuminate\Http\Response
     */
    public function edit(Knjiga $knjiga)
    {
        $knjiga=Knjiga::where('id',$knjiga->id)->with('autors','zanrs','kategorijas')->first();
        $kategorije=Kategorija::all();
        $zanri=Zanr::all();
        $autori=Autor::all();
        $izdavaci=Izdavac::all();
        $pisma=Pismo::all();
        $formati=Format::all();
        $jezici=Jezik::all();
        $povezi=Povez::all();
        return view('knjiga.edit',compact(
            'knjiga',
            'zanri',
            'autori',
            'kategorije',
            'pisma',
            'formati',
            'jezici',
            'povezi',
            'izdavaci'
     ));
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

        $request->validate([
            'nazivKnjigaEdit'=>'required',
            'kategorije'=>'required',
            'zanrovi'=>'required',
            'autori'=>'required',
            'izdavacEdit'=>'required',
            'godinaIzdavanjaEdit'=>'required',
            'knjigaKolicinaEdit'=>'required',
            'brStranaEdit'=>'required',
            'pismo'=>'required',
            'jezik'=>'required',
            'format'=>'required',
            'povez'=>'required',
            'isbnEdit'=>'required|min:20|max:20'
        ]);

        $autori=explode(',',$request->autori);
        $zanri=explode(',',$request->zanrovi);
        $kategorije=explode(',',$request->kategorije);

        $knjiga1=Knjiga::find($knjiga->id);
        $knjiga1->Naslov=$request->nazivKnjigaEdit;
        $knjiga1->izdavac_id=$request->izdavacEdit;
        $knjiga1->pismo_id=$request->pismo;
        $knjiga1->jezik_id=$request->jezik;
        $knjiga1->format_id=$request->format;
        $knjiga1->povez_id=$request->povez;
        $knjiga1->BrojStrana=$request->brStranaEdit;
        $knjiga1->DatumIzdavanja=$request->godinaIzdavanjaEdit;
        $knjiga1->UkupnoPrimjeraka=$request->knjigaKolicinaEdit;
        $knjiga1->Sadrzaj=$request->kratki_sadrzaj;
        $knjiga1->ISBN=$request->isbnEdit;
        $knjiga=$knjiga1->save();

        $knjiga1->autors()->sync(array_values($autori));
        $knjiga1->zanrs()->sync(array_values($zanri));
        $knjiga1->kategorijas()->sync(array_values($kategorije));
        if($knjiga){
            return redirect()->route('knjiga.index')->with('success','Knjige je uspjesno azurirana');
        }else{
            return redirect()->route('knjiga.index')->with('fail','Knjige nije uspjesno azurirana');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Knjiga  $knjiga
     * @return \Illuminate\Http\Response
     */
    public function destroy(Knjiga $knjiga)
    {
        $knjiga=Knjiga::where('id',$knjiga->id)->delete();
        if($knjiga){
            return redirect()->route('knjiga.index')->with('success','Knjige je uspjesno obrisana');
           }else{
            return redirect()->route('knjiga.index')->with('fail','Knjige nije uspjesno obrisana');
           }

    }
}
