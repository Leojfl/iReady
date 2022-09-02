<?php

namespace App\Http\Requests;


use Illuminate\Foundation\Http\FormRequest;


class UpsertShoppingRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public static function rules()
    {
        return  [
            'date' => 'required',
            'description' => 'required',
            'quantity' => 'required',
            'price' => 'required',
            'fk_id_provider' => 'required',
            'fk_id_raw_material' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'date.required' => 'Fecha requerida',
            'description.required' => 'Descripción requerida',
            'quantity.required' => 'Cantidad requerida',
            'price.required' => 'Precio requerido',
            'fk_id_provider.required' => 'Proveedor requerido',
            'fk_id_raw_material.required' => 'Material requerido'
        ];
    }

}
