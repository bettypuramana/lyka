<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class ContinentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
     public function run(): void
    {
       DB::table('continents')->insert([
    ['code' => 'AF', 'name' => 'Africa', 'status' => 1],
    ['code' => 'AN', 'name' => 'Antarctica', 'status' => 1],
    ['code' => 'AS', 'name' => 'Asia', 'status' => 1],
    ['code' => 'EU', 'name' => 'Europe', 'status' => 1],
    ['code' => 'NA', 'name' => 'North America', 'status' => 1],
    ['code' => 'OC', 'name' => 'Oceania', 'status' => 1],
    ['code' => 'SA', 'name' => 'South America', 'status' => 1],
]);
    }
}
