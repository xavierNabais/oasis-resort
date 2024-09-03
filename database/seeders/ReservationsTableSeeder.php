<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ReservationsTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('reservations')->insert([
            [
                'client_id' => 1,
                'room_id' => 1,
                'check_in' => '2024-10-01',
                'check_out' => '2024-10-05',
                'number_of_guests' => 2,
                'status' => 'confirmed',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Adicione mais reservas conforme necessário
        ]);
    }
}
