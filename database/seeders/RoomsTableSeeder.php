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
                'image_url' => 'images/room1.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'number' => '102',
                'type' => 'double',
                'description' => 'A spacious double room perfect for couples.',
                'price_per_night' => 150.00,
                'image_url' => 'images/room2.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'number' => '103',
                'type' => 'suite',
                'description' => 'A luxurious suite with a king-sized bed and a living area.',
                'price_per_night' => 250.00,
                'image_url' => 'images/room3.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'number' => '104',
                'type' => 'single',
                'description' => 'A modern single room with a minimalist design.',
                'price_per_night' => 120.00,
                'image_url' => 'images/room4.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'number' => '105',
                'type' => 'double',
                'description' => 'A charming double room with classic decor.',
                'price_per_night' => 170.00,
                'image_url' => 'images/room5.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'number' => '106',
                'type' => 'suite',
                'description' => 'An elegant suite with a panoramic view.',
                'price_per_night' => 300.00,
                'image_url' => 'images/room6.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'number' => '107',
                'type' => 'single',
                'description' => 'A comfortable single room with modern amenities.',
                'price_per_night' => 130.00,
                'image_url' => 'images/room7.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'number' => '108',
                'type' => 'double',
                'description' => 'A stylish double room with contemporary furnishings.',
                'price_per_night' => 180.00,
                'image_url' => 'images/room8.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'number' => '109',
                'type' => 'suite',
                'description' => 'A grand suite with a private terrace.',
                'price_per_night' => 350.00,
                'image_url' => 'images/room9.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'number' => '110',
                'type' => 'single',
                'description' => 'A cozy single room with a homely atmosphere.',
                'price_per_night' => 110.00,
                'image_url' => 'images/room10.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
