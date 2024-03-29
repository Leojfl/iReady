<?php

namespace App\Http\Requests;


use Illuminate\Foundation\Http\FormRequest;


class UpsertProviderRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public static function rules()
    {
        return  [
            'name' => 'required',
            'last_name' => 'required',
            'second_last_name' => 'required',
            ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Nombre requerido',
            'last_name.required' => 'Apellido paterno requerido requerida',
            'second_last_name.required' => 'Apellido materno requerido',
        ];
    }

}
