<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;

class AuthenticationController extends Controller
{
    /**
     * return the response to registered user.
     *
     * @param  mixed $request
     * @return string
    */
    public function register (Request $request)
    {
        $fields = $request->validate([
            'name' => 'required|string',
            'email' => 'required|string|unique:users,email',
            'password' => 'required|string|confirmed',
        ]);

        $user = User::create([
            'name' => $fields['name'],
            'email' => $fields['email'],
            'password' =>bcrypt($fields['password']),
        ]);

        $token = $user-> createToken('avouchtoken')->plainTextToken;

        $response= [
            'user' => $user,
            'token'=> $token,
        ];

        return response($response, 201);
    }

    /**
     * return the response to logged in user.
     *
     * @param  mixed $request
     * @return string
    */
    public function login (Request $request)
    {
        $fields = $request->validate([
            'email' => 'required|string',
            'password' => 'required|string',
        ]);

        // Check email
        $user = User::where('email', $fields['email'])->first();

        // Check password
        if(!$user || !Hash::check($fields['password'], $user->password)) {
            return response([
                'message' => 'incorrect credentials'
            ], 401);
        }

        $token = $user-> createToken('avouchtoken')->plainTextToken;

        $response= [
            'user' => $user,
            'token'=> $token,
        ];

        return response($response, 201);
    }

    /**
     * return the response to logged out user.
     *
     * @param  mixed $request
     * @return string
    */
    public function logout(Request $request)
    {
        auth()->user()->tokens()->delete();
        return [
            'message' => 'Logged out'
        ];
    }

}
