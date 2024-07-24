<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MenuDesign extends Model
{
    use HasFactory;
    protected $fillable = ["status"];
    const MENU_LIST = [
        [
            "id" => 1,
            "name" => "Kategoriler",
            "icon" => '<i class="ti ti-category-filled"></i>',
            "route" => ""
        ],
        [
            "id" => 2,
            "name" => "Hesap İste",
            "icon" => '<i class="ti ti-wallet"></i>',
            "route" => "/call/account"
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
            "route" => "/call/waiter"
        ],
        [
            "id" => 'cartArea',
            "name" => "Sepet",
            "icon" => '<i class="ti ti-shopping-cart"></i><span class="cart">0</span>',
            "route" => "/check-out"
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
            "route" => "/contracts"
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
            "route" => "/announcement"
        ],
        [
            "id" => 12,
            "name" => "Çalışma Saatleri",
            "icon" => '<i class="ti ti-clock-hour-3"></i>',
            "route" => "/working-hours"
        ],
        [
            "id" => 13,
            "name" => "Sipariş Takibi",
            "icon" => '<i class="ti ti-search"></i>',
            "route" => "/order/search"
        ],
    ];

    public function getMenu($type)
    {
        $slug = \Illuminate\Support\Facades\Session::get('place')->slug;

        $menuList = [
            [
                "id" => 1,
                "name" => "Kategoriler",
                "icon" => '<i class="ti ti-category-filled"></i>',
                "route" => route('menu.index', $slug)
            ],
            [
                "id" => 2,
                "name" => "Hesap İste",
                "icon" => '<i class="ti ti-wallet"></i>',
                "route" => route('call.account', $slug)
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
                "route" => route('call.waiter', $slug)
            ],
            [
                "id" => 'cartArea',
                "name" => "Sepet",
                "icon" => '<i class="ti ti-shopping-cart"></i><span class="cart">0</span>',
                "route" => route('menu.checkOut', $slug)
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
                "route" => route('menu.suggestion', $slug)
            ],
            [
                "id" => 9,
                "name" => "Sözleşmeler",
                "icon" => '<i class="ti ti-contract"></i>',
                "route" => route('menu.contracts', $slug)
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
                "route" => route('menu.announcement', $slug)
            ],
            [
                "id" => 12,
                "name" => "Çalışma Saatleri",
                "icon" => '<i class="ti ti-clock-hour-3"></i>',
                "route" => route('menu.workingHours', $slug)
            ],
            [
                "id" => 13,
                "name" => "Sipariş Takibi",
                "icon" => '<i class="ti ti-search"></i>',
                "route" => route('orderSearchShow', $slug)
            ],
        ];
        return $menuList[$this->menu_id][$type];
    }

    public function clone($newPlace)
    {
        $menuOrder = new MenuDesign();
        $menuOrder->place_id = $newPlace->id;
        $menuOrder->name = $this->name;
        $menuOrder->menu_id = $this->menu_id;
        $menuOrder->order_number = $this->order_number;
        $menuOrder->save();
    }
}
