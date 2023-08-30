<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Resources\AuthResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(Request $request) {
        $fields = $request->validate([
            'name' => 'required|string',
            'email' => 'required|string|unique:users,email',
            'age' => 'required|numeric|min:1',
            'phone' => 'required|numeric',
            'password' => 'required|string'
        ]);

        $user = User::create([
            'name' => $fields['name'],
            'email' => $fields['email'],
            'age' => $fields['age'],
            'phone' => $fields['phone'],
            'password' => bcrypt($fields['password'])
        ]);

        $token = $user->createToken('myapptoken')->plainTextToken;

        $response = [
            'name' => $user->name,
            'email' => $user->email,
            'age' => $user->age,
            'phone' => $user->phone,
            'is_admin' => $user->is_admin,
            'token' => $token
        ];

        return response($response,
            201,
            [
                'Accept' => 'application/json',
                'content-type' => 'application/json',
            ]);
    }

    public function login(Request $request) {
        $fields = $request->validate([
            'email' => 'required|string',
            'password' => 'required|string'
        ]);

        // Check email
        $user = User::where('email', $fields['email'])->first();

        // Check password
        if(!$user || !Hash::check($fields['password'], $user->password)) {
            return response([
                'message' => 'Bad creds'
            ], 401);
        }

        $token = $user->createToken('myapptoken')->plainTextToken;

        $response = [
            'name' => $user->name,
            'email' => $user->email,
            'age' => $user->age,
            'phone' => $user->phone,
            'is_admin' => $user->is_admin,
            'token' => $token
        ];

        return response(
            $response,
            201,
            [
                'Accept' => 'application/json',
                'content-type' => 'application/json',
            ]);
    }
    public function logout(Request $request) {
        auth()->user()->tokens()->delete();

        return [
            'message' => 'Logged out'
        ];
    }

}
