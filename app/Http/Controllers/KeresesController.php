<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HirdetesModel;

class KeresesController extends Controller
{
    public function keres(Request $request)
    {
        $query = $request->input('query');  // Keresett kifejezés

        // Keresés az összes hirdetés címében, ahol a cím tartalmazza a keresett szót
        $hirdetesek = HirdetesModel::where('title', 'like', "%{$query}%")->get();

        // Ha nincs találat, akkor a 'uzenet' változót is átadjuk
        $uzenet = null;
        if ($hirdetesek->isEmpty()) {
            $uzenet = 'Ilyen megnevezésű termék nincsen.';
        }

        // Visszatérés a keresési eredmények nézetével
        return view('kereses_eredmeny', [
            'hirdetesek' => $hirdetesek,
            'uzenet' => $uzenet
        ]);
    }
}
