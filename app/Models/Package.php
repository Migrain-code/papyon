<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    use HasFactory;

    public function proparties()
    {
        return $this->hasMany(PackagePropartie::class, 'package_id', 'id')->orderBy('order_number', 'asc');
    }
}
