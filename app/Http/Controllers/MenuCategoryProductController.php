<?php

namespace App\Http\Controllers;

use App\Http\Requests\Product\ProductAddRequest;
use App\Http\Requests\Product\ProductUpdateRequest;
use App\Http\Resources\ProductDetailResource;
use App\Models\Allergen;
use App\Models\MenuCategory;
use App\Models\MenuCategoryProduct;
use App\Models\OtherProduct;
use App\Models\ProductAllergen;
use App\Models\ProductMaterial;
use App\Models\ProductSouce;
use App\Models\ProductUnit;
use Illuminate\Http\Request;

class MenuCategoryProductController extends Controller
{
    private $business;
    private $user;

    public function __construct()
    {
        $this->user = auth('web')->user();
        $this->business = $this->user->place();
    }
    public function create(MenuCategory $category)
    {
        $categories = $category->menu->categories;
        $allergens = Allergen::whereStatus(1)->get();
        $menu = $category->menu;
        $sauces = $this->business->souces;
        $materials = $this->business->materials;
        return view('business.menu.product.create', compact('categories', 'allergens', 'menu', 'category', 'sauces', 'materials'));
    }
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
    public function store(MenuCategory $category, ProductAddRequest $request)
    {

        $menuCategoryProduct = new MenuCategoryProduct();
        $menuCategoryProduct->menu_id = $category->menu_id;
        $menuCategoryProduct->category_id = $category->id;
        $menuCategoryProduct->name = $request->input('product_name');
        $menuCategoryProduct->description = $request->input('product_description');
        $menuCategoryProduct->price = $request->input('price');
        $menuCategoryProduct->calorie_total = $request->input('calorie');
        $menuCategoryProduct->cookie_time = $request->input('cooking_time');

        $otherProducts = $request->other_products;


        if ($menuCategoryProduct->save()){
            if ($request->croppedImage && isset($request->croppedImage)){
                $menuCategoryProduct->image = base64Convertor($request->croppedImage, 'menuCategoryProductImages');
                $menuCategoryProduct->save();
            }
            if (isset($otherProducts) && count($otherProducts) > 0){
                foreach ($otherProducts as $otherProductId){
                    $otherProduct = new OtherProduct();
                    $otherProduct->product_id = $menuCategoryProduct->id;
                    $otherProduct->added_product_id = $otherProductId;
                    $otherProduct->save();
                }
            }
            $unitPrices = $request->input('group-a');
            if (isset($unitPrices) && count($unitPrices) > 0){
                foreach ($unitPrices as $unitPrice){
                    $productUnit = new ProductUnit();
                    $productUnit->product_id = $menuCategoryProduct->id;
                    $productUnit->unit_id = $unitPrice["added_unit"];
                    $productUnit->price = $unitPrice["added_price"];
                    $productUnit->save();
                }
            }
            $allergens = $request->allergens;
            if (isset($allergens) && count($allergens) > 0){
                foreach ($allergens as $allergenId){
                    $productAllergen = new ProductAllergen();
                    $productAllergen->allergen_id = $allergenId;
                    $productAllergen->product_id = $menuCategoryProduct->id;
                    $productAllergen->save();
                }
            }
            $sauces = $request->sauces;
            if (isset($sauces) && count($sauces) > 0){
                foreach ($sauces as $sauceId){
                    $productAllergen = new ProductSouce();
                    $productAllergen->sauce_id = $sauceId;
                    $productAllergen->product_id = $menuCategoryProduct->id;
                    $productAllergen->save();
                }
            }
            $materials = $request->materials;
            if (isset($materials) && count($materials) > 0){
                foreach ($materials as $materialId){
                    $productAllergen = new ProductMaterial();
                    $productAllergen->material_id = $materialId;
                    $productAllergen->product_id = $menuCategoryProduct->id;
                    $productAllergen->save();
                }
            }
            return to_route('business.menu.edit', $category->menu_id)->with('response',[
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
        $category = $menuCategoryProduct->category;
        $menu = $menuCategoryProduct->category->menu;
        $categories = $menu->categories;
        $allergens = Allergen::whereStatus(1)->get();
        $units = $menuCategoryProduct->units;
        $placeUnits = $this->business->units;
        $sauces = $this->business->souces;
        $materials = $this->business->materials;
        return view('business.menu.product.edit', compact('menuCategoryProduct', 'categories', 'allergens', 'category', 'units','placeUnits', 'sauces', 'materials'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(MenuCategoryProduct $menuCategoryProduct)
    {
        $menuCategoryProduct->status = !$menuCategoryProduct->status;
        if ($menuCategoryProduct->save()) {
            return response()->json([
                'status' => "success",
                'message' => "Ürün durumu başarılı bir şekilde güncellendi"
            ]);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductUpdateRequest $request, MenuCategoryProduct $menuCategoryProduct)
    {
        //$request->dd();
        $menuCategoryProduct->name = $request->input('product_name');
        $menuCategoryProduct->description = $request->input('product_description');
        $menuCategoryProduct->price = $request->input('price');
        $menuCategoryProduct->calorie_total = $request->input('calorie');
        $menuCategoryProduct->calorie_total = $request->input('calorie');
        $menuCategoryProduct->cookie_time = $request->input('cooking_time');

        if ($menuCategoryProduct->save()){
            if ($request->croppedImage && isset($request->croppedImage)){
                $menuCategoryProduct->image = base64Convertor($request->croppedImage, 'menuCategoryProductImages');
                $menuCategoryProduct->save();
            }
            $otherProducts = $request->other_products;
            if (isset($otherProducts) && count($otherProducts) > 0){
                $menuCategoryProduct->otherProducts()->delete();
                foreach ($otherProducts as $otherProductId){
                    $otherProduct = new OtherProduct();
                    $otherProduct->product_id = $menuCategoryProduct->id;
                    $otherProduct->added_product_id = $otherProductId;
                    $otherProduct->save();
                }
            } else{
                $menuCategoryProduct->otherProducts()->delete();
            }

            $unitPrices = $request->input('group-a');
            if (isset($unitPrices) && count($unitPrices) > 0){
                $menuCategoryProduct->units()->delete();

                foreach ($unitPrices as $unitPrice){
                    if (isset($unitPrice["added_unit"])){
                        $productUnit = new ProductUnit();
                        $productUnit->product_id = $menuCategoryProduct->id;
                        $productUnit->unit_id = $unitPrice["added_unit"];
                        $productUnit->price = $unitPrice["added_price"];
                        $productUnit->save();
                    }

                }
            } else{
                $menuCategoryProduct->units()->delete();
            }
            $allergens = $request->allergens;
            if (isset($allergens) && count($allergens) > 0){
                $menuCategoryProduct->allergens()->delete();
                foreach ($allergens as $allergenId){
                    $productAllergen = new ProductAllergen();
                    $productAllergen->allergen_id = $allergenId;
                    $productAllergen->product_id = $menuCategoryProduct->id;
                    $productAllergen->save();
                }
            } else{
                $menuCategoryProduct->allergens()->delete();
            }

            $sauces = $request->sauces;
            if (isset($sauces) && count($sauces) > 0){
                $menuCategoryProduct->sauces()->delete();
                foreach ($sauces as $sauceId){
                    $productAllergen = new ProductSouce();
                    $productAllergen->sauce_id = $sauceId;
                    $productAllergen->product_id = $menuCategoryProduct->id;
                    $productAllergen->save();
                }
            } else{
                $menuCategoryProduct->sauces()->delete();
            }
            $materials = $request->materials;
            if (isset($materials) && count($materials) > 0){
                $menuCategoryProduct->materials()->delete();
                foreach ($materials as $materialId){
                    $productAllergen = new ProductMaterial();
                    $productAllergen->material_id = $materialId;
                    $productAllergen->product_id = $menuCategoryProduct->id;
                    $productAllergen->save();
                }
            } else{
                $menuCategoryProduct->materials()->delete();
            }
            return to_route('business.menu.edit', $menuCategoryProduct->category->menu_id)->with('response',[
                'status' => "success",
                'message' => "Ürün Başarılı Bir Şekilde Güncellendi"
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
