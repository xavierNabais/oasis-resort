<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\ClientsTableSeeder;
use Database\Seeders\EmployeesTableSeeder;
use Database\Seeders\PaymentsTableSeeder;
use Database\Seeders\ReservationsTableSeeder;
use Database\Seeders\RoomsTableSeeder;
use Database\Seeders\LogsTableSeeder;
use Database\Seeders\PromoCodesTableSeeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call([
            ClientsTableSeeder::class,
            EmployeesTableSeeder::class,
            PaymentsTableSeeder::class,
            ReservationsTableSeeder::class,
            RoomsTableSeeder::class,
            LogsTableSeeder::class,
            PromoCodesTableSeeder::class,
        ]);
    }
}
