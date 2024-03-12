<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class SiteController extends Controller
{
    public function index(){
        $sites = DB::table('sites')
                    ->select(DB::raw('sites.site_id, project_name, city, town, barangay, count(truck_id) as num_trucks'))
                    ->leftJoin('trucks', 'sites.site_id', '=', 'trucks.site_id')
                    ->groupBy('sites.site_id')
                    ->get();
        return $sites;
    }
}
