<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class BeaconController extends Controller
{
    public function index(){
        $beacon = DB::table('beacons')
                    ->select('beacons.beacon_id', 'beacon_name', 'license_plate', 'project_name')
                    ->leftJoin('trucks', 'trucks.beacon_id', '=', 'beacons.beacon_id')
                    ->leftJoin('sites', 'sites.site_id', '=', 'trucks.site_id')
                    ->orderByRaw('license_plate ASC')
                    ->get();
        return $beacon;
    }
}
