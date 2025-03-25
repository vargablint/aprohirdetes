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
            'slug' => Str::slug($request->name),
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
            'slug' => Str::slug($request->name),
        ]);

        return response()->json($kategoriak);
    }

    public function destroy(KategoriaModel $kategoriak)
    {
        $kategoriak->delete();
        return response()->json(['message' => 'Kategória törölve!']);
    }
}

