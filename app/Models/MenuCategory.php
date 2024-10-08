<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MenuCategory extends Model
{
    use HasFactory;
    protected $fillable = ["order_number"];
    public function products()
    {
        return $this->hasMany(MenuCategoryProduct::class, 'category_id', 'id')->orderBy('order_number', 'asc');
    }
    public function menu()
    {
        return $this->hasOne(Menu::class, 'id', 'menu_id');
    }

    public function clone($newMenu, $newCategory)
    {
        // İlişkili ürünleri klonlama
        foreach ($this->products as $product) {
            $newProduct = $product->replicate();
            $newProduct->menu_id = $newMenu->id; // Yeni menu_id ile güncelle
            $newProduct->category_id = $newCategory->id; // Yeni menu_id ile güncelle
            $newProduct->save();
        }
    }

    protected static function booted()
    {
        static::deleted(function ($category) {
            $category->products()->delete();
        });
    }
}
