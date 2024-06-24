<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Place extends Model
{
    use HasFactory;
    protected $casts = ['other_languages' => 'object'];

    public function regions() // Çalışma Saatleri
    {
        return $this->hasMany(Region::class, 'place_id', 'id');
    }

    public function workTimes() // Çalışma Saatleri
    {
        return $this->hasMany(PlaceWorkTime::class, 'place_id', 'id');
    }

    public function wifi() // wifi
    {
        return $this->hasOne(PlaceWifi::class, 'place_id', 'id');
    }

    public function services() // Servis Seçenekleri
    {
        return $this->hasOne(Service::class, 'place_id', 'id');
    }

    public function createService($serviceData)
    {
        $service = new Service();
        $service->place_id = $this->id;
        $service->call_a_waiter = isset($serviceData["call_a_waiter"]);
        $service->request_account = isset($serviceData["request_account"]);
        $service->call_a_valet = isset($serviceData["call_a_valet"]);
        $service->valet_phone = $serviceData["valet_phone"];
        $service->call_a_taxi = isset($serviceData["call_a_taxi"]);
        $service->taxi_phone = $serviceData["taxi_phone"];
        $service->take_away_order = isset($serviceData["take_away_order"]);
        $service->take_away_phone = $serviceData["take_away_phone"];
        $service->package_order = isset($serviceData["package_order"]);
        $service->package_order_phone = $serviceData["package_order_phone"];
        $service->delivery_fee = $serviceData["delivery_fee"];
        $service->save();
    }
}
