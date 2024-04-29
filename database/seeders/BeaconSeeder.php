<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BeaconSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('beacons')->insert([
            [
                'beacon_id' => 1,
                'beacon_name' => 'Beacon-01'
            ],[
                'beacon_id' => 2,
                'beacon_name' => 'Beacon-02'
            ],[
                'beacon_id' => 3,
                'beacon_name' => 'Beacon-03'
            ]
        ]);
    }
}
