<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\User;


class FelhasznaloSeeder extends Seeder
{
    public function run()
    {
        $path = database_path('sample\users.txt');
        $file = fopen($path,"r");
        while(! feof($file)){
            $row = fgets($file);
            $data = explode(";",$row);
            $felhasznalo = new User;
            $felhasznalo->name = trim($data[1]);
            $felhasznalo->email = trim($data[2]);
            $felhasznalo->password = Hash::make($data[3]);
            $felhasznalo->tel_szam = trim($data[4]);

            $felhasznalo->save();
        }
        fclose($file);
            
    }
}
