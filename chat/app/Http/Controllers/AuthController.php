<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AuthController extends Controller
{
    public function register(Request $request){
        $data = $request->validate([
            'name' => ['required'],
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
        $user = User::create($data);
        Auth::login($user);
        return response()->json(['user' => $user, 'message' => 'successfully'], 201);
    }
    public function auth(Request $request){
        $data = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
        if(Auth::attempt($data)){
            $user = Auth::user();
            return response()->json(['user' => $user, 'message' => 'Login successful'], 200);
        }
        return response()->json([
            'message' => 'Wrong data',
        ], 401);
    }
}
