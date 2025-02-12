<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\aprohirdetesController;



Route::get('/', [aprohirdetesController::class,'index'])->name('fooldal');

