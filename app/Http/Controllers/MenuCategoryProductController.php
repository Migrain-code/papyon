<?php

namespace App\Http\Controllers;

use App\Models\MenuCategoryProduct;
use Illuminate\Http\Request;

class MenuCategoryProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $menuCategory = new MenuCategoryProduct();
        $menuCategory->menu_id = $request->input('menu_id');
        $menuCategory->category_id = $request->input('category_id');
        $menuCategory->name = $request->input('product_name');
        $menuCategory->description = $request->input('product_description');
        $menuCategory->price = 15;
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
        //
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
    public function update(Request $request, MenuCategoryProduct $menuCategoryProduct)
    {
        //
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
