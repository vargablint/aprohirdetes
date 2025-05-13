<?php

namespace App\Http\Controllers;

use App\Models\HirdetesModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\KepekModel;
use App\Models\KategoriaModel;
use App\Models\User;
use App\Models\TelepulesModel;
use App\Http\Controllers\Validator;
use Symfony\Component\ErrorHandler\Debug;

class HirdetesController extends Controller
{
    public function eladas()
    {
        $hirdetesek = HirdetesModel::with(['kategoria', 'telepules', 'user'])->get();
        $hirdetesek = HirdetesModel::with('kepek')->get();
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
        $hirdetesek = HirdetesModel::with('kepek')->where('kategoria_id', 1)->get();

        return view('noiruhak', compact('hirdetesek'));
        
    }

    public function noiparfum()
    {
        $hirdetesek = HirdetesModel::with('kepek')->where('kategoria_id', 2)->get();
        return view('noiparfum', compact('hirdetesek'));
    }

    public function noikieg()
    {
        $hirdetesek = HirdetesModel::with('kepek')->where('kategoria_id', 3)->get();
        return view('noikieg', compact('hirdetesek'));
    }

    public function ferfiruha()
    {
        // Feltételezve, hogy a férfiruha kategória ID-ja pl. 6
        $hirdetesek = HirdetesModel::with('kepek')->where('kategoria_id', 4)->get();
        return view('ferfiruha', compact('hirdetesek'));
    }

    public function ferfiparfum()
    {
        $hirdetesek = HirdetesModel::with('kepek')->where('kategoria_id', 5)->get();
        return view('ferfiparfum', compact('hirdetesek'));
    }

    public function ferfikieg()
    {
        $hirdetesek = HirdetesModel::with('kepek')->where('kategoria_id', 6)->get();
        return view('ferfikieg', compact('hirdetesek'));
    }

    public function otthonbut()
    {
        $hirdetesek = HirdetesModel::with('kepek')->where('kategoria_id', 7)->get();
        return view('otthonbut', compact('hirdetesek'));
    }

    public function otthondek()
    {
        $hirdetesek = HirdetesModel::with('kepek')->where('kategoria_id', 8)->get();
        return view('otthondek', compact('hirdetesek'));
    }

    public function otthonhaz()
    {
        $hirdetesek = HirdetesModel::with('kepek')->where('kategoria_id', 9)->get();
        return view('otthonhaz', compact('hirdetesek'));
    }

    public function eemobil()
    {
        $hirdetesek = HirdetesModel::with('kepek')->where('kategoria_id', 10)->get();
        return view('eemobil', compact('hirdetesek'));
    }

    public function eelaptopok()
    {
        $hirdetesek = HirdetesModel::with('kepek')->where('kategoria_id', 11)->get();
        return view('eelaptopok', compact('hirdetesek'));
    }

    public function eekieg()
    {
        $hirdetesek = HirdetesModel::with('kepek')->where('kategoria_id', 12)->get();
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
            'kepek.*' => 'image|mimes:jpg,jpeg,png,gif|max:2048',
        ]);
        $hirdetes = new HirdetesModel();
        $hirdetes->user_id = Auth::id();
        $hirdetes->title = $validatedData['title'];
        $hirdetes->leiras = $validatedData['leiras'];
        $hirdetes->ar = $validatedData['ar'];
        $hirdetes->kategoria_id = $validatedData['kategoria_id'];
        $hirdetes->telepules_id = $validatedData['telepules_id'];
        $hirdetes->status = 'aktiv'; 

        if (!Auth::check()) {
        return redirect()->route('login')->with('message', 'Előtte regisztrálj fiókot vagy jelentkezz be!');
}
        
        

        $hirdetes->save();
    
         // Képek mentése, ha vannak
         if ($request->hasFile('kepek')) {
            foreach ($request->file('kepek') as $fajl) {
                $path = $fajl->store('kepek', 'public');
        
                KepekModel::create([
                    'hirdetesek_id' => $hirdetes->hirdetesek_id,
                    'image_path' => $path,
                ]);
            }
        }

      




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

    // Ellenőrzés, hogy a bejelentkezett felhasználó a tulajdonos-e
    if ($hirdetes->user_id !== Auth::id()) {
        abort(403, 'Nincs jogosultságod ezt a hirdetést törölni.');
    }

    // Csak a hirdetés törlése
    $hirdetes->delete();
    return redirect()->back()->with('success', 'A hirdetés sikeresen törölve lett.');


}
    public function sajatHirdetesek()
{
    
    
    $user = Auth::user();
    $hirdetesek = HirdetesModel::where('user_id', Auth::id())->get();

    return view('sajathirdetes', compact('hirdetesek'));
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

    public function getUser(Request $req){
        //Vissza kell adni az ügyfél adatait
        $user = User::find($req->user_id);
        if(!$user){
            $data['message'] = "Nincs ilyen felhasznalo";
            return response()->json($data,400);
        }
        $data['user'] = $user;
        return response()->json($data,200);

    }

    public function allUser(){
        $users = User::paginate(10);
        $data['users'] = $users;
        return response()->json($data,200);
    }

        public function userLetrehozas(Request $req){
            $user = new User;
            $user-> name = $req->name;
            $user-> email = $req->email;
            $user->tel_szam = $req->tel_szam;
            $user->password = bcrypt($req->password);
            $user->save();
            
            return response()->json(['user' => $user], 200);
            
        }


        public function userTorles($id)
{
    $user = User::find($id);

    if (!$user) {
        return response()->json(['message' => 'Felhasználó nem található.'], 404);
    }

    $user->delete();

    return response()->json(['message' => 'Felhasználó sikeresen törölve.'], 200);
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
}
