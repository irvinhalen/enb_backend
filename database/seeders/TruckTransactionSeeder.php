<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class TruckTransactionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('truck_transactions')->insert([
            [
                'truck_transaction_id' => 1,
                'truck_id' => 1,
                'site_id' => 1,
                'in' => 1,
                'out' => 1,
                'soil_amount' => 5,
                'in_time' => Carbon::now()->subHour(),
                'out_time' => Carbon::now()
            ],
            [
                'truck_transaction_id' => 2,
                'truck_id' => 2,
                'site_id' => 2,
                'in' => 1,
                'out' => 1,
                'soil_amount' => 5,
                'in_time' => Carbon::now()->subHours(2),
                'out_time' => Carbon::now()->subHour()
            ],
            [
                'truck_transaction_id' => 3,
                'truck_id' => 3,
                'site_id' => 1,
                'in' => 1,
                'out' => 1,
                'soil_amount' => 3,
                'in_time' => Carbon::now()->subHours(3),
                'out_time' => Carbon::now()->subHours(2)
            ],
            [
                'truck_transaction_id' => 4,
                'truck_id' => 1,
                'site_id' => 1,
                'in' => 1,
                'out' => 1,
                'soil_amount' => 4.5,
                'in_time' => Carbon::now()->subDay()->subHour(),
                'out_time' => Carbon::now()->subDay()
            ],
            [
                'truck_transaction_id' => 5,
                'truck_id' => 2,
                'site_id' => 2,
                'in' => 1,
                'out' => 1,
                'soil_amount' => 4.5,
                'in_time' => Carbon::now()->subDay()->subHours(2),
                'out_time' => Carbon::now()->subDay()->subHour()
            ],
            [
                'truck_transaction_id' => 6,
                'truck_id' => 3,
                'site_id' => 1,
                'in' => 1,
                'out' => 1,
                'soil_amount' => 3,
                'in_time' => Carbon::now()->subDay()->subHours(3),
                'out_time' => Carbon::now()->subDay()->subHours(2)
            ],
            [
                'truck_transaction_id' => 7,
                'truck_id' => 1,
                'site_id' => 1,
                'in' => 1,
                'out' => 1,
                'soil_amount' => 5,
                'in_time' => Carbon::now()->subDays(2)->subHour(),
                'out_time' => Carbon::now()->subDays(2)
            ],
            [
                'truck_transaction_id' => 8,
                'truck_id' => 2,
                'site_id' => 2,
                'in' => 1,
                'out' => 1,
                'soil_amount' => 3.5,
                'in_time' => Carbon::now()->subDays(2)->subHours(2),
                'out_time' => Carbon::now()->subDays(2)->subHour()
            ],
            [
                'truck_transaction_id' => 9,
                'truck_id' => 3,
                'site_id' => 1,
                'in' => 1,
                'out' => 1,
                'soil_amount' => 2.5,
                'in_time' => Carbon::now()->subDays(2)->subHours(3),
                'out_time' => Carbon::now()->subDays(2)->subHours(2)
            ],
            [
                'truck_transaction_id' => 10,
                'truck_id' => 1,
                'site_id' => 1,
                'in' => 1,
                'out' => 1,
                'soil_amount' => 3.5,
                'in_time' => Carbon::now()->subDays(3)->subHour(),
                'out_time' => Carbon::now()->subDays(3)
            ],
            [
                'truck_transaction_id' => 11,
                'truck_id' => 2,
                'site_id' => 2,
                'in' => 1,
                'out' => 1,
                'soil_amount' => 5,
                'in_time' => Carbon::now()->subDays(3)->subHours(2),
                'out_time' => Carbon::now()->subDays(3)->subHour()
            ],
            [
                'truck_transaction_id' => 12,
                'truck_id' => 3,
                'site_id' => 1,
                'in' => 1,
                'out' => 1,
                'soil_amount' => 3,
                'in_time' => Carbon::now()->subDays(3)->subHours(3),
                'out_time' => Carbon::now()->subDays(3)->subHours(2)
            ],
            [
                'truck_transaction_id' => 13,
                'truck_id' => 1,
                'site_id' => 1,
                'in' => 1,
                'out' => 1,
                'soil_amount' => 5,
                'in_time' => Carbon::now()->subDays(4)->subHour(),
                'out_time' => Carbon::now()->subDays(4)
            ],
            [
                'truck_transaction_id' => 14,
                'truck_id' => 2,
                'site_id' => 2,
                'in' => 1,
                'out' => 1,
                'soil_amount' => 5,
                'in_time' => Carbon::now()->subDays(4)->subHours(2),
                'out_time' => Carbon::now()->subDays(4)->subHour()
            ],
            [
                'truck_transaction_id' => 15,
                'truck_id' => 3,
                'site_id' => 1,
                'in' => 1,
                'out' => 1,
                'soil_amount' => 3,
                'in_time' => Carbon::now()->subDays(4)->subHours(3),
                'out_time' => Carbon::now()->subDays(4)->subHours(2)
            ],
            [
                'truck_transaction_id' => 16,
                'truck_id' => 1,
                'site_id' => 1,
                'in' => 1,
                'out' => 1,
                'soil_amount' => 3.1,
                'in_time' => Carbon::now()->subDays(5)->subHour(),
                'out_time' => Carbon::now()->subDays(5)
            ],
            [
                'truck_transaction_id' => 17,
                'truck_id' => 2,
                'site_id' => 2,
                'in' => 1,
                'out' => 1,
                'soil_amount' => 4.1,
                'in_time' => Carbon::now()->subDays(5)->subHours(2),
                'out_time' => Carbon::now()->subDays(5)->subHour()
            ],
            [
                'truck_transaction_id' => 18,
                'truck_id' => 3,
                'site_id' => 1,
                'in' => 1,
                'out' => 1,
                'soil_amount' => 2.1,
                'in_time' => Carbon::now()->subDays(5)->subHours(3),
                'out_time' => Carbon::now()->subDays(5)->subHours(2)
            ],
            [
                'truck_transaction_id' => 19,
                'truck_id' => 1,
                'site_id' => 1,
                'in' => 1,
                'out' => 1,
                'soil_amount' => 5,
                'in_time' => Carbon::now()->subDays(6)->subHour(),
                'out_time' => Carbon::now()->subDays(6)
            ],
            [
                'truck_transaction_id' => 20,
                'truck_id' => 2,
                'site_id' => 2,
                'in' => 1,
                'out' => 1,
                'soil_amount' => 5,
                'in_time' => Carbon::now()->subDays(6)->subHours(2),
                'out_time' => Carbon::now()->subDays(6)->subHour()
            ],
            [
                'truck_transaction_id' => 21,
                'truck_id' => 3,
                'site_id' => 1,
                'in' => 1,
                'out' => 1,
                'soil_amount' => 3,
                'in_time' => Carbon::now()->subDays(6)->subHours(3),
                'out_time' => Carbon::now()->subDays(6)->subHours(2)
            ]
        ]);
    }
}
