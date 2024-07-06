<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Sanctum\HasApiTokens;
class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use Notifiable;
    use TwoFactorAuthenticatable;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
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
        ];
    }

    public function places()
    {
        return $this->hasMany(Place::class, 'user_id', 'id');
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
}
