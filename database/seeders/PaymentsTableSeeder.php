<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PaymentsTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('payments')->insert([
            [
                'reservation_id' => 1,
                'amount' => 500.00,
                'payment_date' => '2024-10-01',
                'payment_method' => 'credit_card',
                'status' => 'completed',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Adicione mais pagamentos conforme necessário
        ]);
    }
}
