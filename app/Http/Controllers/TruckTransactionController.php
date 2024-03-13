<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class TruckTransactionController extends Controller
{
    public function index(){
        $truck_transactions = DB::table('truck_transactions')
                    ->select('project_name', 'license_plate', 'in', 'out', 'soil_amount', 'in_time', 'out_time', 'truck_transaction_id')
                    ->join('trucks', 'trucks.truck_id', '=', 'truck_transactions.truck_id')
                    ->join('sites', 'sites.site_id', '=', 'trucks.site_id')
                    ->get();
        return $truck_transactions;
    }
}
