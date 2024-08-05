<?php

namespace App\Http\Controllers;

use App\Models\Allergen;
use App\Models\Menu;
use App\Models\MenuCategoryProduct;
use App\Models\MenuPopupBanner;
use App\Models\Place;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    private $business;
    private $user;

    public function __construct()
    {
        $this->user = auth('web')->user();
        $this->business = $this->user->place();
    }
    /**
     * Menu List
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
     */
    public function index()
    {

        $menus = $this->business->menus;
        /*if ($menus->count() == 1){
            return to_route('business.menu.edit', $menus->first()->id);
        }*/
        return view('business.menu.index', compact('menus'));
    }

    /**
     * Category and Product List
     *
     * @param Menu $menu
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
     */
    public function statusView(Menu $menu)
    {
        $categories = $menu->categories;
        return view('business.menu.edit.tabs.status', compact('menu', 'categories'));
    }

    /**
     * Update Menu Product Prices
     *
     * @param Menu $menu
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function updatePrice(Menu $menu, Request $request)
    {
        $productPrices = $request->productPrices;
        $productIds = $menu->products()->pluck('id');
        foreach ($productIds as $productId){
            if (!array_key_exists($productId, $productPrices)){
                return to_route('business.menu.status', $menu->id)->with('response', [
                    'status' => "error",
                    'message' => "Uyarı!! Site içi form düzeltme yapmayınız"
                ]);
            }
        }
        foreach ($request->productPrices as $key => $productPrice){
            $product = MenuCategoryProduct::find($key);
            $product->price = $productPrice;
            $product->save();
        }
        return to_route('business.menu.status', $menu->id)->with('response', [
            'status' => "success",
            'message' => "Fiyatlar Başarılı Bir Şekilde Güncellendi"
        ]);
    }

    public function updatePopup(Menu $menu ,Request $request)
    {
        $request->validate([
           'banner_type' => 'required',
           'banner_description' => 'required'
        ], [], [
            'banner_type' => 'banner türü',
            'banner_description' => 'banner açıklaması'
        ]);
        $menuBanner = $menu->banner;
        if(!isset($menuBanner)){
            $menuBanner = new MenuPopupBanner();
        }
        $menuBanner->menu_id = $menu->id;
        $menuBanner->banner_type = $request->input('banner_type');
        if ($request->hasFile('banner_image')){
            $menuBanner->image = $request->file('banner_image')->store('menuBannerImages');
        }
        $menuBanner->description = $request->input('banner_description');
        $menuBanner->status = 1;
        if ($menuBanner->save()){
            return to_route('business.menu.popup', $menu->id)->with('response', [
                'status' => "success",
                'message' => "Banner Başarılı Bir Şekilde Oluşturuldu"
            ]);
        }
    }

    public function updatePopupStatus(Menu $menu)
    {
        $menuBanner = $menu->banner;
        if(isset($menuBanner)){
            $menuBanner->status = !$menuBanner->status;
            if ($menuBanner->save()){
                if ($menuBanner->status == 1){
                    return response()->json([
                        'status' => "success",
                        'message' => "Banner Aktif Edildi"
                    ]);
                } else{
                    return response()->json([
                        'status' => "warning",
                        'message' => "Banner Devre Dışı Bırakıldı"
                    ]);
                }

            }
        }
        return response()->json([
            'status' => "warning",
            'message' => "Banner Aktif Edildi Lütfen İçerik Kaydı Yapınız"
        ]);
    }
    /**
     * Popup Form
     *
     * @param Menu $menu
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
     */
    public function popupView(Menu $menu)
    {
        $banner = $menu->banner;
        return view('business.menu.edit.tabs.popup-banner', compact('menu', 'banner'));
    }

    /**
     * New menu record
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|void
     */
    public function store(Request $request)
    {
        $place = $this->business;
        $menu = new Menu();
        $menu->place_id = $place->id;
        $menu->name = $request->input('name');
        if ($request->hasFile('menu_image')){
            $menu->image = $request->file('menu_image')->store('menuLogos');
        }
        if ($menu->save()) {
            if ($place->menus->count() == 1) {
                $menu->is_default = 1;
                $menu->save();
            }
            return to_route('business.menu.index')->with('response', [
                'status' => "success",
                'message' => "Menü Başarılı Bir Şekilde Oluşturuldu"
            ]);
        }
    }

    /**
     * Menu content editing form
     *
     * @param Menu $menu
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
     */
    public function edit(Menu $menu)
    {
        $categories = $menu->categories;
        $allergens = Allergen::whereStatus(1)->get();
        $themeId = $this->business->theme_id;
        return view('business.menu.edit.index', compact('menu', 'categories', 'allergens', 'themeId'));
    }

    public function useMenu(Menu $menu)
    {
        $menus = $this->business->menus()->get();
        if ($menus->count() > 1){
            $this->business->menus()->update(['is_default' => 0]);
           $menu->is_default = 1;
           $menu->save();
        }
        return to_route('business.menu.index')->with('response', [
            'status' => "success",
            'message' => "Mekanınızda yeni gelen müşterileriniz artık bu menüyü kullanacak"
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Menu $menu)
    {
        //
    }

    public function show(Menu $menu)
    {
        $menu->delete();
        return back()->with('response', [
           'status' => "success",
           'message' => "Menü Başarılı Bir Şekilde Silindi"
        ]);
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Menu $menu)
    {
        //
    }
}
