<?php

namespace App\Http\Controllers;

use App\Http\Resources\MenuCategoryResource;
use App\Models\MenuCategory;
use Illuminate\Http\Request;

class MenuCategoryController extends Controller
{

    public function updateOrder(Request $request)
    {
        foreach ($request->order as $order) {
            MenuCategory::where('id', $order['id'])->update(['order_number' => $order['position']]);
        }
        return response()->json(['status' => 'success']);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $menuCategory = new MenuCategory();
        $menuCategory->menu_id = $request->input('menu_id');
        $menuCategory->name = $request->input('name');
        if ($request->hasFile('croppedImage')) {
            $menuCategory->image = $request->file('croppedImage')->store('menuCategoryImages');
        }
        if ($menuCategory->save()) {
            return response()->json([
                'status' => "success",
                'message' => "Kategori Başarılı Bir Şekilde Eklendi"
            ]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(MenuCategory $menuCategory)
    {
        return response()->json(MenuCategoryResource::make($menuCategory));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(MenuCategory $menuCategory, Request $request)
    {
        $menuCategory->status = $request->is_checked == "true";
        if ($menuCategory->save()) {
            $menuCategory->products()->update(['status' => $menuCategory->status]);
            return response()->json([
                'status' => "success",
                'message' => "Kategori durumu başarılı bir şekilde güncellendi"
            ]);
        }

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, MenuCategory $menuCategory)
    {
        $menuCategory->name = $request->input('name');
        if ($request->hasFile('croppedImage')) {
            $menuCategory->image = $request->file('croppedImage')->store('menuCategoryImages');
        }
        if ($menuCategory->save()) {
            return response()->json([
                'status' => "success",
                'message' => "Kategori bilgisi başarılı bir şekilde güncellendi"
            ]);
        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(MenuCategory $menuCategory)
    {
        $menuCategory->products()->delete();
        if ($menuCategory->delete()) {
            return response()->json([
                'status' => "success",
                'message' => "Kategori ve içerisindeki ürünler başarılı bir şekilde silindi"
            ]);
        }
    }
}
