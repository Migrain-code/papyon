<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Menu extends Model
{
    use HasFactory, SoftDeletes;

    public function categories()
    {
        return $this->hasMany(MenuCategory::class, 'menu_id', 'id')->orderBy('order_number', 'asc');
    }

    public function products()
    {
        return $this->hasMany(MenuCategoryProduct::class, 'menu_id', 'id');
    }

    public function banner()
    {
        return $this->hasOne(MenuPopupBanner::class, 'menu_id', 'id');
    }

    public function cryptedMenu()
    {
        return $this->hasOne(MenuPassword::class, 'menu_id', 'id');
    }

    public function clone($newPlace)
    {
        $newMenu = $this->replicate();
        $newMenu->place_id = $newPlace->id; // Yeni place_id ile güncelle
        $newMenu->save();

        foreach ($this->categories as $category) {
            $newCategory = $category->replicate();
            $newCategory->menu_id = $newMenu->id; // Yeni menu_id ile güncelle
            $newCategory->save();
        }

        // İlişkili ürünleri klonlama
        foreach ($this->products as $product) {
            $newProduct = $product->replicate();
            $newProduct->menu_id = $newMenu->id; // Yeni menu_id ile güncelle
            $newProduct->save();
        }

        // İlişkili banner'ı klonlama
        if ($this->banner) {
            $newBanner = $this->banner->replicate();
            $newBanner->menu_id = $newMenu->id; // Yeni menu_id ile güncelle
            $newBanner->save();
        }

        // İlişkili şifreli menüyü klonlama
        if ($this->cryptedMenu) {
            $newCryptedMenu = $this->cryptedMenu->replicate();
            $newCryptedMenu->menu_id = $newMenu->id; // Yeni menu_id ile güncelle
            $newCryptedMenu->save();
        }
    }
}
