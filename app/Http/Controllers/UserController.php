<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function index() {
        $users = DB::table('users')
                    ->select('id', 'username', 'email')
                    ->where('role', '=', 2)
                    ->orderByRaw('id ASC')
                    ->get();

        return $users;
    }

    public function update(Request $request) {
        $incomingFields = $request->validate([
            'id' => 'required',
            'username' => 'required',
            'email' => 'required'
        ]);

        DB::table('users')
        ->where('id', $incomingFields['id'])
        ->update([
            'username' => $incomingFields['username'],
            'email' => $incomingFields['email'],
            'updated_at' => now()
        ]);

        return [
            'status' => 'success',
            $incomingFields
        ];
    }

    public function assign() {
        $users = DB::table('users')
                    ->select('id', 'username', 'email', DB::raw('COALESCE(COUNT(site_id)) AS assite'))
                    ->leftJoin('site_assignments', 'user_id', '=', 'id')
                    ->where('id', '!=', 1)
                    ->groupBy('id', 'username', 'email')
                    ->orderByRaw('assite ASC')
                    ->get();

        return $users;
    }

    public function register(Request $request) {
        $incomingFields = $request->validate([
            'username' => ['required', 'min:3', 'max:15', Rule::unique('users', 'username')],
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'password' => ['required', 'min:8', 'max:50']
        ]);
        
        $incomingFields['role'] = 2;

        $incomingFields['password'] = bcrypt($incomingFields['password']);
        User::create($incomingFields);

        $user = User::where('username', $incomingFields['username'])->first();

        return [
            'status' => 'success',
            // 'access_token' => $user->createToken('login')->plainTextToken,
            $user
        ];
    }

    public function login(Request $request) {
        $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        $user = User::where('username', $request->username)->first();

        if (!$user) {
            return [
                'status' => 'error',
                'message' => 'Invalid credentials.'
            ];
        }

        if (!Hash::check($request->password, $user->password)) {
            return [
                'status' => 'error',
                'message' => 'Invalid credentials'
            ];
        }

        return [
            'status' => 'success',
            // 'access_token' => $user->createToken('login')->plainTextToken,
            $user
        ];
    }

    public function logout(Request $request) {
        if ($request->user()) {
            // $request->user()->currentAccessToken()->delete();
        }

        return [
            'status' => 'success'
        ];
    }
}
