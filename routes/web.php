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
Route::get('/kategoria/{id}', [KategoriaController::class, 'show'])->name('kategoria');



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

