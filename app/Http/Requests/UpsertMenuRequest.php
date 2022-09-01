<?php

namespace App\Http\Requests;


use Illuminate\Foundation\Http\FormRequest;

class UpsertMenuRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return  [
        /*'name' => 'required',
        'description' => 'required',
        'active' => 'required',*/
        ];

    }
    public function messages()
    {
        return [
           /*'name.required' => 'Nombre requerido',
           'description.required' => 'Descripción requerida',
            'avtive.required' => 'Activo requerido',*/
        ];
    }
}