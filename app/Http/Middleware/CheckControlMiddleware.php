<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\View;
use Symfony\Component\HttpFoundation\Response;

class CheckControlMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $place = Session::get('place');
        $menu = $place->activeMenu();
        $products = $menu->products;
        $categories = $menu->categories;
        $swipers = $place->activeAdverts;
        $menuOrders = $place->activeMenus;
        View::share('place', $place);
        View::share('menu', $menu);
        View::share('products', $products);
        View::share('categories', $categories);
        View::share('swipers', $swipers);
        View::share('footerVisibility', true);
        View::share('menuOrders', $menuOrders);
        if ($place->checkCloseDay()){
            if ($request->routeIs('notify')){
                return $next($request);
            } else{
                return to_route('notify')->with('response', [
                    'status' => "error",
                    'message' => "İşletme Bu Tarihte Hizmet Vermemektedir"
                ]);
            }
        } elseif($place->checkClock()){
            if ($request->routeIs('notify')){
                return $next($request);
            } else{
                return to_route('notify')->with('response', [
                    'status' => "error",
                    'message' => "İşletme Mesai Sattleri Dışında Hizmet Vermemektedir"
                ]);
            }
        }else{
            return $next($request);
        }
    }
}
