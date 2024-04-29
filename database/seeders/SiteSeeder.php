<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SiteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('sites')->insert([
            [
                'site_id' => 1,
                'project_name' => 'Peanut Resort',
                'city' => 'Cityscape',
                'town' => 'Uptown',
                'barangay' => 'Babag',
                'latitude' => 9.83064,
                'longitude' => 124.14
            ],
            [
                'site_id' => 2,
                'project_name' => 'Inconvenient Store',
                'city' => 'Townsville',
                'town' => 'Intown',
                'barangay' => 'Kamagong',
                'latitude' => 10.2847,
                'longitude' => 123.944
            ]
        ]);
    }
}
