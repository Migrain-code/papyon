<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PacketOrder extends Model
{
    use HasFactory;

    public function calculateGeneralTotal()
    {
        return $this->price - (($this->price * 20) / 100);
    }

    public function calculateTaxPrice()
    {
        return (($this->price * 20) / 100);
    }
}
