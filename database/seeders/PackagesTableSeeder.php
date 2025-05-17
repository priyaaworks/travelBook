<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PackagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('packages')->insert([
            [
                'title' => 'Romantic Goa Getaway',
                'destination' => 'Goa',
                'price' => 15000.00,
                'description' => 'A 3-night beachside escape with candlelight dinner, water sports, and sightseeing.',
                'image' => 'goa.jpg',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'title' => 'Kashmir Winter Escape',
                'destination' => 'Kashmir',
                'price' => 25000.00,
                'description' => '5-night stay with snow adventures, houseboat stay, and sightseeing.',
                'image' => 'kashmir.jpeg',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'title' => 'Manali Adventure Trip',
                'destination' => 'Manali',
                'price' => 18000.00,
                'description' => '4 days of trekking, river rafting, and bonfire nights.',
                'image' => 'manali.jpg',
                'created_at' => now(),
                'updated_at' => now()
            ],
        ]);
    }
}
