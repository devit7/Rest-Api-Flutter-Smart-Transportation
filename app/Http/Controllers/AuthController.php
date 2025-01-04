<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class AuthController extends Controller
{
    //

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (auth()->attempt($credentials)) {
            $user = auth()->user();
            $token = $user->createToken('authToken')->accessToken;

            return response()->json([
                'message' => 'Login success',
                'token' => $token,
                'user' => $user
            ]);
        }

        return response()->json([
            'message' => 'Login failed'
        ], 401);
    }
}
