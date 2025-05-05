<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\aprohirdetesController;
use App\Http\Controllers\KategoriaController;
use App\Http\Controllers\HirdetesController;
use App\Http\Controllers\VasarlasController;


Route::get('/', function () {
    return view('welcome');
})->name('fooldal');

Route::get('/hirdetes', function () {
    return view('hirdetes');
})->name('hirdetes');

Route::get('/kategoria', function () {
    return view('kategoria');
})->name('kategoria');

Route::get('/vasarlas', function () {
    return view('vasarlas');
})->name('vasarlas');

Route::get('/hirdetesek',[HirdetesController::class,'index'])->name('hirdetesek');
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

Route::get('/noi-ruhak', [KategoriaController::class, 'noiRuhak'])->name('noi.ruhak');
Route::get('/noiruhak',function(){
    return view('noiruhak');
})->name('noiruhak');

Route::get('/noi-parfum', [KategoriaController::class, 'noiParfum'])->name('noi.parfum');
Route::get('/noiparfum',function(){
    return view('noiparfum');
})->name('noiparfum');

Route::get('/noi-kieg', [KategoriaController::class, 'noiKieg'])->name('noi.kieg');
Route::get('/noikieg',function(){
    return view('noikieg');
})->name('noikieg');




Route::get('/ferfi-ruha', [KategoriaController::class, 'ferfiRuha'])->name('ferfi.ruha');
Route::get('/ferfiruha',function(){
    return view('ferfiruha');
})->name('ferfiruha');


Route::get('/ferfi-parfum', [KategoriaController::class, 'ferfiParfum'])->name('Ferfi.parfum');
Route::get('/ferfiparum',function(){
    return view('ferfiparfum');
})->name('ferfiparum');


Route::get('/ferfi-kieg', [KategoriaController::class, 'ferfiKieg'])->name('ferfi.kieg');
Route::get('/ferfikieg',function(){
    return view('ferfikieg');
})->name('ferfikieg');





Route::get('/otthon-but', [KategoriaController::class, 'otthonBut'])->name('otthon.but');
Route::get('/otthonbut',function(){
    return view('otthonbut');
})->name('otthonbut');

Route::get('/otthon-dek', [KategoriaController::class, 'otthonDek'])->name('otthon.Dek');
Route::get('/otthondek',function(){
    return view('otthondek');
})->name('otthondek');


Route::get('/otthon-haz', [KategoriaController::class, 'otthonHaz'])->name('otthon.haz');
Route::get('/otthonhaz',function(){
    return view('otthonhaz');
})->name('otthonhaz');





Route::get('/ee-mobil', [KategoriaController::class, 'eeMobil'])->name('ee.mobil');
Route::get('/eemobil',function(){
    return view('eemobil');
})->name('eemobil');

Route::get('/ee-laptopok', [KategoriaController::class, 'eeLaptopok'])->name('ee.laptopok');
Route::get('/eelaptopok',function(){
    return view('eelaptopok');
})->name('eelaptopok');


Route::get('/ee-kieg', [KategoriaController::class, 'eeKieg'])->name('ee.kieg');
Route::get('/eekieg',function(){
    return view('eekieg');
})->name('eekieg');







Route::get('/eladas', [KategoriaController::class, 'eladas'])->name('eladas');
Route::get('/eladas',function(){
    return view('eladas');
})->name('eladas');





