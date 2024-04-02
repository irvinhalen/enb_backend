<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SiteController extends Controller
{
    public function index(Request $request){
        $user_id = $request->id;
        $sites = DB::table('sites')
                    ->select(DB::raw('sites.site_id, project_name, city, town, barangay, count(truck_id) as num_trucks, latitude, longitude'))
                    ->leftJoin('trucks', 'trucks.site_id', '=', 'sites.site_id')
                    ->join('site_assignments', 'site_assignments.site_id', '=', 'sites.site_id')
                    ->whereRaw('user_id = ?', [$user_id])
                    ->groupBy('sites.site_id')
                    ->orderByRaw('sites.site_id ASC')
                    ->get();
        return $sites;
    }
}
