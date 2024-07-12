<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProductResource;
use App\Models\Cart;
use App\Models\OtherProduct;
use App\Models\Place;
use App\Models\Table;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class QrMenuController extends Controller
{
    private $place, $table, $themeId, $menu, $categorie, $swipers, $products, $cart;

    public function __construct(Request $request)
    {
        $this->place = Place::find(1);
        $this->themeId = $this->place->theme_id;
        $this->menu = $this->place->activeMenu();
        $this->products = $this->menu->products;
        $this->categories = $this->menu->categories;
        $this->swipers = $this->place->activeAdverts;
        $this->table = Table::find(1);
        $this->cart = Cart::where('ip_address', $request->ip())->when(isset($this->table), function ($query){
            $query->where('table_id', $this->table->id);
        })->get();

    }

    public function index()
    {
        $categories = $this->categories;
        $swipers = $this->swipers;
        $products = $this->products;
        $place = $this->place;
        $cartProducts = $this->cart->pluck('product_id')->toArray();
        $productCount = $this->cart->sum('qty');
        $menuOrders = $this->place->activeMenus;

        return view('qr_menu.themes.theme-' . $this->themeId, compact('categories', 'swipers', 'products', 'place', 'cartProducts', 'productCount', 'menuOrders'));
    }

    public function addToCart(Request $request)
    {
        $existProduct = $this->cart->where('place_id', $this->place->id)
            ->where('product_id', $request->product_id)
            ->where('ip_address', $request->ip())
            ->when(isset($this->table), function ($query) {
                $query->where('table_id', $this->table->id);
            })
            ->first();
        if (isset($existProduct)) {
            $existProduct->qty += 1;
            $existProduct->save();
            $cartCount = Cart::all()->sum("qty");
            return response()->json([
                'status' => "success",
                'message' => "Ürün Sepete Eklendi",
                'cartCount' => $cartCount
            ]);
        } else {
            $cart = new Cart();
            $cart->product_id = $request->product_id;
            $cart->place_id = $this->place->id;
            $cart->ip_address = $request->ip();
            if (isset($this->table)){
                $cart->table_id = $this->table->id;
            }
            $cart->qty = 1;
            if ($cart->save()) {
                $cartCount = Cart::all()->sum("qty");
                return response()->json([
                    'status' => "success",
                    'message' => "Ürün Sepete Eklendi",
                    'cartCount' => $cartCount,
                ]);
            }
        }

    }

    public function checkOut()
    {
        $place = $this->place;
        $categories = $this->categories;
        $footerVisibility = true;
        $menuOrders = $this->place->activeMenus;
        $cartProducts = $this->cart->pluck('product_id')->toArray();
        $otherProducts = OtherProduct::whereIn('product_id', $cartProducts)->get();

        return view('qr_menu.checkout.index', compact('place' ,'categories', 'footerVisibility', 'menuOrders', 'otherProducts'));
    }

    public function getCart(){
        $generalTotal = calculateCart($this->cart);
        return response()->json([
            'products' => ProductResource::collection($this->cart),
            'generalTotal' => formatPrice($generalTotal),
            'discount' => formatPrice(0),
            'delivery' => formatPrice(0),
            'total' => formatPrice($generalTotal)
        ]);
    }
}
