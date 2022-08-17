<?php

namespace App\Http\Requests;


use Illuminate\Foundation\Http\FormRequest;


class UpsertTicketRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public static function rules()
    {
        return  [
            'head' => 'required',
            'footnote1' => 'required',
            'footnote2' => 'required',
            ];
    }

    public function messages()
    {
        return [
            'head.required' => 'Encabezado requerido',
            'footnote1.required' => 'Pie de nota 1 requerido',
            'footnote2.required' => 'Pie de nota 2 requerido',
        ];
    }

}