<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\TelepulesModel;


class TelepulesekSeeder extends Seeder
{

    public function run(): void
    {
        $path = database_path('sample\telepulesek.txt');
        $file = fopen($path,"r");
        while(! feof($file)){
            $row = fgets($file);
            $data = explode(";",$row);
            $telepules = new TelepulesModel;
            $telepules->nev = trim($data[1]);
            $telepules->save();
        }
        fclose($file);
    }
}
