<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run()
    {
        DB::table('users')->insert([
            [
                'nev' => 'Teszt Felhasználó',
                'email' => 'teszt@example.com',
                'jelszo' => Hash::make('jelszo'),
                'tel_szam' => '06301234567',
                'tartozkodasi_hely' => 'Budapest, Magyarország',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nev' => 'Második Felhasználó',
                'email' => 'masodik@example.com',
                'jelszo' => Hash::make('password'),
                'tel_szam' => '06309876543',
                'tartozkodasi_hely' => 'Debrecen, Magyarország',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
