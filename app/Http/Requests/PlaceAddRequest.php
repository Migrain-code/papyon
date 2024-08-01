<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PlaceAddRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'place_name' => 'required',
            'place_link' => 'required',
            'main_language' => 'required',
            //'other_language' => 'required',
            'price_type' => 'required',
            'instagram' => 'required',
            'theme_id' => 'required',
            //'logo' => 'required',
            'day_opened' => 'required',
            'day_open_clock' => 'required',
            'day_close_clock' => 'required',
            'wifi_password' => 'required',
        ];
    }

    public function attributes()
    {
        return [
            'place_name' => 'Mekan Adı',
            'place_link' => 'Mekan Linki',
            'main_language' => 'Ana Dil',
            //'other_language' => 'Diğer Diller',
            'price_type' => 'Ana Para Birimi',
            'instagram' => 'Instagram Adresi',
            'theme_id' => 'Menü Şablonu',
            'logo' => 'Mekan Logosu',
            'day_opened' => 'Mekan Açık/Kapalı Günleri',
            'day_open_clock' => 'Mekan Açılış Saatleri',
            'day_close_clock' => 'Mekan Kapanış Saatleri',
            'wifi_password' => 'Wifi Şifresi',
        ];
    }

}
