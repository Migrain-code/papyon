<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $casts = ['materials' => "object", 'sauces' => "object"];

    public function product()
    {
        return $this->hasOne(MenuCategoryProduct::class, 'id', 'product_id');
    }
}
