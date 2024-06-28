<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\MenuPassword;
use App\Models\MenuPopupBanner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class MenuPasswordController extends Controller
{
    public function crytpedView(Menu $menu)
    {
        $cryptedMenu = $menu->cryptedMenu;
        return view('business.menu.edit.tabs.menu-password', compact('menu', 'cryptedMenu'));
    }

    public function updatePassword(Menu $menu ,Request $request)
    {
        $menuBanner = $menu->cryptedMenu;
        if(!isset($menuBanner)){
            $menuBanner = new MenuPassword();
        }
        $menuBanner->menu_id = $menu->id;
        $menuBanner->password = Hash::make($request->input('menu_password'));
        $menuBanner->status = 1;
        if ($menuBanner->save()){
            return to_route('business.menu.crytpedView', $menu->id)->with('response', [
                'status' => "success",
                'message' => "Şifre Başarılı Bir Şekilde Oluşturuldu"
            ]);
        }
    }

    public function updatePasswordStatus(Menu $menu)
    {
        $menuBanner = $menu->cryptedMenu;
        if(isset($menuBanner)){
            $menuBanner->status = !$menuBanner->status;
            if ($menuBanner->save()){
                if ($menuBanner->status == 1){
                    return response()->json([
                        'status' => "success",
                        'message' => "Şifre Aktif Edildi"
                    ]);
                } else{
                    return response()->json([
                        'status' => "warning",
                        'message' => "Şifre Devre Dışı Bırakıldı"
                    ]);
                }

            }
        }
        return response()->json([
            'status' => "warning",
            'message' => "Şifre Aktif Edildi Lütfen Şifre Girip Kaydet Butonuna Basınız"
        ]);
    }
}
