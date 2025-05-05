<?php

namespace App\Http\Controllers;

use App\Models\KategoriaModel;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class KategoriaController extends Controller
{
    public function index()
    {
        return response()->json(KategoriaModel::all());
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:kategoriak',
        ]);

        $kategoriak = KategoriaModel::create([
            'name' => $request->name,
        ]);

        return response()->json($kategoriak, 201);
    }

    public function show(KategoriaModel $kategoriak)
    {
        return response()->json($kategoriak);
    }

    public function update(Request $request, KategoriaModel $kategoriak)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:kategoriak,name,' . $kategoriak->id,
        ]);

        $kategoriak->update([
            'name' => $request->name,
        ]);

        return response()->json($kategoriak);
    }

    public function destroy(KategoriaModel $kategoriak)
    {
        $kategoriak->delete();
        return response()->json(['message' => 'Kategória törölve!']);
    }

    public function confirmDelete($kategoria_id){
        $data['error'] = false;
        $data['kategoria_id'] = $kategoria_id;
        $auto = KategoriaModel::find($kategoria_id);
        $data['content'] = view('confirmDelete',['kategoria' => $kategoria])->render();
        return response()->json($data,200,['Content-Type' => 'application/json']);
    }

    public function listaz($kid){
        $kategoria = KategoriaModel::find($kid);
    }



    public function noiRuhak()
{
    return view('noiruhak'); 
}

public function noiparfum()
{
    return view('noiparfum'); 
}

public function noikieg()
{
    return view('noikieg'); 
}




public function ferfiruha()
{
    return view('ferfiruha'); 
}

public function ferfiparfum()
{
    return view('ferfiparfum'); 
}

public function ferfikieg()
{
    return view('ferfikieg'); 
}


public function otthonbut()
{
    return view('otthonbut'); 
}

public function otthondek()
{
    return view('otthondek'); 
}

public function otthonhaz()
{
    return view('otthonhaz'); 
}




public function eemobil()
{
    return view('eemobil'); 
}
public function eelaptopok()
{
    return view('eelaptopok'); 
}
public function eekieg()
{
    return view('eekieg'); 
}




public function eladas()
{
    return view('eladas'); 
}



}


