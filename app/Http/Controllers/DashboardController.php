<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function line_chart(Request $request){
        $user_id = $request->id;
        $date_start = $request->date_start;
        $date_end = $request->date_end;
        if(empty($date_start) || empty($date_end)) {
            $date_start = date('Y-m-d', strtotime('-6 days'));
            $date_end = date('Y-m-d');
        }
        $line_data = DB::table('truck_transactions')
                    ->select('project_name', 'sites.site_id', DB::raw('SUM(soil_amount) AS soil_amount, DATE(in_time) as date'))
                    ->join('site_assignments', 'site_assignments.site_id', '=', 'truck_transactions.site_id')
                    ->join('sites', 'sites.site_id', '=', 'truck_transactions.site_id')
                    ->whereRaw('user_id = ?', [$user_id])
                    ->whereBetween(DB::raw('DATE(in_time)'), [$date_start, $date_end])
                    ->groupBy('project_name', 'sites.site_id', DB::raw('DATE(in_time)'))
                    ->orderByRaw('DATE(in_time) DESC')
                    ->get();
        return $line_data;
    }
}
