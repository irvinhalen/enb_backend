<?php

namespace App\Http\Controllers;

use App\Models\TruckTransaction;
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
                    ->select('project_name', 'license_plate', 'sites.site_id', 'truck_id', 'weight_capacity')
                    ->join('sites', 'sites.site_id', '=', 'site_assignments.site_id')
                    ->join('trucks', 'trucks.site_id', '=', 'sites.site_id')
                    ->whereRaw('user_id = ?', [$user_id])
                    ->orderByRaw('project_name ASC')
                    ->get();
        return $options;
    }

    public function create(Request $request){
        $incomingFields = $request->validate([
            'truck_id' => 'required',
            'site_id' => 'required',
            'soil_amount' => 'required',
            'in' => 'required',
            'out' => 'required',
            'in_time' => 'required',
            'out_time' => 'required'
        ]);

        DB::table('truck_transactions')->insert([
            ['truck_id' => $incomingFields['truck_id'], 'site_id' => $incomingFields['site_id'], 'soil_amount' => $incomingFields['soil_amount'], 'in' => $incomingFields['in'], 'out' => $incomingFields['out'], 'in_time' => $incomingFields['in_time'], 'out_time' => $incomingFields['out_time']]
        ]);

        return [
            'status' => 'success',
            $incomingFields
        ];
    }
}
