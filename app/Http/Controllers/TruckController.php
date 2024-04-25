<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TruckController extends Controller
{
    public function index(Request $request){
        $user_id = $request->id;
        $user_role = $request->role;
        switch($user_role){
            case 1:
                $trucks = DB::table('trucks')
                            ->select('truck_id', 'sites.site_id', 'beacons.beacon_id', 'license_plate', 'project_name', 'beacon_name', 'weight_capacity')
                            ->leftJoin('sites', 'sites.site_id', '=', 'trucks.site_id')
                            ->leftJoin('beacons', 'beacons.beacon_id', '=', 'trucks.beacon_id')
                            ->orderByRaw('truck_id DESC')
                            ->get();
                break;
            default:
                $trucks = DB::table('trucks')
                            ->select('truck_id', 'sites.site_id', 'beacons.beacon_id', 'license_plate', 'project_name', 'beacon_name', 'weight_capacity')
                            ->leftJoin('sites', 'sites.site_id', '=', 'trucks.site_id')
                            ->leftJoin('beacons', 'beacons.beacon_id', '=', 'trucks.beacon_id')
                            ->join('site_assignments', 'site_assignments.site_id', '=', 'sites.site_id')
                            ->whereRaw('user_id = ?', [$user_id])
                            ->orderByRaw('truck_id DESC')
                            ->get();
        }

        return $trucks;
    }

    public function select_data(){
        $sites = DB::table('sites')
                    ->select('site_id', 'project_name')
                    ->orderByRaw('site_id DESC')
                    ->get();
  
        $beacons = DB::table('beacons')
                    ->select('beacons.beacon_id', 'beacon_name')
                    ->leftJoin('trucks', 'trucks.beacon_id', '=', 'beacons.beacon_id')
                    ->whereNull('license_plate')
                    ->orderByRaw('truck_id DESC')
                    ->get();

        return [
            $sites,
            $beacons
        ];
    }

    public function create(Request $request){
        $incomingFields = $request->validate([
            'license_plate' => 'required',
            'weight_capacity' => 'required',
            'site_id' => 'nullable',
            'beacon_id' => 'nullable'
        ]);

        DB::table('trucks')->insert([
            [
                'license_plate' => $incomingFields['license_plate'],
                'weight_capacity' => $incomingFields['weight_capacity'],
                'site_id' => $incomingFields['site_id'],
                'beacon_id' => $incomingFields['beacon_id']
            ]
        ]);

        return [
            'status' => 'success',
            $incomingFields
        ];
    }

    public function update(Request $request){
        $incomingFields = $request->validate([
            'truck_id' => 'required',
            'license_plate' => 'required',
            'weight_capacity' => 'required',
            'site_id' => 'nullable',
            'beacon_id' => 'nullable'
        ]);

        DB::table('trucks')
        ->where('truck_id', $incomingFields['truck_id'])
        ->update([
            'license_plate' => $incomingFields['license_plate'],
            'weight_capacity' => $incomingFields['weight_capacity'],
            'site_id' => $incomingFields['site_id'],
            'beacon_id' => $incomingFields['beacon_id']
        ]);

        return [
            'status' => 'success',
            $incomingFields
        ];
    }

    public function delete(Request $request){
        $truck_id = $request['truck_id'];

        DB::table('trucks')
        ->where('truck_id', '=', $truck_id)
        ->delete();

        return [
            'status' => 'success'
        ];
    }
}
