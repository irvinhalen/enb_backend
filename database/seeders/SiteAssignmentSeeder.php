<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SiteAssignmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('site_assignments')->insert([
            [
                'site_assignment_id' => 1,
                'user_id' => 2,
                'site_id' => 1
            ],[
                'site_assignment_id' => 2,
                'user_id' => 2,
                'site_id' => 2
            ]
        ]);
    }
}
