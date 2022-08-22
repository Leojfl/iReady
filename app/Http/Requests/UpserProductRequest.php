<?php

namespace App\Http\Requests;


use Illuminate\Foundation\Http\FormRequest;

class UpserProductRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return  [
        'description' => 'required',
        'name' => 'required',
        'price' => 'required|numeric',
        'fk_id_category' => 'required',
        ];

    }
    public function messages()
    {
        return [
            'description.required' => 'Descripción requerida',
            'name.required' => 'Nombre requerido',
            'price.required' => 'Precio requerido',
            'price.numeric' => 'Precio no válido',
            'fk_id_category.required' => 'Categoria requerida'
        ];
    }
}
