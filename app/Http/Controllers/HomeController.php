<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HirdetesModel;
use App\Models\KategoriaModel;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $legnepszerubb = HirdetesModel::popular()->get(); // Meghívjuk a scope-ot
        
        return view('welcome', compact('legnepszerubb'));
    }
}
