<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Place extends Model
{
    use HasFactory;

    protected $casts = ['other_languages' => 'object'];
    protected $fillable = ['is_default'];

    public function menus()
    {
        return $this->hasMany(Menu::class, 'place_id', 'id');
    }

    public function activeMenu()
    {
        return $this->menus()->where('is_default', 1)->first();
    }

    public function regions()
    {
        return $this->hasMany(Region::class, 'place_id', 'id');
    }

    public function units()
    {
        return $this->hasMany(PlaceUnit::class, 'place_id', 'id')->orderBy('id', 'asc');
    }

    public function contracts()
    {
        return $this->hasMany(Contract::class, 'place_id', 'id');
    }

    public function workTimes() // Çalışma Saatleri
    {
        return $this->hasMany(PlaceWorkTime::class, 'place_id', 'id')->orderBy('id', 'asc');
    }

    public function announcements() // Duyurular
    {
        return $this->hasMany(Announcement::class, 'place_id', 'id');
    }
    public function souces() // soslar
    {
        return $this->hasMany(Souce::class, 'place_id', 'id');
    }

    public function materials() // malzemeler
    {
        return $this->hasMany(Material::class, 'place_id', 'id');
    }

    public function checkCloseDay()
    {
        $day = $this->workTimes()->where('day_id', Carbon::now()->dayOfWeek)->first();
        if ($day->status == 0) {
            return true; //kapalı
        }
        return false;
    }

    public function checkClock()
    {
        $day = $this->workTimes()->where('day_id', Carbon::now()->dayOfWeek)->first();

        if (!$day) {
            return true;
        }

        $currentTime = Carbon::now();
        $startTime = Carbon::parse($day->start_time);
        $endTime = Carbon::parse($day->end_time);

        if ($startTime->lt($endTime)) {
            // Normal case where start time is before end time on the same day
            if ($currentTime->between($startTime, $endTime)) {
                return false;
            }
        } else {
            // Case where the working hours span past midnight
            if ($currentTime->gte($startTime) || $currentTime->lte($endTime)) {
                return false;
            }
        }

        return true;
    }

    public function orders() // Siparişler
    {
        return $this->hasMany(Order::class, 'place_id', 'id');
    }
    public function visitors() // ziyaretçiler
    {
        return $this->hasMany(PlaceVisitor::class, 'place_id', 'id');
    }
    public function claims() // Siparişler
    {
        return $this->hasMany(Claim::class, 'place_id', 'id');
    }

    public function adverts() // Reklamlar
    {
        return $this->hasMany(SwiperAdvert::class, 'place_id', 'id');
    }

    public function suggestions() // Görüş ve Öneriler
    {
        return $this->hasMany(Suggestion::class, 'place_id', 'id');
    }
    public function suggestionQuestions() // Görüş ve Öneriler
    {
        return $this->hasMany(SuggestionQuestion::class, 'place_id', 'id');
    }

    public function colors() // Renkler
    {
        return $this->hasMany(ThemeColor::class, 'place_id', 'id');
    }

    public function menuOrders() // Menü sıralaması
    {
        return $this->hasMany(MenuDesign::class, 'place_id', 'id')->orderBy('order_number', 'asc');
    }

    public function activeMenus() // Menü sıralaması
    {
        return $this->menuOrders()->where('status', 1);
    }

    public function createMenu()
    {
        if ($this->menuOrders->count() == 0) {
            $menuNames = MenuDesign::MENU_LIST;

            foreach ($menuNames as $index => $menu) {
                $menuOrder = new MenuDesign();
                $menuOrder->place_id = $this->id;
                $menuOrder->name = $menu["name"];
                $menuOrder->menu_id = $index;
                $menuOrder->order_number = $index;
                $menuOrder->save();
            }

        }
    }

    public function activeAdverts() // Reklamlar
    {
        return $this->adverts()->where('status', 1);
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
        //Garon Çağır
        $service->call_a_waiter = isset($serviceData["call_a_waiter"]);
        $service->call_a_waiter_phone = isset($serviceData["call_a_waiter"]) ? clearPhone($serviceData["call_a_waiter_phone"]) : null;
        // Masaya Sipariş
        $service->order_type = $serviceData["order_type"];
        $service->table_phone = clearPhone($serviceData["table_phone"]);

        //Hesap İste
        $service->request_account = isset($serviceData["request_account"]);
        $service->request_account_phone = isset($serviceData["request_account"]) ? clearPhone($serviceData["request_account_phone"]) : null;

        //Vale Çağır
        $service->call_a_valet = isset($serviceData["call_a_valet"]);
        $service->valet_phone = isset($serviceData["call_a_valet"]) ? clearPhone($serviceData["valet_phone"]) : null;

        //Taxi Çağır
        $service->call_a_taxi = isset($serviceData["call_a_taxi"]);
        $service->taxi_phone = isset($serviceData["call_a_taxi"]) ? clearPhone($serviceData["taxi_phone"]) : null;

        //Gel Al Sipariş
        $service->take_away_order = isset($serviceData["take_away_order"]);
        $service->take_away_phone = isset($serviceData["take_away_order"]) ? clearPhone($serviceData["take_away_phone"]) : null;

        //Paket Sipariş
        $service->package_order = isset($serviceData["package_order"]);
        $service->package_order_phone = isset($serviceData["package_order"]) ? clearPhone($serviceData["package_order_phone"]) : null;

        // Teslimat Ücreti
        $service->delivery_fee = $serviceData["delivery_fee"];
        $service->save();
    }

    public function updateService($serviceData)
    {
        $service = $this->services;

        //Garson Çağır
        $service->call_a_waiter = isset($serviceData["call_a_waiter"]);
        $service->call_a_waiter_phone = isset($serviceData["call_a_waiter"]) ? clearPhone($serviceData["call_a_waiter_phone"]) : null;
        $this->menuOrders()->where('menu_id', 3)->first()->update(['status' =>  isset($serviceData["call_a_waiter"])]);

        // Masaya Sipariş
        $service->order_type = $serviceData["order_type"];
        $service->table_phone = clearPhone($serviceData["table_phone"]);

        //Hesap İste
        $service->request_account = isset($serviceData["request_account"]);
        $service->request_account_phone = isset($serviceData["request_account"]) ? clearPhone($serviceData["request_account_phone"]) : null;
        $this->menuOrders()->where('menu_id', 1)->first()->update(['status' =>  isset($serviceData["request_account"])]);

        //Vale Çağır
        $service->call_a_valet = isset($serviceData["call_a_valet"]);
        $service->valet_phone = isset($serviceData["call_a_valet"]) ? clearPhone($serviceData["valet_phone"]) : null;
        $this->menuOrders()->where('menu_id', 6)->first()->update(['status' =>  isset($serviceData["call_a_valet"])]);

        //Taxi Çağır
        $service->call_a_taxi = isset($serviceData["call_a_taxi"]);
        $service->taxi_phone = isset($serviceData["call_a_taxi"]) ? clearPhone($serviceData["taxi_phone"]) : null;
        $this->menuOrders()->where('menu_id', 5)->first()->update(['status' =>  isset($serviceData["call_a_taxi"])]);

        //Gel Al Sipariş
        $service->take_away_order = isset($serviceData["take_away_order"]);
        $service->take_away_phone = isset($serviceData["take_away_order"]) ? clearPhone($serviceData["take_away_phone"]) : null;

        //Paket Sipariş
        $service->package_order = isset($serviceData["package_order"]);
        $service->package_order_phone = isset($serviceData["package_order"]) ? clearPhone($serviceData["package_order_phone"]) : null;

        // Teslimat Ücreti
        $service->delivery_fee = $serviceData["delivery_fee"];
        $service->save();
    }

    public function totalClaims()
    {
        $ordersCount = $this->orders->where('status', 0)->count();
        $packetCount = $this->orders->where('status', 0)->where('order_type', 0)->count();
        $taxiCount = $this->claims->where('type_id', 0)->where('status', 0)->count();
        $valeCount = $this->claims->where('type_id', 1)->where('status', 0)->count();
        $waiterCount = $this->claims->where('type_id', 2)->where('status', 0)->count();
        $claims = [
            'orderCount' => $ordersCount,
            'packetCount' => $packetCount,
            'taxiCount' => $taxiCount,
            'valeCount' => $valeCount,
            'waiterCount' => $waiterCount,
        ];

        return $claims;
    }
    public function allClaim()
    {
        $ordersCount = $this->orders->where('status', 0)->count();
        $packetCount = $this->orders->where('status', 0)->where('order_type', 0)->count();
        $taxiCount = $this->claims->where('type_id', 0)->where('status', 0)->count();
        $valeCount = $this->claims->where('type_id', 1)->where('status', 0)->count();
        $waiterCount = $this->claims->where('type_id', 2)->where('status', 0)->count();
        $totalClaims = $ordersCount + $taxiCount + $valeCount + $waiterCount;

        return $totalClaims;
    }
    public function clone()
    {
        $newPlace = $this->replicate();
        $newPlace->name = $this->name . ' (Kopya)';
        $newPlace->is_default = 0;
        if ($newPlace->save()) {
            // İlişkili menüleri klonlama
            foreach ($this->menus as $menu) {
                $menu->clone($newPlace);
            }
            // İlişkili menü tasarımız klonlama
            foreach ($this->menuOrders as $menuo) {
                $menuo->clone($newPlace);
            }
            // İlişkili menü renk klonlama
            foreach ($this->colors as $color) {
                $color->clone($newPlace);
            }
            // İlişkili bölgeleri klonlama
            foreach ($this->regions as $region) {
                $newRegion = $region->replicate();
                $newRegion->place_id = $newPlace->id; // Yeni place_id ile güncelle
                $newRegion->save();
            }

            // İlişkili çalışma saatlerini klonlama
            foreach ($this->workTimes as $workTime) {
                $newWorkTime = $workTime->replicate();
                $newWorkTime->place_id = $newPlace->id; // Yeni place_id ile güncelle
                $newWorkTime->save();
            }

            // İlişkili Wi-Fi bilgilerini klonlama
            if ($this->wifi) {
                $newWifi = $this->wifi->replicate();
                $newWifi->place_id = $newPlace->id; // Yeni place_id ile güncelle
                $newWifi->save();
            }

            // İlişkili servis seçeneklerini klonlama
            if ($this->services) {
                $newServices = $this->services->replicate();
                $newServices->place_id = $newPlace->id; // Yeni place_id ile güncelle
                $newServices->save();
            }
        }

    }
}
