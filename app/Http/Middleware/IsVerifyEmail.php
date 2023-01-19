<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\UserVerify;

class IsVerifyEmail
{
    public function handle(Request $request, Closure $next)
    {

        $token = $request->route()->parameters();
        $verifyUser = UserVerify::where('token', $token)->first();

        $message = 'Sorry your email cannot be identified.';

        if (!is_null($verifyUser)) {
            $user = $verifyUser->user;

            if (!$user->is_email_verified) {
                $verifyUser->user->is_email_verified = 1;
                $verifyUser->user->save();

                $message = "Your e-mail is verified. You can now login.";
               
            } else {
                $message = "Your e-mail is already verified. You can now login.";
            }
        }
        return redirect()->action(
            'App\Http\Controllers\AuthController@verifiedEmail',
            ['msg' => $message]
        );
    }
}
