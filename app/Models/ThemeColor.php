<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ThemeColor extends Model
{
    use HasFactory;

    public function clone($newPlace)
    {
        $menuOrder = new ThemeColor();
        $menuOrder->place_id = $newPlace->id;
        $menuOrder->name = $this->name;
        $menuOrder->value = $this->value;
        $menuOrder->save();
    }
}
