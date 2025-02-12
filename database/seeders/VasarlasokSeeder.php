<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PurchaseSeeder extends Seeder
{
    public function run()
    {
        DB::table('vasarlasok')->insert([
            [
                'vevo_id' => 2,
                'hirdetesek_id' => 1,
                'amount' => 1200000.00,
                'status' => 'befejezett',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
