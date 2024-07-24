<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $casts=[
      'cart' => "object"
    ];
    const PAYMENT_STATUS = [
        0 => [
            "id" => 0,
            "name" => "Adisyon Beklemede",
            "icon" => '<span class="badge bg-label-warning">Adisyon Beklemede</span>',
        ],
        1 => [
            "id" => 1,
            "name" => "Ödeme Alındı",
            "icon" => '<span class="badge bg-label-success">Adisyon Ödendi</span>',
        ],
    ];
    const ORDER_STATUS = [
        0 => [
            "id" => 0,
            "name" => "Beklemede",
            "icon" => '<span class="badge bg-label-warning">Beklemede</span>',
        ],
        1 => [
            "id" => 1,
            "name" => "Onaylandı",
            "icon" => '<span class="badge bg-label-success">Onaylandı</span>',
        ],
        2 => [
            "id" => 1,
            "name" => "İptal Edildi",
            "icon" => '<span class="badge bg-label-danger">İptal Edildi</span>',
        ],
        3 => [
            "id" => 1,
            "name" => "Kuryede",
            "icon" => '<span class="badge bg-label-secondary">Kuryede</span>',
        ],
        4 => [
            "id" => 1,
            "name" => "Teslim Edildi",
            "icon" => '<span class="badge bg-label-info">Teslim Edildi</span>',
        ],
        5 => [
            "id" => 1,
            "name" => "Tamamlandı",
            "icon" => '<span class="badge bg-label-success">Tamamlandı</span>',
        ],

    ];
    const PAYMENT_TYPES = [
        0 => ["id" => 0, "name" => "Nakit"],
        1 => ["id" => 1, "name" => "Banka / Kredi Kartı"],
        2 => ["id" => 2, "name" => "EFT / Havale"],
        3 => ["id" => 3, "name" => "Diğer"],
    ];
    const ORDER_TYPES = [
        0 => [
            "id" => 0,
            "name" => "Paket Sipariş",
            "icon" => "ti ti-shopping-cart",
        ],
        1 => [
            "id" => 1,
            "name" => "Masadan Sipariş",
            "icon" => "ti ti-table-down",

        ],
        2 => [
            "id" => 2,
            "name" => "Gel Al Sipariş",
            "icon" => "ti ti-hand-click",
        ],
    ];
    public function type($type)
    {
        return self::PAYMENT_TYPES[$this->payment_type_id][$type] ?? null;
    }

    public function orderType($type)
    {
        return self::ORDER_TYPES[$this->order_type][$type] ?? null;
    }
    public function orderStatus($type)
    {
        return self::ORDER_STATUS[$this->status][$type] ?? null;
    }
    public function paymentStatus($type)
    {
        return self::PAYMENT_STATUS[$this->payment_status][$type] ?? null;
    }
    public function table()
    {
        return $this->hasOne(Table::class, 'id', 'table_id');
    }

    public function calculateCartTotal()
    {

        $products = $this->cart;

        $totalPrice = 0;
        foreach ($products as $product){
            $totalPrice += $product->total;
        }
        return $totalPrice;
    }

    public function discountTotal()
    {
        return ($this->calculateCartTotal() * $this->discount) / 100;
    }

    public function deliveryFee()
    {
        if ($this->order_type == 0){
            return 15;
        } else{
            return 0;
        }
    }

    public function total()
    {
        return ($this->calculateCartTotal() + $this->deliveryFee()) - $this->discountTotal();
    }
}
