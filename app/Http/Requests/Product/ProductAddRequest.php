<?php

namespace App\Http\Requests\Product;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class ProductAddRequest extends FormRequest
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
        $rules = [
            //'menu_id' => 'required',
            //'category_id' => 'required',
            'product_name' => 'required',
            //'product_description' => 'required',
            'price' => 'required',
        ];
        $theme_id = 4;
        if ($theme_id != 4) {
            $rules['product_image'] = 'required|file|mimes:jpeg,png,jpg,gif|max:2048';
        }

        return $rules;
    }
    public function messages()
    {
        return [
            'product_image.required' => 'Ürün resmi yüklenmesi zorunludur.',
            'product_image.file' => 'Lütfen Bir Görsel Seçiniz.',
            'product_image.mimes' => 'Yalnızca jpeg, png ve jpg dosya türlerine izin verilmektedir.',
            'product_image.max' => 'Dosya boyutu en fazla 2MB olabilir.',
        ];
    }
    public function attributes()
    {
        return [
            'menu_id' => 'Menu Kimliği',
            'category_id' => 'Kategori',
            'product_name' => 'Ürün Adı',
            //'product_description' => 'Ürün Açıklaması',
            'price' => 'Fiyat',
            'product_image' => 'Ürün Görseli',
        ];
    }

   /* protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'status' => 'error',
            'message' => 'Doğrulama hatası',
            'errors' => $validator->errors()->all(),
        ], 422));
    }*/

}
