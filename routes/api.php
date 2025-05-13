<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HirdetesController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::get('/egyUser/{user_id}',[HirdetesController::class,'getUser']);
Route::get('/Userek',[HirdetesController::class,'allUser']);
Route::delete('/userTorles/{id}', [HirdetesController::class, 'userTorles']);


Route::post('/userLetrehozas/new',[HirdetesController::class,'userLetrehozas']);
