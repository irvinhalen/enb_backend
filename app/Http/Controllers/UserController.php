<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function register(Request $request) {
        $incomingFields = $request->validate([
            'username' => ['required', 'min:3', 'max:15', Rule::unique('users', 'username')],
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'password' => ['required', 'min:8', 'max:50']
        ]);
        
        $incomingFields['role'] = 2;

        $incomingFields['password'] = bcrypt($incomingFields['password']);
        User::create($incomingFields);
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
                'message' => 'Invalid credentials.'
            ];
        }

        return [
            'status' => 'success',
            'access_token' => $user->createToken('login')->plainTextToken,
            $user
        ];
    }

    public function logout(Request $request) {
        if ($request->user()) {
            $request->user()->currentAccessToken()->delete();
        }

        return [
            'status' => 'success'
        ];
    }
}
