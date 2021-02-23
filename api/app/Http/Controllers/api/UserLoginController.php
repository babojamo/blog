<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;

class UserLoginController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email'     => 'required|string',
            'password'  => 'required|string'
        ]);

        if( !Auth::attempt($credentials) )
        {
            return response()->json([
                "message" => "The given data was invalid.",
                'errors' => [
                    'email' => 'These credentials do not match our records.'
                ]
            ],422);
        }

        $accessToken = Auth::user()->createToken('Bearer');

        return response()->json([
            'token'         => $accessToken->accessToken,
            "token_type"    => $accessToken->token->name,
            "expires_at"    => $accessToken->token->expires_at
        ]);
    }

    public function logout()
    {
        $user = Auth::user();
        $user->token()->revoke();
    }
}