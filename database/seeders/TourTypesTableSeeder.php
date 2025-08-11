<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TourTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tour_types')->insert([
            ['type' => 'Adventure Tour', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['type' => 'Group Tour', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['type' => 'Seasonal Tour', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['type' => 'Relaxation Tour', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['type' => 'Family Friendly Tour', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
