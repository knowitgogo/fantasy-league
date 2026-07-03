<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function loginApi(Request $request)
    {
        $credentials = $request->validate([

            'email' => 'required|email',

            'password' => 'required'

        ]);

        if (!Auth::attempt($credentials)) {

            return response()->json([

                'message' => 'Invalid Credentials'

            ], 401);
        }

        /** @var \App\Models\User $user */
        $user = Auth::user();

        $token = $user->createToken(
            'angular-token'
        )->plainTextToken;

        return response()->json([

            'token' => $token,

            'user' => $user

        ]);
    }
    public function userApi()
    {
        return response()->json(
            Auth::user()
        );
    }
    public function logoutApi(Request $request)
    {
        $request->user()
            ->tokens()
            ->delete();
            // This deletes: ALL tokens of user Example: Laptop Login Mobile Login Tablet Login All get logged out.
            // Alternative:
            // $request->user()
            //     ->currentAccessToken()
            //     ->delete();

            // Deletes only: Current Device

        return response()->json([
            'message' => 'Logged out successfully'
        ]);
    }

    public function registerApi(Request $request)
    {
        $request->validate([

            'name' => 'required|string|max:255',

            'email' => 'required|email|unique:users,email',

            'password' => 'required|min:6'

        ]);

        $user = User::create([

            'name' => $request->name,

            'email' => $request->email,

            'password' => Hash::make(
                $request->password
            ),

            'role' => 'user',

            'wallet_balance' => 0,

            'fantasy_points' => 0

        ]);

        return response()->json([

            'message' => 'User Registered Successfully',

            'user' => $user

        ], 201);
    }
        
}