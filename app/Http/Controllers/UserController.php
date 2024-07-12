<?php

namespace App\Http\Controllers;
use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Response;


use Illuminate\Http\Request;

class UserController extends Controller
{
    public function getUser()
    {
        $user = Auth::user();
        if ($user) {
            return response()->json(['user' => $user]);
        }
        return response()->json(['message' => 'User Not found'], 404);
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            $token = $user->createToken('AuthToken')->plainTextToken;

            return response()->json([
                'status' => true,
                'message' => 'User Logged In Successfully',
                'token' => $token,
                'user' => $user
            ], Response::HTTP_OK);
        }

        return response()->json([
            'status' => false,
            'message' => 'Username & Password does not match',
        ], Response::HTTP_UNAUTHORIZED);
    }
    
}
