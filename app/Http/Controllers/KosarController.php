<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HirdetesModel;  // Ezt hozzá kell adni!

class KosarController extends Controller
{
    public function hozzaad($id)
    {
        // Megkeressük a terméket az ID alapján
        $hirdetes = HirdetesModel::findOrFail($id); // HirdetesModel helyett Hirdetes

        // A sessionban tároljuk a kosarat
        $kosar = session()->get('kosar', []);

        // Ha már létezik a termék a kosárban, frissítjük a mennyiséget
        if (isset($kosar[$id])) {
            $kosar[$id]['quantity']++;
        } else {
            $kosar[$id] = [
                "id" => $hirdetes->hirdetesek_id,
                "title" => $hirdetes->title,
                "ar" => $hirdetes->ar,
                "quantity" => 1,
            ];
        }

        // Frissítjük a kosarat a session-ben
        session(['kosar' => $kosar]);

        // Visszairányítjuk a felhasználót a korábbi oldalra
        return redirect()->back()->with('success', 'Hozzáadva a kosárhoz!');
    }
    public function megtekint()
{
    $kosar = session()->get('kosar', []);
    return view('kosar', compact('kosar'));
}
public function torol($id)
{
    // Kosár lekérése a session-ból
    $kosar = session()->get('kosar', []);

    // Ha létezik az adott termék azonosító, eltávolítjuk a kosárból
    if (isset($kosar[$id])) {
        if($kosar[$id]['quantity'] > 1){
            $kosar[$id]['quantity']--;
        }else{
            unset($kosar[$id]);
        }
        
        
        session(['kosar' => $kosar]);
    }

    // Visszairányítjuk a felhasználót a kosár oldalra
    return redirect()->route('kosar.megtekint')->with('success', 'Termék eltávolítva a kosárból.');
}

public function format(){
    return session()->get('kosar',[]);
}

}
