<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LogsTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('logs')->insert([
            [
                'action' => 'User login',
                'performed_by' => 'admin',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'action' => 'Updated room details',
                'performed_by' => 'admin',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'action' => 'Made a reservation',
                'performed_by' => 'user_1',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'action' => 'Payment processed',
                'performed_by' => 'user_2',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'action' => 'Canceled a reservation',
                'performed_by' => 'user_3',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
