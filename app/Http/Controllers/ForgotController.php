<?php

namespace App\Http\Controllers;

use App\User;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Requests\ForgotRequest;
use Exception;

class ForgotController extends Controller
{
    //
    public function forgot(ForgotRequest $request)
    {
        # code...
        $email = $request->input('email');
        if (User::where('email', $email)->doesntExist()) {
            return response(
                [
                    'message' => 'User doesn\'t exist!',
                ],
                404
            );
        }
        $token = Str::random(10);
        //send email
        return response([
            'message'=> 'Check your email'
        ], 200);

        try {
        } catch (Exception $exception) {
            return response([
                'message' => $exception->getMessage(),
            ], 400);
        }
    }
}
