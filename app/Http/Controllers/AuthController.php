<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function createUser(UserRequest $request)
    {
        $user = User::create([
            "name" => $request->name,
            "email" => $request->email,
            "password" => Hash::make($request->password),
        ]);

        return  response()->json([
            "status" => true,
            "message" => 'User created successfully',
            "token" => $user->createToken("API TOKEN")->plainTextToken
        ], 200);
    }

    // public function longinUser(LoginRequest $request)
    // {
    //     if(!Auth::attempt($request->only(['email', 'password']))){
    //         return response()->json([
    //             "status" => false,
    //             "message" => 'Email & password do not match with our records'
    //          ], 401);
    //     }
    //     //contario
    //     $user = User::where('email', $request->email)->first();
    //     return response()->json([
    //         'status' => true,
    //         'message' => 'User logged in successfully',
    //         'token' => $user->createToken('API TOKEN')->plainTextToken
    //     ], 200);
    // }
}
