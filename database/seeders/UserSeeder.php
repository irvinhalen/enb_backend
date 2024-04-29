<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        {
            DB::table('users')->insert([
                [
                    'id' => 1,
                    'username' => 'admin',
                    'email' => 'admin@mail.com',
                    'password' => bcrypt('12345'),
                    'role' => 1,
                    'created_at' => now(),
                    'updated_at' => now()
                ],[
                    'id' => 2,
                    'username' => 'dirtaku',
                    'email' => 'dirt.otaku@mail.com',
                    'password' => bcrypt('12345'),
                    'role' => 2,
                    'created_at' => now(),
                    'updated_at' => now()
                ]
            ]);
        }
    }
}
