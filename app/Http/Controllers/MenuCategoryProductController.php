<?php

namespace App\Http\Controllers;

use App\Http\Requests\Product\ProductAddRequest;
use App\Http\Requests\Product\ProductUpdateRequest;
use App\Http\Resources\ProductDetailResource;
use App\Models\MenuCategoryProduct;
use Illuminate\Http\Request;

class MenuCategoryProductController extends Controller
{
    public function updateOrder(Request $request)
    {
        foreach ($request->order as $order) {
            MenuCategoryProduct::where('id', $order['id'])->update(['order_number' => $order['position']]);
        }
        return response()->json(['status' => 'success']);
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductAddRequest $request)
    {
        $menuCategory = new MenuCategoryProduct();
        $menuCategory->menu_id = $request->input('menu_id');
        $menuCategory->category_id = $request->input('category_id');
        $menuCategory->name = $request->input('product_name');
        $menuCategory->description = $request->input('product_description');
        $menuCategory->price = $request->input('price');
        if ($request->hasFile('product_image')){
            $menuCategory->image = $request->file('product_image')->store('menuCategoryProductImages');
        }
        if ($menuCategory->save()){
            return response()->json([
                'status' => "success",
                'message' => "Ürün Başarılı Bir Şekilde Eklendi"
            ]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(MenuCategoryProduct $menuCategoryProduct)
    {
        return response()->json(ProductDetailResource::make($menuCategoryProduct));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(MenuCategoryProduct $menuCategoryProduct)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductUpdateRequest $request, MenuCategoryProduct $menuCategoryProduct)
    {
        $menuCategoryProduct->name = $request->input('product_name');
        $menuCategoryProduct->description = $request->input('product_description');
        $menuCategoryProduct->price = $request->input('price');
        if ($request->hasFile('product_image')){
            $menuCategoryProduct->image = $request->file('product_image')->store('menuCategoryProductImages');
        }
        if ($menuCategoryProduct->save()){
            return response()->json([
                'status' => "success",
                'message' => "Ürün Bilgileri Başarılı Bir Şekilde Güncellendi"
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(MenuCategoryProduct $menuCategoryProduct)
    {
        if ($menuCategoryProduct->delete()){
            return response()->json([
                'status' => "success",
                'message' => "Ürün başarılı bir şekilde silindi"
            ]);
        }
    }
}
