<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ListingSeeder extends Seeder
{
    public function run()
    {
        DB::table('hirdetesek')->insert([
            [
                'felhasznalo_id' => 1,
                'kategoria_id' => 1, 
                'title' => 'Használt Opel Astra eladó',
                'leiras' => 'Jó állapotú, frissen szervizelt Opel Astra eladó.',
                'ar' => 1200000.00,
                'status' => 'active',
                'hely' => 'Budapest',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'felhasznalo_id' => 2,
                'kategoria_id' => 3, 
                'title' => 'Samsung Galaxy S21 eladó',
                'leiras' => 'Karcmentes, gyári dobozában, 1 év garanciával.',
                'ar' => 180000.00,
                'status' => 'active',
                'hely' => 'Debrecen',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
