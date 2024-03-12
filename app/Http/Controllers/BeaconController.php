<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class BeaconController extends Controller
{
    public function index(){
        $beacon = DB::table('beacons')
                    ->select('beacon_name', 'license_plate', 'project_name')
                    ->join('trucks', 'trucks.beacon_id', '=', 'beacons.beacon_id')
                    ->join('sites', 'sites.site_id', '=', 'trucks.site_id')
                    ->get();
        return $beacon;
    }
}
