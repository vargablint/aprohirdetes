<?php

namespace App\Http\Controllers;

use App\Models\VasarlasModel;
use App\Models\HirdetesModel;
use Illuminate\Http\Request;

class VasarlasController extends Controller
{
    public function index()
    {
        return response()->json(VasarlasModel::with('vevo', 'hirdetesek')->get());
    }

    public function store(Request $request)
    {
        $request->validate([
            'hirdetesek_id' => 'required|exists:listings,id',
            'amount' => 'required|numeric|min:0',
            'status' => 'in:pending,completed,canceled',
        ]);

        $hirdetesek = HirdetesModel::find($request->hirdetesek_id);

        if ($hirdetesek->status !== 'active') {
            return response()->json(['message' => 'Ez a hirdetés már nem elérhető.'], 400);
        }

        $purchase = VasarlasModel::create([
            'vevo_id' => auth()->id(),
            'hirdetesek_id' => $request->hirdetesek_id,
            'amount' => $request->amount,
            'status' => $request->status ?? 'pending',
        ]);

        // Frissítjük a hirdetés státuszát
        $hirdetesek->update(['status' => 'sold']);

        return response()->json($vasarlasok, 201);
    }

    public function show(VasarlasModel $vasarlasok)
    {
        return response()->json($vasarlasok->load('vevo', 'hirdetes'));
    }

    public function update(Request $request, VasarlasModel $vasarlasok)
    {
        $request->validate([
            'status' => 'in:pending,completed,canceled',
        ]);

        $vasarlasok->update($request->all());

        return response()->json($vasarlasok);
    }

    public function destroy(VasarlasModel $vasarlasok)
    {
        $vasarlasok->delete();
        return response()->json(['message' => 'Vásárlás törölve!']);
    }
}

