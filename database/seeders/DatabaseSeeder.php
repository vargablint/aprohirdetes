<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call([
            FelhasznaloSeeder::class,
            KategoriaSeeder::class,
            TelepulesekSeeder::class,          
            HirdetesekSeeder::class,
            VasarlasokSeeder::class,
        ]);
    }
}
