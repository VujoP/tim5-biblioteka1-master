<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PismoController;
use App\Http\Controllers\PovezController;
use App\Http\Controllers\FormatController;
use App\Http\Controllers\IzdavacController;
use App\Http\Controllers\KategorijaController;
use App\Http\Controllers\UcenikController;
use App\Http\Controllers\KorsnikController;
use App\Http\Controllers\TipkorsnikaController;
use App\Http\Controllers\ZanrController;
use App\Http\Controllers\PolisaController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\HomeController;

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
// Route za dashboard



// Route::get('/format',[FormatController::class,'index'])->name('format.index');
// Route::get('/format/{id}',[FormatController::class,'show'])->name('format.edit');
// Route::post('/format-update',[FormatController::class,'update'])->name('format.update');
// Route::get('/addFromat',[FormatController::class,'addFormat'])->name('format.create');
// Route::post('/addFormat',[FormatController::class,'saveFormat'])->name('format.save');
// Route::get("/format/delete/{id}",[FormatController::class,'destroy'])->name('format.delete');

// route za izdavac
/*
Route::get('/izdavac',[IzdavacController::class,'index'])->name('izdavac.index');
Route::get('/addIzdavac',[IzdavacController::class,'addIzdavac'])->name('izdavac.create');
Route::post('/addIzdavac',[IzdavacController::class,'saveIzdavac'])->name('izdavac.save');
Route::get('/izdavac/{id}',[IzdavacController::class,'show'])->name('izdavac.edit');
Route::post('/izdavac-update',[IzdavacController::class,'update'])->name('izdavac.update');
Route::get('/izdavac/delete/{id}',[IzdavacController::class,'delete'])->name('izdavac.delete');
*/
Route::middleware(['auth'])->group(function () {

    Route::get("/",function(){
        return view('dashboard.index');
    })->name('dashboard');
//Route::get('/settings',[PismoController::class,'index')->name('settings');
    Route::get('/settings',function(){
        return view('settings.index');
    })->name('settings');
// kraj route za dashboard
    Route::resource('pismo', PismoController::class);
// route za Izdavac
    Route::resource('kategorija',KategorijaController::class);
    Route::resource('izdavac',IzdavacController::class);
    Route::resource('format',FormatController::class);
    Route::resource('povez',PovezController::class);

    Route::get('/settingsKategorije', [KategorijaController::class,'index'])->name("kategorije");

    Route::get('/createKategorije', [KategorijaController::class,'create'])->name("kategorije.create");

    Route::post('/storeKategorije',[KategorijaController::class,'store'] )->name("kategorije.store");

    Route::get('/deleteKategorije/{id}', [KategorijaController::class,'delete'] )->name("kategorije.delete");

    Route::get('/editKategorije/{id}', [KategorijaController::class,'edit'])->name("kategorije.edit");

    Route::post('/updateKategorije/{id}', [KategorijaController::class,'update'])->name("kategorije.update");
    Route::resource('ucenik',UcenikController::class);
    Route::resource('zanr',ZanrController::class);
    Route::get('polisa',function(){
        return view('polisa.index');
    });
    Route::get("/home",function(){
        return view('dashboard.index');
    })->name('home');
});

// registracija

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::post('login/{provider}/callback', [LoginController::class,'handleCallback']);
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
