<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\aprohirdetesController;
use App\Http\Controllers\KategoriaController;





Route::get('/', [aprohirdetesController::class,'index'])->name('fooldal');
Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


// Logout route
Route::post('/logout', function () {
    Auth::logout();
    return redirect('/');
})->name('logout');

Auth::routes();

Route::get('/kategoria/{kid}',[KategoriaController::class,'listaz'])->name('kategoria');
