<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlaceWorkTime extends Model
{
    use HasFactory;

    public function day()
    {
        return $this->hasOne(DayList::class, 'id', 'day_id');
    }
}
