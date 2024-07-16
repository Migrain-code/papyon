<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MenuDesign extends Model
{
    use HasFactory;

    const MENU_LIST = [
        [
            "id" => 1,
            "name" => "Kategoriler",
            "icon" => '<i class="ti ti-category-filled"></i>',
            "route" => "/qr-menu"
        ],
        [
            "id" => 2,
            "name" => "Hesap İste",
            "icon" => '<i class="ti ti-wallet"></i>',
            "route" => "/qr-menu/call/account"
        ],
        [
            "id" => "toggleMenu",
            "name" => "Menü",
            "icon" => ' <div id="menuRedLine"></div><i class="ti ti-menu-4"></i>',
            "route" => "javascript:void(0)"
        ],
        [
            "id" => 4,
            "name" => "Garson Çağır",
            "icon" => '<i class="ti ti-table-down"></i>',
            "route" => "/qr-menu/call/waiter"
        ],
        [
            "id" => 'cartArea',
            "name" => "Sepet",
            "icon" => '<i class="ti ti-shopping-cart"></i><span class="cart">0</span>',
            "route" => "/qr-menu/check-out"
        ],
        [
            "id" => 'callTaxiButton',
            "name" => "Taksi Çağır",
            "icon" => '<i class="ti ti-car"></i>',
            "route" => "javascript:void(0)"
        ],
        [
            "id" => 'callWaiterButton',
            "name" => "Vale Çağır",
            "icon" => '<i class="ti ti-user-pin"></i>',
            "route" => 'javascript:void(0)'
        ],
        [
            "id" => 8,
            "name" => "Görüş",
            "icon" => '<i class="ti ti-message"></i>',
            "route" => "javascript:void(0)"
        ],
        [
            "id" => 9,
            "name" => "Sözleşmeler",
            "icon" => '<i class="ti ti-contract"></i>',
            "route" => "/qr-menu/contracts"
        ],
        [
            "id" => 10,
            "name" => "Yol Tarifi",
            "icon" => '<i class="ti ti-navigation"></i>',
            "route" => "https://www.google.com/maps?q=lat,long"
        ],
        [
            "id" => 11,
            "name" => "Duyurular",
            "icon" => '<i class="ti ti-bell"></i>',
            "route" => "/qr-menu/announcement"
        ],
        [
            "id" => 12,
            "name" => "Çalışma Saatleri",
            "icon" => '<i class="ti ti-clock-hour-3"></i>',
            "route" => "/qr-menu/working-hours"
        ],
        [
            "id" => 13,
            "name" => "Sipariş Takibi",
            "icon" => '<i class="ti ti-search"></i>',
            "route" => "/qr-menu/order/search"
        ],
    ];

    public function getMenu($type)
    {
        return self::MENU_LIST[$this->menu_id][$type];
    }

}
