<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class TruckController extends Controller
{
    public function index(){
        $trucks = DB::table('trucks')
                    ->select('license_plate', 'project_name', 'beacon_name', 'weight_capacity')
                    ->join('sites', 'sites.site_id', '=', 'trucks.site_id')
                    ->join('beacons', 'beacons.beacon_id', '=', 'trucks.beacon_id')
                    ->get();
        return $trucks;
    }
}
