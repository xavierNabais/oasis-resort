<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\ClientsTableSeeder;
use Database\Seeders\EmployeesTableSeeder;
use Database\Seeders\PaymentsTableSeeder;
use Database\Seeders\ReservationsTableSeeder;
use Database\Seeders\RoomsTableSeeder;

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
        ]);
    }
}
