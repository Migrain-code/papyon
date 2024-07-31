<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    use HasFactory;

    public function tables()
    {
        return $this->hasMany(Table::class, 'region_id', 'id')->orderBy('id', 'asc');
    }
}
