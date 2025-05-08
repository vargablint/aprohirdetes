<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;




class RegisterController extends Controller
{
    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    


    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */


    /**
     * Create a new user instance after a valid registration.

     * @param  array  $data
     * @return \App\Models\User
     */
    public function register(Request $request)
    {
        // A validációs szabályok
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        // Ha a validáció nem sikerül
        if ($validator->fails()) {
            return redirect()->route('register')
                ->withErrors($validator)
                ->withInput();
        }

        // Ha a checkbox be van pipálva, és a bejelentkezett felhasználó admin
        $isAdmin = $request->has('is_admin') && $request->input('is_admin') == true && Auth::user()->is_admin;

        // Felhasználó létrehozása
        $user = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
            'is_admin' => $isAdmin,  // Admin státusz beállítása
        ]);

        // Bejelentkeztetés
        Auth::login($user);

        return redirect()->route('/');
    }
}

