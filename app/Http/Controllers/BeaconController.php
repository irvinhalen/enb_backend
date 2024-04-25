<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BeaconController extends Controller
{
    public function index(){
        $beacon = DB::table('beacons')
                    ->select('beacons.beacon_id', 'beacon_name', 'license_plate', 'project_name')
                    ->leftJoin('trucks', 'trucks.beacon_id', '=', 'beacons.beacon_id')
                    ->leftJoin('sites', 'sites.site_id', '=', 'trucks.site_id')
                    ->orderByRaw('beacon_id DESC')
                    ->get();
        return $beacon;
    }

    public function create(Request $request){
        $incomingFields = $request->validate([
            'beacon_name' => 'required'
        ]);

        DB::table('beacons')->insert([
            [
                'beacon_name' => $incomingFields['beacon_name']
            ]
        ]);

        return [
            'status' => 'success',
            $incomingFields
        ];
    }

    public function update(Request $request){
        $incomingFields = $request->validate([
            'beacon_id' => 'required',
            'beacon_name' => 'required'
        ]);

        DB::table('beacons')
        ->where('beacon_id', $incomingFields['beacon_id'])
        ->update([
            'beacon_name' => $incomingFields['beacon_name']
        ]);

        return [
            'status' => 'success',
            $incomingFields
        ];
    }

    public function delete(Request $request){
        $beacon_id = $request['beacon_id'];

        DB::table('beacons')
        ->where('beacon_id', '=', $beacon_id)
        ->delete();

        return [
            'status' => 'success'
        ];
    }
}
