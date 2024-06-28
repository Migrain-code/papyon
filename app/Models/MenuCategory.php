<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MenuCategory extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = ["order_number"];
    public function products()
    {
        return $this->hasMany(MenuCategoryProduct::class, 'category_id', 'id')->orderBy('order_number', 'asc');
    }
}
