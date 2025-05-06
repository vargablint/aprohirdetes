<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\aprohirdetesController;
use App\Http\Controllers\KategoriaController;
use App\Http\Controllers\HirdetesController;
use App\Http\Controllers\VasarlasController;
use App\Http\Controllers\KosarController;
use Illuminate\Support\Facades\Auth;



Route::get('/', [HirdetesController::class, 'legnepszerubb'])->name('fooldal');




Route::get('/kategoria', function () {
    return view('kategoria');
})->name('kategoria');

Route::get('/vasarlas', function () {
    return view('vasarlas');
})->name('vasarlas');

Route::get('/eladas', [HirdetesController::class, 'eladas'])->name('eladas');


Route::get('/noi-ruhak', [HirdetesController::class, 'noiruhak'])->name('noi.ruhak');
Route::get('/noiparfum', [HirdetesController::class, 'noiparfum'])->name('noiparfum');
Route::get('/noikieg', [HirdetesController::class, 'noikieg'])->name('noikieg');

Route::get('/ferfiruha', [HirdetesController::class, 'ferfiruha'])->name('ferfiruha');
Route::get('/ferfiparfum', [HirdetesController::class, 'ferfiparfum'])->name('ferfiparfum');
Route::get('/ferfikieg', [HirdetesController::class, 'ferfikieg'])->name('ferfikieg');

Route::get('/otthonbut', [HirdetesController::class, 'otthonbut'])->name('otthonbut');
Route::get('/otthondek', [HirdetesController::class, 'otthondek'])->name('otthondek');
Route::get('/otthonhaz', [HirdetesController::class, 'otthonhaz'])->name('otthonhaz');

Route::get('/eemobil', [HirdetesController::class, 'eemobil'])->name('eemobil');
Route::get('/eelaptopok', [HirdetesController::class, 'eelaptopok'])->name('eelaptopok');
Route::get('/eekieg', [HirdetesController::class, 'eekieg'])->name('eekieg');










Route::get('/kosar', [KosarController::class, 'megtekint'])->name('kosar.megtekint');
Route::post('/kosar/hozzaad/{id}', [KosarController::class, 'hozzaad'])->name('kosar.hozzaad');
Route::post('/kosar/torol/{id}', [KosarController::class, 'torol'])->name('kosar.torol');

Route::get('/kosar/format', [KosarController::class, 'format'])->name('kosar.format');


Route::get('/hirdetes/uj', [HirdetesController::class, 'create'])->name('ujhirdetes');
Route::post('/hirdetes/uj', [HirdetesController::class, 'store']);
Route::get('/hirdetes/{hirdetesek_id}', [HirdetesController::class, 'show']);
Route::get('/hirdetes/modositas/{hirdetesek_id}', [HirdetesController::class, 'edit']);
Route::post('/hirdetes/modositas/{hirdetesek_id}', [HirdetesController::class, 'update']);
Route::post('/hirdetes/torles', [HirdetesController::class, 'destroy']);
Route::get('/hirdetes/torles/{hirdetesek_id}', [HirdetesController::class, 'destroyConfirm'])->name('destroyConfirm');



Route::get('/kategoriak',[KategoriaController::class,'index'])->name('kategoriak');
Route::get('/kategoriak/uj',[KategoriaController::class,'create']);
Route::get('/kategoriak/uj',[KategoriaController::class,'store']);
Route::get('/kategoriak/modositas/{kategoria_id}',[KategoriaController::class,'edit']);
Route::get('/kategoriak/modotisas/{kategoria_id}',[KategoriaController::class,'update']);
Route::get('/kategoriak/torles',[KategoriaController::class,'destroy']);


Route::get('/vasarlasok',[VasarlasController::class,'index'])->name('vasarlasok');
Route::get('/vasarlasok/uj',[VasarlasController::class,'create'])->name('ujvasarlas');
Route::post('/vasarlasok/uj',[VasarlasController::class,'store']);
Route::get('/vasarlasok/modositas/{vasarlasok_id}',[VasarlasController::class,'edit']);
Route::get('/vasarlasok/modositas/{vasarlasok_id}',[VasarlasController::class,'update']);
Route::get('/vasarlasok/torles',[VasarlasController::class,'delete']);
Route::get('/vasarlasok/lezaras/{lezaras_id}',[VasarlasController::class,'showLezar']);
Route::get('/vasarlasok/lezaras/{lezaras_id}',[VasarlasController::class,'close']);


Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


// Logout route
Route::post('/logout', function () {
    Auth::logout();
    return redirect('/');
})->name('logout');

Auth::routes();

Route::get('/kategoria/{kid}',[KategoriaController::class,'listaz'])->name('kategoria');
Route::get('/rolunk',function(){
    return view('rolunk');
})->name('rolunk');
