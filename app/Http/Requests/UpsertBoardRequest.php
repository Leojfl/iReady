<?php

namespace App\Http\Requests;


use Illuminate\Foundation\Http\FormRequest;


class UpsertBoardRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public static function rules()
    {
        return  [
            'name' => 'required',
            'description' => 'required',
            'active' => 'required',
            'available' => 'required',
            ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Nombre requerido',
            'description.required' => 'Descripcion requerida',
            'active.required' => 'Activo requerido',
            'available.required' => 'Disponible requerido',
        ];
    }

}