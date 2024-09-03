<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class PromoCodesTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('promo_codes')->insert([
            [
                'code' => 'SAVE30',
                'discount' => 20.00,
                'expires_at' => Carbon::now()->addMonths(1),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'code' => 'WINTER15',
                'discount' => 15.00,
                'expires_at' => Carbon::now()->addMonths(2),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'code' => 'SPRING10',
                'discount' => 10.00,
                'expires_at' => Carbon::now()->addMonths(3),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'code' => 'FALL25',
                'discount' => 25.00,
                'expires_at' => Carbon::now()->addMonth(1),
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
