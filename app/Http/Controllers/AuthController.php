<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(LoginRequest $request)
    {
        if(Auth::attempt($request->validated(),true)) {
            $user = Auth::user();
            $userauth = User::where('email', $request-> email)->first();
            return response()->json([
                'success' => true,
                'remember_token'=>$user->getRememberToken(),
                'rol'=> $userauth->rol
            ]);
        }
        return response()->json([
            'success' => false,
            'message' => 'Invalid credentials',
        ], 401);
    }

    public function register(RegisterRequest $request)
    {
        $user = User::create($request->validated());
        return response()->json($user, 200);
    }
}
