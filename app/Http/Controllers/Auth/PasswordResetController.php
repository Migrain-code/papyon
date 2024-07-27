<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;

class PasswordResetController extends Controller
{
    public function reset(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'token' => 'required',
            'password' => 'required|min:6|confirmed',
        ]);

        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($user, $password) {
                $user->forceFill([
                    'password' => Hash::make($password),
                    'remember_token' => Str::random(60),
                ])->save();
            }
        );

        if ($status === Password::PASSWORD_RESET){

            return redirect()->route('login')->with('response', [
                'status' => "success",
                'message' => "Şifreniz Güncellendi. Yeni Şifreniz İle Giriş Yapabilirsiniz"
            ]);
        } else{

            return back()->withErrors(['email' => [__($status)]]);
        }
    }
}
