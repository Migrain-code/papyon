<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductSouce extends Model
{
    use HasFactory;

    public function sauce()
    {
        return $this->hasOne(Souce::class, 'id', 'sauce_id');
    }
}
