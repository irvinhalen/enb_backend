<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TruckTransactionController extends Controller
{
    public function index(Request $request){
        $user_id = $request->id;
        $truck_transactions = DB::table('truck_transactions')
                    ->select('project_name', 'license_plate', 'in', 'out', 'soil_amount', 'in_time', 'out_time', 'truck_transaction_id')
                    ->join('trucks', 'trucks.truck_id', '=', 'truck_transactions.truck_id')
                    ->join('sites', 'sites.site_id', '=', 'trucks.site_id')
                    ->join('site_assignments', 'site_assignments.site_id', '=', 'sites.site_id')
                    ->whereRaw('user_id = ?', [$user_id])
                    ->orderByRaw('in_time DESC')
                    ->get();
        return $truck_transactions;
    }

    public function select_data(Request $request){
        $user_id = $request->id;
        $options = DB::table('site_assignments')
                    ->select('project_name', 'license_plate', 'sites.site_id')
                    ->join('sites', 'sites.site_id', '=', 'site_assignments.site_id')
                    ->join('trucks', 'trucks.site_id', '=', 'sites.site_id')
                    ->whereRaw('user_id = ?', [$user_id])
                    ->orderByRaw('project_name ASC')
                    ->get();
        return $options;
    }
    
    public function create(Request $request){}
}
