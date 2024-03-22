<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function line_chart(){
        $line_data = DB::table('truck_transactions')
                    ->select('project_name', DB::raw('SUM(soil_amount) AS soil_amount, DATE(in_time) as date'))
                    ->join('site_assignments', 'site_assignments.site_id', '=', 'truck_transactions.site_id')
                    ->join('sites', 'sites.site_id', '=', 'truck_transactions.site_id')
                    ->where('user_id', '=', 5)
                    ->whereRaw('DATE(in_time) >= DATE_ADD(CURDATE(), INTERVAL -6 DAY)')
                    ->groupBy('project_name', DB::raw('DATE(in_time)'))
                    ->orderByRaw('DATE(in_time) DESC')
                    ->get();
        return $line_data;
    }
}

// SELECT project_name, SUM(soil_amount) AS soil_amount, DATE(in_time) AS date FROM truck_transactions
// INNER JOIN site_assignments ON site_assignments.site_id = truck_transactions.site_id
// INNER JOIN sites ON sites.site_id = truck_transactions.site_id
// WHERE user_id = 5 AND DATE(in_time) >= DATE_ADD(CURDATE(), INTERVAL -3 DAY)
// GROUP BY project_name, DATE(in_time) 
// ORDER BY DATE(in_time) DESC;