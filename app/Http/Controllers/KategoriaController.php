<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KategoriaModel;

class KategoriaController extends Controller
{
    public function listaz($kid){
        $kategoria = KategoriaModel::find($kid);
    }
}
