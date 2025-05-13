<?php

namespace App\Http\Controllers;

use App\Models\HirdetesModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\KepekModel;
use App\Models\KategoriaModel;
use App\Models\User;
use App\Models\TelepulesModel;


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




    

    public function show(HirdetesModel $hirdetes)
    {
        return response()->json($hirdetes->load('kategoriak', 'user'));
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
    
        // Új hirdetés létrehozása
        $hirdetes = new HirdetesModel();
        $hirdetes->user_id = 1;
        $hirdetes->title = $validatedData['title'];
        $hirdetes->leiras = $validatedData['leiras'];
        $hirdetes->ar = $validatedData['ar'];
        $hirdetes->kategoria_id = $validatedData['kategoria_id'];
        $hirdetes->telepules_id = $validatedData['telepules_id'];
        $hirdetes->status = 'aktiv'; 
        
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

    public function destroy(HirdetesModel $hirdetes)
    {
        $hirdetes->delete();
        return response()->json(['message' => 'Hirdetés törölve!']);
    }


    public function index()
    {
        // Lekérjük a legnépszerűbb hirdetéseket
        $legnepszerubb = HirdetesModel::with('kepek')
            ->where('is_popular', true)
            ->orderBy('views', 'desc')  // Például nézetek száma szerint
            ->take(10)  // Ha csak a 10 legnépszerűbb hirdetést szeretnéd
            ->get();

        return view('welcome', compact('legnepszerubb'));
    }

    public function user()
{
    return $this->belongsTo(User::class, 'user_id'); // Feltételezve, hogy a hirdetesek táblában user_id található
}
}
