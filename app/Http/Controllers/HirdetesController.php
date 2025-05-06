<?php

namespace App\Http\Controllers;

use App\Models\HirdetesModel;
use Illuminate\Http\Request;

class HirdetesController extends Controller
{
    public function eladas()
    {
        $hirdetesek = HirdetesModel::all();
        return view('eladas', compact('hirdetesek'));
    }
    public function legnepszerubb()
    {
        $hirdetesek = HirdetesModel::where('kategoria_id', 13)->get();
        return view('welcome', compact('hirdetesek'));
    }
    public function noiRuhak()
    {
        $hirdetesek = HirdetesModel::where('kategoria_id', 1)->get();
    
        return view('noiruhak', compact('hirdetesek'));
    }

    public function noiparfum()
{
    $hirdetesek = HirdetesModel::where('kategoria_id', 2)->get();
    return view('noiparfum', compact('hirdetesek'));
}

public function noikieg()
{
    $hirdetesek = HirdetesModel::where('kategoria_id', 3)->get();
    return view('noikieg', compact('hirdetesek'));
}

public function ferfiruha()
{
    // Feltételezve, hogy a férfiruha kategória ID-ja pl. 6
    $hirdetesek = HirdetesModel::where('kategoria_id', 4)->get();
    return view('ferfiruha', compact('hirdetesek'));
}

public function ferfiparfum()
{
    $hirdetesek = HirdetesModel::where('kategoria_id', 5)->get();
    return view('ferfiparfum', compact('hirdetesek'));
}

public function ferfikieg()
{
    $hirdetesek = HirdetesModel::where('kategoria_id', 6)->get();
    return view('ferfikieg', compact('hirdetesek'));
}

public function otthonbut()
{
    $hirdetesek = HirdetesModel::where('kategoria_id', 7)->get();
    return view('otthonbut', compact('hirdetesek'));
}

public function otthondek()
{
    $hirdetesek = HirdetesModel::where('kategoria_id', 8)->get();
    return view('otthondek', compact('hirdetesek'));
}

public function otthonhaz()
{
    $hirdetesek = HirdetesModel::where('kategoria_id', 9)->get();
    return view('otthonhaz', compact('hirdetesek'));
}

public function eemobil()
{
    $hirdetesek = HirdetesModel::where('kategoria_id', 10)->get();
    return view('eemobil', compact('hirdetesek'));
}

public function eelaptopok()
{
    $hirdetesek = HirdetesModel::where('kategoria_id', 11)->get();
    return view('eelaptopok', compact('hirdetesek'));
}

public function eekieg()
{
    $hirdetesek = HirdetesModel::where('kategoria_id', 12)->get();
    return view('eekieg', compact('hirdetesek'));
}




    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'leiras' => 'required|string',
            'ar' => 'required|numeric|min:0',
            'kategoria_id' => 'required|exists:categories,id',
            'telepules' => 'required|string|max:255',
            'status' => 'in:active,sold,expired',
        ]);

        $hirdetes = HirdetesModel::create([
            'user_id' => auth()->id(), 
            'kategoria_id' => $request->kategoria_id,
            'title' => $request->title,
            'leiras' => $request->leiras,
            'ar' => $request->ar,
            'telepules' => $request->telepules,
            'status' => $request->status ?? 'active',
        ]);

        return response()->json($hirdetes, 201);
    }

    public function show(HirdetesModel $hirdetes)
    {
        return response()->json($hirdetes->load('kategoriak', 'user'));
    }

    public function update(Request $request, HirdetesModel $hirdetes)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'leiras' => 'required|string',
            'ar' => 'required|numeric|min:0',
            'kategoria_id' => 'required|exists:categories,id',
            'telepules' => 'required|string|max:255',
            'status' => 'in:active,sold,expired',
        ]);

        $hirdetes->update($request->all());

        return response()->json($hirdetes);
    }

    public function destroy(HirdetesModel $hirdetes)
    {
        $hirdetes->delete();
        return response()->json(['message' => 'Hirdetés törölve!']);
    }

    public function confirmDelete($auto_id){
        $data['error'] = false;
        $data['hirdetesek_id'] = $hirdetesek_id;
        $auto = HirdetesModel::find($hirdetesek_id);
        $data['content'] = view('confirmDelete',['hirdetes' => $hirdetes])->render();
        return response()->json($data,200,['Content-Type' => 'application/json']);
    }


    public function index()
    {
        // Lekérjük a legnépszerűbb hirdetéseket
        $legnepszerubb = HirdetesModel::where('is_popular', true)
            ->orderBy('views', 'desc')  // Például nézetek száma szerint
            ->take(10)  // Ha csak a 10 legnépszerűbb hirdetést szeretnéd
            ->get();
    
        return view('welcome', compact('legnepszerubb'));
    }
}
