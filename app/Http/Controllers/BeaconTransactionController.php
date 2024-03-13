<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class BeaconTransactionController extends Controller
{
    public function index(){
        $truck_transactions = DB::table('beacon_transactions')
                    ->select(DB::raw('project_name, license_plate, beacon_name, transaction_time, CASE WHEN direction = 0 THEN "Outside" WHEN direction = 1 THEN "Inside" ELSE "ERROR" END AS direction'))
                    ->join('beacons', 'beacons.beacon_id', '=', 'beacon_transactions.beacon_id')
                    ->join('trucks', 'trucks.beacon_id', '=', 'beacons.beacon_id')
                    ->join('sites', 'sites.site_id', '=', 'trucks.site_id')
                    ->get();
        return $truck_transactions;
    }
}
