<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(RegisterRequest $request) {
        //validasi
        $request->validated();

        //buat account dan hash password
        $request['password'] = bcrypt($request['password']);


        $user = User::create($request->only(['name', 'email', 'password']));

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


    public function login(LoginRequest $request) {
        //validasi
        $request->validated();

        $user = User::where('email', $request['email'])->first();

        if(!$user || !Hash::check($request['password'], $user->password)) {
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
