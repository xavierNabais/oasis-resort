<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use PromoCodesSeeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call([
            PromoCodesSeeder::class,
        ]);
    }
}
