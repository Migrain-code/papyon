<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductAllergen extends Model
{
    use HasFactory;

    public function allergen()
    {
        return $this->hasOne(Allergen::class, 'id', 'allergen_id');
    }
}
