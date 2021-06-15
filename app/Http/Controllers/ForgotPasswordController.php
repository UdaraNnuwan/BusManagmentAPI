<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\PasswordReset;
use App\Http\Controllers\Controller;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;


use App\User;

//forgot password
class ForgotPasswordController extends Controller
{
    public function forgotPassword(Request $request)
    {
        $request->validate([
            'email'=>'required|email',
        ]);

        $status=Password::sendResetLink(
            $request->only('email')
        );

        if($status==Password::RESET_LINK_SENT){
            return[
                'status'=>__($status)
            ];
        }
        throw ValidationException::withMessage([
            'email'=>[trans($status)],
        ]);

    }
//reset password
    public function reset(Request $request)
    {
        $request->validate([
            'token'=>'required',
            'email'=>'required|email',
            'password'=>['required','confirmed'],
        ]);

        $status=Password::reset(
            $request->only('email','password','password_confirmation','token'),
            function($user) use ($request)
            {
                $user->forceFill([
                    'password'=>Hash::make($request->password),
                    'remember_token'=>Str::random(60),
                ])->save();
                event(new PasswordReset($user));
            }
        );

        if($status==Password::PASSWORD_RESET){
            return response([
                'message'=>'Password Reset Successfuly'
            ]);
        }
            return response([
                'message'=>__($status)
            ],500);
    }
}
 