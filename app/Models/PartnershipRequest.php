<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PartnershipRequest extends Model
{
    use HasFactory;
    const STATUS_LIST = [
        0 => [
            "id" => 0,
            "name" => "Aranmadı",
            "icon" => '<span class="badge bg-label-warning">Aranmadı</span>',
        ],
        1 => [
            "id" => 1,
            "name" => "Arandı",
            "icon" => '<span class="badge bg-label-success">Arandı</span>',
        ],
    ];

    public function advertStatus($type)
    {
        return self::STATUS_LIST[$this->status][$type] ?? null;
    }
}
