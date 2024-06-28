<?php

namespace App\Http\Controllers;

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
        if ($request->hasFile('category_image')){
            $menuCategory->image = $request->file('category_image')->store('menuCategoryImages');
        }
        if ($menuCategory->save()){
            return to_route('business.menu.edit', $request->input('menu_id'))->with('response', [
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(MenuCategory $menuCategory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, MenuCategory $menuCategory)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(MenuCategory $menuCategory)
    {
        $menuCategory->products()->delete();
        if ($menuCategory->delete()){
            return response()->json([
               'status' => "success",
               'message' => "Kategori ve içerisindeki ürünler başarılı bir şekilde silindi"
            ]);
        }
    }
}
