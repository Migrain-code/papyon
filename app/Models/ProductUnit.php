<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductUnit extends Model
{
    use HasFactory;

    public function unit()
    {
        return $this->hasOne(PlaceUnit::class, 'id', 'unit_id');
    }
}
