<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductMaterial extends Model
{
    use HasFactory;

    public function material()
    {
        return $this->hasOne(Material::class, 'id', 'material_id');
    }
}
