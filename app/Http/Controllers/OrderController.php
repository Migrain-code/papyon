<?php

namespace App\Http\Controllers;

use App\Http\Resources\OrderDetailResource;
use App\Models\MenuCategoryProduct;
use App\Models\Order;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class OrderController extends Controller
{
    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {
        // return response()->json(OrderDetailResource::make($order));
        $place = authUser()->place();
        $regions = $place->regions;
        $products = $place->activeMenu()->products;

        return view('business.order.detail.index', compact('order', 'regions', 'products'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $order, Request $request)
    {
        $productIdToEdit = $request->input('product_id');
        $cart = json_decode($order->cart, true);

        // Silinecek ürünü filtreleyerek array'den çıkarın
        $productToDelete = array_filter($cart, function ($product) use ($productIdToEdit) {
            return $product['id'] == $productIdToEdit;
        });
        $key = $productToDelete[0]; // İlk bulunan ürünün key'ini al
        $deletedKey = array_keys($productToDelete)[0];
        unset($cart[$deletedKey]);
        $key["quantity"] = (int)$request->input('product_quantity');
        $cart[] = $key;

        $order->cart = json_encode(array_values($cart)); // array_values() ile dizinin anahtarlarını sıfırdan başlatıyoruz

        if ($order->save()) {
            return back()->with('response', [
                'status' => "success",
                'message' => "Ürün bilgileri güncellendi",
            ]);
        } else {
            return back()->with('response', [
                'status' => "error",
                'message' => "Ürün bilgileri güncellenirken bir hata oluştu",
            ], 500);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Order $order)
    {
        if ($request->filled('modalEditUserFirstName')) {
            $order->name = $request->modalEditUserFirstName;
            $order->phone = $request->modalEditUserPhone;
            $order->save();
        } else {

            $orderTypeId = $request->order_type_id;

            $order->order_type = $orderTypeId;
            if ($orderTypeId == 2) { // Gel al
                $order->note = $request->input('note');
            } elseif ($orderTypeId == 1) { // Masa
                if ($request->filled('table_id')) {
                    $order->table_id = $request->input('table_id');
                } else {
                    return back()->with('response', [
                        'status' => "error",
                        'message' => "Masadan Siparişte Masa Seçimi Gereklidir"
                    ]);
                }

            } else { // Paket
                if ($request->filled('modalAddress') && $request->filled('payment_type')) {
                    $order->address = $request->input('modalAddress');
                    $order->payment_type_id = $request->input('payment_type');
                } else {
                    return back()->with('response', [
                        'status' => "error",
                        'message' => "Paket Siparişte Adres ve Ödeme Türü Gereklidir"
                    ]);
                }

            }
            $order->save();
        }

        return back()->with('response', [
            'status' => "success",
            'message' => "Sipariş Bilgileri Güncellendi"
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order, Request $request)
    {
        $productIdToDelete = $request->input('id');
        $cart = json_decode($order->cart, true);

        // Silinecek ürünü filtreleyerek array'den çıkarın
        $productToDelete = array_filter($cart, function ($product) use ($productIdToDelete) {
            return $product['id'] == $productIdToDelete;
        });
        $key = array_keys($productToDelete)[0]; // İlk bulunan ürünün key'ini al
        unset($cart[$key]);

        $order->cart = json_encode(array_values($cart)); // array_values() ile dizinin anahtarlarını sıfırdan başlatıyoruz

        if ($order->save()) {
            return response()->json([
                'status' => "success",
                'message' => "Bu ürün siparişten kaldırıldı",
            ]);
        } else {
            return response()->json([
                'status' => "error",
                'message' => "Ürün kaldırılırken bir hata oluştu",
            ], 500);
        }
    }

    public function updateDiscount(Order $order, Request $request)
    {

        $order->discount = $request->input('discount_per');
        if ($order->save()) {
            return back()->with('response', [
                'status' => "success",
                'message' => "Sipariş tutarı güncellendi"
            ]);
        }

    }

    public function addProduct(Order $order, Request $request)
    {
        $findProduct = MenuCategoryProduct::find($request->product_id);
        $productQuantity = $request->product_qty;
        $cart = json_decode($order->cart);
        $product = [
            "id" => $findProduct->id,
            "name" => $findProduct->name,
            "image" => $findProduct->image,
            "price" => $findProduct->price,
            "total" => $findProduct->price * $productQuantity,
            "sauces" => [],
            "discount" => 0,
            "quantity" => $productQuantity,
            "materials" => []
        ];

        $cart[] = $product;
        $order->cart = json_encode($cart);
        if ($order->save()) {
            return back()->with('response', [
                'status' => "success",
                'message' => "Siparişe ürün eklendi"
            ]);
        }

    }

    public function getPayment(Order $order){
        $order->payment_status = 1;
        $order->status = 5;
        if ($order->save()) {
            return back()->with('response', [
                'status' => "success",
                'message' => "Ödeme Alındı. Sipariş tamamlandı"
            ]);
        }
    }
}