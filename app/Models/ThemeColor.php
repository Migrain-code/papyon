<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ThemeColor extends Model
{
    use HasFactory;
    const COLOR_VARIABLES = array(
        array('name' => 'product_card_time_bg','value' => '#e0483d'),
        array('name' => 'product_card_font','value' => '#686868'),
        array('name' => 'product_card_bg','value' => '#fcf9f9'),
        array('name' => 'category_bg','value' => '#e0483d'),
        array('name' => 'category_button_font','value' => '#f3f3f1'),
        array('name' => 'category_button_bg','value' => '#e0483d'),
        array('name' => 'bottom_menu_font_close','value' => '#000000'),
        array('name' => 'bottom_menu_bg_close','value' => '#e3e3e3'),
        array('name' => 'bottom_menu_font','value' => '#fcfcfc'),
        array('name' => 'bottom_menu_bg','value' => '#e0483d'),
        array('name' => 'top_menu_font','value' => '#ffffff'),
        array('name' => 'top_menu_bg','value' => '#e0483d'),
        array('name' => 'product_card_time_font','value' => '#ffffff'),
        array('name' => 'product_card_add_button_bg','value' => '#e0483d'),
        array('name' => 'product_card_add_button_font','value' => '#ffffff')
    );

    public function clone($newPlace)
    {
        $menuOrder = new ThemeColor();
        $menuOrder->place_id = $newPlace->id;
        $menuOrder->name = $this->name;
        $menuOrder->value = $this->value;
        $menuOrder->save();
    }


}
