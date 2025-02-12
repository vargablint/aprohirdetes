<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call([
            KategoriaSeeder::class,
            FelhasznaloSeeder::class,
            HirdetesekSeeder::class,
            VasarlasokSeeder::class,
        ]);
    }
}
