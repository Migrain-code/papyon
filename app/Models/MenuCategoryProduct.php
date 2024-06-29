<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MenuCategoryProduct extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = ["order_number", "status"];

    public function category()
    {
        return $this->hasOne(MenuCategory::class, 'id', 'category_id');
    }
}
