<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MenuCategoryProduct extends Model
{
    use HasFactory;

    protected $fillable = ["order_number", "status"];

    public function category()
    {
        return $this->hasOne(MenuCategory::class, 'id', 'category_id');
    }

    public function otherProducts()
    {
        return $this->hasMany(OtherProduct::class, 'product_id', 'id');
    }

    public function allergens()
    {
        return $this->hasMany(ProductAllergen::class, 'product_id', 'id');
    }

    public function materials()
    {
        return $this->hasMany(ProductMaterial::class, 'product_id', 'id');
    }

    public function sauces()
    {
        return $this->hasMany(ProductSouce::class, 'product_id', 'id');
    }

    public function images()
    {
        return $this->hasMany(ProductImage::class, 'product_id', 'id');
    }

    public function units()
    {
        return $this->hasMany(ProductUnit::class, 'product_id', 'id');
    }

    protected static function booted()
    {
        static::deleted(function ($product) {
            $product->otherProducts()->delete();
            $product->allergens()->delete();
            $product->materials()->delete();
            $product->sauces()->delete();
            $product->images()->delete();
            $product->units()->delete();
        });
    }
}
