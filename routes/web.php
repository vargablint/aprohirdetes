<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\aprohirdetesController;
use App\Http\Controllers\KategoriaController;
use App\Http\Controllers\HirdetesController;
use App\Http\Controllers\VasarlasController;
use App\Http\Controllers\KosarController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\KeresesController;
use App\Http\Controllers\HomeController;





Route::get('/', [HirdetesController::class, 'legnepszerubb'])->name('fooldal');



Route::get('/kategoria', function () {
    return view('kategoria');
})->name('kategoria');

Route::get('/vasarlas', function () {
    return view('vasarlas');
})->name('vasarlas');



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

Route::post('/hirdetesek', [HirdetesController::class, 'store'])->name('hirdetesek.store');


Route::get('/eladas', [HirdetesController::class, 'create'])->name('eladas');

Route::middleware('auth')->get('/sajathirdetes', [HirdetesController::class, 'sajatHirdetesek'])->name('hirdetesek.sajat');
Route::middleware(['auth'])->group(function () {
    Route::delete('/hirdetesek/{id}/torles', [HirdetesController::class, 'torles'])->name('hirdetesek.torles');

    Route::middleware(['auth'])->prefix('admin')->group(function () {
        Route::get('/adminfelhasznalok', [HirdetesController::class, 'adminfelhasznalok'])->name('adminfelhasznalok');
        Route::get('/felhasznalo/{id}/edit', [HirdetesController::class, 'editUser'])->name('admin.user.edit');
        Route::post('/felhasznalo/{id}/update', [HirdetesController::class, 'updateUser'])->name('admin.user.update');
        Route::delete('/felhasznalo/{id}', [HirdetesController::class, 'deleteUser'])->name('admin.user.delete');
    });
    Route::get('/admin/hirdetesek', [HirdetesController::class, 'adminHirdetesek'])->name('admin.hirdetesek');
    Route::get('/admin', [HirdetesController::class, 'admin'])->name('admin');

    Route::delete('/hirdetes/{id}', [HirdetesController::class, 'destroy'])->name('hirdetesek.torles');

    Route::get('/hirdetes/{id}/edit', [HirdetesController::class, 'edit'])->name('hirdetesek.szerkesztes');
    Route::put('/hirdetes/{id}', [HirdetesController::class, 'update'])->name('hirdetesek.frissites');

    Route::get('/aprohirdetesek/{id}/kepek', [HirdetesController::class, 'showWithImages'])->name('hirdetesek.kepek');



});











Route::get('/kosar', [KosarController::class, 'megtekint'])->name('kosar.megtekint');
Route::post('/kosar/hozzaad/{id}', [KosarController::class, 'hozzaad'])->name('kosar.hozzaad');
Route::post('/kosar/torol/{id}', [KosarController::class, 'torol'])->name('kosar.torol');

Route::get('/kosar/format', [KosarController::class, 'format'])->name('kosar.format');


Route::get('/hirdetes/uj', [HirdetesController::class, 'create'])->name('ujhirdetes');
Route::post('/hirdetes/uj', [HirdetesController::class, 'store']);
Route::get('/hirdetes/modositas/{hirdetesek_id}', [HirdetesController::class, 'edit']);
Route::post('/hirdetes/modositas/{hirdetesek_id}', [HirdetesController::class, 'update']);



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
