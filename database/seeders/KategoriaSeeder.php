<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Models\KategoriaModel;


class KategoriaSeeder extends Seeder
{
    public function run()
    {
        $path = database_path('sample\kategoriak.txt');
        $file = fopen($path,"r");
        while(! feof($file)){
            $row = fgets($file);
            $data = explode(";",$row);
            $kategoria = new KategoriaModel;
            $kategoria->nev = trim($data[1]);
            $kategoria->save();
            
        }
        fclose($file);

    }
}

