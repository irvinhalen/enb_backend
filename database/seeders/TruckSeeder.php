<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TruckSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('trucks')->insert([
            [
                'truck_id' => 1,
                'site_id' => 1,
                'beacon_id' => 1,
                'license_plate' => '01-01',
                'weight_capacity' => 5
            ],
            [
                'truck_id' => 2,
                'site_id' => 2,
                'beacon_id' => 2,
                'license_plate' => '02-01',
                'weight_capacity' => 5
            ],
            [
                'truck_id' => 3,
                'site_id' => 1,
                'beacon_id' => 3,
                'license_plate' => '01-02',
                'weight_capacity' => 3
            ]
        ]);
    }
}
