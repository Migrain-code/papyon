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
            "route" => "javascript:void(0)"
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
            "route" => "javascript:void(0)"
        ],
        [
            "id" => 5,
            "name" => "Sepet",
            "icon" => '<i class="ti ti-shopping-cart"></i><span class="cart">0</span>',
            "route" => "/qr-menu/check-out"
        ],
        [
            "id" => 6,
            "name" => "Taksi Çağır",
            "icon" => '<i class="ti ti-car"></i>',
            "route" => "javascript:void(0)"
        ],
        [
            "id" => 7,
            "name" => "Vale Çağır",
            "icon" => '<i class="ti ti-user-pin"></i>',
            "route" => "javascript:void(0)"
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
            "route" => "javascript:void(0)"
        ],
        [
            "id" => 10,
            "name" => "Yol Tarifi",
            "icon" => '<i class="ti ti-navigation"></i>',
            "route" => "javascript:void(0)"
        ],
        [
            "id" => 11,
            "name" => "Duyurular",
            "icon" => '<i class="ti ti-bell"></i>',
            "route" => "javascript:void(0)"
        ],
        [
            "id" => 12,
            "name" => "Çalışma Saatleri",
            "icon" => '<i class="ti ti-clock-hour-3"></i>',
            "route" => "javascript:void(0)"
        ],
        [
            "id" => 13,
            "name" => "Whatsapp",
            "icon" => '<i class="ti ti-brand-whatsapp"></i>',
            "route" => "javascript:void(0)"
        ],
        [
            "id" => 14,
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
