<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PismoController;
use App\Http\Controllers\PovezController;
use App\Http\Controllers\FormatController;
use App\Http\Controllers\IzdavacController;
use App\Http\Controllers\AutorController;
use App\Http\Controllers\KorisnikController;
use App\Http\Controllers\BibliotekarController;
use App\Http\Controllers\TipkorisnikaController;
use App\Http\Controllers\UcenikController;
use App\Http\Controllers\KnjigaController;
use App\Http\Controllers\ZanrController;
use App\Http\Controllers\KategorijaController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Dodajemo middleware za odredjivanje vidljivosti ruta
Route::middleware(['auth'])->group(function(){
});
//Route::get('/settings',[PismoController::class,'index')->name('settings');
Route::get('/settings',function(){
    return view('polisa.index');
})->name('settings');
// kraj route za dashboard
Route::resource('pismo',PismoController::class);

Route::get('/povez',[PovezController::class,'index'])->name('povez.index');
Route::get('/povez/{id}',[PovezController::class,'show'])->name('povez.edit');
Route::post('/povez-update',[PovezController::class,'update'])->name('povez.update');
Route::get('/addPovez',[PovezController::class,'addPovez'])->name('povez.create');
Route::post('/addPovez',[PovezController::class,'savePovez'])->name('povez.save');
Route::get("/povez/delete/{id}",[PovezController::class,'destroy'])->name('povez.delete');

Route::get('/format',[FormatController::class,'index'])->name('format.index');
Route::get('/format/{id}',[FormatController::class,'show'])->name('format.edit');
Route::post('/format-update',[FormatController::class,'update'])->name('format.update');
Route::get('/addFromat',[FormatController::class,'addFormat'])->name('format.create');
Route::post('/addFormat',[FormatController::class,'saveFormat'])->name('format.save');
Route::get("/format/delete/{id}",[FormatController::class,'destroy'])->name('format.delete');

// route za izdavac
/*
Route::get('/izdavac',[IzdavacController::class,'index'])->name('izdavac.index');
Route::get('/addIzdavac',[IzdavacController::class,'addIzdavac'])->name('izdavac.create');
Route::post('/addIzdavac',[IzdavacController::class,'saveIzdavac'])->name('izdavac.save');
Route::get('/izdavac/{id}',[IzdavacController::class,'show'])->name('izdavac.edit');
Route::post('/izdavac-update',[IzdavacController::class,'update'])->name('izdavac.update');
Route::get('/izdavac/delete/{id}',[IzdavacController::class,'delete'])->name('izdavac.delete');
*/

// route za Izdavac
Route::resource('izdavac',IzdavacController::class);
//Route za Autor
Route::resource('autor',AutorController::class);
// Route za Bibliotekar
Route::resource('bibliotekar',BibliotekarController::class);
// Route za Ucenika
Route::resource('ucenik',UcenikController::class);

 // Route za dashboard
 Route::get("/",function(){
    return view('dashboard.index');
})->name('dashboard');

Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Auth::routes();

//Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Route za knjigu
Route::get('knjiga0',[KnjigaController::class,'create0']);
Route::resource('knjiga',KnjigaController::class);
Route::get('knjiga-{knjiga}/specifikacija',[KnjigaController::class,'spec'])->name('knjiga.spec');
//Route za zanr
Route::resource('zanr',ZanrController::class);
//Route za kategoriju
Route::resource('kategorija',KategorijaController::class);
