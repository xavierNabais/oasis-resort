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
                'name' => 'The Rosewood Room',
                'type' => 'Single',
                'description' => 'A cozy single room with a beautiful garden view and modern amenities.',
                'price_per_night' => 100.00,
                'image_url' => 'images/rooms/room1.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'The Bluebell Room',
                'type' => 'Double',
                'description' => 'A spacious double room featuring elegant decor and a charming city view.',
                'price_per_night' => 150.00,
                'image_url' => 'images/rooms/room2.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'The Sunset Suite',
                'type' => 'Suite',
                'description' => 'A luxurious suite with a king-sized bed, a living area, and stunning sunset views.',
                'price_per_night' => 250.00,
                'image_url' => 'images/rooms/room3.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'The Maple Room',
                'type' => 'Single',
                'description' => 'A modern single room with a minimalist design and a serene atmosphere.',
                'price_per_night' => 120.00,
                'image_url' => 'images/rooms/room4.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'The Ivy Room',
                'type' => 'Double',
                'description' => 'A charming double room with classic decor and a view of the historic district.',
                'price_per_night' => 170.00,
                'image_url' => 'images/rooms/room5.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'The Emerald Suite',
                'type' => 'Suite',
                'description' => 'An elegant suite with panoramic views, a spacious living area, and top-notch amenities.',
                'price_per_night' => 300.00,
                'image_url' => 'images/rooms/room6.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'The Lavender Room',
                'type' => 'Single',
                'description' => 'A comfortable single room with modern amenities and a relaxing atmosphere.',
                'price_per_night' => 130.00,
                'image_url' => 'images/rooms/room7.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'The Orchid Room',
                'type' => 'Double',
                'description' => 'A stylish double room featuring contemporary furnishings and a cityscape view.',
                'price_per_night' => 180.00,
                'image_url' => 'images/rooms/room8.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'The Horizon Suite',
                'type' => 'Suite',
                'description' => 'A grand suite with a private terrace, perfect for enjoying breathtaking views.',
                'price_per_night' => 350.00,
                'image_url' => 'images/rooms/room9.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'The Birch Room',
                'type' => 'Single',
                'description' => 'A cozy single room with a homely atmosphere and all the comforts you need.',
                'price_per_night' => 110.00,
                'image_url' => 'images/rooms/room10.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
