<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
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
        if (isset($user->two_factor_secret) && !$request->routeIs('business.twoFactor') && !isset($user->two_factor_confirmed_at)){
            return to_route('business.twoFactor');
        } else{
            return $next($request);
        }

    }
}
