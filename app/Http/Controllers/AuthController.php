<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(Request $request) {
        //validasi
        $account = $request->validate([
            'name' => 'required|string',
            'email' => 'email|string|unique:users,email',
            'password'=> 'required|string|confirmed',
        ]);

        //buat account dan hash password
        $user = User::create([
            'name' => $account['name'],
            'email' => $account['email'],
            'password' => bcrypt($account['password']),
        ]);

        //buat token buat user
        $token = $user->createToken('my_token')->plainTextToken;

        //bikin response
        $response = [
            'user' => $user,
            'token' => $token,
        ];

        return response($response, 201);
    }

    public function logout(Request $request) {
        auth()->user()->tokens()->delete();

        return ['message' => 'You have been logged out'];
    }


    public function login(Request $request) {
        //validasi
        $account = $request->validate([
            'email' => 'email|string',
            'password'=> 'required|string',
        ]);

        $user = User::where('email', $account['email'])->first();

        if(!$user || !Hash::check($account['password'], $user->password)) {
            return response([
                'message' => 'Login failed'
            ], 401);
        }

        //buat token buat user
        $token = $user->createToken('my_token')->plainTextToken;

        //bikin response
        $response = [
            'user' => $user,
            'token' => $token,
        ];

        return response($response, 201);
    }
}
