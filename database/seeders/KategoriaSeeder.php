<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    public function run()
    {
        $categories = [
            'Elektronika',
            'Divat & Ruházat',
            'Sport & Szabadidő',
            'Bútorok',
        ];

        foreach ($categories as $category) {
            DB::table('categories')->insert([
                'nev' => $category,
                'slug' => Str::slug($category),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}

