<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    //
    public function login(Request $request)
    {
        try {
            if (Auth::attempt($request->only('email', 'password'))) {
                $user = Auth::user();
                /**@var User $user */
                $token = $user->createToken('app')->accessToken;
                return response([
                    'message' => 'success',
                    'user' => $user,
                    'token' => $token,
                ]);
            }

            return response(
                [
                    'message' => 'Invalid credentials',
                ],
                401
            );
        } catch (Exception $exception) {
            return response(
                [
                    'message' => $exception->getMessage(),
                ],
                400
            );
        }
    }
    public function user()
    {
        return Auth::user();
    }
    public function register(RegisterRequest $request)
    {
        try {
            $user = User::create([
                'first_name' => $request->input('first_name'),
                'last_name' => $request->input('last_name'),
                'email' => $request->input('email'),
                'password' => Hash::make($request->input('passwird')),
            ]);
            return $user;
        } catch (Exception $exception) {
            return response(
                [
                    'message' => $exception->getMessage(),
                ],
                400
            );
        }
    }
}
