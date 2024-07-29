<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    use HasFactory;
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

    public function advertStatus($type)
    {
        return self::STATUS_LIST[$this->status][$type] ?? null;
    }
}
