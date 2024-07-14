<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProductResource;
use App\Models\Cart;
use App\Models\Order;
use App\Models\OtherProduct;
use App\Models\Place;
use App\Models\Session;
use App\Models\Table;
use App\Models\WhatsappOrder;
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
            if ($request->filled('product_delete')){

                if ($existProduct->qty == 1){
                    $existProduct->delete();
                } else{
                    $existProduct->qty -= 1;
                    $existProduct->save();
                }
                return response()->json([
                    'status' => "info",
                    'message' => "Ürün Sepetten Çıkarıldı",
                ]);
            } else{
                $existProduct->qty += 1;
                $existProduct->save();
            }

            return response()->json([
                'status' => "success",
                'message' => "Ürün Sepete Eklendi",
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
                return response()->json([
                    'status' => "success",
                    'message' => "Ürün Sepete Eklendi",

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
        $table = $this->table;

        return view('qr_menu.checkout.index', compact('place' ,'categories', 'footerVisibility', 'menuOrders', 'otherProducts', 'table'));
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

    public function emptyCart()
    {
        foreach ($this->cart as $cart){
            $cart->delete();
        }
        return response()->json([
            'status' => "success",
            'message' => "Sepetinizdeki Ürünler Kaldırıldı",

        ]);
    }

    public function orderCreate(Request $request)
    {
        $cart = $this->cart;
        $generalTotal = calculateCart($this->cart);

        if ($request->order_type == "table_order"){
            $order = new Order();
            $order->place_id = $this->place->id;
            $order->table_id = $this->table->id;
            $order->status = 0;
            $order->payment_status = 0;
            $order->name = $this->table->name;
            $order->note = $request->order_note;
            $order->payment_type_id = 3;
            $order->order_type = 1;
            $order->discount = 0;
            $order->total = $generalTotal;
            $order->verify_code = $request->verify_code;
            $orderCart = [];
            foreach ($cart as $cartProduct){
                $orderCart[] = [
                    "id"=> $cartProduct->product_id,
                    "name"=> $cartProduct->product->name,
                    "image"=> $cartProduct->product->image,
                    "price"=> $cartProduct->product->price,
                    "total"=> $cartProduct->product->price * $cartProduct->qty,
                    "sauces"=> [],
                    "discount"=> 0,
                    "quantity"=> $cartProduct->qty,
                    "materials"=> []
                ];
            }
           $order->cart = $orderCart;
           $order->save();
            foreach ($this->cart as $cart){
                $cart->delete();
            }
            if (isset($this->place->sercices->table_phone)) {
                $message = "Yeni Sipariş: (#{ORDER_ID})

                            {ORDER_DETAILS}

                            Toplam Fiyat: *{ORDER_TOTAL}*

                            *Müşteri Bilgileri*
                            {CUSTOMER_DETAILS}

                            -----------------------------
                            Sipariş için teşekkürler.";
                $message = str_replace('{ORDER_ID}', $order->id, $message);
                $products = '';
                foreach ($order->cart as $cart) {
                    $products = $products . $cart->name . " - " . $cart->quantity . " Adet" . "\n";
                }
                $message = str_replace('{ORDER_DETAILS}', $products, $message);
                $message = str_replace('{ORDER_TOTAL}', $order->total . " TL", $message);
                $customer = '';
                $customer = $customer . "Ad Soyad: " . $this->table->name . "\n";
                $customer = $customer . "Telefon: " . "" . "\n";
                $customer = $customer . "Masa: " . $this->table->name . "\n";
                $customer = $customer . "Not: " . $order->note . "\n";
                $message = str_replace('{CUSTOMER_DETAILS}', $customer, $message);
                return redirect()->to('https://wa.me/+90 ' . $this->place->sercices->table_phone . '?text=' . urlencode($message));

            }
           return to_route('order.detail', $order->id)->with('response',[
               'status' => "success",
               'message' => "Siparişiniz Oluşturuldu. Sipariş Durumunu Buradan Kontrol Edebilirsiniz."
           ]);
        }

    }

    public function orderDetail(Order $order)
    {
        $place = $this->place;
        $categories = $this->categories;
        $footerVisibility = true;
        $menuOrders = $this->place->activeMenus;
        return view('qr_menu.checkout.success', compact('order' ,'place', 'categories', 'footerVisibility', 'menuOrders'));
    }

    public function orderSearchShow()
    {
        $place = $this->place;
        $categories = $this->categories;
        $footerVisibility = true;
        $menuOrders = $this->place->activeMenus;
        return view('qr_menu.checkout.search', compact('place', 'categories', 'footerVisibility', 'menuOrders'));
    }
    public function orderSearch(Request $request)
    {
        $order = $this->place->orders()->where('id', $request->order_code)->orWhere('verify_code', $request->order_code)->first();
        if (!$order){
            return back()->with('response', [
               'status' => "error",
               'message' => "Sipariş Bulunamadı",
            ]);
        }
        \Illuminate\Support\Facades\Session::put('searchType', true);
        return to_route('order.detail', $order->id);
    }
}
