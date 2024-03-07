<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function register(Request $request) {
        $incomingFields = $request->validate([
            'name' => ['required', 'min:3', 'max:15'],
            'email' => ['required', 'email'],
            'password' => ['required', 'min:5', 'max:50']
        ]);
        
        $incomingFields['role'] = 1;

        $incomingFields['password'] = bcrypt($incomingFields['password']);
        User::create($incomingFields);
    }
}
