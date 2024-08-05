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
                'rol'=> $userauth->id_rol
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

    public function logout(Request $request){
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return response()->json('success', 200);
    }

    public function delete(Request $request)
    {
        $user=User::findOrFail($request->id);
        $user->delete();
        return response()->json('success', 200);
    }

    public function update(Request $request)
    {
        $user=User::findOrFail($request->id);
        $user->name=$request->name;
        $user->id_rol=$request->id_rol;
        $user->save();
    }
}
