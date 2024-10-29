<?php

namespace App\Http\Controllers;

use App\Events\OrderCreated;
use App\Events\PrivateEvent;
use App\Http\Resources\ProductResource;
use App\Models\Announcement;
use App\Models\Cart;
use App\Models\Claim;
use App\Models\Contract;
use App\Models\MenuCategory;
use App\Models\MenuCategoryProduct;
use App\Models\Order;
use App\Models\OtherProduct;
use App\Models\Place;

use App\Models\Suggestion;
use App\Models\SuggestionQuestion;
use App\Models\SwiperAdvert;
use App\Models\Table;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Session;


class QrMenuController extends Controller
{
    private $place, $table, $themeId, $cart;

    public function __construct(Request $request)
    {
        $this->place = Session::get('place');
        $this->themeId = $this->place->theme_id;
        $this->table = Session::get('table');

        $this->cart = Cart::where('ip_address', $request->ip())->when(isset($this->table), function ($query) {
            $query->where('table_id', $this->table->id);
        })->get();
    }

    public function index()
    {
        $swipers = SwiperAdvert::where('status', 1)->where('place_id', $this->place->id)->get();

        \Illuminate\Support\Facades\Session::forget('searchType');
        return view('qr_menu.themes.theme-' . $this->themeId, compact('swipers'));
    }

    public function category($place, MenuCategory $category)
    {
        $products = $category->products;
        return view('qr_menu.category.index', compact('products', 'category'));
    }
    public function product($place, MenuCategoryProduct $product)
    {
        return view('qr_menu.product.index', compact('product'));
    }
    public function workingHours()
    {
        $workTimes = $this->place->workTimes;
        return view('qr_menu.work-time.index', compact('workTimes'));
    }
    public function contracts()
    {
        $contracts = $this->place->contracts->where('status', 1);
        return view('qr_menu.contracts.index', compact('contracts'));
    }
    public function contractDetail($slug, $contractSlug)
    {
        $contract = $this->place->contracts->where('status', 1)->where('slug', $contractSlug)->first();
        return view('qr_menu.contracts.detail', compact('contract'));
    }
    public function announcement()
    {
        $announcements = Announcement::where('place_id', $this->place->id)->where('status', 1)->get();
        return view('qr_menu.announcement.index', compact('announcements'));
    }

    public function suggestion()
    {
        if (!isset($this->table)){
            return to_route('menu.index', $this->place->slug)->with('response', [
                'status' => "error",
                'message' => "Değerlendirme sadece masadan yapılabilir!"
            ]);
        }
        $suggestions = SuggestionQuestion::where('place_id', $this->place->id)->where('status', 1)->get();
        return view('qr_menu.suggestion.index', compact('suggestions'));
    }

    public function suggestionSave(Request $request)
    {
        $suggestion = new Suggestion();
        $suggestion->place_id = $this->place->id;
        if (isset($this->table)){
            $suggestion->table_id = $this->table->id;
        }
        $suggestion->rating = $request->rating;
        $suggestion->comment = $request->order_note;
        $suggestion->save();

        return to_route('menu.index', $this->place->slug)->with('response', [
            'status' => "success",
            'message' => "Değerlendirmeniz için teşekkürler!"
        ]);
    }
    public function addToCart(Request $request)
    {
        $existProduct = $this->cart->where('place_id', $this->place->id)
            ->where('product_id', $request->product_id)
            ->where('sauces', 'like', $request->sauces)
            ->where('materials', 'like', $request->materials)
            ->where('ip_address', $request->ip())
            ->when(isset($this->table), function ($query) {
                $query->where('table_id', $this->table->id);
            })
            ->first();
        if (isset($existProduct)) {
            if ($request->filled('product_delete')) {

                if ($existProduct->qty == 1) {
                    $existProduct->delete();
                } else {
                    $existProduct->qty -= 1;
                    $existProduct->save();
                }
                return response()->json([
                    'status' => "info",
                    'message' => "Ürün Sepetten Çıkarıldı",
                ]);
            } else {
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
            $cart->materials = $request->materials;
            $cart->sauces = $request->sauces;
            if (isset($this->table)) {
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
        $cartProducts = $this->cart->pluck('product_id')->toArray();
        $otherProducts = OtherProduct::whereIn('product_id', $cartProducts)->get();
        $table = $this->table;

        return view('qr_menu.checkout.index', compact('otherProducts', 'table'));
    }

    public function getCart(Request $request)
    {
        $generalTotal = calculateCart($this->cart);
        if ($this->cart->count() == 0){
            $delivery = 0;
        } else{
            $delivery = $request->discount == 0 ? $this->place->services->delivery_fee : 0;
        }

        $discount = $request->discount > 0 ? $this->place->services->take_away_discount : 0;
        $discountTotal = ($generalTotal * $discount) / 100;
        $total = ($generalTotal + $delivery) - $discountTotal;
        return response()->json([
            'products' => ProductResource::collection($this->cart),
            'generalTotal' => formatPrice($generalTotal),
            'discount' => formatPrice($discountTotal),
            'delivery' => formatPrice($delivery),
            'total' => formatPrice($total)
        ]);
    }

    public function emptyCart()
    {
        foreach ($this->cart as $cart) {
            $cart->delete();
        }
        return response()->json([
            'status' => "success",
            'message' => "Sepetinizdeki Ürünler Kaldırıldı",
        ]);
    }

    public function orderCreate(Request $request)
    {
        if ($request->order_type_id == 0 || $request->order_type_id == 2)// paket veya gel al sipariş ise
        {
            $request->validate([
               'name' => "required",
               'phone' => "required",
               'address' => "required"
            ], [] , [
               'name' => "Ad Soyad",
               'phone' => "Telefon",
               'address' => "Adres"
            ]);
        }
        $phone = "";
        $whatsappStatus = false;
        if (isset($request->order_type_id)){
            if ($request->order_type_id == 0){ // paket sipariş telefonu
                $phone = $this->place->services->package_order_phone;
                $whatsappStatus = isset($phone) && $request->order_type == "wpOrder" ? true : false;
            } elseif ($request->order_type_id == 1){ // masa sipariş telefonu
                $phone = $this->place->services->table_phone;
                $whatsappStatus =isset($phone) && $request->order_type == "wpOrder" ? true : false;
            } else{
                $phone = $this->place->services->take_away_phone; // gel al
                $whatsappStatus = isset($phone) && $request->order_type == "wpOrder" ? true : false;
            }
        }
        $cart = $this->cart;
        if ($cart->count() == 0){
            return to_route('menu.index', $this->place->slug)->with('response', [
                'status' => "error",
                'message' => "Sepete Ürün Eklemeden Sipariş Veremezsiniz."
            ]);
        }
        $generalTotal = calculateCart($this->cart);

        $result = $this->tableOrderCreate($request, $cart, $generalTotal);
        $message = $result["message"];
        $orderId = $result["orderId"];
        $place = Place::find($this->place->id);
        $orders = $place->claimCategories();
        event(new OrderCreated($orders));

        if ($whatsappStatus) {
            return redirect()->to('https://wa.me/' . clearPhone($phone) . '?text=' . urlencode($message));
        } else {
            return to_route('order.detail', [$this->place->slug, $orderId])->with('response', [
                'status' => "success",
                'message' => "Siparişiniz Oluşturuldu. Sipariş Durumunu Buradan Kontrol Edebilirsiniz."
            ]);
        }
    }

    public function tableOrderCreate($request, $cart, $generalTotal)
    {

        $order = new Order();
        $order->place_id = $this->place->id;
        $order->status = 0;
        $order->payment_status = 0;
        $order->note = $request->order_note;
        $orderCart = [];
        foreach ($cart as $cartProduct) {
            $orderCart[] = [
                "id" => $cartProduct->id,
                "product_id" => $cartProduct->product_id,
                "name" => $cartProduct->product->name,
                "image" => $cartProduct->product->image,
                "price" => $cartProduct->product->price,
                "total" => $cartProduct->product->price * $cartProduct->qty,
                "sauces" => isset($cartProduct->sauces) ? json_encode($cartProduct->sauces) : [],
                "discount" => 0,
                "quantity" => $cartProduct->qty,
                "materials" => isset($cartProduct->materials) ? json_encode($cartProduct->materials) : []
            ];
        }
        $order->cart = $orderCart;

        if (isset($this->table)){
            $order->table_id = $this->table->id;
            $order->name = $this->table->name;
            $order->payment_type_id = 3;
            $order->order_type = 1;
            $order->discount = 0;
            $order->total = $generalTotal;
            $order->verify_code = $request->verify_code;
        } else{
            $order->table_id = null;
            $order->name = $request->name;
            $order->phone = clearPhone($request->phone);
            $order->address = $request->address;
            $order->payment_type_id = $request->payment_type_id;
            $order->order_type = $request->order_type_id;
            $order->discount = 0;
            $order->total = $generalTotal;
        }

        $order->save();
        foreach ($this->cart as $cart) {
            $cart->delete();
        }
        if (isset($this->place->services->table_phone)) {
            $message = $this->createOrderMessage($order);

        } else {
            $message = $order->id;
        }
        return [
            'message' => $message,
            'orderId' => $order->id,
        ];
    }

    public function orderDetail(Request $request, $place, Order $order)
    {
        $menuOrders = $this->place->activeMenus;
        return view('qr_menu.checkout.success', compact('order', 'menuOrders'));
    }

    public function orderSearchShow()
    {
        return view('qr_menu.checkout.search');
    }

    public function orderSearch(Request $request)
    {
        $order = $this->place->orders()->where('id', $request->order_code)->orWhere('verify_code', $request->order_code)->first();
        if (!$order) {
            return back()->with('response', [
                'status' => "error",
                'message' => "Sipariş Bulunamadı",
            ]);
        }
        \Illuminate\Support\Facades\Session::put('searchType', true);
        return to_route('order.detail', [$this->place->slug, $order->id]);
    }

    public function createOrderMessage($order)
    {
        $message = "Yeni Sipariş: (#{ORDER_ID})

{ORDER_DETAILS}

Toplam Fiyat: *{ORDER_TOTAL}*

*Masa Bilgisi*
{CUSTOMER_DETAILS}

-----------------------------
Sipariş için teşekkürler.";
        $message = str_replace('{ORDER_ID}', $order->id, $message);
        $products = '';

        foreach ($order->cart as $cart) {
            $products = $products . $cart->name . " - " . $cart->quantity . " Adet" . "\n";
            if (!is_array($cart->sauces)){
                $sauces = json_decode($cart->sauces);
                $products.= "Soslar: \n" . implode(',', $sauces)."\n";
            }
            if (!is_array($cart->materials)){
                $materials = json_decode($cart->materials);
                $products.= "Malzemeler: \n" . implode(',', $materials)."\n";

            }
            $products.= "-----------------------------\n";
        }

        $message = str_replace('{ORDER_DETAILS}', $products, $message);
        $message = str_replace('{ORDER_TOTAL}', formatPrice($order->total), $message);

        if (!isset($this->table)){
            $message = str_replace('*Masa Bilgisi*', "*Müşteri Bilgileri*", $message);
            $customer = '';
            $customer = $customer . "Ad Soyad: " . $order->name . "\n";
            $customer = $customer . "Telefon: " . $order->phone . "\n";
            $customer = $customer . "Adres: " . $order->address . "\n";

            $customer = $customer . "Not: " . $order->note . "\n";
            $message = str_replace('{CUSTOMER_DETAILS}', $customer, $message);
        } else{
            $customer = '';
            $customer = $customer . $this->table->name . "\n";
            $customer = $customer . "Not: " . $order->note . "\n";
            $message = str_replace('{CUSTOMER_DETAILS}', $customer, $message);
        }
        return $message;
    }

    public function callVale(Request $request)
    {
        $request->validate([
           'text' => "required",
        ], [], [
           'text' => "Plaka"
        ]);
        if (isset($this->table)) {
            $newDemand = new Claim();
            $newDemand->place_id = $this->place->id;
            $newDemand->table_id = $this->table->id;
            $newDemand->type_id = 1;//vale talebi;
            $newDemand->save();
            if (isset($this->place->services->valet_phone)) {
                $message = "Yeni Vale Talebi: {ORDER_ID}
*Masa Bilgileri*

{CUSTOMER_DETAILS}

-----------------------------

Vale talebi için teşekkürler.";
                $message = str_replace('{ORDER_ID}', "#".$newDemand->id, $message);
                $customer = '';
                $customer = $customer ."Masa Adı:". $this->table->name . "\n";
                $customer = $customer ."Plaka:". $request->text . "\n";
                $message = str_replace('{CUSTOMER_DETAILS}', $customer, $message);
                $message = str_replace('{ORDER_ID}', "#".$newDemand->id, $message);
                return redirect()->to('https://wa.me/' . "0".clearPhone($this->place->services->valet_phone) . '?text=' . urlencode($message));
            }
            return to_route('menu.index', $this->place->slug)->with('response', [
                'status' => "success",
                'message' => "Vale Çağırıldı"
            ]);
        } else {
            return to_route('menu.index', $this->place->slug)->with('response', [
                'status' => "error",
                'message' => "Vale çağırımı sadece masa üzerinden yapılabilir."
            ]);
        }
    }
    public function callTaxi(Request $request)
    {
        $request->validate([
            'text' => "required",
        ], [], [
            'text' => "Ad Soyad"
        ]);
        if (isset($this->table)) {
            $newDemand = new Claim();
            $newDemand->place_id = $this->place->id;
            $newDemand->table_id = $this->table->id;
            $newDemand->type_id = 0;//taxi talebi;
            $newDemand->save();
            if (isset($this->place->services->valet_phone)) {
                $message = "Yeni Taksi Talebi: {ORDER_ID}

*Masa Bilgileri*
{CUSTOMER_DETAILS}

-----------------------------

Taksi talebi için teşekkürler.";
                $message = str_replace('{ORDER_ID}', "#".$newDemand->id, $message);
                $customer = '';
                $customer = $customer ."Masa Adı:". $this->table->name . "\n";
                $customer = $customer ."Müşteri Adı:". $request->text . "\n";
                $message = str_replace('{CUSTOMER_DETAILS}', $customer, $message);
                $message = str_replace('{ORDER_ID}', "#".$newDemand->id, $message);
                return redirect()->to('https://wa.me/' . clearPhone($this->place->services->valet_phone) . '?text=' . urlencode($message));
            }
            return to_route('menu.index', $this->place->slug)->with('response', [
                'status' => "success",
                'message' => "Taxi Çağırıldı"
            ]);
        } else {
            return to_route('menu.index', $this->place->slug)->with('response', [
                'status' => "error",
                'message' => "Taxi çağırımı sadece masa üzerinden yapılabilir."
            ]);
        }
    }
    public function callAccount(Request $request)
    {
        if (isset($this->table)) {
            $newDemand = new Claim();
            $newDemand->place_id = $this->place->id;
            $newDemand->table_id = $this->table->id;
            $newDemand->type_id = 3;//Hesap isteme talebi;
            $newDemand->save();
            if (isset($this->place->services->request_account_phone)) {
                $message = "Yeni Hesap Talebi: {ORDER_ID}

*Masa Bilgileri*
{CUSTOMER_DETAILS}

-----------------------------

Hesap talebi için teşekkürler.";
                $message = str_replace('{ORDER_ID}', "#".$newDemand->id, $message);
                $customer = '';
                $customer = $customer ."Masa Adı:". $this->table->name . "\n";
                $message = str_replace('{CUSTOMER_DETAILS}', $customer, $message);
                $message = str_replace('{ORDER_ID}', "#".$newDemand->id, $message);
                return redirect()->to('https://wa.me/' . clearPhone($this->place->services->valet_phone) . '?text=' . urlencode($message));
            }
            return to_route('menu.index', $this->place->slug)->with('response', [
                'status' => "success",
                'message' => "Hesap isteme talebiniz alındı"
            ]);
        } else {
            return to_route('menu.index', $this->place->slug)->with('response', [
                'status' => "error",
                'message' => "Hesap isteme özelliği sadece masa QR kodu okutularak yapılabilir."
            ]);
        }
    }

    public function callWaiter(Request $request)
    {
        if (isset($this->table)) {
            $newDemand = new Claim();
            $newDemand->place_id = $this->place->id;
            $newDemand->table_id = $this->table->id;
            $newDemand->type_id = 2;//Garson talebi;
            $newDemand->save();
            if (isset($this->place->services->valet_phone)) {
                $message = "Yeni Garson Talebi: {ORDER_ID}
*Masa Bilgileri*
{CUSTOMER_DETAILS}

-----------------------------

Garson talebi için teşekkürler.";
                $message = str_replace('{ORDER_ID}', "#".$newDemand->id, $message);
                $customer = '';
                $customer = $customer ."Masa Adı:". $this->table->name . "\n";
                $message = str_replace('{CUSTOMER_DETAILS}', $customer, $message);
                $message = str_replace('{ORDER_ID}', "#".$newDemand->id, $message);
                return redirect()->to('https://wa.me/' . clearPhone($this->place->services->valet_phone) . '?text=' . urlencode($message));
            }
            return to_route('menu.index', $this->place->slug)->with('response', [
                'status' => "success",
                'message' => "Garson Çağırıldı"
            ]);
        } else {
            return to_route('menu.index', $this->place->slug)->with('response', [
                'status' => "error",
                'message' => "Garson çağırımı sadece masa üzerinden yapılabilir."
            ]);
        }
    }
}
