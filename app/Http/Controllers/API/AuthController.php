<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    //
    public function register(Request $req)
    {
        try {
            //code...
            $req->validate([
                // 'role'      => 'required',
                'name'      => 'required',
                'email'     => 'required',
                'password'  => 'required',
            ]);

            // Create User
            $user = User::create([
                'role'      => 'user',
                'name'      => $req->name,
                'email'     => $req->email,
                'password'  => Hash::make($req->password),
            ]);

            $user = User::where('email', $req->email)->first();

            $tokenResult = $user->createToken('authToken')->plainTextToken;

            return ResponseFormater::success([
                'access_token'  => $tokenResult,
                'token_type'    => 'Bearer',
                'user'          => $user
            ], 'User Registered');
        } catch (Exception $error) {
            //throw $th;
            return ResponseFormater::error([
                'message'       => 'Somethink Wrong',
                'error'         => $error,
            ], 'AUTH FAILED', 500);
        }
    }

    public function login(Request $req)
    {
        try {
            //code...
            $req->validate([
                'email'      => 'required',
                'password'   => 'required',
            ]);

            $credentials = request(['email', 'password']);

            if (!Auth::attempt($credentials)) {
                # code...
                return ResponseFormater::error([
                    'message'   => 'Unauthorization'
                ], 'AUTH FAILED', 500);
            }

            $user = User::where('email', $req->email)->first();

            if (!Hash::check($req->password, $user->password, [])) {
                # code...
                throw new Exception('INVALID CREDENTIALS');
            }

            $tokenResult = $user->createToken('authToken')->plainTextToken;
            return ResponseFormater::success([
                'access_token'  => $tokenResult,
                'token_type'    => 'Bearer',
                'user'          => $user
            ], ' AUTHENTICATION SUCCESS');
        } catch (Exception $error) {
            //throw $th;
            return ResponseFormater::error([
                'message'   => 'Something Went Wrong',
                'error'     => $error
            ], 'AUTHHENTITACION FAILED', 500);
        }
    }

    public function logoutall(Request $request)
    {
        $user = $request->user();
        $user->tokens()->delete();
        $respon = [
            'status' => 'success',
            'msg' => 'Logout successfully',
            'errors' => null,
            'content' => null,
        ];
        return response()->json($respon, 200);
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
