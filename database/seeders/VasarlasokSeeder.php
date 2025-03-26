<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\VasarlasModel;


class VasarlasokSeeder extends Seeder
{
    public function run()
    {
        $path = database_path('sample\Vasarlasok.txt');
        $file = fopen($path,"r");
        while(! feof($file)){
            $row = fgets($file);
            $data = explode(";",$row);
            $vasarlasok = new VasarlasModel;
            $vasarlasok->user_id = trim($data[1]);
            $vasarlasok->hirdetesek_id = trim($data[2]);
            $vasarlasok->amount = trim($data[3]);
            $vasarlasok->status = trim($data[4]);
            $vasarlasok->save();
        }
        fclose($file);
    }
}
