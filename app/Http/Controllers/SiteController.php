<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SiteController extends Controller
{
    public function index(){
        $sites = DB::table('sites')
                    ->select(DB::raw('sites.site_id, project_name, city, town, barangay, count(truck_id) as num_trucks, latitude, longitude'))
                    ->leftJoin('trucks', 'trucks.site_id', '=', 'sites.site_id')
                    ->groupBy('sites.site_id')
                    ->orderByRaw('sites.site_id DESC')
                    ->get();

        return $sites;
    }

    public function map(Request $request){
        $user_id = $request->id;
        $user_role = $request->role;
        switch($user_role){
            case 1:
                $sites = DB::table('sites')
                            ->select(DB::raw('sites.site_id, project_name, city, town, barangay, count(truck_id) as num_trucks, latitude, longitude'))
                            ->leftJoin('trucks', 'trucks.site_id', '=', 'sites.site_id')
                            ->groupBy('sites.site_id')
                            ->orderByRaw('sites.site_id DESC')
                            ->get();
                break;
            default:
            $sites = DB::table('sites')
                        ->select(DB::raw('sites.site_id, project_name, city, town, barangay, count(truck_id) as num_trucks, latitude, longitude'))
                        ->leftJoin('trucks', 'trucks.site_id', '=', 'sites.site_id')
                        ->join('site_assignments', 'site_assignments.site_id', '=', 'sites.site_id')
                        ->whereRaw('user_id = ?', [$user_id])
                        ->groupBy('sites.site_id')
                        ->orderByRaw('sites.site_id DESC')
                        ->get();
        }

        return $sites;
    }

    public function assign(){
        $sites = DB::table('sites')
                    ->select(DB::raw('project_name, city, town, barangay, coalesce(count(user_id), 0) as assus'))
                    ->leftJoin('site_assignments', 'site_assignments.site_id', '=', 'sites.site_id')
                    ->groupBy('project_name', 'city', 'town', 'barangay')
                    ->orderByRaw('assus ASC')
                    ->get();

        return $sites;
    }

    public function assignments(Request $request){
        $user_id = $request->id;
        $assignments = DB::table('site_assignments')
                        ->select('site_assignment_id', 'site_assignments.site_id', 'project_name')
                        ->join('sites', 'sites.site_id', '=', 'site_assignments.site_id')
                        ->where('user_id', [$user_id])
                        ->orderByRaw('project_name ASC')
                        ->get();

        return $assignments;
    }

    public function create(Request $request){
        $incomingFields = $request->validate([
            'project_name' => 'required',
            'city' => 'nullable',
            'town' => 'nullable',
            'barangay' => 'nullable',
            'latitude' => 'required',
            'longitude' => 'required'
        ]);

        DB::table('sites')->insert([
            ['project_name' => $incomingFields['project_name'],
            'city' => $incomingFields['city'],
            'town' => $incomingFields['town'],
            'barangay' => $incomingFields['barangay'],
            'latitude' => $incomingFields['latitude'],
            'longitude' => $incomingFields['longitude']]
        ]);

        return [
            'status' => 'success',
            $incomingFields
        ];
    }

    public function update(Request $request){
        $incomingFields = $request->validate([
            'site_id' => 'required',
            'project_name' => 'required',
            'city' => 'nullable',
            'town' => 'nullable',
            'barangay' => 'nullable',
            'latitude' => 'required',
            'longitude' => 'required'
        ]);

        DB::table('sites')
        ->where('site_id', $incomingFields['site_id'])
        ->update([
            'project_name' => $incomingFields['project_name'],
            'city' => $incomingFields['city'],
            'town' => $incomingFields['town'],
            'barangay' => $incomingFields['barangay'],
            'latitude' => $incomingFields['latitude'],
            'longitude' => $incomingFields['longitude']
        ]);

        return [
            'status' => 'success',
            $incomingFields
        ];
    }

    public function delete(Request $request){
        $site_id = $request['site_id'];

        DB::table('sites')
        ->where('site_id', '=', $site_id)
        ->delete();

        return [
            'status' => 'success'
        ];
    }
}
