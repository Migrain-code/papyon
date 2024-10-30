<?php

namespace App\Http\Middleware;

use App\Services\Sms;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\Response;

class CheckTwoFactorEnable
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = $request->user();

        $this->createVerifyCode($user);
        Session::put('phone', $user->phone);
        $place = $user->place();

        if ($place->status == 2) { //engellenmiş
            auth('web')->logout();
            return to_route('login')->with('response',[
                'status' => "error",
                'message' => "Hesabınızda Erişim Engelli Bulunuyor"
            ]);
        }
        if (isset($user->two_factor_secret)
            && !$request->routeIs('business.twoFactor') && !$request->routeIs('business.twoFactor.verify')
            && !$request->routeIs('business.twoFactor.resend')
            && !isset($user->two_factor_confirmed_at)
        ){
            return to_route('business.twoFactor');
        } else{
            return $next($request);
        }

    }

    public function createVerifyCode($user)
    {
        if (!isset($user->sms_code)){
            $user->sms_code = rand(100000, 999999);
            $user->save();

            Sms::send($user->phone,  'Papyon sistemine giriş için doğrulama kodunuz: '.$user->sms_code);
            //Sms::send($user->phone,  'Papyon sistemine giriş için doğrulama kodunuz: '.$user->sms_code);
        }

    }


}
