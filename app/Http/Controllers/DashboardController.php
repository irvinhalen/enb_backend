<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function line_chart(){
        $trucks = DB::table('truck_transactions')
                    ->select('soil_amount', 'in_time', 'project_name')
                    ->join('trucks', 'trucks.truck_id', '=', 'truck_transactions.truck_id')
                    ->join('sites', 'sites.site_id', '=', 'trucks.site_id')
                    ->get();
        return $trucks;
    }
}
