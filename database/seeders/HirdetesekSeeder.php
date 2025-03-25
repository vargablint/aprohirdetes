<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\HirdetesModel;


class HirdetesekSeeder extends Seeder
{
    public function run()
    {
        $path = database_path('sample\hirdetesek.txt');
        $file = fopen($path,"r");
        while(! feof($file)){
            $row = fgets($file);
            $data = explode(";",$row);
            $hirdetes = new HirdetesModel;
            $hirdetes->user_id = trim($data[1]);
            $hirdetes->kategoria_id = trim($data[2]);
            $hirdetes->telepules_id = trim($data[3]);
            $hirdetes->title = trim($data[4]);
            $hirdetes->leiras = trim($data[5]);
            $hirdetes->ar = trim($data[6]);
            $hirdetes->status = trim($data[7]);
            $hirdetes->save();
            
        }
    }
}
