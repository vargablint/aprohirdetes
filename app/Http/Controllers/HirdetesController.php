<?php

namespace App\Http\Controllers;

use App\Models\HirdetesModel;
use Illuminate\Http\Request;

class HirdetesController extends Controller
{
    public function index()
    {
        return response()->json(HirdetesModel::with('hirdetesek', 'user')->get());
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
}
