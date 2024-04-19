<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TruckController extends Controller
{
    public function index(Request $request){
        $user_id = $request->id;
        $trucks = DB::table('trucks')
                    ->select('license_plate', 'project_name', 'beacon_name', 'weight_capacity')
                    ->leftJoin('sites', 'sites.site_id', '=', 'trucks.site_id')
                    ->join('site_assignments', 'site_assignments.site_id', '=', 'sites.site_id')
                    ->leftJoin('beacons', 'beacons.beacon_id', '=', 'trucks.beacon_id')
                    ->whereRaw('user_id = ?', [$user_id])
                    ->get();
        return $trucks;
    }
}
