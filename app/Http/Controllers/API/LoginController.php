<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    //

    public function register(Request $req)
    {
        $validator = Validator::make($req->all(), [
            // 'role' => 'required',
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            # code...
            return response()->json($validator->errors(), 400);
        }

        // Create Donaturs
        $user = User::create([
            'role'      => 'user',
            'name'      => $req->name,
            'email'     => $req->email,
            'password'  => Hash::make($req->password),
        ]);

        // return json
        return response()->json([
            'success'   => true,
            'message'   => 'Register Berhasil !',
            'data'      => $user,
            'token'     => $user->createToken('authToken')->accessToken
        ], 201);
    }


    //
    public function login(Request $req)
    {
        $validator = Validator::make($req->all(), [
            'email'     => 'required|email',
            'password'  => 'required',
        ]);

        if ($validator->fails()) {
            # code...
            return response()->json($validator->errors(), 400);
        }

        $user = User::where('email', $req->email)->first();

        if (!$user || !Hash::check($req->password, $user->password)) {
            # code...
            return response()->json([
                'success'   => false,
                'message'   => 'Login Failed!'
            ], 401);
        }

        return response()->json([
            'success'   => true,
            'message'   => 'Login Berhasil',
            'data'      => $user,
            'token'     => $user->createToken('authToken')->accessToken
        ], 200);
    }

    public function logout(Request $req)
    {
        // Remove token
        $removeToken = $req->user()->tokens()->delete();

        if ($removeToken) {
            # code...
            return response()->json([
                'success'   => true,
                'message'   => 'Logout Berhasil!'
            ]);
        }
    }
}
