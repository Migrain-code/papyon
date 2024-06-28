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
}
