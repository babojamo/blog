<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UserRegistrationController extends Controller
{
    public function register(Request $request)
    {
        

        $this->validate($request,[
            'name'  => 'required|string',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|confirmed|min:8'
        ]);

        $user = User::create([

            'name'      => $request->name,
            'email'     => $request->email,
            'password'  => bcrypt($request->password)

        ]);
         
        return response()->json([
            'name'          => $user->name,
            'email'         => $user->email,
            'updated_at'    => $user->updated_at,
            'created_at'    => $user->created_at,
            'id'            => $user->id,
        ]);
    }
}