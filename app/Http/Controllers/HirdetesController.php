<?php

namespace App\Http\Controllers;

use App\Models\HirdetesModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\KepekModel;
use App\Models\KategoriaModel;
use App\Models\User;
use App\Models\TelepulesModel;
use Symfony\Component\ErrorHandler\Debug;

class HirdetesController extends Controller
{
    public function eladas()
    {
        $hirdetesek = HirdetesModel::all();
        $kategoriak = KategoriaModel::all();
    
        return view('eladas', compact('hirdetesek', 'kategoriak'));
    }
    public function legnepszerubb()
    {
        $hirdetesek = HirdetesModel::all()
            ->sortByDesc('eladott')
            ->take(3);
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


    public function adminfelhasznalok()
    {
        $users = User::all();
        return view('adminfelhasznalok', compact('users'));
    }

    
public function editUser($id)
{
    $user = User::findOrFail($id);
    return view('edit_user', compact('user'));
}

public function updateUser(Request $request, $id)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email',
        'is_admin' => 'required|in:0,1',
    ]);

    $user = User::findOrFail($id);
    $user->update([
        'name' => $request->name,
        'email' => $request->email,
        'is_admin' => $request->is_admin,
    ]);




    $user->save();

    return redirect()->route('adminfelhasznalok')->with('success', 'Felhasználó frissítve!');
}

public function deleteUser($id)
{
    $user = User::findOrFail($id);
    $user->delete();

    return redirect()->route('adminfelhasznalok')->with('success', 'Felhasználó törölve!');
}



public function adminHirdetesek()
{
    // Az adminokhoz tartozó összes hirdetés lekérdezése
    $hirdetesek = HirdetesModel::with('user')->get();

    return view('adminhirdetesek', compact('hirdetesek'));
}




    

    public function show(HirdetesModel $hirdetes)
    {
        return response()->json($hirdetes->load('kategoria', 'user', 'telepules', 'kepek'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'leiras' => 'required|string',
            'ar' => 'required|numeric|min:0',
            'kategoria_id' => 'required|exists:kategoriak,kategoria_id',
            'telepules_id' => 'required|exists:telepulesek,telepules_id',
            'status' => 'in:active,sold,expired',
        ]);
        $hirdetes = new HirdetesModel();
        $hirdetes->user_id = Auth::id();
        $hirdetes->title = $validatedData['title'];
        $hirdetes->leiras = $validatedData['leiras'];
        $hirdetes->ar = $validatedData['ar'];
        $hirdetes->kategoria_id = $validatedData['kategoria_id'];
        $hirdetes->telepules_id = $validatedData['telepules_id'];
        $hirdetes->status = 'aktiv'; 
        
        

        $hirdetes->save();

    
        return redirect()->route('eladas')->with('success', 'Hirdetés sikeresen feltöltve!');
    }


    public function create(KategoriaModel $kat)
{   
    $kategoriak = KategoriaModel::all();
    $telepulesek = TelepulesModel::all();

    return view('eladas',compact('telepulesek'), compact('kategoriak'));  // Telepulesek változó átadása a nézetnek
}

public function destroy($id)
{
    $hirdetes = HirdetesModel::findOrFail($id);

    // Ha admin vagy, ne szükséges a tulajdonos ellenőrzés
    if (Auth::user()->is_admin == 0 && $hirdetes->user_id !== Auth::id()) {
        abort(403, 'Nincs jogosultságod ezt a hirdetést törölni.');
    }

    // Csak a hirdetés törlése
    $hirdetes->delete();

    return redirect()->back()->with('success', 'A hirdetés sikeresen törölve lett.');
}

public function edit($id)
{
    $hirdetes = HirdetesModel::findOrFail($id);
    return view('szerkesztes', compact('hirdetes'));
}

public function update(Request $request, $id)
{
    $request->validate([
        'title' => 'required|string|max:255',
        'leiras' => 'required|string',
        'ar' => 'required|numeric',
        'status' => 'required|string|in:aktiv,szuneteltetve',
    ]);

    $hirdetes = HirdetesModel::findOrFail($id);
    $hirdetes->update([
        'title' => $request->title,
        'leiras' => $request->leiras,
        'ar' => $request->ar,
        'status' => $request->status,
    ]);

    return redirect()->route('admin.hirdetesek')->with('success', 'A hirdetés sikeresen frissítve lett.');
}

    



public function sajatHirdetesek()
{
    
    
    $user = Auth::user();
    $hirdetesek = HirdetesModel::where('user_id', Auth::id())->get();

    return view('sajathirdetes', compact('hirdetesek'));
}
}
