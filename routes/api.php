<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HirdetesController;

Route::get('/egyUser/{user_id}',[HirdetesController::class,'getUser']);