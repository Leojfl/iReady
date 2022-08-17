<?php

namespace App\Http\Requests;


use Illuminate\Foundation\Http\FormRequest;


class UpsertRawMaterialRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public static function rules()
    {
        return  [
            'code' => 'required',
            'img_url' => 'required',
            'description' => 'required',
            'group' => 'required',
            'unit' => 'required',
            'provider' => 'required',
            'price' => 'required',
            ];
    }

    public function messages()
    {
        return [
            'code.required' => 'Codigo requerido',
            'img_url.required' => 'Imagen requerida',
            'description.required' => 'Descripcion requerida',
            'group.required' => 'Grupo requerido',
            'unit.required' => 'Unidad requerida',
            'provider.required' => 'Proovedor requerido',
            'price.required' => 'Precio requerido',
        ];
    }

}