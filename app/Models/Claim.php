<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Claim extends Model
{
    use HasFactory;
    const STATUS_LIST = [
        0 => [
            "id" => 0,
            "name" => "Talep Beklemede",
            "icon" => '<span class="badge bg-label-warning">Talep Beklemede</span>',
        ],
        1 => [
            "id" => 1,
            "name" => "Talep Onaylandı",
            "icon" => '<span class="badge bg-label-success">Talep Onaylandı</span>',
        ],
    ];

    const TYPE_LIST = [
        0 => [
            "id" => 0,
            "name" => "Taksi Talebi",
            "icon" => '<span class="badge bg-label-warning">Taksi Talebi</span>',
        ],
        1 => [
            "id" => 1,
            "name" => "Vale Talebi",
            "icon" => '<span class="badge bg-label-success">Vale Talebi</span>',
        ],
        2 => [
            "id" => 1,
            "name" => "Garson Talebi",
            "icon" => '<span class="badge bg-label-success">Garson Talebi</span>',
        ],
    ];
    public function status($type)
    {
        return self::STATUS_LIST[$this->status][$type] ?? null;
    }

    public function type($type)
    {
        return self::TYPE_LIST[$this->type_id][$type] ?? null;
    }

    public function table()
    {
        return $this->hasOne(Table::class, 'id', 'table_id');
    }
}
