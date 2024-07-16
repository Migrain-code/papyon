<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Suggestion extends Model
{
    use HasFactory;
    protected $casts = ["rating" => "object"];
    const STATUS_LIST = [
        0 => [
            "id" => 0,
            "name" => "Yayında Değil",
            "icon" => '<span class="badge bg-label-warning">Yayında Değil</span>',
        ],
        1 => [
            "id" => 1,
            "name" => "Yayında",
            "icon" => '<span class="badge bg-label-success">Yayında</span>',
        ],
    ];

    public function status($type)
    {
        return self::STATUS_LIST[$this->status][$type] ?? null;
    }
    public function table() // Reklamlar
    {
        return $this->hasOne(Table::class, 'id', 'table_id');
    }
}
