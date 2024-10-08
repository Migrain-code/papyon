<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NotificationPermission extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'permissions',
    ];
    protected $casts = [
        'permissions' => 'array',
    ];
}
