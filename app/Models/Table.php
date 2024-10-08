<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Table extends Model
{
    use HasFactory;

    public function place()
    {
        return $this->hasOne(Place::class, 'id', 'place_id');
    }

    public function region()
    {
        return $this->hasOne(Region::class, 'id', 'region_id');
    }
}
