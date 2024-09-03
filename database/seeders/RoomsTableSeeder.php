<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoomsTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('rooms')->insert([
            [
                'number' => '101',
                'type' => 'single',
                'description' => 'A cozy single room with a beautiful view.',
                'price_per_night' => 100.00,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Adicione mais quartos conforme necessário
        ]);
    }
}
