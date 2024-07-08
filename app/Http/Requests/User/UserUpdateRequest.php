<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class UserUpdateRequest extends FormRequest
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
            'name' => 'required',
            'email' => 'required',
            'tax_number' => 'required',
            'address' => 'required',
        ];
    }

    public function attributes()
    {
        return [
            'name' => 'Ad Soyad',
            'email' => 'E-posta',
            'tax_number' => 'Vergi Veya TC. no',
            'address' => 'Adres',
        ];
    }

}
