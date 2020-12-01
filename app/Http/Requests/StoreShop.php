<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreShop extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'shop-name' => 'required|max:255',
            'shop-address' => 'max:255',
            'shop-zip' => 'max:5',
            'shop-city' => 'max:255',
            'shop-instagram' => 'max:255',
            'shop-facebook' => 'max:255',
            'shop-website' => 'max:255',
            'shop-image' => 'max:255',
            'shop-infrontof' => ''
        ];
    }
}
