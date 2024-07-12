<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Place;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class QrMenuController extends Controller
{
    private $place, $table, $themeId, $menu, $categorie, $swipers, $products, $cart;

    public function __construct()
    {
        $this->place = Place::find(1);
        $this->themeId = $this->place->theme_id;
        $this->menu = $this->place->activeMenu();
        $this->products = $this->menu->products;
        $this->categories = $this->menu->categories;
        $this->swipers = $this->place->activeAdverts;
        $this->cart = Cart::all();
    }

    public function index()
    {
        $categories = $this->categories;
        $swipers = $this->swipers;
        $products = $this->products;
        $place = $this->place;
        $cartProducts = $this->cart->pluck('product_id')->toArray();

        return view('qr_menu.themes.theme-' . $this->themeId, compact('categories', 'swipers', 'products', 'place', 'cartProducts'));
    }

    public function addToCart(Request $request)
    {
        $existProduct = $this->cart->where('place_id', $this->place->id)
            ->where('product_id', $request->product_id)
            ->first();
        if (isset($existProduct)){
            $existProduct->delete();
            $carts = Cart::all();
            return response()->json([
                'status' => "info",
                'message' => "Ürün Sepetten Kaldırıldı",
                'carts' => $carts
            ]);
        } else{
            $cart = new Cart();
            $cart->product_id = $request->product_id;
            $cart->place_id = $this->place->id;
            $cart->qty = 1;
            if ($cart->save()) {
                $carts = Cart::all();
                return response()->json([
                    'status' => "success",
                    'message' => "Ürün Sepete Eklendi",
                    'carts' => $carts,
                ]);
            }
        }

    }
}
