<?php

namespace App\Http\Controllers\Api\V1\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    //
    public function register(Request $request)
    {
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
        ]);

        response()->json([
            'status' => true,
            'message' => 'ok'
        ]);
    }

    public function login(Request $request)
    {
    }

    public function logout(Request $request)
    {
    }
}
