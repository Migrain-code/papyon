<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Carbon;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use Notifiable;
    use HasRoles;


    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'start_time',
        'end_time',
        'status'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];
    const STATUS_LIST = [
        0 => [
            "id" => 0,
            "name" => "Pasif",
            "icon" => '<span class="badge bg-label-warning">Pasif</span>',
        ],
        1 => [
            "id" => 1,
            "name" => "Aktif",
            "icon" => '<span class="badge bg-label-success">Aktif</span>',
        ],
    ];

    public function advertStatus($type)
    {
        return self::STATUS_LIST[$this->status][$type] ?? null;
    }
    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'start_time' => "datetime",
            'end_time' => "datetime",
        ];
    }

    public function notificationPermission()
    {
        return $this->hasOne(NotificationPermission::class, 'user_id', 'id');
    }
    public function places()
    {
        return $this->hasMany(Place::class, 'user_id', 'id');
    }

    public function invoices()
    {
        return $this->hasMany(PacketOrder::class, 'user_id', 'id');
    }

    public function notifications()
    {
        return $this->hasMany(UserNotification::class, 'user_id', 'id');
    }

    public function unreadNotifications()
    {
        return $this->notifications()->where('status', 0);
    }
    public function place()
    {
        return $this->places()->where('is_default', 1)->first();
    }

    public function orderCount()
    {
        $orderCount = $this->places()
            ->withCount(['orders' => function ($query) {
                $query->whereIn('status', [4, 5]);
            }])
            ->get()
            ->sum('orders_count');
        return $orderCount;
    }

    public function orderTotal()
    {
        $totalRevenue = $this->places()
            ->with(['orders' => function ($query) {
                $query->whereIn('status', [4, 5]);
            }])
            ->get()
            ->flatMap(function ($place) {
                return $place->orders;
            })
            ->sum('total');

        return $totalRevenue;
    }

    public function advertCount()
    {
        $advertCount = $this->places()
            ->withCount(['adverts'])
            ->get()
            ->sum('adverts_count');
        return $advertCount;
    }

    public function remainingDate()
    {
        $remainingDate = Carbon::now()->diffInDays($this->end_time);
        return intval($remainingDate);
    }
}
