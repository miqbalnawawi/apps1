<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class SSOController extends Controller
{
    //
    public function register(Request $request)
    {
        // kalau digunakan
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $token = auth()->user()->createToken('AppName')->accessToken;
            $data = Auth::user();
            return response()->json([
                'token' => $token,
                'data'  => $data
            ], 200);
        } else {
            return response()->json(['error' => 'Unauthorized'], 401);
        }
    }

    public function getUserData()
    {
        $user = auth()->user();

        return response()->json([
            'id' => $user->id,
            'email' => $user->email,
            'name'  => $user->name
            // Tambahkan atribut pengguna lainnya yang ingin Anda kirim
        ]);
    }

    public function logout(Request $request)
    {
        $request->user()->token()->revoke();
        return response()->json(['message' => 'Successfully logged out']);
    }
}
